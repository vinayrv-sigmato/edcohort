<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin_batch extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('batch_model');
        if ($this->session->userdata('jw_admin_id')=="")
        {
            redirect(base_url().'admin_login');
        }
    }
    function index()
    {
        $c1=$c2=$c3="";
        $data['records']=$this->batch_model->get_batch();

        $data['active']="Batch";
        $this->load->view('common/header');
        $this->load->view('common/sidebar',$data);
        $this->load->view('batch/batch_view');
        $this->load->view('common/footer');
    }
    function add_batch()
    {
        $data['parent_batch_list']=$this->batch_model->get_batch();

        $data['active']="Batch";
        $this->load->view('common/header');
        $this->load->view('common/sidebar',$data);
        $this->load->view('batch/batch_add_view');
        $this->load->view('common/footer');
    }
    function add_batch_submit()
    {
       
        $batch_name=$this->input->post('batch_name');       
        $batch_start_date=$this->input->post('batch_start_date');       
        $batch_end_date=$this->input->post('batch_end_date');       
        $status=$this->input->post('status');
          

        $where=array(         
          'batch_name'=>$batch_name,
        );
        $check_batch = $this->admin_model->selectWhere('tbl_batch',$where);
        if(count($check_batch)){
          $this->session->set_flashdata('alert','This Batch Already Exists!');
          redirect($_SERVER['HTTP_REFERER']);
        }
        //+++++++++++++++++++++++++++++++++++++++++++++++++++++
        $data=array(          
          'batch_name'=>$batch_name,
          'batch_start'=>$batch_start_date,
          'batch_end'=>$batch_end_date,        
          'status'=>$status, 
          'added_by'=>$this->session->userdata('jw_admin_id'),          
          'date_added'=>date('Y-m-d H:i:s'),
        );
        $batch_id=$this->admin_model->insertData('tbl_batch',$data);
        //+++++++++++++++++++++++++++++++++++++++++++++++++++++       
        $this->session->set_flashdata('success','Batch Has Been Added !');
        redirect(base_url().'admin_batch');

    }
    function get_subbatch()
    {
        $batch_id=$this->input->post('batch_id');
        $data=$this->batch_model->get_sub_batch($batch_id);
        echo json_encode($data);
    }
    function edit_batch($batch_id)
    {
        
        $data['parent_batch_list']='';

        $data['batch_detail']=$this->batch_model->get_batch_detail($batch_id);
        

        $data['active']="Batch";
        $this->load->view('common/header');
        $this->load->view('common/sidebar',$data);
        $this->load->view('batch/batch_edit_view');
        $this->load->view('common/footer');
    }
    function edit_batch_submit()
    {
        $batch_id=$this->input->post('batch_id');
        $batch=$this->input->post('batch_name');
        $batch_start_date=$this->input->post('batch_start_date');       
        $batch_end_date=$this->input->post('batch_end_date'); 
        $status=$this->input->post('status');

        $where=array(
          'batch_id !='=>$batch_id,         
          'batch_name'=>$batch,
        );
        $check_batch = $this->admin_model->selectWhere('tbl_batch',$where);
        if(count($check_batch)){
          $this->session->set_flashdata('alert','This Batch Already Exists!');
          redirect($_SERVER['HTTP_REFERER']);
        }
        //+++++++++++++++++++++++++++++++++++++++++++++++++++++
        $data=array(
          
          'batch_name'=>$batch,
          'batch_start'=>$batch_start_date,
          'batch_end'=>$batch_end_date,          
          'status'=>$status,
          'edited_by'=>$this->session->userdata('jw_admin_id'),         
          'date_edited'=>date('Y-m-d H:i:s'),
        );
        //echo "<pre>";print_r($data);exit;
        $where=array('batch_id'=>$batch_id);
        $this->admin_model->updateData('tbl_batch',$data,$where);
        //+++++++++++++++++++++++++++++++++++++++++++++++++++++
        
        $this->session->set_flashdata('success','Batch Has Been Updated !');
        redirect(base_url().'admin_batch');

    }
    function delete_batch($batch_id)
    {
        $id=$batch_id;
       
        $this->admin_model->deleteData('tbl_batch',array('batch_id'=>$batch_id)); 
        $this->session->set_flashdata('success','Batch Has Been Deleted !');
        redirect(base_url().'admin_batch');
    }
    function action()
    {
        $action=$this->input->get('action');
        $id=$this->input->get('hid_id');
        $batch_id=explode(",",$id);
        if ($action=="active") 
        {
            $data=array('batch_status'=>'active');
            foreach ($batch_id as $batch)
            {           
                $this->admin_model->updateData($data,'tbl_batch','batch_id',$batch);
            }
        }
        else if ($action=="inactive") 
        {
            $data=array('batch_status'=>'inactive');
            foreach ($batch_id as $batch)
            {           
                $this->admin_model->updateData($data,'tbl_batch','batch_id',$batch);
            }
        }
        else if ($action=="show_menu") 
        {
            $data=array('show_menu'=>'1');
            foreach ($batch_id as $batch)
            {           
                $this->admin_model->updateData($data,'tbl_batch_description','batch_id',$batch);
            }
        }
        else if ($action=="hide_menu") 
        {
            $data=array('show_menu'=>'0');
            foreach ($batch_id as $batch)
            {           
                $this->admin_model->updateData($data,'tbl_batch_description','batch_id',$batch);
            }
        }
        
        $this->session->set_flashdata('success','Batch Has Been Updated !');
        redirect(base_url().'admin_batch');
    }
    function get_batch_slug_name()
    {
        $batch_name=$this->input->post('batch_name');
        $slug=$this->admin_model->url_slug($batch_name);
        echo json_encode(array('slug_name'=>$slug));
    }
    function getMenuList($batch_id)
    {
        $c1=$c2=$c3="";
        
        $data=$this->admin_model->selectOne('tbl_batch','batch_id',$batch_id);
        foreach ($data as $batch)
        {   
            $c1=$c2=$c3="";
            $c1=$batch->batch_name; 
            $p_data=$this->admin_model->selectOne('tbl_batch','batch_id',$batch->parent_batch);            
            if(count($p_data)) 
            { 
                $c2=$p_data[0]->batch_name." >> "; 
                $s_data=$this->admin_model->selectOne('tbl_batch','batch_id',$p_data[0]->parent_batch);
                if(count($s_data))
                {
                    $c3=@$s_data[0]->batch_name." >> ";
                }
            }
        }
        return $c3.$c2.$c1;        
    }
}

?>
