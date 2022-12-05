<link rel="stylesheet" href="<?= base_url('admin_assets/plugins/select2/select2.min.css') ?>">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content">

        <!-- slider ADD -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Add Course</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                </div>
            </div><!-- /.box-header -->
            <div class="box-body">
                <?= form_open_multipart(base_url('admin/Courses/add_courses'), 'role="form" name="add_course"') ?>
                    <div class="row">
                        <div class="col-md-12">
                            <?php if (validation_errors()): ?>
                                <div class="alert alert-danger">
                                    <strong>Validation Error!</strong> <?= validation_errors(); ?>
                                </div>
                            <?php elseif(isset($image_error)): ?>
                                <div class="alert alert-danger">
                                    <strong>Image Error!</strong> <?= $image_error; ?>
                                </div>
                            <?php elseif(isset($success)): ?>
                                <div class="alert alert-success">
                                    <strong>Alert!</strong> <?= $success; ?>
                                </div>
                            <?php endif; ?>

                            <div class="form-group">
                                <label for="name">Course Name</label>
                                <input name="course_name" value="<?= set_value('course_name'); ?>" type="text" data-minlength="4" class="form-control" id="name" placeholder="Enter name" required>
                            </div>
                            
                             <div class="form-group">
                                <label for="code">Course Code</label>
                                <input name="course_code" value="<?= set_value('course_code'); ?>" type="text" data-minlength="3" class="form-control" id="code" placeholder="Enter link" required>
                            </div>

                            <div class="form-group">
                                <label for="sub-cat">Under Category/Sub Category</label>
                                <select name="sub_cat" id="sub-cat" class="select2" style="width: 100%; padding-left:0; margin-top: -4px;">
                                    <option value="">Select One</option>
                                    <?php foreach($sub_category as $sc): ?>
                                        <option value="<?= $sc->id_sub_categories; ?>" <?php if(isset($sc_id)): ?> <?= $sc->id_sub_categories == $sc_id ? 'selected' : '';  ?> <?php endif; ?>><?= $sc->category.' - '. $sc->name ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="desc">Short Description</label>
                                <input name="short_desc" value="<?= set_value('short_desc'); ?>" type="text" data-minlength="3" class="form-control" id="desc" placeholder="Enter Description" required>
                            </div>

                            <div class="form-group">
                                <label for="long-desc">Deatiled Description</label>
                                <input name="long_desc" value="<?= set_value('long_desc'); ?>" type="text" class="form-control" id="long-desc" placeholder="Enter Detailed Description" required>
                            </div>

                            <div class="form-group">
                                <label for="intro-video">Intro Video URL</label>
                                <input name="intro_video" value="<?= set_value('intro_video'); ?>" type="text" class="form-control" id="intro-video" placeholder="Enter link">
                            </div>
                                            
                            <div class="form-group">
                                <label for="featured">Feature Course</label>
                                <select id="featured" name="featured" class="form-control select2" style="width: 100%; padding-left:0; margin-top: -4px;" required>
                                    <option value="0" selected>0</option>
                                    <option value="1">1</option> 
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="course-thumbnail">Course Thumbnail</label>
                                <input type="file" id="course-thumbnail" name="course_thumbnail" required>
                                <p>Size 550 x 340</p>
                                <p id="add_image_error"></p>
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

<script type="text/javascript">
    $(document).ready(function () {
        var icon = document.getElementById('course-thumbnail');

        icon.onchange = function (e) {


            var file = this.files[0];

            if ('size' in file) {
                if (file.size > 2000000)
                {
                    $("#add_image_error").html('Error: File Size Error.');
                    this.value = '';
                    $("[name='cat_image']").focus();
                    return false;
                }
            }

            var ext = this.value.match(/\.([^\.]+)$/)[1];
            switch (ext)
            {
                case 'jpg':
                case 'jpeg':
                case 'png':
                    break;
                default:
                    $("#add_image_error").html('Error: Incorrect format. Only jpg,jpeg,png are allowed.');
                    //$("#cat_image_error").show();

                    this.value = '';
                    $("[name='cat_image']").focus();
            }
        };
    });
</script>