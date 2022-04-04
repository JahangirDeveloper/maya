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
        $this->load->library('paypal_lib');
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
        redirect(base_url().'Maya/predictions/');
    }
    else {
      $this->load->view('index',$this->data);
    }
	}
  public function predictions($id_encoded=false)
  {
    $name    = $this->session->userdata('name');
    $user_id = $this->session->userdata('user_id');
    $this->data['language'] = $this->session->userdata('language');
    $this->data['direction'] = $this->session->userdata('direction');
    $this->data['lng'] = $this->session->userdata('lng');
    $this->data['pageTitle'] = 'MAYA';
    $is_paid = $this->Maya_model->checkIsPaid(base64_decode($id_encoded));
    if($is_paid == 'yes'){
      $this->data['records'] = $this->Maya_model->getSinglePredictionEachCategoryRandomly();
    }
    else {
      $this->data['records'] = $this->Maya_model->getSinglePredictionEachCategoryRandomly();
    }
    // echo $this->db->last_query();
    // echo '<pre>';
    // print_r($this->data['records']);
    $this->data['is_paid'] = $is_paid;
    $this->load->view('predictions',$this->data);
  }  
  public function buy(){ 
    $userID = !empty($_SESSION['userID'])?$_SESSION['userID']:99; 
    // Set variables for paypal form 
    // $paymentData = [ 
    //                 'user_id' => $userID,
    //                 'product' => 'Predictions',
    //                 'payment_gross' => 20,
    //                 'payment_net' => 20,
    //                 'currency_code' => 'USD',
    //                 'payer_email' => '',
    //                 'payment_status' => '',
    //               ];
    // $this->db->insert('payments',$paymentData);
    // $insert_id = $this->db->insert_id();
    // $encode_id = urlencode($insert_id);
    $returnURL = base_url().'Maya/paymentSuccess/'; //payment success url 

    $cancelURL = base_url().'Maya/paymentFail'; //payment cancel url 
    $notifyURL = base_url().'Maya/IPN'; //ipn url 
    // Get product data from the database 
    $productDetails['id'] = '1';
    $productDetails['name'] = 'MAYA PREDICTIONS';
    $productDetails['price'] = Product_Price;
    // Get current user ID from the session (optional) 
    
    // Add fields to paypal form 
    $this->paypal_lib->add_field('return', $returnURL); 
    $this->paypal_lib->add_field('cancel_return', $cancelURL); 
    $this->paypal_lib->add_field('notify_url', $notifyURL); 
    $this->paypal_lib->add_field('item_name', $productDetails['name']); 
    $this->paypal_lib->add_field('custom', $userID); 
    $this->paypal_lib->add_field('item_number',  $productDetails['id']); 
    $this->paypal_lib->add_field('amount',  $productDetails['price']); 
    // Render paypal form 
    $this->paypal_lib->paypal_auto_form(); 
  } 
  
  public function paymentSuccess(){
 
        //get the transaction data
        $paypalInfo            = $this->input->post();

        print_r($paypalInfo);

        $data['item_number']   = $paypalInfo['item_number']; 
        $data['txn_id']        = $paypalInfo["tx"];
        $data['payment_amt']   = $paypalInfo["amt"];
        $data['currency_code'] = $paypalInfo["cc"];
        $data['status']        = $paypalInfo["st"];

        // Array ( [payer_email] => sb-y3e4v15251323@business.example.com [payer_id] => 9WGRD24R9DE6U [payer_status] => VERIFIED [first_name] => John [last_name] => Doe [address_name] => John Doe [address_street] => 1 Main St [address_city] => San Jose [address_state] => CA [address_country_code] => US [address_zip] => 95131 [residence_country] => US [txn_id] => 5YS4949171649513V [mc_currency] => USD [mc_gross] => 20.00 [protection_eligibility] => INELIGIBLE [payment_gross] => 20.00 [payment_status] => Pending [pending_reason] => unilateral [payment_type] => instant [handling_amount] => 0.00 [shipping] => 0.00 [item_name] => MAYA PREDICTIONS [item_number] => 1 [quantity] => 1 [txn_type] => web_accept [payment_date] => 2022-04-04T14:16:30Z [notify_version] => UNVERSIONED [custom] => 99 [verify_sign] => AuUuRLmOEKj94rqVAeEKJXSfWD2VA3Z1R8WDTByWsrQgbsiQbSXxXXRj )
        
        
        //pass the transaction data to view
        $this->load->view('paypal/paymentSuccess', $data);
     }
      
  public function paymentFail(){
    //if transaction cancelled
    $this->load->view('paypal/paymentFail');
  }
      
  
  //TODO:
  //make transaction_status table that stores all the notifications from paypal
  
  //IPN is the NotificationURL that paypal will call everytime there is change in the transaction status
  public  function IPN(){
    //paypal return transaction details array
    $paypalInfo    = $this->input->post();    

    if ($paypalInfo['payment_status'] == 'pedning') {
      // update the transaction
    }

    $data['user_id'] = $paypalInfo['custom'];
    $data['product_id']    = $paypalInfo["item_number"];
    $data['txn_id']    = $paypalInfo["txn_id"];
    $data['payment_gross'] = $paypalInfo["mc_gross"];
    $data['currency_code'] = $paypalInfo["mc_currency"];
    $data['payer_email'] = $paypalInfo["payer_email"];
    $data['payment_status']    = $paypalInfo["payment_status"];
    $paypalURL = $this->paypal_lib->paypal_url;        
    $result    = $this->paypal_lib->curlPost($paypalURL,$paypalInfo);
    //check whether the payment is verified
    if(preg_match("/VERIFIED/i",$result)){
      //insert the transaction data into the database
      $this->product->storeTransaction($data);
    }
  }
}
