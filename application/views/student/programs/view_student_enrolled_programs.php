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
            <?php foreach($programs as $program): ?>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <!-- Apply any bg-* class to to the info-box to color it -->
                    <div class="info-box bg-blue">
                        <span class="info-box-icon"><i class="fa fa-book"></i></span>
                        <div class="info-box-content">
                            <div>
                                <br><span class="text-bold"><a class="bg-blue" href="<?= base_url('student/Programs/view_program_semesters/'.rtrim(base64_encode($program->program_id),'=')); ?>" class="text-white"><?= $program->program_name; ?></a></span>
                                <!-- <span class="info-box-number">41,410</span> -->
                            </div>
                        <!-- The progress section is optional -->
                        <!-- <div class="progress">
                            <div class="progress-bar" style="width: 70%"></div>
                        </div> -->
                        <!-- <span class="progress-description">
                            70% Increase in 30 Days
                        </span> -->
                        </div><!-- /.info-box-content -->
                    </div><!-- /.info-box -->
                </div>
            <?php endforeach; ?>
        </div>
    </section>
</div>