<!-- Start Breadcrumbs -->
<div class="breadcrumbs overlay">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 offset-lg-2 col-md-12 col-12">
                <div class="breadcrumbs-content">
                    <h1 class="page-title">Books</h1>
                    <p>All the books that are available for you to enlighten yourself. You can view the books as well as download them.</p>
                </div>
                <ul class="breadcrumb-nav">
                    <li><a href="<?= base_url('Home'); ?>">Home</a></li>
                    <li>Books</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbs -->

<!-- Start Books Grid Area-->
<section class="courses section grid-page">
    <div class="container" id="ajax-content">

    </div>
</section>
<!-- End Books Grid Area-->

<script>

    ajax_events(page_url=false);

    $(document).on('click','.paginate li a', function(){
        var page_url = $(this).attr('href');
        ajax_events(page_url);
        return false;
    });

    function ajax_events(page_url){
        var base_url = '<?php echo site_url('book/ajax_books') ?>';

        if(page_url){
            base_url = page_url;
        }

        $.ajax({
            type: "GET",
            url: base_url,
            data: "",
            success: function(response){
                console.log(response);
                $('#ajax-content').html(response);
            }
        })
    }
</script>