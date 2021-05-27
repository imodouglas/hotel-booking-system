<header id="header" class="header-v3 clearfix">

    <!-- HEADER TOP -->
    <div class="header_top">
        <div class="container">
            <div class="header_left float-left">
                <span><i class="lotus-icon-location"></i> 14, Providence street, off Admiralty, Lekki phase 1</span>
                <span><i class="lotus-icon-phone"></i> +234 706 185 7472 </span>
            </div>

            <div class="header_right float-right">
                <span class="socials">
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-instagram"></i></a>
                    <!-- <a href="!#"><i class="fa fa-pinterest"></i></a>
                    <a href="!#"><i class="fa fa-tumblr"></i></a> -->
                </span>
                <span class="login-register">
                  <?php if(!isset($_SESSION['tlcAdmin'])){ ?>
                        <a href="index.php">Login</a>
                  <?php } else { echo "<a href='dashboard.php'>Dashboard</a> <a href='logout.php'>Logout</a>"; }?>
                </span>
                <div class="dropdown currency">
                    <span>NGN <i class="fa fa"></i></span>
                    <ul>
                        <li class="active"><a href="#">NGN</a></li>
                        <li><a href="#">USD</a></li>
                    </ul>
                </div>
                <div class="dropdown language">
                    <span>ENG</span>

                    <ul>
                        <li class="active"><a href="#">ENG</a></li>
                        <li><a href="#">FR</a></li>
                    </ul>
                </div>
            </div>
            <!-- HEADER LOGO -->
            <a class="logo-top img-responsive" href="index.php"><img src="../images/logo-header.png" alt=""></a>
            <!-- END / HEADER LOGO -->

        </div>
    </div>
    <!-- END / HEADER TOP -->

    <!-- HEADER LOGO & MENU -->
    <div class="header_content" id="header_content">

        <div class="container">

            <!-- HEADER LOGO -->
            <div class="header_logo">
                <a href="#"><img src="images/logo-header.png" alt=""></a>
            </div>
            <!-- END / HEADER LOGO -->
            <!-- HEADER MENU -->
            <nav class="header_menu">
                <ul class="menu">
                    <?php if(isset($_SESSION['tlcAdmin']) && getUser($conn,$_SESSION['tlcAdmin'])['userPriv'] == "admin"){ ?>
                        <li class="current-menu-item">
                            <a href="dashboard.php">Dashboard</a>
                        </li>
                        <li class="current-menu-item">
                            <a href="caesars-rooms.php">Rooms and Rates</a>
                        </li>
                        <li class="current-menu-item">
                            <a href="photoscape.php">Photoscape</a>
                        </li>
                        <li class="current-menu-item">
                            <a href="halls.php">Halls</a>
                        </li>
                        <li class="current-menu-item">
                            <a href="events.php">Events</a>
                        </li>
                        <li class="current-menu-item">
                            <a href="caesars-homepage.php">Caesars Homepage</a>
                        </li>
                        <li class="current-menu-item">
                            <a href="invoices.php">Invoices</a>
                        </li>
                        <li class="current-menu-item">
                            <a href="search.php">Quick Search</a>
                        </li>
                    <?php } ?>
                    <li class="current-menu-item">
                        <a href="blog.php">Blog</a>
                    </li>
                </ul>
            </nav>
            <!-- END / HEADER MENU -->

            <!-- MENU BAR -->
            <span class="menu-bars">
                    <span></span>
                </span>
            <!-- END / MENU BAR -->

        </div>
    </div>
    <!-- END / HEADER LOGO & MENU -->

</header>
