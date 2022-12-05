<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>FIC - Fatimiya Islamic Centre</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('assets/images/favicon.svg'); ?>" />
    <!-- Place favicon.ico in the root directory -->

    <!-- Web Font -->
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- ========================= CSS here ========================= -->
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/LineIcons.2.0.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/animate.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/tiny-slider.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/glightbox.min.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/scss/main.css') ?>" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- <script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js'></script> -->
    <script type='text/javascript' src='<?= base_url('admin_assets/plugins/unitegallery/dist/js/unitegallery.min.js'); ?>'></script> 
    <link rel="stylesheet" href="<?= base_url('admin_assets/plugins/unitegallery/dist/css/unite-gallery.css'); ?>">
    <script type='text/javascript' src='<?= base_url('admin_assets/plugins/unitegallery/dist/themes/default/ug-theme-default.js'); ?>'></script> 
    <link rel="stylesheet" href="<?= base_url('admin_assets/plugins/unitegallery/dist/themes/default/ug-theme-default.css'); ?>">

    <!-- Google Recaptcha  -->
    <script src="https://www.google.com/recaptcha/api.js"></script>
</head>

<body>
    <!--[if lte IE 9]>
      <p class="browserupgrade">
        You are using an <strong>outdated</strong> browser. Please
        <a href="https://browsehappy.com/">upgrade your browser</a> to improve
        your experience and security.
      </p>
    <![endif]-->

    <!-- Preloader -->
    <div class="preloader">
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- /End Preloader -->

    <!-- Start Header Area -->
    <header class="header navbar-area">
        <!-- Toolbar Start -->
        <div class="toolbar-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-6 col-12">
                        <div class="toolbar-social">
                            <ul>
                                <li><span class="title">Follow Us On : </span></li>
                                <li><a href="https://facebook.com/fatimiyaislamiccentre?_rdc=1&_rdr"><i class="lni lni-facebook-original"></i></a></li>
                                <li><a href="https://twitter.com/ahasnainhusaini"><i class="lni lni-twitter-original"></i></a></li>
                                <li><a href="https://www.instagram.com/ahasnainhusaini"><i class="lni lni-instagram"></i></a></li>
                                <li><a href="https://www.youtube.com/user/alihasnainhusaini"><i class="lni lni-youtube"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <?php if(! $this->session->userdata('student_id')): ?>
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="toolbar-login">
                                <div class="button">
                                    <a href="<?= base_url('student/register'); ?>">Create an Account</a>
                                    <a href="<?= base_url('student/login'); ?>" class="btn">Log In</a>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <!-- Toolbar End -->
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                <div class="nav-inner">
                    <nav class="navbar navbar-expand-lg">
                        <a class="navbar-brand" href="<?= base_url('Home'); ?>">
                            <img src="<?= base_url('assets/images/logo/logo-hori.svg'); ?>" alt="Logo">
                        </a>
                        <button class="navbar-toggler mobile-menu-btn" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                            <ul id="nav" class="navbar-nav ms-auto">
                                <li class="nav-item">
                                    <a href="<?= base_url('Home'); ?>" class="<?= current_url() == base_url('Home') || current_url() == base_url('') ? 'active': ''; ?>">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="<?= current_url() == base_url('program/all-programs') ? 'active': ''; ?>" href="<?= base_url('program/all-programs'); ?>">Programs</a>
                                </li>
                                <li class="nav-item">
                                    <a class="page-scroll dd-menu collapsed <?= current_url() == base_url('courses/all-courses') || current_url() == base_url('courses/all-offered-courses') || current_url() == base_url('courses/course-details/'.$this->uri->segment(3)) ? 'active': ''; ?>" href="javascript:void(0)"
                                        data-bs-toggle="collapse" data-bs-target="#submenu-1-2"
                                        aria-controls="navbarSupportedContent" aria-expanded="false"
                                        aria-label="Toggle navigation">Courses</a>
                                    <ul class="sub-menu collapse" id="submenu-1-2">
                                        <li class="nav-item"><a href="<?= base_url('courses/all-courses') ?>">All Courses</a></li>
                                        <li class="nav-item"><a href="<?= base_url('courses/all-offered-courses'); ?>">Offered Courses</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a class="<?= current_url() == base_url('teachers/all-teachers') ? 'active': ''; ?>" href="<?= base_url('teachers/all-teachers'); ?>">Teachers</a>
                                </li>
                                <li class="nav-item">
                                    <a class="<?= current_url() == base_url('events/all_events') ? 'active': ''; ?>" href="<?= base_url('events/all_events'); ?>">Events</a>
                                    <!-- <a class="page-scroll dd-menu collapsed" href="javascript:void(0)"
                                        data-bs-toggle="collapse" data-bs-target="#submenu-1-3"
                                        aria-controls="navbarSupportedContent" aria-expanded="false"
                                        aria-label="Toggle navigation">Events
                                    </a> -->
                                    <!-- <ul class="sub-menu collapse" id="submenu-1-3">
                                        <li class="nav-item"><a href="events-grid.html">Events Grid</a></li>
                                        <li class="nav-item"><a href="event-details.html">Event Details</a></li>
                                    </ul> -->
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('blog/all-blogs'); ?>" class="<?= current_url() == base_url('blog/all-blogs') || current_url() == base_url('blog/blog-details/'.$this->uri->segment(3)) ? 'active': ''; ?>">Blog</a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('book/all-books'); ?>" class="<?= current_url() == base_url('book/all-books') ? 'active': ''; ?>">Books & Articles</a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('gallery/all-images'); ?>" class="<?= current_url() == base_url('gallery/all-images'); ?>">Gallery</a>
                                </li>
                                <li class="nav-item"><a class="<?= current_url() == base_url('Home/contact_us') ? 'active': ''; ?>" href="<?= base_url('Home/contact_us'); ?>">Contact</a></li>
                            </ul>
                            <!-- <form class="d-flex search-form">
                                <input class="form-control me-2" type="search" placeholder="Search"
                                    aria-label="Search">
                                <button class="btn btn-outline-success" type="submit"><i
                                        class="lni lni-search-alt"></i></button>
                            </form> -->
                        </div> <!-- navbar collapse -->
                    </nav> <!-- navbar -->
                </div>
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </header>
    <!-- End Header Area -->