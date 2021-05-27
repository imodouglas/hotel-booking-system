<?php
  $pageType = "adminBackend";
  include '../scss/classes.php';

  if(isset($_GET['id'], $_GET['cmd']) && $_GET['cmd'] == "delete"){
      deleteEvent($conn,$_GET['id']);
  }
  
  $getEventsq = $conn->prepare("SELECT * FROM events ORDER BY eventAdded DESC");
  $getEventsq->execute();
  $getEventsct = $getEventsq->rowCount();
  $getEvents = $getEventsq->fetchAll();

  if(isset($_POST['addEvent'])){
    if($_POST['eventPrice'] == ""){ $ePrice = "FREE"; } else { $ePrice = $_POST['eventPrice']; }
    $eventEnd = strtotime("+".$_POST['eventEnd']." days", strtotime($_POST['eventStart']));
    $ins = $conn->prepare("INSERT INTO events(eventName,eventDesc1,eventDesc,eventStart,eventEnd,eventHall,eventPrice,eventStatus,eventAdded) VALUES (?,?,?,?,?,?,?,?,?)");
    $ins->execute(array($_POST['eventName'], $_POST['eventDesc1'], $_POST['eventDesc'], strtotime($_POST['eventStart']), $eventEnd, $_POST['hallID'], $ePrice, "active", time()));
    $eventID = $conn->lastInsertId();
    if(isset($_FILES['eventImg']) && $_FILES['eventImg']['name'] !== ""){
      $imgname = $_FILES['eventImg']['name'];
      $source = $_FILES['eventImg']['tmp_name'];
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

        $ins = $conn->prepare("UPDATE events SET eventImg = ? WHERE eventID = ?");
        $ins->execute(array($imgname, $eventID));
    } else { echo "<script> alert('No Image uploaded'); </script>"; }
      header("location: events.php");
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
                    <div class="row" style="border-bottom:#ccc thin solid">
                        <div id="viewe-title" style="display:block">
                            <h3 style="float:left; margin-right:10px"> SEE ALL EVENTS </h3> <button class="btn btn-primary btn-sm" id="adde-btn" style="border-radius:0px"> ADD AN EVENT </button>
                            <div style="clear:both"></div>
                        </div>
                        <div id="adde-title" style="display:none">
                            <h3 style="float:left; margin-right:10px"> ADD AN EVENTS </h3> <button class="btn btn-primary btn-sm" id="viewe-btn"> VIEW EVENTS </button>
                            <div style="clear:both"></div>
                        </div>
                    </div>

                    <!-- VIEW EVENTS -->
                    <div class="row" style="display:block" id="viewe">
                        <?php if($getEventsct == 0){ echo "<p style='margin-top:10px; color:red'> No event has been added yet. Please add an event. </p>"; } else { foreach($getEvents AS $event){ ?>
                            <div class="col-sm-4" style="padding:5px">
                                <div style="background:#f0f0f0; border:#ccc thin solid; box-shadow:#ccc 0px 0px 4px" align="center">
                                    <img src="../images/<?php echo $event['eventImg']; ?>" style="width:100%; max-height:300px;" />
                                    <div style="padding:10px">
                                        <h4 style="color:#e1bd85"> <?php echo $event['eventName']; ?> </h4>
                                        <p> <i class="fa fa-calendar"></i> <?php echo date("d M", $event['eventStart'])." - ".date("d M", $event['eventEnd']); ?> </p>
                                        <strong style="color:#e1bd85"> <?php if($event['eventPrice'] == "FREE"){ echo $event['eventPrice']; } else { echo "N".number_format($event['eventPrice']); } ?> </strong>
                                        <p> [ <a href="../event.php?id=<?php echo $event['eventID']; ?>" target="_blank"> View </a> ] [ <a href="?id=<?php echo $event['eventID']; ?>&cmd=edit"> Edit </a> ] [ <a href="?id=<?php echo $event['eventID']; ?>&cmd=delete"> Delete </a> ] </p>
                                    </div>
                                </div>
                            </div>
                        <?php } } ?>
                    </div>

                    <!-- ADD EVENT -->
                    <div class="row" style="padding-top:20px; display:none" id="adde">
                        <form method="post" enctype="multipart/form-data" action="">
                            <div class="col-sm-6">
                                <p style="margin-top:10px">
                                    <label> Event Name: </label>
                                    <input type="text" name="eventName" class="form-control" required />
                                </p>
                                <div class="row" style="margin-top:10px">
                                    <div class="col-xs-6">
                                        <label> Start Date: </label>
                                        <input type="date" name="eventStart" class="form-control" required />
                                    </div>
                                    <div class="col-xs-6">
                                        <label> No. of Days: </label>
                                        <input type="number" name="eventEnd" class="form-control" required />
                                    </div>
                                </div>
                                <p style="margin-top:10px">
                                    <label> SELECT HALL: </label>
                                    <select name="hallID" class="form-control">
                                        <option value="Not Set Yet"> Not Set Yet </option>
                                        <?php foreach(getHalls($conn) AS $hall){ echo "<option value='".$hall['hallID']."'>".$hall['hallName']."</option>"; } ?>
                                        <option value="Caesars by TLC"> Caesars by TLC </option>
                                        <option value="Photoscape Studio"> Photoscape Studio </option>
                                    </select>
                                </p>
                                <p style="margin-top:10px">
                                    <label> Event Price(N): <span style="color:red"> - Leave Empty if FREE </span> </label>
                                    <input type="number" name="eventPrice" class="form-control" required />
                                </p>
                                <p style="margin-top:10px">
                                    <label> Short Description (200 words): </label>
                                    <textarea name="eventDesc1" class="form-control" style="height:80px" maxlength="200" required></textarea>
                                </p>
                                <p style="margin-top:10px">
                                    <label> Full Description: </label>
                                    <textarea name="eventDesc" class="form-control" style="height:300px" required></textarea>
                                </p>
                            </div>
                            <div class="col-sm-1"></div>
                            <div class="col-sm-4">
                                <p style="margin-top:10px">
                                    <label> Upload Event Image: </label>
                                    <input type=file name="eventImg" class="form-control" />
                                </p>
                                <p style="margin-top:10px">
                                    <button type="submit" name="addEvent" class="btn" style="background:#e1bd85; color:#fff; border-radius:0px"> ADD EVENT </button>
                                </p>
                            </div>
                        </form>
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
    
    <script>
        $("#adde-btn").click(function(){
            $("#viewe-title").css("display","none");
            $("#viewe").css("display","none");
            $("#adde-title").css("display","block");
            $("#adde").css("display","block");
        });

        $("#viewe-btn").click(function(){
            $("#adde-title").css("display","none");
            $("#adde").css("display","none");
            $("#viewe-title").css("display","block");
            $("#viewe").css("display","block");
        });
    </script>
</body>
</html>
