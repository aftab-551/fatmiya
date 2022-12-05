<?php 
defined('BASEPATH') or exit ('No direct script access allowed');


class Teachers_model extends MY_Model {
    public function __construct()
    {
        parent::__construct();
    }

    public function insert_course($table, $data)
    {
        $query = $this->db->insert($table, $data);
        return $query;
    }

    public function update_teacher_status($set, $id, $column, $table)
    {
        $where = array($column => $id);
        $this->db->update($table, $set, $where);
    }

    public function get_semester_status($where = '')
    {   
        $this->db->select('semester_courses.status as semester_course_status');
        $this->db->from('offered_courses');
        $this->db->join('semester_courses','semester_courses.id = offered_courses.semester_course_id');
        $this->db->where($where);
        $row = $this->db->get()->row();
        return $row;
    }

    public function get_rows_status($where = '')
    {
        $this->db->select('semester_courses.status as semester_course_status');
        $this->db->from('offered_courses');
        // $this->db->join('batches', 'batches.id = offered_courses.batch_id');
        $this->db->join('semester_courses','semester_courses.id = offered_courses.semester_course_id');
        $this->db->where($where);
        $row = $this->db->get()->result();
        return $row;
    }

    public function update_image($name,$column,$id) {
        $data = array($column => $name);
        $where = array('id' => $id);
        return $this->update($data,$where,'teachers');
        
    }
    
    public function get_program_semester_course() {
        $this->db->select('semester_courses.id, semester.semester_number, programs.name as program_name, courses.name as course_name');
        $this->db->from('semester_courses');
        $this->db->join('courses', 'courses.id = semester_courses.course_id');
        $this->db->join('semester', 'semester.id = semester_courses.semester_id');
        $this->db->join('programs', 'programs.id = semester.program_id');
        $this->db->order_by('programs.name', 'ASC');
        $this->db->order_by('semester.semester_number', 'ASC');
        $this->db->where('semester_courses.status',1);
        $rows = $this->db->get()->result();
        return $rows;
    }

    public function get_already_assigned_courses($where = ''){
        $this->db->select('*');
        $this->db->from('offered_courses');
        $this->db->where($where);
        $rows = $this->db->get()->num_rows();
        return $rows;
    }
}


?>