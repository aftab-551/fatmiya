<?php 
defined('BASEPATH') or exit ('No direct script access allowed');


class Lessons extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper(array('form'));
        $this->load->library(array('form_validation'));
        $this->load->model(array('lessons_model','syllabus_model','login_model'));
        if ($this->login_model->loggedIn() == false) {
            redirect('admin/Login');
        }
    }

    public function lesson_form($offered_course_id,$course_id){
        // Get the current id of offered course
        // Get the course id from the offered course table
        // Check if the course id is available in the syllabus table
        // As well as check if the syllabus is assigned or not
        // If it is not assigned, add all the records to the lessons table with the offered course id.
        $offered_course_id = base64_decode($offered_course_id);
        $course_id = base64_decode($course_id);

        $syllabus = $this->lessons_model->get_syllabus(['offered_courses.id'=>$offered_course_id, 'syllabus.status!='=>0]);
        
        foreach($syllabus as $s) {
            $this->db->select('*');
            $this->db->from('lessons');
            $this->db->where(['offered_course_id'=>$offered_course_id, 'syllabus_id'=>$s->id]);
            $lesson = $this->db->get()->row();

            $data = array(
                'offered_course_id' => $offered_course_id,
                'syllabus_id' => $s->id,
                'title' => $s->title,
                'description' => $s->description,
                'week_number' => $s->week_number,
            );

            if($lesson == ''){
                $this->lessons_model->insert($data, 'lessons');
            }
        }
        
        $data['content'] = 'admin/lessons/add_lesson';
        $data['offered_course_id'] = $offered_course_id;
        $this->load->view('admin/admin_master', $data);
    }

    public function add_lesson($course_id) {
        if($this->input->post()){
            if($this->_validate() === true){
                $offered_course_id = base64_decode($course_id);
                $title = $this->input->post('title');
                $desc = $this->input->post('short_desc');
                $week_number = $this->input->post('week_number');
                
                $data = array( 
                    'offered_course_id' => $offered_course_id,
                    'title' => $title,
                    'description' => $desc,
                    'week_number' => $week_number,
                );

                $this->lessons_model->insert($data, 'lessons');

                $data['offered_course_id'] = base64_decode($course_id);
                $data['success'] = 'Chapter addedd successfully!';
                $data['content'] = 'admin/lessons/add_lesson';
                $this->load->view('admin/admin_master', $data);
            }
            else{
                $data['offered_course_id'] = base64_decode($course_id);
                $data['content'] = 'admin/lessons/add_lesson';
                $this->load->view('admin/admin_master', $data);
            }
        }
        else{
            $data['offered_course_id'] = base64_decode($course_id);
            $data['content'] = 'admin/lessons/add_lessons';
            $this->load->view('admin/admin_master', $data);
        }
    }


    public function view_lessons() {
        $data['content'] = 'admin/lessons/view_lessons';
        $condition = array('lessons.status!='=> 3);
        $data['lessons'] = $this->lessons_model->select_rows($condition);
        $this->load->view('admin/admin_master', $data);
    }
    public function view_course_detail() {
        $data['content'] = 'admin/lessons/view_course_detail';
        $data['details'] = $this->lessons_model->get_course_detail();
        $this->load->view('admin/admin_master', $data);
    }

    public function edit_lesson($id)
    {
        $data['content'] = 'admin/lessons/edit_lesson';
        $data['lesson'] = $this->lessons_model->select_row(base64_decode($id),'id','lessons');
        $this->load->view('admin/admin_master', $data);
    }
    public function edit_course_detail($id)
    {
        $data['content'] = 'admin/lessons/edit_course_detail';
        $data['detail'] = $this->lessons_model->select_row(base64_decode($id),'id','course_detail');
        $this->load->view('admin/admin_master', $data);
    }

    public function update_lesson($id)
    {
        $id = base64_decode($id);
        if($this->_validate() === true) {
            $data = array( 
                'title' => $this->input->post('title'),
                'description' => $this->input->post('short_desc'),
                'week_number' => $this->input->post('week_number'),
                'updated_at'=>date('Y-m-d H:i:s')
            );

            $this->security->xss_clean($data);

            $this->lessons_model->update($data, "id = $id", 'lessons');
            $this->session->set_flashdata('success','Lesson Updated Successfully');

            redirect(base_url('admin/Lessons/view_lessons/'.rtrim(base64_encode($id),'=')));
        }
        else{
            $data['content'] = 'admin/lessons/edit_lesson';
            $data['lesson'] = $this->lessons_model->select_row($id,'id','lessons');
            $this->load->view('admin/admin_master', $data);
        }
    }
    public function update_course_detail($id)
    {
        $id = base64_decode($id);
        if($this->_validateDetail() === true) {
            $data = array( 
                'activity' => $this->input->post('activity'),
                'activity_name' => $this->input->post('activityname'),
                'marks' => $this->input->post('marks'),
                'percentage' => $this->input->post('percent'),
                'updated_at'=>date('Y-m-d H:i:s')
            );

            $this->security->xss_clean($data);

            $this->lessons_model->update($data, "id = $id", 'course_detail');
            $this->session->set_flashdata('success','Lesson Updated Successfully');

            redirect(base_url('admin/Lessons/view_course_detail/'.rtrim(base64_encode($id),'=')));
        }
        else{
            $data['content'] = 'admin/lessons/edit_course_detail';
            $data['detail'] = $this->lessons_model->select_row(base64_decode($id),'id','course_detail');
            $this->load->view('admin/admin_master', $data);
        }
    }

    public function change_status($status = '', $id = '') {
        if (base64_decode($status) == '1') {
            $set = array('status' => 0,'updated_at'=>date('Y-m-d H:i:s'));
            $this->lessons_model->update_lesson_status($set, base64_decode($id), 'id', 'lessons');
            $this->session->set_flashdata('success', 'Updated Successfully');
            redirect('admin/Lessons/view_lessons');
        } elseif (base64_decode($status) == '0') {
            $set = array('status' => 1,'updated_at'=>date('Y-m-d H:i:s'));
            $this->lessons_model->update_lesson_status($set, base64_decode($id), 'id', 'lessons');
            $this->session->set_flashdata('success', 'Updated Successfully');
            redirect('admin/Lessons/view_lessons');
        } else {
            // $data['fail'] = 'Wrong Value';
            $this->session->set_flashdata('fail', 'Wrong Value');
            redirect('admin/Lessons/view_lessons');
        }
    }
    
    function delete_lesson($id) {
        $id = base64_decode($id);
        $set = array('status' => 3,'updated_at'=>date('Y-m-d H:i:s'));
        $this->lessons_model->update_lesson_status($set, $id, 'id', 'lessons');
        $this->lessons_model->update_lesson_status($set, $id, 'lesson_id', 'sub_lessons');
        $this->session->set_flashdata('success', 'Deleted Successfully');
        redirect('admin/Lessons/view_lessons');
    }
    function delete_course_detail($id) {
        $id = base64_decode($id);
        $set = array('status' => 3,'updated_at'=>date('Y-m-d H:i:s'));
        $this->lessons_model->update_lesson_status($set, $id, 'id', 'course_detail');
        $this->session->set_flashdata('success', 'Deleted Successfully');
        redirect('admin/Lessons/view_course_detail');
    }
    
    private function _validate($sub_lesson = false) {

        if(! $sub_lesson){
            $this->form_validation->set_rules('title', 'Title', 'trim|required|regex_match[/^[a-zA-Z- ]*$/]|min_length[4]|max_length[75]');
            $this->form_validation->set_rules('short_desc', 'Description', 'trim|required|min_length[10]|max_length[150]');
            $this->form_validation->set_rules('week_number', 'Week Number', 'trim|required|min_length[1]|max_length[3]');
        }
        else {
            $this->form_validation->set_rules('lesson_id', 'Lesson', 'trim|required');
            $this->form_validation->set_rules('title', 'Title', 'trim|required|regex_match[/^[a-zA-Z- ]*$/]|min_length[4]|max_length[75]');
            $this->form_validation->set_rules('video_url', 'Video URL', 'trim|required|valid_url');
        }

        if($this->form_validation->run() == TRUE) {
            return true;
        }
        else {
            return false;
        }
    }
    private function _validateDetail(){
        $this->form_validation->set_rules('course_id', 'course', 'trim|required');
        $this->form_validation->set_rules('activity', 'Activity', 'trim|required');
        $this->form_validation->set_rules('activityname', 'ActivityName', 'trim|required');
        $this->form_validation->set_rules('marks', 'Marks', 'trim|required');
        $this->form_validation->set_rules('percent', 'Percentage', 'trim|required');
        if($this->form_validation->run() == TRUE) {
            
            return TRUE;
        }
        else {
            return FALSE;
        }
    }

    //Sub lessons section start
    
    public function sub_lesson_form(){
        $data['lessons'] = $this->lessons_model->get_lessons();
        $data['content'] = 'admin/lessons/add_sub_lesson';
        $this->load->view('admin/admin_master', $data);
    }

    public function add_sub_lesson(){
        if($this->input->post()){
            
            if($this->_validate(true) === true){
                $title = $this->input->post('title');
                $video_url = $this->input->post('video_url');
                $lesson_id = $this->input->post('lesson_id');
                
                $data = array(
                    'lesson_id' => $lesson_id,
                    'title' => $title,
                    'video_url' => $video_url,
                );

                $this->lessons_model->insert($data, 'sub_lessons');

                $data['lessons'] = $this->lessons_model->get_lessons();
                $data['lesson_id'] = $this->input->post('lesson_id');
                $data['success'] = 'Sub Lesson addedd successfully!';
                $data['content'] = 'admin/lessons/add_sub_lesson';
                $this->load->view('admin/admin_master', $data);
            }
            else{
                $data['lessons'] = $this->lessons_model->get_lessons();
                $data['lesson_id'] = $this->input->post('lesson_id');
                $data['content'] = 'admin/lessons/add_sub_lesson';
                $this->load->view('admin/admin_master', $data);
            }
        }
        else{
            $data['lessons'] = $this->lessons_model->get_lessons();
            $data['content'] = 'admin/lessons/add_sub_lesson';
            $this->load->view('admin/admin_master', $data);
        }
    }
   
    public function add_course_detail(){
        if($this->input->post()){
           
            if($this->_validateDetail() == TRUE){
                
                $course_id = $this->input->post('course_id');
                $Activity = $this->input->post('activity');
                $ActivityName = $this->input->post('activityname');
                $marks = $this->input->post('marks');
                $percent = $this->input->post('percent');
                $activities = array();
                $activity_name = array();
                $score = array();
                $percentage = array();
                array_push($activities, $Activity);
                array_push($activity_name, $ActivityName);
                array_push($score, $marks);
                array_push($percentage, $percent);
                $row= $this->lessons_model->select_row($course_id,'course_code','course_detail');
                $data = array(
                    'course_code' => $course_id,
                    'activity' => serialize($activities),
                    'activity_name'=> serialize($activity_name),
                    'marks' => serialize($score),
                    'percentage' => serialize($percentage),
                );
                if($row == null){
                    $this->lessons_model->insert($data, 'course_detail');
                    $data['detail'] = $this->lessons_model->get_offered_courses();
                    $data['course_id'] = $this->input->post('course_id');
                    $data['success'] = 'Course detail addedd successfully!';
                    $data['content'] = 'admin/lessons/add_course_detail';
                    $this->load->view('admin/admin_master', $data);
                }
                else{
                    
                    $activity = unserialize($row->activity);
                    $activity_names = unserialize($row->activity_name);
                    $mark = unserialize($row->marks);
                    $percentage1 = unserialize($row->percentage);
                    $id=$row->id;
                    
                    array_push($activity,$Activity);
                    array_push($activity_names,$ActivityName);
                    array_push($mark,$marks);
                    array_push($percentage1, $percent);
                    $s_data = array(
                        'activity' => serialize($activity),
                        'activity_name'=> serialize($activity_names),
                        'marks' => serialize($mark),
                        'percentage' => serialize($percentage1),
                    );
                    $this->lessons_model->update($s_data, "id = $id", 'course_detail');
                    $data['detail'] = $this->lessons_model->get_offered_courses();
                    $data['course_id'] = $this->input->post('course_id');
                    $data['success'] = 'Course detail addedd successfully!';
                    $data['content'] = 'admin/lessons/add_course_detail';
                    $this->load->view('admin/admin_master', $data);

                }
            }
            else{
                $data['detail'] = $this->lessons_model->get_offered_courses();
                $data['course_id'] = $this->input->post('course_id');
                $data['content'] = 'admin/lessons/add_course_detail';
                $this->load->view('admin/admin_master', $data);
            }
        }
        else{
            $data['detail'] = $this->lessons_model->get_offered_courses();
            $data['content'] = 'admin/lessons/add_course_detail';
            $this->load->view('admin/admin_master', $data);
        }
    }

    public function view_sub_lessons(){
        $sub_lessons = $this->lessons_model->get_sub_lessons();
        $data['sub_lessons'] = $sub_lessons;
        $data['content'] = 'admin/lessons/view_sub_lessons';
        $this->load->view('admin/admin_master', $data);
    }

    public function edit_sub_lesson($id)
    {
        $data['lessons'] = $this->lessons_model->get_lessons();
        $data['content'] = 'admin/lessons/edit_sub_lesson';
        $data['sl'] = $this->lessons_model->select_row(base64_decode($id),'id','sub_lessons');
        $this->load->view('admin/admin_master', $data);
    }

    public function update_sub_lesson($id)
    {
        $id = base64_decode($id);
        if($this->_validate(true) === true) {
            $title = $this->input->post('title');
            $video_url = $this->input->post('video_url');
            $lesson_id = $this->input->post('lesson_id');
            
            $data = array(
                'lesson_id' => $lesson_id,
                'title' => $title,
                'video_url' => $video_url,
                'updated_at'=>date('Y-m-d H:i:s')
            );

            $this->security->xss_clean($data);

            $this->lessons_model->update($data, "id = $id", 'sub_lessons');
            $this->session->set_flashdata('success','Sub Lesson Updated Successfully');

            redirect(base_url('admin/Lessons/view_sub_lessons'));
        }
        else{
            $data['lesson_id'] = $this->input->post('lesson_id');
            $data['lessons'] = $this->lessons_model->get_lessons();
            $data['content'] = 'admin/lessons/edit_sub_lesson';
            $data['sl'] = $this->lessons_model->select_row($id,'id','sub_lessons');
            $this->load->view('admin/admin_master', $data);
        }
    }

    function delete_sub_lesson($id) {
        $set = array('status' => 3,'updated_at'=>date('Y-m-d H:i:s'));
        $this->lessons_model->update_lesson_status($set, base64_decode($id), 'id', 'sub_lessons');
        $this->session->set_flashdata('success', 'Deleted Successfully');
        redirect('admin/Lessons/view_sub_lessons');
    }
}


?>