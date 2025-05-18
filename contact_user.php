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

        <style>.error {font-size: 15px;padding-top: 5px;color: red;width: 100%;}.back-to-top{ font-size: 33px; }</style>


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

        <section id="page-banner" class="pt-105 pb-130 bg_cover" data-overlay="8" style="height:300px ;background-image: url(Pictures/page-banner-6.jpg)">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="page-banner-cont">
                            <h2>Contact</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li id="activeID" class="breadcrumb-item active" aria-current="page">Contact</li>
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
                    <div class="col-lg-7">
                        <div class="contact-from mt-30">
                            <div class="section-title">
                                <h5>Contact Us</h5>
                                <h2>Keep in touch</h2>
                            </div> <!-- section title -->
                            <div class="main-form pt-45">
                                <form id="contact-form" action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="singel-form form-group name_container">
                                                <input name="name" id="name" type="text" placeholder="Your name" required="required">
                                                <div class="name-error-msg error"></div>
                                            </div> <!-- singel form -->
                                        </div>
                                        <div class="col-md-6">
                                            <div class="singel-form form-group">
                                                <input name="email" id="email" type="email" placeholder="Email" required="required">
                                                <div class="email-error-msg error"></div>

                                            </div> <!-- singel form -->
                                        </div>
                                        <div class="col-md-6">
                                            <div class="singel-form form-group">
                                                <input name="subject" id="subject" type="text" placeholder="Subject" required="required">
                                                <div class="subject-error-msg error"></div>

                                            </div> <!-- singel form -->
                                        </div>
                                        <div class="col-md-6">
                                            <div class="singel-form form-group">
                                                <input name="phone" id="phone" type="text" placeholder="Phone" required="required">
                                                <div class="phone-error-msg error"></div>

                                            </div> <!-- singel form -->
                                        </div>
                                        <div class="col-md-12">
                                            <div class="singel-form form-group">
                                                <textarea name="message" id="message" placeholder="Message" required="required"></textarea>
                                                <div class="message-error-msg error"></div>
                                            </div> <!-- singel form -->
                                        </div>
                                        <!-- <p class="form-message"></p> -->
                                        <div class="col-md-6">
                                            <div class="singel-form form-group">
                                                <button type="submit" id="contact-submit-btn" name="contact-submit-btn" class="main-btn">Send</button>
                                            </div> <!-- singel form -->
                                        </div>
                                        <div class="col-md-12">
                                            <div class="singel-form form-group">
                                                <div class="form-error-msg"></div>
                                            </div> <!-- singel form -->
                                        </div>
                                    </div> <!-- row -->
                                </form>
                            </div> <!-- main form -->
                        </div> <!--  contact from -->
                    </div>
                    <div class="col-lg-5">
                        <div class="contact-address mt-30">
                            <ul>
                                <li>
                                    <div class="singel-address">
                                        <div class="icon">
                                            <i class="fa fa-home"></i>
                                        </div>
                                        <div class="cont">
                                            <p>143 castle road 517 district, kiyev port south Canada</p>
                                        </div>
                                    </div> <!-- singel address -->
                                </li>
                                <li>
                                    <div class="singel-address">
                                        <div class="icon">
                                            <i class="fa fa-phone"></i>
                                        </div>
                                        <div class="cont">
                                            <p>+3 123 456 789</p>
                                            <p>+1 222 345 342</p>
                                        </div>
                                    </div> <!-- singel address -->
                                </li>
                                <li>
                                    <div class="singel-address">
                                        <div class="icon">
                                            <i class="fa fa-envelope-o"></i>
                                        </div>
                                        <div class="cont">
                                            <p>wassiikhan@gmail.com</p>
                                            <p>beast@gmail.com</p>
                                        </div>
                                    </div> <!-- singel address -->
                                </li>
                            </ul>
                        </div> <!-- contact address -->
                        <div class="map mt-30">
                            <div id="contact-map"></div>
                        </div> <!-- map -->
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

        <!-- jquery validator cdn -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>


        <!--====== Main js ======-->
        <script src="./JAVASCRIPT/main.js"></script>

        <!-- contact ajax js -->
        <script src="./JAVASCRIPT/contact-ajax.js"></script>

        <!--====== Map js ======-->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDC3Ip9iVC0nIxC6V14CKLQ1HZNF_65qEQ"></script>
        <script src="./JAVASCRIPT/map-script.js"></script>


        <!-- active class asssigned script -->
        <script src="js/activeClassAssigned.js"></script>


    </body>
</php>