<div class="meal_types_container">
    <div class="res_row">
		<?php foreach ( $items as $item ): ?>
            <div class="res-col-12">
                <div class="res-container" data-res_menu_id="<?php echo $item->ID; ?>">
                    <div class="res_row">
                        <div class="res-col-4">
                            <div class="image"> <?php the_post_thumbnail(); ?></div>
                        </div>
                        <div class="res-col-8">
                            <div class="res-meal-content">
                                <span class="price"> <?php echo rwmb_meta( 'rlgroup_price_id', $item->ID ); ?></span>
                                <h4 class="title"><?php echo $item->post_title; ?></h4>
                                <div class="content-child">
									<?php echo rwmb_meta( 'rlgroup_desc_id', $item->ID ); ?>
                                    <a class="readMore"> Read More </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
		<?php endforeach; ?>

    </div>
</div>