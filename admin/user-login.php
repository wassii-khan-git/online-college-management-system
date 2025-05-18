<?php

session_start();

// connection 
include("./php/connection.php");
// include_once("./php/config.php");

// login variable
$invalid_credentials = false;
$all_fields_empty_alert = false;
// login type
$login_type_alert = false;


// get the data from the form
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['sign_in_btn'])) {
        // echo "working";

        // is_empty_all_fields($_POST['email'] , $_POST['password'] );
        $email = $_POST['email'];
        $password = $_POST['password'];

        // creating hash for professor code
        // $hashed_password = hash("md5" , $password , false);


        if (empty($_POST['email']) || empty($_POST['password'])) {
            //    print('<h1>All fields are Required!</h1>');
            $all_fields_empty_alert = true;
        } else {

                // echo "Welcome User";

                $login_user_query = "SELECT * FROM `students` WHERE `email` ='$email' AND `password` = '$password' ";
                
                // print_r($login_teacher_query);

                $login_user_query_res = mysqli_query($con, $login_user_query);
                $login_user_query_row = mysqli_num_rows($login_user_query_res);

                if ($login_user_query_row == 1) {
                    // print('<h1>Welcome Admin!</h1>');
                    $fetched = mysqli_fetch_array($login_user_query_res);
                    $_SESSION['student_username']  = $fetched['firstname'].''.$fetched['lastname'];
                    $_SESSION['student_email'] = $email;
                    $_SESSION['student_image'] = $fetched['image'];
                    $_SESSION['student_logged'] = true;
                    
                    header("Location: user_page.php");
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
