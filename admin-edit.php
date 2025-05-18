<?php
include_once("admin/admin-login.php");
require_once "./php/connection.php";
include_once "./php/config.php";
// include_once "./php/professor.php";

// session_start();

// check if the user is logged in, if not redirect him to login page
if(!isset($_SESSION['logged']) || $_SESSION['logged'] !== true){
    header("Location: not-found.php");
    exit;
}


?>
<?php



// php code for retrieving data from database -->
// session_start();
$edit_id = $_SESSION['admin_id'];
// $edit_grid_id = $_SESSION['edit_grid_value'];

// getting id from the url
// $edit_id = $_GET['id'];

$retrieve_query = "SELECT * FROM `admin` WHERE `id` = '$edit_id' ";
$retrieve_query_result = mysqli_query($con, $retrieve_query);
$row = mysqli_num_rows($retrieve_query_result);
if ($row > 0) {
	while ($fetch_record = mysqli_fetch_assoc($retrieve_query_result)) {

        $fetched_username = $fetch_record['username'];
		$fetched_email = $fetch_record['email'];
		$fetched_image = $fetch_record['image'];

		// print("<pre>");
		// print_r($fetch_record);
		// print("</pre>");

	}
}



// getting values from edit-professor form
if ($_SERVER['REQUEST_METHOD'] == "POST") {
	if (isset($_POST['update_record_btn'])) {

		// echo "working";

		// get the data from the form
		$username = mysqli_real_escape_string($con, $_POST['username']);
		// $email = mysqli_real_escape_string($con, $_POST['email']);


		if (!preg_match($name, $username)) {
			// echo "<h1>Please Enter a valid First Name!</h1>";
			$username_alert_error_msg = "Please Enter a valid Username!";
			$username_alert = true;
		} 
		//  elseif (!preg_match($emailValidation, $_POST['email'])) {
		// 	// echo "<h1>Please Enter a valid Email!</h1>";
		// 	$email_error_msg = "Please Enter a valid Email!";
		// 	$email_alert = true;
		// } 
		else {


				// echo "everything works fine";


				if(isset($_FILES['image']) && empty($_FILES['image']['name'])){
					// echo "image is not selected";

					$update_query = "UPDATE `admin` SET `username` = '$username' 
					WHERE `id` = '$edit_id' ";
	
					$update_query_result = mysqli_query($con, $update_query);
					if ($update_query_result) {
						// echo "<h1>Your Account have been Updated Successfully!</h1>";
						$edit_success_alert = true;
					} else {
						// echo "<h1>Cannot Insert Record due to some Error!</h1>";
						$edit_error_alert = true;
					}


				}else {
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
								$update_query = "UPDATE `admin` SET `username` = '$username' ,
                               `image` = '$hash_image_exact'
								WHERE `id` = '$edit_id' ";
				
								$update_query_result = mysqli_query($con, $update_query);
								if ($update_query_result) {
									// echo "<h1>Your Account have been Updated Successfully!</h1>";
									$edit_success_alert = true;
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
// end of image upload code

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

	<!-- fontawesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />


	<!-- Pick date -->
	<link rel="stylesheet" href="vendor/pickadate/themes/default.css">
	<link rel="stylesheet" href="vendor/pickadate/themes/default.date.css">

	<style>
		/* eye styling */
		.fa-eye {
			position: absolute;
			top: 43px;
			right: 5%;
		}

		.fa-eye:hover {
			color: gray;
		}

		.form-control.is-invalid {
			border-color: #FF1616 !important;
			border-right: solid 2px #FF1616 !important;
		}

		.form-control.is-valid {
			border-color: #7ED321 !important;
			border-right: solid 2px #7ED321 !important;
		}

		/* #main-wrapper>div.content-body>div>div:nth-child(2)>div>div>div.card-body>form>div.card {
			height: 250px;
			;
		} */
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
				if ($edit_error_alert) {
					// bootstrap dialogue 
					echo '				
					<div class="alert alert-danger text-white bg-red" role="alert">
					Sorry! Your Account has not Been Updated.
					</div>
					';
					// <!-- bootstrap dialogue 
				}
				if ($edit_success_alert) {
					// bootstrap dialogue 
					echo '				
					<div class="alert alert-success text-black" role="alert">
					    Your Account has been Updated Successfully.!
  					</div>
					';
					// <!-- bootstrap dialogue 
				}
				if ($all_fields_empty_alert) {
					// bootstrap dialogue 
					echo '				
				    <div class="alert alert-danger text-white bg-red" role="alert">
				    Please Select an Image.
				    </div>
				    ';
					// <!-- bootstrap dialogue 
				}
				?>

				<div class="row page-titles mx-0">
					<div class="col-sm-6 p-md-0">
						<div class="welcome-text">
							<h4>Edit Professor</h4>
						</div>
					</div>
					<div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="index.html">Home</a></li>
							<li class="breadcrumb-item active"><a href="edit-professor.html">Professors</a></li>
							<li class="breadcrumb-item active"><a href="javascript:void(0)">Edit Professor</a></li>
						</ol>
					</div>
				</div>



				<div class="row">
					<div class="col-xl-12 col-xxl-12 col-sm-12">
						<div class="card">
							<div class="row m-3 mx-0">
								<div class="card-profile">
								</div>
							</div>

							<div class="card-header">
								<h5 class="card-title">Basic Info</h5>
							</div>
							<div class="card-body">
								<form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">

								<div class="card p-3" style="width: 18rem; border: solid 2px blue;">
										<img src="./uploads/<?php echo $fetched_image ?>" class="card-img-top" alt="...">
										<div class="card-body">
											<!-- <h5 class="card-title">Card title</h5> -->
											<label for="image" class="btn btn-sm btn-success" style="position: absolute; left:94%; top:310px; font-size: 30px; cursor:pointer; "><i class="la la-pencil"></i></label>
											<input type="file" id="image" name="image" style="display: none; visibility:none;" onchange="getImage(this.value)" class="dropify">
											<p class="card-title" id="display_image_path"></p>
											<p class="card-title" style="color:red;"><?php if ($image_exists_alert) echo $image_exists_error_msg ?></p>
											<p class="card-title" style="color:red;"><?php if ($image_size_alert) echo $image_size_error_msg ?></p>
											<p class="card-title" style="color:red;"><?php if ($image_support_alert) echo $image_support_error_msg ?></p>
											<!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
										</div>
									</div>
									<div class="row">
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Username</label>
												<input type="text" value="<?php echo $fetched_username; ?>" name="username" class="form-control <?php if ($username_alert) echo 'is-invalid" ' ?>">
												<span style="color: red;"><?php if ($username_alert) echo $username_alert_error_msg ?></span>
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Email</label>
												<input type="text" value="<?php echo $fetched_email ?>" name="email" class="form-control <?php if ($email_alert) echo 'is-invalid" ' ?>" disabled>
												<!-- <span style="color: red;"><?php if ($email_alert) echo $email_error_msg ?></span> -->

											</div>
										</div>

										<!-- <div class="col-lg-12 col-md-12 col-sm-12">
											<div class="form-group fallback w-100">
												<input type="file" name="image" class="dropify" required>
											</div>
										</div> -->
										<div class="col-lg-12 col-md-12 col-sm-12">
											<button type="submit" name="update_record_btn" class="btn btn-primary">Update Changes</button>
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

	<!-- show text in password field by clicking eye icon -->
	<script src="js/show_password_field_script.js"></script>

	<!--Image Path view Script  -->
	<script src="js/image_view_script.js"></script>

</body>

</html>