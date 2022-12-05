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
 * Class for Products
 * Model products_model.php
 * date-start: 18-MAY-2016
 */
Class Products extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper(array('url', 'form'));
        $this->load->library(array('form_validation', 'session'));
        $this->load->model('Login_model');
        $this->load->model('Products_model');
        $this->load->model('Categories_model');
        if ($this->Login_model->loggedIn() == false) {
            redirect('admin/Login');
        }
    }

    public function index() {
        $data['products'] = $this->Products_model->get_all_products('es_products');
        $data['content'] = 'admin/products/view_products';
        $this->load->view('admin/admin_master', $data);
    }

    public function add_product() {
        $data['categories'] = $this->Categories_model->get_all_categories('es_categories','');
        $data['brands'] = $this->Categories_model->get_all_categories('es_brand', array('status' => 1));
        $data['colors'] = $this->Categories_model->get_all_categories('es_color', array('status' => 1));
        $data['sizes'] = $this->Categories_model->get_all_categories('es_size', array('status' => 1));
        $data['content'] = 'admin/products/add_product';
        $this->load->view('admin/categories/categories_master', $data);
    }

    public function get_sub_categories() {
        $id = base64_decode($this->input->post('id'));
        // echo $id;die;
        $this->input_validate($id);
        $data = $this->Categories_model->get_category_byid($id, 'id_category', 'es_sub_categories');
        print_r(json_encode($data));
    }

    public function get_sub_sub_categories() {
        $id = $this->input->post('id');
        $this->input_validate($id);
        $data = $this->Categories_model->get_category_byid($id, 'id_sub_category', 'es_sub_sub_categories');
        print_r(json_encode($data));
    }

    /*     * *************************PROUCT POSTING********************************* */

    public function insert_product() {
        if ($this->form_validation->run('insert_product') == FALSE) {
            $data['categories'] = $this->Categories_model->get_all_categories('es_categories','');
            $data['brands'] = $this->Categories_model->get_all_categories('es_brand', array('status' => 1));
            $data['content'] = 'admin/products/add_product';
            $this->load->view('admin/categories/categories_master', $data);
        } else {
            $data = $this->get_product_form_data();
            $this->Products_model->transaction_start();
            $product_data = $this->Products_model->insert($data, 'es_products');
            $field_name = 'product_image';
            $folder_name = 'product_images/zoom_image';
            $destination_folder = 'product_images/display_image';
            $file_name = $product_data['inserted_id'];
            $this->insert_image('', '', 'gif|jpg|png', $field_name, $folder_name, $file_name, 'image', 'add_product', $destination_folder);
        }
    }
    
    private function get_product_form_data(){
        $data = array('id_categories' => base64_decode($this->input->post('category')),
                'id_sub_categories' => $this->input->post('sub_category'),
                'id_sub_sub_categories' => $this->input->post('sub_sub_category'),
                'id_brand' => base64_decode($this->input->post('brand')),
                'name' => $this->input->post('name'),
                'title' => $this->input->post('title'),
                'price' => $this->input->post('price'),
                'stock' => $this->input->post('stock'),
                'on_sale' => $this->input->post('on_sale'),
                'on_deal' => $this->input->post('on_deal'),
                'deal_till' => $this->input->post('deal_till'),
                'id_color' => base64_decode($this->input->post('color')),
                'id_size' => base64_decode($this->input->post('size')),
                'sale' => $this->input->post('sale'),
                'description' => $this->input->post('description'),
            );
        return $data;
    }

    private function insert_image($max_height, $max_width, $allowed_types, $field_name, $folder_name, $file_name, $column, $view, $destination_folder) {
        $uploaded_file_data = $this->do_upload($max_height, $max_width, $allowed_types, $field_name, $folder_name, $file_name);

        if (isset($uploaded_file_data['error'])) {
            $this->session->set_flashdata('image_error', $uploaded_file_data['error']);
            redirect(base_url() . 'admin/Products/' . $view);
        } else {
            $image_name = $uploaded_file_data['upload_data']['file_name'];
            $this->resize_image($folder_name, $image_name, $destination_folder, '512', '420');
            $this->resize_image($folder_name, $image_name, 'product_images/container_image', '366', '300');
            $this->Products_model->update_image($image_name, $column, $file_name);
            $this->trans_comp($column);
        }
    }

    

    private function trans_comp($column) {
        if ($column == 'image') {
            $this->Products_model->transaction_complete();
            $data['categories'] = $this->Categories_model->get_all_categories('es_categories','');
            $data['success'] = "Added Successfully";
            $data['brands'] = $this->Categories_model->get_all_categories('es_brand', array('status' => 1));
            $data['content'] = 'admin/products/add_product';
            $this->load->view('admin/categories/categories_master', $data);
        } else {
            return TRUE;
        }
    }

    /*     * *************************PROUCT EDITING********************************* */
    /* Methods to change status of product 1->active and 0->inactive */

    public function change_status($status = '', $cid = '') {
        if (base64_decode($status) == 'es_1') {
            $set = array('status' => 0);
            $this->Categories_model->update_category_status($set, base64_decode($cid), 'id_products', 'es_products');
            $this->session->set_flashdata('success', 'Updated Successfully');
            redirect(base_url() . 'admin/Products');
        } elseif (base64_decode($status) == 'es_0') {
            $set = array('status' => 1);
            $this->Categories_model->update_category_status($set, base64_decode($cid), 'id_products', 'es_products');
            $this->session->set_flashdata('success', 'Updated Successfully');
            redirect(base_url() . 'admin/Products');
        } elseif (base64_decode($status) == 'es_2') {
            $set = array('featured' => 1);
            $this->Categories_model->update_category_status($set, base64_decode($cid), 'id_products', 'es_products');
            $this->session->set_flashdata('success', 'Updated Successfully');
            redirect(base_url() . 'admin/Products');
        } elseif (base64_decode($status) == 'es_3') {
            $set = array('featured' => 0);
            $this->Categories_model->update_category_status($set, base64_decode($cid), 'id_products', 'es_products');
            $this->session->set_flashdata('success', 'Updated Successfully');
            redirect(base_url() . 'admin/Products');
        } elseif (base64_decode($status) == 'es_4') {
            $set = array('on_sale' => 1);
            $this->Categories_model->update_category_status($set, base64_decode($cid), 'id_products', 'es_products');
            $this->session->set_flashdata('success', 'Updated Successfully');
            redirect(base_url() . 'admin/Products');
        } elseif (base64_decode($status) == 'es_5') {
            $set = array('on_sale' => 0);
            $this->Categories_model->update_category_status($set, base64_decode($cid), 'id_products', 'es_products');
            $this->session->set_flashdata('success', 'Updated Successfully');
            redirect(base_url() . 'admin/Products');
        } else {
            // $data['fail'] = 'Wrong Value';
            $this->session->set_flashdata('fail', 'Wrong Value');
            redirect(base_url() . 'admin/Products');
        }
    }

    /* Method to edit  product call to categories method but table is different */

    public function edit_product($id = '') {
        $product_id = base64_decode($id);
        $this->input_validate($product_id);
        $data = $this->get_data_for_edit_product($product_id);
        $this->load->view('admin/categories/categories_master', $data);
    }
    /* Method to get all data of the required product to be sent to edit product view */
    private function get_data_for_edit_product($product_id){
        $data['categories'] = $this->Categories_model->get_all_categories('es_categories','');
        $data['product'] = $this->Categories_model->get_category_byid($product_id, 'id_products', 'es_products');
        $data['colors'] = $this->Categories_model->get_all_categories('es_color', array('status' => 1));
        foreach ($data['product'] as $p) {
            $data['sub_categories'] = $this->Categories_model->get_all_categories('es_sub_categories',array('id_category'=>$p->id_categories));
            $data['sub_sub_categories'] = $this->Categories_model->get_all_categories('es_sub_sub_categories',array('id_sub_category'=>$p->id_sub_categories));
            break;
        }
       
        $data['brands'] =   $this->Categories_model->get_all_categories('es_brand',array('status'=> 1 ));
        $data['sizes'] =   $this->Categories_model->get_all_categories('es_size',array('status'=> 1 ));
        $data['content'] = 'admin/products/edit_product';
        return $data;
    }
    /* Method to update product */
    public function update_product() {
        $id = base64_decode($this->input->post('id'));
        $this->input_validate($id);
        if ($this->form_validation->run('insert_product') == FALSE) {
            $data = $this->get_data_for_edit_product($id);
            $this->load->view('admin/categories/categories_master', $data);
        } else {
            $data = $this->get_product_form_data();
            //$this->Products_model->transaction_start();
            $this->Categories_model->update($data, array('id_products' => $id), 'es_products');
            $this->check_files($id);
            $this->session->set_flashdata('success', 'Updated Successfully');
            redirect(base_url() . 'admin/Products/edit_product/' . rtrim(base64_encode($id), '='));
        }
    }

    private function check_files($id) {
        if ($_FILES['product_image']['name'] != '') {
            $field_name = 'product_image';
            $folder_name = 'product_images/zoom_image';
            $destination_folder = 'product_images/display_image';
            $file_name = $id;
            $this->insert_image('', '', 'gif|jpg|png', $field_name, $folder_name, $file_name, 'image', 'add_product', $destination_folder);
        }
        if (isset($_FILES['userfile']['name'])) {
                $this->do_all_upload($id);
        }
    }

    function do_all_upload($id_product)
    {       
        $this->load->library('upload');

        $files = $_FILES;
        $cpt = count($_FILES['userfile']['name']);
        for($i=0; $i<$cpt; $i++)
        {           
            $_FILES['userfile']['name']= $files['userfile']['name'][$i];
            $_FILES['userfile']['type']= $files['userfile']['type'][$i];
            $_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
            $_FILES['userfile']['error']= $files['userfile']['error'][$i];
            $_FILES['userfile']['size']= $files['userfile']['size'][$i];    
            if ($files['userfile']['tmp_name'][$i] != ""){
                $this->upload->initialize($this->set_upload_options());
                $this->upload->do_upload();
                $userfile = $this->upload->data();
                $names4 = $userfile['file_name'];

                $CreateDate = date("Y-m-d H:i:s");

                $data = array(
                    'id_product' => $id_product,
                    'image' => $names4
                    );
                $query = $this->Products_model->all_insert($data,'es_product_images');
            }}
        }
        private function set_upload_options() {   
         //upload an image options
            $config = array();
            $config['upload_path'] = 'uploads/product_images/multiple_images';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']      = '0';
            $config['overwrite']     = FALSE;

            return $config;
        }
    /*DELETE PRODUCT*/
    public function delete_product($id = '') {
        $product_id = base64_decode($id);
        $this->Products_model->delete('id_products',$product_id,'es_products');
        $this->session->set_flashdata('success', 'Deleted Successfully');
        redirect(base_url() . 'admin/Products');
    }
   

}

//End of file admin/Products.php