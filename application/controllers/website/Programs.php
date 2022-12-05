<?php 
defined('BASEPATH') or exit ('No direct script access allowed');


class Programs extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper(array('form'));
        $this->load->library(array('form_validation'));
        $this->load->model(array('programs_model','home_model','login_model'));
    }

    public function all_programs(){
        $data['content'] = 'website/programs/all_programs';
        $data['footer_blog_post'] = $this->footer_blog_post;
        $this->load->view('website/master', $data);
    }

    public function ajax_programs(){
        $of_programs = array();
        $arr = array();
        $c = 0;
        
        $programs_count = count($this->programs_model->select(['status'=>1], '', 'programs'));

        $this->load->library('pagination');
        $config['base_url'] = base_url('program/ajax_programs');
        $config['total_rows'] = $programs_count;
        $config['per_page'] = 2;
        
        $this->pagination->initialize($config);
        $links = $this->pagination->create_links();

        //Check if the 3rd URI segment that is page number is not empty
        // -1 is used to fix the issue caused by using use_page_numbers option;
        // After using -1 we will multiply it by per_page which returns the exact page / offset number we are in
        $page = $this->uri->segment(3) ? ($this->uri->segment(3) - 1) * $config['per_page'] : '0';
 
        $programs = $this->home_model->select(['status'=>1],'','programs');
        
        rsort($programs);

        foreach($programs as $p){
            $check = $this->home_model->check_program($p->id, 'program_id', 'semester');

            if(! empty($check)) {
                $of_programs['id'] = $p->id;
                $of_programs['program_name'] = $p->name;
                $of_programs['program_description'] = $p->description;
                $of_programs['program_thumbnail'] = $p->program_thumbnail;
                $arr[$c] = (object) $of_programs;
            }
            $c++;
        }
        $sliced_array = array_slice($arr, $page, $config['per_page']);

        $data['offered_programs'] = $sliced_array;
        $data['links'] = $links;
        $this->load->view('website/programs/ajax_programs', $data);
    }

    public function program_details($id){
        $of_programs = array();
        $arr = array();
        $c = 0;
        
        $program_id = base64_decode($id);
        $semester = $this->programs_model->select(['program_id'=>$program_id, 'semester.status'=>1],'','semester');
        $semester_courses = $this->programs_model->get_semester_courses(['programs.id'=>$program_id, 'semester_courses.status'=>1]);
        $program_detail = $this->programs_model->select_row($program_id, 'id', 'programs');

        $programs = $this->home_model->select(['status'=>1],'','programs');
        
        rsort($programs);

        foreach($programs as $p){
            $check = $this->home_model->check_program($p->id, 'program_id', 'semester');

            if(! empty($check)) {
                $of_programs['id'] = $p->id;
                $of_programs['program_name'] = $p->name;
                $of_programs['program_description'] = $p->description;
                $of_programs['program_thumbnail'] = $p->program_thumbnail;
                $arr[$c] = (object) $of_programs;
            }
            $c++;
        }

        $data['content'] = 'website/programs/program_detail';
        $data['semester'] = $semester;
        $data['semester_courses'] = $semester_courses;
        $data['program'] = $program_detail;
        $data['recent_programs'] = $arr;
        $data['footer_blog_post'] = $this->footer_blog_post;
        $this->load->view('website/master', $data);
    }

}


?>