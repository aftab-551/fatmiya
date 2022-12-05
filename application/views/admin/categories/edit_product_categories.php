<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content">
        <!-- CATEGORY ADD -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Add Category</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                </div>
            </div><!-- /.box-header -->

            <div class="box-body">
                <?= form_open(base_url('admin/Categories/update_category'), 'role="form" name="edit_category"') ?>
                    <div class="row">
                        <div class="col-md-12">
                            <?php if (validation_errors()): ?>
                                <div class="alert alert-danger">
                                    <strong>Validation Error!</strong> <?= validation_errors(); ?>
                                </div>
                            <?php elseif ($this->session->userdata('fail')): ?>
                                <div class="alert alert-danger">
                                    <strong>Error!</strong> <?= $this->session->userdata('fail'); ?>
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

                            <div class="form-group">
                                <label for="category">Category Name*</label>
                                <input name="category" value="<?= $category->name ?>" type="category" data-minlength="3" class="form-control" id="category" placeholder="Enter category" required>
                            </div>
                            <input type="hidden" name="id" value="<?=  rtrim(base64_encode($category->id_categories),'=');?>" ?>

                            <div class="form-group">
                                <label>Category Type</label>
                                <select name="category_type" class="form-control select2" style="width: 100%; padding-left:0; margin-top: -4px;" required="">
                                    <option value="">Select</option>
                                    <option value="1" <?php if(isset($type_id)): ?> <?= $type_id == 1 ? 'selected' : '';  ?><?php else: ?><?= $category->category_type == '1' ? 'selected' : ''; ?><?php endif; ?>>Course</option>
                                    <option value="2" <?php if(isset($type_id)): ?> <?= $type_id == 2 ? 'selected' : '';  ?><?php else: ?><?= $category->category_type == '2' ? 'selected' : ''; ?><?php endif; ?>>Blog</option>
                                    <option value="3" <?php if(isset($type_id)): ?> <?= $type_id == 3 ? 'selected' : '';  ?><?php else: ?><?= $category->category_type == '3' ? 'selected' : ''; ?><?php endif; ?>>Book</option>
                                </select>
                            </div>
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
<!-- Page script -->

<script>
    $(document).ready(function (){
        $('.select2').select2();
    });
</script>
