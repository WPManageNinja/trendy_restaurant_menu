<?php namespace RestaurantMenu\Classes;

class MetaBoxClass {

	public static function addMetaBoxes() {
		add_meta_box( 'ninja_restaurant_menu_main_meta', __( 'Main Item Data', 'tr_menu' ),
			array( self::class, 'mainItemMetaBox' ) );

		add_meta_box( 'ninja_restaurant_menu_nutritional_meta', __( 'Nutrition Info', 'tr_menu' ),
			array( self::class, 'nutritionMetaBox' ) );

		add_meta_box( 'ninja_restaurant_menu_ingredients_meta', __( 'Ingredients', 'tr_menu' ),
			array( self::class, 'ingredientsMetaBox' ) );
	}

	public static function mainItemMetaBox( $post ) {
		wp_enqueue_style( 'ninja_restaurant_menu_admin_style', RESTAURANT_MENU_PLUGIN_URL . 'assets/admin.css' );

		$data = array(
			'_ninja_restaurant_sub_header'  => get_post_meta( $post->ID, '_ninja_restaurant_sub_header', true ),
			'_ninja_restaurant_item_price'  => get_post_meta( $post->ID, '_ninja_restaurant_item_price', true ),
			'_ninja_restaurant_spicy_level' => get_post_meta( $post->ID, '_ninja_restaurant_spicy_level', true ),
		);
		HelperClass::renderView( 'metaboxes.main_items', $data );
	}

	public static function nutritionMetaBox( $post ) {
		$data = array(
			'boxes'     => HelperClass::getNutritionItems(),
			'nutrition' => get_post_meta( $post->ID, '_ninja_restaurant_nutrition', true )
		);
		HelperClass::renderView( 'metaboxes.nutrition_info', $data );
	}

	public static function ingredientsMetaBox( $post ) {
		$data = array(
			'ingredients' => get_post_meta( $post->ID, '_ninja_restaurant_ingredients', true )
		);

		HelperClass::renderView( 'metaboxes.ingredients', $data );
	}

	public static function saveMeta( $postID ) {
		if ( ! isset($_REQUEST['has_restaurant_meta_info']) ) {
			return;
		}
		$metaData = array(
			'_ninja_restaurant_sub_header'  => sanitize_text_field( $_REQUEST['_ninja_restaurant_sub_header'] ),
			'_ninja_restaurant_item_price'  => sanitize_text_field( $_REQUEST['_ninja_restaurant_item_price'] ),
			'_ninja_restaurant_spicy_level' => sanitize_text_field( $_REQUEST['_ninja_restaurant_spicy_level'] ),
			'_ninja_restaurant_ingredients' => wp_kses_post( $_REQUEST['_ninja_restaurant_ingredients'] )
		);

		$nutritionInfo          = $_REQUEST['_ninja_restaurant_nutrition'];
		$formattedNutritionInfo = array();
		foreach ( $nutritionInfo as $infoIndex => $value ) {
			$formattedNutritionInfo[ $infoIndex ] = sanitize_text_field( $value );
		}
		
		$metaData['_ninja_restaurant_nutrition'] = $formattedNutritionInfo;
		
		foreach ( $metaData as $meta_key => $meta_datum ) {
			update_post_meta( $postID, $meta_key, $meta_datum );
		}
		
		return;
	}
	
}