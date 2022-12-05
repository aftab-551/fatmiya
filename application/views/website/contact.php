<!-- Start Breadcrumbs -->
<div class="breadcrumbs overlay">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 offset-lg-2 col-md-12 col-12">
                <div class="breadcrumbs-content">
                    <h1 class="page-title">Contact Us</h1>
                    <p>You can contact us using the form below and our team will get back to you as soon as possible.</p>
                </div>
                <ul class="breadcrumb-nav">
                    <li><a href="<?= base_url('Home'); ?>">Home</a></li>
                    <li>Contact Us</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbs -->

<!-- Start Contact Area -->
<section id="contact-us" class="contact-us section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 col-12">
                <div class="form-main">
                    <?php if($this->session->userdata('email_success')): ?>
                        <div class="alert alert-success">
                            <strong><?= $this->session->userdata('email_success'); ?></strong>
                        </div>
                    <?php endif; ?>
                    <h3 class="title"><span>Ready to Start?</span>
                        Let's Talk
                    </h3>
                    <?= form_open(base_url('Home/send_email'), 'class="form"') ?>
                        <div class="row">
                            <div class="col-lg-6 col-12">
                                <div class="form-group">
                                    <label>Your Name</label>
                                    <input name="name" type="text" placeholder="" required="required">
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="form-group">
                                    <label>Your Subject</label>
                                    <input name="subject" type="text" placeholder=""
                                        required="required">
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="form-group">
                                    <label>Your Email Address</label>
                                    <input name="email" type="email" placeholder="" required="required">
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="form-group">
                                    <label>Your Phone Number</label>
                                    <input name="phone" type="text" placeholder="" required="required">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group message">
                                    <label>Your Message</label>
                                    <textarea name="message" placeholder=""></textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group button">
                                    <button type="submit" class="btn ">Submit Message</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-4 col-12">
                <div class="contact-info">
                    <!-- Start Single Info -->
                    <div class="single-info">
                        <i class="lni lni-map-marker"></i>
                        <h4>Visit Our Office</h4>
                        <p class="no-margin-bottom"><?= $contact->address; ?></p>
                    </div>
                    <!-- End Single Info -->
                    <!-- Start Single Info -->
                    <div class="single-info">
                        <i class="lni lni-phone"></i>
                        <h4>Let's Talk</h4>
                        <p class="no-margin-bottom">Phone: <?= $contact->phone; ?></p>
                    </div>
                    <!-- End Single Info -->
                    <!-- Start Single Info -->
                    <div class="single-info">
                        <i class="lni lni-envelope"></i>
                        <h4>E-mail Us</h4>
                        <p class="no-margin-bottom"><a href="mailto:info@fatimiya.com"><?= $contact->email; ?></a></p>
                    </div>
                    <!-- End Single Info -->
                </div>
            </div>
        </div>
    </div>
</section>
<!--/ End Contact Area -->

<!-- Start Google-map Area -->
<div class="map-section">
    <div class="mapouter">
        <div class="gmap_canvas"><iframe width="100%" height="500" id="gmap_canvas"
                src="<?=  $contact->maps_embed_link; ?>" frameborder="0"
                scrolling="no" marginheight="0" marginwidth="0"></iframe>
        </div>
    </div>
</div>
<!-- End Google-map Area -->