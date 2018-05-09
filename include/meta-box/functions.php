<?php

abstract class RL_meta_box {


 public static function Add_MetaBox()
 {
 	$screens = ['rl_res_menu'];
    foreach ($screens as $screen) {
        add_meta_box( 'rl_res_meta_id', 'Main Item Data', [self::class,'rl_main_data_html'],  $screen );
        add_meta_box( 'rl_res_nutritional_meta_id', 'Nutritional Info', [self::class,'rl_custom_nutritional_html'],  $screen );
        add_meta_box( 'rl_res_ingredients_meta_id', 'Ingredents', [self::class,'rl_custom_ingredients_html'],  $screen );
    }
  }


  	// MAIN ITEM DATA CUSTOM META BOX
    public static function rl_main_data_html($post)
 	{ 
   		$subHeader = get_post_meta($post->ID,'rl_sub_header',true);
   		$addText = get_post_meta($post->ID,'rl_add_text',true);
   		$price = get_post_meta($post->ID, 'rl_price', true);
   		$spicy = get_post_meta($post->ID, 'rl_spicy_level', true);
 	?>

	<div class="rl_root_meta_field">  
        <div class="rl_meta_label">
	       <label for="sub_header" >Sub Header </label>
        </div>
        <div class="rl_meta_field">
	       <input type="text" name="sub_header" class="regular-text" id="sub_header" value="<?php echo $subHeader; ?>">
        </div>
	</div>
	<div class="rl_root_meta_field">
        <div class="rl_meta_label">
    	   <label for="add_text">Additional Text </label>
        </div>
        <div class="rl_meta_field">
    	   <input type="text" name="add_text" class="regular-text" id="add_text" value="<?php echo $addText; ?>">
        </div>
    </div>
    <div class="rl_root_meta_field">
        <div class="rl_meta_label">
    	   <label for="price">Price</label>
        </div>
        <div class="rl_meta_field">
    	   <input type="text" name="price" id="price" value="<?php echo $price; ?>">
        </div>
    </div>
     <div class="rl_root_meta_field">
        <div class="rl_meta_label">
    	   <label for="rl_spicy_level">Spicy Level</label>
        </div>
        <div class="rl_meta_field">
        	<select name="rl_spicy_level" id="rl_spicy_level">
        		<option>Select spicy level</option>
        		<option value="1" <?php if($spicy == 1) echo "selected";?> >1</option>
        		<option value="2" <?php if($spicy == 2) echo "selected";?>>2</option>
        		<option value="3" <?php if($spicy == 3) echo "selected";?>>3</option>
        		<option value="4" <?php if($spicy == 4) echo "selected";?>>4</option>
        		<option value="5" <?php if($spicy == 5) echo "selected";?>>5</option>
        		<option value="6" <?php if($spicy == 6) echo "selected";?>>6</option>
        		<option value="7" <?php if($spicy == 7) echo "selected";?>>7</option>
        		<option value="8" <?php if($spicy == 8) echo "selected";?>>8</option>
        		<option value="9" <?php if($spicy == 9) echo "selected";?>>9</option>
        		<option value="10" <?php if($spicy == 10) echo "selected";?>>10</option>
        	</select>
        </div>
    </div>
 <?php
 }




 public static function MRK_Data_Save($post_id)
 {
  if (array_key_exists('sub_header', $_POST)) {
         update_post_meta(
            $post_id,
            'rl_sub_header',
            $_POST['sub_header']
         );
      }

      if (array_key_exists('add_text', $_POST)) {
         update_post_meta(
             $post_id,
             'rl_add_text',
             $_POST['add_text']
         );
      }

      if (array_key_exists('price', $_POST)) {
         update_post_meta(
             $post_id,
             'rl_price',
             $_POST['price']
         );
      }

      if (array_key_exists('rl_spicy_level', $_POST)) {
         update_post_meta(
             $post_id,
             'rl_spicy_level',
             $_POST['rl_spicy_level']
         );
      }


 }


 // Nutritional Custom Meta Box
 public static function rl_custom_nutritional_html($post) {
 	$calories = get_post_meta($post->ID, 'rl_calories', true);
 	$cholesterol = get_post_meta($post->ID, 'rl_cholesterol', true);
    $fiber = get_post_meta($post->ID, 'rl_fiber', true);
    $sodium = get_post_meta($post->ID, 'rl_sodium', true);
    $carbohydrates = get_post_meta($post->ID, 'rl_carbohydrates', true);
    $fat = get_post_meta($post->ID, 'rl_fat', true);
    $protein = get_post_meta($post->ID, 'rl_protein', true);
 	?>
 	<div class="rl_root_meta_field">
        <div  class="rl_meta_label">
 		    <label class="calories">Calories</label>
        </div>
        <div  class="rl_meta_field">
 		    <input type="text" name="calories" id="calories" value="<?php echo $calories; ?>">
        </div>
 	</div>
 	<div class="rl_root_meta_field">
        <div class="rl_meta_label">
 		    <label class="cholesterol">Cholesterol</label>
        </div>
        <div class="rl_meta_field">
 		    <input type="text" name="cholesterol" id="cholesterol" value="<?php echo $cholesterol;?>">
 	    </div>
    </div>
	<div class="rl_root_meta_field">
        <div class="rl_meta_label">
 		    <label class="fiber">Fiber</label>
        </div>
        <div class="rl_meta_field">
 		    <input type="text" name="fiber" id="fiber" value="<?php echo $fiber; ?>">
 	    </div>
    </div>
 	<div class="rl_root_meta_field">
        <div class="rl_meta_label">
 		    <label for="sodium">Sodium</label>
        </div>
        <div class="rl_meta_field">
            <input type="text" name="sodium" id="sodium" value="<?php echo $sodium; ?>">            
        </div>
 	</div>
 	<div class="rl_root_meta_field">
        <div class="rl_meta_label">
 		    <label for="carbohydrates">Carbohydrates</label>
        </div>
        <div class="rl_meta_field">
 		    <input type="text" name="carbohydrates" id="carbohydrates" value="<?php echo $carbohydrates; ?>">
 	    </div>
    </div>
 	<div class="rl_root_meta_field">
        <div class="rl_meta_label">
 		    <label for="fat">Fat</label>
        </div>
        <div class="rl_meta_field">
 		    <input type="text" name="fat" id="fat" value="<?php echo $fat; ?>">
 	    </div>
    </div>
 	<div class="rl_root_meta_field">
        <div class="rl_meta_label">
 		    <label for="protein">Protein</label>
        </div>
        <div class="rl_meta_field">
            <input type="text" name="protein" id="protein" value="<?php echo $protein; ?>">
        </div>
 	</div>
 <?php
 }

 public static function rl_nutritional_save($post_id)
 {
 	if (array_key_exists('calories', $_POST)) {
         update_post_meta(
            $post_id,
            'rl_calories',
            $_POST['calories']
         );
    }
    if (array_key_exists('cholesterol', $_POST)) {
         update_post_meta(
            $post_id,
            'rl_cholesterol',
            $_POST['cholesterol']
         );
    }
    if (array_key_exists('fiber', $_POST)) {
         update_post_meta(
            $post_id,
            'rl_fiber',
            $_POST['fiber']
         );
    }
    if (array_key_exists('sodium', $_POST)) {
         update_post_meta(
            $post_id,
            'rl_sodium',
            $_POST['sodium']
         );
    }
    if (array_key_exists('carbohydrates', $_POST)) {
         update_post_meta(
            $post_id,
            'rl_carbohydrates',
            $_POST['carbohydrates']
         );
    }
    if (array_key_exists('fat', $_POST)) {
         update_post_meta(
            $post_id,
            'rl_fat',
            $_POST['fat']
         );
    }
    if (array_key_exists('protein', $_POST)) {
         update_post_meta(
            $post_id,
            'rl_protein',
            $_POST['protein']
         );
    }
 }


 // Ingredients
 public static function rl_custom_ingredients_html($post) 
 {
    $ingredients = get_post_meta($post->ID, 'rl_ingredients', true);
    ?>
    <div class="rl_meta_label">
        <label for="ingredients">Ingredients</label>
    </div>
    <div class="rl_meta_field_ing">
        <?php
            wp_editor( htmlspecialchars_decode($ingredients), 'mettaabox_ing', $settings = array('textarea_name'=>'ingredients') );
        ?>

    </div>
    <?php
 }

 public static function rl_ingredients_save($post_id)
 {
    if (array_key_exists('ingredients', $_POST)) {
        $ing_data=htmlspecialchars($_POST['ingredients']);
         update_post_meta(
            $post_id,
            'rl_ingredients',
            $ing_data
         );
    }
}
}

add_action('add_meta_boxes',['RL_meta_box','Add_MetaBox']);
add_action('save_post', ['RL_meta_box','MRK_Data_Save']);
add_action('save_post', ['RL_meta_box','rl_nutritional_save']);
add_action('save_post', ['RL_meta_box','rl_ingredients_save']);