<?php 
defined('BASEPATH') or exit ('No direct script access allowed');


class TeacherCourse_model extends MY_Model{
    
    public function __construct()
    {
        parent::__construct();
    }

    public function select_rows($where = NULL)
    {
        $this->db->select('offered_courses.status as status ,offered_courses.id as id ,teachers.name as teacher_name, teachers.id as teacher_id, courses.id as course_id, courses.name as course_name, programs.name as program_name, semester.semester_number,');
        $this->db->from('offered_courses');
        if ($where != null) {
            $this->db->where($where);
        }
        $this->db->join('teachers','teachers.id = offered_courses.teacher_id');
        $this->db->join('semester_courses','semester_courses.id = offered_courses.semester_course_id');
        $this->db->join('courses','courses.id = semester_courses.course_id');
        $this->db->join('semester','semester.id = semester_courses.semester_id');
        $this->db->join('programs','programs.id = semester.program_id');
        // $this->db->join('batches','batches.id = offered_courses.batch_id');
        
        if($where == null){
            $rows = $this->db->get()->result();
            return $rows;
        }
        else {
            $rows = $this->db->get()->result();
            return $rows;
            // $row = $this->db->get()->row();
            // return $row;
        }
        
    }

    public function get_course_details($where = NULL){
        $this->db->select('offered_courses.status as status ,offered_courses.id as id ,teachers.name as teacher_name, teachers.id as teacher_id, courses.id as course_id, courses.name as course_name');
        $this->db->from('offered_courses');
        if ($where != null) {
            $this->db->where($where);
        }
        $this->db->join('teachers','teachers.id = offered_courses.teacher_id');
        $this->db->join('semester_courses','semester_courses.id = offered_courses.semester_course_id');
        $this->db->join('courses','courses.id = semester_courses.course_id');
        // $this->db->join('batches','batches.id = offered_courses.batch_id');
        
        $row = $this->db->get()->row();
        return $row;
    }

    public function update_teacher_course_status($set, $id, $column, $table)
    {
        $where = array($column => $id);
        $this->db->update($table, $set, $where);
    }
}


?>