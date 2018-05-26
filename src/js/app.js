const restaurantMenuApp = {
    addLoader() {
        let res = {
            loader: jQuery('<div/>', {
                class: 'tr_loader'
            })
        };
        jQuery('body').append(res.loader);
    },
    removeLoader() {
        jQuery('body').find(".tr_loader").remove();
    },
    fetchItem(itemId) {
        this.addLoader();

        jQuery.get(tr_menu_vars.get_item_url, {
            item_id: itemId
        })
        .then(function (response) {
            var resModalHolder = jQuery('<div/>', {
                class: 'res-modal-holder',
                html:response
            });
            jQuery('body')
                .hide()
                .append(resModalHolder)
                .fadeIn(100)
        })
        .fail(function (error) {
            alert('Something is wrong when loading the content. Please try again');
        })
        .always(() => {
            this.removeLoader();
        });
    },
    removeModal() {
        jQuery('.res-modal-holder')
            .fadeOut('200', function() {
                jQuery(this).remove();
                jQuery('html,body').removeClass('tr_has_modal');
                jQuery(document).off('keyup.tr_esc_key');
            });
    },
    initModalClick() {
        var that = this;
        jQuery('.res_item_modal').on('click', function (event) {
            event.preventDefault();
            jQuery('html,body').addClass('tr_has_modal');
            let itemId = jQuery(this).attr('data-res_menu_id');
            if (itemId) {
                that.fetchItem(itemId);
                // remove modal when esc key is added
                jQuery(document).on('keyup.tr_esc_key', (function(e) {
                    if (e.keyCode == 27) { // escape key maps to keycode `27`
                        that.removeModal();
                    }
                }));
            }
        });
        jQuery(document).on("click", '.tr_close', function() {
            that.removeModal();
        });
    },
    documentReady() {
        jQuery(document).ready(() => {
            this.initModalClick();
        });
    }
};

restaurantMenuApp.documentReady();