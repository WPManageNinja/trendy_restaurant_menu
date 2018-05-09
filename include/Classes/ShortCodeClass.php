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
			'type'  	=> false,
			'relation'  => 'OR'
		), $atts ) );

		$taxonomies = array(
			'rl_res_meal_cat'     => ( $meal_type ) ? explode( ',', $meal_type ) : array(),
			'rl_res_dish_cat'     => ( $dish_type ) ? explode( ',', $dish_type ) : array(),
			'rl_res_location_cat' => ( $location ) ? explode( ',', $location ) : array()
		);
		

		$types = array(
			'taxonomy'  => ( $type ) ? explode( ',', $type ) : array(),
		);
		
		
		$menuItems = $this->getMenuItems( $taxonomies, $limit, $relation, $types );
		
		return $this->makeView($display, array(
			'items' => $menuItems
		));
		
	}

	public function getMenuItems( $taxonomies, $limit = - 1, $tax_relation = 'AND', $types ) {
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

		
		foreach ($types as $type) {
			$type_items = get_terms($type);
			foreach ($type_items as $type_item) {
				if($type_item->taxonomy) {
					$taxQuery[] = array(
						'taxonomy' => $type_item->taxonomy,
						'field'    => 'slug',
						'terms'    => $type_item->slug,
						'include_children' => false,
					);
				}
			}
		}


		$queryArgs = array(
			'posts_per_page' => $limit,
			'post_type' => 'rl_res_menu',
		);
		
		if(count($taxQuery) > 1) {
			$queryArgs['tax_query'] = $taxQuery;
		}
		return get_posts($queryArgs);
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



