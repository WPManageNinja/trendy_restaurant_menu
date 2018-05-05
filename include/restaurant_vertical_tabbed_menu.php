<div class="vertical_tabbed_container"> 
   <div class="res_row">  
		<div class="vertical_col-8">
			<div class="rl_Vertical_tabbed_menu">
			<div class="res_row"> 
				<div class="Vertical_nav_col-2"> 
					<div class="rl_vartical_tab">
						<ul> 
							<?php 
							    $categories = get_categories( array('taxonomy' => 'rl_res_dish_cat') );
								$category = array(); 
							    foreach ($categories as $category) :
							?>
								<li data-attr-scroll="<?php  echo $category->slug; ?>" class="scrollto" > <?php echo $category->name; ?> </li>
							<?php endforeach; ?>
						</ul>	
					</div>
				</div>


				<div class="vartical-col-10">
					<?php 
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
					?>

					<?php if( $resMenus->have_posts() ) : ?> 
						<div class='rl_vartical_tab_item' id="<?php  echo $category->slug; ?>"> 
						 	<h4 class='cat_title'> <?php echo $category->name ; ?> </h4>
								<?php while( $resMenus->have_posts() ) : $resMenus->the_post(); ?>
									<div class="res-container rl_vartical_item_info" data-res_menu_id="<?php echo get_the_ID(); ?>" >							
										<div class="rl_vartical_image">
											<?php the_post_thumbnail(); ?>
										</div>
													
										<div class="menu_info">
											<span class="price"><?php echo rwmb_meta('rlgroup_price_id');?></span>										
											<h3 class="title"><?php the_title() ; ?></h3>										
											<?php echo rwmb_meta( 'rlgroup_desc_id'); ?>
										</div>
										<div class="clear"></div>
									</div>
									<div class="clear"></div>
								<?php endwhile; ?> 
						</div>
					<?php  endif; endforeach; ?>

				</div>
			</div>
			</div> 
		<div class="clear"></div>

   		</div>
	</div>
</div>