<?php 

namespace RestaurantMenu\Classes;

class PostTypeClass {
	
	private $postTypeName = 'rl_res_menu';
	
	public function initRestaurantPostType()
	{
		$this->registerRestaurantMenuCPT();
		$this->registerMealType();
		$this->registerDishType();
		$this->registerLocationArea();
	}
	
	private function registerRestaurantMenuCPT() {
		$urlSlug = apply_filters('ninja_restaurant_menu_url_slug', 'restaurant_menu');
		$labels = array(
			'name'               => _x( 'Menu Items', 'post type general name', 'restaurant_menu' ),
			'singular_name'      => _x( 'Menu Item', 'post type singular name', 'restaurant_menu' ),
			'menu_name'          => _x( 'Restaurant Menu', 'admin menu', 'restaurant_menu' ),
			'name_admin_bar'     => _x( 'Restaurant Menu', 'add new on admin bar', 'restaurant_menu' ),
			'add_new'            => _x( 'Add New', 'menu', 'restaurant_menu' ),
			'add_new_item'       => __( 'Add New Menu', 'restaurant_menu' ),
			'new_item'           => __( 'New Menu', 'restaurant_menu' ),
			'edit_item'          => __( 'Edit Menu', 'restaurant_menu' ),
			'view_item'          => __( 'View Menu', 'restaurant_menu' ),
			'all_items'          => __( 'All Restaurant Menus', 'restaurant_menu' ),
			'search_items'       => __( 'Search Restaurant Menus', 'restaurant_menu' ),
			'parent_item_colon'  => __( 'Parent Restaurant Menu:', 'restaurant_menu' ),
			'not_found'          => __( 'No restaurant menus found.', 'restaurant_menu' ),
			'not_found_in_trash' => __( 'No restaurant menus found in Trash.', 'restaurant_menu' ),
		);
		$args = array(
			'labels'             => $labels,
			'description'        => __( 'Description.', 'restaurant_menu' ),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => $urlSlug ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => 21,
			'menu_icon'          => 'dashicons-welcome-widgets-menus',
			'supports'           => array( 'title', 'thumbnail', 'editor' )
		);
		register_post_type( $this->postTypeName, $args );
	}
	
	private function registerMealType() {
		$mealTypeSlug = apply_filters('ninja_restaurant_menu_meal_type_url_slug', 'restaurant_menu_meal_type');
		$MealTypeLabels = array(
			'name'              => _x( 'Meal Type', 'taxonomy general name', 'restaurant_menu' ),
			'singular_name'     => _x( 'Meal Type', 'taxonomy singular name', 'restaurant_menu' ),
			'search_items'      => __( 'Search Meal Type', 'restaurant_menu' ),
			'all_items'         => __( 'All Meal Type', 'restaurant_menu' ),
			'parent_item'       => __( 'Parent Meal Type', 'restaurant_menu' ),
			'parent_item_colon' => __( 'Parent Meal Type:', 'restaurant_menu' ),
			'edit_item'         => __( 'Edit Meal Type', 'restaurant_menu' ),
			'update_item'       => __( 'Update Meal Type', 'restaurant_menu' ),
			'add_new_item'      => __( 'Add New Meal Type', 'restaurant_menu' ),
			'new_item_name'     => __( 'New Meal Type Name', 'restaurant_menu' ),
			'menu_name'         => __( 'Meal Type', 'restaurant_menu' ),
		);
		$mealTypeArgs = array(
			'hierarchical'      => true,
			'labels'            => $MealTypeLabels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => $mealTypeSlug ),
		);
		register_taxonomy( 'rl_res_meal_cat', array( $this->postTypeName ), $mealTypeArgs );
	}
	
	private function registerDishType() {
		$dishTypeSlug = apply_filters('ninja_restaurant_menu_dish_type_url_slug', 'restaurant_menu_dish_type');
		$dishTypeLabels = array(
			'name'              => _x( 'Dish Type', 'taxonomy general name', 'restaurant_menu' ),
			'singular_name'     => _x( 'Dish Type', 'taxonomy singular name', 'restaurant_menu' ),
			'search_items'      => __( 'Search Dish Type', 'restaurant_menu' ),
			'all_items'         => __( 'All Dish Type', 'restaurant_menu' ),
			'parent_item'       => __( 'Parent Dish Type', 'restaurant_menu' ),
			'parent_item_colon' => __( 'Parent Dish Type:', 'restaurant_menu' ),
			'edit_item'         => __( 'Edit Dish Type', 'restaurant_menu' ),
			'update_item'       => __( 'Update Dish Type', 'restaurant_menu' ),
			'add_new_item'      => __( 'Add New Dish Type', 'restaurant_menu' ),
			'new_item_name'     => __( 'New Dish Type Name', 'restaurant_menu' ),
			'menu_name'         => __( 'Dish Type', 'restaurant_menu' ),
		);
		$dishTypeArgs = array(
			'hierarchical'      => true,
			'labels'            => $dishTypeLabels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => $dishTypeSlug ),
		);
		register_taxonomy( 'rl_res_dish_cat', array( $this->postTypeName ), $dishTypeArgs );
	}
	
	private function registerLocationArea() {
		$locationSlug = apply_filters('ninja_restaurant_menu_location_url_slug', 'restaurant_menu_dish_type');
		$locationLabels = array(
			'name'              => _x( 'Location', 'taxonomy general name', 'restaurant_menu' ),
			'singular_name'     => _x( 'Location', 'taxonomy singular name', 'restaurant_menu' ),
			'search_items'      => __( 'Search Location', 'restaurant_menu' ),
			'all_items'         => __( 'All Location', 'restaurant_menu' ),
			'parent_item'       => __( 'Parent Location', 'restaurant_menu' ),
			'parent_item_colon' => __( 'Parent Location:', 'restaurant_menu' ),
			'edit_item'         => __( 'Edit Location', 'restaurant_menu' ),
			'update_item'       => __( 'Update Location', 'restaurant_menu' ),
			'add_new_item'      => __( 'Add New Location', 'restaurant_menu' ),
			'new_item_name'     => __( 'New Location Name', 'restaurant_menu' ),
			'menu_name'         => __( 'Location', 'restaurant_menu' ),
		);
		$locationArgs = array(
			'hierarchical'      => true,
			'labels'            => $locationLabels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => $locationSlug ),
		);
		register_taxonomy( 'rl_res_location_cat', array( $this->postTypeName ), $locationArgs );
	}
}