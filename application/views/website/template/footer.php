    <!-- Start Footer Area -->
    <footer class="footer style2">
        <!-- Start Middle Top -->
        <div class="footer-middle">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-12">
                        <!-- Single Widget -->
                        <div class="f-about single-footer">
                            <div class="logo">
                                <a href="<?= base_url('Home'); ?>"><img src="<?= base_url('assets/images/logo/logo-hori.svg'); ?>" alt="Logo"></a>
                            </div>
                            <p>Fatimiya Islamic Centre is a religious, non-profit organization that works with the aim of providing quality Islamic Education to our Society.</p>
                            <div class="footer-social">
                                <ul>
                                    <li><a href="https://facebook.com/fatimiyaislamiccentre?_rdc=1&_rdr" target="_blank"><i class="lni lni-facebook-original"></i></a></li>
                                    <li><a href="https://twitter.com/ahasnainhusaini"><i class="lni lni-twitter-original" target="_blank"></i></a></li>
                                    <li><a href="https://www.instagram.com/ahasnainhusaini"><i class="lni lni-instagram" target="_blank"></i></a></li>
                                    <li><a href="https://www.youtube.com/user/alihasnainhusaini"><i class="lni lni-youtube" target="_blank"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- End Single Widget -->
                    </div>
                    <div class="col-lg-8 col-md-8 col-12">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-12">
                                <!-- Single Widget -->
                                <div class="single-footer sm-custom-border f-link px-5">
                                    <h3>Pages</h3>
                                    <ul>
                                        <li><a href="javascript:void(0)">Privacy Policy</a></li>
                                        <li><a href="javascript:void(0)">Terms & Conditions</a></li>
                                        <li><a href="javascript:void(0)">Support Team</a></li>
                                        <li><a href="javascript:void(0)">Our Advisor</a></li>
                                        <li><a href="javascript:void(0)">Return Policy</a></li>
                                    </ul>
                                </div>
                                <!-- End Single Widget -->
                            </div>
                            <div class="col-lg-6 col-md-6 col-12 text-right">
                                <!-- Single Widget -->
                                <div class="single-footer sm-custom-border recent-blog">
                                    <h3>Latest Blogs</h3>
                                    <ul>
                                        <?php foreach($footer_blog_post as $post): ?>
                                            <li>
                                                <a href="<?= base_url('blog/blog-details/'.$post->slug); ?>"><img src="<?= base_url('uploads/blog_images/blog_thumbnails/'.$post->image); ?>" height="100" width="100" alt="BlogImage">
                                                    <?= $post->title ?>;
                                                </a>
                                                <span class="date"><i class="lni lni-calendar"></i><?= date('F j, Y', strtotime($post->published_at)); ?></span>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                                <!-- End Single Widget -->
                            </div>
                            <!-- <div class="col-lg-4 col-md-12 col-12"> -->
                                <!-- Single Widget -->
                                <!-- <div class="single-footer footer-newsletter">
                                    <h3>Newsletter</h3>
                                    <p>Subscribe to us to always stay in touch with us.</p>
                                    <form action="mail/mail.php" method="get" target="_blank" class="newsletter-form">
                                        <input name="EMAIL" placeholder="Your email address" class="common-input"
                                            onfocus="this.placeholder = ''"
                                            onblur="this.placeholder = 'Your email address'" required="" type="email">
                                        <div class="button">
                                            <button class="btn">Subscribe Now!</button>
                                        </div>
                                    </form>
                                </div> -->
                                <!-- End Single Widget -->
                            <!-- </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ End Footer Middle -->
        <!-- Start Footer Bottom -->
        <div class="footer-bottom">
            <div class="container">
                <div class="inner">
                    <div class="row">
                        <div class="col-12">
                            <div class="left">
                                <p>Designed and Developed by<a href="javascript:void(0)" rel="nofollow"
                                        target="_blank">eParameter</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Footer Middle -->
    </footer>
    <!--/ End Footer Area -->

    <!-- ========================= scroll-top ========================= -->
    <a href="#" class="scroll-top btn-hover">
        <i class="lni lni-chevron-up"></i>
    </a>

    <!-- ========================= JS here ========================= -->
    <script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/count-up.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/wow.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/tiny-slider.js') ?>"></script>
    <script src="<?= base_url('assets/js/glightbox.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/main.js') ?>"></script>

    <script type="text/javascript">
        //========= Hero Slider 
        tns({
            container: '.hero-slider',
            items: 1,
            slideBy: 'page',
            autoplay: true,
            autoplayButtonOutput: false,
            mouseDrag: true,
            gutter: 0,
            nav: true,
            controls: false,
            controlsText: ['<i class="lni lni-arrow-left"></i>', '<i class="lni lni-arrow-right"></i>'],
        });
        //========= testimonial 
        tns({
            container: '.testimonial-slider',
            items: 3,
            slideBy: 'page',
            autoplay: false,
            mouseDrag: true,
            gutter: 0,
            nav: true,
            controls: false,
            controlsText: ['<i class="lni lni-arrow-left"></i>', '<i class="lni lni-arrow-right"></i>'],
            responsive: {
                0: {
                    items: 1,
                },
                540: {
                    items: 1,
                },
                768: {
                    items: 2,
                },
                992: {
                    items: 2,
                },
                1170: {
                    items: 3,
                }
            }
        });
        //====== Clients Logo Slider
        tns({
            container: '.client-logo-carousel',
            slideBy: 'page',
            autoplay: true,
            autoplayButtonOutput: false,
            mouseDrag: true,
            gutter: 15,
            nav: false,
            controls: false,
            responsive: {
                0: {
                    items: 1,
                },
                540: {
                    items: 3,
                },
                768: {
                    items: 4,
                },
                992: {
                    items: 4,
                },
                1170: {
                    items: 6,
                }
            }
        });
        //========= glightbox
        GLightbox({
            'href': 'https://www.youtube.com/watch?v=r44RKWyfcFw&fbclid=IwAR21beSJORalzmzokxDRcGfkZA1AtRTE__l5N4r09HcGS5Y6vOluyouM9EM',
            'type': 'video',
            'source': 'youtube', //vimeo, youtube or local
            'width': 900,
            'autoplayVideos': true,
        });
    </script>
</body>

</html>