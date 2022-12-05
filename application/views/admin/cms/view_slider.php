<link rel="stylesheet" href="<?= base_url(); ?>admin_assets/plugins/datatables/dataTables.bootstrap.css">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Sliders
            <small></small>
        </h1>
        <!-- <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Tables</a></li>
            <li class="active">Data tables</li>
        </ol> -->
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
                                    <th>Title</th>
                                    <th width="200">Description</th>
                                    <th>Button Title</th>
                                    <th>Button Link</th>
                                    <th>Sort Field</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($sliders as $slider): ?>
                                    <tr>
                                        <td><?= $slider->title; ?></td>
                                        <td><?= $slider->description; ?></td>
                                        <td><?= $slider->button_title; ?></td>
                                        <td><?= $slider->button_link; ?></td>
                                        <td><?= $slider->sortField; ?></td>
                                        <td><img src="<?=base_url();?>uploads/slider_images/<?= $slider->image; ?>" alt="sliderImage" width="200px" height="100px"></td>
                                        
                                        <td>
                                            <div class="btn-group">
                                                <a href="<?= base_url() ?>admin/Slider/edit_slider/<?=  rtrim(base64_encode($slider->id_slider),'=');?>" class="btn btn-default get_page">
                                                    <i class="glyphicon glyphicon-edit"></i>
                                                </a>
                                                <?php if ($slider->status == 1): ?>
                                                <a href="<?= base_url() ?>admin/Slider/change_status/<?= rtrim(base64_encode('es_1'),'='); ?>/<?=  rtrim(base64_encode($slider->id_slider),'=');?>" data-id="Nw_0" class="btn btn-default status" title="Enabled">
                                                        <i class=" glyphicon glyphicon-eye-open"></i>
                                                    </a>
                                                <?php else: ?>
                                                    <a href="<?= base_url() ?>admin/Slider/change_status/<?= rtrim(base64_encode('es_0'),'='); ?>/<?=  rtrim(base64_encode($slider->id_slider),'=');?>" data-id="Nw_0" class="btn btn-default status" title="Disabled">
                                                        <i class=" glyphicon glyphicon-eye-close"></i>
                                                    </a>
                                                <?php endif; ?>
                                                 <a href="<?= base_url() ?>admin/Slider/delete_slider/<?=  rtrim(base64_encode($slider->id_slider),'=');?>" class="btn btn-default get_page">
                                                    <i class="glyphicon glyphicon-remove-circle"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Button Title</th>
                                    <th>Button Link</th>
                                    <th>Sort Field</th>
                                    <th>Image</th>
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