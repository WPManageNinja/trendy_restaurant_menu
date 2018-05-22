( function() {
    jQuery('body').append(`
        <div id="myModal" class="modal">
          <!— Modal content —>
          <div class="modal-content">
            <span class="close">&times;</span>
            <p>Display</p>
            <select id="display">
                <option value="default">Default</option>
                <option value="simple_food_menu">Simple Food Menu</option>
                <option value="grid_items">Grid Items</option>
                <option value="center_aligned_menu">Center Aligned Menu</option>
                <option value="single_menu_content">Single Menu Content</option>
            </select>


            <div id="meal">
                <p>Meal Type:</p>
                <input type="radio" name="radioMeal" value="default" id="all_meal" class="items_class" checked> All
                <input type="radio" name="radioMeal" value="custom" id="custom_meal" class="items_class"> Custom
            </div><br />
            <div id="custom_meal_items" style="display: none;">
                <input type="checkbox" value="breakfast" name="meal_items[]" class="meal_items_class"> Breakfast
                <input type="checkbox" value="dessert" name="meal_items[]" class="meal_items_class"> Dessert
            </div>


            <div id="dish">
                <p>Dish Type:</p>
                <input type="radio" name="radioDish" value="default" class="items_class" checked> All
                <input type="radio" name="radioDish" value="custom" class="items_class"> Custom
            </div><br />
            <div id="custom_dish_items" style="display: none;">
                <input type="checkbox" value="creeps" name="dish_items[]" class="dish_items_class"> Creeps
                <input type="checkbox" value="cup-cakes" name="dish_items[]" class="dish_items_class"> Cup Cakes
                <input type="checkbox" value="ice-cream" name="dish_items[]" class="dish_items_class"> Ice Cream
                <input type="checkbox" value="pancakes" name="dish_items[]" class="dish_items_class"> Pancakes
            </div>

            <div id="location">
                <label for="location">Location</label><br />
                <input type="checkbox" value="dhaka" name="locations[]" class="location_class"> Dhaka
                <input type="checkbox" value="sylhet" name="locations[]" class="location_class"> Sylhet
                <input type="checkbox" value="rajshahi" name="locations[]" class="location_class"> Rajshahi
                <input type="checkbox" value="khulna" name="locations[]" class="location_class"> Khulna
            </div><br />

            <div>
                <button id="save" class="save">Save</button>
            </div>
          </div>

        </div>
    `);

    jQuery('.modal-content').on('click', '.close', function() {
        jQuery('#myModal').css('display', 'none');
    });

    jQuery('#meal input').on('change', function() {
       jQuery('input[name=radioMeal]:checked', '#meal').val(); 
    });

    jQuery('.modal-content').on('click', '#meal', function () {
        var value = jQuery("[name=radioMeal]:checked").val();
        if(value === 'custom') {
           jQuery('#custom_meal_items').css('display', 'block');
        } else if(value === 'default') {
           jQuery('#custom_meal_items').css('display', 'none');
        }
    });

    jQuery('#dish input').on('change', function() {
       jQuery('input[name=radioDish]:checked', '#dish').val(); 
    });

    jQuery('.modal-content').on('click', '#dish', function () {
        var value = jQuery("[name=radioDish]:checked").val();
        if(value === 'custom') {
           jQuery('#custom_dish_items').css('display', 'block');
        } else if(value === 'default') {
           jQuery('#custom_dish_items').css('display', 'none');
        }
    });

    var myModal = jQuery('.modal-content');

    var modalContent = myModal.html();

    tinymce.PluginManager.add( 'res_ninja_shortcodes', function( editor, url ) {
        editor.addButton( 'shortCode', {
            text: 'Restaurant Menu ShortCode',
            icon: false,
            onclick: function() {
                jQuery('.modal').css('display', 'block');

                myModal.html(modalContent);
                
                jQuery(document).on('click', '.save', function(e) {

                    e.preventDefault();
                    var display = jQuery('#display').val();
                    var selectedMeal = myModal.find('input:radio[name="radioMeal"]:checked').val();

                    var location = myModal.find('input:checkbox:checked.location_class').map(function() {
                        return this.value;
                    }).get().join(", ");


                    if(selectedMeal != 'default') {
                        var selectedMeal = myModal.find('input:checkbox:checked.meal_items_class').map(function() {
                            return this.value;
                        }).get().join(", ");
                    }

                    if(selectedMeal.length === 0) {
                        selectedMeal = 'default';
                    }

                    var selectedDish = myModal.find('input:radio[name="radioDish"]:checked').val();
                    if(selectedDish != 'default') {
                        var selectedDish = myModal.find('input:checkbox:checked.dish_items_class').map(function() {
                            return this.value;
                        }).get().join(", ");
                    }

                    if(selectedDish.length === 0) {
                        selectedDish = 'default';
                    }

                    if(display === 'default' && selectedMeal === 'default' && selectedDish === 'default' && location === '') {
                        editor.insertContent('[restaurant_menu]');
                    }

                    else if(display != 'default' && selectedMeal === 'default' && selectedDish === 'default' && location === '') {
                        editor.insertContent('[restaurant_menu display="' + display + '"]');
                    }
                    
                    else if(display != 'default' && selectedMeal != 'default'  && selectedDish != 'default' && location != '') {
                        editor.insertContent('[restaurant_menu display="' + display + '" meal_type="' +selectedMeal+'" dish_type="' +selectedDish+'" location="' +location+'"]');
                    }
                    else if(display != 'default' && selectedMeal != 'default' && selectedDish != 'default') {
                        editor.insertContent('[restaurant_menu display="' + display + '" meal_type="' +selectedMeal+'" dish_type="' +selectedDish+'"]');
                    }
                    else if(display != 'default' && selectedMeal != 'default') {
                        editor.insertContent('[restaurant_menu display="' + display + '" meal_type="' +selectedMeal+'"]');
                    }
                    else if(display != 'default' && selectedDish != 'default') {
                        editor.insertContent('[restaurant_menu display="' + display + '" dish_type="' +selectedDish+'"]');
                    }
                    else if(display === 'default' && selectedMeal != 'default'  && selectedDish != 'default') {
                        editor.insertContent('[restaurant_menu display="' + display + '" meal_type="' +selectedMeal+'" dish_type="' +selectedDish+'"]');
                    }
                    else if(display != 'default' && selectedMeal != 'default'  && selectedDish != 'default' && location != '') {
                        editor.insertContent('[restaurant_menu display="' + display + '" meal_type="' +selectedMeal+'" dish_type="' +selectedDish+'" location="' +location+'"]');
                    }
                    else if((display === 'default' || display != 'default') && location != '') {

                    editor.insertContent('[restaurant_menu display="' + display + '" location="' +location+'"]');
                    }
                    jQuery('.modal').css('display', 'none');
                });
            }
        } );
    } );
} )();