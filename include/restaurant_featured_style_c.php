<div class="featured_style_c_container"> 
    <div class="res_row">
        <div class="featured_style_c_col_8">
 
<?php


    $resMenus = new WP_Query(array(
        'post_type' => 'rl_res_menu',
        'posts_per_page' => '4',

    ));
    $res_count = 0;
?>
    <?php if( $resMenus->have_posts() ) :
        while( $resMenus->have_posts() ) : $resMenus->the_post();
    ?>

<?php if( $res_count == 0 ): ?>

    <div class="res-container featured_style_c" data-res_menu_id="<?php echo get_the_ID(); ?>" >
        <div class="featured_image">
            <?php the_post_thumbnail('medium_large');  ?>
            <span class="price"><?php echo rwmb_meta('rlgroup_price_id');?></span>                
        </div>
        <div class="menu_info_box">
            <div class="menu_info">
                <h3><?php the_title(); ?></h3> 
                <div class="menu_description">
                    <?php echo rwmb_meta('rlgroup_desc_id'); ?>
                </div>
            </div>
        </div>
    </div>

<?php else: ?>



<div class="res-container featured_style_c_1" data-res_menu_id="<?php echo get_the_ID(); ?>" >
    <div class="featured_image">
        <?php the_post_thumbnail('medium_large');  ?>
    </div>
    <div class="menu_info">
        <span class="price"><?php echo rwmb_meta('rlgroup_price_id');?></span> 
        <h3 class="title"><?php the_title(); ?></h3>  
        <div class="menu_description">
           <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
           <a class="readMore"> Read More </a>
        </div>
    </div>
    <div class="clear"></div>
</div>


 <?php 

        endif; 
        $res_count++ ; 
        endwhile; 
        endif; 
?>


   </div> 
</div>
</div>