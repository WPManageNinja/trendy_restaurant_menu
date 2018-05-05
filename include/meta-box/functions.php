<?php

if ( defined( 'ABSPATH' ) && ! defined( 'RWMB_VER' ) ) {
	require_once dirname( __FILE__ ) . '/inc/loader.php';
	$loader = new RWMB_Loader();
	$loader->init();
}

function main_item_data( $meta_boxes ) {
	$prefix = 'rlgroup_';

	$meta_boxes[] = array(
		'id' => 'main_item_data',
		'title' => esc_html__( 'Main Item Data', 'restaurant_menu' ),
		'post_types' => array( 'rl_res_menu' ),
		'context' => 'advanced',
		'priority' => 'default',
		'autosave' => true,
		'fields' => array(
			array(
				'id' => $prefix.'sub_header_id',
				'type' => 'text',
				'name' => esc_html__( 'Sub Header', 'restaurant_menu' ),
				'class' => 'rlgroup_sub_header',
			),

			array(
				'id' => $prefix.'desc_id',
				'type' => 'wysiwyg',
				'name' => esc_html__( 'Description', 'restaurant_menu' ),
				'class' => 'rlgroup_des',
			),

			array(
				'id' => $prefix.'additional_text_id',
				'type' => 'text',
				'name' => esc_html__( 'Additional Text', 'restaurant_menu' ),
			),

			array(
				'id' => $prefix.'price_id',
				'type' => 'number',
				'name' => esc_html__( 'Price', 'restaurant_menu' ),
			),

			array(
				'id' => $prefix.'spicy_level_id',
				'type' => 'select',
				'name' => esc_html__( 'Spicy Level', 'restaurant_menu' ),
				'options'         => array(
			        '0' => '0',
			        '1' => '1',
			        '2' => '2',
			        '3' => '3',
			        '4' => '4',
			        '5' => '5',
			        '6' => '6',
			        '7' => '7',
			        '8' => '8',
			        '9' => '9',
			        '10' => '10',
			    ),
			),

		),


	);

	return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'main_item_data' );

function nutritional_info( $meta_boxes ) {
	$prefix = 'rlgroup_';

	$meta_boxes[] = array(
		'id' => 'nutritional_info',
		'title' => esc_html__( 'Nutritional Info', 'restaurant_menu' ),
		'post_types' => array( 'rl_res_menu' ),
		'context' => 'advanced',
		'priority' => 'default',
		'autosave' => true,
		'fields' => array(
			array(
				'id' => $prefix.'calories',
				'type' => 'text',
				'name' => esc_html__( 'Calories', 'restaurant_menu' )
			),
			array(
				'id' => $prefix.'cholesterol',
				'type' => 'text',
				'name' => esc_html__( 'Cholesterol', 'restaurant_menu' )
			),
			array(
				'id' => $prefix.'fiber',
				'type' => 'text',
				'name' => esc_html__( 'Fiber', 'restaurant_menu' )
			),
			array(
				'id' => $prefix.'sodium',
				'type' => 'text',
				'name' => esc_html__( 'Sodium', 'restaurant_menu' )
			),
			array(
				'id' => $prefix.'carbohydrates',
				'type' => 'text',
				'name' => esc_html__( 'Carbohydrates', 'restaurant_menu' )
			),
			array(
				'id' => $prefix.'fat',
				'type' => 'text',
				'name' => esc_html__( 'Fat', 'restaurant_menu' )
			),
			array(
				'id' => $prefix.'protein',
				'type' => 'text',
				'name' => esc_html__( 'Protein', 'restaurant_menu' )
			),
		),
	);

	return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'nutritional_info' );


function ingredients( $meta_boxes ) {
	$prefix = 'rlgroup_';

	$meta_boxes[] = array(
		'id' => 'ingredients_id',
		'title' => esc_html__( 'Ingredients', 'restaurant_menu' ),
		'post_types' => array( 'rl_res_menu' ),
		'context' => 'advanced',
		'priority' => 'default',
		'autosave' => true,
		'fields' => array(
			array(
				'id' => $prefix.'ingredients',
				'name' => esc_html__( 'Ingredients', 'restaurant_menu' ),
				'type' => 'wysiwyg',
			),
		),
	);

	return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'ingredients' );







function rlgroup_post_attributes( $meta_boxes ) {
	$prefix = 'rlgroup_';

	$meta_boxes[] = array(
		'id' => 'post_attributes',
		'title' => esc_html__( 'Post Attributes', 'restaurant_menu' ),
		'post_types' => array( 'rl_res_menu' ),
		'context' => 'side',
		'priority' => 'default',
		'autosave' => false,
		'fields' => array(
			array(
				'id' => $prefix.'order',
				'type' => 'text',
				'name' => esc_html__( 'Order', 'restaurant_menu' ),
				'size' => 4,
				'placeholder' => 0
			),
		),
	);

	return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'rlgroup_post_attributes' );












