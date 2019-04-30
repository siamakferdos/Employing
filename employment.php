<?php
/**
Plugin Name: استخدام شونیز
Description: مدیریت استخدام
Author: سیامک فردوس
 */


include  plugin_dir_path(__FILE__)."define.php";

//Check if this plugin required from admin page
if(is_admin()) {
   require_once SHONIZ_INC . 'back_end/manage.php';
}
else{
    require_once SHONIZ_INC.'front_end/short_code.php';
    //include SHONIZ_INC.'front_end/manage.php';

}

function load_plugin(){
    $user = wp_get_current_user();
    $capsd = $user->get_role_caps();
}
add_action( 'admin_init', 'load_plugin' );

//ON PLUGIN ACTIVATION
function plugin_active(){
    require_once SHONIZ_INC.'initial/manage.php';
}
register_activation_hook(__FILE__, 'plugin_active');

//ON DEACTIVE THE PLUGIN
function plugin_deactive(){

}
register_deactivation_hook(__FILE__, 'plugin_deactive');

//LOAD STYLES AND SCRIPTS
require_once SHONIZ_ASSET_DIR.'load_styles_scripts.php';

include SHONIZ_INC.'front_end/reg_form.php';




