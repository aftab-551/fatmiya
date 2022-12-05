<?php

/**
 * @package	eshoppingstore
 * @author	Muzzammil Alam
 * @copyright	Copyright (c) 2016 - 2018, eshoppingstore
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @bayan Controller
 * Class for Bayanat
 * Model bayanat_model.php
 * date-start: 18-MAY-2016
 */
Class Bayanat extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper(array('url', 'form'));
        $this->load->library(array('form_validation', 'session'));
        $this->load->model('Login_model');
        $this->load->model('Bayanat_model');
        $this->load->model('Categories_model');
        if ($this->Login_model->loggedIn() == false) {
            redirect('admin/Login');
        }
    }

    public function index() {
//        $data['content'] = 'admin/bayanat/view_bayanat';
//        $this->load->view('admin/bayanat/categories_master', $data);
    }

    /*     * *************************CATEGORY SECTION********************************* */

    public function bayan_form() {
        $data['categories'] = $this->Categories_model->get_all_categories('es_categories'," 'status'!=3 and (category_type = 1 or category_type = 2) ");
        $data['content'] = 'admin/bayanat/add_bayan';
        $this->load->view('admin/admin_master', $data);
    }

    public function insert_bayan() {
        if (TRUE == FALSE) { //$this->form_validation->run('insert_bayan')
            $data['content'] = 'admin/bayanat/add_bayan';
            $this->load->view('admin/admin_master', $data);
        } else {
            $data = array('name' => $this->input->post('bayan'),
                'id_sub_categories'=>$this->input->post('sub_category'),
                'date'=>$this->input->post('date'),
                'id_categories'=>  base64_decode($this->input->post('category')));
            $this->Bayanat_model->transaction_start();
            $bayan_data = $this->Bayanat_model->insert($data, 'bayanat');
            $icon_name = 'bayan';
            $icon_folder = 'bayanat';
            $file_name = $bayan_data['inserted_id'];
            $this->insert_image('', '', '*', $icon_name, $icon_folder, $file_name, 'audio', 'bayan_form');
            $field_name = 'bayan_image';
            $file=$_FILES[$field_name];
            $folder_name = 'bayan_images';
            if ($file['size'] > 0) {
                $this->insert_image('', '', 'gif|jpg|png|jpeg', $field_name, $folder_name, $file_name, 'bayan_image', 'bayan_form');
            }
            else {
                $this->Bayanat_model->transaction_complete();
                $this->session->set_flashdata('success', "Added Successfully");
                redirect(base_url() . 'admin/Bayanat/bayan_form');
            }
           }
    }

    private function insert_image($max_height, $max_width, $allowed_types, $field_name, $folder_name, $file_name, $column, $view) {
        $uploaded_file_data = $this->do_upload($max_height, $max_width, $allowed_types, $field_name, $folder_name, $file_name);
        if (isset($uploaded_file_data['error'])) {
            $this->session->set_flashdata('image_error', $uploaded_file_data['error']);
            redirect(base_url() . 'admin/Bayanat/' . $view);
        } else {
            $image_name = $uploaded_file_data['upload_data']['file_name'];
            $this->Bayanat_model->update_image($image_name, $column, $file_name);
            $this->trans_comp($column);
        }
    }
    
     private function insert_image_edit($max_height, $max_width, $allowed_types, $field_name, $folder_name, $file_name, $column, $view) {
        $uploaded_file_data = $this->do_upload($max_height, $max_width, $allowed_types, $field_name, $folder_name, $file_name);
        if (isset($uploaded_file_data['error'])) {
            $this->session->set_flashdata('image_error', $uploaded_file_data['error']);
            redirect(base_url() . 'admin/Bayanat/' . $view);
        } else {
            $image_name = $uploaded_file_data['upload_data']['file_name'];
            $this->Bayanat_model->update_image($image_name, $column, $file_name);
            $this->trans_comp_edit($column);
        }
    }

    private function trans_comp($column) {
        if ($column == 'bayan_image') {
            $this->Bayanat_model->transaction_complete();
            $this->session->set_flashdata('success', "Added Successfully");
            redirect(base_url() . 'admin/Bayanat/bayan_form');
            
        } else {
            //die('hello');
            return TRUE;
        }
    }
    
    private function trans_comp_edit($column) {
        return true;
    }

    public function view_bayanat() {
        $data['bayanat'] = $this->Bayanat_model->get_all_bayanat('bayanat',['status!='=>3]);
        $data['content'] = 'admin/bayanat/view_bayanat';
        $this->load->view('admin/admin_master', $data);
    }

    public function change_status($status = '', $cid = '') {
        if (base64_decode($status) == 'es_1') {
            $set = array('status' => 0,'updated'=>date('Y-m-d H:i:s'));
            $this->Bayanat_model->update_bayan_status($set, base64_decode($cid), 'id_bayanat', 'bayanat');
            $this->session->set_flashdata('success', 'Updated Successfully');
            redirect('admin/Bayanat/view_bayanat');
        } elseif (base64_decode($status) == 'es_0') {
            $set = array('status' => 1,'updated'=>date('Y-m-d H:i:s'));
            $this->Bayanat_model->update_bayan_status($set, base64_decode($cid), 'id_bayanat', 'bayanat');
            $this->session->set_flashdata('success', 'Updated Successfully');
            redirect('admin/Bayanat/view_bayanat');
        } else {
            // $data['fail'] = 'Wrong Value';
            $this->session->set_flashdata('fail', 'Wrong Value');
            redirect('admin/Bayanat/view_bayanat');
        }
    }
    
    function delete_bayan($cid) {
            $set = array('status' => 3,'updated'=>date('Y-m-d H:i:s'));
            $this->Bayanat_model->update_bayan_status($set, base64_decode($cid), 'id_bayanat', 'bayanat');
            $this->session->set_flashdata('success', 'Deleted Successfully');
            redirect('admin/Bayanat/view_bayanat');
    }
     
    

    public function edit_bayan($id = '') {
        $bayan_id = base64_decode($id);
        $this->input_validate($bayan_id);
         $data['categories'] = $this->Categories_model->get_all_categories('es_categories',['status!='=>3]);
        $data['Bayan'] = $this->Bayanat_model->get_bayan_byid($bayan_id, 'id_bayanat', 'bayanat');
        foreach ($data['Bayan'] as $p) {
            $data['sub_categories'] = $this->Categories_model->get_all_categories('es_sub_categories',array('id_category'=>$p->id_categories,'status!='=>3));
            
            break;
        }
        $data['content'] = 'admin/bayanat/edit_bayan';
        $this->load->view('admin/categories/categories_master', $data);
    }

    public function update_bayan() {
        $id = base64_decode($this->input->post('id'));
        $this->input_validate($id);
        if ($this->form_validation->run('edit_bayan') == FALSE) {
            $data['Bayan'] = $this->Bayanat_model->get_bayan_byid($id, 'id_bayanat', 'bayanat');
            $data['content'] = 'admin/bayanat/edit_bayan';
            $this->load->view('admin/admin_master', $data);
        } else {
            $data = array('name' => $this->input->post('bayan'),
                'updated'=>date('Y-m-d H:i:s'),
                'id_sub_categories'=>$this->input->post('sub_category'),
                'date'=>$this->input->post('date'),
                'id_categories'=>  base64_decode($this->input->post('category')));
            //$this->Bayanat_model->transaction_start();
            $this->Bayanat_model->update($data, array('id_bayanat' => $id), 'bayanat');
            $this->check_files($id);
            $this->session->set_flashdata('success', 'Updated Successfully');
            redirect(base_url() . 'admin/Bayanat/edit_bayan/' . rtrim(base64_encode($id), '='));
        }
    }
    public function get_sub_categories() {
        $id = base64_decode($this->input->post('id'));
        // echo $id;die;
        $this->input_validate($id);
        $data = $this->Categories_model->get_category_byid($id, 'id_category', 'es_sub_categories');
        print_r(json_encode($data));
    }

    public function check_files($id) {
        if ($_FILES['bayan']['name'] != '') {
            $icon_name = 'bayan';
            $icon_folder = 'bayanat';
            $file_name = $id;
            $this->insert_image_edit('', '', 'mp3', $icon_name, $icon_folder, $file_name, 'audio', 'bayan_form');
        }
        if ($_FILES['bayan_image']['name'] != '') {
            $field_name = 'bayan_image';
            $folder_name = 'bayan_images';
            $file_name = $id;
            $this->insert_image_edit('', '', 'gif|jpg|png', $field_name, $folder_name, $file_name, 'bayan_image', 'bayan_form');
            
           
        }
       
    }

    
   
}

//End of file admin/Bayanat.php