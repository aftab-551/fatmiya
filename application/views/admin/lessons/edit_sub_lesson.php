<link rel="stylesheet" href="<?= base_url('admin_assets/plugins/select2/select2.min.css') ?>">

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content">

        <!-- slider ADD -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Add Sub Lesson</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                </div>
            </div><!-- /.box-header -->
            <div class="box-body">
                <?= form_open(base_url('admin/Lessons/update_sub_lesson/'.rtrim(base64_encode($sl->id),'=')), 'role="form" name="update_sub_lesson"') ?>
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
                                <label for="lesson-id">Course/Code/Lesson</label>
                                <select name="lesson_id" id="lessons-id" class="select2" style="width: 100%; padding-left:0; margin-top: -4px;">
                                    <option value="">Select One</option>
                                    <?php foreach($lessons as $l): ?>
                                        <option value="<?= $l->id; ?>" <?php if(isset($lesson_id)): ?> <?= $l->id == $lesson_id ? 'selected' : '';  ?><?php else: ?><?= $l->id == $sl->lesson_id ? 'selected' : ''; ?><?php endif; ?>><?= $l->course_name.' / '. $l->course_code.' / '.$l->title; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="name">Title</label>
                                <input name="title" value="<?= set_value('title', $sl->title); ?>" type="text" data-minlength="4" class="form-control" id="name" placeholder="Enter name" required>
                            </div>
                            
                            
                            <div class="form-group">
                                <label for="video-url">Video URL</label>
                                <input name="video_url" value="<?= set_value('video_url', $sl->video_url); ?>" type="text" class="form-control" id="video-url" placeholder="Paste Video URL" required>
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