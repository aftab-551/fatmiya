<?php

defined('BASEPATH') OR exit('No direct script access allowed');

Class Login extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper(array('url', 'form','captcha'));
        $this->load->library(array('form_validation', 'session'));
        $this->load->model('login_model');
        if ($this->login_model->studentLoggedIn() == true) {
            redirect(base_url('student/Dashboard'));
        }
        elseif($this->login_model->studentLoggedIn() == false && !empty($_COOKIE['remember_me'])){
            list($selector, $authenticator) = explode(':', $_COOKIE['remember_me']);

            $row = $this->login_model->select_row($selector, 'selector', 'auth_tokens');

            if (hash_equals($row->hashed_validator, hash('sha256', base64_decode($authenticator)))) {
                // Then regenerate login token as above
                $this->login_model->create_student_session(true,$row->userid);

                redirect(base_url('student/Dashboard'));
            }
        }
    }

    public function index() {
        $data['content'] = 'website/entry/login';
        $data['footer_blog_post'] = $this->footer_blog_post;
        $this->load->view('website/master', $data);
    }

    public function sign_in() {
        if ($this->form_validation->run('student_login') == false) {
            $data['content'] = 'website/entry/login';
            $this->load->view('website/master', $data);
        } else {
            $this->validate();
        }
    }

    public function count_failed_login()
    {
        $mysqli = new mysqli('localhost','root','','blog_examples');	
        $ip = $_SERVER['REMOTE_ADDR'];
        $result = $mysqli->query("SELECT count(ip_address) AS failed_login_attempt FROM failed_login WHERE ip_address = '$ip'  AND date BETWEEN DATE_SUB( NOW() , INTERVAL 1 DAY ) AND NOW()");
        $row  = $result->fetch_assoc();
        $failed_login_attempt = $row['failed_login_attempt'];
        $result->free();
    }

    private function login_do() {
        $student_id = $this->input->post('student_id');
        $password = $this->encryption($this->input->post('password'));
        $remember_me = $this->input->post('remember_me');

        if ($this->login_model->login('',$student_id, $password, 'students') == true) {
            $row = $this->login_model->get_student_details($student_id);

            if($remember_me != ''){ 
                $selector = base64_encode(random_bytes(9));
                $authenticator = random_bytes(33);

                setcookie(
                    'remember_me',
                    $selector.':'.base64_encode($authenticator),
                    time() + 864000,
                    '/',
                    'localhost',
                    true, // TLS-only
                    true  // http-only
                );

                $data = array(
                    'selector' => $selector,
                    'hashed_validator' => hash('sha256', $authenticator),
                    'userid' => $row->student_id,
                    'expires' => date('Y-m-d\TH:i:s', time() + 864000),
                );
                $this->login_model->insert($data, 'auth_tokens');
            }

            if ($row->first_attempt == 0){
                $this->login_model->create_student_session(false);
                $data['content'] = 'website/entry/renew_password';
                $this->load->view('website/master', $data);
            }
            else {
                $this->login_model->create_student_session();
                redirect(base_url('student/Dashboard'));
            }
        } 
        else {
            $this->session->set_flashdata('login_error', 'Wrong email or password');
            redirect(base_url() . 'student/Login');
        }
    }

    public function renew_password_form()
    {
        $data['content'] = 'website/entry/renew_password';
        $data['footer_blog_post'] = $this->footer_blog_post;
        $this->load->view('website/master', $data);
    }

    public function renew_password()
    {
        if($this->input->post()){
            $student_id = $this->session->userdata('student_id');
            $old_password = $this->input->post('old_password'); 
            $password = $this->input->post('password');
            $row = $this->login_model->get_student_details($student_id);

            if($row->password != base64_encode(md5($password))){
                if($this->_validate_password() == true) {
                    $set = array('password'=> base64_encode(md5($password)),'first_attempt'=> 1, 'updated_at' => date('Y-m-d H:i:s'));
                    $where = "student_id='$row->student_id'";
                    $this->login_model->update($set, $where, 'students');
                    $this->login_model->create_student_session(true, $row->student_id);
                    redirect(base_url('student/Dashboard'));
                }
                else {
                    $data['content'] = 'website/entry/renew_password';
                    $this->load->view('website/master', $data);
                }
            }
            else {
                $this->session->set_flashdata('error', 'New password cannot be old password.');
                redirect(base_url('student/Login/renew_password_form'));
            }
        }
        else {
            redirect(base_url('student/Login'));
        }
    }

    private function _validate_password(){
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[20]');
        $this->form_validation->set_rules('password_conf', 'Password Confirmation', 'trim|required|matches[password]|min_length[6]|max_length[20]');

        if($this->form_validation->run()) {
            return true;
        }
        else {
            return false;
        }
    }

    public function validate(){
        $captcha = trim($this->input->post('g-recaptcha-response'));

        if($this->form_validation->run() == TRUE && $captcha != '') {
            $key_secret = '6LeW0zccAAAAAHdjV_toWT1O7zmLALPBxp-X7P6C';

            $check = array(
                'secret' => $key_secret,
                'response' => $this->input->post('g-recaptcha-response')
            );

            $start_process = curl_init();
            curl_setopt($start_process, CURLOPT_URL, 'https://www.google.com/recaptcha/api/siteverify');
            curl_setopt($start_process, CURLOPT_POST, true);
            curl_setopt($start_process, CURLOPT_POSTFIELDS, http_build_query($check));
            curl_setopt($start_process, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($start_process, CURLOPT_RETURNTRANSFER, true);
            
            $receive_data = curl_exec($start_process);

            $final_response = json_decode($receive_data, true);

            if($final_response['success']){
                $this->login_do();
            }
            else {
                $this->session->set_flashdata('login_error', 'Invalid Captcha, Try Again!');
                redirect(base_url('student/Login'));
            }
        }
        else {
            if($captcha == '') {
                $this->session->set_flashdata('login_error', 'Invalid Captcha, Try Again!');
            }

            redirect(base_url('student/Login'));
        }
    }
}

//End Login.php
