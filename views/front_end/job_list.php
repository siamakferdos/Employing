<?php

if(!empty($job_list)) {
    $current_center = $job_list[0];

    $center_list = array();
    $html = "";
    $script = "";

    $index = 0;
    $len = count($job_list);
//echo var_dump($job_list);
    foreach ($job_list as $job) {
//echo var_dump($job);
//echo '<br><br>';
        if ($job->center_id == $current_center->center_id){
            array_push($center_list, $job);
            $index++;
            if($len - $index > 0)
                continue;
        }
        $html .= "<h3>{$current_center->center_name}</h3>";
        $html .= "<table id='shoEmpList_{$current_center->center_id}'></table>";
        $html .= "<hr />";
        $script .= "make_data_table('shoEmpList_{$current_center->center_id}', ". json_encode($center_list).",'".admin_url()."');";

        $current_center = $job;
        $center_list = array();
        //echo $script;
        array_push($center_list, $job);
    }
    
    $html .= "<h3>{$current_center->center_name}</h3>";
        $html .= "<table id='shoEmpList_{$current_center->center_id}'></table>";
        $html .= "<hr />";
        $script .= "make_data_table('shoEmpList_{$current_center->center_id}', ". json_encode($center_list).",'".admin_url()."');";
//echo var_dump($center_list);
    $script = "<script>jQuery(function (){" . $script . "});</script>";

    echo $html;
    echo $script;
}
