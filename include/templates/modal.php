<div id="restaurant_modal_<?php echo $postID; ?>" class="modalDialog">
  <div class="modal_item">
    <a title="Close" class="cls close">X</a>
    <div class="root_image">
      <?php echo get_the_post_thumbnail( $postID ); ?>
      <span class="centered"><?php  echo $post->post_title; ?></span>
      <?php if ( $price ): ?>
      <span class="centered_price"><?php echo $currency; ?><?php echo $price; ?></span>
      <?php endif; ?>
    </div>
    <div class="modalcontent">
      <span class="des_icon">
        <?php
        $categories = get_the_terms( $postID, 'rl_res_meal_cat' );
        if($categories) {
	        foreach ( $categories as $category ):
		        echo $category->name;
	        endforeach;
        }
        ?>
      </span>
      <h3 class="root_title"><?php the_title(); ?></h3>
      <?php echo  $post->post_content; ?>
    </div>
    <?php if ( $nutrition ) : ?>
    <div class="res_hr"></div>
    <span class="rl_menu_icon">
      <i class="fa fa-cutlery"></i>
    </span>
    <div class="rl_inner">
      <h4 class="rl_popup_option_title"><?php _e( 'Nutrition', 'restaurant_menu' ); ?></h4>
      <div class="rl_nutritions rl_text">
        <ul class="nutrition_info">
          <?php foreach ( $nutrition as $nutrition_label => $nutrition_value ): ?>
          <li>
            <span class="nutrition_label"><strong><?php echo $nutrition_label; ?></strong></span>:
            <span class="nutrition_value"><?php echo $nutrition_value; ?></span>
          </li>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>
    <?php endif; ?>
    <?php if ( $ingredients ): ?>
    <div class="res_hr"></div>
    <div class="ingredients">
      <span class="rl_menu_icon">
        <i class="fa fa-book"></i>
      </span>
      <div class="rl_inner">
        <h4 class="rl_popup_option_title"><?php _e( 'Ingredients', 'restaurant_menu' ); ?></h4>
        <div class="clear"></div>
        <div class="rl_text ffgeo">
          <?php echo $ingredients; ?>
        </div>
        <div class="clear"></div>
      </div>
    </div>
    <?php endif; ?>
  </div>
</div>