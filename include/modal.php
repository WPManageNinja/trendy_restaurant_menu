<div id="<?php echo $PostID; ?>" class="modalDialog">
    <div class="modal_item">
        <a title="Close" class="cls close">X</a>
        <div class="root_image">
			<?php the_post_thumbnail(); ?>
            <span class="centered"><?php the_title(); ?></span>
			<?php if ( rwmb_meta( 'rlgroup_price_id' ) ): ?>
                <span class="centered_price"><?php echo rwmb_meta( 'rlgroup_price_id' ); ?></span>
			<?php endif; ?>

        </div>

        <div class="modalcontent">
            <span class="des_icon">
              <?php
              $categories = get_the_terms( $PostID, 'rl_res_meal_cat' );
              foreach ( $categories as $category ):
	              echo $category->name;
              endforeach;
              ?>
            </span>
            <h3 class="root_title"><?php the_title(); ?></h3>
			<?php echo rwmb_meta( 'rlgroup_desc_id' ); ?>
        </div>
		<?php
		$calories      = rwmb_meta( 'rlgroup_calories' );
		$fiber         = rwmb_meta( 'rlgroup_fiber' );
		$carbohydrates = rwmb_meta( 'rlgroup_carbohydrates' );
		$protein       = rwmb_meta( 'rlgroup_protein' );
		$cholesterol   = rwmb_meta( 'rlgroup_cholesterol' );
		$sodium        = rwmb_meta( 'rlgroup_sodium' );
		$fat           = rwmb_meta( 'rlgroup_fat' );
		?>

		<?php if ( $calories || $fiber || $carbohydrates || $protein || $cholesterol || $sodium || $fat ) : ?>
            <div class="res_hr"></div>
            <span class="rl_menu_icon">
                  <i class="fa fa-cutlery"></i>
                </span>
            <div class="rl_inner">
                <h4 class="rl_popup_option_title">Nutrition</h4>
                <div class="rl_nutritions">
                    <p class="rl_text">
						<?php if ( $calories ): ?>  <b>calories</b> <?php echo $calories; ?><br> <?php endif; ?>
						<?php if ( $fiber ): ?>  <b>fiber</b> <?php echo $fiber; ?><br> <?php endif; ?>
						<?php if ( $carbohydrates ): ?> <b>carbohydrates</b> <?php echo $carbohydrates; ?>
                            <br> <?php endif; ?>
						<?php if ( $protein ): ?> <b>protein</b> <?php echo $protein; ?><br> <?php endif; ?>
                    </p>
                    <p class="rl_text">
						<?php if ( $cholesterol ): ?> <b>cholesterol</b> <?php echo $cholesterol; ?><br> <?php endif; ?>
						<?php if ( $sodium ): ?> <b>sodium</b> <?php echo $sodium; ?><br> <?php endif; ?>
						<?php if ( $fat ): ?>  <b>fat</b> <?php echo $fat; ?><br> <?php endif; ?>
                    </p>
                    <div class="clear"></div>
                </div>
            </div>
		<?php endif; ?>


		<?php if ( rwmb_meta( 'rlgroup_ingredients' ) ): ?>
            <div class="res_hr"></div>
            <div class="ingredients">
                  <span class="rl_menu_icon">
                      <i class="fa fa-book"></i>
                  </span>
                <div class="rl_inner">
                    <h4 class="rl_popup_option_title">Ingredients</h4>
                    <div class="clear"></div>
                    <div class="rl_text ffgeo">
						<?php echo rwmb_meta( 'rlgroup_ingredients' ); ?>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
		<?php endif; ?>
    </div>
</div>