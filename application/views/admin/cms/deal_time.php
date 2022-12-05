<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content">

        <!-- CATEGORY ADD -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Add Deal Time</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                </div>
            </div><!-- /.box-header -->
            <div class="box-body">
                <form id="add_category" name="add_category" method="post" role="form" enctype="multipart/form-data" >
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
                                <label for="category">Category Name*</label>
                                <input name="category" value="<?= set_value('category'); ?>" type="category" data-minlength="3" class="form-control" id="category" placeholder="Enter category" required>
                                <div class="help-block with-errors"></div>
                                <?php echo form_error('category'); ?>
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
        document.add_category.action = get_action();
    }

    function get_action() {
        return '<?= base_url(); ?>admin/Categories/insert_category';
    }
</script>