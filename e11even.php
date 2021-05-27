<?php
  include 'scss/classes.php';

  $getHallVal->execute(array("6"));
  $getHall = $getHallVal->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- TITLE -->
    <title>E11EVEN | The Lekki Coliseum</title>
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
                        <h2>E11EVEN</h2>
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
                            <img src="images/e11even/bar.jpg" alt="">
                        </div>

                        <div class="text" style="margin-top:10px">
                            <h2 class="heading">E11EVEN</h2>
                            <div class="desc">
                              <p align="left"> Nestled in the center of the luxurious CAESAR’S HOTEL, E11EVEN is a high end, exquisite lounge/bar.</p>
                              <p align="left"> One of the most dazzling and spectacular bars in Lagos, one is awed into silence by the framework of this spherically appealing bar with ultra-seductive chaises and lounge sofas looking across the city in resplendent glory. </p>
                              <p align="left"> It’s fantastic ambience and stunning interiors make it the perfect venue for entertainment. While guests tend to congregate around the eye-catching décor, there are other areas to relax and enjoy canapes and grills from the bar menu, if guests are bored, they have easy access to the outdoor patio. </p>
                              <p align="left"> Exclusive cocktail cocktail innovations wow guests at each visit. The languorous moments of an unhurried night uplift the soiree with unmatched verve. The guests cannot help but murmur… C’est La Vie… Incroyable. </p>
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
                <a target="_blank" href="images/poolside/gallery (1).jpg">
                  <img src="images/poolside/gallery (1).jpg" width="600" height="400">
                </a>
              </div>
              <div class="gallery col-sm-4">
                <a target="_blank" href="images/poolside/gallery (2).jpg">
                  <img src="images/poolside/gallery (2).jpg" width="600" height="400">
                </a>
              </div>
              <div class="gallery col-sm-4">
                <a target="_blank" href="images/poolside/gallery (3).jpg">
                  <img src="images/poolside/gallery (3).jpg" width="600" height="400">
                </a>
              </div>
              <div class="gallery col-sm-4">
                <a target="_blank" href="images/poolside/gallery (4).jpg">
                  <img src="images/poolside/gallery (4).jpg" width="600" height="400">
                </a>
              </div>
              <div class="gallery col-sm-4">
                <a target="_blank" href="images/poolside/gallery (5).jpg">
                  <img src="images/poolside/gallery (5).jpg" width="600" height="400">
                </a>
              </div>
              <div class="gallery col-sm-4">
                <a target="_blank" href="images/poolside/gallery (6).jpg">
                  <img src="images/poolside/gallery (6).jpg" width="600" height="400">
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
