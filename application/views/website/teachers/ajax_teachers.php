<div class="row">
    <div class="col-12">
        <div class="section-title align-center gray-bg">
            <span>Teachers</span>
            <h2 class="wow fadeInUp" data-wow-delay=".4s">Our Experienced Advisors</h2>
            <p class="wow fadeInUp" data-wow-delay=".6s">There are many variations of passages of Lorem
                Ipsum available, but the majority have suffered alteration in some form.</p>
        </div>
    </div>
</div>
<div class="row">
    <?php foreach($teachers as $t): ?>
        <?php 
            $char_count = strlen($t->detail);
            $chars = '';
            if($char_count < 174){
                $remaining_chars = 173 - $char_count;
                for ($i = 0; $i < $remaining_chars; $i++) { 
                    if($i % 2 == 0) {
                        $chars .= ' ';
                    }
                    else {
                        $chars .= '_';
                    }
                }
            }
            else {
                $extra_chars = $char_count - 173;
                $chars = substr_replace($t->detail, "", -$extra_chars);
                $chars .= '...';
            }
        ?>
        <!-- Single Team -->
        <div class="col-lg-6 col-md-6 col-12">
            <div class="single-team wow fadeInUp" data-wow-delay=".2s">
                <div class="row">
                    <div class="col-lg-5 col-12">
                        <!-- Image -->
                        <div class="image">
                            <img src="<?= base_url('uploads/teacher_images/'.$t->teacher_image); ?>" alt="Teacher Image">
                        </div>
                        <!-- End Image -->
                    </div>
                    <div class="col-lg-7 col-12">
                        <div class="info-head">
                            <!-- Info Box -->
                            <div class="info-box">
                                <span class="designation"><?= $t->qualification; ?></span>
                                <h4 class="name"><a href="teacher-details.html"><?= $t->name; ?></a></h4>
                                <p><?= strlen($t->detail) < 174 ? $t->detail.'...'.'<span style="visibility:hidden; display:inline;">'.$chars.'</span>' : $chars?></p>
                            </div>
                            <!-- End Info Box -->
                            <!-- Social -->
                            <ul class="social">
                                <?php if($t->facebook != ''):?> 
                                    <li><a href="<?= $t->facebook; ?>"><i class="lni lni-facebook-filled"></i></a></li>
                                <?php endif; ?>
                                <?php if($t->instagram != ''):?> 
                                    <li><a href="<?= $t->instagram; ?>"><i class="lni lni-twitter-original"></i></a></li>
                                <?php endif; ?>
                                <?php if($t->youtube != ''):?> 
                                    <li><a href="<?= $t->youtube; ?>"><i class="lni lni-youtube"></i></a></li>
                                <?php endif; ?>
                                <?php if($t->twitter != ''):?> 
                                    <li><a href="<?= $t->twitter; ?>"><i class="lni lni-twitter-original"></i></a></li>
                                <?php endif; ?>
                            </ul>
                            <!-- End Social -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Single Team -->
    <?php endforeach; ?>
</div>
<div class="row">
    <div class="col-12">
        <!-- Pagination -->
        <div class="pagination center">
            <?= $links; ?>
        </div>
        <!--/ End Pagination -->
    </div>
</div>