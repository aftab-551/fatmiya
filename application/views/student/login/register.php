<?php $this->load->view('student/login/login_header') ?>
    <div class="login-box">
        <div class="login-logo">
            <b>Fatimiyah Islamic Center</b>
        </div><!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">Register a new student account</p>
            <?= form_open(base_url('student/Register/register_student'), 'data-toggle="validator" id="register"');  ?>
                <?php if(validation_errors()): ?>
                    <div class="alert alert-danger">
                        <strong>Error!</strong> <?php echo validation_errors(); ?>
                    </div>
                <?php elseif($this->session->userdata('success')): ?>
                    <div class="alert alert-success">
                        <strong>Congrats!</strong> <?php echo $this->session->userdata('success'); ?>
                    </div>
                <?php endif; ?>
                
                <div class="form-group has-feedback">
                    <input value="<?php echo set_value('first_name'); ?>" name="first_name" type="text" class="form-control" placeholder="First Name" required>
                </div>

                <div class="form-group has-feedback">
                    <input value="<?php echo set_value('last_name'); ?>" name="last_name" type="text" class="form-control" placeholder="Last Name" required>
                </div>

                <div class="form-group has-feedback">
                    <input value="<?php echo set_value('father_name'); ?>" name="father_name" type="text" class="form-control" placeholder="Father Name" required>
                </div>

                <div class="form-group has-feedback">
                    <input value="<?php echo set_value('email'); ?>" name="email" type="email" class="form-control" placeholder="Email">
                </div>
                    
                <div class="form-group has-feedback">
                    <input value="<?php echo set_value('address'); ?>" name="address" type="text" class="form-control" placeholder="Address" required>
                </div>

                <div class="form-group has-feedback">
                    <input value="<?php echo set_value('contact'); ?>" name="contact" type="text" class="form-control" placeholder="Contact" required>
                </div>

                <div class="form-group has-feedback">
                <input value="<?php echo set_value('qualification'); ?>" name="qualification" type="text" class="form-control" placeholder="Qualification" required>
                </div>

                <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
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