<?php
class script_generator
{
    public static function make_insert_into_rows($data_array, $table_name){
        global $wpdb, $table_prefix;
        $columns =  $wpdb->get_results("DESCRIBE {$table_name}");

        $is_fields_made = false;
        $values = "";
        $inserted_field_name = "";
        foreach ($data_array as $obj) {
            if($values != "")
                $values .= ", ";
            if($inserted_field_name != ""){
                $is_fields_made = true ;
            }
            $values .= "(";
            $row = "";
            foreach ($columns as $field) {
                if(isset($obj[$field->Field])){
                    if(!$is_fields_made && $inserted_field_name !=""){
                        $inserted_field_name .= ", ";
                    }
                    if(!$is_fields_made){
                        $inserted_field_name .= $field->Field;
                    }
                    if($row != "")
                        $row .= ", ";

                    if(!script_generator::is_number_column($field->Type)) {
                        if ($obj[$field->Field] == null) {
                            if ($field->Null == "NO")
                                $row .= "''";
                            else
                                $row .= "NULL";
                        }
                        else {
                            $row .= "'".$obj[$field->Field]."'";
                        }
                    }
                    else {
                        if($obj[$field->Field] == null) {
                            if($field->Null == "NO")
                                $row .= 0;
                            else
                                $row .= "NULL";
                        }
                        else {
                            $row .= $obj[$field->Field];
                        }
                    }

                }
            }
            $values .= $row;
            $values .= ")";
        }
        $script = "INSERT INTO ".$table_name." ({$inserted_field_name}) VALUES";
        $script .= $values;
        $wpdb->get_results($script);


    }

    public static function make_insert_into_row($data, $table_name){
        global $wpdb, $table_prefix;
        $columns =  $wpdb->get_results("DESCRIBE {$table_name}");

        $values = "(";
        $inserted_field_name = "";
        $row = "";
        foreach ($columns as $field) {
            if(isset($data[$field->Field])){
                if($inserted_field_name != "") {
                    $row .= ", ";
                    $inserted_field_name .= ", ";
                }
                $inserted_field_name .= $field->Field;
                if(!script_generator::is_number_column($field->Type)) {
                    if ($data[$field->Field] == null) {
                        if ($field->Null == "NO")
                            $row .= "''";
                        else
                            $row .= "NULL";
                    }
                    else {
                        $row .= "'" . $data[$field->Field] . "'";
                    }
                }
                else {
                    if($data[$field->Field] == null) {
                        if($field->Null == "NO")
                            $row .= 0;
                        else
                            $row .= "NULL";
                    }
                    else {
                        $row .= $data[$field->Field];
                    }
                }
            }
        }
        $values .= $row;
        $values .= ")";

        $script = "INSERT INTO ".$table_name." ({$inserted_field_name}) VALUES";
        $script .= $values;
        $script .= "; SELECT LAST_INSERT_ID();";
        //$id = $wpdb->query($script);
        return $script;
    }

    public static function is_number_column($col_type){
        $type_prefix = substr ($col_type , 0 , 3);
        $number_types = array('INTEGER', 'INT', 'SMALLINT', 'TINYINT',
            'MEDIUMINT', 'BIGINT', 'DECIMAL', 'NUMERIC', 'FLOAT', 'DOUBLE');
        $regxp = '([a-z]+)';
        preg_match($regxp, strtolower($col_type), $matches);

        if(in_array(strtoupper($matches[0]), $number_types ))
            return true;

    }

    public static function run_query($query)
    {
        $wp_config_path = script_generator::get_wp_config_path();
        if($wp_config_path == null){
            echo 'Could not found wp_config file!';
            return;
        }
        require_once $wp_config_path;
        $mysqli = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
// Check connection
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }

        $result_count = 0;
        $result_set = array();
        mysqli_set_charset($mysqli, "utf8");
        if ($mysqli->multi_query($query)) {
            do {
                $current_result_count = 0;
                $current_result = array();
                if ($result = $mysqli->use_result()) {
                    while ($row = $result->fetch_row()) {
                        $current_result[$current_result_count] = $row;
                        $current_result_count++;
                    }
                    $result->close();
                }
                $result_set[$result_count] = $current_result;
                if ($mysqli->more_results()) {
                    $result_count++;
                }
            } while ($mysqli->next_result());
        }

        /* close connection */
        $mysqli->close();

        return $result_set;
    }

    function get_wp_config_path(){
        $dir = dirname(__FILE__);
        do {
            if( file_exists($dir."/wp-config.php") ) {
                return $dir."/wp-config.php";
            }
        } while( $dir = realpath("$dir/..") );
        return null;

    }
}