<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content">
        <!-- CATEGORY ADD -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Settings</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                </div>
            </div><!-- /.box-header -->
            <div class="box-body">
                <?= form_open_multipart(base_url('admin/Settings/update_settings'), 'role="form" data-toggle="validator"') ?>
                    <div class="row">
                        <div class="col-md-12">
                            <?php if (validation_errors()): ?>
                                <div class="alert alert-danger">
                                    <strong>Validation Error!</strong> <?= validation_errors(); ?>
                                </div>
                            <?php elseif($this->session->userdata('image_error')): ?>
                                <div class="alert alert-danger">
                                        <strong>Image Error!</strong> <?= $this->session->userdata('image_error'); ?>
                                </div>
                            <?php elseif($this->session->userdata('success')): ?>
                                <div class="alert alert-success">
                                        <strong>Alert!</strong> <?= $this->session->userdata('success'); ?>
                                </div>
                            <?php endif; ?>

                            <?php foreach($settings as $value): ?>

                                <div class="form-group">
                                    <label for="institute-name">Name*</label>
                                    <input name="institute_name" value="<?= $value->name ?>" type="text" minlength="3" maxlength="30" class="form-control" id="institute-name" placeholder="Enter Institute Name" required>
                                    <div class="help-block with-errors"></div>
                                    <?php echo form_error('institute_name'); ?>
                                </div>

                                <div class="form-group">
                                    <label for="description">Description*</label>
                                    <input name="description" value="<?= $value->description ?>" type="text" minlength="10" maxlength="300" class="form-control" id="description" placeholder="Enter Description" required>
                                    <div class="help-block with-errors"></div>
                                    <?php echo form_error('description'); ?>
                                </div>

                                <div class="form-group">
                                    <label for="address">Address*</label>
                                    <input name="address" value="<?= $value->address ?>" type="text" data-minlength="3" class="form-control" id="category" placeholder="Enter Address" required>
                                    <div class="help-block with-errors"></div>
                                    <?php echo form_error('address'); ?>
                                </div>

                                <div class="form-group">
                                    <label for="phone">Phone*</label>
                                    <input name="phone" value="<?= $value->phone ?>" type="text" data-minlength="3" class="form-control" id="category" placeholder="Enter Phone" required>
                                    <div class="help-block with-errors"></div>
                                    <?php echo form_error('phone'); ?>
                                </div>

                                <div class="form-group">
                                    <label for="email">Email*</label>
                                    <input name="email" value="<?= $value->email ?>" type="email" data-minlength="3" class="form-control" id="category" placeholder="Enter Email" required>
                                    <div class="help-block with-errors"></div>
                                    <?php echo form_error('email'); ?>
                                </div>

                                <div class="form-group">
                                    <label for="intro-video">Intro Video*</label>
                                    <input name="intro_video" value="<?= $value->intro_video ?>" type="url" class="form-control" id="intro-video" placeholder="Enter Video Embed URL" required>
                                    <div class="help-block with-errors"></div>
                                    <?php echo form_error('intro_video'); ?>
                                </div>

                                <div class="form-group">
                                    <label for="maps-embed-link">Google Maps Embed Link*</label>
                                    <input name="maps_embed_link" value="<?= $value->maps_embed_link ?>" type="url" class="form-control" id="maps-embed-link" placeholder="Paste Google Maps Embed URL" required>
                                    <div class="help-block with-errors"></div>
                                    <?php echo form_error('maps_embed_link'); ?>
                                </div>

                                <div class="form-group">
                                    <label for="image">About Us Image</label>
                                    <input type="file" id="image" name="image">
                                    <p>Size 1200 x 960</p>
                                    <div class="help-block with-errors"></div>
                                    <?php echo form_error('image'); ?>
                                    <p id="add_image_error"></p>
                                </div>

                                <div class="form-group">
                                    <label for="student-initial">Student Initial*</label>
                                    <input name="student_initial" value="<?= $value->student_initial ?>" type="text" data-minlength="3" class="form-control" id="student-initial" placeholder="Enter Initial" required>
                                    <div class="help-block with-errors"></div>
                                    <?php echo form_error('student_initial'); ?>
                                </div>

                                <div class="form-group">
                                    <label for="student-counter">Student Counter</label>
                                    <input value="<?= $value->student_counter ?>" type="text" class="form-control" id="student-counter" disabled>
                                </div>

                                <div class="form-group">
                                    <label for="teacher-initial">Teacher Initial*</label>
                                    <input name="teacher_initial" value="<?= $value->teacher_initial ?>" type="text" data-minlength="3" class="form-control" id="teacher-initial" placeholder="Enter Initial" required>
                                    <div class="help-block with-errors"></div>
                                    <?php echo form_error('teacher_initial'); ?>
                                </div>

                                <div class="form-group">
                                    <label for="teacher-counter">Teacher Counter</label>
                                    <input value="<?= $value->teacher_counter ?>" type="text" class="form-control" id="teacher-counter" disabled>
                                </div>

                                <input type="hidden" name="id" value="<?=  rtrim(base64_encode($value->id_settings),'=');?>" ?>
                            <?php endforeach; ?>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                <?= form_close(); ?>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </section><!-- /.content -->
</div>

<script type="text/javascript">
    $(document).ready(function () {
        var icon = document.getElementById('image');

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