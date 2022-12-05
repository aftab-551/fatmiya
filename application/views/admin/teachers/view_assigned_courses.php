<link rel="stylesheet" href="<?= base_url(); ?>admin_assets/plugins/datatables/dataTables.bootstrap.css">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Assigned Courses
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
                        <table id="course_assignment" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Program</th>
                                    <th>Semester</th>
                                    <th>Course</th>
                                    <!-- <th>Date Assigned</th> -->
                                    <!-- <th>Batch</th> -->
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($assignment_details as $assignment): ?>
                                    <tr>
                                        <td><?= $assignment->id; ?></td>
                                        <td><?= $assignment->teacher_name ?></td>
                                        <td><?= $assignment->program_name ?></td>
                                        <td><?= $assignment->semester_number ?></td>
                                        <td><?= $assignment->course_name; ?></td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="<?= base_url() ?>admin/Teachers/edit_assigned_course/<?= rtrim(base64_encode($assignment->id),'=');?>" class="btn btn-default get_page">
                                                    <i class="glyphicon glyphicon-edit"></i>
                                                </a>
                                                <a href="<?= base_url() ?>admin/Lessons/lesson_form/<?=  rtrim(base64_encode($assignment->id),'=');?>/<?=  rtrim(base64_encode($assignment->course_id),'=');?>" data-id="Nw_0" class="btn btn-default status" title="Assign Lesson">
                                                    <i class=" glyphicon glyphicon-book"></i>
                                                </a>
                                                <?php if ($assignment->status == 1): ?>
                                                <a href="<?= base_url() ?>admin/Teachers/change_status/<?= rtrim(base64_encode('1'),'='); ?>/<?=  rtrim(base64_encode($assignment->id),'=');?>/assignment" data-id="Nw_0" class="btn btn-default status" title="Enabled" onclick="return confirm('Are you sure you want to disable this assigned course?') ">
                                                        <i class=" glyphicon glyphicon-eye-open"></i>
                                                </a>
                                                <?php else: ?>
                                                    <a href="<?= base_url() ?>admin/Teachers/change_status/<?= rtrim(base64_encode('0'),'='); ?>/<?=  rtrim(base64_encode($assignment->id),'=');?>/assignment" data-id="Nw_0" class="btn btn-default status" title="Disabled" onclick="return confirm('Are you sure you want to enable this assigned course?') ">
                                                        <i class=" glyphicon glyphicon-eye-close"></i>
                                                    </a>
                                                <?php endif; ?>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Program</th>
                                    <th>Semester</th>
                                    <th>Course</th>
                                    <!-- <th>Date Assigned</th> -->
                                    <!-- <th>Batch</th> -->
                                    <th>Action</th>
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
        $("#course_assignment").DataTable();
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