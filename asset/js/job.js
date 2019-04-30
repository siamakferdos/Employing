var data = {};
var degrees = new Array();
jQuery(function(){
    jQuery(document).on( 'click', '.emp_reg', function () {
        var id = jQuery(this).closest("table").attr("id");
        console.log(data_table[id]);
        data = data_table[id].row(jQuery(this).parents('tr') ).data();

        data["action"] = "job_select";
        jQuery.ajax({
            // url : plugin_url + '/inc/front_end/reg_form.php',
            url : plugin_url + 'admin-ajax.php',
            type : 'post',
            dataType : 'text',
            data: data,
            success: function (response) {

                //jQuery("#tabs").tabs("option", "active", );
                 jQuery("#tabs-reg-form").html(response).show();
                 jQuery("#tabs-job-list").hide();

            },
            complete: function(data){
                //alert('Complete');
            },
            error: function(data){
                console.log("Erro in call ref form");
                console.log(data);
                jQuery("#tabs-reg-form").html(data.responseText).show();
                 jQuery("#tabs-job-list").hide();
            }

        });

    } );

    jQuery(document).on("click", "#add_new_row", function () {
        html_experiance_tr();
    });
    jQuery(document).on("click", "#add_new_edu_row", function () {
        html_education_tr();
    });
// 	html_education_tr();
    html_experiance_tr();


});

function get_degrees(callback){
        data["action"] = "emp_degree_list";
        jQuery.ajax({
            // url : plugin_url + '/inc/front_end/reg_form.php',
            url : base_plugin_url_for_ajax + 'admin-ajax.php',
            type : 'post',
            dataType : 'json',
            data: data,
            success: function (response) {
                degrees = response;
                callback();

            },
            complete: function(data){
                console.log(data);
            },
            function(xhr, status, error) {
              var err = eval("(" + xhr.responseText + ")");
              console.log(err.Message);
            }
        });
}


var plugin_url = "";
var data_table = {};
function make_data_table(table_id, data, url_plugin_base) {
    plugin_url = url_plugin_base;
    data_table[table_id] = jQuery('#' + table_id).DataTable({
        paging:   false,
        searching: false,
        data: data,
		order : [[ 0, "desc" ]],
        columns: [
            { data: 'center_name', title:'مرکز' },
            { data: 'job_title', title:'عنوان شغلی' },
            { data: 'qualify', title:'شرایط' },
            { data: 'study_field', title: 'رده تحصیلی'},
            { data: 'gender_name', title:'جنسیت' },
            { data: 'id' }
        ],
        columnDefs: [
            {
                targets: [5],
                visible: false
            },
            {
                targets : [6],
                defaultContent: "<button class='button emp_reg'>ثبت نام</button>"
            }
        ],
        language: {
            processing:     "در حال پردازش ...",
            search:         "جستجو",
            lengthMenu:    "نمایش _MENU_ در صفحه",
            info:           "", // "سطر های _START_ از _END_ از مجموع _TOTAL_ سطر",
            infoEmpty:      "خالی",
            infoFiltered:   "اطلاعات فیلتر شده",
            infoPostFix:    "",
            loadingRecords: "لود اطلاعات...",
            zeroRecords:    "عدم وجود اطلاعات",
            emptyTable:     "جدول خالی",
            paginate: {
                first:      "ابتدا",
                previous:   "قبلی",
                next:       "بعدی",
                last:       "آخرین"
            }

        }
    } );
   
}

var data_table_emp_list = {};
function make_emp_list_table(data, columns, defaults) {
   var currentPageNum = 0;
   console.log(sessionStorage.pageNum);
   if(sessionStorage.pageNum && sessionStorage.pageNum > 0){
        //var info = data_table_emp_list.page.info();
        len = 10;//info.length;
        currentPageNum = sessionStorage.pageNum * (len - 1)
   }
    
    
    
    data_table_emp_list = jQuery('#emp_list').DataTable( {
        data: data,
        columns: columns,
		order : [[ 0, "desc" ]],
        columnDefs: defaults,
        language: {
            processing:     "در حال پردازش ...",
            search:         "جستجو",
            lengthMenu:    "نمایش _MENU_ در صفحه",
            info:           "", // "سطر های _START_ از _END_ از مجموع _TOTAL_ سطر",
            infoEmpty:      "خالی",
            infoFiltered:   "اطلاعات فیلتر شده",
            infoPostFix:    "",
            loadingRecords: "لود اطلاعات...",
            zeroRecords:    "عدم وجود اطلاعات",
            emptyTable:     "جدول خالی",
            paginate: {
                first:      "ابتدا",
                previous:   "قبلی",
                next:       "بعدی",
                last:       "آخرین"
            }

        },
        displayStart: currentPageNum
        
    } );
    
    sessionStorage.pageNum = undefined;
    
    
}

var data_table_emp_detail = {};
function make_emp_detail_table(data) {
    data_table_emp_detail = jQuery('#job_experiance').DataTable( {
        data: data,
        columns: [
            { data: 'office_name', title:'شرکت' },
            { data: 'job_title', title: 'عنوان شغلی'},
            { data: 'from_date', title:'از تاریخ' },
            { data: 'to_date', title:'تا تاریخ' },
            { data: 'last_salary', title:'آخرین حقوق' },
            { data: 'abandon_reason', title:'علت ترک کار' }
        ],
        columnDefs: [
            {
                targets: [5],
                width : "20%"
            }
        ],
        language: {
            processing:     "در حال پردازش ...",
            search:         "جستجو",
            lengthMenu:    "نمایش _MENU_ در صفحه",
            info:           "", // "سطر های _START_ از _END_ از مجموع _TOTAL_ سطر",
            infoEmpty:      "خالی",
            infoFiltered:   "اطلاعات فیلتر شده",
            infoPostFix:    "",
            loadingRecords: "لود اطلاعات...",
            zeroRecords:    "عدم وجود اطلاعات",
            emptyTable:     "جدول خالی",
            paginate: {
                first:      "ابتدا",
                previous:   "قبلی",
                next:       "بعدی",
                last:       "آخرین"
            }
        },
        bFilter: false, //Disable search function
        bJQueryUI: true, //Enable smooth theme
        sPaginationType: "full_numbers", //Enable smooth theme
        bPaginate: false //hide pagination
    } );
    
}

jQuery(document).on("click", ".btn_view_emp", function () {
    var info = data_table_emp_list.page.info();
    sessionStorage.pageNum = info.page;
    console.log(sessionStorage.pageNum);
    var data = data_table_emp_list.row(jQuery(this).parents('tr')).data();
    var form = jQuery('[name="emp_selection_form"]');
    var form_id_input = jQuery('[name="form_id"]');
    form_id_input.val(data["form_id"]);
    form.submit();
})

function print_div(div_id) {
    var divElements = document.getElementById(div_id).innerHTML;
    var oldPage = document.body.innerHTML;
    document.body.innerHTML =
        "<html><head><title></title></head><body>" +
        divElements + "</body>";
    window.print();
    document.body.innerHTML = oldPage;
}

function html_experiance_tr() {
    var row_number = jQuery("#experiance_table tbody tr").length;
    row_number++;
    var html = "<tr row_num='" + row_number + "'> " +
        "<td>" +
        "<input id='office_name_" + row_number + "' name='exp[" + row_number + "][office_name]' placeholder='نام محل کار' type='text' maxlength='50'/>" +
        "</td>" +
        "<td>" +
        "<input id='job_title_" + row_number + "' name='exp[" + row_number + "][job_title]' placeholder='عنوان شغلی' type='text' maxlength='50' />" +
        "</td>" +
        "<td>" +
        "<input id='from_date_" + row_number + "' name='exp[" + row_number + "][from_date]' placeholder='تاریخ شروع' type='text' maxlength='50' />" +
        "</td>" +
        "<td>" +
        "<input id='to_date_" + row_number + "' name='exp[" + row_number + "][to_date]' placeholder='تاریخ اتمام' type='text' maxlength='50' />" +
        "</td>" +
        "<td>" +
        "<input id='last_salary_" + row_number + "' name='exp[" + row_number + "][last_salary]' placeholder='آخرین حقوق' type='text' maxlength='50' />" +
        "</td>" +
        "<td>" +
        "<input id='abandon_reason_" + row_number + "' name='exp[" + row_number + "][abandon_reason]' placeholder='علت ترک خدمت' type='text' maxlength='50' />" +
        "</td>" +
        "</tr>";

    jQuery(document).find("#experiance_table tbody").append(html);

}

function html_education_tr() {
    var row_number = jQuery("#education_table tbody tr").length;
    row_number++;
    var html = "<tr row_num='" + row_number + "'> " +
        "<td>" +
		"<select id='degree_name_" + row_number + "' name='edu[" + row_number + "][degree_id]' >";
        jQuery.each(degrees, function(index, degree){
            html += `<option value='${degree.id}'>${degree.degree_name}</option>`;
        });
        
        html += "</select>" +        
        "</td>" +
        "<td>" +
        "<input id='study_field_" + row_number + "' name='edu[" + row_number + "][study_field]' placeholder='رشته' type='text' maxlength='50' />" +
        "</td>" +
        "<td>" +
        "<input id='attitude_" + row_number + "' name='edu[" + row_number + "][attitude]' placeholder='گرایش' type='text' maxlength='50' />" +
        "</td>" +
        "<td>" +
        "<input id='educity_" + row_number + "' name='edu[" + row_number + "][educity]' placeholder='شهر' type='text' maxlength='50' />" +
        "</td>" +
        "<td>" +
        "<input id='grad_date_" + row_number + "' name='edu[" + row_number + "][grad_date]' placeholder='تاریخ: مثال 86/02' type='text'  maxlength='5'  />" + 
        "</td>" +
        "<td>" +
        "<input id='total_average_" + row_number + "' name='edu[" + row_number + "][total_average]' placeholder='معدل' type='text'  maxlength='5'/>" +
        "</td>" +
        "</tr>";

    jQuery(document).find("#education_table tbody").append(html);

}

function emp_sho_change_cities(province_id, plugin_base_url, callback){
    jQuery.ajax({
        url : plugin_base_url + 'admin-ajax.php',
        type : 'post',
        dataType : 'json',
        data:{
            province_id : province_id,
            action : 'emp_sho_change_cities'
        },
        success: function (data) {
            callback(data);
        }
    });
}
    
