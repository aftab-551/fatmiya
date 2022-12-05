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
 * Class for Categories
 * Model categories_model.php
 * date-start: 18-MAY-2016
 */
Class Categories extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper(array('url', 'form'));
        $this->load->library(array('form_validation', 'session'));
        $this->load->model('Login_model');
        $this->load->model('Categories_model');
        if ($this->Login_model->loggedIn() == false) {
            redirect('admin/Login');
        }
    }

    public function index() {
        $data['content'] = 'admin/categories/add_product';
        $this->load->view('admin/categories/categories_master', $data);
    }

    /*     * *************************CATEGORY SECTION********************************* */

    public function category_form() {
        $data['content'] = 'admin/categories/add_product_category';
        $this->load->view('admin/admin_master', $data);
    }

    public function insert_category() {
        if ($this->form_validation->run('insert_category') == FALSE) {
            $data['content'] = 'admin/categories/add_product_category';
            $this->load->view('admin/admin_master', $data);
        } else {
            $data = array('name' => $this->input->post('category'),
                    'category_type' => $this->input->post('category_type'));

            $row = $this->Categories_model->get_existing_category($data);        

            if($row != 0){
                $this->session->set_flashdata('fail','The category with this type has already been added');
                redirect(base_url('admin/Categories/category_form'));
            }
            else {
                $this->Categories_model->insert($data, 'es_categories');
                $data['success'] = "Added Successfully";
                $data['content'] = 'admin/categories/add_product_category';
                $this->load->view('admin/admin_master', $data);
            }
            // $this->Categories_model->transaction_start();
            
            // $icon_name = 'icon';
            // $icon_folder = 'categories_icon';
            // $file_name = $category_data['inserted_id'];
            // $this->insert_image(16, 16, 'gif|jpg|png', $icon_name, $icon_folder, $file_name, 'category_icon', 'category_form');
            // $field_name = 'cat_image';
            // $folder_name = 'categories_images';
            // $this->insert_image(100, 699, 'gif|jpg|png', $field_name, $folder_name, $file_name, 'menu_image', 'category_form');
        }
    }

    // private function insert_image($max_height, $max_width, $allowed_types, $field_name, $folder_name, $file_name, $column, $view) {
    //     $uploaded_file_data = $this->do_upload($max_height, $max_width, $allowed_types, $field_name, $folder_name, $file_name);
    //    if (isset($uploaded_file_data['error'])) {
    //        $this->session->set_flashdata('image_error', $uploaded_file_data['error']);
    //        redirect(base_url() . 'admin/Categories/' . $view);
    //    } else {
    //        $image_name = $uploaded_file_data['upload_data']['file_name'];
    //        $this->Categories_model->update_image($image_name, $column, $file_name);
    //         $this->trans_comp($column);
    //    }
    // }

    // private function trans_comp($column) {
    //     if ($column == 'menu_image') {
    //         $this->Categories_model->transaction_complete();
    //         $this->session->set_flashdata('success', "Added Successfully");
    //        redirect(base_url() . 'admin/Categories/category_form');
    //        $data['success'] = "Added Successfully";
    //        $data['content'] = 'admin/categories/add_product_category';
    //        $this->load->view('admin/admin_master', $data);
            
    //     } else {
    //         return TRUE;
    //     }
    // }

    public function view_categories() {
        $data['categories'] = $this->Categories_model->get_all_categories('es_categories',['status!='=>3]);
        $data['content'] = 'admin/categories/view_categories';
        $this->load->view('admin/admin_master', $data);
    }

    public function change_status($status = '', $cid = '') {
        if (base64_decode($status) == 'es_1') {
            $set = array('status' => 0,'updated'=>date('Y-m-d H:i:s'));
            $this->Categories_model->update_category_status($set, base64_decode($cid), 'id_categories', 'es_categories');
            $this->session->set_flashdata('success', 'Updated Successfully');
            redirect('admin/Categories/view_categories');
        } elseif (base64_decode($status) == 'es_0') {
            $set = array('status' => 1,'updated'=>date('Y-m-d H:i:s'));
            $this->Categories_model->update_category_status($set, base64_decode($cid), 'id_categories', 'es_categories');
            $this->session->set_flashdata('success', 'Updated Successfully');
            redirect('admin/Categories/view_categories');
        } 
        elseif (base64_decode($status) == 'es_2') {
            $set = array('show_on_homepage' => 1);
            $this->Categories_model->update_category_status($set, base64_decode($cid), 'id_categories', 'es_categories');
            $this->session->set_flashdata('success', 'Updated Successfully');
            redirect('admin/Categories/view_categories');
        } elseif (base64_decode($status) == 'es_3') {
            $set = array('show_on_homepage' => 0);
            $this->Categories_model->update_category_status($set, base64_decode($cid), 'id_categories', 'es_categories');
            $this->session->set_flashdata('success', 'Updated Successfully');
            redirect('admin/Categories/view_categories');
        }
        else {
            // $data['fail'] = 'Wrong Value';
            $this->session->set_flashdata('fail', 'Wrong Value');
            redirect('admin/Categories/view_categories');
        }
    }
    
    function delete_category($cid) {
            $set = array('status' => 3,'updated'=>date('Y-m-d H:i:s'));
            $this->Categories_model->update_category_status($set, base64_decode($cid), 'id_categories', 'es_categories');
            $this->session->set_flashdata('success', 'Deleted Successfully');
            redirect('admin/Categories/view_categories');
    }
    
     function delete_sub_category($cid) {
            $set = array('status' => 3,'updated'=>date('Y-m-d H:i:s'));
            $this->Categories_model->update_category_status($set, base64_decode($cid), 'id_sub_categories', 'es_sub_categories');
            $this->session->set_flashdata('success', 'Deleted Successfully');
            redirect('admin/Categories/view_sub_categories');
    }
    

    public function edit_category($id = '') {
        $category_id = base64_decode($id);
        $this->input_validate($category_id);
        $data['category'] = $this->Categories_model->get_category($category_id);
        $data['content'] = 'admin/categories/edit_product_categories';
        $this->load->view('admin/admin_master', $data);
    }

    public function update_category() {
        $id = base64_decode($this->input->post('id'));
        $this->input_validate($id);
        if ($this->form_validation->run('edit_category') == FALSE) {
            $data['category'] = $this->Categories_model->get_category($id);
            $data['type_id'] = $this->input->post('category_type');
            $data['content'] = 'admin/categories/edit_product_categories';
            $this->load->view('admin/admin_master', $data);
        } else {
            $data = array('name' => $this->input->post('category'),'updated'=>date('Y-m-d H:i:s'), 'category_type' => $this->input->post('category_type'));
            //$this->Categories_model->transaction_start();
            $this->Categories_model->update($data, array('id_categories' => $id), 'es_categories');
            // $this->check_files($id);
            $this->session->set_flashdata('success', 'Updated Successfully');
            redirect(base_url() . 'admin/Categories/view_categories');
        }
    }

    public function check_files($id) {
        if ($_FILES['icon']['name'] != '') {
            $file_name = $id;
            $icon_name = 'icon';
            $icon_folder = 'categories_icon';
            // $this->insert_image(16, 16, 'gif|jpg|png', $icon_name, $icon_folder, $file_name, 'category_icon', 'edit_category/' . rtrim(base64_encode($id), '='));
        }
        if ($_FILES['cat_image']['name'] != '') {
            $file_name = $id;
            $field_name = 'cat_image';
            $folder_name = 'categories_images';
            // $this->insert_image(100, 699, 'gif|jpg|png', $field_name, $folder_name, $file_name, 'menu_image', 'edit_category/' . rtrim(base64_encode($id), '='));
        }
    }

    /*     * *************************SUB-CATEGORY SECTION********************************* */

    public function sub_category_form() {
        $data['categories'] = $this->Categories_model->get_all_categories('es_categories',['status!='=>3]);
        $data['content'] = 'admin/categories/add_sub_category';
        $this->load->view('admin/categories/categories_master', $data);
    }
  
    public function insert_sub_category() {
        if ($this->form_validation->run('insert_sub_category') == FALSE) {
            $data['categories'] = $this->Categories_model->get_all_categories('es_categories',['status!='=>3]);
            $data['content'] = 'admin/categories/add_sub_category';
            $this->load->view('admin/categories/categories_master', $data);
        } else {
            $data = array('name' => $this->input->post('category'),
                          'id_category' => base64_decode($this->input->post('under_category')),
                          'description' => $this->input->post('description'));
            $this->Categories_model->transaction_start();
            $this->Categories_model->insert($data, 'es_sub_categories');
            $this->Categories_model->transaction_complete();
            $this->session->set_flashdata('success', "Added Successfully");
            redirect(base_url().'admin/Categories/sub_category_form');
        }
    }
   
    public function view_sub_categories() {
        $data['categories'] = $this->Categories_model->get_all_sub_categories('es_sub_categories');
        $data['content'] = 'admin/categories/view_sub_categories';
        $this->load->view('admin/admin_master', $data);
    }
   
    public function change_sub_category_status($status = '', $cid = '') {
        if (base64_decode($status) == 'es_1') {
            $set = array('status' => 0,'updated'=>date('Y-m-d H:i:s'));
            $this->Categories_model->update_category_status($set, base64_decode($cid), 'id_sub_categories', 'es_sub_categories');
            $this->session->set_flashdata('success', 'Updated Successfully');
            redirect('admin/Categories/view_sub_categories');
        } elseif (base64_decode($status) == 'es_0') {
            $set = array('status' => 1,'updated'=>date('Y-m-d H:i:s'));
            $this->Categories_model->update_category_status($set, base64_decode($cid), 'id_sub_categories', 'es_sub_categories');
            $this->session->set_flashdata('success', 'Updated Successfully');
            redirect('admin/Categories/view_sub_categories');
        } elseif (base64_decode($status) == 'es_2') {
            $count = $this->Categories_model->getShowHomepageCount();
            if($count >= 3 ){
                $this->session->set_flashdata('fail', 'Maximum three sub categories are allowed on homepage.');
                redirect('admin/Categories/view_sub_categories');
            }
            $set = array('show_on_homepage' => 1);
            $this->Categories_model->update_category_status($set, base64_decode($cid), 'id_sub_categories', 'es_sub_categories');
            $this->session->set_flashdata('success', 'Updated Successfully');
            redirect('admin/Categories/view_sub_categories');
        } elseif (base64_decode($status) == 'es_3') {
            $set = array('show_on_homepage' => 0);
            $this->Categories_model->update_category_status($set, base64_decode($cid), 'id_sub_categories', 'es_sub_categories');
            $this->session->set_flashdata('success', 'Updated Successfully');
            redirect('admin/Categories/view_sub_categories');
        } else {
            // $data['fail'] = 'Wrong Value';
            $this->session->set_flashdata('fail', 'Wrong Value');
            redirect('admin/Categories/view_sub_categories');
        }
    }
    
    public function edit_sub_category($id = '') {
        $category_id = base64_decode($id);
        $this->input_validate($category_id);
        $data['Category'] = $this->Categories_model->get_category_byid($category_id, 'id_sub_categories', 'es_sub_categories');
        $data['categories'] = $this->Categories_model->get_all_categories('es_categories','');
        $data['content'] = 'admin/categories/edit_product_sub_categories';
        $this->load->view('admin/categories/categories_master', $data);
    }
    
    public function update_sub_category() {
        $id = base64_decode($this->input->post('id'));
        $this->input_validate($id);
        if ($this->form_validation->run('edit_sub_category') == FALSE) {
            $data['Category'] = $this->Categories_model->get_category_byid($id, 'id_sub_categories', 'es_sub_categories');
            $data['categories'] = $this->Categories_model->get_all_categories('es_categories','');
            $data['content'] = 'admin/categories/edit_product_sub_categories';
            $this->load->view('admin/admin_master', $data);
        } else {
            $data = array('name' => $this->input->post('category'),
                          'id_category' => base64_decode($this->input->post('under_category')),
                'description' => $this->input->post('description'),
                'updated'=>date('Y-m-d H:i:s'));
            //$this->Categories_model->transaction_start();
            $this->Categories_model->update($data, array('id_sub_categories' => $id), 'es_sub_categories');
         
            $this->session->set_flashdata('success', 'Updated Successfully');
            redirect(base_url() . 'admin/Categories/edit_sub_category/' . rtrim(base64_encode($id), '='));
        }
    }
    
   
    
}

//End of file admin/Categories.php