<?php

function emp_sho_update_printed_form_callback(){
  
       $servername = "localhost";
        $username = "shonizgl_shoniz";
        $password = "ndfdSHOniz$4";
        $dbname = "shonizgl_shonizcomDB";
        
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
        
        $sql = "UPDATE shn_sho_app_form SET 
            visited_admin_id = 1 WHERE id = {$_POST['form_id']};";
        
        if ($conn->query($sql) === TRUE) {
            //echo "Record updated successfully";
        } else {
            //echo "Error updating record: " . $conn->error;
        }
        
        $conn->close();
       
       
       
    //update_printed_form($_POST["form_id"]);
    
    
}
emp_sho_update_printed_form_callback();


