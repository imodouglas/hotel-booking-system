<?php
  include 'scss/classes.php';
  
  $Halls = getHalls($conn);;

  $rooms = getRooms($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- TITLE -->
    <title>Room Reservation | The Lekki Coliseum</title>
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
                        <h2>Reserve A Hall</h2>
                    </div>
                </div>

            </div>

        </section>
        <!-- END / SUB BANNER -->

        <!-- RESTAURANTS -->
        <section class="section-restaurant-4 bg-white">
            <div class="container">
              <div class="row">
                <div class="col-sm-3" style="margin-bottom:20px; padding-top:20px">
                  
                </div>
                <div class="col-md-6">

                            <div class="reservation_content">

                                <!-- RESERVATION ROOM -->
                                <div class="reservation-room">


                                    <form method="post" action="" id="booking-form">
                                        <div class="reservation-billing-detail">

                                        <!-- <p class="reservation-login">Returning customer? <a href="#">Click here to login</a></p> -->
                                        <h4>CHOOSE ROOM TYPE</h4>
                                        <div class="row">
                                            <div class="col-xs-6" style="background:#e1bd85">
                                                <label style="color:#fff">ROOM TYPE</label>
                                            </div>
                                            <div class="col-xs-6" style="background:#e1bd85">
                                                <label style="color:#fff">NUMBER OF ROOMS</label>
                                            </div>
                                        </div>
                                        <?php  foreach($rooms AS $room){ ?>
                                            <div class="row" style="margin-top:10px">
                                                <div class="col-xs-6">
                                                    <label style="margin-top:7px !important"><?php echo $room['roomName']." (N".number_format($room['roomRate'],0)." /night)"; ?></label>
                                                    <input type="hidden" name="<?php echo "room".$room['roomID']."ID"; ?>" value="<?php echo $room['roomID']; ?>" class="input-text" >
                                                </div>
                                                <div class="col-xs-6">
                                                    <input type="number" name="<?php echo "room".$room['roomID']; ?>" class="input-text" value="0" id="<?php echo "room".$room['roomID']; ?>" required>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        <span style="font-size:12px; color:red" id="room-warning"></span>

                                        <div class="row" style="margin-top:10px">
                                            <div class="col-xs-6">
                                                <label> No. Of Adults <span style="color:red"> * </span> </label>
                                                <select class="awe-select" name="adults" required>
                                                    <option value="">Adults</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>

                                                </select>
                                            </div>
                                            <div class="col-xs-6">
                                                <label> No. Of Children <span style="color:red"> * </span> </label>
                                                <select class="awe-select" name="children" required>
                                                    <option value="0">0</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    <option value="7">7</option>
                                                    <option value="8">8</option>
                                                </select>
                                            </div>
                                        </div>
                                        <h4>BILLING DETAILS</h4>
                                            <div id="bill-form">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <label>First Name<sup>*</sup></label>
                                                        <input type="text" name="fname" class="input-text" <?php if(isset($_SESSION['tlcUser'])){ echo "value='".$userDetails ['fname']."'"; } ?> required>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label>Last Name<sup>*</sup></label>
                                                        <input type="text" name="lname" class="input-text" <?php if(isset($_SESSION['tlcUser'])){ echo "value='".$userDetails ['lname']."'"; } ?> required>
                                                    </div>
                                                </div>

                                                <label>Company Name</label>
                                                <input type="text" name="company" class="input-text" <?php if(isset($_SESSION['tlcUser'])){ echo "value='".$userDetails ['companyName']."'"; } ?>>

                                                <label>Address<sup>*</sup></label>
                                                <input type="text" class="input-text" name="saddress" placeholder="Address" <?php if(isset($_SESSION['tlcUser'])){ echo "value='".$userDetails ['address']."'"; } ?> required>
                                                
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <label>Town / City<sup>*</sup></label>
                                                        <input type="text" name="city" required class="input-text" <?php if(isset($_SESSION['tlcUser'])){ echo "value='".$userDetails ['city']."'"; } ?>>
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
                                                        <input type="email" name="email" required class="input-text" <?php if(isset($_SESSION['tlcUser'])){ echo "value='".$userDetails ['email']."'"; } ?>>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label>Phone<sup>*</sup></label>
                                                        <input type="number" name="phone" required class="input-text" <?php if(isset($_SESSION['tlcUser'])){ echo "value='".$userDetails ['phone']."'"; } ?>>
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

                                                    <!-- <li>
                                                        <label class="label-radio">
                                                            <input type="radio" class="input-radio" name="chose-bank">
                                                            Cheque Payment
                                                        </label>
                                                    </li>

                                                    <li>
                                                        <label class="label-radio">
                                                            <input type="radio" class="input-radio" name="chose-bank">
                                                            Credit Card
                                                        </label>

                                                        <img src="images/icon-card.jpg" alt="">
                                                    </li> -->

                                                </ul>
                                                    <button type="submit" name="placeOrder" class="awe-btn awe-btn-13">COMPLETE RESERVATION</button> <br>
                                                    <span style="font-size:12px; color:red" id="room-warning2"></span>
                                                </div>
                                            </div>
                                    </form>

                                </div>
                                <!-- END / RESERVATION ROOM -->

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

    <script>
        $(document).ready(function(){
            if($("#room1").val() == "0" && $("#room2").val() == "0" && $("#room3").val() == "0"){
                $("#room-warning").html("Please enter a value greater than 0 in a room");
            }
            $("#booking-form").submit(function(){
                if($("#room1").val() < 1 && $("#room2").val() < 1 && $("#room3").val() < 1){
                    $("#room-warning2").html("Please enter a value greater than 0 in a room");
                    return false;
                } else {
                    $("#room-warning2").html("");
                }
            });
            $("#room1").keyup(function(){
                if($("#room1").val() < 1 && $("#room2").val() < 1 && $("#room3").val() < 1){
                    $("#room-warning").html("Please enter a value greater than 0 in a room");
                } else {
                    $("#room-warning").html("");
                }
            });
            $("#room2").keyup(function(){
                if($("#room1").val() < 1 && $("#room2").val() < 1 && $("#room3").val() < 1){
                    $("#room-warning").html("Please enter a value greater than 0 in a room");
                } else {
                    $("#room-warning").html("");
                }
            });
            $("#room3").keyup(function(){
                if($("#room1").val() < 1 && $("#room2").val() < 1 && $("#room3").val() < 1){
                    $("#room-warning").html("Please enter a value greater than 0 in a room");
                } else {
                    $("#room-warning").html("");
                }
            });

            // LOGIN LINK
            $("#login-link").click(function(){
                $("#login-form").toggle();
            });
        });
    </script>
</body>
</html>
