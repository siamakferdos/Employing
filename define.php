<?php
//Check if file is activated by plugin page and not directly from database
defined('ABSPATH') || exit('No Access');


//__FILE__ = current file(this)

define('SHONIZ_DIR', plugin_dir_path(__FILE__));
define('SHONIZ_URL', plugin_dir_url(__FILE__));
define('SHONIZ_INC', trailingslashit(SHONIZ_DIR.'inc'));

define('SHONIZ_VIEW', trailingslashit(SHONIZ_DIR.'views/'));
define('SHONIZ_VIEW_FRONT_END', trailingslashit(SHONIZ_VIEW.'front_end'));
define('SHONIZ_VIEW_BACK_END', trailingslashit(SHONIZ_VIEW.'back_end'));

define('SHONIZ_ASSET_DIR', trailingslashit(SHONIZ_DIR.'asset/'));
define('SHONIZ_ASSET_URL', plugin_dir_url(__FILE__).'asset/');

define('SHONIZ_JS_DIR', trailingslashit(SHONIZ_ASSET_DIR.'js'));

define('SHONIZ_CSS_URL', trailingslashit(SHONIZ_ASSET_URL.'css'));
define('SHONIZ_JS_URL', trailingslashit(SHONIZ_ASSET_URL.'js'));
define('SHONIZ_IMG_URL', trailingslashit(SHONIZ_URL.'img'));
//show_array_as_messages(wp_upload_dir());
define("SHONIZ_UPLOAD_DIR", wp_upload_dir()['basedir'].'/SHONIZ_EMP/');
define("SHONIZ_UPLOAD_URL", wp_upload_dir()['baseurl'].'/SHONIZ_EMP/');

define("SHO_ADMIN_TPL",trailingslashit(SHONIZ_DIR.'template/admin'));
define("SHO_USER_TPL",trailingslashit(SHONIZ_DIR.'template/user'));