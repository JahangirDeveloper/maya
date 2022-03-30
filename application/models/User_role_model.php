<?php
if (!defined('BASEPATH')){
	exit('No direct script access allowed');
} 
class User_role_model extends CI_Model {
	function __construct() {
		$this->load->database();
	  	parent::__construct();
        $lng      = $this->session->userdata('lng');
        $dir      = $this->session->userdata('dir');
        $language = $this->session->userdata('language');
	}
    public function addUserRole($data)
    {
        if($this->db->insert('user_role_tbl',$data)){
            return true;
        }
        else{
            return false;
        }
    }

    public function editUserRole($id,$data)
    {
        $this->db->where('id',$id);
        if($this->db->update('user_role_tbl', $data)){
            return true;
        }
        else {
            return false;
        }
    }
    public function getUserRole($id=false)
    {
        $lng      = $this->session->userdata('lng');
        $dir      = $this->session->userdata('dir');
        $language = $this->session->userdata('language');

        if($id){
            $this->db->where('id',$id);
        }
        $this->db->where('id !=','1');
        $this->db->where('is_active','1');
        $this->db->where('is_delete','0');
        $query = $this->db->get('user_role_tbl');
        if($query->num_rows() > 0) {
            foreach ($query->result_array() as $key => $value) {
                if ($language == 'English') {
                    $title = $value['title_en'];
                }
                else{
                    $title = $value['title_ar'];
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
    public function getUserRoleDetails($user_id=false)
    {
        $lng      = $this->session->userdata('lng');
        $dir      = $this->session->userdata('dir');
        $language = $this->session->userdata('language');

        if($user_id){
            $this->db->where('id',$user_id);
        }
        $this->db->where('is_active','1');
        $this->db->where('is_delete','0');
        $this->db->limit('1');
        $query = $this->db->get('user_role_tbl');
        if($query->num_rows() > 0) {
            foreach ($query->result_array() as $key => $value) {
                if ($language == 'English') {
                    $title = $value['title_en'];
                }
                else{
                    $title = $value['title_ar'];
                }
                $value['title'] = $title;
            }
            return $value;
        }
        else {
            return array();
        }
    }
    public function getPermissions($user_id=false,$user_role_id=false)
    {
        $lng      = $this->session->userdata('lng');
        $dir      = $this->session->userdata('dir');
        $language = $this->session->userdata('language');

        if($user_id){
            $this->db->where('id',$user_id);
        }
        $this->db->where('is_active','1');
        $this->db->where('is_delete','0');
        $this->db->order_by('id','asc');
        $query = $this->db->get('permissions_tbl');
        if($query->num_rows() > 0) {
            foreach ($query->result_array() as $key => $value) {
                if ($language == 'English') {
                    $title = $value['title_en'];
                }
                else {
                    $title = $value['title_ar'];
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
    public function getUserRolePermissions($user_role_id=false)
    {
        $data = array();
        if($user_role_id){
            $this->db->where('user_role_id',$user_role_id);
        }
        $this->db->where('is_delete','0');
        $this->db->order_by('permission_id','asc');
       $query = $this->db->get('permissions_user_role_tbl');
       foreach ($query->result_array() as $key => $value) {
           $data[] = $value['permission_id'];
       }
       return $data;
    }
    public function getUserRolePermissionRecord($user_role_id=false)
    {
        $lng      = $this->session->userdata('lng');
        $dir      = $this->session->userdata('dir');
        $language = $this->session->userdata('language');

        $data = array();
        if($user_role_id){
            $this->db->where('user_role_id',$user_role_id);
        }
        $this->db->where('is_delete','0');
        $query = $this->db->get('user_role_permissions_tbl');
        foreach ($query->result_array() as $key => $value) {
            $data[$value['permission_id']] = $value;
        }
        return $data;
    }
    public function getPermissionName($permission_id=false)
    {
        $lng      = $this->session->userdata('lng');
        $dir      = $this->session->userdata('dir');
        $language = $this->session->userdata('language');

        if($permission_id){
            $this->db->where('id',$permission_id);
        }
        $query = $this->db->get('permissions_tbl');
        if ($query->num_rows() == '1') {
           $result = $query->result_array();
           if ($language == 'English') {
              return $result['0']['title_en'];
           }
           else {
                return $result['0']['title_ar'];
           }
        }
        else {
            return '';
        }
    }

    public function getUsersCountByUserRole($user_role_id=false)
    {
        $lng      = $this->session->userdata('lng');
        $dir      = $this->session->userdata('dir');
        $language = $this->session->userdata('language');

        if($id){
            $this->db->where('id',$id);
        }
        $this->db->where('is_active','1');
        $this->db->where('is_delete','0');
        $query = $this->db->get('user_role_tbl');
        if($query->num_rows() > 0) {
            foreach ($query->result_array() as $key => $value) {
                if ($language == 'English') {
                    $title = $value['title_en'];
                }
                else{
                    $title = $value['title_ar'];
                }
                $value['title'] = $title;
                $value['userCountofUserRole'] = $this->countUsersByType($value['id']);
                $data[$value['id']] = $value;
            }
            return $data;
        }
        else {
            return array();
        }
    }

    public function countUsersByType($role_id=false)
    {
        $lng      = $this->session->userdata('lng');
        $dir      = $this->session->userdata('dir');
        $language = $this->session->userdata('language');
        
        if($role_id){
            $this->db->where('role_id',$role_id);
        }
        $this->db->where('is_active','1');
        $this->db->where('is_delete','0');
        $query = $this->db->get('user_tbl');
        return $query->num_rows();
    }
    
}
?>