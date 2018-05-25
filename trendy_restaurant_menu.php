<?php
/*
Plugin Name: Trendy Restaurant Menu 
Plugin URI:  https://developer.wordpress.org/restaurant-menu/the-basics/
Description: Restaurant Menu for a Restaurant business..
Version:     0.1
Author:      WPManageNinja
Author URI:  https://wpmanageninja.com
Text Domain: tr_menu
Domain Path: /languages
License:     GPL2
 
Restaurant Menu is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.
 
Restaurant Menu is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
 
You should have received a copy of the GNU General Public License
along with Restaurant Menu. If not, see {License URI}.
*/

defined( 'ABSPATH' ) or die();

define( 'TRENDY_RESTAURANT_MENU_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'TRENDY_RESTAURANT_MENU_PLUGIN_DIR_PATH', plugin_dir_path( __FILE__ ) );
define( 'TRENDY_RESTAURANT_MENU_PLUGIN_VERSION', '1.0' );
include 'load.php';

register_activation_hook( __FILE__, function () {
	if ( ! get_option( '_tr_menu_currency_sign', true ) ) {
		update_option( '_tr_menu_currency_sign', '$' );
	}
} );

class RestaurantMenu {

	public function boot() {
		$this->commonHooks();
		if ( is_admin() ) {
			$this->adminHooks();
		} else {
			$this->publicHooks();
		}
	}

	public function publicHooks() {
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueueScripts' ) );
	}

	/**
	 * The hook where we will register all the common actions and filters
	 */
	public function commonHooks() {
		// register Post type
		add_action( 'init', array( '\RestaurantMenu\Classes\PostTypeClass', 'initRestaurantPostType' ) );
		$shortCodeClass = new \RestaurantMenu\Classes\ShortCodeClass();
		add_shortcode( 'tr_menu', array( $shortCodeClass, 'register' ) );
		$menuContentClass = new \RestaurantMenu\Classes\MenuContentClass();
		add_action( 'init', function () use ( $menuContentClass ) {
			if ( isset( $_GET['tr_get_item'] ) && $_GET['tr_get_item'] ) {
				$menuContentClass->getItemModal();
				die();
			}
		} );

		add_filter( 'the_content', array( $menuContentClass, 'filterSingleMenuContent' ) );

		add_action( 'widgets_init', function () {
			register_widget( 'RestaurantMenu\Classes\WidgetClass' );
		} );
	}

	public function adminHooks() {
		$postTypeName = \RestaurantMenu\Classes\PostTypeClass::$postTypeName;
		add_action( 'add_meta_boxes_' . $postTypeName,
			array( '\RestaurantMenu\Classes\MetaBoxClass', 'addMetaBoxes' ) );
		add_action( 'save_post_' . $postTypeName, array( '\RestaurantMenu\Classes\MetaBoxClass', 'saveMeta' ) );
		add_action( 'current_screen', function ( $current_screen ) use ( $postTypeName ) {
			if ( $current_screen->post_type != $postTypeName ) {
				\RestaurantMenu\Classes\TinyMceClass::registerButton();
			}
		} );
		
		add_action( 'save_post', array( 'RestaurantMenu\Classes\ShortCodeClass', 'saveFlagOnShortCode' ) );
		add_action( 'admin_menu', array( 'RestaurantMenu\Classes\SettingsClass', 'addSettingsMenu' ) );
		add_action( 'wp_ajax_tr_menu_save_settings', array( 'RestaurantMenu\Classes\SettingsClass', 'saveSettings' ) );
	}

	public function enqueueScripts() {
		global $post;
		wp_register_style( 'tr_menu_styles', TRENDY_RESTAURANT_MENU_PLUGIN_URL . 'assets/styles.css', array(),
			TRENDY_RESTAURANT_MENU_PLUGIN_VERSION );

		if ( is_singular() && is_a( $post, 'WP_Post' ) && get_post_meta( $post->ID, '_has_tr_menu_shortcode', true ) ) {
			wp_enqueue_style( 'tr_menu_styles' );
		} else if ( is_singular( array( \RestaurantMenu\Classes\PostTypeClass::$postTypeName ) ) ) {
			wp_enqueue_style( 'tr_menu_styles' );
		}

		wp_register_script( 'tr_menu_js', TRENDY_RESTAURANT_MENU_PLUGIN_URL . 'assets/app.js',
			array( 'jquery' ), TRENDY_RESTAURANT_MENU_PLUGIN_VERSION );
		wp_localize_script( 'tr_menu_js', 'tr_menu_vars',
			array(
				'get_item_url' => site_url( '?tr_get_item=1' )
			)
		);
	}
}

add_action( 'plugins_loaded', function () {
	$RestaurantMenus = new RestaurantMenu();
	$RestaurantMenus->boot();
} );