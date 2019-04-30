<?php
$show_list = true;
if(isset($_POST['save_form_reg'])) {
    include_once SHONIZ_INC . 'front_end/reg_form.php';
    sho_save_form_emp();
}
else{
    $job_list = job_requirement_class::get_job_list();
    include  SHONIZ_VIEW_FRONT_END.'manage.php';
}



