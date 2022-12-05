<?php 
defined('BASEPATH') or exit ('No direct script access allowed');


class EnrolledPrograms_model extends MY_Model{
    
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

    public function get_student_enrolled_programs($student_id){
        $this->db->select('programs.name as program_name, programs.id as program_id');
        $this->db->from('student_program_enrollment');
        $this->db->join('programs','programs.id = student_program_enrollment.program_id');
        $this->db->where('student_program_enrollment.student_id',$student_id);
        $this->db->where('student_program_enrollment.status', 1);
        $rows = $this->db->get()->result();
        return $rows;
    }

    public function get_program_semesters($program_id){
        $this->db->select('programs.name as program_name, semester.semester_number, semester.id as semester_id, semester.start_date');
        $this->db->from('semester');
        $this->db->join('programs','programs.id = semester.program_id');
        $this->db->where('semester.program_id',$program_id);
        $this->db->where('semester.status', 1);
        $rows = $this->db->get()->result();
        return $rows;
    }

    public function get_program_courses($semester_id){
        $this->db->select('offered_courses.id as offered_course_id, courses.name as course_name, teachers.name as teacher_name');
        $this->db->from('offered_courses');
        $this->db->join('teachers','teachers.id = offered_courses.teacher_id');
        $this->db->join('semester_courses','semester_courses.id = offered_courses.semester_course_id');
        $this->db->join('courses','courses.id = semester_courses.course_id');
        $this->db->where('semester_courses.semester_id',$semester_id);
        $this->db->where('semester_courses.status', 1);
        $this->db->where('offered_courses.status', 1);
        $rows = $this->db->get()->result();
        return $rows;
    }

}


?>