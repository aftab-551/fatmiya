<?php 
defined('BASEPATH') or exit ('No direct script access allowed');


class Blogs_model extends MY_Model{

    public function __construct()
    {
        parent::__construct();
    }

    public function update_blog_status($set, $id, $column, $table)
    {
        $where = array($column => $id);
        $this->db->update($table, $set, $where);
    }

    public function get_cat($id){
        $this->db->select('name, id_sub_categories');
        $this->db->from('es_sub_categories');
        $this->db->where('status',1);
        $this->db->where('id_category',$id);
        $rows = $this->db->get()->result();
        return $rows;
    }

    public function get_rows_status($where = '')
    {
        $this->db->select('batches.status as batch_status');
        $this->db->from('teacher_course_assignment');
        $this->db->where($where);
        $this->db->join('batches', 'batches.id = teacher_course_assignment.batch_id');
        $row = $this->db->get()->result();
        return $row;
    }

    public function update_image($name,$column,$id) {
        $data = array($column => $name);
        $where = array('id' => $id);
        return $this->update($data,$where,'blog_posts');
    }

    public function get_other_events(){
        $this->db->select('*');
        $this->db->from('events');
        $this->db->limit(3);
        $this->db->order_by('id','DESC');
        $rows = $this->db->get()->result();
        return $rows;
    }

    public function get_posts_with_ajax_pagination($limit, $offset){
        $this->db->select('blog_posts.*, es_sub_categories.name as sub_cat_name');
        $this->db->from('blog_posts');
        $this->db->join('es_sub_categories','blog_posts.sub_category_id = es_sub_categories.id_sub_categories');
        $this->db->limit($limit, $offset);
        $this->db->order_by('id','DESC');
        $this->db->where('blog_posts.status',1);
        $rows = $this->db->get()->result();
        return $rows;
    }

    public function get_recent_posts(){
        $this->db->from('blog_posts');
        $this->db->order_by('id','DESC');
        $this->db->limit('3');
        $this->db->where('status',1);
        $rows = $this->db->get()->result();
        return $rows;
    }

    public function get_blog_tags($where = ''){
        $this->db->select('tags.name as name');
        $this->db->from('posts_tags');
        $this->db->join('blog_posts','posts_tags.post_id = blog_posts.id');
        $this->db->join('tags','posts_tags.tag_id = tags.id');
        $this->db->where($where);
        $rows = $this->db->get()->result();
        return $rows;
    }

    public function get_post_details($slug){
        $this->db->select('blog_posts.*, users.first_name as first_name, users.last_name as last_name');
        $this->db->from('blog_posts');
        $this->db->join('users','blog_posts.user_id = users.user_id');
        $this->db->where('blog_posts.slug',$slug);
        $row = $this->db->get()->row();
        return $row;
    }

    public function get_blog_posts(){
        $this->db->select('blog_posts.*, users.first_name as user_first_name, users.last_name as user_last_name, es_sub_categories.name as sub_cat_name');
        $this->db->from('blog_posts');
        $this->db->join('users','blog_posts.user_id = users.user_id');
        $this->db->join('es_sub_categories','blog_posts.sub_category_id = es_sub_categories.id_sub_categories');
        $this->db->where('blog_posts.status!=',3);
        $row = $this->db->get()->result();
        return $row;
    }
}


?>