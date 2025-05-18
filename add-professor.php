<?php
// include_once("admin/admin-login.php");

// session_start();

require_once "./php/connection.php";
include_once "./php/config.php";
include_once "./php/professor.php";

// check if the user is logged in, if not redirect him to login page
if(!isset($_SESSION['logged']) || $_SESSION['logged'] !== true){
    header("Location: not-found.php");
    exit;
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

	<!-- bootstrap -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

	<!-- Pick date -->
	<link rel="stylesheet" href="vendor/pickadate/themes/default.css">
	<link rel="stylesheet" href="vendor/pickadate/themes/default.date.css">



	<style>
		form i {
			margin-left: -30px;
			cursor: pointer;
		}

		/* eye styling */
		.fa-eye-slash {
			position: absolute;
			top: 43px;
			right: 5%;
		}

		.fa-eye-slash:hover {
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

				if ($success_alert) {
					// bootstrap dialogue 
					echo '				
					<div class="alert alert-success text-black" role="alert">
					    Your Account has been Created Successfully.!
  					</div>
					';
					// <!-- bootstrap dialogue 
				}
				if ($insert_record_alert) {
					// bootstrap dialogue 
					echo '				
				    <div class="alert alert-danger text-white bg-red" role="alert">
				    Sorry! We couldnot Insert Record Due to some Error.
				    </div>
				    ';
					// <!-- bootstrap dialogue 
				}

				?>

			<!-- steps section -->
				<div class="card">
					<div class="card-body">
						<h4 class="title">Registration Process Consists of 2 steps</h4>
						<div class="badge  badge-circle bg-primary text-white">1</div>
							<span>---------------</span>
						<div class=" badge  badge-circle border border-dark mt-2">2</div>
					</div>
				</div>

				<div class="row page-titles mx-0">
					<div class="col-sm-6 p-md-0">
						<div class="welcome-text">
							<h4>Add Professor</h4>
						</div>
					</div>
					<div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="index.html">Home</a></li>
							<li class="breadcrumb-item active"><a href="add-professor.html">Professors</a></li>
							<li class="breadcrumb-item active"><a href="javascript:void(0)">Add Professor</a></li>
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
									<div class="row">

										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">First Name</label>
												<input type="text" name="firstname" value="<?php if (isset($first_name)) echo $first_name; ?>" class="form-control <?php if ($first_name_alert) echo 'is-invalid'; ?>" required>
												<div class="invalid-feedback">
													<?php if ($first_name_alert) echo $first_name_error_msg ?>
												</div>
											</div>

										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Last Name</label>
												<input type="text" name="lastname" value="<?php if (isset($last_name)) echo $last_name; ?>" class="form-control <?php if ($last_name_alert) echo 'is-invalid' ?>" required>
												<span style="color: red;"><?php if ($last_name_alert) echo $last_name_error_msg ?></span>
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">

												<label class="form-label">Email Here</label>
												<input type="text" name="email" value="<?php if (isset($email)) echo $email; ?>" class="form-control <?php if ($email_alert || $email_exists_alert) echo 'is-invalid' ?>" required>
												<span style="color: red;"><?php if ($email_alert) echo $email_error_msg ?></span>
												<span style="color: red;"><?php if ($email_exists_alert) echo $email_exists_error_msg ?></span>

											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Joining Date</label>
												<input type="date" id="joining_data" class="form-control <?php if ($joining_data_alert) echo 'is-invalid' ?>" value="<?php if (isset($joining_date)) echo $joining_date; ?>" name="joining_data">
												<div class="invalid-feedback">
													<?php if ($joining_data_alert) echo $date_of_birth_error_msg ?>
												</div>
											</div>
										</div>


										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Password</label>
												<input type="password" name="password" value="<?php if (isset($password)) echo $password ?>" id="password" class="form-control" <?php if ($password_alert || $confirm_password_alert) echo 'style="border: solid 2px red; " '  ?> required>
												<i class="fa fa-eye-slash" id="eyeSlash"></i>
												<span style="color: red;"><?php if ($password_alert) echo $password_error_msg ?></span>
												<span style="color: red;"><?php if ($confirm_password_alert) echo $confirm_password_error_msg ?></span>
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Confirm Password</label>
												<input type="password" name="confirm_password" value="<?php if (isset($confirm_password)) echo $confirm_password ?>" id="confirm_password" class="form-control" <?php if ($confirm_password_alert || $password_alert) echo 'style="border: solid 2px red; "' ?> required>
												<i class="fa fa-eye-slash" id="eyeSlashNew"></i>
												<span style="color: red;"><?php if ($password_alert) echo $password_error_msg ?></span>
												<span style="color: red;"><?php if ($confirm_password_alert) echo $confirm_password_error_msg ?></span>
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Mobile Number</label>
												<input type="text" name="mobileNum" value="<?php if (isset($_POST['mobileNum'])) echo $mobileNum; ?>" class="form-control <?php if ($mobile_number_alert || $mobile_number_limit_alert || $mobile_number_exists_alert) echo 'is-invalid' ?>" required>
												<span style="color: red;"><?php if ($mobile_number_alert) echo $mobile_number_error_msg ?></span>
												<span style="color: red;"><?php if ($mobile_number_limit_alert) echo $mobile_number_limit_error_msg ?></span>
												<span style="color: red;"><?php if ($mobile_number_exists_alert) echo $mobile_number_exists_error_msg ?></span>
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Gender</label>
												<select class="form-control" name="gender" required>
													<option value="Gender">Gender</option>
													<option value="Male">Male</option>
													<option value="Female">Female</option>
												</select>
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Department</label>
												<select class="form-control" name="department" required>
													<option value="Department">Department</option>
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
												<input type="date" id="date_of_birth" value="<?php if (isset($date_of_birth)) echo $date_of_birth; ?>" name="date_of_birth" class="form-control <?php if ($date_of_birth_alert) echo "is-invalid" ?>" required>
												<div class="invalid-feedback">
													<?php if ($date_of_birth_alert) echo $date_of_birth_error_msg ?>
												</div>
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Education</label>
												<input type="text" name="education" value="<?php if (isset($education)) echo $education; ?>" class="form-control <?php if ($education_alert) echo 'is-invalid' ?>" required>
												<span style="color: red;"><?php if ($education_alert) echo $education_error_msg ?></span>
											</div>
										</div>
										<!-- <div class="col-lg-12 col-md-12 col-sm-12">
											<div class="form-group fallback w-100">
												<input type="file" name="image" class="dropify" required>
												<span style="color: red;"><?php if ($image_exists_alert) echo $image_exists_error_msg ?></span>
												<span style="color: red;"><?php if ($image_size_alert) echo $image_size_error_msg ?></span>
												<span style="color: red;"><?php if ($image_support_alert) echo $image_support_error_msg ?></span>
											</div>
										</div> -->
										<div class="col-lg-12 col-md-12 col-sm-12">
											<button type="submit" name="add_record" class="btn btn-primary" required>Add Record</button>
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
		<?php include "footer.php"; ?>
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

</body>

</html>


<!-- `Computer Science`,`Political Science`,`Statistics`,`English`,`Urdu`,`Mathematics`,`Economics`,`Zoology`,`Botany`,`Physics`,`Chemistry` -->