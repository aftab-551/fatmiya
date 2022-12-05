<link rel="stylesheet" href="<?= base_url(); ?>admin_assets/plugins/datatables/dataTables.bootstrap.css">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <?php   foreach($result_data as $data){
                $first_name = $data->first_name;
                $last_name = $data->last_name;
                $studentid = $data->studentID;

            }
        ?>
        <h4>
            <b>STUDENT ID : </b> <?= $studentid; ?>
            <small></small>
        </h4>
        <h4>
            <b>STUDENT NAME : </b> <?= $first_name; ?> <?= $last_name; ?>
            <small></small>
        </h4>
        <h4>
            <b>GRADE : </b> B
            <small></small>
        </h4>
      
    </section>

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
                        <div class="box-header">
                            <h3 class="box-title"></h3>
                        </div><!-- /.box-header -->
                        <div class="box-body">
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
                                    <?php  foreach ($result_data as $data): ?>
                                        <tr>
                                            
                                            
                                                <td><?= $data->code; ?></td>
                                                <td><?= $data->Cname; ?></td>
                                                <td><?= $data->grand_total; ?></td>
                                                <td><?= $data->grade; ?></td>     
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    
                                    <tr>
                                        <th>Course Code</th>
                                        <th>Course Title</th>
                                        <th>Marks</th>
                                        <th>Grade</th>
                                    </tr>
                                    
                                </tfoot>
                            </table>
                        </div><!-- /.box-body -->
                        <div class="box-body">
                            <h2>
                                Grading Scheme
                            </h2>
                                <table id="marks" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>A</th>
                                            <th>A-</th>
                                            <th>B+</th>
                                            <th>B</th>
                                            <th>B-</th>
                                            <th>C+</th>
                                            <th>D</th>
                                            <th>F</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                            <tr>
                                                    <td>85</td>
                                                    <td>80</td>
                                                    <td>75</td>
                                                    <td>70</td>
                                                    <td>65</td>  
                                                    <td>60</td>
                                                    <td>50</td>
                                                    <td>0</td>
                                                    
                                            </tr>
                                    </tbody>
                                </table>
                            </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        
    </section><!-- /.content -->
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