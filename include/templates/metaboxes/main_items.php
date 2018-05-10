<input type="hidden" name="has_restaurant_meta_info" value="1"/>

<div class="ninja_restaurant_meta_box">
    <div class="rl_root_meta_field">
        <div class="rl_meta_label">
            <label for="_ninja_restaurant_sub_header">Sub Header </label>
        </div>
        <div class="rl_meta_field">
            <input type="text" name="_ninja_restaurant_sub_header" class="regular-text"
                   id="_ninja_restaurant_sub_header"
                   value="<?php echo @$_ninja_restaurant_sub_header; ?>">
        </div>
    </div>
    <div class="rl_root_meta_field">
        <div class="rl_meta_label">
            <label for="_ninja_restaurant_item_price">Price</label>
        </div>
        <div class="rl_meta_field">
            <input type="number" name="_ninja_restaurant_item_price" id="_ninja_restaurant_item_price"
                   value="<?php echo @$_ninja_restaurant_item_price; ?>">
        </div>
    </div>
    <div class="rl_root_meta_field">
        <div class="rl_meta_label">
            <label for="_ninja_restaurant_spicy_level">Spicy Level</label>
        </div>
        <div class="rl_meta_field">
            <select name="_ninja_restaurant_spicy_level" id="_ninja_restaurant_spicy_level">
                <option value="">Select spicy level</option>
				<?php $ranges = range( 0, 10 ); ?>
				<?php foreach ( $ranges as $range ): ?>
                    <option <?php if ( $range == $_ninja_restaurant_spicy_level ) { echo "selected"; } ?> value="<?php echo $range; ?>"><?php echo $range; ?></option>
				<?php endforeach; ?>
            </select>
        </div>
    </div>
</div>