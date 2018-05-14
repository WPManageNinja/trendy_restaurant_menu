<div class="ninja_res_menu_group ninja_res_menu_<?php echo $display; ?>">
    
    <?php 
        $mediaSize = 'medium';
        if($per_grid < 3) {
	        $mediaSize = 'large';
        }
    ?>
    
	<?php foreach ( $items as $index => $item ): ?>
		<?php setup_postdata( $item ); ?>
        <div class="res-item res_gid_<?php echo $per_grid; ?> res_item_id_<?php echo $item->ID; ?>  <?php echo $modalClass; ?>"
             data-res_menu_id="<?php echo $item->ID; ?>">
            <div class="res_featured_image">
                <a href="<?php get_the_permalink( $item ); ?>">
					<?php echo get_the_post_thumbnail( $item, $mediaSize ); ?>
                </a>
	            <?php if ( $item->price ): ?>
                    <span class="res_item_price"> <?php echo $currency; ?><?php echo $item->price; ?></span>
	            <?php endif; ?>
            </div>
            <div class="res-item-content">
                <h3 class="res_item_title">
					<?php echo get_the_title( $item ); ?>
                </h3>
                <div class="res_item_content">
					<?php the_excerpt(); ?>
                </div>
            </div>
        </div>
		<?php wp_reset_postdata(); ?>
	<?php endforeach; ?>
</div>