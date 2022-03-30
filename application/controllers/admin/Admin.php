<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct() {
        parent::__construct();
        if ($this->session->userdata('is_login') != 'yes' || $this->session->userdata('role_id') == '4') {
        	redirect(base_url());
        }
        $language = $this->session->userdata('language');
        $direction = $this->session->userdata('direction');
        $lng = $this->session->userdata('lng');
        $this->data['language'] = $language;
        $this->data['direction'] = $direction;
        $this->data['lng'] = $lng;
        $this->lang->load('information', $language);
        $this->load->model('Admin_model');
    }
    function setlng($lnguage = false) {
	   	if ($lnguage == 'arabic') {
	      	$this->session->set_userdata('language', 'arabic');
	   		$this->session->set_userdata('direction', 'rtl');
	   		$this->session->set_userdata('lng', 'ar');
	   	}
	   	else if($lnguage == 'english'){
	      	$this->session->set_userdata('language', 'english');
	   		$this->session->set_userdata('direction', 'ltr');
	   		$this->session->set_userdata('lng', 'en');
	   	}
	    else {
	      	$this->session->set_userdata('language', 'arabic');
	      	$this->session->set_userdata('direction', 'rtl');
	      	$this->session->set_userdata('lng', 'ar');
	    }
	}
	public function index()
	{
		$access = $this->session->userdata('access');
		$this->data['pageTitle'] = 'CONTROL PANEL';
		$this->data['access'] = $access;
		$this->load->view('admin/index',$this->data);
	}
	public function edit()
	{
		$tbl   = base64_decode(trim($this->input->post('tbl')));
		$col   = base64_decode(trim($this->input->post('col')));
		$row   = base64_decode(trim($this->input->post('row')));
		$value = trim($this->input->post('value'));
		$is_edit = $this->Admin_model->edit($tbl,$col,$row,$value);
		if($is_edit){
			$status = '1';
			$msg = 'EDIT SUCCESSFULLY!!!';
		}
		else {
			$status = '0';
			$msg = 'REFRESH YOUR PAGE AND TRY AGAIN!!!';
		}
		echo json_encode(array('status' => $status,'msg' => $msg));
	}
	public function delete(){
	{
		$tbl = base64_decode($this->input->post('tbl'));
		$row = base64_decode($this->input->post('row'));
		$is_delete = $this->Admin_model->delete($tbl,$row);
		if($is_delete){
			$status = '1';
			$msg = 'DELETED  SUCCESSFULLY!!!';
		}
		else {
			$status = '0';
			$msg = 'REFRESH YOUR PAGE AND TRY AGAIN!!!';
		}
		echo json_encode(array('status' => $status,'msg' => $msg));
		}
	}
}
