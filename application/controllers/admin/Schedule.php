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
Class Schedule extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper(array('url', 'form'));
        $this->load->library(array('form_validation', 'session'));
        $this->load->model('Login_model');
        $this->load->model('Schedule_model');
        
        if ($this->Login_model->loggedIn() == false) {
            redirect('Admin/Login');
        }
    }

   /*     * *************************SCHEDULE SECTION********************************* */

    public function form_schedule($idEnc = '') {
        $id = base64_decode($idEnc);
        if($id == ''){
            $data['add'] = true;
            // initialize array
            $data['schedule'][0] = (object) array(
                'id' => "",
                'day' => ""
            );
        } else {
            $data['add'] = false;
            $data['schedule'] = $this->Schedule_model->get_all_schedule('schedule',['id'=>$id]);
        }
        $data['content'] = 'admin/schedule/form_schedule';
        $this->load->view('admin/schedule/schedule_master', $data);
    }
    
	public function index() {    
        $this->view_schedule();
    }
    public function view_schedule() {
        
        $data['schedule'] = $this->Schedule_model->get_all_schedule('schedule','');
	    $data['content'] = 'admin/schedule/view_schedule';
        $this->load->view('admin/schedule/schedule_master', $data);
    }
    
    public function update_schedule() {
        $id = $this->input->post('id');
            $data = array(
                'afterFajir' => $this->input->post('afterFajir'),
                'beforeZohar' => $this->input->post('beforeZohar'),
                'afterZohar' => $this->input->post('afterZohar'),
				'beforeAsar' => $this->input->post('beforeAsar'),
				'afterAsar' => $this->input->post('afterAsar'),
				'afterMajrib' => $this->input->post('afterMajrib'),
				'afterInsha' => $this->input->post('afterInsha'),
				'beforeFajir' => $this->input->post('beforeFajir'));
            $this->Schedule_model->update($data, array('id' => $id), 'schedule');
            $this->session->set_flashdata('success', 'Updated Successfully');
			redirect(base_url() . 'admin/schedule/view_schedule');
        
    }

}

//End of file Schedule.php