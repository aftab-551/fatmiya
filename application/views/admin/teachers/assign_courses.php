<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content">

        <!-- Assign Courses -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Assign Courses</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                </div>
            </div><!-- /.box-header -->
            <div class="box-body">
                <?= form_open(base_url('admin/Teachers/assign_course'), 'role="form" name="assign_course" id="assign_course"') ?>
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
                                <input name="teacher_name" value="<?= set_value('teacher_name', $teacher->name); ?>" type="text" class="form-control" id="name" placeholder="Enter name" required disabled>
                                <div class="help-block with-errors"></div>
                                <input type="hidden" name="teacher_id" value="<?= $teacher->id; ?>">
                            </div>

                            <div class="form-group">
                                <label>Program/Semester #/Course</label>
                                <select name="courses[]" class="form-control select2" style="width: 100%;" required="" multiple="multiple">
                                    <option value="">Select</option>
                                    <?php foreach($courses as $course): ?>
                                    <option value="<?= $course->id; ?>"><?= $course->program_name.' / Semester #'.$course->semester_number.' / '.$course->course_name;?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            
                            <!-- <div class="form-group">
                                <label>Batch</label>
                                <select name="batch" class="form-control select2" style="width: 100%;" required="">
                                    <option value="">Select</option>
                                    <?php foreach($batches as $batch): ?>
                                    <option value="<?= $batch->id; ?>"><?= $batch->number;?></option>
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
        $('.select2').select2();
    });
</script>
