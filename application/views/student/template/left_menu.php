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
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="active treeview">
                <a href="<?= base_url(); ?>admin_assets/#">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="active treeview-menu">
                    <li class="active"><a href="<?= base_url(); ?>student/Dashboard"><i class="fa fa-circle-o"></i> Dashboard</a></li>
                </ul>
            </li>
            <li class="">
                <a href="<?= base_url(); ?>admin_assets/#">
                    <i class="fa fa-book"></i> <span>Courses</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <!-- <li><a href="<?= base_url(); ?>student/Courses/view_courses"><i class="fa fa-circle-o"></i> View Courses</a></li> -->
                    <li><a href="<?= base_url(); ?>student/Courses/view_student_enrolled_courses"><i class="fa fa-circle-o"></i> View Enrolled Courses</a></li>
                </ul>
            </li>
            
            <li>
                <a href="<?= base_url(); ?>admin_assets/#">
                    <i class="fa fa-book"></i> <span>Programs</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?= base_url(); ?>student/Programs/view_student_enrolled_programs"><i class="fa fa-circle-o"></i>View Enrolled Programs</a></li>
                </ul>
            </li>
            <li>
                <a href="<?= base_url(); ?>admin_assets/#">
                    <i class="fa fa-book"></i> <span>Results</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?= base_url(); ?>student/Result/view_result"><i class="fa fa-circle-o"></i>View Semester Results</a></li>
                </ul>
            </li>
            
            <!-- <li>
                <a href="<?= base_url(); ?>admin_assets/#">
                    <i class="fa fa-book"></i> <span>Books</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?= base_url(); ?>admin/Books/book_form"><i class="fa fa-circle-o"></i> Add Books</a></li>
                    <li><a href="<?= base_url(); ?>admin/Books/view_books"><i class="fa fa-circle-o"></i> View Books</a></li>
                </ul>
            </li>

            <li>
                <a href="<?= base_url(); ?>admin_assets/#">
                    <i class="fa fa-cubes"></i> <span>Settings</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?= base_url(); ?>admin/Settings"><i class="fa fa-circle-o"></i> View Settings</a></li>
                </ul>
            </li>                -->

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
