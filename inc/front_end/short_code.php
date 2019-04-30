<?php
function sho_job_list($atts, $content = null){

    $atts = shortcode_atts(
        array(), $atts);

//    register_taxonomy('Center', array('Center'));
//    $centers = get_terms('Center', array('hide_empty' => false));

    require_once SHONIZ_INC.'dao/job_requirement.php';
    //$job_list = job_requirement_class::get_job_list();

    //include SHONIZ_ASSET_DIR.'load_styles_scripts.php';
    load_emp_list_table_js();

    ob_start();
    include SHONIZ_INC.'front_end/manage.php';
    $html = ob_get_contents();
    ob_end_clean();

    return $html;
}
add_shortcode("job_list", "sho_job_list");