<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_addons extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('category_model');
        if ($this->session->userdata('jw_admin_id')=="")
        {
            redirect(base_url().'admin_login');
        }
    }
    function index()
    {
        $data['addons_list']=$this->admin_model->selectAll('tbl_addons');

        $data['active']="addons";
        $this->load->view('common/header');
        $this->load->view('common/sidebar',$data);
        $this->load->view('addons/addons_view');
        $this->load->view('common/footer');
    }
    function add()
    {
        $data['category_list']=$this->category_model->get_category();
        $data['form_field_list']=$this->admin_model->selectAll('tbl_form_field');

        $data['active']="addons";
        $this->load->view('common/header');
        $this->load->view('common/sidebar',$data);
        $this->load->view('addons/addons_add_view');
        $this->load->view('common/footer');
    }
    function add_submit()
    {       
        //print_ex($_POST);
        $addons_name=$this->input->post('addons_name'); 
        $priority=$this->input->post('priority'); 
        $category=$this->input->post('category'); 
        $group_type=$this->input->post('group_type'); 
        $group_name=$this->input->post('group_name'); 
        $group_required=$this->input->post('group_required'); 
        $group_description=$this->input->post('group_description'); 
        $addon_option_label=$this->input->post('addon_option_label'); 
        $addon_option_price=$this->input->post('addon_option_price'); 
        $addon_option_min=$this->input->post('addon_option_min'); 
        $addon_option_max=$this->input->post('addon_option_max'); 
        //+++++++++++++++++++++++++++++++++++++++++++++++++++++
        $data=array(
            'addons_name'=>$addons_name, 
            'sort'=>$priority
        );
        $addons_id=$this->admin_model->insertData('tbl_addons',$data);
        //+++++++++++++++++++++++++++++++++++++++++++++++++++++
        if($addons_id)
        {
            foreach ($category as $key => $value) 
            {
                $data=array(
                    'addons_id'=>$addons_id,
                    'category_id'=>$value,                    
                );
                $this->admin_model->insertData('tbl_addons_category',$data);
            }            
            foreach ($group_type as $key => $value) 
            {
                $data=array(
                    'addons_id' =>$addons_id,
                    'group_name' =>@$group_name[$key],
                    'group_description' =>@$group_description[$key], 
                    'group_type' =>$value, 
                    'required'=>(@$group_required[$key]) ?  $group_required[$key] : 0
                );
                $addons_group_id=$this->admin_model->insertData('tbl_addons_group',$data);
                if($addons_group_id)
                {
                    foreach (@$addon_option_label[$key] as $keyad => $valuead) 
                    {
                        $data=array( 
                            'addons_id'=>$addons_id, 
                            'addons_group_id'=>$addons_group_id, 
                            'label'=>$valuead, 
                            'price'=>(@$addon_option_price[$key][$keyad]) ? $addon_option_price[$key][$keyad] : 0, 
                            'min'=>(@$addon_option_min[$key][$keyad]) ? $addon_option_price[$key][$keyad] : 0, 
                            'max'=>(@$addon_option_max[$key][$keyad]) ? $addon_option_price[$key][$keyad] : 0
                        );
                        $this->admin_model->insertData('tbl_addons_value',$data);
                    }
                }
                
            }  
        }
        //+++++++++++++++++++++++++++++++++++++++++++++++++++++ 
        
        $this->session->set_flashdata('success','Addon Has Been Added Successfully!');
        redirect(base_url().'admin_addons');
    }
    function edit($addons_id)
    {
        $cat_array=array();
        $where=array('addons_id'=>$addons_id);
        $data['addons_detail']=$this->admin_model->selectWhere('tbl_addons',$where);
        $addons_category=$this->admin_model->selectWhere('tbl_addons_category',$where);
        foreach ($addons_category as $key => $value) {
            $cat_array[]=$value->category_id;
        }
        $data['addons_category']=$cat_array;
        $data['addons_group']=$this->admin_model->selectWhere('tbl_addons_group',$where);
        foreach ($data['addons_group'] as $row) {
            $addons_value_list=$this->admin_model->selectWhere('tbl_addons_value',array('addons_group_id'=>$row->addons_group_id));
            $row->value_list=$addons_value_list;
        }
        
        $data['category_list']=$this->category_model->get_category();
        $data['form_field_list']=$this->admin_model->selectAll('tbl_form_field');
        //print_ex($data);
        $data['active']="addons";
        $this->load->view('common/header');
        $this->load->view('common/sidebar',$data);
        $this->load->view('addons/addons_edit_view',$data);
        $this->load->view('common/footer');
    }
    function edit_submit()
    {
        //print_ex($_POST);
        $addons_id=$this->input->post('addons_id'); 
        $addons_name=$this->input->post('addons_name'); 
        $priority=$this->input->post('priority'); 
        $category=$this->input->post('category'); 
        $group_type=$this->input->post('group_type'); 
        $group_name=$this->input->post('group_name'); 
        $group_required=$this->input->post('group_required'); 
        $group_description=$this->input->post('group_description'); 
        $addon_option_label=$this->input->post('addon_option_label'); 
        $addon_option_price=$this->input->post('addon_option_price'); 
        $addon_option_min=$this->input->post('addon_option_min'); 
        $addon_option_max=$this->input->post('addon_option_max'); 
        //+++++++++++++++++++++++++++++++++++++++++++++++++++++
        $where=array('addons_id'=>$addons_id);
        $data=array(
            'addons_name'=>$addons_name, 
            'sort'=>$priority
        );
        $this->admin_model->updateData('tbl_addons',$data,$where);
        //+++++++++++++++++++++++++++++++++++++++++++++++++++++
        if($addons_id)
        {
            $this->admin_model->deleteData('tbl_addons_category',$where);
            foreach ($category as $key => $value) 
            {
                $data=array(
                    'addons_id'=>$addons_id,
                    'category_id'=>$value,                    
                );
                $this->admin_model->insertData('tbl_addons_category',$data);
            }
            $this->admin_model->deleteData('tbl_addons_group',$where);            
            $this->admin_model->deleteData('tbl_addons_value',$where);            
            foreach ($group_type as $key => $value) 
            {
                $data=array(
                    'addons_id' =>$addons_id,
                    'group_name' =>@$group_name[$key],
                    'group_description' =>@$group_description[$key], 
                    'group_type' =>$value, 
                    'required'=>(@$group_required[$key]) ?  $group_required[$key] : 0
                );
                $addons_group_id=$this->admin_model->insertData('tbl_addons_group',$data);
                if($addons_group_id)
                {
                    foreach (@$addon_option_label[$key] as $keyad => $valuead) 
                    {
                        $data=array( 
                            'addons_id'=>$addons_id, 
                            'addons_group_id'=>$addons_group_id, 
                            'label'=>$valuead, 
                            'price'=>(@$addon_option_price[$key][$keyad]) ? $addon_option_price[$key][$keyad] : 0, 
                            'min'=>(@$addon_option_min[$key][$keyad]) ? $addon_option_price[$key][$keyad] : 0, 
                            'max'=>(@$addon_option_max[$key][$keyad]) ? $addon_option_price[$key][$keyad] : 0
                        );
                        $this->admin_model->insertData('tbl_addons_value',$data);
                    }
                }
                
            }  
        }
        //+++++++++++++++++++++++++++++++++++++++++++++++++++++         
        $this->session->set_flashdata('success','Addon Has Been Updated Successfully!');
        redirect(base_url().'admin_addons/edit/'.$addons_id);
    }
    function delete()
    {
        $id=$this->input->post('id');
        $addons_id=explode(",",$id);
        foreach ($addons_id as $addons)
        {
            $where=array('addons_id'=>$addons);
            $this->admin_model->deleteData('tbl_addons',$where);
            $this->admin_model->deleteData('tbl_addons_category',$where);
            $this->admin_model->deleteData('tbl_addons_group',$where);            
            $this->admin_model->deleteData('tbl_addons_value',$where);
        }
    }

}

?>
