<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>OCMS - Online College Management System</title>

    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <link href="css/style.css" rel="stylesheet">

    <!-- admin forgot file -->
    <?php include("admin/forgot.php"); ?>

    <style>
        body{
            background: url('./Pictures/page-banner-2.jpg');
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>

</head>

<body class="h-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <h4 class="text-center mb-4">Forgot Password</h4>

                                    <?php
                                    if ($admin_email_alert) {
                                        echo '<div class="alert alert-danger text-black" role="alert">
                                             Please Enter a valid Email.
                                        </div';
                                    }
                                    if ($invalid_success_alert) {
                                        echo '<div class="alert alert-danger text-black" role="alert">
                                        Sorry we couldnot found your Account.
                                        </div';
                                    }
                                    
                                    if ($all_fields_empty_alert) {
                                        echo '<div class="alert alert-danger text-black" role="alert">
                                        Email field is required.
                                        </div';
                                    }
                                    ?>

                                    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                                        <div class="form-group">
                                            <label><strong>Email</strong></label>
                                            <input type="text" name="admin_email" class="form-control" placeholder="Enter Your Email">
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" name="admin_email_submit_btn" class="btn btn-primary btn-block">SUBMIT</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


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