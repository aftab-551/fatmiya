<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Mail Success - FIC.</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.svg" />
    <!-- Place favicon.ico in the root directory -->

    <!-- Web Font -->
    <link href="https://fonts.googleapis.com/css2?family=Spartan:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- ========================= CSS here ========================= -->
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css'); ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/LineIcons.2.0.css'); ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/animate.css'); ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/tiny-slider.css'); ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/glightbox.min.css'); ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/main.css'); ?>" />

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

    <!-- Start Mail Success Area -->
    <div class="mail-success">
        <div class="verticle-lines">
            <div class="vlines one"></div>
            <div class="vlines two"></div>
            <div class="vlines three"></div>
            <div class="vlines four"></div>
        </div>
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                <div class="mail-content">
                    <?php if(isset($this->session->userdata('success'))): ?>
                        <h1>Congratulations!</h1>
                        <h2>Your Mail Sent Successfully</h2>
                        <p>Thanks for contacting with us, We will get back to you asap.</p>
                    <?php else: ?>
                        <h1>Hello!</h1>
                        <h2>Welcome to Fatimiya Islamic Center</h2>
                        <p>We are glad that you are here with us, please have a look at our website an enroll in the courses you like.</p>
                    <?php endif; ?>
                    <div class="button">
                        <a href="<?= base_url('Home'); ?>" class="btn">Go To Home</a>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Mail Success Area -->

    <!-- ========================= JS here ========================= -->
    <script src="<?= base_url('assets/js/bootstrap.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/count-up.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/wow.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/tiny-slider.js'); ?>"></script>
    <script src="<?= base_url('assets/js/glightbox.min.js'); ?>"></script>
    <script>
        window.onload = function () {
            window.setTimeout(fadeout, 500);
        }

        function fadeout() {
            document.querySelector('.preloader').style.opacity = '0';
            document.querySelector('.preloader').style.display = 'none';
        }
    </script>
</body>

</html>