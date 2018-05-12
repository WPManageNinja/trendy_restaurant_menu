<div class="featured_style_c_container">
    <div class="res_row">
        <div class="featured_style_c_col_8">
			<?php foreach ( $items as $index => $item ): ?>
				<?php setup_postdata( $item ); ?>
				<?php if ( $disable_modal ) {
					$modalClass = '';
				} else {
					$modalClass = 'res_item_modal';
				}
				?>
				<?php if ( $index == 0 ): ?>
                    <div class="res-container featured_style_c <?php echo $modalClass; ?>" data-res_menu_id="<?php echo $item->ID; ?>">
                        <div class="featured_image">
							<?php the_post_thumbnail( 'large' ); ?>
							<?php if ( $item->price ): ?>
                                <span class="price"><?php echo $currency . $item->price; ?></span>
							<?php endif; ?>
                        </div>
                        <div class="menu_info_box">
                            <div class="menu_info">
                                <h3><?php the_title(); ?></h3>
                                <div class="menu_description">
									<?php the_excerpt(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
				<?php else: ?>
                    <div class="res-container featured_style_c_1" data-res_menu_id="<?php echo $item->ID; ?>">
                        <div class="featured_image">
							<?php the_post_thumbnail( 'medium' ); ?>
                        </div>
                        <div class="menu_info">
							<?php if ( $item->price ): ?>
                                <span class="price"><?php echo $currency . $item->price; ?></span>
							<?php endif; ?>
                            <h3 class="title"><?php the_title() ?></h3>
                            <div class="menu_description">
								<?php the_excerpt(); ?>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>
				<?php endif; ?>
				<?php wp_reset_postdata(); ?>
			<?php endforeach; ?>
        </div>
    </div>
</div>