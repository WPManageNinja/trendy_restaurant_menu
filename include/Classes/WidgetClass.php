<?php namespace TrendyRestaurantMenu\Classes;


class WidgetClass extends \WP_Widget {

	public function __construct() {
		parent::__construct( 'tr_menu_widget',
			esc_html__( 'Trendy Restaurant Menu', 'tr_menu' ),
			array(
				'description' => esc_html__( 'Restaurant Menu, You can add your website', 'tr_menu' )
			)
		);
	}

	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );
		// before and after widget arguments are defined by themes
		echo $args['before_widget'];
		if ( ! empty( $title ) ) {
			echo $args['before_title'] . $title . $args['after_title'];
		}
		// This is where you run the code and display the output
		$disableModal = ! empty( $instance['_res_disable_modal_widget'] );

		$shortcode = "[tr_menu display='" . $instance['_res_display_widget']
		             . "' per_grid='1' hide_price=" . $instance['_res_hide_price'] . "
		             limit='" . $instance['_res_limit_widget'] . "' disable_modal='" . $disableModal
		             . "'meal_type='" . implode( ',', $instance['_res_meal_type_widget'] )
		             . "' dish_type='" . implode( ',', $instance['_res_dish_type_widget'] )
		             . "' location='" . implode( ',', $instance['_res_location_widget'] ) . "']";

		echo do_shortcode( $shortcode );

		echo $args['after_widget'];
	}

	public function form( $instance ) {

		$title                 = ! empty( $instance['title'] ) ? $instance['title'] : "";
		$_res_display_widget   = ! empty( $instance['_res_display_widget'] ) ? $instance['_res_display_widget']
			: "";
		$_res_meal_type_widget = ! empty( $instance['_res_meal_type_widget'] ) ? $instance['_res_meal_type_widget']
			: [];
		$_res_dish_type_widget = ! empty( $instance['_res_dish_type_widget'] ) ? $instance['_res_dish_type_widget']
			: [];
		$_res_location_widget  = ! empty( $instance['_res_location_widget'] ) ? $instance['_res_location_widget']
			: [];
		$_res_limit_widget     = ! empty( $instance['_res_limit_widget'] ) ? $instance['_res_limit_widget'] : "5";

		$_res_disable_modal_widget = ! empty( $instance['_res_disable_modal_widget'] );
		$_res_hide_price           = ! empty( $instance['_res_hide_price'] );

		$displayTypes = HelperClass::getDisplayTypes();
		$mealTypes    = HelperClass::getTermsFormatted( array(
			'taxonomy'   => PostTypeClass::$mealTypeName,
			'hide_empty' => false,
		) );

		$dishTypes = HelperClass::getTermsFormatted( array(
			'taxonomy'   => PostTypeClass::$dishTypeName,
			'hide_empty' => false,
		) );

		$locations = HelperClass::getTermsFormatted( array(
			'taxonomy'   => PostTypeClass::$locationTypeName,
			'hide_empty' => false,
		) );

		include TRENDY_RESTAURANT_MENU_PLUGIN_DIR_PATH . "include/templates/widgets/res_menu_widget.php";
	}
}



