<!-- Ask Hazrat -->

<section id="contact">
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="section-title text-center">
<h1>Ask Hazrat</h1>
</div>
</div>

<div class="col-sm-4 contact-info">
<ul class="hazrat_info">
	<li>
	<h3>Note</h3>
	Ask Hazrat section is developed to ask general questions from Sheikh Hazrat Muhammad Khurram Abbasi DB. All answers will be provided on directions of Sheikh. All questions related to Fatwa will not be answered</li>
	<li>
	<!--<h3>Phone</h3>
	+(92) 123-2467898</li>
	<li>
	<h3>Email</h3>
	<a href="mailto:info@khanqaheaarfi.com">info@khanqaheaarfi.com</a></li>
	<li>
	<h3>Website</h3>
	<a href="www.hazratferozmemon.org">HazratFerozMemon.org</a></li>-->
</ul>
</div>

<div class="col-sm-7 col-sm-offset-1">
<?php if(isset($success)): ?>
<div class="alert alert-success">
       <strong>Alert!</strong> <?= "$success"; ?>
</div>
<?php endif; ?>
<form id="submit_answer"  class="contact-form" method="post" name="submit_answer">
<div class="row">
<div class="col-sm-6"><input name="name" placeholder="Name*" required="" type="text" /></div>

<div class="col-sm-6"><input name="email" placeholder="Email*" required="" type="email" /></div>

<div class="col-sm-12"><input name="sub" placeholder="Subject*" type="text" required="" /></div>

<div class="col-sm-12"><textarea cols="30" name="ques" placeholder="Question*" required="" rows="7"></textarea></div>

<div class="col-sm-12"><input class="btn btn-send" name="submit" type="submit" value="Submit" /></div>
</div>
</form>
</div>
</div>
</div>
</section>
<script type="text/javascript">
    window.onload = function () {
        document.submit_answer.action = get_action();
    }

    function get_action() {
        return '<?= base_url(); ?>Ask';
    }
</script>
<script type="text/javascript">
    $( document ).ready(function(){
		$('#submit_answer').validator();
    });
</script>
<!-- /Ask Hazrat -->