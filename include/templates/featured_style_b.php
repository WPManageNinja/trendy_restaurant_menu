<div class="feat_style_b_container">
    <div class="res_row">
        <div class="feat_style_b_col_8">
            <div class="res_row">
				<?php foreach ( $items as $index => $item ) : ?>
					<?php setup_postdata( $item ); ?>
					<?php if ( $disable_modal ) {
						$modalClass = '';
					} else {
						$modalClass = 'res_item_modal';
					}
					?>
					<?php if ( $index == 0 ) : ?>
                        <div class="feat_style_b_col_12 res-container <?php echo $modalClass; ?>" data-res_menu_id="<?php echo $item->ID; ?>">
                            <div class="feat_big_image">
								<?php the_post_thumbnail( 'large' ); ?>
                            </div>
                            <div class="feat_style_b_info">
								<?php if ( $item->price ): ?>
                                    <span class="price"><?php echo $currency . $item->price; ?></span>
								<?php endif; ?>
                                <h3 class="title"><?php echo get_the_title($item); ?></h3>
                            </div>
                        </div>
					<?php else: ?>
                        <div class="feat_style_b_col_4 res-container <?php echo $modalClass; ?>" data-res_menu_id="<?php echo $item->ID; ?>">
                            <div class="feat_sm_image">
								<?php the_post_thumbnail( 'medium' ); ?>
                            </div>
                            <div class="more_infor">
								<?php if ( $item->price ): ?>
                                    <span class="price"><?php echo $currency . $item->price; ?></span>
								<?php endif; ?>
                                <h4 class="title"><?php echo get_the_title($item); ?></h4>
                                <div class="menu_description">
									<?php the_excerpt(); ?>
                                </div>
                            </div>
                        </div>
					<?php endif; ?>
					<?php wp_reset_postdata(); ?>
				<?php endforeach; ?>
            </div>
        </div>
    </div>
</div>







    
