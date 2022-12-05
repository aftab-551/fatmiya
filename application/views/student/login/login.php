<?php $this->load->view('student/login/login_header') ?>
    <div class="login-box">
      <div class="login-logo">
        <b>Fatimiyah Islamic Center</b>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>
        <?= form_open(base_url('student/Login/sign_in'), 'data-toggle="validator" id="login-form"');  ?>
            <?php if(validation_errors()): ?>
              <div class="alert alert-danger">
                <strong>Error!</strong> <?= validation_errors(); ?>
              </div>
            <?php elseif($this->session->userdata('login_error')): ?>
              <div class="alert alert-danger">
                <strong>Error!</strong> <?= $this->session->userdata('login_error'); ?>
              </div>
            <?php elseif($this->session->userdata('success')): ?>
              <div class="alert alert-success">
                <strong>Congrats!</strong> <?= $this->session->userdata('success'); ?>
              </div>
            <?php endif; ?>
            
            <div class="form-group has-feedback">
                <input value="<?php echo set_value('student_id'); ?>" name="student_id" type="text" class="form-control" placeholder="Student Id" required="">
                <div class="help-block with-errors"></div>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
              
            <div class="form-group has-feedback">
              <input name="password" type="password" class="form-control" placeholder="Password" required="">
              <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            
            <div class="form-group">
              <div class="g-recaptcha"
                  data-sitekey="6LeW0zccAAAAAEiKQxaWYtmhq97RSqKCST_X-h7c">
              </div>
            </div>

            <div class="form-group has-feedback">
              <input id="remember" name="remember_me" type="checkbox" class="form-control" placeholder="remember me">
              <label for="remember"> Remember Me</label>
            </div>

              <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
            </div><!-- /.col -->
          </div>
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