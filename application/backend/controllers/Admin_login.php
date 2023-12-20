<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin_login extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    function index()
    {
        if ($this->session->userdata('jw_admin_id')!="")
        {
            redirect(base_url().'admin_dashboard');
        }
        $this->load->view('common/login');
    }
    function login_submit()
    {
        $message = "";
        $status = 0;
        $url = "";
        $this->form_validation->set_rules('username', 'Email', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() == FALSE) 
        {
            $message = 'Please Fill the Form Correctly!';
            $this->session->set_flashdata('alert',$message);
            redirect(base_url('login'),'refresh');
        }
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $login_detail=$this->admin_model->check_login($username,getHash($password));

        if(count(array_filter($login_detail)))
        {
            $this->session->set_userdata('jw_admin_id',$login_detail[0]->CD_USER_ID);
            $this->session->set_userdata('jw_admin_name',$login_detail[0]->NM_USER_FULLNAME);            
            $this->session->set_userdata('jw_admin_group',$login_detail[0]->CD_GROUP_ID);            
            $this->session->set_userdata('jw_admin_folder',$login_detail[0]->NM_FOLDER_NAME);            
            redirect(base_url().'admin_dashboard');            
        }
        else
        {
            $this->session->set_flashdata('alert','Wrong Username or Password !');
            redirect(base_url().'admin_login');
        }
    }
    function logout()
    {
        //session_destroy();
        $this->session->unset_userdata('jw_admin_id');
        $this->session->unset_userdata('jw_admin_name');
        $this->session->unset_userdata('jw_admin_group');

        $this->session->set_flashdata('success','Successfully Logout !');
        redirect(base_url().'admin_login');
    }
}
?>
