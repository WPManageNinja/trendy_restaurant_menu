<?php

function ninjaRestaurantMenuRenderMenuItems($attributes) {
	extract($attributes);
	$taxonomies = array(
		'rl_res_meal_cat'     => ( $meal_type ) ? explode( ',', $meal_type ) : array(),
		'rl_res_dish_cat'     => ( $dish_type ) ? explode( ',', $dish_type ) : array(),
		'rl_res_location_cat' => ( $location ) ? explode( ',', $location ) : array()
	);
	
	$menuItems = ninjaRestaurantMenuGetMenuItems( $taxonomies, $limit, $relation, $attributes );
	
	$modalClass = '';
	if ( !$disable_modal ) {
		$modalClass = 'res_item_modal';
	}
	
	if(!$display) {
		$display = 'default';
	}
	
	return RestaurantMenu\Classes\HelperClass::makeView($view_file, array(
		'items' => $menuItems,
		'display' => $display,
		'currency' => '$',
		'disable_modal' => $disable_modal,
		'modalClass' => $modalClass,
		'per_grid' => $per_grid
	));
}

function ninjaRestaurantMenuGetMenuItems( $taxonomies, $limit = - 1, $tax_relation = 'AND', $attributes ) {
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
	
	$queryArgs = apply_filters('ninja_restaurant_menu_post_query_args', $queryArgs, $attributes);
	
	$items =  get_posts($queryArgs);

	foreach ($items as $item) {
		$price = get_post_meta($item->ID, '_ninja_restaurant_item_price', true);
		if($price) {
			$item->price = number_format($price);
		} else {
			$item->price = false;
		}
	}

	return $items;
}