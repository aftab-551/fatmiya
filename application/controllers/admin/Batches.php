<?php 
defined('BASEPATH') or exit ('No direct script access allowed');


class Batches extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper(array('form'));
        $this->load->library(array('form_validation'));
        $this->load->model(array('batches_model','login_model'));
        if ($this->login_model->loggedIn() == false) {
            redirect('admin/Login');
        }
    }

    public function add_batch_form() {
        $data['content'] = 'admin/batch/add_batch';
        $this->load->view('admin/admin_master', $data);
    }

    public function add_batch() {
        if($this->input->post()){
            if($this->_validate() === true){
                $batch = $this->input->post('batch_detail');
                $body = $this->input->post('body');

                $data = array(
                    "number" => $batch,
                    'detail' => $body
                );

                // $this->security->xss_clean($data);

                $this->batches_model->insert($data,'batches');

                $this->session->set_flashdata('success', 'Batch Added Succesfully');
                redirect(base_url('admin/Batches/add_batch_form'));
            }
            else{
                $data['content'] = 'admin/batch/add_batch';
                $this->load->view('admin/admin_master', $data);
            }
        }
        else{
            $data['content'] = 'admin/batch/add_batch';
            $this->load->view('admin/admin_master', $data);
        }
    }

    public function view_batches() {
        $data['content'] = 'admin/batch/view_batches';

        $data['batches'] = $this->batches_model->select('','','batches');

        $this->load->view('admin/admin_master', $data);
    }

    public function edit_batch($id)
    {
        $data['content'] = 'admin/batch/edit_batch';
        
        $data['batch'] = $this->batches_model->select_row(base64_decode($id),'id','batches');

        $this->load->view('admin/admin_master', $data);
    }

    public function update_batch($id)
    {
        $id = base64_decode($id);

        if($this->_validate() === true) {
            $data = array(
                'number' => $this->input->post('batch_detail'),
                'updated_at'=>date('Y-m-d H:i:s')
            );

            $this->security->xss_clean($data);

            $this->batches_model->update($data, "id = $id", 'batches');
            $this->session->set_flashdata('success','Batch Updated Successfully');

            redirect(base_url('admin/Batches/edit_batch/'.rtrim(base64_encode($id),'=')));
        }
        else{
            $batch = $this->batches_model->select_row($id, 'id', 'batches');

            $data = array(
                'content' => 'admin/batches/edit_batch',
                'batch' => $batch,
            );

            $this->load->view('admin/admin_master', $data);
        }
    }

    public function change_status($status = '', $id = '') {
        if (base64_decode($status) == '1') {
            $set = array('status' => 0,'updated_at'=>date('Y-m-d H:i:s'));
            $this->batches_model->update_batch_status($set, base64_decode($id), 'id', 'batches');

            $set = array('status' => 0, 'updated_at'=>date('Y-m-d H:i:s'));
            $this->batches_model->update_batch_status($set, base64_decode($id), 'batch_id', 'teacher_course_assignment');

            $this->session->set_flashdata('success', 'Updated Successfully');
            redirect('admin/Batches/view_batches');
        } elseif (base64_decode($status) == '0') {
            $set = array('status' => 1,'updated_at'=>date('Y-m-d H:i:s'));
            $this->batches_model->update_batch_status($set, base64_decode($id), 'id', 'batches');

            $set = array('status' => 1, 'updated_at'=>date('Y-m-d H:i:s'));
            $this->batches_model->update_batch_status($set, base64_decode($id), 'batch_id', 'teacher_course_assignment');

            $this->session->set_flashdata('success', 'Updated Successfully');
            redirect('admin/Batches/view_batches');
        } else {
            // $data['fail'] = 'Wrong Value';
            $this->session->set_flashdata('fail', 'Wrong Value');
            redirect('admin/Batches/view_batch');
        }
    }

    private function _validate() {
        $this->form_validation->set_rules('batch_detail', 'Batch Detail', 'trim|required|regex_match[/^[a-zA-Z0-9- ]*$/]|min_length[4]|max_length[25]');

        if($this->form_validation->run() == TRUE) {
            return true;
        }
        else {
            return false;
        }
    }

}


?>