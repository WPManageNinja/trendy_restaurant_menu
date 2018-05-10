<div class="feat_style_b_container">
    <div class="res_row">
         <div class="feat_style_b_col_8">
            <div class="res_row">
                  <?php $res_count = 0; ?>
                 <?php foreach ($items as $item ) : ?>
                    <?php if( $res_count == 0 ) : ?>

                       <div class="feat_style_b_col_12 res-container" data-res_menu_id="<?php echo $item->ID; ?>">
                            <div class="feat_big_image">
                                <?php echo get_the_post_thumbnail($item); ?>
                            </div>
                            <div class="feat_style_b_info">
                                <?php if($item->price):?>
                                  <span class="price"><?php echo $currency.$item->price; ?></span>  
                                <?php endif; ?>
                                  <h3 class="title"><?php echo $item->post_title; ?></h3>
                                  <a> Read More </a> 
                            </div>
                        </div>

                    <?php else: ?>
                        <div class="feat_style_b_col_4 res-container" data-res_menu_id="<?php echo $item->ID; ?>">
                            <div class="feat_sm_image">
                                  <?php echo get_the_post_thumbnail($item);  ?>
                            </div>
                            <div class="more_infor">
                                <?php if($item->price):?>
                                  <span class="price"><?php echo $currency.$item->price; ?></span>
                                <?php endif;?>
                                <h4 class="title"><?php echo $item->post_title; ?></h4>
                                 <div class="menu_description">
                                    <?php echo $item->post_content; ?>
                                 </div>
                            </div>
                       </div> 
                    <?php 
                      endif; 
                      $res_count++ ; 
                      endforeach; 
                   ?>

              </div>
        </div>
    </div>
</div>







    
