<?php
    session_start();

    if(isset($_POST['regEvent'])){
        $_SESSION['ResEmail'] = $_POST['email'];
        $_SESSION['ResName'] = $_POST['fullName'];
        $msg1 = "Thank you ".$_POST['fullName']." for registering! \r\n\r\nHowever, if you havent made payment yet, your registration is still incomplete. \r\nTo complete your regsitration, please click on the link to make payment.\r\n\r\nRegards!\r\nTLC Event Team.";
        $msg2 = "Hello Admin! You have a new registration for the Digital Marketing Weekend Diet event. \r\n\r\nPlease see details below:\r\nName: ".$_POST['fullName']."\r\nEmail: ".$_POST['email']."\r\nPhone No.: ".$_POST['phoneNo'].". \r\n\r\nPlease cross-check details with paystack to confirm payment status.\r\n\r\nFrom: Event Registration Form";

        mail($_POST['email'], "Digital Marketing Weekend Diet Registation", $msg1, "FROM: booking@caesarsbytlc.com");
        mail("booking@caesarsbytlc.com", "New Digital Marketing Weekend Diet Registation", $msg2, "FROM: booking@caesarsbytlc.com");

        header("Location: ?step=2#payment");
    }

    if(isset($_GET['paystack-trxref'])){
        if($_GET['paystack-trxref'] == $_SESSION['rand']){
          mail($_SESSION['ResEmail'], "Registration Complete!", "Hello ".$_SESSION['ResName']."! \r\nYour registration is complete, you will be notified on updates. We look forward to seeing you at the event. \r\n\r\nRegards!\r\nTLC Event Team.", "FROM: booking@caesarsbytlc.com");
          echo "<script> alert('Payment was successful'); window.location = 'digital-marketing-weekend-diet.php'; </script>";
        } else {
            echo "<script> alert('Payment was not successful, please try again.'); window.location = 'digital-marketing-weekend-diet.php'; </script>";
        }
      }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- TITLE -->
    <title>Digital Marketing Weekend Diet | The Lekki Coliseum</title>
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
                        <h2>Digital Marketing Weekend Diet</h2>
                        <p>Have a refreshing weekend while you learn.</p>
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
                    <div class="about-item">

                        <div class="img owl-single">
                            <img src="images/dmwd.jpg" alt="">
                        </div>

                        <div class="text" style="margin-top:20px">
                            <div class="desc" align="left">
                                <?php if(!isset($_GET['step'])){ ?>
                                <h2 align="left" style="margin-bottom:20px; color:#C48931"> Register Now! </h2>
                                <form method="post" action="">
                                    <p align="left">
                                        <label> Full Name:<span style="color:red">*</span></label>
                                        <input type="text" name="fullName" class="form-control" required />
                                    </p>
                                    <p align="left">
                                        <label> Email:<span style="color:red">*</span> </label>
                                        <input type="email" name="email" class="form-control" required />
                                    </p>
                                    <p align="left">
                                        <label> Phone No.:<span style="color:red">*</span> </label>
                                        <input type="number" name="phoneNo" class="form-control" />
                                    </p>
                                    <p align="left">
                                        <label> Event Name: </label>
                                        <input type="text" name="event" value="Digital Marketing Weekend Diet" class="form-control" readonly />
                                    </p>
                                    <p align="left">
                                        <input type="submit" name="regEvent" value="REGISTER" class="btn btn-primary" style="border-radius:0px; background:#C48931; border:#C48931 thin solid" />
                                    </p>
                                </form>
                                <?php } else if(isset($_GET['step']) && $_GET['step'] == 2){ ?>
                                    <h2 align="left" style="margin-bottom:20px; color:#C48931" id="payment"> Complete Your Registration! </h2>
                                    <?php $_SESSION['rand'] = rand(1111,9999).rand(33333,88888); ?>
                                    <form action="reservation-step-4.php" method="GET" >
                                        <script
                                            src="https://js.paystack.co/v1/inline.js"
                                            data-key="pk_live_7ff1206e8d94d7d55325cf11032857a0ac03b654"
                                            data-email="<?php echo $_SESSION['ResEmail']; ?>"
                                            data-amount="<?php echo "1000000.00"; ?>"
                                            data-ref="<?php echo $_SESSION['rand']; ?>"
                                        >
                                        </script>
                                    </form>
                                <?php } ?>
                            </div>
                        </div>

                    </div>
                    <!-- END / ITEM -->



                </div>

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
