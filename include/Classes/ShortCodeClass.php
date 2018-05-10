<?php 

namespace RestaurantMenu\Classes;

class ShortCodeClass {
	public function register( $atts ) {
		extract( shortcode_atts( array(
			'display'   => 'default',
			'limit'     => - 1,
			'meal_type' => false,
			'dish_type' => false,
			'location'  => false,
			'relation'  => 'OR'
		), $atts ) );

		$taxonomies = array(
			'rl_res_meal_cat'     => ( $meal_type ) ? explode( ',', $meal_type ) : array(),
			'rl_res_dish_cat'     => ( $dish_type ) ? explode( ',', $dish_type ) : array(),
			'rl_res_location_cat' => ( $location ) ? explode( ',', $location ) : array()
		);
		
		
		$menuItems = $this->getMenuItems( $taxonomies, $limit, $relation );
		
		return $this->makeView($display, array(
			'items' => $menuItems,
			'currency' => '$'
		));
	}

	public function getMenuItems( $taxonomies, $limit = - 1, $tax_relation = 'AND' ) {
		$taxQuery = array(
			'relation' => $tax_relation,
		);
		foreach ($taxonomies as $tax_name => $cat_taxonomies) {
			if($cat_taxonomies) {
				$taxQuery[] = array(
					'taxonomy' => $tax_name,
					'field'    => 'slug',
					'terms'    => $cat_taxonomies,
				);
			}
		}
		
		$queryArgs = array(
			'posts_per_page' => $limit,
			'post_type' => 'restaurant_menu',
		);
		
		if(count($taxQuery) > 1) {
			$queryArgs['tax_query'] = $taxQuery;
		}
		$items =  get_posts($queryArgs);
		
		foreach ($items as $item) {
			$item->price = number_format(get_post_meta($item->ID, '_ninja_restaurant_item_price', true));
		}
		
		return $items;
	}
	
	private function makeView($templateName, $data = array()) {
		extract($data);
		$templateName = sanitize_file_name($templateName);
		$filePath = RESTAURANT_MENU_PLUGIN_DIR_PATH . 'include/templates/' . $templateName . '.php';
		if(!file_exists($filePath))  {
			$filePath = RESTAURANT_MENU_PLUGIN_DIR_PATH . 'include/templates/default.php';
		}
		ob_start();
		include $filePath;
		return ob_get_clean();
	}
}



