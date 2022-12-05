<?php 
defined('BASEPATH') or exit ('No direct script access allowed');


class Tags_model extends MY_Model{

    public function __construct()
    {
        parent::__construct();
    }

    public function update_tag_status($set, $id, $column, $table)
    {
        $where = array($column => $id);
        $this->db->update($table, $set, $where);
    }

}


?>