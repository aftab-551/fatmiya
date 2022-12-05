<!-- Start Breadcrumbs -->
<div class="breadcrumbs overlay">
    <div class="container ajax-content">
        <div class="row align-items-center">
            <div class="col-lg-8 offset-lg-2 col-md-12 col-12">
                <div class="breadcrumbs-content">
                    <h1 class="page-title">Events</h1>
                    <p>All the upcoming or passed events. You can click on these events to view the details.</p>
                </div>
                <ul class="breadcrumb-nav">
                    <li><a href="<?= base_url('Home'); ?>">Home</a></li>
                    <li>Events</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbs -->

<!-- Start Events Area-->
<section class="events section grid-page">
    <div class="container" id="ajax-content">
        
    </div>
</section>
<!-- End Events Area-->

<script>

    ajax_events(page_url=false);

    $(document).on('click','.paginate li a', function(){
        var page_url = $(this).attr('href');
        ajax_events(page_url);
        return false;
    });

    function ajax_events(page_url){
        var base_url = '<?php echo site_url('events/ajax_events') ?>';

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