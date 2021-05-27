<?php
include 'scss/classes.php';
$days = $_SESSION['days'];
$totalPrice = $_SESSION['totalPrice'];

if(isset($_GET['paystack-trxref'])){
  if($_GET['paystack-trxref'] == $_SESSION['rand']){
    $actRes = $conn->prepare("UPDATE reservations SET resStatus = ? WHERE resID = ?");
    $actRes->execute(array("approved",$_SESSION['rID']));
    if($actRes){
      $msg = "Congratulations ".$_SESSION['cofname']."! Your payment was successful. Please see booking details below: \r\n\r\n".$_SESSION['descr']."\r\n\r\nWarm regards,\r\nThe Lekki Coliseum.";
      $mail = mail($_SESSION['ResEmail'], "Successful payment notification!", $msg, "FROM: info@thelekkicoliseum.com");
      $mail2 = mail("info@thelekkicoliseum.com", "Reservation Payment Notice", "You have a new online payment for Reservation No. #".$_SESSION['rID'], "FROM: info@thelekkicoliseum.com");
      header("Location: hall-reservation-step-4.php");
    } else { echo "<script> alert('Payment was not successful, please try again.'); window.location = 'reservation-step-4.php?payment=card'; </script>"; }
  }
}

if(isset($_SESSION['rID'])){
  $getReservationsq = $conn->prepare("SELECT * FROM reservations a JOIN billings b USING(resID) WHERE a.resID = ?");
  $getReservationsq->execute(array($_SESSION['rID']));
  $getReservations = $getReservationsq->fetch(PDO::FETCH_ASSOC);
} else {
  header("Location: reservation.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- TITLE -->
    <title>Hall Reservation | The Lekki Coliseum</title>
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
                        <h2>RESERVATION</h2>
                        <p>Reservation Complete</p>
                    </div>
                </div>

            </div>

        </section>
        <!-- END / SUB BANNER -->

        <!-- RESERVATION -->
        <section class="section-reservation-page bg-white">

            <div class="container">
                <div class="reservation-page">
                    <div class="row">
                        <!-- CONTENT -->
                        <div class="col-md-2"></div>

                        <div class="col-md-8">

                            <div class="reservation_content">
                              <?php if(!isset($_GET['payment'])){ ?>
                                <div class="reservation-chosen-message bg-gray text-center">
                                    <h4>RESERVATION #<?php echo $_SESSION['rID']; ?> OVERVIEW AND ACCOUNT DETAILS</h4>
                                    <p><?php echo "Dear ".$_SESSION['cofname']." ".$_SESSION['colname'].", see below your reservation overview."; ?> </p>
                                    <?php if($getReservations['resStatus'] !== "approved"){ ?>
                                      <p>
                                        <?php echo $days." day(s) in ".$_SESSION['hall'].", from ".date("d M, Y", strtotime($_SESSION['arrival']))." to ".date("d M, Y", strtotime($_SESSION['departure'])).". <br /> Please make payment of the sum of <strong>N".number_format($totalPrice,0)."</strong> to the account number below within 12hours to prevent cancelation of your reservation. <br /><br /> Colliseum Courts Cencepts Limited <br />FCMB (USD) - 2130575026<br />FCMB (Naira) - 2130575040<br />Access (Diamond) (Naira) - 0083271321"; ?>
                                      </p>
                                    <?php } else { ?>
                                      <p>
                                        <?php echo $days." day(s) in ".$_SESSION['hall'].", from ".date("d M, Y", strtotime($_SESSION['arrival']))." to ".date("d M, Y", strtotime($_SESSION['departure'])).". <br /> Thank you for choosing us, we look forward to giving you a lush experience. <br /><strong>Please copy your reservation number for verification purpose on arrival.</strong>"; ?>
                                      </p>
                                    <?php } ?>
                                    <a href="index.php" class="awe-btn awe-btn-6">GO HOME</a>
                                </div>
                              <?php } else if(isset($_GET['payment']) && $_GET['payment'] == "card") { ?>
                                <div class="reservation-chosen-message bg-gray text-center">
                                    <h4>RESERVATION #<?php echo $_SESSION['rID']; ?> OVERVIEW</h4>
                                    <p><?php echo "Dear ".$_SESSION['cofname']." ".$_SESSION['colname'].", see below your reservation overview."; ?> </p>
                                    <p>
                                      <?php echo $days." day(s) in ".$_SESSION['hall'].", from ".date("d M, Y", strtotime($_SESSION['arrival']))." to ".date("d M, Y", strtotime($_SESSION['departure'])).". <br /> Please make payment of the sum of <strong>N".number_format($totalPrice,0)."</strong> with your debit/credit card by clicking the button below."; ?>
                                    </p>
                                    <p>
                                      <?php
                                        $_SESSION['rand'] = rand(1111,9999).rand(33333,88888);
                                      ?>
                                      <form action="transaction.php" method="GET" >
                                        <script
                                          src="https://js.paystack.co/v1/inline.js"
                                          data-key="pk_live_7ff1206e8d94d7d55325cf11032857a0ac03b654"
                                          data-email="<?php echo $_SESSION['ResEmail']; ?>"
                                          data-amount="<?php echo $totalPrice."00"; ?>"
                                          data-ref="<?php echo $_SESSION['rand']; ?>"
                                        >
                                        </script>
                                      </form>
                                    </p>
                                </div>
                              <?php } ?>
                            </div>

                        </div>

                        <div class="col-md-2"></div>
                        <!-- END / CONTENT -->

                    </div>
                </div>
            </div>

        </section>
        <!-- END / RESERVATION -->

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
