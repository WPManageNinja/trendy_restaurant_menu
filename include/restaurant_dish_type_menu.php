<div class="dish_container"> 

<div class="res_row"> 
    <div class="dish_type_col_9">    
         <?php 
                $categories = get_categories( array('taxonomy' => 'rl_res_dish_cat') );

                $category = array(); 
                foreach ($categories as $category) :
                    $cat = $category->slug;
                
                    $resMenus = new WP_Query( array(
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'rl_res_dish_cat',
                                'field'    => 'slug',
                                'terms'    => $cat,
                                'include_children' => false,
                            ),
                        ),

                    ) );

        if( $resMenus->have_posts() ) :
     ?>

            <div class="res_row"> 
               <div class="dish_type_col_12"> 
                  <h2> <?php echo $category->name; ?> </h2>
              </div>
            </div>

    <?php 
        while( $resMenus->have_posts() ) : $resMenus->the_post();

    ?>
        <div class="res_row res-container" data-res_menu_id="<?php echo get_the_ID(); ?>">
            <div class="dish_type_col_4">
                <div class="image"> <?php the_post_thumbnail(); ?></div>
            </div>
            <div class="dish_type_col_8">
                <div class="dish_type_content">
                     <span class="dish_type_price"> <?php echo rwmb_meta('rlgroup_price_id');?></span>
                      <h4 class="dish_type_title"><?php the_title();?></h4>
                    <div class="dish_type_child">
                        <?php echo rwmb_meta( 'rlgroup_desc_id'); ?>
                        <a class="readMore"> Read More </a>
                    </div>
                </div>
            </div>
        </div>
     
     <?php endwhile; endif; endforeach;   ?> 

    </div>
  </div>
</div>  

