<?php
  include 'scss/classes.php';
  $Hallsq = $conn->prepare("SELECT * FROM halls");
  $Hallsq->execute();
  $Halls = $Hallsq->fetchAll();
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
                        <h2>Book A Session</h2>
                    </div>
                </div>

            </div>

        </section>
        <!-- END / SUB BANNER -->

        <!-- RESTAURANTS -->
        <section class="section-restaurant-4 bg-white">
            <div class="container">
              <div class="row">
                <div class="col-sm-2" style="margin-bottom:20px; padding-top:20px">

                </div>
                <div class="col-sm-8">
                  <div class="reservation_content" style="margin:0px">
                    <form method="post" action="">
                      <div class="reservation-billing-detail">
                        <h4>BOOKING DETAILS</h4>
                        <?php foreach($getPS AS $getPS){ ?>
                          <input type="hidden" name="<?php echo "ps".$getPS['psID']; ?>" value="<?php echo $getPS['psID']; ?>" />
                          <input type="hidden" name="<?php echo "price".$getPS['psID']; ?>" value="<?php echo $getPS['psPrices']; ?>" />
                          <input type="hidden" name="<?php echo "service".$getPS['psID']; ?>" value="<?php echo $getPS['psServices']; ?>" />
                          <div class="row" style="padding:10px; border-bottom:#ccc thin solid">
                            <div class="col-sm-6"><strong><?php echo $getPS['psServices']; ?></strong><br /><?php echo $getPS['psDescriptions']; ?></div>
                            <div class="col-sm-6"><input type="number" class="form-control" name="<?php echo "qty".$getPS['psID']; ?>" value="0" /></div>
                          </div>
                        <?php } ?>

                        <div class="row">
                            <div class="col-sm-12">
                                <label>Date<sup>*</sup></label>
                                <input type="text" name="arrive" class="awe-calendar from form-control" placeholder="Arrival Date" autocomplete="off" required>
                            </div>
                        </div>
                      </div>
                      <hr />
                      <div class="reservation-billing-detail">
                          <h4>BILLING DETAILS</h4>

                          <div class="row">
                              <div class="col-sm-6">
                                  <label>First Name<sup>*</sup></label>
                                  <input type="text" name="fname" class="input-text" required>
                              </div>
                              <div class="col-sm-6">
                                  <label>Last Name<sup>*</sup></label>
                                  <input type="text" name="lname" class="input-text" required>
                              </div>
                          </div>

                          <label>Company Name</label>
                          <input type="text" name="company" class="input-text">

                          <label>Address<sup>*</sup></label>
                          <input type="text" class="input-text" name="saddress" placeholder="Street Address" required>
                          <br><br>
                          <input type="text" class="input-text" name="apartment" placeholder="Apartment, suite, unit etc. (Optional)">

                          <div class="row">
                              <div class="col-sm-6">
                                  <label>Town / City<sup>*</sup></label>
                                  <input type="text" name="city" required class="input-text">
                              </div>
                              <div class="col-sm-6">
                                  <label>Country<sup>*</sup></label>
                                  <select class="awe-select" name="country">
                                      <?php include 'countries.php'; ?>
                                  </select>
                              </div>
                          </div>

                          <div class="row">
                              <div class="col-sm-6">
                                  <label>Email Address<sup>*</sup></label>
                                  <input type="email" name="email" required class="input-text">
                              </div>
                              <div class="col-sm-6">
                                  <label>Phone<sup>*</sup></label>
                                  <input type="number" name="phone" required class="input-text">
                              </div>
                          </div>
                          <label>Order Notes</label>
                          <textarea class="input-textarea" name="note" placeholder="Notes about your order, eg. special notes for delivery"></textarea>
                          <ul class="option-bank">
                              <li>
                                  <label class="label-radio">
                                      <input type="radio" selected class="input-radio" name="payment" value="card" required checked> Debit/Credit Card
                                  </label>
                                  <p> Make your payment online using your debit/credit card (ATM Card). </p>
                              </li>
                              <li>
                                  <label class="label-radio">
                                      <input type="radio" selected class="input-radio" name="payment" value="transfer" required> Direct Bank Transfer
                                  </label>
                                  <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your booking won’t be approved until the funds have cleared in our account.</p>
                              </li>
                          </ul>
                          <button type="submit" name="reservePS" class="awe-btn awe-btn-13">COMPLETE RESERVATION</button>
                      </div>
                    </form>
                  </div>
                </div>

              </div>
            </div>
        </section>
        <!-- END / RESTAURANTS -->

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
