<div class="content-wrapper">
    <!-- Content Header (Page header) -->
   
<!-- Main content -->
    <section class="content">
        <div class="contianer">
        <?php  foreach($bayan as $b): ?>
        <div class="row" style="padding-bottom: 20px;margin-right: 0px;">
            <div class="col-md-4"></div>  
            <div class="col-md-4">
                <h3 style="text-align: center;" class="box-title"><?=$categorydet[0]->name?></h3>
                <h4 style="text-align: center;" class="box-title"><?=$name?></h4>
                <h2 style="text-align: center;" class="box-title"><?=$b->name;?></h2>
                <?php if(($b->bayan_image!="")&&($categorydet[0]->id_categories != 2)){ ?>
                <img src="<?=base_url();?>uploads/bayan_images/<?=$b->bayan_image;?>" height="250px" width="250px" style="display: block; margin: 0 auto;padding-top: 30px;"/>
                <?php } ?>
                <p style="text-align: center;" class="box-title"><?=$b->formatDate;?></p>
                <?php if($categorydet[0]->id_categories != 2) {?>
                <audio style="display: block; margin: 0 auto;" width="100%" src="<?=base_url()?>uploads/bayanat/<?=$b->audio;?>" controls preload></audio>
                <?php } else {?>
                <video controls width="100%">
                    <source src="<?=base_url()?>uploads/bayanat/<?=$b->audio;?>" type="video/webm">
                    <source src="<?=base_url()?>uploads/bayanat/<?=$b->audio;?>" type="video/mp4">
                    <source src="<?=base_url()?>uploads/bayanat/<?=$b->audio;?>" type="video/ogg">
                    I'm sorry; your browser doesn't support HTML5 video in WebM with VP8/VP9 or MP4 with H.264.
                </video>
                <?php }?>
            </div>  
            <div class="col-md-4"></div>  
        </div><!-- /.row -->
                <?php endforeach; ?>
            
            
        </div>
    </section><!-- /.content -->
</div>
