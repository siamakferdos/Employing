<?php

class job_requirement_class{

    public static function get_job_list($job_title = '', $qualify = '',$id = ''){
        global $wpdb, $table_prefix;

        $query = "SELECT *, j.id, j.id job_id FROM {$table_prefix}sho_job_requirment j
                      INNER JOIN
                        {$table_prefix}sho_centers c
                      ON
                        j.center_id = c.hrms_id
                      INNER JOIN 
                        {$table_prefix}sho_gender g 
                      ON 
                        j.gender = g.hrms_id  
                      WHERE j.active = 1 ";

        if($job_title != null && $job_title != '')
            $query .= " AND j.job_title LIKE '%{$job_title}%' ";
        if($qualify != null && $qualify != '')
            $query .= " AND j.qualify LIKE '%{$qualify}%' ";
        if($id != null && $id != '')
            $query .= " AND j.id = {$id}";
        $query .= " ORDER BY j.center_id";

        $res = $wpdb->get_results($query);
        //echo var_dump($res);
        return $res;
    }

    public static function job_requirement_count($centerId = 0){
        $centerId = esc_sql($centerId);
        global $wpdb, $table_prefix;
        $where = '';
        if($centerId > 0)
            $where = " WHERE center_id = {$centerId}";
        return $wpdb->get_var("SELECT COUNT(*) FROM {$table_prefix}sho_job_requirment {$where}");
    }
}