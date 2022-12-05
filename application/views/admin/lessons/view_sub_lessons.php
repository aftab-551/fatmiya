<link rel="stylesheet" href="<?= base_url(); ?>admin_assets/plugins/datatables/dataTables.bootstrap.css">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Sub Lessons Details
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
                        <table id="sub-lessons" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th width="35">Program Name</th>
                                    <th width="20">Semester Number</th>
                                    <th width="150">Course Name</th>
                                    <th>Teacher Name</th>
                                    <!-- <th>Batch #</th> -->
                                    <th>Lesson Title</th>
                                    <th>Lesson Week #</th>
                                    <th width="200">Sub-Lesson Title</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($sub_lessons as $sl): ?>
                                    <tr>
                                        <td><?= $sl->id; ?></td>
                                        <td><?= $sl->program_name ?></td>
                                        <td><?= $sl->semester_number ?></td>
                                        <td><?= $sl->course_name ?></td>
                                        <td><?= $sl->teacher_name ?></td>
                                        <td><?= $sl->lesson_title; ?></td>
                                        <td><?= $sl->lesson_week_number; ?></td>
                                        <td><?= $sl->title; ?></td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="<?= base_url() ?>admin/Lessons/edit_sub_lesson/<?=  rtrim(base64_encode($sl->id),'=');?>" class="btn btn-default get_page">
                                                    <i class="glyphicon glyphicon-edit"></i>
                                                </a>
                                                <a href="<?= base_url() ?>admin/Lessons/delete_sub_lesson/<?=  rtrim(base64_encode($sl->id),'=');?>" data-id="Nw_0" class="btn btn-default status" onclick="return confirm('Are you sure you want to delete this sub lesson?');" title="Delete">
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
                                    <th>Program Name</th>
                                    <th>Semester Number</th>
                                    <th>Course Name</th>
                                    <th>Teacher Name</th>
                                    <!-- <th>Batch #</th> -->
                                    <th>Lesson Title</th>
                                    <th>Lesson Week #</th>
                                    <th>Sub-Lesson Title</th>
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
        $("#sub-lessons").DataTable();
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