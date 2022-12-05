<?php 
defined('BASEPATH') or exit ('No direct script access allowed');


class Gallery_model extends MY_Model{

    public function __construct()
    {
        parent::__construct();
    }

    public function update_gallery_status($set, $id, $column, $table)
    {
        $where = array($column => $id);
        $this->db->update($table, $set, $where);
    }

    public function update_image($name,$column,$id) {
        $data = array($column => $name);
        $where = array('id' => $id);
        return $this->update($data,$where,'gallery');
        
    }

}


?>