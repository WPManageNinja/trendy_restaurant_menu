<div class="categorized_menu_container">
<div class="res_row">
<div class="categorized_col_8">
<?php  
    $meal_cats = get_categories(array( 'taxonomy' => 'rl_res_meal_cat') ) ;
    $dish_cats = get_categories(array( 'taxonomy' => 'rl_res_dish_cat') ) ; 
    foreach ($meal_cats as $meal_cat) :    
?>
    <h1 data-attr-toggle="<?php echo $meal_cat->slug;?>"  id="toggle_btn" class="meal_name">
        <?php echo $meal_cat->name; ?> 
      <i class="fa fa-angle-down" id="arrow_icon_down_head"></i> 
    </h1>
<?php 

 foreach ($dish_cats as $dish_cat) :
    $args = array('post_type' => 'rl_res_menu',    
        'tax_query' => array(
        'relation' => 'AND',
            array(
                'taxonomy' => 'rl_res_meal_cat',
                'field' => 'slug',
                'terms' => $meal_cat->slug,
            ),
            array(
                'taxonomy' => 'rl_res_dish_cat',
                'field' => 'slug',
                'terms' => $dish_cat->slug                  
            ),
        ),
     ); 
    $categorized_menu = new WP_Query($args);
    if( $categorized_menu->have_posts() ) :   
?>
  <div style="display: none;" class="<?php echo $meal_cat->slug;?>">
     <h3 id="b_crepes" class="b_crepes" data-attr_cats="<?php echo $meal_cat->slug.$dish_cat->slug; ?>">
        <?php echo $dish_cat->name; ?>
        <i class="fa fa-angle-down" id="arrow_icon"></i> 
      </h3>
  
    <?php while( $categorized_menu->have_posts() ) :  $categorized_menu->the_post(); ?>
          <div class="<?php echo $meal_cat->slug.$dish_cat->slug; ?>" class="b_crepes" style="display: none;"> 
             <div class="res-container categorized-container" data-res_menu_id="<?php echo get_the_ID(); ?>">
                  <div class="content">
                      <div class="parent">
                          <span class="badge price_icon"> <?php echo rwmb_meta('rlgroup_price_id');?> </span>                        
                          <h3><?php the_title(); ?></h3>
                      </div>
                      <div class="content-child">
                       <?php echo rwmb_meta('rlgroup_desc_id');?>
                      <a class="readMore"> Read More </a>
                      </div>
                  </div>
              </div>
          </div>
    <?php endwhile;  ?>
  </div>

<?php endif; endforeach;  endforeach; ?>
 
</div>

</div>
</div>







