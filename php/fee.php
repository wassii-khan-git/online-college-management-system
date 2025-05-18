<?php

//  database connection 
require "connection.php";


// config file
require "config.php";

// starting session
session_start();


if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['add_fee_btn'])) {

    // get the data from the form
    $roll_no = mysqli_real_escape_string($con, $_POST['roll_no']);
    $student_name = mysqli_real_escape_string($con, $_POST['student_name']);
    $subject = mysqli_real_escape_string($con, $_POST['subject']);
    $fee_type = mysqli_real_escape_string($con, $_POST['fee_type']);
    $amount = mysqli_real_escape_string($con, $_POST['amount']);
    $collection_date = mysqli_real_escape_string($con, $_POST['collection_date']);
    $reciept_number = mysqli_real_escape_string($con, $_POST['reciept_number']);
    $status = mysqli_real_escape_string($con, $_POST['status']);

    if (!preg_match($number, $_POST['roll_no'])) {
        // echo "<h1>Please Enter a valid roll_no!</h1>";
        $roll_no_error_msg = "Please Enter a valid roll_no!";
        $roll_no_alert = true;
    } elseif (!preg_match($name, $_POST['student_name'])) {
        // echo "<h1>Please Enter a valid Student Name!</h1>";
        $student_name_error_msg = "Please Enter a valid Student Name!";
        $student_name_alert = true;
    } elseif (!preg_match($number, $_POST['amount'])) {
        // echo "<h1>Please Enter a valid Amount!</h1>";
        $amount_error_msg = "Please Enter a valid Amount!";
        $amount_alert = true;
    } else {
        if (!preg_match($number, $_POST['reciept_number'])) {
            // echo "<h1>Please Enter a valid Reciept number!</h1>";
            $reciept_number_error_msg = "Please Enter a valid Reciept number!";
            $reciept_number_alert = true;
        } else {

            // check if the reciept number already exists
            $mobile_number_query = "SELECT * FROM `fees` WHERE `reciept_number` = '$reciept_number' ";
            $mobile_number_res = mysqli_query($con, $mobile_number_query);
            $mobile_number_row = mysqli_num_rows($mobile_number_res);

            if ($mobile_number_row == 1) {
                // echo "<h1>Reciept Number already exists</h1>";
                $reciept_number_exists_alert = true;
            } else {


                // file upload code
                if ($_FILES['image']['error'] == 0) {

                    // array for image types
                    $image_array = array("jpeg", "jpg", "png");

                    $file_name = $_FILES['image']['name'];

                    // $_SESSION['filename']['name'] = $_FILES['image']['name'];

                    $file_tmp_name = $_FILES['image']['tmp_name'];
                    $file_type = $_FILES['image']['type'];
                    $file_size = $_FILES['image']['size'];
                    $file_dir = "./uploads/";

                    // seperate the extension from the file
                    $file_extension = explode('.', $file_name);
                    $file_extension_lower_case = strtolower(end($file_extension));

                    // create the hash of image file
                    $hash_image = hash("md5", $file_name, false);
                    $hash_image_exact = $hash_image . '.' . $file_extension_lower_case;

                    // echo $hash_image_exact;
                    // echo $file_dir.$file_name;

                    if (file_exists($file_dir . $hash_image_exact)) {
                        // echo "<h1>Image already exists!</h1>";
                        $image_exists_error_msg = "Image already exists!";
                        $image_exists_alert = true;
                    } else {
                        // check the file size
                        if ($file_size > 1000000) {
                            // echo "<h1>Image is too large!</h1>";
                            $image_size_error_msg = "Image is too large!";
                            $image_size_alert = true;
                        } else {

                            if (in_array($file_extension_lower_case, $image_array)) {
                                // echo "<h1>Image type Supported!</h1>";

                                // echo "good to go";

                                // upload the file
                                $upload = move_uploaded_file($file_tmp_name, $file_dir . $hash_image_exact);
                                // echo "<h1>Image Successfully uploaded!</h1>";

                                // insert the data into database
                                $query = "INSERT INTO `fees` (`roll_no`, `student_name`, `department`, 
                             `fee_type`, `amount`, `collection_date`, `reciept_number`, `status`, 
                             `image`) VALUES ('$roll_no',
                             '$student_name', '$subject', '$fee_type', '$amount',
                             '$collection_date', '$reciept_number', '$status','$hash_image_exact')";

                                $result = mysqli_query($con, $query);
                                if ($result) {
                                    // echo "<h1>Your Account have been Created Successfully!</h1>";
                                    $success_alert = true;
                                } else {
                                    // echo "<h1>Cannot Insert Record due to some Error!</h1>";
                                    $insert_record_alert = true;
                                }
                            } else {
                                // echo "<h1>Image type Not Supported!</h1>";
                                $image_support_error_msg = "Image type Not Supported!";
                                $image_support_alert = true;
                            }
                        }
                    }
                }
                // end of image upload code

            }
        }
    }
}
// end of the code





//-----------------------------------------------------------------------//



// require_once "./php/professor.php";
// require_once "./php/connection.php";
// include_once "./php/config.php";

$path = "./uploads/";

// professor-delete code
// delete code
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['delete_btn'])) {
        require_once "./php/config.php";

        $hidden_id = $_POST['hidden_id'];
        // echo $hidden_id;

        // deleting record
        delete_record($hidden_id, $_POST['delete_btn']);
    }
}

// professor - grid delete code
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['delete_grid_btn'])) {

        require_once "./php/config.php";
        // get the id from the hidden input
        $grid_del_id = $_POST['delete_grid_id_value'];
        // echo $grid_del_id;
        delete_record($grid_del_id, $_POST['delete_grid_btn']);
    }
}







// function for deleting record from database
function delete_record($id, $table = array())
{
    require "./php/connection.php";
    include "./php/config.php";

    global $delete_success_alert;
    global $delete_error_alert;
    global $path;

    if (isset($table)) {

        $retrieve_query = "SELECT * FROM `professors` WHERE `id` = '$id' ";
        $retrieve_query_result = mysqli_query($con, $retrieve_query);
        $row = mysqli_num_rows($retrieve_query_result) > 0;
        if ($row) {
            while ($fetch_record = mysqli_fetch_assoc($retrieve_query_result)) {
                // session_start();
                $fetched_image = $fetch_record['image'];
                if (unlink($path . $fetched_image)) {
                    // echo "successfully deleted Image";

                } else {
                    // echo "we couldn't delete the image";
                }
                // session_start();
            }
        }

        $grid_delete_query = "DELETE FROM `professors` WHERE `id` = '$id' ";
        $grid_delete_query_result = mysqli_query($con, $grid_delete_query);
        if ($grid_delete_query_result) {
            // echo "Successfully Deleted a row from Database!";
            $delete_success_alert = true;
        } else {
            // echo "Cannot delete a row";
            $delete_error_alert = true;
        }
    }
}
