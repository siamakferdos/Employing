<?php

/**
 * Created by PhpStorm.
 * User: ferdos.s
 * Date: 2/16/2017
 * Time: 12:30 PM
 */
 require_once(SHONIZ_VIEW_FRONT_END."/PersianCalendar.php");
 
class employee
{
    
    public static function get_employee_list($center_id = 0){
        if($center_id == 0)
            return array();
        global $wpdb, $table_prefix;
        $script = "
            select 
                 *, af.id, af.id form_id, concat(first_name, ' ', last_name) emp_name, af.date_ reg_date
                , concat(dg.degree_name, ' - ', af.study_field) education,  
                CASE when af.visited_admin_id > 0 then '<span class=\"glyphicon glyphicon-ok\" aria-hidden=\"true\">بلی</span>' else '' END  isPrinted,
                CASE when af.has_filled_form_before > 0 then '<span class=\"glyphicon glyphicon-ok\" aria-hidden=\"true\">بلی</span>' else '' END  has_filled_form_before, 'TEST' test
            from
                {$table_prefix}sho_app_form af
                    inner join
                {$table_prefix}sho_job_requirment jr ON af.job_id = jr.id
                    inner join
                {$table_prefix}sho_cities c ON af.city = c.id
                    inner join
                {$table_prefix}sho_states state ON af.province_id = state.id
                    inner join
                {$table_prefix}sho_degrees dg ON af.degree_id = dg.id
                    inner join
                {$table_prefix}sho_gender gn ON af.gender = gn.id
                    inner join
                {$table_prefix}sho_marriage mg ON af.marital_stat = mg.id
                    inner join
                {$table_prefix}sho_millitary ml ON af.militarystate_id = ml.id 
                             inner join 
               {$table_prefix}sho_centers cen on center_id = cen.id
            where jr.center_id = {$center_id} and jr.active = 1
            order by form_id desc
        ";
        $result = $wpdb->get_results($script);
        return $result;
    }

    public static function get_all_employee_list($show_only_active = false){
        global $wpdb, $table_prefix;
        $script = "
            select 
                 *, af.id, af.id form_id, concat(first_name, ' ', last_name) emp_name, af.date_ reg_date
                , concat(dg.degree_name, ' - ', af.study_field) education,  
                CASE when af.visited_admin_id > 0 then '<span class=\"glyphicon glyphicon-ok\" aria-hidden=\"true\">بلی</span>' else '' END  isPrinted,
                CASE when af.has_filled_form_before > 0 then '<span class=\"glyphicon glyphicon-ok\" aria-hidden=\"true\">بلی</span>' else '' END  has_filled_form_before, 'TEST' test
            from
                {$table_prefix}sho_app_form af
                    inner join
                {$table_prefix}sho_job_requirment jr ON af.job_id = jr.id
                    inner join
                {$table_prefix}sho_cities c ON af.city = c.id
                    inner join
                {$table_prefix}sho_states state ON af.province_id = state.id
                    inner join
                {$table_prefix}sho_degrees dg ON af.degree_id = dg.id
                    inner join
                {$table_prefix}sho_gender gn ON af.gender = gn.id
                    inner join
                {$table_prefix}sho_marriage mg ON af.marital_stat = mg.id
                    inner join
                {$table_prefix}sho_millitary ml ON af.militarystate_id = ml.id 
                             inner join 
               {$table_prefix}sho_centers cen on center_id = cen.id";
        if($show_only_active)
            $script .= " where jr.active = 1";
        //$script .= " where af.job_id = 269 ";
        $script .= " order by af.id desc";
        $result = $wpdb->get_results($script);
        
        //var_dump(substr($res->reg_date, 10));
        //var_dump($res->reg_date, 10);
        
        foreach ($result as $res){
            $d = explode('-', substr($res->reg_date, 0, 10));
            //print_r($d);
            $d = gregorian_to_mds($d[0],$d[1],$d[2]);
            //print_r($d);
           
            $res->reg_date = $d[0].'/'.$d[1].'/'.$d[2];
        }
        
        return $result;
    }

    public static function get_employee_form($form_id = 0){
        global $wpdb, $table_prefix;
        $script = "
            select
                *, af.id, af.id form_id, concat(first_name, ' ', last_name) emp_name, af.date_ reg_date
                , concat(dg.degree_name, ' - ', af.study_field) education,
                af.study_field studying
            from
                {$table_prefix}sho_app_form af
                    inner join
                {$table_prefix}sho_job_requirment jr ON af.job_id = jr.id
                    inner join
                {$table_prefix}sho_cities c ON af.city = c.id
                    inner join
                {$table_prefix}sho_states state ON af.province_id = state.id
                    inner join
                {$table_prefix}sho_degrees dg ON af.degree_id = dg.id
                    inner join
                {$table_prefix}sho_gender gn ON af.gender = gn.id
                    inner join
                {$table_prefix}sho_marriage mg ON af.marital_stat = mg.id
                    inner join
                {$table_prefix}sho_millitary ml ON af.militarystate_id = ml.id
            where af.id = {$form_id} 
        ";
        $result = $wpdb->get_results($script);
        
         foreach ($result as $res){
            $d = explode('-', substr($res->reg_date, 0, 10));
            $d = gregorian_to_mds($d[0],$d[1],$d[2]);
            $res->reg_date = $d[0].'/'.$d[1].'/'.$d[2];
        }
		
		return $result;
    }

    public static function get_employee_experiance($form_id = 0){
        if($form_id == 0)
            return array();
        global $wpdb, $table_prefix;
        $script = "
            select
                *
            from
                {$table_prefix}sho_experience
            where app_form_id = {$form_id} 
        ";
        return $wpdb->get_results($script);
    }
	
	public static function get_employee_edu($form_id = 0){
        if($form_id == 0)
            return array();
        global $wpdb, $table_prefix;
        $script = "
            select
                edu.*, deg.degree_name
            from
                {$table_prefix}sho_edu edu
				Inner Join {$table_prefix}sho_degrees deg on edu.degree_id = deg.id
            where app_form_id = {$form_id} 
        ";
        return $wpdb->get_results($script);
    }

    public static function has_previous_registration($national_code = 0){
        if($national_code == 0)
            return array();
        global $wpdb, $table_prefix;
        $script = "
            select
                id
            from
                {$table_prefix}sho_app_form
            where national_card_number = {$national_code} 
        ";
        return $wpdb->get_results($script);
    }
    
    public static function has_previous_registration_for_job($national_code = 0, $job_id = 0){
        if($national_code == 0)
            return array();
        global $wpdb, $table_prefix;
        $script = "
            SELECT count(1)  FROM 
                {$table_prefix}sho_app_form
            where national_card_number = {$national_code} AND 
             job_id = {$job_id}
        ";
        return $wpdb->get_var($script) > 0;
    }
    
    public static function is_printed_form($form_id){
        global $wpdb, $table_prefix;
        $script = "
            SELECT count(1) FROM 
                {$table_prefix}sho_app_form
            where form_id = {$form_id} AND 
             visited_admin_id > 0 AND visited_admin_id <> ''
        ";
        return $wpdb->get_var($script) > 0;
    }
    
    public static function update_printed_form($form_id){
        global $wpdb, $table_prefix;
        $script = "
            UPDATE {$table_prefix}sho_app_form SET 
            visited_admin_id = 1 WHERE id = {$form_id}
        ";
        return $wpdb->get_var($script) > 0;
    }
}