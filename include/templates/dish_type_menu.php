
<div class="dish_container"> 
  <div class="res_row"> 
    <div class="dish_type_col_9">    
     <?php foreach( $items as $item ) :  ?>
        <div class="res_row res-container" data-res_menu_id="<?php echo $item->ID; ?>">
            <div class="dish_type_col_4">
                <div class="image"> <?php echo get_the_post_thumbnail($item) ; ?></div>
            </div>
            <div class="dish_type_col_8">
                <div class="dish_type_content">
                     <span class="dish_type_price"> <?php echo $currency.$item->price;  ?></span>
                      <h4 class="dish_type_title"><?php echo $item->post_title ;?></h4>
                    <div class="dish_type_child">
                        <?php echo $item->post_content; ?>
                        <a class="readMore"> Read More </a>
                    </div>
                </div>
            </div>
        </div>
      <?php endforeach; ?> 
    </div>
  </div>
</div>  

