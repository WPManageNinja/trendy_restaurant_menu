<div class="ninja_restaurant_meta_box">
	<?php foreach ( $boxes as $box_key => $box ): ?>
        <div class="rl_root_meta_field">
            <div class="rl_meta_label">
                <label for="nutrition_<?php echo $box_key; ?>"><?php echo @$box['label']; ?></label>
            </div>
            <div class="rl_meta_field">
                <input type="text" name="_ninja_restaurant_nutrition[<?php echo $box_key; ?>]" id="nutrition_<?php echo $box_key; ?>"
                       value="<?php echo @$nutrition[ $box_key ]; ?>">
            </div>
        </div>
	<?php endforeach; ?>
</div>
    