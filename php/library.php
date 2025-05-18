<?php

//  database connection 
require "./php/connection.php";

$path = "./uploads/";

// config file
require "./php/config.php";

// starting session
session_start();


if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['add_library_btn'])) {

	// get the data from the form
	$title = mysqli_real_escape_string($con, $_POST['title']);
	$subject = mysqli_real_escape_string($con, $_POST['subject']);
	$author_name = mysqli_real_escape_string($con, $_POST['author_name']);
	$publisher = mysqli_real_escape_string($con, $_POST['publisher']);
	$asset_type = mysqli_real_escape_string($con, $_POST['asset_type']);
	$purchase_date = mysqli_real_escape_string($con, $_POST['purchase_date']);
	$price = mysqli_real_escape_string($con, $_POST['price']);
	$status = mysqli_real_escape_string($con, $_POST['status']);
	$asset_details = mysqli_real_escape_string($con, $_POST['asset_details']);


	if (!preg_match($name, $_POST['title'])) {
		// echo "<h1>Please Enter a valid Title!</h1>";
		$title_error_msg = "Please Enter a valid Title!";
		$title_alert = true;
	} else {

		// check if the title already exists in the database
		$library_query = "SELECT * FROM `library` WHERE `title` = '$title' ";
		$library_res = mysqli_query($con, $library_query);
		$library_row = mysqli_num_rows($library_res);
		if ($library_row == 1) {
			// echo "<h1>contact_code already exists</h1>";
			$title_exists_error_msg = "Title already exists";
			$title_exists_alert = true;
		} else {

			if (!preg_match($name, $_POST['author_name'])) {
				// echo "<h1>Please Enter a valid Author Name!</h1>";
				$author_name_error_msg = "Please Enter a valid Author Name!";
				$author_name_alert = true;
			} else {


				if (!preg_match($name, $_POST['publisher'])) {
					// echo "<h1>Please Enter a valid Publisher Name!</h1>";
					$publisher_eror_msg = "Please Enter a valid Publisher Name!";
					$publisher_alert = true;
				} else {

					if (!preg_match($number, $_POST['price'])) {
						// echo "<h1>Please Enter a valid Price!</h1>";
						$price_alert_error_msg = "Please Enter a valid Price!";
						$price_alert = true;
					} else {

						// insert the data into database
						$query = "INSERT INTO `library` (`id`, `title`, `subject`, `author_name`, 
                `publisher`, `asset_type`, `purchase_date`, `price`, `status`, 
                `asset_details`) VALUES (Null, '$title', '$subject', '$author_name', 
                '$publisher', '$asset_type', '$purchase_date', '$price', '$status',
                '$asset_details')";
						$result = mysqli_query($con, $query);

						if ($result) {
							// echo "<h1>Your Account have been Created Successfully!</h1>";
							$success_alert = true;
							$_SESSION['library_insert_check'] = true;
							$_SESSION['library_insert_title'] = $title;
							header("Location:library-image-upload.php");
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

// end of the code





$path = "./uploads/";
// delete code
if ($_SERVER['REQUEST_METHOD'] == "POST") {
	if (isset($_POST['delete_library_btn'])) {

		require_once "./php/config.php";

		$hidden_id = $_POST['hidden_id'];
		// echo $hidden_id;

		// deleting record
		delete_record_Without_image($hidden_id, $_POST['delete_library_btn']);
	}
}




// function for deleting record from database
function delete_record_Without_image($id, $table = array())
{
	require "./php/connection.php";
	include "./php/config.php";

	global $delete_success_alert;
	global $delete_error_alert;
	global $path;

	if (isset($table)) {




		$retrieve_query = "SELECT * FROM `library` WHERE `id` = '$id' ";
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

		$grid_delete_query = "DELETE FROM `library` WHERE `id` = '$id' ";
		$grid_delete_query_result = mysqli_query($con, $grid_delete_query);
		if ($grid_delete_query_result) {
			// echo "Successfully Deleted a row from Database!";
			$delete_success_alert = true;
		} else {
			// echo "Cannot delete a row";
			$delete_error_alert = true;
		}
	} else {
		echo "we couldn't delete the record";
	}
}


if ($_SERVER['REQUEST_METHOD'] == "POST") {
	if (isset($_POST['library_edit_btn'])) {
		echo "working";
		$hidden_library_value = $_POST['hidden_library_value'];
		$_SESSION['hidden_library_value'] = $hidden_library_value;
		header("Location:edit-library.php");
		exit;
	}
}
