<!-- bootstrap datepicker -->
<link rel="stylesheet" href="<?= base_url(); ?>admin_assets/plugins/datepicker/datepicker3.css">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content">

        <!-- CATEGORY ADD -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title"><?=($add ? '' : 'Ask Hazrat') ?> Question</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                </div>
            </div><!-- /.box-header -->
            <div class="box-body">
                <form id="question_form" name="question_form" method="post" role="form" enctype="multipart/form-data" >
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
                            
                            <?php foreach ($question as $r): ?>
                            <div class="form-group">
                                <label for="name">Name*</label>
                                <input name="name" value="<?=$r->name;?>" type="text" data-minlength="1" class="form-control" id="name" placeholder="Name" readonly="" required/>
                                <div class="help-block with-errors"></div>
                                <?php echo form_error('model'); ?>
                            </div>
                            <div class="form-group">
                                <label for="email">Email*</label>
                                <input name="email" value="<?=$r->email;?>" type="text" data-minlength="1" class="form-control" id="email" placeholder="Email" readonly="" required/>
                                <div class="help-block with-errors"></div>
                                <?php echo form_error('model'); ?>
                            </div>
                            <div class="form-group">
                                <label for="subject">Subject*</label>
                                <input name="subject" value="<?=$r->subject;?>" type="text" data-minlength="1" class="form-control" id="subject" placeholder="Subject" readonly="" required/>
                                <div class="help-block with-errors"></div>
                                <?php echo form_error('model'); ?>
                            </div>
                            <div class="form-group">
                                <label for="question">Question*</label>
                                <textarea cols="30" name="question" placeholder="Question*" required="" class="form-control" rows="7" readonly=""><?=$r->question?></textarea>
                                <div class="help-block with-errors"></div>
                                <?php echo form_error('model'); ?>
                            </div>
                            <div class="form-group">
                                <label for="question">Answer*</label>
                                <textarea cols="30" name="answer" placeholder="Answer*" required="" class="form-control" rows="7"><?=$r->answer?></textarea>
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
        document.question_form.action = get_action();
    }

    function get_action() {
        return '<?= base_url(); ?>admin/AskHazrat/update_answer';
    }
</script>
<script type="text/javascript">
    $( document ).ready(function(){
		$('#question_form').validator();
    });
</script>