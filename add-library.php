<?php
// include_once("admin/admin-login.php");

// session_start();

include("./php/library.php");

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

				// if($title_alert){
				// 	// bootstrap dialogue 
				// 	echo '				
				// 	<div class="alert alert-danger text-white bg-red " role="alert">
				// 	Please Enter a valid Title.
				// 	</div>
				// 	';
				// 	// <!-- bootstrap dialogue 
				// }

				// if($author_name_alert){
				// 	// bootstrap dialogue 
				// 	echo '				
				// 	<div class="alert alert-danger text-white bg-red " role="alert">
				// 	Please Enter a valid Author Name.
				// 	</div>
				// 	';
				// 	// <!-- bootstrap dialogue 
				// }
				// if($publisher_alert){
				// 	// bootstrap dialogue 
				// 	echo '				
				// 	<div class="alert alert-danger text-white bg-red " role="alert">
				// 	Please Enter a valid Publisher Name.
				// 	</div>
				// 	';
				// 	// <!-- bootstrap dialogue 
				// }
				// if($asset_details_alert){
				// 	// bootstrap dialogue 
				// 	echo '				
				// 	<div class="alert alert-danger text-white bg-red" role="alert">
				// 	Please Enter a valid Asset details .
				// 	</div>
				// 	';
				// 	// <!-- bootstrap dialogue 
				// }
				if ($success_alert) {
					// bootstrap dialogue 
					echo '				
					<div class="alert alert-success text-black" role="alert">
					    Your Book Record has been Added Successfully.!
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
							<h4>Add Library Assets</h4>
						</div>
					</div>
					<div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="index.php">Home</a></li>
							<li class="breadcrumb-item active"><a href="javascript:void(0);">Library</a></li>
							<li class="breadcrumb-item active"><a href="javascript:void(0);">Add Library</a></li>
						</ol>
					</div>
				</div>

				<div class="row">
					<div class="col-lg-12">
						<div class="card">
							<div class="card-header">
								<h4 class="card-title">Add Library Assets</h4>
							</div>
							<div class="card-body">
								<form action="add-library.php" method="post" enctype="multipart/form-data">
									<div class="row">
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Title</label>
												<input type="text" name="title" value="<?php if (isset($title)) echo $title ?>" class="form-control" <?php if ($title_alert || $title_exists_alert) echo 'style="border:solid 2px red;"' ?> required>
												<span style="color: red;"><?php if ($title_alert) echo $title_error_msg ?></span>
												<span style="color: red;"><?php if ($title_exists_alert) echo $title_exists_error_msg ?></span>
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Subject</label>
												<select class="form-control" name="subject">
													<option value="Science">Science</option>
													<option value="Arts">Arts</option>
													<option value="General Knowledge">General Knowledge</option>
													<option value="History">History</option>
													<option value="Mathematics">Mathematics</option>
												</select>
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Author Name</label>
												<input type="text" name="author_name" value="<?php if (isset($author_name)) echo $author_name ?>" class="form-control" <?php if ($author_name_alert) echo 'style="border:solid 2px red;"' ?> required>
												<span style="color: red;"><?php if ($author_name_alert) echo $author_name_error_msg ?></span>
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Publisher</label>
												<input type="text" name="publisher" value="<?php if (isset($publisher)) echo $publisher ?>" class="form-control" <?php if ($publisher_alert) echo 'style="border:solid 2px red;"' ?> required>
												<span style="color: red;"><?php if ($publisher_alert) echo $publisher_eror_msg ?></span>

											</div>
										</div>
										<!-- <div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Department</label>
												<select class="form-control">
													<option value="Department">Department</option>
													<option value="Computer">Computer</option>
													<option value="DataEntry">Data Entry</option>
													<option value="Management">Management</option>
												</select>
											</div>
										</div> -->
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Asset type</label>
												<select class="form-control" name="asset_type" required>
													<option value="Book">Book</option>
													<option value="Newspaper">Newspaper</option>
													<option value="Comics">Comics</option>
												</select>
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Purchase Date</label>
												<input type="date" name="purchase_date" value="<?php if (isset($purchase_date)) echo $purchase_date ?>" class="datepicker form-control" id="datepicker" required>
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Price</label>
												<input type="text" name="price" value="<?php if (isset($price)) echo $price ?>" class="form-control" <?php if ($price_alert) echo 'style="border:solid 2px red;"' ?> required>
												<span style="color: red;"><?php if ($price_alert) echo $price_alert_error_msg ?></span>

											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Status</label>
												<select class="form-control" name="status" required>
													<option value="In Stock">In Stock</option>
													<option value="Out Of Stock">Out Of Stock</option>
												</select>
											</div>
										</div>
										<div class="col-lg-12 col-md-12 col-sm-12">
											<div class="form-group">
												<label class="form-label">Assets Details</label>
												<textarea class="form-control" name="asset_details" rows="5" required>
													<?php if (isset($asset_details)) echo $asset_details ?>
												</textarea>
											</div>
										</div>



										<div class="col-lg-12 col-md-12 col-sm-12">
											<button type="submit" name="add_library_btn" class="btn btn-primary">Add Record</button>
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