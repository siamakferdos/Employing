<?php
class basic_info_class{

    public static function get_centers(){
        global $wpdb, $table_prefix;

        $query = "SELECT * FROM {$table_prefix}sho_centers ";
        $res = $wpdb->get_results($query);
        return $res;
    }

    public static function get_degrees(){
        global $wpdb, $table_prefix;

        $query = "SELECT * FROM {$table_prefix}sho_degrees ";
        $res = $wpdb->get_results($query);
        return $res;
    }

    public static function get_millitaries(){
        global $wpdb, $table_prefix;

        $query = "SELECT * FROM {$table_prefix}sho_millitary ";
        $res = $wpdb->get_results($query);
        return $res;
    }

    public static function get_genders(){
        global $wpdb, $table_prefix;

        $query = "SELECT * FROM {$table_prefix}sho_gender ";
        $res = $wpdb->get_results($query);
        return $res;
    }

    public static function get_Marriage(){
        global $wpdb, $table_prefix;

        $query = "SELECT * FROM {$table_prefix}sho_marriage ";
        $res = $wpdb->get_results($query);
        return $res;
    }

    public static function get_states(){
        global $wpdb, $table_prefix;

        $query = "SELECT * FROM {$table_prefix}sho_states ";
        $res = $wpdb->get_results($query);
        return $res;
    }

    public static function get_cities($state_id){
        global $wpdb, $table_prefix;

        $query = "SELECT * FROM {$table_prefix}sho_cities WHERE state_id = {$state_id}";
        $res = $wpdb->get_results($query);
        return $res;
    }

}