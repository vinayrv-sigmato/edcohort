<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_options extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('options_model');
        if ($this->session->userdata('jw_admin_id')=="")
        {
            redirect(base_url().'admin_login');
        }
    }
    function index()
    {
        $data['options_list']=$this->options_model->get_options();

        $data['active']="options";
        $this->load->view('common/header');
        $this->load->view('common/sidebar',$data);
        $this->load->view('options/options_view');
        $this->load->view('common/footer');
    }
    function add_options()
    {
        $data['active']="options";
        $this->load->view('common/header');
        $this->load->view('common/sidebar',$data);
        $this->load->view('options/options_add_view');
        $this->load->view('common/footer');
    }
    function add_options_submit()
    {       
        //print_ex($_POST);
        $option_name=$this->input->post('option_name');
        $option_value=$this->input->post('option_value');        
        
        //+++++++++++++++++++++++++++++++++++++++++++++++++++++
        $data=array(
          'name'=>$option_name,         
          'type'=>'select',         
        );
        $option_id=$this->admin_model->insertData('tbl_option',$data);
        //+++++++++++++++++++++++++++++++++++++++++++++++++++++
        if($option_id)
        {
            foreach ($option_value as $key => $value) 
            {
               $data_option=array(
                    'option_id'=>$option_id,
                    'value'=>$value,                    
                );
                $this->admin_model->insertData('tbl_option_value',$data_option);
            }  
        }
        //+++++++++++++++++++++++++++++++++++++++++++++++++++++  
        
        $this->session->set_flashdata('success','Option Has Been Added Successfully!');
        redirect(base_url().'admin_options');
    }
    function get_subcategory()
    {
        $category_id=$this->input->post('category_id');
        $data=$this->category_model->get_sub_category($category_id);
        echo json_encode($data);
    }
    function edit_option($option_id)
    {
        $data['options_detail']=$this->options_model->get_options_detail($option_id);
        $data['options_value_list']=$this->options_model->get_options_value($option_id);

        //print_ex($data);
        $data['active']="options";
        $this->load->view('common/header');
        $this->load->view('common/sidebar',$data);
        $this->load->view('options/options_edit_view');
        $this->load->view('common/footer');
    }
    function edit_option_submit()
    {
        $option_id=$this->input->post('option_id');
        $option_name=$this->input->post('option_name');
        $option_value=$this->input->post('option_value');
        
        if($option_id)
        {
            $where=array('option_id'=>$option_id);
            $data=array(
              'name'=>$option_name,         
              'type'=>'select',         
            );
            $this->admin_model->updateData('tbl_option',$data,$where);
            //+++++++++++++++++++++++++++++++++++++++++++++++++++++
            $this->admin_model->deleteData('tbl_option_value',$where);
            foreach ($option_value as $key => $value) 
            {
               $data_option=array(
                    'option_id'=>$option_id,
                    'value'=>$value,                    
                );
                $this->admin_model->insertData('tbl_option_value',$data_option);
            }  
        }
        //+++++++++++++++++++++++++++++++++++++++++++++++++++++  
        
        $this->session->set_flashdata('success','Option Has Been Updated Successfully !');
        redirect(base_url().'admin_options/edit_option/'.$option_id);

    }
    function delete()
    {
        $id=$this->input->post('id');
        $option_id=explode(",",$id);
        foreach ($option_id as $option)
        {
            $this->admin_model->deleteData('tbl_option',array('option_id'=>$option));
            $this->admin_model->deleteData('tbl_option_value',array('option_id'=>$option));
        }
    }

}

?>
