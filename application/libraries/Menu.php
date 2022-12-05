<?php

class Menu {

    private $ci;            // para CodeIgniter Super Global Referencias o variables globales
    private $id_menu = '';
    private $class_menu = '';
    private $class_parent = '';
    private $class_last = '';

    // --------------------------------------------------------------------
    /**
     * PHP5        Constructor
     *
     */
    function __construct()
    {
        $this->ci = &get_instance();    // get a reference to CodeIgniter.
       // $this->load->model('admin/CMS_model');
    }

    // --------------------------------------------------------------------
    /**
     * build_menu($table, $type)
     *
     * Description:
     *
     * builds the Dynaminc dropdown menu
     * $table allows for passing in a MySQL table name for different menu tables.
     * $type is for the type of menu to display ie; topmenu, mainmenu, sidebar menu
     * or a footer menu.
     *
     * @param    string    the MySQL database table name.
     * @param    string    the type of menu to display.
     * @return    string    $html_out using CodeIgniter achor tags.
     */
    
    public function get_categories() {
        $this->ci->db->select('*');
        $this->ci->db->from('es_categories');
        $this->ci->db->where(array('status'=>1));
        $query = $this->ci->db->get();
        return $query->result();
    }
    public function get_sub_categories_where($id_cat) {
     $this->ci->db->select('*');
     $this->ci->db->from('es_sub_categories');
     $this->ci->db->where(array('id_category'=>$id_cat,'status'=>1));
     $query = $this->ci->db->get();
     return $query->result();
 }
 function get_settings() {
        $this->ci->db->select('*');
        $this->ci->db->from('settings');
        $this->ci->db->where(['status'=>1,'id_settings'=>1]);
        $query = $this->ci->db->get();
        return $query->result_array();
    }
    
    public function get_bayanat($id_cat) {
     $this->ci->db->select('*,DATE_FORMAT(date,"%D %M %Y") as thedate');
     $this->ci->db->from('bayanat');
     $this->ci->db->where(array('id_sub_categories'=>$id_cat,'status'=>1));
     $this->ci->db->order_by('id_bayanat','desc');
     $this->ci->db->limit(6,0);
     $query = $this->ci->db->get();
     return $query->result();
 }
    
 
 
 

}

// ------------------------------------------------------------------------
// End of Dynamic_menu Library Class.
// ------------------------------------------------------------------------
/* End of file Dynamic_menu.php */
/* Location: ../application/libraries/Dynamic_menu.php */