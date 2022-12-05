<?php 
defined('BASEPATH') or exit ('No direct script access allowed');


class Programs_model extends MY_Model{

    public function __construct()
    {
        parent::__construct();
    }

    public function update_program_status($set, $id, $column, $table)
    {
        $where = array($column => $id);
        $this->db->update($table, $set, $where);
    }

    public function update_image($name,$column,$id) {
        $data = array($column => $name);
        $where = array('id' => $id);
        return $this->update($data,$where,'programs');
    }

    public function get_programs(){
        $this->db->select('*');
        $this->db->from('programs');
        $this->db->where('programs.status!=',3);
        $rows = $this->db->get()->result();
        return $rows;
    }

    // Website
    public function get_semester_courses($where = NULL){
        $this->db->select('courses.name, semester_courses.semester_id');
        $this->db->from('semester_courses');
        $this->db->join('courses','courses.id = semester_courses.course_id');
        $this->db->join('semester','semester.id = semester_courses.semester_id');
        $this->db->join('programs','programs.id = semester.program_id');
        $this->db->where($where);
        $rows = $this->db->get()->result();
        return $rows;
    }

}


?>