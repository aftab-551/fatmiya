<link rel="stylesheet" href="<?= base_url(); ?>admin_assets/plugins/datatables/dataTables.bootstrap.css">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Teachers
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
                        <table id="teachers" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>City</th>
                                    <th>Contact Number</th>
                                    <th>Qualification</th>
                                    <th>Image</th>
                                    <th>Teacher Id</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($teachers as $teacher): ?>
                                    <tr>
                                        <td><?= $teacher->id; ?></td>
                                        <td><?= $teacher->name ?></td>
                                        <td><?= $teacher->address; ?></td>
                                        <td><?= $teacher->city; ?></td>
                                        <td><?= $teacher->contact_number; ?></td>
                                        <td><?= $teacher->qualification; ?></td>
                                        <td><img width="170" height="170" src="<?= base_url('uploads/teacher_images').'/'.$teacher->teacher_image; ?>" alt="Image"></td>
                                        <td><?= $teacher->teacher_id; ?></td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="<?= base_url() ?>admin/Teachers/edit_teacher/<?=  rtrim(base64_encode($teacher->id),'=');?>" class="btn btn-default get_page">
                                                    <i class="glyphicon glyphicon-edit"></i>
                                                </a>
                                                <?php if ($teacher->status == 1): ?>
                                                <a href="<?= base_url() ?>admin/Teachers/change_status/<?= rtrim(base64_encode('1'),'='); ?>/<?=  rtrim(base64_encode($teacher->id),'=');?>" data-id="Nw_0" class="btn btn-default status" title="Enabled">
                                                        <i class=" glyphicon glyphicon-eye-open"></i>
                                                </a>
                                                <?php else: ?>
                                                    <a href="<?= base_url() ?>admin/Teachers/change_status/<?= rtrim(base64_encode('0'),'='); ?>/<?=  rtrim(base64_encode($teacher->id),'=');?>" data-id="Nw_0" class="btn btn-default status" title="Disabled">
                                                        <i class=" glyphicon glyphicon-eye-close"></i>
                                                    </a>
                                                <?php endif; ?>
                                                <a href="<?= base_url() ?>admin/Teachers/assign_course_form/<?=  rtrim(base64_encode($teacher->id),'=');?>" data-id="Nw_0" class="btn btn-default status" title="Assign Courses">
                                                    <i class=" glyphicon glyphicon-book"></i>
                                                </a>
                                                <a href="<?= base_url() ?>admin/Teachers/delete_teacher/<?=  rtrim(base64_encode($teacher->id),'=');?>" data-id="Nw_0" class="btn btn-default status" onclick="return confirm('Are you sure you want to delete this teacher?');" title="Delete">
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
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>City</th>
                                    <th>Contact Number</th>
                                    <th>Qualification</th>
                                    <th>Image</th>
                                    <th>Teacher Id</th>
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
        $("#teachers").DataTable();
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