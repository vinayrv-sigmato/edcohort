<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin_customer1 extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        if($this->session->userdata('jw_admin_id')=="") {
            redirect(base_url());
        }
        $this->load->model('customer_model');
        $this->load->model('vendor_model');
        $this->load->library('excel');
        $this->load->library('pagination');      
        $this->load->library('upload');
    }
    function index()
    {
        print_R("hi");
        exit;
       
    }
   

}
?>


