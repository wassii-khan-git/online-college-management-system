<?php
// include_once("admin/admin-login.php");

// session_start();

include_once("./php/config.php");
include_once("./php/connection.php");
include_once("./php/attendance.php");

// check if the user is logged in, if not redirect him to login page
// if(!isset($_SESSION['logged']) || $_SESSION['logged'] !== true){
//     header("Location: not-found.php");
//     exit;
// }


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

	<!-- bootstrap -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">

	<!-- Pick date -->
	<link rel="stylesheet" href="vendor/pickadate/themes/default.css">
	<link rel="stylesheet" href="vendor/pickadate/themes/default.date.css">

	<!-- datatable -->
	<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">


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
				    <div class="alert alert-danger text-black bg-red" role="alert">
				    Sorry! We couldnot Insert Record Due to some Error.
				    </div>
				    ';
					// <!-- bootstrap dialogue 
				}

				if ($grade_code_alert) {
					// bootstrap dialogue 
					echo '				
					<div class="alert alert-danger text-black" role="alert">
					Please Enter a valid grade Code.!
  					</div>
					';
					// <!-- bootstrap dialogue 
				}
				if ($class_alert) {
					// bootstrap dialogue 
					echo '				
				    <div class="alert alert-danger text-black bg-red" role="alert">
				    Class Already Exists.
				    </div>
				    ';
					// <!-- bootstrap dialogue 
				}


				?>

				<div class="row page-titles mx-0">
					<div class="col-sm-6 p-md-0">
						<div class="welcome-text">
							<h4>Add Class</h4>
						</div>
					</div>
					<div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="index.php">Home</a></li>
							<li class="breadcrumb-item active"><a href="javascript:void(0);">Class</a></li>
							<li class="breadcrumb-item active"><a href="javascript:void(0);">Add Class</a></li>
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
								<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
									<div class="row">
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Grade Code</label>
												<input type="text" class="form-control" name="grade_code" id="grade_code" required>
											</div>
										</div>

										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Grade</label>
												<select class="form-control" name="grade" required>
													<option value="Select">Grade</option>
													<option value="1st year">1st year</option>
													<option value="2nd year">2nd year</option>
												</select>
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Class</label>
												<select class="form-control" name="classes">
													<option value="Select">Select</option>
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

										<div class="col-lg-12 col-md-12 col-sm-12">
											<button type="submit" name="add_attendance_class_btn" class="btn btn-primary">Add Class</button>
											<!-- <div class="text" style="color: red;">*Note You Can Create only the Given Classes</div> -->
											<!-- <button type="submit" class="btn btn-light">Cancel</button> -->
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

	<!-- vendors -->
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

<!-- INSERT INTO `students` (`firstname`, `lastname`, `email`, `registration_date`, `class`, `gender`, `mobile_number`, `parents_name`, `parents_mobile_number`, `date_of_birth`, `adress`, `image`, `date`) VALUES ( 'kaka', 'jan', 'kakajan@gmail.com', '2022-10-19', 'Pre_Medical', 'Male', '923434623', 'jan kaka', '90076765', '2013-10-02', 'california, street 142 road 3 house 134A', 'pic2.jpg', current_timestamp()); -->