<?php
if (!defined('BASEPATH')){
	exit('No direct script access allowed');
} 
class Maya_model extends CI_Model {
	function __construct() {
		$this->load->database();
	  	parent::__construct();
        $lng      = $this->session->userdata('lng');
        $dir      = $this->session->userdata('dir');
        $language = $this->session->userdata('language');
	}
    public function checkIsPaid($id=false)
    {
        $this->db->select('is_paid');
        if ($id) {
            $this->db->where('id',$id);
        }
        $this->db->limit('1');
        $query = $this->db->get('prediction_search_tbl');  
        $rows  = $query->result_array();
        $row   = $rows['0'];
        return $row['is_paid'];
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
        $query = $this->db->get('prediction_tbl');
        if($query->num_rows() > 0) {
            foreach ($query->result_array() as $key => $value) {
                if ($language == 'English') { 
                  $title = $value['prediction_en'];
                }
                else {
                  $title = $value['prediction_en'];
                }
                $value['title'] = $title;
                $value['prediction_id'] = $value['id'];
                $data[$value['id']] = $value;
            }
            return $data;
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
        $query = $this->db->get('categories_tbl');
        if($query->num_rows() > 0) {
            foreach ($query->result_array() as $key => $value) {
                if($language == 'English'){
                    $title      = $value['title_en'];
                }
                else{
                    $title      = $value['title_ar'];
                }
                $value['title'] = $title;
                $data[$value['id']] = $value;
            }
            return $data;
        }
        else {
            return array();
        }
    }
    public function getSinglePredictionEachCategoryRandomly($limit=false)
    {
        $lng      = $this->session->userdata('lng');
        $dir      = $this->session->userdata('dir');
        $language = $this->session->userdata('language');
        $categories = array();
        $this->db->where('is_active','1');
        $this->db->where('is_delete','0');
        $query = $this->db->get('categories_tbl');
        if($query->num_rows() > 0) {
          foreach ($query->result_array() as $key => $value) {
            if ($language == 'English') {
              $title = $value['title_en'];
            }
            else{
              $title = $value['title_ar'];
            }
            $value['title'] = $title;
            $value['category_title'] = $title;
            $predictions = $this->getCategoryPredictions($value['id']);
            $predictions_count = sizeof($predictions);
            $random_prediction_id = rand(1,$predictions_count);
            $randomPrediction = $predictions[$random_prediction_id];
            $value['randomPrediction'] = $randomPrediction;
            $categories[$value['id']] = $value;
          }
        }
        return $categories;
    }

    public function getCategoryPredictions($category_id=false)
    {
        $language = $this->session->userdata('language');
        $dir      = $this->session->userdata('dir');
        $lng      = $this->session->userdata('lng');
        if($category_id){
            $this->db->where('category_id',$category_id);
        }
        $this->db->where('is_delete','0');
        $this->db->where('is_active','1');
        $query = $this->db->get('prediction_tbl');
        if($query->num_rows() > 0) {
            $counter = 1;
            foreach ($query->result_array() as $key => $value) {
                if ($language == 'English') { 
                  $title = $value['prediction_en'];
                }
                else {
                  $title = $value['prediction_en'];
                }
                $value['title'] = $title;
                $value['prediction_id'] = $value['id'];
                $data[$counter] = $value;
                $counter++;
            }
            return $data;
        }
        else {
            return array();
        }
    }
}
?>