<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content">

        <!-- slider ADD -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Edit Student Result</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                </div>
            </div><!-- /.box-header -->
            <div class="box-body">
                <?php   foreach($result_data as $data){
                                $student_id= $data->student_id;
                                $courseid = $data->offered_course_id;
                            }
                            $detail = array($student_id,$courseid);
                            $array = json_encode($detail);
                ?>
                <?= form_open_multipart(base_url('admin/Students/update_student_result/'.rtrim(base64_encode($id),'=').'/'.rtrim(base64_encode($courseid),'=')), 'role="form" name="edit_student_result"') ?>
                    <div class="row">
                        <div class="col-md-12">
                            <?php if (validation_errors()): ?>
                                <div class="alert alert-danger">
                                    <strong>Validation Error!</strong> <?= validation_errors(); ?>
                                </div>
                            <?php elseif(isset($success)): ?>
                                <div class="alert alert-success">
                                    <strong>Alert!</strong> <?= $success; ?>
                                </div>
                            <?php endif; ?>
                            <?php    foreach($result_data as $data){
                                        $mark= $data->obtained_percentage;
                                    }
                                    // $mark= $result->obtained_percentage;
                                    if($mark == false){
                                        $marks= 0;
                                    }else{
                                        $marks = unserialize($mark);
                                    }
                                    
                                    foreach($result_data as $data){
                                        $activity= unserialize($data->activity_name);
                                        $score = unserialize($data->marks);
                                    }
                                    $length = sizeof($activity);
                            ?>
                            <?php for($i=0; $i< $length ; $i++){ ?>
                                <?php if($marks == 0) {?>
                                    <div class="form-group">
                                        <label for="name"><?= $activity[$i];  ?>  (<?= $score[$i];   ?>)</label>
                                        <input name="marks[]" value="<?= set_value('marks', 0); ?>" type="number" data-minlength="4" class="form-control" id="name" placeholder="Enter name" required>
                                    </div>
                                <?php }
                                else{ ?>
                                    <div class="form-group">
                                        <label for="name"><?= $activity[$i];  ?>  (<?= $score[$i];   ?>)</label>
                                        <input name="marks[]" value="<?= set_value('title', $marks[$i]); ?>" type="number" data-minlength="4" class="form-control" id="name" placeholder="Enter name" required>
                                    </div>
                                <?php } ?>
                            <?php } ?>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                <?= form_close() ?>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </section><!-- /.content -->
</div>