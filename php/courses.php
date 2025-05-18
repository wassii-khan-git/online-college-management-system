<?php

//  database connection 
require "./php/connection.php";

$path = "./uploads/";

// config file
require_once "./php/config.php";

// starting session
// session_start();


if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['add_course'])) {

	// get the data from the form
	$course_name = mysqli_real_escape_string($con, $_POST['course_name']);
	$course_code = mysqli_real_escape_string($con, $_POST['course_code']);
	$course_details = mysqli_real_escape_string($con, $_POST['course_details']);
	$course_for_class = mysqli_real_escape_string($con, $_POST['course_for_class']);
	$professor_name = mysqli_real_escape_string($con, $_POST['professor_name']);
	$contact_number = mysqli_real_escape_string($con, $_POST['contact_number']);


	// Regex variables
	$name = "/^[a-zA-Z ]+$/";
	$emailValidation = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$/";
	$number = "/^([0-9]+)$/";

	if (!preg_match($name, $_POST['course_name'])) {
		// echo "<h1>Please Enter a valid Course Name!</h1>";
		$course_name_error_msg = "Please Enter a valid Course Name!";
		$course_name_alert = true;
	} elseif (!preg_match($number, $_POST['course_code'])) {
		// echo '<h1>Please Enter a Valid Course Code!</h1>';
		$course_code_error_msg = "Please Enter a valid Course Code!";
		$course_code_alert = true;
	} else {
		// check if the email already exist in the database
		$email_query = "SELECT * FROM `courses` WHERE `course_code` = '$course_code' ";
		$email_res = mysqli_query($con, $email_query);
		$email_row = mysqli_num_rows($email_res);
		if ($email_row == 1) {
			// echo "<h1>contact_code already exists</h1>";
			$course_code_exists_error_msg = "Course code already exists";
			$course_code_exists_alert = true;
		} else {

			if (!preg_match($name, $_POST['professor_name'])) {
				// echo '<h1>Please Enter a valid Professor name!</h1>';
				$professor_name_error_msg = "Please Enter a valid Professor name!";
				$professor_name_alert = true;
			} elseif (!preg_match($number, $_POST['contact_number'])) {
				// echo "<h1>Please Enter a valid Contact Number!</h1>";
				$contact_number_error_msg = "Please Enter a valid Contact Number!";
				$contact_number_alert = true;
			} elseif (strlen($_POST['contact_number']) > 11) {
				// echo "<h1>Mobile Number limit Exceeds!</h1>";
				$contact_number_limit_error_msg = "Contact Number limit Exceeds!";
				$contact_number_limit_alert = true;
			} else {

				// check if the mobile number already exists
				$mobile_number_query = "SELECT * FROM `courses` WHERE `contact_number` = '$contact_number' ";
				$mobile_number_res = mysqli_query($con, $mobile_number_query);
				$mobile_number_row = mysqli_num_rows($mobile_number_res);

				if ($mobile_number_row == 1) {
					// echo "<h1>Contact Number already exists</h1>";
					$mobile_number_exists_error_msg = "Contact Number already exists";
					$mobile_number_exists_alert = true;
				} else {
					// echo "<h1>Mobile Number doesnot exist Proceed to Add record!... </h1>";

					// insert the data into database

					$query = "INSERT INTO `courses` ( `course_name`, `course_code`, 
						`course_details`, `course_class` , `professor_name`, `contact_number`) 
						VALUES ('$course_name', '$course_code', '$course_details', '$course_for_class',
						 '$professor_name', '$contact_number')";


					$result = mysqli_query($con, $query);
					if ($result) {
						// echo "<h1>Your Account have been Created Successfully!</h1>";
						$success_alert = true;
						$_SESSION['course_insert_check'] = true;
						$_SESSION['course_insert_course_code'] = $course_code;
						header("Location:course_image_upload_page.php");
					} else {
						// echo "<h1>Cannot Insert Record due to some Error!</h1>";
						$insert_record_alert = true;
					}
				}
			}
		}
	}
}


// end of the code





// code for edit btn 
if ($_SERVER['REQUEST_METHOD'] == "POST") {
	if (isset($_POST['course_edit_btn'])) {
		echo "working";
		$hidden_course_edit_value = $_POST['hidden_edit_course_value'];
		echo $_SESSION['hidden_edit_course_value'] = $hidden_course_edit_value;
		header("Location:edit-courses.php");
		exit;
	}
	// code for profile btn
	if (isset($_POST['course_profile_btn'])) {
		echo "working";
		$hidden_profile_course_value = $_POST['hidden_profile_course_value'];
		echo $_SESSION['hidden_profile_course_value'] = $hidden_profile_course_value;
		header("Location:about-courses.php");
		exit;
	}
}








$path = "./uploads/";
// delete code
if ($_SERVER['REQUEST_METHOD'] == "POST") {
	if (isset($_POST['delete_course_btn'])) {

		require_once "./php/config.php";

		$hidden_id = $_POST['hidden_id'];
		// echo $hidden_id;

		// deleting record
		delete_record($hidden_id, $_POST['delete_course_btn']);
	}
}

// professor - grid delete code
if ($_SERVER['REQUEST_METHOD'] == "POST") {
	if (isset($_POST['delete_student_grid_btn'])) {

		require_once "./php/config.php";
		// get the id from the hidden input
		$grid_del_id = $_POST['delete_grid_id_value'];
		// echo $grid_del_id;
		// delete_record($grid_del_id , $_POST['delete_student_grid_btn']);

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

		$retrieve_query = "SELECT * FROM `courses` WHERE `id` = '$id' ";
		$retrieve_query_result = mysqli_query($con, $retrieve_query);
		$row = mysqli_num_rows($retrieve_query_result) > 0;
		if ($row) {
			while ($fetch_record = mysqli_fetch_assoc($retrieve_query_result)) {
				// session_start();
				$fetched_image = $fetch_record['image'];
				if (unlink($path . $fetched_image)) {
					echo "successfully deleted Image";
				} else {
					echo "we couldn't delete the image";
				}
				// session_start();
			}
		}

		$grid_delete_query = "DELETE FROM `courses` WHERE `id` = '$id' ";
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
