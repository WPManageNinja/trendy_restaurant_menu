jQuery(document).ready(function () {
	jQuery(document).on("click", ".toggle", function(e)
	{
		e.preventDefault();
    var val = jQuery(this).attr('data-attr-toggle');
		
	    jQuery("#"+val).slideToggle(200);
	    return false;
	}); 

	jQuery('#tabs li a:not(:first)').addClass('inactive');
  jQuery('.tab_container').hide();
  jQuery('.tab_container:first').show();

  jQuery(document).on("click", "#tabs li a", function(){
      var t = jQuery(this).attr('data-attr-tab-id');
      if(jQuery(this).hasClass('inactive')){ //this is the start of our condition 
          jQuery('#tabs li a').addClass('inactive');           
          jQuery(this).removeClass('inactive');
          
          jQuery('.tab_container').hide();
          jQuery('#'+ t + 'C').fadeIn('slow');
          
      }
  });
})






