<?php
include_once("admin/admin-login.php");

// session_start();

// check if the user is logged in, if not redirect him to login page
if(!isset($_SESSION['logged']) || $_SESSION['logged'] !== true){
    header("Location: not-found.php");
    exit;
}


?>
<?php

// starting session
session_start();

// print("<pre>");
// print_r($_SESSION);
// print("</pre>");

if(!isset($_SESSION['insert_check']) || $_SESSION['insert_check'] !== true){
	header("Location:add-professor.php");
}
?>


<?php

//  database connection 
require_once "./php/connection.php";

$path = "./uploads/";

// config file
require_once "./php/config.php";



$email = $_SESSION['insert_check_email'];


if ($_SERVER['REQUEST_METHOD'] == "POST") {
	if (isset($_POST['add_profile_btn'])) {

		if(isset($_FILES['image']) && empty($_FILES['image']['name'])){
			// echo "Image is not selected";
			$all_fields_empty_alert = true;
		} else {

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

							// echo "good to go";

							// upload the file
							$upload = move_uploaded_file($file_tmp_name, $file_dir . $hash_image_exact);
							// echo "<h1>Image Successfully uploaded!</h1>";

							// insert the data into database
							$query = "UPDATE `professors` SET `image` = '$hash_image_exact' WHERE `email` = '$email' ";

							$result = mysqli_query($con, $query);
							if ($result) {
								// echo "<h1>Your Account have been Created Successfully!</h1>";
								$success_alert = true;

								// redirect the user to the main page 
								echo
								'
								<script>

								setTimeout(function(){
									window.location.href="all-professors.php";
								} , 1000);

								</script>
								'
								;

							} else {
								// echo "<h1>Cannot Insert Record due to some Error!</h1>";
								$insert_record_alert = true;
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

// end of the code

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
				if ($success_alert) {
					// bootstrap dialogue 
					echo '				
					<div class="alert alert-success text-black" role="alert">
					    Your Account has been Created Successfully.!
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
								<!-- steps section -->
								<div class="card">
					<div class="card-body">
						<h4 class="title">Registration Process Consists of 2 steps</h4>
						<div class=" badge  badge-circle border border-dark mt-2">1</div>
						<span>---------------</span>
						<div class="badge  badge-circle bg-primary text-white">2</div>
					</div>
				</div>

				<div class="row page-titles mx-0">
					<div class="col-sm-6 p-md-0">
						<div class="welcome-text">
							<h4>Add Student Profile</h4>
						</div>
					</div>
					<div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="index.html">Home</a></li>
							<li class="breadcrumb-item active"><a href="javascript:void(0);">Students</a></li>
							<li class="breadcrumb-item active"><a href="javascript:void(0);">Add Student</a></li>
							<li class="breadcrumb-item active"><a href="javascript:void(0);">Add Student Profile</a></li>

						</ol>
					</div>
				</div>

				<div class="row">
					<div class="col-xl-12 col-xxl-12 col-sm-12">
						<div class="card">
							<div class="card-header">
								<h5 class="card-title">Please Provide Your Image</h5>
							</div>
							<div class="card-body">
								<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
									<div class="row">
										<div class="col-lg-12 col-md-12 col-sm-12">
											<div class="form-group fallback w-100">
												<label for="image" style="border: solid 2px black; padding:60px 120px; cursor:pointer;"><i class="fa fa-plus"></i></label>
												<input type="file" id="image" name="image" style="display: none; visibility:none;" class="dropify" onchange="getImage(this.value)" >
												<span style="color: red;"><?php if ($image_exists_alert) echo $image_exists_error_msg ?></span>
												<span style="color: red;"><?php if ($image_size_alert) echo $image_size_error_msg ?></span>
												<span style="color: red;"><?php if ($image_support_alert) echo $image_support_error_msg ?></span>
												<div id="display_path"></div>
											</div>
										</div>
										<div class="col-lg-12 col-md-12 col-sm-12">
											<input type="submit" name="add_profile_btn" class="btn btn-primary" value="Add Profile Image" >
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

	<script>
		function getImage(imagename) {  
			var newimage = imagename.replace(/^.*\\/,"");
			image_path_container = document.getElementById("display_path");
			image_path_container.innerHTML = newimage;
		}
	</script>


	<!-- vendors -->
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

</body>

</html>

<!-- INSERT INTO `students` (`firstname`, `lastname`, `email`, `registration_date`, `class`, `gender`, `mobile_number`, `parents_name`, `parents_mobile_number`, `date_of_birth`, `adress`, `image`, `date`) VALUES ( 'kaka', 'jan', 'kakajan@gmail.com', '2022-10-19', 'Pre_Medical', 'Male', '923434623', 'jan kaka', '90076765', '2013-10-02', 'california, street 142 road 3 house 134A', 'pic2.jpg', current_timestamp()); -->