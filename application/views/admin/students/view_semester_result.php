<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content">

        <!-- slider ADD -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">View Semester Result</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                </div>
            </div><!-- /.box-header -->
            <div class="box-body">
                <?= form_open(base_url('admin/Students/view_semester_result'), 'role="form" name="add_course_detail"') ?>
                    <div class="row">
                        <div class="col-md-12">
                        <?php if ($this->session->userdata('success')): ?>
                            <div class="alert alert-success">
                                <strong>Alert!</strong> <?= $this->session->userdata('success'); ?>
                            </div>
                        <?php elseif ($this->session->userdata('fail')): ?>
                            <div class="alert alert-danger">
                                <strong>Error!</strong> <?= $this->session->userdata('fail'); ?>
                            </div>
                        <?php endif; ?>
                            <?php if (validation_errors()): ?>
                                <div class="alert alert-danger">
                                    <strong>Validation Error!</strong> <?= validation_errors(); ?>
                                </div>
                            <?php elseif(isset($success)): ?>
                                <div class="alert alert-success">
                                    <strong>Alert!</strong> <?= $success; ?>
                                </div>
                            <?php endif; ?>
                            <!-- <div class="form-group">
                                <label for="name"> Enter Teacher ID</label>
                                <input name="teacherid"  type="number" data-minlength="4" class="form-control" id="name" placeholder="Enter Teacher ID" required>
                            </div> -->
                                
                            <div class="form-group">
                                <label for="name">Enter Student ID</label>
                                <input name="studentID"  type="number" data-minlength="4" class="form-control" id="name" placeholder="Enter Course ID" required>
                            </div>
                            <div class="form-group">
                                <label for="name">Enter Semester Number</label>
                                <input name="semesterNO"  type="number" data-minlength="4" class="form-control" id="name" placeholder="Enter Course ID" required>
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                <?= form_close() ?>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </section><!-- /.content -->
</div>