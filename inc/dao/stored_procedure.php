<?php

/**
 * Created by PhpStorm.
 * User: ferdos.s
 * Date: 2/7/2017
 * Time: 12:21 PM
 */
class stored_procedure_class
{
    function is_sp_exist($sp_name){
        global $wpdb;

        $sql_query ="SELECT 1 FROM mysql.proc p WHERE db = '".DB_NAME."' AND name = '{$sp_name}'";
        $res = $wpdb->get_var($sql_query);
        return $res == 0 ? false : true;
    }
    
    function drop_sp($sp_name){
        global $wpdb, $table_prefix;
        $sql_query ="
            IF OBJECT_ID('{$table_prefix}{$sp_name}', 'P') IS NOT NULL
            DROP PROC {$table_prefix}{$sp_name}";
        $wpdb->query($sql_query);
    }

    function create_sp_job_list()
    {
        global $wpdb, $table_prefix;
        $sql_query =
            "
            IF OBJECT_ID('{$table_prefix}sp_job_list', 'P') IS NOT NULL
            DROP PROC {$table_prefix}sp_job_list;
            DELIMITER //
            CREATE PROCEDURE {$table_prefix}sp_job_list(
              IN id VARCHAR(10) CHAR SET utf8,
              IN job_title VARCHAR(50) CHAR SET utf8,
              IN qualify VARCHAR(50) CHAR SET utf8
            )
            BEGIN
                SET @s = 'SELECT * FROM {$table_prefix}_sho_job_requirment WHERE 1 = 1 ';
                IF job_title IS NOT NULL AND job_title <> ''  
                    THEN 
                        SET @s = CONCAT(@s, ' AND job_title LIKE ''%', job_title, '%'''); 
                    END IF;
                IF qualify IS NOT NULL AND qualify <> '' 
                   THEN
                        SET @s = CONCAT(@s, ' AND qualify LIKE ''%', qualify, '%'''); 
                   END IF;
                IF id  IS NOT NULL AND id <> '' 
                    THEN  
                       SET @s = CONCAT(@s, ' AND id =', id); 
                    END IF;
            
                SELECT @s;
                PREPARE stmt FROM @s;
                EXECUTE stmt;
                DEALLOCATE PREPARE stmt;
            END
            DELIMITER ;";
        $wpdb->query($sql_query);
    }
}