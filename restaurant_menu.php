<?php
/*
Plugin Name: Restaurant Menu 
Plugin URI:  https://developer.wordpress.org/restaurant-menu/the-basics/
Description: Restaurant Menu for a Restaurant business..
Version:     0.1
Author:      WPManageNinja
Author URI:  https://wpmanageninja.com
Text Domain: restaurant menu
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

define( 'RESTAURANT_MENU_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'RESTAURANT_MENU_PLUGIN_DIR_PATH', plugin_dir_path( __FILE__ ) );


include 'load.php';

class RestaurantMenu {

	public function boot() {
		$this->publicHooks();
		$this->commonHooks();
	}

	public function publicHooks() {
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueueScripts' ) );
		add_action('admin_enqueue_scripts', array($this,'admin_enqueue_css'));
	}

	public function admin_enqueue_css() 
	{
		wp_enqueue_style( 'rl_res_admin_style', RESTAURANT_MENU_PLUGIN_URL . 'assets/admin.css' );
	}



	/**
	 * The hook where we will register all the common actions and filters
	 */
	public function commonHooks() {
		// register Post type
		$postTypeClass = new \RestaurantMenu\Classes\PostTypeClass();
		add_action( 'init', array( $postTypeClass, 'initRestaurantPostType' ) );

		$shortCodeClass = new \RestaurantMenu\Classes\ShortCodeClass();
		add_shortcode( 'restaurant_menu', array( $shortCodeClass, 'register' ) );

		add_action( 'wp_ajax_res_menu_modal', array( $this, 'modalGenerate' ) );
		add_action( 'wp_ajax_nopriv_res_menu_modal', array( $this, 'modalGenerate' ) );
	}

	public function adminHooks() {

	}

	public function enqueueScripts() {
		wp_enqueue_style( 'rl_res_style-res-menu', RESTAURANT_MENU_PLUGIN_URL . 'assets/style.css' );
		wp_enqueue_style( 'rl_res_font-awesome-style','https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' );
		wp_enqueue_script( 'rl_res_vertical_tabbed', RESTAURANT_MENU_PLUGIN_URL . 'assets/js/vertical_tabbed.js', array( 'jquery' ) );
		wp_enqueue_script( 'rl_res_tab_style_menu', RESTAURANT_MENU_PLUGIN_URL . 'assets/js/tab_style_menu.js', array( 'jquery' ) );
		wp_enqueue_script( 'rl_res_categorized_menu', RESTAURANT_MENU_PLUGIN_URL . 'assets/js/categorized_menu.js', array( 'jquery' ) );
		wp_enqueue_script( 'rl_res_boxed_style_menu', RESTAURANT_MENU_PLUGIN_URL . 'assets/js/boxed_style_menu.js', array( 'jquery' ) );

		wp_enqueue_script( 'rl_res_modal_custom_ajax', RESTAURANT_MENU_PLUGIN_URL . 'assets/js/modal_custom_ajax.js',array( 'jquery' ) );

		wp_localize_script( 'rl_res_modal_custom_ajax', 'res_menu',array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );

		wp_enqueue_script( 'rl_res_jquery-ui', 'https://code.jquery.com/ui/1.12.1/jquery-ui.min.js',array( 'jquery' ) );

		wp_enqueue_script( 'rl_res_sleep_custom_link', RESTAURANT_MENU_PLUGIN_URL . 'sleep.php' );
		wp_localize_script( 'rl_res_sleep_custom_link', 'sleep', array( 'url' => RESTAURANT_MENU_PLUGIN_URL . 'sleep.php' ) );
	}

	public function modalGenerate() {
		$PostID   = $_POST['id'];
		$resMenus = new WP_Query( array(
			'post_type' => 'rl_res_menu',
			'p'         => $PostID,
		) );

		ob_start();
		while ( $resMenus->have_posts() ) : $resMenus->the_post();
			require( dirname( __FILE__ ) . '/include/modal.php' );
		endwhile;
		echo ob_get_clean();
		die();
	}

}

add_action( 'plugins_loaded', function () {
	$RestaurantMenus = new RestaurantMenu();
	$RestaurantMenus->boot();
} );


if ( file_exists( dirname( __FILE__ ) . '/include/restaurant-menu-settings.php' ) ) {
	require dirname( __FILE__ ) . '/include/restaurant-menu-settings.php';
};