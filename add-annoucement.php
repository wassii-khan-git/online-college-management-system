<?php
// include_once("admin/admin-login.php");

session_start();

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

	<!-- fontawesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />


	<!-- Pick date -->
	<link rel="stylesheet" href="vendor/pickadate/themes/default.css">
	<link rel="stylesheet" href="vendor/pickadate/themes/default.date.css">


	<style>
		/* eye styling */
		.fa-eye-slash {
			position: absolute;
			top: 43px;
			right: 5%;
		}

		.fa-eye-slash:hover {
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
				<div id="formMessage"></div>


				<div class="row page-titles mx-0">
					<div class="col-sm-6 p-md-0">
						<div class="welcome-text">
							<h4>Add Annoucement</h4>
						</div>
					</div>
					<div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="index.html">Home</a></li>
							<li class="breadcrumb-item active"><a href="javascript:void(0);">Annoucements</a></li>
							<li class="breadcrumb-item active"><a href="javascript:void(0);">Add Annoucement</a></li>
						</ol>
					</div>
				</div>

				<div class="row">
					<div class="col-xl-12 col-xxl-12 col-sm-12">
						<div class="card">
							<div class="card-header">
								<h5 class="card-title">Basic Info</h5>
							</div>
							<div class="card-body">
								<form id="annoucementForm" action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
									<div class="row">
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Annoucement Title</label>
												<input type="text" value="" id="annoucement_title" name="annoucement_title" class="form-control" required>
												<div class="annoucement_msg"></div>
											</div>
										</div>

										<div class="col-lg-12 col-md-12 col-sm-12">
											<div class="form-group">
												<label class="form-label">Descriptions</label>
												<textarea class="form-control" id="annoucement_desc" name="annoucement_desc" rows="5" required></textarea>
											</div>
										</div>
										<div class="col-lg-12 col-md-12 col-sm-12">
											<button type="submit" name="add_annoucement" class="btn btn-primary">Add Record</button>
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



	<!-- add annoucments -->
	<script>
		$(document).ready(function() {
			$("#annoucementForm").submit(function(e) {
				// console.log(e);
				e.preventDefault();

				// get the error message container
				var formMessage = $("#formMessage").html();

				// get the values from the form
				var annoucementTitle = $("#annoucement_title").val();
				var annoucementDesc = $("#annoucement_desc").val();


				// it will be empty by default
				$(formMessage).html("");

				if (annoucementTitle !== "" && annoucementDesc !== "") {

					// create a java script object
					const mydata = {

						annoucement_title: annoucementTitle,
						annoucement_desc: annoucementDesc,
						action: "addAnnoucement"
					}

					console.log(mydata);

					// sending data through ajax
					$.ajax({
						url: "php/annoucement.php",
						method: "post",
						data: mydata,
						dataType: 'json',
						cache: false,

						success: function(data) {

							if (data !== "") {

								if (data.error == 0)

								$("#annoucementForm")[0].reset();

								$("#formMessage").html("<div class='alert alert-success text-black'>" + data.message + "</div>");

							} else if (data.error == 1) {
								$("#formMessage").html("<div class='alert alert-danger'>" + data.message + "</div>");


							} else {
								$("#formMessage").html("<div class='alert alert-danger text-white bg-red'>The data sent from server is empty.</div>");

							}
						}

					});


				} else {
					$(formMessage).html("<div class='alert alert-danger'>All fields are required.</div>");
				}




			})
		});
	</script>

</body>

</html>
