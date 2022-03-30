<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {

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
        $this->load->model('Pages_model');
  	}
	public function index($page_link=false) {
	    $this->data['language'] = $this->session->userdata('language');
	    $this->data['direction'] = $this->session->userdata('direction');
	    $this->data['lng'] = $this->session->userdata('lng');
	    if($page_link){
	    	$pageDetails  = $this->Pages_model->getPageDetails(false,$page_link);
	    	$this->data['pageTitle'] = $pageDetails['title'];
	    	$this->data['pageDetails'] = $pageDetails;
			$this->load->view('page/index',$this->data);
	    }
	    else {
	    	show_404();
	    	
		}
    }
}
