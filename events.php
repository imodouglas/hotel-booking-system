<?php
  include 'scss/classes.php';

  $getEventsq = $conn->prepare("SELECT * FROM events a LEFT JOIN halls b ON a.eventHall = b.hallID WHERE a.eventEnd > ? AND a.eventStatus = ?");
  $getEventsq->execute(array(time(), "active"));
  $getEventsct = $getEventsq->rowCount();
  $getEvents = $getEventsq->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- TITLE -->
    <title>Events in TLC | The Lekki Coliseum</title>
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
                        <h2>EVENTS & DEALS</h2>
                        <p>Be part of our events and benefit from our awesome deals. </p>
                    </div>
                </div>

            </div>

        </section>
        <!-- END / SUB BANNER -->

        <!-- ABOUT -->
        <section class="section-about">
            <div class="container">

                <?php if($getEventsct == 0){ echo "<p style='margin-top:10px;'> No event has been added yet. </p>"; } else { foreach($getEvents AS $event){ ?>
                    <div class="col-sm-4" style="padding:5px">
                        <div style="background:#000; border:#ccc thin solid;" align="center">
                            <img src="images/<?php echo $event['eventImg']; ?>" style="width:100%; max-height:300px;" />
                            <div style="padding:10px">
                                <h4 style="color:#D1A04C"> <?php echo $event['eventName']; ?> </h4>
                                <p style="color:#fff"> <i class="fa fa-calendar"></i> <?php echo date("d M", $event['eventStart'])." - ".date("d M", $event['eventEnd']); ?> </p>
                                <strong style="color:#D1A04C"> <?php if($event['eventPrice'] == "FREE"){ echo $event['eventPrice']; } else { echo "N".number_format($event['eventPrice']); } ?> </strong>
                                <p style="color:#D1A04C"> [ <a href="?id=<?php echo $event['eventID']; ?>" style="color:#fff"> View & Book </a> ] </p>
                            </div>
                        </div>
                    </div>
                <?php } } ?>

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
