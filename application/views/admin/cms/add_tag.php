<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content">
        <!-- Tag ADD -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Add Tag</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                </div>
            </div><!-- /.box-header -->
            <div class="box-body">
                <?= form_open_multipart(base_url('admin/Tags/add_tag'), 'role="form" name="add_tag" id="add_tag"') ?>
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
                                <label for="tag-name">Tag Name</label>
                                <input name="tag_name" value="<?= set_value('tag_name'); ?>" type="text" data-minlength="4" class="form-control" id="tag-name" placeholder="Enter Tag Name" required>
                                <div class="help-block with-errors"></div>
                            </div>
                            
                            
                            <div class="form-group">
                                <label for="slug">Tag Slug</label>
                                <input name="slug" value="<?= set_value('slug'); ?>" type="text" class="form-control" pattern="[a-zA-Z\-]{4,}" id="slug" placeholder="Enter Slug" title="The slug can only contain a '-', no other characters including space is allowed and it must be unique" required>
                                <p style="font-size: 12px; margin-top: 5px;"><span>The slug can only contain <b>-</b>, no other characters including space is allowed and it must be unique</span></p>
                                <div class="help-block with-errors"></div>
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

<script>
    $(document).ready(function (){
        $('#add_tag').validator();
    });
</script>