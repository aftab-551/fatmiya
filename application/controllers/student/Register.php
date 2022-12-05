<?php

defined('BASEPATH') OR exit('No direct script access allowed');

Class Register extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper(array('url', 'form'));
        $this->load->library(array('form_validation', 'session'));
        $this->load->model('login_model');
        if ($this->login_model->studentLoggedIn() == true) {
            redirect('student/Dashboard');
        }
    }

    public function index()
    {
        $data['content'] = 'website/entry/register';
        $data['footer_blog_post'] = $this->footer_blog_post;
        $this->load->view('website/master', $data);
    }

    public function register_student()
    {
        if($this->input->post()){
            if($this->_validate() == true){
                $first_name = $this->input->post('first_name');
                $last_name = $this->input->post('last_name');
                $father_name = $this->input->post('father_name');
                $email = $this->input->post('email');
                $address = $this->input->post('address');
                $contact = $this->input->post('contact');
                $qualification = $this->input->post('qualification');

                $data = array(
                    'first_name' => $first_name,
                    'last_name' => $last_name,
                    'father_name' => $father_name,
                    'email' => $email,
                    'address' => $address,
                    'contact_number' => $contact,
                    'qualification' => $qualification,
                );

                // $this->security->xss_clean($data);

                $this->login_model->insert($data, 'students');

                $row = $this->login_model->get_counter_value();
                $counter = $row->student_counter;
                $increment = ++$counter;
                $student_initial = $row->student_initial;

                // Updating the settings
                $set = array("student_counter"=>$increment, "updated"=>date('Y-m-d H:i:s'));
                $where = 'id_settings= 1';
                $this->login_model->update($set, $where, 'settings');

                // Updating the student_id in the students table
                $row = $this->login_model->select_last_row('students');
                $initial = $student_initial.'-'.date('y').'-'.date('m').'-'.$increment;

                $set = array("student_id"=>$initial, "updated_at"=>date('Y-m-d H:i:s'));
                $where = "id='$row->id'";
                $this->login_model->update($set, $where, 'students');

                $this->session->set_flashdata('success', 'You have been registered successfully, Please have patience till your account is being verified');
                redirect(base_url('student/login'));

            }
            else{
                $data['content'] = 'website/entry/register';
                $this->load->view('website/master', $data);
            }
        }
        else{
            $data['content'] = 'website/entry/register';
            $this->load->view('website/master', $data);
        }
    }

    private function _validate() {
        $this->form_validation->set_rules('first_name', 'First Name', 'trim|required|regex_match[/^[a-zA-Z ]*$/]|min_length[3]|max_length[50]');
        $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|regex_match[/^[a-zA-Z ]*$/]|min_length[3]|max_length[50]');
        $this->form_validation->set_rules('father_name', 'Father Name', 'trim|required|regex_match[/^[a-zA-Z ]*$/]|min_length[4]|max_length[50]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[students.email]');
        $this->form_validation->set_rules('address', 'Address', 'trim|required|regex_match[/^[a-zA-Z0-9-_\/,. ]*$/]|min_length[4]|max_length[50]');
        $this->form_validation->set_rules('contact', 'Contact', 'trim|required|regex_match[/^((\+92)?(0092)?(92)?(0)?)(3)([0-9]{9})$/]|min_length[4]|max_length[50]');
        $this->form_validation->set_rules('qualification', 'Qualification', 'trim|required|regex_match[/^[a-zA-Z-\. ]*$/]|min_length[4]|max_length[50]');

        if($this->form_validation->run() == TRUE) {
            return true;
        }
        else {
            return false;
        }
    }

}

//End Login.php
