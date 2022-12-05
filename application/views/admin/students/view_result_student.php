<link rel="stylesheet" href="<?= base_url(); ?>admin_assets/plugins/datatables/dataTables.bootstrap.css">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Enrolled Courses Details
            <small></small>
        </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">
        <?= form_open(base_url('admin/Students/view_students_result1'), 'role="form" name="view_students_result1"') ?>
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
                            <table id="marks" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Roll No</th>
                                        <th>Student Name</th>
                                        <?php foreach ($result_data as $result){
                                            $activity = unserialize($result->activity_name);
                                            
                                        } ?>
                                        
                                        <?php for($count=0; $count< sizeof($activity); $count++){ ?>
                                            <th><?= $activity[$count]; ?></th>
                                        <?php } ?>
                                            <!-- <th>Batch</th> -->
                                        <th>Total Percentage</th>
                                        <th>Grade</th>
                                        <th>Edit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php  
                                        $id='';
                                        foreach($result_data as $result){
                                            $mark = $result->obtained_percentage;
                                            if($mark == false){
                                                $marks= 0;
                                            }else{
                                                $marks = unserialize($mark);
                                            }
                                        }
                                        $length= sizeof($activity);
                                        
                                        
                                       
                                        foreach ($result_data as $result): ?>
                                        

                                        <tr>
                                            
                                            <?php if( $id != $result->student_id) { ?>
                                                <td><?= $result->student_id; ?></td>
                                                <td><?= $result->first_name ?> <?= $result->last_name; ?></td>
                                                <?php for($c=0 ; $c< $length ; $c++){ ?>
                                                    <?php if($marks == 0) {?>
                                                        <td>0</td>
                                                    <?php }
                                                    else{ ?>
                                                        <td><?= $marks[$c] ?></td>
                                                    <?php } ?>
                                                <?php } ?>
                                                <td><?= $result->grand_total; ?></td>
                                                <td><?= $result->grade; ?></td>
                                                <td>
                                                    <div class="btn-group">
                                                        <a href="<?= base_url() ?>admin/Students/edit_student_result/<?=  rtrim(base64_encode($result->studentid),'=');?>/<?=  rtrim(base64_encode($result->offered_course_id),'=');?>" class="btn btn-default get_page">
                                                            <i class="glyphicon glyphicon-edit"></i>
                                                        </a>
                                                    </div>  
                                                </td>
                                            <?php $id= $result->student_id; } ?>
                                                
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    
                                    <tr>
                                        <th>Roll No</th>
                                        <th>Student Name</th>
                                        <?php foreach ($result_data as $result){
                                            $activity = unserialize($result->activity_name);
                                        } ?>
                                        <?php for($count=0; $count< sizeof($activity); $count++){ ?>
                                            <th><?= $activity[$count]; ?></th>
                                        <?php } ?>
                                            <!-- <th>Batch</th> -->
                                        <th>Total Percentage</th>
                                        <th>Grade</th>
                                        <th>Edit</th>
                                    </tr>
                                    
                                </tfoot>
                            </table>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        <!-- <?= form_close() ?> -->
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
<!-- marks script -->
<!-- <script>
    var table = document.getElementById('marks');
    var cells = table.getElementsByTagName('td');

    for(var i=0; i < cells.length; i++){
        cells[i].onclick = function(){
            if(this.hasAttribute('data-clicked')){
                return;
            }
            this.setAttribute('data-clicked','yes');
            this.setAttribute('data-text',this.innerHTML);
            var input =  document.createElement('input');
            input.setAttribute('type','number');
            input.value = this.innerHTML;
            input.style.backgroundColor = "LightYellow";
            input.onblur = function() {
                var td = input.parentElement;
                var org_text = input.parentElement.getAttribute('data-text');
                var current_text = this.value;
                if(org_text != current_text){
                    td.removeAttribute('data-clicked');
                    td.removeAttribute('data-text');
                    td.innerHTML= current_text;
                    console.log(org_text+ 'is changed to '+ current_text);
                }
                else{
                    td.removeAttribute('data-clicked');
                    td.removeAttribute('data-text');
                    td.innerHTML= org_text;
                    console.log('no changes made');
                }
            }
            input.onKeypress = function(){
                if( events.keycode == 13){
                    this.blur();
                }
            }
            this.innerHTML='';
            this.append(input);
            this.firstElementChild.select();
        }
    }
    // console.log(cells);
</script> -->