<footer id="footer">
        <div class="container">
            <div class="row">
            	<div class="col-sm-6 col-md-5">
                	<div class="footer_widget">
                            <?php  $settings = $this->menu->get_settings();?>
                    	<h2>Contact Us</h2>
                        <div class="contact_info">
                            <h3><i class="fa fa-map-marker"></i> Address</h3>
                            <p> <?=$settings[0]['address'];?></p>
                        </div>
                        <div class="row">
                        	<div class="col-sm-6 col-md-6">
                            	<div class="contact_info">
                                    <h3><i class="fa fa-phone"></i> Phone</h3>
                                    <p><a href="tel:+(92) 123-2467898" class="emaillink"><?=$settings[0]['phone'];?></a></p>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                            	<div class="contact_info">
                                    <h3><i class="fa fa-envelope"></i> Email</h3>
                                    <p><a href="mailto:info@hazratkhurramabbasi.com" class="emaillink"><?=$settings[0]['email'];?></a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-7">
                	<div class="map_div">
                    	<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14471.463052779907!2d67.0630112!3d24.9366425!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x1c447b4422c79806!2sKhanqah+E+Aarifi!5e0!3m2!1sen!2s!4v1512587844481" width="100%" height="320" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    	<div class="copyright_div">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-sm-push-6 text_right">
                        <a href="#header" class="footer_links">Home</a>
                        <a id="modal-15671" href="#modal-container-156711" role="button" class="footer_links" data-toggle="modal">Support</a>
                    </div>
                    <div class="col-sm-6 col-sm-pull-6 copyright">
                        <a href="#" class="footer_links">HazratKhurramAbbasi.org</a>
                    </div>
                </div>
            </div>
        </div>
	</footer>
	<!-- /Footer -->

	<!-- Scroll-up -->
	<div class="scroll-up">
		<ul><li><a href="#header"><i class="fa fa-angle-up"></i></a></li></ul>
	</div>

	
	<!-- JS -->
	<script type="text/javascript" src="<?=base_url();?>assets/js/jquery.min.js"></script><!-- jQuery -->
	<script type="text/javascript" src="<?=base_url();?>assets/js/bootstrap.min.js"></script><!-- Bootstrap -->
	<script type="text/javascript" src="<?=base_url();?>assets/js/smoothscroll.js"></script><!-- Smooth Scroll -->
	<script type="text/javascript" src="<?=base_url();?>assets/js/masonry.pkgd.min.js"></script><!-- masonry -->
	<script type="text/javascript" src="<?=base_url();?>assets/js/jquery.fitvids.js"></script><!-- fitvids -->
	<script type="text/javascript" src="<?=base_url();?>assets/js/owl.carousel.min.js"></script><!-- Owl-Carousel -->
	<script type="text/javascript" src="<?=base_url();?>assets/js/jquery.counterup.min.js"></script><!-- CounterUp -->
	<script type="text/javascript" src="<?=base_url();?>assets/js/waypoints.min.js"></script><!-- CounterUp -->
	<script type="text/javascript" src="<?=base_url();?>assets/js/jquery.isotope.min.js"></script><!-- isotope -->
	<script type="text/javascript" src="<?=base_url();?>assets/js/jquery.magnific-popup.min.js"></script><!-- magnific-popup -->
	<script type="text/javascript" src="<?=base_url();?>assets/js/scripts.js"></script><!-- Scripts -->
        <script type="text/javascript" src="<?=base_url();?>assets/js/jquery.fancybox.pack.js"></script>
	<script src="<?=base_url();?>assets/js/slick.js" type="text/javascript" charset="utf-8"></script>
	<script src="https://momentjs.com/downloads/moment.js" type="text/javascript" charset="utf-8"></script>
	<script src="<?=base_url();?>assets/js/moment-hijri.js" type="text/javascript" charset="utf-8"></script>
        
          

<!-- DataTables -->
<script src="<?= base_url(); ?>admin_assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>admin_assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
  	<script type="text/javascript">
    $(document).on('ready', function() {
    //$(".notificationbtn").click();
      $(".regular").slick({
        dots: true,
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1
      });
    var d = new Date();
    var strDate = d.getDate()+"-"+(d.getMonth()+1)+"-"+ d.getFullYear();
    var monthNames = ["January", "February", "March", "April", "May", "June",
  "July", "August", "September", "October", "November", "December"
];
    $.get( "https://api.aladhan.com/gToH?date="+strDate, function( data ) {
       //$(".HijriDate").html(data.data.hijri.day+" "+data.data.hijri.month.en+" "+data.data.hijri.year+" "+data.data.hijri.designation.abbreviated);
       $(".GorgDate").html(moment().format('dddd, Do MMMM YYYY'));
       //$(".GorgDate").html(d.getDate()+" "+monthNames[d.getMonth()]+" "+ d.getFullYear());
    });
   $('#support_sendEmail').validator();
   
    });
  	</script>
    
  
   <script type="text/javascript">
    	$('ul.nav li.dropdown').hover(function() {
		  $(this).find('.dropdown-menu').stop(true, true).delay(100).fadeIn(500);
		}, function() {
		  $(this).find('.dropdown-menu').stop(true, true).delay(100).fadeOut(500);
		});
   </script>
   
	
</body>
</html>