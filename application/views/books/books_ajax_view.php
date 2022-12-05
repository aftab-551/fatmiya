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
    <p class="readbtnwrpr2 text-center hide"><a href="<?=base_url(); ?>Books/view/<?= rtrim(base64_encode($value->id_books),'='); ?>" class="readbtnsmall">View</a></p>
    <p class="readbtnwrpr2 text-center"><a target="_blank"  href="https://docs.google.com/viewer?url=<?=base_url()?>uploads/books/<?=$value->pdf;?>" class="readbtnsmall">View</a></p>
 
 
</div>
</div>
<?php $c+=1; if($c % 6 == 0): ?>
</div>
<?php //$c=0; ?>
<?php endif; ?>

<?php if($c%6 == 0){$c=0;} endforeach; ?>
</div>  
<div class="row">
  <div class="col-sm-12">
    <div class="text-center">
      <?=$links; ?>
    </div>
  </div>
</div>
</div>





  <script type="text/javascript" src="<?= base_url() ?>assets/js/jquery.fancybox.pack.js"></script>
  <script type="text/javascript">
  $(".NextPage").click(function () {

    $("#loading-div-background").show();

    var newArray = [];
    var Array = [];

    $("input:checked").each(function () {
      newArray.push($(this).val());
    });

    var a_href = $(this).find('a').attr('href');
    var res = a_href.replace("#/", "");
    $.post("<?= base_url() ?>Books/get_filtered_books/" + res + "?data=" + newArray + "", {}, function (result) {
      $(".ajax_data").html(result);
      $("#loading-div-background").hide();
    });

    $('html,body').animate({
      scrollTop: $("#loading-div-background").offset().top},
      '500');
  });

  $(".BackPage").click(function () {

    $("#loading-div-background").show();
    var newArray = [];
    var Array = [];

    $("input:checked").each(function () {
      newArray.push($(this).val());
    });

    var a_href = $(this).find('a').attr('href');
    var res = a_href.replace("#/", "");
    $.post("<?= base_url() ?>Books/get_filtered_books/" + res + "?data=" + newArray + "", {}, function (result) {
      $(".ajax_data").html(result);
      $("#loading-div-background").hide();
    });

    $('html,body').animate({
      scrollTop: $("#loading-div-background").offset().top},
      '500');

  });

  $(".APage").click(function () {

    $("#loading-div-background").show();

    var newArray = [];
    var Array = [];

    $("input:checked").each(function () {
      newArray.push($(this).val());
    });

    var a_href = $(this).find('a').attr('href');
    var res = a_href.replace("#/", "");
    $.post("<?= base_url() ?>Books/get_filtered_books/" + res + "?data=" + newArray + "", {}, function (result) {
      $(".ajax_data").html(result);
      $("#loading-div-background").hide();
        
    });

    $('html,body').animate({
      scrollTop: $("#loading-div-background").offset().top},
      '500');

  });
  </script>

