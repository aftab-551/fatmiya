<link rel="stylesheet" href="<?= base_url(); ?>admin_assets/plugins/datatables/dataTables.bootstrap.css">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Semester Courses
            <small></small>
        </h1>
        <!-- <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Tables</a></li>
            <li class="active">Data tables</li>
        </ol> -->
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
                        <table id="semester_courses" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Program</th>
                                    <th>Semester #</th>
                                    <th>Course</th>
                                    <th>Course Code</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($semester_courses as $sc): ?>
                                    <tr>
                                        <td><?= $sc->p_id; ?></td>
                                        <td><?= $sc->program_name; ?></td>
                                        <td><?= $sc->semester_number; ?></td>
                                        <td><?= $sc->course_name; ?></td>
                                        <td><?= $sc->course_code; ?></td>
                                        <td><?= $sc->start_date ?></td>
                                        <td><?= $sc->end_date ?></td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="<?= base_url() ?>admin/Programs/edit_semester_course/<?=  rtrim(base64_encode($sc->id),'=');?>" class="btn btn-default get_page" title="Edit">
                                                    <i class="glyphicon glyphicon-edit"></i>
                                                </a>
                                                <?php if ($sc->status == 1): ?>
                                                    <a href="<?= base_url() ?>admin/Programs/change_status/<?= rtrim(base64_encode('1'),'='); ?>/<?=  rtrim(base64_encode($sc->id),'=').'/'.'semester_courses';?>" data-id="Nw_0" class="btn btn-default status" title="Enabled">
                                                            <i class=" glyphicon glyphicon-eye-open"></i>
                                                    </a>
                                                <?php else: ?>
                                                    <a href="<?= base_url() ?>admin/Programs/change_status/<?= rtrim(base64_encode('0'),'='); ?>/<?=  rtrim(base64_encode($sc->id),'=').'/'.'semester_courses';?>" data-id="Nw_0" class="btn btn-default status" title="Disabled">
                                                        <i class=" glyphicon glyphicon-eye-close"></i>
                                                    </a>
                                                <?php endif; ?>
                                                <a href="<?= base_url() ?>admin/Programs/delete/<?=  rtrim(base64_encode($sc->id),'=').'/'.'semester_courses';?>" class="btn btn-default get_page" title="Delete" onclick="return confirm('Are you sure you want to delete this Program?');">
                                                    <i class="glyphicon glyphicon-remove-circle"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Program</th>
                                    <th>Semester #</th>
                                    <th>Course</th>
                                    <th>Course Code</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
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
        $("#semester_courses").DataTable();
//        $('#categories').DataTable({
//          "paging": true,
//          "lengthChange": false,
//          "searching": false,
//          "ordering": true,
//          "info": true,
//          "autoWidth": false
//        });
    });
</script>