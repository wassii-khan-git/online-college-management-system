<!doctype php>
<php lang="en">

    <head>

        <!--====== Required meta tags ======-->
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!--====== Title ======-->
        <?php include("Common/title.php") ?>

        <!--====== Favicon Icon ======-->
        <link rel="shortcut icon" href="Pictures/favicon.png" type="image/png">

        <!--====== Slick css ======-->
        <link rel="stylesheet" href="Styles/slick.css">

        <!--====== Animate css ======-->
        <link rel="stylesheet" href="Styles/animate.css">

        <!--====== Nice Select css ======-->
        <link rel="stylesheet" href="Styles/nice-select.css">

        <!--====== Nice Number css ======-->
        <link rel="stylesheet" href="Styles/jquery.nice-number.min.css">

        <!--====== Magnific Popup css ======-->
        <link rel="stylesheet" href="Styles/magnific-popup.css">

        <!--====== Bootstrap css ======-->
        <link rel="stylesheet" href="Styles/bootstrap.min.css">

        <!--====== Fontawesome css ======-->
        <link rel="stylesheet" href="Styles/font-awesome.min.css">

        <!--====== Default css ======-->
        <link rel="stylesheet" href="Styles/default.css">

        <!--====== Style css ======-->
        <link rel="stylesheet" href="Styles/style.css">

        <!--====== Responsive css ======-->
        <link rel="stylesheet" href="Styles/responsive.css">

        <!-- for counter section -->
        <style> .back-to-top{ font-size: 33px; } </style>

    </head>

    <body>

        <!--====== PRELOADER PART START ======-->

        <div class="preloader">
            <div class="loader rubix-cube">
                <div class="layer layer-1"></div>
                <div class="layer layer-2"></div>
                <div class="layer layer-3 color-1"></div>
                <div class="layer layer-4"></div>
                <div class="layer layer-5"></div>
                <div class="layer layer-6"></div>
                <div class="layer layer-7"></div>
                <div class="layer layer-8"></div>
            </div>
        </div>

        <!--====== PRELOADER PART START ======-->


        <!--====== HEADER PART STARTS ======-->

        <?php include("Common/navbar_user.php") ?>

        <!--====== HEADER PART ENDS ======-->
        


        <!--====== PAGE BANNER PART START ======-->

        <section id="page-banner" class="pt-105 pb-110 bg_cover" data-overlay="8" style="height:300px ;background-image: url(Pictures/page-banner-3.jpg)">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="page-banner-cont">
                            <h2>Teachers</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li id="activeID" class="breadcrumb-item active" aria-current="page">Teachers</li>
                                </ol>
                            </nav>
                        </div> <!-- page banner cont -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </section>

        <!--====== PAGE BANNER PART ENDS ======-->

        <!--====== TEACHERS PART START ======-->

        <section id="teachers-page" class="pt-90 pb-120 gray-bg">
            <div class="container">
                <div class="row">

                    <?php

                    // <!-- php code for retrieving data from database -->
                    require_once "./php/connection.php";

                    $retrieve_query = "SELECT * FROM `professors`";
                    $retrieve_query_result = mysqli_query($con, $retrieve_query);
                    $row = mysqli_num_rows($retrieve_query_result);

                    if ($row > 0) {
                        while ($fetched_record = mysqli_fetch_assoc($retrieve_query_result)) {

                    ?>


                            <div class="col-lg-3 col-sm-6">
                                <div class="singel-teachers mt-30 text-center">
                                    <div class="image">
                                        <img width="400" height="300" src="uploads/<?php echo $fetched_record['image'] ?>" alt="Teachers">
                                    </div>
                                    <div class="cont">
                                        <a href="#">
                                            <h6><?php echo $fetched_record['firstname'] . ' ' . $fetched_record['lastname'] ?></h6>
                                        </a>
                                        <span><?php echo $fetched_record['department'] ?></span>
                                    </div>
                                </div> <!-- singel teachers -->
                            </div>

                    <?php
                        }
                    }

                    ?>

                </div> <!-- row -->
                <!-- row -->
            </div> <!-- container -->
        </section>

        <!--====== TEACHERS PART ENDS ======-->

        <!--====== FOOTER PART START ======-->

        <?php include("common/footer_user.php") ?>

        <!--====== FOOTER PART ENDS ======-->

        <!--====== BACK TO TP PART START ======-->

        <a href="#" class="back-to-top"><i class="fa fa-angle-up"></i></a>

        <!--====== BACK TO TP PART ENDS ======-->








        <!--====== jquery js ======-->

        <script src="JAVASCRIPT/vendor/modernizr-3.6.0.min.js"></script>
        <script src="JAVASCRIPT/vendor/jquery-1.12.4.min.js"></script>

        <!--====== Bootstrap js ======-->
        <script src="JAVASCRIPT/bootstrap.min.js"></script>

        <!--====== Slick js ======-->
        <script src="JAVASCRIPT/slick.min.js"></script>

        <!--====== Magnific Popup js ======-->
        <script src="JAVASCRIPT/jquery.magnific-popup.min.js"></script>

        <!--====== Counter Up js ======-->
        <script src="JAVASCRIPT/waypoints.min.js"></script>
        <script src="JAVASCRIPT/jquery.counterup.min.js"></script>

        <!--====== Nice Select js ======-->
        <script src="JAVASCRIPT/jquery.nice-select.min.js"></script>

        <!--====== Nice Number js ======-->
        <script src="JAVASCRIPT/jquery.nice-number.min.js"></script>

        <!--====== Count Down js ======-->
        <script src="JAVASCRIPT/jquery.countdown.min.js"></script>

        <!--====== Validator js ======-->
        <script src="JAVASCRIPT/validator.min.js"></script>

        <!--====== Ajax Contact js ======-->
        <script src="JAVASCRIPT/ajax-contact.js"></script>

        <!--====== Main js ======-->
        <script src="JAVASCRIPT/main.js"></script>

        <!--====== Map js ======-->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDC3Ip9iVC0nIxC6V14CKLQ1HZNF_65qEQ"></script>
        <script src="JAVASCRIPT/map-script.js"></script>


        <!-- active class asssigned script -->
        <script src="js/activeClassAssigned.js"></script>

    </body>

</php>