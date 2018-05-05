    jQuery(document).ready( function(){


            jQuery('.f_img, .c_main').click(function() {
                var boxed_data_property = jQuery(this).attr('data-attr-boxed-class');
                console.log(boxed_data_property);
                if(jQuery('.f_main').is(':visible')){
                    jQuery('.f_main').fadeOut(function () {
                        jQuery('#' + boxed_data_property).toggle('slide', {
                            direction: 'right'
                        }, 300);
                        console.log("Open oise");
                    });
                    }
                    else {
                        console.log('Fade in working');
                        console.log('#' + boxed_data_property);
                        jQuery('#' + boxed_data_property).toggle('slide', {
                            direction: 'left'
                        }, 300, function(){ 
                            jQuery('.f_main').fadeIn();
                        });
                    }
            });




    });





