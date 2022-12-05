<link rel="stylesheet" href="<?= base_url(); ?>admin_assets/plugins/datatables/dataTables.bootstrap.css">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Schedule
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
                    <div class="box-body hide">
                        <!--a href="<?=base_url();?>admin/Notifications/notification_form" class="btn btn-primary">Update</a>-->
                    </div>
                    <div class="box-body">
                        
                        <table id="schedule" class="table table-bordered table-striped">
                            <thead>
								<tr style="font-weight:bold">
									<th>Day</th>
									<th>After Fajir</th>
									<th>Before Zohar</th>
									<th>After Zohar</th>
									<th>Before Asar</th>
									<th>After Asar</th>
									<th>After Majrib</th>
									<th>After Insha</th>
									<th>Before Fajir</th>
									<th>Action</th>
								</tr>
                            </thead>
                            <tbody>
                                <?php
								foreach ($schedule as $schedules): ?>
                                    <tr>
                                        <td><?= $schedules->day; ?></td>
										<td><?= $schedules->afterFajir; ?></td>
										<td><?= $schedules->beforeZohar; ?></td>
										<td><?= $schedules->afterZohar; ?></td>
										<td><?= $schedules->beforeAsar; ?></td>
										<td><?= $schedules->afterAsar; ?></td>
										<td><?= $schedules->afterMajrib; ?></td>
										<td><?= $schedules->afterInsha; ?></td>
										<td><?= $schedules->beforeFajir; ?></td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="<?= base_url() ?>admin/Schedule/form_schedule/<?=  rtrim(base64_encode($schedules->id),'=');?>" class="btn btn-default get_page">
                                                    <i class="glyphicon glyphicon-edit"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                   <tr style="font-weight:bold">
									<th>Day</th>
									<th>After Fajir</th>
									<th>Before Zohar</th>
									<th>After Zohar</th>
									<th>Before Asar</th>
									<th>After Asar</th>
									<th>After Majrib</th>
									<th>After Insha</th>
									<th>Before Fajir</th>
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
        $("#notifications").DataTable();
//        $('#notifications').DataTable({
//          "paging": true,
//          "lengthChange": false,
//          "searching": false,
//          "ordering": true,
//          "info": true,
//          "autoWidth": false
//        });
    });
</script>