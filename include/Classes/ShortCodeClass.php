<?php namespace TrendyRestaurantMenu\Classes;

class ShortCodeClass {

	public static function register( $atts ) {

		$defaults = apply_filters( 'tr_menu_shortcode_defaults', array(
			'display'        => 'default',
			'limit'          => - 1,
			'meal_type'      => false,
			'dish_type'      => false,
			'location'       => false,
			'disable_modal'  => false,
			'item_ids'       => false,
			'relation'       => 'OR',
			'per_grid'       => 2,
			'offset'         => 0,
			'hide_price'     => false,
			'excerpt_length' => null
		) );

		$attributes                  = shortcode_atts( $defaults, $atts );
		$attributes['view_file']     = self::getViewNameByDisplay( $attributes['display'] );
		$attributes['excerptLength'] = self::getExcerptLength( $attributes );
		$attributes                  = apply_filters( 'tr_menu_shortcode_atts', $attributes );

		return trendyRestaurantMenuRenderMenuItems( $attributes );
	}

	public static function getExcerptLength( $attributes ) {
		if ( $attributes['excerpt_length'] ) {
			return intval( $attributes['excerpt_length'] );
		}
		if ( $attributes['display'] == 'grid' ) {
			return 90 / $attributes['per_grid'];
		}

		return 90;
	}

	private static function getViewNameByDisplay( $display ) {
		$displayArray = array(
			'simple'         => 'simple_food_menu',
			'center_aligned' => 'center_aligned_menu',
			'grid'           => 'grid_items'
		);
		$return       = 'default';
		if ( isset( $displayArray[ $display ] ) ) {
			$return = $displayArray[ $display ];
		}

		return apply_filters( 'tr_menu_get_view_name_by_display', $return, $display );
	}


	/**
	 * Save a flag if the a post/page/cpt have [tr_menu] shortcode
	 *
	 * @param int $post_id
	 *
	 * @return void
	 */
	public static function saveFlagOnShortCode( $post_id ) {
		if ( isset( $_POST['post_content'] ) ) {
			$post_content = $_POST['post_content'];
		} else {
			$post         = get_post( $post_id );
			$post_content = $post->post_content;
		}
		if ( has_shortcode( $post_content, 'tr_menu' ) ) {
			update_post_meta( $post_id, '_has_tr_menu_shortcode', 1 );
		} else if ( get_post_meta( $post_id, '_has_tr_menu_shortcode', true ) ) {
			update_post_meta( $post_id, '_has_tr_menu_shortcode', 0 );
		}
	}
}