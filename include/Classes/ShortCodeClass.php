<?php 

namespace RestaurantMenu\Classes;

class ShortCodeClass {
	
	public function register( $atts ) {
		$attributes = shortcode_atts( array(
			'display'   => 'default',
			'limit'     => - 1,
			'meal_type' => false,
			'dish_type' => false,
			'location'  => false,
			'disable_modal' => false,
			'relation'  => 'OR'
		), $atts );
		$attributes = apply_filters('ninja_restaurant_menu_shortcode_atts', $attributes);
		
		return ninjaRestaurantMenuRenderMenuItems($attributes);
	}
	
}



