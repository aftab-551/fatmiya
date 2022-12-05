<?php

/**
 * @package eshoppingstore
 * @author  Muzzammil Alam
 * @copyright   Copyright (c) 2016 - 2018, eshoppingstore
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @category Model
 * Model for Slider Controller
 * Dated: 7 - July - 2016
 */
Class Slider_model extends MY_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function update_image($name,$column,$id) {
        $data = array($column => $name);
        $where = array('id_slider' => $id);
        $this->update($data,$where,'es_slider');
    }

    public function get_all_sliders($table) {
        $status = 3;
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where(array('status !='=>$status,'type'=>1));
        $this->db->order_by('sortField','ASC');
        $query = $this->db->get();
        return $query->result();
    }
    
    public function get_all_right_images($table) {
        $status = 3;
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where(array('status !='=>$status,'type'=>2));
        $this->db->order_by('status','DESC');
        $query = $this->db->get();
        return $query->result();
    }
    


}

/* End of file sliders_model.php*/