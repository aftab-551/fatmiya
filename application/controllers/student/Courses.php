<?php

defined('BASEPATH') OR exit('No direct script access allowed');

Class Courses extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper(array('url', 'form'));
        $this->load->model(array('login_model','enrolledCourses_model','courses_model'));
        if ($this->login_model->studentLoggedIn() == false) {
            $this->session->set_flashdata('login_error',"Please login to enroll in a course. If you don't have any account register yourself first.");
            redirect('student/Login');
        }
    }

    public function view_courses() {
        $where = "offered_courses.status='1'";
        $rows = $this->enrolledCourses_model->select_rows($where);

        $data = array(
            'content' => 'student/courses/view_courses',
            'assignment_details' => $rows
        );

        $this->load->view('student/student_master', $data);
    }

    public function view_student_enrolled_courses(){
        $enrolled_courses = $this->enrolledCourses_model->get_student_enrolled_courses($this->session->userdata('id'));
        $data['courses'] = $enrolled_courses;
        $data['content'] = 'student/courses/view_student_enrolled_courses';
        $this->load->view('student/student_master', $data);
    }

    public function enroll_course($offered_course_id){
        $enrolled_courses = $this->enrolledCourses_model->get_student_enrolled_courses($this->session->userdata('id'));
        foreach($enrolled_courses as $courses){
            $semester=$courses->semester_number;
            $program= $courses->program_name;
        }
        $offered_course_id  = base64_decode($offered_course_id);
        $student_id = $this->session->userdata('id');

        $data = array(
            'offered_course_id' => $offered_course_id,
            'student_id' => $student_id,
        );
        $data_marks = array(
            'program'=>$program,
            'semester'=>$semester,
            'offered_course_id' => $offered_course_id,
            'student_id' => $student_id,
        );


        // $where = "teacher_course_id='$teacher_course_id' AND student_id='$student_id'";
        $row = $this->enrolledCourses_model->select($data,'','student_course_enrollment');
        if ($row != 0){
            $this->session->set_flashdata('fail', 'You are already enrolled in the particular course.');
            redirect(base_url('student/Courses/view_student_enrolled_courses'));
        }
        else {
            $this->enrolledCourses_model->insert($data, 'student_course_enrollment');
            $this->enrolledCourses_model->insert($data_marks, 'marks');
            $this->session->set_flashdata('success', 'Enrolled Succesfully.');
            redirect(base_url('student/Courses/view_student_enrolled_courses'));
        }
    }

    public function show_course_content($id){
        $offered_course_id = base64_decode($id);
        $lessons = $this->courses_model->get_lessons(['lessons.offered_course_id'=>$offered_course_id, 'lessons.status'=>1]);

        $sub_lessons = $this->courses_model->get_sub_lessons(['lessons.offered_course_id'=>$offered_course_id, 'sub_lessons.status'=>1]);

        // $data['content'] = 'student/courses/watch_lessons';
        $data['lessons'] = $lessons;
        $data['sub_lessons'] = $sub_lessons;
        $this->load->view('student/template/header');
        $this->load->view('student/lms/watch_lessons', $data);
        $this->load->view('student/template/footer');
    }

}

//End Login.php
