var resMenuModal = {
	getResmenuModal(){
		var res = {
		    loader: jQuery('<div/>', {
		        class: 'loader'
		    })
		}

		jQuery(document).on('click', '.res-container', function(){
			 var resmenu_Id = jQuery(this).data('res_menu_id');
		jQuery.get({
	        url: sleep.url,
	        beforeSend: function() {
	            jQuery('body').append(res.loader);
	            jQuery('body').css('overflow','hidden');
	        },
	        success: function() {
	          	jQuery.post(res_menu.ajaxurl, { action: 'res_menu_modal', id :  resmenu_Id }, function(response){
					var resModalHolder = jQuery('<div/>', {
						class: 'res-modal-holder',
						html:response
					});
					jQuery('body')
						.hide()
						.append(resModalHolder)
						.fadeIn(300)
					jQuery('body').find(res.loader).remove();

				});
				jQuery('body').css('overflow', 'hidden');
				
	        }
    	})

	});

		
	},

	init(){
		var that = this; 
		that.getResmenuModal();
		jQuery(document).on("click", '.cls', function() {
			jQuery('.res-modal-holder')
					.fadeOut('300', function() {
						jQuery(this).remove();
					});
			jQuery('body').css('overflow', 'scroll');
		});

	}
};

resMenuModal.init();






























