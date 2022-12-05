<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content">
        <!-- Semester Edit -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Add Semester</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                </div>
            </div><!-- /.box-header -->
            <div class="box-body">
                <?= form_open(base_url('admin/Programs/update_semester/'.rtrim(base64_encode($semester->id),'=')), 'role="form" name="edit_semester"') ?>
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
                                <label for="programs">Programs</label>
                                <select name="program_id" id="programs" class="select2" style="width: 100%; padding-left:0; margin-top: -4px;">
                                    <option value="">Select One</option>
                                    <?php foreach($programs as $p): ?>
                                        <option value="<?= $p->id; ?>" <?php if(isset($p_id)): ?> <?= $p->id == $p_id ? 'selected' : '';  ?><?php else: ?><?= $semester->program_id == $p->id ? 'selected' : ''; ?><?php endif; ?>><?= $p->name ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="semester-number">Semester</label>
                                <input type="number" class="form-control" name="semester_number" id="semester-number" value="<?= set_value('semester_number', $semester->semester_number); ?>" placeholder="Semester Number" required>
                            </div>

                            <div class="form-group">
                                <label for="start">Start Date</label>
                                <input type="date" class="form-control" name="start_date" id="start" value="<?= set_value('start_date', $semester->start_date); ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="end">End Date</label>
                                <input type="date" class="form-control" name="end_date" id="end" value="<?= set_value('end_date', $semester->end_date); ?>" required>
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