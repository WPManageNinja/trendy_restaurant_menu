 <div class="tabbed_menu_container">
  <div class="res_row">

  <div class="tabbed_col_8">

      <?php $meal_cats = get_terms('rl_res_meal_cat');  ?>
      <?php $dish_cats = get_terms('rl_res_dish_cat');  ?>

    <ul id="tabs">
      <?php foreach ( $meal_cats as $meal_cat ) : ?>
           <li> <a data-attr-tab-id="<?php echo $meal_cat->slug; ?>"><?php echo $meal_cat->name; ?></a> </li>  
        <?php endforeach;  ?>
    </ul>

     <?php foreach ($meal_cats as $meal_cat) :  ?>
         <div class="tab_container" id="<?php echo $meal_cat->slug.'C'; ?>">
            <p> <?php echo $meal_cat->description; ?> </p><br/>
     <?php foreach ($dish_cats as $dish_cat) :  ?>

        <?php

          $args = array('post_type' => 'rl_res_menu',    
            'tax_query' => array(
            'relation' => 'AND',
                array(
                    'taxonomy' => 'rl_res_meal_cat',
                    'field' => 'slug',
                    'terms' => $meal_cat->slug 
                ),
                array(
                    'taxonomy' => 'rl_res_dish_cat',
                    'field' => 'slug',
                    'terms' => $dish_cat->slug                  
                ),
            ),
         ); 

        $tabbedStyle = new WP_Query($args);
    ?>
            <?php if( $tabbedStyle->have_posts() ) : ?>
              <h3 class="toggle" data-attr-toggle="<?php echo $meal_cat->slug.$dish_cat->slug;?>"><?php echo $dish_cat->name; ?> <i class="fa fa-angle-down"></i></h3>
                <div id="<?php echo $meal_cat->slug.$dish_cat->slug;?>" class="tab_item" style="display: none;">
                    <?php while( $tabbedStyle->have_posts() ): $tabbedStyle->the_post(); ?> 
                          <div class="res-container"> 
                              <div class="tab-style-container"> 
                                <div class="image">
                                    <?php the_post_thumbnail(); ?>
                                </div>
                                <div class="content">
                                    <div class="parent">
                                        <span class="badge price_icon">  <?php echo rwmb_meta('rlgroup_price_id');?>  </span>                        
                                        <h3 class="title"> <?php the_title();  ?> </h3>
                                    </div>
                                    <div class="content-child">
                                      <?php echo rwmb_meta( 'rlgroup_desc_id'); ?>
                                      <a class="readMore"> Read More </a>
                                    </div>
                                </div>
                              </div>
                          </div>
                     <?php endwhile; ?>
                  </div>
           <?php endif; ?>
        <?php endforeach; ?>
    </div>
    <?php endforeach; ?>

  </div>
</div>

</div>





