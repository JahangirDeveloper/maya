<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {
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
        $this->load->model('Category_model');
    }
    public function index()
	{
		$this->data['pageTitle'] =  $this->lang->line('Categories');;
		$this->data['categories'] = $this->Category_model->getCategory();
		$this->load->view('admin/category/index',$this->data);
	}
    public function add()
	{
		$this->data['pageTitle'] = $this->lang->line('add_Category');
		$this->data['error'] = array();
		$btnADD = $this->input->post('btnADD');
		if(isset($btnADD)) {
			$this->form_validation->set_error_delimiters('<div class="text-uppercase col-pink mt10">', '</div>');
			$this->form_validation->set_rules('title_en', $this->lang->line('Title_EN'), 'required|trim');
			$this->form_validation->set_rules('title_ar', $this->lang->line('Title_AR'), 'required|trim');
			if ($this->form_validation->run() == FALSE) {
				$this->load->view('admin/category/add',$this->data);
			}
			else {
				$title_en   = $this->input->post('title_en');
				$title_ar   = $this->input->post('title_ar');
	        	$Save_data = array(
	                'title_en' => $title_en,
	                'title_ar' => $title_ar,
	                'user_id'     => $this->session->userdata('id'),
	                'inserted_at' => time(),
	            );
	            //Transfering data to Model
				$is_saved = $this->Category_model->addCategory($Save_data);
				if($is_saved) {
					$Flashdata['status'] = '1';
	                $Flashdata['alert_type'] = 'alert-success';
	                $Flashdata['alert_heading'] = 'SUCCESS';
	                $Flashdata['alert_msg'] = 'SAVED SUCCESSFULLY';
	                $this->session->set_flashdata($Flashdata);
					if($btnADD =='yes'){
						redirect(base_url()."admin/category/add/");
					}
					elseif ($btnADD =='yes_close') {
						redirect(base_url()."admin/category/index/");
					}
				}
				else {
					redirect(base_url()."admin/category/add/");
				}
			}
		}
		else {
			// Show EMPTY Form with data if there 
			$this->load->view('admin/category/add',$this->data);
		}
	}
	public function edit($category_id_encoded=false)
	{
		$this->data['pageTitle'] = $this->lang->line('Edit_Category');
		$this->data['error'] = array();
		$this->data['category_id_encoded'] = $category_id_encoded;
		$this->data['category_id'] =$category_id = base64_decode($category_id_encoded);
		$this->data['categoryDetails'] = $this->Category_model->getCategoryDetails($category_id);
		if($category_id){
			$btnEdit = $this->input->post('btnEdit');
			if(isset($btnEdit)) {
				$title_en   = $this->input->post('title_en');
				$title_ar   = $this->input->post('title_ar');
	        	$Save_data = array(
	                'title_en' => $title_en,
	                'title_ar' => $title_ar,
	                'user_id'     => $this->session->userdata('id'),
	                'updated_at' => time(),
	            );
				$is_edited = $this->Category_model->editCategory($category_id,$Save_data);
				if($is_edited) {
					$Flashdata['status'] = '1';
                    $Flashdata['alert_type'] = 'alert-success';
                    $Flashdata['alert_heading'] = 'SUCCESS';
                    $Flashdata['alert_msg'] = 'Updated SUCCESSFULLY';
                    $this->session->set_flashdata($Flashdata);
					if($btnEdit =='yes'){
						redirect(base_url()."admin/category/edit/".$category_id_encoded);
					}
					elseif ($btnEdit =='yes_close') {
						redirect(base_url()."admin/category/index/");
					}
				}
				else {
					redirect(base_url()."admin/category/edit/".$category_id_encoded);
				}
			}
			else {
				// Show Edit Form with data if there 
				$this->load->view('admin/category/edit',$this->data);
			}
		}
		else {
			show_404();
		}
	}
}
