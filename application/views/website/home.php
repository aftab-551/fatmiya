<!-- Start Hero Area -->
<section class="hero-area">
    <div class="hero-slider">
        <!-- Single Slider -->
        <!-- Loop Here -->
        <?php foreach($slider as $s): ?>
            <?php if($s->title == ''): ?>
                <div class="hero-inner overlay" style="background-image: url('<?= base_url('uploads/slider_images/'.$s->image);?>');">
                    <div class="container">
                        <div class="row ">
                            <div class="col-lg-8 offset-lg-2 col-md-12 col-12">
                                <div class="home-slider">
                                    <div class="hero-text">
                                        <br><br>
                                        <div class="hidden"><h5 class="wow fadeInUp" data-wow-delay=".3s">Start to Learning Today</h5></div>
                                        <div class="hidden"><h1 class="wow fadeInUp" data-wow-delay=".5s">Excellent And Friendly <br> Faculty Members</h1></div>
                                        <div class="hidden"><p class="wow fadeInUp" data-wow-delay=".7s">Lorem Ipsum is simply dummy text of the
                                            printing and typesetting <br> industry. Lorem Ipsum has been the industry's
                                            standard
                                            <br>dummy text ever since an to impression.</p></div>
                                        <?php if($s->button_title != '' && $s->event_id != 0): ?>
                                            <div class="button wow fadeInUp" data-wow-delay=".9s">
                                                <a href="<?= $s->button_link; ?>" class="btn alt-btn"><?= $s->button_title; ?></a>    
                                                <a href="<?= base_url('Home/download_ics').'/'.rtrim(base64_encode($s->event_id),'='); ?>" class="btn">Download Event</a>
                                            </div>
                                        <?php elseif($s->button_title != '' && $s->event_id == 0): ?>
                                            <div class="button wow fadeInUp" data-wow-delay=".9s">
                                                <a href="<?= $s->button_link; ?>" class="btn"><?= $s->button_title; ?></a>
                                            </div>
                                        <?php elseif($s->button_title == '' && $s->event_id != 0): ?>
                                            <div class="button wow fadeInUp" data-wow-delay=".9s">
                                                <a href="<?= base_url('Home/download_ics').'/'.rtrim(base64_encode($s->event_id),'='); ?>" class="btn">Download Event</a>
                                            </div>
                                        <?php else: ?>
                                            <div class="hidden">
                                                <div class="button wow fadeInUp" data-wow-delay=".9s">
                                                    <a href="#" class="btn">Download Event</a>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php elseif($s->title != ''): ?>
                <div class="hero-inner overlay" style="background-image: url('<?= base_url('uploads/slider_images/'.$s->image)?>');">
                    <div class="container">
                        <div class="row ">
                            <div class="col-lg-8 offset-lg-2 col-md-12 col-12">
                                <div class="home-slider">
                                    <div class="hero-text">
                                        <div class="hidden"><h5 class="wow fadeInUp" data-wow-delay=".3s">Start to Learning Today</h5></div>
                                        <h1 class="wow fadeInUp" data-wow-delay=".5s"><?= $s->title; ?></h1>
                                        <?php if($s->description != ''): ?>
                                            <p class="wow fadeInUp" data-wow-delay=".7s"><?= $s->description; ?><span class="hidden"><?=$s->dummy_description; ?></span></p>
                                        <?php elseif($s->description == ''): ?>
                                            <div class=""><span class="hidden"><p class="wow fadeInUp" data-wow-delay=".7s"><?= $s->dummy_description; ?></p></span></div>
                                        <?php endif; ?>
                                            
                                        <?php if($s->button_title != '' && $s->event_id != 0): ?>
                                            <div class="button wow fadeInUp" data-wow-delay=".9s">
                                                <a href="<?= $s->button_link; ?>" class="btn alt-btn"><?= $s->button_title; ?></a>
                                                <a href="<?= base_url('Home/download_ics').'/'.rtrim(base64_encode($s->event_id),'='); ?>" class="btn">Download Event</a>
                                            </div>
                                        <?php elseif($s->button_title != '' && $s->event_id == 0): ?>
                                            <div class="button wow fadeInUp" data-wow-delay=".9s">
                                                <a href="<?= $s->button_link; ?>" class="btn"><?= $s->button_title; ?></a>
                                            </div>
                                        <?php elseif($s->button_title == '' && $s->event_id != 0): ?>
                                            <div class="button wow fadeInUp" data-wow-delay=".9s">
                                                <a href="<?= base_url('Home/download_ics').'/'.rtrim(base64_encode($s->event_id),'='); ?>" class="btn">Download Event</a>
                                            </div>
                                        <?php else: ?>
                                            <div class="hidden">
                                                <div class="button wow fadeInUp" data-wow-delay=".9s">
                                                    <a href="#" class="btn">Download Event</a>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php elseif($s->title == '' && $s->button_link == '' && $s->event_id == 0): ?>
                <img src="<?= base_url('uploads/slider_images/').$s->image ?>" alt="Slider">
            <?php endif;?>
        <?php endforeach; ?>
        <!--/ End Single Slider -->
    </div>
</section>
<!--/ End Hero Area -->

<!-- Start Features Area -->
<!-- <section class="features">
    <div class="container-fluid">
        <div class="single-head">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-12 padding-zero"> -->
                    <!-- Start Single Feature -->
                    <!-- <div class="single-feature">
                        <h3><a href="javascript:void(0)">Trending Courses</a></h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus, quaerat beatae
                            nulla debitis vitae temporibus sed.</p>
                        <div class="button">
                            <a href="javascript:void(0)" class="btn">Explore <i class="lni lni-arrow-right"></i></a>
                        </div>
                    </div> -->
                    <!-- End Single Feature -->
                <!-- </div>
            </div>
        </div>
    </div>
</section> -->
<!-- /End Features Area -->

<!-- Start About Us Area -->
<section class="about-us section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-12">
                <div class="about-left">
                    <div class="about-title align-left">
                        <span class="wow fadeInDown" data-wow-delay=".2s">About our Institute</span>
                        <h2 class="wow fadeInUp" data-wow-delay=".4s">Welcome to <?= $about->name; ?></h2>
                        <p class="wow fadeInUp" data-wow-delay=".6s"><?= $about->description; ?></p>
                        <div class="button wow fadeInUp" data-wow-delay="1s">
                            <a href="<?= $about->intro_video; ?>"
                                class="glightbox video btn"> Play Video<i class="lni lni-play"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-12">
                <div class="about-right wow fadeInRight" data-wow-delay=".4s">
                    <img src="<?= base_url('uploads/about_images').'/'.$about->image; ?>" alt="#">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /End About Us Area -->

<!-- Start Programs Area -->
<section class="courses section" style="background-color: #f4f7fa;">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <div class="section-icon wow zoomIn" data-wow-delay=".4s">
                        <i class="lni lni-graduation"></i>
                    </div>
                    <h2 class="wow fadeInUp" data-wow-delay=".4s">Offered Programs</h2>
                    <p class="wow fadeInUp" data-wow-delay=".6s">The programs that have been offered recently. You can enroll in these programs and learn systematically.</p>
                </div>
            </div>
        </div>
        <div class="single-head">
            <div class="row">
                <?php foreach($offered_programs as $op): ?>
                    <?php 
                        $char_count = strlen($op->program_description);
                        $chars = '';
                        $char_count_title = strlen($op->program_name);
                        $chars_title = '';

                        if($char_count_title < 31){
                            $remaining_chars = 30 - $char_count_title;
                            for ($i = 0; $i < $remaining_chars; $i++) { 
                                if($i % 2 == 0) {
                                    $chars_title .= '_';
                                }
                                else {
                                    $chars_title .= ' ';
                                }
                            }
                        }
                        else {
                            $extra_chars = $char_count_title - 30;
                            $chars_title = mb_substr($op->program_name, 0, -$extra_chars);
                            $chars_title .= '...';
                        }
                        if($char_count < 111){
                            $remaining_chars = 110 - $char_count;
                            for ($i = 0; $i < $remaining_chars; $i++) { 
                                if($i % 2 == 0) {
                                    $chars .= ' ';
                                }
                                else {
                                    $chars .= '_';
                                }
                            }
                        }
                        else {
                            $extra_chars = $char_count - 110;
                            $chars = substr_replace($op->program_description, "", -$extra_chars);
                            $chars .= '...';
                        }
                    ?>
                    <div class="col-lg-4 col-md-6 col-12">
                        <!-- Start Single Course -->
                        <div class="single-course wow fadeInUp" data-wow-delay=".2s" style="background-color: white;">
                            <div class="course-image">
                                <a href="<?= base_url('program/program-details/'.rtrim(base64_encode($op->id),'=')) ?>"><img src="<?= base_url('uploads/program_images/'.$op->program_thumbnail); ?>"
                                        alt="Thumbnail"></a>
                                <!-- <p class="price">$180</p> -->
                            </div>
                            <div class="content">
                                <h3>
                                    <a href="<?= base_url('program/program-details/'.rtrim(base64_encode($op->id),'='))?>"><?= strlen($op->program_name) < 31 ? $op->program_name.'<span style="visibility:hidden; display:inline;">'.$chars_title.'</span>' : $chars_title ?>
                                    </a>
                                </h3>
                                <p><?= strlen($op->program_description) < 111 ? $op->program_description.'...'.'<span style="visibility:hidden; display:inline;">'.$chars.'</span>' : $chars?></p>

                                <div class="button" style="margin-top:30px;">
                                    <a href="<?= base_url('program/program-details/'.rtrim(base64_encode($op->id),'='))?>" class="btn">Program Details</a>
                                </div>
                            </div>
                            <!-- <div class="bottom-content">
                                <ul class="review">
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li>22 Reviews</li>
                                </ul>
                                <span class="tag">
                                    <i class="lni lni-tag"></i>
                                    <a href="javascript:void(0)">Programming</a>
                                </span>
                            </div> -->
                        </div>
                        <!-- End Single Course -->
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
<!-- End Programs Area -->

<!-- Start Courses Area -->
<section class="courses section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <div class="section-icon wow zoomIn" data-wow-delay=".4s">
                        <i class="lni lni-graduation"></i>
                    </div>
                    <h2 class="wow fadeInUp" data-wow-delay=".4s">Offered Courses</h2>
                    <p class="wow fadeInUp" data-wow-delay=".6s">The courses that have been offered recently. You can enroll in these courses and learn according to your pace.</p>
                </div>
            </div>
        </div>
        <div class="single-head">
            <div class="row">
                <?php foreach($offered_courses as $oc): ?>
                    <?php 
                        $char_count = strlen($oc->course_shortdesc);
                        $chars = '';
                        $char_count_title = strlen($oc->course_name);
                        $chars_title = '';

                        if($char_count_title < 31){
                            $remaining_chars = 30 - $char_count_title;
                            for ($i = 0; $i < $remaining_chars; $i++) { 
                                if($i % 2 == 0) {
                                    $chars_title .= '_';
                                }
                                else {
                                    $chars_title .= ' ';
                                }
                            }
                        }
                        else {
                            $extra_chars = $char_count_title - 30;
                            $chars_title = mb_substr($oc->course_name, 0, -$extra_chars);
                            $chars_title .= '...';
                        }
                        if($char_count < 111){
                            $remaining_chars = 110 - $char_count;
                            for ($i = 0; $i < $remaining_chars; $i++) { 
                                if($i % 2 == 0) {
                                    $chars .= ' ';
                                }
                                else {
                                    $chars .= '_';
                                }
                            }
                        }
                        else {
                            $extra_chars = $char_count - 110;
                            $chars = substr_replace($oc->course_shortdesc, "", -$extra_chars);
                            $chars .= '...';
                        }
                    ?>
                    <div class="col-lg-4 col-md-6 col-12">
                        <!-- Start Single Course -->
                        <div class="single-course wow fadeInUp" data-wow-delay=".2s">
                            <div class="course-image">
                                <a href="<?= base_url('website/Courses/course_details/'.rtrim(base64_encode($oc->id),'=')) ?>"><img src="<?= base_url('uploads/course_images/'.$oc->course_thumbnail); ?>"
                                        alt="Thumbnail"></a>
                                <!-- <p class="price">$180</p> -->
                            </div>
                            <div class="content">
                                <h3>
                                    <a href="<?= base_url('website/Courses/course_details/'.rtrim(base64_encode($oc->id),'='))?>"><?= strlen($oc->course_name) < 31 ? $oc->course_name.'<span style="visibility:hidden; display:inline;">'.$chars_title.'</span>' : $chars_title ?>
                                    </a>
                                </h3>
                                <p><?= strlen($oc->course_shortdesc) < 111 ? $oc->course_shortdesc.'...'.'<span style="visibility:hidden; display:inline;">'.$chars.'</span>' : $chars?></p>

                                <div class="button" style="margin-top:30px;">
                                    <a href="<?= base_url('website/Courses/course_details/'.rtrim(base64_encode($oc->id),'='))?>" class="btn">Course Details</a>
                                </div>
                            </div>
                            <!-- <div class="bottom-content">
                                <ul class="review">
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li>22 Reviews</li>
                                </ul>
                                <span class="tag">
                                    <i class="lni lni-tag"></i>
                                    <a href="javascript:void(0)">Programming</a>
                                </span>
                            </div> -->
                        </div>
                        <!-- End Single Course -->
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
<!-- End Courses Area -->

<!-- Start Achivement Area -->
<!-- <section class="our-achievement section overlay">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-12">
                <div class="single-achievement wow fadeInUp" data-wow-delay=".2s">
                    <h3 class="counter"><span id="secondo1" class="countup" cup-end="500">500</span>+</h3>
                    <h4>Happy Clients</h4>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-12">
                <div class="single-achievement wow fadeInUp" data-wow-delay=".4s">
                    <h3 class="counter"><span id="secondo2" class="countup" cup-end="70">70</span>+</h3>
                    <h4>Online Courses</h4>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-12">
                <div class="single-achievement wow fadeInUp" data-wow-delay=".6s">
                    <h3 class="counter"><span id="secondo3" class="countup" cup-end="100">100</span>%</h3>
                    <h4>Satisfaction</h4>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-12">
                <div class="single-achievement wow fadeInUp" data-wow-delay=".6s">
                    <h3 class="counter"><span id="secondo3" class="countup" cup-end="100">100%</span>%</h3>
                    <h4>Support</h4>
                </div>
            </div>
        </div>
    </div>
</section> -->
<!-- End Achivement Area -->

<!-- Start Events Area-->
<section class="events section bg-gray">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <div class="section-icon wow zoomIn" data-wow-delay=".4s">
                        <i class="lni lni-bookmark"></i>
                    </div>
                    <h2 class="wow fadeInUp" data-wow-delay=".4s">Upcoming Events</h2>
                    <p class="wow fadeInUp" data-wow-delay=".6s">The upcoming or recently passed events. You can click on these events to view the details.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <?php foreach($events as $e): ?>
                <?php 
                    $char_count = strlen($e->description);
                    $chars = '';
                    if($char_count < 93){
                        $remaining_chars = 92 - $char_count;
                        for ($i = 0; $i < $remaining_chars; $i++) { 
                            if($i % 2 == 0) {
                                $chars .= ' ';
                            }
                            else {
                                $chars .= '_';
                            }
                        }
                    }
                    else {
                        $extra_chars = $char_count - 92;
                        $chars = substr_replace($e->description, "", -$extra_chars);
                        $chars .= '...';
                    }
                ?>
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Start Single Event -->
                    <div class="single-event bg-white wow fadeInUp" data-wow-delay=".2s">
                        <div class="event-image">
                            <a href="<?= base_url('website/Events/event_details/'.rtrim(base64_encode($e->id),'=')) ?>"><img src="<?= base_url('uploads/event_images/'.$e->image); ?>" alt="Thumbnail"></a>
                            <p class="date"><?= date('d', strtotime($e->start_date)); ?><span><?= strtoupper(date('M', strtotime($e->start_date))); ?></span></p>
                        </div>
                        <div class="content">
                            <h3><a href="<?= base_url('website/Events/event_details/'.rtrim(base64_encode($e->id),'=')) ?>"><?= $e->title; ?></a></h3>
                            <p><?= strlen($e->description) < 93 ? $e->description.'...'.'<span style="visibility:hidden; display:inline;">'.$chars.'</span>' : $chars?></p>
                        </div>
                        <div class="bottom-content"  style="display:flex; justify-content:start;">
                            <!-- <a class="speaker" href="javascript:void(0)">
                                <img src="https://via.placeholder.com/100x100" alt="#">
                                <span>Devid Josh</span>
                            </a> -->
                            <span class="time">
                                <i class="lni lni-timer"></i>
                                <a href="javascript:void(0)"><?= date('h:ia', strtotime($e->start_time)); ?> - <?= date('h:ia', strtotime($e->end_time)); ?></a>
                            </span>
                        </div>
                    </div>
                    <!-- End Single Event -->
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<!-- End Events Area-->

<!-- Start Teachers -->
<section id="teachers" class="teachers section bg-white">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title align-center gray-bg">
                    <div class="section-icon wow zoomIn" data-wow-delay=".4s">
                        <i class="lni lni-users"></i>
                    </div>
                    <h2 class="wow fadeInUp" data-wow-delay=".4s">Our Experienced Teachers</h2>
                    <p class="wow fadeInUp" data-wow-delay=".6s">Our team of qualified teachers, those are willing to teach and provide you with quality education via different courses or programs.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Single Team -->
            <?php foreach($teachers as $t): ?>
                <?php 
                    $char_count = strlen($t->detail);
                    $chars = '';
                    if($char_count < 174){
                        $remaining_chars = 173 - $char_count;
                        for ($i = 0; $i < $remaining_chars; $i++) { 
                            if($i % 2 == 0) {
                                $chars .= ' ';
                            }
                            else {
                                $chars .= '_';
                            }
                        }
                    }
                    else {
                        $extra_chars = $char_count - 173;
                        $chars = substr_replace($t->detail, "", -$extra_chars);
                        $chars .= '...';
                    }
                ?>
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="single-team wow fadeInUp" data-wow-delay=".2s">
                        <div class="row">
                            <div class="col-lg-5 col-12">
                                <!-- Image -->
                                <div class="image">
                                    <img src="<?= base_url('uploads/teacher_images').'/'.$t->teacher_image; ?>" alt="Teacher Image">
                                </div>
                                <!-- End Image -->
                            </div>
                            <div class="col-lg-7 col-12">
                                <div class="info-head">
                                    <!-- Info Box -->
                                    <div class="info-box">
                                        <span class="designation"><?= $t->qualification; ?></span>
                                        <h4 class="name"><a href="#"><?= $t->name; ?></a></h4>
                                        <p><?= strlen($t->detail) < 174 ? $t->detail.'...'.'<span style="visibility:hidden; display:inline;">'.$chars.'</span>' : $chars?></p>
                                    </div>
                                    <!-- End Info Box -->
                                    <!-- Social -->
                                    <ul class="social">
                                        <?php if($t->facebook != ''):?> 
                                            <li><a href="<?= $t->facebook; ?>"><i class="lni lni-facebook-filled"></i></a></li>
                                        <?php endif; ?>
                                        <?php if($t->instagram != ''):?> 
                                            <li><a href="<?= $t->instagram; ?>"><i class="lni lni-twitter-original"></i></a></li>
                                        <?php endif; ?>
                                        <?php if($t->youtube != ''):?> 
                                            <li><a href="<?= $t->youtube; ?>"><i class="lni lni-youtube"></i></a></li>
                                        <?php endif; ?>
                                        <?php if($t->twitter != ''):?> 
                                            <li><a href="<?= $t->twitter; ?>"><i class="lni lni-twitter-original"></i></a></li>
                                        <?php endif; ?>
                                    </ul>
                                    <!-- End Social -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            <!-- End Single Team -->
        </div>
    </div>
</section>
<!--/ End Teachers Area -->

<!-- Start Testimonials Area -->
<!-- <section class="testimonials section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title align-center gray-bg">
                    <div class="section-icon wow zoomIn" data-wow-delay=".4s">
                        <i class="lni lni-quotation"></i>
                    </div>
                    <h2 class="wow fadeInUp" data-wow-delay=".4s">What Our Students Say</h2>
                    <p class="wow fadeInUp" data-wow-delay=".6s">There are many variations of passages of Lorem
                        Ipsum available, but the majority have suffered alteration in some form.</p>
                </div>
            </div>
        </div>
        <div class="row testimonial-slider">
            <div class="col-lg-4 col-md-6 col-12"> -->
                <!-- Start Single Testimonial -->
                <!-- <div class="single-testimonial">
                    <div class="text">
                        <p>"It’s amazing how much easier it has been to meet new people and create instant
                            connections. I have the exact same personality, the only thing that has changed is my
                            mindset and a few behaviors."</p>
                    </div>
                    <div class="author">
                        <img src="https://via.placeholder.com/300x300" alt="#">
                        <h4 class="name">
                            Jane Anderson
                            <span class="deg">Founder & CEO</span>
                        </h4>
                    </div>
                </div> -->
                <!-- End Single Testimonial -->
            <!-- </div>
        </div>
    </div>
</section> -->
<!-- End Testimonial Area -->

<!-- Start Newsletter Area -->
<!-- <section class="newsletter-area section">
    <div class="container">
        <div class="row ">
            <div class="col-lg-6 offset-lg-3 col-md-12 col-12">
                <div class="newsletter-title">
                    <span>Sign Up for</span>
                    <h2>The Newsletter</h2>
                    <p>Subscribe to us to always stay in touch with us and get the latest news<br>
                        about our company and all of our activities!</p>
                </div> -->
                <!-- Start Newsletter Form -->
                <!-- <div class="subscribe-text wow fadeInUp" data-wow-delay=".2s">
                    <form action="mail/mail.php" method="get" target="_blank" class="newsletter-inner">
                        <input name="EMAIL" placeholder="Your email address" class="common-input"
                            onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your email address'"
                            required="" type="email">
                        <div class="button">
                            <button class="btn">Subscribe Now!</button>
                        </div>
                    </form>
                    <ul class="newsletter-social">
                        <li><a href="javascript:void(0)"><i class="lni lni-facebook-original"></i></a></li>
                        <li><a href="javascript:void(0)"><i class="lni lni-twitter-original"></i></a></li>
                        <li><a href="javascript:void(0)"><i class="lni lni-instagram"></i></a></li>
                        <li><a href="javascript:void(0)"><i class="lni lni-linkedin-original"></i></a></li>
                        <li><a href="javascript:void(0)"><i class="lni lni-google"></i></a></li>
                    </ul>
                </div> -->
                <!-- End Newsletter Form -->
            <!-- </div>
        </div>
    </div>
</section> -->
<!-- /End Newsletter Area -->

<!-- Start Call To Action Area -->
<!-- <section class="call-action section overlay">
    <div class="container">
        <div class="row ">
            <div class="col-lg-8 offset-lg-2 col-md-12 col-12">
                <div class="call-content">
                    <span>SiGET INSTANT ACCESS TO THE FREE</span>
                    <h2>Self Development Course</h2>
                    <p>Learn about how them you went down prying the wedding ring off his cold, dead finger. I don't
                        know what you did, Fry, but once again, you screwed up!</p>
                    <div class="button">
                        <a href="javascript:void(0)" class="btn">Start Learning</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->
<!-- /End Call To Action Area -->

<!-- Start Latest News Area -->
<div class="latest-news-area section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <div class="section-icon wow zoomIn" data-wow-delay=".4s">
                        <i class="lni lni-quotation"></i>
                    </div>
                    <h2 class="wow fadeInUp" data-wow-delay=".4s">Latest News & Blog</h2>
                    <p class="wow fadeInUp" data-wow-delay=".6s">The posts that are written recently on different topics, furnish you with valuable information.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <?php foreach($blog_posts as $post): ?>
                <?php 
                    $char_count = mb_strlen($post->excerpt);
                    $char_count_title = mb_strlen($post->title);
                    $chars = '';
                    $chars_title = '';

                    if($char_count_title < 41){
                        $remaining_chars = 40 - $char_count_title;
                        for ($i = 0; $i < $remaining_chars; $i++) { 
                            if($i % 2 == 0) {
                                $chars_title .= '_';
                            }
                            else {
                                $chars_title .= ' ';
                            }
                        }
                    }
                    else {
                        $extra_chars = $char_count_title - 40;
                        $chars_title = mb_substr($post->title, 0, -$extra_chars);
                        $chars_title .= ' ۔۔۔';
                    }

                    if($char_count < 134){
                        $remaining_chars = 132 - $char_count;
                        for ($i = 0; $i < $remaining_chars; $i++) { 
                            if($i % 2 == 0) {
                                $chars .= '_';
                            }
                            else {
                                $chars .= ' ';
                            }
                        }
                    }
                    else {
                        $extra_chars = $char_count - 132;
                        $chars = mb_substr($post->excerpt, 0, -$extra_chars);
                        $chars .= '۔۔۔';
                    }
                ?>
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Single News -->
                    <div class="single-news custom-shadow-hover wow fadeInUp" data-wow-delay=".2s">
                        <div class="image">
                            <a href="<?= base_url('blog/blog-details/'.$post->slug); ?>">
                                <img class="thumb" src="<?= base_url('uploads/blog_images/blog_thumbnails/'.$post->image); ?>" alt="#">
                            </a>
                        </div>
                        <div class="content-body">
                            <div class="meta-data">
                                <ul>
                                    <li>
                                        <i class="lni lni-tag"></i>
                                        <a href="javascript:void(0)"><?= $post->sub_cat_name; ?></a>
                                    </li>
                                    <li>
                                        <i class="lni lni-calendar"></i>
                                        <a href="javascript:void(0)"><?= date('F d, Y', strtotime($post->published_at)); ?></a>
                                    </li>
                                </ul>
                            </div>
                            <h4 class="title">
                                <a href="<?= base_url('blog/blog-details/'.$post->slug); ?>"><?= strlen($post->title) < 41 ? $post->title.'۔۔۔'.'<span style="visibility:hidden; display:inline;">'.$chars_title.'</span>' : $chars_title ?></a>
                            </h4>
                            <p><?= strlen($post->excerpt) < 134 ? $post->excerpt.'۔۔۔'.'<span style="visibility:hidden; display:inline;">'.$chars.'</span>' : $chars ?></p>
                            <div class="button">
                                <a href="<?= base_url('blog/blog-details/'.$post->slug); ?>" class="btn">مزید پڑھے</a>
                            </div>
                        </div>
                    </div>
                    <!-- End Single News -->
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<!-- End Latest News Area -->

<!-- Start Latest Books & Articles Area -->
<div class="latest-news-area section bg-white">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <div class="section-icon wow zoomIn" data-wow-delay=".4s">
                        <i class="lni lni-quotation"></i>
                    </div>
                    <h2 class="wow fadeInUp" data-wow-delay=".4s">Latest Books & Articles</h2>
                    <p class="wow fadeInUp" data-wow-delay=".6s">Books are great ways of enlightening your life. You can find great books here. </p>
                </div>
            </div>
        </div>
        <div class="row">
            <?php foreach($books as $book): ?>
                <?php 
                    $char_count_title = mb_strlen($book->name);
                    $chars_title = '';

                    if($char_count_title < 41){
                        $remaining_chars = 40 - $char_count_title;
                        for ($i = 0; $i < $remaining_chars; $i++) { 
                            if($i % 2 == 0) {
                                $chars_title .= '_';
                            }
                            else {
                                $chars_title .= ' ';
                            }
                        }
                    }
                    else {
                        $extra_chars = $char_count_title - 40;
                        $chars_title = mb_substr($book->title, 0, -$extra_chars);
                        $chars_title .= ' ۔۔۔';
                    }
                ?>
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Single News -->
                    <div class="single-news custom-shadow-hover wow fadeInUp" data-wow-delay=".2s">
                        <div class="image">
                            <a href="javascript:void(0)">
                                <img class="thumb" style="height: 340px; width: 550px;" src="<?= base_url('uploads/books/books_images/'.$book->book_image); ?>" alt="#">
                            </a>
                        </div>
                        <div class="content-body">
                            <div class="meta-data">
                                <ul class="align-left">
                                    <li>
                                        <i class="lni lni-tag"></i>
                                        <a href="javascript:void(0)"><?= $book->category_name; ?></a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">
                                            <i class="lni lni-eye"></i>
                                            <?= $book->views; ?>
                                        </a>
                                    </li>
                                    <li>
                                        <i class="lni lni-calendar"></i>
                                        <a href="javascript:void(0)"><?= date('F d, Y', strtotime($book->creation_date)); ?></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="align-left">
                                <h4 class="title" style="font-family: Poppins;">
                                    <a href="javascript:void(0)"><?= strlen($book->name) < 41 ? $book->name.'...'.'<span style="visibility:hidden; display:inline;">'.$chars_title.'</span>' : $chars_title ?></a>
                                </h4>
                                <div class="button">
                                    <a target="_blank" href="<?= base_url('book/view-book/'.rtrim(base64_encode($book->id_books),'=')); ?>" class="btn" style="font-family: Poppins;">View Book</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single News -->
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<!-- End Latest Books & Articles Area -->

<!-- Start Clients Area -->
<!-- <div class="client-logo-section">
    <div class="container">
        <div class="client-logo-wrapper">
            <div class="client-logo-carousel d-flex align-items-center justify-content-between">
                <div class="client-logo">
                    <img src="https://via.placeholder.com/230x95" alt="#">
                </div>
                <div class="client-logo">
                    <img src="https://via.placeholder.com/230x95" alt="#">
                </div>
                <div class="client-logo">
                    <img src="https://via.placeholder.com/230x95" alt="#">
                </div>
                <div class="client-logo">
                    <img src="https://via.placeholder.com/230x95" alt="#">
                </div>
                <div class="client-logo">
                    <img src="https://via.placeholder.com/230x95" alt="#">
                </div>
                <div class="client-logo">
                    <img src="https://via.placeholder.com/230x95" alt="#">
                </div>
                <div class="client-logo">
                    <img src="https://via.placeholder.com/230x95" alt="#">
                </div>
                <div class="client-logo">
                    <img src="https://via.placeholder.com/230x95" alt="#">
                </div>
                <div class="client-logo">
                    <img src="https://via.placeholder.com/230x95" alt="#">
                </div>
            </div>
        </div>
    </div>
</div> -->
<!-- End Clients Area -->