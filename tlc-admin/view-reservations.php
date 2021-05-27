<?php
  $pageType = "adminBackend";
  include '../scss/classes.php';

  if(isset($_GET['show'])){
    if($_GET['show'] == "room"){ $showVal = "Room Booking"; }
    else if($_GET['show'] == "hall"){ $showVal = "Hall Booking"; }
    else if($_GET['show'] == "photoscape"){ $showVal = "Photoscape"; }
    else if($_GET['show'] == "events"){ $showVal = "Event Booking"; }
  }

  if(!isset($_GET['p'])){
    header("Location: dashboard.php");
  } else {
    if($_GET['p'] == "all" && !isset($_GET['show'])){
      $getReservationsq = $conn->prepare("SELECT * FROM reservations ORDER BY resTime DESC");
      $getReservationsq->execute();
    } else if($_GET['p'] == "approved" && !isset($_GET['show'])){
      $getReservationsq = $conn->prepare("SELECT * FROM reservations WHERE resStatus = ? ORDER BY resTime DESC");
      $getReservationsq->execute(array("approved"));
    } else if($_GET['p'] == "pending" && !isset($_GET['show'])){
      $getReservationsq = $conn->prepare("SELECT * FROM reservations WHERE resStatus = ? ORDER BY resTime DESC");
      $getReservationsq->execute(array("pending"));
    } else if($_GET['p'] == "cancelled" && !isset($_GET['show'])){
      $getReservationsq = $conn->prepare("SELECT * FROM reservations WHERE resStatus = ? ORDER BY resTime DESC");
      $getReservationsq->execute(array("cancelled"));
    } else if($_GET['p'] == "all" && isset($_GET['show'])){
      $getReservationsq = $conn->prepare("SELECT * FROM reservations WHERE section = ? ORDER BY resTime DESC");
      $getReservationsq->execute(array($showVal));
    } else if($_GET['p'] == "approved" && isset($_GET['show'])){
      $getReservationsq = $conn->prepare("SELECT * FROM reservations WHERE section = ? AND resStatus = ? ORDER BY resTime DESC");
      $getReservationsq->execute(array($showVal, "approved"));
    } else if($_GET['p'] == "pending" && isset($_GET['show'])){
      $getReservationsq = $conn->prepare("SELECT * FROM reservations WHERE section = ? AND resStatus = ? ORDER BY resTime DESC");
      $getReservationsq->execute(array($showVal, "pending"));
    } else if($_GET['p'] == "cancelled" && isset($_GET['show'])){
      $getReservationsq = $conn->prepare("SELECT * FROM reservations WHERE section = ? AND resStatus = ? ORDER BY resTime DESC");
      $getReservationsq->execute(array($showVal, "cancelled"));
    } else {
      header("location: dashboard.php");
    }

    $getReservations = $getReservationsq->fetchAll();
    $getReservationsct = $getReservationsq->rowCount();
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- TITLE -->
    <title> View Reservations - <?php echo $_GET['p']." reservations"; ?> </title>
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
                  <?php include '../scss/reservation-sidebar.php'; ?>
                  <div class="col-sm-9">
                    <div class="row">

                      <!-- my reservations -->
                      <div class="col-sm-12">
                        <div style="padding:10px; border:#333 thin solid; color:#fff; background:#333" align="left">
                          <div class="row">
                            <div class="col-sm-6">
                              <?php echo strtoupper($_GET['p']); if(isset($_GET['show'])){ echo " ".strtoupper($_GET['show']); } ?> RESERVATIONS (<?php echo $getReservationsct." records found"; ?>)
                            </div>
                            <div class="col-sm-6" align="right">
                              <a href="<?php echo "?p=".$_GET['p']."&show=room"; ?>" style="color:#C49509">Rooms</a> /
                              <a href="<?php echo "?p=".$_GET['p']."&show=hall"; ?>" style="color:#C49509">Halls</a> /
                              <a href="<?php echo "?p=".$_GET['p']."&show=photoscape"; ?>" style="color:#C49509">Photoscape</a>
                            </div>
                          </div>
                        </div>
                        <div style="padding:10px; border:#333 thin solid; color:#333" align="left">
                          <?php foreach($getReservations AS $getRes){ ?>
                            <div class="row" style="background:#f0f0f0; border-bottom:#f0f0f0; padding-top:10px; padding-bottom:10px; margin:1px; margin-bottom:5px">
                              <div class="col-sm-2" style="padding-bottom:5px; border-top:#C49509 thin solid; margin-top:-10px; padding-top:10px">
                                <strong>RESERVATION ID</strong> <br />
                                <span style="font-size:12px"><a href="reservation.php?id=<?php echo $getRes['resID']; ?>"><?php echo $getRes['resID']; ?></a></span> <br />
                                <span style="background:#C49509; padding:1px 4px 1px 4px; font-size:11px; margin-top:15px; color:#fff"> <?php echo $getRes['section']; ?> </span>
                              </div>
                              <div class="col-sm-4" style="padding-bottom:5px">
                                <strong>RESERVATION DETAILS </strong> <br />
                                <span style="font-size:12px"><?php echo $getRes['description']; ?></span>
                              </div>
                              <div class="col-sm-2" style="padding-bottom:5px">
                                <strong>AMOUNT</strong> <br />
                                <span style="font-size:12px"><?php echo "N".number_format($getRes['amount'],0); ?></span> <br />
                              </div>
                              <div class="col-sm-2" style="padding-bottom:5px">
                                <strong>DATE - TIME: </strong> <br />
                                <span style="font-size:12px"><?php echo date("d/m/Y - H:ia", $getRes['resTime']); ?></span> <br />
                              </div>
                              <div class="col-sm-2" style="padding-bottom:5px">
                                <strong>STATUS: </strong> <br />
                                <span style="font-size:12px"><?php echo $getRes['resStatus']; ?></span> <br />
                                <?php if($getRes['resStatus'] == "pending"){ ?> <a href="reservation.php?id=<?php echo $getRes['resID']; ?>&action=approve"><span style="background:#C49509; padding:1px 4px 1px 4px; font-size:11px; margin-top:15px; color:#fff">Approve</span></a> <?php } ?>
                                <?php if($getRes['resStatus'] == "approved"){ ?> <a href="reservation.php?id=<?php echo $getRes['resID']; ?>&action=pend"><span style="background:#C49509; padding:1px 4px 1px 4px; font-size:11px; margin-top:15px; color:#fff">Pend</span></a> <?php } ?>
                                <?php if($getRes['resStatus'] !== "cancelled"){ ?><a href="reservation.php?id=<?php echo $getRes['resID']; ?>&action=cancel"><span style="background:#333; padding:1px 4px 1px 4px; font-size:11px; margin-top:15px; color:#fff">Cancel</span></a> <?php } ?>
                              </div>
                            </div>
                          <?php } ?>
                        </div>
                      </div>

                    </div>
                  </div>
                </div>
        </section>
        <!-- END / ACCOUNT -->

        <!-- FOOTER -->
        <?php include 'footer.php'; ?>
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
