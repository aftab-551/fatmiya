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
Class Bayanat extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper(array('url', 'form'));
        $this->load->library(array('form_validation', 'session'));
        $this->load->model('Login_model');
        $this->load->model('Home_model');
        
        $this->load->model('Books_model');
        $this->load->model('Bayanat_model');
         $this->load->model('Categories_model');
        
    }

    public function index($id = "") {
       
    }
    function viewBayanat($id = "") {
        if($id == ""){
            $data['name'] = "All Bayanat";
             $where = ['status!='=>3];
         } else {
             $id_sub_categories = base64_decode($id);
             $data['name'] = $this->Categories_model->getSubCatName($id_sub_categories);
             $where = ['status!='=>3,'id_sub_categories'=>$id_sub_categories];
             $data['subCat'] = $this->Categories_model->get_category_byid($id_sub_categories,'id_sub_categories','es_sub_categories');
             $data['categorydet'] = $this->Categories_model->get_category_byid($data['subCat'][0]->id_category,'id_categories','es_categories');           
         }
         
        $data['categories'] = $this->Home_model->get_categories();
        $data['bayanat'] = $this->Bayanat_model->get_all_bayanat('bayanat',$where);
        $data['content'] = 'bayanat';
        $data['header_content'] = 'blank_header';
        
        $this->load->view('master',$data);  
    }
    
    function viewShortAudio($id = "") {
        if($id == ""){
            $data['name'] = "All Bayanat";
             $where = ['status!='=>3];
         } else {
             $id_sub_categories = base64_decode($id);
             $data['name'] = $this->Categories_model->getSubCatName($id_sub_categories);
             $where = ['status!='=>3,'id_sub_categories'=>$id_sub_categories];
             $data['subCat'] = $this->Categories_model->get_category_byid($id_sub_categories,'id_sub_categories','es_sub_categories');
             $data['categorydet'] = $this->Categories_model->get_category_byid($data['subCat'][0]->id_category,'id_categories','es_categories');           
         }
         
        $data['categories'] = $this->Home_model->get_categories();
        $data['bayanat'] = $this->Bayanat_model->get_all_bayanat_data('bayanat',$where);
        $data['content'] = 'shortClips';
        $data['header_content'] = 'blank_header';
        
        $this->load->view('master',$data);  
    }
    
    public function input_validate_it($value) {
        if ($value != NULL &&
                !filter_var($value, FILTER_VALIDATE_INT) === false) {//means is an integer 
            return TRUE;
        } else {
            redirect(base_url().'Books/viewBayanat');
        }
    }
    function view($id) {
        $data['categories'] = $this->Home_model->get_categories();
        $id_bayan  = base64_decode($id);
        $this->input_validate_it($id_bayan);
        $this->Bayanat_model->incrementViews($id_bayan);
        $data['bayan'] = $this->Bayanat_model->get_bayan_by_id($id_bayan,'bayanat','id_bayanat');
        $id_sub_categories = $data['bayan'][0]->id_sub_categories;
        $data['name'] = $this->Categories_model->getSubCatName($id_sub_categories);
        $data['subCat'] = $this->Categories_model->get_category_byid($id_sub_categories,'id_sub_categories','es_sub_categories');
        $data['categorydet'] = $this->Categories_model->get_category_byid($data['subCat'][0]->id_category,'id_categories','es_categories');           
        //print_r($data);
        $data['content'] = 'view_bayan';
        $data['header_content'] = 'blank_header';
        $this->load->view('master',$data);  
    }

   

}

//End of file Home.php