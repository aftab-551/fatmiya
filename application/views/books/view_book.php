<div class="content-wrapper">
    <!-- Content Header (Page header) -->
   
<!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-1">
            </div>
            <div class="col-xs-9">
                
                <?php foreach($book as $b): ?>
                
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title"><?=$b->name;?></h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <iframe width="100%" height="900" src="<?=base_url()?>uploads/books/<?=$b->pdf;?>"></iframe>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
                <?php endforeach; ?>
            </div><!-- /.col -->
             <div class="col-xs-2">
            </div>
        </div><!-- /.row -->
    </section><!-- /.content -->
</div>
