<link rel="stylesheet" href="<?= base_url(); ?>admin_assets/plugins/datatables/dataTables.bootstrap.css">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Course Details
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
                                    <th>Activity</th>
                                    <th>Activity Name</th>
                                    <th>Marks</th>
                                    <th>Percentage</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($details as $d):
                                    $activity= unserialize($d->activity);
                                    $activityName= unserialize($d->activity_name);
                                    $marks= unserialize($d->marks);
                                    $percentage= unserialize($d->percentage); 
                                     ?>
                                    

                                    <?php for($i=0; $i< sizeof($activity); $i++){ ?>
                                    <tr>
                                        <td><?= $d->id; ?></td>
                                        <td><?= $d->offered_courses_id; ?></td>
                                        <td><?= $d->program_name ?></td>
                                        <td><?= $d->semester_number ?></td>
                                        <td><?= $d->course_name ?></td>
                                        <td><?= $d->course_code ?></td>
                                        <td><?= $d->teacher_name ?></td>
                                        <td><?= $activity[$i] ?></td>
                                        <td><?= $activityName[$i] ?></td>
                                        <!-- <td><?php // $l->batch_number ?></td> -->
                                        <td><?= $marks[$i] ?></td>
                                        <td><?= $percentage[$i] ?></td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="<?= base_url() ?>admin/Lessons/edit_course_detail/<?=  rtrim(base64_encode($d->id),'=');?>" class="btn btn-default get_page">
                                                    <i class="glyphicon glyphicon-edit"></i>
                                                </a>
                                                <!-- <?php if ($d->status == 1): ?>
                                                    <a href="<?= base_url() ?>admin/Lessons/change_status/<?= rtrim(base64_encode('1'),'='); ?>/<?=  rtrim(base64_encode($d->id),'=');?>" data-id="Nw_0" class="btn btn-default status" title="Enabled">
                                                        <i class=" glyphicon glyphicon-eye-open"></i>
                                                </a>
                                                <?php else: ?>
                                                    <a href="<?= base_url() ?>admin/Lessons/change_status/<?= rtrim(base64_encode('0'),'='); ?>/<?=  rtrim(base64_encode($d->id),'=');?>" data-id="Nw_0" class="btn btn-default status" title="Disabled">
                                                        <i class=" glyphicon glyphicon-eye-close"></i>
                                                    </a>
                                                <?php endif; ?> -->
                                                <a href="<?= base_url() ?>admin/Lessons/delete_course_detail/<?=  rtrim(base64_encode($d->id),'=');?>" data-id="Nw_0" class="btn btn-default status" onclick="return confirm('Are you sure you want to delete this lesson?');" title="Delete">
                                                    <i class=" glyphicon glyphicon-remove-circle"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php } ?>
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