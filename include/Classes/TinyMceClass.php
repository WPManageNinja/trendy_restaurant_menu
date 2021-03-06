<?php namespace TrendyRestaurantMenu\Classes;

class TinyMceClass {

	public static function registerButton() {
		// Check if the logged in WordPress User can edit Posts or Pages
		// If not, don't register our TinyMCE plugin
		if ( ! current_user_can( 'edit_posts' ) && ! current_user_can( 'edit_pages' ) ) {
			return;
		}
		// Check if the logged in WordPress User has the Visual Editor enabled
		// If not, don't register our TinyMCE plugin
		if ( get_user_option( 'rich_editing' ) !== 'true' ) {
			return;
		}
		
		add_filter( 'mce_external_plugins', array( self::class, 'addTinymcePlugin' ) );
		add_filter( 'mce_buttons', array( self::class, 'addToolbarButton' ) );
	}

	public static function addTinymcePlugin( $plugin_array ) {

		wp_enqueue_style( 'tr_menu_mce_css', TRENDY_RESTAURANT_MENU_PLUGIN_URL . 'assets/tinymce-button.css' );

		wp_enqueue_script( 'moonjs', TRENDY_RESTAURANT_MENU_PLUGIN_URL . 'assets/libs/moon.min.js', array( 'jquery' ),
			'0.11.0' );

		$plugin_array['trendy_restaurant_mce_class'] = TRENDY_RESTAURANT_MENU_PLUGIN_URL . 'assets/tinymce-button.js';
		add_action( 'admin_footer', array( self::class, 'localizeVars' ) );

		return $plugin_array;
	}

	public static function addToolbarButton( $buttons ) {
		array_push( $buttons, 'trendy_restaurant_mce_class' );
		return $buttons;
	}

	public static function localizeVars() {
		$displayTypes = HelperClass::getDisplayTypes();
		$mealTypes = HelperClass::getTermsFormatted(array(
			'taxonomy' => PostTypeClass::$mealTypeName,
			'hide_empty' => false,
		));

		$dishTypes = HelperClass::getTermsFormatted(array(
			'taxonomy' => PostTypeClass::$dishTypeName,
			'hide_empty' => false,
		));

		$locations = HelperClass::getTermsFormatted(array(
			'taxonomy' => PostTypeClass::$locationTypeName,
			'hide_empty' => false,
		));

		?>
        <script type="text/javascript">
            var trendyRestaurantMceVars = {
                displayTypes: <?php echo json_encode( $displayTypes ); ?>,
                mealTypes: <?php echo json_encode($mealTypes); ?>,
                dishTypes: <?php echo json_encode($dishTypes); ?>,
                locations: <?php echo json_encode($locations); ?>
            }
        </script>
		<?php
	}
}