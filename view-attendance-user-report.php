
<?php
//  session_start();
include_once("./php/attendance.php");

 $subject = $_SESSION['hidden_subject']; 
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

	<style>
		.bg-success {
			background-color: #198754 !important;
		}
		#navbarSupportedContent>ul {text-align: center;}
	</style>

	<!-- php include -->
	<?php include_once("./php/config.php") ?>
	<?php include_once("./php/connection.php") ?>
	<?php include_once("./php/attendance.php") ?>

</head>

<body>

	<?php include("user-top_header.php") ?>
	<?php include("user-top-navbar.php") ?>

			<div class="container">
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
				<div class="row page-titles mx-0 mt-5">
					<div class="col-sm-6 p-md-0">
						<div class="welcome-text">
							<h4>Attendance</h4>
						</div>
					</div>
					<div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="index.html">Home</a></li>
							<li class="breadcrumb-item active"><a href="add-professor.html">Attendance</a></li>
							<li class="breadcrumb-item active"><a href="javascript:void(0)">All Grade-Attendance</a></li>
						</ol>
					</div>
				</div>


				<!-- data -->

                <div class="row tab-content">
					<div id="list-view" class="tab-pane fade active show col-lg-12">
						<div class="card">
							<div class="card-header">
								<h4 class="card-title">Attendance</h4>
								<!-- <a href="attendance_details.php" class="btn btn-primary">View Details</a> -->
							</div>
							<div class="card-body">
								<div class="table-responsive">
										<!-- get all the data inside the table -->
										<table class="table">
										<tbody>

											<tr>
												<th>Id</th>
												<th>Name</th>
												<th>Roll No</th>
												<th>Attendance</th>
												<th>Date</th>
												<!-- <th>View Report</th> -->
											</tr>

											<?php

											include_once("./php/attendance.php");
											include_once("./php/connection.php");

											$select_query = "SELECT * FROM `attendance_records` WHERE attendance_class = '$subject' ";
											$select_query_res = mysqli_query($con, $select_query);
											$select_query_row = mysqli_num_rows($select_query_res);
											if ($select_query_row > 0) {
												$counter = 0;
												$serial_number = 0;
												while ($fetched_record = mysqli_fetch_assoc($select_query_res)) {
													$serial_number++;
											?>


													<tr>
														<td><?php echo $serial_number?></td>
														<td><?php echo $fetched_record['name'] ?></td>
														<td><?php echo $fetched_record['roll_no'] ?></td>
														<td>
                                                            <?php
                                                                $fetched_record['attendance_status'];
                                                                if($fetched_record['attendance_status'] == "Present"){
                                                                    echo '<span class="badge badge-rounded badge-primary" >'.$fetched_record['attendance_status'].'</span>';
                                                                } else {
                                                                    echo '<span class="badge badge-rounded badge-danger" >'.$fetched_record['attendance_status'].'</span>';

                                                                }
                                                             ?>
                                                        
                                                        </td>
														<td><?php echo $fetched_record['attendance_date'] ?></td>
														<td>
                                                            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                                                                <input type="hidden" name="hidden_roll_number"  value="<?php echo $fetched_record['roll_no'] ?>" id="hidden_roll_number">
                                                                <!-- <input type="submit" class="btn btn-sm btn-primary" value="view Report" name="view_report_btn"> -->
                                                            </form>
                                                        </td>
													</tr>
											<?php

													$counter++;
												}
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
		<?php include("user-footer.php") ?>
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