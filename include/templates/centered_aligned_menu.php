<div class="centered_aligned_container"> 
  <div class="res_row">
   <div class="centered_aligned_col_9">
   <?php foreach( $items as $item ) :?>
    <div class="res_row res-container" data-res_menu_id="<?php echo $item->ID; ?>">
        <div class="centered_aligned_col_12" style="text-align: center;">
            <h3 class="center_title"><?php echo $item->post_title; ?></h3>
            <?php if($item->price):?>
              <span class="cen_alig_price">
                <?php echo $currency.$item->price; ?> 
              </span>
            <?php endif;?>
            <div class="centered_aligned_content">
            <?php echo $item->post_content; ?>
             <a class="readMore">Read More</a>
          </div>
       </div>
    </div>
  <?php endforeach; ?>      
 </div> 
 </div>
</div>







