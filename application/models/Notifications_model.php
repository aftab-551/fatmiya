<?php

/**
 * @package	eshoppingstore
 * @author	Muzzammil Alam
 * @copyright	Copyright (c) 2016 - 2018, MEKEENA
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @vehicle Controller
 * Model for Vehicles
 * Dated: 7 - MAY - 2016
 */
Class Notifications_model extends MY_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    public function get_all_notifications($table,$where) {
        $this->db->select('*');
        $this->db->from($table);
        if($where != ''){
            $this->db->where($where);
        }
        $this->db->order_by('id_notifications','DESC');
        $query = $this->db->get();
        return $query->result();
    }
    
    


}

/* End of file Vehicles.php*/