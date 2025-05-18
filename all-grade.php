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
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

	<!-- Pick date -->
	<link rel="stylesheet" href="vendor/pickadate/themes/default.css">
	<link rel="stylesheet" href="vendor/pickadate/themes/default.date.css">

	<!-- datatable -->
	<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">

	<!-- php include -->


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
				<!-- php code -->
				<?php 

                    if ($present_flag) {
                    	// bootstrap dialogue 
                    	echo '				
                    	<div class="alert alert-success text-black" role="alert">
                    		Your Attendance has been Marked Successfully.!
                    	  </div>
                    	';
                    	// <!-- bootstrap dialogue 
                    }
                    if ($present_flag_error) {
                    	// bootstrap dialogue 
                    	echo '				
                    	<div class="alert alert-danger text-white bg-red " role="alert">
                    	Sorry! We Could not Marked Your Attendance due to some Error.
                    	</div>
                    	';
                    	// <!-- bootstrap dialogue 
                    }
					if ($absent_flag) {
                    	// bootstrap dialogue 
                    	echo '				
                    	<div class="alert alert-danger text-black" role="alert">
                    		Your Attendance has been Marked Successfully.!
                    	  </div>
                    	';
                    	// <!-- bootstrap dialogue 
                    }
                    if ($absent_flag_error) {
                    	// bootstrap dialogue 
                    	echo '				
                    	<div class="alert alert-danger text-black bg-red " role="alert">
                    	Sorry! We Could Not Marked Your Attendance due to some Error.
                    	</div>
                    	';
                    	// <!-- bootstrap dialogue 
                    }

				?>
				<div class="row page-titles mx-0">
					<div class="col-sm-6 p-md-0">
						<div class="welcome-text">
							<h4>Attendance</h4>
						</div>
					</div>
					<div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="index.html">Home</a></li>
							<li class="breadcrumb-item active"><a href="add-professor.html">Attendance</a></li>
							<li class="breadcrumb-item active"><a href="javascript:void(0)">Add Student-Attendance</a></li>
						</ol>
					</div>
				</div>

				<div class="row page-titles mx-0">
					<div class="col-sm-6 p-md-0">
						<div class="welcome-text">
							<h4>All Grades</h4>
						</div>
					</div>
					<div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
						<div class="welcome-text">
							<!-- <h4>Add Grade</h4> -->
							<a href="add-grade.php" class="btn btn-primary">Add Grade</a>
						</div>
					</div>
				</div>



				<div class="row tab-content">
					<div id="list-view" class="tab-pane fade active show col-lg-12">
						<div class="card">
							<div class="card-body">
								<div class="table-responsive">
									<table id="example3" class="display" style="min-width: 860px">
										<thead>
											<tr>
												<th scope="col">Grade Code</th>
												<th scope="col">Grade</th>
												<th scope="col">Subject</th>
												<th scope="col">Action</th>
											</tr>
										</thead>
										<tbody>



											<?php

											// <!-- php code for retrieving data from database -->

											require_once "./php/connection.php";
											require_once "./php/config.php";

											$retrieve_query = "SELECT * FROM `attendance_grade`";
											$retrieve_query_result = mysqli_query($con, $retrieve_query);
											$row = mysqli_num_rows($retrieve_query_result);

											if ($row > 0) {
												while ($fetch_record = mysqli_fetch_assoc($retrieve_query_result)) {

											?>

													<tr>
														<td><?php echo $fetch_record['grade_code'] ?></td>
														<td><?php echo $fetch_record['grade'] ?></td>
														<td><?php echo $fetch_record['subject'] ?></td>

														<td>

															<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
																<input type="hidden" name="hidden_subject" value="<?php echo $fetch_record['subject'] ?>">
																<input type="hidden" name="hidden_date" value="<?php echo $fetch_record['date'] ?>">
																<input type="submit" value="Take Attendance" class="btn btn-sm btn-primary" id="view_details" name="view_details">
															</form>


														</td>

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

	<script>
		$(document).ready(function() {
			$('#example').DataTable();

		});
	</script>




</body>

</html>



<!-- INSERT INTO `attendance` (`id`, `name`, `father_name`, `date`) VALUES (Null, 'rimsha', 'jamal khan', current_timestamp());
INSERT INTO `attendance` (`id`, `name`, `father_name`, `date`) VALUES (Null, 'Muqaddas', 'salman khan', current_timestamp());
INSERT INTO `attendance` (`id`, `name`, `father_name`, `date`) VALUES (Null, 'kamran', 'Nizamuddin khan', current_timestamp());
INSERT INTO `attendance` (`id`, `name`, `father_name`, `date`) VALUES (Null, 'Umari', 'Jalal khan', current_timestamp()); -->


<!-- <a href="professor-profile.php?id="" class="edit btn btn-sm btn-success">P</a>
<a href="edit-professor.php?id="" class="edit btn btn-sm btn-danger">A</a>
<button type="submit" class="delete btn btn-primary" data-toggle="modal" data-target="#delete_modal">L</button> -->