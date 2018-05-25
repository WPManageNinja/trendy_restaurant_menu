<div class="wrap">
	<h1>Restaurant Menu Settings</h1>
	<div class="trendy_settings_wrapper">
		<div class="ninja_settings_body">
            <div class="ninja_form_group">
                <label>
                    <span><?php _e('Restaurant Currency Sign', 'tr_menu');?></span>
                    <input value="<?php echo get_option('_tr_menu_currency_sign', true); ?>" id="tr_currency_sign" placeholder="ex: $" type="text" maxlength="4" />
                </label>
            </div>
            <div class="ninja_form_group">
                <button id="ninja_save_settings" class="ninja_primary_button"><?php _e('Save Settings', 'tr_menu');?></button>
            </div>
            
            <div style="display: none" class="ninja_success_message">
                Successfully Updated
            </div>
            
        </div>
        <div class="ninja_settings_sidebar">
            <h3 class="sidebar_title">Recommendations for you</h3>
            
            <div class="ninja_widget">
                <div class="widget_title">
                    WPFluentForm - Best Contact form Plugin
                </div>
                <div class="ninja_widget_body">
                    <p>Create WordPress contact forms and other online forms using the most powerful drag & drop online form builder plugin in just a few minutes without writing any code.</p>
                    <a target="_blank" href="https://wpmanageninja.com/downloads/fluentform-pro-add-on/?utm_source=restaurant_menu&utm_medium=wp&utm_campaign=wp_plugin&utm_term=sidebar"><img src="<?php echo TRENDY_RESTAURANT_MENU_PLUGIN_URL ?>assets/images/download-fluent-form.jpg" /></a>
                </div>
                <div class="ninja_widget_footer">
                    <a target="_blank" href="https://wordpress.org/plugins/fluentform/">Download Now form WP.ORG</a>
                </div>
            </div>
        </div>
	</div>
</div>

<script>
    jQuery(document).ready(function($) {
        var $success = $('.ninja_success_message');
        $success.on('click', function() {
            $(this).hide();
        });
        
        $('#ninja_save_settings').on('click', function(e) {
            $(this).attr('disabled', true);
            $success.hide();
            e.preventDefault();
            jQuery.post(ajaxurl, {
                action: 'tr_menu_save_settings',
                currency_sign: jQuery('#tr_currency_sign').val()
            })
                .then(function(response) {
                    $success.html(response.data.message).show();
                })
                .fail(function(error) {
                    alert('Something is wrong! Please try again');
                })
                .always(function() {
                    $(this).attr('disabled', false);
                });
        })
    });
</script>