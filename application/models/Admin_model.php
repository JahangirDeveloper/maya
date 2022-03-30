<?php
if (!defined('BASEPATH')){
	exit('No direct script access allowed');
} 
class Admin_model extends CI_Model {
	function __construct() {
		$this->load->database();
	  	parent::__construct();
        $lng      = $this->session->userdata('lng');
        $dir      = $this->session->userdata('dir');
        $language = $this->session->userdata('language');
	}
    public function edit($tbl=false,$col=false,$row=false,$value=false)
    {
        $user_id      = $this->session->userdata('id');
        $this->db->set($col,$value);
        $this->db->set('updated_at',time());
        if($tbl!='user_tbl'){
           $this->db->set('user_id',$user_id); 
        }
        $this->db->where('id',$row);
        if($this->db->update($tbl)){
            return TRUE;
        }
        else {
            return FALSE;
        }
    }
    public function delete($tbl=false,$id=false)
    {
        $user_id      = $this->session->userdata('id');
        $this->db->set('is_delete','1');
        $this->db->set('updated_at',time());
        $this->db->set('user_id',$user_id);
        $this->db->where('id',$id);
        if($this->db->update($tbl)){
            return TRUE;
        }
        else {
            return FALSE;
        }
    }
    
}
?>