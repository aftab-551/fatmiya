<!-- bootstrap datepicker -->
<link rel="stylesheet" href="<?= base_url(); ?>admin_assets/plugins/datepicker/datepicker3.css">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content">

        <!-- CATEGORY ADD -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Edit Bayan</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                </div>
            </div><!-- /.box-header -->
            <div class="box-body">
                <form id="add_bayan" name="add_bayan" method="post" role="form" enctype="multipart/form-data" >
                    <div class="row">
                        <div class="col-md-12">
                            <?php if (validation_errors()): ?>
                                <div class="alert alert-danger">
                                    <strong>Validation Error!</strong> <?= validation_errors(); ?>
                                </div>
                            <?php elseif($this->session->userdata('image_error')): ?>
                             <div class="alert alert-danger">
                                    <strong>Image Error!</strong> <?= $this->session->userdata('image_error'); ?>
                             </div>
                            <?php elseif($this->session->userdata('success')): ?>
                             <div class="alert alert-success">
                                    <strong>Alert!</strong> <?= $this->session->userdata('success'); ?>
                             </div>
                            <?php endif; ?>
                            <?php foreach($Bayan as $value): ?>
                            
                            <div class="form-group">
                                    <label>Category*</label>
                                    <select id="category" name="category" class="form-control select2" style="width: 100%;" required="">
                                        <option value="">Select</option>
                                        <?php foreach($categories as $category): ?>
                                            <?php if($category->id_categories == $value->id_categories): ?>
                                                <option value="<?= rtrim(base64_encode($category->id_categories),'='); ?>" selected="selected"><?= $category->name;?></option>
                                            <?php else: ?>
                                                <option value="<?= rtrim(base64_encode($category->id_categories),'='); ?>"><?= $category->name;?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label>Sub Category*</label>
                                    <select id="sub_category" name="sub_category" class="form-control" style="width: 100%;" required="">
                                        <option value="">Select</option>
                                        <?php foreach($sub_categories as $sub_category): ?>
                                            <?php if($sub_category->id_sub_categories == $value->id_sub_categories): ?>
                                                <option value="<?= $sub_category->id_sub_categories; ?>" selected="selected"><?= $sub_category->name;?></option>
                                            <?php else: ?>
                                                <option value="<?= $sub_category->id_sub_categories; ?>"><?= $sub_category->name;?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            
                            
                            <div class="form-group">
                                <label for="bayan">Bayan Name*</label>
                                <input name="bayan" value="<?= $value->name ?>" type="bayan" data-minlength="3" class="form-control" id="bayan" placeholder="Enter bayan" required>
                                <div class="help-block with-errors"></div>
                                <?php echo form_error('bayan'); ?>
                            </div>
                            
                            <div class="form-group">
                                <label>Date:</label>

                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input name='date' value="<?=$value->date;?>" type="text" class="form-control pull-right" id="datepicker" data-date-format="yyyy-mm-dd"> 
                                </div>
                                <!-- /.input group -->
                            </div>
                            
                            <input type="hidden" name="id" value="<?=  rtrim(base64_encode($value->id_bayanat),'=');?>" ?>
                            <div class="form-group">
                                <label for="book_image">Bayan Image*</label>
                                <input accept=".jpg, .jpeg, .png" type="file" id="bayan_image" name="bayan_image">
                                <p id="add_image_error"></p>
                            </div>
                            <div class="form-group">
                                <label for="bayan_image">Bayan Audio *</label>
                                <input type="file" id="bayan_image" name="bayan">
                                <p class="help-block"></p>
                                <p id="add_image_error"></p>
                            </div>
                            <?php endforeach; ?>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div><!-- /.col -->

                    </div><!-- /.row -->
                </form>
            </div><!-- /.box-body -->

        </div><!-- /.box -->



    </section><!-- /.content -->
</div>
<!-- Page script -->
<!-- bootstrap datepicker -->
<script src="<?= base_url(); ?>admin_assets/plugins/datepicker/bootstrap-datepicker.js"></script>
<script type="text/javascript">
    window.onload = function () {
        document.add_bayan.action = get_action();
    }

    function get_action() {
        return '<?= base_url(); ?>admin/Bayanat/update_bayan';
    }
     //Date picker
    $('#datepicker').datepicker({
        autoclose: true
    });
</script>
<script type="text/javascript">
    $(document).ready(function () {
        var icon = document.getElementById('bayan_audio');

        icon.onchange = function (e) {


//            var file = this.files[0];
//
//            if ('size' in file) {
//                if (file.size > 20000000)
//                {
//                    $("#add_image_error").html('Error: File Size Error.');
//                    this.value = '';
//                    $("[name='cat_image']").focus();
//                    return false;
//                }
//            }

            var ext = this.value.match(/\.([^\.]+)$/)[1];
            switch (ext)
            {
                case 'mp3':
                    break;
                default:
                    $("#add_image_error").html('Error: Incorrect format. Only mp3 are allowed.');
                    //$("#cat_image_error").show();

                    this.value = '';
                    $("[name='bayan']").focus();
            }
        };
    });
</script>
<script type="text/javascript">
    $(document).ready(function () {
        var icon = document.getElementById('bayan_image');

        icon.onchange = function (e) {


            var file = this.files[0];

            if ('size' in file) {
                if (file.size > 2000000)
                {
                    $("#add_image_error").html('Error: File Size Error.');
                    this.value = '';
                    $("[name='cat_image']").focus();
                    return false;
                }
            }

            var ext = this.value.match(/\.([^\.]+)$/)[1];
            switch (ext)
            {
                case 'jpg':
                case 'jpeg':
                case 'png':
                    break;
                default:
                    $("#add_image_error").html('Error: Incorrect format. Only jpg,jpeg,png are allowed.');
                    //$("#cat_image_error").show();

                    this.value = '';
                    $("[name='bayan_image']").focus();
            }
        };
    });
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $("#category").change(function () {
            var category = $(this).val();
            //  alert(category);

            $.ajax({
                type: "POST",
                data: {id: category},
                url: '<?= base_url() ?>admin/Bayanat/get_sub_categories',
                dataType: 'json',
                success: function (json) {
                    // alert(json);
                    var $el = $("#sub_category");
                    $el.empty(); // remove old options
                    $el.append($("<option></option>")
                            .attr("value", '').text('Please Select'));
                    $.each(json, function (value, key) {
                        // alert(key.id_sub_categories);
                        $el.append($("<option></option>")
                                .attr("value", key.id_sub_categories).text(key.name));
                    });
                }
            });
        });
    });
</script>