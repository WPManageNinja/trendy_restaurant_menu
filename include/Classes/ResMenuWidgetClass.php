<?php


class ResMenuWidgetClass extends WP_Widget
{
	
	public function __construct()
	{
		parent::__construct('rl_res_menu_widget', 
			esc_html__( 'Restaurant Menu', 'restaurant_menu' ),
			array(
				'description' => esc_html__('Restaurant Menu, You can add your website', 'restaurant_menu')
			)
		);
	}

	

	public function widget($args, $instance)
	{	
		echo $args['before_widget'];

		echo $args['before_title'].$instance['title'].$args['after_title'];

		if(isset($instance['_res_display_widget'])){
			echo $instance['_res_display_widget']."<br/>";
		}

		if(isset($instance['_res_meal_type_widget'])){
			echo implode(', ', $instance['_res_meal_type_widget']) ."<br/>"; 
		}

		if(isset($instance['_res_dish_type_widget'])){
			echo implode(', ', $instance['_res_dish_type_widget']) ."<br/>"; 
		}

		if(isset($instance['_res_location_widget'])){
			echo implode(', ', $instance['_res_location_widget']) ."<br/>"; 
		}
		
		if(isset($instance['_res_limit_widget'])){
			echo $instance['_res_limit_widget'] ."<br/>"; 
		}

		if(isset($instance['_res_disable_modal_widget'])){
			echo $instance['_res_disable_modal_widget'] ."<br/>"; 
		}
		
		echo $args['after_widget'];

	}


	public function form($instance)
	{	
		$title 	   = ! empty( $instance['title'] ) ? $instance['title'] : "";
		$_res_display_widget   = ! empty( $instance['_res_display_widget'] ) ? $instance['_res_display_widget'] : "";
		$_res_meal_type_widget = ! empty( $instance['_res_meal_type_widget'] ) ? $instance['_res_meal_type_widget'] : [];
		$_res_dish_type_widget = ! empty( $instance['_res_dish_type_widget'] ) ? $instance['_res_dish_type_widget'] : [];
		$_res_location_widget  = ! empty( $instance['_res_location_widget'] ) ? $instance['_res_location_widget'] : [];
		$_res_limit_widget 	   = ! empty( $instance['_res_limit_widget'] ) ? $instance['_res_limit_widget'] : "5";
		$_res_disable_modal_widget = ! empty( $instance['_res_disable_modal_widget'] ) ? $instance['_res_disable_modal_widget'] : "0";

		$mealTypeItems = get_terms('rl_res_meal_cat'); 
		$dishTypeItems = get_terms('rl_res_dish_cat'); 
		$resLocations = get_terms('rl_res_location_cat'); 

		include RESTAURANT_MENU_PLUGIN_DIR_PATH."include/templates/widgets/res_menu_widget.php";
		
	}



}

function rlResMenuWidget() {
    register_widget( 'ResMenuWidgetClass' );
}
add_action( 'widgets_init', 'rlResMenuWidget' );



