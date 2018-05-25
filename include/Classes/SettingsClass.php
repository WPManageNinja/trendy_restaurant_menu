<?php namespace RestaurantMenu\Classes;

class SettingsClass {
	
	public static function addSettingsMenu() {
		add_submenu_page('edit.php?post_type=tr_menu', __('Trendy Restaurant Settings', 'tr_menu'), __('Settings', 'tr_menu'), 'manage_options', 'trendy_restaurant_settings', array(self::class, 'renderSettings'));
	}
	
	public static function renderSettings() {
		
	}
	
}