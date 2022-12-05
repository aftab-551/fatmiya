<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content">

        <!-- slider ADD -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Add Teacher</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                </div>
            </div><!-- /.box-header -->
            <div class="box-body">
                <?= form_open_multipart(base_url('admin/Teachers/add_teachers'), 'role="form" name="add_teacher"') ?>
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
                            <?php elseif($this->session->userdata('success')): ?>
                                <div class="alert alert-success">
                                    <strong>Alert!</strong> <?= $this->session->userdata('success'); ?>
                                </div>
                            <?php endif; ?>
                            
                            <div class="form-group has-feedback">
                                <label for="name">Teacher Name</label>
                                <input name="teacher_name" value="<?= set_value('teacher_name'); ?>" type="text" class="form-control" id="name" placeholder="Enter name" required>
                            </div>

                            <div class="form-group has-feedback">
                                <label for="details">Teacher Details</label>
                                <input name="teacher_details" value="<?= set_value('teacher_details'); ?>" type="text" class="form-control" id="details" placeholder="Enter name" required>
                            </div>

                            <div class="form-group has-feedback">
                                <label for="address">Teacher Address</label>
                                <input name="teacher_address" value="<?= set_value('teacher_address'); ?>" type="text" class="form-control" id="address" placeholder="Enter address" required>
                            </div>

                            <div class="form-group">
                                <label for="city">Teacher City</label>
                                <input name="teacher_city" value="<?= set_value('teacher_city'); ?>" type="text" class="form-control" id="city" placeholder="Enter city" required>
                            </div>

                            <div class="form-group">
                                <label for="contact">Teacher Contact</label>
                                <input name="teacher_contact" value="<?= set_value('teacher_contact'); ?>" type="number" class="form-control" id="contact" placeholder="Enter contact" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="qualification">Teacher Qualification</label>
                                <input name="teacher_qualification" value="<?= set_value('teacher_qualification'); ?>" type="text" class="form-control" id="qualification" placeholder="Enter qualification" required>
                            </div>

                            <div class="form-group">
                                <label for="facebook">Facebook Account</label>
                                <input name="facebook_id" value="<?= set_value('facebook_id'); ?>" type="text" class="form-control" id="facebook" placeholder="Paste Facebook Link" required>
                            </div>

                            <div class="form-group">
                                <label for="instagram">Instagram Account</label>
                                <input name="instagram_id" value="<?= set_value('instagram_id'); ?>" type="text" class="form-control" id="instagram" placeholder="Paste Instagram Link">
                            </div>

                            <div class="form-group">
                                <label for="youtube">Youtube Account</label>
                                <input name="youtube_id" value="<?= set_value('youtube_id'); ?>" type="text" class="form-control" id="youtube" placeholder="Paste Youtube Link">
                            </div>

                            <div class="form-group">
                                <label for="twitter">Twitter Account</label>
                                <input name="twitter_id" value="<?= set_value('twitter_id'); ?>" type="text" class="form-control" id="twitter" placeholder="Paste Twitter Link">
                            </div>

                            <div class="form-group">
                                <label for="teacher-image">Teacher Image</label>
                                <input type="file" id="teacher-image" name="teacher_image" required>
                                <p>Size 800 x 1020</p>
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

<script type="text/javascript">
    $(document).ready(function () {
        var icon = document.getElementById('teacher-image');

        icon.onchange = function (e) {
            var file = this.files[0];
            if ('size' in file) {
                if (file.size > 200000000)
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