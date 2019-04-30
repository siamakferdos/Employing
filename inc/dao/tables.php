<?php

class database_tables_class
{
    function create_sho_job_requirment(){
        global $wpdb, $table_prefix;

        $job_requirement_generator_query =
            "CREATE TABLE  IF NOT EXISTS {$table_prefix}sho_job_requirment
            (
                    id INT AUTO_INCREMENT NOT NULL,
                    center_id SMALLINT NOT NULL,
                    degree_level CHAR(1) NOT NULL,
                    job_title VARCHAR(50) NOT NULL,
                    gender CHAR(1) NOT NULL,
                    study_field VARCHAR(100) NOT NULL,
                    qualify VARCHAR(250) NOT NULL,
                    date_ CHAR(10) NOT NULL,
                    active BIT NOT NULL,
                    CONSTRAINT PK_JobRequirment PRIMARY KEY CLUSTERED(id ASC)
            )
            DEFAULT CHARACTER SET = utf8
            COLLATE = utf8_bin
        ";
        $wpdb->query($job_requirement_generator_query);
    }

    function create_sho_app_form()
    {
        global $wpdb, $table_prefix;
        $app_form_generator_query =
            "CREATE TABLE  IF NOT EXISTS {$table_prefix}sho_app_form
                (
                    id int AUTO_INCREMENT NOT NULL,
                    job_id int NOT NULL,
                    first_name varchar(50) NOT NULL,
                    last_name varchar(50) NOT NULL,
                    father_name varchar(50) NOT NULL,
                    id_number varchar(10) NOT NULL,
                    national_card_number char(10) NOT NULL,
                    birth_date char(10) NOT NULL,
                    birth_city varchar(50) NOT NULL,
                    gender int NOT NULL,
                    marital_stat int NOT NULL,
                    militarystate_id int NULL,
                    province_id int NOT NULL,
                    city varchar(50) NOT NULL,
                    address varchar(150) NOT NULL,
                    email varchar(50) NULL,
                    mobile varchar(30) NULL,
                    tel varchar(30) NOT NULL,
                    degree_id int NOT NULL,
                    study_field varchar(50) NOT NULL,
                    attitude varchar(100) NULL,
                    educity varchar(50) NOT NULL,
                    grad_date char(7) NOT NULL,
                    total_average char(5) NOT NULL,
                    skill varchar(1000) NOT NULL,
                    date_ char(50) NOT NULL,
                    image varchar(500) NULL,
                    random_key char(10) NOT NULL,
                    military_start_date char(10) NULL,
                    military_end_date char(10) NULL,
                    has_filled_form_before bit NOT NULL,
                    visited_admin_id int NULL,                    
                    CONSTRAINT PK_AppForm PRIMARY KEY CLUSTERED(id ASC)
               )
               DEFAULT CHARACTER SET = utf8
               COLLATE = utf8_bin";
        $wpdb->query($app_form_generator_query);
    }

    function  create_sho_experience()
    {
        global $wpdb, $table_prefix;
        $experiance_generator_query =
            "CREATE TABLE  IF NOT EXISTS {$table_prefix}sho_experience
              (
                   app_form_id INT NOT NULL,
                   id INT AUTO_INCREMENT NOT NULL,
                   office_name VARCHAR(100) NOT NULL,
                   from_date CHAR(10) NULL,
                   to_date CHAR(10) NULL,
                   job_title VARCHAR(50) NULL,
                   last_salary VARCHAR(10) NULL,
                   abandon_reason VARCHAR(250) NULL,
                   CONSTRAINT PK_Experience PRIMARY KEY CLUSTERED(
                     app_form_id ASC,
                     id ASC
                   )
                 )
                 DEFAULT CHARACTER SET = utf8
                 COLLATE = utf8_bin";
        $wpdb->query($experiance_generator_query);
    }

    function  create_sho_centers()
    {
        global $wpdb, $table_prefix;
        $centers_generator_query =
            "CREATE TABLE  IF NOT EXISTS {$table_prefix}sho_centers
              (
                   id INT NOT NULL,
                   hrms_id INT NOT NULL,
                   center_name VARCHAR(100) NOT NULL,
                   center_desc VARCHAR(100) NOT NULL
                 )
                 DEFAULT CHARACTER SET = utf8
                 COLLATE = utf8_bin";
        $wpdb->query($centers_generator_query);
    }

    function  create_sho_degree()
    {
        global $wpdb, $table_prefix;
        $degrees_generator_query =
            "CREATE TABLE  IF NOT EXISTS {$table_prefix}sho_degrees
              (
                   id INT NOT NULL,
                   hrms_id INT NOT NULL,
                   degree_name VARCHAR(100) NOT NULL,
                   degree_level VARCHAR(10) NOT NULL 
                 )
                 DEFAULT CHARACTER SET = utf8
                 COLLATE = utf8_bin";
        $wpdb->query($degrees_generator_query);
    }

    function  create_sho_millitary()
    {
        global $wpdb, $table_prefix;
        $millitary_generator_query =
            "CREATE TABLE  IF NOT EXISTS {$table_prefix}sho_millitary
              (
                   id INT NOT NULL,
                   hrms_id INT NOT NULL,
                   millitary_name VARCHAR(100) NOT NULL
                 )
                 DEFAULT CHARACTER SET = utf8
                 COLLATE = utf8_bin";
        $wpdb->query($millitary_generator_query);
    }

    function  create_sho_gender()
    {
        global $wpdb, $table_prefix;
        $gender_generator_query =
            "CREATE TABLE  IF NOT EXISTS {$table_prefix}sho_gender
              (
                   id INT NOT NULL,
                   hrms_id INT NOT NULL,
                   gender_name VARCHAR(100) NOT NULL
                 )
                 DEFAULT CHARACTER SET = utf8
                 COLLATE = utf8_bin";
        $wpdb->query($gender_generator_query);
    }

    function  create_sho_marriage()
    {
        global $wpdb, $table_prefix;
        $gender_generator_query =
            "CREATE TABLE  IF NOT EXISTS {$table_prefix}sho_marriage
              (
                   id INT NOT NULL,
                   hrms_id INT NOT NULL,
                   marriage_name VARCHAR(100) NOT NULL
                 )
                 DEFAULT CHARACTER SET = utf8
                 COLLATE = utf8_bin";
        $wpdb->query($gender_generator_query);
    }

    function  create_sho_states()
    {
        global $wpdb, $table_prefix;
        $gender_generator_query =
            "CREATE TABLE  IF NOT EXISTS {$table_prefix}sho_states
              (
                id int(3) NOT NULL,
                state_name varchar(35) NOT NULL,
                PRIMARY KEY (id)
                 )
                 DEFAULT CHARACTER SET = utf8
                 COLLATE = utf8_bin";
        $wpdb->query($gender_generator_query);
    }

    function  create_sho_cities()
    {
        global $wpdb, $table_prefix;
        $gender_generator_query =
            "CREATE TABLE  IF NOT EXISTS {$table_prefix}sho_cities
              (
                id int(5) NOT NULL,
                city_name varchar(100) NOT NULL,
                state_id int(5) NOT NULL,
                PRIMARY KEY (id)
                 )
                 DEFAULT CHARACTER SET = utf8
                 COLLATE = utf8_bin";
        $wpdb->query($gender_generator_query);
    }


}