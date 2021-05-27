<?php
  include 'scss/classes.php';

  $getHallVal->execute(array("1"));
  $getHall = $getHallVal->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- TITLE -->
    <title>Imperial | The Lekki Coliseum</title>
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
                        <h2>Imperial {Events Arcade}</h2>
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
                            <img src="images/imperial/gallery (1).jpg" alt="">
                        </div>

                        <div class="text" style="margin-top:20px">
                            <h2 class="heading">IMPERIAL</h2>
                            <div class="desc" style="padding:0px">
                              <p align="left"> With a sitting capacity of 1500 {Banquet style} and 2000 {theatre setting}. An upper floor gallery that comfortably sits 300. Elevated stage with non-reflective movie screen and e-projector, hi-fi stereo loudspeakers with factory fitted all surround sound effect and high sensory lights. This distinct venue boasts of 500 cars parking facility including 6 executive parking and facility to park the host right inside the hall. The ambience of the imperial is the perfect venue for receptions, art exhibition, fashion shows, concerts etc. An Avant Garde experience in event staging. Facilities to host all events are standard. </p>
                              <p align="left">
                                <strong>CAPACITY: </strong> <?php echo $getHall['hallCapacity']; ?>
                              </p>
                              <p align="left">
                                <strong>PRICE: </strong> N<?php echo number_format($getHall['hallPrice'],0); ?>
                              </p>
                              <p align="left">
                                <a href="hall-reservation.php?id=<?php echo $getHall['hallID']; ?>" class="awe-btn awe-btn-default">MAKE RESERVATION</a>
                              </p>
                            </div>
                        </div>

                    </div>
                    <!-- END / ITEM -->

                </div>

            </div>
        </section>
        <!-- END / ABOUT -->
        <section class="section-about">
          <div class="container">
            <div class="row">
              <div class="gallery col-sm-4">
                <a target="_blank" href="images/imperial/gallery (1).jpg">
                  <img src="images/imperial/gallery (1).jpg" width="600" height="400">
                </a>
              </div>
              <div class="gallery col-sm-4">
                <a target="_blank" href="images/imperial/gallery (2).jpg">
                  <img src="images/imperial/gallery (2).jpg" width="600" height="400">
                </a>
              </div>
              <div class="gallery col-sm-4">
                <a target="_blank" href="images/imperial/gallery (3).jpg">
                  <img src="images/imperial/gallery (3).jpg" width="600" height="400">
                </a>
              </div>
              <div class="gallery col-sm-4">
                <a target="_blank" href="images/imperial/gallery (4).jpg">
                  <img src="images/imperial/gallery (4).jpg" width="600" height="400">
                </a>
              </div>
              <div class="gallery col-sm-4">
                <a target="_blank" href="images/imperial/gallery (5).jpg">
                  <img src="images/imperial/gallery (5).jpg" width="600" height="400">
                </a>
              </div>
              <div class="gallery col-sm-4">
                <a target="_blank" href="images/imperial/gallery (6).jpg">
                  <img src="images/imperial/gallery (6).jpg" width="600" height="400">
                </a>
              </div>
            </div>
          </div>
        </section>


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
