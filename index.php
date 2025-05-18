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
        <link rel="shortcut icon" type="image/png" sizes="16x16" href="Pictures/favicon.png">

        <!-- <link rel="shortcut icon" href="Pictures/favicon.png" type="image/png"> -->

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

        <!-- for counter section -->
        <style>
            @media(min-width: 550px) {
                #counter-part {
                    height: 300px;
                }
            }

            .back-to-top {
                font-size: 33px;
            }
        </style>

        <style>
            @keyframes flash {

                0%,
                100% {
                    opacity: 1;
                }

                50% {
                    opacity: 0;
                }
            }

            .flashing-text {
                animation: flash 1s infinite;
            }
        </style>

        <!-- Inside your HTML -->
        <!-- <p class="flashing-text">This is an alert message!</p> -->



    </head>

    <body>

        <!--====== PRELOADER PART START ======-->

        <!-- <div class="preloader">
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
        </div> -->

        <!--====== PRELOADER PART END ======-->


        <!--====== HEADER PART STARTS ======-->

        <?php include("Common/navbar_user.php") ?>

        <!--====== HEADER PART ENDS ======-->






        <!--====== SLIDER PART START ======-->

        <section id="slider-part" class="slider-active">
            <div class="single-slider bg_cover pt-150" style="background-image: url(Pictures/slider/s-1.jpg);" data-overlay="4">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-7 col-lg-9">
                            <div class="slider-cont">
                                <h1 data-animation="bounceInLeft" data-delay="1s">Learn New Courses</h1>
                                <p data-animation="fadeInUp" data-delay="1.3s">Success comes to those who work hard and stays with those, who don’t rest on the laurels of the past.</p>
                                <ul>
                                    <li><a data-animation="fadeInUp" data-delay="1.6s" class="main-btn" href="courses_user.php">Read
                                            More</a></li>
                                    <li><a data-animation="fadeInUp" data-delay="1.9s" class="main-btn main-btn-2" href="courses_user.php">Get Started</a></li>
                                </ul>
                            </div>
                        </div>
                    </div> <!-- row -->
                </div> <!-- container -->
            </div> <!-- single slider -->

            <div class="single-slider bg_cover pt-150" style="background-image: url(Pictures/slider/s-2.jpg)" data-overlay="4">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-7 col-lg-9">
                            <div class="slider-cont">
                                <h1 data-animation="bounceInLeft" data-delay="1s">Education Plays An Important Role in
                                    Building Our Character</h1>
                                <p data-animation="fadeInUp" data-delay="1.3s">Success comes to those who work hard and stays with those, who don’t rest on the laurels of the past.</p>
                                <ul>
                                    <li><a data-animation="fadeInUp" data-delay="1.6s" class="main-btn" href="courses_user.php">Read
                                            More</a></li>
                                    <li><a data-animation="fadeInUp" data-delay="1.9s" class="main-btn main-btn-2" href="courses_user.php">Get Started</a></li>
                                </ul>
                            </div>
                        </div>
                    </div> <!-- row -->
                </div> <!-- container -->
            </div> <!-- single slider -->

            <div class="single-slider bg_cover pt-150" style="background-image: url(Pictures/slider/s-3.jpg)" data-overlay="4">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-7 col-lg-9">
                            <div class="slider-cont">
                                <h1 data-animation="bounceInLeft" data-delay="1s">Choose the right theme for education</h1>
                                <p data-animation="fadeInUp" data-delay="1.3s">Success comes to those who work hard and stays with those, who don’t rest on the laurels of the past.</p>
                                <ul>
                                    <li><a data-animation="fadeInUp" data-delay="1.6s" class="main-btn" href="courses_user.php">Read
                                            More</a></li>
                                    <li><a data-animation="fadeInUp" data-delay="1.9s" class="main-btn main-btn-2" href="courses_user.php">Get Started</a></li>
                                </ul>
                            </div>
                        </div>
                    </div> <!-- row -->
                </div> <!-- container -->
            </div> <!-- single slider -->
        </section>

        <!--====== SLIDER PART ENDS ======-->

        <!--====== CATEGORY PART START ======-->



        <!--====== PAGE BANNER PART ENDS ======-->

        <!--====== ABOUT PART START ======-->

        <section id="about-page" class="pt-70 pb-110">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="section-title mt-50">
                            <h5>Welcome</h5>
                            <h2>Welcome to OSSC </h2>
                        </div> <!-- section title -->
                        <div class="about-cont">
                            <p>Sir Syed College, a premiere institute of higher education in North Malabar, has completed 55 years of its historic journey. The college was established in 1967 by the C.D.M.E.A with a noble mission to provide higher education for the students of backward districts of north Malabar. It was also aimed at bringing the minority students to the mainstream sections of the society. The college has been successful to a great extent in fulfilling this aim. It was established with only a pre degree batch and now it offers fourteen U.G. programmes and five P.G programmes. Among them department of Chemistry and Botany are recognized research centres under Kannur University. Already thirty eight students have completed their Phd from these centres and many full time and part time scholars are currently pursuing their Ph.D. </p>
                        </div>
                    </div> <!-- about cont -->
                    <div class="col-lg-6 col-sm-4 col-md-6 mt-2">
                        <div class="about-image ">
                            <img src="Pictures/principal.jpeg" alt="About">
                        </div> <!-- about imag -->
                    </div>
                </div> <!-- row -->

            </div> <!-- container -->
        </section>

        <!--====== ABOUT PART ENDS ======-->

        <!-- why choose us part -->
        <div class="container-fluid gray-bg">
            <div class="container">
                <div class="about-items pt-60">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 col-sm-10">
                            <div class="about-singel-items mt-30 pb-5">
                                <span>01</span>
                                <h4>Why Choose us</h4>
                                <p>We Provide the Best Environment for our Students.
                                    and affordable and quality education for their
                                    growth.
                                </p>
                            </div> <!-- about singel -->
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-10">
                            <div class="about-singel-items mt-30">
                                <span>02</span>
                                <h4>Our Mission</h4>
                                <p>"Strive for excellence in education and research and prepare young minds for imbibing knowledge, skills, and sensitivity"</p>
                            </div> <!-- about singel -->
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-10">
                            <div class="about-singel-items mt-30">
                                <span>03</span>
                                <h4>Our vission</h4>
                                <p>"To uplift educationally, socially & economically underprivileged youth of Nowshera. By providing them affordable and quality education. "</p>
                            </div> <!-- about singel -->
                        </div>
                    </div> <!-- row -->
                </div> <!-- about items -->
            </div>
        </div>










        <!--====== COUNTER PART START ======-->

        <div id="counter-part" class="bg_cover pt-65  " data-overlay="8" style="background-image: url(Pictures/bg-2.jpg); margin-top: 200px;">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-sm-6">
                        <div class="singel-counter text-center mt-40">
                            <span>
                                <span class="counter">
                                    <?php
                                    include("./php/functions.php");
                                    $query = "SELECT * FROM `students` ";
                                    $result = get_number_of_rows($query);
                                    if ($result !== "") {
                                        echo $result;
                                    }
                                    ?>
                                </span>
                                +
                            </span>
                            <p>Students enrolled</p>
                        </div> <!-- singel counter -->
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="singel-counter text-center mt-40">
                            <span>
                                <span class="counter">
                                    <?php
                                    $query = "SELECT * FROM `courses` ";
                                    $result = get_number_of_rows($query);
                                    if ($result !== "") {
                                        echo $result;
                                    }
                                    ?>
                                </span>
                                +</span>
                            <p>Courses</p>
                        </div> <!-- singel counter -->
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="singel-counter text-center mt-40">
                            <span>
                                <span class="counter">
                                    <?php
                                    $query = "SELECT * FROM `courses` ";
                                    $result = get_number_of_rows($query);
                                    if ($result !== "") {
                                        echo $result;
                                    }
                                    ?>
                                </span>
                                +</span>
                            <p>Books</p>
                        </div> <!-- singel counter -->
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="singel-counter text-center mt-40">
                            <span>
                                <span class="counter">
                                    <?php
                                    $query = "SELECT * FROM `professors` ";
                                    $result = get_number_of_rows($query);
                                    if ($result !== "") {
                                        echo $result;
                                    }
                                    ?>
                                </span>
                                +</span>
                            <p>Teachers</p>
                        </div> <!-- singel counter -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div>

        <!--====== COUNTER PART ENDS ======-->


        <!--====== NEWS PART START ======-->

        <section id="news-part" class="pt-115 pb-110">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="section-title pb-50">
                            <h5>Announcements</h5>
                            <h2>From the Administrations</h2>
                        </div> <!-- section title -->
                    </div>
                </div> <!-- row -->

                <marquee behavior="scroll" direction="left">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="singel-news news-list">
                                <?php
                                $annoucement_query = "SELECT * FROM `annoucements` ";
                                $annoucement_result = get_data($annoucement_query);
                                if (!empty($annoucement_result)) {
                                    foreach ($annoucement_result as $annoucement_value) {
                                
                                    // print("<pre>");
                                    // print_r($annoucement_value);
                                    // print("</pre>");
                                ?>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="news-thum mt-30">
                                                    <img src="Pictures/announcement.jpg" alt="News">
                                                </div>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="news-cont mt-30">
                                                    <ul>
                                                        <li><a href=""><i class="fa fa-calendar"></i><?php echo $annoucement_value['date'] ?></a></li>
                                                        <li><a href=""> <span>By</span> Adam linn</a></li>
                                                    </ul>
                                                    <a href="">
                                                        <h3><?php echo $annoucement_value['title'] ?></h3>
                                                    </a>
                                                    <p><?php echo $annoucement_value['description'] ?></p>
                                                </div>
                                            </div>
                                        </div> 
                                        <!-- row -->
                                <?php
                                    }
                                }
                                ?>
                            </div> <!-- singel news -->

                        </div>
                    </div> <!-- row -->
                </marquee>





            </div> <!-- container -->
        </section>


        <!--====== NEWS PART ENDS ======-->

        <!--====== PATNAR LOGO PART START ======-->

        <div id="patnar-logo" class="pt-40 pb-80 gray-bg">
            <div class="container">
                <div class="row patnar-slied">
                    <div class="col-lg-12">
                        <div class="singel-patnar text-center mt-40">
                            <img src="Pictures/patnar-logo/p-1.png" alt="Logo">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="singel-patnar text-center mt-40">
                            <img src="Pictures/patnar-logo/p-2.png" alt="Logo">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="singel-patnar text-center mt-40">
                            <img src="Pictures/patnar-logo/p-3.png" alt="Logo">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="singel-patnar text-center mt-40">
                            <img src="Pictures/patnar-logo/p-4.png" alt="Logo">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="singel-patnar text-center mt-40">
                            <img src="Pictures/patnar-logo/p-2.png" alt="Logo">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="singel-patnar text-center mt-40">
                            <img src="Pictures/patnar-logo/p-3.png" alt="Logo">
                        </div>
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div>

        <!--====== PATNAR LOGO PART ENDS ======-->

        <!--====== FOOTER PART START ======-->

        <?php include("common/footer_user.php") ?>

        <!--====== FOOTER PART ENDS ======-->

        <!--====== BACK TO TP PART START ======-->

        <a href="#" class="back-to-top"><i class="fa fa-angle-up"></i></a>

        <!--====== BACK TO TP PART ENDS ======-->








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
        <script src="./JAVASCRIPT/validator.min.js"></script>

        <!--====== Ajax Contact js ======-->
        <script src="./JAVASCRIPT/ajax-contact.js"></script>

        <!--====== Main js ======-->
        <script src="./JAVASCRIPT/main.js"></script>

        <!--====== Map js ======-->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDC3Ip9iVC0nIxC6V14CKLQ1HZNF_65qEQ"></script>
        <script src="./JAVASCRIPT/map-script.js"></script>


        <!-- active class asssigned script -->
        <script src="js/activeClassAssigned.js"></script>


    </body>

</php>