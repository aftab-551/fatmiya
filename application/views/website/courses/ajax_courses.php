<div class="row">
    <?php foreach($courses as $c): ?>
        <?php 
            $char_count = strlen($c->short_description);
            $chars = '';
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
                $chars = substr_replace($c->short_description, "", -$extra_chars);
                $chars .= '...';
            }
        ?>
        <div class="col-lg-4 col-md-6 col-12">
            <!-- Start Single Course -->
            <div class="single-course wow fadeInUp" data-wow-delay=".2s">
                <div class="course-image">
                    <a href="javascript:void(0)"><img src="<?= $c->course_thumbnail; ?>"
                        alt="CourseThumbnail"></a>
                    <!-- <p class="price">$180</p> -->
                </div>
                <div class="content">
                    <h3><a href="javascript:void(0)"><?= $c->name; ?></a></h3>
                    <p><?= strlen($c->short_description) < 111 ? $c->short_description.'...'.'<span style="visibility:hidden; display:inline;">'.$chars.'</span>' : $chars?></p>
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