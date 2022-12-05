<?php 
defined('BASEPATH') or exit ('No direct script access allowed');


class Gallery extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper(array('form'));
        $this->load->library(array('form_validation'));
        $this->load->model(array('gallery_model','login_model'));
    }

    public function all_images(){
        $data['content'] = 'website/gallery/all_images';
        $data['images'] = $this->gallery_model->select(['status'=>1],'','gallery');
        $data['footer_blog_post'] = $this->footer_blog_post;
        $this->load->view('website/master', $data);
    }

    // public function ajax_events(){
    //     $events_count = count($this->events_model->select(['status'=>1],'','events'));

    //     $this->load->library('pagination');
    //     $config['base_url'] = base_url('events/ajax_events');
    //     $config['total_rows'] = $events_count;
    //     $config['per_page'] = 2;
        
    //     $this->pagination->initialize($config);
    //     $links = $this->pagination->create_links();

    //     //Check if the 3rd URI segment that is page number is not empty
    //     // -1 is used to fix the issue caused by using use_page_numbers option;
    //     // After using -1 we will multiply it by per_page which returns the exact page / offset number we are in
    //     $page = $this->uri->segment(3) ? ($this->uri->segment(3) - 1) * $config['per_page'] : '0';
 
    //     $events = $this->events_model->get_data_with_ajax_pagination('events', $config['per_page'], $page);

    //     $data['events'] = $events;
    //     $data['links'] = $links;
    //     $this->load->view('website/events/ajax_event', $data);
    // }

    // public function event_details($id){
    //     $event_id = base64_decode($id);
    //     $event_details = $this->events_model->select_row($event_id,'id','events');
    //     $other_events = $this->events_model->get_other_events();

    //     $data['content'] = 'website/events/event_detail';
    //     $data['event'] = $event_details;
    //     $data['other_events'] = $other_events;
    //     $data['footer_blog_post'] = $this->footer_blog_post;
    //     $this->load->view('website/master', $data);
    // }
}


?>