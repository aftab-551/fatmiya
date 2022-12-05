<?php

/**
 * @package	khanqah
 * @author	Muzzammil Alam
 * @copyright	Copyright (c) 2016 - 2018, khanqah
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @category Controller
 * Class for Home Dashboard
 * Model Home_model.php
 * date: 24-July-2016
 */
Class Ask extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper(array('url', 'form'));
        $this->load->library(array('form_validation', 'session'));
        $this->load->model('Login_model');
        $this->load->model('Home_model');
    }

    public function index() {
        if(isset($_POST['submit']))
        {
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $sub = $this->input->post('sub');
            $ques = $this->input->post('ques');
            $data = array(
                'name' => $name,
                'email'=>$email,
                'subject'=>  $sub,
                'question'=> $ques);
            $this->Home_model->transaction_start();
            $ret = $this->Home_model->insert($data, 'askhazrats');
            if($ret)
            {
                $data['success'] =  "Your message added to our system. Response will be received over provied email";
            }
        }
            $data['categories'] = $this->Home_model->get_categories();
            $data['content'] = 'ask_hazrat';
            $data['header_content'] = 'blank_header';
        $this->load->view('master',$data);  
    }


}

//End of file Home.php