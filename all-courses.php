<?php
include_once("admin/admin-login.php");

// session_start();

include_once("./php/config.php"); 
include("./php/courses.php");

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
							<h4>All Courses</h4>
						</div>
					</div>
					<div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="index.html">Home</a></li>
							<li class="breadcrumb-item active"><a href="javascript:void(0);">Professors</a></li>
							<li class="breadcrumb-item active"><a href="javascript:void(0);">All Courses</a></li>
						</ol>
					</div>
				</div>

				<div class="row">
					<div class="col-lg-12">
						<!-- <ul class="nav nav-pills mb-3">
							<li class="nav-item"><a href="#list-view" data-toggle="tab" class="nav-link btn-primary mr-1 show active">List View</a></li>
							<li class="nav-item"><a href="#grid-view" data-toggle="tab" class="nav-link btn-primary">Grid View</a></li>
						</ul> -->
					</div>
					<div class="col-lg-12">
						<div class="row tab-content">
							<div id="list-view" class="tab-pane fade active show col-lg-12">
								<div class="card">
									<div class="card-header">
										<h4 class="card-title">All Courses </h4>
										<a href="add-courses.php" class="btn btn-primary">+ Add new</a>
									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table id="example3" class="display" style="min-width: 860px">
												<thead>
													<tr>
														<th scope="col">Id</th>
														<th scope="col">Profile</th>
														<th scope="col">Course name</th>
														<th scope="col">Coruse Code</th>
														<th scope="col">Professor</th>
														<th scope="col">Action</th>
													</tr>
												</thead>
												<tbody>



													<?php

													// <!-- php code for retrieving data from database -->

													require_once "./php/connection.php";
													require_once "./php/config.php";

													$retrieve_query = "SELECT * FROM `courses` ";
													$retrieve_query_result = mysqli_query($con, $retrieve_query);
													$row = mysqli_num_rows($retrieve_query_result);

													$professor_count = 0;

													if ($row > 0) {
														while ($fetch_record = mysqli_fetch_assoc($retrieve_query_result)) {
															// session_start();
													?>
															<tr>
																<td class="sorting_asc_disabled sorting_desc_disabled sorting_1_disabled "><?php echo $fetch_record['id'] ?></td>
																<td><img class="rounded-circle" width="35" src="./uploads/<?php echo $fetch_record['image'] ?>" alt=""></td>
																<td><?php echo $fetch_record['course_name'] ?></td>
																<td><?php echo $fetch_record['course_code'] ?></td>
																<td><?php echo $fetch_record['professor_name'] ?></td>

																<td>
																	<form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
																		<input type="hidden" name="hidden_edit_course_value" value="<?php echo $fetch_record['id'] ;?>">
																		<button type="submit" name="course_profile_btn" class="btn btn-success"><i class="la la-user"></i></button>
																		<input type="hidden" name="hidden_profile_course_value" value="<?php echo $fetch_record['id'] ;?>">
																		<button type="submit" name="course_edit_btn" class="btn btn-primary"><i class="la la-pencil"></i></button>
																		<button type="button" class="delete btn btn-danger" data-toggle="modal" data-target="#delete_modal"><i class="la la-trash"></i></button>
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

									$retrieve_query = "SELECT * FROM `professors`";
									$retrieve_query_result = mysqli_query($con, $retrieve_query);
									$row = mysqli_num_rows($retrieve_query_result);

									if ($row > 0) {
										while ($fetched_record = mysqli_fetch_assoc($retrieve_query_result)) {

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
																	<form action="all-professors.php" method="post">
																	<input type="hidden" name="hidden_edit_grid_box" value="<?php echo $fetched_record['id'] ;?>">
																	<button class="dropdown-item" name="edit_grid_btn" type="submit">Edit</button>
																		<!-- <a class="dropdown-item" href="edit-professor.php?id=<?php echo $fetched_record['id']; ?>">Edit</a> -->
																		<button type="button" data-toggle="modal" class="delete_grid dropdown-item text-danger" data-target="#delete_grid_modal">Delete</button>
																	</form>
																	<!-- <a class="dropdown-item text-danger" href="javascript:void(0);">Delete</a> -->
																</div>
															</div>
														</div>
													</div>
													<div class="card-body ">
														<div class="text-center">
															<div class="profile-photo">
																<img src="./uploads/<?php echo $fetched_record['image'] ?>" width="100" class="img-fluid rounded-circle" alt="...">
															</div>
															<h3 class="mt-4 mb-1"><?php echo $fetched_record['firstname'] . ' ' . $fetched_record['lastname'] ?></h3>
															<p class="text-muted"><?php echo $fetched_record['department'] ?> </p>
															<ul class="list-group mb-3 list-group-flush">
																<li class="list-group-item px-0 d-flex justify-content-center">
																	<strong><?php echo $fetched_record['id'] ?></strong>
																</li>
																<li class="list-group-item px-0 d-flex justify-content-between">
																	<span class="mb-0">Gender :</span><strong><?php echo $fetched_record['gender'] ?></strong>
																</li>
																<li class="list-group-item px-0 d-flex justify-content-between">
																	<span class="mb-0">Phone No. :</span><strong><?php echo $fetched_record['mobile_number'] ?></strong>
																</li>
																<li class="list-group-item px-0 d-flex justify-content-between">
																	<span class="mb-0">Email:</span><strong><?php echo $fetched_record['email'] ?></strong>
																</li>
																<li class="list-group-item px-0 d-flex justify-content-between">
																	<span class="mb-0">Department:</span><strong><?php echo $fetched_record['department'] ?></strong>
																</li>
															</ul>
															<a class="btn btn-outline-primary btn-rounded mt-3 px-4" href="professor-profile.php?id=<?php echo $fetched_record['id']; ?>">Read More</a>
															<!-- <a class="btn btn-outline-primary btn-rounded mt-3 px-4" href="professor-profile.php">Read More</a> -->

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
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
        <input type="hidden" name="hidden_id" id="hidden_id">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Alert Warning!</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h5 class="modal-body" id="exampleModalLabel">Do you Really Want to Delete this Record ?</h5>
      </div>
      <div class="modal-footer">
	  <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
        <button type="submit" name="delete_course_btn" class="btn btn-danger">Yes</button>
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
						<form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
							<input type="hidden" name="delete_grid_id_value" id="delete_grid_id_value">
							<div class="modal-header">
								<h4 class="modal-title">Do you Really Want to Delete this Row ?</h4>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default waves-effect" data-dismiss="modal">No</button>
								<button type="submit" name="delete_grid_btn" class="btn btn-danger waves-effect waves-light save-category">Yes</button>
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



<!-- INSERT INTO `professors` ( `firstname`, `lastname`, `email`, `joining_data`, `password`, `mobile_number`, `gender`, `department`, `date_of_birth`, `education`, `image`, `date`) VALUES ('ayesha', 'khan', 'ayeshakhan@gmail.com', '2022-10-03', 'ejkfaekfeufguefeegfafek', '923434234', 'Male', 'Mathematics', '2013-10-02', 'bacherlor', 'pic1.jpg', '2022-10-19');
INSERT INTO `professors` ( `firstname`, `lastname`, `email`, `joining_data`, `password`, `mobile_number`, `gender`, `department`, `date_of_birth`, `education`, `image`, `date`) VALUES ( 'kamran', 'khan', 'kamrnakhan@gmail.com', '2022-10-03', 'ejkfaekfeufguefeegfafek', '923434654', 'Male', 'Mathematics', '2013-10-02', 'bacherlor', 'pic2.jpg', '2022-10-19');
INSERT INTO `professors` ( `firstname`, `lastname`, `email`, `joining_data`, `password`, `mobile_number`, `gender`, `department`, `date_of_birth`, `education`, `image`, `date`) VALUES ( 'salma', 'khan', 'salmakhan@gmail.com', '2022-10-03', 'ejkfaekfeufguefeegfafek', '923434629', 'Female', 'Mathematics', '2013-10-02', 'bacherlor', 'pic3.jpg', '2022-10-19');
INSERT INTO `professors` ( `firstname`, `lastname`, `email`, `joining_data`, `password`, `mobile_number`, `gender`, `department`, `date_of_birth`, `education`, `image`, `date`) VALUES ( 'rimsha', 'khan', 'rimsha@gmail.com', '2022-10-03', 'ejkfaekfeufguefeegfafek', '923434610', 'Female', 'Mathematics', '2013-10-02', 'bacherlor', 'pic4.jpg', '2022-10-19');
INSERT INTO `professors` ( `firstname`, `lastname`, `email`, `joining_data`, `password`, `mobile_number`, `gender`, `department`, `date_of_birth`, `education`, `image`, `date`) VALUES ( 'muqaddass', 'khan', 'muqaddasskhan@gmail.com', '2022-10-03', 'ejkfaekfeufguefeegfafek', '923434611', 'Female', 'Mathematics', '2013-10-02', 'bacherlor', 'pic5.jpg', '2022-10-19');
INSERT INTO `professors` ( `firstname`, `lastname`, `email`, `joining_data`, `password`, `mobile_number`, `gender`, `department`, `date_of_birth`, `education`, `image`, `date`) VALUES ( 'jannat', 'khan', 'jannatkhan@gmail.com', '2022-10-03', 'ejkfaekfeufguefeegfafek', '923434612', 'Female', 'Mathematics', '2013-10-02', 'bacherlor', 'pic6.jpg', '2022-10-19');
INSERT INTO `professors` ( `firstname`, `lastname`, `email`, `joining_data`, `password`, `mobile_number`, `gender`, `department`, `date_of_birth`, `education`, `image`, `date`) VALUES ( 'janan', 'khan', 'janankhan@gmail.com', '2022-10-03', 'ejkfaekfeufguefeegfafek', '923434613', 'Male', 'Mathematics', '2013-10-02', 'bacherlor', 'pic7.jpg', '2022-10-19');
INSERT INTO `professors` ( `firstname`, `lastname`, `email`, `joining_data`, `password`, `mobile_number`, `gender`, `department`, `date_of_birth`, `education`, `image`, `date`) VALUES ( 'saira', 'khan', 'sairakhan@gmail.com', '2022-10-03', 'ejkfaekfeufguefeegfafek', '923434614', 'Female', 'Mathematics', '2013-10-02', 'bacherlor', 'pic8.jpg', '2022-10-19');
INSERT INTO `professors` ( `firstname`, `lastname`, `email`, `joining_data`, `password`, `mobile_number`, `gender`, `department`, `date_of_birth`, `education`, `image`, `date`) VALUES ( 'naima', 'khan', 'naimakhan@gmail.com', '2022-10-03', 'ejkfaekfeufguefeegfafek', '923434615', 'Female', 'Mathematics', '2013-10-02', 'bacherlor', 'pic9.jpg', '2022-10-19');
INSERT INTO `professors` ( `firstname`, `lastname`, `email`, `joining_data`, `password`, `mobile_number`, `gender`, `department`, `date_of_birth`, `education`, `image`, `date`) VALUES ( 'james', 'khan', 'james@gmail.com', '2022-10-03', 'ejkfaekfeufguefeegfafek', '923434616', 'Female', 'Mathematics', '2013-10-02', 'bacherlor', 'pic10.jpg', '2022-10-19'); -->




<!-- <tr>
	<th>#</th>
	<th>Roll No.</th>
	<th>Name</th>
	<th>Education</th>
	<th>Mobile</th>
	<th>Email</th>
	<th>Admission Date</th>
	<th>Action</th>
</tr> -->