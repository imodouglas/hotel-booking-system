<?php
  include 'scss/classes.php';

  $getPostsq = $conn->prepare("SELECT * FROM posts ORDER BY postAdded DESC");
  $getPostsq->execute();
  $getPostsct = $getPostsq->rowCount();
  $getPosts = $getPostsq->fetchAll();

  if(isset($_GET['p'])){
    $postData = getPost($conn, $_GET['p']);
    $pageTitle = $postData['postName'];
    $url = "www.".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
  } else {
    $pageTitle = "TLC Blog | Know what's happening in The Lekki Coliseum";
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- TITLE -->
    <title> <?php echo $pageTitle; ?> | The Lekki Coliseum </title>
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
                        <?php if(!isset($_GET['p'])){ ?>
                            <h2>TLC NEWS BOARD</h2>
                            <p> Stay in touch with latest information from us. </p>
                        <?php } else { ?>
                            <h2> <?php echo $postData['postName']; ?> </h2>
                            <p> <i class="fa fa-calendar"></i> <?php echo date("d M, Y", $postData['postAdded']); ?> &nbsp; | &nbsp; <i class="fa fa-user"></i> TLC Admin </p>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </section>
        <!-- END / SUB BANNER -->

        <!-- ABOUT -->
        <section class="section-about">
            <div class="container">
                <?php if(!isset($_GET['p'])){ ?>
                    <?php if($getPostsct == 0){ echo "<p style='margin-top:10px;'> No blog post has been added yet. </p>"; } else { foreach($getPosts AS $posts){ ?>
                        <div class="col-sm-4" style="padding:5px">
                            <div style="background:#000; border:#ccc thin solid;" align="center">
                                <img src="images/<?php echo $posts['postImg']; ?>" style="width:100%; max-height:300px;" />
                                <div style="padding:10px">
                                    <h4 style="color:#D1A04C; margin-bottom:20px"> <?php echo $posts['postName']; ?> </h4>
                                    <p style="color:#fff"> <?php echo $posts['postDesc1']; ?> </p>
                                    <strong style="color:#D1A04C"> [ <a href="blog.php?p=<?php echo $posts['postID']; ?>" style="color:#fff"> Read More </a> ] </strong>
                                    <p style="color:#D1A04C; margin-top:20px"> <i class="fa fa-calendar"></i> <?php echo date("d M, Y", $posts['postAdded']); ?> </p>
                                </div>
                            </div>
                        </div>
                    <?php } } ?>
                <?php } else { ?>
                    <div style="padding:15px">
                        <?php if($postData['postImg'] !== ""){ echo "<img src='images/".$postData['postImg']."' align='left' style='width:100%; max-width:500px; margin-right:10px; margin-bottom:20px;' />"; } ?>
                        <p> <?php echo nl2br($postData['postDesc']); ?> </p>
                        <div id="share">
                            <h3> Share This With Friends </h3>
                            <!-- facebook -->
                            <a class="facebook" href="https://www.facebook.com/share.php?u=<?php echo $url; ?>&title=<?php echo $postData['postName']; ?>" target="blank"><i class="fa fa-facebook"></i></a> 

                            <!-- twitter -->
                            <a class="twitter" href="https://twitter.com/intent/tweet?status=<?php echo $postData['postName']; ?>+<?php echo $url; ?>" target="blank"><i class="fa fa-twitter"></i></a>

                            <!-- google plus -->
                            <a class="googleplus" href="https://plus.google.com/share?url=<?php echo $url; ?>" target="blank"><i class="fa fa-google-plus"></i></a>

                            <!-- linkedin -->
                            <a class="linkedin" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo $url; ?>&title=<?php echo $postData['postName']; ?>&source=<?php echo $url; ?>" target="blank"><i class="fa fa-linkedin"></i></a>
                            
                            
                        </div>
                    </div>
                <?php } ?>

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
