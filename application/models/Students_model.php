<?php 
defined('BASEPATH') or exit ('No direct script access allowed');


class Students_model extends MY_Model{
 
    public function update_student_status($set, $id, $column, $table)
    {
        $where = array($column => $id);
        $this->db->update($table, $set, $where);
    }

}


?>