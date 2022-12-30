<?php 
defined('BASEPATH') or exit ('No direct script access allowed');


class studentResult_model extends MY_Model{
    
    public function __construct()
    {
        parent::__construct();
    }

    public function student_result($condition)
    {
        $this->db->select('marks.* ,students.id as studentid,students.student_id as studentID, students.first_name as first_name, students.last_name as last_name,courses.code as code,courses.name as Cname ');
        $this->db->from('marks');
        $this->db->join('students','students.id = marks.student_id');
        $this->db->join('offered_courses','offered_courses.id = marks.offered_course_id');
        $this->db->join('semester_courses','semester_courses.id = offered_courses.semester_course_id');
        $this->db->join('courses','courses.id = semester_courses.course_id');
        $this->db->where('marks.status',1);
        $this->db->where($condition);
        $rows = $this->db->get()->result();

        return $rows;
    }
    

}


?>