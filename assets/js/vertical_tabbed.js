var verticalTabbed = {

	getTabbed(){


		jQuery(document).on("click", '.scrollto', function(event) {
		    event.preventDefault(); 
		    var defaultAnchorOffset = 0;
			var anchor = jQuery(this).attr('data-attr-scroll');
		            
		    var anchorOffset = jQuery('#'+anchor).attr('data-scroll-offset');
		    if (!anchorOffset)
		        anchorOffset = defaultAnchorOffset; 

		    jQuery('html,body').animate({ 
		        scrollTop: jQuery('#'+anchor).offset().top - anchorOffset
		    }, 2000);  

		});


	},


	init(){

		this.getTabbed();

	}


}

verticalTabbed.init();