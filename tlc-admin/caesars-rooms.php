<?php
  $pageType = "adminBackend";
  include '../scss/classes.php';

  if(isset($_GET['room'], $_GET['stats'])){
    if($_GET['stats'] == "on" || $_GET['stats'] == "off"){
      $upRoomStat = $conn->prepare("UPDATE rooms SET promo = ? WHERE roomID = ?");
      $upRoomStat->execute(array($_GET['stats'], $_GET['room']));
      if($upRoomStat){
        header("Location: caesars-rooms.php");
      }
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- TITLE -->
    <title>Hello <?php echo $adminDetails['fname']; ?> | Caesar's by TLC</title>
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
                    <div class="row">

                      <!-- my reservations -->
                      <div class="col-sm-4">
                        <div style="padding:10px; border:#333 thin solid; color:#fff; background:#333" align="center">
                          <?php
                            $getRoomVal->execute(array("1"));
                            $getRoom1 = $getRoomVal->fetch(PDO::FETCH_ASSOC);
                            echo $getRoom1['roomName'];
                          ?>
                        </div>
                        <div style="padding:10px; border:#333 thin solid; color:#333" align="center">
                          <form method="post" action="">
                            <div align="center">
                              <input type="hidden" value="1" name="roomID" />
                              <p>
                                Room Name:
                                <input type="name" name="roomName" value="<?php echo $getRoom1['roomName']; ?>" class="form-control" />
                              </p>
                              <p>
                                Room Rate:
                                <input type="number" name="roomRate" value="<?php echo $getRoom1['roomRate']; ?>" class="form-control" />
                              </p>
                              <p>
                                Promo: <?php if($getRoom1['promo'] == "off"){
                                      echo "<span style='color:red'>OFF</span> <a href='?room=".$getRoom1['roomID']."&stats=on' class='btn btn-success' style='padding:5px'>ON</a>";
                                    } else if($getRoom1['promo'] == "on"){
                                      echo "<span style='color:green'>ON</span> <a href='?room=".$getRoom1['roomID']."&stats=off' class='btn btn-danger' style='padding:5px'>OFF</a>";
                                    }
                                  ?>
                              </p>
                              <input type="submit" name="upRoom" value="Update" class="btn btn-danger form-control" style="padding:5px; border-radius:0px; margin-top:10px" />
                            </div>
                          </form>
                        </div>
                      </div>

                      <div class="col-sm-4">
                        <div style="padding:10px; border:#333 thin solid; color:#fff; background:#333" align="center">
                          <?php
                            $getRoomVal->execute(array("2"));
                            $getRoom1 = $getRoomVal->fetch(PDO::FETCH_ASSOC);
                            echo $getRoom1['roomName'];
                          ?>
                        </div>
                        <div style="padding:10px; border:#333 thin solid; color:#333" align="center">
                          <form method="post" action="">
                            <div align="center">
                              <input type="hidden" value="2" name="roomID" />
                              <p>
                                Room Name:
                                <input type="name" name="roomName" value="<?php echo $getRoom1['roomName']; ?>" class="form-control" />
                              </p>
                              <p>
                                Room Rate:
                                <input type="number" name="roomRate" value="<?php echo $getRoom1['roomRate']; ?>" class="form-control" />
                              </p>
                              <p>
                                Promo: <?php if($getRoom1['promo'] == "off"){
                                      echo "<span style='color:red'>OFF</span> <a href='?room=".$getRoom1['roomID']."&stats=on' class='btn btn-success' style='padding:5px'>ON</a>";
                                    } else if($getRoom1['promo'] == "on"){
                                      echo "<span style='color:green'>ON</span> <a href='?room=".$getRoom1['roomID']."&stats=off' class='btn btn-danger' style='padding:5px'>OFF</a>";
                                    }
                                  ?>
                              </p>
                              <input type="submit" name="upRoom" value="Update" class="btn btn-danger form-control" style="padding:5px; border-radius:0px; margin-top:10px" />
                            </div>
                          </form>
                        </div>
                      </div>

                      <div class="col-sm-4">
                        <div style="padding:10px; border:#333 thin solid; color:#fff; background:#333" align="center">
                          <?php
                            $getRoomVal->execute(array("3"));
                            $getRoom1 = $getRoomVal->fetch(PDO::FETCH_ASSOC);
                            echo $getRoom1['roomName'];
                          ?>
                        </div>
                        <div style="padding:10px; border:#333 thin solid; color:#333" align="center">
                          <form method="post" action="">
                            <div align="center">
                              <input type="hidden" value="3" name="roomID" />
                              <p>
                                Room Name:
                                <input type="name" name="roomName" value="<?php echo $getRoom1['roomName']; ?>" class="form-control" />
                              </p>
                              <p>
                                Room Rate:
                                <input type="number" name="roomRate" value="<?php echo $getRoom1['roomRate']; ?>" class="form-control" />
                              </p>
                              <p>
                                Promo: <?php if($getRoom1['promo'] == "off"){
                                      echo "<span style='color:red'>OFF</span> <a href='?room=".$getRoom1['roomID']."&stats=on' class='btn btn-success' style='padding:5px'>ON</a>";
                                    } else if($getRoom1['promo'] == "on"){
                                      echo "<span style='color:green'>ON</span> <a href='?room=".$getRoom1['roomID']."&stats=off' class='btn btn-danger' style='padding:5px'>OFF</a>";
                                    }
                                  ?>
                              </p>
                              <input type="submit" name="upRoom" value="Update" class="btn btn-danger form-control" style="padding:5px; border-radius:0px; margin-top:10px" />
                            </div>
                          </form>
                        </div>
                      </div>


                    </div>
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
