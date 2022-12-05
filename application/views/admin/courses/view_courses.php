<link rel="stylesheet" href="<?= base_url(); ?>admin_assets/plugins/datatables/dataTables.bootstrap.css">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Courses
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
                        <table id="courses" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Code</th>
                                    <th>Under Cat/Sub Cat</th>
                                    <th width="100">Short Description</th>
                                    <!-- <th>Detailed Description</th> -->
                                    <th width="50">Intro Video URL</th>
                                    <th>Course Thumbnail</th>
                                    <!-- <th>Featured</th> -->
                                    <th>Views</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($courses as $course): ?>
                                    <tr>
                                        <td><?= $course->id; ?></td>
                                        <td><?= $course->name ?></td>
                                        <td><?= $course->code; ?></td>
                                        <td><?= $course->cat."/".$course->sub_cat; ?></td>
                                        <td><?= $course->short_description; ?></td>
                                        <td><?= $course->intro_video_url; ?></td>
                                        <td><img src="<?= base_url('uploads/course_images').'/'.$course->course_thumbnail; ?>" alt="Thumbnail" width="150" height="75"></td>
                                        <td><?= $course->views; ?></td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="<?= base_url() ?>admin/Courses/edit_course/<?=  rtrim(base64_encode($course->id),'=');?>" class="btn btn-default get_page">
                                                    <i class="glyphicon glyphicon-edit"></i>
                                                </a>
                                                <?php if ($course->status == 1): ?>
                                                <a href="<?= base_url() ?>admin/Courses/change_status/<?= rtrim(base64_encode('1'),'='); ?>/<?=  rtrim(base64_encode($course->id),'=');?>" data-id="Nw_0" class="btn btn-default status" title="Enabled">
                                                        <i class=" glyphicon glyphicon-eye-open"></i>
                                                    </a>
                                                <?php else: ?>
                                                    <a href="<?= base_url() ?>admin/Courses/change_status/<?= rtrim(base64_encode('0'),'='); ?>/<?=  rtrim(base64_encode($course->id),'=');?>" data-id="Nw_0" class="btn btn-default status" title="Disabled">
                                                        <i class=" glyphicon glyphicon-eye-close"></i>
                                                    </a>
                                                <?php endif; ?>
                                                
                                                <a href="<?= base_url() ?>admin/Courses/delete_course/<?=  rtrim(base64_encode($course->id),'=');?>" data-id="Nw_0" class="btn btn-default status" onclick="return confirm('Are you sure you want to delete this course?');" title="Delete">
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
                                    <th>Code</th>
                                    <th>Under Cat/Sub Cat</th>
                                    <th>Short Description</th>
                                    <!-- <th>Detailed Description</th> -->
                                    <th>Intro Video URL</th>
                                    <th>Course Thumbnail</th>
                                    <!-- <th>Featured</th> -->
                                    <th>Views</th>
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
        $("#courses").DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true
        });
    });
</script>