<link rel="stylesheet" href="<?= base_url(); ?>admin_assets/plugins/datatables/dataTables.bootstrap.css">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <?php   
            $CI =& get_instance();
            $CI->load->model('studentResult_model');
            $result= $CI->studentResult_model->student_detail($student_id);
            foreach($result as $data):
        ?>

            <h4>
                <b>STUDENT ID : </b> <?= $data->id; ?>
                <small></small>
            </h4>
            <h4>
                <b>STUDENT NAME : </b> <?= $data->first_name; ?> <?= $data->last_name; ?>
                <small></small>
            </h4>
            <h4>
                <b>Registration# : </b> <?= $data->student_id; ?>
                <small></small>
            </h4>
            <h4>
                <b>Program : </b> <?= $data->program_name; ?>
                <small></small>
            </h4>
        <?php endforeach; ?>
      
    </section>
    <?php   
        for($i=1 ; $i<= 8; $i +=1){
            $condition = array('marks.student_id'=> $student_id , 'marks.semester' => $i);
            $result= $CI->studentResult_model->student_result($condition); ?>
            <!-- Main content -->
            <section class="content">
            
                <div class="row">
                    <div class="col-xs-12">
                        <?php if ($this->session->userdata('fail')): ?>
                            <div class="alert alert-danger">
                                <strong>Error!</strong> <?= $this->session->userdata('fail'); ?>
                            </div>
                        <?php endif; ?>
                        <div class="box">
                            <div class="box-body">
                                <h1 style= "text-align: center;" >SEMESTER  <?= $i; ?></h1>
                                <table id="marks" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Course Code</th>
                                            <th>Course Title</th>
                                            <th>Marks</th>
                                            <th>Grade</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php  foreach ($result as $data): ?>
                                            <tr>
                                                
                                                
                                                    <td><?= $data->code; ?></td>
                                                    <td><?= $data->Cname; ?></td>
                                                    <td><?= $data->grand_total; ?></td>
                                                    <td><?= $data->grade; ?></td>     
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                                
                            </div><!-- /.box-body -->
                        </div><!-- /.box -->
                    </div><!-- /.col -->
                </div><!-- /.row -->
            
            </section><!-- /.content -->
    <?php } ?>
        
</div><!-- /.content-wrapper -->
<div class="box-body">
                        
</div><!-- /.box-body -->

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