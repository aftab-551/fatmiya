<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content">

        <!-- slider ADD -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Add Slider</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                </div>
            </div><!-- /.box-header -->
            <div class="box-body">
                <form id="add_slider" name="add_slider" method="post" role="form" enctype="multipart/form-data" >
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
                            
                             <div class="form-group">
                                <label for="shipping_method_name">Shipping Method Name*</label>
                                <input name="shipping_method_name" value="<?= set_value('shipping_method_name'); ?>" type="text" data-minlength="3" class="form-control" id="shipping_method_name" placeholder="Enter shipping method name" required>
                                <div class="help-block with-errors"></div>
                                <?php echo form_error('shipping_method_name'); ?>
                            </div>
                            
                             <div class="form-group">
                                <label for="rate">Rate*</label>
                                <input name="rate" value="<?= set_value('rate'); ?>" type="number" min="0" class="form-control" id="rate" placeholder="Enter Rate" required>
                                <div class="help-block with-errors"></div>
                                <?php echo form_error('rate'); ?>
                            </div>
                            
                           
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div><!-- /.col -->

                    </div><!-- /.row -->
                </form>
            </div><!-- /.box-body -->
            
            
            <div class="box-body">
                        <table id="categories" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Rate</th>
                                     <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($shipping_methods as $sm): ?>
                                    <tr>
                                        <td><?= $sm->id_shipping_methods; ?></td>
                                        <td><?= $sm->name; ?></td>
                                         <td><?= $sm->rate; ?></td>
                                       
                                        
                                        <td>
                                            <div class="btn-group">
                                               
                                                 <a href="<?= base_url() ?>admin/Shipping_methods/delete_shipping_method/<?=  rtrim(base64_encode($sm->id_shipping_methods),'=');?>" class="btn btn-default get_page">
                                                    <i class="glyphicon glyphicon-remove-circle"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>

                            </tbody>
                            <tfoot>
                                <tr>
                                   <th>#</th>
                                    <th>Name</th>
                                    <th>Rate</th>
                                     <th>Action</th>

                                </tr>
                            </tfoot>
                        </table>
                    </div><!-- /.box-body -->

        </div><!-- /.box -->



    </section><!-- /.content -->
</div>
<!-- Page script -->
<script type="text/javascript">
    window.onload = function () {
        document.add_slider.action = get_action();
    }

    function get_action() {
        return '<?= base_url(); ?>admin/Shipping_methods/insert_shipping_method';
    }
</script>
<script src="<?= base_url(); ?>admin_assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>admin_assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- page script -->
<script>
    $(function () {
        $("#categories").DataTable();
//        $('#categories').DataTable({
//          "paging": true,
//          "lengthChange": false,
//          "searching": false,
//          "ordering": true,
//          "info": true,
//          "autoWidth": false
//        });
    });
</script>