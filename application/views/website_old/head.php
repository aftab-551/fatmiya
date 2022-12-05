<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Khanqah-E-Aarifi - Mufti Khurram Abbasi</title>
	
	<!-- Main CSS file -->
	<link rel="stylesheet" href="<?=base_url();?>assets/css/bootstrap.min.css" />
	<link rel="stylesheet" href="<?=base_url();?>assets/css/owl.carousel.css" />
	<link rel="stylesheet" href="<?=base_url();?>assets/css/magnific-popup.css" />
	<link rel="stylesheet" href="<?=base_url();?>assets/css/font-awesome.css" />
	<link rel="stylesheet" href="<?=base_url();?>assets/css/style.css" />
	<link rel="stylesheet" href="<?=base_url();?>assets/css/responsive.css" />
        <link rel="stylesheet" href="<?=base_url();?>assets/css/jquery.fancybox.css" />
    
	<link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/css/slick.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/css/slick-theme.css">
	<style type="text/css">
		.slider {margin: 0px auto;}
		.slick-slide {margin: 0px 0px;}
		.slick-slide img {width: 100%;}
	</style>
  
	<!-- Favicon -->
	<link rel="shortcut icon" href="<?=base_url();?>assets/images/icon/favicon.png">
	
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	  <script src="<?=base_url();?>assets/https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	  <script src="<?=base_url();?>assets/https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  	ga('create', 'UA-104924519-1', 'auto');
  	ga('send', 'pageview');
	</script>
	<script>
	var proxyUrl = 'https://cors-anywhere.herokuapp.com/',
		targetUrl = 'https://hamariweb.com/islam/GetPrayerTimes.ashx?callback=jQuery111109076373083443054_1515440574043&latlng=24.8667%2C67.05&_=1515440574044'
	fetch(proxyUrl + targetUrl)
	  .then(blob => blob.json())
	  .then(data => {
		console.table(data);
		document.querySelector(".HijriDate").innerHTML = data[0];
		return data;
	  })
	  .catch(e => {
		console.log(e);
		return e;
	  });
	</script>
</head>
<body>
			
  
  <?php  $this->load->view($header_content); ?>
  

	<!-- Preloader -->
	<div id="st-preloader">
		<div id="pre-status">
			<div class="preload-placeholder"></div>
		</div>
	</div>
	<!-- /Preloader -->
        
	<!-- Header -->
	<header id="header" >
            <div class="container">
                    <div class="row">
                    <div class="col-sm-3 col-sm-push-9 col-md-3 col-md-push-9 logo_div">
                            <a class="logo" href="javascript:void(0)"><img src="<?=base_url();?>assets/images/logo.png" class="img-responsive" alt=""></a>
                    </div>
                    <div class="col-sm-3 col-sm-push-3 col-md-3 col-md-push-3">
                            <img src="<?=base_url();?>assets/images/shaikh_name1.png" class="img-responsive shaikhkhurram" alt="">
                    </div>
                    <div class="col-sm-1 col-sm-pull-1 col-md-1 col-md-pull-1">
                            <img src="<?=base_url();?>assets/images/khalifa_name.png" class="img-responsive khalifamijaaz" alt="">
                    </div>
                    <div class="col-sm-5 col-sm-pull-7 col-md-5 col-md-pull-7">
                            <img src="<?=base_url();?>assets/images/shaikh_name.png" class="img-responsive shaikhname" alt="">
                    </div>
                </div>
            </div>
          <section id="date">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-lg-4 col-sm-6 col-xs-6"><strong><p class="GorgDate"></p></strong></div>
		    <div class="col-md-4 col-lg-4 hidden-sm hidden-xs"></div>
                    <div class="col-md-4 col-lg-4 col-sm-6 col-xs-6"><strong><p class="HijriDate text-right"></p></strong></div>
                </div>
            </div>
        </section>
	
		<nav class="navbar st-navbar navbar-fixed-top">
			<div class="container">
                <div class="row">
                	<div class="col-sm-12">
                    	<div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#st-navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            
                        </div>
                        <div class="collapse navbar-collapse" id="st-navbar-collapse">
                            <ul class="nav navbar-nav">
                                <li><a href="<?=base_url();?>">Home</a></li>
                                <?php foreach($categories as $cat): ?>
                                <li class="dropdown">
                                  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?=$cat->name;?> <i class="fa fa-angle-down"></i></a>
                                 
                                  <?php  $sub_cats = $this->menu->get_sub_categories_where($cat->id_categories); ?>
                                  
                                  <ul class="dropdown-menu">
                                      <?php foreach($sub_cats as $scat): ?>
                                      <?php if ($cat->category_type==1) { ?>
                                      <li><a href="<?=base_url();?>bayanat/viewBayanat/<?=  rtrim(base64_encode($scat->id_sub_categories),'=');?>"><?=$scat->name;?></a></li>
                                      <?php } else if ($cat->category_type==2) { ?>
                                      <li><a href="<?=base_url();?>bayanat/viewShortAudio/<?=  rtrim(base64_encode($scat->id_sub_categories),'=');?>"><?=$scat->name;?></a></li>                                              
                                      <?php } else if ($cat->category_type==3) {?>
                                      <li><a href="<?=base_url();?>books/viewBooks/<?=  rtrim(base64_encode($scat->id_sub_categories),'=');?>"><?=$scat->name;?></a></li>                                                          
                                      <?php } else if ($cat->category_type==4) {?>
                                      <li><a href="<?=base_url();?>books/viewBooks/<?=  rtrim(base64_encode($scat->id_sub_categories),'=');?>"><?=$scat->name;?></a></li>                                                          
                                      <?php } ?>
                                    <?php endforeach; ?>
                                  </ul>
                                </li>
                                 <?php endforeach; ?>
                                
                                <li><a href="<?=base_url();?>books/viewBooks">Books</a></li>
                                <li><a href="<?=base_url();?>ask">Ask Hazrat</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
			</div>
		</nav>
	</header>
        <!-- /Header -->