<?php
require_once "./php/connection.php";
include "./php/config.php";
// require_once "./php/professor.php";


// php code for retrieving data from database -->

// getting id from the url
$edit_id = $_GET['id'];

$retrieve_query = "SELECT * FROM `courses` WHERE `id` = '$edit_id' ";
$retrieve_query_result = mysqli_query($con, $retrieve_query);
$row = mysqli_num_rows($retrieve_query_result);
if ($row > 0) {
	while ($fetch_record = mysqli_fetch_assoc($retrieve_query_result)) {

	// get the data from the database
	$course_name = mysqli_real_escape_string($con, $fetch_record['course_name']);
	$course_code = mysqli_real_escape_string($con, $fetch_record['course_code']);
	$course_details = mysqli_real_escape_string($con, $fetch_record['course_details']);
	$start_form = mysqli_real_escape_string($con, $fetch_record['start_form']);
	$course_duration = mysqli_real_escape_string($con, $fetch_record['course_duration']);
	$course_price = mysqli_real_escape_string($con, $fetch_record['course_price']);
	$professor_name = mysqli_real_escape_string($con, $fetch_record['professor_name']);
	$maximum_students = mysqli_real_escape_string($con, $fetch_record['maximum_students']);
	$contact_number = mysqli_real_escape_string($con, $fetch_record['contact_number']);
	$image = mysqli_real_escape_string($con, $fetch_record['image']);


	}
}

if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['edit_course_btn'])){

	// get the data from the form
	$course_name = mysqli_real_escape_string($con, $_POST['course_name']);
	$course_code = mysqli_real_escape_string($con, $_POST['course_code']);
	$course_details = mysqli_real_escape_string($con, $_POST['course_details']);
	$start_form = mysqli_real_escape_string($con, $_POST['start_form']);
	$course_duration = mysqli_real_escape_string($con, $_POST['course_duration']);
	$course_price = mysqli_real_escape_string($con, $_POST['course_price']);
	$professor_name = mysqli_real_escape_string($con, $_POST['professor_name']);
	$maximum_students = mysqli_real_escape_string($con, $_POST['maximum_students']);
	$contact_number = mysqli_real_escape_string($con, $_POST['contact_number']);
 

	if(!preg_match($number , $_POST['course_code'])){
        // echo '<h1>Please Enter a Valid Course Code!</h1>';
        $course_code_alert = true;
    } elseif (!preg_match($number, $_POST['contact_number'])) {
		// echo "<h1>Please Enter a valid Contact Number!</h1>";
		$contact_number_alert = true;
	} elseif (strlen($_POST['contact_number']) > 11) {
		// echo "<h1>Mobile Number limit Exceeds!</h1>";
		$contact_number_limit_alert = true;
	} elseif(!preg_match($name, $_POST['professor_name'])){
        // echo '<h1>Please Enter a valid Professor name!</h1>';
        $professor_name_alert = true;
	}
    // } elseif(!preg_match($number , $_POST['maximum_students'])){
    //     // echo '<h1>Please Enter a valid digit!</h1>';
    //     $maximum_students_alert = true;
    // }

	else {

		if(!preg_match($number , $_POST['maximum_students'])){
			// echo '<h1>Please Enter a valid digit!</h1>';
			$maximum_students_alert = true;
		}
		else {

			// insert the updated data into database 
			$update_query = "UPDATE `courses` SET `course_name` = '$course_name', 
			`course_details` = '$course_details', `start_form` = '$start_form', 
			`course_duration` = '$course_duration', `course_price` = '$course_price', 
			`professor_name` = '$professor_name', `maximum_students` = '$maximum_students',
			`contact_number` = '$contact_number' WHERE `courses`.`id` = '$edit_id '";

			$update_query_result = mysqli_query($con, $update_query);
			if ($update_query_result) {
				// echo "<h1>Your Account have been Updated Successfully!</h1>";
				$edit_success_alert = true;
			} else {
				// echo "<h1>Cannot Insert Record due to some Error!</h1>";
				$edit_error_alert = true;
			}
		}
	}

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Edumin - Bootstrap Admin Dashboard </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <link rel="stylesheet" href="vendor/bootstrap-select/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="css/style.css">
	
	<!-- Pick date -->
    <link rel="stylesheet" href="vendor/pickadate/themes/default.css">
    <link rel="stylesheet" href="vendor/pickadate/themes/default.date.css">

</head>

<body>

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
		<?php include "nav_header.php"; ?>

        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
		<?php include "header_start.php"; ?>

        <!--**********************************
            Header end 
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
		<?php include "teacher_sidebar.php" ?>

        <!--**********************************
            Sidebar end
        ***********************************-->

		
		
        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
            <div class="container-fluid">
				<!-- adding php code -->
				<?php

                if ($course_name_alert) {
                	// bootstrap dialogue 
                	echo '				
                	<div class="alert alert-danger text-white bg-red " role="alert">
                	Please Enter a valid Course Name.
                	</div>
                	';
                	// <!-- bootstrap dialogue 
                }
                
                if ($course_code_alert) {
                	// bootstrap dialogue 
                	echo '				
                	<div class="alert alert-danger text-white bg-red " role="alert">
                	Please Enter a valid Course Code.
                	</div>
                	';
                	// <!-- bootstrap dialogue 
                }
                if ($course_details_alert) {
                	// bootstrap dialogue 
                	echo '				
                	<div class="alert alert-danger text-white bg-red " role="alert">
                	Please Enter a valid Course Details.
                	</div>
                	';
                	// <!-- bootstrap dialogue 
                }
                if ($contact_number_alert) {
                	// bootstrap dialogue 
                	echo '				
                	<div class="alert alert-danger text-white bg-red" role="alert">
                	Please Enter a valid Contact number.
                	</div>
                	';
                	// <!-- bootstrap dialogue 
                }
                if ($contact_number_limit_alert) {
                	// bootstrap dialogue 
                	echo '				
                	<div class="alert alert-danger text-white bg-red" role="alert">
                	Contact Number Limit Exceeds.
                	</div>
                	';
                	// <!-- bootstrap dialogue 
                }
                if ($professor_name_alert) {
                	// bootstrap dialogue 
                	echo '				
                	<div class="alert alert-danger text-white bg-red" role="alert">
                	Please Enter a valid Professor Name.
                	</div>
                	';
                	// <!-- bootstrap dialogue 
                }
                if ($maximum_students_alert) {
                	// bootstrap dialogue 
                	echo '				
                	<div class="alert alert-danger text-white bg-red" role="alert">
                	Please Enter a valid Maximum Students.
                	</div>
                	';
                	// <!-- bootstrap dialogue 
                }       
                if ($image_exists_alert) {
                	// bootstrap dialogue 
                	echo '				
                	<div class="alert alert-danger text-white bg-red" role="alert">
                	Image Already Exists.
                	</div>
                	';
                	// <!-- bootstrap dialogue 
                }
                if ($course_code_exists_alert) {
                	// bootstrap dialogue 
                	echo '				
                	<div class="alert alert-danger text-white bg-red" role="alert">
                	Course Code Already Exists.
                	</div>
                	';
                	// <!-- bootstrap dialogue 
                }
                if ($mobile_number_exists_alert) {
                	// bootstrap dialogue 
                	echo '				
                	<div class="alert alert-danger text-white bg-red" role="alert">
                		Contact Number Already Exists.
                	</div>
                	';
                	// <!-- bootstrap dialogue 
                }
                if ($edit_success_alert) {
                	// bootstrap dialogue 
                	echo '				
                	<div class="alert alert-success text-black" role="alert">
                		Your Account has been updated Successfully.!
                	  </div>
                	';
                	// <!-- bootstrap dialogue 
                }
                if ($edit_error_alert) {
                	// bootstrap dialogue 
                	echo '				
                	<div class="alert alert-danger text-white bg-red" role="alert">
                	Sorry! We couldnot update Your account Due to some Error.
                	</div>
                	';
                	// <!-- bootstrap dialogue 
                }
                
                ?>
				    
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Edit Course</h4>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0);">Courses</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0);">Edit Course</a></li>
                        </ol>
                    </div>
                </div>
				
				<div class="row">
					<div class="col-lg-12">
						<div class="card">
							<div class="card-header">
								<h4 class="card-title">Courses Details</h4>
							</div>
							<div class="card-body">
							<form action="#" method="POST" enctype="multipart/form-data">
									<div class="row">
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Course Name</label>
												<input type="text" name="course_name" value="<?php if(isset($course_name)) echo $course_name ?>" class="form-control" required>
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Course Code</label>
												<input type="text" name="course_code" value="<?php if(isset($course_code)) echo $course_code ?>" class="form-control" required>
											</div>
										</div>
										<div class="col-lg-12 col-md-12 col-sm-12">
											<div class="form-group">
												<label class="form-label">Course Details</label>
												<textarea class="form-control" name="course_details" rows="5" required>
													<?php if(isset($course_details)) echo $course_details ?>
												</textarea>
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Start Form</label>
												<input type="date" name="start_form" value="<?php if(isset($start_form)) echo $start_form ?>" class="datepicker form-control" id="datepicker" required>
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Course Duration</label>
												<select class="form-control" name="course_duration" required>
													<option value="Select">Select</option>
													<option value="3 Months">3 Months</option>
													<option value="6 Months">6 Months</option>
													<option value="1 year">1 year</option>
													<option value="2 years">2 years</option>
												</select>
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Course Price</label>
												<input type="text" name="course_price" value="<?php if(isset($course_price)) echo $course_price ?>" class="form-control" required>
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Professor Name</label>
												<input type="text" name="professor_name" value="<?php if(isset($professor_name)) echo $professor_name ?>" class="form-control" required>
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Maximum Students</label>
												<input type="text" name="maximum_students" value="<?php if(isset($maximum_students)) echo $maximum_students ?>" class="form-control"required>
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Contact Number</label>
												<input type="text" name="contact_number" value="<?php if(isset($contact_number)) echo $contact_number ?>" class="form-control" required>
											</div>
										</div>
										<!-- <div class="col-lg-12 col-md-12 col-sm-12">
											<div class="form-group fallback w-100">
												<input type="file" name="image" class="dropify" required>
											</div>
										</div> -->
										<div class="col-lg-12 col-md-12 col-sm-12">
											<button type="submit" name="edit_course_btn" class="btn btn-primary">Update Course</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->
        <?php include "footer.php" ?>
        <!--**********************************
            Footer end
        ***********************************-->




    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
<script src="vendor/global/global.min.js"></script>
	<script src="vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="js/custom.min.js"></script>
	<script src="js/dlabnav-init.js"></script>
	
	<!-- pickdate -->
    <script src="vendor/pickadate/picker.js"></script>
    <script src="vendor/pickadate/picker.time.js"></script>
    <script src="vendor/pickadate/picker.date.js"></script>
	
	<!-- Pickdate -->
    <script src="js/plugins-init/pickadate-init.js"></script>
	
</body>
</html>