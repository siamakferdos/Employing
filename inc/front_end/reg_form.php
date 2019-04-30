<?php



function user_job_select(){
    require_once SHONIZ_INC."dao/basic_info.php";
    $states = basic_info_class::get_states();
    $cities = basic_info_class::get_cities(1);
    $degrees = basic_info_class::get_degrees();
    $millitaries = basic_info_class::get_millitaries();
    $data = $_POST;

    ob_start();
    include SHONIZ_VIEW.'front_end/reg_form.php';
    $html = ob_get_contents();
    ob_end_clean();
    echo $html;
    wp_die();
}
add_action('wp_ajax_job_select', 'user_job_select');
add_action('wp_ajax_nopriv_job_select', 'user_job_select');

/**
 * @return bool
 */
$message = "";
function sho_save_form_emp(){
    global $wpdb, $table_prefix;


    $white_list = array(
        image_type_to_mime_type(IMAGETYPE_JPEG), // return 'image/jpeg'
        image_type_to_mime_type(IMAGETYPE_GIF), //return 'image/png'
        image_type_to_mime_type(IMAGETYPE_PNG),
        image_type_to_mime_type(IMAGETYPE_SWF)
    );

    $data = $_POST;
    $emp = $data["emp"];
    $exps = $data["exp"];
	$edus = $data["edu"];

    $image = $_FILES['emp'];

    if(!empty($image['name']['image'])) {
        if (in_array($image['type']['image'], $white_list)) {
            $extention = explode('.', $image['name']['image']);
            $new_file_name = md5_file($image['tmp_name']['image']) . '.' . end($extention);
            $new_file_path = SHONIZ_UPLOAD_DIR . $new_file_name;

            if (!file_exists(SHONIZ_UPLOAD_DIR))
                mkdir(SHONIZ_UPLOAD_DIR);
            move_uploaded_file($image['tmp_name']['image'], $new_file_path);

        }
    }
    $emp["image"] = $new_file_name;
    $emp["birth_date"] = $emp['birth_date_year']."/".$emp['birth_date_month']."/".$emp['birth_date_day'];
    $emp["military_start_date"] = $emp['military_start_date_year']."/".$emp['military_start_date_month']."/".$emp['military_start_date_day'];
    $emp["military_end_date"] = $emp['military_end_date_year']."/".$emp['military_end_date_month']."/".$emp['military_end_date_day'];
    $emp["grad_date"] = $emp['grad_date_year']."/".$emp['grad_date_month'];
    
    
    //Check if there are no other registration before
    require_once SHONIZ_INC."dao/employee.php";
    $isRegisterBefore = employee::has_previous_registration_for_job($emp["national_card_number"], $emp["job_id"]);
    if($isRegisterBefore){
        echo "با این کد ملی قبلا برای این عنوان شغلی ثبت نام انجام شده است";
        return;
     }
    
    require_once SHONIZ_INC."dao/script_generator.php";
    
    foreach ($edus as $edu) {
		    if($emp["degree_id"] == null || $emp["degree_id"] == 0 || $emp["degree_id"] < $edu["degree_id"]){
		        $emp["degree_id"] = $edu["degree_id"];
		        $emp["study_field"] = $edu["study_field"];
		        $emp["attitude"] = $edu["attitude"];
		        $emp["educity"] = $edu["educity"];
		        $emp["grad_date"] = $edu["grad_date"];
		        $emp["total_average"] = $edu["total_average"];
		    }
        }
    $query =  script_generator::make_insert_into_row($emp, $table_prefix.'sho_app_form');
    $result_set = script_generator::run_query($query);
    if(!empty($result_set[1][0][0])) {
        $form_id = $result_set[1][0][0];
        echo "FORM ID: " . $form_id;
        foreach ($exps as &$exp) {
            $exp["app_form_id"] = $form_id;			
        }
		foreach ($edus as &$edu) {
		    $edu["app_form_id"] = $form_id;	
        }
        script_generator::make_insert_into_rows($exps, $table_prefix . 'sho_experience');
		script_generator::make_insert_into_rows($edus, $table_prefix . 'sho_edu');
        echo "اطلاعات با موفقیت درج گردید. شماره فرم شما ".$form_id." می باشد. لطفا این کد را برای بررسی های آینده نزد خود نگه دارید.";
    }
    else
        echo "خطا در درج اطلاعات!";
}


function emp_sho_change_cities_callback(){
    if($_POST["province_id"]){
        include_once SHONIZ_INC."/dao/basic_info.php";
        $cities = basic_info_class::get_cities($_POST["province_id"]);
        wp_die(json_encode($cities));
    }
    //wp_send_json_success(json_encode($response));
}
add_action('wp_ajax_emp_sho_change_cities', 'emp_sho_change_cities_callback');
add_action('wp_ajax_nopriv_emp_sho_change_cities', 'emp_sho_change_cities_callback');

function emp_sho_degree_list(){
    require_once SHONIZ_INC."dao/basic_info.php";   
    $degrees = basic_info_class::get_degrees();       
    wp_die(json_encode($degrees));
}
add_action('wp_ajax_emp_degree_list', 'emp_sho_degree_list');
add_action('wp_ajax_nopriv_emp_degree_list', 'emp_sho_degree_list');

