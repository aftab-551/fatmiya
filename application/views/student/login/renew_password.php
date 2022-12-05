<?php $this->load->view('student/login/login_header') ?>
    <div class="login-box">
      <div class="login-logo">
        <b>Fatimiyah Islamic Center</b>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Please change you password</p>
        <?= form_open(base_url('student/Login/renew_password'), 'data-toggle="validator"');  ?>
            <?php if(validation_errors()): ?>
              <div class="alert alert-danger">
                <strong>Error!</strong> <?php echo validation_errors(); ?>
              </div>
            <?php elseif($this->session->userdata('error')): ?>
              <div class="alert alert-danger">
                <strong>Error!</strong> <?php echo $this->session->userdata('error'); ?>
              </div>
            <?php endif; ?>
            
            <!-- <div class="form-group has-feedback">
                <input name="old_password" type="password" class="form-control" placeholder="Old Password" required>
            </div> -->

            <div class="form-group has-feedback">
                <input name="password" type="password" data-minlength="6" class="form-control" placeholder="Password" required>
            </div>

            <div class="form-group has-feedback">
                <input name="password_conf" data-minlength="6" data-match="#password" data-match-error="Whoops, these don't match" id="password_conf" type="password" class="form-control" required placeholder="Confirm Password">
            </div>

            <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        <?= form_close() ?>

<!--        <div class="social-auth-links text-center">
          <p>- OR -</p>
          <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using Facebook</a>
          <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using Google+</a>
        </div> /.social-auth-links -->

<!--        <a href="#">I forgot my password</a><br>
        <a href="register.html" class="text-center">Register a new membership</a>-->

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <?php $this->load->view('student/login/login_footer') ?>