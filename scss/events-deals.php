<section class="section-event-restaurant bg-18" style="background:#000">


            <div class="container">
                <div class="event-restaurant">
                    <div class="row">
                        <div class="col-md-5 col-lg-4">

                            <div class="event-restaurant_header">
                                <span class="icon" style="color:#D1A04C"><i class="lotus-icon-calendar"></i></span>
                                <h2 style="color:#D1A04C">EVENTS & DEALS</h2>
                                <p>Be part of our numberous events, there are fun packed and planned to meet your delight. </p>
                            </div>

                        </div>
                        <div class="col-md-7 col-lg-6 col-lg-offset-2">

                            <ul class="event-restaurant_content">
                                <?php foreach(featuredEvents($conn) AS $event){ ?>
                                    <li>
                                        <span class="event-date"  style="color:#D1A04C">
                                            <strong><?php echo date("d", $event['eventStart']); ?></strong>
                                            <?php echo date("M", $event['eventStart']); ?>
                                        </span>
                                        <div class="text">
                                            <h2 style="color:#D1A04C"><?php echo $event['eventName']; ?></h2>
                                            <span style="color:#fff"> at <?php if(!empty($event['hallName'])){ echo $event['hallName']; } else { echo $event['eventHall']; } ?> for <?php if($event['eventPrice'] == "FREE"){ echo $event['eventPrice']; } else { echo "just N".number_format($event['eventPrice']); }; ?> <br> </span>
                                            <a href="event.php?id=<?php echo $event['eventID']; ?>">[ View & Book ]</a>
                                        </div>
                                    </li>
                                <?php } ?>

                            </ul>

                        </div>
                    </div>
                </div>
            </div>
        </section>