<?php

function trendyRestaurantMenuRenderMenuItems($attributes) {
	
	wp_enqueue_script('tr_menu_js');
	wp_enqueue_style('tr_menu_styles');
	extract($attributes);
	if($item_ids) {
		$attributes['item_ids'] = explode( ',', $item_ids );
	}
	
	
	$taxonomies = array(
		\TrendyRestaurantMenu\Classes\PostTypeClass::$mealTypeName     => ( $meal_type ) ? explode( ',', $meal_type ) : array(),
		\TrendyRestaurantMenu\Classes\PostTypeClass::$dishTypeName     => ( $dish_type ) ? explode( ',', $dish_type ) : array(),
		\TrendyRestaurantMenu\Classes\PostTypeClass::$locationTypeName => ( $location ) ? explode( ',', $location ) : array()
	);
	
	$menuItems = trendyRestaurantMenuGetMenuItems( $taxonomies, $limit, $relation, $attributes );

	$modalClass = '';
	if ( !$disable_modal ) {
		$modalClass = 'res_item_modal';
	}
	
	if(!$display) {
		$display = 'default';
	}
	
	return TrendyRestaurantMenu\Classes\HelperClass::makeView($view_file, array(
		'items' => $menuItems,
		'display' => $display,
		'currency' => \TrendyRestaurantMenu\Classes\HelperClass::getCurrency(),
		'disable_modal' => $disable_modal,
		'modalClass' => $modalClass,
		'per_grid' => $per_grid,
		'excerptLength' => $excerptLength
	));
}

function trendyRestaurantMenuGetMenuItems( $taxonomies, $limit = - 1, $tax_relation = 'AND', $attributes ) {
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

	if($limit == -1) {
		$limit = 9999;
	}
	
	$queryArgs = array(
		'posts_per_page' => $limit,
		'post_type' => \TrendyRestaurantMenu\Classes\PostTypeClass::$postTypeName,
		'offset' => intval($attributes['offset'])
	);
	
	if($attributes['item_ids']) {
		$queryArgs['post__in'] = $attributes['item_ids'];
	} else if(count($taxQuery) > 1) {
		$queryArgs['tax_query'] = $taxQuery;
	}
	
	$queryArgs = apply_filters('tr_menu_post_query_args', $queryArgs, $attributes);
	
	$items =  get_posts($queryArgs);

	foreach ($items as $item) {
		
		if(isset($attributes['hide_price']) && $attributes['hide_price']) {
			$item->price = false;
		} else {
			$price = get_post_meta($item->ID, '_ninja_restaurant_item_price', true);
			if($price) {
				$item->price = number_format($price);
			} else {
				$item->price = false;
			}
		}
	}
	
	return $items;
}

function trendyRestaurantMenuWordExcerpt( $post, $length, $item_type = 'default', $end='....')
{
	if($post->post_exceprt) {
		$string = $post->post_exceprt;
	} else {
		$string = $post->post_content;
	}
	$string = strip_tags($string);
	
	if (strlen($string) > $length) {

		// truncate string
		$stringCut = substr($string, 0, $length);

		// make sure it ends in a word so assassinate doesn't become ass...
		$string = substr($stringCut, 0, strrpos($stringCut, ' ')).$end;
	}
	return apply_filters('tr_menu_get_item_except', $string, $post, $item_type);
}