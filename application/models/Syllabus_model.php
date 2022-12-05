<?php 
defined('BASEPATH') or exit ('No direct script access allowed');


class Syllabus_model extends MY_Model{

    public function __construct()
    {
        parent::__construct();
    }

    public function insert_course($table, $data)
    {
        $query = $this->db->insert($table, $data);
        return $query;
    }

    public function update_syllabus_status($set, $id, $column, $table)
    {
        $where = array($column => $id);
        $this->db->update($table, $set, $where);
    }

    public function get_rows_status($where = '')
    {
        $this->db->select('batches.status as batch_status');
        $this->db->from('teacher_course_assignment');
        $this->db->where($where);
        $this->db->join('batches', 'batches.id = teacher_course_assignment.batch_id');
        $row = $this->db->get()->result();
        return $row;
    }

   public function select_syllabus($where){
        $this->db->select('syllabus.*, courses.name as course_name');
        $this->db->from('syllabus');
        $this->db->join('courses','courses.id = syllabus.course_id');
        $this->db->where($where);
        $rows = $this->db->get()->result();
        return $rows;
   }

}


?>