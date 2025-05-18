<?php
include_once("admin/admin-login.php");

// session_start();

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
    <link rel="stylesheet" href="vendor/jqvmap/css/jqvmap.min.css">
	<link rel="stylesheet" href="vendor/chartist/css/chartist.min.css">
	<link rel="stylesheet" href="vendor/bootstrap-select/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/skin-2.css">



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
        <?php include "body_content.php" ?>
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

    <!-- Chart ChartJS plugin files -->
    <script src="vendor/chart.js/Chart.bundle.min.js"></script>
	
	<!-- Chart piety plugin files -->
    <script src="vendor/peity/jquery.peity.min.js"></script>
	
	<!-- Chart sparkline plugin files -->
    <script src="vendor/jquery-sparkline/jquery.sparkline.min.js"></script>
	
	<!-- Demo scripts -->
    <script src="js/dashboard/dashboard-3.js"></script>
	
	
</body>
</html>
