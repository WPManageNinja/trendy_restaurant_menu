(function () {
    const trendyRestaurantModalApp = {
        insertDom() {
            jQuery('body').append(`
                <div style="display: none;" class="trendy_shortcode_builder_pop_up" id="trendy_res_pop_up">
                    <div class="trendy_pop_shadow"></div>
                    <div id="trendy_res_moon" class="trendy_pop_container">
                        <div class="trendy_pop_header">
                            Insert Restaurant Menu Shortcode
                            <span class="trendy_pop_close">X</span>
                        </div>
                        <div class="trendy_pop_body">
                            <div class="tres_options_group">
                                <div class="tres_form_group">
                                    <label>Menu Display Type</label>
                                    <div class="tres_inline_form_items">
                                          <label m-for="displayType,displayKey in displayTypes">
                                               <input name="display_type" m-model="shortcode.displayType"  m-literal:value="displayKey" type="radio"> {{ displayType.label }}
                                          </label>
                                    </div>
                                </div>
                                <div m-if="shortcode.displayType == 'grid'" class="tres_form_group">
                                <label>
                                    Item Per Grid
                                    <input type="number" max="3" min="1" m-model="shortcode.per_grid" />
                                </label>
                            </div>
                            </div>
                            
                            <div class="tres_options_group">
                                <div class="tres_form_group">
                                    <label>Meal Types</label>
                                    <div class="tres_inline_form_items">
                                        <label><input type="radio" m-model="shortcode.all_meals" m-literal:value="true"> All</label>
                                        <label><input type="radio" m-model="shortcode.all_meals" m-literal:value="false"> Selected Meal Types</label>
                                    </div>
                                </div>
                                <div m-if="shortcode.all_meals == false" class="tres_form_group">
                                <label>Select meal Types that you want to show</label>
                                <div class="tres_inline_form_items">
                                      <label m-for="mealType,mealTypeKey in mealTypes">
                                           <input name="selected_meal_type" m-on:change="changeData(mealTypeKey, 'selectedMeals')" type="checkbox"> {{ mealType }}
                                      </label>
                                </div>
                            </div>
                            </div>
                            
                            <div class="tres_options_group">
                                <div class="tres_form_group">
                                    <label>Dish Types</label>
                                    <div class="tres_inline_form_items">
                                        <label><input type="radio" m-model="shortcode.all_dishes" m-literal:value="true"> All</label>
                                        <label><input type="radio" m-model="shortcode.all_dishes" m-literal:value="false"> Selected Dish Types</label>
                                    </div>
                                </div>
                                <div m-if="shortcode.all_dishes == false" class="tres_form_group">
                                <label>Select Dish Types that you want to show</label>
                                <div class="tres_inline_form_items">
                                      <label m-for="dishType,dishTypeKey in dishTypes">
                                           <input name="selected_meal_type" m-on:change="changeData(dishTypeKey, 'selectedDishes')" type="checkbox"> {{ dishType }}
                                      </label>
                                </div>
                            </div>
                            </div>
                            <div class="tres_options_group">
                                 <div class="tres_form_group">
                                    <label>Locations</label>
                                    <div class="tres_inline_form_items">
                                        <label><input type="radio" m-model="shortcode.all_locations" m-literal:value="true"> All</label>
                                        <label><input type="radio" m-model="shortcode.all_locations" m-literal:value="false"> Selected Locations</label>
                                    </div>
                                </div>
                                 <div m-if="shortcode.all_locations == false" class="tres_form_group">
                                <label>Select Locations that you want to show</label>
                                <div class="tres_inline_form_items">
                                      <label m-for="location,locationKey in locations">
                                           <input name="selected_meal_type" m-on:change="changeData(locationKey, 'selectedLocations')" type="checkbox"> {{ location }}
                                      </label>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="trendy_pop_footer">
                            <button  m-on:click="insertSortCode" id="trendy_insert_shortcode">Insert Shortcode</button>
                        </div>
                    </div>
                </div>
            `);
        },
        showModal(editor) {
            window.currentTrendyEditor = editor;
            jQuery('#trendy_res_pop_up').show();
        },
        closeModal() {
            jQuery('#trendy_res_pop_up').hide();
        },
        initShortCodeBuilder() {
            let mainApp = this;
            window.moonApp = new Moon({
                el: '#trendy_res_moon',
                data: {
                    displayTypes: window.trendyRestaurantMceVars.displayTypes,
                    mealTypes: window.trendyRestaurantMceVars.mealTypes,
                    dishTypes: window.trendyRestaurantMceVars.dishTypes,
                    locations: window.trendyRestaurantMceVars.locations,
                    shortcode: {
                        displayType: 'default',
                        per_grid: 3,
                        all_meals: true,
                        selectedMeals: [],
                        all_dishes: true,
                        selectedDishes: [],
                        all_locations: true,
                        selectedLocations: []
                    }
                },
                computed: {
                },
                methods: {
                    changeData(key, type) {
                        let prevalues = this.get('shortcode')[type];
                        if (prevalues.indexOf(key) == -1) {
                            prevalues.push(key);
                        } else {
                            prevalues.splice(prevalues.indexOf(key), 1);
                        }
                    },
                    insertSortCode() {
                        let shortcode = this.get('shortcode');
                        let shortCodeParts = [
                            'tr_menu',
                            "display='"+shortcode.displayType+"'"
                        ];
                        
                        if(shortcode.displayType == 'grid') {
                            shortCodeParts.push('per_grid='+shortcode.per_grid);
                        }
                        
                        if(!shortcode.all_meals && shortcode.selectedMeals.length) {
                            shortCodeParts.push( "meal_type='"+ shortcode.selectedMeals.toLocaleString()+"'");
                        }
                        if(!shortcode.all_dishes && shortcode.selectedDishes.length) {
                            shortCodeParts.push( "dish_type='"+ shortcode.selectedDishes.toLocaleString()+"'");
                        }
                        if(!shortcode.locations && shortcode.selectedLocations.length) {
                            shortCodeParts.push( "location='"+ shortcode.selectedLocations.toLocaleString()+"'");
                        }
                       
                        let shortcodeString = '['+shortCodeParts.join(' ')+']';
                        currentTrendyEditor.insertContent(shortcodeString);
                        mainApp.closeModal();
                    }
                }
            })
        },
        initTinyMce() {
            let mainApp = this;
            tinymce.PluginManager.add('trendy_restaurant_mce_class', function (editor, url) {
                // Add Button to Visual Editor Toolbar
                editor.addButton('trendy_restaurant_mce_class', {
                    title: 'Insert Trendy Restaurant Shortcode',
                    cmd: 'trendy_restaurant_mce_command',
                });
                editor.addCommand('trendy_restaurant_mce_command', function () {
                    mainApp.showModal(editor);
                });
                jQuery('.trendy_pop_close').on('click', function () {
                    mainApp.closeModal();
                });
            });
        },
        init() {
            this.insertDom();
            this.initTinyMce();
            this.initShortCodeBuilder();
        }
    };
    trendyRestaurantModalApp.init();
})();