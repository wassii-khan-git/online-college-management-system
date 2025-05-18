<?php
include_once("admin/admin-login.php");

// session_start();

include_once("./php/config.php");

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

	<!-- php -->



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
							<h4>All Messages</h4>
						</div>
					</div>
					<div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="index.html">Home</a></li>
							<li class="breadcrumb-item active"><a href="javascript:void(0);">Messages</a></li>
							<li class="breadcrumb-item active"><a href="javascript:void(0);">All Messages</a></li>
						</ol>
					</div>
				</div>

				<div class="row">
					<div class="col-lg-12">
						<ul class="nav nav-pills mb-3">
							<!-- <li class="nav-item"><a href="#list-view" data-toggle="tab" class="nav-link btn-primary mr-1 show active">List View</a></li> -->
							<!-- <li class="nav-item"><a href="#grid-view" data-toggle="tab" class="nav-link btn-primary">Grid View</a></li> -->
						</ul>
					</div>
					<div class="col-lg-12">
						<div class="row tab-content">
							<div id="list-view" class="tab-pane fade active show col-lg-12">
								<div class="card">
									<div class="card-header">
										<h4 class="card-title">All Messages </h4>
										<!-- <a href="add-professor.php" class="btn btn-primary">+ Add new</a> -->
									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table id="example3" class="display" style="min-width: 860px">
												<thead>
													<tr>
														<th scope="col">Id</th>
														<th scope="col">Name</th>
														<th scope="col">Email</th>
														<th scope="col">Message</th>
														<th scope="col">Time</th>
														<th scope="col">Date</th>
														<!-- <th scope="col">Action</th> -->
													</tr>
												</thead>
												<tbody>



													<?php

													// <!-- php code for retrieving data from database -->

													require_once "./php/connection.php";
													require_once "./php/config.php";

													$retrieve_query = "SELECT * FROM `messages`";
													$retrieve_query_result = mysqli_query($con, $retrieve_query);
													$row = mysqli_num_rows($retrieve_query_result);

													$professor_count = 0;

													if ($row > 0) {
														while ($fetch_record = mysqli_fetch_assoc($retrieve_query_result)) {
													?>
															<tr>
																<td class="sorting_asc_disabled sorting_desc_disabled sorting_1_disabled "><?php echo $fetch_record['id'] ?></td>
																<!-- <td><img class="rounded-circle" width="35" src="./uploads/<?php echo $fetch_record['image'] ?>" alt=""></td> -->
																<td><?php echo $fetch_record['name'] ?></td>
																<!-- <td><?php echo $fetch_record['email'] ?></td> -->
																<td><a href="javascript:void(0);"><strong><?php echo $fetch_record['email'] ?></strong></a></td>
																<td><span class="py-2 px-2" style="background-color:#7356f1 ;color: #fff;"><?php echo $fetch_record['message'] ?></span></td>
																<td><?php echo $fetch_record['time'] ?></td>
																<td><?php echo $fetch_record['date'] ?></td>

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