<?php
  $pageType = "adminBackend";
  include '../scss/classes.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- TITLE -->
    <title>Hello <?php echo $adminDetails['fname']; ?> | Caesar's by TLC</title>
    <?php include 'headtag.php'; ?>
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
        <?php include 'header.php'; ?>
        <!-- END / HEADER -->

        <!-- ACCOUNT -->
        <section class="section-account parallax">
            <div class="container">
                <div class="login-register row">
                  <?php include 'admin-sidebar.php'; ?>
                  <div class="col-sm-9">
                    <div class="row">

                      <!-- my reservations -->
                      <div class="col-sm-4">
                        <div style="padding:10px; border:#333 thin solid; color:#fff; background:#333" align="center">
                          ALL RESERVATIONS
                        </div>
                        <div style="padding:10px; border:#333 thin solid; color:#333" align="center">
                          <span style="font-size:32px"> <?php echo $allReservationsct; ?> </span> <br />
                          <a href="view-reservations.php?p=all" style="color:#D39E4E"> VIEW ALL </a>
                        </div>
                      </div>

                      <div class="col-sm-4">
                        <div style="padding:10px; border:#333 thin solid; color:#fff; background:#333" align="center">
                          CONFIRMED RESERVATIONS
                        </div>
                        <div style="padding:10px; border:#333 thin solid; color:#333" align="center">
                          <span style="font-size:32px"> <?php echo $allApprovedReservationsct; ?> </span> <br />
                          <a href="view-reservations.php?p=approved" style="color:#D39E4E"> VIEW ALL </a>
                        </div>
                      </div>

                      <div class="col-sm-4">
                        <div style="padding:10px; border:#333 thin solid; color:#fff; background:#333" align="center">
                          PENDING RESERVATIONS
                        </div>
                        <div style="padding:10px; border:#333 thin solid; color:#333" align="center">
                          <span style="font-size:32px"> <?php echo $allPendingReservationsct; ?> </span> <br />
                          <a href="view-reservations.php?p=pending" style="color:#D39E4E"> VIEW ALL </a>
                        </div>
                      </div>


                    </div>
                  </div>
                </div>
        </section>
        <!-- END / ACCOUNT -->

        <!-- FOOTER -->
        <?php include '../scss/footer.php'; ?>
        <!-- END / FOOTER -->

    </div>
    <!-- END / PAGE WRAP -->


    <!-- LOAD JQUERY -->
    <script type="text/javascript" src="../js/lib/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="../js/lib/jquery-ui.min.js"></script>
    <script type="text/javascript" src="../js/lib/bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/lib/bootstrap-select.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;signed_in=true"></script>
    <script type="text/javascript" src="../js/lib/isotope.pkgd.min.js"></script>
    <script type="text/javascript" src="../js/lib/jquery.themepunch.revolution.min.js"></script>
    <script type="text/javascript" src="../js/lib/jquery.themepunch.tools.min.js"></script>
    <script type="text/javascript" src="../js/lib/owl.carousel.js"></script>
    <script type="text/javascript" src="../js/lib/jquery.appear.min.js"></script>
    <script type="text/javascript" src="../js/lib/jquery.countTo.js"></script>
    <script type="text/javascript" src="../js/lib/jquery.countdown.min.js"></script>
    <script type="text/javascript" src="../js/lib/jquery.parallax-1.1.3.js"></script>
    <script type="text/javascript" src="../js/lib/jquery.magnific-popup.min.js"></script>
    <script type="text/javascript" src="../js/lib/SmoothScroll.js"></script>
    <script type="text/javascript" src="../js/scripts.js"></script>
</body>
</html>
