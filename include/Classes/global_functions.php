<?php

function ninjaRestaurantMenuRenderMenuItems($attributes) {
	extract($attributes);
	$taxonomies = array(
		'rl_res_meal_cat'     => ( $meal_type ) ? explode( ',', $meal_type ) : array(),
		'rl_res_dish_cat'     => ( $dish_type ) ? explode( ',', $dish_type ) : array(),
		'rl_res_location_cat' => ( $location ) ? explode( ',', $location ) : array()
	);
	
	$menuItems = ninjaRestaurantMenuGetMenuItems( $taxonomies, $limit, $relation );
	
	return RestaurantMenu\Classes\HelperClass::makeView($display, array(
		'items' => $menuItems,
		'currency' => '$',
		'disable_modal' => $disable_modal
	));
}

function ninjaRestaurantMenuGetMenuItems( $taxonomies, $limit = - 1, $tax_relation = 'AND' ) {
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