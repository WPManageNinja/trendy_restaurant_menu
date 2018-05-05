<div class="feat_style_b_container">
    <div class="res_row">
         <div class="feat_style_b_col_8">
            <div class="res_row">
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
                        <div class="feat_style_b_col_12 res-container" data-res_menu_id="<?php echo get_the_ID(); ?>">
                            <div class="feat_big_image">
                                <?php the_post_thumbnail(); ?>
                            </div>
                            <div class="feat_style_b_info">
                                <span class="price">4.00</span>  
                                  <h3 class="title">Cheery Cherry</h3>
                                  <a> Read More </a> 
                            </div>
                        </div>

                    <?php else: ?>
                        <div class="feat_style_b_col_4 res-container" data-res_menu_id="<?php echo get_the_ID(); ?>">
                            <div class="feat_sm_image">
                                  <?php the_post_thumbnail();  ?>
                            </div>
                            <div class="more_infor">
                                <span class="price"><?php echo rwmb_meta('rlgroup_price_id');?></span>
                                <h4 class="title"><?php the_title(); ?></h4>
                                 <div class="menu_description">
                                    <?php echo rwmb_meta('rlgroup_desc_id'); ?>
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
</div>







    
        