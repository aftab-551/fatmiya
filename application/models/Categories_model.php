<?php

/**
 * @package	eshoppingstore
 * @author	Muzzammil Alam
 * @copyright	Copyright (c) 2016 - 2018, eshoppingstore
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @category Controller
 * Model for Categories
 * Dated: 7 - MAY - 2016
 */
Class Categories_model extends MY_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function update_image($name,$column,$id) {
        $data = array($column => $name);
        $where = array('id_categories' => $id);
        $this->update($data,$where,'es_categories');
    }

    public function get_all_categories($table,$where) {
        $this->db->select('*');
        $this->db->from($table);
        if($where != ''){
            $this->db->where($where);
        }
        $this->db->order_by('status','DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function update_category_status($set,$cid,$column,$table) {
        $where = array($column => $cid);
        $this->update($set, $where, $table);
    }

    public function get_category_byid($category_id,$column,$table) {
       $query = $this->db->get_where($table,array($column=>$category_id,'status'=>1));
       return $query->result();
    }

    public function get_all_sub_categories($table) {
        $this->db->select('sc.*,c.name AS category,c.category_type AS category_type');
        $this->db->from($table.' sc');
        $this->db->join('es_categories c','sc.id_category = c.id_categories');
        $this->db->where('sc.status !=',3);
        $this->db->order_by('sc.status','DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_all_sub_sub_categories($table) {
        $this->db->select('ssc.*,sc.name as sub_category,c.name AS category');
        $this->db->from($table.' ssc');
        $this->db->join('es_sub_categories sc','ssc.id_sub_category = sc.id_sub_categories');
        $this->db->join('es_categories c','sc.id_category = c.id_categories');
        $this->db->where('ssc.status !=',3);
        $this->db->order_by('ssc.status','DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_category_by_id($id_cat,$cat_table,$cat_column_name){
        $this->db->select('*');
        $this->db->from($cat_table);
        $this->db->where(array('status' => 1, $cat_column_name => $id_cat));
        $query = $this->db->get();
        return $query->row();
    }

    public function get_category($cat_id){
        $this->db->select('*');
        $this->db->from('es_categories');
        $this->db->where('id_categories',$cat_id);
        $row = $this->db->get()->row();
        return $row;
    }

    function getShowHomepageCount() {
        $this->db->select('count(*) as total');
        $this->db->from('es_sub_categories');
        $this->db->where(array('status' => 1, 'show_on_homepage'=>1));
        $query = $this->db->get();
        $ret = $query->row();
        return $ret->total;
        
    }

    function getSubCatName($id) {
        $this->db->select('name');
        $this->db->from('es_sub_categories');
        $this->db->where(array('status' => 1, 'id_sub_categories'=>$id));
        $query = $this->db->get();
        $ret = $query->row();
        return $ret->name;
        
    }

    public function get_existing_category($where = ''){
        $this->db->select('*');
        $this->db->from('es_categories');
        $this->db->where($where);
        $this->db->where('status !=',3);
        $rows = $this->db->get()->num_rows();
        return $rows;
    }

}

/* End of file Categories.php*/