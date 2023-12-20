<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_attribute extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        //$this->load->model('attribute_model');
        if ($this->session->userdata('jw_admin_id')=="")
        {
            redirect(base_url().'admin_login');
        }
    }
    function index()
    {
        $data['attribute_list']=$this->admin_model->selectAll('tbl_attribute');

        $data['active']="attribute";
        $this->load->view('common/header');
        $this->load->view('common/sidebar',$data);
        $this->load->view('attribute/attribute_view');
        $this->load->view('common/footer');
    }
    function add_attribute()
    {
        $data['active']="attribute";
        $this->load->view('common/header');
        $this->load->view('common/sidebar',$data);
        $this->load->view('attribute/attribute_add_view');
        $this->load->view('common/footer');
    }
    function add_attribute_submit()
    {       
        //print_ex($_POST);
        $attribute_name=$this->input->post('attribute_name');
        $attribute_value=$this->input->post('attribute_value'); 
        //+++++++++++++++++++++++++++++++++++++++++++++++++++++
        $data=array(
          'name'=>$attribute_name         
        );
        $attribute_id=$this->admin_model->insertData('tbl_attribute',$data);
        //+++++++++++++++++++++++++++++++++++++++++++++++++++++
        if($attribute_id)
        {
            foreach ($attribute_value as $key => $value) 
            {
                if($value!="")
                {
                    $data_attribute=array(
                        'attribute_id'=>$attribute_id,
                        'value'=>$value,                    
                    );
                    $this->admin_model->insertData('tbl_attribute_value',$data_attribute);
                }               
            }  
        }
        //+++++++++++++++++++++++++++++++++++++++++++++++++++++ 
        
        $this->session->set_flashdata('success','Attribute Has Been Added Successfully!');
        redirect(base_url().'admin_attribute');
    }
    function edit_attribute($attribute_id)
    {
        $where=array('attribute_id'=>$attribute_id);
        $data['attribute_detail']=$this->admin_model->selectWhere('tbl_attribute',$where);
        $data['attribute_value_list']=$this->admin_model->selectWhere('tbl_attribute_value',$where);

        //print_ex($data);
        $data['active']="attribute";
        $this->load->view('common/header');
        $this->load->view('common/sidebar',$data);
        $this->load->view('attribute/attribute_edit_view');
        $this->load->view('common/footer');
    }
    function edit_attribute_submit()
    {
        $attribute_id=$this->input->post('attribute_id');
        $attribute_name=$this->input->post('attribute_name');
        $attribute_value=$this->input->post('attribute_value');
        
        if($attribute_id)
        {
            $where=array('attribute_id'=>$attribute_id);
            $data=array(
              'name'=>$attribute_name        
            );
            $this->admin_model->updateData('tbl_attribute',$data,$where);
            //+++++++++++++++++++++++++++++++++++++++++++++++++++++
            $this->admin_model->deleteData('tbl_attribute_value',$where);
            foreach ($attribute_value as $key => $value) 
            {
                if($value!="")
                {
                    $data_attribute=array(
                        'attribute_id'=>$attribute_id,
                        'value'=>$value,                    
                    );
                    $this->admin_model->insertData('tbl_attribute_value',$data_attribute);
                }
            }  
        }
        //+++++++++++++++++++++++++++++++++++++++++++++++++++++  
        
        $this->session->set_flashdata('success','Attribute Has Been Updated Successfully !');
        redirect(base_url().'admin_attribute/edit_attribute/'.$attribute_id);

    }

}

?>
