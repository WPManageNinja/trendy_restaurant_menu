<?php

function ninjaRestaurantMenuRenderMenuItems($attributes) {
	
	wp_enqueue_script('tr_menu_js');
	wp_enqueue_style('tr_menu_styles');
	
	extract($attributes);
	$taxonomies = array(
		\RestaurantMenu\Classes\PostTypeClass::$mealTypeName     => ( $meal_type ) ? explode( ',', $meal_type ) : array(),
		\RestaurantMenu\Classes\PostTypeClass::$dishTypeName     => ( $dish_type ) ? explode( ',', $dish_type ) : array(),
		\RestaurantMenu\Classes\PostTypeClass::$locationTypeName => ( $location ) ? explode( ',', $location ) : array()
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
		'post_type' => \RestaurantMenu\Classes\PostTypeClass::$postTypeName,
	);
	
	if(count($taxQuery) > 1) {
		$queryArgs['tax_query'] = $taxQuery;
	}
	
	$queryArgs = apply_filters('tr_menu_post_query_args', $queryArgs, $attributes);
	
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