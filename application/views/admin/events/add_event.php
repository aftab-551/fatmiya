<link rel="stylesheet" href="<?= base_url('admin_assets/plugins/tp/jquery.timepicker.min.css'); ?>">

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content">

        <!-- Event ADD -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Add Event</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                </div>
            </div><!-- /.box-header -->
            <div class="box-body">
                <?= form_open_multipart(base_url('admin/Events/add_event'), 'role="form" name="add_event"') ?>
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
                            
                            <div class="form-group has-feedback">
                                <label for="title">Title</label>
                                <input name="title" value="<?= set_value('title'); ?>" type="text" class="form-control" id="title" placeholder="Enter Title" required>
                            </div>

                            <div class="form-group has-feedback">
                                <label for="desc">Description</label>
                                <input name="description" value="<?= set_value('description'); ?>" type="text" class="form-control" id="desc" placeholder="Enter Description" required>
                            </div>

                            <div class="form-group">
                                <label for="dd">Detailed Description</label>
                                <input name="long_description" value="<?= set_value('long_description'); ?>" type="text" class="form-control" id="dd" placeholder="Enter Detailed Description" required>
                            </div>

                            <div class="form-group">
                                <label for="start-date">Start Date</label>
                                <input name="start_date" value="<?= set_value('start_date'); ?>" type="date" class="form-control" id="start-date" required>
                            </div>

                            <div class="form-group">
                                <label for="end-date">End Date</label>
                                <input name="end_date" value="<?= set_value('end_date'); ?>" type="date" class="form-control" id="end-date">
                            </div>

                            <div class="form-group">
                                <label for="start-time">Start Time</label>
                                <input name="start_time" value="<?= set_value('start_time'); ?>" type="text" class="form-control timepicker" id="start-time" placeholder="Enter contact" required>
                            </div>

                            <div class="form-group">
                                <label for="end-time">End Time</label>
                                <input name="end_time" value="<?= set_value('end_time'); ?>" type="text" class="form-control timepicker" id="end-time" placeholder="Enter contact" required>
                            </div>

                            <div class="form-group">
                                <label for="venue">Venue</label>
                                <input name="venue" value="<?= set_value('venue'); ?>" type="text" class="form-control" id="venue" placeholder="Enter Venue" required>
                            </div>

                            <div class="form-group">
                                <label for="maps-embed-link">Goolge Maps Embed Link</label>
                                <input name="maps_embed_link" value="<?= set_value('maps_embed_link'); ?>" type="text" class="form-control" id="maps-embed-link" placeholder="Paste Google Maps Embed Link" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="event-thumbnail">Event Thumbnail</label>
                                <input type="file" id="event-thumbnail" name="event_thumbnail" required>
                                <p>Size 550 x 350</p>
                                <p id="add_image_error"></p>
                            </div>

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div><!-- /.col -->

                    </div><!-- /.row -->
                <?= form_close() ?>
            </div><!-- /.box-body -->

        </div><!-- /.box -->

    </section><!-- /.content -->
</div>

<script src="<?=base_url();?>admin_assets/plugins/tp/jquery.timepicker.min.js"></script>

<script>
    $('.timepicker').timepicker({
        timeFormat: 'HH:mm p',
        interval: 15,
        minTime: '10',
        maxTime: '9:00pm',
        defaultTime: '11',
        startTime: '10:00',
        dynamic: false,
        dropdown: true,
        scrollbar: true,
    });
</script>

<script type="text/javascript">
    $(document).ready(function () {
        var icon = document.getElementById('event-thumbnail');

        icon.onchange = function (e) {
            var file = this.files[0];
            // alert(file);
            if ('size' in file) {
                // alert(file.size);
                if (file.size > 200000000)
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
