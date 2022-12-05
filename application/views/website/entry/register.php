<!-- Start Breadcrumbs -->
<div class="breadcrumbs overlay">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 offset-lg-2 col-md-12 col-12">
                <div class="breadcrumbs-content">
                    <h1 class="page-title">Register</h1>
                    <p>You can register yourself in the FIC - Learning Management System using the form below</p>
                </div>
                <ul class="breadcrumb-nav">
                    <li><a href="<?= base_url('Home'); ?>">Home</a></li>
                    <li>Register</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbs -->

<!-- start Registration section -->
<section class="login section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-12">
                <div class="form-head">
                    <?php if(validation_errors()): ?>
                        <div class="alert alert-danger">
                            <strong>Error!</strong> <?php echo validation_errors(); ?>
                        </div>
                    <?php elseif($this->session->userdata('success')): ?>
                        <div class="alert alert-success">
                            <strong>Congrats!</strong> <?php echo $this->session->userdata('success'); ?>
                        </div>
                    <?php endif; ?>
                    <h4 class="title">Register</h4>
                    <?= form_open('student/Register/register_student', 'data-toggle="validator" id="register"');  ?>
                        <div class="form-group">
                            <label>First Name</label>
                            <input value="<?php echo set_value('first_name'); ?>" name="first_name" type="text" class="margin-5px-bottom" placeholder="First Name" required>
                        </div>
                        <div class="form-group">
                            <label>Last Name</label>
                            <input value="<?php echo set_value('last_name'); ?>" name="last_name" type="text" class="margin-5px-bottom" placeholder="Last Name" required>
                        </div>
                        <div class="form-group">
                            <label>Father Name</label>
                            <input value="<?php echo set_value('father_name'); ?>" name="father_name" type="text" class="margin-5px-bottom" placeholder="Father Name" required>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input value="<?php echo set_value('email'); ?>" name="email" type="email" class="margin-5px-bottom" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <input value="<?php echo set_value('address'); ?>" name="address" type="text" class="margin-5px-bottom" placeholder="Address" required>
                        </div>
                        <div class="form-group">
                            <label>Contact</label>
                            <input value="<?php echo set_value('contact'); ?>" name="contact" type="text" class="margin-5px-bottom" placeholder="Contact Number" required>
                        </div>
                        <div class="form-group">
                            <label>Qualification</label>
                            <input value="<?php echo set_value('qualification'); ?>" name="qualification" type="text" class="margin-5px-bottom" placeholder="Qualification" required>
                        </div>
                        <div class="button">
                            <button type="submit" class="btn">Register</button>
                        </div>
                        <p class="outer-link">Already have an account? <a href="<?= base_url('student/login'); ?>">Login</a></p>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Registration section -->