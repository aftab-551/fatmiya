<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content">
        <div class="row">
            <?php if ($this->session->userdata('fail')): ?>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="alert alert-danger">
                            <strong>Error!</strong> <?= $this->session->userdata('fail') ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <?php foreach($program_courses as $pc): ?>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <!-- Apply any bg-* class to to the info-box to color it -->
                    <div class="box box-widget widget-user">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header bg-aqua-active">
                            <h3 class="widget-user-username"><?= $pc->course_name; ?></h3>
                            <h5 class="widget-user-desc">Teacher: <?= $pc->teacher_name; ?></h5>
                        </div>
                        <div class="box-footer">
                            <div class="row">
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <div class="description-block">
                                        <span class="description-text"><a href="<?= base_url('student/Courses/enroll_course/'.rtrim(base64_encode($pc->offered_course_id),'=')); ?>" class="btn bg-black">Enroll</a></span>
                                    </div>
                                <!-- /.description-block -->
                                </div>
                                <!-- /.col -->
                            </div>
                        <!-- /.row -->
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
</div>