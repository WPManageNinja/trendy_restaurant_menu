<div class="tr_widget_item"> 
	<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"> <?php esc_attr_e( 'Title:', 'restaurant_menu' ); ?> </label> 
	<input type="text" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" value="<?php echo $title ; ?>" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">
</div>

<div class="tr_widget_item">
<label for="<?php echo esc_attr( $this->get_field_id( '_res_display_widget' ) ); ?>"> <?php esc_attr_e( 'Display:', 'restaurant_menu' ); ?> </label>
	<select name="<?php echo esc_attr( $this->get_field_name( '_res_display_widget' ) ); ?>" class="widefat" id="<?php echo esc_attr( $this->get_field_id( '_res_display_widget' ) ); ?>">
		<?php foreach ($displayTypes as $display_key => $display): ?>
            <option value="<?php echo $display_key; ?>" <?php selected($_res_display_widget,$display_key); ?>> <?php echo $display['label']; ?> </option>
        <?php endforeach; ?>
	</select>
</div>

<div class="tr_widget_item">
	<h4> <?php esc_attr_e( 'Meal Types:', 'tr_menu' ); ?> </h4>
<p><small><?php esc_attr_e( 'Don\'t select any if you want to show all types', 'tr_menu' );?></small></p>
	<?php foreach ($mealTypes as $mealTypeKey => $mealTypeItem ) : ?>
		<label>
            <input class="checkbox" name="<?php echo $this->get_field_name("_res_meal_type_widget");?>[]" type="checkbox" value="<?php echo $mealTypeKey;?>" <?php checked(in_array($mealTypeKey, $_res_meal_type_widget)) ; ?> >
            <?php echo $mealTypeItem; ?> 
        </label>
	<?php endforeach; ?>
</div>

<div class="tr_widget_item">
    <h4> <?php esc_attr_e( 'Dish Types:', 'tr_menu' ); ?> </h4>
    <p><small><?php esc_attr_e( 'Don\'t select any if you want to show all types', 'tr_menu' );?></small></p>
	<?php foreach ($dishTypes as $dishTypeKey => $dishTypeItem ) : ?>
        <label>
            <input class="checkbox" name="<?php echo $this->get_field_name("_res_dish_type_widget");?>[]" type="checkbox" value="<?php echo $dishTypeKey;?>" <?php checked(in_array($dishTypeKey, $_res_dish_type_widget)) ; ?> >
			<?php echo $dishTypeItem; ?>
        </label>
	<?php endforeach; ?>
</div>

<div class="tr_widget_item">
    <h4> <?php esc_attr_e( 'Dish Types:', 'tr_menu' ); ?> </h4>
    <p><small><?php esc_attr_e( 'Don\'t select any if you want to show all locations', 'tr_menu' );?></small></p>
	<?php foreach ($locations as $locationKey => $locationItem ) : ?>
        <label>
            <input class="checkbox" name="<?php echo $this->get_field_name("_res_location_widget");?>[]" type="checkbox" value="<?php echo $locationKey;?>" <?php checked(in_array($locationKey, $_res_location_widget)) ; ?> >
			<?php echo $locationItem; ?>
        </label>
	<?php endforeach; ?>
</div>


<div class="tr_widget_item">
	<label>
        <?php esc_attr_e( 'Number of posts to show:', 'restaurant_menu' ); ?> 
    </label> 
	<input type="number" name="<?php echo esc_attr( $this->get_field_name( '_res_limit_widget' ) ); ?>" class="tiny-text" step="1" min="1" size="3" value="<?php echo esc_attr( $_res_limit_widget ); ?>">
</div>

<div class="tr_widget_item">
	<label>
        <input type="checkbox" name="<?php echo esc_attr( $this->get_field_name( '_res_disable_modal_widget' ) ); ?>"  value="1" <?php checked( $_res_disable_modal_widget, 1 ); ?> id="<?php echo esc_attr( $this->get_field_id( '_res_disable_modal_widget' ) ); ?>">
        <?php esc_attr_e( 'Disable Modal', 'tr_menu' ); ?>
    </label>
</div>

<style type="text/css">
    .tr_widget_item {
        margin-bottom: 10px;
    }

    .tr_widget_item label {
        margin-bottom: 7px;
        display: block;
    }

    .tr_widget_item h4 {
        margin: 10px 0px 0px;
    }

    .tr_widget_item p {
        margin: 5px 0px !important;
    }
</style> 