<?php

function sho_emp_load_scripts(){

//    wp_register_script('jquery.ui.js', SHONIZ_JS_URL.'jquery-ui.min.js', array('jquery'));
//    wp_enqueue_script('jquery.ui.js');

    wp_register_script('jquery.datatables', SHONIZ_JS_URL.'datatables.min.js', array('jquery'), null, true);
    wp_enqueue_script('jquery.datatables');


    wp_enqueue_style( 'datatables.min', SHONIZ_CSS_URL.'datatables.min.css' );
    wp_enqueue_style( 'jquery.ui.min', SHONIZ_CSS_URL.'jquery-ui.min.css' );

//    wp_register_style('emp_styles', SHONIZ_CSS_URL.'styles.css', array('datatables.min'));
//    wp_enqueue_style( 'emp_styles', SHONIZ_CSS_URL.'styles.css' );

    wp_register_script('job_js', SHONIZ_JS_URL.'job.js', array('jquery.datatables'));
    wp_enqueue_script('job_js');

}
add_action('wp_enqueue_scripts', 'sho_emp_load_scripts');
add_action('admin_enqueue_scripts', 'sho_emp_load_scripts');

function load_emp_list_table_js(){
//    wp_register_script('job_js', SHONIZ_JS_URL.'job.js', array('jquery'));
//    wp_enqueue_script('job_js');
}