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
        <link rel="shortcut icon" href="images/favicon.png" type="image/png">

        <!--====== Slick css ======-->
        <link rel="stylesheet" href="./Styles/slick.css">

        <!--====== Animate css ======-->
        <link rel="stylesheet" href="./Styles/animate.css">

        <!--====== Nice Select css ======-->
        <link rel="stylesheet" href="./Styles/nice-select.css">

        <!--====== Nice Number css ======-->
        <link rel="stylesheet" href="./Styles/jquery.nice-number.min.css">

        <!--====== Magnific Popup css ======-->
        <link rel="stylesheet" href="./Styles/magnific-popup.css">

        <!--====== Bootstrap css ======-->
        <link rel="stylesheet" href="./Styles/bootstrap.min.css">

        <!--====== Fontawesome css ======-->
        <link rel="stylesheet" href="./Styles/font-awesome.min.css">

        <!--====== Default css ======-->
        <link rel="stylesheet" href="./Styles/default.css">

        <!--====== Style css ======-->
        <link rel="stylesheet" href="./Styles/style.css">

        <!--====== Responsive css ======-->
        <link rel="stylesheet" href="./Styles/responsive.css">

        <style>
            .error {
                font-size: 15px;
                padding-top: 5px;
                color: red;
                width: 100%;
            }
        </style>


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

        <?php include("Common/navbar_user.php") ?>

        <!--====== PRELOADER PART END ======-->



        <!--====== PAGE BANNER PART START ======-->

        <section id="page-banner" class="pt-105 pb-130 bg_cover" data-overlay="8" style="height:300px ;background-image: url(Pictures/page-banner-6.jpg)">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="page-banner-cont">
                            <h2>Not Found</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Not Found</li>
                                </ol>
                            </nav>
                        </div> <!-- page banner cont -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </section>

        <!--====== PAGE BANNER PART ENDS ======-->

        <!--====== CONTACT PART START ======-->

        <section id="contact-page" class="pt-90 pb-120 gray-bg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="contact-from mt-30">
                            <div class="section-title">
                                <h5>Not Found</h5>
                            </div> <!-- section title -->
                            <div class="main-form pt-45">
                                <form id="contact-form" action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                                    <div class="row">
                                        <div class="col-md-12 text-center">
                                        <h4 >Error! 404 Not Found.</h4>
                                        </div>
                                    </div> <!-- row -->
                                </form>
                            </div> <!-- main form -->
                        </div> <!--  contact from -->
                    </div>

                </div> <!-- row -->
            </div> <!-- container -->
        </section>

        <!--====== CONTACT PART ENDS ======-->

        <!--====== FOOTER PART START ======-->

        <?php include("common/footer_user.php") ?>


        <!--====== FOOTER PART ENDS ======-->

        <!--====== BACK TO TOP PART START ======-->

        <a href="#" class="back-to-top"><i class="fa fa-angle-up"></i></a>

        <!--====== BACK TO TOP PART ENDS ======-->







        <!--====== jquery js ======-->
        <script src="./JAVASCRIPT/vendor/modernizr-3.6.0.min.js"></script>
        <script src="./JAVASCRIPT/vendor/jquery-1.12.4.min.js"></script>

        <!--====== Bootstrap js ======-->
        <script src="./JAVASCRIPT/bootstrap.min.js"></script>

        <!--====== Slick js ======-->
        <script src="./JAVASCRIPT/slick.min.js"></script>

        <!--====== Magnific Popup js ======-->
        <script src="./JAVASCRIPT/jquery.magnific-popup.min.js"></script>

        <!--====== Counter Up js ======-->
        <script src="./JAVASCRIPT/waypoints.min.js"></script>
        <script src="./JAVASCRIPT/jquery.counterup.min.js"></script>

        <!--====== Nice Select js ======-->
        <script src="./JAVASCRIPT/jquery.nice-select.min.js"></script>

        <!--====== Nice Number js ======-->
        <script src="./JAVASCRIPT/jquery.nice-number.min.js"></script>

        <!--====== Count Down js ======-->
        <script src="./JAVASCRIPT/jquery.countdown.min.js"></script>

        <!--====== Validator js ======-->
        <!-- <script src="./JAVASCRIPT/validator.min.js"></script> -->

        <!--====== Ajax Contact js ======-->
        <!-- <script src="./JAVASCRIPT/ajax-contact.js"></script> -->


        <!-- jquery validator cdn -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>


        <!--====== Main js ======-->
        <script src="./JAVASCRIPT/main.js"></script>

        <!-- contact ajax js -->
        <!-- <script src="./JAVASCRIPT/contact-ajax.js"></script> -->

        <!--====== Map js ======-->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDC3Ip9iVC0nIxC6V14CKLQ1HZNF_65qEQ"></script>
        <script src="./JAVASCRIPT/map-script.js"></script>

    </body>
</php>