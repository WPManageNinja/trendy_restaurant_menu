/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 4);
/******/ })
/************************************************************************/
/******/ ({

/***/ 4:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(5);


/***/ }),

/***/ 5:
/***/ (function(module, exports) {

(function () {
    var trendyRestaurantModalApp = {
        insertDom: function insertDom() {
            jQuery('body').append('\n                <div style="display: none;" class="trendy_shortcode_builder_pop_up" id="trendy_res_pop_up">\n                    <div class="trendy_pop_shadow"></div>\n                    <div id="trendy_res_moon" class="trendy_pop_container">\n                        <div class="trendy_pop_header">\n                            Insert Restaurant Menu Shortcode\n                            <span class="trendy_pop_close">X</span>\n                        </div>\n                        <div class="trendy_pop_body">\n                            <div class="tres_options_group">\n                                <div class="tres_form_group">\n                                    <label>Menu Display Type</label>\n                                    <div class="tres_inline_form_items">\n                                          <label m-for="displayType,displayKey in displayTypes">\n                                               <input name="display_type" m-model="shortcode.displayType"  m-literal:value="displayKey" type="radio"> {{ displayType.label }}\n                                          </label>\n                                    </div>\n                                </div>\n                                <div m-if="shortcode.displayType == \'grid\'" class="tres_form_group">\n                                <label>\n                                    Item Per Grid\n                                    <input type="number" max="3" min="1" m-model="shortcode.per_grid" />\n                                </label>\n                            </div>\n                            </div>\n                            \n                            <div class="tres_options_group">\n                                <div class="tres_form_group">\n                                    <label>Meal Types</label>\n                                    <div class="tres_inline_form_items">\n                                        <label><input type="radio" m-model="shortcode.all_meals" m-literal:value="true"> All</label>\n                                        <label><input type="radio" m-model="shortcode.all_meals" m-literal:value="false"> Selected Meal Types</label>\n                                    </div>\n                                </div>\n                                <div m-if="shortcode.all_meals == false" class="tres_form_group">\n                                <label>Select meal Types that you want to show</label>\n                                <div class="tres_inline_form_items">\n                                      <label m-for="mealType,mealTypeKey in mealTypes">\n                                           <input name="selected_meal_type" m-on:change="changeData(mealTypeKey, \'selectedMeals\')" type="checkbox"> {{ mealType }}\n                                      </label>\n                                </div>\n                            </div>\n                            </div>\n                            \n                            <div class="tres_options_group">\n                                <div class="tres_form_group">\n                                    <label>Dish Types</label>\n                                    <div class="tres_inline_form_items">\n                                        <label><input type="radio" m-model="shortcode.all_dishes" m-literal:value="true"> All</label>\n                                        <label><input type="radio" m-model="shortcode.all_dishes" m-literal:value="false"> Selected Dish Types</label>\n                                    </div>\n                                </div>\n                                <div m-if="shortcode.all_dishes == false" class="tres_form_group">\n                                <label>Select Dish Types that you want to show</label>\n                                <div class="tres_inline_form_items">\n                                      <label m-for="dishType,dishTypeKey in dishTypes">\n                                           <input name="selected_meal_type" m-on:change="changeData(dishTypeKey, \'selectedDishes\')" type="checkbox"> {{ dishType }}\n                                      </label>\n                                </div>\n                            </div>\n                            </div>\n                            <div class="tres_options_group">\n                                 <div class="tres_form_group">\n                                    <label>Locations</label>\n                                    <div class="tres_inline_form_items">\n                                        <label><input type="radio" m-model="shortcode.all_locations" m-literal:value="true"> All</label>\n                                        <label><input type="radio" m-model="shortcode.all_locations" m-literal:value="false"> Selected Locations</label>\n                                    </div>\n                                </div>\n                                 <div m-if="shortcode.all_locations == false" class="tres_form_group">\n                                <label>Select Locations that you want to show</label>\n                                <div class="tres_inline_form_items">\n                                      <label m-for="location,locationKey in locations">\n                                           <input name="selected_meal_type" m-on:change="changeData(locationKey, \'selectedLocations\')" type="checkbox"> {{ location }}\n                                      </label>\n                                </div>\n                            </div>\n                            </div>\n                        </div>\n                        <div class="trendy_pop_footer">\n                            <button  m-on:click="insertSortCode" id="trendy_insert_shortcode">Insert Shortcode</button>\n                        </div>\n                    </div>\n                </div>\n            ');
        },
        showModal: function showModal(editor) {
            window.currentTrendyEditor = editor;
            jQuery('#trendy_res_pop_up').show();
        },
        closeModal: function closeModal() {
            jQuery('#trendy_res_pop_up').hide();
        },
        initShortCodeBuilder: function initShortCodeBuilder() {
            var mainApp = this;
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
                computed: {},
                methods: {
                    changeData: function changeData(key, type) {
                        var prevalues = this.get('shortcode')[type];
                        if (prevalues.indexOf(key) == -1) {
                            prevalues.push(key);
                        } else {
                            prevalues.splice(prevalues.indexOf(key), 1);
                        }
                    },
                    insertSortCode: function insertSortCode() {
                        var shortcode = this.get('shortcode');
                        var shortCodeParts = ['tr_menu', "display='" + shortcode.displayType + "'"];

                        if (shortcode.displayType == 'grid') {
                            shortCodeParts.push('per_grid=' + shortcode.per_grid);
                        }

                        if (!shortcode.all_meals && shortcode.selectedMeals.length) {
                            shortCodeParts.push("meal_type='" + shortcode.selectedMeals.toLocaleString() + "'");
                        }
                        if (!shortcode.all_dishes && shortcode.selectedDishes.length) {
                            shortCodeParts.push("dish_type='" + shortcode.selectedDishes.toLocaleString() + "'");
                        }
                        if (!shortcode.locations && shortcode.selectedLocations.length) {
                            shortCodeParts.push("location='" + shortcode.selectedLocations.toLocaleString() + "'");
                        }

                        var shortcodeString = '[' + shortCodeParts.join(' ') + ']';
                        currentTrendyEditor.insertContent(shortcodeString);
                        mainApp.closeModal();
                    }
                }
            });
        },
        initTinyMce: function initTinyMce() {
            var mainApp = this;
            tinymce.PluginManager.add('trendy_restaurant_mce_class', function (editor, url) {
                // Add Button to Visual Editor Toolbar
                editor.addButton('trendy_restaurant_mce_class', {
                    title: 'Insert Trendy Restaurant Shortcode',
                    cmd: 'trendy_restaurant_mce_command'
                });
                editor.addCommand('trendy_restaurant_mce_command', function () {
                    mainApp.showModal(editor);
                });
                jQuery('.trendy_pop_close').on('click', function () {
                    mainApp.closeModal();
                });
            });
        },
        init: function init() {
            this.insertDom();
            this.initTinyMce();
            this.initShortCodeBuilder();
        }
    };
    trendyRestaurantModalApp.init();
})();

/***/ })

/******/ });