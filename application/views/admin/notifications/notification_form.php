<!-- bootstrap datepicker -->
<link rel="stylesheet" href="<?= base_url(); ?>admin_assets/plugins/datepicker/datepicker3.css">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content">

        <!-- CATEGORY ADD -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title"><?=($add ? 'Add' : 'Edit') ?> Notification</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                </div>
            </div><!-- /.box-header -->
            <div class="box-body">
                <form id="add_category" name="add_category" method="post" role="form" enctype="multipart/form-data" >
                    <div class="row">
                        <div class="col-md-12">
                            <?php if (validation_errors()): ?>
                                <div class="alert alert-danger">
                                    <strong>Validation Error!</strong> <?= validation_errors(); ?>
                                </div>
                            <?php elseif ($this->session->userdata('image_error')): ?>
                                <div class="alert alert-danger">
                                    <strong>Image Error!</strong> <?= $this->session->userdata('image_error'); ?>
                                </div>
                            <?php elseif ($this->session->userdata('success')): ?>
                                <div class="alert alert-success">
                                    <strong>Alert!</strong> <?= $this->session->userdata('success'); ?>
                                </div>
                            <?php endif; ?>
                            
                            <?php foreach ($notification as $r): ?>
                            <div class="form-group">
                                <label for="category">Notification Title*</label>
                            </div>
                            <div class="form-group">
                                <textarea name="title" rows="5" cols="100"><?php echo $r->title;;?></textarea>
                                <div class="help-block with-errors"></div>
                                <?php echo form_error('model'); ?>
                            </div>
                            
                             <div class="form-group">
                                <label>Date:</label>

                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input name='date' value="<?=$r->date;?>" type="text" class="form-control pull-right" id="datepicker" data-date-format="yyyy-mm-dd"> 
                                </div>
                                
                            </div>
                            
                            <!--
                            <div class="bootstrap-timepicker">
                                    <div class="form-group">
                                        <label>Time:</label>

                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-clock-o"></i>
                                            </div>
                                            <input name="time" value="<?=$r->time;?>" type="text" class="form-control timepicker" required="" > 


                                        </div>
                                        
                                    </div>
                                    
                                </div>-->
                            
                            <input type="hidden" name="id" value="<?=$r->id_notifications;?>" >
                            <?php endforeach; ?>

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div><!-- /.col -->

                    </div><!-- /.row -->
                </form>
            </div><!-- /.box-body -->

        </div><!-- /.box -->



    </section><!-- /.content -->
</div>
<!-- Page script -->
<!-- bootstrap datepicker -->
<script src="<?= base_url(); ?>admin_assets/plugins/datepicker/bootstrap-datepicker.js"></script>
<script type="text/javascript">
    window.onload = function () {
        document.add_category.action = get_action();
    }

    function get_action() {
        return '<?= base_url(); ?>admin/Notifications/insert_notification';
    }
    
    
     //Date picker
    $('#datepicker').datepicker({
        autoclose: true
    });
</script>
<script type="text/javascript">
    $( document ).ready(function(){
        $('#add_category').validator();
    $(".select2").select2();
    });
</script>