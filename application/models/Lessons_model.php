<?php 
defined('BASEPATH') or exit ('No direct script access allowed');


class Lessons_model extends MY_Model{

    public function __construct()
    {
        parent::__construct();
    }

    public function insert_row($data, $table){
        $table = $this->db->dbprefix($table);
        $this->db->where('');
        $query = $this->db->insert($table, $data);
        $var['inserted_id'] = $this->db->insert_id();
        $var['query'] = $query;
        return $var;
    }

    public function update_lesson_status($set, $id, $column, $table)
    {
        $where = array($column => $id);
        $this->db->update($table, $set, $where);
    }

    public function get_syllabus($where){
        $this->db->select('syllabus.*, offered_courses.id as offered_course_id');
        $this->db->from('offered_courses');
        $this->db->join('semester_courses','semester_courses.id = offered_courses.semester_course_id');
        $this->db->join('syllabus', 'syllabus.course_id = semester_courses.course_id');
        $this->db->where($where);
        $rows = $this->db->get()->result();
        return $rows;
    }

    public function select_rows($where = NULL)
    {
        $this->db->select('lessons.*, teachers.name as teacher_name, teachers.id as teacher_id, courses.id as course_id, courses.name as course_name, courses.code as course_code, programs.name as program_name, semester.semester_number');
        $this->db->from('lessons');
        $this->db->join('offered_courses', 'offered_courses.id = lessons.offered_course_id');
        $this->db->join('teachers','teachers.id = offered_courses.teacher_id');
        $this->db->join('semester_courses','semester_courses.id = offered_courses.semester_course_id');
        $this->db->join('courses','courses.id = semester_courses.course_id');
        $this->db->join('semester','semester.id = semester_courses.semester_id');
        $this->db->join('programs','programs.id = semester.program_id');
        if ($where != null) {
            $this->db->where($where);
        }
        $this->db->order_by('lessons.week_number', 'ASC');
        $this->db->order_by('lessons.offered_course_id', 'DESC');
        
        $rows = $this->db->get()->result();
        return $rows;
    }
    public function get_course_detail()
    {
        $this->db->select('course_detail.*, offered_courses.id as offered_courses_id ,teachers.name as teacher_name, teachers.id as teacher_id, courses.id as course_id, courses.name as course_name, courses.code as course_code, programs.name as program_name, semester.semester_number');
        $this->db->from('course_detail');
        $this->db->join('offered_courses', 'offered_courses.id = course_detail.course_code');
        $this->db->join('teachers','teachers.id = offered_courses.teacher_id');
        $this->db->join('semester_courses','semester_courses.id = offered_courses.semester_course_id');
        $this->db->join('courses','courses.id = semester_courses.course_id');
        $this->db->join('semester','semester.id = semester_courses.semester_id');
        $this->db->join('programs','programs.id = semester.program_id');
        $this->db->where('course_detail.status',1);
        $rows = $this->db->get()->result();
        return $rows;
    }
    public function get_offered_courses(){
        $this->db->select('offered_courses.id as offered_coursesid, courses.name as course_name, courses.code as course_code, programs.name as program_name, semester.semester_number');
        $this->db->from('offered_courses');
        $this->db->join('semester_courses','semester_courses.id = offered_courses.semester_course_id');
        $this->db->join('courses','courses.id = semester_courses.course_id');
        $this->db->join('semester','semester.id = semester_courses.semester_id');
        $this->db->join('programs','programs.id = semester.program_id');
        $this->db->distinct('offered_course.id');
        $this->db->where('offered_courses.status',1);
        $rows = $this->db->get()->result();
        return $rows;
    }

    public function get_lessons(){
        $this->db->select('lessons.*,offered_courses.id as offered_coursesid, courses.name as course_name, courses.code as course_code, programs.name as program_name, semester.semester_number as semester_number');
        $this->db->from('lessons');
        $this->db->join('offered_courses','offered_courses.id = lessons.offered_course_id');
        $this->db->join('semester_courses','semester_courses.id = offered_courses.semester_course_id');
        $this->db->join('courses','courses.id = semester_courses.course_id');
        $this->db->join('semester','semester.id = semester_courses.semester_id');
        $this->db->join('programs','programs.id = semester.program_id');
        $this->db->where('lessons.status',1);
        $rows = $this->db->get()->result();
        return $rows;
    }

    public function get_sub_lessons(){
        $this->db->select('sub_lessons.*, lessons.title as lesson_title, lessons.week_number as lesson_week_number, courses.name as course_name, courses.code as course_code, teachers.name as teacher_name, programs.name as program_name, semester.semester_number');
        $this->db->from('sub_lessons');
        $this->db->join('lessons','lessons.id = sub_lessons.lesson_id');
        $this->db->join('offered_courses','offered_courses.id = lessons.offered_course_id');
        $this->db->join('semester_courses','semester_courses.id = offered_courses.semester_course_id');
        $this->db->join('courses','courses.id = semester_courses.course_id');
        $this->db->join('teachers','teachers.id = offered_courses.teacher_id');
        $this->db->join('semester','semester.id = semester_courses.semester_id');
        $this->db->join('programs','programs.id = semester.program_id');
        $this->db->where('sub_lessons.status!=',3);
        $rows = $this->db->get()->result();
        return $rows;
    }

}


?>