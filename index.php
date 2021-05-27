<?php
    include 'scss/classes.php';

    if(isset($_POST['reserve'])){
        $_SESSION['arrive'] = $_POST['arrive'];
        $_SESSION['departure'] = $_POST['departure'];
        $_SESSION['section'] = $_POST['section'];
        $_SESSION['subsection'] = $_POST['subsection'];

        if($_POST['section'] == "rooms"){ header("Location: room-reservation.php"); }
        else if($_POST['section'] == "halls"){ header("Location: hall-reservation.php?id=".$_POST['subsection']); }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- TITLE -->
    <title>Welcome to The Lekki Coliseum</title>
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

        <!-- BANNER SLIDER -->
        <section class="section-slider">
            <h1 class="element-invisible">TLC Home Slider</h1>
            <div id="slider-revolution">

                <ul>
                    <li data-transition="fade">

                        <img src="images/slider/img-1.jpg" data-bgposition="center" data-duration="14000" data-bgpositionend="right center" alt="">
                        <div style="clear:both; padding-top:50px">
                        </div>
                        <div class="tp-caption sft fadeout slider-caption-sub slider-caption-1" data-x="center" data-y="100" data-speed="700" data-start="1500" data-easing="easeOutBack">
                         <img src="images/slider/hom1-slide1.png" alt="icons">
                        </div>

                        <div class="tp-caption sft fadeout slider-caption-sub slider-caption-1" data-x="center" data-y="240" data-speed="700" data-start="1500" data-easing="easeOutBack">
                         WELCOME TO
                        </div>

                        <div class="tp-caption sfb fadeout slider-caption slider-caption-sub-1" data-x="center" data-y="280" data-speed="700" data-easing="easeOutBack"  data-start="2000">THE LEKKI COLISEUM</div>
                        <div class="tp-caption sfb fadeout slider-caption slider-caption-sub-1"  data-x="center" data-y="380" data-speed="700" data-easing="easeOutBack"  data-start="2200">
                          <a href="about.php" class="awe-btn awe-btn-12 awe-btn-slider">TAKE A TOUR</a>
                        </div>

                    </li>

                    <li data-transition="fade">

                        <img src="images/slider/img-2.jpg" data-bgposition="center" data-duration="14000" data-bgpositionend="right center" alt="">
                        <div style="padding-top:50px">
                        </div>

                        <div class="tp-caption sft fadeout" data-x="center" data-y="195" data-speed="700" data-start="1300" data-easing="easeOutBack">
                          <img src="images/icon-slider-1.png" alt="">
                        </div>

                        <div class="tp-caption sft fadeout slider-caption-sub slider-caption-sub-3" data-x="center" data-y="220" data-speed="700" data-start="1500" data-easing="easeOutBack">
                           EACH EXPERIENCE IS
                        </div>

                        <div class="tp-caption sfb fadeout slider-caption slider-caption-3" data-x="center" data-y="260" data-speed="700" data-easing="easeOutBack"  data-start="2000">
                            100% UNIQUE
                        </div>

                        <div class="tp-caption sfb fadeout slider-caption-sub slider-caption-sub-3" data-x="center" data-y="365" data-easing="easeOutBack" data-speed="700" data-start="2200">JUST FOR YOU</div>

                        <div class="tp-caption sfb fadeout slider-caption-sub slider-caption-sub-3" data-x="center" data-y="395" data-easing="easeOutBack" data-speed="700" data-start="2400"><img src="images/icon-slider-2.png" alt=""></div>
                    </li>

                </ul>
            </div>

        </section>
        <!-- END / BANNER SLIDER -->

        <!-- CHECK AVAILABILITY -->
        <section class="section-check-availability">
            <div class="container">
                <div class="check-availability">
                    <div class="row">
                        <div class="col-lg-3">
                            <h2>MAKE RESERVATION</h2>
                        </div>
                        <div class="col-lg-9">
                            <form action="" method="post">
                                <div class="availability-form">
                                    <input type="text" name="arrive" class="awe-calendar from" placeholder="Arrival Date" autocomplete="off" required>
                                    <input type="number" name="departure" class="awe-calendar" placeholder="No. of Days" autocomplete="off" required>
                                    <select class="awe-select" name="section" required id="section" style="color:#999">
                                        <option>Section</option>
                                        <option value="rooms">Room Booking</option>
                                        <option value="halls">Hall Booking</option>
                                        <!-- <option value="restaurant">Restaurant</option> -->
                                    </select>
                                    <div class="btn-group bootstrap-select awe-select">
                                        <select class="btn dropdown-toggle btn-default" name="subsection" required id="subsection" style="color:#999">
                                            <option value="all"> <span class="text"> Sub Section </span> </option>
                                        </select>
                                    </div>
                                    <!-- <select class="btn-group bootstrap-select awe-select" name="customer-type" required id="subsection">
                                        <option value="all">Sub Section</option>
                                    </select> -->
                                    <div class="vailability-submit">
                                        <button type="submit" name="reserve" class="awe-btn awe-btn-13">MAKE RESERVATION</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- END / CHECK AVAILABILITY -->

        <!-- ACCOMD ODATIONS -->
        <section class="section-accomd awe-parallax bg-14">
            <div class="container">
                <div class="accomd-modations">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="accomd-modations-header">
                                <h2 class="heading">ROOMS & RATES</h2>
                                <img src="images/icon-accmod.png" alt="icon">
                                <p>Enjoy lush comfort at Caesars by TLC at the best rates possible.</p>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="accomd-modations-content owl-single">

                                <div class="row">

                                    <!-- ITEM -->
                                    <div class="col-xs-4">
                                        <div class="accomd-modations-room">
                                            <div class="img">
                                                <a href="#"><img src="images/room/img-1.jpg" alt=""></a>
                                            </div>
                                            <div class="text">
                                                <h2><a href="#">King Classic</a></h2>
                                                <p class="price">
                                                    <span class="amout">N45,000</span>/night
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END / ITEM -->

                                    <!-- ITEM -->
                                    <div class="col-xs-4">
                                        <div class="accomd-modations-room">
                                            <div class="img">
                                                <a href="#"><img src="images/room/img-3.jpg" alt=""></a>
                                            </div>
                                            <div class="text">
                                                <h2><a href="#">King Deluxe</a></h2>
                                                <p class="price">
                                                    <span class="amout">N55,000</span>/night
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END / ITEM -->

                                    <!-- ITEM -->
                                    <div class="col-xs-4">
                                        <div class="accomd-modations-room">
                                            <div class="img">
                                                <a href="#"><img src="images/room/img-2.jpg" alt=""></a>
                                            </div>
                                            <div class="text">
                                                <h2><a href="#">King Executive</a></h2>
                                                <p class="price">
                                                    <span class="amout">N65,000</span>/night
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END / ITEM -->

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
        <!-- END / ACCOMD ODATIONS -->

        <!-- ABOUT -->
        <section style="padding-top:40px; padding-bottom:50px; background:#000">
            <div class="container">
                <div class="home-about">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="img">
                                <a href="#"><img src="images/about-us.jpg" alt=""></a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="text">
                                <h2 class="heading" style="color:#fff">ABOUT US</h2>
                                <span class="box-border"></span>
                                <p style="color:#fff">Dubbed the entertainment hub of Lagos. It is known for its ever glowing energy. Round the clock lounge, E11EVEN and several entertainment facilities that plays host to thousands of visitors from across the country yearly.</p>
                                  <p style="color:#fff">Newly opened at the Lekki Coliseum is the luxurious CAESAR’S HOTEL. Also famous for the event arcades, THE IMPERIAL & SKYVIEW, THE VIEW RESTAURANT & OUTDOOR PATIO and CINEMA AT TLC.</p>
                                <a href="about.php" class="awe-btn awe-btn-default" style="color:#fff; border:#fff thin solid">KNOW MORE</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- END / ABOUT -->

        <!-- CINEMA AND RESTAURANT -->
        <section class="bg-white" style="padding-top: 40px; padding-bottom:50px">
            <div class="container">

                <div class="our-best">
                    <div class="row">
                        <!-- CINEMA CINEMA -->
                        <div class="col-md-6 col-md-push-6">
                            <div class="img">
                                <img src="images/maturion.jpg" alt="">
                            </div>
                            <div class="text">
                                <h2 class="heading">CINEMA AT TLC</h2>
                                <span class="box-border"></span>
                                <p>With comfortable plush sitting and Gourmet food and drinks, Cinema at TLC delivers one of the most luxurious movie watching experience. Beyond upgrades to the projector themselves, the most dominant trend in the evolution of this movie theater is ability to order food and drinks from the comfort of your HOME.</p>
                                <p>
                                  <a href="cinema-at-tlc.php" class="awe-btn awe-btn-default">SEE WHAT'S SHOWING</a>
                                </p>
                            </div>
                        </div>

                        <!-- RESTAURANT -->
                        <div class="col-md-6 col-md-pull-6">
                          <div class="img">
                              <a href="#"><img src="images/restaurant.jpg" alt=""></a>
                          </div>
                          <div class="text">
                              <h2 class="heading">THE VIEW RESTAURANT</h2>
                              <span class="box-border"></span>
                              <p>The View restaurant takes a different approach to dining than most restaurants. Each meal is carefully designed and constructed as though by an engineer rather than a chef. The dishes @ THE VIEW are designed to take full advantage of each ingredient, with those ingredients being carefully selected to provide the diner with the utmost dining experience.</p>
                              <p>The exclusivity of THE VIEW RESTAURANT is evident from the moment you walk through the doors... <em>"that is if you can get a reservation".</em> </p>
                              <p> <a href="restaurant.php" class="awe-btn awe-btn-default">MAKE RESERVATION</a> </p>
                          </div>
                        </div>

                    </div>
                </div>

            </div>
        </section>
        <!-- END / MATURION AND RESTAURANT -->

        <!-- SKYVIEW AND IMPERIAL -->
        <section class="bg-white" style="padding-bottom:50px">
            <div class="container">

                <div class="our-best">
                    <div class="row">
                        <!-- SKYVIEW -->
                        <div class="col-md-6 col-md-push-6">
                            <div class="img">
                                <img src="images/skyview.jpg" alt="">
                            </div>
                            <div class="text">
                                <h2 class="heading">SKYVIEW {EVENT & LOUNGES}</h2>
                                <span class="box-border"></span>
                                <p>How would you like to be sipping on a cocktail whilst taking in a panoramic view of the ocean and the island? Events from 26meters above ground level. Skyview is one of the most atmospheric and fascinating events & lounge bar in Lagos. With a sitting capacity of 500 – 700 indoor and outdoor, making us a fantastic venue for entertainment. From parties and receptions to telescope viewings, in house grill hub and our static BLU bar.</p>
                                <p>
                                  <a href="skyview.php" class="awe-btn awe-btn-default">RESERVE HALL</a>
                                </p>
                            </div>
                        </div>

                        <!-- RESTAURANT -->
                        <div class="col-md-6 col-md-pull-6">
                          <div class="img">
                              <a href="#"><img src="images/imperial.jpg" alt=""></a>
                          </div>
                          <div class="text">
                              <h2 class="heading">IMPERIAL {EVENT ARCADE}</h2>
                              <span class="box-border"></span>
                              <p>AT THE IMPERIAL {Event Arcade} <br /> With a sitting capacity of 1500 {Banquet style} and 2000 {theatre setting}. An upper floor gallery that comfortably sits 300. Elevated stage with non reflective movie screen and e-projector, hi-fi stereo loudspeakers with factory fitted all surround sound effect and high sensory lights. This distinct venue boasts of 500 cars parking facility including 6 executive parking and facility to park the host right inside the hall. The ambience of the imperial is the perfect venue for receptions, art exhibition, fashion shows, concerts etc. An Avant Garde experience in event staging. Facilities to host all events are standard. </p>
                              <p> <a href="imperial.php" class="awe-btn awe-btn-default">RESERVE HALL</a> </p>
                          </div>
                        </div>

                    </div>
                </div>

            </div>
        </section>
        <!-- END / SKYVIEW AND IMPERIAL -->

        <!-- POOLSIDE, PHOTOSCAPE AND E11EVEN -->
        <section class="bg-white" style="padding-bottom:50px">
            <div class="container">

                <div class="our-best">
                    <div class="row">
                        <!-- E11EVEN -->
                        <div class="col-md-4">
                            <div class="img">
                                <img src="images/e11even.jpg" alt="">
                            </div>
                            <div class="text">
                                <h2 class="heading">E11EVEN</h2>
                                <span class="box-border"></span>
                                <p>One of the most dazzling and spectacular bars in Lagos, one is awed into silence by the framework of this spherically appealing bar with ultra seductive chaises and lounge sofas looking across the city in resplendent glory</p>
                                <p>
                                  <a href="e11even.php" class="awe-btn awe-btn-default">DISCOVER</a>
                                </p>
                            </div>
                        </div>

                        <!-- THE POOLSIDE -->
                        <div class="col-md-4">
                          <div class="img">
                              <a href="#"><img src="images/poolside.jpg" alt=""></a>
                          </div>
                          <div class="text">
                              <h2 class="heading">THE POOLSIDE</h2>
                              <span class="box-border"></span>
                              <p> Nothing gets you hankering for a time out other than the hotel poolside. The anticipation of weightlessness, of cool water caressing warm skin of sun and skin reflected across the surface. </p>
                              <p> <a href="poolside.php" class="awe-btn awe-btn-default">DISCOVER</a> </p>
                          </div>
                        </div>

                        <div class="col-md-4">
                          <div class="img">
                              <a href="#"><img src="images/photoscape.jpg" alt=""></a>
                          </div>
                          <div class="text">
                              <h2 class="heading">PHOTOSCAPE</h2>
                              <span class="box-border"></span>
                              <p> We want to appear as mature, thoughtful, value adding brand with a touch of whimsical…. With respectful interactions following acceptable rules of decorum and good conduct in the photography industry. </p>
                              <p> <a href="photoscape.php" class="awe-btn awe-btn-default">CONTACT US</a> </p>
                          </div>
                        </div>

                    </div>
                </div>

            </div>
        </section>
        <!-- END / POOLSIDE, PHOTOSCAPE AND E11EVEN -->

        <!-- EVENTS & DEALS -->
        <?php include 'scss/events-deals.php'; ?>

        <!-- HOME GUEST BOOK -->
        <div class="section-home-guestbook awe-parallax bg-13">
            <div class="container">
                <div class="home-guestbook">
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <div class="guestbook-content owl-single">

                                <!-- ITEM -->
                                <div class="guestbook-item">
                                    <div class="img">
                                        <img src="images/avatar/img-5.jpg" alt="">
                                    </div>

                                    <div class="text">
                                        <p>This is the only place to stay in Lekki! I have stayed in the cheaper hotels and they were fine, but this is just the icing on the cake! After spending the day in hectic meetings to come back and enjoy a glass of wine while enjoying the view from my window.</p>
                                        <span><strong>Alice Matama</strong></span><br>
                                        <span>From Pretoria, South Africa</span>
                                    </div>
                                </div>
                                <!-- ITEM -->

                                <!-- ITEM -->
                                <div class="guestbook-item">
                                    <div class="img">
                                        <img src="images/avatar/img-6.jpg" alt="">
                                    </div>

                                    <div class="text">
                                        <p>I had an awesome experience at the Maturion Cinema after I had the buffet with my fiancee. The treatment was classy and I can't forget the warm feeling hanging out at the poolside, simply refreshing.</p>
                                        <span><strong>Derek Ikpe</strong></span><br>
                                        <span>From Abuja, Nigeria</span>
                                    </div>
                                </div>
                                <!-- ITEM -->

                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
        <!-- END / HOME GUEST BOOK -->

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
    <!-- validate -->
    <script type="text/javascript" src="js/lib/jquery.form.min.js"></script>
    <script type="text/javascript" src="js/lib/jquery.validate.min.js"></script>
    <!-- Custom jQuery -->
    <script type="text/javascript" src="js/scripts.js"></script>
    <script>
        $("#section").change(function(){
                var table = $("#section").val();
                var sajax = new XMLHttpRequest();
                var surl = "scss/sub-sections.php?sec="+table;

                sajax.open("POST", surl, true);
                sajax.send();

                sajax.onreadystatechange = function(){
                    if(this.readystate = 4 && this.status == 200){
                        var sdata = JSON.parse(this.responseText);
                        console.log(sdata);

                        if($("#section").val() == "rooms"){
                            var output = "";
                            for(var i = 0; i < sdata.length; i++){
                                var roomID = sdata[i].roomID;
                                var roomName = sdata[i].roomName;
                                output += "<option value = '"+roomID+"'>"+ roomName +"<option>";
                                $("#subsection").html(output);
                            }
                        }

                        else if($("#section").val() == "halls"){
                            var output = "";
                            for(var i = 0; i < sdata.length; i++){
                                var hallID = sdata[i].hallID;
                                var hallName = sdata[i].hallName;
                                output += "<option value = '"+hallID+"'>"+ hallName +"<option>";
                                $("#subsection").html(output);
                            }
                        }
                    }
                }
            });
    </script>
</body>
</html>
