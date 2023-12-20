<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin_type extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('type_model');
        if ($this->session->userdata('jw_admin_id')=="")
        {
            redirect(base_url().'admin_login');
        }
    }
    function index()
    {
        $c1=$c2=$c3="";
        $data['records']=$this->type_model->get_type();

        $data['active']="type";
        $this->load->view('common/header');
        $this->load->view('common/sidebar',$data);
        $this->load->view('type/type_view');
        $this->load->view('common/footer');
    }
    function add_type()
    {
        $data['parent_type_list']=$this->type_model->get_type();

        $data['active']="type";
        $this->load->view('common/header');
        $this->load->view('common/sidebar',$data);
        $this->load->view('type/type_add_view');
        $this->load->view('common/footer');
    }
    function add_type_submit()
    {
       
        $type_name=$this->input->post('name');       
        $status=$this->input->post('status');
          

        $where=array(         
          'title'=>$type_name,
        );
        $check_type = $this->admin_model->selectWhere('tbl_type',$where);
        if(count($check_type)){
          $this->session->set_flashdata('alert','This Type Already Exists!');
          redirect($_SERVER['HTTP_REFERER']);
        }
        //+++++++++++++++++++++++++++++++++++++++++++++++++++++
        $data=array(          
          'title'=>$type_name,          
          'status'=>$status, 
          'added_by'=>$this->session->userdata('jw_admin_id'),          
          'date_added'=>date('Y-m-d H:i:s'),
        );
        $type_id=$this->admin_model->insertData('tbl_type',$data);
        //+++++++++++++++++++++++++++++++++++++++++++++++++++++       
        $this->session->set_flashdata('success','Type Has Been Added !');
        redirect(base_url().'admin_type');

    }
    function get_subtype()
    {
        $type_id=$this->input->post('type_id');
        $data=$this->type_model->get_sub_type($type_id);
        echo json_encode($data);
    }
    function edit_type($type_id)
    {
        
        $data['parent_type_list']='';

        $data['type_detail']=$this->type_model->get_type_detail($type_id);
        

        $data['active']="type";
        $this->load->view('common/header');
        $this->load->view('common/sidebar',$data);
        $this->load->view('type/type_edit_view');
        $this->load->view('common/footer');
    }
    function edit_type_submit()
    {
        $type_id=$this->input->post('type_id');
        $type=$this->input->post('type_name');
        $status=$this->input->post('status');

         

        $where=array(
          'type_id !='=>$type_id,         
          'title'=>$type,
        );
        $check_type = $this->admin_model->selectWhere('tbl_type',$where);
        if(count($check_type)){
          $this->session->set_flashdata('alert','This type Already Exists!');
          redirect($_SERVER['HTTP_REFERER']);
        }
        //+++++++++++++++++++++++++++++++++++++++++++++++++++++
        $data=array(
          
          'title'=>$type,          
          'status'=>$status,
          'edited_by'=>$this->session->userdata('jw_admin_id'),         
          'date_edited'=>date('Y-m-d H:i:s'),
        );
        //echo "<pre>";print_r($data);exit;
        $where=array('type_id'=>$type_id);
        $this->admin_model->updateData('tbl_type',$data,$where);
        //+++++++++++++++++++++++++++++++++++++++++++++++++++++
        
        $this->session->set_flashdata('success','Type Has Been Updated !');
        redirect(base_url().'admin_type');

    }
    function delete_type($type_id)
    {
        $id=$type_id;
       
        $this->admin_model->deleteData('tbl_type',array('type_id'=>$type_id)); 
        $this->session->set_flashdata('success','Type Has Been Deleted !');
        redirect(base_url().'admin_type');
    }
    function action()
    {
        $action=$this->input->get('action');
        $id=$this->input->get('hid_id');
        $type_id=explode(",",$id);
        if ($action=="active") 
        {
            $data=array('type_status'=>'active');
            foreach ($type_id as $type)
            {           
                $this->admin_model->updateData($data,'tbl_type','type_id',$type);
            }
        }
        else if ($action=="inactive") 
        {
            $data=array('type_status'=>'inactive');
            foreach ($type_id as $type)
            {           
                $this->admin_model->updateData($data,'tbl_type','type_id',$type);
            }
        }
        else if ($action=="show_menu") 
        {
            $data=array('show_menu'=>'1');
            foreach ($type_id as $type)
            {           
                $this->admin_model->updateData($data,'tbl_type_description','type_id',$type);
            }
        }
        else if ($action=="hide_menu") 
        {
            $data=array('show_menu'=>'0');
            foreach ($type_id as $type)
            {           
                $this->admin_model->updateData($data,'tbl_type_description','type_id',$type);
            }
        }
        
        $this->session->set_flashdata('success','type Has Been Updated !');
        redirect(base_url().'admin_type');
    }
    function get_type_slug_name()
    {
        $type_name=$this->input->post('type_name');
        $slug=$this->admin_model->url_slug($type_name);
        echo json_encode(array('slug_name'=>$slug));
    }
    function getMenuList($type_id)
    {
        $c1=$c2=$c3="";
        
        $data=$this->admin_model->selectOne('tbl_type','type_id',$type_id);
        foreach ($data as $type)
        {   
            $c1=$c2=$c3="";
            $c1=$type->type_name; 
            $p_data=$this->admin_model->selectOne('tbl_type','type_id',$type->parent_type);            
            if(count($p_data)) 
            { 
                $c2=$p_data[0]->type_name." >> "; 
                $s_data=$this->admin_model->selectOne('tbl_type','type_id',$p_data[0]->parent_type);
                if(count($s_data))
                {
                    $c3=@$s_data[0]->type_name." >> ";
                }
            }
        }
        return $c3.$c2.$c1;        
    }
}

?>
