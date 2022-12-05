<?php

defined('BASEPATH') OR exit('No direct script access allowed');

Class Programs extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper(array('url', 'form'));
        $this->load->model(array('login_model','enrolledPrograms_model','courses_model'));
        if ($this->login_model->studentLoggedIn() == false) {
            $this->session->set_flashdata('login_error',"Please login to enroll in a program. If you don't have any account register yourself first.");
            redirect('student/Login');
        }
    }

    public function enroll_program($program_id){
        $program_id  = base64_decode($program_id);
        $student_id = $this->session->userdata('id');

        $data = array(
            'program_id' => $program_id,
            'student_id' => $student_id,
        );

        // $where = "teacher_course_id='$teacher_course_id' AND student_id='$student_id'";
        $row = $this->enrolledPrograms_model->select($data,'','student_program_enrollment');
        if ($row != 0){
            $this->session->set_flashdata('fail', 'You are already enrolled in this program.');
            redirect(base_url('student/Programs/view_student_enrolled_programs'));
        }
        else {
            $this->enrolledPrograms_model->insert($data, 'student_program_enrollment');
            $this->session->set_flashdata('success', 'Enrolled Succesfully.');
            redirect(base_url('student/Programs/view_student_enrolled_programs'));
        }
    }

    public function view_student_enrolled_programs(){
        $enrolled_programs = $this->enrolledPrograms_model->get_student_enrolled_programs($this->session->userdata('id'));
        $data['programs'] = $enrolled_programs;
        $data['content'] = 'student/programs/view_student_enrolled_programs';
        $this->load->view('student/student_master', $data);
    }

    public function view_program_semesters($id){
        $program_id = base64_decode($id);
        $program_semesters = $this->enrolledPrograms_model->get_program_semesters($program_id);
        $data['program_semesters'] = $program_semesters;
        $data['content'] = 'student/programs/view_program_semesters';
        $this->load->view('student/student_master', $data);
    }

    public function view_program_courses($id){
        $semester_id = base64_decode($id);
        $program_courses = $this->enrolledPrograms_model->get_program_courses($semester_id);
        $data['program_courses'] = $program_courses;
        $data['content'] = 'student/programs/view_program_courses';
        $this->load->view('student/student_master', $data);
    }

}

//End Login.php
