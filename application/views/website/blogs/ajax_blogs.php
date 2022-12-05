<div class="row">
    <div class="col-lg-8 col-md-7 col-12">
        <div class="row">
            <?php foreach($blog_posts as $post): ?>
                <?php 
                    $char_count = mb_strlen($post->excerpt);
                    $char_count_title = mb_strlen($post->title);
                    $chars = '';
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
                        $chars_title = mb_substr($post->title, 0, -$extra_chars);
                        $chars_title .= ' ۔۔۔';
                    }

                    if($char_count < 134){
                        $remaining_chars = 132 - $char_count;
                        for ($i = 0; $i < $remaining_chars; $i++) { 
                            if($i % 2 == 0) {
                                $chars .= '_';
                            }
                            else {
                                $chars .= ' ';
                            }
                        }
                    }
                    else {
                        $extra_chars = $char_count - 132;
                        $chars = mb_substr($post->excerpt, 0, -$extra_chars);
                        $chars .= '۔۔۔';
                    }
                ?>
                <div class="col-lg-6 col-12">
                    <!-- Single News -->
                    <div class="single-news custom-shadow-hover wow fadeInUp" data-wow-delay=".2s">
                        <div class="image">
                            <a href="<?= base_url('blog/blog-details/'.$post->slug); ?>">
                                <img class="thumb"src="<?= base_url('uploads/blog_images/blog_thumbnails/'.$post->image); ?>" alt="#">
                            </a>
                        </div>
                        <div class="content-body">
                            <div class="meta-data">
                                <ul>
                                    <li>
                                        <i class="lni lni-tag"></i>
                                        <a href="javascript:void(0)"><?= $post->sub_cat_name; ?></a>
                                    </li>
                                    <li>
                                        <i class="lni lni-calendar"></i>
                                        <a href="javascript:void(0)"><?= date('F d, Y', strtotime($post->published_at)); ?></a>
                                    </li>
                                </ul>
                            </div>
                            <h4 class="title"><a href="<?= base_url('blog/blog-details/'.$post->slug); ?>"><?= strlen($post->title) < 53 ? $post->title.'۔۔۔'.'<span style="visibility:hidden; display:inline;">'.$chars_title.'</span>' : $chars_title ?></a></h4>
                            <p><?= strlen($post->excerpt) < 134 ? $post->excerpt.'۔۔۔'.'<span style="visibility:hidden; display:inline;">'.$chars.'</span>' : $chars ?></p>
                            <div class="button">
                                <a href="<?= base_url('blog/blog-details/'.$post->slug); ?>" class="btn">مزید پڑھے</a>
                            </div>
                        </div>
                    </div>
                    <!-- End Single News -->
                </div>
            <?php endforeach; ?>
        </div>
        <!-- Pagination -->
        <div class="pagination center">
            <?= $links; ?>
        </div>
        <!--/ End Pagination -->
    </div>
    <aside class="col-lg-4 col-md-5 col-12">
        <div class="sidebar">
            <!-- Single Widget -->
            <!-- <div class="widget search-widget">
                <h5 class="widget-title">Search Here</h5>
                <form action="#">
                    <input type="text" placeholder="Search Here...">
                    <button type="submit"><i class="lni lni-search-alt"></i></button>
                </form>
            </div> -->
            <!--/ End Single Widget -->
            <!-- Single Widget -->
            <div class="widget popular-feeds">
                <h5 class="widget-title">Recent Posts</h5>
                <div class="popular-feed-loop">
                    <?php foreach($recent_posts as $post): ?>
                        <div class="single-popular-feed">
                            <div class="feed-img">
                                <a href="<?= base_url('blog/blog-details/'.$post->slug); ?>"><img src="<?= base_url('uploads/blog_images/blog_thumbnails/'.$post->image); ?>" height="300" width="300"
                                    alt="#"></a>
                            </div>
                            <div class="feed-desc">
                                <h6 class="post-title"><a href="<?= base_url('blog/blog-details/'.$post->slug); ?>"><?= $post->title; ?></a>
                                </h6>
                                <span class="time"><i class="lni lni-calendar"></i><?= date('jS M Y', strtotime($post->published_at)); ?></span>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <!--/ End Single Widget -->
            <!-- Single Widget -->
            <!-- <div class="widget categories-widget">
                <h5 class="widget-title">Categories</h5>
                <ul class="custom">
                    <li>
                        <a href="javascript:void(0)">College <span>05</span></a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">Online Education <span>10</span></a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">Programming <span>25</span></a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">Online Course <span>15</span></a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">University <span>35</span></a>
                    </li>
                </ul>
            </div> -->
            <!--/ End Single Widget -->
            <!-- Single Widget -->
            <!-- <div class="widget popular-tag-widget">
                <h5 class="widget-title">Popular Tags</h5>
                <div class="tags">
                    <a href="javascript:void(0)">Online Courses</a>
                    <a href="javascript:void(0)">Design</a>
                    <a href="javascript:void(0)">UX</a>
                    <a href="javascript:void(0)">Study</a>
                    <a href="javascript:void(0)">Usability</a>
                    <a href="javascript:void(0)">Tech</a>
                    <a href="javascript:void(0)">Html</a>
                    <a href="javascript:void(0)">Develop</a>
                    <a href="javascript:void(0)">Bootstrap</a>
                    <a href="javascript:void(0)">Business</a>
                </div>
            </div> -->
            <!--/ End Single Widget -->
        </div>
    </aside>
</div>