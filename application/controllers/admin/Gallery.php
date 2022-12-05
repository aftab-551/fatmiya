<?php 
defined('BASEPATH') or exit ('No direct script access allowed');


class Gallery extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper(array('form'));
        $this->load->library(array('form_validation'));
        $this->load->model(array('gallery_model','login_model'));
        if ($this->login_model->loggedIn() == false) {
            redirect('admin/Login');
        }
    }

    public function add_gallery_images_form() {
        $data['content'] = 'admin/cms/add_gallery_images';
        $this->load->view('admin/admin_master', $data);
    }

    public function add_gallery_images() {
        $file_names = array();

        $data = array(
            'image' => '',
        );
        $count = count($_FILES['gallery_images']['name']);
        $this->gallery_model->transaction_start();
        
        for($i = 0; $i < $count; $i++){
            if(!empty($_FILES['gallery_images']['name'][$i])){
                $_FILES['file']['name'] = $_FILES['gallery_images']['name'][$i];
                $_FILES['file']['type'] = $_FILES['gallery_images']['type'][$i];
                $_FILES['file']['tmp_name'] = $_FILES['gallery_images']['tmp_name'][$i];
                $_FILES['file']['error'] = $_FILES['gallery_images']['error'][$i];
                $_FILES['file']['size'] = $_FILES['gallery_images']['size'][$i];

                $gallery_data = $this->gallery_model->insert($data, 'gallery');
                $field_name = 'file';
                $folder_name = 'gallery_images';
                $destination_folder = 'gallery_images/images_thumbnails';
                $file_name = $gallery_data['inserted_id'];
                $file_names[] = $file_name;

                if($i == $count - 1){
                    $this->insert_image('', '', 'gif|jpg|png', $field_name, $folder_name, $file_name, 'image', 'add_gallery_images_form', 'completed', $file_names, $destination_folder);
                }
                else {
                    $this->insert_image('', '', 'gif|jpg|png', $field_name, $folder_name, $file_name, 'image', 'add_gallery_images_form', 'not_completed', $file_names, $destination_folder);
                }
            }
        }
    } 

    private function insert_image($max_height, $max_width, $allowed_types, $field_name, $folder_name, $file_name, $column, $view, $status, $file_names, $destination_folder) {
        $uploaded_file_data = $this->do_upload($max_height, $max_width, $allowed_types, $field_name, $folder_name, $file_name, 'gallery');
        if (isset($uploaded_file_data['error'])) {
            $path = $_SERVER['DOCUMENT_ROOT'].'/Fatimiya/uploads/gallery_images/';
            $thumbnail_path = $_SERVER['DOCUMENT_ROOT'].'/Fatimiya/uploads/gallery_images/images_thumbnails/';
            $files = glob($path.'*'); // get all file names
            $thumb_files = glob($thumbnail_path.'*');
            
            foreach($files as $file){ // iterate files
                if(is_file($file)){
                    foreach($file_names as $fn){
                        $arr = explode('/',$file);
                        $name_of_file = explode('.',$arr[6]);
                        if ($fn == $name_of_file[0]){
                            unlink($file); // delete file
                            //echo $file.'file deleted';
                        }
                    }
                }
            }

            foreach($thumb_files as $thumb_file){ // iterate files
                if(is_file($thumb_file)){
                    foreach($file_names as $fn){
                        $arr = explode('/',$thumb_file);
                        $name_of_file = explode('.',$arr[7]);
                        if ($fn == $name_of_file[0]){
                            unlink($thumb_file); // delete file
                            //echo $file.'file deleted';
                        }
                    }
                }
            }

            $this->session->set_flashdata('image_error', $uploaded_file_data['error']);
            redirect(base_url() . 'admin/Gallery/' . $view);
        } else {
            $image_name = $uploaded_file_data['upload_data']['file_name'];
            $this->resize_image($folder_name, $image_name, $destination_folder, '100', '150');
            $this->gallery_model->update_image($image_name, $column, $file_name);
            $this->trans_comp($column, $status, $file_names);
        }
    }
    
    private function trans_comp($column, $status, $file_names) {
        if ($column == 'image' && $status == 'completed') {
            $this->gallery_model->transaction_complete();
            $data['success'] = "Successfully uploaded ".count($file_names)." files";
            $data['content'] = 'admin/cms/add_gallery_images';
            $this->load->view('admin/admin_master', $data);
        } else {
            return TRUE;
        }
    }

    public function view_gallery_images() {
        $data['content'] = 'admin/cms/view_gallery_images';
        $condition = array('status!='=> 3);
        $data['gallery_images'] = $this->gallery_model->select($condition,'','gallery');
        $this->load->view('admin/admin_master', $data);
    }

    public function edit_gallery_image($id)
    {
        $data['content'] = 'admin/cms/edit_gallery_image';
        $data['gallery_image'] = $this->gallery_model->select_row(base64_decode($id),'id','gallery');
        $this->load->view('admin/admin_master', $data);
    }

    public function update_gallery_image($id) {
        $id = base64_decode($id);
        $this->input_validate($id);
        if($this->_validate() == true) {
            $name = $this->input->post('title');
            $desc = $this->input->post('description');
            $dd = $this->input->post('long_description');
            $start_date = $this->input->post('start_date');
            if($this->input->post('end_date') == ''){
                $end_date = $start_date;
            }
            else {
                $end_date = $this->input->post('end_date');
            }
            $start_time = $this->input->post('start_time');
            $end_time = $this->input->post('end_time');
            $venue = $this->input->post('venue');
            $maps_embed_link = $this->input->post('maps_embed_link');
            
            $data = array( 
                'title' => $name,
                'description' => $desc,
                'long_description' => $dd,
                'start_date' => $start_date,
                'start_time' => $start_time,
                'end_date' => $end_date,
                'end_time' => $end_time,
                'venue' => $venue,
                'maps_embed_link' => $maps_embed_link,
                'updated_at'=> date('Y-m-d H:i:s')
            );

            $this->events_model->update($data, array('id' => $id), 'events');
            $this->check_files($id);
        }
        else {
            $data['content'] = 'admin/events/edit_event';
            $data['e'] = $this->events_model->select_row($id,'id','events');
            $this->load->view('admin/admin_master', $data);
        }
    }

    public function check_files($id) {
        if ($_FILES['event_thumbnail']['name'] != '') {
            $file_name = $id;
            $field_name = 'event_thumbnail';
            $folder_name = 'event_images';
            $this->insert_image_edit('', '', 'gif|jpg|png', $field_name, $folder_name, $file_name, 'image', 'edit_event', $id);
        }
        else {
            $this->session->set_flashdata('success', 'Updated Successfully');
            redirect(base_url() . 'admin/Events/view_events');
        }
    }

    private function insert_image_edit($max_height, $max_width, $allowed_types, $field_name, $folder_name, $file_name, $column, $view, $id) {
        $uploaded_file_data = $this->do_upload($max_height, $max_width, $allowed_types, $field_name, $folder_name, $file_name, 'gallery');
        if (isset($uploaded_file_data['error'])) {
            $data['content'] = 'admin/events/'.$view;
            $data['e'] = $this->events_model->select_row($id,'id','events');
            $data['image_error'] = $uploaded_file_data['error'];
            $this->load->view('admin/admin_master', $data);
        } else {
            $image_name = $uploaded_file_data['upload_data']['file_name'];
            $sd = $this->events_model->update_image($image_name, $column, $file_name);
            $this->trans_comp_edit($column);
        }
    }

    private function trans_comp_edit($column) {
        if ($column == 'image') {
            $this->session->set_flashdata('success', 'Updated Successfully');
            redirect(base_url() . 'admin/Events/view_events');
        } else {
            //die('hello');
            return TRUE;
        }
    }

    public function change_status($status = '', $id = '') {
        if (base64_decode($status) == '1') {
            $set = array('status' => 0,'updated_at'=>date('Y-m-d H:i:s'));
            $this->gallery_model->update_gallery_status($set, base64_decode($id), 'id', 'gallery');
            $this->session->set_flashdata('success', 'Disabled Successfully');
            redirect('admin/Gallery/view_gallery_images');
        } elseif (base64_decode($status) == '0') {
            $set = array('status' => 1,'updated_at'=>date('Y-m-d H:i:s'));
            $this->gallery_model->update_gallery_status($set, base64_decode($id), 'id', 'gallery');
            $this->session->set_flashdata('success', 'Enabled Successfully');
            redirect('admin/Gallery/view_gallery_images');
        } else {
            $this->session->set_flashdata('fail', 'Wrong Value');
            redirect('admin/Gallery/view_gallery_images');
        }
    }
    
    function delete_image($id) {
        $set = array('status' => 3,'updated_at'=>date('Y-m-d H:i:s'));
        $this->gallery_model->update_gallery_status($set, base64_decode($id), 'id', 'gallery');
        $this->session->set_flashdata('success', 'Deleted Successfully');
        redirect('admin/Gallery/view_gallery_images');
    }

}


?>