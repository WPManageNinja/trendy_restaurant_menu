const restaurantMenuApp = {

    setModal() {

    },

    fetchItem(itemId) {

        jQuery.get(res_menu.ajaxurl, {
            action: 'restaurant_menu_public_ajax_actions',
            route: 'get_item',
            item_id: itemId
        })
            .then(response => {
                console.log(response);
            })
            .fail(error => {
                console.log(error);
            })
            .always(() => {
                
            });
    },

    initModalClick() {
        var that = this;
        jQuery('.res-container').on('click', function (event) {
            event.preventDefault();
            let itemId = jQuery(this).attr('data-res_menu_id');
            if (itemId) {
                that.fetchItem(itemId);
            }
        });
    },
    documentReady() {
        jQuery(document).ready(() => {
            this.initModalClick();
        });
    }
};

restaurantMenuApp.documentReady();