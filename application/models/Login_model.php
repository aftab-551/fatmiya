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
 * Model for Login
 * Dated: 7 - MAY - 2016
 */
Class Login_model extends MY_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function login($email, $student_id, $password, $table) {
        if($email != '') {
            $where = array('email' => $email, 'password' => $password);
        }
        else {
            $where = array('student_id' => $student_id, 'password' => $password);
        }
        
        $query = $this->db->get_where($table, $where);
      //  $query = $this->db->where(['email' => $email, 'password' => $password])->get('users');
        if ($query->num_rows()) {
            return true;
        } else {
            return false;
        }
    }

    public function create_session() {
        $email = $this->input->post('email');
        $user_details = $this->get_user_details($email);
        $data = array(
            'email' => $email,
            'username' => $user_details->username,
            'admin_firstname' => $user_details->first_name,
            'admin_lastname' => $user_details->last_name,
            'user_id' => $user_details->user_id,
            'user_type' => $user_details->user_type,
            'logged_in' => true
        );
        $this->session->set_userdata($data);
    }

    public function create_student_session($log = true, $student_ID = '') {
        if($this->input->post()){
            $student_id = $this->input->post('student_id');
        }
        if($student_ID != ''){
            $student_id = $student_ID;
        }
        $student_details = $this->get_student_details($student_id);

        if ($log == true){
            $data = array(
                'student_id' => $student_id,
                'student_firstname' => $student_details->first_name,
                'student_lastname' => $student_details->last_name,
                'id' => $student_details->id,
                'student_logged_in' => true
            );
        }
        else{
            $data = array(
                'student_id' => $student_id,
            );
        }
        
        $this->session->set_userdata($data);
    }

    public function get_verification_bit($email){
        $this->db->select('verified');
        $this->db->from('users');
        $this->db->where(array('email' => $email));
        $query = $this->db->get();
        return $query->row();
    }

    public function get_total_attempts()
    {
        $time = time() - 30;
        $ip_address = $this->input->ip_address();

        $sql = 'SELECT count(ip_address) AS total_attempt FROM login_attempts WHERE login_time > ? AND ip_address = ?';
        $binds = array($time, $ip_address);
        $query = $this->db->query($sql, $binds);
        $rows = $query->row();
        return $rows;        
    }

    public function get_counter_value()
    {
        $this->db->select('student_counter, student_initial, teacher_counter, teacher_initial');
        $this->db->from('settings');
        $this->db->where('id_settings = 1');
        $row = $this->db->get()->row();
        return $row;
    }

}

/* End of file Login_model.php*/