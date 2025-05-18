<?php
// include_once("admin/admin-login.php");

// session_start();

include("./php/fee.php");

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

                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Fees Collection</h4>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0);">Fees</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0);">Fees Collection</a></li>
                        </ol>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Fees Collection</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example3" class="display" style="min-width: 860px">
                                        <thead>
                                            <tr>
                                                <th>Roll No</th>
                                                <th>Student Name</th>
                                                <th>Fees Type </th>
                                                <th>Subject</th>
                                                <th>Status </th>
                                                <th>Date</th>
                                                <th>Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>



                                            <?php

                                            // <!-- php code for retrieving data from database -->

                                            require_once "./php/connection.php";
                                            require_once "./php/config.php";

                                            $retrieve_query = "SELECT * FROM `fees`";
                                            $retrieve_query_result = mysqli_query($con, $retrieve_query);
                                            $row = mysqli_num_rows($retrieve_query_result);

                                            if ($row > 0) {
                                                while ($fetch_record = mysqli_fetch_assoc($retrieve_query_result)) {

                                            ?>
                                                    <tr>
                                                        <td class="sorting_asc_disabled sorting_desc_disabled sorting_1_disabled "><?php echo $fetch_record['roll_no'] ?></td>
                                                        <td><?php echo $fetch_record['student_name'] ?></td>
                                                        <td><?php echo $fetch_record['fee_type'] ?></td>
                                                        <td><a href="javascript:void(0);"><strong><?php echo $fetch_record['department'] ?></strong></a></td>
                                                        <td ><a href="javascript:void(0);"><strong><?php echo $fetch_record['status'] ?></strong></a></td>
                                                        <td><?php echo $fetch_record['collection_date'] ?></td>
                                                        <td><?php echo $fetch_record['amount'] ?>$</td>

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

    <script>
        $(document).ready(function() {
            $('#example3').DataTable();

        });
    </script>

</body>

</html>

<!-- <tr>
    <th>Roll No</th>
    <th>Student Name</th>
    <th>Invoice number</th>
    <th>Fees Type </th>
	<th>Payment Type </th>
	<th>Status </th>
    <th>Date</th>
    <th>Amount</th>
</tr> -->
<!-- INSERT INTO `fees`(`id`, `roll_no`, `student_name`, `department`, `fee_type`, `amount`, `collection_date`, `reciept_number`, `status`, `image`) VALUES (Null ,'3243','jan','Arts','Exam','900','1-10-2022','094730927420','Unpaid','2.jpg') -->