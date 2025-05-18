<?php
include_once("admin/admin-login.php");

// session_start();

include_once "./php/connection.php";
include_once "./php/config.php";
include "./php/courses.php";

// check if the user is logged in, if not redirect him to login page
if (!isset($_SESSION['logged']) || $_SESSION['logged'] !== true) {
	header("Location: not-found.php");
	exit;
}



?>

<?php





$edit_id = $_SESSION['hidden_edit_course_value'];

// php code for retrieving data from database -->

// getting id from the url
// $edit_id = $_GET['id'];


$retrieve_query = "SELECT * FROM `courses` WHERE `id` = '$edit_id' ";
$retrieve_query_result = mysqli_query($con, $retrieve_query);
$row = mysqli_num_rows($retrieve_query_result);
if ($row > 0) {
	while ($fetch_record = mysqli_fetch_assoc($retrieve_query_result)) {

		// get the data from the database
		$fetched_course_name = mysqli_real_escape_string($con, $fetch_record['course_name']);
		$fetched_course_code = mysqli_real_escape_string($con, $fetch_record['course_code']);
		$fetched_course_details = mysqli_real_escape_string($con, $fetch_record['course_details']);
		$fetched_course_class = mysqli_real_escape_string($con, trim($fetch_record['course_class']));
		$fetched_professor_name = mysqli_real_escape_string($con, $fetch_record['professor_name']);
		$fetched_contact_number = mysqli_real_escape_string($con, $fetch_record['contact_number']);
		$fetched_image = mysqli_real_escape_string($con, $fetch_record['image']);

		// print("<pre>");
		// print_r($fetch_record);
		// print("</pre>");

	}
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
	if (isset($_POST['edit_course_btn'])) {

		// echo "working";

		// get the data from the form
		$course_name = mysqli_real_escape_string($con, $_POST['course_name']);
		$course_code = mysqli_real_escape_string($con, $_POST['course_code']);
		$course_for_class = mysqli_real_escape_string($con, $_POST['course_for_class']);
		$course_details = mysqli_real_escape_string($con, trim($_POST['course_details']));
		$professor_name = mysqli_real_escape_string($con, $_POST['professor_name']);
		$contact_number = mysqli_real_escape_string($con, $_POST['contact_number']);

		$course_name_rgex = "/^[a-zA-Z ]+$/";

		if (!preg_match($course_name_rgex, $course_name)) {
			// echo "<h1>Please Enter a valid Course Name!</h1>";
			$course_name_error_msg = "Please Enter a valid Course Name!";
			$course_name_alert = true;
		} elseif (!preg_match($number, $_POST['course_code'])) {
			// echo '<h1>Please Enter a Valid Course Code!</h1>';
			$course_code_error_msg = "Please Enter a valid Course Code!";
			$course_code_alert = true;
		} elseif (!preg_match($course_name_rgex, $_POST['professor_name'])) {
			// echo '<h1>Please Enter a valid Professor name!</h1>';
			$professor_name_error_msg = "Please Enter a valid Professor name!";
			$professor_name_alert = true;
		} elseif (!preg_match($number, $_POST['contact_number'])) {
			// echo "<h1>Please Enter a valid Contact Number!</h1>";
			$contact_number_error_msg = "Please Enter a valid Contact Number!";
			$contact_number_alert = true;
		} else {
			if (strlen($_POST['contact_number']) > 11) {
				// echo "<h1>Mobile Number limit Exceeds!</h1>";
				$contact_number_limit_error_msg = "Contact Number limit Exceeds!";
				$contact_number_limit_alert = true;
			} else {


				// echo "everything works fine";


				if (isset($_FILES['image']) && empty($_FILES['image']['name'])) {
					// echo "image is not selected";

					// insert the updated data into database 
					$update_query = "UPDATE `courses` 
					SET `course_name` = '$course_name', 
					`course_code`= '$course_code',
					`course_class` = '$course_for_class',
					`course_details` = '$course_details', 
					`professor_name` = '$professor_name',
					`contact_number` = '$contact_number'
					 WHERE `id` = '$edit_id ' ";

					$update_query_result = mysqli_query($con, $update_query);
					if ($update_query_result) {
						// echo "<h1>Your Account have been Updated Successfully!</h1>";
						$edit_success_alert = true;

						// redirect the user to the main page 
						echo
						'
						<script>

						setTimeout(function(){
							window.location.href="all-courses.php";
						} , 1000);

						</script>
						';
					} else {
						// echo "<h1>Cannot Insert Record due to some Error!</h1>";
						$edit_error_alert = true;
					}
				} else {
					// echo "image is selected";

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

									// echo "You are ready to upload image.";

									// upload the file
									$upload = move_uploaded_file($file_tmp_name, $file_dir . $hash_image_exact);
									// echo "<h1>Image Successfully uploaded!</h1>";

									// store the data into the database
									// insert the updated data into database 
									$update_query = "UPDATE `courses` 
					SET `course_name` = '$course_name', 
					`course_code`= '$course_code',
					`course_class` = '$course_for_class',
					`course_details` = '$course_details', 
					`professor_name` = '$professor_name',
					`contact_number` = '$contact_number',
					`image`= '$hash_image_exact'
					 WHERE `id` = '$edit_id ' ";

									$update_query_result = mysqli_query($con, $update_query);
									if ($update_query_result) {
										// echo "<h1>Your Account have been Updated Successfully!</h1>";
										$edit_success_alert = true;

										// redirect the user to the main page 
										echo
										'
										<script>
		
										setTimeout(function(){
											window.location.href="all-courses.php";
										} , 1000);
		
										</script>
										';
									} else {
										// echo "<h1>Cannot Insert Record due to some Error!</h1>";
										$edit_error_alert = true;
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
}
// end of the code



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

	<style>
		/* eye styling */
		.fa-eye {
			position: absolute;
			top: 50%;
			right: 6%;
			right: 5%;
		}

		.fa-eye:hover {
			color: gray;
		}
	</style>

</head>

<body>

	<!--**********************************
        Main wrapper start
    ***********************************-->
	<div id="main-wrapper">

		<!--**********************************
            Nav header start
        ***********************************-->
		<?php
		include "nav_header.php"; 
		?>


		<!--**********************************
            Nav header end
        ***********************************-->

		<!--**********************************
            Header start
        ***********************************-->
		<?php
		include "header_start.php"; 
		?>

		<!--**********************************
            Header end 
        ***********************************-->

		<!--**********************************
            Sidebar start
        ***********************************-->
		<?php
		include "sidebar.php"
		?>

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

				if ($edit_success_alert) {
					// bootstrap dialogue 
					echo '				
                	<div class="alert alert-success text-black" role="alert">
                		Your Course Record has been updated Successfully.!
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
								<form action="edit-courses.php" method="POST" enctype="multipart/form-data">

									<div class="card p-3" style="width: 18rem; border: solid 2px blue;">
										<img src="./uploads/<?php echo $fetched_image ?>" class="card-img-top" alt="...">
										<div class="card-body">
											<!-- <h5 class="card-title">Card title</h5> -->
											<!-- <label for="image" class="btn btn-sm btn-success" style="position: absolute; left:94%; top:240px; font-size: 30px; cursor:pointer; "><i class="la la-pencil"></i></label> -->
											<input type="file" id="image" name="image" style="display: none; visibility:none;" onchange="getImage(this.value)" class="dropify">
											<p class="card-title" id="display_image_path"></p>
											<p class="card-title" style="color:red;"><?php if ($image_exists_alert) echo $image_exists_error_msg ?></p>
											<p class="card-title" style="color:red;"><?php if ($image_size_alert) echo $image_size_error_msg ?></p>
											<p class="card-title" style="color:red;"><?php if ($image_support_alert) echo $image_support_error_msg ?></p>
											<!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
										</div>
										<label for="image" class="btn btn-sm btn-success" style="font-size: 30px; cursor:pointer; "><i class="la la-pencil"></i></label>

									</div>

									<div class="row">
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Course Name</label>
												<input type="text" name="course_name" value="<?php echo $fetched_course_name ?>" class="form-control" <?php if ($course_name_alert) echo 'style="border: solid 2px red;" ' ?> required>
												<span style="color: red;"><?php if ($course_name_alert) echo $course_name_error_msg ?></span>
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Course Code</label>
												<input type="text" name="course_code" value="<?php echo $fetched_course_code ?>" class="form-control" <?php if ($course_code_alert || $course_code_exists_alert) echo 'style="border: solid 2px red;" ' ?> required>
												<span style="color: red;"><?php if ($course_code_alert) echo $course_code_error_msg ?></span>
												<span style="color: red;"><?php if ($course_code_exists_alert) echo $course_code_exists_error_msg ?></span>
											</div>
										</div>
										<div class="col-lg-12 col-md-12 col-sm-12">
											<div class="form-group">
												<label class="form-label">Course Details</label>
												<textarea class="form-control" name="course_details" rows="5" required>
													<?php echo $fetched_course_details ?>
												</textarea>
											</div>
										</div>

										<div class="form-group">
											<label class="form-label">Select this course for 1st and 2nd year class</label>
											<select class="form-control" name="course_for_class" required>
												<option value="Select">Select</option>
												<?php
												$query = "SELECT DISTINCT `subject` FROM `attendance_grade` ";
												$result = mysqli_query($con, $query);
												$row = mysqli_num_rows($result);
												if ($row > 0) {
													while ($fetched_record = mysqli_fetch_assoc($result)) {
												?>
														<option value="<?php echo $fetched_record['subject']; ?>" <?php if ($fetched_course_class === $fetched_record['subject']) echo 'selected'; ?>>
															<?php echo $fetched_record['subject']; ?>
														</option>

												<?php
													}
												}
												?>
											</select>
										</div>

										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Professor Name</label>
												<select class="form-control" name="professor_name" required>
													<option value="Select">Select</option>
													<?php
													$query = "SELECT * FROM `professors` ";
													$result = mysqli_query($con, $query);
													$row = mysqli_num_rows($result);
													if ($row > 0) {
														while ($professor_fetched_record = mysqli_fetch_assoc($result)) {
													?>
															<option value="<?php echo $professor_fetched_record['firstname'] . ' ' . $professor_fetched_record['lastname']; ?>" 
															<?php 
															if ($fetched_professor_name === $professor_fetched_record['firstname']. ' ' .$professor_fetched_record['lastname']) 
															echo 'selected';?>
															>
															
																<?php echo $professor_fetched_record['firstname'] . ' ' . $professor_fetched_record['lastname']; ?>
															</option>

													<?php
														}
													}
													?>
												</select>
											</div>
										</div>

										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Contact Number</label>
												<input type="text" name="contact_number" value="<?php echo $fetched_contact_number ?>" class="form-control" <?php if ($contact_number_alert || $contact_number_limit_alert || $mobile_number_exists_alert) echo 'style="border: solid 2px red;" ' ?> required>
												<span style="color: red;"><?php if ($contact_number_alert) echo $contact_number_error_msg ?></span>
												<span style="color: red;"><?php if ($contact_number_limit_alert) echo $contact_number_limit_error_msg ?></span>
												<span style="color: red;"><?php if ($mobile_number_exists_alert) echo $mobile_number_exists_error_msg ?></span>

											</div>
										</div>
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

	<!-- show text in password field by clicking eye icon -->
	<script src="js/show_password_field_script.js"></script>

	<script src="js/image_view_script.js"></script>

</body>

</html>



<!-- <div class="card" style=" width:250px; height:250px; border: solid 2px blue; padding:20px;">
	<img src="./uploads/<?php echo $fetched_image ?>" width="200" class="image-fluid border-rounded" alt="">
	<label for="image" class="btn btn-sm btn-success" style="position: absolute; left:94%; top:220px; font-size: 30px; cursor:pointer; "><i class="la la-pencil"></i></label>
	<input type="file" id="image" name="image" style="display: none; visibility:none;" onchange="getImage(this.value)" class="dropify">
	<div id="display_image_path" style="margin-top: 5px;"></div>
	<div style="margin-top: 5px;color: red;">
		<?php if ($image_exists_alert) echo $image_exists_error_msg ?>
	</div>
	<div style="margin-top: 5px;color: red;">
		<?php if ($image_size_alert) echo $image_size_error_msg ?>
	</div>
	<div style="margin-top: 5px;color: red;">
		<?php if ($image_support_alert) echo $image_support_error_msg ?>
	</div>
</div> -->