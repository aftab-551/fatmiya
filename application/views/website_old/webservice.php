<div class="url"><?=$url?></div>
<div class="html_div"></div>

<script type="text/javascript" src="<?=base_url();?>assets/js/jquery.min.js"></script><!-- jQuery -->
	
<script>
    $(document).on('ready', function() {
        $.post($(".url").html(), {}, function (result) {
            var dataArr = JSON.parse(result);
            $.each(dataArr, function( index, value ) {
               console.log(value);
               var str = value.id + ": " + value.name+ ": " + value.audio+ ": " + value.bayan_image+": "+value.status;
               str += value.Date+": "+value.views+ ": " + value.id_categories+": "+value.id_sub_categories+"<br/>";
               $(".html_div").append(str);
            });
        });
    });
</script>