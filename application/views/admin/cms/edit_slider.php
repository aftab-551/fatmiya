<link rel="stylesheet" href="<?= base_url('admin_assets/plugins/select2/select2.min.css') ?>">

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content">
        <!-- slider ADD -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Edit Slider</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                </div>
            </div><!-- /.box-header -->
            <div class="box-body">
                <?= form_open_multipart(base_url('admin/Slider/update_slider/'.rtrim(base64_encode($s->id_slider),'=')), 'id="edit_slider" name="edit_slider" role="form"') ?>
                    <div class="row">
                        <div class="col-md-12">
                            <?php if (validation_errors()): ?>
                                <div class="alert alert-danger">
                                    <strong>Validation Error!</strong> <?= validation_errors(); ?>
                                </div>
                            <?php elseif(isset($image_error)): ?>
                                <div class="alert alert-danger">
                                    <strong>Image Error!</strong> <?= $image_error; ?>
                                </div>
                            <?php elseif(isset($success)): ?>
                                <div class="alert alert-success">
                                    <strong>Alert!</strong> <?= $success; ?>
                                </div>
                            <?php endif; ?>
                            
                            <div class="form-group">
                                <label for="slider-title">Slider Title</label>
                                <input name="slider_title" value="<?= set_value('slider_title', $s->title); ?>" type="text" class="form-control" id="slider-title" placeholder="Enter Slider Title">
                            </div>

                            <div class="form-group">
                                <label for="description">Slider Description</label>
                                <input name="description" value="<?= set_value('description', $s->description); ?>" type="text" class="form-control" id="description" placeholder="Enter Description">
                            </div>

                            <div class="form-group">
                                <label for="event">Event</label>
                                <select name="events" id="events" class="select2" style="width: 100%; padding-left:0; margin-top: -4px;">
                                    <option value="">Select One</option>
                                    <?php foreach($events as $e): ?>
                                        <option value="<?= $e->id; ?>"<?php if(isset($event_id)): ?><?= $e->id == $event_id ? 'selected' : '';  ?><?php else: ?><?= $e->id == $s->event_id ? 'selected' : ''; ?><?php endif; ?> ><?= $e->title.' '. $e->start_date ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="btn-title">Button Title</label>
                                <input name="btn_title" value="<?= set_value('btn_title', $s->button_title); ?>" type="text" class="form-control" id="btn-title" placeholder="Enter Button Title">
                            </div>

                            <div class="form-group">
                                <label for="btn-link">Button Link</label>
                                <input name="btn_link" value="<?= set_value('btn_link', $s->button_link); ?>" type="text" class="form-control" id="btn-link" placeholder="Enter link">
                            </div>

                            <div class="form-group">
                                <label for="link">Link</label>
                                <input name="link" value="<?= set_value('link', $s->link); ?>" type="text" data-minlength="3" class="form-control" id="link" placeholder="Enter link" required>
                            </div>
                            
                             <div class="form-group">
                                <label for="sortField">Priority</label>
                                <input name="sortField" value="<?= set_value('sortField', $s->sortField); ?>" type="text" data-minlength="3" class="form-control" id="sortField" placeholder="Enter Slider Priority" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="slider_image">Slider Image *</label>
                                <input type="file" id="slider_image" name="slider_image">
                                <p class="help-block">Image for slider</p>
                                <p id="add_image_error"></p>
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                <?= form_close(); ?>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </section><!-- /.content -->
</div>

<script src="<?= base_url('admin_assets/plugins/select2/select2.min.js') ?>"></script>

<script>
    $('.select2').select2();
</script>

<script type="text/javascript">
    $(document).ready(function () {
        var icon = document.getElementById('slider_image');

        icon.onchange = function (e) {


            var file = this.files[0];

            if ('size' in file) {
                if (file.size > 2000000)
                {
                    $("#add_image_error").html('Error: File Size Error.');
                    this.value = '';
                    $("[name='cat_image']").focus();
                    return false;
                }
            }

            var ext = this.value.match(/\.([^\.]+)$/)[1];
            switch (ext)
            {
                case 'jpg':
                case 'jpeg':
                case 'png':
                    break;
                default:
                    $("#add_image_error").html('Error: Incorrect format. Only jpg,jpeg,png are allowed.');
                    //$("#cat_image_error").show();

                    this.value = '';
                    $("[name='cat_image']").focus();
            }
        };
    });
</script>