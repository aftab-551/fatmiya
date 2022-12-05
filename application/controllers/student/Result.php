<?php

defined('BASEPATH') OR exit('No direct script access allowed');

Class Result extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper(array('url', 'form'));
        $this->load->model(array('login_model','enrolledPrograms_model','courses_model','studentResult_model'));
        if ($this->login_model->studentLoggedIn() == false) {
            $this->session->set_flashdata('login_error',"Please login to enroll in a program. If you don't have any account register yourself first.");
            redirect('student/Login');
        }
    }
    public function view_result(){
        if($this->input->post()){
            $student_id = $this->session->userdata('id');
            $semesterid=$this->input->post('semesterid');
            $condition = array('marks.student_id'=> $student_id , 'marks.semester' => $semesterid);
            $data = $this->studentResult_model->student_result($condition);
            if($data == true){
                // $this->session->set_flashdata('success','SUCCESS');
                $data['result_data'] = $this->studentResult_model->student_result($condition);
                $this->load->view('student/template/header');
                $this->load->view('student/Result/studentresult',$data);
                $this->load->view('student/template/footer'); 
            }
            else{
                $this->session->set_flashdata('fail','Your have entered Incorrect Course ID');
                $data['content'] = 'student/Result/result';
                $this->load->view('student/student_master', $data);
            }
        }
        else{
            $data['content'] = 'student/Result/result';
            $this->load->view('student/student_master', $data);
            // redirect(base_url('student/Result/result'));
        }
    }

}

//End Login.php
