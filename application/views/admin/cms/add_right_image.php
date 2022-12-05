<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content">

        <!-- Right Image ADD -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Add Right Image</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                </div>
            </div><!-- /.box-header -->
            <div class="box-body">
                <form id="add_right_image" name="add_right_image" method="post" role="form" enctype="multipart/form-data" >
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
                                <label for="link">Slider Link*</label>
                                <input name="link" value="<?= set_value('link'); ?>" type="text" data-minlength="3" class="form-control" id="link" placeholder="Enter link" required>
                                <div class="help-block with-errors"></div>
                                <?php echo form_error('link'); ?>
                            </div>
                        
                            <div class="form-group">
                                <label for="right_image_image">Right Image Image *</label>
                                <input type="file" id="right_image_image" name="right_image_image" required>
                                <p class="help-block">Image for Right Image</p>
                                <p id="add_image_error"></p>
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div><!-- /.col -->

                    </div><!-- /.row -->
                </form>
            </div><!-- /.box-body -->

        </div><!-- /.box -->



    </section><!-- /.content -->
</div>
<!-- Page script -->
<script type="text/javascript">
    window.onload = function () {
        document.add_right_image.action = get_action();
    }

    function get_action() {
        return '<?= base_url(); ?>admin/Slider/insert_right_image';
    }
</script>
<script type="text/javascript">
    $(document).ready(function () {
        var icon = document.getElementById('right_image_image');

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