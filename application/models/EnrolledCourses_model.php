<?php 
defined('BASEPATH') or exit ('No direct script access allowed');


class EnrolledCourses_model extends MY_Model{
    public function __construct()
    {
        parent::__construct();
    }

    public function select_rows($where = NULL)
    {
        $this->db->select('offered_courses.status as status ,offered_courses.id as id ,teachers.name as teacher_name, teachers.id as teacher_id, courses.id as course_id, courses.name as course_name, courses.code as course_code');
        $this->db->from('offered_courses');
        $this->db->join('teachers','teachers.id = offered_courses.teacher_id');
        $this->db->join('semester_courses','semester_courses.id = offered_courses.semester_course_id');
        $this->db->join('courses','courses.id = semester_courses.course_id');
        if ($where != null) {
            $this->db->where($where);
        }
        $rows = $this->db->get()->result();
        return $rows;
    }

    public function get_student_enrolled_courses($student_id){
        $this->db->select('courses.name as course_name, offered_courses.id as offered_course_id, programs.name as program_name, semester.semester_number, teachers.name as teacher_name');
        $this->db->from('student_course_enrollment');
        $this->db->join('offered_courses','offered_courses.id = student_course_enrollment.offered_course_id');
        $this->db->join('teachers','teachers.id = offered_courses.teacher_id');
        $this->db->join('semester_courses','semester_courses.id = offered_courses.semester_course_id');
        $this->db->join('courses','courses.id = semester_courses.course_id');
        $this->db->join('semester','semester.id = semester_courses.semester_id');
        $this->db->join('programs','programs.id = semester.program_id');
        $this->db->where('student_course_enrollment.student_id',$student_id);
        $this->db->where('student_course_enrollment.status', 1);
        $rows = $this->db->get()->result();
        return $rows;
    }

    public function get_enrolled_students()
    {
        $this->db->select('student_course_enrollment.status as status, student_course_enrollment.id as id, students.first_name as student_firstname, students.last_name as student_lastname, offered_courses.id as teacher_course_id, teachers.name as teacher_name, teachers.id as teacher_id, courses.id as course_id, courses.name as course_name, courses.code as course_code,');
        $this->db->from('student_course_enrollment');
        $this->db->join('students', 'students.id = student_course_enrollment.student_id');
        $this->db->join('offered_courses','offered_courses.id = student_course_enrollment.offered_course_id');
        $this->db->join('teachers','teachers.id = offered_courses.teacher_id');
        $this->db->join('semester_courses','semester_courses.id = offered_courses.semester_course_id');
        $this->db->join('courses','courses.id = semester_courses.course_id');
        // $this->db->join('batches','batches.id = offered_courses.batch_id');
        
        $rows = $this->db->get()->result();
        return $rows;
    }
   
   
    public function student_result($id)
    {
        $this->db->select('marks.*, course_detail.activity_name as activity_name, course_detail.marks as marks , course_detail.percentage as percentage ,students.id as studentid, students.first_name as first_name, students.last_name as last_name ');
        $this->db->from('marks');
        $this->db->join('course_detail', 'course_detail.course_code = marks.offered_course_id');
        $this->db->join('students','students.id = marks.student_id');
        $this->db->where('marks.status',1);
        $this->db->where('marks.offered_course_id',$id);
        $rows = $this->db->get()->result();

        return $rows;
    }
    public function select_student($condition){
        $this->db->select('marks.*, course_detail.activity_name as activity_name, course_detail.marks as marks , course_detail.percentage as percentage ,');
        $this->db->from('marks');
        $this->db->join('course_detail', 'course_detail.course_code = marks.offered_course_id');
        $this->db->where($condition);
        // $this->db->where('marks.offered_course_id',$courseid);
        $rows = $this->db->get()->result();
        return $rows;

    }
    public function select_column(){
        $this->db->select('*');
        $this->db->from('marks');
        $rows = $this->db->get()->result();
        return $rows;
    }

}


?>