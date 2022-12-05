<?php

/**
 * @package	khanqah
 * @author	Muzzammil Alam
 * @copyright	Copyright (c) 2016 - 2018, khanqah
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @category Controller
 * Class for Settings Dashboard
 * Model Settings_model.php
 * date: 7-MAY-2016
 */
Class AskHazrat extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper(array('url', 'form'));
        $this->load->library(array('form_validation', 'session'));
        $this->load->model('Login_model');
        $this->load->model('AskHazrat_model');
        
        if ($this->Login_model->loggedIn() == false) {
            redirect('Admin/Login');
        }
    }

   /*     * *************************SCHEDULE SECTION********************************* */

    public function index() {    
        $data['dataset'] = $this->AskHazrat_model->get_all_pendingQuestions('askhazrats',['isAnswered'=>0]);
        $data['content'] = 'admin/askhazrat/view_questions';
        $this->load->view('admin/askhazrat/askhazrat_master', $data);
    }
    
    public function form_question($idEnc = '') {
        $id = base64_decode($idEnc);
        if($id == ''){
            $data['add'] = true;
        } else {
            $data['add'] = false;
            $data['question'] = $this->AskHazrat_model->get_all_pendingQuestions('askhazrats',['id'=>$id]);
        }
        $data['content'] = 'admin/askhazrat/form_question';
        $this->load->view('admin/askhazrat/askhazrat_master', $data);
    }
    
    public function update_answer() {
            $id = $this->input->post('id');
            $data = array(
                'answer' => $this->input->post('answer'),
                'isAnswered' => 1);
            $this->AskHazrat_model->update($data, array('id' => $id), 'askhazrats');
            $config = Array(
                    'protocol' => 'smtp',
                    'smtp_host' => 'mail.hazratkhurramabbasi.org',
                    'smtp_port' => 25,
                    'smtp_user' => 'info@hazratkhurramabbasi.org',
                    'smtp_pass' => 'subhanullah2',
                    'mailtype' => 'html',
                    'charset' => 'iso-8859-1'
            );

            $this->load->library('email', $config);
            $this->email->set_newline("\r\n");
            $this->email->from('info@hazratkhurramabbasi.org', 'Khanqah-E-Aarifi');
            $this->email->to($this->input->post('email'),$this->input->post('name'));
            
            $msg = '<table><tr><td>'.$this->input->post('subject').'</td></tr><tr><td>'.$this->input->post('question').'</td></tr><tr><td>'.$this->input->post('answer').'</td></tr></table>';
            $this->email->subject("RE: ".$this->input->post('subject'));
            $this->email->message($msg);

            if (!$this->email->send()) {
                    show_error($this->email->print_debugger());
            } else {
                    echo('Email sent');
            }
            $this->session->set_flashdata('success', 'Operation performed successfully');
            redirect(base_url() . 'admin/AskHazrat');
        
    }

}

//End of file Schedule.php