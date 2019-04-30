<?php
/**
 * Created by PhpStorm.
 * User: ferdos.s
 * Date: 2/5/2017
 * Time: 2:05 PM
 */
require_once SHONIZ_INC.'dao/tables.php';
$create_table = new database_tables_class();
$create_table->create_sho_job_requirment();
$create_table->create_sho_app_form();
$create_table->create_sho_experience();
$create_table->create_sho_centers();
$create_table->create_sho_degree();
$create_table->create_sho_millitary();
$create_table->create_sho_gender();
$create_table->create_sho_marriage();
$create_table->create_sho_states();
$create_table->create_sho_cities();

//require_once SHONIZ_INC.'dao/stored_procedure.php';
//$sp = new stored_procedure_class();
//if(!$sp->is_sp_exist('{$table_prefix}sp_job_list')) {
//    $sp->create_sp_job_list();
//}


require_once SHONIZ_INC.'dao/job_requirement.php';
if(job_requirement_class::job_requirement_count() < 1){
    require_once SHONIZ_INC.'dao/fill_table.php';
    $fill_tables = new fill_tables_class();
    $fill_tables->fill_job_requirement();
}

require_once SHONIZ_INC.'dao/basic_info.php';
$list = basic_info_class::get_centers();
    if(empty($list)){
    require_once SHONIZ_INC.'dao/fill_table.php';
    $fill_tables = new fill_tables_class();
    $fill_tables->fill_centers();
}

$list = basic_info_class::get_millitaries();
if(empty($list)){
    require_once SHONIZ_INC.'dao/fill_table.php';
    $fill_tables = new fill_tables_class();
    $fill_tables->fill_millitary();
}

$list = basic_info_class::get_degrees();
if(empty($list)){
    require_once SHONIZ_INC.'dao/fill_table.php';
    $fill_tables = new fill_tables_class();
    $fill_tables->fill_degree();
}

$list = basic_info_class::get_genders();
if(empty($list)){
    require_once SHONIZ_INC.'dao/fill_table.php';
    $fill_tables = new fill_tables_class();
    $fill_tables->fill_gender();
}

$list = basic_info_class::get_Marriage();
if(empty($list)){
    require_once SHONIZ_INC.'dao/fill_table.php';
    $fill_tables = new fill_tables_class();
    $fill_tables->fill_marriage();
}

$list = basic_info_class::get_states();
if(empty($list)){
    require_once SHONIZ_INC.'dao/fill_table.php';
    $fill_tables = new fill_tables_class();
    $fill_tables->fill_states();
}

$list = basic_info_class::get_cities(1);
if(empty($list)){
    require_once SHONIZ_INC.'dao/fill_table.php';
    $fill_tables = new fill_tables_class();
    $fill_tables->fill_cities();
}


