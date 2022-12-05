<?php

/**
 * @package	eshoppingstore
 * @author	Muzzammil Alam
 * @copyright	Copyright (c) 2016 - 2018, eshoppingstore
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @category Controller
 * Class for Login Dashboard
 * Model admin_model.php
 * date: 7-MAY-2016
 */
Class Login extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper(array('url', 'form','captcha'));
        $this->load->library(array('form_validation', 'session'));
        $this->load->model('login_model');
        if ($this->login_model->loggedIn() == true) {
            redirect(base_url() . 'admin/Admin');
        }
        elseif($this->login_model->loggedIn() == false && !empty($_COOKIE['remember'])){
            list($selector, $authenticator) = explode(':', $_COOKIE['remember']);

            $row = $this->login_model->select_row($selector, 'selector', 'auth_tokens');

            if (hash_equals($row->hashed_validator, hash('sha256', base64_decode($authenticator)))) {
                // Then regenerate login token as above
                $this->login_model->create_session(true,$row->userid);
                redirect(base_url() . 'admin/Admin');
            }
        }
    }

    public function index() {
        $this->load->view('admin/login');
    }

    public function sign_in() {
        if ($this->form_validation->run('login') == false) {
            $this->load->view('admin/login');
        } else {
            $this->validate();
        }
    }

    private function login_do() {
        $email = $this->input->post('email');
        $password = $this->encryption($this->input->post('password'));
        $remember_me = $this->input->post('remember_me');

        if ($this->login_model->login($email,'', $password, 'users') == true) {
            $row = $this->login_model->get_user_details($email);
            
            if($remember_me != ''){ 
                $selector = base64_encode(random_bytes(9));
                $authenticator = random_bytes(33);

                setcookie(
                    'remember',
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
                    'userid' => $row->user_id,
                    'expires' => date('Y-m-d\TH:i:s', time() + 864000),
                );
                $this->login_model->insert($data, 'auth_tokens');
            }

            $this->login_model->create_session();
            redirect(base_url() . 'admin/Admin');
        } else {
            $this->session->set_flashdata('login_error', 'Wrong email or password');
            redirect(base_url() . 'admin/Login');
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
                redirect(base_url('admin/Login'));
            }
        }
        else {
            if($captcha == '') {
                $this->session->set_flashdata('login_error', 'Invalid Captcha, Try Again!');
            }

            redirect(base_url('admin/Login'));
        }
    }

}

//End Login.php
