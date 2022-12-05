<?php 
defined('BASEPATH') or exit ('No direct script access allowed');


class Programs extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper(array('form'));
        $this->load->library(array('form_validation'));
        $this->load->model(array('programs_model','semester_model','semester_courses_model','login_model'));
        if ($this->login_model->loggedIn() == false) {
            redirect('admin/Login');
        }
    }

    /* Start Program Section */
    public function add_program_form() {
        $data['content'] = 'admin/programs/add_program';
        $this->load->view('admin/admin_master', $data);
    }

    public function add_program() {
        if($this->input->post()){
            if($this->_validate(false, 'program') === true){
                $title = $this->input->post('name');
                $body = $this->input->post('description');

                $data = array(
                    'name' => $title,
                    'description' => $body,
                    'program_thumbnail' => '',
                );

                $this->programs_model->transaction_start();
                $program_data = $this->programs_model->insert($data, 'programs');

                $field_name = 'program_thumbnail';
                $folder_name = 'program_images';
                $file_name = $program_data['inserted_id'];
                $this->insert_image('', '', 'gif|jpg|png', $field_name, $folder_name, $file_name, 'program_thumbnail', 'add_program', $body);
            }
            else{
                $data['content'] = 'admin/programs/add_program';
                $data['program_description'] = $this->input->post('description');
                $this->load->view('admin/admin_master', $data);
            }
        }
        else{
            $data['content'] = 'admin/programs/add_program';
            $this->load->view('admin/admin_master', $data);
        }
    }

    private function insert_image($max_height, $max_width, $allowed_types, $field_name, $folder_name, $file_name, $column, $view, $body) {
        $uploaded_file_data = $this->do_upload($max_height, $max_width, $allowed_types, $field_name, $folder_name, $file_name);

        if (isset($uploaded_file_data['error'])) {
            $data['image_error'] = $uploaded_file_data['error'];
            $data['content'] = 'admin/programs/add_program';
            $data['program_description'] = $this->input->post('description');
            $this->load->view('admin/admin_master', $data);
        } else {
            $image_name = $uploaded_file_data['upload_data']['file_name'];
            $this->programs_model->update_image($image_name, $column, $file_name);
            $this->trans_comp($column);
        }
    }
    
    private function trans_comp($column) {
        if ($column == 'program_thumbnail') {
            $this->programs_model->transaction_complete();
            $this->session->set_flashdata('success','Program Added Successfully');
            redirect(base_url('admin/Programs/view_programs'));
        } else {
            return TRUE;
        }
    }

    public function view_programs() {
        $data['content'] = 'admin/programs/view_programs';
        $data['programs'] = $this->programs_model->get_programs();
        $this->load->view('admin/admin_master', $data);
    }
    
    public function edit_program($id)
    {
        $program = $this->programs_model->select_row(base64_decode($id), 'id', 'programs');
        $data['program'] = $program;
        $data['content'] = 'admin/programs/edit_program';
        $this->load->view('admin/admin_master', $data);
    }

    public function update_program($id) {
        $program_id = base64_decode($id);
        $this->input_validate($program_id);
        if($this->_validate(true, 'program') == true) {
            $title = $this->input->post('name');
            $body = $this->input->post('description');

            $data = array(
                'name' => $title,
                'description' => $body,
                'updated_at' => date('Y-m-d H:i:s'),
            );

            $this->programs_model->update($data, array('id' => $program_id), 'programs');
            $this->check_files($program_id, $body);
        }
        else {
            $data['program'] =  $this->programs_model->select_row($program_id, 'id', 'programs');
            $data['content'] = 'admin/programs/edit_program';
            $data['program_description'] = $this->input->post('description');
            $this->load->view('admin/admin_master', $data);
        }
    }

    public function check_files($program_id, $body) {
        if ($_FILES['program_thumbnail']['name'] != '') {
            $file_name = $program_id;
            $field_name = 'program_thumbnail';
            $folder_name = 'program_images';
            $this->insert_image_edit('', '', 'gif|jpg|png', $field_name, $folder_name, $file_name, 'program_thumbnail', 'edit_program', $program_id, $body);
        }
        else {
            $this->session->set_flashdata('success', 'Program Updated Successfully');
            redirect(base_url() . 'admin/Programs/view_programs');
        }
    }

    private function insert_image_edit($max_height, $max_width, $allowed_types, $field_name, $folder_name, $file_name, $column, $view, $program_id, $body) {
        $uploaded_file_data = $this->do_upload($max_height, $max_width, $allowed_types, $field_name, $folder_name, $file_name);
        if (isset($uploaded_file_data['error'])) {
            $data['image_error'] = $uploaded_file_data['error'];
            $data['program'] = $this->programs_model->select_row($program_id, 'id', 'programs');
            $data['program_description'] = $body;
            $data['content'] = 'admin/events/'.$view;
            $this->load->view('admin/admin_master', $data);
        } else {
            $image_name = $uploaded_file_data['upload_data']['file_name'];
            $sd = $this->programs_model->update_image($image_name, $column, $file_name);
            $this->trans_comp_edit($column);
        }
    }

    private function trans_comp_edit($column) {
        if ($column == 'program_thumbnail') {
            $this->session->set_flashdata('success', 'Program Updated Successfully');
            redirect(base_url() . 'admin/Programs/view_programs');
        } else {
            //die('hello');
            return TRUE;
        }
    }
    /* End Programs Section */

    /* Start Semester Section */
    
    public function add_semester_form() {
        $data['programs'] = $this->semester_model->select(['status'=>1],'','programs');
        $data['content'] = 'admin/programs/semesters/add_semester';
        $this->load->view('admin/admin_master', $data);
    }

    public function add_semester() {
        if($this->input->post()){
            if($this->_validate(false, 'semester') === true){
                $program_id = $this->input->post('program_id');
                $semester_number = $this->input->post('semester_number');
                $start_date = $this->input->post('start_date');
                $end_date = $this->input->post('end_date');

                $data = array(
                    'program_id' => $program_id,
                    'semester_number' => $semester_number,
                    'start_date' => $start_date,
                    'end_date' => $end_date,
                );

                $is_unique = $this->semester_model->select(['program_id'=>$program_id, 'semester_number'=>$semester_number], '', 'semester');

                if (empty($is_unique)){
                    $this->semester_model->insert($data, 'semester');
                    $data['content'] = 'admin/programs/semesters/add_semester';
                    $data['success'] = 'Semester Added Successfully';
                    $data['programs'] = $this->semester_model->select(['status'=>1],'','programs');
                    $data['p_id'] = $program_id;
                    $this->load->view('admin/admin_master', $data);
                }
                else {
                    $data['fail'] = 'Cannot Add Already Added Semester to the Program';
                    $data['programs'] = $this->semester_model->select(['status'=>1],'','programs');
                    $data['p_id'] = $program_id;
                    $data['content'] = 'admin/programs/semesters/add_semester';
                    $this->load->view('admin/admin_master', $data);
                }
                
            }
            else{
                $data['programs'] = $this->semester_model->select(['status'=>1],'','programs');
                $data['content'] = 'admin/programs/semesters/add_semester';
                $data['p_id'] = $this->input->post('program_id');
                $this->load->view('admin/admin_master', $data);
            }
        }
        else{
            $data['programs'] = $this->semester_model->select(['status'=>1],'','programs');
            $data['content'] = 'admin/programs/semesters/add_semester';
            $this->load->view('admin/admin_master', $data);
        }
    }

    public function view_semesters() {
        $data['content'] = 'admin/programs/semesters/view_semesters';
        $data['semesters'] = $this->semester_model->get_semesters();
        $this->load->view('admin/admin_master', $data);
    }
    
    public function edit_semester($id)
    {
        $data['programs'] = $this->semester_model->select(['status'=>1],'','programs');
        $data['semester'] = $this->semester_model->select_row(base64_decode($id), 'id', 'semester');
        $data['content'] = 'admin/programs/semesters/edit_semester';
        $this->load->view('admin/admin_master', $data);
    }

    public function update_semester($id) {
        $semester_id = base64_decode($id);
        $this->input_validate($semester_id);
        if($this->_validate(true, 'semester') == true) {
            $program_id = $this->input->post('program_id');
            $semester_number = $this->input->post('semester_number');
            $start_date = $this->input->post('start_date');
            $end_date = $this->input->post('end_date');

            $data = array(
                'program_id' => $program_id,
                'semester_number' => $semester_number,
                'start_date' => $start_date,
                'end_date' => $end_date,
                'updated_at' => date('Y-m-d H:i:s'),
            );

            $semester_data = $this->semester_model->select_row($semester_id, 'id', 'semester');

            if ($semester_data->program_id != $program_id || $semester_data->semester_number != $semester_number) {
                $is_unique = $this->semester_model->select(['program_id'=>$program_id, 'semester_number'=>$semester_number], '', 'semester');

                if (empty($is_unique)){
                    $this->semester_model->update($data, array('id' => $semester_id), 'semester');
                    $this->session->set_flashdata('success','Semester Updated Successfully');
                    redirect('admin/Programs/view_semesters');
                }
                else {
                    $data['fail'] = 'Cannot Update Already Added Semester to the Program';
                    $data['semester'] = $this->semester_model->select_row(base64_decode($id), 'id', 'semester');
                    $data['programs'] = $this->semester_model->select(['status'=>1],'','programs');
                    $data['p_id'] = $program_id;
                    $data['content'] = 'admin/programs/semesters/edit_semester';
                    $this->load->view('admin/admin_master', $data);
                }
            }
            elseif ($semester_data->program_id == $program_id && $semester_data->semester_number == $semester_number) {
                $this->semester_model->update($data, array('id' => $semester_id), 'semester');
                $this->session->set_flashdata('success','Semester Updated Successfully');
                redirect('admin/Programs/view_semesters');
            }
        }
        else {
            $data['programs'] = $this->semester_model->select(['status'=>1],'','programs');
            $data['semester'] = $this->semester_model->select_row(base64_decode($id), 'id', 'semester');
            $data['p_id'] = $this->input->post('program_id');
            $data['content'] = 'admin/programs/semesters/edit_semester';
            $this->load->view('admin/admin_master', $data);
        }
    }

    /* End Semester Section */
    

    /* Start Semester Courses Section */
    
   /* Start Semester Section */
    
    public function add_semester_course_form($semester_id) {
        $data['courses'] = $this->semester_courses_model->select(['status'=>1],'','courses');
        $data['info'] = $this->semester_courses_model->get_program_semester(base64_decode($semester_id));
        $data['semester_id'] = base64_decode($semester_id);
        $data['content'] = 'admin/programs/semester_courses/add_semester_course';
        $this->load->view('admin/admin_master', $data);
    }

    public function add_semester_course() {
        if($this->input->post()){
            if($this->_validate(false, 'semester_courses') === true){
                $course_id = $this->input->post('course_id');
                $semester_id = $this->input->post('semester_id');

                $data = array(
                    'semester_id' => $semester_id,
                    'course_id' => $course_id,
                );

                $is_unique = $this->semester_courses_model->select(['semester_id'=>$semester_id, 'course_id'=>$course_id], '', 'semester_courses');

                if (empty($is_unique)){
                    $this->semester_courses_model->insert($data, 'semester_courses');
                    $data['content'] = 'admin/programs/semester_courses/add_semester_course';
                    $data['success'] = 'Course Added Successfully';
                    $data['courses'] = $this->semester_courses_model->select(['status'=>1],'','courses');
                    $data['c_id'] = $course_id;
                    $data['info'] = $this->semester_courses_model->get_program_semester($semester_id);
                    $this->load->view('admin/admin_master', $data);
                }
                else {
                    $data['fail'] = 'Cannot Add, Course Already Added to the Semester';
                    $data['courses'] = $this->semester_courses_model->select(['status'=>1],'','courses');
                    $data['c_id'] = $course_id;
                    $data['content'] = 'admin/programs/semester_courses/add_semester_course';
                    $data['info'] = $this->semester_courses_model->get_program_semester($semester_id);
                    $this->load->view('admin/admin_master', $data);
                }
                
            }
            else{
                $data['courses'] = $this->semester_courses_model->select(['status'=>1],'','courses');
                $data['content'] = 'admin/programs/semester_courses/add_semester_course';
                $data['info'] = $this->semester_courses_model->get_program_semester($this->input->post('semester_id'));
                $data['c_id'] = $this->input->post('course_id');
                $this->load->view('admin/admin_master', $data);
            }
        }
        else{
            $data['info'] = $this->semester_courses_model->get_program_semester($this->input->post('semester_id'));
            $data['courses'] = $this->semester_courses_model->select(['status'=>1],'','courses');
            $data['content'] = 'admin/programs/semester_courses/add_semester_course';
            $this->load->view('admin/admin_master', $data);
        }
    }

    public function view_semester_courses() {
        $data['content'] = 'admin/programs/semester_courses/view_semester_courses';
        $data['semester_courses'] = $this->semester_courses_model->get_semester_courses();
        $this->load->view('admin/admin_master', $data);
    }
    
    public function edit_semester_course($id)
    {
        $data['courses'] = $this->semester_courses_model->select(['status'=>1],'','courses');
        $data['sc'] = $this->semester_courses_model->get_program_semester_course(base64_decode($id));
        $data['content'] = 'admin/programs/semester_courses/edit_semester_course';
        $this->load->view('admin/admin_master', $data);
    }

    public function update_semester_course($id) {
        $semester_course_id = base64_decode($id);
        $this->input_validate($semester_course_id);
        if($this->_validate(true, 'semester_courses') == true) {
            $course_id = $this->input->post('course_id');
            $semester_id = $this->input->post('semester_id');

            $data = array(
                'course_id' => $course_id,
                'updated_at'=>date('Y-m-d H:i:s'),
            );
            
            $semester_course_data = $this->semester_courses_model->select_row($semester_course_id, 'id', 'semester_courses');

            if ($semester_course_data->course_id != $course_id || $semester_course_data->semester_id != $semester_id) {
     
                $is_unique = $this->semester_courses_model->select(['semester_id'=>$semester_id, 'course_id'=>$course_id], '', 'semester_courses');

                if (empty($is_unique)){
                    $this->semester_courses_model->update($data, array('id' => $semester_course_id), 'semester_courses');
                    $this->session->set_flashdata('success','Course Updated Successfully');
                    redirect('admin/Programs/view_semester_courses');
                }
                else {
                    $data['fail'] = 'Cannot Update, Course Already Added to the Semester';
                    $data['courses'] = $this->semester_courses_model->select(['status'=>1],'','courses');
                    $data['sc'] = $this->semester_courses_model->get_program_semester_course($semester_course_id);
                    $data['c_id'] = $course_id;
                    $data['content'] = 'admin/programs/semester_courses/edit_semester_course';
                    $this->load->view('admin/admin_master', $data);
                }
            }
            elseif ($semester_course_data->course_id == $course_id && $semester_course_data->semester_id == $semester_id) {
                $this->semester_model->update($data, array('id' => $semester_course_id), 'semester_courses');
                $this->session->set_flashdata('success','Course Updated Successfully');
                redirect('admin/Programs/view_semester_courses');
            }
        }
        else {
            $data['courses'] = $this->semester_courses_model->select(['status'=>1],'','courses');
            $data['sc'] = $this->semester_courses_model->get_program_semester_course($semester_course_id);
            $data['c_id'] = $this->input->post('course_id');
            $data['content'] = 'admin/programs/semester_courses/edit_semester_course';
            $this->load->view('admin/admin_master', $data);
        }
    }

   /* End Semester Courses Section */

     //Common Function
    public function change_status($status = '', $id = '', $category) {
        if($category == 'program'){
            if (base64_decode($status) == '1') {
                $program = $this->programs_model->select(['program_id'=>base64_decode($id), 'status'=>1],'','semester');
                if (empty($program)){
                    $set = array('status' => 0,'updated_at'=>date('Y-m-d H:i:s'));
                    $this->programs_model->update_program_status($set, base64_decode($id), 'id', 'programs');
                    $this->session->set_flashdata('success', 'Disabled Successfully');
                    redirect('admin/Programs/view_programs');
                }
                else {
                    $this->session->set_flashdata('fail', 'The program is currently in use, it cannot be disabled');
                    redirect('admin/Programs/view_programs');
                }
            } elseif (base64_decode($status) == '0') {
                $set = array('status' => 1,'updated_at'=>date('Y-m-d H:i:s'));
                $this->programs_model->update_program_status($set, base64_decode($id), 'id', 'programs');
                $this->session->set_flashdata('success', 'Enabled Successfully');
                redirect('admin/Programs/view_programs');
            } else {
                // $data['fail'] = 'Wrong Value';
                $this->session->set_flashdata('fail', 'Wrong Value');
                redirect('admin/Programs/view_programs');
            }
        }
        elseif($category == 'semester'){
            if (base64_decode($status) == '1') {
                $semester = $this->semester_model->select(['semester_id'=>base64_decode($id), 'status'=>1],'','semester_courses');
                if (empty($semester)){
                    $set = array('status' => 0,'updated_at'=>date('Y-m-d H:i:s'));
                    $this->semester_model->update_semester_status($set, base64_decode($id), 'id', 'semester');
                    $this->session->set_flashdata('success', 'Disabled Successfully');
                    redirect('admin/Programs/view_semesters');
                }
                else {
                    $this->session->set_flashdata('fail', 'The semester is currently in use, it cannot be disabled');
                    redirect('admin/Programs/view_semesters');
                }
            } elseif (base64_decode($status) == '0') {
                $set = array('status' => 1,'updated_at'=>date('Y-m-d H:i:s'));
                $this->semester_model->update_semester_status($set, base64_decode($id), 'id', 'semester');
                $this->session->set_flashdata('success', 'Enabled Successfully');
                redirect('admin/Programs/view_semesters');
            } else {
                // $data['fail'] = 'Wrong Value';
                $this->session->set_flashdata('fail', 'Wrong Value');
                redirect('admin/Programs/view_semesters');
            }
        }
        elseif($category == 'semester_courses'){
            if (base64_decode($status) == '1') {
                $semester_courses = $this->semester_courses_model->select(['semester_course_id'=>base64_decode($id), 'status'=>1],'','offered_courses');
                if (empty($semester_courses)){
                    $set = array('status' => 0,'updated_at'=>date('Y-m-d H:i:s'));
                    $this->semester_courses_model->update_semester_course_status($set, base64_decode($id), 'id', 'semester_courses');
                    $this->session->set_flashdata('success', 'Disabled Successfully');
                    redirect('admin/Programs/view_semester_courses');
                }
                else {
                    $this->session->set_flashdata('fail', 'The semester course is currently in use, it cannot be disabled');
                    redirect('admin/Programs/view_semester_courses');
                }
            } elseif (base64_decode($status) == '0') {
                $set = array('status' => 1,'updated_at'=>date('Y-m-d H:i:s'));
                $this->semester_courses_model->update_semester_course_status($set, base64_decode($id), 'id', 'semester_courses');
                $this->session->set_flashdata('success', 'Enabled Successfully');
                redirect('admin/Programs/view_semester_courses');
            } else {
                // $data['fail'] = 'Wrong Value';
                $this->session->set_flashdata('fail', 'Wrong Value');
                redirect('admin/Programs/view_semester_courses');
            }
        }
    }

    //Common Function
    public function delete($id, $category) {
        if ($category == 'program'){
            $program = $this->programs_model->select(['program_id'=>base64_decode($id), 'status'=>1],'','semester');
            if (empty($program)){
                $set = array('status' => 3,'updated_at'=>date('Y-m-d H:i:s'));
                $this->blogs_model->update_program_status($set, base64_decode($id), 'id', 'programs');
                $this->session->set_flashdata('success', 'Deleted Successfully');
                redirect('admin/Programs/view_programs');
            }
            else {
                $this->session->set_flashdata('fail', 'The program is currently in use, it cannot be deleted');
                redirect('admin/Programs/view_programs');
            }
        }
        elseif ($category == 'semester'){
            $semester = $this->semester_model->select(['semester_id'=>base64_decode($id), 'status'=>1],'','semester_courses');
            if (empty($semester)){
                $set = array('status' => 3,'updated_at'=>date('Y-m-d H:i:s'));
                $this->semester_model->update_semester_status($set, base64_decode($id), 'id', 'semester');
                $this->session->set_flashdata('success', 'Deleted Successfully');
                redirect('admin/Programs/view_semesters');
            }
            else {
                $this->session->set_flashdata('fail', 'The semester is currently in use, it cannot be deleted');
                redirect('admin/Programs/view_semesters');
            }
        }
        elseif ($category == 'semester_courses'){
            $semester_courses = $this->semester_courses_model->select(['semester_course_id'=>base64_decode($id), 'status'=>1],'','offered_courses');

            if (empty($semester_courses)){
                $set = array('status' => 3,'updated_at'=>date('Y-m-d H:i:s'));
                $this->semester_courses_model->update_semester_course_status($set, base64_decode($id), 'id', 'semester_courses');
                $this->session->set_flashdata('success', 'Deleted Successfully');
                redirect('admin/Programs/view_semester_courses');
            }
            else {
                $this->session->set_flashdata('fail', 'The semester course is currently in use, it cannot be deleted');
                redirect('admin/Programs/view_semester_courses');
            }
        }
    }

    //Common Function
    private function _validate($edit, $category) {
        if ($category == 'program') {
            if($edit == true){
                $program = $this->programs_model->select_row(base64_decode($this->uri->segment(4)), 'id', 'programs');
                if($this->input->post('name') != $program->name) {
                    $is_unique =  '|is_unique[programs.name]';
                    } else {
                    $is_unique =  '';
                }
                $this->form_validation->set_rules('name', 'Program Name', 'trim|required|regex_match[/^[a-zA-Z- ]*$/]|min_length[3]|max_length[75]'.$is_unique);
            }
            else {
                $this->form_validation->set_rules('name', 'Program Name', 'trim|required|regex_match[/^[a-zA-Z- ]*$/]|min_length[3]|max_length[75]|is_unique[programs.name]');
            }
            $this->form_validation->set_rules('description', 'Description', 'trim|required|min_length[40]|max_length[3500]');
        }
        elseif ($category == 'semester') {
            $this->form_validation->set_rules('program_id', 'Program ID', 'trim|required');
            $this->form_validation->set_rules('semester_number', 'Semester', 'trim|required|numeric');
            $this->form_validation->set_rules('start_date', 'Start Date', 'trim|required');
            $this->form_validation->set_rules('end_date', 'End Date', 'trim|required');
        }
        elseif ($category == 'semester_courses') {
            $this->form_validation->set_rules('course_id', 'Course ID', 'trim|required');
        }

        if($this->form_validation->run() == TRUE) {
            return true;
        }
        else {
            return false;
        }
    }

}


?>