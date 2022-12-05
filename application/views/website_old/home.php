<?php if(isset($success)): ?>
    <div class="alert alert-success">
        <strong>Alert!</strong> <?= "$success"; ?>
    </div>
<?php endif; ?>


<!-- Slider -->
<section id="slider">
    <div id="home-carousel" class="carousel slide hidden-xs" data-ride="carousel">			
        <div class="carousel-inner">
            <?php $c = 1;
            foreach ($slider as $s): ?>
                <div class="item <?php if ($c == 1) {
                    echo 'active';
                } ?>">
                    <img class="img-responsive" src="<?= base_url(); ?>uploads/slider_images/<?= $s->image; ?>" alt="">
                </div>
            <?php $c++;
            endforeach; ?>

            <a class="home-carousel-left" href="#home-carousel" data-slide="prev"><i class="fa fa-angle-left"></i></a>
            <a class="home-carousel-right" href="#home-carousel" data-slide="next"><i class="fa fa-angle-right"></i></a>
        </div>		
    </div>
</section>
<!-- /Slider -->

<!-- Live Broadcasting -->
<section id="broadcasting_sec" >
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-4">
                <div class="section-title text-center">
                    <h1 style="display: inline-block;">Live Broadcasting</h1> <span class="styles_onair hide">OFFAIR</span>
                </div>
                <div class="livecasting_div">
                    <iframe src="https://mixlr.com/users/6276123/embed?autoplay=true" width="100%" height="180px" scrolling="no" frameborder="no" marginheight="0" marginwidth="0"></iframe>
                    
                <script> // Shoutcast player
                    (function (win, doc, script, source, objectName) { (win.RadionomyPlayerObject = win.RadionomyPlayerObject || []).push(objectName); win[objectName] = win[objectName] || function (k, v) { (win[objectName].parameters = win[objectName].parameters || { src: source, version: '1.1' })[k] = v; }; var js, rjs = doc.getElementsByTagName(script)[0]; js = doc.createElement(script); js.async = 1; js.src = source; rjs.parentNode.insertBefore(js, rjs); }(window, document, 'script', 'https://www.radionomy.com/js/radionomy.player.js', 'radplayer'));
                    radplayer('url', 'khanqah-e-aarfi');
                    radplayer('type', 'mobile');
                    radplayer('autoplay', '1');
                    radplayer('volume', '50');
                    radplayer('color1', '#ffffff');
                    radplayer('color2', '#000000');
                </script>
                    <div class="radionomy-player"></div>
                </div>
                <div class="app_div hide">
                    <a href="#"><img class="img-responsive" src="<?= base_url(); ?>assets/images/app1.png" alt=""></a>
                    <a href="#"><img class="img-responsive" src="<?= base_url(); ?>assets/images/app2.png" alt=""></a>
                </div>
            </div>
            <div class="col-sm-12 col-md-4">

                <div class="section-title text-center">
                    <h1>Weekly Majalis</h1>
                </div>

                <div class="schdule_div">
                    <a id="modal-15671" href="#modal-container-15671" role="button" class="btn" data-toggle="modal">

                        <img class="img-responsive" src="<?= base_url(); ?>assets/images/calendar_icon.png" alt="">
                        SCHEDULE
                    </a>
                    <!-- Image popup -->
                     <div class="modal fade" id="modal-container-156713" tabindex="-1" role="dialog" aria-hidden="true">
                      <div class="modal-dialog" >
                        <div class="modal-content">
                          <div class="modal-body">
                          	<a class="notificationbtn" style="display:none" href="#modal-container-156713" role="button" class="btn" data-toggle="modal">link</a>
                            	<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-remove"></i></button>
                            
                              <img class="img-responsive notificatonImage" src="<?= base_url(); ?>uploads/notification/13.jpg" alt="">
                             <!-- <iframe   src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3617.983324944467!2d67.0617816844325!3d24.932637972262!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3eb33f65834d8121%3A0x4492132dabc8f96!2sShadab+Masjid!5e0!3m2!1sen!2s!4v1518510911647" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe> -->
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-4">
                <div class="section-title">
                    <h1>Notifications</h1>
                </div>
                <div class="notifications_wrpr">
                    <?php foreach ($notifications as $n): ?>
                        <div class="notifications_divs">
                            <ul style="list-style-type: square;margin-left: -20px;"><li><?=$n->title;?></li></ul>
                            <ul class="hidden">
                                <li><a href="javascript:void(0)"><i class="fa fa-clock-o"></i><?=$n->thedate;?></a>,</li>
                                <li><?=$n->day_name;?>,</li>
                            <!-- <li>@ <?=$n->thetime;?></li>-->
                            </ul>
                        </div>
                    <?php endforeach; ?>
                    
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /Live Broadcasting -->

<!-- Bayanaat Majalis -->
<section id="bayanaatmajalis_sec" >
    <div class="container-fluid">
        <div class="row">
            
            <?php $tc = 1; foreach($bayanat_categories as $b): ?>
            
                <div class="col-sm-12 col-md-4 <?php if($tc == 2){echo 'borderleftright';}?>">
                    <div class="bayanaat_div">
                        <div class="section-title text-center">
                            <h1><?=$b->name;?></h1>
                            <p class="title_sub_para"><?=$b->description;?></p>
                        </div>
                        <?php $bayans = $this->menu->get_bayanat($b->id_sub_categories); ?>
                        
                        
                        <div class="downloadlink_ul_div">
                            <ul>
                                <?php foreach($bayans as $bb): ?>
                                <li>
                                    <a href="<?= base_url() ?>uploads/bayanat/<?=$bb->audio;?>" download="<?=$bb->name;?>" class="download_icon"><i class="flaticon-download-arrow"></i></a>
                                    <a class="truncate" href="<?= base_url() ?>Bayanat/view/<?=  rtrim(base64_encode($bb->id_bayanat),'=');?>"><?=$bb->name;?></a>
                                    <span>(<?=$bb->thedate;?>)</span>
                                </li>
                                <?php endforeach; ?>
                                
                            </ul>
                            <p class="text-center"><a href="<?=base_url();?>bayanat/viewBayanat/<?=  rtrim(base64_encode($b->id_sub_categories),'=');?>" class="viewmore_btn">View More <i class="flaticon-right-arrow"></i></a></p>
                        </div>
                    </div>
                </div>
            <?php $tc++; endforeach; ?>
            
        </div>
    </div>
</section>
<!-- /Bayanaat Majalis -->


<!-- Books Audios -->
<section id="booksaudios_sec" >
    <div class="container">
        <div class="row">
            <div class="col-sm-3 col-md-3">
                <div class="section-title text-center">
                    <h1>Books</h1>
                </div>
                <div class="books_slider">
                    <div class="regular slider">
                        <?php  foreach ($books as $b): ?>
                            <div>
                                <a href="<?=base_url(); ?>Books/view/<?= rtrim(base64_encode($b->id_books),'=');  ?>"><img src="<?= base_url(); ?>uploads/books_images/<?= $b->book_image; ?>" class="img-thumbnail"></a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="col-sm-9 col-md-9">
                <div class="section-title text-center">
                    <h1>Short Audios</h1>
                </div>
                <div class="audios_wrpr">
                    <?php $count = count($bayanat);
                    $ch = 0;
                    foreach ($bayanat as $bb): ?>
                        <?php if ($ch == 0 || $ch == 3): ?>
                        <div class="row">
                        <?php endif; ?>
                            <div class="col-sm-4 col-md-4">
                                <div class="audios_div">
                                    <a href="<?= base_url() ?>Bayanat/view/<?=  rtrim(base64_encode($bb->id_bayanat),'=');?>"><img class="img-thumbnail" src="<?= base_url(); ?>uploads/bayan_images/<?= $bb->bayan_image; ?>" alt=""></a>
                                </div>
                            </div>
                        <?php if ($ch == 2 || $ch == 6): ?>
                        </div> 
                        <?php endif; ?>
                        <?php $ch++;
                    endforeach; ?>
                    <?php if ($count < 2 || $count < 6): ?>
                </div> 
                    <?php endif; ?>
            </div>
        </div>
    </div>
</div>
</section>
<!-- /Books Audios -->

<!-- Footer -->

