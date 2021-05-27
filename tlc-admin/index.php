<?php include '../scss/classes.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- TITLE -->
    <title>Login | Caesar's by TLC</title>
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
        <section class="section-account parallax" style="background: url('../images/banner/bgimg-14.jpg'); background-size: cover;">
            <div class="awe-overlay"></div>
            <div class="container">
                <div class="login-register">
                    <div class="text text-center">
                        <h2>WELCOME ADMIN!</h2>
                        <p>Login to manage Caesar's by TLC admin</p>
                        <form action="" class="account_form" method="post">
                            <div class="field-form">
                                <input type="text" name="uname" class="field-text" placeholder="Username" required>
                            </div>
                            <div class="field-form">
                                <input type="password" name="pword" class="field-text" placeholder="Password" required>
                                <span class="view-pass"><i class="lotus-icon-view"></i></span>
                            </div>
                            <div class="field-form field-submit">
                                <button type="submit" name="alogin" class="awe-btn awe-btn-13">Login</button>
                            </div>
                            <span class="account-desc">I am not an admin - [<a href="../login.php">Sign in as guest</a>] </span>
                        </form>
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
