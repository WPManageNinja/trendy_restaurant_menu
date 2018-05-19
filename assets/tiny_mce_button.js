( function() {
    jQuery('body').append(`
        <div style="display: none;width: 100%;position: absolute;right: 50%;top: 0%;text-align: right;z-index: 99999999999;" class="modal">
            <input type="text" id="shortcode_custom" />
            <button id="new_shortcode_button">hello There</button>
        </div>
    `);
    
    tinymce.PluginManager.add( 'res_ninja_shortcodes', function( editor, url ) {
        editor.addButton( 'shortCode', {
            text: 'Restaurant Menu ShortCode',
            icon: false,
            onclick: function() {
                jQuery('.modal').css('display', 'block');
                
                jQuery('#new_shortcode_button').on('click', () => {
                    let value = jQuery('#shortcode_custom').val();
                    editor.insertContent('['+value+']');
                });
                
                return;
                editor.windowManager.open( {
                    title: 'Select ShortCode',
                    body: [
                    {
                        type   : 'listbox',
                        name   : 'display',
                        label  : 'Display',
                        values : [
                            { text: 'Default', value: 'default' },
                            { text: 'Meal Type Menu', value: 'meal_type' },
                            { text: 'Dish Type Menu', value: 'dish_type' },
                            { text: 'Featured Style A', value: 'feat_style_a' },
                            { text: 'Featured Style B', value: 'feat_style_b' },
                            { text: 'Featured Style C', value: 'feat_style_c' }
                        ],
                        minWidth: 350
                    },
                    {
                        type: 'checkbox',
                        name: 'breakfast',
                        label: 'Breakfast',
                        classes: 'what'
                    },
                    {
                        type: 'checkbox',
                        name: 'dessert',
                        label: 'Dessert',
                        classes: 'what'
                    },
                    {
                        type: 'checkbox',
                        name: 'creeps',
                        label: 'Creeps',
                        classes: 'what'
                    },
                    {
                        type: 'checkbox',
                        name: 'cup-cakes',
                        label: 'Cup Cakes',
                        classes: 'what'
                    },
                    {
                        type: 'checkbox',
                        name: 'ice-cakes',
                        label: 'Ice Cream',
                        classes: 'what'
                    },
                    {
                        type: 'checkbox',
                        name: 'pancakes',
                        label: 'Pancakes',
                        classes: 'what'
                    },
                    {
                        type: 'checkbox',
                        name: 'sylhet',
                        label: 'Sylhet',
                        classes: 'what'
                    },
                    {
                        type: 'checkbox',
                        name: 'dhaka',
                        label: 'Dhaka',
                        classes: 'what'
                    }
                ],
                onsubmit: function( e ) {
                    // Insert content when the window form is submitted
                   // editor.setContent('');
                     console.log(e.data);
                    editor.insertContent( 
                        '[restaurant_menu display="' + e.data.display +'" meal_type="'+e.data.meal_type+'" dish_type="'+e.data.dish_type+'" location="'+e.data.location+'"]'
                    );
                }
            });
            }
        } );
    } );
} )();
