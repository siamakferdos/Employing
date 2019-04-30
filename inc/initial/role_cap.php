<?php
/**
 * Created by PhpStorm.
 * User: ferdos.s
 * Date: 2/4/2017
 * Time: 2:19 PM
 */

//add_role( "hrms_admin", 'ادمین');
$role = get_role( 'administrator' );
$role->add_cap( 'view_reg_list', true);
$role->add_cap( 'manage_reg_list', true);
$role->add_cap( 'view_reg_all_list', true);

add_role( "hrms_center", 'کارگزینی مرکز');
$role = get_role( 'hrms_center' );
$role->add_cap( 'view_reg_list', true);
$role->add_cap( 'view_reg_all_list', true);

add_role( "hrms_office", 'کارگزینی');
$role = get_role( 'hrms_office' );
$role->add_cap( 'view_reg_list', true);

add_role( "hrms_view", 'مشاهده');
$role = get_role( 'hrms_view' );
$role->add_cap( 'view_reg_list', true);
