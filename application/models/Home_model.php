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
 * Model for Home
 * Dated: 6 - JUNE - 2016
 */
Class Home_model extends MY_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function get_sliders() {
        $this->db->select('*');
        $this->db->from($this->db->dbprefix('es_slider'));
        $this->db->where(['status'=>1]);
        $this->db->order_by('sortField', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_settings() {
        $this->db->select('*');
        $this->db->from($this->db->dbprefix('settings'));
        $this->db->where(['status'=>1]);
        $query = $this->db->get();
        return $query->row();
    }

    public function get_offered_courses(){
        $this->db->select('offered_courses.id as id, courses.id as course_id, courses.name as course_name, courses.short_description as course_shortdesc, courses.course_thumbnail as course_thumbnail');
        $this->db->from('offered_courses');
        $this->db->join('semester_courses','semester_courses.id = offered_courses.semester_course_id');
        $this->db->join('courses','courses.id = semester_courses.course_id');
        $this->db->where('offered_courses.status',1);
        $this->db->limit(3);
        $this->db->order_by('offered_courses.id','DESC');
        $rows = $this->db->get()->result();
        return $rows;
    }

    public function check_program($id, $column = '', $table)
    {
        $this->db->from($table);
        $where = array($column => $id);
        $this->db->where($where);
        $this->db->where('status',1);
        $row = $this->db->get()->row();
        return $row;
    }

    public function get_events() {
        $this->db->select('*');
        $this->db->from($this->db->dbprefix('events'));
        $this->db->where(['status'=>1]);
        $this->db->order_by('id', 'DESC');
        $this->db->limit(3);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_teachers() {
        $this->db->select('*');
        $this->db->from($this->db->dbprefix('teachers'));
        $this->db->where(['status'=>1]);
        $this->db->order_by('id', 'DESC');
        $this->db->limit(4);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_blog_posts(){
        $this->db->select('blog_posts.*, es_sub_categories.name as sub_cat_name');
        $this->db->from('blog_posts');
        $this->db->join('es_sub_categories','blog_posts.sub_category_id = es_sub_categories.id_sub_categories');
        $this->db->limit(3);
        $this->db->order_by('id','DESC');
        $this->db->where('blog_posts.status',1);
        $rows = $this->db->get()->result();
        return $rows;
    }

    public function get_books_and_articles() {
        $this->db->select('books.*, es_categories.name as category_name');
        $this->db->from('books');
        $this->db->join('es_categories','books.id_categories = es_categories.id_categories');
        $this->db->where(['books.status'=>1]);
        $this->db->order_by('books.id_books', 'DESC');
        $this->db->limit(3);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_footer_blog_posts(){
        $this->db->select('blog_posts.*, es_sub_categories.name as sub_cat_name');
        $this->db->from('blog_posts');
        $this->db->join('es_sub_categories','blog_posts.sub_category_id = es_sub_categories.id_sub_categories');
        $this->db->limit(2);
        $this->db->order_by('id','DESC');
        $this->db->where('blog_posts.status',1);
        $rows = $this->db->get()->result();
        return $rows;
    }

    public function get_categories() {
        $this->db->select('*');
        $this->db->from('es_categories');
        $this->db->where(array('status'=>1,'show_on_homepage'=>1));
        $query = $this->db->get();
        return $query->result();
    }

    public function get_books() {
        $this->db->select('*');
        $this->db->from('books');
        $this->db->where(array('status'=>1));
        $this->db->limit(3,0);
        $this->db->order_by('creation_date','DESC');
        $query = $this->db->get();
        return $query->result();
    }
    public function get_bayanat() {
        $this->db->select('b.id_bayanat,b.bayan_image');
        $this->db->from('bayanat b');
        $this->db->join('es_categories c','c.id_categories = b.id_categories');
        $this->db->where(array('b.status'=>1,'c.category_type'=>2));
        $this->db->limit(6,0);
        $this->db->order_by('b.creation_date','DESC');
        $query = $this->db->get();
        return $query->result();
    }
     public function get_bayanat_categories() {
        $this->db->select('*');
        $this->db->from('es_sub_categories');
        $this->db->where(array('status'=>1,'show_on_homepage'=>1));
        $this->db->order_by('updated','desc');
        $query = $this->db->get();
        return $query->result();
    }
    
    
    public function get_notifications() {
        $this->db->select('*,DAYNAME(date) as day_name,TIME_FORMAT( time, "%h:%i %p" ) as thetime,DATE_FORMAT(date,"%D %M %Y") as thedate');
        $this->db->from('notifications');
        $this->db->where(array('status'=>1));
        $this->db->limit(5,0);
        $this->db->order_by('creation_date','desc');
        $query = $this->db->get();
        return $query->result();
    }
	
    public function get_schedule() {
        $this->db->select('*');
        $this->db->from('schedule');
       // $this->db->order_by('id','desc');
        $query = $this->db->get();
        return $query->result();
    }
    
    public function set_askHazrat() {
        
    }
}

/* End of file Login_model.php*/