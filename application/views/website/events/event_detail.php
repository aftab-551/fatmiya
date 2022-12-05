<!-- Start Breadcrumbs -->
<div class="breadcrumbs overlay">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 offset-lg-2 col-md-12 col-12">
                <div class="breadcrumbs-content">
                    <h1 class="page-title">Event Details</h1>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                        been the industry's standard dummy text</p>
                </div>
                <ul class="breadcrumb-nav">
                    <li><a href="<?= base_url('Home'); ?>">Home</a></li>
                    <li>Event Details</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbs -->

<!-- Start Event Details -->
<div class="event-details section">
    <div class="container">
        <div class="row">
            <!-- Start Event Details Content -->
            <div class="col-lg-8 col-12">
                <div class="details-content">
                    <h2 class="title">About The Event</h2>
                    <ul class="meta-data">
                        <!-- <li><i class="lni lni-map-marker"></i></li> -->
                        <li><i class="lni lni-calendar"></i> <?= date('d-m-Y', strtotime($event->start_date)); ?></li>
                        <li><i class="lni lni-timer"></i> <?= date('h:i a', strtotime($event->start_time)). ' - '. date('h:i a', strtotime($event->end_time)) ?></li>
                    </ul>
                    <!-- Start Google-map Area -->
                    <div class="map-section">
                        <div class="mapouter">
                            <div class="gmap_canvas"><iframe width="100%" height="350" id="gmap_canvas"
                                    src="<?= $event->maps_embed_link; ?>"
                                    frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                            </div>
                        </div>
                        <p class="location"> <i class="lni lni-map-marker"></i> <?= $event->venue; ?></p>
                    </div>
                    <!-- End Google-map Area -->
                    <div class="text">
                        <p><?= $event->long_description; ?></p>
<!-- 
                        <p>International Art Fair, organized by ITSLIQUID Group in collaboration with Art Events and Ca’ Zanardi, will be held in Venice, at THE ROOM Contemporary Art Space from April 09 to May 10 2020, at Palazzo Ca’ Zanardi from April 10 to May 10 2020 and in other prestigious venues and historical buildings. </p>

                        <h4>The participation includes the following services</h4>
                        <ul class="list">
                            <li>exhibition space dedicated to the artist’s works</li>
                            <li>assisting with customs formalities, international shipping and local transport
                            </li>
                            <li>assisting in finding accommodation for artist
                            </li>
                            <li>the design and the printing of invitation cards, posters
                            </li>
                            <li>the global and local press office, publicity, press, banners, totem, etc.
                            </li>
                            <li>mounting and dismounting of the exhibition
                            </li>
                            <li>exhibitions opening event with drinks and food
                            </li>
                        </ul> -->
                    </div>
                </div>
            </div>
            <!-- End Event Details Content -->
            <!-- Start Event Details Sidebar -->
            <div class="col-lg-4 col-12">
                <div class="event-sidebar">
                    <!-- Start Single Widget -->
                    <!-- <div class="single-widget first-wedget">
                        <div class="sidebar-widget-content">
                            <div class="sidebar-entry-event">
                                <div class="entry-register">
                                    <ul class="entry-event-info">
                                        <li class="meta-price">
                                            <span class="meta-label">
                                                <i class="meta-icon far fa-money-bill-wave"></i>
                                                Cost:
                                            </span>
                                            <span class="meta-value">
                                                <span class="event-price">$19<span
                                                        class="decimals-separator">.00</span>
                                                </span>
                                            </span>
                                        </li>
                                        <li class="total">
                                            <span class="meta-label">
                                                <i class="meta-icon far fa-user-friends"></i>
                                                Total Slot: </span>
                                            <span class="meta-value">99</span>
                                        </li>
                                        <li class="booking_slot">
                                            <span class="meta-label">
                                                <i class="meta-icon far fa-lock-alt"></i>
                                                Booked Slot: </span>
                                            <span class="meta-value">0</span>
                                        </li>
                                    </ul>
                                    <div class="button">
                                        <a href="JavaScript:Void(0);" class="btn">Book Now</a>
                                    </div>
                                    <p class="event-register-message">You must <a
                                            href="login.html">login</a> before register event.</p>

                                </div>
                                <ul class="author-social-networks event-social">
                                    <li class="item">
                                        <a href="JavaScript:Void(0);" target="_blank" class="social-link"> <i class="lni lni-facebook-original"></i> </a>
                                    </li>
                                    <li class="item">
                                        <a href="JavaScript:Void(0);" target="_blank" class="social-link"> <i class="lni lni-twitter-original"></i> </a>
                                    </li>
                                    <li class="item">
                                        <a href="JavaScript:Void(0);" target="_blank" class="social-link"> <i class="lni lni-linkedin-original"></i> </a>
                                    </li>
                                    <li class="item">
                                        <a href="JavaScript:Void(0);" target="_blank" class="social-link"> <i class="lni lni-tumblr"></i> </a>
                                    </li>
                                    <li class="item">
                                        <a href="JavaScript:Void(0);" target="_blank" class="social-link"> <i class="lni lni-youtube"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div> -->
                    <!-- End Single Widget -->
                    <!-- Start Single Widget -->
                    <div class="single-widget other-event-wedget">
                        <h3 class="sidebar-widget-title">Other Events</h3>
                        <ul class="other-event">
                            <?php foreach($other_events as $oe): ?>
                                <li class="single-event">
                                    <div class="thumbnail">
                                        <a href="<?= base_url('website/Events/event_details/'.rtrim(base64_encode($oe->id),'=')) ?>" class="image"><img
                                                src="<?= base_url('uploads/event_images/'.$oe->image); ?>" alt="Event Image"></a>
                                    </div>
                                    <div class="info">
                                        <span class="date"><i class="lni lni-calendar"></i> <?= date('d M Y', strtotime($oe->start_date)); ?></span>
                                        <h6 class="title"><a href="<?= base_url('website/Events/event_details/'.rtrim(base64_encode($oe->id),'=')) ?>"><?= $oe->title; ?></a></h6>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <!-- End Single Widget -->
                </div>
            </div>
            <!-- End Event Details Sidebar -->
        </div>
    </div>
</div>
<!-- Start Event Details -->