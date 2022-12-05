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
            <?php foreach($courses as $course): ?>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="box box-widget widget-user">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header bg-aqua-active">
                            <h3 class="widget-user-username"><a style="color:white;" href="<?= base_url('student/learn/'.rtrim(base64_encode($course->offered_course_id),'=')); ?>" class="text-white"><?= $course->course_name; ?></a></h3>
                            <h5 class="widget-user-desc"><?= $course->program_name; ?></h5>
                        </div>
                        <div class="box-footer">
                            <div class="row">
                                <div class="col-sm-6 border-right">
                                    <div class="description-block">
                                        <h5 class="description-header">Semester #</h5>
                                        <span class="description-text"><?= $course->semester_number; ?></span>
                                    </div>
                                <!-- /.description-block -->
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-6">
                                    <div class="description-block">
                                        <h5 class="description-header">Teacher</h5>
                                        <span class="description-text"><?= $course->teacher_name; ?></span>
                                    </div>
                                <!-- /.description-block -->
                                </div>
                                <!-- /.col -->
                                <!-- <div class="col-sm-4">
                                    <div class="description-block">
                                        <h5 class="description-header">35</h5>
                                        <span class="description-text">PRODUCTS</span>
                                    </div> -->
                                <!-- /.description-block -->
                                <!-- </div> -->
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