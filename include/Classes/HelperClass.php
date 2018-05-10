<?php 

namespace RestaurantMenu\Classes;

class HelperClass {
	
	public static function makeView($file, $data = array()) {
		$file = sanitize_file_name($file);
		$file = str_replace('.', DIRECTORY_SEPARATOR, $file);
		extract($data);
		$filePath = RESTAURANT_MENU_PLUGIN_DIR_PATH . 'include/templates/' . $file . '.php';
		if(!file_exists($filePath))  {
			 return '';
		}
		ob_start();
		include $filePath;
		return ob_get_clean();
	}
	
	public static function renderView($file, $data) {
		echo self::makeView($file, $data);
	}
	
	public static function getNutritionItems() {
		$items = array(
			'calories' => array(
				'label' => 'Calories',
				'type' => 'text'
			),
			'cholesterol' => array(
				'label' => 'Cholesterol',
				'type' => 'text'
			),
			'fiber' => array(
				'label' => 'Fiber',
				'type' => 'text'
			),
			'sodium' => array(
				'label' => 'Sodium',
				'type' => 'text'
			),
			'carbohydrates' => array(
				'label' => 'Carbohydrates',
				'type' => 'text'
			),
			'fat' => array(
				'label' => 'Fat',
				'type' => 'text'
			),
			'protein' => array(
				'label' => 'Protein',
				'type' => 'text'
			)
		);
		
		return apply_filters('ninja_restaurant_menu_nutrition_items', $items);
	}
	
	
	public static function getCurrency() {
		return '$';
	}
	
	public static function formatPrice($price) {
		if(!$price) {
			return false;
		}
		return number_format($price);
	}
	
	public static function getItemNutrition($postId) {
		$nutrition = get_post_meta($postId, '_ninja_restaurant_nutrition', true);
		if(!is_array($nutrition)) {
			return false;
		}
		
		$nutritionItems = self::getNutritionItems();
		$formattedNutrition = array();
		
		foreach ($nutrition as $nutritionIndex => $nutritionValue) {
			if(isset($nutritionItems[$nutritionIndex])) {
				$formattedNutrition[$nutritionItems[$nutritionIndex]['label']] = $nutritionValue;
			}
		}
		
		return $formattedNutrition;
	}
}