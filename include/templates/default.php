<div class="meal_types_container">
    <div class="res_row">
        <div class="res-col-12">
			<?php foreach ( $items as $item ): ?>
				<?php setup_postdata( $item ); ?>
				<?php if ( $disable_modal ) {
					$modalClass = '';
				} else {
					$modalClass = 'res_item_modal';
				}
				?>
                <div class="res-container <?php echo $modalClass; ?>" data-res_menu_id="<?php echo $item->ID; ?>">
                    <div class="res_row">
                        <div class="res-col-4 res_featured_image">
                            <a href="<?php the_permalink(); ?>">
								<?php the_post_thumbnail( 'medium' ); ?>
                            </a>
                        </div>
                        <div class="res-col-8">
                            <div class="res-meal-content">
								<?php if ( $item->price ): ?>
                                    <span class="price"> <?php echo $currency; ?><?php echo $item->price; ?></span>
								<?php endif; ?>
                                <h4 class="title"><?php the_title(); ?></h4>
                                <div class="content-child">
									<?php the_excerpt(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
				<?php wp_reset_postdata(); ?>
			<?php endforeach; ?>
        </div>
    </div>
</div>

    