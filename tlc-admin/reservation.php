<?php
  $pageType = "adminBackend";
  include '../scss/classes.php';

  if(!isset($_GET['id'])){
    header("Location: dashboard.php");
  } else if(isset($_GET['id']) && !isset($_GET['action'])) {
    $getReservationsq = $conn->prepare("SELECT * FROM reservations a JOIN billings b USING(resID) WHERE a.resID = ?");
    $getReservationsq->execute(array($_GET['id']));
    $getReservations = $getReservationsq->fetch(PDO::FETCH_ASSOC);
    $getReservationsct = $getReservationsq->rowCount();
  } else if(isset($_GET['id']) && isset($_GET['action'])){
    if($_GET['action'] == "approve"){
      $actRes = $conn->prepare("UPDATE reservations SET resStatus = ? WHERE resID = ?");
      $actRes->execute(array("approved", $_GET['id']));
    } else if($_GET['action'] == "cancel"){
      $actRes = $conn->prepare("UPDATE reservations SET resStatus = ? WHERE resID = ?");
      $actRes->execute(array("cancelled", $_GET['id']));
    } else if($_GET['action'] == "pend"){
      $actRes = $conn->prepare("UPDATE reservations SET resStatus = ? WHERE resID = ?");
      $actRes->execute(array("pending", $_GET['id']));
    }

    $getReservationsq = $conn->prepare("SELECT * FROM reservations a JOIN billings b USING(resID) WHERE a.resID = ?");
    $getReservationsq->execute(array($_GET['id']));
    $getReservations = $getReservationsq->fetch(PDO::FETCH_ASSOC);
    $getReservationsct = $getReservationsq->rowCount();
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- TITLE -->
    <title> View Reservations - ID: #<?php echo $_GET['id']; ?> </title>
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
                          RECORD FOR RESERVATION #<?php echo strtoupper($_GET['id']) ?>
                        </div>
                        <div style="padding:10px; border:#333 thin solid; color:#333" align="left">

                            <div class="row" style="background:#f0f0f0; border-bottom:#f0f0f0; padding-top:10px; padding-bottom:10px; margin:1px; margin-bottom:5px">
                              <div class="col-sm-2" style="padding-bottom:5px; border-top:#C49509 thin solid; margin-top:-10px; padding-top:10px">
                                <strong>RESERVATION ID</strong> <br />
                                <span style="font-size:12px"><?php echo $getReservations['resID']; ?></span> <br />
                                <span style="background:#C49509; padding:1px 4px 1px 4px; font-size:11px; margin-top:15px; color:#fff"> <?php echo $getReservations['section']; ?> </span>
                              </div>
                              <div class="col-sm-4" style="padding-bottom:5px">
                                <strong>RESERVATION DETAILS </strong> <br />
                                <span style="font-size:12px"><?php echo $getReservations['description']; ?></span>
                              </div>
                              <div class="col-sm-2" style="padding-bottom:5px">
                                <strong>AMOUNT</strong> <br />
                                <span style="font-size:12px"><?php echo "N".number_format($getReservations['amount'],0); ?></span> <br />
                              </div>
                              <div class="col-sm-2" style="padding-bottom:5px">
                                <strong>DATE - TIME: </strong> <br />
                                <span style="font-size:12px"><?php echo date("d/m/Y - H:ia", strtotime($getReservations['resTime'])); ?></span> <br />
                              </div>
                              <div class="col-sm-2" style="padding-bottom:5px">
                                <strong>STATUS: </strong> <br />
                                <span style="font-size:12px"><?php echo $getReservations['resStatus']; ?></span> <br />
                                <?php if($getReservations['resStatus'] == "pending"){ ?> <a href="reservation.php?id=<?php echo $getReservations['resID']; ?>&action=approve"><span style="background:#C49509; padding:1px 4px 1px 4px; font-size:11px; margin-top:15px; color:#fff">Approve</span></a> <?php } ?>
                                <?php if($getReservations['resStatus'] == "approved"){ ?> <a href="reservation.php?id=<?php echo $getReservations['resID']; ?>&action=pend"><span style="background:#C49509; padding:1px 4px 1px 4px; font-size:11px; margin-top:15px; color:#fff">Pend</span></a> <?php } ?>
                                <?php if($getReservations['resStatus'] !== "cancelled"){ ?><a href="reservation.php?id=<?php echo $getReservations['resID']; ?>&action=cancel"><span style="background:#333; padding:1px 4px 1px 4px; font-size:11px; margin-top:15px; color:#fff">Cancel</span></a> <?php } ?>
                              </div>
                            </div>
                            <div class="row" style="background:#f0f0f0; border-bottom:#f0f0f0; padding-top:10px; padding-bottom:10px; margin:1px; margin-bottom:5px">
                              <div class="col-sm-3" style="padding-bottom:5px; margin-top:-10px; padding-top:10px">
                                <strong>BILLING NAME</strong> <br />
                                <span style="font-size:12px"><?php echo $getReservations['firstName']." ".$getReservations['lastName']; ?></span> <br />
                              </div>
                              <div class="col-sm-3" style="padding-bottom:5px">
                                <strong>COMPANY NAME </strong> <br />
                                <span style="font-size:12px"><?php echo $getReservations['companyName']; ?></span>
                              </div>
                              <div class="col-sm-3" style="padding-bottom:5px">
                                <strong>EMAIL</strong> <br />
                                <span style="font-size:12px"><?php echo $getReservations['email']; ?></span> <br />
                              </div>
                              <div class="col-sm-3" style="padding-bottom:5px">
                                <strong>PHONE NO. </strong> <br />
                                <span style="font-size:12px"><?php echo $getReservations['phone']; ?></span> <br />
                              </div>
                            </div>
                            <div class="row" style="background:#f0f0f0; border-bottom:#f0f0f0; padding-top:10px; padding-bottom:10px; margin:1px; margin-bottom:5px">
                              <div class="col-sm-4" style="padding-bottom:5px; margin-top:-10px; padding-top:10px">
                                <strong>ADDRESS</strong> <br />
                                <span style="font-size:12px"><?php echo $getReservations['address'].", ".$getReservations['city'].", ".$getReservations['country']; ?></span> <br />
                              </div>
                              <div class="col-sm-4" style="padding-bottom:5px">
                                <strong>PAYMENT METHOD </strong> <br />
                                <span style="font-size:12px"><?php echo $getReservations['paymentType']; ?></span> <br />
                              </div>
                              <div class="col-sm-4" style="padding-bottom:5px">
                                <strong>OTHER NOTES</strong> <br />
                                <span style="font-size:12px"><?php echo $getReservations['otherNotes']; ?></span>
                              </div>
                            </div>
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
