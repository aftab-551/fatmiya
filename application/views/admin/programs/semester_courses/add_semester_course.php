<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content">
        <!-- Semester Courses ADD -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Add Semester Course</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                </div>
            </div><!-- /.box-header -->
            <div class="box-body">
                <?= form_open(base_url('admin/Programs/add_semester_course'), 'role="form" name="add_semester_course"') ?>
                    <div class="row">
                        <div class="col-md-12">
                            <?php if (validation_errors()): ?>
                                <div class="alert alert-danger">
                                    <strong>Validation Error!</strong> <?= validation_errors(); ?>
                                </div>
                            <?php elseif (isset($fail)): ?>
                                <div class="alert alert-danger">
                                    <strong>Error!</strong> <?= $fail; ?>
                                </div>
                            <?php elseif(isset($success)): ?>
                                <div class="alert alert-success">
                                    <strong>Alert!</strong> <?= $success; ?>
                                </div>
                            <?php endif; ?>
                            
                            <div class="form-group">
                                <label for="program">Program</label>
                                <input type="text" id="program" class="form-control" value="<?= $info->name; ?>" disabled>
                            </div>

                            <div class="form-group">
                                <label for="semester">Semester #</label>
                                <input type="text" id="semester" class="form-control" value="<?= $info->semester_number; ?>" disabled>
                            </div>

                            <div class="form-group">
                                <label for="courses">Courses Name / Code</label>
                                <select name="course_id" id="courses" class="select2" style="width: 100%; padding-left:0; margin-top: -4px;">
                                    <option value="">Select One</option>
                                    <?php foreach($courses as $c): ?>
                                        <option value="<?= $c->id; ?>" <?php if(isset($c_id)): ?> <?= $c->id == $c_id ? 'selected' : '';  ?> <?php endif; ?>><?= $c->name.' / '. $c->code; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <input type="hidden" name="semester_id" value="<?= isset($semester_id) ? $semester_id : ''; ?>">
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