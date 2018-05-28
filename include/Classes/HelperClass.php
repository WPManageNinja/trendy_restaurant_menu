<?php namespace TrendyRestaurantMenu\Classes;

class HelperClass {
	
	public static function makeView($file, $data = array()) {
		$file = sanitize_file_name($file);
		$file = str_replace('.', DIRECTORY_SEPARATOR, $file);
		extract($data);
		$filePath = TRENDY_RESTAURANT_MENU_PLUGIN_DIR_PATH . 'include/templates/' . $file . '.php';
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
				'label' => __('Calories', 'tr_menu'),
				'type' => 'text'
			),
			'cholesterol' => array(
				'label' => __('Cholesterol', 'tr_menu'),
				'type' => 'text'
			),
			'fiber' => array(
				'label' => __('Fiber', 'tr_menu'),
				'type' => 'text'
			),
			'sodium' => array(
				'label' => __('Sodium','tr_menu'),
				'type' => 'text'
			),
			'carbohydrates' => array(
				'label' => __('Carbohydrates', 'tr_menu'),
				'type' => 'text'
			),
			'fat' => array(
				'label' => __('Fat', 'tr_menu'),
				'type' => 'text'
			),
			'protein' => array(
				'label' => __('Protein', 'tr_menu'),
				'type' => 'text'
			)
		);
		return apply_filters('ninja_restaurant_menu_nutrition_items', $items);
	}
	
	public static function getCurrency() {
		return get_option('_tr_menu_currency_sign', true );
	}
	
	public static function formatPrice($price) {
		return $price;
	}
	
	public static function getItemNutrition($postId) {
		$nutrition = get_post_meta($postId, '_ninja_restaurant_nutrition', true);
		if(!is_array($nutrition)) {
			return false;
		}
		
		$nutritionItems = self::getNutritionItems();
		$formattedNutrition = array();
		
		foreach ($nutrition as $nutritionIndex => $nutritionValue) {
			if(isset($nutritionItems[$nutritionIndex]) && $nutritionValue != '') {
				$formattedNutrition[$nutritionItems[$nutritionIndex]['label']] = $nutritionValue;
			}
		}
		return $formattedNutrition;
	}
	
	public static function getTermsFormatted($args = array()) {
		$terms = get_terms( $args );
		$formatted = array();
		if(is_wp_error($terms)) {
			return $formatted;
		}
		foreach ($terms as $term) {
			$formatted[$term->slug] = $term->name;
		}
		return $formatted;
	}
	
	public static function getDisplayTypes() {
		return array(
			'default'        => array(
				'label' => 'Default'
			),
			'center_aligned' => array(
				'label' => 'Center Aligned'
			),
			'simple'         => array(
				'label' => 'Simple Food Menu'
			),
			'grid'           => array(
				'label' => 'Grid Styled Menu'
			)
		);
	}
}