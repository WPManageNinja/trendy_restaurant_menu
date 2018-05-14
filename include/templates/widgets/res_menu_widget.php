<p> 
	<label for="<?php echo $this->get_field_id('title');?>"> Title: </label> 
	<input type="text" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title'];?>" class="widefat" id="<?php echo $this->get_field_id('title');?>">
</p>
<p> 
	<label for="<?php echo $this->get_field_id('display');?>"> Display: </label> 
	<input type="text" name="<?php echo $this->get_field_name('display'); ?>" value="<?php echo $instance['display'];?>" class="widefat" id="<?php echo $this->get_field_id('display');?>">
</p>

<p> 
	<label for="<?php echo $this->get_field_id('meal_type');?>"> Meal Type: </label> 
	<input type="text" name="<?php echo $this->get_field_name('meal_type'); ?>" value="<?php echo $instance['meal_type'];?>" class="widefat" id="<?php echo $this->get_field_id('meal_type');?>">
</p>

<p> 
	<label for="<?php echo $this->get_field_id('dish_type');?>"> Dish Type: </label> 
	<input type="text" name="<?php echo $this->get_field_name('dish_type'); ?>" value="<?php echo $instance['dish_type'];?>" class="widefat" id="<?php echo $this->get_field_id('dish_type');?>">
</p>

<p> 
	<label for="<?php echo $this->get_field_id('location');?>"> Location: </label> 
	<input type="text" name="<?php echo $this->get_field_name('location'); ?>" value="<?php echo $instance['location'];?>" class="widefat" id="<?php echo $this->get_field_id('location');?>">
</p>

<p> 
	<label for="<?php echo $this->get_field_id('limit');?>"> Number of Posts Show: </label> 
	<input type="Number" name="<?php echo $this->get_field_name('limit');?>"  value="<?php echo $instance['limit'];?>" class="tiny-text" step="1" min="1" value="5" size="3" id="<?php echo $this->get_field_id('limit');?>">
</p>

<p> 
	<input type="checkbox" name="<?php echo $this->get_field_name('disable_modal'); ?>"  class="widefat" id="<?php echo $this->get_field_id('disable_modal');?>" value="1" <?php checked( $instance['disable_modal'], 1 ); ?> >
	<label for="<?php echo $this->get_field_id('disable_modal');?>"> Disable Modal </label>
</p>

<p> 
	<input type="checkbox" name="<?php echo $this->get_field_name('image'); ?>"  class="widefat" id="<?php echo $this->get_field_id('image');?>" value="1" <?php checked( $instance['image'], 1 ); ?> >
	<label for="<?php echo $this->get_field_id('image');?>"> Posts Image Show </label>
</p>