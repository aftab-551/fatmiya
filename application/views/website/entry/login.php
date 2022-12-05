<!-- Start Breadcrumbs -->
<div class="breadcrumbs overlay">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 offset-lg-2 col-md-12 col-12">
                <div class="breadcrumbs-content">
                    <h1 class="page-title">Login</h1>
                    <p>Enter Your Id And Password To Login To Your Portal.</p>
                </div>
                <ul class="breadcrumb-nav">
                    <li><a href="<?= base_url('Home'); ?>">Home</a></li>
                    <li>Login</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbs -->

<!-- start login section -->
<section class="login section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-12">
                <div class="form-head">
                    <?php if(validation_errors()): ?>
                        <div class="alert alert-danger">
                            <strong>Error!</strong> <?php echo validation_errors(); ?>
                        </div>
                    <?php elseif($this->session->userdata('login_error')): ?>
                        <div class="alert alert-danger">
                            <strong>Error!</strong> <?php echo $this->session->userdata('login_error'); ?>
                        </div>
                    <?php elseif($this->session->userdata('success')): ?>
                        <div class="alert alert-success">
                            <strong>Congrats!</strong> <?php echo $this->session->userdata('success'); ?>
                        </div>
                    <?php endif; ?>
                    <h4 class="title">Login</h4>
                    <?= form_open('student/Login/sign_in', 'data-toggle="validator" id="login-form"');  ?>
                        <div class="form-group">
                            <label for="student-id">Student ID</label>
                            <input class="margin-5px-bottom" type="text" id="student-id" value="<?php echo set_value('student_id'); ?>" name="student_id"  placeholder="Student ID">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input class="margin-5px-bottom" type="password" id="password" name="password" placeholder="Password">
                        </div>
                        <div class="check-and-pass">
                            <div class="row align-items-center">
                                <div class="col-lg-6 col-12">
                                    <div class="form-check">
                                        <input id="remember" name="remember_me" type="checkbox" class="form-check-input width-auto">
                                        <label class="form-check-label">Remember me</label>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <a href="javascript:void(0)" class="lost-pass">Lost your password?</a>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="g-recaptcha"
                                data-sitekey="6LeW0zccAAAAAEiKQxaWYtmhq97RSqKCST_X-h7c">
                            </div>
                        </div>
                        <div class="button">
                            <button type="submit" class="btn">Log In</button>
                        </div>
                        <p class="outer-link">Don't have an account? <a href="<?= base_url('student/register'); ?>">Register here</a></p>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end login section -->