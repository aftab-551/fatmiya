<div class="row">
    <?php foreach($books as $b): ?>
        <?php 
            $char_count_title = strlen($b->name);
            $chars_title = '';

            if($char_count_title < 41){
                $remaining_chars = 40 - $char_count_title;
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
                $extra_chars = $char_count_title - 40;
                $chars_title = mb_substr($b->name, 0, -$extra_chars);
                $chars_title .= '...';
            }
        ?>
        <div class="col-lg-4 col-md-6 col-12">
            <!-- Start Single Course -->
            <div class="single-course wow fadeInUp" data-wow-delay=".2s">
                <div class="course-image">
                    <a href="javascript:void(0)"><img src="<?= base_url('uploads/books/books_images/'.$b->book_image); ?>"
                        alt="#" style="width: 550px; height: 340px;">
                    </a>
                    <!-- <p class="price">$180</p> -->
                </div>
                <div class="content">
                    <div class="meta-data">
                        <ul class="d-flex justify-content-between p-1">
                            <li>
                                <i class="lni lni-tag" style="color: #0458af;"></i>
                                <a href="javascript:void(0)" style="color:grey;"><?= $b->category_name; ?></a>
                            </li>
                            <li>
                                <i class="lni lni-eye" style="color: #0458af;"></i>
                                <a href="javascript:void(0)" style="color:grey;"><?= $b->views; ?></a>
                            </li>
                            <li>
                                <i class="lni lni-calendar" style="color: #0458af;"></i>
                                <a href="javascript:void(0)" style="color:grey;"><?= date('F d, Y', strtotime($b->creation_date)); ?></a>
                            </li>
                        </ul>
                    </div>
                    <h3 class="py-3">
                        <a href="javascript:void(0)"><?= strlen($b->name) < 41 ? $b->name.'<span style="visibility:hidden; display:inline;">'.$chars_title.'</span>' : $chars_title ?>
                        </a>
                    </h3>
                    <div class="button">
                        <a target="_blank" href="<?= base_url('book/view-book/'.rtrim(base64_encode($b->id_books),'='))?>" class="btn">View Book</a>
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