<?php 
defined('BASEPATH') or exit ('No direct script access allowed');


class Teachers extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper(array('form'));
        $this->load->library(array('form_validation'));
        $this->load->model(array('teachers_model','teacherCourse_model','login_model'));
        if ($this->login_model->loggedIn() == false) {
            redirect('admin/Login');
        }
    }



    public function add_teacher_form() {
        $data['content'] = 'admin/teachers/add_teacher';
        $this->load->view('admin/admin_master', $data);
    }

    public function add_teachers() {
        if($this->input->post()){
            if($this->_validate() === true){
                $name = $this->input->post('teacher_name');
                $details = $this->input->post('teacher_details');
                $address = $this->input->post('teacher_address');
                $city = $this->input->post('teacher_city');
                $contact = $this->input->post('teacher_contact');
                $qualification = $this->input->post('teacher_qualification');
                $facebook = $this->input->post('facebook_id');
                $instagram = $this->input->post('instagram_id');
                $youtube = $this->input->post('youtube_id');
                $twitter = $this->input->post('twitter_id');

                $data = array(
                    "name" => $name,
                    "detail" => $details,
                    "address" => $address,
                    "city" => $city,
                    "contact_number" => $contact,
                    "qualification" => $qualification,
                    'teacher_image' => '',
                    "facebook" => $facebook,
                    "instagram" => $instagram,
                    "youtube" => $youtube,
                    "twitter" => $twitter,
                );

                // $this->security->xss_clean($data);

                $this->teachers_model->transaction_start();
                $teacher_data = $this->teachers_model->insert($data, 'teachers');

                $row = $this->login_model->get_counter_value();
                $counter = $row->teacher_counter;
                $increment = ++$counter;
                $teacher_initial = $row->teacher_initial;

                // Updating the settings
                $set = array("teacher_counter"=>$increment, "updated"=>date('Y-m-d H:i:s'));
                $where = 'id_settings= 1';
                $this->login_model->update($set, $where, 'settings');

                // Updating the teacher_id in the teachers table
                $row = $this->login_model->select_last_row('teachers');
                $initial = $teacher_initial.'-'.date('y').'-'.$increment;
                $set = array("teacher_id"=>$initial, "updated_at"=>date('Y-m-d H:i:s'));
                $where = "id='$row->id'";
                $this->login_model->update($set, $where, 'teachers');

                
                $field_name = 'teacher_image';
                $folder_name = 'teacher_images';
                // $destination_folder = 'uploads/events_images/events_resized';
                $file_name = $teacher_data['inserted_id'];
                $this->insert_image('', '', 'gif|jpg|png', $field_name, $folder_name, $file_name, 'teacher_image', 'add_teacher');
            }
            else{
                $data['content'] = 'admin/teachers/add_teacher';
                $this->load->view('admin/admin_master', $data);
            }
        }
        else{
            $data['content'] = 'admin/teachers/add_teacher';
            $this->load->view('admin/admin_master', $data);
        }
    }

    private function insert_image($max_height, $max_width, $allowed_types, $field_name, $folder_name, $file_name, $column, $view) {
        $uploaded_file_data = $this->do_upload($max_height, $max_width, $allowed_types, $field_name, $folder_name, $file_name);

        if (isset($uploaded_file_data['error'])) {
            $data['image_error'] = $uploaded_file_data['error'];
            $data['content'] = 'admin/teachers/add_teacher';
            $this->load->view('admin/admin_master', $data);
            // $this->session->set_flashdata('image_error', $uploaded_file_data['error']);
            // redirect(base_url() . 'admin/Events/' . $view);
        } else {
            $image_name = $uploaded_file_data['upload_data']['file_name'];
            // $this->resize_image($folder_name, $image_name, $destination_folder, '450', '666');
            $this->teachers_model->update_image($image_name, $column, $file_name);
            $this->trans_comp($column);
        }
    }
    
    private function trans_comp($column) {
        if ($column == 'teacher_image') {
            $this->teachers_model->transaction_complete();
            $this->session->set_flashdata('success', 'Teacher Added Succesfully');
            redirect(base_url('admin/Teachers/add_teacher_form'));
            // $data['success'] = "Added Successfully";
            // $data['content'] = 'admin/events/add_event';
            // $this->load->view('admin/admin_master', $data);
        } else {
            return TRUE;
        }
    }

    public function view_teachers() {
        $data['content'] = 'admin/teachers/view_teachers';
        $condition = array('status!='=> 3);
        $data['teachers'] = $this->teachers_model->select($condition,'','teachers');

        $this->load->view('admin/admin_master', $data);
    }

    public function edit_teacher($id)
    {
        $data['content'] = 'admin/teachers/edit_teacher';
        $data['teacher'] = $this->teachers_model->select_row(base64_decode($id),'id','teachers');
        $this->load->view('admin/admin_master', $data);
    }

    public function update_teacher($id)
    {
        $id = base64_decode($id);

        if($this->_validate() === true) {
            $name = $this->input->post('teacher_name');
            $details = $this->input->post('teacher_details');
            $address = $this->input->post('teacher_address');
            $city = $this->input->post('teacher_city');
            $contact = $this->input->post('teacher_contact');
            $qualification = $this->input->post('teacher_qualification');
            $facebook = $this->input->post('facebook_id');
            $instagram = $this->input->post('instagram_id');
            $youtube = $this->input->post('youtube_id');
            $twitter = $this->input->post('twitter_id');
        
            $data = array(
                "name" => $name,
                "detail" => $details,
                "address" => $address,
                "city" => $city,
                "contact_number" => $contact,
                "qualification" => $qualification,
                "facebook" => $facebook,
                "instagram" => $instagram,
                "youtube" => $youtube,
                "twitter" => $twitter,
                'updated_at'=>date('Y-m-d H:i:s')
            );

            $this->teachers_model->update($data, "id = $id", 'teachers');
            $this->check_files($id);
        }
        else{
            $teacher = $this->teachers_model->select_row($id, 'id', 'teachers');

            $data = array(
                'content' => 'admin/teachers/edit_teacher',
                'teacher' => $teacher,
            );

            $this->load->view('admin/admin_master', $data);
        }
    }

    public function check_files($id) {
        if ($_FILES['teacher_image']['name'] != '') {
            $file_name = $id;
            $field_name = 'teacher_image';
            $folder_name = 'teacher_images';
            $this->insert_image_edit('', '', 'gif|jpg|png', $field_name, $folder_name, $file_name, 'teacher_image', 'edit_teacher', $id);
        }
        else {
            $this->session->set_flashdata('success', 'Updated Successfully');
            redirect(base_url() . 'admin/Teachers/view_teachers');
        }
    }

    private function insert_image_edit($max_height, $max_width, $allowed_types, $field_name, $folder_name, $file_name, $column, $view, $id) {
        $uploaded_file_data = $this->do_upload($max_height, $max_width, $allowed_types, $field_name, $folder_name, $file_name);
        if (isset($uploaded_file_data['error'])) {
            $data['content'] = 'admin/teachers/'.$view;
            $data['teacher'] = $this->teachers_model->select_row($id, 'id', 'teachers');
            $data['image_error'] = $uploaded_file_data['error'];
            $this->load->view('admin/admin_master', $data);
        } else {
            $image_name = $uploaded_file_data['upload_data']['file_name'];
            $sd = $this->teachers_model->update_image($image_name, $column, $file_name);
            $this->trans_comp_edit($column);
        }
    }

    private function trans_comp_edit($column) {
        if ($column == 'teacher_image') {
            $this->session->set_flashdata('success', 'Updated Successfully');
            redirect(base_url() . 'admin/Teachers/view_teachers');
        } else {
            //die('hello');
            return TRUE;
        }
    }

    public function change_status($status = '', $id = '', $assignment = '') {
        if($assignment == ''){
            if (base64_decode($status) == '1') {
                $set = array('status' => 0,'updated_at'=>date('Y-m-d H:i:s'));
                $this->teachers_model->update_teacher_status($set, base64_decode($id), 'id', 'teachers');

                $set = array('status' => 0,'updated_at'=>date('Y-m-d H:i:s'));
                $this->teachers_model->update_teacher_status($set, base64_decode($id), 'teacher_id', 'offered_courses');

                $this->session->set_flashdata('success', 'Updated Successfully');
                redirect('admin/Teachers/view_teachers');
            } elseif (base64_decode($status) == '0') {
                $set = array('status' => 1,'updated_at'=>date('Y-m-d H:i:s'));
                $this->teachers_model->update_teacher_status($set, base64_decode($id), 'id', 'teachers');

                $teacher_id = base64_decode($id);
                $where = "teacher_id='$teacher_id'";
                $rows = $this->teachers_model->get_rows_status($where);
                foreach($rows as $row){
                    if($row->semester_course_status == 1 ) {
                        $set = array('status' => 1,'updated_at'=>date('Y-m-d H:i:s'));
                        $this->teachers_model->update_teacher_status($set, base64_decode($id), 'teacher_id', 'offered_courses');
                    }
                }
                $this->session->set_flashdata('success', 'Updated Successfully');
                redirect('admin/Teachers/view_teachers');
            } else {
                // $data['fail'] = 'Wrong Value';
                $this->session->set_flashdata('fail', 'Wrong Value');
                redirect('admin/Teachers/view_teachers');
            }
        }
        else {
            if (base64_decode($status) == '1') {
                $set = array('status' => 0,'updated_at'=>date('Y-m-d H:i:s'));
                $this->teacherCourse_model->update_teacher_course_status($set, base64_decode($id), 'id', 'offered_courses');
                $this->session->set_flashdata('success', 'Updated Successfully');
                redirect('admin/Teachers/view_assigned_courses');
            } elseif (base64_decode($status) == '0') {
                $decoded_id = base64_decode($id);
                $where = "offered_courses.id='$decoded_id'";
                $semester = $this->teachers_model->get_semester_status($where);

                if($semester->semester_course_status == 1){
                    $set = array('status' => 1,'updated_at'=>date('Y-m-d H:i:s'));
                    $this->teacherCourse_model->update_teacher_course_status($set, base64_decode($id), 'id', 'offered_courses');
                    $this->session->set_flashdata('success', 'Updated Successfully');
                    redirect('admin/Teachers/view_assigned_courses');
                }
                else {
                    $this->session->set_flashdata('fail', 'The semester is not active so you cannot enable the particular course. Kindly enable the semester!');
                    redirect('admin/Teachers/view_assigned_courses');
                }
            } else {
                // $data['fail'] = 'Wrong Value';
                $this->session->set_flashdata('fail', 'Wrong Value');
                redirect('admin/Teachers/view_assigned_courses');
            }
        }
    }
    
    function delete_teacher($id) {
        $set = array('status' => 3,'updated_at'=>date('Y-m-d H:i:s'));
        $this->teachers_model->update_teacher_status($set, base64_decode($id), 'id', 'teachers');
        $assigned_offered_courses = $this->teachers_model->select(['teacher_id'=>base64_decode($id)],'','offered_courses');

        foreach ($assigned_offered_courses as $oc) {
            if ($oc->status != 3) {
                $this->teachers_model->update_teacher_status($set, $oc->id, 'id', 'offered_courses');
            }
        }

        $this->session->set_flashdata('success', 'Deleted Successfully');
        redirect('admin/Teachers/view_teachers');
    }

    public function assign_course_form($id)
    {
        $id = base64_decode($id);

        $teacher = $this->teachers_model->select_row($id, 'id', 'teachers');

        if($teacher->status == 1){
            $courses = $this->teachers_model->get_program_semester_course();

            // $where = "status!='0'";
            // $batches = $this->teachers_model->select($where,'','batches');

            $data = array(
                'teacher' => $teacher,
                'courses' => $courses,
                'content' => 'admin/teachers/assign_courses'
            );
            
            $this->load->view('admin/admin_master', $data);
        }
        else {
            $this->session->set_flashdata('fail','You are not allowed to assign a course for this teacher! Kindly enable.');
            redirect(base_url('admin/Teachers/view_teachers'));
        }
    }

    public function assign_course()
    { 
        $teacher_id = $this->input->post('teacher_id');
    
        $this->teachers_model->transaction_start();

        foreach ($_POST['courses'] as $course) {
            $data = array(
                'teacher_id' => $teacher_id,
                'semester_course_id' => $course,
            );

            $row = $this->teachers_model->get_already_assigned_courses(['teacher_id'=>$teacher_id, 'semester_course_id'=>$course,'status!='=>3]);

            if($row != 0){
                $this->session->set_flashdata('fail', 'The teacher has already been assigned a course.');
                redirect(base_url('admin/Teachers/view_teachers'));
            }
            else{
                $assign = $this->teachers_model->insert($data, 'offered_courses');
            }
            
        }

        $this->teachers_model->transaction_complete();

        if($assign){
            $this->session->set_flashdata('success','Courses Assigned Successfully!');
            redirect(base_url('admin/Teachers/view_teachers'));
        }
    }

    public function view_assigned_courses()
    {
        $where = "offered_courses.status!='3'";
        $rows = $this->teacherCourse_model->select_rows($where);

        $data = array(
            'content' => 'admin/teachers/view_assigned_courses',
            'assignment_details' => $rows
        );

        $this->load->view('admin/admin_master', $data);
    }

    public function edit_assigned_course($id)
    {
        $id = base64_decode($id);

        $where = "offered_courses.id='$id'";
        $row = $this->teacherCourse_model->get_course_details("$where");

        $where = "status!='0'";
        $teachers = $this->teachers_model->select($where, '', 'teachers');

        $where = "status!= '3' AND status!= '0'";
        $courses = $this->teachers_model->select($where,'','courses');

        // $where = "status!='0'";
        // $batches = $this->teachers_model->select($where,'','batches');

        $data = array(
            'content' => 'admin/teachers/edit_assigned_course',
            'teachers' => $teachers,
            'courses' => $courses,
            'assignment_details' => $row
        );

        $this->load->view('admin/admin_master', $data);
    }

    public function update_assigned_course($id)
    {
        $id = base64_decode($id);

        $data = array(
            'teacher_id' => $this->input->post('teacher'),
            'course_id' => $this->input->post('course'),
            'batch_id' => $this->input->post('batch'),
            'updated_at'=>date('Y-m-d H:i:s')
        );

        $where = "id = '$id'";
        $this->teachers_model->update($data, $where, 'offered_courses');

        $this->session->set_flashdata('success', 'Updated Succesfully');
        redirect(base_url('admin/Teachers/view_assigned_courses'));
    }

    private function _validate() {
        $this->form_validation->set_rules('teacher_name', 'Teacher Name', 'trim|required|regex_match[/^[a-zA-Z ]*$/]|min_length[4]|max_length[50]');
        $this->form_validation->set_rules('teacher_details', 'Teacher Details', 'trim|required|regex_match[/^[a-zA-Z0-9-_\/,. ]*$/]|min_length[100]|max_length[200]');
        $this->form_validation->set_rules('teacher_address', 'Teacher Address', 'trim|required|regex_match[/^[a-zA-Z0-9-_\/,. ]*$/]|min_length[4]|max_length[50]');
        $this->form_validation->set_rules('teacher_city', 'Teacher City', 'trim|required|regex_match[/^[a-zA-Z ]*$/]|min_length[4]|max_length[50]');
        $this->form_validation->set_rules('teacher_contact', 'Teacher Contact', 'trim|required|numeric|min_length[7]|max_length[13]');
        $this->form_validation->set_rules('facebook_id', 'Facebook Account', 'trim|required|valid_url');
        $this->form_validation->set_rules('instagram_id', 'Instagram Account', 'trim|valid_url');
        $this->form_validation->set_rules('youtube_id', 'Youtube Channel', 'trim|valid_url');
        $this->form_validation->set_rules('twitter_id', 'Twitter Account', 'trim|valid_url');

        if($this->form_validation->run() == TRUE) {
            return true;
        }
        else {
            return false;
        }
    }

}


?>