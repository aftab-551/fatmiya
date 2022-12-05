<!-- Start Breadcrumbs -->
<div class="breadcrumbs overlay">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 offset-lg-2 col-md-12 col-12">
                <div class="breadcrumbs-content">
                    <h1 class="page-title">Our Gallery</h1>
                    <p>All the pictures of our recently occurred or passed events.</p>
                </div>
                <ul class="breadcrumb-nav">
                    <li><a href="<?= base_url('Home') ?>">Home</a></li>
                    <li>Our Gallery</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbs -->

<!-- Start Photo Gallery -->
<div class="photo-gallery section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title align-center">
                    <span class="wow zoomIn" data-wow-delay="0.2s">Gallery</span>
                    <h2 class="wow fadeInUp" data-wow-delay=".4s">Our Photo Gallery</h2>
                    <!-- <p class="wow fadeInUp" data-wow-delay=".6s">There are many variations of passages of Lorem
                        Ipsum available, but the majority have suffered alteration in some form.</p> -->
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                    <div id="gallery" style="display:none;">
                        <?php foreach($images as $image): ?>
                            <img alt="Image 1 Title" src="<?= base_url('uploads/gallery_images/images_thumbnails/'.$image->image); ?>"
                            data-image="<?= base_url('uploads/gallery_images/'.$image->image); ?>">
                        <?php endforeach; ?>
                    </div>
                <!-- <main id="gallery">
                    <div class="main-img">
                        <img class="current-img" src="https://via.placeholder.com/1920x950" id="current" alt="#">
                    </div>
                    <div class="images">
                        
                    </div>
                </main> -->
            </div>
        </div>
    </div>
</div>

<!-- <script type="text/javascript">
        const current = document.getElementById("current");
        const opacity = 0.6;
        const imgs = document.querySelectorAll(".img");
        imgs.forEach(img => {
            img.addEventListener("click", (e) => {
                //reset opacity
                imgs.forEach(img => {
                    img.style.opacity = 1;
                });
                current.src = e.target.src;
                //adding class 
                //current.classList.add("fade-in");
                //opacity
                e.target.style.opacity = opacity;
            });
        });
</script> -->

<script type="text/javascript"> 
			
    $(document).ready(function(){ 
        $("#gallery").unitegallery({
            gallery_width: 1920,
            gallery_height: 950,
            thumb_width: 150,
            thumb_height:100,
        }); 
    }); 
		
</script>
<!-- End Photo Gallery -->