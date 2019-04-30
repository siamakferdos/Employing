<?php
$columns = array(
    array(data => 'form_id', title => "شماره فرم"),
    array(data => 'center_name', title => "محل درخواست"),
    array(data => 'emp_name', title => "نام-نام خانوادگی"),
    array(data => 'national_card_number', title => "کد ملی"),
    array(data => 'job_title', title => "عنوان شغلی"),
    array(data => 'reg_date', title => "تاریخ ثبت"),
    array(data => 'education', title => "تحصیلات"),
    array(data => 'isPrinted', title => "چاپ شده"),
    array(data => 'has_filled_form_before', title => "فرم قبلی"),
    array(data => 'job_id', title => "22"),
);

$defaults = array(
       array(
            targets => array(count($columns) - 1),
            visible => false
        ),
        array(
            targets => array(count($columns)),
            defaultContent => "<button class='button btn_view_emp'>مشاهده</button>"
        )
);

?>

<form name="emp_selection_form" method="post">
    <input type="hidden" name="form_id">
</form>
<table id="emp_list"></table>
<script>
    jQuery(function(){
        console.log(<?php echo json_encode($emp_list); ?>);
        make_emp_list_table(<?php echo json_encode($emp_list); ?> , <?php echo json_encode($columns); ?>,
            <?php echo json_encode($defaults); ?>, '<?php echo SHONIZ_DIR; ?>');
    });
</script>
<style>
    table#emp_list td{
        text-align: center;
    }

    div#emp_list_wrapper{
        margin: 10px 0 0 20px;
    }
    
    .glyphicon-ok {
    color: green;
    background-color: green;
}
/* Red X. */
.glyphicon-remove {
    color: red;
}
</style>
