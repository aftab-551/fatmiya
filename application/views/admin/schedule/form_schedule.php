<!-- bootstrap datepicker -->
<link rel="stylesheet" href="<?= base_url(); ?>admin_assets/plugins/datepicker/datepicker3.css">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content">

        <!-- CATEGORY ADD -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title"><?=($add ? 'Add' : 'Edit') ?> Schedule</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                </div>
            </div><!-- /.box-header -->
            <div class="box-body">
                <form id="update_schedule" name="update_schedule" method="post" role="form" enctype="multipart/form-data" >
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
                            
                            <?php foreach ($schedule as $r): ?>
                            <div class="form-group">
                                <label for="day">Schedule Day*</label>
                                <input name="day" value="<?=$r->day;?>" type="text" data-minlength="1" class="form-control" id="day" placeholder="Schedule day" disabled required/>
                                <div class="help-block with-errors"></div>
                                <?php echo form_error('model'); ?>
                            </div>
                            
                            <div class="form-group">
                                <label>After Fajir:</label>
								<input name="afterFajir" value="<?=$r->afterFajir;?>" type="text" data-minlength="1" class="form-control" id="afterFajir" placeholder=""/>
                                <div class="help-block with-errors"></div>
                                <?php echo form_error('model'); ?>
                            </div>
                            
                            <div class="form-group">
                                <label>Before Zohar:</label>
								<input name="beforeZohar" value="<?=$r->beforeZohar;?>" type="text" data-minlength="1" class="form-control" id="beforeZohar" placeholder=""/>
                                <div class="help-block with-errors"></div>
                                <?php echo form_error('model'); ?>
                            </div>

                            <div class="form-group">
                                <label>After Zohar:</label>
								<input name="afterZohar" value="<?=$r->afterZohar;?>" type="text" data-minlength="1" class="form-control" id="afterZohar" placeholder=""/>
                                <div class="help-block with-errors"></div>
                                <?php echo form_error('model'); ?>
                            </div>
                            
                            <div class="form-group">
                                <label>Before Asar:</label>
								<input name="beforeAsar" value="<?=$r->beforeAsar;?>" type="text" data-minlength="1" class="form-control" id="beforeAsar" placeholder=""/>
                                <div class="help-block with-errors"></div>
                                <?php echo form_error('model'); ?>
                            </div>
                            
                            <div class="form-group">
                                <label>After Asar:</label>
								<input name="afterAsar" value="<?=$r->afterAsar;?>" type="text" data-minlength="1" class="form-control" id="afterAsar" placeholder=""/>
                                <div class="help-block with-errors"></div>
                                <?php echo form_error('model'); ?>
                            </div>
                            
                            <div class="form-group">
                                <label>After Majrib:</label>
								<input name="afterMajrib" value="<?=$r->afterMajrib;?>" type="text" data-minlength="1" class="form-control" id="afterMajrib" placeholder=""/>
                                <div class="help-block with-errors"></div>
                                <?php echo form_error('model'); ?>
                            </div>
                            
                            <div class="form-group">
                                <label>After Insha:</label>
								<input name="afterInsha" value="<?=$r->afterInsha;?>" type="text" data-minlength="1" class="form-control" id="afterInsha" placeholder=""/>
                                <div class="help-block with-errors"></div>
                                <?php echo form_error('model'); ?>
                            </div>

							<div class="form-group">
                                <label>Before Fajir:</label>
								<input name="beforeFajir" value="<?=$r->beforeFajir;?>" type="text" data-minlength="1" class="form-control" id="beforeFajir" placeholder=""/>
                                <div class="help-block with-errors"></div>
                                <?php echo form_error('model'); ?>
                            </div>
                            <input type="hidden" name="id" value="<?=$r->id;?>" >
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
        document.update_schedule.action = get_action();
    }

    function get_action() {
        return '<?= base_url(); ?>admin/schedule/update_schedule';
    }
</script>
<script type="text/javascript">
    $( document ).ready(function(){
		$('#update_schedule').validator();
    });
</script>