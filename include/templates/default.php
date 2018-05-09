<div class="meal_types_container">
    <div class="res_row">
        <div class="res-col-12">
			<?php foreach ( $items as $item ): ?>
                <div class="res-container" data-res_menu_id="<?php echo $item->ID; ?>">
                    <div class="res_row">
                        <div class="res-col-4">
                            <div class="image"> <?php echo get_the_post_thumbnail( $item ); ?></div>
                        </div>
                        <div class="res-col-8">
                            <div class="res-meal-content">
                                <span class="price"> <?php echo get_post_meta($item->ID, 'rl_price', true);  ?></span>
                                <h4 class="title"><?php echo $item->post_title; ?></h4>
                                <div class="content-child">
									<?php echo $item->post_content; ?>
                                    <a class="readMore"> Read More </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
			<?php endforeach; ?>
        </div>
    </div>
</div>