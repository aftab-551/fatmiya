<link rel="stylesheet" href="<?= base_url(); ?>admin_assets/plugins/datatables/dataTables.bootstrap.css">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Syllabus Details
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
                        <table id="syllabus" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Course</th>
                                    <th>Title</th>
                                    <th width="400">Description</th>
                                    <th>Week Number</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($syllabus as $s): ?>
                                    <tr>
                                        <td><?= $s->id; ?></td>
                                        <td><?= $s->course_name ?></td>
                                        <td><?= $s->title; ?></td>
                                        <td><?= $s->description; ?></td>
                                        <td><?= $s->week_number; ?></td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="<?= base_url() ?>admin/Syllabus/edit_syllabus/<?=  rtrim(base64_encode($s->id),'=');?>" class="btn btn-default get_page">
                                                    <i class="glyphicon glyphicon-edit"></i>
                                                </a>
                                                <?php if ($s->status == 1): ?>
                                                <a href="<?= base_url() ?>admin/Syllabus/change_status/<?= rtrim(base64_encode('1'),'='); ?>/<?=  rtrim(base64_encode($s->id),'=');?>" data-id="Nw_0" class="btn btn-default status" title="Enabled">
                                                        <i class=" glyphicon glyphicon-eye-open"></i>
                                                </a>
                                                <?php else: ?>
                                                    <a href="<?= base_url() ?>admin/Syllabus/change_status/<?= rtrim(base64_encode('0'),'='); ?>/<?=  rtrim(base64_encode($s->id),'=');?>" data-id="Nw_0" class="btn btn-default status" title="Disabled">
                                                        <i class=" glyphicon glyphicon-eye-close"></i>
                                                    </a>
                                                <?php endif; ?>
                                                <a href="<?= base_url() ?>admin/Syllabus/delete_syllabus/<?=  rtrim(base64_encode($s->id),'=');?>" data-id="Nw_0" class="btn btn-default status" onclick="return confirm('Are you sure you want to delete this lesson?');" title="Delete">
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
                                    <th>Course</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Week Number</th>
                                    <th>Actions</th>
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
        $("#syllabus").DataTable();
//        $('#books').DataTable({
//          "paging": true,
//          "lengthChange": false,
//          "searching": false,
//          "ordering": true,
//          "info": true,
//          "autoWidth": false
//        });
    });
</script>