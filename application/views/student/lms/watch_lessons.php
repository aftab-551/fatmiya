<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= base_url(); ?>admin_assets/dist/img/user2-160x160.png" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?= $this->session->userdata('student_firstname').' '.$this->session->userdata('student_lastname'); ?></p>
                <a href="<?= base_url(); ?>admin_assets/#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
<!--        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
                </span>
            </div>
        </form>-->
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" style="white-space: normal; word-wrap: break-word;">
            <li class="header">MAIN NAVIGATION</li>
            <?php foreach($lessons as $lesson): ?>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-book"></i> <span><?= $lesson->title; ?></span> <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <?php foreach($sub_lessons as $sl): ?>
                        <?php if($sl->lesson_id == $lesson->id): ?>
                            <ul class="active treeview-menu">
                                <li class="active"><a  href="#" id="<?= $sl->video_url; ?>" onclick="getLink(this.id)"><i class="fa fa-circle-o"></i><?= $sl->title; ?></a></li>
                            </ul>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </li> 
            <?php endforeach; ?>         
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

<div class="content-wrapper">
    <!-- 16:9 aspect ratio -->
    <div class="embed-responsive embed-responsive-16by9">
        <iframe class="embed-responsive-item" id="video-player" src=""></iframe>
    </div>
</div>

<script>
    function getLink(id){
        let player = document.getElementById('video-player');
        player.src = id;
    }
</script>