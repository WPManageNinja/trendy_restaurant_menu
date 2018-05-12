const restaurantMenuApp = {
    
    addLoader() {
        let res = {
            loader: jQuery('<div/>', {
                class: 'loader'
            })
        };
        jQuery('body').append(res.loader);
    },

    removeLoader() {
        jQuery('body').find(".loader").remove();
    },

    fetchItem(itemId) {
        this.addLoader();

        jQuery.get(res_menu.ajaxurl, {
            action: 'restaurant_menu_public_ajax_actions',
            route: 'get_item',
            item_id: itemId
        })
        .then(function (response) {
            var resModalHolder = jQuery('<div/>', {
                class: 'res-modal-holder',
                html:response.data.content
            });
            jQuery('body')
                .hide()
                .append(resModalHolder)
                .fadeIn(300)
            // console.log(response.data.content);
        })
        .fail(function (error) {
            console.log(error);
        })
        .always(() => {
            this.removeLoader();
        });
    },

    initModalClick() {
        var that = this;
        jQuery('.res_item_modal').on('click', function (event) {
            event.preventDefault();
            let itemId = jQuery(this).attr('data-res_menu_id');
            if (itemId) {
                that.fetchItem(itemId);
            }
        });
        jQuery(document).on("click", '.cls', function() {
            jQuery('.res-modal-holder')
                    .fadeOut('300', function() {
                        jQuery(this).remove();
                    });
            jQuery('body').css('overflow', 'scroll');
        });
    },
    documentReady() {
        jQuery(document).ready(() => {
            this.initModalClick();
        });
    }
};

restaurantMenuApp.documentReady();