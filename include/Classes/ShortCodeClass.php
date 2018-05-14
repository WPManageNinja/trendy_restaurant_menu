<?php 

namespace RestaurantMenu\Classes;

class ShortCodeClass {
	
	public function register( $atts ) {
		
		$defaults = apply_filters('ninja_restaurant_menu_shortcode_defaults', array(
			'display'   => 'default',
			'limit'     => - 1,
			'meal_type' => false,
			'dish_type' => false,
			'location'  => false,
			'disable_modal' => false,
			'relation'  => 'OR',
			'per_grid' => 3
		));
		
		$attributes = shortcode_atts( $defaults, $atts );
		$attributes['view_file'] = $this->getViewNameByDisplay($attributes['display']);
		$attributes = apply_filters('ninja_restaurant_menu_shortcode_atts', $attributes);
		
		return ninjaRestaurantMenuRenderMenuItems($attributes);
	}
	
	private function getViewNameByDisplay($display) {
		echo $display.'<br />';
		$displayArray = array(
			'simple' => 'simple_food_menu',
			'center_aligned' => 'center_aligned_menu',
			'grid' => 'grid_items',
			'featured_a' => 'featured_style_a',
			'featured_b' => 'featured_style_b',
			'featured_c' => 'featured_style_c'
		);
		
		if(isset($displayArray[$display])) {
			return $displayArray[$display];
		}
		return 'default';
	}
}



