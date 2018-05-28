<?php namespace TrendyRestaurantMenu\Classes;

class SettingsClass {

	public static function addSettingsMenu() {
		add_submenu_page( 'edit.php?post_type=tr_menu', __( 'Trendy Restaurant Settings', 'tr_menu' ),
			__( 'Settings', 'tr_menu' ), 'manage_options', 'trendy_restaurant_settings',
			array( self::class, 'renderSettings' ) );
	}

	public static function renderSettings() {
		self::loadAssets();
		HelperClass::renderView( 'settings.settings', array() );
	}

	public static function loadAssets() {
		wp_enqueue_style( 'trendy_settings_styles', TRENDY_RESTAURANT_MENU_PLUGIN_URL . 'assets/admin_settings.css',
			array() );
	}


	public static function saveSettings() {
		if ( ! current_user_can( 'manage_options' ) ) {
			return;
		}

		$currencySign = sanitize_text_field( $_REQUEST['currency_sign'] );
		update_option( '_tr_menu_currency_sign', $currencySign );
		wp_send_json_success( array(
			'message' => __( 'Settings successfully saved', 'tr_menu' )
		), 200 );
	}

}