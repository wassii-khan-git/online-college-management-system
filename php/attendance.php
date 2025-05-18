<?php

session_start();

include_once("./php/config.php");
include_once("./php/connection.php");

 if(isset($_SESSION['subject'])){
	$class = $_SESSION['subject'];
 } 



// grade addition code
if ($_SERVER['REQUEST_METHOD'] == "POST") {
	if (isset($_POST['add_attendance_class_btn'])) {

		$grade_code = mysqli_real_escape_string($con, $_POST['grade_code']);
		$grade = mysqli_real_escape_string($con, $_POST['grade']);
		echo $subject = mysqli_real_escape_string($con ,$_POST['classes']);

		

		if (!preg_match($number, $_POST['grade_code'])) {
			// echo "Please Enter a valid grade Code!";
			$grade_code_alert = true;
		} else {

			// check if the grade code already exists
			$grade_check_query = "SELECT * FROM `attendance_grade` WHERE `grade_code` = '$grade_code' ";
			$grade_check_query_res = mysqli_query($con, $grade_check_query);
			$grade_check_query_row = mysqli_num_rows($grade_check_query_res);
			if ($grade_check_query_row > 0) {
				// echo "Grade Code Already Exists";
				$class_alert = true;
			} else {

				// echo "Good to go";

				// insert the grade into the datebase
				$grade_insert_query = "INSERT INTO `attendance_grade` (`grade_code` , `grade`, `subject`, `date`) VALUES('$grade_code' , '$grade' , '$subject' , current_timestamp())	";
				$grade_insert_query_res = mysqli_query($con, $grade_insert_query);
				if ($grade_insert_query) {
					// echo "Your Class has been Created SuccessFully!";
					$success_alert = true;
				} else {
					// echo "Failed to Create your Class!";
					$insert_record_alert = true;
				}
			}
		}
	}
}


// all grade code
if (isset($_POST['view_details'])) {
	// echo "working";
	$subject =  $_POST['hidden_subject'];
	$_SESSION['subject'] = $subject;
	header("Location:grade_details.php");
}



// view report btn code
if ($_SERVER['REQUEST_METHOD'] == "POST") {
	if (isset($_POST['view_report_btn'])) {
		if (!empty($_POST['view_report_btn'])) {
			// "working <br>";
			$_SESSION['hidden_roll_number'] = $_POST['hidden_roll_number'];
			header("Location:view-student-attendance-report.php");
		}
	}
}








// add today attendance code
if ($_SERVER['REQUEST_METHOD'] == "POST") {
	if (isset($_POST['submit_Attendance_btn'])) {
		// echo "working <br>";

		if (empty($_POST['attendance_status']) || empty($_POST['date'])) {
			// echo "please mark an attendance First";
			$attendance_empty_alert = true;
		} else {

			$current_date = $_POST['date'];

			// $current_date = date("Y-m-d");

			// check if the attendance is already marked on this date
			$select_query = "SELECT * FROM `attendance_records` WHERE `attendance_date` = '$current_date' AND `attendance_class` = '$class' ";
			// print_r($select_query);	
			$select_query_res = mysqli_query($con, $select_query);
			$select_query_row = mysqli_num_rows($select_query_res);
			if ($select_query_row > 0) {
				// echo "Attendance Already Exists on this date";
				$attendance_exists_alert = true;
			} else {


				foreach ($_POST['attendance_status'] as $key => $value) {

					$value;
					$hidden_name = $_POST['hidden_name'][$key];
					$hidden_roll_no = $_POST['hidden_roll_no'][$key];
					$hidden_class = $_POST['hidden_department'][$key];

					// insert the grade into the datebase
					$insert_query = "INSERT INTO `attendance_records` (`name` , `roll_no`, `attendance_class` , `attendance_status`, `attendance_date`) VALUES('$hidden_name' , '$hidden_roll_no' , '$hidden_class' , '$value' , '$current_date') ";
					// print_r($insert_query);
					$insert_query_res = mysqli_query($con, $insert_query);
					if ($insert_query_res) {
						// echo "Your Class has been Created SuccessFully!";
						$success_alert = true;
					} else {
						// echo "Failed to Create your Class!";
						$insert_record_alert = true;
					}
				}
			}
		}
	}
}












// if ($_SERVER['REQUEST_METHOD'] == "POST") {
// 	if (isset($_POST['present'])) {
// 		// echo "present_working <br>";
// 		$present = $_POST['present'];
// 		$hidden_id = $_POST['hidden_id'];
// 		// echo $present;
// 		// echo $hidden_id;

// 		// insert it into the database
// 		$insert_attendance_query = "UPDATE `students` SET `status` = '$present'  WHERE `id` = '$hidden_id' ";
// 		$insert_attendance_result = mysqli_query($con, $insert_attendance_query);
// 		if ($insert_attendance_query) {
// 			// echo '<h1>Inserted Successfully !</h1>';
// 			$present_flag = true;
// 		} else {
// 			// echo '<h1>Cannot insert the status due to some error !</h1>';
// 			$present_flag_error = true;
// 		}
// 	}

// 	if (isset($_POST['absent'])) {
// 		// echo "absent_working <br>";
// 		$absent = $_POST['absent'];
// 		$hidden_id = $_POST['hidden_id'];
// 		// echo $absent;
// 		// echo $hidden_id;


// 		// insert it into the database
// 		$insert_attendance_query = "UPDATE `students` SET `status` = '$absent'  WHERE `id` = '$hidden_id' ";
// 		$insert_attendance_result = mysqli_query($con, $insert_attendance_query);
// 		if ($insert_attendance_query) {
// 			// echo '<h1>Inserted Successfully !</h1>';
// 			$absent_flag = true;
// 		} else {
// 			// echo '<h1>Cannot insert the status due to some error !</h1>';
// 			$absent_flag_error = true;
// 		}
// 	}
// }
