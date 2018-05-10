<div class="feat_style_a_container"> 
  <div class="res_row">
       <div class="feat-style-a-col-12"> 
        <?php $res_count = 0; ?>
       <?php foreach ($items as $item ) : ?>
       <?php if( $res_count == 0 ) : ?>
            <div class="res_row">
              <div class="feat-style-a-item-col-12 res-container"  data-res_menu_id="<?php echo $item->ID; ?>">
                    <div class="feat-style-a-contnet">
                      <?php if($item->price):?>
                        <span class="feat-style-a-price"> <?php echo $currency.$item->price; ?></span>
                      <?php endif;?>
                      <h3 class="feat-style-a-title"> <?php echo $item->post_title; ?></h3>
                     <?php echo $item->post_content; ?>
                    </div>
              </div>
            </div>
        <?php else : ?>
            <div class="res_row res-container" data-res_menu_id="<?php echo $item->ID; ?>">
                <div class="content">
                    <div class="feat-style-a-col-4">
                        <div class="image">
                             <?php echo get_the_post_thumbnail( $item ); ?> 
                        </div>
                    </div>
                    <div class="feat-style-a-col-8">
                        <?php if($item->price):?>
                           <span class="price"><?php echo $currency.$item->price; ?></span>
                        <?php endif; ?>
                         <h4 class="title"><?php echo $item->post_title; ?></h4>
                          <?php echo $item->post_content; ?>
                          <a class="readMore"> Read More </a>
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













