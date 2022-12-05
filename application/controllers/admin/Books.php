<?php

/**
 * @package	eshoppingstore
 * @author	Muzzammil Alam
 * @copyright	Copyright (c) 2016 - 2018, eshoppingstore
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @book Controller
 * Class for Books
 * Model books_model.php
 * date-start: 18-MAY-2016
 */
Class Books extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper(array('url', 'form'));
        $this->load->library(array('form_validation', 'session'));
        $this->load->model('Login_model');
        $this->load->model('Books_model');
        $this->load->model('Categories_model');
        if ($this->Login_model->loggedIn() == false) {
            redirect('admin/Login');
        }
    }

    public function index() {
//        $data['content'] = 'admin/books/view_books';
//        $this->load->view('admin/books/categories_master', $data);
    }

    /*     * *************************CATEGORY SECTION********************************* */

    public function add_book_form() {
        $data['categories'] = $this->Categories_model->get_all_categories('es_categories',['status'=>1, 'category_type'=>3]);
        $data['content'] = 'admin/books/add_book';
        $this->load->view('admin/admin_master', $data);
    }

    public function insert_book() {
//        if ($this->form_validation->run('insert_book') == FALSE) {
//             $data['categories'] = $this->Categories_model->get_all_categories('es_categories',['status!='=>3]);
//            $data['content'] = 'admin/books/add_book';
//            $this->load->view('admin/admin_master', $data);
//        } else {
            $data = array('name' => $this->input->post('bookname'),
                'id_sub_categories'=>$this->input->post('sub_category'),
                'id_categories'=>  base64_decode($this->input->post('category')),
                'show_book' => $this->input->post('show'),
            );
            
           // print_r($_FILES);die;
            $this->Books_model->transaction_start();
            $book_data = $this->Books_model->insert($data, 'books');
            $icon_name = 'book';
            $icon_folder = 'books/books_pdf';
            $file_name = $book_data['inserted_id'];
            $this->insert_image('', '', 'pdf', $icon_name, $icon_folder, $file_name, 'pdf', 'book_form');
            $field_name = 'book_image';
            $folder_name = 'books/books_images';
            
            $this->insert_image('', '', 'gif|jpg|png', $field_name, $folder_name, $file_name, 'book_image', 'book_form');
          // }
    }

    private function insert_image($max_height, $max_width, $allowed_types, $field_name, $folder_name, $file_name, $column, $view) {
        $uploaded_file_data = $this->do_upload($max_height, $max_width, $allowed_types, $field_name, $folder_name, $file_name);
        if (isset($uploaded_file_data['error'])) {
            $this->session->set_flashdata('image_error', $uploaded_file_data['error']);
            redirect(base_url() . 'admin/Books/' . $view);
        } else {
            $image_name = $uploaded_file_data['upload_data']['file_name'];
            $this->Books_model->update_image($image_name, $column, $file_name);
            $this->trans_comp($column);
        }
    }
    
    private function insert_image_edit($max_height, $max_width, $allowed_types, $field_name, $folder_name, $file_name, $column, $view) {
        $uploaded_file_data = $this->do_upload($max_height, $max_width, $allowed_types, $field_name, $folder_name, $file_name);
        if (isset($uploaded_file_data['error'])) {
            $this->session->set_flashdata('image_error', $uploaded_file_data['error']);
            redirect(base_url() . 'admin/Books/' . $view);
        } else {
            $image_name = $uploaded_file_data['upload_data']['file_name'];
            $this->Books_model->update_image($image_name, $column, $file_name);
            $this->trans_comp_edit($column);
        }
    }

    private function trans_comp($column) {
        if ($column == 'book_image') {
            $this->Books_model->transaction_complete();
            $this->session->set_flashdata('success', "Added Successfully");
            redirect(base_url() . 'admin/Books/add_book_form');
        } else {
            //die('hello');
            return TRUE;
        }
    }
    
    private function trans_comp_edit($column) {
        if ($column == 'book_image') {
//            $this->Books_model->transaction_complete();
//            $this->session->set_flashdata('success', "Added Successfully");
//           redirect(base_url() . 'admin/Books/book_form');
            return TRUE;
        } else {
            //die('hello');
            return TRUE;
        }
    }

    public function view_books() {
        $data['books'] = $this->Books_model->get_all_books('books',['status!='=>3]);
        $data['content'] = 'admin/books/view_books';
        $this->load->view('admin/admin_master', $data);
    }

    public function change_status($status = '', $cid = '') {
        if (base64_decode($status) == 'es_1') {
            $set = array('status' => 0,'updated'=>date('Y-m-d H:i:s'));
            $this->Books_model->update_book_status($set, base64_decode($cid), 'id_books', 'books');
            $this->session->set_flashdata('success', 'Updated Successfully');
            redirect('admin/Books/view_books');
        } elseif (base64_decode($status) == 'es_0') {
            $set = array('status' => 1,'updated'=>date('Y-m-d H:i:s'));
            $this->Books_model->update_book_status($set, base64_decode($cid), 'id_books', 'books');
            $this->session->set_flashdata('success', 'Updated Successfully');
            redirect('admin/Books/view_books');
        } else {
            // $data['fail'] = 'Wrong Value';
            $this->session->set_flashdata('fail', 'Wrong Value');
            redirect('admin/Books/view_books');
        }
    }
    
    function delete_book($cid) {
            $set = array('status' => 3,'updated'=>date('Y-m-d H:i:s'));
            $this->Books_model->update_book_status($set, base64_decode($cid), 'id_books', 'books');
            $this->session->set_flashdata('success', 'Deleted Successfully');
            redirect('admin/Books/view_books');
    }
     
    public function edit_book($id = '') {
        $book_id = base64_decode($id);
        $this->input_validate($book_id);
        $data['categories'] = $this->Categories_model->get_all_categories('es_categories',['status'=>1,'category_type'=>3]);
        $data['Book'] = $this->Books_model->get_book_byid($book_id, 'id_books', 'books');
        foreach ($data['Book'] as $p) {
            $data['sub_categories'] = $this->Categories_model->get_all_categories('es_sub_categories',array('id_category'=>$p->id_categories,'status'=>1));
        
            break;
        }
        $data['content'] = 'admin/books/edit_book';
        $this->load->view('admin/categories/categories_master', $data);
    }

    public function update_book() {
        $id = base64_decode($this->input->post('id'));
        $this->input_validate($id);
//        if ($this->form_validation->run('edit_book') == FALSE) {
//             $data['categories'] = $this->Categories_model->get_all_categories('es_categories',['status!='=>3]);
//            $data['Book'] = $this->Books_model->get_book_byid($id, 'id_books', 'books');
//            $data['content'] = 'admin/books/edit_book';
//            $this->load->view('admin/admin_master', $data);
//        } else {
            $data = array('name' => $this->input->post('bookname'),
                'updated'=>date('Y-m-d H:i:s'),
                'id_sub_categories'=>$this->input->post('sub_category'),
                'id_categories'=>  base64_decode($this->input->post('category')),
                'show_book' => $this->input->post('show')
            );
            //$this->Books_model->transaction_start();
            $this->Books_model->update($data, array('id_books' => $id), 'books');
            $this->check_files($id);
            $this->session->set_flashdata('success', 'Updated Successfully');
            redirect(base_url() . 'admin/Books/edit_book/' . rtrim(base64_encode($id), '='));
        //}
    }

    public function check_files($id) {
        if ($_FILES['book']['name'] != '') {
            $icon_name = 'book';
            $icon_folder = 'books/books_pdf';
            $file_name = $id;
            $this->insert_image_edit('', '', 'pdf', $icon_name, $icon_folder, $file_name, 'pdf', 'book_form');
        }
        if ($_FILES['book_image']['name'] != '') {
            $file_name = $id;
            $field_name = 'book_image';
            $folder_name = 'books/books_images';
            $this->insert_image_edit('', '', 'gif|jpg|png', $field_name, $folder_name, $file_name, 'book_image', 'edit_book/' . rtrim(base64_encode($id), '='));
        }
       
    }
    
    public function show_pdf($pdf_name) {
        $filename = base_url('uploads/books/books_pdf/'.$pdf_name);
        header('Content-type: application/pdf');
        header('Content-Disposition: inline; filename="'. $filename.'"');
        header('Content-Transfer-Encoding: binary');
        header('Accept-Ranges:bytes');
        @readfile($filename);
    }
    
    public function get_sub_categories($id) {
        $category_id = base64_decode($id);
        // echo $id;die;
        $this->input_validate($category_id);
        $data = $this->Books_model->get_sub_category($category_id);
        echo json_encode($data);
    }
   
}

//End of file admin/Books.php