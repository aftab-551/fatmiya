<?php
/**
 * @package	eshoppingstore
 * @author	Muzzammil Alam
 * @copyright	Copyright (c) 2016 - 2018, HumaraAdab
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @category Controller
 * Class for registration of Guest,Artist,Teacher,Student
 * Model users_model.php
 */

Class MY_Model extends CI_Model
{
	function __construct(){
		parent::__construct();
        $this->load->library('form_validation');
		$this->load->database();
	}

	public function select($where = NULL, $select = "*",$table) {
        $this->db->select($select);
        $this->db->from($this->db->dbprefix($table));
        if ($where != NULL) {
            $this->db->where($where);
        }
        if($table == 'student_course_enrollment'){
            $row = $this->db->get()->num_rows();
            return $row;
        } 
        elseif($table == 'student_program_enrollment'){
            $row = $this->db->get()->num_rows();
            return $row;
        }
        else {
            $query = $this->db->get();
            return $query->result();
        }
    }

    public function select_row($id, $column = '', $table)
    {
        $this->db->from($table);
        $where = array($column => $id);
        $this->db->where($where);
        $row = $this->db->get()->row();
        return $row;
    }

    public function select_last_row($table)
    {
        $this->db->select('id');
        $this->db->from($table);
        $this->db->order_by('id', 'DESC');
        $this->db->limit(1);
        $row = $this->db->get()->row();
        return $row;
    }

    public function insert($data,$table) {
        $table = $this->db->dbprefix($table);
        $query = $this->db->insert($table, $data);
        $var['inserted_id'] = $this->db->insert_id();
        $var['query'] = $query;
        return $var;
    }

     public function update($data,$conditions,$table){
        $table=$this->db->dbprefix($table);
        $this->db->where($conditions);
        $this->db->update($table, $data); 
        return '1';
    }

    public function delete($column,$id,$table_name){
        $data = array('status'=>3);
        $table=$this->db->dbprefix($table_name);
        $this->db->where(array($column => $id));
        $this->db->update($table, $data);  // Delete should be used?
        return '1';
    }

    public function get_user_details($email) {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where(array('email' => $email));
        $query = $this->db->get();
        return $query->row();
    }

    public function get_student_details($student_id) {
        $this->db->select('*');
        $this->db->from('students');
        $this->db->where(array('student_id' => $student_id));
        $query = $this->db->get();
        return $query->row();
    }

    public function student_detail($student_id){
        $this->db->select('students.*, programs.name as program_name');
        $this->db->from('students');
        $this->db->join('student_program_enrollment','student_program_enrollment.student_id = students.id');
        $this->db->join('programs',' programs.id = student_program_enrollment.program_id');
        $this->db->where('students.id',$student_id);
        $rows = $this->db->get()->result();
        return $rows;
    }

    public function loggedIn(){
       // die('h');
        if($this->session->userdata('logged_in') == true){
            return true;
        }else{
            return false;
        }
    }

    public function studentLoggedIn(){
        if($this->session->userdata('student_logged_in') == true){
            return true;
        }else{
            return false;
        }
    }
    
    function transaction_start(){
        $this->db->trans_start();
    }
    function transaction_complete(){
        $this->db->trans_complete();
    }

    public function get_data_with_ajax_pagination($table, $limit, $offset){
        $this->db->from($table);
        $this->db->limit($limit, $offset);
        $this->db->where('status',1);
        $rows = $this->db->get()->result();
        return $rows;
    }

}