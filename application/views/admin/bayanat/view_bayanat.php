<link rel="stylesheet" href="<?= base_url(); ?>admin_assets/plugins/datatables/dataTables.bootstrap.css">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Bayanat
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
                        <table id="bayanat" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Date</th>
                                    <th>Category</th>
                                    <th>SubCat</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($bayanat as $bayan): ?>
                                    <tr>
                                        <td><?= $bayan->id_bayanat; ?></td>
                                        <td><?php if ($bayan->bayan_image!=""){?><img src="<?=base_url();?>uploads/bayan_images/<?=$bayan->bayan_image;?>" height="150px" width="150px"><?php }?></td>
                                        <td><?= $bayan->name; ?></td>
                                        <td><?= $bayan->formatDate; ?></td>
                                        <td><?php   if($bayan->id_categories == "1"){echo "Bayanat";} 
                                                    else if($bayan->id_categories == "2"){echo "Short Clips";} 
                                                    else if($bayan->id_categories == "3"){echo "Books";} 
                                                    else if($bayan->id_categories == "4"){echo "CDs";} 
                                        ?></td>
                                        <td><?=$bayan->id_sub_categories?></td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="<?= base_url() ?>admin/Bayanat/edit_bayan/<?=  rtrim(base64_encode($bayan->id_bayanat),'=');?>" class="btn btn-default get_page">
                                                    <i class="glyphicon glyphicon-edit"></i>
                                                </a>
                                                <?php if ($bayan->status == 1): ?>
                                                <a href="<?= base_url() ?>admin/Bayanat/change_status/<?= rtrim(base64_encode('es_1'),'='); ?>/<?=  rtrim(base64_encode($bayan->id_bayanat),'=');?>" data-id="Nw_0" class="btn btn-default status" title="Enabled">
                                                        <i class=" glyphicon glyphicon-eye-open"></i>
                                                    </a>
                                                <?php else: ?>
                                                    <a href="<?= base_url() ?>admin/Bayanat/change_status/<?= rtrim(base64_encode('es_0'),'='); ?>/<?=  rtrim(base64_encode($bayan->id_bayanat),'=');?>" data-id="Nw_0" class="btn btn-default status" title="Disabled">
                                                        <i class=" glyphicon glyphicon-eye-close"></i>
                                                    </a>
                                                <?php endif; ?>
                                                
                                                 <a href="<?= base_url() ?>admin/Bayanat/delete_bayan/<?=  rtrim(base64_encode($bayan->id_bayanat),'=');?>" data-id="Nw_0" class="btn btn-default status" onclick="return confirm('Are you sure you want to delete this bayan?');" title="Delete">
                                                        <i class=" glyphicon glyphicon-remove-circle"></i>
                                                    </a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Name</th>
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
        //$("#bayanat").DataTable();
//        $('#bayanat').DataTable({
//          "paging": true,
//          "lengthChange": false,
//          "searching": false,
//          "ordering": true,
//          "info": true,
//          "autoWidth": false
//        });
    });
</script>