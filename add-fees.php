<?php
// include_once("admin/admin-login.php");

// session_start();

include("./php/fee.php");

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
	<!-- Pick date -->
	<link rel="stylesheet" href="vendor/pickadate/themes/default.css">
	<link rel="stylesheet" href="vendor/pickadate/themes/default.date.css">

	<style>
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

				if ($roll_no_alert) {
					// bootstrap dialogue 
					echo '				
                        	<div class="alert alert-danger text-white bg-red " role="alert">
                        	Please Enter a valid Roll Number.
                        	</div>
                        	';
					// <!-- bootstrap dialogue 
				}

				if ($student_name_alert) {
					// bootstrap dialogue 
					echo '				
                        	<div class="alert alert-danger text-white bg-red " role="alert">
                        	Please Enter a valid Student Name.
                        	</div>
                        	';
					// <!-- bootstrap dialogue 
				}
				if ($amount_alert) {
					// bootstrap dialogue 
					echo '				
                        	<div class="alert alert-danger text-white bg-red " role="alert">
                        	Please Enter a valid Amount.
                        	</div>
                        	';
					// <!-- bootstrap dialogue 
				}
				if ($reciept_number_alert) {
					// bootstrap dialogue 
					echo '				
                        	<div class="alert alert-danger text-white bg-red" role="alert">
                        	Please Enter a Valid Reciept Number.
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
				if ($image_size_alert) {
					// bootstrap dialogue 
					echo '				
                        	<div class="alert alert-danger text-white bg-red" role="alert">
                        	Image Size Limit Exceeds.
                        	</div>
                        	';

					// <!-- bootstrap dialogue 
				}
				if ($reciept_number_exists_alert) {
					// bootstrap dialogue 
					echo '				
                        	<div class="alert alert-danger text-white bg-red" role="alert">
                        	Reciept Number Already Exists.
                        	</div>
                        	';
					// <!-- bootstrap dialogue 
				}
				if ($roll_no_exists_alert) {
					// bootstrap dialogue 
					echo '				
                        	<div class="alert alert-danger text-white bg-red" role="alert">
							Roll Number Already Exists.
                        	</div>
                        	';
					// <!-- bootstrap dialogue 
				}
				if ($success_alert) {
					// bootstrap dialogue 
					echo '				
                        	<div class="alert alert-success text-black" role="alert">
                        		Your Fee has been Added Successfully.!
                        	  </div>
                        	';
					// <!-- bootstrap dialogue 
				}
				if ($insert_record_alert) {
					// bootstrap dialogue 
					echo '				
                        	<div class="alert alert-danger text-white bg-red" role="alert">
                        	Sorry! We couldnot Add Your Fee Record Due to some Error.
                        	</div>
                        	';
					// <!-- bootstrap dialogue 
				}

				if ($image_support_alert) {
					// bootstrap dialogue 
					echo '				
                        	<div class="alert alert-danger text-white bg-red" role="alert">
                        	Image type Not Supported.
                        	</div>
                        	';
					// <!-- bootstrap dialogue 
				}


				?>

				<div class="row page-titles mx-0">
					<div class="col-sm-6 p-md-0">
						<div class="welcome-text">
							<h4>Add Fees</h4>
						</div>
					</div>
					<div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="index.html">Home</a></li>
							<li class="breadcrumb-item"><a href="javascript:void(0);">Fees</a></li>
							<li class="breadcrumb-item active"><a href="javascript:void(0);">Add Fees</a></li>
						</ol>
					</div>
				</div>

				<div class="row">
					<div class="col-xl-12 col-xxl-12 col-sm-12">
						<div class="card">
							<div class="card-header">
								<h5 class="card-title">Add Department</h5>
							</div>
							<div class="card-body">
								<form action="add-fees.php" method="post" enctype="multipart/form-data">
									<div class="row">
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Roll No.</label>
												<input type="text" name="roll_no" value="<?php if (isset($roll_no)) echo $roll_no ?>" class="form-control <?php if ($roll_no_alert) echo "is-invalid" ?> " required>
												<div class="invalid-feedback">
													<?php if ($roll_no_alert) echo $roll_no_error_msg ?>
												</div>
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Student Name</label>
												<input type="text" name="student_name" value="<?php if (isset($student_name)) echo $student_name ?>" class="form-control <?php if ($student_name_alert) echo "is-invalid" ?>" required>
												<div class="invalid-feedback">
													<?php if ($student_name_alert) echo $student_name_error_msg ?>
												</div>
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Subject</label>
												<select class="form-control" name="subject" required>
													<option value="Select">Select</option>
													<option value="Pre-Medical">Pre-Medical</option>
													<option value="Pre-Engineering">Pre-Engineering</option>
													<option value="Computer Science">Computer Science</option>
													<option value="Arts">Arts</option>
												</select>
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group mb-4">
												<label class="form-label"></label>
												<select class="form-control" name="fee_type" required>
													<option value="Fess Type">Fess Type</option>
													<option value="Annual">Annual</option>
													<option value="Exam">Exam</option>
													<option value="Other">Other</option>
												</select>
											</div>
										</div>
										<!-- <div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group row">
												<label class="radio-inline col-lg-4"><input type="radio" name="add-date"> Monthly</label>
												<label class="radio-inline col-lg-4"><input type="radio" name="add-date"> Yearly</label>
												<label class="radio-inline col-lg-4"><input type="radio" name="add-date"> Session</label>
											</div>
										</div> -->
										<div class="col-lg-12 col-md-12 col-sm-12">
											<div class="form-group">
												<label class="form-label">Amount</label>
												<input type="text" name="amount" value="<?php if (isset($amount)) echo $amount ?>" placeholder="PKR" class="form-control <?php if ($amount_alert) echo "is-invalid" ?>" required>
												<div class="invalid-feedback">
													<?php if ($amount_alert) echo $amount_error_msg ?>
												</div>
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group mb-4">
												<label class="form-label">Collection Date</label>
												<input type="date" name="collection_date" value="<?php if (isset($collection_date)) echo $collection_date ?>" class="datepicker form-control" required>
											</div>
										</div>
										<!-- <div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group mb-4">
												<label class="form-label"></label>
												<select class="form-control">
													<option value="Payment Type">Payment Type</option>
													<option value="Annual">Cash</option>
													<option value="Exam">Cheque</option>
													<option value="Other">Other</option>
												</select>
											</div>
										</div> -->
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Payment Reciept Number</label>
												<input type="text" name="reciept_number" value="<?php if (isset($reciept_number)) echo $reciept_number ?>" class="form-control <?php if ($reciept_number_alert) echo "is-invalid" ?>" required>
												<div class="invalid-feedback">
													<?php if ($reciept_number_alert) echo $reciept_number_error_msg ?>
												</div>
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group mb-4">
												<label class="form-label">Status</label>
												<select class="form-control" name="status" required>
													<option value="Status">Status</option>
													<option value="Paid">Paid</option>
													<option value="Unpaid">Unpaid</option>
													<option value="Pending">Pending</option>
												</select>
											</div>
										</div>
										<div class="col-lg-12 col-md-12 col-sm-12">
											<div class="form-group fallback w-100">
												<h4 class="form-heading ">Please Upload the Bank Slip</h4>
											</div>
										</div>
										<!-- <div class="col-lg-12 col-md-12 col-sm-12">
											<div class="form-group fallback w-100">
												<input type="file" name="image" class="dropify" required>
											</div>
										</div> -->
                                        <div class="col-lg-12 col-md-12 col-sm-12">
											<div class="form-group fallback w-100">
                                            <input type="file" name="image" class="dropify" required>
												<span style="color: red;"><?php if ($image_exists_alert) echo $image_exists_error_msg ?></span>
												<span style="color: red;"><?php if ($image_size_alert) echo $image_size_error_msg ?></span>
												<span style="color: red;"><?php if ($image_support_alert) echo $image_support_error_msg ?></span>
											</div>
										</div>
										<div class="col-lg-12 col-md-12 col-sm-12">
											<button type="submit" name="add_fee_btn" class="btn btn-primary">Add Fee</button>
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

</body>

</html>