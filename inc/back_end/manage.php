<?php


function emp_list_show(){
    $emp_user = _wp_get_current_user();
    $center_id = get_user_meta($emp_user->ID, "center_id")[0];
    require_once SHONIZ_INC."dao/employee.php";
    if(!isset($_POST["form_id"])){
        $emp_list = employee::get_employee_list($center_id);
        include SHONIZ_VIEW_BACK_END."emp_list.php";
    }
    else{
        $form_id = $_POST["form_id"];
        $emp_detail = employee::get_employee_form($form_id)[0];
        $emp_experiance = employee::get_employee_experiance($form_id);
		$emp_edu = employee::get_employee_edu($form_id);
        include SHONIZ_VIEW_BACK_END."emp_form.php";
    }
}

function shoniz_add_emp_user_show(){
    $message = "";
    if(isset($_POST["user_id"])) {
        $emp_user = get_user_by("ID", $_POST["user_id"]);
        update_user_meta($emp_user->ID, "center_id", $_POST["center_id"]);
        $emp_user->add_role($_POST["role_name"]);
        if(!in_array("subscriber", $emp_user->roles))
            $emp_user->add_role("subscriber");
        $message = "اطلاعات با موفقیت درج شد";
    }
    $users = get_users();
    require_once SHONIZ_INC."dao/basic_info.php";
    $centers =  basic_info_class::get_centers();
    include SHONIZ_VIEW_BACK_END."add_new_user.php";

}

function all_emp_list_show(){
    require_once SHONIZ_INC."dao/employee.php";
    require_once SHONIZ_INC."dao/old_website_web_api.php";
    if(!isset($_POST["form_id"])){
        $emp_list = employee::get_all_employee_list();
        include SHONIZ_VIEW_BACK_END."emp_list.php";
    }
    else{
        require_once SHONIZ_INC."dao/employee.php";
        $form_id = $_POST["form_id"];
        $emp_detail = employee::get_employee_form($form_id)[0];
        $emp_experiance = employee::get_employee_experiance($form_id);
		$emp_edu = employee::get_employee_edu($form_id);
        include SHONIZ_VIEW_BACK_END."emp_form.php";
    }
}

function sho_emp_admin_menu()
{
    add_menu_page('لیست استخدام', 'لیست استخدام',
        'view_reg_list', 'emp_list', 'emp_list_show');

    add_submenu_page('emp_list', 'کل ثبت نامها', 'کل ثبت نامها',
        'view_reg_all_list', 'all_emp_list', 'all_emp_list_show');

    add_submenu_page('emp_list', 'کاربر جدید', 'کاربر جدید',
        'manage_options', 'shoniz_add_emp_user', 'shoniz_add_emp_user_show');
}
add_action("admin_menu", "sho_emp_admin_menu");
