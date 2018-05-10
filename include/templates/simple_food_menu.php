<div class="simple_food_container">
  <div class="res_row"> 
    <div class="simple_food_menu_col_12">    
      <?php foreach($items as $item): ?>
        <div class="res_row">
          <div class="simple_food_item_col_12 res-container" data-res_menu_id="<?php echo $item->ID; ?>">
              <?php if($item->price):?>
                 <span class="simple_food_price"><?php echo $currency.$item->price;?> </span>
              <?php endif; ?>
              <h3 class="simple_title"> <?php echo $item->post_title; ?></h3>
              <div class="simple_food_content">
                <?php echo $item->post_content; ?>
                <a class="readMore"> Read More </a>
              </div>
          </div>
        </div>
      <?php endforeach;?>
    </div>
  </div>
</div>