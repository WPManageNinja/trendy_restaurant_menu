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

    initModalClick() {
        var that = this;
        jQuery('.res_item_modal').on('click', function (event) {
            event.preventDefault();
            let itemId = jQuery(this).attr('data-res_menu_id');
            if (itemId) {
                that.fetchItem(itemId);
            }
        });
        jQuery(document).on("click", '.tr_close', function() {
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