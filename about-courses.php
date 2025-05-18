<?php
// include_once("admin/admin-login.php");

session_start();

require_once "./php/connection.php";
include_once("./php/config.php"); 
include("./php/courses.php");

// check if the user is logged in, if not redirect him to login page
// if(!isset($_SESSION['logged']) || $_SESSION['logged'] !== true){
//     header("Location: not-found.php");
//     exit;
// }


// print("<pre>");
// print_r($_SESSION);
// print("</pre>");


$edit_id = $_SESSION['hidden_profile_course_value'];

// php code for retrieving data from database -->
// getting id from the url
// $edit_id = $_GET['id'];

$retrieve_query = "SELECT * FROM `courses` WHERE `id` = '$edit_id' ";
$retrieve_query_result = mysqli_query($con, $retrieve_query);
$row = mysqli_num_rows($retrieve_query_result);
if ($row > 0) {
	while ($fetch_record = mysqli_fetch_assoc($retrieve_query_result)) {

	// get the data from the database
	$course_name = mysqli_real_escape_string($con, $fetch_record['course_name']);
	$course_code = mysqli_real_escape_string($con, $fetch_record['course_code']);
	$course_details = mysqli_real_escape_string($con, $fetch_record['course_details']);
	$professor_name = mysqli_real_escape_string($con, $fetch_record['professor_name']);
	$contact_number = mysqli_real_escape_string($con, $fetch_record['contact_number']);
	$image = mysqli_real_escape_string($con, $fetch_record['image']);
	$date = mysqli_real_escape_string($con, $fetch_record['date']);


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
				    
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Course Details</h4>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0);">Courses</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0);">Course Details</a></li>
                        </ol>
                    </div>
                </div>
				
				<div class="row">
					<div class="col-xl-3 col-xxl-4 col-lg-4">
						<div class="row">
							<div class="col-lg-12">
								<div class="card">
									<img class="img-fluid" src="./uploads/<?php echo $image ?>" alt="">
									<div class="card-body">
										<h4 class="mb-0">Why is Early Education Essential</h4>
									</div>
								</div>
							</div>
							<div class="col-lg-12">
								<div class="card">
									<div class="card-header">
										<h2 class="card-title"><?php echo $course_name ?></h2>
									</div>
									<div class="card-body pb-0">
										<p><?php echo $course_details ?>.</p>
										<ul class="list-group list-group-flush">
											
											<li class="list-group-item d-flex px-0 justify-content-between">
												<strong>Professor</strong>
												<span class="mb-0"><?php echo $professor_name ?></span>
											</li>
											<li class="list-group-item d-flex px-0 justify-content-between">
												<strong>Date</strong>
												<span class="mb-0"><?php echo $date;  ?></span>
											</li>
										</ul>
									</div>
									<div class="card-footer pt-0 pb-0 text-center">
										<div class="row">
											<div class="col-4 pt-3 pb-3 border-right">
												<h3 class="mb-1 text-primary">07</h3>
												<span>Years</span>
											</div>
											<div class="col-4 pt-3 pb-3 border-right">
												<h3 class="mb-1 text-primary">240</h3>
												<span>Students</span>
											</div>
											<div class="col-4 pt-3 pb-3">
												<h3 class="mb-1 text-primary">05</h3>
												<span>Batches</span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-9 col-xxl-8 col-lg-8">
						<div class="card">
							<div class="card-body">
								<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
								<p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
								<p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart. I am alone, and feel the charm of existence was created for the bliss of souls like mine.I am so happy, my dear friend, so absorbed in the exquisite sense of mere tranquil existence, that I neglect my talents.</p>
								<p class="mb-5">A collection of textile samples lay spread out on the table - Samsa was a travelling salesman - and above it there hung a picture that he had recently cut out of an illustrated magazine and housed in a nice, gilded frame.</p>
								<h4 class="text-primary">Our Courses</h4>
								<div class="profile-skills pt-2 border-bottom-1 pb-2">
									<a href="javascript:void()" class="btn btn-outline-dark btn-rounded px-4 my-3 my-sm-0 mr-3 m-b-10">Computer</a>
									<a href="javascript:void()" class="btn btn-outline-dark btn-rounded px-4 my-3 my-sm-0 mr-3 m-b-10">Programming</a>
									<a href="javascript:void()" class="btn btn-outline-dark btn-rounded px-4 my-3 my-sm-0 mr-3 m-b-10">Photoshop</a>
									<a href="javascript:void()" class="btn btn-outline-dark btn-rounded px-4 my-3 my-sm-0 mr-3 m-b-10">Management</a>
								</div>
								<div class="profile-lang pt-5 border-bottom-1 pb-5">
									<h4 class="text-primary mb-4">Language</h4><a href="javascript:void()" class="text-muted pr-3 f-s-16"><i class="flag-icon flag-icon-us"></i> English</a> <a href="javascript:void()" class="text-muted pr-3 f-s-16"><i class="flag-icon flag-icon-fr"></i> French</a>
									<a href="javascript:void()" class="text-muted pr-3 f-s-16"><i class="flag-icon flag-icon-bd"></i> Bangla</a>
								</div>
								<h4 class="text-primary">Courses Information</h4>
								<ul class="list-group mb-3 list-group-flush">
									<li class="list-group-item border-0 px-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</li>
									<li class="list-group-item -0 px-0">It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing.</li>
									<li class="list-group-item -0 px-0">A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart. I am alone, and feel the charm of existence was created for the bliss of souls like mine.</li>
									<li class="list-group-item -0 px-0">A collection of textile samples lay spread out on the table - Samsa was a travelling salesman - and above it there hung a picture that he had recently cut out of an illustrated magazine and housed in a nice, gilded frame.</li>
									<li class="list-group-item border-0 px-0">It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing.</li>
								</ul>
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
    <!-- Required vendors -->
    <script src="vendor/global/global.min.js"></script>
	<script src="vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/dlabnav-init.js"></script>	

</body>
</html>