<link rel="stylesheet" href="<?= base_url('admin_assets/plugins/select2/select2.min.css') ?>">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content">

        <!-- slider ADD -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Edit Lesson</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                </div>
            </div><!-- /.box-header -->
            <div class="box-body">
                <?= form_open_multipart(base_url('admin/Syllabus/update_syllabus/'.rtrim(base64_encode($syllabus->id),'=')), 'role="form" name="edit_syllabus"') ?>
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
                                <label for="course">Course</label>
                                <select name="course_id" id="course" class="select2" style="width: 100%; padding-left:0; margin-top: -4px;">
                                    <option value="">Select One</option>
                                    <?php foreach($course as $c): ?>
                                        <option value="<?= $c->id; ?>"<?php if(isset($course_id)): ?><?= $c->id == $course_id ? 'selected' : '';  ?><?php else: ?><?= $c->id == $syllabus->course_id ? 'selected' : ''; ?><?php endif; ?> ><?= $c->name.'/'. $c->code ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="name">Chapter Title</label>
                                <input name="title" value="<?= set_value('title', $syllabus->title); ?>" type="text" data-minlength="4" class="form-control" id="name" placeholder="Enter name" required>
                            </div>
                            
                            
                            <div class="form-group">
                                <label for="desc">Chapter Description</label>
                                <input name="short_desc" value="<?= set_value('short_desc',$syllabus->description); ?>" type="text" class="form-control" id="desc" placeholder="Enter Description" required>
                            </div>

                            <div class="form-group">
                                <label for="week-number">Week Number</label>
                                <input name="week_number" value="<?= set_value('week_number',$syllabus->week_number); ?>" type="number" class="form-control" id="week-number" placeholder="Enter Week Number" required>
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