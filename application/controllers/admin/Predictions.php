<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Predictions extends CI_Controller {
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
        $this->load->model('Predictions_model');
    }
    public function index($category_id_encoded=false)
	{
		$this->data['pageTitle'] = $this->lang->line('Predictions');
		$this->data['predictions'] = $this->Predictions_model->getPrediction(false,base64_decode($category_id_encoded));
		$this->data['categories']      = $this->Predictions_model->getCategory();
		$this->data['category_id_encoded'] = $category_id_encoded;
		$this->load->view('admin/predictions/index',$this->data);
	}
    public function add($category_id_encoded=false)
	{
		$this->data['pageTitle'] = $this->lang->line('add_Prediction');
		$this->data['categories'] = $this->Predictions_model->getCategory();
		$this->data['category_id_encoded'] = $category_id_encoded;
		$this->data['error'] = array();
		$btnADD = $this->input->post('btnADD');
		if(isset($btnADD)) {
			$this->form_validation->set_error_delimiters('<div class="text-uppercase col-pink mt10">', '</div>');
			$this->form_validation->set_rules('category_id', $this->lang->line('Category'), 'required|trim');
			$this->form_validation->set_rules('prediction_en', $this->lang->line('Prediction_EN'), 'required|trim');
			$this->form_validation->set_rules('prediction_ar', $this->lang->line('Prediction_AR'), 'required|trim');
			if ($this->form_validation->run() == FALSE) {
				$this->load->view('admin/predictions/add',$this->data);
			}
			else {
				$category_id   = $this->input->post('category_id');
				$prediction_en   = $this->input->post('prediction_en');
				$prediction_ar   = $this->input->post('prediction_ar');
	        	$Save_data = array(
	                'category_id'   => $category_id,
	                'prediction_en' => $prediction_en,
	                'prediction_ar' => $prediction_ar,
	                'user_id'       => $this->session->userdata('id'),
	                'inserted_at'   => time(),
	            );
	            //Transfering data to Model
				$is_saved = $this->Predictions_model->addPrediction($Save_data);
				if($is_saved) {
					$Flashdata['status'] = '1';
	                $Flashdata['alert_type'] = 'alert-success';
	                $Flashdata['alert_heading'] = 'SUCCESS';
	                $Flashdata['alert_msg'] = 'SAVED SUCCESSFULLY';
	                $this->session->set_flashdata($Flashdata);
					if($btnADD =='yes'){
						redirect(base_url()."admin/predictions/add/".base64_encode($category_id));
					}
					elseif ($btnADD =='yes_close') {
						redirect(base_url()."admin/predictions/index/".base64_encode($category_id));
					}
				}
				else {
					redirect(base_url()."admin/predictions/add/".base64_encode($category_id));
				}
			}
		}
		else {
			// Show EMPTY Form with data if there 
			$this->load->view('admin/predictions/add',$this->data);
		}
	}
	public function edit($prediction_id_encoded=false)
	{
		$this->data['pageTitle'] = $this->lang->line('edit_Prediction');
		$this->data['error'] = array();
		$this->data['prediction_id_encoded'] = $prediction_id_encoded;
		$this->data['prediction_id'] =$prediction_id = base64_decode($prediction_id_encoded);
		$this->data['PredictionDetails'] = $this->Predictions_model->getPredictionDetails($prediction_id);
		$this->data['categories'] = $this->Predictions_model->getCategory();
		if($prediction_id){
			$btnEdit = $this->input->post('btnEdit');
			if(isset($btnEdit)) {
				$category_id   = $this->input->post('category_id');
				$prediction_en   = $this->input->post('prediction_en');
				$prediction_ar     = $this->input->post('prediction_ar');
	        	$Save_data = array(
	                'category_id' => $category_id,
	                'prediction_en' => $prediction_en,
	                'prediction_ar' => $prediction_ar,
	                'user_id'     => $this->session->userdata('id'),
	                'updated_at' => time(),
	            );
				$is_edited = $this->Predictions_model->editPrediction($prediction_id,$Save_data);
				if($is_edited) {
					$Flashdata['status'] = '1';
                    $Flashdata['alert_type'] = 'alert-success';
                    $Flashdata['alert_heading'] = 'SUCCESS';
                    $Flashdata['alert_msg'] = 'Updated SUCCESSFULLY';
                    $this->session->set_flashdata($Flashdata);
					if($btnEdit =='yes'){
						redirect(base_url()."admin/predictions/edit/".$prediction_id_encoded);
					}
					elseif ($btnEdit =='yes_close') {
						redirect(base_url()."admin/predictions/index/".base64_encode($category_id));
					}
				}
				else {
					redirect(base_url()."admin/predictions/edit/".$prediction_id_encoded);
				}
			}
			else {
				// Show Edit Form with data if there 
				$this->load->view('admin/predictions/edit',$this->data);
			}
		}
		else {
			show_404();
		}
	}
}
