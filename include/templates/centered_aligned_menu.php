<div class="centered_aligned_container">
    <div class="res_row">
        <div class="centered_aligned_col_9">
			<?php foreach ( $items as $item ) : ?>
				<?php setup_postdata( $item ); ?>
				<?php if ( $disable_modal ) {
					$modalClass = '';
				} else {
					$modalClass = 'res_item_modal';
				}
				?>
                <div class="res-container <?php echo $modalClass; ?>" data-res_menu_id="<?php echo $item->ID; ?>">
                    <div class="centered_aligned_col_12" style="text-align: center;">
                        <h3 class="center_title"><?php the_title(); ?></h3>
						<?php if ( $item->price ): ?>
                            <span class="cen_alig_price">
                                <?php echo $currency . $item->price; ?> 
                            </span>
						<?php endif; ?>
                        <div class="centered_aligned_content">
							<?php the_excerpt(); ?>
                        </div>
                    </div>
                </div>
				<?php wp_reset_postdata(); ?>
			<?php endforeach; ?>
        </div>
    </div>
</div>