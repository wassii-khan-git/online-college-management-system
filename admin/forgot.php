<?php

include_once("./php/connection.php");
include_once("./php/config.php");


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['admin_email_submit_btn'])) {

        $admin_email = stripslashes($_POST['admin_email']);

        if (!empty($admin_email)) {

            // check if the email is valid
            if (!preg_match($emailValidation, $admin_email)) {
                $admin_email_alert = true;
            } else {

                // check if the admin exists if yes send him to new password page

                $query = "SELECT * FROM `admin` WHERE `email` = '$admin_email' ";
                $query_result = mysqli_query($con, $query);
                $query_row = mysqli_num_rows($query_result);

                if ($query_row == 1) {
                    // account found
                    session_start();
                    $_SESSION['admin_email'] = $admin_email;
                    header("Location:create-new-admin-password.php");
                } else {
                    $invalid_success_alert = true;
                    // echo "Sorry we couldn't found your Account";
                }
            }
        } else {
            $all_fields_empty_alert = true;
        }
    }
}








// update code
// change password code
if (isset($_POST['admin_forgot_password_btn'])) {
    // echo "working";
    $password = stripslashes($_POST['password']);
    $confirm_password = stripslashes($_POST['confirm_password']);

    $hashed_password = password_hash($confirm_password , PASSWORD_DEFAULT);

    if (empty($password) || empty($confirm_password)) {
        $all_fields_empty_alert = true;
    } else {

        if ($password !== $confirm_password) {
            $roll_no_already_exists_alert = true;
        } else {

            // update the password of admin
            $query = "UPDATE `admin` SET `password` = '$hashed_password'  WHERE `email` = '".$_SESSION['admin_email']."' ";
            $query_result = mysqli_query($con, $query);

            if ($query_result) {
                $success_alert = true;
                header("Location:admin-login-page.php");
            } else {
                $invalid_success_alert = true;
            }
        }
    }
}




// --------------------------------------------------------------------- 





// teacher forgot code
if($_SERVER['REQUEST_METHOD'] == "POST"){
    if(isset($_POST['teacher_email_submit_btn'])){


        $teacher_email = stripslashes($_POST['teacher_email']);

        if (!empty($teacher_email)) {

            // check if the email is valid
            if (!preg_match($emailValidation, $teacher_email)) {
                $teacher_email_alert = true;
            } else {

                // check if the admin exists if yes send him to new password page

                $query = "SELECT * FROM `professors` WHERE `email` = '$teacher_email' ";
                $query_result = mysqli_query($con, $query);
                $query_row = mysqli_num_rows($query_result);

                if ($query_row == 1) {
                    // account found
                    session_start();
                    $_SESSION['teacher_email'] = $teacher_email;
                    header("Location:create-new-teacher-password.php");
                } else {
                    $invalid_success_alert = true;
                    // echo "Sorry we couldn't found your Account";
                }
            }
        } else {
            $all_fields_empty_alert = true;
        }

    }






// teacher update password code
if (isset($_POST['teacher_forgot_password_btn'])) {
    // echo "working";
    $password = stripslashes($_POST['password']);
    $confirm_password = stripslashes($_POST['confirm_password']);


    $hashed_password = password_hash($confirm_password , PASSWORD_DEFAULT);



    if (empty($password) || empty($confirm_password)) {
        $all_fields_empty_alert = true;
    } else {

        if ($password !== $confirm_password) {
            $roll_no_already_exists_alert = true;
        } else {

            // update the password of admin
            $query = "UPDATE `professors` SET `password` = '$hashed_password'  WHERE `email` = '".$_SESSION['teacher_email']."' ";
            $query_result = mysqli_query($con, $query);

            if ($query_result) {
                $success_alert = true;
                header("Location:teacher-login-page.php");
            } else {
                $invalid_success_alert = true;
            }

        }
    }
}





}