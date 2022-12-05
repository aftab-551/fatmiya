<?php 
defined('BASEPATH') or exit ('No direct script access allowed');


class Teachers extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model(array('teachers_model','teacherCourse_model'));
    }

    public function all_teachers(){
        $data['content'] = 'website/teachers/all_teachers';
        $data['footer_blog_post'] = $this->footer_blog_post;
        $this->load->view('website/master', $data);
    }

    public function ajax_teachers(){
        $teachers_count = count($this->teachers_model->select(['status'=>1],'','teachers'));

        $this->load->library('pagination');
        $config['base_url'] = base_url('teachers/ajax_teachers');
        $config['total_rows'] = $teachers_count;
        $config['per_page'] = 2;
        
        $this->pagination->initialize($config);
        $links = $this->pagination->create_links();

        //Check if the 3rd URI segment that is page number is not empty
        // -1 is used to fix the issue caused by using use_page_numbers option;
        // After using -1 we will multiply it by per_page which returns the exact page / offset number we are in
        $page = $this->uri->segment(3) ? ($this->uri->segment(3) - 1) * $config['per_page'] : '0';
 
        $teachers = $this->teachers_model->get_data_with_ajax_pagination('teachers', $config['per_page'], $page);

        $data['teachers'] = $teachers;
        $data['links'] = $links;
        $this->load->view('website/teachers/ajax_teachers', $data);
    }



}


?>