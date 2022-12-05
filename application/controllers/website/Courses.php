<?php 
defined('BASEPATH') or exit ('No direct script access allowed');


class Courses extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper(array('form'));
        $this->load->library(array('form_validation'));
        $this->load->model(array('courses_model','login_model'));
    }

    public function all_offered_courses(){
        $data['content'] = 'website/courses/all_offered_courses';
        $data['footer_blog_post'] = $this->footer_blog_post;
        $this->load->view('website/master', $data);
    }

    public function all_courses(){
        $data['content'] = 'website/courses/all_courses';
        $data['footer_blog_post'] = $this->footer_blog_post;
        $this->load->view('website/master', $data);
    }

    public function ajax_offered_courses(){
        $offered_courses_count = count($this->courses_model->select(['status'=>1], '', 'offered_courses'));

        $this->load->library('pagination');
        $config['base_url'] = base_url('courses/ajax_offered_courses');
        $config['total_rows'] = $offered_courses_count;
        $config['per_page'] = 2;
        
        $this->pagination->initialize($config);
        $links = $this->pagination->create_links();

        //Check if the 3rd URI segment that is page number is not empty
        // -1 is used to fix the issue caused by using use_page_numbers option;
        // After using -1 we will multiply it by per_page which returns the exact page / offset number we are in
        $page = $this->uri->segment(3) ? ($this->uri->segment(3) - 1) * $config['per_page'] : '0';
 
        $offered_courses = $this->courses_model->get_offered_courses_with_ajax_pagination($config['per_page'], $page);

        $data['offered_courses'] = $offered_courses;
        $data['links'] = $links;
        $this->load->view('website/courses/ajax_offered_courses', $data);
    }

    public function ajax_courses(){
        $courses_count = count($this->courses_model->select(['status'=>1], '', 'courses'));

        $this->load->library('pagination');
        $config['base_url'] = base_url('courses/ajax_courses');
        $config['total_rows'] = $courses_count;
        $config['per_page'] = 2;
        
        $this->pagination->initialize($config);
        $links = $this->pagination->create_links();

        //Check if the 3rd URI segment that is page number is not empty
        // -1 is used to fix the issue caused by using use_page_numbers option;
        // After using -1 we will multiply it by per_page which returns the exact page / offset number we are in
        $page = $this->uri->segment(3) ? ($this->uri->segment(3) - 1) * $config['per_page'] : '0';
 
        $courses = $this->courses_model->get_data_with_ajax_pagination('courses', $config['per_page'], $page);

        $data['courses'] = $courses;
        $data['links'] = $links;
        $this->load->view('website/courses/ajax_courses', $data);
    }

    public function course_details($id){
        $offered_course_id = base64_decode($id);
        $lessons = $this->courses_model->get_lessons(['lessons.offered_course_id'=>$offered_course_id, 'lessons.status'=>1]);
        $sub_lessons = $this->courses_model->get_sub_lessons(['lessons.offered_course_id'=>$offered_course_id, 'sub_lessons.status'=>1]);
        $course_detail = $this->courses_model->get_course(['offered_courses.id'=>$offered_course_id, 'courses.status'=>1]);
        $offered_course_teacher = $this->courses_model->get_teacher(['offered_courses.id'=>$offered_course_id, 'teachers.status'=>1]);
        $recent_courses = $this->courses_model->get_recent_courses(['offered_courses.status'=>1]);

        $data['content'] = 'website/courses/course_detail';
        $data['course_lessons'] = $lessons;
        $data['sub_lessons'] = $sub_lessons;
        $data['course'] = $course_detail;
        $data['teacher'] = $offered_course_teacher;
        $data['recent_courses'] = $recent_courses;
        $data['footer_blog_post'] = $this->footer_blog_post;
        $this->load->view('website/master', $data);
    }

}


?>