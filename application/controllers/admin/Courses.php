<?php 
defined('BASEPATH') or exit ('No direct script access allowed');


class Courses extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper(array('form'));
        $this->load->library(array('form_validation'));
        $this->load->model(array('courses_model','login_model'));
        if ($this->login_model->loggedIn() == false) {
            redirect('admin/Login');
        }
    }

    public function add_course_form() {
        $sub_cat = $this->courses_model->select_sub_cat();
        $data['sub_category'] = $sub_cat;
        $data['content'] = 'admin/courses/add_course';
        $this->load->view('admin/admin_master', $data);
    }

    public function add_courses() {
        if($this->input->post()){
            if($this->_validate() === true){
                $data = array(
                    "id_sub_category" => $this->input->post('sub_cat'),
                    "name" => $this->input->post('course_name'),
                    "code" => $this->input->post('course_code'),
                    "short_description" => $this->input->post('short_desc'),
                    "long_description" => $this->input->post('long_desc'),
                    "intro_video_url" => $this->input->post('intro_video'),
                    "course_thumbnail" => '',
                    "featured_course" => $this->input->post('featured'),
                );

                $this->courses_model->transaction_start();
                $course_data = $this->courses_model->insert($data, 'courses');
                $field_name = 'course_thumbnail';
                $folder_name = 'course_images';
                $file_name = $course_data['inserted_id'];
                $this->insert_image('', '', 'gif|jpg|png', $field_name, $folder_name, $file_name, 'course_thumbnail', 'add_course');
            }
            else{
                $sub_cat = $this->courses_model->select_sub_cat();
                $data['sub_category'] = $sub_cat;
                $data['sc_id'] = $this->input->post('sub_cat');
                $data['content'] = 'admin/courses/add_course';
                $this->load->view('admin/admin_master', $data);
            }
        }
        else{
            $data['content'] = 'admin/courses/add_course';
            $this->load->view('admin/admin_master', $data);
        }
    }

    
    private function insert_image($max_height, $max_width, $allowed_types, $field_name, $folder_name, $file_name, $column, $view) {
        $uploaded_file_data = $this->do_upload($max_height, $max_width, $allowed_types, $field_name, $folder_name, $file_name);

        if (isset($uploaded_file_data['error'])) {
            $sub_cat = $this->courses_model->select_sub_cat();
            $data['sub_category'] = $sub_cat;
            $data['sc_id'] = $this->input->post('sub_cat');
            $data['image_error'] = $uploaded_file_data['error'];
            $data['content'] = 'admin/courses/add_course';
            $this->load->view('admin/admin_master', $data);
        } else {
            $image_name = $uploaded_file_data['upload_data']['file_name'];
            $this->courses_model->update_image($image_name, $column, $file_name);
            $this->trans_comp($column);
        }
    }
    
    private function trans_comp($column) {
        if ($column == 'course_thumbnail') {
            $this->courses_model->transaction_complete();
            $sub_cat = $this->courses_model->select_sub_cat();
            $data['sub_category'] = $sub_cat;
            $data['sc_id'] = $this->input->post('sub_cat');
            $data['success'] = "Added Successfully";
            $data['content'] = 'admin/courses/add_course';
            $this->load->view('admin/admin_master', $data);
        } else {
            return TRUE;
        }
    }

    public function view_courses() {
        $condition = array('courses.status!='=> 3);
        $data['courses'] = $this->courses_model->select_courses($condition);
        $data['content'] = 'admin/courses/view_courses';
        $this->load->view('admin/admin_master', $data);
    }

    public function edit_course($id)
    {
        $data['content'] = 'admin/courses/edit_course';
        $data['c'] = $this->courses_model->select_row(base64_decode($id),'id','courses');
        $data['sub_category'] = $this->courses_model->select_sub_cat();
        $this->load->view('admin/admin_master', $data);
    }

    public function update_course($id) {
        $id = base64_decode($id);
        $this->input_validate($id);
        if($this->_validate() === true) {
            $data = array(
                "id_sub_category" => $this->input->post('sub_cat'),
                "name" => $this->input->post('course_name'),
                "code" => $this->input->post('course_code'),
                "short_description" => $this->input->post('short_desc'),
                "long_description" => $this->input->post('long_desc'),
                "intro_video_url" => $this->input->post('intro_video'),
                "featured_course" => $this->input->post('featured'),
                'updated_at'=>date('Y-m-d H:i:s')
            );

            $this->courses_model->update($data, array('id' => $id), 'courses');
            $this->check_files($id, $this->input->post('sub_cat'));
        }
        else {
            $data['content'] = 'admin/courses/edit_course';
            $data['sub_category'] = $this->courses_model->select_sub_cat();
            $data['sc_id'] = $this->input->post('sub_cat');
            $data['c'] = $this->courses_model->select_row($id,'id','courses');
            $this->load->view('admin/admin_master', $data);
        }
    }

    public function check_files($id, $sub_cat_id) {
        if ($_FILES['course_thumbnail']['name'] != '') {
            $file_name = $id;
            $field_name = 'course_thumbnail';
            $folder_name = 'course_images';
            $this->insert_image_edit('', '', 'gif|jpg|png', $field_name, $folder_name, $file_name, 'course_thumbnail', 'edit_course', $id, $sub_cat_id);
        }
        else {
            $this->session->set_flashdata('success', 'Updated Successfully');
            redirect(base_url() . 'admin/Courses/view_courses');
        }
    }

    private function insert_image_edit($max_height, $max_width, $allowed_types, $field_name, $folder_name, $file_name, $column, $view, $id, $sub_cat_id) {
        $uploaded_file_data = $this->do_upload($max_height, $max_width, $allowed_types, $field_name, $folder_name, $file_name);
        if (isset($uploaded_file_data['error'])) {
            $data['content'] = 'admin/courses/'.$view;
            $data['sub_category'] = $this->courses_model->select_sub_cat();
            $data['sc_id'] = $sub_cat_id;
            $data['c'] = $this->courses_model->select_row($id,'id','courses');
            $data['image_error'] = $uploaded_file_data['error'];
            $this->load->view('admin/admin_master', $data);
        } else {
            $image_name = $uploaded_file_data['upload_data']['file_name'];
            $sd = $this->courses_model->update_image($image_name, $column, $file_name);
            $this->trans_comp_edit($column);
        }
    }

    private function trans_comp_edit($column) {
        if ($column == 'course_thumbnail') {
            $this->session->set_flashdata('success', 'Updated Successfully');
            redirect(base_url() . 'admin/Courses/view_courses');
        } else {
            //die('hello');
            return TRUE;
        }
    }

    public function change_status($status = '', $id = '') {
        if (base64_decode($status) == '1') {
            $set = array('status' => 0,'updated_at'=>date('Y-m-d H:i:s'));
            $this->courses_model->update_course_status($set, base64_decode($id), 'id', 'courses');

            $set = array('status' => 0,'updated_at'=>date('Y-m-d H:i:s'));
            $this->courses_model->update_course_status($set, base64_decode($id), 'course_id', 'offered_courses');

            $this->session->set_flashdata('success', 'Updated Successfully');
            redirect('admin/Courses/view_courses');
        } elseif (base64_decode($status) == '0') {
            $set = array('status' => 1,'updated_at'=>date('Y-m-d H:i:s'));
            $this->courses_model->update_course_status($set, base64_decode($id), 'id', 'courses');

            $course_id = base64_decode($id);

            // Get all the batch status where course id is = $course_id
            // The query will return multiple records becuase we can have multiple batches with the same course id
            $where = "course_id='$course_id'";
            $rows = $this->courses_model->get_rows_status($where);

            // Then we will check if the batch status is 1
            // Because it can be possible that the course has been taught in the previous batch
            // and is not disabled
            // So we will loop through and set the status of the offered courses to 1 whose batches is active
            // and course id is the given course id.
            foreach($rows as $row){
                if($row->batch_status == 1) {
                    $set = array('status' => 1,'updated_at'=>date('Y-m-d H:i:s'));
                    $this->courses_model->update_course_status($set, $course_id, 'course_id', 'offered_courses');
                }
            }

            $this->session->set_flashdata('success', 'Updated Successfully');
            redirect('admin/Courses/view_courses');
        } else {
            // $data['fail'] = 'Wrong Value';
            $this->session->set_flashdata('fail', 'Wrong Value');
            redirect('admin/Courses/view_courses');
        }
    }
    
    function delete_course($id) {
            $set = array('status' => 3,'updated_at'=>date('Y-m-d H:i:s'));
            $this->courses_model->update_course_status($set, base64_decode($id), 'id', 'courses');
            $set = array('status' => 3,'updated_at'=>date('Y-m-d H:i:s'));
            $this->courses_model->update_course_status($set, base64_decode($id), 'course_id', 'offered_courses');
            $this->session->set_flashdata('success', 'Deleted Successfully');
            redirect('admin/Courses/view_courses');
    }

    private function _validate() {
        $this->form_validation->set_rules('course_name', 'Course Name', 'trim|required|regex_match[/^[a-zA-Z0-9 ]*$/]|min_length[4]|max_length[50]');
        $this->form_validation->set_rules('course_code', 'Course Code', 'trim|required|alpha_dash|min_length[4]|max_length[15]');
        $this->form_validation->set_rules('sub_cat', 'Sub Category', 'trim|required');
        $this->form_validation->set_rules('short_desc', 'Description', 'trim|required|min_length[10]|max_length[150]');
        $this->form_validation->set_rules('long_desc', 'Detailed Description', 'trim|required|min_length[10]|max_length[500]');
        $this->form_validation->set_rules('intro_video', 'Intro Video', 'trim|valid_url');
        $this->form_validation->set_rules('featured', 'Featured', 'trim|required');

        if($this->form_validation->run() == TRUE) {
            return true;
        }
        else {
            return false;
        }
    }

}


?>