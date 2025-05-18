<?php
// include_once("admin/admin-login.php");

// session_start();

require_once "./php/connection.php";
include "./php/config.php";
require_once "./php/library.php";

// check if the user is logged in, if not redirect him to login page
if(!isset($_SESSION['logged']) || $_SESSION['logged'] !== true){
    header("Location: not-found.php");
    exit;
}


?>
<?php



// php code for retrieving data from database -->

$edit_id = $_SESSION['hidden_library_value'];

// getting id from the url
// $edit_id = $_GET['id'];

$retrieve_query = "SELECT * FROM `library` WHERE `id` = '$edit_id' ";
$retrieve_query_result = mysqli_query($con, $retrieve_query);
$row = mysqli_num_rows($retrieve_query_result);
if ($row > 0) {
	while ($fetch_record = mysqli_fetch_assoc($retrieve_query_result)) {

		// get the data from the database
		$fetched_title = mysqli_real_escape_string($con, $fetch_record['title']);
		$fetched_subject = mysqli_real_escape_string($con, $fetch_record['subject']);
		$fetched_author_name = mysqli_real_escape_string($con, $fetch_record['author_name']);
		$fetched_publisher = mysqli_real_escape_string($con, $fetch_record['publisher']);
		$fetched_asset_type = mysqli_real_escape_string($con, $fetch_record['asset_type']);
		$fetched_purchase_date = mysqli_real_escape_string($con, $fetch_record['purchase_date']);
		$fetched_price = mysqli_real_escape_string($con, $fetch_record['price']);
		$fetched_status = mysqli_real_escape_string($con, $fetch_record['status']);
		$fetched_asset_details = mysqli_real_escape_string($con, $fetch_record['asset_details']);
		$fetched_image = mysqli_real_escape_string($con, $fetch_record['image']);
	}
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
	if (isset($_POST['update_library_btn'])) {

		// get the data from the database
		$title = mysqli_real_escape_string($con, $_POST['title']);
		$subject = mysqli_real_escape_string($con, $_POST['subject']);
		$author_name = mysqli_real_escape_string($con, $_POST['author_name']);
		$publisher = mysqli_real_escape_string($con, $_POST['publisher']);
		$asset_type = mysqli_real_escape_string($con, $_POST['asset_type']);
		$purchase_date = mysqli_real_escape_string($con, $_POST['purchase_date']);
		$price = mysqli_real_escape_string($con, $_POST['price']);
		$status = mysqli_real_escape_string($con, $_POST['status']);
		$asset_details = mysqli_real_escape_string($con, $_POST['asset_details']);

		if (!preg_match($name, $_POST['title'])) {
			// echo "<h1>Please Enter a valid Title!</h1>";
			$title_error_msg = "Please Enter a valid Title!";
			$title_alert = true;
		} elseif (!preg_match($name, $_POST['author_name'])) {
			// echo "<h1>Please Enter a valid Author Name!</h1>";
			$author_name_error_msg = "Please Enter a valid Author Name!";
			$author_name_alert = true;
		} else {


			if (!preg_match($name, $_POST['publisher'])) {
				// echo "<h1>Please Enter a valid Publisher Name!</h1>";
				$publisher_eror_msg = "Please Enter a valid Publisher Name!";
				$publisher_alert = true;
			} else {

				if (!preg_match($number, $_POST['price'])) {
					// echo "<h1>Please Enter a valid Price!</h1>";
					$price_alert_error_msg = "Please Enter a valid Price!";
					$price_alert = true;
				} else {


					// echo "everything works fine";


					if (isset($_FILES['image']) && empty($_FILES['image']['name'])) {
						// echo "image is not selected";

						// insert the updated data into database 
						$update_query = "UPDATE `library` SET `title` = '$title', `subject` = '$subject', `author_name` = '$author_name', 
						`publisher` = '$publisher', `asset_type` = '$asset_type', `purchase_date` = '$purchase_date', `price` = '$price',
						 `status` = '$status', `asset_details` = '$asset_details' WHERE `id` = '$edit_id' ";;

						$update_query_result = mysqli_query($con, $update_query);
						if ($update_query_result) {
							// echo "<h1>Your Account have been Updated Successfully!</h1>";
							$edit_success_alert = true;

															                        // redirect the user to the main page 
																					echo
																					'
																					<script>
													
																					setTimeout(function(){
																						window.location.href="all-library.php";
																					} , 1000);
													
																					</script>
																					'
																					;


						} else {
							// echo "<h1>Cannot Insert Record due to some Error!</h1>";
							$edit_error_alert = true;
						}
					} else {
						// echo "image is selected";

						// file upload code
						if ($_FILES['image']['error'] == 0) {

							// array for image types
							$image_array = array("jpeg", "jpg", "png");

							$file_name = $_FILES['image']['name'];

							// $_SESSION['filename']['name'] = $_FILES['image']['name'];

							$file_tmp_name = $_FILES['image']['tmp_name'];
							$file_type = $_FILES['image']['type'];
							$file_size = $_FILES['image']['size'];
							$file_dir = "./uploads/";

							// seperate the extension from the file
							$file_extension = explode('.', $file_name);
							$file_extension_lower_case = strtolower(end($file_extension));

							// create the hash of image file
							$hash_image = hash("md5", $file_name, false);
							$hash_image_exact = $hash_image . '.' . $file_extension_lower_case;

							// echo $hash_image_exact;
							// echo $file_dir.$file_name;

							if (file_exists($file_dir . $hash_image_exact)) {
								// echo "<h1>Image already exists!</h1>";
								$image_exists_error_msg = "Image already exists!";
								$image_exists_alert = true;
							} else {
								// check the file size
								if ($file_size > 1000000) {
									// echo "<h1>Image is too large!</h1>";
									$image_size_error_msg = "Image is too large!";
									$image_size_alert = true;
								} else {

									if (in_array($file_extension_lower_case, $image_array)) {
										// echo "<h1>Image type Supported!</h1>";

										// echo "You are ready to upload image.";

										// upload the file
										$upload = move_uploaded_file($file_tmp_name, $file_dir . $hash_image_exact);
										// echo "<h1>Image Successfully uploaded!</h1>";

										// store the data into the database
										// insert the updated data into database 
										$update_query = "UPDATE `library` SET `title` = '$title', `subject` = '$subject', `author_name` = '$author_name', 
										`publisher` = '$publisher', `asset_type` = '$asset_type', `purchase_date` = '$purchase_date', `price` = '$price',
										 `status` = '$status', `asset_details` = '$asset_details' , `image` = '$hash_image_exact' WHERE `id` = '$edit_id' ";

										$update_query_result = mysqli_query($con, $update_query);
										if ($update_query_result) {
											// echo "<h1>Your Account have been Updated Successfully!</h1>";
											$edit_success_alert = true;
															                        // redirect the user to the main page 
																					echo
																					'
																					<script>
													
																					setTimeout(function(){
																						window.location.href="all-library.php";
																					} , 1000);
													
																					</script>
																					'
																					;

										} else {
											// echo "<h1>Cannot Insert Record due to some Error!</h1>";
											$edit_error_alert = true;
										}
									} else {
										// echo "<h1>Image type Not Supported!</h1>";
										$image_support_error_msg = "Image type Not Supported!";
										$image_support_alert = true;
									}
								}
							}
						}
						// end of image upload code

					}
				}
			}
		}
	}
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
				<?php
				if ($edit_success_alert) {
					// bootstrap dialogue 
					echo '				
                    	<div class="alert alert-success text-black" role="alert">
                    		Your Record has been Updated Successfully.!
                    	  </div>
                    	';
					// <!-- bootstrap dialogue 
				}
				if ($edit_error_alert) {
					// bootstrap dialogue 
					echo '				
                    	<div class="alert alert-danger text-white bg-red" role="alert">
                    	Sorry! We couldnot Update Your Record Due to some Error.
                    	</div>
                    	';
					// <!-- bootstrap dialogue 
				}

				?>

				<div class="row page-titles mx-0">
					<div class="col-sm-6 p-md-0">
						<div class="welcome-text">
							<h4>Edit Library Assets</h4>
						</div>
					</div>
					<div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="index.html">Home</a></li>
							<li class="breadcrumb-item active"><a href="javascript:void(0);">Library</a></li>
							<li class="breadcrumb-item active"><a href="javascript:void(0);">Edit Library Assets</a></li>
						</ol>
					</div>
				</div>

				<div class="row">
					<div class="col-lg-12">
						<div class="card">
							<!-- <div class="card-header">
								<h4 class="card-title">Edit Library Assets</h4>
							</div> -->
							<div class="card-body">
								<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
									<div class="card p-3" style="width: 18rem; border: solid 2px blue;">
										
										<img src="./uploads/<?php echo $fetched_image ?>" class="card-img-top" alt="...">
										<div class="card-body">
											<!-- <h5 class="card-title">Card title</h5> -->
											<input type="file" id="image" name="image" style="display: none; visibility:none;" onchange="getImage(this.value)" class="dropify">
											<p class="card-title" id="display_image_path"></p>
											<p class="card-title" style="color:red;"><?php if ($image_exists_alert) echo $image_exists_error_msg ?></p>
											<p class="card-title" style="color:red;"><?php if ($image_size_alert) echo $image_size_error_msg ?></p>
											<p class="card-title" style="color:red;"><?php if ($image_support_alert) echo $image_support_error_msg ?></p>
											<!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
										</div>
										<label for="image" class="btn btn-sm btn-success" style="font-size: 40px; cursor:pointer; "><i class="la la-pencil"></i></label>
									</div>
									<div class="row">
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Title</label>
												<input type="text" name="title" value="<?php echo $fetched_title ?>" class="form-control" <?php if ($title_alert) echo 'style="border:solid 2px red;"' ?>>
												<span style="color: red;"><?php if ($title_alert) echo $title_error_msg ?></span>
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Subject</label>
												<select class="form-control" name="subject">
													<option value="<?php echo $fetched_subject ?>"><?php echo $fetched_subject ?></option>
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
												<input type="text" name="author_name" value="<?php echo $fetched_author_name ?>" class="form-control" <?php if ($author_name_alert) echo 'style="border:solid 2px red;"' ?>>
												<span style="color: red;"><?php if ($author_name_alert) echo $author_name_error_msg ?></span>
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Publisher</label>
												<input type="text" name="publisher" value="<?php echo $fetched_publisher ?>" class="form-control" <?php if ($publisher_alert) echo 'style="border:solid 2px red;"' ?>>
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
												<select class="form-control" name="asset_type">
													<option value="<?php echo $fetched_asset_type ?>"><?php echo $fetched_asset_type ?></option>
													<option value="Book">Book</option>
													<option value="Newspaper">Newspaper</option>
													<option value="Comics">Comics</option>
												</select>
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Purchase Date</label>
												<input type="date" name="purchase_date" value="<?php echo $fetched_purchase_date ?>" class="datepicker form-control" id="datepicker">
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Price</label>
												<input type="text" name="price" value="<?php echo $fetched_price ?>" class="form-control" <?php if ($price_alert) echo 'style="border:solid 2px red;"' ?>>
												<span style="color: red;"><?php if ($price_alert) echo $price_alert_error_msg ?></span>

											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Status</label>
												<select class="form-control" name="status">
													<option value="<?php echo $fetched_status ?>"><?php echo $fetched_status ?></option>
													<option value="In Stock">In Stock</option>
													<option value="Out Of Stock">Out Of Stock</option>
												</select>
											</div>
										</div>
										<div class="col-lg-12 col-md-12 col-sm-12">
											<div class="form-group">
												<label class="form-label">Assets Details</label>
												<textarea class="form-control" name="asset_details" rows="5">
													<?php echo $fetched_asset_details ?>
												</textarea>
											</div>
										</div>
										<div class="col-lg-12 col-md-12 col-sm-12">
											<button type="submit" name="update_library_btn" class="btn btn-primary">Edit Record</button>
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

	<!-- image view script -->
	<script src="js/image_view_script.js"></script>


</body>

</html>