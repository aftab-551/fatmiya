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
Class Bayanat_model extends MY_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function update_image($name,$column,$id) {
        $data = array($column => $name);
        $where = array('id_bayanat' => $id);
        $this->update($data,$where,'bayanat');
    }

    public function update_settings_image($name,$column,$id) {
        $data = array($column => $name);
        $where = array('id_settings' => $id);
        $this->update($data,$where,'settings');
    }
    
    public function get_all_bayanat_data($table,$where) {
        $this->db->select('id_bayanat,bayan_image');
        $this->db->from($table);
        if($where != ''){
            $this->db->where($where);
        }
        $this->db->order_by('creation_date','DESC');
        $query = $this->db->get();
        return $query->result();
    }
    
    public function get_all_bayanat($table,$where) {
        $this->db->select('*,DATE_FORMAT(date,"%D %M %Y") as formatDate');
        $this->db->from($table);
        if($where != ''){
            $this->db->where($where);
        }
        $this->db->order_by('creation_date','DESC');
        $query = $this->db->get();
        return $query->result();
    }
    function get_settings() {
        $this->db->select('*');
        $this->db->from('settings');
        $this->db->where(['status'=>1,'id_settings'=>1]);
        $query = $this->db->get();
        return $query->result();
    }
    public function update_bayan_status($set,$cid,$column,$table) {
        $where = array($column => $cid);
        $this->update($set, $where, $table);
    }
    public function get_bayan_byid($bayan_id,$column,$table) {
       $query = $this->db->get_where($table,array($column=>$bayan_id,'status'=>1));
       return $query->result();
    }
    public function get_all_sub_bayanat($table) {
        $this->db->select('sc.*,c.name AS bayan');
        $this->db->from($table.' sc');
        $this->db->join('bayanat c','sc.id_bayan = c.id_bayanat');
        $this->db->where('sc.status !=',3);
        $this->db->order_by('sc.status','DESC');
        $query = $this->db->get();
        return $query->result();
    }
    public function get_all_sub_sub_bayanat($table) {
        $this->db->select('ssc.*,sc.name as sub_bayan,c.name AS bayan');
        $this->db->from($table.' ssc');
        $this->db->join('es_sub_bayanat sc','ssc.id_sub_bayan = sc.id_sub_bayanat');
        $this->db->join('bayanat c','sc.id_bayan = c.id_bayanat');
        $this->db->where('ssc.status !=',3);
        $this->db->order_by('ssc.status','DESC');
        $query = $this->db->get();
        return $query->result();
    }
    public function get_bayan_by_id($id_cat,$cat_table,$cat_column_name){
        $this->db->select('*,DATE_FORMAT(date,"%D %M %Y") as formatDate');
        $this->db->from($cat_table);
        $this->db->where(array('status' => 1, $cat_column_name => $id_cat));
        $query = $this->db->get();
        return $query->result();
    }
    
    function incrementViews($id) {
        $this->db->where('id_bayanat', $id);
        $this->db->set('views', 'views+1', FALSE);
        $this->db->update('bayanat');
    }


}

/* End of file Bayanat.php*/