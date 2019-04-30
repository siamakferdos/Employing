<?php
/**
 * Created by PhpStorm.
 * User: ferdos.s
 * Date: 2/4/2017
 * Time: 10:36 AM
 */

//register_taxonomy(
//	'Center',
//	null,
//	array(
//		'label' => 'مرکز',
//		'show_ui' => false,
//		'hierarchical' => false ,
//
//	)
//);

$centers = array(
10 => array('city'  => 'تبریز' ,    'id'=> 1 , 'desc' => 'دکتر نامي'),
100 => array('city' => 'تبریز' ,    'id'=> 2 ,'desc'  => 'کارخانه مرکزی'),
110 => array('city' => 'اردبیل' ,   'id'=> 3 ,'desc'  => 'دفتر پخش اردبیل'),
200 => array('city' => 'سعید آباد' ,'id'=> 4 ,'desc'  => 'داداش برادر'),
250 => array('city' => 'ارومیه' ,   'id'=> 5 ,'desc'  => 'دفتر پخش ارومیه'),
300 => array('city' => 'تهران' ,    'id'=> 6 ,'desc'  => 'دفتر پخش تهران'),
350 => array('city' => 'کرج' ,      'id'=> 7 ,'desc'  => 'دفتر پخش کرج'),
400 => array('city' => 'اصفهان' ,   'id'=> 8 ,'desc'  => 'دفتر پخش اصفهان'),
450 => array('city' => 'قم' ,       'id'=> 9 ,'desc'  => 'دفتر پخش قم'),
500 => array('city' => 'رشت' ,      'id'=> 10,'desc'  => 'دفتر پخش رشت'),
600 => array('city' => 'مشهد' ,     'id'=> 11,'desc'  => 'دفتر پخش مشهد'),
601 => array('city' => 'اهواز' ,    'id'=> 12,'desc'  => 'دفتر پخش اهواز'),
700 => array('city' => 'شيراز' ,    'id'=> 13,'desc'  => 'دفتر پخش شيراز'),
750 => array('city' => 'زاهدان' ,   'id'=> 14,'desc'  => 'دفتر پخش زاهدان'),
800 => array('city' => 'همدان' ,    'id'=> 15,'desc'  => 'دفتر پخش همدان'),
801 => array('city' => 'کرمانشاه' , 'id'=> 16,'desc'  => 'دفتر پخش کرمانشاه'),
900 => array('city' => 'ساري' ,     'id'=> 17,'desc'  => 'دفتر پخش ساري'),
950 => array('city' => 'کرمان' ,    'id'=> 18,'desc'  => 'دفتر پخش کرمان'),
970 => array('city' => 'تبریز' ,    'id'=> 19,'desc'  => 'دفتر پخش تبريز')
);

//$labels = array(
//    'name' => 'Center',
//    'singular_name' => 'Center',
//    'search_items' => 'Center',
//    'all_item' => 'Center',
//);
//
//$args = array(
//    'hierarchical' => false,
//    'labels' => $labels,
//    'show_ui' => false,
//    'show_admin_column' => false,
//    'query_var' => true,
//    'rewrite' => array( 'slug' => 'center'),
//);
//
//register_taxonomy('Center', array('Center'), $args);
//$terms = get_terms('Center', array('hide_empty' => false));
//foreach ($centers as $key => $value) {
//	$ids = wp_insert_term(
//		$value['desc'],
//		'Center'
//	);
//	if(!property_exists($ids, 'errors')) {
//        add_term_meta($ids['term_id'], 'city', $value['city'], true);
//        add_term_meta($ids['term_id'], 'hrms_id', $key, true);
//    }
//}
////************************************************************ Degree *******************************************
//register_taxonomy(
//	'Degree',
//	null,
//	array(
//		'label' => 'مدرک تحصیلی',
//		'show_ui' => false,
//		'hierarchical' => false ,
//
//	)
//);

$degrees = array(
//	0   => array('title' => 'بی سواد'           ,'level'=> 'L'),
//	1   => array('title' => 'ابتدائی'           ,'level'=> 'L'),
//	2   => array('title' => 'سیکل'           ,'level'=> 'L'),
//	3   => array('title' => 'راهنمائی'           ,'level'=> 'L'),
//	4   => array('title' => 'دبیرستان'           ,'level'=> 'L'),
//	5   => array('title' => 'پیش دانشگاهی'           ,'level'=> 'L'),
//	6   => array('title' => 'دیپلم'           ,'level'=> 'L'),
//	7   => array('title' => 'فوق دیپلم'           ,'level'=> 'L'),
	10  => array('title' => 'سیکل'           ,'level'=> 'M'),
	11  => array('title' => 'پیش دانشگاهی'           ,'level'=> 'M'),
	12  => array('title' => 'دیپلم'           ,'level'=> 'M'),
	13  => array('title' => 'فوق دیپلم'           ,'level'=> 'M'),
	14  => array('title' => 'لیسانس'           ,'level'=> 'M'),
	15  => array('title' => 'فوق لیسانس'           ,'level'=> 'M'),
	16  => array('title' => 'دکترا'           ,'level'=> 'M'),
//	30  => array('title' => 'فوق دیپلم'           ,'level'=> 'H'),
//	31  => array('title' => 'لیسانس'           ,'level'=> 'H'),
//	32  => array('title' => 'فوق لیسانس'           ,'level'=> 'H'),
//	33  => array('title' => 'دکترا'           ,'level'=> 'H'),
);

//foreach ($degrees as $key => $value) {
//	$ids = wp_insert_term(
//        $value['title'],
//		'Degree'
//	);
//}

//
////************************************************************ Millitary Status *******************************************
//register_taxonomy(
//    'MillitaryStatus',
//    null,
//    array(
//        'label' => 'وضعیت خدمت',
//        'show_ui' => false,
//        'hierarchical' => false ,
//
//    )
//);

$millitary_status = array(
    1  => array('title' => 'دارای کارت پایان خدمت'),
    2  => array('title' => 'معافیت کفالت'),
    3  => array('title' => 'معافیت موارد خاص'),
    4  => array('title' => 'معافیت پزشکی'),
    5  => array('title' => 'معافیت خرید خدمت'),
    6  => array('title' => 'معافیت تحصیلی'),
);

//foreach ($millitary_status as $key => $value) {
//    $ids = wp_insert_term(
//        $value['title'],
//        'MillitaryStatus'
//    );
//}
