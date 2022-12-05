<?php

/**
 * @package	eshoppingstore
 * @author	Muzzammil Alam
 * @copyright	Copyright (c) 2016 - 2018, eshoppingstore
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @bayan Controller
 * Model for Bayanat
 * Dated: 7 - MAY - 2016
 */
Class WebServiceModel extends MY_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function  getWebServBayanat($table,$where,$count){
        $this->db->select('*,DATE_FORMAT(date,"%D %M %Y") as formatDate');
        $this->db->from($table);
        if($where != ''){
            $this->db->where($where);
        }
        $this->db->order_by('creation_date','DESC');
        $this->db->limit($count,0);
        $query = $this->db->get();
        return $query->result();
    }
    
     public function  getWebServBooks($table,$where,$count){
        $this->db->select('*,DATE_FORMAT(creation_date,"%D %M %Y") as formatDate');
        $this->db->from($table);
        if($where != ''){
            $this->db->where($where);
        }
        $this->db->order_by('creation_date','DESC');
        $this->db->limit($count,0);
        $query = $this->db->get();
        return $query->result();
    }

}

/* End of file Bayanat.php*/