<link rel="stylesheet" href="<?= base_url(); ?>admin_assets/plugins/datatables/dataTables.bootstrap.css">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Events Details
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
                        <table id="events_detail" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th width="100">Description</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Start Time</th>
                                    <th>End Time</th>
                                    <th width="100">Venue</th>
                                    <th>Event Thumbnail</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($events as $e): ?>
                                    <tr>
                                        <td><?= $e->id; ?></td>
                                        <td><?= $e->title ?></td>
                                        <td><?= $e->description; ?></td>
                                        <td><?= $e->start_date; ?></td>
                                        <td><?= $e->end_date; ?></td>
                                        <td><?= $e->start_time; ?></td>
                                        <td><?= $e->end_time; ?></td>
                                        <td><?= $e->venue; ?></td>
                                        <td><img src="<?= base_url('uploads/event_images/'.$e->image); ?>" alt="" height="75" width="150"></td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="<?= base_url() ?>admin/Events/edit_event/<?=  rtrim(base64_encode($e->id),'=');?>" class="btn btn-default get_page">
                                                    <i class="glyphicon glyphicon-edit"></i>
                                                </a>
                                                <?php if ($e->status == 1): ?>
                                                <a href="<?= base_url() ?>admin/Events/change_status/<?= rtrim(base64_encode('1'),'='); ?>/<?=  rtrim(base64_encode($e->id),'=');?>" data-id="Nw_0" class="btn btn-default status" title="Enabled">
                                                        <i class=" glyphicon glyphicon-eye-open"></i>
                                                </a>
                                                <?php else: ?>
                                                    <a href="<?= base_url() ?>admin/Events/change_status/<?= rtrim(base64_encode('0'),'='); ?>/<?=  rtrim(base64_encode($e->id),'=');?>" data-id="Nw_0" class="btn btn-default status" title="Disabled">
                                                        <i class=" glyphicon glyphicon-eye-close"></i>
                                                    </a>
                                                <?php endif; ?>
                                                <a href="<?= base_url() ?>admin/Events/delete_event/<?=  rtrim(base64_encode($e->id),'=');?>" data-id="Nw_0" class="btn btn-default status" onclick="return confirm('Are you sure you want to delete this event?');" title="Delete">
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
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Start Time</th>
                                    <th>End Time</th>
                                    <th>Venue</th>
                                    <th>Event Thumbnail</th>
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
        $("#events_detail").DataTable();
    });
</script>