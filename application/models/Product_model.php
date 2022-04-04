<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Product_model extends CI_Model{
    function __construct() {
        $this->load->database();
        parent::__construct();
        $lng      = $this->session->userdata('lng');
        $dir      = $this->session->userdata('dir');
        $language = $this->session->userdata('language');
    }
    //get and return product rows
    public function getProducts($id = ''){
        $this->db->select('id,name,image,price');
        $this->db->from('products');
        if($id){
            $this->db->where('id',$id);
            $query = $this->db->get();
            $result = $query->row_array();
        }else{
            $this->db->order_by('name','asc');
            $query = $this->db->get();
            $result = $query->result_array();
        }
        return !empty($result)?$result:false;
    }
 
    //insert transaction data
    public function storeTransaction($data = array()){
        $insert = $this->db->insert('payments',$data);
        return $insert?true:false;
    }
}
