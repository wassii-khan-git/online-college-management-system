<!doctype php>
<php lang="en">

    <head>

        <!--====== Required meta tags ======-->
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!--====== Title ======-->
        <title>Edubin - LMS Education php Template</title>

        <!--====== Favicon Icon ======-->
        <link rel="shortcut icon" href="Pictures/favicon.png" type="image/png">

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

        <!-- left and right arrow styling -->
        <style>.back-to-top{ font-size: 33px; }.courses-pagination .pagination .page-item a i {line-height: 33px;}@media only screen and (max-width: 575.98px) {.courses-pagination .pagination .page-item a i {line-height: 28px;}}</style>

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

        <!--====== HEADER PART START ======-->


        <?php include("common/navbar_user.php") ?>



        <!--====== PAGE BANNER PART START ======-->

        <section id="page-banner" class="pt-105 pb-130 bg_cover" data-overlay="8" style="height:300px ;background-image: url(Pictures/page-banner-4.jpg)">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="page-banner-cont">
                            <h2>Blog</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Blog</li>
                                </ol>
                            </nav>
                        </div> <!-- page banner cont -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </section>

        <!--====== PAGE BANNER PART ENDS ======-->

        <!--====== BLOG PART START ======-->

        <section id="blog-page" class="pt-90 pb-120 gray-bg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="singel-blog mt-30">
                            <div class="blog-thum">
                                <img src="Pictures/blog/b-1.jpg" alt="Blog">
                            </div>
                            <div class="blog-cont">
                                <a href="blog-singel.php">
                                    <h3>Few tips for get better results in examination</h3>
                                </a>
                                <ul>
                                    <li><a href="#"><i class="fa fa-calendar"></i>25 Dec 2018</a></li>
                                    <li><a href="#"><i class="fa fa-user"></i>Mark anthem</a></li>
                                    <li><a href="#"><i class="fa fa-tags"></i>Education</a></li>
                                </ul>
                                <p>Lorem ipsum gravida nibh vel velit auctor aliquetn sollicitudirem quibibendum auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus .</p>
                            </div>
                        </div> <!-- singel blog -->
                        <div class="singel-blog mt-30">
                            <div class="blog-thum">
                                <img src="Pictures/blog/b-2.jpg" alt="Blog">
                            </div>
                            <div class="blog-cont">
                                <a href="blog-singel.php">
                                    <h3>Few tips for get better results in examination</h3>
                                </a>
                                <ul>
                                    <li><a href="#"><i class="fa fa-calendar"></i>25 Dec 2018</a></li>
                                    <li><a href="#"><i class="fa fa-user"></i>Mark anthem</a></li>
                                    <li><a href="#"><i class="fa fa-tags"></i>Education</a></li>
                                </ul>
                                <p>Lorem ipsum gravida nibh vel velit auctor aliquetn sollicitudirem quibibendum auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus .</p>
                            </div>
                        </div> <!-- singel blog -->
                        <nav class="courses-pagination mt-50">
                            <ul class="pagination justify-content-lg-end justify-content-center">
                                <li class="page-item">
                                    <a href="#" aria-label="Previous">
                                        <i class="fa fa-angle-left"></i>
                                    </a>
                                </li>
                                <li class="page-item"><a class="active" href="#">1</a></li>
                                <li class="page-item"><a href="#">2</a></li>
                                <li class="page-item"><a href="#">3</a></li>
                                <li class="page-item">
                                    <a href="#" aria-label="Next">
                                        <i class="fa fa-angle-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </nav> <!-- courses pagination -->
                    </div>
                    <div class="col-lg-4">
                        <div class="saidbar">
                            <div class="row">
                                <div class="col-lg-12 col-md-6">
                                    <div class="saidbar-search mt-30">
                                        <form action="#">
                                            <input type="text" placeholder="Search">
                                            <button type="button"><i class="fa fa-search"></i></button>
                                        </form>
                                    </div> <!-- saidbar search -->
                                    <div class="categories mt-30">
                                        <h4>Categories</h4>
                                        <ul>
                                            <li><a href="#">Fronted</a></li>
                                            <li><a href="#">Backend</a></li>
                                            <li><a href="#">Photography</a></li>
                                            <li><a href="#">Teachnology</a></li>
                                            <li><a href="#">GMET</a></li>
                                            <li><a href="#">Language</a></li>
                                            <li><a href="#">Science</a></li>
                                            <li><a href="#">Accounting</a></li>
                                        </ul>
                                    </div>
                                </div> <!-- categories -->
                                <div class="col-lg-12 col-md-6">
                                    <div class="saidbar-post mt-30">
                                        <h4>Popular Posts</h4>
                                        <ul>
                                            <li>
                                                <a href="#">
                                                    <div class="singel-post">
                                                        <div class="thum">
                                                            <img src="Pictures/blog/blog-post/bp-1.jpg" alt="Blog">
                                                        </div>
                                                        <div class="cont">
                                                            <h6>Introduction to languages</h6>
                                                            <span>20 Dec 2018</span>
                                                        </div>
                                                    </div> <!-- singel post -->
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <div class="singel-post">
                                                        <div class="thum">
                                                            <img src="Pictures/blog/blog-post/bp-2.jpg" alt="Blog">
                                                        </div>
                                                        <div class="cont">
                                                            <h6>How to build a game with java</h6>
                                                            <span>10 Dec 2018</span>
                                                        </div>
                                                    </div> <!-- singel post -->
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <div class="singel-post">
                                                        <div class="thum">
                                                            <img src="Pictures/blog/blog-post/bp-1.jpg" alt="Blog">
                                                        </div>
                                                        <div class="cont">
                                                            <h6>Basic accounting from primary</h6>
                                                            <span>07 Dec 2018</span>
                                                        </div>
                                                    </div> <!-- singel post -->
                                                </a>
                                            </li>
                                        </ul>
                                    </div> <!-- saidbar post -->
                                </div>
                            </div> <!-- row -->
                        </div> <!-- saidbar -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </section>

        <!--====== BLOG PART ENDS ======-->

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
        <script src="./JAVASCRIPT/validator.min.js"></script>

        <!--====== Ajax Contact js ======-->
        <script src="./JAVASCRIPT/ajax-contact.js"></script>

        <!--====== Main js ======-->
        <script src="./JAVASCRIPT/main.js"></script>

        <!--====== Map js ======-->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDC3Ip9iVC0nIxC6V14CKLQ1HZNF_65qEQ"></script>
        <script src="./JAVASCRIPT/map-script.js"></script>

    </body>
</php>