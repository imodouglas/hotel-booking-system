<?php
  $pageType = "adminBackend";
  include '../scss/classes.php';

  if(isset($_POST['addInvoice'])){
    $ins = $conn->prepare("INSERT INTO invoices(section,invoiceAmount,invoiceDesc,invoiceTime,invoiceStatus) VALUES (?,?,?,?,?)");
    $ins->execute(array($_POST['section'], $_POST['invoiceAmount'], $_POST['invoiceDesc'], time(), "unpaid"));
    $eventID = $conn->lastInsertId();

    header("location: invoices.php");
  }

  if(isset($_GET['id'], $_GET['cmd']) && $_GET['cmd'] == "delete"){
    $delInvoice = $conn->prepare("DELETE FROM invoices WHERE invoiceID = ?");
    $delInvoice->execute(array($_GET['id']));
    header("Location: invoices.php");
  }

  if(isset($_GET['id'], $_GET['cmd']) && ($_GET['cmd'] == "paid" || $_GET['cmd'] == "unpaid")){
    $delInvoice = $conn->prepare("UPDATE invoices SET invoiceStatus = ? WHERE invoiceID = ?");
    $delInvoice->execute(array($_GET['cmd'],$_GET['id']));
    header("Location: invoices.php");
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
                            <h3 style="float:left; margin-right:10px"> SEE ALL INVOICES </h3> <button class="btn btn-primary btn-sm" id="adde-btn" style="border-radius:0px"> CREATE NEW </button>
                            <div style="clear:both"></div>
                        </div>
                        <div id="adde-title" style="display:none">
                            <h3 style="float:left; margin-right:10px"> CREATE AN INVOICE </h3> <button class="btn btn-primary btn-sm" id="viewe-btn"> VIEW INVOICES </button>
                            <div style="clear:both"></div>
                        </div>
                    </div>

                    <!-- VIEW EVENTS -->
                    <div class="row" style="display:block" id="viewe">
                        <?php if(getInvoicesct($conn) == 0){ echo "<p style='margin-top:10px; color:red'> No invoice has been created yet. Create one by clicking the create new button. </p>"; } else { foreach(getInvoices($conn) AS $invoice){ if($invoice['invoiceStatus'] == "unpaid"){ $scolor = "red"; } else if($invoice['invoiceStatus'] == "paid") { $scolor = "green"; } ?>
                            <div class="col-sm-4" style="padding:5px">
                                <div style="background:#f0f0f0; border:#ccc thin solid; box-shadow:#ccc 0px 0px 4px" align="center">
                                    <div style="padding:10px">
                                        <h4 style="color:#CD8F32"> <?php echo "ID: #".$invoice['invoiceID']; ?> </h4>
                                        <strong style="color:#CD8F32"> <?php  echo "Amount: N".number_format($invoice['invoiceAmount']); ?> </strong>
                                        <p style = "color:<?php echo $scolor; ?>">
                                            <?php echo strtoupper($invoice['invoiceStatus']); ?>
                                        </p>
                                        <p> <i class="fa fa-calendar"></i> <?php echo date("d M, Y - h:ia", $invoice['invoiceTime']); ?> </p>
                                        <div style="padding:10px"> <a href="https://www.thelekkicoliseum.com/invoice.php?id=<?php echo $invoice['invoiceID']; ?>" target="_blank"> www.thelekkicoliseum.com/invoice.php?id=<?php echo $invoice['invoiceID']; ?> </div> 
                                        <p> [ <a href="?id=<?php echo $invoice['invoiceID']; ?>&cmd=delete"> Delete </a> ] [ <a href="?id=<?php echo $invoice['invoiceID']; ?>&cmd=paid"> Paid </a> ] [ <a href="?id=<?php echo $invoice['invoiceID']; ?>&cmd=unpaid"> Unpaid </a> ] </p>
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
                                    <label> Invoice Amount: </label>
                                    <input type="number" name="invoiceAmount" class="form-control" required />
                                </p>
                                <p style="margin-top:10px">
                                    <label> SECTION: </label>
                                    <select name="section" class="form-control">
                                        <option value="Room Booking"> Room Booking </option>
                                        <option value="Hall Booking"> Hall Booking </option>
                                        <option value="Photoscape"> Photoscape Service </option>
                                        <option value="Event Booking"> Event Booking </option>
                                    </select>
                                </p>
                                <p style="margin-top:10px">
                                    <label> Invoice Description: (Please be descriptive) </label>
                                    <textarea name="invoiceDesc" class="form-control" style="height:300px" required></textarea>
                                </p>
                                <p style="margin-top:10px">
                                    <button type="submit" name="addInvoice" class="btn" style="background:#CD8F32; color:#fff; border-radius:0px"> CREATE INVOICE </button>
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
