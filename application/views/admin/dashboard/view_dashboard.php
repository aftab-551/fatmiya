<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content">
        <div class="row">
            <!-- <div class="col-md-3 col-sm-6 col-xs-12"> -->
                <!-- Apply any bg-* class to to the info-box to color it -->
                <!-- <div class="info-box bg-red">
                    <span class="info-box-icon"><i class="fa fa-comments-o"></i></span>
                    <div class="info-box-content">
                    <span class="info-box-text">Likes</span>
                    <span class="info-box-number">41,410</span> -->
                    <!-- The progress section is optional -->
                    <!-- <div class="progress">
                        <div class="progress-bar" style="width: 70%"></div>
                    </div>
                    <span class="progress-description">
                        70% Increase in 30 Days
                    </span>
                    </div> -->
                    <!-- /.info-box-content -->
                <!-- </div> -->
                <!-- /.info-box -->
            <!-- </div> -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-blue"><i class="ion ion-ios-person-outline"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Verified Students</span>
                        <span class="info-box-number"><?= $verified_students; ?></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-red"><i class="ion ion-ios-person-outline"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Non Verified Students</span>
                        <span class="info-box-number"><?= $non_verified_students; ?></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-blue"><i class="ion ion-ios-person-outline"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Active Teachers</span>
                        <span class="info-box-number"><?= $active_teachers; ?></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-red"><i class="ion ion-ios-person-outline"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Deactive Teachers</span>
                        <span class="info-box-number"><?= $deactive_teachers; ?></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-blue"><i class="ion ion-ribbon-a"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Programs</span>
                        <span class="info-box-number"><?= $active_programs; ?></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-blue"><i class="ion ion-ios-book-outline"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Offered Courses</span>
                        <span class="info-box-number"><?= $active_offered_courses; ?></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-blue"><i class="ion ion-ios-book-outline"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Courses</span>
                        <span class="info-box-number"><?= $active_courses; ?></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-blue"><i class="ion ion-ios-people-outline"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Events</span>
                        <span class="info-box-number"><?= $active_events; ?></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-blue"><i class="ion ion-ios-paper-outline"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Blog Posts</span>
                        <span class="info-box-number"><?= $active_blog_posts; ?></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-blue"><i class="ion ion-arrow-swap"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Sliders</span>
                        <span class="info-box-number"><?= $active_sliders; ?></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-blue"><i class="ion ion-image"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Total Gallery Images</span>
                        <span class="info-box-number"><?= $gallery_images; ?></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
            <!-- /.info-box -->
            </div>
        </div>
    </section>
</div>