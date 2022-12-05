<?php 
defined('BASEPATH') or exit ('No direct script access allowed');


class Events_model extends MY_Model{

    public function __construct()
    {
        parent::__construct();
    }

    public function update_event_status($set, $id, $column, $table)
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

    public function update_image($name,$column,$id) {
        $data = array($column => $name);
        $where = array('id' => $id);
        return $this->update($data,$where,'events');
        
    }

    public function get_other_events(){
        $this->db->select('*');
        $this->db->from('events');
        $this->db->limit(3);
        $this->db->order_by('id','DESC');
        $rows = $this->db->get()->result();
        return $rows;
    }


}


?>