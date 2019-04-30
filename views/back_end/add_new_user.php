<h2>افزودن کاربر به کاربران مدیریت استخدام</h2>
<form name="frm_add_new_user" method="post">
    <div>
        <span>کاربران</span>
        <select name="user_id" id="user_id" >
            <?php
            foreach ($users as $user){
                echo "<option value='{$user->data->ID}'>".$user->data->user_login." - ".$user->data->display_name."</option>";
            }
            ?>
        </select>
    </div>
    <div>
        <span>مراکز</span>
        <select name="center_id" id="center_id" >
            <?php
            foreach ($centers as $center){
                echo "<option value='{$center->id}'>".$center->center_desc."</option>";
            }
            ?>
        </select>
    </div>
    <div>
        <span>نقش</span>
        <select name="role_name" id="role_name" >
            <option value="hrms_center">کارگزینی مرکز</option>
            <option value="hrms_office">کارگزینی</option>
            <option value="hrms_view">مشاهده</option>
        </select>
    </div>

    <div style="padding: 20px 100px;">
        <button type="submit" class="button button-primary button-large" id="btn_new_user">ذخیره کاربر</button>
    </div>
    <div>
        <?php echo $message; ?>
    </div>


</form>
<script>
//    jQuery(function(){
//        $(document).on("click", "#btn_new_user", function(){
//            $(document.find("#user_id")).val();
//        })
//    )};
</script>