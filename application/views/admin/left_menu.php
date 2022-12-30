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
                <p><?= $this->session->userdata('admin_firstname').' '.$this->session->userdata('admin_lastname'); ?></p>
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
            <li class="<?= current_url() == base_url('admin/Admin') ? 'active': ''; ?> treeview">
                <a href="<?= base_url(); ?>admin_assets/#">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="active treeview-menu">
                    <li class="<?= current_url() == base_url('admin/Admin') ? 'active': ''; ?>"><a href="<?= base_url(); ?>admin/Admin"><i class="fa fa-circle-o"></i> Dashboard</a></li>
                </ul>
            </li>
            <li class="<?= current_url() == base_url('admin/Programs/'.$this->uri->segment(3).'/'.$this->uri->segment(4)) ? 'active': ''; ?>">
                <a href="<?= base_url(); ?>admin_assets/#">
                    <i class="fa fa-book"></i> <span>Programs</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="<?= current_url() == base_url('admin/Programs/add_program_form') ? 'active': ''; ?>">
                        <a href="<?= base_url(); ?>admin/Programs/add_program_form"><i class="fa fa-circle-o"></i> Add Program </a>
                    </li>
                    <li class="<?= current_url() == base_url('admin/Programs/view_programs') || current_url() == base_url('admin/Programs/edit_program/'.$this->uri->segment(4)) ? 'active': ''; ?>">
                        <a href="<?= base_url(); ?>admin/Programs/view_programs"><i class="fa fa-circle-o"></i> View Programs</a>
                    </li>
                    <li class="<?= current_url() == base_url('admin/Programs/add_semester_form') ? 'active': ''; ?>">
                        <a href="<?= base_url(); ?>admin/Programs/add_semester_form"><i class="fa fa-circle-o"></i> Add Semester </a>
                    </li>
                    <li class="<?= current_url() == base_url('admin/Programs/view_semesters') || current_url() == base_url('admin/Programs/edit_semester/'.$this->uri->segment(4)) || current_url() == base_url('admin/Programs/add_semester_course_form/'.$this->uri->segment(4)) ? 'active': ''; ?>">
                        <a href="<?= base_url(); ?>admin/Programs/view_semesters"><i class="fa fa-circle-o"></i> View Semester </a>
                    </li>
                    <li class="<?= current_url() == base_url('admin/Programs/view_semester_courses') || current_url() == base_url('admin/Programs/edit_semester_course/'.$this->uri->segment(4)) ? 'active': ''; ?>">
                        <a href="<?= base_url(); ?>admin/Programs/view_semester_courses"><i class="fa fa-circle-o"></i> View Semester Courses </a>
                    </li>
                </ul>
            </li>
            <li class="<?= current_url() == base_url('admin/Courses/'.$this->uri->segment(3).'/'.$this->uri->segment(4)) || current_url() == base_url('admin/Syllabus/'.$this->uri->segment(3).'/'.$this->uri->segment(4)) ? 'active': ''; ?>">
                <a href="<?= base_url(); ?>admin_assets/#">
                    <i class="fa fa-book"></i> <span>Courses</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="<?= current_url() == base_url('admin/Courses/add_course_form') ? 'active': ''; ?>">
                        <a href="<?= base_url(); ?>admin/Courses/add_course_form"><i class="fa fa-circle-o"></i> Add Courses </a>
                    </li>
                    <li class="<?= current_url() == base_url('admin/Courses/view_courses') || current_url() == base_url('admin/Courses/edit_course/'.$this->uri->segment(4)) ? 'active': ''; ?>">
                        <a href="<?= base_url(); ?>admin/Courses/view_courses"><i class="fa fa-circle-o"></i> View Courses</a>
                    </li>
                    <li class="<?= current_url() == base_url('admin/Syllabus/add_syllabus_form') ? 'active': ''; ?>">
                        <a href="<?= base_url(); ?>admin/Syllabus/add_syllabus_form"><i class="fa fa-circle-o"></i> Add Syllabus </a>
                    </li>
                    <li class="<?= current_url() == base_url('admin/Syllabus/view_syllabus') || current_url() == base_url('admin/Syllabus/edit_syllabus/'.$this->uri->segment(4)) ? 'active': ''; ?>">
                        <a href="<?= base_url(); ?>admin/Syllabus/view_syllabus"><i class="fa fa-circle-o"></i> View Syllabus </a>
                    </li>
                </ul>
            </li>
            <li class="<?= current_url() == base_url('admin/Lessons/'.$this->uri->segment(3).'/'.$this->uri->segment(4)) ? 'active': ''; ?>">
                <a href="<?= base_url(); ?>admin_assets/#">
                    <i class="fa fa-book"></i> <span>Offered Courses</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="<?= current_url() == base_url('admin/Lessons/add_course_detail') ? 'active': ''; ?>">
                        <a href="<?= base_url(); ?>admin/Lessons/add_course_detail"><i class="fa fa-circle-o"></i> Add Course Details </a>
                    </li>
                    <li class="<?= current_url() == base_url('admin/Lessons/view_course_detail') ? 'active': ''; ?>">
                        <a href="<?= base_url(); ?>admin/Lessons/view_course_detail"><i class="fa fa-circle-o"></i> View Course Details </a>
                    </li>
                    <li class="<?= current_url() == base_url('admin/Lessons/view_lessons') || current_url() == base_url('admin/Lessons/edit_lesson/'.$this->uri->segment(4)) ? 'active': ''; ?>">
                        <a href="<?= base_url(); ?>admin/Lessons/view_lessons"><i class="fa fa-circle-o"></i> View Lessons </a>
                    </li>
                    <li class="<?= current_url() == base_url('admin/Lessons/sub_lesson_form') ? 'active': ''; ?>">
                        <a href="<?= base_url(); ?>admin/Lessons/sub_lesson_form"><i class="fa fa-circle-o"></i> Add Sub Lessons </a>
                    </li>
                    <li class="<?= current_url() == base_url('admin/Lessons/view_sub_lessons') || current_url() == base_url('admin/Lessons/edit_sub_lesson/'.$this->uri->segment(4)) ? 'active': ''; ?>">
                        <a href="<?= base_url(); ?>admin/Lessons/view_sub_lessons"><i class="fa fa-circle-o"></i> View Sub Lessons </a>
                    </li>
                </ul>
            </li>
            <li class="<?= current_url() == base_url('admin/Teachers/'.$this->uri->segment(3).'/'.$this->uri->segment(4)) ? 'active': ''; ?>">
                <a href="<?= base_url(); ?>admin_assets/#">
                    <i class="fa fa-graduation-cap"></i> <span>Teachers</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="<?= current_url() == base_url('admin/Teachers/add_teacher_form') ? 'active': ''; ?>">
                        <a href="<?= base_url(); ?>admin/Teachers/add_teacher_form"><i class="fa fa-circle-o"></i> Add Teacher </a>
                    </li>
                    <li class="<?= current_url() == base_url('admin/Teachers/view_teachers') || current_url() == base_url('admin/Teachers/edit_teacher/'.$this->uri->segment(4)) ? 'active': ''; ?>">
                        <a href="<?= base_url(); ?>admin/Teachers/view_teachers"><i class="fa fa-circle-o"></i> View Teachers </a>
                    </li>
                    <li class="<?= current_url() == base_url('admin/Teachers/view_assigned_courses') || current_url() == base_url('admin/Teachers/edit_assigned_course/'.$this->uri->segment(4)) ? 'active': ''; ?>">
                        <a href="<?= base_url(); ?>admin/Teachers/view_assigned_courses"><i class="fa fa-circle-o"></i> View Assigned Courses </a>
                    </li>
                </ul>
            </li>
            <!-- <li class="">
                <a href="<?= base_url(); ?>admin_assets/#">
                    <i class="fa fa-users"></i> <span>Batches</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?= base_url(); ?>admin/Batches/add_batch_form"><i class="fa fa-circle-o"></i> Add Batch </a></li>
                    <li><a href="<?= base_url(); ?>admin/Batches/view_batches"><i class="fa fa-circle-o"></i> View Batch </a></li>
                </ul>
            </li> -->
            <li class="<?= current_url() == base_url('admin/Students/'.$this->uri->segment(3).'/'.$this->uri->segment(4)) ? 'active': ''; ?>">
                <a href="<?= base_url(); ?>admin_assets/#">
                    <i class="fa fa-users"></i> <span>Students</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="<?= current_url() == base_url('admin/Students/view_unverified_students') ? 'active': ''; ?>">
                        <a href="<?= base_url(); ?>admin/Students/view_unverified_students"><i class="fa fa-circle-o"></i> View Non Verified Students </a>
                    </li>
                    <li class="<?= current_url() == base_url('admin/Students/view_verified_students') ? 'active': ''; ?>">
                        <a href="<?= base_url(); ?>admin/Students/view_verified_students"><i class="fa fa-circle-o"></i> View Verified Students </a>
                    </li>
                    <li class="<?= current_url() == base_url('admin/Students/view_deactive_students') ? 'active': ''; ?>">
                        <a href="<?= base_url(); ?>admin/Students/view_deactive_students"><i class="fa fa-circle-o"></i> View Deactive Students </a>
                    </li>
                    <li class="<?= current_url() == base_url('admin/Students/view_enrolled_students') ? 'active': ''; ?>">
                        <a href="<?= base_url(); ?>admin/Students/view_enrolled_students"><i class="fa fa-circle-o"></i> View Enrolled Students </a>
                    </li>
                    <li class="<?= current_url() == base_url('admin/Students/view_students_result1') ? 'active': ''; ?>">
                        <a href="<?= base_url(); ?>admin/Students/view_students_result1"><i class="fa fa-circle-o"></i> edit Students Result </a>
                    </li>
                    <li class="<?= current_url() == base_url('admin/Students/view_semester_result') ? 'active': ''; ?>">
                        <a href="<?= base_url(); ?>admin/Students/view_semester_result"><i class="fa fa-circle-o"></i> View Semester Result </a>
                    </li>
                    <li class="<?= current_url() == base_url('admin/Students/view_students_transcript') ? 'active': ''; ?>">
                        <a href="<?= base_url(); ?>admin/Students/view_students_transcript"><i class="fa fa-circle-o"></i> View Students transcript </a>
                    </li>
                </ul>
            </li>

            <li class="<?= current_url() == base_url('admin/Events/'.$this->uri->segment(3).'/'.$this->uri->segment(4)) ? 'active': ''; ?>">
                <a href="<?= base_url(); ?>admin_assets/#">
                    <i class="fa fa-users"></i> <span>Events</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="<?= current_url() == base_url('admin/Events/add_event_form') ? 'active': ''; ?>">
                        <a href="<?= base_url(); ?>admin/Events/add_event_form"><i class="fa fa-circle-o"></i> Add Event </a>
                    </li>
                    <li class="<?= current_url() == base_url('admin/Events/view_events') || current_url() == base_url('admin/Events/edit_event/'.$this->uri->segment(4)) ? 'active': ''; ?>">
                        <a href="<?= base_url(); ?>admin/Events/view_events"><i class="fa fa-circle-o"></i> View Event </a>
                    </li>
                </ul>
            </li>

            <li class="<?= current_url() == base_url('admin/Categories/'.$this->uri->segment(3).'/'.$this->uri->segment(4)) ? 'active': ''; ?>">
                <a href="<?= base_url(); ?>admin_assets/#">
                    <i class="fa fa-caret-square-o-up"></i> <span>Categories</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="<?= current_url() == base_url('admin/Categories/view_categories') || current_url() == base_url('admin/Categories/edit_category/'.$this->uri->segment(4)) ? 'active': ''; ?>">
                        <a href="<?= base_url(); ?>admin/Categories/view_categories"><i class="fa fa-circle-o"></i> View Categories</a>
                    </li>
                    <li class="<?= current_url() == base_url('admin/Categories/view_sub_categories') || current_url() == base_url('admin/Categories/edit_sub_category/'.$this->uri->segment(4)) ? 'active': ''; ?>">
                        <a href="<?= base_url(); ?>admin/Categories/view_sub_categories"><i class="fa fa-circle-o"></i> View Sub Categories</a>
                    </li>
                    <li class="<?= current_url() == base_url('admin/Categories/category_form') ? 'active': ''; ?>">
                        <a href="<?= base_url(); ?>admin/Categories/category_form"><i class="fa fa-circle-o"></i> Add Category</a>
                    </li>
                    <li class="<?= current_url() == base_url('admin/Categories/sub_category_form') ? 'active': ''; ?>">
                        <a href="<?= base_url(); ?>admin/Categories/sub_category_form"><i class="fa fa-circle-o"></i> Add Sub Category</a>
                    </li>
                    
                </ul>
            </li>

            <li class="<?= current_url() == base_url('admin/Slider/'.$this->uri->segment(3).'/'.$this->uri->segment(4)) || current_url() == base_url('admin/Blogs/'.$this->uri->segment(3).'/'.$this->uri->segment(4)) || current_url() == base_url('admin/Tags/'.$this->uri->segment(3).'/'.$this->uri->segment(4))|| current_url() == base_url('admin/Gallery/'.$this->uri->segment(3).'/'.$this->uri->segment(4)) ? 'active': ''; ?>">
                <a href="<?= base_url(); ?>admin_assets/#">
                    <i class="fa fa-edit"></i> <span>CMS</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="<?= current_url() == base_url('admin/Slider/add_slider') ? 'active': ''; ?>">
                        <a href="<?= base_url(); ?>admin/Slider/add_slider"><i class="fa fa-circle-o"></i> Add Slider</a>
                    </li>
                    <li class="<?= current_url() == base_url('admin/Slider') || current_url() == base_url('admin/Slider/edit_slider/'.$this->uri->segment(4)) ? 'active': ''; ?>">
                        <a href="<?= base_url(); ?>admin/Slider"><i class="fa fa-circle-o"></i> View Sliders</a>
                    </li>
                    <li class="<?= current_url() == base_url('admin/Blogs/add_blog_form') ? 'active': ''; ?>">
                        <a href="<?= base_url(); ?>admin/Blogs/add_blog_form"><i class="fa fa-circle-o"></i> Add Blog</a>
                    </li>
                    <li class="<?= current_url() == base_url('admin/Blogs/view_blogs') || current_url() == base_url('admin/Blogs/edit_blog/'.$this->uri->segment(4)) ? 'active': ''; ?>">
                        <a href="<?= base_url(); ?>admin/Blogs/view_blogs"><i class="fa fa-circle-o"></i> View Blogs</a>
                    </li>
                    <li class="<?= current_url() == base_url('admin/Tags/add_tag_form') ? 'active': ''; ?>">
                        <a href="<?= base_url(); ?>admin/Tags/add_tag_form"><i class="fa fa-circle-o"></i> Add Tag</a>
                    </li>
                    <li class="<?= current_url() == base_url('admin/Tags/view_tags') || current_url() == base_url('admin/Tags/edit_tag/'.$this->uri->segment(4)) ? 'active': ''; ?>">
                        <a href="<?= base_url(); ?>admin/Tags/view_tags"><i class="fa fa-circle-o"></i> View Tags</a>
                    </li>
                    <li class="<?= current_url() == base_url('admin/Gallery/add_gallery_images_form') ? 'active': ''; ?>">
                        <a href="<?= base_url(); ?>admin/Gallery/add_gallery_images_form"><i class="fa fa-circle-o"></i> Add Gallery Images</a>
                    </li>
                    <li class="<?= current_url() == base_url('admin/Gallery/view_gallery_images') ? 'active': ''; ?>">
                        <a href="<?= base_url(); ?>admin/Gallery/view_gallery_images"><i class="fa fa-circle-o"></i> View Gallery Images</a>
                    </li>
			   </ul>
            </li>
            
            
            <!-- <li>
                <a href="<?= base_url(); ?>admin_assets/#">
                    <i class="fa fa-microphone"></i> <span>Bayanat</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?= base_url(); ?>admin/Bayanat/bayan_form"><i class="fa fa-circle-o"></i> Add Bayan</a></li>
                    <li><a href="<?= base_url(); ?>admin/Bayanat/view_bayanat"><i class="fa fa-circle-o"></i> View Bayanat</a></li>

                   

                </ul>
            </li> -->
            
            <li class="<?= current_url() == base_url('admin/Books/'.$this->uri->segment(3).'/'.$this->uri->segment(4)) ? 'active': ''; ?>">
                <a href="<?= base_url(); ?>admin_assets/#">
                    <i class="fa fa-book"></i> <span>Books & Articles</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="<?= current_url() == base_url('admin/Books/add_book_form') ? 'active': ''; ?>">
                        <a href="<?= base_url(); ?>admin/Books/add_book_form"><i class="fa fa-circle-o"></i> Add Books & Articles </a>
                    </li>
                    <li class="<?= current_url() == base_url('admin/Books/view_books') || current_url() == base_url('admin/Books/edit_book/'.$this->uri->segment(4)) ? 'active': ''; ?>">
                        <a href="<?= base_url(); ?>admin/Books/view_books"><i class="fa fa-circle-o"></i> View Books </a>
                    </li>
                </ul>
            </li>
            
            <!-- <li>
                <a href="<?= base_url(); ?>admin_assets/#">
                    <i class="fa fa-exclamation-circle"></i> <span>Notifications</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?= base_url(); ?>admin/Notifications/notification_form"><i class="fa fa-circle-o"></i> Add Notification</a></li>
                    <li><a href="<?= base_url(); ?>admin/Notifications/view_notifications"><i class="fa fa-circle-o"></i> View Notifications</a></li>
                </ul>
            </li> -->
             
            <!-- <li>
                <a href="<?= base_url(); ?>admin_assets/#">
                    <i class="fa fa-calendar-times-o"></i> <span>Schedule</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?= base_url(); ?>admin/Schedule/view_schedule"><i class="fa fa-circle-o"></i> View Schedule</a></li>
                </ul>
            </li> -->
            
            <li class="<?= current_url() == base_url('admin/Settings') ? 'active': ''; ?>">
                <a href="<?= base_url(); ?>admin_assets/#">
                    <i class="fa fa-cubes"></i> <span>Settings</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="<?= current_url() == base_url('admin/Settings') ? 'active': ''; ?>"><a href="<?= base_url(); ?>admin/Settings"><i class="fa fa-circle-o"></i> View Settings</a></li>
                </ul>
            </li>
	        <!-- <li >
                <a href="<?= base_url(); ?>admin_assets/#">
                    <i class="fa fa-edit"></i> <span>Ask Hazrat</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?= base_url(); ?>admin/AskHazrat"><i class="fa fa-circle-o"></i> Ask Hazrat</a></li>
                </ul>
            </li>                   -->
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
