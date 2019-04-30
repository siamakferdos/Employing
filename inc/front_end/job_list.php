

<?php

if(!empty($job_list)) {
    $current_center = null;

    $current_center = $job_list[0]->center_id;

    $center_list = array();
    $html = "";
    $script = "";

    $index = 0;
    $len = count($job_list);
    foreach ($job_list as $job) {

        if ($job->center_id == $current_center){
            array_push($center_list, $job);
            $index++;
            if($len - $index > 0)
                continue;
        }
        $html .= "<h3>{$job->center_name}</h3>";
        $html .= "<table id='shoEmpList_{$job->center_id}'></table>";
        $html .= "<hr />";
        $script .= "make_data_table('shoEmpList_{$job->center_id}', " . json_encode($center_list) . ");";

        $current_center = $job->center_id;
        $center_list = array();
        array_push($center_list, $job);
    }

    $script = "<script>jQuery(function (){" . $script . "});</script>";
    echo $html;
    echo $script;
}