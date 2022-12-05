<?php 
defined('BASEPATH') or exit ('No direct script access allowed');


class Syllabus extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper(array('form'));
        $this->load->library(array('form_validation'));
        $this->load->model(array('syllabus_model','login_model'));
        if ($this->login_model->loggedIn() == false) {
            redirect('admin/Login');
        }
    }

    public function add_syllabus_form() {
        $course = $this->syllabus_model->select(['status='=>1],"",'courses');
        $data['course'] = $course;
        $data['content'] = 'admin/courses/add_syllabus';
        $this->load->view('admin/admin_master', $data);
    }

    public function add_syllabus() {
        if($this->input->post()){
            if($this->_validate() === true){
                $course_id = $this->input->post('course');
                $title = $this->input->post('title');
                $desc = $this->input->post('short_desc');
                $week_number = $this->input->post('week_number');
                
                $data = array( 
                    'course_id' => $course_id,
                    'title' => $title,
                    'description' => $desc,
                    'week_number' => $week_number,
                );

                $this->syllabus_model->insert($data, 'syllabus');

                $course = $this->syllabus_model->select(['status='=>1],"",'courses');
                $data['course'] = $course;
                $data['success'] = 'Chapter addedd successfully!';
                $data['content'] = 'admin/courses/add_syllabus';
                $data['c_id'] = $this->input->post('course');
                $this->load->view('admin/admin_master', $data);
            }
            else{
                $course = $this->syllabus_model->select(['status='=>1],"",'courses');
                $data['course'] = $course;
                $data['c_id'] = $this->input->post('course');
                $data['content'] = 'admin/courses/add_syllabus';
                $this->load->view('admin/admin_master', $data);
            }
        }
        else{
            $data['content'] = 'admin/courses/add_syllabus';
            $this->load->view('admin/admin_master', $data);
        }
    }


    public function view_syllabus() {
        $data['content'] = 'admin/courses/view_syllabus';
        $condition = array('syllabus.status!='=>3);
        $data['syllabus'] = $this->syllabus_model->select_syllabus($condition);

        $this->load->view('admin/admin_master', $data);
    }


    public function edit_syllabus($id)
    {
        $course = $this->syllabus_model->select(['status='=>1],"",'courses');
        $data['course'] = $course;
        $data['content'] = 'admin/courses/edit_syllabus';
        $data['syllabus'] = $this->syllabus_model->select_row(base64_decode($id),'id','syllabus');

        $this->load->view('admin/admin_master', $data);
    }

    public function update_syllabus($id)
    {
        $id = base64_decode($id);
        if($this->_validate() === true) {
            $course_id = $this->input->post('course_id');
            $title = $this->input->post('title');
            $desc = $this->input->post('short_desc');
            $week_number = $this->input->post('week_number');
            $data = array( 
                'course_id' => $course_id,
                'title' => $title,
                'description' => $desc,
                'week_number' => $week_number,
                'updated_at'=>date('Y-m-d H:i:s')
            );
            $this->security->xss_clean($data);

            $this->syllabus_model->update($data, "id = $id", 'syllabus');
            $this->session->set_flashdata('success','Syllabus Updated Successfully');

            redirect(base_url('admin/Syllabus/view_syllabus'));
        }
        else{
            $course = $this->syllabus_model->select(['status='=>1],"",'courses');
            $data['course'] = $course;
            $data['course_id'] = $this->input->post('course_id');
            $data['content'] = 'admin/courses/edit_syllabus';
            $data['syllabus'] = $this->syllabus_model->select_row($id,'id','syllabus');

            $this->load->view('admin/admin_master', $data);
        }
    }

    public function change_status($status = '', $id = '') {
        if (base64_decode($status) == '1') {
            $set = array('status' => 0,'updated_at'=>date('Y-m-d H:i:s'));
            $this->syllabus_model->update_syllabus_status($set, base64_decode($id), 'id', 'syllabus');
            $this->session->set_flashdata('success', 'Updated Successfully');
            redirect('admin/Syllabus/view_syllabus');
        } elseif (base64_decode($status) == '0') {
            $set = array('status' => 1,'updated_at'=>date('Y-m-d H:i:s'));
            $this->syllabus_model->update_syllabus_status($set, base64_decode($id), 'id', 'syllabus');
            $this->session->set_flashdata('success', 'Updated Successfully');
            redirect('admin/Syllabus/view_syllabus');
        } else {
            // $data['fail'] = 'Wrong Value';
            $this->session->set_flashdata('fail', 'Wrong Value');
            redirect('admin/Syllabus/view_syllabus');
        }
    }
    
    function delete_event($id) {
        $set = array('status' => 3,'updated_at'=>date('Y-m-d H:i:s'));
        $this->syllabus_model->update_syllabus_status($set, base64_decode($id), 'id', 'syllabus');
        $this->session->set_flashdata('success', 'Deleted Successfully');
        redirect('admin/Syllabus/view_syllabus');
    }
    
    private function _validate() {
        $this->form_validation->set_rules('course', 'Course', 'trim|required');
        $this->form_validation->set_rules('title', 'Title', 'trim|required|regex_match[/^[a-zA-Z- ]*$/]|min_length[4]|max_length[75]');
        $this->form_validation->set_rules('short_desc', 'Description', 'trim|required|min_length[10]|max_length[150]');
        $this->form_validation->set_rules('week_number', 'Week Number', 'trim|required|min_length[1]|max_length[3]');

        if($this->form_validation->run() == TRUE) {
            return true;
        }
        else {
            return false;
        }
    }

}


?>