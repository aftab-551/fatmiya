<?php 
defined('BASEPATH') or exit ('No direct script access allowed');


class Events extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper(array('form'));
        $this->load->library(array('form_validation'));
        $this->load->model(array('events_model','login_model'));
        if ($this->login_model->loggedIn() == false) {
            redirect('admin/Login');
        }
    }

    public function add_event_form() {
        $data['content'] = 'admin/events/add_event';
        $this->load->view('admin/admin_master', $data);
    }

    public function add_event() {
        if($this->input->post()){
            if($this->_validate() === true){
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
                    'image' => '',
                );

                $this->events_model->transaction_start();
                $event_data = $this->events_model->insert($data, 'events');
                $field_name = 'event_thumbnail';
                $folder_name = 'event_images';
                // $destination_folder = 'uploads/events_images/events_resized';
                $file_name = $event_data['inserted_id'];
                $this->insert_image('', '', 'gif|jpg|png', $field_name, $folder_name, $file_name, 'image', 'add_event');
            }
            else{
                $data['content'] = 'admin/events/add_event';
                $this->load->view('admin/admin_master', $data);
            }
        }
        else{
            $data['content'] = 'admin/events/add_event';
            $this->load->view('admin/admin_master', $data);
        }
    }

    private function insert_image($max_height, $max_width, $allowed_types, $field_name, $folder_name, $file_name, $column, $view) {
        $uploaded_file_data = $this->do_upload($max_height, $max_width, $allowed_types, $field_name, $folder_name, $file_name);

        if (isset($uploaded_file_data['error'])) {
            $data['image_error'] = $uploaded_file_data['error'];
            $data['content'] = 'admin/events/add_event';
            $this->load->view('admin/admin_master', $data);
            // $this->session->set_flashdata('image_error', $uploaded_file_data['error']);
            // redirect(base_url() . 'admin/Events/' . $view);
        } else {
            $image_name = $uploaded_file_data['upload_data']['file_name'];
            // $this->resize_image($folder_name, $image_name, $destination_folder, '450', '666');
            $this->events_model->update_image($image_name, $column, $file_name);
            $this->trans_comp($column);
        }
    }
    
    private function trans_comp($column) {
        if ($column == 'image') {
            $this->events_model->transaction_complete();
            $data['success'] = "Added Successfully";
            $data['content'] = 'admin/events/add_event';
            $this->load->view('admin/admin_master', $data);
        } else {
            return TRUE;
        }
    }

    public function view_events() {
        $data['content'] = 'admin/events/view_events';
        $condition = array('status!='=> 3);
        $data['events'] = $this->events_model->select($condition,'','events');

        $this->load->view('admin/admin_master', $data);
    }

    public function edit_event($id)
    {
        $data['content'] = 'admin/events/edit_event';
        
        $data['e'] = $this->events_model->select_row(base64_decode($id),'id','events');

        $this->load->view('admin/admin_master', $data);
    }

    public function update_event($id) {
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
        $uploaded_file_data = $this->do_upload($max_height, $max_width, $allowed_types, $field_name, $folder_name, $file_name);
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
            $this->events_model->update_event_status($set, base64_decode($id), 'id', 'events');
            $this->session->set_flashdata('success', 'Disabled Successfully');
            redirect('admin/Events/view_events');
        } elseif (base64_decode($status) == '0') {
            $set = array('status' => 1,'updated_at'=>date('Y-m-d H:i:s'));
            $this->events_model->update_event_status($set, base64_decode($id), 'id', 'events');
            $this->session->set_flashdata('success', 'Enabled Successfully');
            redirect('admin/Events/view_events');
        } else {
            // $data['fail'] = 'Wrong Value';
            $this->session->set_flashdata('fail', 'Wrong Value');
            redirect('admin/Events/view_events');
        }
    }
    
    function delete_event($id) {
            $set = array('status' => 3,'updated_at'=>date('Y-m-d H:i:s'));
            $this->events_model->update_event_status($set, base64_decode($id), 'id', 'events');
            $this->session->set_flashdata('success', 'Deleted Successfully');
            redirect('admin/Events/view_events');
    }
    
    private function _validate() {
        $this->form_validation->set_rules('title', 'Title', 'trim|required|regex_match[/^[a-zA-Z- ]*$/]|min_length[4]|max_length[75]');
        $this->form_validation->set_rules('description', 'Description', 'trim|required|min_length[10]|max_length[150]');
        $this->form_validation->set_rules('long_description', 'Description', 'trim|required|min_length[10]|max_length[300]');
        $this->form_validation->set_rules('start_date', 'Start Date', 'trim|required');
        $this->form_validation->set_rules('end_date', 'End Date', 'trim');
        $this->form_validation->set_rules('start_time', 'Start Time', 'trim|required');
        $this->form_validation->set_rules('end_time', 'End Time', 'trim|required');
        $this->form_validation->set_rules('venue', 'Venue', 'trim|required|regex_match[/^[a-zA-Z0-9-_\/,. ]*$/]|min_length[4]|max_length[100]');
        $this->form_validation->set_rules('maps_embed_link', 'Maps Embed Link', 'trim|required|valid_url');

        if($this->form_validation->run() == TRUE) {
            return true;
        }
        else {
            return false;
        }
    }

}


?>