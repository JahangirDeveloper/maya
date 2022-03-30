<?php
if (!defined('BASEPATH')){
	exit('No direct script access allowed');
} 
class User_model extends CI_Model {
	function __construct() {
		$this->load->database();
	  	parent::__construct();
        $lng      = $this->session->userdata('lng');
        $dir      = $this->session->userdata('dir');
        $language = $this->session->userdata('language');
	}
    public function addUser($data)
    {
        if($this->db->insert('user_tbl',$data)){
            return true;
        }
        else{
            return false;
        }
    }

    public function editUser($id,$data)
    {
        $this->db->where('id',$id);
        if($this->db->update('user_tbl', $data)){
            return true;
        }
        else {
            return false;
        }
    }
    public function getUsers($id=false,$role_id=false)
    {
        if($id){
            $this->db->where('id',$id);
        }
        if($role_id){
            $this->db->where('role_id',$role_id);
        }
        $this->db->where('is_active','1');
        $this->db->where('is_delete','0');
        $query = $this->db->get('user_tbl');
        if($query->num_rows() > 0) {
            foreach ($query->result_array() as $key => $value) {
                $data[$value['id']] = $value;
            }
            return $data;
        }
        else {
            return array();
        }
    }
    public function getUserDetails($id=false)
    {
        if($id){
            $this->db->where('id',$id);
        }
        $this->db->where('is_active','1');
        $this->db->where('is_delete','0');
        $query = $this->db->get('user_tbl');
        if($query->num_rows() > 0) {
            $rows = $query->result_array();
            return $rows['0'];
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
    public function getUserPermissions($user_id=false)
    {
        $data = array();
        $this->db->where('is_delete','0');
        if($user_id){
            $this->db->where('user_id',$user_id);
        }
       $query = $this->db->get('permissions_assigned_tbl');
       foreach ($query->result_array() as $key => $value) {
           $data[$value['permission_id']] = $value['permission_id'];
       }
       return $data;
    }
    public function getUserRoleStats($user_role_id=false)
    {
        $lng      = $this->session->userdata('lng');
        $dir      = $this->session->userdata('dir');
        $language = $this->session->userdata('language');

        if($user_role_id){
            $this->db->where('id',$user_role_id);
        }
        $this->db->where('is_active','1');
        $this->db->where('is_delete','0');
        $query = $this->db->get('user_role_tbl');
        if($query->num_rows() > 0) {
            foreach ($query->result_array() as $key => $value) {
                $userCountofUserRole = $this->countUsersByType($value['id']);
                if ($language == 'English') {
                    $title = $value['title_en'];
                }
                else{
                    $title = $value['title_ar'];
                }
                $value['title'] = $title;
                $value['userCountofUserRole'] = $userCountofUserRole;
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
        $language = $this->session->userdata('language');
        $dir      = $this->session->userdata('dir');
        $lng      = $this->session->userdata('lng');
        $data  = array();
        $this->db->select('permissions_user_role_tbl.permission_id,permissions_tbl.*');
        $this->db->from('permissions_tbl');
        $this->db->join('permissions_user_role_tbl', 'permissions_user_role_tbl.permission_id = permissions_tbl.id');
        if($user_role_id){
            $this->db->where('permissions_user_role_tbl.user_role_id',$user_role_id);
        }
        $this->db->order_by('permissions_tbl.id','asc');
        $this->db->where('permissions_tbl.is_active','1');
        $this->db->where('permissions_tbl.is_delete','0');
        $this->db->where('permissions_user_role_tbl.is_delete','0');
        $query = $this->db->get();
        foreach ($query->result_array() as $key => $value) {
            if($language == 'English'){
                $title      = $value['title_en'];
            }
            else{
                $title      = $value['title_ar'];
            }
            $value['title'] = $title;
            $data[$value['permission_id']] = $value;
        }
       return $data;
    }
    public function getCountry($country_id=false)
    {
        $language = $this->session->userdata('language');
        $dir      = $this->session->userdata('dir');
        $lng      = $this->session->userdata('lng');
        if($country_id){
            $this->db->where('id',$country_id);
        }
        $this->db->where('level','1');
        $this->db->where('is_active','1');
        $this->db->where('is_delete','0');
        $query = $this->db->get('area_tbl');
        if($query->num_rows() > 0) {
            foreach ($query->result_array() as $key => $value) {
                if($language == 'English'){
                    $title      = $value['title_en'];
                }
                else{
                    $title      = $value['title_ar'];
                }
                $value['title']  =$title;
                $data[$value['id']] = $value;
            }
            return $data;
        }
        else {
            return array();
        }
    }
    public function getState($State_id=false)
    {
        $language = $this->session->userdata('language');
        $dir      = $this->session->userdata('dir');
        $lng      = $this->session->userdata('lng');

        if($State_id){
            $this->db->where('id',$State_id);
        }
        $this->db->where('level','2');
        $this->db->where('is_active','1');
        $this->db->where('is_delete','0');
        $query = $this->db->get('area_tbl');
        if($query->num_rows() > 0) {
            foreach ($query->result_array() as $key => $value) {
                if($language == 'English'){
                    $title      = $value['title_en'];
                }
                else{
                    $title      = $value['title_ar'];
                }
                $value['title']  =$title;
                $data[$value['id']] = $value;
            }
            return $data;
        }
        else {
            return array();
        }
    }
    public function getCity($state_id=false)
    {
        $language = $this->session->userdata('language');
        $dir      = $this->session->userdata('dir');
        $lng      = $this->session->userdata('lng');

        if($state_id){
            $this->db->where('state_id',$state_id);
        }
        $this->db->where('level','3');
        $this->db->where('is_active','1');
        $this->db->where('is_delete','0');
        $query = $this->db->get('area_tbl');
        if($query->num_rows() > 0) {
            foreach ($query->result_array() as $key => $value) {
                if($language == 'English'){
                    $title      = $value['title_en'];
                }
                else{
                    $title      = $value['title_ar'];
                }
                $value['title']  =$title;
                $data[$value['id']] = $value;
            }
            return $data;
        }
        else {
            return array();
        }
    }
    public function getArea($city_id=false)
    {
        $language = $this->session->userdata('language');
        $dir      = $this->session->userdata('dir');
        $lng      = $this->session->userdata('lng');

        if($city_id){
            $this->db->where('city_id',$city_id);
        }
        $this->db->where('level','4');
        $this->db->where('is_active','1');
        $this->db->where('is_delete','0');
        $query = $this->db->get('area_tbl');
        if($query->num_rows() > 0) {
            foreach ($query->result_array() as $key => $value) {
                if($language == 'English'){
                    $title      = $value['title_en'];
                }
                else{
                    $title      = $value['title_ar'];
                }
                $value['title']  =$title;
                $data[$value['id']] = $value;
            }
            return $data;
        }
        else {
            return array();
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
        $this->db->where('is_active','1');
        $this->db->where('is_delete','0');
        $this->db->where('id != ','1');
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
    
}
?>