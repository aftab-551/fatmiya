<?php

defined('BASEPATH') OR exit('No direct script access allowed');

Class Dashboard extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper(array('url', 'form'));
        $this->load->model('login_model');
        $this->load->model('dashboard_model');
        if ($this->login_model->studentLoggedIn() == false) {
            redirect('student/Login');
        }
    }

    public function index()
    {
        $data['enrolled_courses'] = $this->dashboard_model->select(['status'=>1,'student_id'=>$this->session->userdata('id')],'','student_course_enrollment');
        $data['enrolled_programs'] = $this->dashboard_model->select(['status'=>1,'student_id'=>$this->session->userdata('id')],'','student_program_enrollment');
        $data['content'] = 'student/dashboard/home';
        $this->load->view('student/student_master', $data);
    }

    public function logout()
    {
        session_destroy();
        setcookie(
            'remember_me',
            '',
            time() - 3600,
            '/',
            'localhost',
            true, // TLS-only
            true  // http-only
        );
        redirect(base_url('student/Login'));
    }
    
}

//End Login.php
