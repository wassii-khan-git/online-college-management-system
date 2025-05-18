<?php

include("./php/connection.php");

// form validation variables
// validation variables
$name = "/^[a-zA-Z ]+$/";
$emailValidation = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$/";
$number = "/^([0-9]+)$/";
// $number_regex = "/^[0-9-]+$/";
// $numpattern="/^([0-9.-]+)$/";




// creating Registrarion_alert variables
$first_name_alert = false;
$last_name_alert = false;
$email_alert = false;
$password_alert = false;
$confirm_password_alert = false;
$mobile_number_alert = false;
$mobile_number_limit_alert = false;
$education_alert = false;

// all field required alert
$all_fields_empty_alert = false;
$all_fields_empty_error_msg = "";


// first name error messages
$first_name_error_msg = "";
$last_name_error_msg = "";
$email_error_msg = "";
$password_error_msg = "";
$confirm_password_error_msg = "";
$mobile_number_error_msg = "";
$mobile_number_limit_error_msg = "";
$education_error_msg = "";

// image errors vars
$image_exists_error_msg = "";
$image_size_error_msg = "";
$email_exists_error_msg = "";

$mobile_number_exists_error_msg = "";
$success_error_msg = "";
$insert_record_error_msg = "";
$image_support_error_msg = "";




// extra variables for need
$image_exists_alert = false;
$image_size_alert = false;
$email_exists_alert = false;

$mobile_number_exists_alert = false;
$success_alert = false;
$insert_record_alert = false;
$image_support_alert = false;


// delete row variables
$delete_success_alert = false;
$delete_error_alert = false;

// edit success alert
$edit_success_alert = false;
$edit_error_alert = false;

// edit error message
$edit_success_error_msg = "";
$edit_error_error_msg = "";

// students variables
$parent_name_alert = false;
$parent_mobile_number_alert = false;
$parent_mobile_number_limit_alert = false;
$address_alert = false;
$password_alert = false;
$roll_no_alert = false;
$roll_no_already_exists_alert = false;

// student error message
$parent_name_error_msg = "";
$parent_mobile_number_error_msg = "";
$parent_mobile_number_limit_error_msg = "";
$address_error_msg = "";
$password_error_msg = "";
$roll_no_error_msg = "";
$roll_no_already_exists_error_msg = "";


// courses variables
$course_name_alert = false;
$course_details_alert = false;
$contact_number_alert = false;
$course_price_alert = false;
$contact_number_limit_alert = false;
$course_code_alert = false;
$course_code_exists_alert = false;
$professor_name_alert = false;
$maximum_students_alert = false;

// courses error msgs
$course_name_error_msg = "";
$course_details_error_msg = "";
$contact_number_error_msg = "";
$contact_number_limit_error_msg = "";
$course_code_error_msg = "";
$course_code_exists_error_msg = "";
$professor_name_error_msg = "";
$maximum_students_error_msg = "";
$course_price_error_msg = "";

// library variables
$title_alert = false;
$author_name_alert = false;
$publisher_alert = false;
$asset_details_alert = false;
$price_alert = false;
$title_exists_error_msg = "";
$title_exists_alert = false;

// library error variables
$title_error_msg = "";
$author_name_error_msg = "";
$publisher_error_msg = "";
$asset_details_error_msg = "";

$price_alert_error_msg = "";

// attendance variables
$present_flag = false;
$present_flag_error = false;
$absent_flag = false;
$absent_flag_error = false;
$class_alert = false;
$grade_code_alert = false;

// fee variables
$roll_no_alert = false;
$roll_no_exists_alert = false;
$student_name_alert = false;
$amount_alert = false;
$reciept_number_alert = false;
$reciept_number_exists_alert = false;

// fee error messages
$roll_no_error_msg = "";
$roll_no_exists_error_msg = "";
$student_name_error_msg = "";
$amount_error_msg = "";
$reciept_number_error_msg = "";
$reciept_number_exists_error_msg = "";


// date of birth variables

$current_date = date("Y-m-d");
$date_of_birth_alert = false;
$date_of_birth_error_msg = "";

$joining_data_alert = false;
$joining_data_error_msg = "";

// attendance exists variables
$attendance_exists_alert = false;
$attendance_empty_alert = false;

// admin variables
$username_alert = false;
$username_alert_error_msg = false;
$admin_email_alert = false;

// teacher forgot variables
$teacher_email_alert = false;

$invalid_success_alert = false;


// login page variables
// $login_error_alert = false;
// $email_field_empty_alert  = false;
// $password_field_empty_alert  = false;
// $all_fields_empty_alert  = false;

// function for selecting all the records from database











// file upload edit-professor.php code
// file upload code
// elseif ($_FILES['image']['error'] == 0) {

// 	// array for image types
// 	$image_array = array("jpeg", "jpg", "png");

// 	$file_name = $_FILES['image']['name'];
// 	$file_tmp_name = $_FILES['image']['tmp_name'];
// 	$file_type = $_FILES['image']['type'];
// 	$file_size = $_FILES['image']['size'];
// 	$file_dir = "./uploads/";

// 	// seperate the extension from the file
// 	$file_extension = explode('.', $file_name);
// 	$file_extension_lower_case = strtolower(end($file_extension));

// 	// create the hash of image file
// 	$hash_image = hash("md5", $file_name, false);
// 	$hash_image_exact = $hash_image . '.' . $file_extension_lower_case;

// 	// echo $hash_image_exact;
// 	// echo $file_dir.$file_name;

// 	if (file_exists($file_dir . $hash_image_exact)) {
// 		// echo "<h1>Image already exists!</h1>";
// 		$image_exists_alert = true;
// 	} else {
// 		// check the file size
// 		if ($file_size > 1000000) {
// 			// echo "<h1>Image is too large!</h1>";
// 			$image_size_alert = true;
// 		}
// 		if (in_array($file_extension_lower_case, $image_array)) {
// 			// echo "<h1>Image type Supported!</h1>";

// 		}

// 			$email_query = "SELECT * FROM `professors` WHERE `email` = '$email' ";
// 			$email_res = mysqli_query($con, $email_query);
// 			$email_row = mysqli_num_rows($email_res);

// 			if ($email_row == 1) {
// 				// echo "<h1>Email already exists</h1>";
// 				$email_exists_alert = true;
// 			} else {
// 				// echo "<h1>Email doesnot exist </h1>";

// 				// check if the mobile number already exists
// 				// $mobile_number_query = "SELECT * FROM `professors` WHERE `mobile_number` = '$_update_mobile_number' ";
// 				// $mobile_number_res = mysqli_query($con, $mobile_number_query);
// 				// $mobile_number_row = mysqli_num_rows($mobile_number_res);

// 				// if ($mobile_number_row == 1) {
// 				// 	// echo "<h1>Mobile Number already exists</h1>";
// 				// 	$mobile_number_exists_alert = true;
// 				// } else {
// 				// 	// echo "<h1>Mobile Number doesnot exist Proceed to Add record!... </h1>";
// 				// }
// 			        // upload the file
// 			        $upload = move_uploaded_file($file_tmp_name, $file_dir . $hash_image_exact);
// 			        // echo "<h1>Image Successfully uploaded!</h1>";

// 					// insert the updated data into database 
// 					$update_query = "UPDATE `professors` SET `firstname` = '$first_name', `lastname` = '$last_name',
// 						`email`= '$email', `joining_data` = '$joining_data', `password`='$hashed_pass',
// 						`mobile_number` = '$_update_mobile_number', `gender` = '$gender' , `date_of_birth` = '$date_of_birth', `education`='$education',
// 						`image` = '$hash_image_exact' WHERE `id` = '$edit_id' ";

// 					$update_query_result = mysqli_query($con, $update_query);
// 					if ($update_query_result) {
// 						// echo "<h1>Your Account have been Updated Successfully!</h1>";
// 						$edit_success_alert = true;
// 					} else {
// 						// echo "<h1>Cannot Insert Record due to some Error!</h1>";
// 						$edit_error_alert = true;
// 					}
// 				}
// 			}
// 		}

// }
