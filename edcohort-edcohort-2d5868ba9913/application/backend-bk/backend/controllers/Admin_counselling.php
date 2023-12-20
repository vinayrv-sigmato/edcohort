<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin_counselling extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('counselling_model');
        if ($this->session->userdata('jw_admin_id')=="")
        {
            redirect(base_url().'admin_login');
        }
    }
    function index()
    {
        $c1=$c2=$c3="";
        $data['records']=$this->counselling_model->get_counselling();

        $data['active']="counselling";
        $this->load->view('common/header');
        $this->load->view('common/sidebar',$data);
        $this->load->view('counselling/counselling_view');
        $this->load->view('common/footer');
    }
    function add_counselling()
    {
        $data['parent_counselling_list']=$this->counselling_model->get_counselling();

        $where = "brand_status = 1 ";
        $data['brand_list']=$this->admin_model->selectWhere('tbl_brand',$where);

        $where_class = "status = 1 ";
        $data['class_list']=$this->admin_model->selectWhere('tbl_class',$where_class);

        $brand_id = $this->input->get('brand_id');
        $create_for = $this->input->get('create_for');

        $where_customer = "status = 1 ";

        if(!empty($create_for) && ($create_for == 1)){

            $where_customer .= " and customer_type = 1 AND brand_id = 1 ";
        }else{
            if(!empty($brand_id) && ($create_for == 2)){

                $where_customer .= " and brand_id = ".$brand_id." ";
            }
        }

        $data['customer_list']=$this->admin_model->selectWhere('tbl_customer',$where_customer);

        $data['active']="counselling";
        $this->load->view('common/header');
        $this->load->view('common/sidebar',$data);
        $this->load->view('counselling/counselling_add_view');
        $this->load->view('common/footer');
    }
    function add_counselling_submit()
    {
       
        $brand_id=$this->input->post('brand_id');       
        $class_id=$this->input->post('class_id');
		$user_id=$this->input->post('user_id');       
        $status=$this->input->post('status');
		$date=$this->input->post('date');       
        $start_time=$this->input->post('start_time');
		$end_time=$this->input->post('end_time');
          
		$datenew = date('Y-m-d',strtotime($date));
        
        //+++++++++++++++++++++++++++++++++++++++++++++++++++++
        $data=array(          
          'brand_id'=>$brand_id,          
          'class_id'=>$class_id, 
          'user_id'=>$user_id,  
		  'c_status'=>$status,
		  'c_date'=>$datenew,          
          'start_time'=>$start_time, 
          'end_time'=>$end_time,             
          'date_added'=>date('Y-m-d H:i:s'),
        );
        $c_id=$this->admin_model->insertData('tbl_product_counselling',$data);
        //+++++++++++++++++++++++++++++++++++++++++++++++++++++       
        $this->session->set_flashdata('success','counselling Has Been Added !');
        redirect(base_url().'admin_counselling');

    }
    function get_subcounselling()
    {
        $c_id=$this->input->post('c_id');
        $data=$this->counselling_model->get_sub_counselling($c_id);
        echo json_encode($data);
    }
    function edit_counselling($c_id)
    {
        
        $data['parent_counselling_list']='';

        $data['counselling_detail']=$this->counselling_model->get_counselling_detail($c_id);
		
		$where = "brand_status = 1 ";
        $data['brand_list']=$this->admin_model->selectWhere('tbl_brand',$where);

        $where_class = "status = 1 ";
        $data['class_list']=$this->admin_model->selectWhere('tbl_class',$where_class);

        $brand_id = $this->input->get('brand_id');

        $where_customer = "status = 1 ";

        if(!empty($brand_id)){

            $where_customer .= " and brand_id = ".$brand_id." ";
        }

        $data['customer_list']=$this->admin_model->selectWhere('tbl_customer',$where_customer);
        

        $data['active']="counselling";
        $this->load->view('common/header');
        $this->load->view('common/sidebar',$data);
        $this->load->view('counselling/counselling_edit_view');
        $this->load->view('common/footer');
    }
    function edit_counselling_submit()
    {
        $c_id=$this->input->post('c_id');        

        $brand_id=$this->input->post('brand_id');       
        $class_id=$this->input->post('class_id');
        $user_id=$this->input->post('user_id');       
        $status=$this->input->post('c_status');
        $date=$this->input->post('date');       
        $start_time=$this->input->post('start_time');
        $end_time=$this->input->post('end_time');
          
        $datenew = date('Y-m-d',strtotime($date));
         
        //print_ex($_POST);
       
        //+++++++++++++++++++++++++++++++++++++++++++++++++++++
        $data=array(
          
          'brand_id'=>$brand_id,          
          'class_id'=>$class_id, 
          'user_id'=>$user_id,  
          'c_status'=>$status,
          'c_date'=>$datenew,          
          'start_time'=>$start_time, 
          'end_time'=>$end_time             
          
        );
        //echo "<pre>";print_r($data);exit;
        $where=array('c_id'=>$c_id);
        $this->admin_model->updateData('tbl_product_counselling',$data,$where);
        //+++++++++++++++++++++++++++++++++++++++++++++++++++++
        
        $this->session->set_flashdata('success','counselling Has Been Updated !');
        redirect(base_url().'admin_counselling');

    }
    function delete_counselling($c_id)
    {
        $id=$c_id;
       
        $this->admin_model->deleteData('tbl_product_counselling',array('c_id'=>$c_id)); 
        $this->session->set_flashdata('success','counselling Has Been Deleted !');
        redirect(base_url().'admin_counselling');
    }
    function action()
    {
        $action=$this->input->get('action');
        $id=$this->input->get('hid_id');
        $c_id=explode(",",$id);
        if ($action=="active") 
        {
            $data=array('counselling_status'=>'active');
            foreach ($c_id as $counselling)
            {           
                $this->admin_model->updateData($data,'tbl_product_counselling','c_id',$counselling);
            }
        }
        else if ($action=="inactive") 
        {
            $data=array('counselling_status'=>'inactive');
            foreach ($c_id as $counselling)
            {           
                $this->admin_model->updateData($data,'tbl_product_counselling','c_id',$counselling);
            }
        }
        else if ($action=="show_menu") 
        {
            $data=array('show_menu'=>'1');
            foreach ($c_id as $counselling)
            {           
                $this->admin_model->updateData($data,'tbl_product_counselling_description','c_id',$counselling);
            }
        }
        else if ($action=="hide_menu") 
        {
            $data=array('show_menu'=>'0');
            foreach ($c_id as $counselling)
            {           
                $this->admin_model->updateData($data,'tbl_product_counselling_description','c_id',$counselling);
            }
        }
        
        $this->session->set_flashdata('success','counselling Has Been Updated !');
        redirect(base_url().'admin_counselling');
    }
    function get_counselling_slug_name()
    {
        $counselling_name=$this->input->post('counselling_name');
        $slug=$this->admin_model->url_slug($counselling_name);
        echo json_encode(array('slug_name'=>$slug));
    }
    function getMenuList($c_id)
    {
        $c1=$c2=$c3="";
        
        $data=$this->admin_model->selectOne('tbl_product_counselling','c_id',$c_id);
        foreach ($data as $counselling)
        {   
            $c1=$c2=$c3="";
            $c1=$counselling->counselling_name; 
            $p_data=$this->admin_model->selectOne('tbl_product_counselling','c_id',$counselling->parent_counselling);            
            if(count($p_data)) 
            { 
                $c2=$p_data[0]->counselling_name." >> "; 
                $s_data=$this->admin_model->selectOne('tbl_product_counselling','c_id',$p_data[0]->parent_counselling);
                if(count($s_data))
                {
                    $c3=@$s_data[0]->counselling_name." >> ";
                }
            }
        }
        return $c3.$c2.$c1;        
    }


    function counselling_booking()
    {
        $c1=$c2=$c3="";
        $data['records']=$this->counselling_model->get_counselling_booking();
        //print_ex($data['records']);
        $data['active']="counselling";
        $this->load->view('common/header');
        $this->load->view('common/sidebar',$data);
        $this->load->view('counselling/counselling_booking_view');
        $this->load->view('common/footer');
    }
}

?>
