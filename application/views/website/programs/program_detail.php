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
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="overview" role="tabpanel"
                        aria-labelledby="overview-tab">
                        <div class="course-overview">
                            <h3 class="title">About This Program</h3>
                            <p><span><?= $program->description; ?></span></p>
                            <!-- <div class="overview-course-video">
                                <iframe title="<?= $program->name; ?>"
                                    src="<?= $course->intro_video_url; ?>"></iframe>
                            </div> -->
                            <div class="bottom-content">
                                <div class="row align-items-center">
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="button">
                                            <a href="<?= base_url('student/Programs/enroll_program/'.rtrim(base64_encode($program->id),'=')) ?>" class="btn">Enroll in Program</a>
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
                                <?php foreach($semester as $s): ?>
                                    <li class="single-curriculum-section">
                                        <div class="section-header">
                                            <div class="section-left">
                                                <h5 class="title">Semester <?= $s->semester_number; ?></h5>
                                            </div>
                                        </div>
                                        <ul class="section-content">
                                            <?php foreach($semester_courses as $sc): ?>
                                                <?php if($sc->semester_id == $s->id): ?>
                                                    <li class="course-item">
                                                        <a class="section-item-link lesson" href="JavaScript:Void(0);">
                                                            <span class="item-name"><?= $sc->name; ?></span>
                                                            <div class="course-item-meta">
                                                                <!-- <span class="item-meta duration"><?= $sl->duration; ?></span> -->
                                                                <!-- <span class="item-meta item-meta-icon video">
                                                                    <i class="lni lni-video"></i>
                                                                </span> -->
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
                                            <a href="<?= base_url('student/Programs/enroll_program/'.rtrim(base64_encode($program->id),'=')) ?>" class="btn">Enroll in Program</a>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <ul class="share">
                                            <li><span>Share this Program:</span></li>
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
                </div>
            </div>
            <!-- End Course Details Wrapper -->
            <!-- Start Course Sidebar -->
            <div class="col-lg-4 col-12">
                <div class="course-sidebar">
                    <!-- <div class="sidebar-widget">
                        <h3 class="sidebar-widget-title">Search</h3>
                        <div class="sidebar-widget-content">
                            <div class="sidebar-widget-search">
                                <form action="#">
                                    <input type="text" placeholder="Search...">
                                    <button><i class="lni lni-search-alt"></i></button>
                                </form>
                            </div>
                        </div>
                    </div> -->
                    <div class="sidebar-widget other-course-wedget">
                        <h3 class="sidebar-widget-title">Recent Programs</h3>
                        <div class="sidebar-widget-content">
                            <ul class="sidebar-widget-course">
                                <?php foreach($recent_programs as $rp): ?>
                                    <li class="single-course">
                                        <div class="thumbnail">
                                            <a href="<?= base_url('program/program-details/'.rtrim(base64_encode($rp->id),'=')); ?>" class="image"><img
                                                    src="<?= base_url('uploads/program_images/'.$rp->program_thumbnail); ?>" alt="Program Image" height="50" width="50"></a>
                                        </div>
                                        <div class="info">
                                            <span class="price" style="visibility: hidden;">$40<span>.00</span></span>
                                            <h6 class="title"><a href="<?= base_url('program/program-details/'.rtrim(base64_encode($rp->id),'=')); ?>"><?= $rp->program_name; ?></a></h6>
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