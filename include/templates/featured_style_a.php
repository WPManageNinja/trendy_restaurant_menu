<div class="feat_style_a_container">
    <div class="res_row">
        <div class="feat-style-a-col-12">
			<?php foreach ( $items as $index => $item ) : ?>
				<?php setup_postdata( $item ); ?>

				<?php if ( $disable_modal ) {
					$modalClass = '';
				} else {
					$modalClass = 'res_item_modal';
				}
				?>
				<?php if ( $index == 0 ) : ?>
                    <div class="res_row">
                        <div class="feat-style-a-item-col-12 res-container <?php echo $modalClass; ?>" data-res_menu_id="<?php echo $item->ID; ?>">
                            <div class="feat-style-a-contnet">
								<?php if ( $item->price ): ?>
                                    <span class="feat-style-a-price"> <?php echo $currency . $item->price; ?></span>
								<?php endif; ?>
                                <h3 class="feat-style-a-title"> <?php the_title(); ?></h3>
								<?php the_excerpt(); ?>
                            </div>
                        </div>
                    </div>
				<?php else : ?>
                    <div class="res_row res-container <?php echo $modalClass; ?>" data-res_menu_id="<?php echo $item->ID; ?>">
                        <div class="content">
                            <div class="feat-style-a-col-4">
                                <div class="image">
									<?php the_post_thumbnail( 'medium' ); ?>
                                </div>
                            </div>
                            <div class="feat-style-a-col-8">
								<?php if ( $item->price ): ?>
                                    <span class="price"><?php echo $currency . $item->price; ?></span>
								<?php endif; ?>
                                <h4 class="title"><?php the_title(); ?></h4>
								<?php the_excerpt(); ?>
                            </div>
                        </div>
                    </div>
				<?php
				endif;
				wp_reset_postdata();
			endforeach;
			?>
        </div>
    </div>
</div>













