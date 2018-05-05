
<div class="feat_style_a_container"> 

    <div class="res_row">
       <div class="feat-style-a-col-12"> 

        <?php
         $resMenus = new WP_Query(array(
                'post_type' => 'rl_res_menu',
                'posts_per_page' => '4',

            ));
            $res_count = 0;
        ?>
            <?php if( $resMenus->have_posts() ) :
                while( $resMenus->have_posts() ) : $resMenus->the_post();
            ?>

        <?php if( $res_count == 0 ): ?>
            <div class="res_row">
              <div class="feat-style-a-item-col-12 res-container"  data-res_menu_id="<?php echo get_the_ID(); ?>">
                    <div class="feat-style-a-contnet">
                      <span class="feat-style-a-price"><?php echo rwmb_meta('rlgroup_price_id');?></span>
                      <h3 class="feat-style-a-title"> <?php the_title(); ?>  </h3>
                     <?php echo rwmb_meta('rlgroup_desc_id'); ?>
                    </div>
              </div>
            </div>
        <?php else: ?>


            <div class="res_row res-container" data-res_menu_id="<?php echo get_the_ID(); ?>">
                <div class="content">
                    <div class="feat-style-a-col-4">
                        <div class="image">
                             <?php the_post_thumbnail('medium_large'); ?>
                        </div>
                    </div>
                    <div class="feat-style-a-col-8">
                        <span class="price"> <?php echo rwmb_meta('rlgroup_price_id');?> </span>
                         <h4 class="title"><?php the_title(); ?></h4>
                          <?php echo rwmb_meta('rlgroup_desc_id'); ?>
                          <a class="readMore"> Read More </a>
                    </div>
                </div>
            </div>

        <?php 

            endif; 
            $res_count++ ; 
            endwhile; 
            endif; 
        ?>


        </div>
   </div>

</div>













