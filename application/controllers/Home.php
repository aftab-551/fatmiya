<?php

/**
 * @copyright	Copyright (c) 2021 - 2022, eParameter
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @category Controller
 * Class for Home Dashboard
 * Model Home_model.php
 * date: 24-July-2016
 */
Class Home extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper(array('url', 'form'));
        $this->load->library(array('form_validation', 'session', 'email'));
        $this->load->model('Login_model');
        $this->load->model('home_model');
        //  if ($this->Login_model->loggedIn() == false) {
//            redirect('Home/Login');
//        }
    }
    
    public $data;

    public function index($data=null) {
        $data['content'] = 'website/home';

        $of_programs = array();
        $arr = array();
        $c = 0;
    
        $data['slider'] = $this->home_model->get_sliders();
        $data['about'] = $this->home_model->get_settings();
        $data['offered_courses'] = $this->home_model->get_offered_courses();
        $data['events'] = $this->home_model->get_events();
        $data['teachers'] = $this->home_model->get_teachers();
        $data['blog_posts'] = $this->home_model->get_blog_posts();
        $data['books'] = $this->home_model->get_books_and_articles();
        
        $data['footer_blog_post'] = $this->footer_blog_post;

        $programs = $this->home_model->select(['status'=>1],'','programs');
        
        rsort($programs);

        foreach($programs as $p){
            if($c < 3){
                $check = $this->home_model->check_program($p->id, 'program_id', 'semester');
    
                if(! empty($check)) {
                    $of_programs['id'] = $p->id;
                    $of_programs['program_name'] = $p->name;
                    $of_programs['program_description'] = $p->description;
                    $of_programs['program_thumbnail'] = $p->program_thumbnail;
                    $arr[$c] = (object) $of_programs;
                }
                $c++;
            }
        }

        $data['offered_programs'] =  $arr;
       
        foreach ($data['blog_posts'] as $blog_post){
            $char_count = mb_strlen($blog_post->excerpt);
            $char = '';
            $char_count_title = mb_strlen($blog_post->title);
            // echo $char_count. "</br>";
            // echo $char_count_title;

            $chars_title = '';

            if($char_count_title < 49){
                $remaining_chars = 48 - $char_count_title;
                for ($i = 0; $i < $remaining_chars; $i++) { 
                    if($i % 2 == 0) {
                        $chars_title .= '_';
                    }
                    else {
                        $chars_title .= ' ';
                    }
                }
            }
            else {
                $extra_chars = $char_count_title - 48;
                $chars_title = mb_substr($blog_post->title, 0, -$extra_chars);
                $chars_title .= '۔۔۔';
            }
            // echo $extra_chars;
            // echo $chars_title;

            if($char_count < 134){
                $remaining_chars = 132 - $char_count;
                for ($i = 0; $i < $remaining_chars; $i++) { 
                    if($i % 2 == 0) {
                        $char .= ' ';
                    }
                    else {
                        $char .= '_';
                    }
                }
            }
            else {
                $extra_chars = $char_count - 132;
                
                $char .= substr_replace($blog_post->excerpt, "", -$extra_chars);
                
                // for ($i = 0; $i < $extra_chars; $i++) { 
                //     rtrim($blog_post->excerpt, 'abcdefghijklmnopqrstuvwxyz');
                // }
            }
            
            // echo $blog_post->excerpt."</br>";
            // echo $char;
            
            // die();
        }

        $this->load->view('website/master',$data);
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect(base_url().'Home');
    }

    public function support_sendEmail()	{
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $sub = $this->input->post('sub');
            $msg = $this->input->post('msg');

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
            $this->email->from($email, $name);
            $this->email->to('info@hazratkhurramabbasi.org');

            $this->email->subject($sub);
            $this->email->message($msg);

            if (!$this->email->send()) {
                    show_error($this->email->print_debugger());
            } else {
                    echo('Email sent');
            }
            $data['content'] = 'home';
            $data['categories'] = $this->Home_model->get_categories();
            $data['slider'] = $this->Home_model->get_sliders();
            $data['books'] = $this->Home_model->get_books();
            $data['bayanat'] = $this->Home_model->get_bayanat();
            $data['notifications'] = $this->Home_model->get_notifications();
            $data['bayanat_categories'] = $this->Home_model->get_bayanat_categories();
            $data['schedule'] = $this->Home_model->get_schedule();
            $data['header_content'] = 'home_header';
            $data['success'] = 'Support email sent successfully!';
            //print_r($data);
            $this->load->view('master',$data);  
    }

    public function download_ics($event_id){
        
        $event_id = base64_decode($event_id);
        $event = $this->home_model->select_row($event_id, 'id', 'events');
        
        $name = $event->title;
        $location = $event->venue;
        $start = date('Ymd', strtotime($event->start_date)) . 'T' . date('His', strtotime($event->start_time));
        $end = date('Ymd', strtotime($event->end_date)) . 'T' . date('His', strtotime($event->end_time));
        $description = $event->description;
        $slug = strtolower(str_replace(array(' ', "'", '.'), array('_', '', ''), $name));

        header("Content-Type: text/Calendar; charset=utf-8");
        header("Content-Disposition: inline; filename={$slug}.ics");
        echo "BEGIN:VCALENDAR\n";
        echo "VERSION:2.0\n";
        echo "PRODID:-//Fatimiya Islamic Center//NONSGML {$name}//EN\n";
        echo "METHOD:REQUEST\n"; // required by Outlook
        echo "BEGIN:VEVENT\n";
        echo "UID:".date('Ymd').'T'.date('His')."-".rand()."-FIC\n"; // required by Outlok
        echo "DTSTAMP:".date('Ymd').'T'.date('His')."\n"; // required by Outlook
        echo "DTSTART:{$start}\n"; 
        echo "DTEND:{$end}\n";
        echo "LOCATION:{$location}\n";
        echo "SUMMARY:{$name}\n";
        echo "DESCRIPTION: {$description}\n";
        echo "END:VEVENT\n";
        echo "END:VCALENDAR\n";
    }

    public function contact_us(){
        $data['contact'] = $this->home_model->get_settings();
        $data['content'] = 'website/contact';
        $data['footer_blog_post'] = $this->footer_blog_post;
        $this->load->view('website/master', $data);
    }

    public function send_email(){
        // $config['smtp_port'] = '465';
        // $config['protocol'] = 'html';
        // $config['wordwrap'] = TRUE;
        
        $config = Array(
                    'protocol' => 'smtp',
                    'smtp_host' => 'mail.fatimiya.com',
                    'smtp_port' => 25,
                    'smtp_user' => 'info@fatimiya.com',
                    'smtp_pass' => 'I~K;5}=p?7k~',
                    'mailtype' => 'html',
                    'wordwrap' => true,
                    'charset' => 'iso-8859-1'
            );

        $this->email->initialize($config);

        // Change the email here after before
        $this->email->from($this->input->post('email'));
        $this->email->to('info@fatimiya.com');
        // $this->email->cc('another@another-example.com');
        // $this->email->bcc('them@their-example.com');

        $this->email->subject($this->input->post('subject'));
        $this->email->message($this->input->post('message'));
        $email = $this->email->send();

        if($email){
            $this->session->set_flashdata('email_success', 'Thank you for contacting us, We will get back to you asap.');
            redirect(base_url('Home/contact_us'));
        }
        else{
            $this->session->set_flashdata('error', $this->email->print_debugger());
            redirect(base_url('Home/contact_us'));
        }
    }

    public function email_success(){

    }


    public function s()
    {
        print_r($this->session->userdata());
    }

    public function Ss()
    {
        print_r($this->session->userdata());
    }
    

}

//End of file Home.php