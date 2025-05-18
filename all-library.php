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
					    Your Book Record has been Deleted Successfully.!
  					</div>
					';
					// <!-- bootstrap dialogue 
				}
				if ($delete_error_alert) {
					// bootstrap dialogue 
					echo '				
					<div class="alert alert-danger text-white bg-red " role="alert">
					Sorry! We Cannot Delete your Record due to some Error.
					</div>
					';
					// <!-- bootstrap dialogue 
				}
				?>

				<div class="row page-titles mx-0">
					<div class="col-sm-6 p-md-0">
						<div class="welcome-text">
							<h4>Library Assets</h4>
						</div>
					</div>
					<div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="index.php">Home</a></li>
							<li class="breadcrumb-item active"><a href="javascript:void(0);">Library</a></li>
							<li class="breadcrumb-item active"><a href="javascript:void(0);">Library Assets</a></li>
						</ol>
					</div>
				</div>

				<div class="row">
					<div class="col-lg-12">
						<div class="card">
							<div class="card-header">
								<h4 class="card-title">Asset List</h4>
								<a href="add-library.php" class="btn btn-primary">+ Add new</a>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table id="example3" class="display" style="min-width: 845px">
										<thead>
											<tr>
												<th>#</th>
												<th>Picture</th>
												<th>Title</th>
												<th>Subject</th>
												<th>Author</th>
												<th>Publisher</th>
												<th>Type</th>
												<th>Price</th>
												<th>Year</th>
												<th>Status</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>

											<?php

											// <!-- php code for retrieving data from database -->

											require_once "./php/connection.php";
											require_once "./php/config.php";

											$retrieve_query = "SELECT * FROM `library`";
											$retrieve_query_result = mysqli_query($con, $retrieve_query);
											$row = mysqli_num_rows($retrieve_query_result);

											$library_count = 0;

											if ($row > 0) {
												while ($fetch_record = mysqli_fetch_assoc($retrieve_query_result)) {
													$_SESSION['library_count'] = $library_count++;
											?>
													<tr>
														<td class="sorting_asc_disabled sorting_desc_disabled sorting_1_disabled "><?php echo $fetch_record['id'] ?></td>
														<td><img class="rounded-circle" width="35" src="./uploads/<?php echo $fetch_record['image'] ?>" alt=""></td>
														<td><?php echo $fetch_record['title'] ?></td>
														<td><?php echo $fetch_record['subject'] ?></td>
														<td><?php echo $fetch_record['author_name'] ?></td>
														<td><?php echo $fetch_record['publisher'] ?></td>
														<td><?php echo $fetch_record['asset_type'] ?></td>
														<td><?php echo $fetch_record['price'] ?>$</td>
														<td><?php echo $fetch_record['purchase_date'] ?></td>
														<td><?php echo $fetch_record['status'] ?></td>

														<td>
															<form action="all-library.php" method="post">
																<input type="hidden" name="hidden_library_value" value="<?php echo $fetch_record['id'] ?>" id="hidden_library_value">
																<button type="submit" name="library_edit_btn" class="btn btn-sm btn-primary mx-1"><i class="la la-pencil"></i></a>
																<button type="button" class="delete btn btn-danger mx-1" data-toggle="modal" data-target="#delete_modal"><i class="la la-trash"></i></button>
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









		<!-- delete modal -->
		<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Open modal for @mdo</button> -->
		<div class="modal fade" id="delete_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<form action="all-library.php" method="post">
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
							<button type="submit" name="delete_library_btn" class="btn btn-danger">Yes</button>
						</div>
					</form>
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


<!-- INSERT INTO `library` (`id`, `title`, `subject`, `author_name`, `publisher`, `asset_type`, `purchase_date`, `price`, `status`, `asset_details`) VALUES ('1', 'Intro to Programming', 'Science', 'Paul Deital', 'James Martin publishing ', 'Book', '2022-10-21', '40$', 'In Stock', 'This Book is all about introduction to programming.');
INSERT INTO `library` (`id`, `title`, `subject`, `author_name`, `publisher`, `asset_type`, `purchase_date`, `price`, `status`, `asset_details`) VALUES (Null, 'Java', 'Science', 'Paul Deital', 'Martin publishing ', 'Book', '2022-10-21', '30$', 'Out of Stock', 'This Book is all about advance programming.');
INSERT INTO `library` (`id`, `title`, `subject`, `author_name`, `publisher`, `asset_type`, `purchase_date`, `price`, `status`, `asset_details`) VALUES (Null, 'C++', 'Science', 'Deital', 'Martin publishing ', 'Book', '2022-10-21', '80$', 'Out of Stock', 'This Book is all about old programming.');
INSERT INTO `library` (`id`, `title`, `subject`, `author_name`, `publisher`, `asset_type`, `purchase_date`, `price`, `status`, `asset_details`) VALUES (Null, 'Python', 'Science', 'Paul Deital', 'Martin luthor publishing ', 'Book', '2022-10-21', '50$', 'Out of Stock', 'This Book is all about modern programming.'); -->