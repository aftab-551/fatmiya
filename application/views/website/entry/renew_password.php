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
                    <?php elseif($this->session->userdata('error')): ?>
                        <div class="alert alert-danger">
                            <strong>Error!</strong> <?php echo $this->session->userdata('error'); ?>
                        </div>
                        <?php endif; ?>
                    <h4 class="title">Renew Password</h4>
                    <?= form_open('student/Login/renew_password', 'data-toggle="validator"');  ?>
                        <div class="form-group">
                            <label for="student-id">Password</label>
                            <input name="password" type="password" data-minlength="6" class="form-control" placeholder="Password" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Confirm Password</label>
                            <input name="password_conf" data-minlength="6" data-match="#password" data-match-error="Whoops, these don't match" id="password_conf" type="password" class="form-control" required placeholder="Confirm Password">
                        </div>
                        <div class="button">
                            <button type="submit" class="btn">Renew</button>
                        </div>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end login section -->