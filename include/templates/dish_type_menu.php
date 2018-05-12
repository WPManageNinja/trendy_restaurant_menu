<div class="dish_container">
    <div class="res_row">
        <div class="dish_type_col_9">
			<?php foreach ( $items as $item ) : ?>
				<?php setup_postdata( $item ); ?>
				<?php if ( $disable_modal ) {
					$modalClass = '';
				} else {
					$modalClass = 'res_item_modal';
				}
				?>
                <div class="res-container <?php echo $modalClass; ?>" data-res_menu_id="<?php echo $item->ID; ?>">
                    <div class="dish_type_col_4">
                        <div class="image"> <?php the_post_thumbnail( 'medium' ); ?></div>
                    </div>
                    <div class="dish_type_col_8">
                        <div class="dish_type_content">
                            <span class="dish_type_price"> <?php echo $currency . $item->price; ?></span>
                            <h4 class="dish_type_title"><?php the_title(); ?></h4>
                            <div class="dish_type_child">
								<?php the_excerpt(); ?>
                            </div>
                        </div>
                    </div>
                </div>
				<?php wp_reset_postdata(); ?>
			<?php endforeach; ?>
        </div>
    </div>
</div>  

