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
 * Class for Settings Dashboard
 * Model Settings_model.php
 * date: 7-MAY-2016
 */
Class Notifications extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper(array('url', 'form'));
        $this->load->library(array('form_validation', 'session'));
        $this->load->model('Login_model');
        $this->load->model('Notifications_model');
        
        if ($this->Login_model->loggedIn() == false) {
            redirect('Admin/Login');
        }
    }

   /*     * *************************VEHICLE SECTION********************************* */

    public function notification_form($idEnc = '') {
        $id = base64_decode($idEnc);
        if($id == ''){
            $data['add'] = true;
            // initialize array
            $data['notification'][0] = (object) array(
                'title' => "",
                'id_notifications' => "",
                'time' => "",
                'date' => ""
            );
        } else {
            $data['add'] = false;
            $data['notification'] = $this->Notifications_model->get_all_notifications('notifications',['status'=>1,'id_notifications'=>$id]);
        }
        $data['content'] = 'admin/notifications/notification_form';
        $this->load->view('admin/categories/categories_master', $data);
    }
    
    public function view_notifications() {
        
        $data['notifications'] = $this->Notifications_model->get_all_notifications('notifications',['status'=>1]);
        $data['content'] = 'admin/notifications/view_notifications';
        $this->load->view('admin/categories/categories_master', $data);
    }
    
    function insert_notification() {
        $id = $this->input->post('id');
        $name = $this->input->post('title');
        $date = $this->input->post('date');
        $time = $this->input->post('time');
        if($id == ''){
            $this->Notifications_model->insert([
                'title'=>$name,
                'date'=>$date,
                'time'=>$time],'notifications');
        } else {
            $this->Notifications_model->update([
                'title'=>$name,
                'date'=>$date,
                'time'=>$time
            ],['id_notifications'=>$id],'notifications');
        }
         $this->session->set_flashdata('success', 'Done');
         redirect('admin/Notifications/view_notifications');
    }
    function deletenotification($idEnc) {
        $id = base64_decode($idEnc);
        $this->Notifications_model->update(['status'=>3],['id_notifications'=>$id],'notifications');
        $this->session->set_flashdata('success', 'Deleted');
        redirect('admin/Notifications/view_notifications');
    }
    

}

//End of file Settings.php