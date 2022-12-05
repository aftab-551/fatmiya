<?php

/**
 * @package	eshoppingstore
 * @author	Muzzammil Alam
 * @copyright	Copyright (c) 2016 - 2018, HumaraAdab
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @category Controller
 * Class for Admin Dashboard
 * Model admin_model.php
 * date: 7-MAY-2016
 */
Class Admin extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper(array('url', 'form','captcha'));
        $this->load->library(array('form_validation', 'session'));
        $this->load->model('Login_model');
        $this->load->model('dashboard_model');
        if ($this->Login_model->loggedIn() == false) {
            redirect('admin/Login');
        }
    }

    public function index() {
        $data['verified_students'] = count($this->dashboard_model->select(['status'=>1,'student_id!='=>'0'],'','students'));
        $data['non_verified_students'] = count($this->dashboard_model->select(['status'=>1,'student_id'=>'0'],'','students'));
        $data['active_teachers'] = count($this->dashboard_model->select(['status'=>1],'','teachers'));
        $data['deactive_teachers'] = count($this->dashboard_model->select(['status!='=>1],'','teachers'));
        $data['active_programs'] = count($this->dashboard_model->select(['status'=>1],'','programs'));
        $data['active_offered_courses'] = count($this->dashboard_model->select(['status'=>1],'','offered_courses'));
        $data['active_courses'] = count($this->dashboard_model->select(['status'=>1],'','courses'));
        $data['active_events'] = count($this->dashboard_model->select(['status'=>1],'','events'));
        $data['active_blog_posts'] = count($this->dashboard_model->select(['status'=>1],'','blog_posts'));
        $data['active_sliders'] = count($this->dashboard_model->select(['status'=>1],'','es_slider'));
        $data['gallery_images'] = count($this->dashboard_model->select(['status'=>1],'','gallery'));
        $data['content'] = 'admin/dashboard/view_dashboard';
        
        //$data['content'] = 'admin/home';
        $this->load->view('admin/admin_master', $data);
    }

    function logout() {
        $this->session->sess_destroy();
        setcookie(
            'remember',
            '',
            time() - 3600,
            '/',
            'localhost',
            true, // TLS-only
            true  // http-only
        );
        redirect('admin/Login');
    }

}

//End of file admin.php