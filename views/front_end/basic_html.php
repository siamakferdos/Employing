<?php

require_once("PersianCalendar.php");


function html_select_day($select_name = 'day'){
    $html = "<select name='emp[{$select_name}]' style='width: 20%'><option value='0'>روز</option>";
    for($i = 1; $i <= 31 ; $i++) {
        $html .= "<option value='{$i}'>{$i}</option>";
    }
    $html .= "</select>";
    return $html;
}

function html_select_month($select_name = 'month'){
    $html = "<select name='emp[{$select_name}]'  style='width: 20%'>
                <option value='0'>ماه</option>
                <option value='1'>فروردین</option>
                <option value='2'>اردیبهشت</option>
                <option value='3'>خرداد</option>
                <option value='4'>تیر</option>
                <option value='5'>مرداد</option>
                <option value='6'>شهریور</option>
                <option value='7'>مهر</option>
                <option value='8'>آبان</option>
                <option value='9'>آذر</option>
                <option value='10'>دی</option>
                <option value='11'>بهمن</option>
                <option value='12'>اسفند</option>
            </select>";
    return $html;
}

function html_select_year($select_name = 'year'){
    $current_year = trim_all(mds_date("Y", "now", 1));
    //echo "<span>". (string)($current_year * 1)."</span>";
    //echo(int)$current_year;
    //echo strlen($current_year);
    //echo mds_date("Y/m/d", "now", 1);
    //echo mds_date("Y", "now", 1);
    $html = "<select name='emp[{$select_name}]' style='width: 20%'>";
    for($i = $current_year * 1; $i >= 1325 ; $i--) {
        $html .= "<option value='{$i}'>{$i}</option>";
    }
    $html .= "</select>";
    return $html;
}

function html_experiance_tr($row_number){
    $html = "
    <tr row_num='{$row_number}'>
                <td>
                    <input id='office_name_{$row_number}' name='office_name_{$row_number}' placeholder='نام محل کار' />
                </td>
                <td>
                    <input id='job_title_{$row_number}' name='job_title_{$row_number}' placeholder='عنوان شغلی' />
                </td>
                <td>
                    <input id='from_date_{$row_number}' name='from_date_{$row_number}' placeholder='تاریخ شروع' />
                </td>
                <td>
                    <input id='to_date_{$row_number}' name='to_date_{$row_number}' placeholder='تاریخ اتمام' />
                </td>
                <td>
                    <input id='last_salary_{$row_number}' name='last_salary_{$row_number}' placeholder='آخرین حقوق' />
                </td>
                <td>
                    <input id='abandon_reason_{$row_number}' name='abandon_reason_{$row_number}' placeholder='علت ترک خدمت' />
                </td>
            </tr>";
}

function trim_all( $str , $what = NULL , $with = ' ' )
{
    if( $what === NULL )
    {
        //  Character      Decimal      Use
        //  "\0"            0           Null Character
        //  "\t"            9           Tab
        //  "\n"           10           New line
        //  "\x0B"         11           Vertical Tab
        //  "\r"           13           New Line in Mac
        //  " "            32           Space
       
        $what   = "\\x00-\\x20";    //all white-spaces and control chars
    }
   
    return trim( preg_replace( "/[".$what."]+/" , $with , $str ) , $what );
}