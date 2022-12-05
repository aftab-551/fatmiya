<div class="row">
    <?php foreach($events as $e): ?>
        <?php 
            $char_count = strlen($e->description);
            $chars = '';
            if($char_count < 93){
                $remaining_chars = 92 - $char_count;
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
                $extra_chars = $char_count - 92;
                $chars = substr_replace($e->description, "", -$extra_chars);
                $chars .= '...';
            }
        ?>
        <div class="col-lg-4 col-md-6 col-12">
            <!-- Start Single Event -->
            <div class="single-event wow fadeInUp" data-wow-delay=".2s">
                <div class="event-image">
                    <a href="<?= base_url('website/Events/event_details/'.rtrim(base64_encode($e->id),'=')); ?>"><img src="<?= base_url('uploads/event_images/'.$e->image); ?>" alt="#"></a>
                    <p class="date"><?= date('d', strtotime($e->start_date)); ?><span><?= strtoupper(date('M', strtotime($e->start_date))); ?></span></p>
                </div>
                <div class="content">
                    <h3><a href="<?= base_url('website/Events/event_details/'.rtrim(base64_encode($e->id),'=')); ?>"><?= $e->title; ?></a></h3>
                    <p><?= strlen($e->description) < 93 ? $e->description.'...'.'<span style="visibility:hidden; display:inline;">'.$chars.'</span>' : $chars?></p>
                </div>
                <div class="bottom-content" style="display:flex; justify-content:start;">
                    <!-- <a class="speaker" href="javascript:void(0)">
                        <img src="https://via.placeholder.com/100x100" alt="#">
                        <span>Devid Josh</span>
                    </a> -->
                    <span class="time">
                        <i class="lni lni-timer"></i>
                        <a href="javascript:void(0)"><?= date('h:ia', strtotime($e->start_time)); ?> - <?= date('h:ia', strtotime($e->end_time)); ?></a>
                    </span>
                </div>
            </div>
            <!-- End Single Event -->
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