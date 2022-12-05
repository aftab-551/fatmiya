<link rel="stylesheet" href="<?= base_url('admin_assets/plugins/select2/select2.min.css') ?>">

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content">

        <!-- slider ADD -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Add Course Details</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                </div>
            </div><!-- /.box-header -->
            <div class="box-body">
                <?= form_open(base_url('admin/Lessons/add_course_detail'), 'role="form" name="add_course_detail"') ?>
                    <div class="row">
                        <div class="col-md-12">
                            <?php if (validation_errors()): ?>
                                <div class="alert alert-danger">
                                    <strong>Validation Error!</strong> <?= validation_errors(); ?>
                                </div>
                            <?php elseif(isset($success)): ?>
                                <div class="alert alert-success">
                                    <strong>Alert!</strong> <?= $success; ?>
                                </div>
                            <?php endif; ?>
                            
                            <div class="form-group">
                                <label for="course-id">offered Courses ID/Course/Course Code/Program/Semester</label>
                                <select name="course_id" id="course-id" class="select2" style="width: 100%; padding-left:0; margin-top: -4px;">
                                    <option value="">Select One</option>
                                    <?php foreach($detail as $d): ?>
                                        <option value="<?= $d->offered_coursesid; ?>" <?php if(isset($course_id)): ?> <?= $d->offered_coursesid == $course_id ? 'selected' : '';  ?> <?php endif; ?>><?= $d->offered_coursesid.' / '.$d->course_name.' / '. $d->course_code.' / '. $d->program_name.' / '.$d->semester_number; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="lesson-id">Select Activity</label>
                                <select name="activity" id="activity" class="select2" style="width: 100%; padding-left:0; margin-top: -4px;">
                                    <option value="">Select One</option>
                                    <option value="Assignment">Assignment</option>
                                    <option value="Quiz">Quiz</option>
                                    <option value="Exam">Exam</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="name">Activity Name</label>
                                <input name="activityname" value="<?= set_value('activityname'); ?>" type="text" data-minlength="4" class="form-control" id="activityname" placeholder="Enter Enter Activity Name" required>
                            </div>

                            <div class="form-group">
                                <label for="name">Marks</label>
                                <input name="marks" value="<?= set_value('marks'); ?>" type="number" data-minlength="4" class="form-control" id="marks" placeholder="Enter marks" required>
                            </div>
                            <div class="form-group">
                                <label for="name">Percentage</label>
                                <input name="percent" value="<?= set_value('percent'); ?>" type="number" data-minlength="4" class="form-control" id="percentage" placeholder="Enter percentage" required>
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

<script src="<?= base_url('admin_assets/plugins/select2/select2.min.js') ?>"></script>

<script>
    $('.select2').select2();
</script>