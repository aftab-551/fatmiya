<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content">
        <!-- Program ADD -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Add Program</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                </div>
            </div><!-- /.box-header -->
            <div class="box-body">
                <?= form_open_multipart(base_url('admin/Programs/add_program'), 'role="form" name="add_program"') ?>
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
                            
                            <div class="form-group">
                                <label for="program-name">Program Name</label>
                                <input name="name" value="<?= set_value('name'); ?>" type="text" class="form-control" id="program-name" placeholder="Enter name" required>
                            </div>

                            <div class="form-group">
                                <label for="program-description">Program Description</label>
                                <textarea id="editor" name="description"><?= isset($program_description) ? "$program_description" : "&lt;p&gt;This is some sample content.&lt;/p&gt;" ?></textarea>
                            </div>

                            <div class="form-group">
                                <label for="program-thumbnail">Program Thumbnail</label>
                                <input type="file" id="program-thumbnail" name="program_thumbnail" required>
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

<!-- CKEditor -->
<script src="<?=base_url();?>admin_assets/plugins/ckeditor5/build/ckeditor.js"></script>

<script>
    ClassicEditor
    .create( document.querySelector( '#editor' ), { 
        removePlugins: ['Markdown','TodoList','Image', 'Insertimage', 'HtmlEmbed', 'MediaEmbed'],
    } )
    .catch( error => {
        console.error( error );
    } );
</script>

<!-- <script type="text/javascript">
    $(document).ready(function () {
        var icon = document.getElementById('program-thumbnail');

        icon.onchange = function (e) {
            var file = this.files[0];
            // alert(file);
            if ('size' in file) {
                // alert(file.size);
                if (file.size > 200000000)
                {
                    $("#add_image_error").html('Error: File Size Error.');
                    this.value = '';
                    $("[name='program_thumbnail']").focus();
                    return false;
                }
            }

            var ext = this.value.match(/\.([^\.]+)$/)[1];
            switch (ext)
            {
                case 'jpg':
                case 'JPG':
                case 'jpeg':
                case 'png':
                    break;
                default:
                    $("#add_image_error").html('Error: Incorrect format. Only jpg,jpeg,png are allowed.');
                    //$("#cat_image_error").show();

                    this.value = '';
                    $("[name='program_thumbnail']").focus();
            }
        };
    });
</script> -->