<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content">

        <!-- slider ADD -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Add Batch</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                </div>
            </div><!-- /.box-header -->
            <div class="box-body">
                <?= form_open('admin/Batches/add_batch', 'role="form" name="add_course"') ?>
                    <div class="row">
                        <div class="col-md-12">
                            <?php if (validation_errors()): ?>
                                <div class="alert alert-danger">
                                    <strong>Validation Error!</strong> <?= validation_errors(); ?>
                                </div>
                            <?php elseif($this->session->userdata('success')): ?>
                            <div class="alert alert-success">
                                <strong>Alert!</strong> <?= $this->session->userdata('success'); ?>
                            </div>
                            <?php endif; ?>
                            
                             <div class="form-group">
                                <label for="batch">Batch Detail*</label>
                                <input name="batch_detail" value="<?= set_value('batch_detail'); ?>" type="text" class="form-control" id="batch" placeholder="Enter batch" required>
                                <div class="help-block with-errors"></div>
                            </div>
                            
                            <!-- <div class="form-group">
                                <label for="status">Course Status*</label>
                                <select id="status" name="course_status" class="form-control select2" style="width: 100%;" required="">
                                    <option value="">Select</option>
                                    <option value="0">0</option>
                                    <option value="1">1</option> 
                                </select>
                            </div> -->

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