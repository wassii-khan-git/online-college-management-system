<?php

session_start();

// connection 
include_once("./php/connection.php");
include_once("./php/config.php");

// login variable
$invalid_credentials = false;
$all_fields_empty_alert = false;
// login type
$login_type_alert = false;


// get the data from the form
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['sign_in_btn'])) {
        // echo "working";

        $email = $_POST['email'];
        $password = $_POST['password'];


        if (empty($_POST['email']) || empty($_POST['password'])) {
            $all_fields_empty_alert = true;
        } else {

            $login_query = "SELECT * FROM `admin` WHERE `email` = '$email' ";
            // print_r($login_query);
            $login_query_res = mysqli_query($con, $login_query);
            $login_query_row = mysqli_num_rows($login_query_res);

            if ($login_query_row == 1) {

                $result = mysqli_fetch_assoc($login_query_res);

                // verify the password with the database
                if (password_verify($password, $result['password'])) {


                    $_SESSION['admin_image'] = $result['image'];
                    $_SESSION['admin_id'] = $result['id'];
                    $_SESSION['logged'] = true;
                    header("Location: admin-dashboard.php");

                } else {
                    $invalid_credentials = true;
                }

            } else {
                // print('<h1>Invalid Credentails!</h1>');
                $invalid_credentials = true;
            }
        }
    }
}




// function is_empty_all_fields($email , $password){
//     if(empty($email)){
//         print('<h1>Email Field Cannot be Empty!</h1>');

//     }
//     elseif(empty($password)){
//         print('<h1>Password Field Cannot be Empty!</h1>');

//     }
// }


// $hashed_pass = hash("md5", $confirm_password, false);
