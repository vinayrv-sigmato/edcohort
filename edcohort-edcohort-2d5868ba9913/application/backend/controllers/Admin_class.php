<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin_class extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('class_model');
        if ($this->session->userdata('jw_admin_id')=="")
        {
            redirect(base_url().'admin_login');
        }
    }
    function index()
    {
        $c1=$c2=$c3="";
        $data['records']=$this->class_model->get_class();

        $data['active']="class";
        $this->load->view('common/header');
        $this->load->view('common/sidebar',$data);
        $this->load->view('class/class_view');
        $this->load->view('common/footer');
    }
    function add_class()
    {
        $data['parent_class_list']=$this->class_model->get_class();

        $where=array(         
          'status'=>1,
          'parent_id'=>0,
        );
        $data['parent_list'] = $this->admin_model->selectWhere('tbl_class',$where);

        //print_ex($data['parent_list']);

        $data['active']="class";
        $this->load->view('common/header');
        $this->load->view('common/sidebar',$data);
        $this->load->view('class/class_add_view',$data);
        $this->load->view('common/footer');
    }
    function add_class_submit()
    {
       
        $class_name=$this->input->post('name');  
        $parent_id=$this->input->post('parent_id');     
        $status=$this->input->post('status');
          
        
        $where=array(         
          'title'=>$class_name,
          'parent_id'=>$parent_id,
        );
        $check_class = $this->admin_model->selectWhere('tbl_class',$where);
        if(count($check_class)){
          $this->session->set_flashdata('alert','This class Already Exists!');
          redirect($_SERVER['HTTP_REFERER']);
        }
        //+++++++++++++++++++++++++++++++++++++++++++++++++++++
        $data=array(          
          'title'=>$class_name,          
          'status'=>$status, 
          'parent_id'=>$parent_id,
          'added_by'=>$this->session->userdata('jw_admin_id'),          
          'date_added'=>date('Y-m-d H:i:s'),
        );
        $class_id=$this->admin_model->insertData('tbl_class',$data);
        //+++++++++++++++++++++++++++++++++++++++++++++++++++++       
        $this->session->set_flashdata('success','class Has Been Added !');
        redirect(base_url().'admin_class');

    }
    function get_subclass()
    {
        $class_id=$this->input->post('class_id');
        $data=$this->class_model->get_sub_class($class_id);
        echo json_encode($data);
    }
    function edit_class($class_id)
    {
        
        //$data['parent_class_list']='';

         $where=array(         
          'status'=>1,
          'parent_id'=>0,
        );
        $data['parent_list'] = $this->admin_model->selectWhere('tbl_class',$where);

        $data['class_detail']=$this->class_model->get_class_detail($class_id);
        

        $data['active']="class";
        $this->load->view('common/header');
        $this->load->view('common/sidebar',$data);
        $this->load->view('class/class_edit_view');
        $this->load->view('common/footer');
    }
    function edit_class_submit()
    {
        $class_id=$this->input->post('class_id');
        $class=$this->input->post('class_name');
        $status=$this->input->post('status');
        $parent_id=$this->input->post('parent_id');
         

        $where=array(
          'class_id !='=>$class_id,         
          'title'=>$class,
          'parent_id'=>$parent_id,

        );
        $check_class = $this->admin_model->selectWhere('tbl_class',$where);
        if(count($check_class)){
          $this->session->set_flashdata('alert','This class Already Exists!');
          redirect($_SERVER['HTTP_REFERER']);
        }
        //+++++++++++++++++++++++++++++++++++++++++++++++++++++
        $data=array(
          
          'title'=>$class,          
          'status'=>$status,
          'parent_id'=>$parent_id,
          'edited_by'=>$this->session->userdata('jw_admin_id'),         
          'date_edited'=>date('Y-m-d H:i:s'),
        );
        //echo "<pre>";print_r($data);exit; 
        $where=array('class_id'=>$class_id);
        $this->admin_model->updateData('tbl_class',$data,$where);
        //+++++++++++++++++++++++++++++++++++++++++++++++++++++
        
        $this->session->set_flashdata('success','class Has Been Updated !');
        redirect(base_url().'admin_class');

    }
    function delete_class($class_id)
    {
        $id=$class_id;
       
        $this->admin_model->deleteData('tbl_class',array('class_id'=>$class_id)); 
        $this->session->set_flashdata('success','class Has Been Deleted !');
        redirect(base_url().'admin_class');
    }
    function action()
    {
        $action=$this->input->get('action');
        $id=$this->input->get('hid_id');
        $class_id=explode(",",$id);
        if ($action=="active") 
        {
            $data=array('class_status'=>'active');
            foreach ($class_id as $class)
            {           
                $this->admin_model->updateData($data,'tbl_class','class_id',$class);
            }
        }
        else if ($action=="inactive") 
        {
            $data=array('class_status'=>'inactive');
            foreach ($class_id as $class)
            {           
                $this->admin_model->updateData($data,'tbl_class','class_id',$class);
            }
        }
        else if ($action=="show_menu") 
        {
            $data=array('show_menu'=>'1');
            foreach ($class_id as $class)
            {           
                $this->admin_model->updateData($data,'tbl_class_description','class_id',$class);
            }
        }
        else if ($action=="hide_menu") 
        {
            $data=array('show_menu'=>'0');
            foreach ($class_id as $class)
            {           
                $this->admin_model->updateData($data,'tbl_class_description','class_id',$class);
            }
        }
        
        $this->session->set_flashdata('success','class Has Been Updated !');
        redirect(base_url().'admin_class');
    }
    function get_class_slug_name()
    {
        $class_name=$this->input->post('class_name');
        $slug=$this->admin_model->url_slug($class_name);
        echo json_encode(array('slug_name'=>$slug));
    }
    function getMenuList($class_id)
    {
        $c1=$c2=$c3="";
        
        $data=$this->admin_model->selectOne('tbl_class','class_id',$class_id);
        foreach ($data as $class)
        {   
            $c1=$c2=$c3="";
            $c1=$class->class_name; 
            $p_data=$this->admin_model->selectOne('tbl_class','class_id',$class->parent_class);            
            if(count($p_data)) 
            { 
                $c2=$p_data[0]->class_name." >> "; 
                $s_data=$this->admin_model->selectOne('tbl_class','class_id',$p_data[0]->parent_class);
                if(count($s_data))
                {
                    $c3=@$s_data[0]->class_name." >> ";
                }
            }
        }
        return $c3.$c2.$c1;        
    }
}

?>
