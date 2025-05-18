<?php

include_once("connection.php");

// get the data send using ajax

$data = stripcslashes(file_get_contents("php://input"));

 $mydata = json_decode($data , true);

    $name =    $mydata['name'];
    $email =   $mydata['email'];
    $subject =   $mydata['subject'];
    $phone =   $mydata['phone'];
    $message =   $mydata['message'];

    // current date
    $current_date = date("Y-m-d");

    // current time
    date_default_timezone_set("Asia/karachi");
    $current_time = date("h:i:sa");

    if(empty($name) || empty($email) || empty($subject) || empty($phone) || empty($message)){
        echo "All fields are empty";
    } else {

        // insert the data into the database

        $query = "INSERT INTO `messages` (`name` , `email` ,`subject` , `phone` ,`message` ,`date`, `time`) VALUES('$name',
        '$email' , '$subject' , '$phone' , '$message' , '$current_date' , '$current_time') ";
        
        $query_result = mysqli_query($con , $query);

        if($query_result){
            echo "Your Message has been sent successfully";
        } else {
            echo "Sorry! Failed to sent message";
        }
}


































//  database connection 
// require "./php/connection.php";

// $path = "./uploads/";

// // config file
// require_once "./php/config.php";

// // starting session
// session_start();


// if ($_SERVER['REQUEST_METHOD'] == "POST") {
//     if (isset($_POST['send_email_btn'])) {

//         // get the data from the form
//         $username = mysqli_real_escape_string($con, $_POST['username']);
//         $email = mysqli_real_escape_string($con, $_POST['email']);
//         $message = mysqli_real_escape_string($con, $_POST['address']);




//         if (!preg_match($name, $username)) {
//             // echo "<h1>Please Enter a valid First Name!</h1>";
//             $first_name_error_msg = "Please Enter a valid Name!";
//             $first_name_alert = true;
//         } elseif (!preg_match($emailValidation, $_POST['email'])) {
//             // echo "<h1>Please Enter a valid Email!</h1>";
//             $email_error_msg = "Please Enter a valid Email!";
//             $email_alert = true;
//         } else {


//             $current_date = date("Y-m-d");

//             $query = "INSERT INTO `messages` (`name`, `email` ,`message` , `date` ) 
// 			VALUES ('$username', '$email', '$message' , '$current_date') ";


//             $result = mysqli_query($con, $query);
//             if ($result) {
//                 // echo "<h1>Your Account have been Created Successfully!</h1>";
//                 $success_alert = true;
//                 // $_SESSION['student_insert_check'] = true;
//                 // $_SESSION['student_insert_check_email'] = $email;
//                 // header("Location:student_image_upload_page.php");
//             } else {
//                 // echo "<h1>Cannot Insert Record due to some Error!</h1>";
//                 $insert_record_alert = true;
//             }
//         }
//     }
// }

// end of the code










