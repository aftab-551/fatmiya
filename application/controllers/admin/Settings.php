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
 * Class for Settings Dashboard
 * Model Settings_model.php
 * date: 7-MAY-2016
 */
Class Settings extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper(array('url', 'form'));
        $this->load->library(array('form_validation', 'session'));
        $this->load->model('Login_model');
        $this->load->model('Bayanat_model');
        if ($this->Login_model->loggedIn() == false) {
            redirect('Admin/Login');
        }
    }

    public function index() {
        $data['settings'] = $this->Bayanat_model->get_settings();
        $data['content'] = 'admin/settings/view_settings';
        $this->load->view('admin/admin_master', $data);
    }
    
    public function update_settings() {
        $id = base64_decode($this->input->post('id'));
        $this->input_validate($id);
            $data = array(
                'name' => $this->input->post('institute_name'),
                'description' => $this->input->post('description'),
                'address' => $this->input->post('address'),
                'phone' => $this->input->post('phone'),
                'email' => $this->input->post('email'),
                'intro_video' => $this->input->post('intro_video'),
                'maps_embed_link' => $this->input->post('maps_embed_link'),
                'student_initial' => $this->input->post('student_initial'),
                'student_counter' => $this->input->post('student_counter'),
                'teacher_initial' => $this->input->post('teacher_initial'),
                'teacher_counter' => $this->input->post('teacher_counter'),
                'updated'=> date('Y-m-d H:i:s')
            );

            // $this->security->xss_clean($data);

            $this->Bayanat_model->update($data, array('id_settings' => $id), 'settings');
            $this->check_files($id);
    }

    public function check_files($id) {
        if ($_FILES['image']['name'] != '') {
            $file_name = $id;
            $field_name = 'image';
            $folder_name = 'about_images';
            $this->insert_image_edit('', '', 'gif|jpg|png', $field_name, $folder_name, $file_name, 'image', 'view_settings', $id);
        }
        else {
            $this->session->set_flashdata('success', 'Updated Successfully');
            redirect(base_url() . 'admin/Settings');
        }
    }

    private function insert_image_edit($max_height, $max_width, $allowed_types, $field_name, $folder_name, $file_name, $column, $view, $id) {
        $uploaded_file_data = $this->do_upload($max_height, $max_width, $allowed_types, $field_name, $folder_name, $file_name);
        if (isset($uploaded_file_data['error'])) {
            $this->session->set_flashdata('image_error',$uploaded_file_data['error']);
            redirect(base_url() . 'admin/Settings');
        } else {
            $image_name = $uploaded_file_data['upload_data']['file_name'];
            $sd = $this->Bayanat_model->update_settings_image($image_name, $column, $file_name);
            $this->trans_comp_edit($column);
        }
    }

    private function trans_comp_edit($column) {
        if ($column == 'image') {
            $this->session->set_flashdata('success', 'Updated Successfully');
            redirect(base_url() . 'admin/Settings');
        } else {
            //die('hello');
            return TRUE;
        }
    }
    

}

//End of file Settings.php