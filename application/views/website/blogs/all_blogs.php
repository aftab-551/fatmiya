<!-- Start Breadcrumbs -->
<div class="breadcrumbs overlay">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 offset-lg-2 col-md-12 col-12">
                <div class="breadcrumbs-content">
                    <h1 class="page-title">All Blogs</h1>
                    <p>The posts that are written on different topics, furnish you with valuable information.</p>
                </div>
                <ul class="breadcrumb-nav">
                    <li><a href="<?= base_url('Home'); ?>">Home</a></li>
                    <li>All Blogs</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbs -->

<!-- Start Courses Grid Area-->
<section class="section latest-news-area blog-grid-page">
    <div class="container" id="ajax-content">

    </div>
</section>
<!-- End Courses Grid Area-->

<script>

    ajax_events(page_url=false);

    $(document).on('click','.paginate li a', function(){
        var page_url = $(this).attr('href');
        ajax_events(page_url);
        return false;
    });

    function ajax_events(page_url){
        var base_url = '<?php echo site_url('blog/ajax_blogs') ?>';

        if(page_url){
            base_url = page_url;
            console.log(base_url);
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