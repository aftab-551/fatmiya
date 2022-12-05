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
                           <?php   if($categorydet[0]->category_type == "1"){echo "Bayanat";} 
                                    else if($categorydet[0]->category_type == "2"){echo "Short Clips";} 
                                    else if($categorydet[0]->category_type == "3"){echo "Books";} 
                                    else if($categorydet[0]->category_type == "4"){echo "CDs";} 
                            ?>
                           </h4>
                           <h3 class="box-title" style="text-align: center;"><?=$name;?></h3>
                           <h6 class="box-title" style="text-align: center;"><?= $subCat[0]->description;?></h6>
                        </div><!-- /.box-header -->
                    </div><!-- /.box -->
                </div><!-- /.col -->
                <div class="col-sm-12 col-md-12">
                <div class="audios_wrpr">
                    <?php $count = count($bayanat);
                    $ch = 0;
                    foreach ($bayanat as $bb): ?>
                        <?php  if ($ch%4 == 0): ?>
                        <div class="row">
                        <?php endif; ?>
                            <div class="col-sm-3 col-md-3">
                                <div class="audios_div">
                                    <a href="<?= base_url() ?>Bayanat/view/<?=  rtrim(base64_encode($bb->id_bayanat),'=');?>"><img class="img-thumbnail" src="<?= base_url(); ?>uploads/bayan_images/<?= $bb->bayan_image; ?>" alt=""></a>
                                </div>
                            </div>
                        <?php $ch++; if (($ch != 0)&&($ch%4 ==0)): ?>
                        </div> 
                        <?php endif; ?>
                        <?php  endforeach; ?>
                    <?php if ($count < 2 || $count < 6): ?>
                </div> 
                    <?php endif; ?>
            </div>
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