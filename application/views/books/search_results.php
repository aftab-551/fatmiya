 
<style>
    
.form-control1 {
    display: block;
    width: 100%;
    height: 40px;
    padding: 6px 20px;
    font-size: 16px;
    line-height: 1.42857143;
    color: #555;
    background-color: #fff;
    background-image: none;
    border: 1px solid #d6d6d6;
    border-radius: 30px;
    -webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
    -o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
    transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
}
.radio1 label, .checkbox1 label {
    min-height: 20px;
    padding-left: 20px;
    margin-bottom: 0;
    font-weight: 400;
    cursor: pointer;
}
input[type=checkbox], input[type=radio] {
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
    padding: 0;
}
input, button, select, textarea {
    font-family: inherit;
    font-size: inherit;
    line-height: inherit;
}
label {
    min-height: 20px;
    padding-left: 20px;
    margin-bottom: 0;
    font-weight: 400;
    cursor: pointer;
}
.checkbox label {
    display: inline-block;
    vertical-align: middle;
    position: relative;
    padding-left: 10px;
    line-height: 17px;
}
.checkbox label::before {
    content: "";
    display: inline-block;
    position: absolute;
    width: 16px;
    height: 16px;
    left: 0;
    margin-left: -20px;
    border: 1px solid #cccccc;
    border-radius: 2px;
    background-color: #fff;
    -webkit-transition: border 0.15s ease-in-out, color 0.15s ease-in-out;
    -o-transition: border 0.15s ease-in-out, color 0.15s ease-in-out;
    transition: border 0.15s ease-in-out, color 0.15s ease-in-out;
}

.checkbox-white label::before {
    content: "";
    display: inline-block;
    position: absolute;
    width: 16px;
    height: 16px;
    left: 0;
    margin-left: -20px;
    border: 2px solid #FFF !important;
    border-radius: 2px;
    background-color: transparent !important;
    -webkit-transition: border 0.15s ease-in-out, color 0.15s ease-in-out;
    -o-transition: border 0.15s ease-in-out, color 0.15s ease-in-out;
    transition: border 0.15s ease-in-out, color 0.15s ease-in-out;
}
#loading-div-background {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            background: #4D4D4D;
            width: 100%;
            height: 100%;
            z-index: 1;
            color: #E27513;
            opacity: 0.4;
        }
        
        #loading-div {
            width: 300px;
            height: 200px;
            text-align: center;
            position: absolute;
            left: 50%;
            top: 50%;
            margin-left: -150px;
            margin-top: -100px;
        }

</style>
<div class="container">
    <div class="row">
      <div class="col-sm-12">
        <?php if($this->session->userdata('not_allowed')): ?>
        <div class="alert alert-danger">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Error!</strong> <?php echo $this->session->userdata('not_allowed'); ?>
        </div>
      <?php elseif($this->session->userdata('book_success')): ?>
      <div class="alert alert-success">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Successful!</strong> <?php echo $this->session->userdata('book_success'); ?><br>
        <strong>Item number!</strong> <?php echo $this->session->userdata('item_number'); ?><br>
        <strong>Txn_id!</strong> <?php echo $this->session->userdata('txn_id'); ?><br>
        <strong>Payment amount!</strong> <?php echo $this->session->userdata('payment_amt'); ?><br>
        <strong>status!</strong> <?php echo $this->session->userdata('status'); ?>
      </div>
    <?php elseif($this->session->userdata('book_fail')): ?>
    <div class="alert alert-danger">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <strong>Error!</strong> <?php echo $this->session->userdata('book_fail'); ?>
    </div>
  <?php endif; ?>
</div>
</div>
    <div class="row" style="padding-top: 30px;">
  <div class="col-sm-12">
       <div class="row">
          <div class="col-sm-4 col-md-4">
              <h1 class="sidebar_title">Search</h1>
    <form method="get" action="<?=base_url();?>Books/search" acceptcharset="UTF-8">
            <div class="form-group">
              <input type="text" name="q" value="<?=$this->input->get('q'); ?>"  class="form-control" style="
    border-radius: 4px;
"/>
              
            </div>
          </form>
          </div>
          
          <div class="hidden-sm col-md-4"></div>
          <div class="col-sm-4 col-md-4">
              <h1 class="sidebar_title">Categories</h1>
      <div class="links">
        <?php foreach ($sub_categories as $type): ?>
        <div class="checkbox">
          <input id="checkbox<?=$type->id_sub_categories; ?>" class="styled" name="category[]" value="type_<?=$type->id_sub_categories; ?>" type="checkbox">
          <label for="checkbox<?=$type->id_sub_categories; ?>"><?=$type->sub_cat?></label>
        </div>
      <?php endforeach; ?>


    </div>
          </div>
      </div>
    <!--<div id="teacher_section">
    <h1 class="sidebar_title">Search</h1>
    <form method="get" action="<?=base_url();?>Books/search" acceptcharset="UTF-8">
            <div class="form-group">
              <input type="text" name="q" value="<?=$this->input->get('q'); ?>"  class="form-control"/>
            </div>
          </form>
      <h1 class="sidebar_title">Categories</h1>
      <div class="links">
        <?php foreach ($sub_categories as $type): ?>
        <div class="checkbox checkbox-white">
          <input id="checkbox<?=$type->id_sub_categories; ?>" class="styled" name="category[]" value="type_<?=$type->id_sub_categories; ?>" type="checkbox">
          <label for="checkbox<?=$type->id_sub_categories; ?>"><?=$type->sub_cat?></label>
        </div>
      <?php endforeach; ?>


    </div>
   


</div>-->
<div id="loading-div-background">
  <div id="loading-div" class="ui-corner-all" >
    <img src="<?=base_url();?>assets/images/preloader.gif" class="preloader-logo" alt="preloader-logo">
    <div class="spinner"></div>
  </div>
</div>
</div>
<div class="ajax_data">
    <div class="col-sm-12">
   
<?php $c=0; $value=''; ?>

<div class="row123">
  <?php foreach ($books as $value): ?>
  <?php  if($c == 0): ?>
  <div class="row">
  <?php endif; ?>
  <div class="col-sm-6 col-md-2">
    <div class="booksma">
        <div class="events_img"> 
     <a class="fancybox" rel="ligthbox" href="<?=base_url();?>uploads/books_images/<?=$value->book_image; ?>"><img class="img-responsive" src="<?=base_url();?>uploads/books_images/<?=$value->book_image; ?>" alt=""></a> 
     </div>
    <!--<div class="events_img"><a href="<?=base_url(); ?>Books/view/<?= rtrim(base64_encode($value->id_books),'='); ?>"><img src="<?=base_url();?>uploads/books_images/<?=$value->book_image; ?>" class="img-responsive"></a></div>-->
    <!-- <p class="readbtnwrpr2 text-center"><a href="#" class="readbtnsmall">Add to Favorite</a></p> -->
    <p class="readbtnwrpr2 text-center"><a href="<?=base_url(); ?>Books/view/<?= rtrim(base64_encode($value->id_books),'='); ?>" class="readbtnsmall">View</a></p>
 
</div>
</div>
  <?php $c+=1; if($c % 6 == 0): ?>
  </div>
<?php endif; ?>

<?php if($c%6 == 0){$c=0;} endforeach; ?>
</div>  

</div>
        </div>
</div>
</div>
</div>
  <!-- jQuery 2.1.4 -->
    <script src="<?=base_url();?>admin_assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
<script>
$(document).ready(function ()
{

  newArray = [];
  //$('#loading-div-background').show();

  $("input:checked").each(function () {
    newArray.push($(this).val());
  });

//  $.post("<?= base_url() ?>Books/get_filtered_books/?data=" + newArray + "", {}, function (result) {
//    $(".ajax_data").html(result);
//    newArray = [];
//    $('#loading-div-background').hide();
//  });
  $("input[type=checkbox]").click(function () {

    $('#loading-div-background').show();

    $("input:checked").each(function () {
      newArray.push($(this).val());
    });

    $.post("<?= base_url() ?>Books/get_filtered_books/?data=" + newArray + "", {}, function (result) {
      $(".ajax_data").html(result);
      newArray = [];
      $('#loading-div-background').hide();
    });

    $('html,body').animate({
      scrollTop: $("#loading-div-background").offset().top},
      '500');
  });
$(".fancybox").fancybox({
        openEffect: "none",
        closeEffect: "none"
        });
});
</script>