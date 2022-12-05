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

Class Webservice extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('WebServiceModel');
        
    }

    public function index($id = "") {
       
    }
    function getHazratAqdasBayanat($count = 10) {
        $where = "status !=3 and (id_categories=1 and id_sub_categories = 1 )";
        $rowData = $this->WebServiceModel->getWebServBayanat('bayanat',$where,$count);
        $data = [];
        foreach ($rowData as $rd)
        {
            array_push($data, [ "id"            => $rd->id_bayanat,
                                "name"          => $rd->name,
                                "audio"         => base_url()."uploads/bayanat/".$rd->audio,
                                "status"        => $rd->status,
                                "Date"          => $rd->formatDate,
                                "views"         => $rd->views,
                                "bayan_image"   => base_url()."uploads/bayan_images/".$rd->bayan_image,
                                "id_categories"=> $rd->id_categories,
                                "id_sub_categories"=> $rd->id_sub_categories
                    ]);
        }
        print_r(json_encode($data));
        //print_r($data);
    }
    
    function getHazratBayanat($count = 10) {
        $where = "status !=3 and (id_categories=1 and id_sub_categories = 3 )";
        $rowData = $this->WebServiceModel->getWebServBayanat('bayanat',$where,$count);
        $data = [];
        foreach ($rowData as $rd)
        {
            array_push($data, [ "id"            => $rd->id_bayanat,
                                "name"          => $rd->name,
                                "audio"         => base_url()."uploads/bayanat/".$rd->audio,
                                "status"        => $rd->status,
                                "Date"          => $rd->formatDate,
                                "views"         => $rd->views,
                                "bayan_image"   => base_url()."uploads/bayan_images/".$rd->bayan_image,
                                "id_categories"=> $rd->id_categories,
                                "id_sub_categories"=> $rd->id_sub_categories
                    ]);
        }
        print_r(json_encode($data));
    }
    function getHazratMajalis($count = 10) {
        $where = "status !=3 and (id_categories=1 and id_sub_categories = 4 )";
        $rowData = $this->WebServiceModel->getWebServBayanat('bayanat',$where,$count);
        $data = [];
        foreach ($rowData as $rd)
        {
            array_push($data, [ "id"            => $rd->id_bayanat,
                                "name"          => $rd->name,
                                "audio"         => base_url()."uploads/bayanat/".$rd->audio,
                                "status"        => $rd->status,
                                "Date"          => $rd->formatDate,
                                "views"         => $rd->views,
                                "bayan_image"   => base_url()."uploads/bayan_images/".$rd->bayan_image,
                                "id_categories"=> $rd->id_categories,
                                "id_sub_categories"=> $rd->id_sub_categories
                    ]);
        }
        print_r(json_encode($data));
    }
    function getShortClips($count = 10) {
        $where = "status !=3 and (id_categories=2)";
        $rowData = $this->WebServiceModel->getWebServBayanat('bayanat',$where,$count);
        $data = [];
        foreach ($rowData as $rd)
        {
            array_push($data, [ "id"            => $rd->id_bayanat,
                                "name"          => $rd->name,
                                "audio"         => base_url()."uploads/bayanat/".$rd->audio,
                                "status"        => $rd->status,
                                "Date"          => $rd->formatDate,
                                "views"         => $rd->views,
                                "bayan_image"   => base_url()."uploads/bayan_images/".$rd->bayan_image,
                                "id_categories"=> $rd->id_categories,
                                "id_sub_categories"=> $rd->id_sub_categories
                    ]);
        }
        print_r(json_encode($data));
    }
    
        
    function getBooks($count = 10) {
        $where = "status !=3 and (id_categories=3)";
        $rowData = $this->WebServiceModel->getWebServBooks('books',$where,$count);
        $data = [];
        foreach ($rowData as $rd)
        {
            array_push($data, [ "id"            => $rd->id_books,
                                "name"          => $rd->name,
                                "pdf"           => base_url()."uploads/books/".$rd->pdf,
                                "status"        => $rd->status,
                                "Date"          => $rd->formatDate,
                                "views"         => $rd->views,
                                "book_image"    => base_url()."uploads/books_images/".$rd->book_image,
                                "id_categories"=> $rd->id_categories,
                                "id_sub_categories"=> $rd->id_sub_categories
                    ]);
        }
        print_r(json_encode($data));
    }
}

//End of file Home.php