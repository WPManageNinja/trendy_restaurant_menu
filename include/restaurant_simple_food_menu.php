<div class="simple_food_container">
  <div class="res_row"> 
        <div class="simple_food_menu_col_12">    
        <?php 
           $resMenus = new WP_Query(array(
                'post_type' => 'rl_res_menu',
                'posts_per_page' => '4',
            ));
        ?>
        <?php if($resMenus->have_posts()) :
            while( $resMenus->have_posts() ) : $resMenus->the_post();
        ?>
        <div class="res_row">
          <div class="simple_food_item_col_12 res-container" data-res_menu_id="<?php echo get_the_ID(); ?>">
              <span class="simple_food_price"> <?php echo rwmb_meta('rlgroup_price_id');?>  </span>
                <h3 class="simple_title"> <?php the_title(); ?> </h3>
                <div class="simple_food_content">
                    <?php echo rwmb_meta( 'rlgroup_desc_id'); ?>
                    <a class="readMore"> Read More </a>
                </div>
          </div>
        </div>
       <?php endwhile; endif; ?>
      </div>
    </div>
</div>