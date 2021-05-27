<?php
include 'scss/classes.php';

if(!isset($_GET['id'])){ header("Location: index.php"); } else {
    $invoiceData = getInvoice($conn, $_GET['id']);
    if(empty($invoiceData['invoiceID'])){ header("Location: index.php"); }
}

if(isset($_GET['paystack-trxref'])){
  if($_GET['paystack-trxref'] == $_SESSION['rand']){
    $actRes = $conn->prepare("UPDATE invoices SET invoiceStatus = ? WHERE invoiceID = ?");
    $actRes->execute(array("paid",$_GET['id']));
    if($actRes){
      $mail2 = mail("info@thelekkicoliseum.com", "Invoice Payment Notice", "You have a new online payment for Invoice #".$_GET['id'], "FROM: info@thelekkicoliseum.com");
      echo "<script> alert('Thanks! Your payment was successful.'); window.location = 'invoice.php?id=".$_GET['id']."'; </script>";
    } else { echo "<script> alert('Payment was not successful, please try again.'); window.location = 'invoice.php?id=".$_GET['id']."'; </script>"; }
  }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- TITLE -->
    <title>Invoice | The Lekki Coliseum</title>
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
                        <h2>INVOICE #<?php echo $_GET['id']; ?></h2>
                        <p>Amount N<?php echo number_format($invoiceData['invoiceAmount']); ?></p>
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
                              <?php if(!isset($_GET['action'])){ ?>
                                <div class="reservation-chosen-message bg-gray text-center">
                                    <h4>INVOICE #<?php echo $invoiceData['invoiceID']; ?> OVERVIEW</h4>
                                    <p><?php echo "Dear Guest! See below your invoice overview."; ?> </p>
                                    <?php if($invoiceData['invoiceStatus'] !== "unpaid"){ ?>
                                      <p>
                                      <strong> Invoice Amount: N<?php echo number_format($invoiceData['invoiceAmount'])." [".ucfirst($invoiceData['invoiceStatus'])."]"; ?> </strong>
                                      </p>
                                      <p>
                                        <?php echo $invoiceData['invoiceDesc']; ?>
                                      </p>
                                      <a href="index.php" class="awe-btn awe-btn-6">GO HOME</a>
                                    <?php } else { ?>
                                      <p>
                                        <strong> Invoice Amount: N<?php echo number_format($invoiceData['invoiceAmount'])." [".ucfirst($invoiceData['invoiceStatus'])."]"; ?> </strong>
                                      </p>
                                      <p>
                                        <?php echo $invoiceData['invoiceDesc']; ?>
                                      </p>
                                      <a href="?id=<?php echo $_GET['id']; ?>&action=pay" class="awe-btn awe-btn-6">MAKE PAYMENT</a> <a href="index.php" class="awe-btn awe-btn-6">GO HOME</a>
                                    <?php } ?>
                                </div>
                                <?php } else if(isset($_GET['action'])) { if($_GET['action'] == "pay") { ?>
                                  <p align="center">
                                    <strong> Invoice Amount: N<?php echo number_format($invoiceData['invoiceAmount'])." [".ucfirst($invoiceData['invoiceStatus'])."]"; ?> </strong>
                                  </p>
                                  <p align="center">
                                    <?php echo $invoiceData['invoiceDesc']; ?>
                                  </p>
                                  <p align="center"> Please make payment to the account number below. <br /> <strong>Colliseum Courts Cencepts Limited </strong><br />FCMB (USD) - 2130575026<br />FCMB (Naira) - 2130575040<br />Access (Diamond) (Naira) - 0083271321 </p>
                                  <p align="center">
                                    <h4 align="center">OR MAKE PAYMENT USING YOUR CREDIT/DEBIT CARD</h4>
                                    <p align="center">
                                      <?php
                                        $_SESSION['rand'] = rand(1111,9999).rand(33333,88888);
                                      ?>
                                      <form action="invoice.php?id=<?php $_GET['id']; ?>" method="GET"  align="center">
                                        <script
                                          src="https://js.paystack.co/v1/inline.js"
                                          data-key="pk_live_7ff1206e8d94d7d55325cf11032857a0ac03b654"
                                          data-email="bookings@caesarsbytlc.com"
                                          data-amount="<?php echo $invoiceData['invoiceAmount']."00"; ?>"
                                          data-ref="<?php echo $_SESSION['rand']; ?>"
                                        >
                                        </script>
                                      </form>
                                    </p>
                                  </p>
                                <?php } } ?>
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
