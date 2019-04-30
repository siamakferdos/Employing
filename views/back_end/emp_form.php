<button type="button" id="print_emp1" class="button print_emp1" style="position: fixed; top: 200px; left: 50px; width: 100px; height: 50px;"><b>چاپ</b></button>
<br />
<button type="button" id="return_back1" class="button" onclick="location.reload();" style="position: fixed; top: 260px; left: 50px; width: 100px; height: 50px;"><b>برگشت</b></button>
<div id="print_area" >
    
    <script>
    jQuery(function () {
        jQuery(document).on("click", ".print_emp1", function(){
            print_div("print_area");
            
            var id = '<?php echo $form_id ?>';
        
        data = {form_id: id};
        console.log(data);
        jQuery.ajax({
             url : "<?php echo SHONIZ_URL.'inc/back_end/employeeAjax.php' ?>",
            //url : plugin_url + '/inc/dao/employee.php',
            type : 'post',
            data: data,
            success: function (response) {
                console.log("OK");
                console.log(response);
            },
            complete: function(data){
                console.log("Finished");
                console.log(data);
            },
            error: function(data){
                console.log("Error");
                console.log(data);
            }

        });
         

        });
        
        
        
    })

</script>

    <style>
        .width20{
            width: 20%;
        }
        .width30{
            width: 30%;
        }
        .width40{
            width: 40%;
        }
        .width50{
            width: 50%;
        }
        .width60{
            width: 50%;
        }
        hr{
            color: black;
        }
        .emp h3{
            margin: 5px 0;
        }
        .float-left{
            float: left;
        }
        .float-right{
            float: right;
        }
        .clear-both{
            clear: both;
        }
        .center-content{
            text-align: center;
        }
        .right-content{
            text-align: right;
        }
        .emp{
            border-top: dotted 2px;
            padding-top: 5px;
        }
        .emp_detail{
            border: solid 2px;
            border-radius: 5px;
            overflow:hidden;
            padding: 5px 10px;
            margin : 10px;
        }
        .emp_detail b{
            font-weight: 600;
            font-size: 13px;
        }
        .list-div > div{
            padding-bottom: 10px;
        }
        #print_area {
            width: 210mm;
            height: 297mm;
            margin: auto;
            padding: 0px 10px;
        }
        .img_shoniz{
            width: 160px;
            height: 50px;
        }
        .img_person{
            max-width : 120px;

        }
        .print_table{
            text-align: right;
                width: 100%;
        }
       .print_table thead{
            background-color: #6FECE4;
            text-align: center;
        }
        @page {
            size: A4;
        }
        @media print {
            #print_area {
                width: 210mm;
                height: 297mm;
            }
        }
    </style>




    <div  class="emp_detail">
    <div class="emp_header center-content">
        <div class="width30 float-right list-div">
            <div><h2>فرم استخدام آنلاین</h2></div>
            <div><b>محل: </b><?php echo $emp_detail->center_name ?></div>
        </div>
        <div class="width40 float-right list-div">
            <div><img src="<?php echo SHONIZ_IMG_URL ?>ArmFa.png" class="img_shoniz" /></div>
            <div><h2>شرکت صنعتی داداش برادر</h2></div>
        </div>
        <div class="width30 float-right list-div">
            <div style="padding-top: 10px;"><b>شماره فرم: </b><?php echo $emp_detail->form_id ?></div>
            <div style="padding-top: 25px;"><b>تاریخ ارسال: </b><?php echo  $emp_detail->reg_date ?></b></div>
        </div>
    </div>

    <div class="clear-both emp">
        <!--        <hr />-->
        <h3>عنوان شغلی : </h3>
    </div>
    <!--    <hr />-->
    <div class="emp emp_person center-right">
        <div class="width50 float-right list-div">
            <div><b>نام/نام خانوادگی: </b><?php echo $emp_detail->emp_name ?></div>
            <div><b>نام پدر: </b><?php echo $emp_detail->father_name ?></div>
            <div><b>محل تولد: </b><?php echo $emp_detail->birth_city ?></div>
            <div><b>ش شناسنامه: </b><?php echo $emp_detail->id_number ?></div>
            <div><b>ایمیل: </b><?php echo $emp_detail->email ?></div>
            <div><b>وضعیت نظام وظیفه: </b><?php echo $emp_detail->millitary_name ?></div>
        </div>
        <div class="width30 float-right list-div">
            <div><b>تاریخ تولد: </b><?php echo $emp_detail->birth_date ?></div>
            <div><b>جنسیت: </b><?php echo $emp_detail->gender_name ?></div>
            <div><b>وضعیت تاهل: </b><?php echo $emp_detail->marriage_name ?></div>
            <div><b>کد ملی: </b><?php echo $emp_detail->national_card_number ?></div>
            <div><b>تاریخ اعزام: </b><?php echo $emp_detail->military_start_date ?></div>
            <div><b>تاریخ ترخیص: </b><?php echo $emp_detail->military_end_date ?></div>
        </div>
        <div class="width20 float-right right-content">
            <img src="<?php echo SHONIZ_UPLOAD_URL.$emp_detail->image ?>" class="img_person" />
        </div>
    </div>
    <div class="emp clear-both">
        <!--        <hr />-->
        <h3>آدرس محل سکونت: </h3>
    </div>
    <!--    <hr />-->
    <div class="emp emp_address center-right">
        <div class="width40 float-right list-div">
            <div><b>استان: </b><?php echo $emp_detail->state_name ?></div>
            <div><b>تلفن: </b><?php echo $emp_detail->tel ?></div>
            <div><b>موبایل: </b><?php echo $emp_detail->mobile ?></div>
        </div>
        <div class="width60 float-right list-div">
            <div><b>شهر: </b><?php echo $emp_detail->city_name ?></div>
            <div><b>آدرس: </b><?php echo $emp_detail->address ?></div>
        </div>
    </div>
    <div class="emp clear-both">
        <!--        <hr />-->
        <h3>مدرک تحصیلی: </h3>
    </div>
	<table id="job_edu" class="print_table">
        <thead>
        <tr>
            <th>مدرک</th>
            <th>رشته</th>
            <th>گرایش</th>
            <th>محل تحصیل</th>
            <th>تاریخ اخذ</th>
            <th>معدل کل</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($emp_edu as $exp) : ?>
            <tr>
                <td><?php echo $exp->degree_name ?></td>
                <td><?php echo $exp->study_field ?></td>
                <td><?php echo $exp->attitude ?></td>
                <td><?php echo $exp->educity ?></td>
                <td><?php echo $exp->grad_date ?></td>
                <td><?php echo $exp->total_average ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <!--   
    <div class="emp emp_address center-right">
        <div class="width40 float-right list-div">
            <div><b>آخرین مدرک: </b><?php echo $emp_detail->degree_name ?></div>
            <div><b>گرایش: </b><?php echo $emp_detail->attitude ?></div>
        </div>
        <div class="width30 float-right list-div">
            <div><b>رشته: </b><?php echo $emp_detail->studying ?></div>
            <div><b>محل تحصیل: </b><?php echo $emp_detail->educity ?></div>
        </div>
        <div class="width30 float-right list-div">
            <div><b>تاریخ اخذ: </b><?php echo $emp_detail->grad_date ?></div>
            <div><b>معدل کل: </b><?php echo $emp_detail->total_average ?></div>
        </div>
    </div>
	-->
    <div class="emp clear-both">
      
        <h3>سوابق کاری: </h3>
    </div>	
    <table id="job_experiance" class="print_table">
        <thead>
        <tr>
            <th>نام محل کار</th>
            <th>عنوان شغلی</th>
            <th>تاریخ شروع</th>
            <th>تاریخ اتمام</th>
            <th>آخرین حقوق</th>
            <th>علت ترک خدمت</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($emp_experiance as $exp) : ?>
            <tr>
                <td><?php echo $exp->office_name ?></td>
                <td><?php echo $exp->job_title ?></td>
                <td><?php echo $exp->from_date ?></td>
                <td><?php echo $exp->to_date ?></td>
                <td><?php echo $exp->last_salary ?></td>
                <td><?php echo $exp->abandon_reason ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <div class="emp clear-both">
        <!--        <hr />-->
        <h3>مهارت و تخصص: </h3>    
            <?php echo $emp_detail->skill ?>
    </div>
    <div  class="emp clear-both">
         <?php
         if( $emp_detail->has_filled_form_before > 0) echo "این فرد قبلا فرم استخدام پر کرده است";
         
         ?>
    </div>
    <!--<div class="emp clear-both">-->
        <?php
        // $previous_reg_new_form_ids = employee::has_previous_registration($emp_detail->national_card_number);
        //$previous_reg_old_form_ids = old_website_web_api::emp_previous_form_ids(1376004232);//$emp_detail->national_card_number)
        // $new_forms = "";
        // $old_forms = "";
        // foreach ($previous_reg_new_form_ids as $form_id) {
        //     if ($form_id->id != $emp_detail->form_id)
        //         $new_forms .= $form_id . " ";
        // }
        // foreach ($previous_reg_old_form_ids as $form) {
        //     $old_forms .= $form->AppFormID . " ";
        // }
        // if($old_forms != "") echo "این فرد دارای فرم قبلی بشماره ". $old_forms ." در سیستم قدیم می باشد";
        ?>
    <!--</div>-->

</div>
</div>



