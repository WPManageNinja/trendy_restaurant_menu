<?php

class AllShortcode {

	public function addShortcode()
	{
		add_shortcode('rl_res_menu', array($this, 'res_menu_shortcode') ); // Meal Type Menu
		add_shortcode('rl_simple_food_menu', array($this, 'rl_group_simple_foodpress_menu') );// simple-foodpress-menu
		add_shortcode('rl_featured_style_a', array($this, 'rl_group_featured_style_a')); // Featured Style A Menu
		add_shortcode('rl_featured_style_b', array($this, 'rl_group_featured_style_b') );// Featured Style B Menu
		add_shortcode('rl_featured_style_c', array($this, 'rl_group_featured_style_c') );// Featured Style C Menu
		add_shortcode('rl_dish_type_menu', array($this, 'rl_group_dish_type_menu'));// Dish type menu
		add_shortcode('rl_centered_aligned_menu', array($this, 'rl_group_centered_aligned_menu'));// Centered Aligned Menu
		add_shortcode('rl_vertical_tabbed_menu', array($this, 'rl_group_vertical_tabbed_menu'));// Vertical tabbed menu
		add_shortcode('rl_categorized_menu', array($this, 'rl_group_categorized_menu'));// Categorized menu
		add_shortcode('rl_tabbed_style_menu', array($this, 'rl_group_tabbed_style_menu'));// Categorized menu
		add_shortcode('rl_boxed_style_menu', array($this, 'rl_group_boxed_style_menu'));// Boxed Style Menu
	}


	public function res_menu_shortcode()
	{
		ob_start();
		require 'restaurant_menu_view.php';
		return ob_get_clean();
	}


	public function rl_group_simple_foodpress_menu()
	{
		require 'restaurant_simple_food_menu.php';
	}

	public function rl_group_featured_style_a()
	{
		require 'restaurant_featured_style_a.php';
	}

	public function rl_group_featured_style_b()
	{
		require 'restaurant_featured_style_b.php';
	}


	public function rl_group_featured_style_c()
	{
		require 'restaurant_featured_style_c.php';
	}

	public function rl_group_dish_type_menu() 
	{
		require 'restaurant_dish_type_menu.php';
	}

	public function rl_group_centered_aligned_menu()
	{
		require 'restaurant_aligned_menu.php';
	}

	public function rl_group_vertical_tabbed_menu()
	{
		require 'restaurant_vertical_tabbed_menu.php';
	}

	public function rl_group_categorized_menu()
	{
		require 'restaurant_categorized_menu.php';
	}

	public function rl_group_tabbed_style_menu()
	{
		require 'restaurant_tabbed_style_menu.php';
	}

	public function rl_group_boxed_style_menu() 
	{
		require 'restaurant_boxed_style_menu.php';
	}

}

$all_shortcode = new AllShortcode(); 
$all_shortcode->addShortcode();









