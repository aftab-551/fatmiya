<link rel="stylesheet" href="<?= base_url(); ?>admin_assets/plugins/datatables/dataTables.bootstrap.css">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Sub Categories
            <small></small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">

                <?php if ($this->session->userdata('fail')): ?>
                    <div class="alert alert-danger">
                        <strong>Error!</strong> <?= $this->session->userdata('fail'); ?>
                    </div>
               
                <?php elseif ($this->session->userdata('success')): ?>
                    <div class="alert alert-success">
                        <strong>Alert!</strong> <?= $this->session->userdata('success'); ?>
                    </div>
                <?php endif; ?>
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title"></h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <table id="categories" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Under</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($categories as $category): ?>
                                    <tr>
                                        <td><?= $category->id_sub_categories; ?></td>
                                        <td><?= $category->name; ?></td>
                                        <td><?= $category->category; ?></td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="<?= base_url() ?>admin/Categories/edit_sub_category/<?=  rtrim(base64_encode($category->id_sub_categories),'=');?>" class="btn btn-default get_page">
                                                    <i class="glyphicon glyphicon-edit"></i>
                                                </a>
                                                <?php if ($category->status == 1): ?>
                                                <a href="<?= base_url() ?>admin/Categories/change_sub_category_status/<?= rtrim(base64_encode('es_1'),'='); ?>/<?=  rtrim(base64_encode($category->id_sub_categories),'=');?>" data-id="Nw_0" class="btn btn-default status" title="Enabled">
                                                        <i class=" glyphicon glyphicon-eye-open"></i>
                                                    </a>
                                                <?php else: ?>
                                                    <a href="<?= base_url() ?>admin/Categories/change_sub_category_status/<?= rtrim(base64_encode('es_0'),'='); ?>/<?=  rtrim(base64_encode($category->id_sub_categories),'=');?>" data-id="Nw_0" class="btn btn-default status" title="Disabled">
                                                        <i class=" glyphicon glyphicon-eye-close"></i>
                                                    </a>
                                                <?php endif; ?>
                                                
                                                
                                                <a href="<?= base_url() ?>admin/Categories/delete_sub_category/<?=  rtrim(base64_encode($category->id_sub_categories),'=');?>" data-id="Nw_0" class="btn btn-default status" onclick="return confirm('Are you sure you want to delete this item?');" title="Delete">
                                                        <i class=" glyphicon glyphicon-remove-circle"></i>
                                                    </a>
                                                
                                                <!-- <?php if ($category->category_type == 1) { ?>
                                                <?php if ($category->show_on_homepage == 1): ?>
                                                <a href="<?= base_url() ?>admin/Categories/change_sub_category_status/<?= rtrim(base64_encode('es_3'),'='); ?>/<?=  rtrim(base64_encode($category->id_sub_categories),'=');?>" data-id="Nw_0" class="btn btn-default btn-info status" title="Enabled">
                                                        Click to disable
                                                    </a>
                                                <?php else: ?>
                                                    <a href="<?= base_url() ?>admin/Categories/change_sub_category_status/<?= rtrim(base64_encode('es_2'),'='); ?>/<?=  rtrim(base64_encode($category->id_sub_categories),'=');?>" data-id="Nw_0" class="btn btn-default btn-danger status" title="Disabled">
                                                        Click to enable
                                                    </a>
                                                <?php endif; ?>
                                                <?php } ?> -->
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Under</th>
                                    <th>Action</th>

                                </tr>
                            </tfoot>
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<!-- DataTables -->
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