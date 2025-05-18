<?php
require_once "./php/connection.php";
include_once "./php/config.php";
include_once "./php/professor.php";



// php code for retrieving data from database -->
// session_start();
$edit_id = $_SESSION['teacher_email'];
// $edit_grid_id = $_SESSION['edit_grid_value'];


// getting id from the url
// $edit_id = $_GET['id'];

$retrieve_query = "SELECT * FROM `professors` WHERE `email` = '$edit_id' ";
$retrieve_query_result = mysqli_query($con, $retrieve_query);
$row = mysqli_num_rows($retrieve_query_result);
if ($row > 0) {
	while ($fetch_record = mysqli_fetch_assoc($retrieve_query_result)) {

		$fetched_first_name = $fetch_record['firstname'];
		$fetched_last_name = $fetch_record['lastname'];
		// $fetched_email = $fetch_record['email'];
		$fetched_joining_data = $fetch_record['joining_data'];
		$fetched_password = $fetch_record['password'];
		$fetched_gender = $fetch_record['gender'];
		$fetched_department = $fetch_record['department'];
		// $fetched_mobile_number = $fetch_record['mobile_number'];
		$fetched_date_of_birth = $fetch_record['date_of_birth'];
		$fetched_education = $fetch_record['education'];
		$fetched_image = $fetch_record['image'];
	}
}



// getting values from edit-professor form
if ($_SERVER['REQUEST_METHOD'] == "POST") {
	if (isset($_POST['update_record_btn'])) {

		// echo "working";

		// get the data from the form
		$first_name = mysqli_real_escape_string($con, $_POST['firstname']);
		$last_name = mysqli_real_escape_string($con, $_POST['lastname']);
		// $email = mysqli_real_escape_string($con, $_POST['email']);
		$joining_data = mysqli_real_escape_string($con, $_POST['joining_data']);
		// $password = mysqli_real_escape_string($con, $_POST['password']);
		// $confirm_password = mysqli_real_escape_string($con, $_POST['confirm_password']);
		// create the hash of the password
		// $hashed_pass = hash("md5", $confirm_password, false);
		// $update_mobile_num = mysqli_real_escape_string($con, $_POST['mobile_num']);
		$gender = mysqli_real_escape_string($con, $_POST['gender']);
		$department = mysqli_real_escape_string($con, $_POST['department']);
		$date_of_birth = mysqli_real_escape_string($con, $_POST['date_of_birth']);
		$education = mysqli_real_escape_string($con, $_POST['education']);


		if (!preg_match($name, $_POST['firstname'])) {
			// echo "<h1>Please Enter a valid First Name!</h1>";
			$first_name_error_msg = "Please Enter a valid First Name!";
			$first_name_alert = true;
		} elseif (!preg_match($name, $_POST['lastname'])) {
			// echo "<h1>Please Enter a valid Last Name!</h1>";
			$last_name_error_msg = "Please Enter a valid Last Name!";

			$last_name_alert = true;
		} else {

			// check the last field
			if (!preg_match($name, $_POST['education'])) {
				// echo "<h1>Please Enter a valid word!</h1>";
				$education_error_msg = "Please Enter a valid word!";
				$education_alert = true;
			} else {


				// echo "everything works fine";


				if(isset($_FILES['image']) && empty($_FILES['image']['name'])){
					// echo "image is not selected";

					$update_query = "UPDATE `professors` SET `firstname` = '$first_name', `lastname` = '$last_name',
					 `joining_data` = '$joining_data',
					 `gender` = '$gender', `department` = '$department'  , `date_of_birth` = '$date_of_birth',
					`education`='$education' 
					WHERE `email` = '$edit_id' ";
	
					$update_query_result = mysqli_query($con, $update_query);
					if ($update_query_result) {
						// echo "<h1>Your Account have been Updated Successfully!</h1>";
						$edit_success_alert = true;
					} else {
						// echo "<h1>Cannot Insert Record due to some Error!</h1>";
						$edit_error_alert = true;
					}


				}else {
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
								$update_query = "UPDATE `professors` SET `firstname` = '$first_name', `lastname` = '$last_name',
								`joining_data` = '$joining_data',
								`gender` = '$gender'  , `date_of_birth` = '$date_of_birth',
								`education`='$education' ,`image` = '$hash_image_exact'
								WHERE `email` = '$edit_id' ";
				
								$update_query_result = mysqli_query($con, $update_query);
								if ($update_query_result) {
									// echo "<h1>Your Account have been Updated Successfully!</h1>";
									$edit_success_alert = true;
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
// end of image upload code

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

		/* #main-wrapper>div.content-body>div>div:nth-child(2)>div>div>div.card-body>form>div.card {
			height: 250px;
			;
		} */
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
				if ($edit_error_alert) {
					// bootstrap dialogue 
					echo '				
					<div class="alert alert-danger text-white bg-red" role="alert">
					Sorry! Your Account has not Been Updated.
					</div>
					';
					// <!-- bootstrap dialogue 
				}
				if ($edit_success_alert) {
					// bootstrap dialogue 
					echo '				
					<div class="alert alert-success text-black" role="alert">
					    Your Account has been Updated Successfully.!
  					</div>
					';
					// <!-- bootstrap dialogue 
				}
				if ($all_fields_empty_alert) {
					// bootstrap dialogue 
					echo '				
				    <div class="alert alert-danger text-white bg-red" role="alert">
				    Please Select an Image.
				    </div>
				    ';
					// <!-- bootstrap dialogue 
				}
				?>

				<div class="row page-titles mx-0">
					<div class="col-sm-6 p-md-0">
						<div class="welcome-text">
							<h4>Edit Professor</h4>
						</div>
					</div>
					<div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="index.html">Home</a></li>
							<li class="breadcrumb-item active"><a href="edit-professor.html">Professors</a></li>
							<li class="breadcrumb-item active"><a href="javascript:void(0)">Edit Professor</a></li>
						</ol>
					</div>
				</div>



				<div class="row">
					<div class="col-xl-12 col-xxl-12 col-sm-12">
						<div class="card">
							<div class="row m-3 mx-0">
								<div class="card-profile">
								</div>
							</div>

							<div class="card-header">
								<h5 class="card-title">Basic Info</h5>
							</div>
							<div class="card-body">
								<form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">

								<div class="card p-3" style="width: 18rem; border: solid 2px blue;">
										<img src="./uploads/<?php echo $fetched_image ?>" class="card-img-top" alt="...">
										<div class="card-body">
											<!-- <h5 class="card-title">Card title</h5> -->
											<label for="image" class="btn btn-sm btn-success" style="position: absolute; left:94%; top:310px; font-size: 30px; cursor:pointer; "><i class="la la-pencil"></i></label>
											<input type="file" id="image" name="image" style="display: none; visibility:none;" onchange="getImage(this.value)" class="dropify">
											<p class="card-title" id="display_image_path"></p>
											<p class="card-title" style="color:red;"><?php if ($image_exists_alert) echo $image_exists_error_msg ?></p>
											<p class="card-title" style="color:red;"><?php if ($image_size_alert) echo $image_size_error_msg ?></p>
											<p class="card-title" style="color:red;"><?php if ($image_support_alert) echo $image_support_error_msg ?></p>
											<!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
										</div>
									</div>


									<div class="row">
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">First Name</label>
												<input type="text" value="<?php echo $fetched_first_name; ?>" name="firstname" class="form-control <?php if ($first_name_alert) echo 'is-invalid" ' ?>">
												<span style="color: red;"><?php if ($first_name_alert) echo $first_name_error_msg ?></span>
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Last Name</label>
												<input type="text" value="<?php echo $fetched_last_name ?>" name="lastname" class="form-control <?php if ($last_name_alert) echo 'is-invalid" ' ?>">
												<span style="color: red;"><?php if ($last_name_alert) echo $last_name_error_msg ?></span>

											</div>
										</div>
										<!-- <div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Email Here</label>
												<input type="text" value="<?php echo $fetched_email ?>" name="email" class="form-control <?php if ($email_alert) echo 'is-invalid" ' ?>">
												<span style="color: red;"><?php if ($email_alert) echo $email_error_msg ?></span>

											</div>
										</div> -->
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Joining Date</label>
												<input type="date" id="joining_data" class=" form-control" value="<?php echo $fetched_joining_data; ?>" name="joining_data" min="2022-10-30" max="2022-12-30">
											</div>
										</div>
										<!-- <div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Password</label>
												<input type="password" value="<?php echo $fetched_password; ?>" name="password" id="password"  class="form-control <?php if ($password_alert || $confirm_password_alert) echo 'is-invalid" ' ?>">
												<i class="fa-solid fa-eye" onclick="showPassword(password)" id="eye"></i>
												<span style="color: red;"><?php if ($password_alert) echo $password_error_msg ?></span>
												<span style="color: red;"><?php if ($confirm_password_alert) echo $confirm_password_error_msg ?></span>

											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Confirm Password</label>
												<input type="password" value="<?php echo $fetched_password; ?>" name="confirm_password"  id="confirm_password" class="form-control <?php if ($password_alert || $confirm_password_alert) echo 'is-invalid" ' ?>">
												<i class="fa-solid fa-eye" onclick="showPassword(confirm_password)" id="eye"></i>
												<span style="color: red;"><?php if ($password_alert) echo $password_error_msg ?></span>
												<span style="color: red;"><?php if ($confirm_password_alert) echo $confirm_password_error_msg ?></span>

											</div>
										</div> -->
										<!-- <div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Mobile Number</label>
												<input type="text" value="<?php echo $fetched_mobile_number; ?>" name="mobile_num" class="form-control  <?php if ($mobile_number_alert) echo 'is-invalid" ' ?>">
												<span style="color: red;"><?php if ($mobile_number_alert) echo $mobile_number_error_msg ?></span>
											</div>
										</div> -->
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Gender</label>
												<select class="form-control" name="gender">
													<option value="<?php echo $fetched_gender ?>"><?php echo $fetched_gender ?></option>
													<option value="Male">Male</option>
													<option value="Female">Female</option>
												</select>
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
												<div class="form-group">
													<label class="form-label">Department</label>
													<select class="form-control" name="department" required>
														<option value="<?php echo $fetched_department ?>"><?php echo $fetched_department ?></option>
														<option value="Computer Science">Computer Science</option>
														<option value="Political Science">Political Science</option>
														<option value="Statistics">Statistics</option>
														<option value="English">English</option>
														<option value="Urdu">Urdu</option>
														<option value="Mathematics">Mathematics</option>
														<option value="Economics">Economics</option>
														<option value="Zoology">Zoology</option>
														<option value="Botany">Botany</option>
														<option value="Physics">Physics</option>
														<option value="Chemistry">Chemistry</option>
													</select>
												</div>
											</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Date of Birth</label>
												<input type="date" id="date_of_birth" class="form-control" value="<?php echo $fetched_date_of_birth; ?>" name="date_of_birth" min="1990-01-01" max="2010-12-30">
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Education</label>
												<input type="text" name="education" value="<?php echo $fetched_education ?>" class="form-control <?php if ($education_alert) echo 'is-invalid' ?>">
												<span style="color:#FF1616"><?php if ($education_alert) echo $education_error_msg ?></span>
											</div>
										</div>
										<!-- <div class="col-lg-12 col-md-12 col-sm-12">
											<div class="form-group fallback w-100">
												<input type="file" name="image" class="dropify" required>
											</div>
										</div> -->
										<div class="col-lg-12 col-md-12 col-sm-12">
											<button type="submit" name="update_record_btn" class="btn btn-primary">Update Changes</button>
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