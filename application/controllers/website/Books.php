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
 * Class for Home Dashboard
 * Model Home_model.php
 * date: 24-July-2016
 */
Class Books extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper(array('url', 'form'));
        $this->load->library(array('form_validation', 'session','pagination'));
        $this->load->model('Login_model');
        $this->load->model('Home_model');
        $this->load->model('Books_model');
    }

    public function index($id = "") {
       
    }
    
    public function view_book($id) {
        $id_book = base64_decode($id);
        $this->Books_model->incrementViews($id_book);
        $filename = base_url('uploads/books/books_pdf/'.$id_book.'.pdf');
        header('Content-type: application/pdf');
        header('Content-Disposition: inline; filename="'. $filename.'"');
        header('Content-Transfer-Encoding: binary');
        header('Accept-Ranges:bytes');
        @readfile($filename);
    }

    public function all_books() {
        $data['content'] = 'website/books/all_books';
        $data['footer_blog_post'] = $this->footer_blog_post;
        $this->load->view('website/master', $data);
    }

    public function ajax_books() {
        if($this->Login_model->studentLoggedIn() == true) {
            $books_count = count($this->Books_model->select(['status'=>1], '', 'books'));
        }
        else {
            $books_count = count($this->Books_model->select(['status'=>1, 'show_book'=>1], '', 'books'));
        }

        $this->load->library('pagination');
        $config['base_url'] = base_url('book/ajax_books');
        $config['total_rows'] = $books_count;
        $config['per_page'] = 6;
        
        $this->pagination->initialize($config);
        $links = $this->pagination->create_links();

        //Check if the 3rd URI segment that is page number is not empty
        // -1 is used to fix the issue caused by using use_page_numbers option;
        // After using -1 we will multiply it by per_page which returns the exact page / offset number we are in
        $page = $this->uri->segment(3) ? ($this->uri->segment(3) - 1) * $config['per_page'] : '0';
 
        $books = $this->Books_model->get_books_with_ajax_pagination($config['per_page'], $page);

        $data['books'] = $books;
        $data['links'] = $links;
        $this->load->view('website/books/ajax_books', $data);
    }

    // function viewBooks($id = "") {
        
    //     $data['categories'] = $this->Home_model->get_categories();
    //     if($id!="")
    //     {
    //         $where = ['status='=>1,'id_sub_categories'=>base64_decode($id)];
    //     }
    //     else
    //     {
    //         $where = ['status='=>1];
    //     }
    //     $data['sub_categories'] = $this->Books_model->get_books_sub_categtories();
    //     $data['books'] = $this->Books_model->get_all_books_data('books',$where);
    //     //$data['bayanat'] = $this->Bayanat_model->get_all_bayanat('bayanat',$where);
    //     //echo"<pre>";print_r( $data['books']);echo"</pre>";
    //     $data['content'] = 'books/view_books';
    //     //print_r($data['books']);
    //     $data['header_content'] = 'blank_header';
        
    //     $this->load->view('master',$data);  
    // }
    public function input_validate_it($value) {
        if ($value != NULL &&
                !filter_var($value, FILTER_VALIDATE_INT) === false) {//means is an integer 
            return TRUE;
        } else {
            redirect(base_url().'Books/viewBooks');
        }
    }
    // function view($id) {
    //     $data['categories'] = $this->Home_model->get_categories();
    //     $id_book  = base64_decode($id);
    //     $this->input_validate_it($id_book);
    //     $this->Books_model->incrementViews($id_book);
    //     $data['book'] = $this->Books_model->get_book_by_id($id_book,'books','id_books');
    //     $data['content'] = 'books/view_book';
    //     $data['header_content'] = 'blank_header';
    //     $this->load->view('master',$data);  
    // }
    
//     public function get_filtered_books(){
// 		$where_type = '';
// 		if (isset($_REQUEST['data']) && !empty($_REQUEST['data'])) {
// 			$where_book = '';
// 			$where_type = '';
// 			$where_artist = '';
// 			$data_checked = explode(",", $_REQUEST['data']);
			
// 			$type = '';
// 			for ($i = 0; $i < count($data_checked); $i++) {
// 				$checked = explode("_", $data_checked[$i]);
				
// 				if ($checked[0] == "type") {
// 					$type .= "'" . str_replace("-", " ", $checked[1]) . "',";
// 				}
				
// 			}
			
// 			if ($type != '') {
// 				$type_clause = substr($type, 0, -1);
// 				$where_type = 'AND ap.`id_sub_categories` IN (' . $type_clause . ')';
// 			}
			

// 		}
// 		$list_query = $this->Books_model->get_filtered_books($where_type,'','');
// 		$total_rows = count($list_query);
// 		$config = array();
// 		$config["base_url"] = '#';
// 		$config["total_rows"] = $total_rows;
// 		$config["per_page"] = 40;
// 		$config["uri_segment"] = 3;
// 		$config['full_tag_open'] = '<ul class="pagination text-center pagination-md">';
// 		$config['full_tag_close'] = '</ul>';
// 		$config['next_link'] = '<i class="fa fa-angle-right"></i>';
// 		$config['next_tag_open'] = '<li class="NextPage">';
// 		$config['next_tag_close'] = '</li>';
// 		$config['prev_link'] = '<i class="fa fa-angle-left"></i>';
// 		$config['prev_tag_open'] = '<li class="BackPage">';
// 		$config['prev_tag_close'] = '</li>';
// 		$config['cur_tag_open'] = '<li  class="active"><a href="#">';
// 		$config['cur_tag_close'] = '</a></li>';
// 		$config['num_tag_open'] = '<li class="APage">';
// 		$config['num_tag_close'] = '</li>';
// 		$config['first_link'] = false;
// 		$config['last_link'] = false;
// 		$this->pagination->initialize($config);
// 		$start = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

// 		/* getting bookry images list */

// 		$data['books'] = $this->Books_model->get_filtered_books($where_type,$config["per_page"], $start/*, $where_hour, $where_price,$where_badages*/);
// 		//print_r($data['books']);
// 		$data["links"] = $this->pagination->create_links();
// 		$this->load->view('books/books_ajax_view', $data);

// 	}

// 	public function search(){
//         $data['categories'] = $this->Home_model->get_categories();
         
//         $data['sub_categories'] = $this->Books_model->get_books_sub_categtories();
// 		$value = $this->input->get('q');
// 		$data['books'] = $this->Books_model->search($value);
        
// 		$data['content'] = 'books/search_results';
        
//         $data['header_content'] = 'blank_header';
        
//         $this->load->view('master',$data);  

// 	}

   

}

//End of file Home.php