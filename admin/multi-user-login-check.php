<?php

session_start();

// connection 
include("./php/connection.php");
// include_once("./php/config.php");

// login type
$login_type_alert = false;
$all_fields_empty_alert = false;

// get the data from the form
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['sign_in_btn'])) {
        // echo "working";
        


        $login_type = $_POST['login_type'];


        // echo $login_type;

        if (empty($login_type)) {
            //    print('<h1>All fields are Required!</h1>');
            $all_fields_empty_alert = true;
        } else {

            if ($login_type == 'Admin') {

                header("Location: admin-login-page.php");
                exit;

            } elseif ($login_type == 'Teacher') {
                
                header("Location: teacher-login-page.php");
                exit;

            } 
            else {
                // echo  "Please Select login type!";
                $login_type_alert = true;

            }
        }

    }
}
