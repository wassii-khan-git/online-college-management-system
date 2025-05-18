<?php

include("./admin/admin-login.php");
// session_start();

// check if the user is logged in, if yes then redirect him to login page
if (isset($_SESSION['logged']) && $_SESSION['logged'] === true) {
    header("Location: admin-dashboard.php");
    exit;
}




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
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <style>
        form i {
            margin-left: -30px;
            cursor: pointer;
        }

        /* eye styling */
        .fa-eye-slash {
            position: absolute;
            top: 260px;
            right: 70px;

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
                                    <h2 class="text-center mb-5" style="font-weight: bold;">Admin Login</h2>
                                    <!-- <h4 class="text-center mb-4">Sign in your account</h4> -->

                                    <!-- php alert code -->
                                    <?php
                                    if ($invalid_credentials) {
                                        echo '<div class="alert alert-danger text-black" role="alert">
                                             Invalid Credentials.
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
                                            <label><strong>Email</strong></label>
                                            <input type="text" name="email" value="<?php if (isset($email)) echo $email ?>" class="form-control" required>
                                        </div>

                                        <div class="form-group">
                                            <label><strong>Password</strong></label>
                                            <input type="password" name="password" id="password" value="<?php if (isset($password)) echo $password ?>" class="form-control" required>
                                        </div>
                                        <span><i class="fa fa-eye-slash" id="eyeSlash"></i></span>


                                        <div class="form-row d-flex justify-content-between mt-5">
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox ml-1">
                                                    <input type="checkbox" name="remember" class="custom-control-input" id="remember" required>
                                                    <label class="custom-control-label" for="remember">Remember me</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <a href="admin-forgot-password.php">Forgot Password?</a>
                                            </div>
                                        </div>

                                        <div class="text-center ">
                                            <button type="submit" name="sign_in_btn" class="btn btn-primary btn-block">Sign me in</button>
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

    <script>
        const togglePassword = document.querySelector("#eyeSlash");
        const password = document.querySelector("#password");


        // for first field
        togglePassword.addEventListener("click", function() {
            // toggle the type attribute
            const type = password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);

            // toggle the icon
            this.classList.toggle("fa-eye");
        });
    </script>

    <!-- show text in the password field -->
    <!-- <script src="js/show_password_field_script.js"></script> -->


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