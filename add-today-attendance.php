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
	<?php include_once("./php/config.php") ?>
	<?php include_once("./php/connection.php") ?>
	<?php include_once("./php/attendance.php") ?>

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

				if ($success_alert) {
					// bootstrap dialogue 
					echo '				
					<div class="alert alert-success text-black" role="alert">
						Your Attendance has been Marked Successfully.!
					  </div>
					';
					// <!-- bootstrap dialogue 
				}
				if ($attendance_exists_alert) {
					// bootstrap dialogue 
					echo '				
					<div class="alert alert-danger text-black" role="alert">
						Sorry! Your Attendance Already Exists on this date.
					  </div>
					';
					// <!-- bootstrap dialogue 
				}
				if ($attendance_empty_alert) {
					echo
					'
					<div class="alert alert-danger text-black" role="alert">
					Please Mark an Attendance First.
				  </div>
					';
				}
				if ($insert_record_alert) {
					// bootstrap dialogue 
					echo '				
                    	<div class="alert alert-danger text-white bg-red " role="alert">
                    	Sorry! We Could Not Marked Your Attendance due to some Error.
                    	</div>
                    	';
					// <!-- bootstrap dialogue 
				}

				?>
				<div class="row page-titles mx-0">
					<div class="col-sm-6 p-md-0">
						<div class="welcome-text">
							<h4>Add Today Attendance</h4>
						</div>
					</div>
					<div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="index.html">Home</a></li>
							<li class="breadcrumb-item active"><a href="add-professor.html">Attendance</a></li>
							<li class="breadcrumb-item active"><a href="javascript:void(0)">Add Today Student-Attendance</a></li>
						</ol>
					</div>
				</div>


				<div class="row tab-content">
					<div id="list-view" class="tab-pane fade active show col-lg-12">
						<div class="card">
							<div class="card-header">
								<h4 class="card-title">Add Today Attendance</h4>
								<span style="color:#7356f1;"><?php echo date("Y-m-d") ?></span>
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
												<!-- <th>Attendance Details</th> -->
											</tr>

											<?php

											include_once("./php/attendance.php");
											include_once("./php/connection.php");

											$select_query = "SELECT * FROM `students` ";
											$select_query_res = mysqli_query($con, $select_query);
											$select_query_row = mysqli_num_rows($select_query_res);
											if ($select_query_row > 0) {
												$counter = 0;
												$serial_number = 0;
												while ($fetched_record = mysqli_fetch_assoc($select_query_res)) {
													$serial_number++;
											?>


													<tr>
														<td><?php echo $serial_number
															?></td>
														<td><?php echo $fetched_record['firstname'] . ' ' . $fetched_record['lastname'] ?></td>
														<td><?php echo $fetched_record['roll_no'] ?></td>

														<form action="add-today-attendance.php" method="post">
															<td>
																<!-- hidden inputs for holding name and roll no data -->
																<input type="hidden" name="hidden_name[]" value="<?php echo $fetched_record['firstname'] . ' ' . $fetched_record['lastname'] ?>">
																<input type="hidden" name="hidden_roll_no[]" value="<?php echo $fetched_record['roll_no'] ?>">

																<label>Present</label>
																<input type="radio" name="attendance_status[<?php echo $counter ?>]" class="btn btn-primary" value="Present">
																<label>Absent</label>
																<input type="radio" name="attendance_status[<?php echo $counter ?>]" class="btn btn-danger" value="Absent">
															</td>
													</tr>
											<?php

													$counter++;
												}
											}

											?>
										</tbody>

									</table>

									<input type="submit" name="submit_Attendance_btn" class="btn btn-primary">
									</form>
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





</body>

</html>


