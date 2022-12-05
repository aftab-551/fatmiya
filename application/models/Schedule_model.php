<?php

/**
 * @package	eshoppingstore
 * @author	Muhammad Salman Siddiqui
 * @copyright	Copyright (c) 2016 - 2018, MEKEENA
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @Schedule Controller
 * Model for Schedule
 * Dated: 7 - MAY - 2016
 */
Class Schedule_model extends MY_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    public function get_all_schedule($table,$where) {
        $this->db->select('*');
        $this->db->from($table);
        if($where != ''){
            $this->db->where($where);
        }
        $this->db->order_by('id','Asc');
        $query = $this->db->get();
        return $query->result();
    }
    
    


}

/* End of file Schedule_model.php*/