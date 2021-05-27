<?php
  include 'scss/classes.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- TITLE -->
    <title>Photoscape | The Lekki Coliseum</title>
    <?php include 'scss/headtags.php'; ?>

</head>

<!--[if IE 7]> <body class="ie7 lt-ie8 lt-ie9 lt-ie10"> <![endif]-->
<!--[if IE 8]> <body class="ie8 lt-ie9 lt-ie10"> <![endif]-->
<!--[if IE 9]> <body class="ie9 lt-ie10"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <body> <!--<![endif]-->

    <!-- PRELOADER -->
    <div id="preloader">
        <span class="preloader-dot"></span>
    </div>
    <!-- END / PRELOADER -->

    <!-- PAGE WRAP -->
    <div id="page-wrap">

        <!-- HEADER -->
        <?php include 'scss/header.php'; ?>
        <!-- END / HEADER -->

        <!-- SUB BANNER -->
        <section class="section-sub-banner bg-9">
            <div class="awe-overlay"></div>
            <div class="sub-banner">
                <div class="container">
                    <div class="text text-center">
                        <h2>Photoscape</h2>
                        <!-- <p>Everything to make you feel at home in one place.</p> -->
                    </div>
                </div>

            </div>

        </section>
        <!-- END / SUB BANNER -->

        <!-- ABOUT -->
        <section class="section-about">
            <div class="container">

                <div class="about">

                    <!-- ITEM -->
                    <div class="about-item about-left">

                        <div class="img">
                            <img src="images/photoscape.jpg" alt="">
                        </div>

                        <div class="text" style="margin-top:20px">
                            <h2 class="heading">Photoscape</h2>
                            <div class="desc" style="margin-top:0px">
                              <p align="left"> Timeless moments… </p>
                              <p align="left">
                                We're a mature, thoughtful, value adding brand, with a touch of whimsical... With respectful interactions following acceptable rules of decorum and good conduct in the Photography Industry.
                              </p>
                              <p align="left">
                                Good Photography tells a story. Be it a Person, an Object, a Happening or an Event. Photography lays bare the Soul.
                              </p>
                              <p align="left">
                                We've got a Creative, High-Energy Team with strong digital and technical skills to produce premium quality photos in Studio Setting and we're dedicated to creating Memories that last a life time!
                              </p>
                              <p align="left">
                                In addition, we equally offer professional make up services.
                              </p>
                              <p align="left">
                                Follow us on our social media handles for a sneak peak of our value added services. <br />
                                <a href="https://www.facebook.com/photoscapeltd" style="font-size:24px" target="_blank"><i class="fa fa-facebook"></i></a> &nbsp;
                                <a href="https://www.twitter.com/photoscapeltd" style="font-size:24px" target="_blank"><i class="fa fa-twitter-square"></i></a> &nbsp;
                                <a href="https://www.instagram.com/photoscapeltd" style="font-size:24px" target="_blank"><i class="fa fa-instagram"></i></a>
                              </p>
                              <p align="left" style="color:#C48931">
                                <i class="fa fa-phone-square" style="font-size:18px"></i> +234 906 000 1853, +234 906 000 1854 <br />
                                <a href="book-ps-session.php" class="awe-btn awe-btn-default" style="margin-top:10px">BOOK SESSION</a>
                              </p>
                            </div>
                            <h2 style="color:#C48931">OUR PRICES</h2>
                            <?php foreach($getPS AS $getPS){ ?>
                              <div style="padding:10px; border-bottom:#ccc thin solid; margin-bottom:10px">
                                <strong> <?php echo strtoupper($getPS['psServices']); ?> </strong> <br />
                                <?php echo $getPS['psDescriptions']; ?> <br />
                                <span style="color:#C48931"><?php echo "N".number_format($getPS['psPrices'],0) ?></span> <?php if($getPS['psPromo'] == "on"){ echo "<span style='color:#fff; background:#C48931; padding:0px 5px 0px 5px'> On Promo </span>"; } ?>
                              </div>
                            <?php } ?>
                        </div>

                    </div>
                    <!-- END / ITEM -->

                </div>

            </div>
        </section>
        <!-- END / ABOUT -->


        <!-- FOOTER -->
        <?php include 'scss/footer.php'; ?>
        <!-- END / FOOTER -->

    </div>
    <!-- END / PAGE WRAP -->


    <!-- LOAD JQUERY -->
    <script type="text/javascript" src="js/lib/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="js/lib/jquery-ui.min.js"></script>
    <script type="text/javascript" src="js/lib/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/lib/bootstrap-select.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;signed_in=true"></script>
    <script type="text/javascript" src="js/lib/isotope.pkgd.min.js"></script>
    <script type="text/javascript" src="js/lib/jquery.themepunch.revolution.min.js"></script>
    <script type="text/javascript" src="js/lib/jquery.themepunch.tools.min.js"></script>
    <script type="text/javascript" src="js/lib/owl.carousel.js"></script>
    <script type="text/javascript" src="js/lib/jquery.appear.min.js"></script>
    <script type="text/javascript" src="js/lib/jquery.countTo.js"></script>
    <script type="text/javascript" src="js/lib/jquery.countdown.min.js"></script>
    <script type="text/javascript" src="js/lib/jquery.parallax-1.1.3.js"></script>
    <script type="text/javascript" src="js/lib/jquery.magnific-popup.min.js"></script>
    <script type="text/javascript" src="js/lib/SmoothScroll.js"></script>
    <script type="text/javascript" src="js/scripts.js"></script>
</body>
</html>
