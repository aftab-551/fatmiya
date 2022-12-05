<?php

if (!defined('BASEPATH'))exit('No direct script access allowed');

/* * *********************************************************************************************** 
 * ******************************Start of file home.php********************************************* 
 * ********************Base Controller for the project********************************************** 
 * *************************Location: ./application/core/MY_Controller.php************************
 * *********************************************************************************************** */

class MY_Controller extends CI_Controller {

    public $app_messages;
    public $data;
    public $view_names;
    public $footer_blog_post;

    function __construct() {
        // then execute the parent constructor anyway
        parent::__construct();
        $this->load->helper(array('url', 'form'));
        $this->load->library(array('form_validation', 'session'));
        $this->load->library('email');
        $this->load->helper('string');
        $this->load->library('cart');
        $this->load->model('home_model');
        $this->footer_blog_post = $this->home_model->get_footer_blog_posts();
    }

    /* Function used for logging the user activities */

    function insert_log($log_Data) {
        $this->load->model('user_logs');        // Load model user_logs
        $data = array('Users_idUsers' => $this->session->userdata('id'), 'log' => $log_Data);       // Applying conditions for the where clause in the query
        $this->user_logs->insert_user_logs($data);    // Inserting the required data
    }

    /* End of function insert_log */

    public function input_validate($value) {
        if ($value != NULL &&
                !filter_var($value, FILTER_VALIDATE_INT) === false) {//means is an integer 
            return TRUE;
        } else {
            redirect(base_url().'admin/Admin');
        }
    }

    /* Function used for encrypting a variable */

    function encryption($data) {
        // $key = 'eshoppingstore!@#'; 
        //  $encryted_data = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($data), $data, MCRYPT_MODE_CBC, md5(md5($key))));    // Applying encrytion method to the password
        $encryted_data = base64_encode(md5($data));

        return $encryted_data;    
    }

    /* End of function encrytion */
  

    /* Function used for uploading images */

    function do_upload($max_height, $max_width, $allowed_types, $field_name = 'userfile', $folder_name = '', $file_name = '', $feature = '') {
        $config['upload_path'] = 'uploads/' . $folder_name;
        $config['allowed_types'] = $allowed_types; //'gif|jpg|png';
        $config['file_name'] = $file_name;
        $config['overwrite'] = TRUE;
        $config['max_width']  = $max_width;
        $config['max_height']  = $max_height;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload($field_name)) {
            $error = array('error' => $this->upload->display_errors());
            return $error;
        } else {
            if($feature == 'gallery'){
                $config = array();
    
                $config['image_library'] = 'gd2';
                $config['source_image'] = $this->upload->upload_path.$this->upload->file_name;
                $imgdata = exif_read_data($config['source_image'], 'IFD0');
                $filename = $config['source_image'];
    
                if (empty($imgdata['Orientation'])){
                    list($width, $height) = getimagesize($filename);
                }
                elseif($imgdata['Orientation'] == 8){
                    list($height, $width) = getimagesize($filename);
                }
                else {
                    list($width, $height) = getimagesize($filename);
                }
                
                if ($width >= $height){
                    $config['width'] = '1920';
                }
                else {
                    $config['height'] = '1920';
                }
                $config['master_dim'] = 'auto';
    
                $this->load->library('image_lib',$config); 
    
                if (!$this->image_lib->resize()){  
                    echo $this->image_lib->display_errors();
                }
                else {
                    $this->image_lib->initialize($config);
                    if(! empty($imgdata)){
                        switch($imgdata['Orientation']) {
                            case 1:
                                $this->image_lib->resize();
                        }
                    }
                    else {
                        $this->image_lib->resize();
                    }
                    $this->image_lib->clear();
                    $config=array();
    
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = $this->upload->upload_path.$this->upload->file_name;
    
                    if(! empty($imgdata)){
                        switch($imgdata['Orientation']) {
                            case 3:
                                $config['rotation_angle']='180';
                                break;
                            case 6:
                                $config['rotation_angle']='270';
                                break;
                            case 8:
                                $config['rotation_angle']='90';
                                break;
                        }
                    }
    
                    $this->image_lib->initialize($config);
                    $this->image_lib->rotate();
                    $this->image_lib->clear();
                }
            }
            
            $data = array('upload_data' => $this->upload->data());
            return $data;
        }
    }
    /* End of function uploading */

    /* Function to resize image */
    public function resize_image($folder_name, $image_name, $destination_folder, $height, $width) {
        $config['image_library'] = 'gd2';
        $config['source_image'] = 'uploads/' . $folder_name . '/' . $image_name;
        $config['new_image'] = 'uploads/' . $destination_folder;
        $config['create_thumb'] = false;
        $config['maintain_ratio'] = false;
        $config['width'] = $width;
        $config['height'] = $height;
        $this->load->library('image_lib', $config);
        $this->image_lib->initialize($config);
        if ( ! $this->image_lib->resize()) {
                echo $this->image_lib->display_errors();
        }
        $this->image_lib->clear();
        // unlink(APPPATH . 'images/imageSlider/' . $data);
    }
    
    public function controller_configuration($content, $content_title, $content_subtitle) {
        $this->data['content'] = $content;
        $this->data['content_title'] = $content_title;
        $this->data['content_subtitle'] = $content_subtitle;
    }

    // public function send_email($address, $subject, $message) {
    //     $this->email->from('admin@humaraadab.com', 'admin');
    //     $this->email->to($address);
    //     $this->email->subject($subject);
    //     $this->email->message($message);
    //     $this->email->send();
    // }

    public function check_captcha() {
        $recaptchaResponse = trim($this->input->post('g-recaptcha-response'));
        if ($recaptchaResponse == NULL) {
            $this->session->set_flashdata('captcha_Error', 'Please select the captcha');
            redirect('register');
        }
    }

    /*CHECK LOGIN*/
    public function check_logged_in() {
        if ($this->session->userdata('logged_in') == true) {
            return true;
           // echo "failed";
        } else {
            //die('sdsd');
            redirect(base_url().'Login');
        }
    }
    
    /* Form validation fumction  */
    public function form_validate($validation_array,$view) {
        if ($this->form_validation->run($validation_array) == false) {
           // $this->load->view($view);
        }else{
            return true;
        }
    }
}

/* End of file MY_Controller.php */
/* Location: ./application/core/MY_Controller.php */