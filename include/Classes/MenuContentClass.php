<?php namespace TrendyRestaurantMenu\Classes;

class MenuContentClass {

	public function handleAjax() {
		$route          = sanitize_text_field( $_REQUEST['route'] );
		$validEndpoints = array(
			'get_item' => 'getItemModal'
		);

		if ( isset( $validEndpoints[ $route ] ) ) {
			$this->{$validEndpoints[ $route ]}();
			exit();
		}
	}

	public function getItemModal() {
		//sleep( 0 );
		$postId = intval( $_REQUEST['item_id'] );
		$post   = get_post( $postId );

		$itemData = array(
			'postID'      => $postId,
			'post'        => $post,
			'price'       => HelperClass::formatPrice( get_post_meta( $postId, '_ninja_restaurant_item_price', true ) ),
			'currency'    => HelperClass::getCurrency(),
			'nutrition'   => HelperClass::getItemNutrition( $postId ),
			'ingredients' => get_post_meta( $postId, '_ninja_restaurant_ingredients', true )
		);

		HelperClass::renderView( 'modal', $itemData );
	}

	public function filterSingleMenuContent( $content ) {
		if ( ! is_singular( array( PostTypeClass::$postTypeName ) ) ) {
			return $content;
		}

		$postId   = get_the_ID();
		$price    = HelperClass::formatPrice( get_post_meta( $postId, '_ninja_restaurant_item_price', true ) );
		$currency = HelperClass::getCurrency();
		$data     = array(
			'price'       => $price,
			'post_id'     => get_the_ID(),
			'currency'    => $currency,
			'nutrition'   => HelperClass::getItemNutrition( $postId ),
			'ingredients' => get_post_meta( $postId, '_ninja_restaurant_ingredients', true )
		);

		$extraContent = HelperClass::makeView( 'single_menu_content', $data );

		return $content . $extraContent;
	}
}