<div class="centered_aligned_container"> 
  <div class="res_row">
   <div class="centered_aligned_col_9">
   
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
          ),
        ),

      ) );

if( $resMenus->have_posts() ) :
  
?>

  <div class="res_row">
    <div class="centered_Cat_col_12"> <?php echo $category->name; ?></div>
  </div> 

<?php 

while( $resMenus->have_posts() ) : $resMenus->the_post();
?>

    <div class="res_row res-container" data-res_menu_id="<?php echo get_the_ID(); ?>">
        <div class="centered_aligned_col_12" style="text-align: center;">
            <h3 class="center_title"><?php the_title(); ?></h3>
            <span class="cen_alig_price">
              <?php echo rwmb_meta('rlgroup_price_id');?> 
            </span>
            <div class="centered_aligned_content">
            <?php echo rwmb_meta( 'rlgroup_desc_id'); ?>
             <a class="readMore">Read More</a>
          </div>
       </div>
    </div>

<?php endwhile; endif; endforeach;   ?>      

   </div> 
 </div>
</div>







