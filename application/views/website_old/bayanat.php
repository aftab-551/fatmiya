<link rel="stylesheet" href="<?= base_url(); ?>admin_assets/plugins/datatables/dataTables.bootstrap.css">


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
   
<!-- Main content -->
    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">                
                    <div class="box">
                        <div class="box-header">
                           <h4 class="box-title" style="text-align: center;">
                           <?php if(($categorydet[0]->category_type == "1") && ($categorydet[0]->id_categories == "1")){echo "Bayanat";} 
                                    else if($categorydet[0]->category_type == "2"){echo "Short Clips";} 
                                    else if($categorydet[0]->category_type == "3"){echo "Books";} 
                                    else if($categorydet[0]->category_type == "4"){echo "CDs";}
                                    else if(($categorydet[0]->category_type == "1") && ($categorydet[0]->id_categories == "5")){echo "Ashaars";}
                                     
                            ?>
                           </h4>
                           <h3 class="box-title" style="text-align: center;"><?=$name;?></h3>
                           <h6 class="box-title" style="text-align: center;"><?= $subCat[0]->description;?></h6>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <!--<div class="table-responsive">-->
                            <table id="bayanat" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                         <th class="hidden-xs">Date</th>
                                        <th>Title</th>
                                         <th>Views</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $c=1; foreach ($bayanat as $bayan): ?>
                                        <tr>
                                            <td valign="middle" width="5%"><?= $c; ?></td>
                                            <td class="hidden-xs" valign="middle" width="15%"><?= $bayan->formatDate; ?></td>
                                            <td valign="middle" width="50%"><?= $bayan->name; ?></td>
                                            <td valign="middle" width="10%"><?= $bayan->views; ?></td>
                                            <td valign="middle" width="20%">
                                                <div class="btn-group">
                                                    <a href="<?= base_url() ?>uploads/bayanat/<?=$bayan->audio;?>" download="<?=$bayan->name;?>" class="btn view_tbn btn-default get_page">
                                                        Download
                                                    </a>
                                                    <a href="<?= base_url() ?>Bayanat/view/<?=  rtrim(base64_encode($bayan->id_bayanat),'=');?>" class="btn view_tbn btn-default get_page">
                                                        Listen
                                                    </a>



                                                </div>
                                            </td>
                                        </tr>
                                    <?php $c++; endforeach; ?>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th class="hidden-xs">Date</th>
                                        <th>Title</th>
                                        <th>Views</th>
                                        <th>Action</th>

                                    </tr>
                                </tfoot>
                            </table>
                            <!--</div>-->
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div>
    </section><!-- /.content -->
</div>
        <!-- jQuery 2.1.4 -->
  <script src="<?=base_url();?>admin_assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- page script -->
<script>
    $( document ).ready(function() {
    $(function () {
        $("#bayanat").DataTable();
//        $('#bayanat').DataTable({
//          "paging": true,
//          "lengthChange": false,
//          "searching": false,
//          "ordering": true,
//          "info": true,
//          "autoWidth": false
//        });
    });});
</script>