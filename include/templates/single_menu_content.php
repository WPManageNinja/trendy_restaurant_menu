<div class="tr_single_item_content">
	<?php if ( $nutrition ) : ?>
        <div class="tr_inner_content tr_nutrition">
            <h4 class="tr_inner_title">
				<?php _e( 'Nutrition', 'tr_menu' ); ?>
            </h4>
            <div class="tr_nutrition_lists">
                <ul class="nutrition_info">
					<?php foreach ( $nutrition as $nutrition_label => $nutrition_value ): ?>
                        <li>
                            <span class="nutrition_label"><strong><?php echo $nutrition_label; ?></strong></span>:
                            <span class="nutrition_value"><?php echo $nutrition_value; ?></span>
                        </li>
					<?php endforeach; ?>
                </ul>
            </div>
        </div>
	<?php endif; ?>
	<?php if ( $ingredients ): ?>
        <div class="tr_inner_content tr_nutrition">
            <h4 class="tr_inner_title">
				<?php _e( 'Ingredients', 'tr_menu' ); ?>
            </h4>
            <div class="ingredients">
				<?php echo $ingredients; ?>
            </div>
        </div>
	<?php endif; ?>
	<?php
	$categories = wp_get_post_terms( $post_id, \TrendyRestaurantMenu\Classes\PostTypeClass::$mealTypeName );
	if ( count( $categories ) ):
		echo '<div class="tr_tax_items">';
		foreach ( $categories as $category ):
			echo '<span>' . $category->name . '</span>';
		endforeach;
		echo "</div>";
	endif;
	?>
</div>