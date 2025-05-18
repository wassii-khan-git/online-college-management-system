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
        // $hashed_password = md5($password);

        if (empty($_POST['email']) || empty($_POST['password'])) {
            //    print('<h1>All fields are Required!</h1>');
            $all_fields_empty_alert = true;
        } else {

            // echo "Welcome Teacher <br>";

            // echo $hashed_exact;

            $login_teacher_query = "SELECT * FROM `professors` WHERE `email` ='$email' ";

            $login_teacher_query_res = mysqli_query($con, $login_teacher_query);
            $login_teacher_query_row = mysqli_num_rows($login_teacher_query_res);

            if ($login_teacher_query_row == 1) {

                $fetched = mysqli_fetch_array($login_teacher_query_res);

                // verify the password
                if (password_verify($password, $fetched['password'])) {

                    $_SESSION['teacher_username'] = $fetched['firstname'] . '' . $fetched['lastname'];
                    $_SESSION['teacher_image'] = $fetched['image'];
                    $_SESSION['teacher_email'] = $email;
                    $_SESSION['teacher_logged'] = true;
                    header("Location: teacher_dashboard.php");
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
