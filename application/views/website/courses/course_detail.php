<!-- Course Details Section Start -->
<div class="course-details section">
    <div class="container">
        <div class="row">
            <!-- Course Details Wrapper Start -->
            <div class="col-lg-8 col-12">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="overview-tab" data-bs-toggle="tab"
                            data-bs-target="#overview" type="button" role="tab" aria-controls="overview"
                            aria-selected="true">Overview</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="curriculum-tab" data-bs-toggle="tab"
                            data-bs-target="#curriculum" type="button" role="tab" aria-controls="curriculum"
                            aria-selected="false">Curriculum</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="instructor-tab" data-bs-toggle="tab"
                            data-bs-target="#instructor" type="button" role="tab" aria-controls="instructor"
                            aria-selected="false">Instructor</button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="overview" role="tabpanel"
                        aria-labelledby="overview-tab">
                        <div class="course-overview">
                            <h3 class="title">About This Course</h3>

                            <p><?= $course->long_description; ?></p>

                            <div class="overview-course-video">
                                <iframe title="<?= $course->name; ?>"
                                    src="<?= $course->intro_video_url; ?>"></iframe>
                            </div>

                            <div class="bottom-content">
                                <div class="row align-items-center">
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="button">
                                            <a href="<?= base_url('student/Courses/enroll_course/'.rtrim(base64_encode($course->offered_course_id),'=')) ?>" class="btn">Enroll in Course</a>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <ul class="share">
                                            <li><span>Share this course:</span></li>
                                            <li><a href="javascript:void(0)"><i class="lni lni-facebook-original"></i></a></li>
                                            <li><a href="javascript:void(0)"><i class="lni lni-twitter-original"></i></a></li>
                                            <li><a href="javascript:void(0)"><i class="lni lni-linkedin-original"></i></a></li>
                                            <li><a href="javascript:void(0)"><i class="lni lni-google"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="curriculum" role="tabpanel" aria-labelledby="curriculum-tab">
                        <div class="course-curriculum">
                            <ul class="curriculum-sections">
                                <?php foreach($course_lessons as $cl): ?>
                                    <li class="single-curriculum-section">
                                        <div class="section-header">
                                            <div class="section-left">
                                                <h5 class="title"><?= $cl->title; ?></h5>
                                            </div>
                                        </div>
                                        <ul class="section-content">
                                            <?php foreach($sub_lessons as $sl): ?>
                                                <?php if($sl->lesson_id == $cl->id): ?>
                                                    <li class="course-item">
                                                        <a class="section-item-link lesson" href="JavaScript:Void(0);">
                                                            <span class="item-name"><?= $sl->title; ?></span>
                                                            <div class="course-item-meta">
                                                                <span class="item-meta duration"><?= $sl->duration; ?></span>
                                                                <span class="item-meta item-meta-icon video">
                                                                    <i class="lni lni-video"></i>
                                                                </span>
                                                            </div>
                                                        </a>
                                                    </li>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </ul>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                            <div class="bottom-content">
                                <div class="row align-items-center">
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="button">
                                            <a href="#0" class="btn">Enroll in Course</a>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <ul class="share">
                                            <li><span>Share this course:</span></li>
                                            <li><a href="javascript:void(0)"><i class="lni lni-facebook-original"></i></a></li>
                                            <li><a href="javascript:void(0)"><i class="lni lni-twitter-original"></i></a></li>
                                            <li><a href="javascript:void(0)"><i class="lni lni-linkedin-original"></i></a></li>
                                            <li><a href="javascript:void(0)"><i class="lni lni-google"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="instructor" role="tabpanel" aria-labelledby="instructor-tab">
                        <div class="course-instructor">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="profile-image">
                                        <img src="<?= base_url('uploads/teacher_images').'/'.$teacher->teacher_image; ?>" alt="#">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="profile-info">
                                        <h5><a href="javascript:void(0)"><?= $teacher->name; ?></a></h5>
                                        <p class="author-career">/<?= $teacher->qualification; ?></p>
                                        <p class="author-bio"><?= $teacher->detail; ?></p>


                                        <ul class="author-social-networks">
                                            <?php if($teacher->facebook != ''): ?>
                                                <li class="item">
                                                    <a href="<?= $teacher->facebook; ?>" target="_blank" class="social-link">
                                                        <i class="lni lni-facebook-original"></i> </a>
                                                </li>
                                            <?php endif; ?>

                                            <?php if($teacher->twitter != ''): ?>
                                                <li class="item">
                                                    <a href="<?= $teacher->twitter; ?>" target="_blank" class="social-link">
                                                        <i class="lni lni-twitter-original"></i> </a>
                                                </li>
                                            <?php endif; ?>

                                            <?php if($teacher->instagram != ''): ?>
                                                <li class="item">
                                                    <a href="<?= $teacher->instagram; ?>" target="_blank" class="social-link">
                                                        <i class="lni lni-instagram"></i> </a>
                                                </li>
                                            <?php endif; ?>

                                            <?php if($teacher->youtube != ''): ?>
                                                <li class="item">
                                                    <a href="<?= $teacher->youtube; ?>" target="_blank" class="social-link">
                                                        <i class="lni lni-youtube"></i> </a>
                                                </li>
                                            <?php endif; ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bottom-content">
                            <div class="row align-items-center">
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="button">
                                        <a href="#0" class="btn">Enroll in Course</a>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <ul class="share">
                                        <li><span>Share this course:</span></li>
                                        <li><a href="javascript:void(0)"><i class="lni lni-facebook-original"></i></a></li>
                                        <li><a href="javascript:void(0)"><i class="lni lni-twitter-original"></i></a></li>
                                        <li><a href="javascript:void(0)"><i class="lni lni-linkedin-original"></i></a></li>
                                        <li><a href="javascript:void(0)"><i class="lni lni-google"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                        <div class="course-reviews">
                            <div class="course-rating">
                                <div class="course-rating-content"> -->
                                    <!-- Comments -->
                                    <!-- <div class="post-comments">
                                        <h3 class="comment-title">Reviews</h3>
                                        <ul class="comments-list">
                                            <li>
                                                <div class="comment-img">
                                                    <img src="https://via.placeholder.com/100x100" alt="img">
                                                </div>
                                                <div class="comment-desc">
                                                    <div class="desc-top">
                                                        <h6 class="name"><a href="JavaScript:Void(0);">Rosalina Kelian</a></h6>
                                                        <ul class="rating-star">
                                                            <li><i class="lni lni-star-filled"></i></li>
                                                            <li><i class="lni lni-star-filled"></i></li>
                                                            <li><i class="lni lni-star-filled"></i></li>
                                                            <li><i class="lni lni-star-filled"></i></li>
                                                            <li><i class="lni lni-star-filled"></i></li>
                                                        </ul>
                                                        <p class="time">1 days ago</p>
                                                    </div>
                                                    <p>
                                                        Donec aliquam ex ut odio dictum, ut consequat leo interdum.
                                                        Aenean nunc
                                                        ipsum, blandit eu enim sed, facilisis convallis orci. Etiam
                                                        commodo
                                                        lectus
                                                        quis vulputate tincidunt. Mauris tristique velit eu magna
                                                        maximus
                                                        condimentum.
                                                    </p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="comment-img">
                                                    <img src="https://via.placeholder.com/100x100" alt="img">
                                                </div>
                                                <div class="comment-desc">
                                                    <div class="desc-top">
                                                        <h6 class="name"><a href="JavaScript:Void(0);">Arista Williamson</a></h6>
                                                        <ul class="rating-star">
                                                            <li><i class="lni lni-star-filled"></i></li>
                                                            <li><i class="lni lni-star-filled"></i></li>
                                                            <li><i class="lni lni-star-filled"></i></li>
                                                            <li><i class="lni lni-star-filled"></i></li>
                                                            <li><i class="lni lni-star-filled"></i></li>
                                                        </ul>
                                                        <p class="time">5 days ago</p>
                                                    </div>
                                                    <p>
                                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                                        sed do eiusmod
                                                        tempor incididunt ut labore et dolore magna aliqua. Ut enim
                                                        ad minim
                                                        veniam.
                                                    </p>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="comment-form">
                                        <h3 class="comment-reply-title">Add a review</h3>
                                        <form action="#" method="POST">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-12 col-12">
                                                    <div class="form-box form-group">
                                                        <input type="text" name="#"
                                                            class="form-control form-control-custom"
                                                            placeholder="Your Name" />
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-12">
                                                    <div class="form-box form-group">
                                                        <input type="email" name="#"
                                                            class="form-control form-control-custom"
                                                            placeholder="Your Email" />
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-box form-group">
                                                        <textarea name="#" rows="6"
                                                            class="form-control form-control-custom"
                                                            placeholder="Your Comments"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="button">
                                                        <button type="submit" class="btn">Submit review<span class="dir-part"></span></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
            <!-- End Course Details Wrapper -->
            <!-- Start Course Sidebar -->
            <div class="col-lg-4 col-12">
                <div class="course-sidebar">
                    <div class="sidebar-widget">
                        <h3 class="sidebar-widget-title">Search</h3>
                        <div class="sidebar-widget-content">
                            <div class="sidebar-widget-search">
                                <form action="#">
                                    <input type="text" placeholder="Search...">
                                    <button><i class="lni lni-search-alt"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="sidebar-widget other-course-wedget">
                        <h3 class="sidebar-widget-title">Recent Courses</h3>
                        <div class="sidebar-widget-content">
                            <ul class="sidebar-widget-course">
                                <?php foreach($recent_courses as $rc): ?>
                                    <li class="single-course">
                                        <div class="thumbnail">
                                            <a href="<?= base_url('website/Courses/course_details/'.rtrim(base64_encode($rc->offered_course_id),'=')); ?>" class="image"><img
                                                    src="<?= base_url('uploads/course_images/'.$rc->course_thumbnail); ?>" alt="Course Image"></a>
                                        </div>
                                        <div class="info">
                                            <!-- <span class="price">$40<span>.00</span></span> -->
                                            <h6 class="title"><a href="<?= base_url('website/Courses/course_details/'.rtrim(base64_encode($rc->offered_course_id),'=')); ?>"><?= $rc->name; ?></a></h6>
                                        </div>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Course Sidebar -->
        </div>
    </div>
</div>
<!-- Course Details Section End -->