<div class="featured_style_c_container"> 
    <div class="res_row">
        <div class="featured_style_c_col_8">
 	<?php  $res_count = 0;?>
    <?php foreach($items as $item): ?>
		<?php if( $res_count == 0 ): ?>
			<div class="res-container featured_style_c" data-res_menu_id="<?php echo $item->ID; ?>" >
		        <div class="featured_image">
		            <?php echo get_the_post_thumbnail($item)  ?>
		            <span class="price"><?php echo get_post_meta($item->ID, 'rl_price', true);  ?></span>                
		        </div>
		        <div class="menu_info_box">
		            <div class="menu_info">
		                <h3><?php echo $item->post_title;?></h3> 
		                <div class="menu_description">
		                    <?php echo $item->post_content; ?>
		                </div>
		            </div>
		        </div>
		    </div>
		<?php else: ?>
			<div class="res-container featured_style_c_1" data-res_menu_id="<?php echo $item->ID;?>" >
			    <div class="featured_image">
			        <?php echo get_the_post_thumbnail($item); ?>
			    </div>
			    <div class="menu_info">
			        <span class="price"><?php echo get_post_meta($item->ID, 'rl_price', true);  ?></span> 
			        <h3 class="title"><?php echo $item->post_title; ?></h3>  
			        <div class="menu_description">
			           <?php echo $item->post_content; ?>
			           <a class="readMore"> Read More </a>
			        </div>
			    </div>
			    <div class="clear"></div>
			</div>
		<?php 
			endif; 
	        $res_count++ ; 
	        endforeach; 
		?>

   </div> 
</div>
</div>