<?php

/**
 * Created by PhpStorm.
 * User: ferdos.s
 * Date: 3/9/2017
 * Time: 12:25 PM
 */
class old_website_web_api
{
    public static function emp_previous_form_ids($national_card_number){
        $url = "http://webapi.shoniz.com/api/employee/GetEmployeeForms/?nationalCode={$national_card_number}";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $data = curl_exec($ch);
        curl_close($ch);
        //$json = file_get_contents("http://webapi.shoniz.com/api/employee/GetEmployeeForms/?nationalCode={$national_card_number}");
        return json_decode();
    }
}