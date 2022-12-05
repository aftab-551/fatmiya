<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content">

        <!-- slider ADD -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Edit Assigned Course</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                </div>
            </div><!-- /.box-header -->
            <div class="box-body">
                <?= form_open(base_url('admin/Teachers/update_assigned_course/'.rtrim(base64_encode($assignment_details->id), '=')), 'role="form" name="assign_course" id="assign_course"') ?>
                    <div class="row">
                        <div class="col-md-12">
                            <?php if (validation_errors()): ?>
                                <div class="alert alert-danger">
                                    <strong>Validation Error!</strong> <?= validation_errors(); ?>
                                </div>
                            <?php elseif($this->session->userdata('success')): ?>
                            <div class="alert alert-success">
                                <strong>Alert!</strong> <?= $this->session->userdata('success'); ?>
                            </div>
                            <?php endif; ?>
                            
                            <div class="form-group">
                                <label for="name">Teacher Name*</label>
                                <select name="teacher" class="form-control teacher" style="width: 100%;" required>
                                    <option value="">Select</option>
                                    <?php foreach($teachers as $teacher): ?>
                                        <option value="<?= $teacher->id; ?>" <?= ($assignment_details->teacher_id == $teacher->id) ? 'selected' : ''; ?>><?= $teacher->name;?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Courses</label>
                                <select name="course" class="form-control course" style="width: 100%;" required>
                                    <option value="">Select</option>
                                    <?php foreach($courses as $course): ?>
                                        <option value="<?= $course->id; ?>" <?= ($assignment_details->course_id == $course->id) ? 'selected' : ''; ?>><?= $course->name;?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            
                            <!-- <div class="form-group">
                                <label>Batch</label>
                                <select name="batch" class="form-control batch" style="width: 100%;" required>
                                    <option value="">Select</option>
                                    <?php foreach($batches as $batch): ?>
                                    <option value="<?= $batch->id; ?>" <?= ($assignment_details->batch_id == $batch->id) ? 'selected' : ''; ?>><?= $batch->number;?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div> -->
                            <!-- <div class="form-group">
                                <label for="status">Course Status*</label>
                                <select id="status" name="course_status" class="form-control select2" style="width: 100%;" required="">
                                    <option value="">Select</option>
                                    <option value="0">0</option>
                                    <option value="1">1</option> 
                                </select>
                            </div> -->

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

<script type="text/javascript">
    $(document).ready(function() {
        $('.teacher').select2();
        $('.course').select2();
    });
</script>
