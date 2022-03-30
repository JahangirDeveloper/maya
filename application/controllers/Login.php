<?php
/**
 * Description of login
 *
 * @author Jahangir Khattak (jahangirkhattak13@gmail.com)
 */
class Login extends CI_Controller {
    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('language')) {
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
        $this->load->model("Login_model", "model_login");
        $this->load->model('Maya_model');
        $this->load->model('User_role_model','user_role_model');
    }
    public function index() {
        $is_login = $this->session->userdata('is_login');
        $this->data['pageTitle']  = 'Login';
        if ($is_login =='yes') {
            redirect(base_url().'admin/','refresh');
        } else {
            $is_submit = $this->input->post('btn_login');
            if ($is_submit =='yes') {
                $email    = $this->input->post('email',true);
                $password = $this->input->post('password', true);
                $this->form_validation->set_error_delimiters('<div class="text-uppercase text-red mt10">', '</div>');
                $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
                $this->form_validation->set_rules('password', 'password', 'trim|required|min_length[4]|max_length[40]');
                if ($this->form_validation->run() == FALSE) {
                    $this->load->view("user/loginscreen",$this->data);
                }
                else {
                    $password_md5 = md5($password);
                    $user  = $this->model_login->verify($email,$password_md5);
                    if (sizeof($user) > 0 && $user["email_verify"] == 'Yes') {
                        $access  = $this->model_login->getUserPermissions($user["id"]);
                        // echo $this->db->last_query();
                        // exit();
                        $sessionData = array(
                            'id' => $user["id"],
                            'user_id' => $user["id"],
                            'role_id' => $user["role_id"],
                            'saloon_id' => $user["saloon_id"],
                            'email' => $user["email"],
                            'name' => $user["first_name"].' '.$user["last_name"],
                            'image' => $user["profile_image"],
                            'is_login' => 'yes',
                            'language' => 'English',
                            'lng' => 'en',
                            'dir' => 'ltr',
                            'last_login' => getUserLastLoginDate($user["id"]),
                            'access' => $access,
                        );

                        $link  = $this->model_login->getUserRoleDashboardLink($user["role_id"]);
                        $this->my_library->create_logs($user["id"],false,false,false,'login');
                        $this->session->set_userdata($sessionData);
                        // echo $this->session->userdata('name');
                        // exit();

                        $Flashdata['status'] = '1';
                        $Flashdata['alert_type'] = 'alert-success';
                        $Flashdata['alert_heading'] = 'Success';
                        $Flashdata['alert_msg'] = 'WELCOME TO JALALAIKI';
                        $this->session->set_flashdata($Flashdata);
                        if($link!=''){
                            redirect(base_url().$link);
                        }
                        else {
                            redirect(base_url());
                        }
                    }
                    elseif (sizeof($user) > 0 && $user["email_verify"] != 'Yes') {
                        $Flashdata['status'] = '0';
                        $Flashdata['alert_type'] = 'alert-danger';
                        $Flashdata['alert_heading'] = 'FAILED';
                        $Flashdata['alert_msg'] = 'PLEASE VERIFY YOUR EMAIL';
                        $this->session->set_flashdata($Flashdata);
                        $this->load->view("user/loginscreen",$this->data);
                    }
                    else {
                        $Flashdata['status'] = '1';
                        $Flashdata['alert_type'] = 'alert-danger';
                        $Flashdata['alert_heading'] = 'FAILED';
                        $Flashdata['alert_msg'] = 'WRONG EMAIL OR PASSWORD.';
                        $this->session->set_flashdata($Flashdata);
                        $this->load->view("user/loginscreen",$this->data);
                    }
                }
            }
            else {
                $this->load->view("user/loginscreen",$this->data);
            }
        }
    }
    public function customerlogin() {
        $is_login = $this->session->userdata('is_login');
        $this->data['pageTitle']  = 'Login';
        if ($is_login =='yes') {
            redirect(base_url().'admin/','refresh');
        } else {
            $is_submit = $this->input->post('btn_login');
            if ($is_submit =='yes') {
                $email = $this->input->post('email',true);
                $password = $this->input->post('password', true);
                
                $this->form_validation->set_error_delimiters('<div class="text-uppercase text-red mt10">', '</div>');
                $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
                $this->form_validation->set_rules('password', 'password', 'trim|required');
               
                if ($this->form_validation->run() == FALSE) {
                    $this->load->view("user/customerloginscreen",$this->data);
                }
                else {
                    $password_md5 = md5($password);
                    $user  = $this->model_login->verify($email,$password_md5);
                    if (sizeof($user) > 0 && $user["email_verify"] == 'Yes') {
                        $access  = $this->model_login->getUserPermissions($user["id"]);
                        // echo $this->db->last_query();
                        // exit();
                        $sessionData = array(
                            'id' => $user["id"],
                            'user_id' => $user["id"],
                            'role_id' => $user["role_id"],
                            'saloon_id' => $user["saloon_id"],
                            'email' => $user["email"],
                            'name' => $user["first_name"].' '.$user["last_name"],
                            'image' => $user["profile_image"],
                            'is_login' => 'yes',
                            'language' => 'English',
                            'lng' => 'en',
                            'dir' => 'ltr',
                            'last_login' => getUserLastLoginDate($user["id"]),
                            'access' => $access,
                        );

                        $link  = $this->model_login->getUserRoleDashboardLink($user["role_id"]);
                        $this->my_library->create_logs($user["id"],false,false,false,'login');
                        $this->session->set_userdata($sessionData);
                        // echo $this->session->userdata('name');
                        // exit();

                        $Flashdata['status'] = '1';
                        $Flashdata['alert_type'] = 'alert-success';
                        $Flashdata['alert_heading'] = 'Success';
                        $Flashdata['alert_msg'] = 'WELCOME TO JALALAIKI';
                        $this->session->set_flashdata($Flashdata);
                        if($link!=''){
                            redirect(base_url().'/'.$link);
                        }
                        else {
                            redirect(base_url());
                        }
                    }
                    elseif (sizeof($user) > 0 && $user["email_verify"] != 'Yes') {
                        $Flashdata['status'] = '1';
                        $Flashdata['alert_type'] = 'alert-danger';
                        $Flashdata['alert_heading'] = 'FAILED';
                        $Flashdata['alert_msg'] = 'PLEASE VERIFY YOUR EMAIL';
                        $this->session->set_flashdata($Flashdata);
                        $this->load->view("user/customerloginscreen",$this->data);
                    }
                    else {
                        $Flashdata['status'] = '1';
                        $Flashdata['alert_type'] = 'alert-danger';
                        $Flashdata['alert_heading'] = 'FAILED';
                        $Flashdata['alert_msg'] = 'WRONG EMAIL OR PASSWORD.';
                        $this->session->set_flashdata($Flashdata);
                        $this->load->view("user/customerloginscreen",$this->data);
                    }
                }
                
            }
            else {
                $this->load->view("user/customerloginscreen",$this->data);
            }
            
        }
    }
    public function logout() {
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('role_id');
        $this->session->unset_userdata('company_id');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('name');
        $this->session->unset_userdata('image');
        $this->session->unset_userdata('is_login');
        $this->session->unset_userdata('language');
        $this->session->unset_userdata('lng');
        $this->session->unset_userdata('dir');
        $this->session->unset_userdata('last_login');
        $this->session->unset_userdata('access');
        redirect(base_url());
    }
    public function verify($email_encoded=false)
    {
        $this->data['pageTitle']  = 'VERIFY';
        $email = base64_decode($email_encoded);
        $this->db->where('email',$email);
        $this->db->where('is_active','1');
        $this->db->where('is_delete','0');
        $this->db->order_by('id','desc');
        $this->db->limit('1');
        $query = $this->db->get('user_tbl');
        // echo $this->db->last_query();
        // exit();
        if($query->num_rows() > 0) {
            $rows = $query->result_array();
            $this->data['userDetails'] = $userDetails = $rows['0'];
            if($userDetails['email_verify'] == 'Yes'){
                $Flashdata['status'] = '1';
                $Flashdata['alert_type'] = 'alert-success';
                $Flashdata['alert_heading'] = $this->lang->line('Success');
                $Flashdata['alert_msg']     = $this->lang->line('Your_Account_is_Already_Verified');
            }
            else {
                $this->db->set('email_verify','Yes');
                $this->db->set('email_verification_date',time());
                $this->db->where('id',$userDetails['id']);
                if($this->db->update('user_tbl')){
                    $Flashdata['status'] = '1';
                    $Flashdata['alert_type'] = 'alert-success';
                    $Flashdata['alert_heading'] = $this->lang->line('Success');
                    $Flashdata['alert_msg']     = $this->lang->line('Your_Account_is_Verified_You_Can_Login_Now_And_Book_Your_Service_Now');
                }
                else {
                    $Flashdata['status'] = '1';
                    $Flashdata['alert_type'] = 'alert-danger';
                    $Flashdata['alert_heading'] = $this->lang->line('Failed');
                    $Flashdata['alert_msg']     = $this->lang->line('Try_Again');
                }
            }
            $this->session->set_flashdata($Flashdata);
            $this->load->view("verify",$this->data);
        }
    }
}
