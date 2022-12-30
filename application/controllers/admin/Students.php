<?php 
defined('BASEPATH') or exit ('No direct script access allowed');


class Students extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper(array('form'));
        $this->load->library(array('form_validation','email'));
        $this->load->model(array('students_model','enrolledCourses_model','login_model','studentResult_model'));
        if ($this->login_model->loggedIn() == false) {
            redirect('admin/Login');
        }
    }

    public function view_unverified_students() {
        $data['content'] = 'admin/students/view_unverified_students';
        $condition = array('status='=> 0);
        $data['students'] = $this->students_model->select($condition,'','students');
        $this->load->view('admin/admin_master', $data);
    }

    public function view_verified_students() {
        $data['content'] = 'admin/students/view_verified_students';
        $condition = array('status='=> 1);
        $data['students'] = $this->students_model->select($condition,'','students');
        $this->load->view('admin/admin_master', $data);
    }

    public function view_enrolled_students() {
        $data['content'] = 'admin/students/view_enrolled_students';
        $data['course_details'] = $this->enrolledCourses_model->get_enrolled_students();
        $this->load->view('admin/admin_master', $data);
    }
    public function view_students_result1(){
        if($this->input->post()){
            $offeredcourseid=$this->input->post('courseid');
            $data = $this->enrolledCourses_model->student_result($offeredcourseid);
            if($data == true){
                $this->session->set_flashdata('success','SUCCESS');
                $data['content'] = 'admin/students/view_result_student';
                $data['result_data'] = $this->enrolledCourses_model->student_result($offeredcourseid);
                $this->load->view('admin/admin_master', $data);
            }
            else{
                $this->session->set_flashdata('fail','Your have entered Incorrect Course ID');
                $data['content'] = 'admin/students/view_student_result';
                $this->load->view('admin/admin_master', $data);
            }
        }
        else{
            $data['content'] = 'admin/students/view_student_result';
            $this->load->view('admin/admin_master', $data);
        }
       
    }
    public function view_semester_result(){
        if($this->input->post()){
            $student_id = $this->input->post('studentID');
            $semesterid=$this->input->post('semesterNO');
            $condition = array('marks.student_id'=> $student_id , 'marks.semester' => $semesterid);
            $data = $this->studentResult_model->student_result($condition);
            if($data == true){
                // $this->session->set_flashdata('success','SUCCESS');
                $data['result_data'] = $this->studentResult_model->student_result($condition);
                $this->load->view('student/template/header');
                $this->load->view('student/Result/studentresult',$data);
                $this->load->view('student/template/footer'); 
            }
            else{
                $this->session->set_flashdata('fail','Your have entered Incorrect Student ID and Semester Number');
                $data['content'] = 'admin/students/view_semester_result';
                $this->load->view('admin/admin_master', $data);
            }
        }
        else{
            $data['content'] = 'admin/students/view_semester_result';
            $this->load->view('admin/admin_master', $data);
        }
       
    }
    public function view_students_transcript(){
        if($this->input->post()){
            $student_id = $this->input->post('studentID');
            $data = $this->studentResult_model->student_detail($student_id);
            if($data == true){
                // $this->session->set_flashdata('success','SUCCESS');
                $data['student_id'] = $student_id;
                $this->load->view('student/template/header');
                $this->load->view('student/Result/student_transcript',$data);
                $this->load->view('student/template/footer'); 
            }
            else{
                $this->session->set_flashdata('fail','Your have entered Incorrect Student ID');
                $data['content'] = 'admin/students/view_student_transcript';
                $this->load->view('admin/admin_master', $data);
            }
        }
        else{
            $data['content'] = 'admin/students/view_student_transcript';
            $this->load->view('admin/admin_master', $data);
        }
       
    }

    
    public function edit_student_result($id,$courseid){
        $ID = base64_decode($id);
        $CourseID = base64_decode($courseid);
        $condition = array('marks.student_id' => $ID , 'marks.offered_course_id' => $CourseID);
        $data['id'] = $ID;
        $data['courseid'] = $CourseID;
        $data['content'] = 'admin/students/edit_student_result';
        $data['result_data'] = $this->enrolledCourses_model->select_student($condition);
        // $data['result_data'] = $this->enrolledCourses_model->student_result();
        $this->load->view('admin/admin_master', $data);
        
    }
    public function update_student_result($id,$courseid){
        $ID = base64_decode($id);
        $CourseID = base64_decode($courseid);
        $condition = array('marks.student_id' => $ID , 'marks.offered_course_id' => $CourseID);
        if($this->input->post()){
            $marks = serialize($this->input->post('marks'));
            $mark= unserialize($marks);
            
            $grand_total =0;
            $course_detail = $this->enrolledCourses_model->select_student($condition);
            foreach( $course_detail as $course){
                $number= unserialize($course->marks);
                $percentage = unserialize($course->percentage);
                $courseid = $course->offered_course_id;
            }
            for($i=0; $i< sizeof($mark); $i++){
                $grand_total = $grand_total + ($mark[$i]/$number[$i] * $percentage[$i]);
            }
            $grade = $this->grade($grand_total);
            $data = array(
                'obtained_percentage' => $marks,
                'grand_total' => $grand_total,
                'grade'   => $grade,            
            );
            // $this->security->xss_clean($data);
            $this->enrolledCourses_model->update($data, $condition, 'marks');
            $this->session->set_flashdata('success','Marks Updated Successfully');
            $data['content'] = 'admin/students/view_result_student';
            $data['result_data'] = $this->enrolledCourses_model->student_result($CourseID);
            $this->load->view('admin/admin_master', $data);
    }
        else{
            $course_detail = $this->enrolledCourses_model->select_student($condition);
            foreach($course_detail as $course){
                $offeredcourseid = $course->offered_course_id;
            }
            $data['content'] = 'admin/students/view_result_student';
            $data['result_data'] = $this->enrolledCourses_model->student_result($offeredcourseid);
            $this->load->view('admin/admin_master', $data);
        }
    }
    

    public function view_deactive_students() {
        $data['content'] = 'admin/students/view_deactive_students';
        $condition = array('status='=> 3);
        $data['students'] = $this->students_model->select($condition,'','students');
        $this->load->view('admin/admin_master', $data);
    }

    public function change_status($status = '', $id = '') {
        if (base64_decode($status) == '1') {
            $set = array('status' => 3,'updated_at'=>date('Y-m-d H:i:s'));
            $this->students_model->update_student_status($set, base64_decode($id), 'id', 'students');
            $this->session->set_flashdata('success', 'Deactivated Successfully');
            redirect(base_url().'admin/Students/view_verified_students');
        } elseif (base64_decode($status) == '0') {
            // Generate a random password
            // Sent an email to the student
            // The email should contain the student_id and password
            $bytes = openssl_random_pseudo_bytes(4);
            $pwd = bin2hex($bytes);

            $row = $this->students_model->select_row(base64_decode($id), 'id', 'students');

            $config = Array(
                    'protocol' => 'smtp',
                    'smtp_host' => 'mail.fatimiya.com',
                    'smtp_port' => 25,
                    'smtp_user' => 'info@fatimiya.com',
                    'smtp_pass' => 'I~K;5}=p?7k~',
                    'mailtype' => 'html',
                    'wordwrap' => true,
                    'charset' => 'iso-8859-1'
            );

            $this->email->initialize($config);

            $this->email->from('info@fatimiya.com', 'Fatimiya Islamic Center');
            $this->email->to("$row->email");
            // $this->email->cc('another@another-example.com');
            // $this->email->bcc('them@their-example.com');

            $this->email->subject('Account Verified');
            $this->email->message("Congratulations, Your account has been verified.\nYour Student Id is: $row->student_id\nYour Password is: $pwd\nYou can now log in using your Student Id and Password\nMake sure to change your password on your first login attempt! :)");
            // $this->email->message('Your Student Id is: '."$row->student_id");
            // $this->email->message('Your Password is: '."$pwd");
            // $this->email->message('You can now log in using your Student Id and Password');
            $email = $this->email->send();

            if(! $email){
                show_error($this->email->print_debugger());
                $this->session->set_flashdata('fail','Account not verified, Invalid Email Address');
                // redirect('admin/Students/view_unverified_students');
            }
            else {
                $set = array('password'=>$this->encryption($pwd),'status' => 1,'updated_at'=>date('Y-m-d H:i:s'));
                $this->students_model->update_student_status($set, base64_decode($id), 'id', 'students');
                $this->session->set_flashdata('success', 'Verified Successfully');
                redirect(base_url().'admin/Students/view_unverified_students');
            }

        } elseif (base64_decode($status) == '3') {
            $set = array('status' => 1,'updated_at'=>date('Y-m-d H:i:s'));
            $this->students_model->update_student_status($set, base64_decode($id), 'id', 'students');
            $this->session->set_flashdata('success', 'Activated Successfully');
            redirect(base_url().'admin/Students/view_deactive_students');
        } else {
            // $data['fail'] = 'Wrong Value';
            $this->session->set_flashdata('fail', 'Wrong Value');
            redirect(base_url().'admin/Students/view_unverified_studnets');
        }
    }

    public function registration_form()
    {
        $data['content'] = 'admin/students/register_student';
        $this->load->view('admin/admin_master', $data);
    }

    public function register_student()
    {
        if($this->input->post()){
            if($this->_validate() == true){
                $name = $this->input->post('name');
                $email = $this->input->post('email');
                $address = $this->input->post('address');
                $contact = $this->input->post('contact');
                $qualification = $this->input->post('qualification');
                $password = $this->encryption($this->input->post('password')) ;

                $data = array(
                    'name' => $name,
                    'email' => $email,
                    'password' => $password,
                    'address' => $address,
                    'contact_number' => $contact,
                    'qualification' => $qualification,
                );

                $this->login_model->insert($data, 'students');

                $this->session->set_flashdata('success', 'The account has been registered successfully.');
                redirect(base_url('admin/Students/registration_form'));

            }
            else{
                $this->load->view('admin/students/register_student');
            }
        }
        else{
            $this->load->view('admin/students/register_student');
        }
    }

    private function _validate() {
        $this->form_validation->set_rules('name', 'Name', 'trim|required|regex_match[/^[a-zA-Z ]*$/]|min_length[4]|max_length[50]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[students.email]');
        $this->form_validation->set_rules('address', 'Address', 'trim|required|regex_match[/^[a-zA-Z0-9-_\/,. ]*$/]|min_length[4]|max_length[50]');
        $this->form_validation->set_rules('contact', 'Contact', 'trim|required|regex_match[/^((\+92)?(0092)?(92)?(0)?)(3)([0-9]{9})$/]|min_length[4]|max_length[50]');
        $this->form_validation->set_rules('qualification', 'Qualification', 'trim|required|regex_match[/^[a-zA-Z-\. ]*$/]|min_length[4]|max_length[50]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[20]');
        $this->form_validation->set_rules('password_conf', 'Password Confirmation', 'trim|required|matches[password]|min_length[6]|max_length[20]');

        if($this->form_validation->run() == TRUE) {
            return true;
        }
        else {
            return false;
        }
    }

}


?>