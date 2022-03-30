<?php
if (!defined('BASEPATH')){
	exit('No direct script access allowed');
} 
class Predictions_model extends CI_Model {
	function __construct() {
		$this->load->database();
	  	parent::__construct();
        $lng      = $this->session->userdata('lng');
        $dir      = $this->session->userdata('dir');
        $language = $this->session->userdata('language');
	}
    public function addPrediction($data)
    {
        if($this->db->insert('prediction_tbl',$data)){
            return true;
        }
        else{
            return false;
        }
    }

    public function editPrediction($id,$data)
    {
        $this->db->where('id',$id);
        if($this->db->update('prediction_tbl', $data)){
            return true;
        }
        else {
            return false;
        }
    }
    public function getPrediction($id=false,$category_id=false)
    {
        $language = $this->session->userdata('language');
        $dir      = $this->session->userdata('dir');
        $lng      = $this->session->userdata('lng');
        if($id){
            $this->db->where('id',$id);
        }
        if($category_id){
            $this->db->where('category_id',$category_id);
        }
        $this->db->where('is_delete','0');
        $this->db->where('is_active','1');
        $this->db->order_by('category_id','asc');
        $query = $this->db->get('prediction_tbl');
        if($query->num_rows() > 0) {
            foreach ($query->result_array() as $key => $value) {
                if($language == 'English'){
                    $prediction      = $value['prediction_en'];
                }
                else{
                    $prediction      = $value['prediction_ar'];
                }
                $value['prediction'] = $prediction;
                $data[$value['id']] = $value;
            }
            return $data;
        }
        else {
            return array();
        }
    }
    public function getPredictionDetails($id=false)
    {
        $language = $this->session->userdata('language');
        $dir      = $this->session->userdata('dir');
        $lng      = $this->session->userdata('lng');
        if($id){
            $this->db->where('id',$id);
        }
        $this->db->where('is_active','1');
        $this->db->where('is_delete','0');
        $query = $this->db->get('prediction_tbl');
        if($query->num_rows() > 0) {
            $rows  = $query->result_array();
            $value = $rows['0'];
            if($language == 'English'){
                $prediction      = $value['prediction_en'];
            }
            else{
                $prediction      = $value['prediction_ar'];
            }
            $value['prediction'] = $prediction;
            return $value;
        }
        else {
            return array();
        }
    }   
    public function getCategory($id=false)
    {
        $language = $this->session->userdata('language');
        $dir      = $this->session->userdata('dir');
        $lng      = $this->session->userdata('lng');
        if($id){
            $this->db->where('id',$id);
        }
        $this->db->where('is_delete','0');
        $this->db->where('is_active','1');
        $this->db->order_by('id','asc');
        $query = $this->db->get('categories_tbl');
        if($query->num_rows() > 0) {
            foreach ($query->result_array() as $key => $value) {
                if($language == 'English'){
                    $title      = $value['title_en'];
                }
                else{
                    $title      = $value['title_ar'];
                }
                $value['title']   = $title;
                $data[$value['id']] = $value;
            }
            return $data;
        }
        else {
            return array();
        }
    } 
}
?>