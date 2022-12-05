<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content">
        <!-- Blog ADD -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Add Blog</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                </div>
            </div><!-- /.box-header -->
            <div class="box-body">
                <?= form_open_multipart(base_url('admin/Blogs/add_blog'), 'role="form" name="add_blog"') ?>
                    <div class="row">
                        <div class="col-md-12">
                            <?php if (validation_errors()): ?>
                                <div class="alert alert-danger">
                                    <strong>Validation Error!</strong> <?= validation_errors(); ?>
                                </div>
                            <?php elseif(isset($image_error)): ?>
                                <div class="alert alert-danger">
                                        <strong>Image Error!</strong> <?= $image_error; ?>
                                </div>
                            <?php elseif(isset($success)): ?>
                                <div class="alert alert-success">
                                        <strong>Alert!</strong> <?= $success; ?>
                                </div>
                            <?php endif; ?>
                            
                            <!-- Showing all categories -->
                            <div class="form-group">
                                <label for="category">Categories</label>
                                <select name="category_id" id="category" class="select2" style="width: 100%; padding-left:0; margin-top: -4px;" required>
                                    <option value="">Select One</option>
                                    <?php foreach($categories as $c): ?>
                                        <option value="<?= $c->id_categories; ?>" <?php if(isset($c_id)): ?> <?= $c->id_categories == $c_id ? 'selected' : '';  ?> <?php endif; ?>><?= $c->name; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <!-- Using AJAX to get the sub categories of the selected category -->
                            <div class="form-group">
                                <label for="sub-category">Sub Categories</label>
                                <select name="sub_category_id" id="sub-category" class="select2" style="width: 100%; padding-left:0; margin-top: -4px;" required>
                                    <option value="">Select One</option>
                                    <?php if(isset($sub_cat)): ?> <option value="<?= $sub_cat->id_sub_categories; ?>" <?php echo 'selected'; endif; ?>><?= $sub_cat->name; ?></option>
                                </select>
                            </div>

                            <div class="form-group has-feedback">
                                <label for="title">Title</label>
                                <input name="title" value="<?= set_value('title'); ?>" type="text" class="form-control" id="title" placeholder="Enter Title" required>
                            </div>

                            <div class="form-group">
                                <label for="slug">Slug</label>
                                <input name="slug" value="<?= set_value('slug'); ?>" type="text" class="form-control" pattern="[a-zA-Z\-]{4,}" id="slug" placeholder="Enter Slug" title="The slug can only contain a '-', no other characters including space is allowed and it must be unique" required>
                                <p style="font-size: 12px; margin-top: 5px;"><span>The slug can only contain <b>-</b>, no other characters including space is allowed and it must be unique</span></p>
                            </div>

                            <div class="form-group has-feedback">
                                <label for="desc">Excerpt</label>
                                <input name="description" value="<?= set_value('description'); ?>" type="text" class="form-control" id="desc" placeholder="Enter Description" required>
                            </div>

                            <div class="form-group">
                                <label for="dd">Body</label>
                                <!-- <input name="long_description" value="<?= set_value('long_description'); ?>" type="text" class="form-control" id="dd" placeholder="Enter Detailed Description" required> -->
                                
                                <textarea id="editor" name="body"><?= isset($blog_body) ? "$blog_body" : "&lt;p&gt;This is some sample content.&lt;/p&gt;" ?>  </textarea>
                            </div>

                            <div class="form-group">
                                <label>Tags</label>
                                <select id="tags" name="tags[]" class="form-control select2 chosen-select" style="width: 100%;" required="" multiple="multiple">
                                    <!-- <option value="">Select</option> -->
                                    <?php foreach($tags as $t): ?>
                                        <option value="<?= $t->id ?>"
                                        <?php if(isset($tags_selected)): 
                                            foreach($tags_selected as $tag_id): ?>
                                                <?= $t->id == $tag_id ? 'selected' : ''?> 
                                        <?php endforeach; endif;?>> 
                                        <?= $t->name;?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="blog-image">Blog Thumbnail</label>
                                <input type="file" id="blog-image" name="blog_image" required>
                                <p>Size 1920 x 1020</p>
                                <p id="add_image_error"></p>
                            </div>

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

<script src="<?= base_url('admin_assets/plugins/select2/select2.min.js') ?>"></script>
<!-- CKEditor -->
<script src="<?=base_url();?>admin_assets/plugins/ckeditor5/build/ckeditor.js"></script>

<script>
    $('.select2').select2({
        maximumSelectionLength: 3
    });
</script>

<script>
    ClassicEditor
    .create( document.querySelector( '#editor' ), { 
        removePlugins: ['Markdown','TodoList','Image', 'Insertimage', 'HtmlEmbed', 'MediaEmbed'],
    } )
    // .then( editor => {
    //     console.log( editor );
    // } )
    .catch( error => {
        console.error( error );
    } );
</script>

<script type="text/javascript">
    $(document).ready(function () {
        var icon = document.getElementById('blog-image');

        icon.onchange = function (e) {
            var file = this.files[0];
            // alert(file);
            if ('size' in file) {
                // alert(file.size);
                if (file.size > 200000000)
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
            var base_url = '<?php echo site_url('admin/Blogs/get_sub_categories')?>'+'/'+category;
            //  alert(category);
            $.ajax({
                type: "GET",
                url: base_url,
                dataType: 'json',
                success: function (json) {
                    // console.log(json);
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
