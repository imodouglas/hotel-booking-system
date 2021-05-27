<?php
  include 'scss/classes.php';

  $getHallVal->execute(array("5"));
  $getHall = $getHallVal->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- TITLE -->
    <title>Restaurant | The Lekki Coliseum</title>
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


            <div class="sub-banner">
                <div class="container">
                    <div class="text text-center">
                        <h2>Restaurant</h2>
                        <p>Always meeting your delight</p>
                    </div>
                </div>

            </div>

        </section>
        <!-- END / SUB BANNER -->

        <!-- RESTAURANTS -->
        <section class="section-restaurant-4 bg-white">
            <div class="container">

                <div class="restaurant-tabs">
                  <p>
                    The View restaurant takes a different approach to dining than most restaurants. Each meal is carefully designed and constructed as though by an engineer rather than a chef. The dishes @ THE VIEW are designed to take full advantage of each ingredient, with those ingredients being carefully selected to provide the diner with the utmost dining experience.
                  </p>
                  <p>
                    The exclusivity of THE VIEW RESTAURANT is evident from the moment you walk through the doors, that is if you can get a reservation.
                  </p>
                  <h2 style="color:#C48931">HALL BOOKING</h2>
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
        </section>
        <!-- END / RESTAURANTS -->

        <!-- RESERVATION -->
        <section class="section-reservation bg-17">
            <div class="container">
                <div class="reservation">
                    <h2>reservation</h2>

                    <div class="reservation_form">
                        <div class="row">

                            <div class="col-sm-4">
                                <input type="text" class="awe-calendar" placeholder="When?">
                            </div>

                            <div class="col-sm-4">
                                <select class="awe-select" placeholder="Location">
                                    <option>Location</option>
                                    <option value="Restaurant">Restaurant</option>
                                    <option value="Caesar's">Room at Caesar's</option>
                                </select>
                            </div>

                            <div class="col-sm-4">
                                <input type="number" class="awe-input" placeholder="No. of people">
                            </div>

                            <div class="col-md-12 col-sm-12">
                                <textarea class="awe-teaxtarea" cols="50" rows="10" placeholder="Write your request"></textarea>
                            </div>

                            <div class="col-md-12 col-sm-12 text-center">
                                <button class="awe-btn awe-btn-13">SEND REQUEST</button>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- END / RESERVATION -->


        <!-- EVENT DEAL RESTAURANT -->
        <?php include 'scss/events-deals.php'; ?>
        <!-- END / EVENT DEAL RESTAURANT -->

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
