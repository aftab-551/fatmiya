<?php 
defined('BASEPATH') or exit ('No direct script access allowed');


class Courses_model extends MY_Model{

    public function __construct()
    {
        parent::__construct();
    }

    public function insert_course($table, $data)
    {
        $query = $this->db->insert($table, $data);
        return $query;
    }

    public function update_course_status($set, $id, $column, $table)
    {
        $where = array($column => $id);
        $this->db->update($table, $set, $where);
    }

    public function update_image($name,$column,$id) {
        $data = array($column => $name);
        $where = array('id' => $id);
        $this->update($data,$where,'courses');
    }

    public function get_rows_status($where = '')
    {
        $this->db->select('batches.status as batch_status');
        $this->db->from('offered_courses');
        $this->db->join('batches', 'batches.id = offered_courses.batch_id');
        $this->db->where($where);
        $row = $this->db->get()->result();
        return $row;
    }

    public function select_courses($where = '')
    {
        $this->db->select('courses.*, es_sub_categories.name as sub_cat, es_categories.name as cat');
        $this->db->from('courses');
        $this->db->join('es_sub_categories', 'es_sub_categories.id_sub_categories = courses.id_sub_category');
        $this->db->join('es_categories', 'es_categories.id_categories = es_sub_categories.id_category');
        $this->db->where($where);
        $row = $this->db->get()->result();
        return $row;
    }

    public function select_sub_cat()
    {
        $this->db->select('es_sub_categories.*,c.name AS category,c.category_type AS category_type');
        $this->db->from('es_sub_categories');
        $this->db->join('es_categories c','es_sub_categories.id_category = c.id_categories');
        $this->db->where('es_sub_categories.status =',1);
        $this->db->where('c.category_type =',1);
        $this->db->order_by('es_sub_categories.id_sub_categories','DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_lessons($where=''){
        $this->db->select('lessons.*');
        // $this->db->select('lessons.*,teachers.name as teacher_name, teachers.id as teacher_id, teachers.detail as teacher_detail, teachers.teacher_image as teacher_image, teachers.facebook as teacher_facebook,teachers.youtube as teacher_youtube,teachers.instagram as teacher_instagram,teachers.twitter as teacher_twitter, teachers.qualification as teacher_qualification, courses.id as course_id, courses.name as course_name, courses.long_description as course_longdescription, courses.intro_video_url as course_intro_video, batches.id as batch_id, batches.number as batch_number');
        $this->db->from('lessons');
        if ($where != null) {
            $this->db->where($where); 
        }
        $this->db->join('offered_courses','offered_courses.id = lessons.offered_course_id');
        $this->db->join('teachers','teachers.id = offered_courses.teacher_id');
        $this->db->join('semester_courses','semester_courses.id = offered_courses.semester_course_id');
        $this->db->join('courses','courses.id = semester_courses.course_id');
        // $this->db->join('batches','batches.id = offered_courses.batch_id');
        
        $rows = $this->db->get()->result();
        return $rows;
    }

    public function get_course($where = ''){
        $this->db->select('courses.*, offered_courses.id as offered_course_id');
        $this->db->from('offered_courses');
        if ($where != null) {
            $this->db->where($where);
        }
        $this->db->join('semester_courses','semester_courses.id = offered_courses.semester_course_id');
        $this->db->join('courses','courses.id = semester_courses.course_id');
        $rows = $this->db->get()->row();
        return $rows;
    }

    public function get_teacher($where = ''){
        $this->db->select('teachers.*');
        $this->db->from('offered_courses');
        if ($where != null) {
            $this->db->where($where); 
        }
        $this->db->join('teachers','teachers.id = offered_courses.teacher_id');
        $rows = $this->db->get()->row();
        return $rows;
    }

    public function get_recent_courses($where = ''){
        $this->db->select('courses.*, offered_courses.id as offered_course_id');
        $this->db->from('offered_courses');
        $this->db->join('semester_courses','semester_courses.id = offered_courses.semester_course_id');
        $this->db->join('courses','courses.id = semester_courses.course_id');
        $this->db->where($where);
        $this->db->limit(4);
        $this->db->order_by('id','DESC');
        $rows = $this->db->get()->result();
        return $rows;
    }
    
    public function get_sub_lessons($where = ''){
        $this->db->select('sub_lessons.*');
        $this->db->from('sub_lessons');
        $this->db->join('lessons', 'lessons.id = sub_lessons.lesson_id');
        $this->db->where($where);
        $rows = $this->db->get()->result();
        return $rows;
    }

    public function get_offered_courses_with_ajax_pagination($limit,$offset){
        $this->db->select('offered_courses.id as id, courses.id as course_id, courses.name as course_name, courses.short_description as course_shortdesc, courses.course_thumbnail as course_thumbnail');
        $this->db->from('offered_courses');
        $this->db->join('semester_courses','semester_courses.id = offered_courses.semester_course_id');
        $this->db->join('courses','courses.id = semester_courses.course_id');
        $this->db->where('offered_courses.status',1);
        $this->db->limit($limit, $offset);
        $this->db->order_by('offered_courses.id','DESC');
        $rows = $this->db->get()->result();
        return $rows;
    }

}


?>