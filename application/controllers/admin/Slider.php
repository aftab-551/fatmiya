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
 * Class for Slider Dashboard
 * Model Slider_model.php
 * date: 7-MAY-2016
 */
Class Slider extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper(array('url', 'form'));
        $this->load->library(array('form_validation', 'session'));
        $this->load->model('Login_model');
        $this->load->model('Slider_model');
        $this->load->model('Categories_model');
        if ($this->Login_model->loggedIn() == false) {
            redirect('Slider/Login');
        }
    }

    public function index() {
        $data['sliders'] = $this->Slider_model->get_all_sliders('es_slider');
        $data['content'] = 'admin/cms/view_slider';
        $this->load->view('admin/admin_master', $data);
    }

    public function add_slider() {
        $event = $this->Slider_model->select(['status='=>1],"",'events');
        $data['events'] = $event;
        $data['content'] = 'admin/cms/add_slider';
        $this->load->view('admin/admin_master', $data);
    }

    public function insert_slider() {
        if($this->input->post()){
            if($this->_validate() === true){
                $data = array( 
                    'event_id' => $this->input->post('events'),
                    'image' => '',
                    'link' => $this->input->post('link'),
                    'title' => $this->input->post('slider_title'),
                    'description' => $this->input->post('description'),
                    'button_title' => $this->input->post('btn_title'),
                    'button_link' => $this->input->post('btn_link'),
                    'sortField' => $this->input->post('sortField')
                );

                $this->Slider_model->transaction_start();
                $slider_data = $this->Slider_model->insert($data, 'es_slider');

                $description_length = strlen($this->input->post('description'));
                $remaining_characters = 645 - $description_length;

                if ($description_length < 646) {
                    $dummy_description = '';
                    for ($i = 0; $i < $remaining_characters; $i++){
                        if($i % 2 == 0) {
                            $dummy_description .= ' ';
                        }
                        else {
                            $dummy_description .= '_';
                            
                        }
                    }
                    $this->Slider_model->update(['dummy_description'=>$dummy_description], ['id_slider'=>$slider_data['inserted_id']], 'es_slider');
                }

                $field_name = 'slider_image';
                $folder_name = 'slider_images';
                $destination_folder = 'slider_images/slider_resized';
                $file_name = $slider_data['inserted_id'];
                $this->insert_image('', '', 'gif|jpg|png', $field_name, $folder_name, $file_name, 'image', 'add_slider',$destination_folder);
            }
            else{
                $event = $this->Slider_model->select(['status='=>1],"",'events');
                $data['events'] = $event;
                $data['content'] = 'admin/cms/add_slider';
                $data['event_id'] = $this->input->post('events');
                $this->load->view('admin/admin_master', $data);
            }
        }
        else{
            $event = $this->Slider_model->select(['status='=>1],"",'events');
            $data['events'] = $event;
            $data['content'] = 'admin/cms/add_slider';
            $this->load->view('admin/admin_master', $data);
        }
    }

    private function insert_image($max_height, $max_width, $allowed_types, $field_name, $folder_name, $file_name, $column, $view,$destination_folder) {
        $uploaded_file_data = $this->do_upload($max_height, $max_width, $allowed_types, $field_name, $folder_name, $file_name);

        if (isset($uploaded_file_data['error'])) {
            $event = $this->Slider_model->select(['status'=>1],"",'events');
            $data['events'] = $event;
            $data['content'] = 'admin/cms/add_slider';
            $data['image_error'] = $uploaded_file_data['error'];
            $data['event_id'] = $this->post->input('events');
            $this->load->view('admin/admin_master', $data);
        } else {
            $image_name = $uploaded_file_data['upload_data']['file_name'];
            $this->resize_image($folder_name, $image_name, $destination_folder, '450', '666');
            $this->Slider_model->update_image($image_name, $column, $file_name);
            $this->trans_comp($column);
        }
    }

    private function trans_comp($column) {
        if ($column == 'image') {
            $this->Slider_model->transaction_complete();
            $event = $this->Slider_model->select(['status='=>1],"",'events');
            $data['events'] = $event;
            $data['success'] = "Added Successfully";
            $data['content'] = 'admin/cms/add_slider';
            $data['event_id'] = $this->input->post('events');
            $this->load->view('admin/admin_master', $data);
        } else {
            return TRUE;
        }
    }

    public function edit_slider($id)
    {
        $data['content'] = 'admin/cms/edit_slider';
        $data['events'] = $this->Slider_model->select(['status='=>1],"",'events');
        $data['s'] = $this->Slider_model->select_row(base64_decode($id),'id_slider','es_slider');
        $this->load->view('admin/admin_master', $data);
    }

    public function update_slider($id) {
        $id = base64_decode($id);
        $this->input_validate($id);
        if($this->_validate() === true) {
            $data = array( 
                'event_id' => $this->input->post('events'),
                'link' => $this->input->post('link'),
                'title' => $this->input->post('slider_title'),
                'description' => $this->input->post('description'),
                'button_title' => $this->input->post('btn_title'),
                'button_link' => $this->input->post('btn_link'),
                'sortField' => $this->input->post('sortField')
            );

            $description_length = strlen($this->input->post('description'));
            // echo $description_length . "</br>" . $remaining_characters;
            // die();

            if($this->input->post('description') != ''){
                $remaining_characters = 625 - $description_length;
                if ($description_length < 626) {
                    $char = '';
                    for ($i = 0; $i < $remaining_characters; $i++){
                        if ($i % 2 == 0) {
                            $char .= ' ';
                        } else {
                            $char .= '_';
                        }
                        
                    }
                    $this->Slider_model->update(['dummy_description'=>$char], ['id_slider'=>$id], 'es_slider');
                }
            }
            else {
                $remaining_characters = 646;
                $char = '';
                for ($i = 0; $i < $remaining_characters; $i++){
                    if ($i % 2 == 0) {
                        $char .= ' ';
                    } else {
                        $char .= '_';
                    }
                    
                }
                $this->Slider_model->update(['dummy_description'=>$char], ['id_slider'=>$id], 'es_slider');
            }


            $this->Slider_model->update($data, array('id_slider' => $id), 'es_slider');
            $this->check_files($id, $this->input->post('events'));
        }
        else {
            $data['content'] = 'admin/cms/edit_slider';
            $data['events'] = $this->Slider_model->select(['status='=>1],"",'events');
            $data['event_id'] = $this->input->post('events');
            $data['s'] = $this->Slider_model->select_row($id,'id_slider','es_slider');
            $this->load->view('admin/admin_master', $data);
        }
    }

    
    public function check_files($id, $event_id) {
        if ($_FILES['slider_image']['name'] != '') {
            $file_name = $id;
            $field_name = 'slider_image';
            $folder_name = 'slider_images';
            $this->insert_image_edit('', '', 'gif|jpg|png', $field_name, $folder_name, $file_name, 'image', 'edit_slider', $id, $event_id);
        }
        else {
            $this->session->set_flashdata('success', 'Updated Successfully');
            redirect(base_url() . 'admin/Slider');
        }
    }

    private function insert_image_edit($max_height, $max_width, $allowed_types, $field_name, $folder_name, $file_name, $column, $view, $id, $event_id) {
        $uploaded_file_data = $this->do_upload($max_height, $max_width, $allowed_types, $field_name, $folder_name, $file_name);
        if (isset($uploaded_file_data['error'])) {
            $data['content'] = 'admin/cms/'.$view;
            $data['events'] = $this->Slider_model->select(['status='=>1],"",'events');
            $data['e_id'] = $event_id;
            $data['s'] = $this->Slider_model->select_row($id,'id_slider','es_slider');
            $data['image_error'] = $uploaded_file_data['error'];
            $this->load->view('admin/admin_master', $data);
        } else {
            $image_name = $uploaded_file_data['upload_data']['file_name'];
            $sd = $this->Slider_model->update_image($image_name, $column, $file_name);
            $this->trans_comp_edit($column);
        }
    }

    private function trans_comp_edit($column) {
        if ($column == 'image') {
            $this->session->set_flashdata('success', 'Updated Successfully');
            redirect(base_url() . 'admin/Slider');
        } else {
            //die('hello');
            return TRUE;
        }
    }

     /*     * *************************SLIDER STATUS ACTIONS ********************************* */
    /* Methods to change status of slider 1->active and 0->inactive */

    public function change_status($status = '', $cid = '') {
        if (base64_decode($status) == 'es_1') {
            $set = array('status' => 0);
            $this->Categories_model->update_category_status($set, base64_decode($cid), 'id_slider', 'es_slider');
            $this->session->set_flashdata('success', 'Updated Successfully');
            redirect(base_url() . 'admin/Slider');
        } elseif (base64_decode($status) == 'es_0') {
            $set = array('status' => 1);
            $this->Categories_model->update_category_status($set, base64_decode($cid), 'id_slider', 'es_slider');
            $this->session->set_flashdata('success', 'Updated Successfully');
            redirect(base_url() . 'admin/Slider');
        } else {
            // $data['fail'] = 'Wrong Value';
            $this->session->set_flashdata('fail', 'Wrong Value');
            redirect(base_url() . 'admin/Slider');
        }
    }
    /*DELETE slider*/
    public function delete_slider($id = '') {
        $slider_id = base64_decode($id);
        $this->Slider_model->delete('id_slider',$slider_id,'es_slider');
        $this->session->set_flashdata('success', 'Deleted Successfully');
        redirect(base_url() . 'admin/Slider');
    }

    /************* RIGHT IMAGE ****************/

    public function right_images() {
        $data['right_images'] = $this->Slider_model->get_all_right_images('es_slider');
        $data['content'] = 'admin/cms/view_right_image';
        $this->load->view('admin/admin_master', $data);
    }


    public function add_right_image() {
        $data['content'] = 'admin/cms/add_right_image';
        $this->load->view('admin/admin_master', $data);
    }

    public function insert_right_image() {

            $data = $this->get_right_image_form_data();
            $this->Slider_model->transaction_start();
            $right_image_data = $this->Slider_model->insert($data, 'es_slider');
            $field_name = 'right_image_image';
            $folder_name = 'right_image_images';
            $destination_folder = 'right_image_images/right_image_resized';
            $file_name = $right_image_data['inserted_id'];
            $this->insert_right_image_image('', '', 'gif|jpg|png', $field_name, $folder_name, $file_name, 'image', 'add_right_image',$destination_folder);
        
    }

    private function insert_right_image_image($max_height, $max_width, $allowed_types, $field_name, $folder_name, $file_name, $column, $view,$destination_folder) {
        $uploaded_file_data = $this->do_upload($max_height, $max_width, $allowed_types, $field_name, $folder_name, $file_name);

        if (isset($uploaded_file_data['error'])) {
            $this->session->set_flashdata('image_error', $uploaded_file_data['error']);
            redirect(base_url() . 'admin/Slider/' . $view);
        } else {
            $image_name = $uploaded_file_data['upload_data']['file_name'];
            $this->resize_image($folder_name, $image_name, $destination_folder, '450', '234');
            $this->Slider_model->update_image($image_name, $column, $file_name);
            $this->trans_comp_image($column);
        }
    }

    private function trans_comp_image($column) {
        if ($column == 'image') {
            $this->Slider_model->transaction_complete();
            $data['success'] = "Added Successfully";
            $data['content'] = 'admin/cms/add_right_image';
            $this->load->view('admin/admin_master', $data);
        } else {
            return TRUE;
        }
    }

    private function get_right_image_form_data(){
        $data = array( 'type' => '2',// right image
                        'link'=>$this->input->post('link'));
        return $data;
    }
    /*     * *************************SLIDER STATUS ACTIONS ********************************* */
    /* Methods to change status of slider 1->active and 0->inactive */

    public function change_right_image_status($status = '', $cid = '') {
        if (base64_decode($status) == 'es_1') {
            $set = array('status' => 0);
            $this->Categories_model->update_category_status($set, base64_decode($cid), 'id_slider', 'es_slider');
            $this->session->set_flashdata('success', 'Updated Successfully');
            redirect(base_url() . 'admin/Slider/right_images');
        } elseif (base64_decode($status) == 'es_0') {
            $set = array('status' => 1);
            $this->Categories_model->update_category_status($set, base64_decode($cid), 'id_slider', 'es_slider');
            $this->session->set_flashdata('success', 'Updated Successfully');
            redirect(base_url() . 'admin/Slider/right_images');
        } else {
            // $data['fail'] = 'Wrong Value';
            $this->session->set_flashdata('fail', 'Wrong Value');
            redirect(base_url() . 'admin/Slider/right_images');
        }
    }
    /*DELETE slider*/
    public function delete_right_image($id = '') {
        $slider_id = base64_decode($id);
        $this->Slider_model->delete('id_slider',$slider_id,'es_slider');
        $this->session->set_flashdata('success', 'Deleted Successfully');
        redirect(base_url() . 'admin/Slider/right_images');
    }
    
    private function _validate(){
        $this->form_validation->set_rules('slider_title', 'Title', 'trim|regex_match[/^[a-zA-Z- ]*$/]|min_length[4]|max_length[39]');
        $this->form_validation->set_rules('description', 'Description', 'trim|min_length[15]|max_length[645]');
        $this->form_validation->set_rules('events', 'Event', 'trim');
        $this->form_validation->set_rules('btn_title', 'Button Title', 'trim|regex_match[/^[a-zA-Z- ]*$/]|min_length[4]|max_length[30]');
        $this->form_validation->set_rules('btn_link', 'Button Link', 'trim|valid_url');
        $this->form_validation->set_rules('link', 'Link', 'trim|required|alpha_numeric_spaces');
        $this->form_validation->set_rules('sortField', 'Priority', 'trim|required|regex_match[/^[0-9]*$/]|min_length[1]|max_length[2]');

        if($this->form_validation->run() == TRUE) {
            return true;
        }
        else {
            return false;
        }
    }

}

//End of file Slider.php