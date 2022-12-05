<link rel="stylesheet" href="<?= base_url(); ?>admin_assets/plugins/datatables/dataTables.bootstrap.css">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Blog Posts
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
                        <table id="blog-posts" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th width="100">Title</th>
                                    <th>Writer</th>
                                    <th>Sub Category</th>
                                    <th>Slug</th>
                                    <th width="200">Excerpt</th>
                                    <th>Views</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($posts as $post): ?>
                                    <tr>
                                        <td><?= $post->id; ?></td>
                                        <td><?= $post->title; ?></td>
                                        <td><?= $post->user_first_name .' '. $post->user_last_name;; ?></td>
                                        <td><?= $post->sub_cat_name; ?></td>
                                        <td><?= $post->slug; ?></td>
                                        <td><?= $post->excerpt; ?></td>
                                        <td><?= $post->views; ?></td>
                                        <td><img src="<?=base_url();?>uploads/blog_images/<?= $post->image; ?>" alt="BlogImage" width="200px" height="100px"></td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="<?= base_url() ?>admin/Blogs/edit_blog/<?=  rtrim(base64_encode($post->id),'=');?>" class="btn btn-default get_page">
                                                    <i class="glyphicon glyphicon-edit"></i>
                                                </a>
                                                <?php if ($post->status == 1): ?>
                                                    <a href="<?= base_url() ?>admin/Blogs/change_status/<?= rtrim(base64_encode('1'),'='); ?>/<?=  rtrim(base64_encode($post->id),'=');?>" data-id="Nw_0" class="btn btn-default status" title="Enabled">
                                                            <i class=" glyphicon glyphicon-eye-open"></i>
                                                    </a>
                                                <?php else: ?>
                                                    <a href="<?= base_url() ?>admin/Blogs/change_status/<?= rtrim(base64_encode('0'),'='); ?>/<?=  rtrim(base64_encode($post->id),'=');?>" data-id="Nw_0" class="btn btn-default status" title="Disabled">
                                                        <i class=" glyphicon glyphicon-eye-close"></i>
                                                    </a>
                                                <?php endif; ?>
                                                <a href="<?= base_url() ?>admin/Blogs/delete_blog/<?=  rtrim(base64_encode($post->id),'=');?>" class="btn btn-default get_page">
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
                                    <th>Title</th>
                                    <th>Writer</th>
                                    <th>Sub Category</th>
                                    <th>Slug</th>
                                    <th>Excerpt</th>
                                    <th>Views</th>
                                    <th>Image</th>
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
        $("#blog-posts").DataTable();
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