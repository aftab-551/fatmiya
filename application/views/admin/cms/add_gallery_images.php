<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content">
        <!-- Gallery ADD -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Add Gallery Images</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                </div>
            </div><!-- /.box-header -->
            <div class="box-body">
                <?= form_open_multipart(base_url('admin/Gallery/add_gallery_images'), 'role="form" name="add_images"') ?>
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
                            <?php elseif(isset($success)): ?>
                                <div class="alert alert-success">
                                        <strong>Alert!</strong> <?= $success; ?>
                                </div>
                            <?php endif; ?>

                            <div class="form-group">
                                <label for="gallery-images">Gallery Images</label>
                                <input type="file" id="gallery-images" name="gallery_images[]" multiple required>
                                <p>Size 1920 x 950 (W x H)</p>
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

<!-- <script type="text/javascript">
    $(document).ready(function () {
        var icon = document.getElementById('gallery-images');

        icon.onchange = function (e) {
            var file = this.files[0];
            // alert(file);
            if ('size' in file) {
                // alert(file.size);
                if (file.size > 200000000)
                {
                    $("#add_image_error").html('Error: File Size Error.');
                    this.value = '';
                    $("[name='gallery_images']").focus();
                    return false;
                }
            }

            var ext = this.value.match(/\.([^\.]+)$/)[1];
            switch (ext)
            {
                case 'jpg':
                case 'jpeg':
                case 'JPG':
                case 'JPEG':
                case 'png':
                    break;
                default:
                    $("#add_image_error").html('Error: Incorrect format. Only jpg,jpeg,png are allowed.');
                    //$("#cat_image_error").show();

                    this.value = '';
                    $("[name='gallery_images']").focus();
            }
        };
    });
</script> -->
