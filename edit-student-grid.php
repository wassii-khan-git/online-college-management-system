<?php
// include_once("admin/admin-login.php");

// session_start();

require_once "./php/connection.php";
include_once "./php/config.php";
require_once "./php/students.php";

// check if the user is logged in, if not redirect him to login page
if(!isset($_SESSION['logged']) || $_SESSION['logged'] !== true){
    header("Location: not-found.php");
    exit;
}


?>
<?php



// php code for retrieving data from database -->

$edit_id = $_SESSION['hidden_edit_grid_box'];



// getting id from the url
// $edit_id = $_GET['id'];

$retrieve_query = "SELECT * FROM `students` WHERE `id` = '$edit_id' ";
$retrieve_query_result = mysqli_query($con, $retrieve_query);
$row = mysqli_num_rows($retrieve_query_result);
if ($row > 0) {
	while ($fetch_record = mysqli_fetch_assoc($retrieve_query_result)) {

		// get the data from the database
		$fetched_first_name = mysqli_real_escape_string($con, $fetch_record['firstname']);
		$fetched_last_name = mysqli_real_escape_string($con, $fetch_record['lastname']);
		$fetched_registration_date = mysqli_real_escape_string($con, $fetch_record['registration_date']);
		//  $roll_no_id = mysqli_real_escape_string($con, $fetch_record['id']);
		$fetched_class = mysqli_real_escape_string($con, $fetch_record['class']);
		// $fetched_password = mysqli_real_escape_string($con, $fetch_record['password']);
		$fetched_gender = mysqli_real_escape_string($con, $fetch_record['gender']);
		$fetched_mobile_number = mysqli_real_escape_string($con, $fetch_record['mobile_number']);
		$fetched_parents_name = mysqli_real_escape_string($con, $fetch_record['parents_name']);
		$fetched_parents_mobile_number = mysqli_real_escape_string($con, $fetch_record['parents_mobile_number']);
		$fetched_date_of_birth = mysqli_real_escape_string($con, $fetch_record['date_of_birth']);
		$fetched_address = mysqli_real_escape_string($con, $fetch_record['adress']);
		$fetched_image = mysqli_real_escape_string($con, $fetch_record['image']);
	}
}

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['student_update_btn'])) {

	// get the data from the database
	$first_name = mysqli_real_escape_string($con, $_POST['firstname']);
	$last_name = mysqli_real_escape_string($con, $_POST['lastname']);
	$registration_date = mysqli_real_escape_string($con, $_POST['registration_date']);
	// $roll_no_id = mysqli_real_escape_string($con, $_POST['id']);
	$class = mysqli_real_escape_string($con, $_POST['class']);
	$gender = mysqli_real_escape_string($con, $_POST['gender']);
	$mobile_number = mysqli_real_escape_string($con, $_POST['mobile_number']);
	$parents_name = mysqli_real_escape_string($con, $_POST['parents_name']);
	$parents_mobile_number = mysqli_real_escape_string($con, $_POST['parents_mobile_number']);
	$date_of_birth = mysqli_real_escape_string($con, $_POST['date_of_birth']);
	$address = mysqli_real_escape_string($con, $_POST['address']);

    $name = "/^[a-zA-Z ]+$/";


	if (!preg_match($name, $_POST['firstname'])) {
		// echo "<h1>Please Enter a valid First Name!</h1>";
		$first_name_error_msg = "Please Enter a valid First Name!";
		$first_name_alert = true;
	} elseif (!preg_match($name, $_POST['lastname'])) {
		// echo "<h1>Please Enter a valid Last Name!</h1>";
		$last_name_error_msg = "Please Enter a valid Last Name!";
		$last_name_alert = true;
	} 
	elseif (!preg_match($number, $_POST['mobile_number'])) {
		// echo "<h1>Please Enter a valid Number!</h1>";
		$mobile_number_error_msg = "Please Enter a valid Number!";
		$mobile_number_alert = true;
	} elseif (strlen($_POST['mobile_number']) > 11) {
		// echo "<h1>Mobile Number limit Exceeds!</h1>";
		$mobile_number_limit_error_msg = "Mobile Number limit Exceeds!";
		$mobile_number_limit_alert = true;
	} elseif (!preg_match($name, $_POST['parents_name'])) {
		// echo "<h1>Please Enter a valid Parents Name!</h1>";
		$parent_name_error_msg = "Please Enter a valid Parents Name!";
		$parent_name_alert = true;
	} elseif (!preg_match($number, $_POST['parents_mobile_number'])) {
		// echo "<h1>Please Enter a valid Parent mobile number!</h1>";
		$parent_mobile_number_error_msg = "Please Enter a valid Parent mobile number!";
		$parent_mobile_number_alert = true;
	} else {

		if (strlen($_POST['parents_mobile_number']) > 11) {
			// echo "<h1>Parent Mobile Number limit Exceeds!</h1>";
			$parent_mobile_number_limit_error_msg = "Parent Mobile Number limit Exceeds!";
			$parent_mobile_number_limit_alert = true;
		} else {


			// echo "everything works fine";


			if (isset($_FILES['image']) && empty($_FILES['image']['name'])) {
				// echo "image is not selected";

				$update_query = "UPDATE `students` SET `firstname` = '$first_name', `lastname` = '$last_name',
				`registration_date` = '$registration_date', `class` = '$class',
				`gender` = '$gender' , `mobile_number` = '$mobile_number' , 
				`parents_name`='$parents_name' , `parents_mobile_number` = '$parents_mobile_number' ,
				`date_of_birth` = '$date_of_birth', `adress` = '$address'
				 WHERE `id` = '$edit_id' ";

				$update_query_result = mysqli_query($con, $update_query);
				if ($update_query_result) {
					// echo "<h1>Your Account have been Updated Successfully!</h1>";
					$edit_success_alert = true;

													// redirect the user to the main page 
													echo
													'
													<script>
					
													setTimeout(function(){
														window.location.href="all-students.php";
													} , 1000);
					
													</script>
													'
													;

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
								$update_query = "UPDATE `students` SET `firstname` = '$first_name', `lastname` = '$last_name',
								 `registration_date` = '$registration_date', `class` = '$class',
								`gender` = '$gender' , `mobile_number` = '$mobile_number' , 
								`parents_name`='$parents_name' , `parents_mobile_number` = '$parents_mobile_number' ,
								`date_of_birth` = '$date_of_birth', `adress` = '$address' , `image`= '$hash_image_exact'
								 WHERE `id` = '$edit_id' ";

								$update_query_result = mysqli_query($con, $update_query);
								if ($update_query_result) {
									// echo "<h1>Your Account have been Updated Successfully!</h1>";
									$edit_success_alert = true;

																	// redirect the user to the main page 
								echo
								'
								<script>

								setTimeout(function(){
									window.location.href="all-students.php";
								} , 1000);

								</script>
								'
								;

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

?>





<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>OCMS - Online College Management System</title>

	<!-- Favicon icon -->
	<link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
	<link rel="stylesheet" href="vendor/bootstrap-select/dist/css/bootstrap-select.min.css">
	<link rel="stylesheet" href="css/style.css">

	<!-- fontawesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />


	<!-- Pick date -->
	<link rel="stylesheet" href="vendor/pickadate/themes/default.css">
	<link rel="stylesheet" href="vendor/pickadate/themes/default.date.css">


	<style>
		/* eye styling */
		.fa-eye {
			position: absolute;
			top: 43px;
			right: 5%;
		}

		.fa-eye:hover {
			color: gray;
		}

		.form-control.is-invalid {
			border-color: #FF1616 !important;
			border-right: solid 2px #FF1616 !important;
		}

		.form-control.is-valid {
			border-color: #7ED321 !important;
			border-right: solid 2px #7ED321 !important;
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
		<?php include "sidebar.php" ?>

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
                		Your Account has been Updated Successfully.!
                	  </div>
                	';
					// <!-- bootstrap dialogue 
				}
				if ($edit_error_alert) {
					// bootstrap dialogue 
					echo '				
                	<div class="alert alert-danger text-white bg-red" role="alert">
                	Sorry! We couldnot Update Your Record Due to some Error.
                	</div>
                	';
					// <!-- bootstrap dialogue 
				}

				?>

				<div class="row page-titles mx-0">
					<div class="col-sm-6 p-md-0">
						<div class="welcome-text">
							<h4>Add Student</h4>
						</div>
					</div>
					<div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="index.html">Home</a></li>
							<li class="breadcrumb-item active"><a href="javascript:void(0);">Students</a></li>
							<li class="breadcrumb-item active"><a href="javascript:void(0);">Add Student</a></li>
						</ol>
					</div>
				</div>

				<div class="row">
					<div class="col-xl-12 col-xxl-12 col-sm-12">
						<div class="card">
							<div class="card-header">
								<h5 class="card-title">Basic Info</h5>
							</div>
							<div class="card-body">
								<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
								<div class="card p-3" style="width: 18rem; border: solid 2px blue;">
                                        <img src="./uploads/<?php echo $fetched_image ?>" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <!-- <h5 class="card-title">Card title</h5> -->
                                            <!-- <label for="image" class="btn btn-sm btn-success" style="position: absolute; left:94%; top:310px; font-size: 30px; cursor:pointer; "><i class="la la-pencil"></i></label> -->
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
												<label class="form-label">First Name</label>
												<input type="text" name="firstname" value="<?php echo $fetched_first_name  ?>" class="form-control <?php if ($first_name_alert) echo 'is-invalid' ?>" required>
												<span style="color: red;"><?php if ($first_name_alert) echo $first_name_error_msg ?></span>
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Last Name</label>
												<input type="text" name="lastname" value="<?php echo $fetched_last_name ?>" class="form-control <?php if ($last_name_alert) echo 'is-invalid' ?>" required>
												<span style="color: red;"><?php if ($last_name_alert) echo $last_name_error_msg ?></span>
											</div>
										</div>
										
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Registration Date</label>
												<input type="date" name="registration_date" value="<?php echo $fetched_registration_date ?>" class="datepicker form-control" id="datepicker" min="2022-10-30" max="2022-12-30" required>
											</div>
										</div>

										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Class</label>
												<select class="form-control" name="class">
													<option value="<?php echo $fetched_class ?>"><?php echo $fetched_class ?></option>
													<option value="Pre-Medical I">Pre-Medical I</option>
													<option value="Pre-Medical II">Pre-Medical II</option>
													<option value="Pre-Engineering I">Pre-Engineering I</option>
													<option value="Pre-Engineering II">Pre-Engineering II</option>
													<option value="Computer Science I">Computer Science I</option>
													<option value="Computer Science II">Computer Science II</option>
													<option value="Arts I">Arts I</option>
													<option value="Arts II">Arts II</option>	
												</select>
											</div>
										</div>

										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Gender</label>
												<select class="form-control" name="gender">
													<option value="Gender">Gender</option>
													<option value="Male" selected="">Male</option>
													<option value="Female">Female</option>
												</select>
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Mobile Number</label>
												<input type="text" name="mobile_number" value="<?php echo $fetched_mobile_number ?>" class="form-control <?php if ($mobile_number_alert || $mobile_number_limit_alert) echo 'is-invalid' ?>">
												<span style="color: red;"><?php if ($mobile_number_alert) echo $mobile_number_error_msg ?></span>
												<span style="color: red;"><?php if ($mobile_number_limit_alert) echo $mobile_number_limit_error_msg ?></span>
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Parents Name</label>
												<input type="text" name="parents_name" value="<?php echo $fetched_parents_name ?>" class="form-control <?php if ($parent_name_alert) echo 'is-invalid' ?>">
												<span style="color: red;"><?php if ($parent_name_alert) echo $parent_name_error_msg ?></span>
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Parents Mobile Number</label>
												<input type="text" name="parents_mobile_number" value="<?php echo $fetched_parents_mobile_number ?>" class="form-control <?php if ($parent_mobile_number_alert) echo 'is-invalid' ?>">
												<span style="color: red;"><?php if ($parent_mobile_number_alert) echo $parent_mobile_number_error_msg ?></span>
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Date of Birth</label>
												<input type="date" name="date_of_birth" class="datepicker form-control" id="datepicker1" value="<?php echo $fetched_date_of_birth ?>">
											</div>
										</div>
										<div class="col-lg-12 col-md-12 col-sm-12">
											<div class="form-group">
												<label class="form-label">Address</label>
												<textarea class="form-control" name="address" rows="5">
													<?php echo $fetched_address ?>
												</textarea>
											</div>
										</div>
										<div class="col-lg-12 col-md-12 col-sm-12">
											<button type="submit" name="student_update_btn" class="btn btn-primary">Update</button>
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

	<!--Image Path view Script  -->
	<script src="js/image_view_script.js"></script>


</body>

</html>