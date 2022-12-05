<?php

/**
 * @package	eshoppingstore
 * @author	Muzzammil Alam
 * @copyright	Copyright (c) 2016 - 2018, eshoppingstore
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @book Controller
 * Model for Books
 * Dated: 7 - MAY - 2016
 */
Class Books_model extends MY_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function update_image($name,$column,$id) {
        $data = array($column => $name);
        $where = array('id_books' => $id);
        $this->update($data,$where,'books');
    }

    public function search($value){
		$this->db->select('*');
		$this->db->from('books');
		$this->db->like('name', $value); 
		
		$query = $this->db->get();
		return $query->result();

	}
        
    public function get_all_books($table,$where) {
        $this->db->select('*');
        $this->db->from($table);
        if($where != ''){
            $this->db->where($where);
        }
        $this->db->order_by('id_books','DESC');
        $query = $this->db->get();
        return $query->result();
    }
    
    public function get_all_books_data($table,$where) {
        $this->db->select('id_books,book_image');
        $this->db->from($table);
        if($where != ''){
            $this->db->where($where);
        }
        $this->db->order_by('id_books','DESC');
        $query = $this->db->get();
        return $query->result();
    }
    
    public function get_filtered_books($where_type,$limit,$start) {
		if($limit != '')
		{
			$limit_check = "LIMIT $start,$limit";
		}else{
			$limit_check = '';
		}
		$sql = "SELECT ap.* FROM books ap 
		WHERE ap.status = 1 $where_type
		ORDER BY ap.creation_date DESC
		$limit_check";
		//echo $sql;die();
		$result = $this->db->query($sql);
		return $result->result();
	}
    
    public function update_book_status($set,$cid,$column,$table) {
        $where = array($column => $cid);
        $this->update($set, $where, $table);
    }

    public function get_book_byid($book_id,$column,$table) {
       $query = $this->db->get_where($table,array($column=>$book_id,'status'=>1));
       return $query->result();
    }

    public function get_all_sub_books($table) {
        $this->db->select('sc.*,c.name AS book');
        $this->db->from($table.' sc');
        $this->db->join('books c','sc.id_book = c.id_books');
        $this->db->where('sc.status !=',3);
        $this->db->order_by('sc.status','DESC');
        $query = $this->db->get();
        return $query->result();
    }
    
    public function get_all_sub_sub_books($table) {
        $this->db->select('ssc.*,sc.name as sub_book,c.name AS book');
        $this->db->from($table.' ssc');
        $this->db->join('es_sub_books sc','ssc.id_sub_book = sc.id_sub_books');
        $this->db->join('books c','sc.id_book = c.id_books');
        $this->db->where('ssc.status !=',3);
        $this->db->order_by('ssc.status','DESC');
        $query = $this->db->get();
        return $query->result();
    }
    public function get_book_by_id($id_cat,$cat_table,$cat_column_name){
        $this->db->select('*');
        $this->db->from($cat_table);
        $this->db->where(array('status' => 1, $cat_column_name => $id_cat));
        $query = $this->db->get();
        return $query->result();
    }
    
    
    function get_books_sub_categtories() {
        $this->db->select('distinct(sc.id_sub_categories),sc.name as sub_cat,sc.id_sub_categories');
        $this->db->from('books b');
        $this->db->join('es_sub_categories sc','sc.id_sub_categories= b.id_sub_categories');
        $this->db->where(['b.status'=>1,'sc.status'=>1]);
        $query = $this->db->get();
        return $query->result();
    }
    
    function incrementViews($id) {
        $this->db->where('id_books', $id);
        $this->db->set('views', 'views+1', FALSE);
        $this->db->update('books');
    }
    
    public function get_sub_category($id){
        $this->db->select('name, id_sub_categories');
        $this->db->from('es_sub_categories');
        $this->db->where('status',1);
        $this->db->where('id_category',$id);
        $rows = $this->db->get()->result();
        return $rows;
    }
    
    public function get_books_with_ajax_pagination($limit, $offset){
        $this->db->select('books.*, es_categories.name as category_name');
        $this->db->from('books');
        $this->db->join('es_categories','books.id_categories = es_categories.id_categories');
        $this->db->order_by('books.id_books','DESC');
        $this->load->model('login_model');
        if ($this->login_model->studentLoggedIn() == false) {
            $this->db->where('books.show_book',1);
        }
        $this->db->where('books.status',1);
        $this->db->limit($limit, $offset);
        $rows = $this->db->get()->result();
        return $rows;
    }


}

/* End of file Books.php*/