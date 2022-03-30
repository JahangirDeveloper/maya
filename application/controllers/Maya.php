<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Maya extends CI_Controller {
	public function __construct() { 
        parent::__construct();
        if ($this->session->userdata('language') == '') {
        	$this->session->set_userdata('language', 'English');
          $this->session->set_userdata('direction', 'ltr');
          $this->session->set_userdata('lng', 'en');
        }
        $language = $this->session->userdata('language');
        $direction = $this->session->userdata('direction');
        $lng = $this->session->userdata('lng');
        $this->data['language'] = $language;
        $this->data['direction'] = $direction;
        $this->data['lng'] = $lng;
        $this->lang->load('information',$language);
        $this->load->model('Maya_model');
        $this->load->model('User_model','User_model');
        $this->session->set_userdata('user_id', '1');
        $this->session->set_userdata('name', 'Jahanigr');

  }
	public function index()
	{
    $name = $this->session->userdata('name');
    $user_id = $this->session->userdata('user_id');
    $this->data['language'] = $this->session->userdata('language');
    $this->data['direction'] = $this->session->userdata('direction');
    $this->data['lng'] = $this->session->userdata('lng');
    $this->data['pageTitle'] = 'MAYA';
    $this->data['my_number'] = '';
    $btnSubmit = $this->input->post('btnSubmit');
    if(isset($btnSubmit)) {
      $this->form_validation->set_error_delimiters('<div class="text-uppercase text-danger mt10">', '</div>');
      $this->form_validation->set_rules('my_number', 'MY NUMBER', 'required|trim');
      if ($this->form_validation->run() == FALSE) {
        $this->data['records'] = array();
        $this->load->view('index',$this->data);
      }
      else {
        $ip_address  = $this->input->ip_address();
        $page_link = base_url().'Maya/index/';
        if($ip_address == '::1'){
          $ip_address = 'LocalHost';
        }
        $my_number   = $this->input->post('my_number');
        $gender      = $this->input->post('gender');
        $birth_month = $this->input->post('birth_month');
        $birth_year  = $this->input->post('birth_year');
        $age         = $this->input->post('age');
        $eye_color   = $this->input->post('eye_color');
        $body_height = $this->input->post('body_height');
        $hair_color  = $this->input->post('hair_color');
        $skin_color  = $this->input->post('skin_color');
        $body_weight = $this->input->post('body_weight');
        $data['user_id'] = $user_id;
        $data['name'] = $name;
        $data['my_number'] = $my_number;
        $data['gender'] = $gender;
        $data['birth_month'] = $birth_month;
        $data['birth_year'] = $birth_year;
        $data['age'] = $age;
        $data['eye_color']    = $eye_color;
        $data['body_height']  = $body_height;
        $data['hair_color']   = $hair_color;
        $data['skin_color']   = $skin_color;
        $data['ip_address']   = $ip_address;
        $data['body_weight']  = $body_weight;
        $data['created_date'] = time();
        $this->db->insert('prediction_search_tbl',$data);
        $insert_id = $this->db->insert_id();
        $data_web_views = [
          'page_views' => 1,
          'page_link' => $page_link,
          'ip_address' => $ip_address,
          'name' => $name,
          'user_id' => $user_id,
          'created_date' => time(),
        ];
        $this->db->insert('web_views',$data_web_views);
        redirect(base_url().'Maya/predictions/'.$my_number.'/'.base64_encode($insert_id));
      }
    }
    else {
      $this->load->view('index',$this->data);
    }
	}
  

  public function predictions($my_number=false,$id_encoded=false)
  {
    $name    = $this->session->userdata('name');
    $user_id = $this->session->userdata('user_id');
    $this->data['language'] = $this->session->userdata('language');
    $this->data['direction'] = $this->session->userdata('direction');
    $this->data['lng'] = $this->session->userdata('lng');
    $this->data['pageTitle'] = 'MAYA';
    $this->data['my_number'] = $my_number;
    $is_paid = $this->Maya_model->checkIsPaid(base64_decode($id_encoded));
    if($is_paid == 'yes'){
      $this->data['records'] = $this->Maya_model->getSinglePredictionEachCategoryRandomly();
    }
    else {
      $this->data['records'] = $this->Maya_model->getSinglePredictionEachCategoryRandomly('5');
    }
    $this->data['is_paid'] = $is_paid;
    $this->load->view('predictions',$this->data);
  }
  public function setLang() {
      $language = $this->input->post('language');
     	if ($language == 'Arabic') {
        $this->session->set_userdata('language', 'Arabic');
     		$this->session->set_userdata('direction', 'rtl');
     		$this->session->set_userdata('lng', 'ar');
     	}
     	elseif($language == 'English'){
        $this->session->set_userdata('language', 'English');
     		$this->session->set_userdata('direction', 'ltr');
     		$this->session->set_userdata('lng', 'en');
     	}
      else {
        $this->session->set_userdata('language', 'English');
        $this->session->set_userdata('direction', 'ltr');
        $this->session->set_userdata('lng', 'en');
      }
      echo json_encode(array('status' => '1','msg' => 'Success'));
  }
  public function english_dictionary()
  {
    $this->session->set_userdata('language', 'english');
    $this->session->set_userdata('direction', 'ltr');
    $this->session->set_userdata('lng', 'en');
  }
  public function check()
  {
    $language  = $this->session->userdata('language');
    $direction = $this->session->userdata('direction');
    $lng       = $this->session->userdata('lng');
    $my_number = $this->input->post('my_number');
    $records  = $this->Maya_model->getSinglePredictionEachCategoryRandomly();
    $response['status'] = $status;
    $response['msg'] = $msg;
    echo json_encode($response);
  }
  function name()
  {
    $records  = $this->Maya_model->getSinglePredictionEachCategoryRandomly();
    echo '<pre>';
    print_r($records);
    exit();
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
        $categories[$value['id']] = $value;
      }
    }
    $counter = 1;
    foreach ($categories as $categoryDetails) {
      $counter = 1;
      $this->db->where('is_active','1');
      $this->db->where('is_delete','0');
      $this->db->where('category_id',$categoryDetails['id']);
      $query = $this->db->get('prediction_tbl');
      foreach ($query->result_array() as $key => $value) {
        if ($language == 'English') { 
          $title = $value['prediction_en'];
        }
        else {
          $title = $value['prediction_en'];
        }
        $value['prediction_id'] = $value['id'];
        $value['title'] = $title;
        $all_categories[$categoryDetails['id']][$counter] = $value;
        $counter++;
      }
    }
    foreach ($all_categories as $predictions) {
      $predictions_count    = sizeof($predictions);
      $random_prediction_id = rand(1,$predictions_count);
      $prediction           = $predictions[$random_prediction_id];
      $category_id          = $prediction['category_id'];
      $category_name        = $categories[$category_id]['title'];
      $prediction['category_name'] = $category_name;
      $data[] = $prediction;
    }
    echo '<pre>';
    print_r($data);
    exit();





    $this->db->select('categories_tbl.id as category_id,categories_tbl.title_en,categories_tbl.title_en,prediction_tbl.id,prediction_tbl.prediction_en,prediction_tbl.prediction_ar');
    $this->db->from('prediction_tbl');
    $this->db->join('categories_tbl', 'categories_tbl.id = prediction_tbl.category_id');
    $this->db->where('categories_tbl.is_active','1');
    $this->db->where('categories_tbl.is_delete','0');
    $this->db->where('prediction_tbl.is_active','1');
    $this->db->where('prediction_tbl.is_delete','0');
    $this->db->group_by('prediction_tbl.category_id');
    $this->db->order_by('rand()');
    $this->db->limit('12');
    $query = $this->db->get();
    echo $this->db->last_query();
  }
}
