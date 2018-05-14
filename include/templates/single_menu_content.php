<div class="res_single_item_content">
	<?php if ( $nutrition ) : ?>
        <div class="res_hr"></div>
        <span class="rl_menu_icon">
          <i class="fa fa-cutlery"></i>
        </span>
        <div class="rl_inner">
            <h4><?php _e( 'Nutrition', 'restaurant_menu' ); ?></h4>
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
