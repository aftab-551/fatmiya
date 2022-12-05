<?php 
defined('BASEPATH') or exit ('No direct script access allowed');


class Batches_model extends MY_Model{

    public function __construct()
    {
        parent::__construct();
    }

    public function insert_course($table, $data)
    {
        $query = $this->db->insert($table, $data);
        return $query;
    }

    public function update_batch_status($set, $id, $column, $table)
    {
        $where = array($column => $id);
        $this->db->update($table, $set, $where);
    }


}


?>