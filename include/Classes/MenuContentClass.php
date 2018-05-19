<?php

namespace RestaurantMenu\Classes;

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
		sleep( 1 );

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

		$modalContent = HelperClass::makeView( 'modal', $itemData );

		wp_send_json_success( array(
			'content'  => $modalContent,
			'itemData' => $itemData
		), 200 );
	}

	public function filterSingleMenuContent( $content ) {
		if ( ! is_singular( array( 'restaurant_menu' ) ) ) {
			return $content;
		}
		
		$postId = get_the_ID();
		$data   = array(
			'price'       => HelperClass::formatPrice( get_post_meta( $postId, '_ninja_restaurant_item_price', true ) ),
			'currency'    => HelperClass::getCurrency(),
			'nutrition'   => HelperClass::getItemNutrition( $postId ),
			'ingredients' => get_post_meta( $postId, '_ninja_restaurant_ingredients', true )
		);
		
		$priceHTML = '';
		if($data['price']) {
			$priceHTML = '<div class="res_item_price">'.$data['currency'].$data['price'].'</div>';
		}
		
		$extraContent = HelperClass::makeView('single_menu_content', $data);
		return $priceHTML.$content.$extraContent;
	}
}