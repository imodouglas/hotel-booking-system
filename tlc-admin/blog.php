<?php
  $pageType = "adminBackend";
  include '../scss/classes.php';

  if(isset($_GET['id'], $_GET['cmd']) && $_GET['cmd'] == "delete"){
    deletePost($conn,$_GET['id']);
  }

  $adminData = getUser($conn,$_SESSION['tlcAdmin']);
  
  $getPostsq = $conn->prepare("SELECT * FROM posts ORDER BY postAdded DESC");
  $getPostsq->execute();
  $getPostsct = $getPostsq->rowCount();
  $getPosts = $getPostsq->fetchAll();

  if(isset($_POST['addPost'])){
    $slug = explode(" ",$_POST['postName']);
    $slug = implode("-",$slug);
    $slug = strtolower($slug);
    $ins = $conn->prepare("INSERT INTO posts(postName,postSlug,postDesc1,postDesc,postStatus,postAdded,postedBy) VALUES (?,?,?,?,?,?,?)");
    $ins->execute(array($_POST['postName'], $slug, $_POST['postDesc1'], $_POST['postDesc'], "active", time(), $adminDetails['uname']));
    $postID = $conn->lastInsertId();
    if(isset($_FILES['postImg']) && $_FILES['postImg']['name'] !== ""){
      $imgname = $_FILES['postImg']['name'];
      $source = $_FILES['postImg']['tmp_name'];
      $ext = explode(".",$imgname);
      $ext = end($ext);

        $imgname = time().rand(1111,9999).".".$ext;
        $target = "../images/".$imgname;
        move_uploaded_file($source, $target);

        $imagepath = $imgname;
        $feat1 = "../images/".$imagepath; //This is the new file you saving

        list($width, $height) = getimagesize($feat1) ;

        $modwidth = 600;

        $diff = $width / $modwidth;

        $modheight = $height / $diff;
        $tn = imagecreatetruecolor($modwidth, $modheight) ;
        if(strtolower($ext) == "jpg" || strtolower($ext) == "jpeg"){
          $image = imagecreatefromjpeg($feat1);
        } else if(strtolower($ext) == "png"){
          $image = imagecreatefrompng($feat1);
        } else if(strtolower($ext) == "gif"){
          $image = imagecreatefromgif($feat1);
        }
        imagecopyresampled($tn, $image, 0, 0, 0, 0, $modwidth, $modheight, $width, $height);

        imagejpeg($tn, $feat1, 100) ;

        $ins = $conn->prepare("UPDATE posts SET postImg = ? WHERE postID = ?");
        $ins->execute(array($imgname, $postID));
    } else { echo "<script> alert('No Image uploaded'); </script>"; }
      header("location: blog.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- TITLE -->
    <title>Hello <?php echo $adminDetails['fname']; ?> | The Lekki Coliseum </title>
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
                    
                    <!-- VIEW postS -->
                    <?php if(!isset($_GET['cmd'])){ ?>
                        <div id="viewe-title" style="display:block">
                            <h3 style="float:left; margin-right:10px"> SEE ALL POSTS </h3> <a href="?cmd=add" class="btn btn-primary btn-sm" id="adde-btn" style="border-radius:0px"> ADD A POST </a>
                            <div style="clear:both"></div>
                        </div>
                        <div class="row" style="display:block" id="viewe">
                            <?php if($getPostsct == 0){ echo "<p style='margin-top:10px; color:red'> No post has been added yet. Please add an post. </p>"; } else { foreach($getPosts AS $post){ ?>
                                <div class="col-sm-4" style="padding:5px">
                                    <div style="background:#f0f0f0; border:#ccc thin solid; box-shadow:#ccc 0px 0px 4px" align="center">
                                        <img src="../images/<?php echo $post['postImg']; ?>" style="width:100%; max-height:300px;" />
                                        <div style="padding:10px">
                                            <h4 style="color:#e1bd85"> <?php echo $post['postName']; ?> </h4>
                                            <p> <?php echo $post['postDesc1']; ?> </p>
                                            <p> [ <a href="../blog.php?p=<?php echo $post['postID']; ?>" target="_blank"> View </a> ] [ <a href="?id=<?php echo $post['postID']; ?>&cmd=edit"> Edit </a> ] [ <a href="?id=<?php echo $post['postID']; ?>&cmd=delete"> Delete </a> ] </p>
                                            <p style="color:#D1A04C"> <i class="fa fa-calendar"></i> <?php echo date("d M, Y", $post['postAdded']); ?> </p>
                                        </div>
                                    </div>
                                </div>
                            <?php } } ?>
                        </div>
                    <?php } ?>

                    <!-- ADD post -->
                    <?php if(isset($_GET['cmd']) && $_GET['cmd']=="add"){ ?>
                        <div id="adde-title">
                            <h3 style="float:left; margin-right:10px"> ADD A POSTS </h3> <a href="blog.php" class="btn btn-primary btn-sm" id="viewe-btn"> VIEW POSTS </a>
                            <div style="clear:both"></div>
                        </div>
                        <div class="row" style="padding-top:20px;" id="adde">
                            <form method="post" enctype="multipart/form-data" action="">
                                <div class="col-sm-6">
                                    <p style="margin-top:10px">
                                        <label> Post Name: </label>
                                        <input type="text" name="postName" class="form-control" required />
                                    </p>
                                    <p style="margin-top:10px">
                                        <label> Short Description (200 words): </label>
                                        <textarea name="postDesc1" class="form-control" style="height:80px" maxlength="200" required></textarea>
                                    </p>
                                    <p style="margin-top:10px">
                                        <label> Full Description: </label>
                                        <textarea name="postDesc" class="form-control" style="height:300px" required></textarea>
                                    </p>
                                </div>
                                <div class="col-sm-1"></div>
                                <div class="col-sm-4">
                                    <p style="margin-top:10px">
                                        <label> Upload Post Image: </label>
                                        <input type=file name="postImg" class="form-control" />
                                    </p>
                                    <p style="margin-top:10px">
                                        <button type="submit" name="addPost" class="btn" style="background:#e1bd85; color:#fff; border-radius:0px"> ADD post </button>
                                    </p>
                                </div>
                            </form>
                        </div>
                    <?php } ?>
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
