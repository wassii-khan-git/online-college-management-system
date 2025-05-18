<?php
// include_once("admin/admin-login.php");

session_start();

include_once("./php/config.php");
include("./php/courses.php");

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

    <!-- Pick date -->
    <link rel="stylesheet" href="vendor/pickadate/themes/default.css">
    <link rel="stylesheet" href="vendor/pickadate/themes/default.date.css">


    <style>
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
                		Your Course has been Added Successfully.!
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

                ?>

                <!-- steps section -->
                <div class="card">
                    <div class="card-body">
                        <h4 class="title">Registration Process Consists of 2 steps</h4>
                        <div class="badge  badge-circle bg-primary text-white">1</div>
                        <span>---------------</span>
                        <div class=" badge  badge-circle border border-dark mt-2">2</div>
                    </div>
                </div>


                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Add Course</h4>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0);">Courses</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0);">Add Course</a></li>
                        </ol>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Courses Details</h4>
                            </div>
                            <div class="card-body">
                                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Course Name</label>
                                                <input type="text" name="course_name" value="<?php if (isset($course_name)) echo $course_name ?>" class="form-control <?php if ($course_name_alert) echo 'is-invalid' ?>" required>
                                                <span style="color: red;"><?php if ($course_name_alert) echo $course_name_error_msg ?></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Course Code</label>
                                                <input type="text" name="course_code" value="<?php if (isset($course_code)) echo $course_code ?>" class="form-control <?php if ($course_code_alert || $course_code_exists_alert) echo 'is-invalid' ?>" required>
                                                <span style="color: red;"><?php if ($course_code_alert) echo $course_code_error_msg ?></span>
                                                <span style="color: red;"><?php if ($course_code_exists_alert) echo $course_code_exists_error_msg ?></span>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Select this course for 1st and 2nd year class</label>
                                                <select class="form-control" name="course_for_class" required>
                                                    <option value="Select">Select</option>
                                                    <?php
                                                    // include("php/connection.php");
                                                    $class_query = "SELECT DISTINCT `subject` FROM `attendance_grade` ";
                                                    $class_result = mysqli_query($con, $class_query);
                                                    $class_row = mysqli_num_rows($class_result);
                                                    if ($class_row > 0) {
                                                        while ($class_fetched_record = mysqli_fetch_assoc($class_result)) {
                                                    ?>
                                                            <option value="<?php echo $class_fetched_record['subject'] ?>"><?php echo $class_fetched_record['subject'] ?></option>

                                                    <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Professor Name</label>
                                                <select class="form-control" name="professor_name" required>
                                                    <option value="Select">Select</option>
                                                    <?php
                                                    $query = "SELECT * FROM `professors` ";
                                                    $result = mysqli_query($con, $query);
                                                    $row = mysqli_num_rows($result);
                                                    if ($row > 0) {
                                                        while ($professor_fetched_record = mysqli_fetch_assoc($result)) {
                                                    ?>
                                                            <option value="<?php echo $professor_fetched_record['firstname'] . ' ' . $professor_fetched_record['lastname']; ?>"  <?php if(isset($professor_name)) echo 'selected'; ?>>
                                                                <?php echo $professor_fetched_record['firstname'] . ' ' . $professor_fetched_record['lastname']; ?>
                                                            </option>

                                                    <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-12 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Contact Number</label>
                                                <input type="text" name="contact_number" value="<?php if (isset($contact_number)) echo $contact_number ?>" class="form-control <?php if ($contact_number_alert || $contact_number_limit_alert || $mobile_number_exists_alert) echo 'is-invalid' ?>" required>
                                                <span style="color: red;"><?php if ($contact_number_alert) echo $contact_number_error_msg ?></span>
                                                <span style="color: red;"><?php if ($contact_number_limit_alert) echo $contact_number_limit_error_msg ?></span>
                                                <span style="color: red;"><?php if ($mobile_number_exists_alert) echo $mobile_number_exists_error_msg ?></span>
                                            </div>
                                        </div>

                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Course Details</label>
                                                <textarea class="form-control" name="course_details" rows="5" required>
													<?php if (isset($course_details)) echo $course_details ?>
												</textarea>
                                            </div>
                                        </div>

                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <button type="submit" name="add_course" class="btn btn-primary">Add Course</button>
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

</body>

</html>