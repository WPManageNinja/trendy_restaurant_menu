<div class="simple_food_container">
    <div class="res_row">
        <div class="simple_food_menu_col_12">
			<?php foreach ( $items as $item ): ?>
				<?php setup_postdata( $item ); ?>
				<?php if ( $disable_modal ) {
					$modalClass = '';
				} else {
					$modalClass = 'res_item_modal';
				}
				?>
                <div class="res_row">
                    <div class="simple_food_item_col_12 res-container <?php echo $modalClass; ?>" data-res_menu_id="<?php echo $item->ID; ?>">
						<?php if ( $item->price ): ?>
                            <span class="simple_food_price"><?php echo $currency . $item->price; ?> </span>
						<?php endif; ?>
                        <h3 class="simple_title"> <?php the_title() ?></h3>
                        <div class="simple_food_content">
							<?php the_excerpt(); ?>
                        </div>
                    </div>
                </div>
				<?php wp_reset_postdata(); ?>
			<?php endforeach; ?>
        </div>
    </div>
</div>