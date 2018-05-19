<p> 
	<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"> <?php esc_attr_e( 'Title:', 'restaurant_menu' ); ?> </label> 
	<input type="text" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" value="<?php echo $title ; ?>" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">
</p>

<p> 
	<label for="<?php echo esc_attr( $this->get_field_id( '_res_display_widget' ) ); ?>"> <?php esc_attr_e( 'Display:', 'restaurant_menu' ); ?> </label> 
	<select name="<?php echo esc_attr( $this->get_field_name( '_res_display_widget' ) ); ?>" class="widefat" id="<?php echo esc_attr( $this->get_field_id( '_res_display_widget' ) ); ?>"> 
		<option value="default" <?php selected($_res_display_widget,'default'); ?>> Default </option> 
		<option value="dish_type_menu" <?php selected($_res_display_widget,'dish_type_menu'); ?>> Dish Type Menu </option> 
		<option value="featured_style_a" <?php selected($_res_display_widget,'featured_style_a'); ?>> Featured Style A </option> 
		<option value="featured_style_b" <?php selected($_res_display_widget,'featured_style_b'); ?>> Featured Style B </option> 
		<option value="featured_style_c" <?php selected($_res_display_widget,'featured_style_c'); ?>> Featured Style C </option> 
		<option value="simple_food_menu" <?php selected($_res_display_widget,'simple_food_menu'); ?>> Simple Food Menu </option> 
		<option value="centered_aligned_menu" <?php selected($_res_display_widget,'centered_aligned_menu'); ?>> Centered Aligned Menu </option> 
	</select>

</p>

<p> 
	<span> <?php esc_attr_e( 'Meal Type:', 'restaurant_menu' ); ?> </span>
	<?php foreach ($mealTypeItems as $key => $mealTypeItem ) : ?>
		<label for="<?php echo $this->get_field_id("_res_meal_type_widget") . $key; ?>"> <?php echo $mealTypeItem->name; ?> </label> 
		<input class="checkbox" id="<?php echo $this->get_field_id("_res_meal_type_widget") . $key; ?>" name="<?php echo $this->get_field_name("_res_meal_type_widget");?>[]" type="checkbox" value="<?php echo $mealTypeItem->slug;  ?>" <?php checked(in_array($mealTypeItem->slug, $_res_meal_type_widget)) ; ?> >
	<?php endforeach; ?>
</p>

<p> 
	<span> <?php esc_attr_e( 'Dish Type:', 'restaurant_menu' ); ?> </span>
	<?php foreach ($dishTypeItems as $key => $dishTypeItem ) : ?>
		<label for="<?php echo $this->get_field_id("_res_dish_type_widget") . $key; ?>"> <?php echo $dishTypeItem->name; ?> </label> 
		<input class="checkbox" id="<?php echo $this->get_field_id("_res_dish_type_widget") . $key; ?>" name="<?php echo $this->get_field_name("_res_dish_type_widget");?>[]" type="checkbox" value="<?php echo $dishTypeItem->slug; ?>" <?php checked(in_array($dishTypeItem->slug, $_res_dish_type_widget)); ?> >
	<?php endforeach; ?>
</p>

<p> 
	<span> <?php esc_attr_e( 'Location:', 'restaurant_menu' ); ?> </span>
	<?php foreach ($resLocations as $key => $resLocation ) : ?>
		<label for="<?php echo $this->get_field_id("_res_location_widget") . $key; ?>"> <?php echo $resLocation->name; ?> </label> 
		<input class="checkbox" id="<?php echo $this->get_field_id("_res_location_widget") . $key; ?>" name="<?php echo $this->get_field_name("_res_location_widget");?>[]" type="checkbox" value="<?php echo $resLocation->slug; ?>" <?php checked(in_array($resLocation->slug, $_res_location_widget)); ?> >
	<?php endforeach; ?>
</p>


<p> 
	<label for="<?php echo esc_attr( $this->get_field_id( '_res_limit_widget' ) ); ?>"> <?php esc_attr_e( 'Number of posts to show:', 'restaurant_menu' ); ?> </label> 
	<input type="number" name="<?php echo esc_attr( $this->get_field_name( '_res_limit_widget' ) ); ?>" class="tiny-text" step="1" min="1" size="3" value="<?php echo esc_attr( $_res_limit_widget ); ?>" id="<?php echo esc_attr( $this->get_field_id( '_res_limit_widget' ) ); ?>">
</p>

<p> 
	<input type="checkbox" name="<?php echo esc_attr( $this->get_field_name( '_res_disable_modal_widget' ) ); ?>"  value="1" <?php checked( $_res_disable_modal_widget, 1 ); ?> id="<?php echo esc_attr( $this->get_field_id( '_res_disable_modal_widget' ) ); ?>">
	<label for="<?php echo esc_attr( $this->get_field_id( '_res_disable_modal_widget' ) ); ?>"> <?php esc_attr_e( 'Disable Modal', 'restaurant_menu' ); ?> </label> 
</p>


