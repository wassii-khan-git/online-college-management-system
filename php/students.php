<?php

//  database connection 
require "./php/connection.php";

$path = "./uploads/";

// config file
require_once "./php/config.php";

// starting session
session_start();


if ($_SERVER['REQUEST_METHOD'] == "POST") {
	if (isset($_POST['add_student_record'])) {

		// get the data from the form
		$first_name = mysqli_real_escape_string($con, $_POST['firstname']);
		$last_name = mysqli_real_escape_string($con, $_POST['lastname']);
		$email = mysqli_real_escape_string($con, $_POST['email']);
		$password = mysqli_real_escape_string($con, $_POST['password']);
		$confirm_password = mysqli_real_escape_string($con, $_POST['confirm_password']);
		$registration_date = mysqli_real_escape_string($con, $_POST['registration_date']);
		$roll_no = mysqli_real_escape_string($con, $_POST['roll_no']);
		$class = mysqli_real_escape_string($con, $_POST['class']);
		$gender = mysqli_real_escape_string($con, $_POST['gender']);
		$mobile_number = mysqli_real_escape_string($con, $_POST['mobile_number']);
		$parents_name = mysqli_real_escape_string($con, $_POST['parents_name']);
		$parents_mobile_number = mysqli_real_escape_string($con, $_POST['parents_mobile_number']);
		$date_of_birth = mysqli_real_escape_string($con, $_POST['date_of_birth']);
		$address = mysqli_real_escape_string($con, $_POST['address']);


		// Regex variables
		$name = "/^[a-zA-Z ]+$/";
		$emailValidation = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$/";
		$number = "/^([0-9]+)$/";


		if (!preg_match($name, $_POST['firstname'])) {
			// echo "<h1>Please Enter a valid First Name!</h1>";
			$first_name_error_msg = "Please Enter a valid First Name!";
			$first_name_alert = true;
		} elseif (!preg_match($name, $_POST['lastname'])) {
			// echo "<h1>Please Enter a valid Last Name!</h1>";
			$last_name_error_msg = "Please Enter a valid Last Name!";
			$last_name_alert = true;
		} elseif (!preg_match($emailValidation, $_POST['email'])) {
			// echo "<h1>Please Enter a valid Email!</h1>";
			$email_error_msg = "Please Enter a valid Email!";
			$email_alert = true;
		} else {

			// check if the email already exist in the database
			$email_query = "SELECT * FROM `students` WHERE `email` = '$email' ";
			$email_res = mysqli_query($con, $email_query);
			$email_row = mysqli_num_rows($email_res);
			if ($email_row == 1) {
				// echo "<h1>Email already exists</h1>";
				$email_exists_error_msg = "Email already exists";
				$email_exists_alert = true;
			} else {
				// echo "<h1>Email doesnot exist </h1>";

				if ($registration_date !== $current_date) {
					$joining_data_alert = true;
					$joining_data_error_msg = "Please Enter today Date";
				} else {

					if (strlen($_POST['password']) < 5) {
						// echo "<h1>Weak password!</h1>";
						$password_error_msg = "Weak password!";
						$password_alert = true;
					} elseif ($_POST['password'] != $_POST['confirm_password']) {
						// echo "<h1>Password doesnot matched!</h1>";
						$confirm_password_error_msg = "Password doesnot matched!";
						$confirm_password_alert = true;
					} elseif (!preg_match($number, $_POST['roll_no'])) {
						$roll_no_alert = true;
						$roll_no_error_msg = "Please Enter a valid Roll no!";
					} else {


						// check if the roll no already exists in database
						$mobile_number_query = "SELECT * FROM `students` WHERE `roll_no` = '$roll_no' ";
						$mobile_number_res = mysqli_query($con, $mobile_number_query);
						$mobile_number_row = mysqli_num_rows($mobile_number_res);
						if ($mobile_number_row == 1) {

							$roll_no_already_exists_alert = true;
							$roll_no_already_exists_error_msg = "Roll Number already exists";
						} else {

							if (!preg_match($number, $_POST['mobile_number'])) {
								// echo "<h1>Please Enter a valid Number!</h1>";
								$mobile_number_error_msg = "Please Enter a valid Number!";
								$mobile_number_alert = true;
							} else {

								if (strlen($_POST['mobile_number']) > 11) {
									// echo "<h1>Mobile Number limit Exceeds!</h1>";
									$mobile_number_limit_error_msg = "Mobile Number limit Exceeds!";
									$mobile_number_limit_alert = true;
								} else {

									// check if the mobile number already exists
									$mobile_number_query = "SELECT * FROM `students` WHERE `mobile_number` = '$mobile_number' ";
									$mobile_number_res = mysqli_query($con, $mobile_number_query);
									$mobile_number_row = mysqli_num_rows($mobile_number_res);
									if ($mobile_number_row == 1) {
										// echo "<h1>Mobile Number already exists</h1>";
										$mobile_number_exists_error_msg = "Mobile Number already exists";
										$mobile_number_exists_alert = true;
									} else {

										if (!preg_match($name, $_POST['parents_name'])) {
											// echo "<h1>Please Enter a Parent Name!</h1>";
											$parent_name_error_msg = "Please Enter a valid Parent Name!";
											$parent_name_alert = true;
										} else {

											if (!preg_match($number, $_POST['parents_mobile_number'])) {
												// echo "<h1>Please Enter a Parent Name!</h1>";
												$parent_mobile_number_error_msg = "Please Enter a valid Parent mobile Number!";
												$parent_mobile_number_alert = true;
											} else {

												// check if the date of birth is valid
												if ($date_of_birth <= "1990-30-12" || $date_of_birth >= "2010-30-12") {
													$date_of_birth_alert = true;
													$date_of_birth_error_msg = "Please Enter a valid date of birth";
												} else {

													$query = "INSERT INTO `students` (`id`, `firstname`, `lastname`, `email`, 
										`registration_date`, `roll_no` ,`class`, `gender`, `mobile_number`, `parents_name`, 
										`parents_mobile_number`, `date_of_birth`, `adress`, `date`) 
										VALUES (NULL, '$first_name', '$last_name', '$email', '$registration_date', '$roll_no' , 
										'$class', '$gender', '$mobile_number', '$parents_name', '$parents_mobile_number',
										'$date_of_birth', '$address', current_timestamp()) ";


													$result = mysqli_query($con, $query);
													if ($result) {
														// echo "<h1>Your Account have been Created Successfully!</h1>";
														$success_alert = true;
														$_SESSION['student_insert_check'] = true;
														$_SESSION['student_insert_check_email'] = $email;
														header("Location:student_image_upload_page.php");
													} else {
														// echo "<h1>Cannot Insert Record due to some Error!</h1>";
														$insert_record_alert = true;
													}
												}
											}
										}
									}
								}
							}
						}
					}
				}
			}
		}
	}
}
// end of the code

























$path = "./uploads/";
// delete code
if ($_SERVER['REQUEST_METHOD'] == "POST") {
	if (isset($_POST['delete_student_btn'])) {

		require_once "./php/config.php";

		$hidden_id = $_POST['hidden_id'];
		// echo $hidden_id;

		// deleting record
		delete_record($hidden_id, $_POST['delete_student_btn']);
	}
}

// professor - grid delete code
if ($_SERVER['REQUEST_METHOD'] == "POST") {
	if (isset($_POST['delete_student_grid_btn'])) {

		require_once "./php/config.php";
		// get the id from the hidden input
		$grid_del_id = $_POST['delete_grid_id_value'];
		// echo $grid_del_id;
		delete_record($grid_del_id, $_POST['delete_student_grid_btn']);
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

		$retrieve_query = "SELECT * FROM `students` WHERE `id` = '$id' ";
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

		$grid_delete_query = "DELETE FROM `students` WHERE `id` = '$id' ";
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







// edit submit button code
if ($_SERVER['REQUEST_METHOD'] == "POST") {
	if (isset($_POST['edit_btn'])) {
		echo "working";
		$edit_box_value = $_POST['hidden_edit_box'];
		$_SESSION['edit_student_box_value'] = $edit_box_value;
		header("Location:edit-student.php");
		exit;
	}

	// edit grid btn code
	if (isset($_POST['edit_grid_btn'])) {
		echo "working";
		$edit_grid_box_value = $_POST['hidden_edit_grid_box'];
		$_SESSION['hidden_edit_grid_box'] = $edit_grid_box_value;
		header("Location:edit-student-grid.php");
		exit;
	}

	// profile btn code
	if (isset($_POST['profile_btn'])) {
		echo "working";
		$profile_value = $_POST['hidden_profile_box'];
		$_SESSION['hidden_student_profile_box'] = $profile_value;
		header("Location:about-student.php");
		exit;
	}

	// profil grid  btn code
	if (isset($_POST['profile_grid_btn'])) {
		echo "working";
		$profile_value = $_POST['hidden_profile_grid_box'];
		$_SESSION['hidden_student_profile_box'] = $profile_value;
		header("Location:about-student.php");
		exit;
	}
}











						// // upload the file
						// $upload = move_uploaded_file($file_tmp_name, $file_dir . $hash_image_exact);
						// // echo "<h1>Image Successfully uploaded!</h1>";

						// // insert the data into database

						// $query = "INSERT INTO `students` (`id`, `firstname`, `lastname`, `email`, 
						// `registration_date`, `class`, `gender`, `mobile_number`, `parents_name`, 
						// `parents_mobile_number`, `date_of_birth`, `adress`, `image`, `date`) 
						// VALUES (NULL, '$first_name', '$last_name', '$email', '$registration_date', 
						// '$class', '$gender', '$mobile_number', '$parents_name', '$parents_mobile_number',
					    // '$date_of_birth', '$address', '$hash_image_exact', current_timestamp()) ";
