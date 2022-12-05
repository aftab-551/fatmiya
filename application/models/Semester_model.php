<?php 
defined('BASEPATH') or exit ('No direct script access allowed');


class Semester_model extends MY_Model{

    public function __construct()
    {
        parent::__construct();
    }

    public function update_semester_status($set, $id, $column, $table)
    {
        $where = array($column => $id);
        $this->db->update($table, $set, $where);
    }

    public function get_semesters(){
        $this->db->select('semester.*, programs.name');
        $this->db->from('semester');
        $this->db->join('programs','programs.id = semester.program_id');
        $this->db->where('semester.status!=',3);
        $this->db->order_by('programs.name','ASC');
        $this->db->order_by('semester.semester_number','ASC');
        $rows = $this->db->get()->result();
        return $rows;
    }
}


?>