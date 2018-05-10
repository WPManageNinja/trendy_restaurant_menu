<div class="ninja_restaurant_meta_box">
    <div class="rl_meta_label">
        <label for="_ninja_restaurant_ingredients"><?php _e( 'Ingredients', 'ninja_restaurant' ); ?></label>
    </div>
    <div class="rl_meta_field_ing">
		<?php
		wp_editor( $ingredients, '_ninja_restaurant_ingredients',
			$settings = array( 'textarea_name' => '_ninja_restaurant_ingredients' ) );
		?>
    </div>
</div>
