<?php
// include_once("admin/login.php");

// session_start();

include_once("./php/config.php");
include_once("./php/students.php");

// check if the user is logged in, if not redirect him to login page
if (!isset($_SESSION['teacher_logged']) || $_SESSION['teacher_logged'] !== true) {
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
	<!-- Datatable -->
	<link href="vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/style.css">


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

				<?php
				if ($delete_success_alert) {
					// bootstrap dialogue 
					echo '				
					<div class="alert alert-success text-black" role="alert">
					    Your Account has been Deleted Successfully.!
  					</div>
					';
					// <!-- bootstrap dialogue 
				}
				if ($delete_error_alert) {
					// bootstrap dialogue 
					echo '				
					<div class="alert alert-danger text-white bg-red " role="alert">
					Sorry! We Cannot Delete your Account due to some Error.
					</div>
					';
					// <!-- bootstrap dialogue 
				}
				?>

				<div class="row page-titles mx-0">
					<div class="col-sm-6 p-md-0">
						<div class="welcome-text">
							<h4>All Students</h4>
						</div>
					</div>
					<div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="index.php">Home</a></li>
							<li class="breadcrumb-item active"><a href="javascript:void(0);">Students</a></li>
							<li class="breadcrumb-item active"><a href="javascript:void(0);">All Students</a></li>
						</ol>
					</div>
				</div>

				<div class="row">
					<div class="col-lg-12">
						<ul class="nav nav-pills mb-3">
							<li class="nav-item"><a href="#list-view" data-toggle="tab" class="nav-link btn-primary mr-1 show active">List View</a></li>
							<li class="nav-item"><a href="#grid-view" data-toggle="tab" class="nav-link btn-primary">Grid View</a></li>
						</ul>
					</div>
					<div class="col-lg-12">
						<div class="row tab-content">
							<div id="list-view" class="tab-pane fade active show col-lg-12">
								<div class="card">
									<div class="card-header">
										<h4 class="card-title">All Students </h4>
										<a href="add-student.php" class="btn btn-primary">+ Add new</a>
									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table id="example3" class="display" style="min-width: 860px">
												<thead>
													<tr>
														<th>Id</th>
														<th>Profile</th>
														<th>Name</th>
														<th>Gender</th>
														<th>Education</th>
														<th>Mobile</th>
														<th>Email</th>
														<th>Admission Date</th>
														<th>Action</th>
													</tr>
												</thead>
												<tbody>



													<?php

													// <!-- php code for retrieving data from database -->

													require_once "./php/connection.php";
													require_once "./php/config.php";

													$retrieve_query = "SELECT * FROM `students`";
													$retrieve_query_result = mysqli_query($con, $retrieve_query);
													$row = mysqli_num_rows($retrieve_query_result);

													// student count variable 
													$student_count = 0;


													if ($row > 0) {
														while ($fetch_record = mysqli_fetch_assoc($retrieve_query_result)) {
															// session_start();
															$_SESSION['student_count'] = $student_count++;
													?>
															<tr>
																<td class="sorting_asc_disabled sorting_desc_disabled sorting_1_disabled "><?php echo $fetch_record['id'] ?></td>
																<td><img class="rounded-circle" width="35" src="./uploads/<?php echo $fetch_record['image'] ?>" alt=""></td>
																<td><?php echo $fetch_record['firstname'] . ' ' . $fetch_record['lastname'] ?></td>
																<td><?php echo $fetch_record['gender'] ?></td>
																<td><?php echo $fetch_record['class'] ?></td>
																<td><a href="javascript:void(0);"><strong><?php echo $fetch_record['mobile_number'] ?></strong></a></td>
																<td><a href="javascript:void(0);"><strong><?php echo $fetch_record['email'] ?></strong></a></td>
																<td><?php echo $fetch_record['registration_date'] ?></td>

																<td>
																	<form action="all-students.php" method="post">
																		<input type="hidden" name="hidden_profile_box" value="<?php echo $fetch_record['id']; ?>">
																		<button type="submit" name="profile_btn" class="btn btn-success"><i class="la la-user"></i></button>
																		<input type="hidden" name="hidden_edit_box" value="<?php echo $fetch_record['id']; ?>">
																	</form>

																</td>

															</tr>



													<?php
														}
													} else {
														echo "<h1>No Record Found!</h1>";
													}

													?>


												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>


							<!-- grid view -->
							<div id="grid-view" class="tab-pane fade col-lg-12">
								<div class="row">
									<?php

									// <!-- php code for retrieving data from database -->
									require_once "./php/connection.php";

									$retrieve_query = "SELECT * FROM `students`";
									$retrieve_query_result = mysqli_query($con, $retrieve_query);
									$row = mysqli_num_rows($retrieve_query_result);

									if ($row > 0) {
										while ($fetch_record = mysqli_fetch_assoc($retrieve_query_result)) {

									?>
											<div class="col-md-4 ">
												<div class="card card-profile mt-2 ">
													<div class="card-header justify-content-end pb-0">
														<div class="dropdown">
															<button class="btn btn-link" type="button" data-toggle="dropdown">
																<span class="dropdown-dots fs--1"></span>
															</button>
															<div class="dropdown-menu dropdown-menu-right border py-0">
																<div class="py-2">
																</div>
															</div>
														</div>
													</div>
													<div class="card-body ">
														<div class="text-center">
															<div class="profile-photo">
																<img src="./uploads/<?php echo $fetch_record['image'] ?>" width="100" class="img-fluid rounded-circle" alt="...">
															</div>
															<h3 class="mt-4 mb-1"><?php echo $fetch_record['firstname'] . ' ' . $fetch_record['lastname'] ?></h3>
															<ul class="list-group mb-3 list-group-flush">
																<li class="list-group-item px-0 d-flex justify-content-center">
																	<strong><?php echo $fetch_record['id'] ?></strong>
																</li>
																<li class="list-group-item px-0 d-flex justify-content-between">
																	<span class="mb-0">Gender :</span><strong><?php echo $fetch_record['gender'] ?></strong>
																</li>
																<li class="list-group-item px-0 d-flex justify-content-between">
																	<span class="mb-0">Phone No. :</span><strong><?php echo $fetch_record['mobile_number'] ?></strong>
																</li>
																<li class="list-group-item px-0 d-flex justify-content-between">
																	<span class="mb-0">Email:</span><strong><?php echo $fetch_record['email'] ?></strong>
																</li>
																<li class="list-group-item px-0 d-flex justify-content-between">
																	<span class="mb-0">Class:</span><strong><?php echo $fetch_record['class'] ?></strong>
																</li>
															</ul>
															<form action="all-students.php" method="post">
																<input type="hidden" name="hidden_profile_box" value="<?php echo $fetch_record['id']; ?>">
																<button type="submit" name="profile_btn" class="btn btn-outline-primary btn-rounded mt-3 px-4">Read More</button>
																<input type="hidden" name="hidden_edit_box" value="<?php echo $fetch_record['id']; ?>">
															</form>
														</div>
													</div>
												</div>
											</div>
									<?php

										}
									}

									?>
								</div>
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



		<!-- delete modal -->
		<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Open modal for @mdo</button> -->
		<div class="modal fade" id="delete_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<form action="all-students.php" method="post">
						<input type="hidden" name="hidden_id" id="hidden_id">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Alert Warning!</h5>
						</div>
						<div class="modal-body">
							<h5 class="modal-body" id="exampleModalLabel">Do you Really Want to Delete this Record ?</h5>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default waves-effect" data-dismiss="modal">No</button>
							<button type="submit" name="delete_student_btn" class="btn btn-danger">Yes</button>
						</div>
					</form>
				</div>
			</div>
		</div>




		<!-- Delete Grid Modal Add Category -->
		<div class="modal fade none-border" id="delete_grid_modal">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title"><strong>Alert Warning !</strong></h4>
					</div>
					<div class="modal-body">
						<form action="all-students.php" method="POST">
							<input type="hidden" name="delete_grid_id_value" id="delete_grid_id_value">
							<div class="modal-header">
								<h4 class="modal-title">Do you Really Want to Delete this Row ?</h4>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default waves-effect" data-dismiss="modal">No</button>
								<button type="submit" name="delete_student_grid_btn" class="btn btn-danger waves-effect waves-light save-category">Yes</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>












	</div>
	<!--**********************************
        Main wrapper end
    ***********************************-->

	<!--**********************************
        Scripts
    ***********************************-->



	<!-- Jquery and bootstrap  -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>



	<!-- Required vendors -->
	<script src="vendor/global/global.min.js"></script>
	<script src="vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
	<script src="js/custom.min.js"></script>
	<script src="js/dlabnav-init.js"></script>


	<!-- Datatable -->
	<script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
	<script src="js/plugins-init/datatables.init.js"></script>

	<!-- Delete JS -->
	<script src="./js/delete.js"></script>


</body>

</html>



<!-- INSERT INTO `students` (`id`, `firstname`, `lastname`, `email`, `registration_date`, `class`, `gender`, `mobile_number`, `parents_name`, `parents_mobile_number`, `date_of_birth`, `adress`, `image`, `date`) VALUES (NULL, 'waseem ', 'khan', 'waseemkhan@gmail.com', '2022-10-18', 'Computer Science', 'Male', '90076602', 'jahangir', '090076601', '2012-10-11', 'california, south road street 143A.', '1.jpg', current_timestamp());
INSERT INTO `students` (`id`, `firstname`, `lastname`, `email`, `registration_date`, `class`, `gender`, `mobile_number`, `parents_name`, `parents_mobile_number`, `date_of_birth`, `adress`, `image`, `date`) VALUES (NULL, 'salman ', 'khan', 'salmankhan@gmail.com', '2022-10-18', 'Computer Science', 'Male', '900766021', 'jahangir', '0900766014', '2012-10-11', 'us, south road street 143A.', '2.jpg', current_timestamp());
INSERT INTO `students` (`id`, `firstname`, `lastname`, `email`, `registration_date`, `class`, `gender`, `mobile_number`, `parents_name`, `parents_mobile_number`, `date_of_birth`, `adress`, `image`, `date`) VALUES (NULL, 'kamran ', 'khan', 'kamrankhan@gmail.com', '2022-10-18', 'Computer Science', 'Male', '900766098', 'jahangir', '090076685', '2012-10-11', 'africa, south road street 143A.', '3.jpg', current_timestamp());
INSERT INTO `students` (`id`, `firstname`, `lastname`, `email`, `registration_date`, `class`, `gender`, `mobile_number`, `parents_name`, `parents_mobile_number`, `date_of_birth`, `adress`, `image`, `date`) VALUES (NULL, 'ayesha ', 'khan', 'ayeshakhan@gmail.com', '2022-10-18', 'Computer Science', 'Female', '900767322', 'jahangir', '090435381', '2012-10-11', 'china, south road street 143A.', '1.jpg', current_timestamp()); -->