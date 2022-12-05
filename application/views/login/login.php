<?php $this->load->view('login/login_head'); ?>
<!-- page wapper-->
<div class="columns-container">
    <div class="container" id="columns">

        <!-- page heading-->
        <h2 class="page-heading">
            <span class="page-heading-title2">Authentication</span>
        </h2>
        <!-- ../page heading-->
        <div class="page-content">
            <div class="row">
                <?php if (validation_errors()): ?>
                    <div class="alert alert-danger">
                        <strong>Validation Error!</strong> <?= validation_errors(); ?>
                    </div>
                <?php elseif ($this->session->userdata('registered')): ?>
                    <div class="alert alert-success">
                        <strong>Alert!</strong> <?= $this->session->userdata('registered'); ?>
                    </div>
                <?php elseif($this->session->userdata('captcha_Error')): ?>
                    <div class="alert alert-danger">
                        <strong>Error!</strong> <?php echo $this->session->userdata('captcha_Error'); ?>
                    </div>
                <?php elseif($this->session->userdata('login_error')): ?>
                    <div class="alert alert-danger">
                        <strong>Error!</strong> <?php echo $this->session->userdata('login_error'); ?>
                    </div>
                <?php elseif($this->session->userdata('verification_error')): ?>
                    <div class="alert alert-danger">
                        <strong>Error!</strong> <?php echo $this->session->userdata('verification_error'); ?>
                    </div>
                <?php endif; ?>
                <div class="col-sm-6">
                    <div class="box-authentication">
                        <form id="registration" name="registration" method="post" role="form" enctype="multipart/form-data" >
                            <h3>Create an account</h3>
                            <p>Please enter your email address to create an account.</p>
                            <div class="form-group">
                                <label for="emmail_register">Email address*</label>
                                <input  name="email" value="<?php echo set_value('email'); ?>" id="emmail_register" type="email" class="form-control" required="">
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <label for="first_name">First Name*</label>
                                <input value="<?php echo set_value('first_name'); ?>" name="first_name" id="first_name" type="text" class="form-control" required="">
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group">
                                <label for="last_name">Last Name*</label>
                                <input value="<?php echo set_value('last_name'); ?>" name="last_name" id="last_name" type="text" class="form-control" required="">
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group">
                                <label for="password">Create password:*</label>
                                <input name="password" id="password" data-minlength="6" type="password" class="form-control" required="">
                                <div class="help-block with-errors">Minimum of 6 characters</div>
                            </div>

                            <div class="form-group">
                                <label for="password_conf">Confirm your password:*</label>
                                <input name="password_conf" data-minlength="6" data-match="#password" data-match-error="Whoops, these don't match" id="password_conf" type="password" class="form-control" required="">
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group">
                                <div class="g-recaptcha" data-sitekey="6Lc4FxsTAAAAAFXNdeqzYOtOGGtao2t5PydWKCyb">

                                </div>
                            </div>

                            <button class="button"><i class="fa fa-user"></i> Create an account</button>
                        </form>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="box-authentication">
                        <h3>Already registered?</h3>
                        <form id="login" name="login" method="post" role="form" enctype="multipart/form-data" >
                            <div class="form-group">
                                <label for="login">Email address*</label>
                                <input name="email" id="login" type="text" class="form-control" required="">
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <label for="password_login">Password*</label>
                                <input name="password" id="password" data-minlength="6" type="password" class="form-control" required="">
                                <div class="help-block with-errors">Minimum of 6 characters</div>
                            </div>
                            <p class="forgot-pass"><a href="#">Forgot your password?</a></p>
                            <button class="button"><i class="fa fa-lock"></i> Sign in</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ./page wapper-->
<?php $this->load->view('footer'); ?>
<script type="text/javascript">
    window.onload = function () {
        document.registration.action = get_action();
        document.login.action = get_login_action();
    }

    function get_action() {
        return '<?= base_url(); ?>Register/insert_member';
    }

    function get_login_action() {
        return '<?= base_url(); ?>Login/sign_in';
    }
    
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#registration').validator();
        $('#login').validator();
    });
</script>