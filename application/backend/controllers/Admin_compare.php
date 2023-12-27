<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class admin_compare extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('image_lib');
        $this->load->model('product_model');
        $this->load->model('category_model');
        if ($this->session->userdata('jw_admin_id')=="")
        {
            redirect(base_url().'admin_login');
        }
    } 

    function add_compare()
    {
        $data['active']="class";
        $this->load->view('common/header');
        $this->load->view('common/sidebar',$data);
        $this->load->view('compare/compare_add_view',$data);
        $this->load->view('common/footer');
    }
    
   
}
?>
