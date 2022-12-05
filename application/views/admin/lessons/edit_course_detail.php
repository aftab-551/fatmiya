<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content">

        <!-- slider ADD -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Edit Course Details </h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                </div>
            </div><!-- /.box-header -->
            <?= form_open_multipart(base_url('admin/Lessons/update_course_detail/'.rtrim(base64_encode($detail->id))),
             'role="form" name="edit_course_detail"') ?>
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
                                <label for="lesson-id">Select Activity</label>
                                <select name="activity" id="activity" class="select2" style="width: 100%; padding-left:0; margin-top: -4px;">
                                    <option value="<?= set_value('activity', $detail->activity); ?>">Select One</option>
                                    <option value="Assignment">Assignment</option>
                                    <option value="Quiz">Quiz</option>
                                    <option value="Exam">Exam</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="name">Activity Name</label>
                                <input name="activityname" value="<?= set_value('activityname', $detail->activity_name); ?>" type="text" data-minlength="4" class="form-control" id="activityname" placeholder="Enter Enter Activity Name" required>
                            </div>

                            <div class="form-group">
                                <label for="name">Marks</label>
                                <input name="marks" value="<?= set_value('marks',$detail->marks); ?>" type="number" data-minlength="4" class="form-control" id="marks" placeholder="Enter marks" required>
                            </div>
                            <div class="form-group">
                                <label for="name">Percentage</label>
                                <input name="percent" value="<?= set_value('percent',$detail->percentage); ?>" type="number" data-minlength="4" class="form-control" id="percentage" placeholder="Enter percentage" required>
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