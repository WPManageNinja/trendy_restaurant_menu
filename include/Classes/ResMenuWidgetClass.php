<?php

namespace RestaurantMenu\Classes;
use WP_Widget;

class ResMenuWidgetClass extends WP_Widget
{
	
	function __construct()
	{
		parent::__construct('rl_res_menu_widget', 'Restaurant Menu', array(
			'description' =>'Restaurant Menu, You can add your website'
		));
	}


	public function form($instance)
	{
 		include RESTAURANT_MENU_PLUGIN_DIR_PATH."include/templates/widgets/res_menu_widget.php";
		
	}


}

