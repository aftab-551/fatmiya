<?php 
defined('BASEPATH') or exit ('No direct script access allowed');


class Tags extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper(array('form'));
        $this->load->library(array('form_validation'));
        $this->load->model(array('tags_model','login_model'));
        if ($this->login_model->loggedIn() == false) {
            redirect('admin/Login');
        }
    }

    public function add_tag_form() {
        $data['content'] = 'admin/cms/add_tag';
        $this->load->view('admin/admin_master', $data);
    }

    public function add_tag() {
        if($this->input->post()){
            if($this->_validate() === true){
                $tag_name = $this->input->post('tag_name');
                $slug = $this->input->post('slug');
                
                $data = array( 
                    'name' => $tag_name,
                    'slug' => $slug,
                );

                $this->tags_model->insert($data, 'tags');

                $data['success'] = 'Tag addedd successfully!';
                $data['content'] = 'admin/cms/add_tag';
                $this->load->view('admin/admin_master', $data);
            }
            else{
                $data['content'] = 'admin/cms/add_tag';
                $this->load->view('admin/admin_master', $data);
            }
        }
        else{
            $data['content'] = 'admin/cms/add_tag';
            $this->load->view('admin/admin_master', $data);
        }
    }


    public function view_tags() {
        $data['content'] = 'admin/cms/view_tags';
        $condition = array('tags.status!='=>3);
        $data['tags'] = $this->tags_model->select($condition, '', 'tags');

        $this->load->view('admin/admin_master', $data);
    }


    public function edit_tag($id)
    {
        $data['content'] = 'admin/cms/edit_tag';
        $data['t'] = $this->tags_model->select_row(base64_decode($id),'id','tags');

        $this->load->view('admin/admin_master', $data);
    }

    public function update_tag($id)
    {
        $id = base64_decode($id);
        if($this->_validate() === true) {
            $tag_name = $this->input->post('tag_name');
            $slug = $this->input->post('slug');
            $data = array( 
                'name' => $tag_name,
                'slug' => $slug,
                'updated_at'=>date('Y-m-d H:i:s')
            );
            $this->security->xss_clean($data);

            $this->tags_model->update($data, "id = $id", 'tags');
            $this->session->set_flashdata('success','Tag Updated Successfully');

            redirect(base_url('admin/Tags/view_tags'));
        }
        else{
            $data['content'] = 'admin/cms/edit_tag';
            $data['t'] = $this->tags_model->select_row($id,'id','tags');

            $this->load->view('admin/admin_master', $data);
        }
    }

    public function change_status($status = '', $id = '') {
        if (base64_decode($status) == '1') {
            $set = array('status' => 0,'updated_at'=>date('Y-m-d H:i:s'));
            $this->tags_model->update_tag_status($set, base64_decode($id), 'id', 'tags');
            $this->session->set_flashdata('success', 'Updated Successfully');
            redirect('admin/Tags/view_tags');
        } elseif (base64_decode($status) == '0') {
            $set = array('status' => 1,'updated_at'=>date('Y-m-d H:i:s'));
            $this->tags_model->update_tag_status($set, base64_decode($id), 'id', 'tags');
            $this->session->set_flashdata('success', 'Updated Successfully');
            redirect('admin/Tags/view_tags');
        } else {
            // $data['fail'] = 'Wrong Value';
            $this->session->set_flashdata('fail', 'Wrong Value');
            redirect('admin/Tags/view_tags');
        }
    }
    
    function delete_tag($id) {
        $set = array('status' => 3,'updated_at'=>date('Y-m-d H:i:s'));
        $this->tags_model->update_tag_status($set, base64_decode($id), 'id', 'tags');
        $this->session->set_flashdata('success', 'Deleted Successfully');
        redirect('admin/Tags/view_tags');
    }
    
    private function _validate() {
        $this->form_validation->set_rules('tag_name', 'Tag Name', 'trim|required|regex_match[/^[a-zA-Z ]*$/]|min_length[4]|max_length[75]');
        $this->form_validation->set_rules('slug', 'Tag Slug', 'trim|required|regex_match[/^[a-zA-Z-]*$/]|min_length[4]|max_length[100]|is_unique[tags.slug]');

        if($this->form_validation->run() == TRUE) {
            return true;
        }
        else {
            return false;
        }
    }

}


?>