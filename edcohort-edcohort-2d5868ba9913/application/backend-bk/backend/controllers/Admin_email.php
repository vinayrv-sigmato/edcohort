<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_email extends CI_Controller {

	public function __construct()
  {
      parent::__construct();
      
      $this->load->model('common_model');
      if($this->session->userdata('jw_admin_id')=="")
      {
      	redirect(base_url().'admin_login');
      }
  }
	public function index()
	{	
// 		 $data['active'] = "blog";
//         $this->load->view('common/header');
//         $this->load->view('common/sidebar', $data);
//         $this->load->view('blog/blog_list');
//         $this->load->view('common/footer');
	}
	public function new_arivals()
	{	
        $data['products'] = $this->db->query("SELECT * FROM v_product ORDER BY product_id DESC LIMIT 14")->result();
        $this->load->view('email/new_arrive',$data);
	}
	public function trending()
	{	
	    $data['products'] = $this->db->query("SELECT * FROM v_product GROUP BY category_id ORDER BY product_id DESC LIMIT 10")->result();
        $this->load->view('email/trending',$data);
	}
}
