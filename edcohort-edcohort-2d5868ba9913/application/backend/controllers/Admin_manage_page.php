<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_manage_page extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        if($this->session->userdata('jw_admin_id')=="")
        {
            redirect(base_url());
        }
    }
    function index()
    {
    	$data['active']="page_list";
    	$data['page_list']=$this->admin_model->selectOne('tbl_app_routes','status','d');
        $this->load->view('common/header');
        $this->load->view('common/sidebar',$data);
        $this->load->view('manage_page/page_view',$data);
        $this->load->view('common/footer');
    }
    function edit_page($id)
    {
    	$data['active']="page_list";
    	$data['page_details']=$this->admin_model->selectOne('tbl_app_routes','id',$id);
        $this->load->view('common/header');
        $this->load->view('common/sidebar',$data);
        $this->load->view('manage_page/edit_page_view',$data);
        $this->load->view('common/footer');
    }
    function page_edit_submit()
    {
        $id=$this->input->post('id');
    	$slug=$this->input->post('slug');
    	$meta_title=$this->input->post('meta_title');
    	$meta_keyword=$this->input->post('meta_keyword');
        $meta_desc=$this->input->post('meta_description');
    	$canonical=$this->input->post('canonical');

    	$data=array(
    	   'slug' =>$slug,
    	   'page_title' => $meta_title,
    	   'meta_keyword' => $meta_keyword,
           'meta_description' => $meta_desc,
    	   'canonical' => $canonical
    	);
    	//echo '<pre>';print_r($data);exit;
    	$this->admin_model->updateData('tbl_app_routes',$data,array('id'=>$id));
    	redirect(base_url().'admin_manage_page');
    }

}
?>
