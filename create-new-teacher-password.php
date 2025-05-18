<?php

require("./admin/admin-login.php");
// session_start();

require("./admin/forgot.php");

// check if the user is logged in, if yes then redirect him to login page




?>
<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>OCMS - Online College Management System</title>

    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <link rel="stylesheet" href="vendor/bootstrap-select/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="css/style.css">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">

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

                                    <h4 class="text-center mb-4">Change Your Password</h4>

                                    <!-- php alert code -->
                                    <?php
                                    if ($success_alert) {
                                        echo '<div class="alert alert-success text-black" role="alert">
                                            Your Password has been Changed SuccessFully.
                                        </div';
                                    }
                                    if ($roll_no_already_exists_alert) {
                                        echo '<div class="alert alert-danger text-black" role="alert">
                                        Password And Confirm Password Does not matched.
                                        </div';
                                    }
                                    if ($invalid_success_alert) {
                                        echo '<div class="alert alert-danger text-black" role="alert">
                                        Failed to Change Your Password.
                                        </div';
                                    }
                                    if ($all_fields_empty_alert) {
                                        echo '<div class="alert alert-danger text-black" role="alert">
                                        All fields are Required.
                                        </div';
                                    }
                                    ?>
                                    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">

                                        <div class="form-group">
                                            <label><strong>Password</strong></label>
                                            <input type="password" name="password" value="<?php if (isset($password)) echo $password ?>" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label><strong>Confirm Password</strong></label>
                                            <input type="password" name="confirm_password" value="<?php if (isset($confirm_password)) echo $confirm_password ?>" class="form-control" required>
                                        </div>

                                        <div class="text-center ">
                                            <button type="submit" name="teacher_forgot_password_btn" class="btn btn-primary btn-block">Change</button>
                                        </div>



                                    </form>
                                    <!-- <div class="new-account mt-3">
                                        <p>Don't have an account? <a class="text-primary" href="page-register.php">Sign up</a></p>
                                    </div> -->



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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>