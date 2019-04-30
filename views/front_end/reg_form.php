<?php
    require_once "basic_html.php";
//}
?>
<style>
    #emp_form  div{
        width: 40% !important;
        margin-left: 5%;
        float: right;
    }
    #emp_form  div.fullwidth{
        width: 100% !important;
        margin-left: 5%;
        clear: both;
    }
    #emp_form  div.fullwidth div{
        width: auto !important;
        margin-left: 5%;
        clear: both;
    }

    #emp_form div select,
    #emp_form div input,
    #emp_form div span{
        float: right;
    }
    #emp_form  div select:nth-child(2) {
    #emp_form  div div:nth-child(2) {
        clear: both;
    }

</style>

<form id="emp_form" action="" method="post" name="emp[form_reg_emp]"  enctype="multipart/form-data">
    <input type="hidden" name="emp[job_id]" value="<?php echo $data['job_id'] ?>" />
    <input type="hidden" name="emp[date_]" value="<?php echo date("Y-m-d h:i:s") ?>" />
  <h3>  محل استخدام : <?php echo $data["center_desc"] ?> - <span>فرم استخدام برای   عنوان شغلی:  <?php echo $data["job_title"] ?> </span>
    </h3>

    <hr />
    <h3>مشخصات فردی</h3>
    <div class="fullwidth">
        <span>تصویر :</span>
        <input id="image" type="file" name="emp[image]" class="gform_button button"  required />
    </div>
    <div>
        <span>نام :</span>
        <input id="first_name" type="text" name="emp[first_name]" placeholder="نام" maxlength="30"   required />
    </div>
    <div>
        <span>نام خانوادگی :</span>
        <input id="last_name" type="text" name="emp[last_name]" placeholder="نام خانوادگی" maxlength="30" required />
    </div>
    <div>
        <span>نام پدر :</span>
        <input id="father_name" type="text" name="emp[father_name]" placeholder="نام پدر" maxlength="30"  required />
    </div>
    <div>
        <span>تاریخ تولد : </span>
        <?php
            echo html_select_year('birth_date_year').html_select_month('birth_date_month')
                .html_select_day('birth_date_day');
        ?>
    </div>
    <div>
        <span>محل تولد</span>
        <input id="birth_city" type="text" name="emp[birth_city]" placeholder="محل تولد" maxlength="30"  required />
    </div>
    <div>
        <span>جنسیت :</span>
        <div>
            <div class="radio">
                <div><input type="radio" value="1" name="emp[gender]" checked="checked" ">مرد</div>
            </div>
            <div class="radio">
                <div><input type="radio" value="2" name="emp[gender]">زن</div>
            </div>
        </div>
    </div>
    <div>
        <span>وضعیت تاهل :</span>
        <div>
            <div class="radio">
                <div><input type="radio" value="1" name="emp[marital_stat] checked="checked" ">مجرد</div>
            </div>
            <div class="radio">
                <div><input type="radio" value="2" name="emp[marital_stat]">متاهل</div>
            </div>
        </div>

    </div>
    <div>
        <span>کد ملی</span>
        <input id="national_card_number" type="number" name="emp[national_card_number]" placeholder="کد ملی"  required />
    </div>
    <div>
        <span>شماره شناسنامه</span>
        <input id="id_number" type="number" name="emp[id_number]" placeholder="شماره شناسنامه"  required />
    </div>
    <div>
        <span>تلفن همراه</span>
        <input id="mobile" type="number" name="emp[mobile]" placeholder="شماره موبایل"  required />
    </div>
    <div>
        <span>ایمیل</span>
        <input id="email" type="email" name="emp[email]" placeholder="ایمیل"  required />
    </div>
    <hr />
    <h3>آدرس محل سکونت</h3>

    <div>
        <span>استان</span>
        <select class="state_select" name="emp[province_id]" id="province_id" >
            <?php
            foreach ($states as $state){
                echo "<option value='{$state->id}'>{$state->state_name}</option>";
            }
            ?>
        </select>
    </div>
    <div>
        <span>شهر</span>
        <select name="emp[city]" id="city" >
            <?php
            foreach ($cities as $city){
                echo "<option value='{$city->id}'>{$city->city_name}</option>";
            }
            ?>
        </select>
    </div>
    <div>
        <span>تلفن</span>
        <input id="tel" type="number" name="emp[tel]" placeholder="تلفن"  required />
    </div>
    <div>
        <span>آدرس</span>
        <textarea id="address" name="emp[address]" placeholder="آدرس"  maxlength='250'/>
    </div>

    <hr />
    <div class="fullwidth">
    <h3>تحصیلات</h3>
    <div>
        <button id="add_new_edu_row" name="add_new_edu_row" class="gform_button button" type="button" >افزودن تحصیلات جدید</button>
        <div>
            <table id="education_table">
                <thead>
                <th>مدرک</th>
            <th>رشته</th>
            <th>گرایش</th>
            <th>محل تحصیل</th>
            <th>تاریخ اخذ</th>
            <th>معدل کل</th>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
    </div>

    <hr />
    
    
    <h3>وضعیت نظام وظیفه</h3>
    <div>
        <span>وضعیت</span>
        <select name="emp[militarystate_id]" id="militarystate_id" >
            <?php
            foreach ($millitaries as $millitary){
                echo "<option value='{$millitary->id}'>{$millitary->millitary_name}</option>";
            }
            ?>
        </select>
    </div>
    <div>
        <span>تاریخ اعزام  : </span>
        <?php
        echo html_select_year('military_start_date_year').html_select_month('military_start_date_month')
            .html_select_day('military_start_date_day');
        ?>
    </div>
    <div>
        <span>تاریخ ترخیص  : </span>
        <?php
        echo html_select_year('military_end_date_year').html_select_month('military_end_date_month')
            .html_select_day('military_end_date_day');
        ?>
    </div>

    <hr />
    
    
    <div class="fullwidth">
    <h3>سوابق کاری</h3>
    <div>
        <button id="add_new_row" name="add_new_row" class="gform_button button" type="button" >افزودن سابقه کاری جدید</button>
        <div>
            <table id="experiance_table">
                <thead>
                
                <th>
                    نام محل کار
                </th>
                <th>
                    عنوان شغلی
                </th>
                <th>
                    تاریخ شروع
                </th>
                <th>
                    تاریخ خاتمه
                </th>
                <th>
                    آخرین حقوق
                </th>
                <th>
                    علت ترک خدمت
                </th>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
    </div>
    <div  class="fullwidth">
        <span>مهارت</span>
        <textarea id="skill" name="emp[skill]" placeholder="مهارت..."  maxlength='500'/>
    </div>

    <div class="fullwidth">
       
        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="has_filled_form_before" name="emp[has_filled_form_before]">
            <label class="form-check-label" for="exampleCheck1">قبلا در این شرکت فرم استخدامی(چه بصورت آنلاین و چه بصورت مراجعه شخصی) پر کرده ام.</label>
        </div>
    </div>
    <div class="fullwidth">
         <button id="save_form_reg" type="submit" name="save_form_reg" class="gform_button button" >ثبت فرم</button>
        </div>
</form>
<script>
    jQuery(function () {
        jQuery(document).on("change", "#province_id", function () {
            emp_sho_change_cities(jQuery(this).val(), "<?php echo admin_url() ?>", function (cities) {
                var options = "";
                jQuery("[name='emp[city]']").empty();
                jQuery.each(cities, function (index, city) {
                    jQuery("[name='emp[city]']").append("<option value='" + city.id + "'>" + city.city_name + "</option>")
                })
            });
        })
    });
</script>
<?php
echo "<script>var base_plugin_url_for_ajax = ''; jQuery(function (){ base_plugin_url_for_ajax = '".admin_url()."'; get_degrees(function(){html_education_tr(); }); });</script>";
?>