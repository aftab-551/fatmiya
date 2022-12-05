<?php 
defined('BASEPATH') or exit ('No direct script access allowed');


class Semester_Courses_model extends MY_Model{

    public function __construct()
    {
        parent::__construct();
    }

    public function update_semester_course_status($set, $id, $column, $table)
    {
        $where = array($column => $id);
        $this->db->update($table, $set, $where);
    }

    public function get_program_semester($semester_id){
        $this->db->select('semester.semester_number, programs.name');
        $this->db->from('semester');
        $this->db->join('programs','programs.id = semester.program_id');
        $this->db->where('semester.id', $semester_id);
        $row = $this->db->get()->row();
        return $row;
    }

    public function get_semester_courses(){
        $this->db->select('semester.start_date, semester.end_date, semester.semester_number, semester_courses.status, semester_courses.id,  programs.id as p_id, programs.name as program_name, courses.name as course_name, courses.code as course_code');
        $this->db->from('semester_courses');
        $this->db->join('courses','courses.id = semester_courses.course_id');
        $this->db->join('semester','semester.id = semester_courses.semester_id');
        $this->db->join('programs','programs.id = semester.program_id');
        $this->db->where('semester_courses.status!=',3);
        // $this->db->order_by('p_id','DESC');
        $this->db->order_by('semester_number','ASC');
        $rows = $this->db->get()->result();
        return $rows;
    }

    public function get_program_semester_course($semester_course_id){
        $this->db->select('semester.semester_number, semester.id as semester_id, semester_courses.id, programs.name as program_name, courses.id as course_id, courses.name as course_name, courses.code as course_code');
        $this->db->from('semester_courses');
        $this->db->join('courses','courses.id = semester_courses.course_id');
        $this->db->join('semester','semester.id = semester_courses.semester_id');
        $this->db->join('programs','programs.id = semester.program_id');
        $this->db->where('semester_courses.id',$semester_course_id);
        $row = $this->db->get()->row();
        return $row;
    }
}


?>