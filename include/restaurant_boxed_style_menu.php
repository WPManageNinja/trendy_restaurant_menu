<div class="box_style_container">
 <div class="res_row"> 
  <div class="box_stye_col_8">
	<?php $meal_cats = get_terms('rl_res_meal_cat');?> 
	<div class="boxed-style-wrapper">
		<div class="main c_main f_main">
			<?php foreach ($meal_cats as $meal_cat): ?> 
				<?php 
					$Meal_Item_cats = array(
							'post_type' => 'rl_res_menu', 
			          		'posts_per_page' => 1,
							'tax_query' => array(
			           		array(
			                    'taxonomy' => 'rl_res_meal_cat',
			                    'field' => 'slug',
			                    'terms' => $meal_cat->slug,
			                ),
			            ),
			         ); 

			        $Meal_Items = new WP_Query($Meal_Item_cats);
					if( $Meal_Items->have_posts() ): 
				
				 while( $Meal_Items->have_posts()): $Meal_Items->the_post(); ?>
					<div class="f_img main res_cls" data-attr-boxed-class="<?php echo $meal_cat->slug; ?>">
						<?php the_post_thumbnail('', array( 'class' => 'boxedStyleImg' ) ); ?>
					    <div class="centered">
				                <h4><?php echo $meal_cat->name; ?></h4>
				                <p> <?php echo $meal_cat->description; ?> </p>
				        </div>
				    </div>
				<?php endwhile; ?>
			<?php endif; ?>
			<?php endforeach; ?>
		</div>


		<?php foreach ($meal_cats as $meal_cat): ?> 
			<?php
				$meal_args = array(
					'post_type' => 'rl_res_menu', 
		      		'posts_per_page' => 10,
					'tax_query' => array(
			       		array(
			                'taxonomy' => 'rl_res_meal_cat',
			                'field' => 'slug',
			                'terms' => $meal_cat->slug,
			            ),
		        ),
		     ); 

		    $meal_items_show = new WP_Query($meal_args);
			 if( $meal_items_show->have_posts() ): ?>
				<div class="main" id="<?php echo $meal_cat->slug; ?>" style="display: none;">
			        <div class="item-area">
			                <i class="fa fa-arrow-left c_main" data-attr-boxed-class="<?php echo $meal_cat->slug; ?>"></i>                        
			        </div>
			        <div class="item-area-title">
			           <p><?php echo $meal_cat->name; ?></p>
			        </div>
				    <?php while( $meal_items_show->have_posts() ) : $meal_items_show->the_post(); ?>  
						<div class="res-container boxed-container" data-res_menu_id="<?php echo get_the_ID(); ?>" >
				            <div class="image">
				                <?php the_post_thumbnail(); ?>                      
				            </div>
				            <div class="content">
				                <div class="parent">
				                    <span class="pull-right badge price_icon"><?php echo rwmb_meta('rlgroup_price_id');?> </span>                        
				                    <h3><?php the_title(); ?></h3>
				                </div>
				                <div class="content-child">
				                    <?php echo rwmb_meta('rlgroup_desc_id');?>
				                </div>
				            </div>
				        </div>
					<?php endwhile; ?> 
				</div>
			<?php endif; ?>
		<?php endforeach; ?>

	</div>




</div>
</div>
</div>