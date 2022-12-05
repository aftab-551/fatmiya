<link rel="stylesheet" href="<?= base_url(); ?>admin_assets/plugins/datatables/dataTables.bootstrap.css">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Lessons Details
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
                        <table id="lessons" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th width="10">Offered Course ID</th>
                                    <th width="35">Program Name</th>
                                    <th width="20">Semester #</th>
                                    <th width="30">Course Name</th>
                                    <th>Course Code</th>
                                    <th>Teacher Name</th>
                                    <th>Teacher ID</th>
                                    <th>Title</th>
                                    <th>Week Number</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($lessons as $l): ?>
                                    <tr>
                                        <td><?= $l->id; ?></td>
                                        <td><?= $l->offered_course_id; ?></td>
                                        <td><?= $l->program_name ?></td>
                                        <td><?= $l->semester_number ?></td>
                                        <td><?= $l->course_name ?></td>
                                        <td><?= $l->course_code ?></td>
                                        <td><?= $l->teacher_name ?></td>
                                        <td><?= $l->teacher_id ?></td>
                                        <!-- <td><?php // $l->batch_number ?></td> -->
                                        <td><?= $l->title; ?></td>
                                        <td><?= $l->week_number; ?></td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="<?= base_url() ?>admin/Lessons/edit_lesson/<?=  rtrim(base64_encode($l->id),'=');?>" class="btn btn-default get_page">
                                                    <i class="glyphicon glyphicon-edit"></i>
                                                </a>
                                                <!-- <?php if ($l->status == 1): ?>
                                                    <a href="<?= base_url() ?>admin/Lessons/change_status/<?= rtrim(base64_encode('1'),'='); ?>/<?=  rtrim(base64_encode($l->id),'=');?>" data-id="Nw_0" class="btn btn-default status" title="Enabled">
                                                        <i class=" glyphicon glyphicon-eye-open"></i>
                                                </a>
                                                <?php else: ?>
                                                    <a href="<?= base_url() ?>admin/Lessons/change_status/<?= rtrim(base64_encode('0'),'='); ?>/<?=  rtrim(base64_encode($l->id),'=');?>" data-id="Nw_0" class="btn btn-default status" title="Disabled">
                                                        <i class=" glyphicon glyphicon-eye-close"></i>
                                                    </a>
                                                <?php endif; ?> -->
                                                <a href="<?= base_url() ?>admin/Lessons/delete_lesson/<?=  rtrim(base64_encode($l->id),'=');?>" data-id="Nw_0" class="btn btn-default status" onclick="return confirm('Are you sure you want to delete this lesson?');" title="Delete">
                                                    <i class=" glyphicon glyphicon-remove-circle"></i>
                                                </a>
                                            
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Offered Course ID</th>
                                    <th>Program Name</th>
                                    <th>Semester #</th>
                                    <th>Course Name</th>
                                    <th>Course Code</th>
                                    <th>Teacher Name</th>
                                    <th>Teacher ID</th>
                                    <!-- <th>Batch #</th> -->
                                    <th>Title</th>
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
        $("#lessons").DataTable({
            "order" : [[1, 'desc'], [9, 'asc']],
        });
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