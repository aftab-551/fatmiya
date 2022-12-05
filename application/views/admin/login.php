<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>FIC</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Favicon -->
	<link rel="shortcut icon" href="<?=base_url();?>assets/images/icon/favicon.png">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?=base_url();?>admin_assets/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?=base_url();?>admin_assets/dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?=base_url();?>admin_assets/plugins/iCheck/square/blue.css">
    <!-- Google Recaptcha -->
    <script src="https://www.google.com/recaptcha/api.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="<?=base_url();?>admin/Login"><b>Fatimiyah Islamic Center</b></a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>
        <?= form_open(base_url('admin/Login/sign_in'), 'data-toggle="validator"');  ?>
          <?php if(validation_errors()): ?>
            <div class="alert alert-danger">
            <strong>Error!</strong> <?php echo validation_errors(); ?>
            </div>
          <?php elseif($this->session->userdata('login_error')): ?>
            <div class="alert alert-danger">
            <strong>Error!</strong> <?php echo $this->session->userdata('login_error'); ?>
            </div>
          <?php endif; ?>
          
          <div class="form-group has-feedback">
              <input value="<?php echo set_value('email'); ?>" name="email" type="email" class="form-control" placeholder="Email" required="">
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

    <!-- jQuery 2.1.4 -->
    <script src="<?=base_url();?>admin_assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?=base_url();?>admin_assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="<?=base_url();?>admin_assets/plugins/iCheck/icheck.min.js"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
  </body>
</html>
