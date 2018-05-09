jQuery(document).ready(function() {
	jQuery(document).on("click", "#toggle_btn", function(e)
	{
		e.preventDefault();
	    var myArea = jQuery(this).attr('data-attr-toggle');
	 	jQuery("."+myArea).slideToggle(200);
	});  

	jQuery(document).on("click", "#b_crepes", function(e)
	{
		e.preventDefault();
		var val = jQuery(this).attr('data-attr_cats');
		jQuery("."+val).slideToggle(200);
	});  
}); 