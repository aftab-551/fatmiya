<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content">

        <!-- CATEGORY ADD -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Edit Book</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                </div>
            </div><!-- /.box-header -->
            <div class="box-body">
                <?= form_open_multipart(base_url('admin/Books/update_book'), 'id = "add_book" name= "add_book" role="form"') ?>
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
                            <?php foreach($Book as $value): ?>
                            
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
                                    <select id="sub-category" name="sub_category" class="form-control select2" style="width: 100%;" required="">
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
                                    <label for="bookname">Book Name*</label>
                                    <input name="bookname" value="<?= $value->name ?>" type="text" data-minlength="3" class="form-control" id="book" placeholder="Enter book" required>
                                    <div class="help-block with-errors"></div>
                                    <?php echo form_error('bookname'); ?>
                                </div>
                                
                                <div class="form-group">
                                    <label>Show Book*</label>
                                    <select id="show-book" name="show" class="form-control select2" style="width: 100%;" required="">
                                        <option value="">Select</option> 
                                        <option <?= $value->show_book == 0 ? 'selected':'' ?> value="0">Private - Students only</option> 
                                        <option <?= $value->show_book == 1 ? 'selected':'' ?> value="1">Public - Everyone can view</option> 
                                    </select>
                                </div>
                                
                                <input type="hidden" name="id" value="<?=  rtrim(base64_encode($value->id_books),'=');?>" ?>
                                
                                <div class="form-group">
                                    <label for="book_image">Book Image*</label>
                                    <input accept=".jpg, .jpeg, .png" type="file" id="book_image" name="book_image" >
                                    <p id="add_image_error"></p>
                                </div>
    
                                <div class="form-group">
                                    <label for="book">Book Pdf*</label>
                                    <input accept=".pdf" type="file" id="book_pdf" name="book" >
                                    <p id="book_error"></p>
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

<script type="text/javascript">
    $(document).ready(function () {
        var icon = document.getElementById('book_pdf');

        icon.onchange = function (e) {

            var file = this.files[0];

            if ('size' in file) {
                if (file.size > 4000000)
                {
                    $("#book_error").html('Error: File Size Error.');
                    this.value = '';
                    $("[name='book']").focus();
                    return false;
                }
            }

            var ext = this.value.match(/\.([^\.]+)$/)[1];
            switch (ext)
            {
                case 'pdf':
                    break;
                default:
                    $("#book_error").html('Error: Incorrect format. Only pdf are allowed.');
                    //$("#cat_image_error").show();

                    this.value = '';
                    $("[name='book']").focus();
            }
        };
    });
</script>


<script type="text/javascript">
    $(document).ready(function () {
        var icon = document.getElementById('book_image');

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
                    $("[name='cat_image']").focus();
            }
        };
    });
</script>

<script type="text/javascript">
    $(document).ready(function () {
        $("#category").change(function () {
            var category = $(this).val();
            var base_url = '<?php echo site_url('admin/Books/get_sub_categories')?>'+'/'+category;
            //  alert(category);
            $.ajax({
                type: "GET",
                url: base_url,
                dataType: 'json',
                success: function (json) {
                    console.log(json);
                    var $el = $("#sub-category");
                    $el.empty(); // remove old options
                    $el.append($("<option></option>")
                            .attr("value", '').text('Select One'));
                    $.each(json, function (key, value) {
                        // alert(key.id_sub_categories);
                        $el.append($("<option></option>")
                                .attr("value", value.id_sub_categories).text(value.name));
                    });
                }
            });
        });
    });
</script>