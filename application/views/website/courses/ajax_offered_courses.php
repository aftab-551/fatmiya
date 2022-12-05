<div class="row">
    <?php foreach($offered_courses as $oc): ?>
        <?php 
            $char_count = strlen($oc->course_shortdesc);
            $chars = '';
            $char_count_title = strlen($oc->course_name);
            $chars_title = '';

            if($char_count_title < 31){
                $remaining_chars = 30 - $char_count_title;
                for ($i = 0; $i < $remaining_chars; $i++) { 
                    if($i % 2 == 0) {
                        $chars_title .= '_';
                    }
                    else {
                        $chars_title .= ' ';
                    }
                }
            }
            else {
                $extra_chars = $char_count_title - 30;
                $chars_title = mb_substr($oc->course_name, 0, -$extra_chars);
                $chars_title .= '...';
            }
            if($char_count < 111){
                $remaining_chars = 110 - $char_count;
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
                $extra_chars = $char_count - 110;
                $chars = substr_replace($oc->course_shortdesc, "", -$extra_chars);
                $chars .= '...';
            }
        ?>
        <div class="col-lg-4 col-md-6 col-12">
            <!-- Start Single Course -->
            <div class="single-course wow fadeInUp" data-wow-delay=".2s">
                <div class="course-image">
                    <a href="<?= base_url('courses/course-details/'.rtrim(base64_encode($oc->id),'=')) ?>"><img src="<?= base_url('uploads/course_images/'.$oc->course_thumbnail); ?>"
                        alt="#"></a>
                    <!-- <p class="price">$180</p> -->
                </div>
                <div class="content">
                    <h3><a href="<?= base_url('courses/course-details/'.rtrim(base64_encode($oc->id),'=')) ?>"><?= strlen($oc->course_name) < 31 ? $oc->course_name.'<span style="visibility:hidden; display:inline;">'.$chars_title.'</span>' : $chars_title ?></a></h3>
                    <p><?= strlen($oc->course_shortdesc) < 111 ? $oc->course_shortdesc.'...'.'<span style="visibility:hidden; display:inline;">'.$chars.'</span>' : $chars?></p>

                    <div class="button" style="margin-top:30px;">
                        <a href="<?= base_url('courses/course-details/'.rtrim(base64_encode($oc->id),'='))?>" class="btn">Course Details</a>
                    </div>
                </div>
                <!-- <div class="bottom-content">
                    <ul class="review">
                        <li><i class="lni lni-star-filled"></i></li>
                        <li><i class="lni lni-star-filled"></i></li>
                        <li><i class="lni lni-star-filled"></i></li>
                        <li><i class="lni lni-star-filled"></i></li>
                        <li><i class="lni lni-star-filled"></i></li>
                        <li>22 Reviews</li>
                    </ul>
                    <span class="tag">
                        <i class="lni lni-tag"></i>
                        <a href="javascript:void(0)">Programming</a>
                    </span>
                </div> -->
            </div>
            <!-- End Single Course -->
        </div>
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