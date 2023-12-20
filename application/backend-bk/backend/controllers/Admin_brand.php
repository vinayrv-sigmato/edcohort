<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin_brand extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('brand_model');
        if ($this->session->userdata('jw_admin_id')=="")
        {
            redirect(base_url().'admin_login');
        }
    }
    function index()
    {
        $c1=$c2=$c3="";
        $data['records']=$this->brand_model->get_brand();

        $data['active']="brand";
        $this->load->view('common/header');
        $this->load->view('common/sidebar',$data);
        $this->load->view('brand/brand_view');
        $this->load->view('common/footer');
    }
    function add_brand()
    {
        $data['parent_brand_list']=$this->brand_model->get_brand();

        $data['active']="brand";
        $this->load->view('common/header');
        $this->load->view('common/sidebar',$data);
        $this->load->view('brand/brand_add_view');
        $this->load->view('common/footer');
    }
    function add_brand_submit()
    {
       
        $brand_name=$this->input->post('brand_name');
        $brand_slug=$this->input->post('brand_slug');
        $brand_description=$this->input->post('brand_description');
        $meta_title=$this->input->post('meta_title');
        $meta_description=$this->input->post('meta_description');
        $meta_keyword=$this->input->post('meta_keyword');
        $sort_order=$this->input->post('sort_order');

        if($sort_order=="")
        {
          $sort_order=0;
        }
       
        $status=$this->input->post('status');

          $new_name1 = str_replace(".","",microtime());
          $new_name=str_replace(" ","_",$new_name1);
          $file_tmp =$_FILES['img_upload']['tmp_name'];
          $file=$_FILES['img_upload']['name'];
          $ext=substr(strrchr($file,'.'),1);
          if($ext=="png" || $ext=="gif" || $ext=="jpg" || $ext=="jpeg")
          {
            move_uploaded_file($file_tmp,"../uploads/brand/".$new_name.".".$ext);
            $brand_image=$new_name.".".$ext;
          }

        $where=array(         
          'brand_name'=>$brand_name,
        );
        $check_brand = $this->admin_model->selectWhere('tbl_brand',$where);
        if(count($check_brand)){
          $this->session->set_flashdata('alert','This Brand Already Exists!');
          redirect($_SERVER['HTTP_REFERER']);
        }
        //+++++++++++++++++++++++++++++++++++++++++++++++++++++
        $data=array(          
          'brand_name'=>$brand_name,
          'brand_slug'=>$brand_slug,
          'brand_description'=>$brand_description,
          'brand_meta_title'=>$meta_title,
          'brand_meta_description'=>$meta_description,
          'brand_meta_keyword'=>$meta_keyword,
          'brand_sort_order'=>$sort_order,
          'brand_status'=>$status,
          'brand_image'=>$brand_image,
          'date_added'=>date('Y-m-d H:i:s'),
        );
        $brand_id=$this->admin_model->insertData('tbl_brand',$data);
        //+++++++++++++++++++++++++++++++++++++++++++++++++++++
       
        $this->session->set_flashdata('success','Brand Has Been Added !');
        redirect(base_url().'admin_brand');

    }
    function get_subbrand()
    {
        $brand_id=$this->input->post('brand_id');
        $data=$this->brand_model->get_sub_brand($brand_id);
        echo json_encode($data);
    }
    function edit_brand($brand_id)
    {
        
        $data['parent_brand_list']='';

        $data['brand_detail']=$this->brand_model->get_brand_detail($brand_id);
        

        $data['active']="brand";
        $this->load->view('common/header');
        $this->load->view('common/sidebar',$data);
        $this->load->view('brand/brand_edit_view');
        $this->load->view('common/footer');
    }
    function edit_brand_submit()
    {
        $brand_id=$this->input->post('brand_id');

       
        $brand=$this->input->post('brand_name');
        $brand_slug=$this->input->post('brand_slug');
        $brand_description=$this->input->post('brand_description');
        $meta_title=$this->input->post('meta_title');
        $meta_description=$this->input->post('meta_description');
        $meta_keyword=$this->input->post('meta_keyword');       
        $sort_order=$this->input->post('sort_order');
        $brand_image=$this->input->post('hid_image');

        if($sort_order=="")
        {
          $sort_order=0;
        }
       
        $status=$this->input->post('status');

          $new_name1 = str_replace(".","",microtime());
          $new_name=str_replace(" ","_",$new_name1);
          $file_tmp =$_FILES['img_upload']['tmp_name'];
          $file=$_FILES['img_upload']['name'];
          $ext=substr(strrchr($file,'.'),1);
          if($ext=="png" || $ext=="gif" || $ext=="jpg" || $ext=="jpeg")
          {
            move_uploaded_file($file_tmp,"../uploads/brand/".$new_name.".".$ext);
            $brand_image=$new_name.".".$ext;
          }
          //+++++++++++++++++++++++++++++++++++++++++++++++++++++

        $where=array(
          'brand_id !='=>$brand_id,         
          'brand_name'=>$brand,
        );
        $check_brand = $this->admin_model->selectWhere('tbl_brand',$where);
        if(count($check_brand)){
          $this->session->set_flashdata('alert','This Brand Already Exists!');
          redirect($_SERVER['HTTP_REFERER']);
        }
        //+++++++++++++++++++++++++++++++++++++++++++++++++++++
        $data=array(
          
          'brand_name'=>$brand,
          'brand_slug'=>$brand_slug,
          'brand_description'=>$brand_description,
          'brand_meta_title'=>$meta_title,
          'brand_meta_description'=>$meta_description,
          'brand_meta_keyword'=>$meta_keyword,
          'brand_sort_order'=>$sort_order,
          'brand_status'=>$status,
          'brand_image'=>$brand_image,
          'date_edited'=>date('Y-m-d H:i:s'),
        );
        //echo "<pre>";print_r($data);exit;
        $where=array('brand_id'=>$brand_id);
        $this->admin_model->updateData('tbl_brand',$data,$where);
        //+++++++++++++++++++++++++++++++++++++++++++++++++++++
        
        $this->session->set_flashdata('success','Brand Has Been Updated !');
        redirect(base_url().'admin_brand');

    }
    function delete_brand($brand_id)
    {
        $id=$brand_id;
       
        $this->admin_model->deleteData('tbl_brand',array('brand_id'=>$brand_id)); 
        $this->session->set_flashdata('success','Brand Has Been Deleted !');
        redirect(base_url().'admin_brand');
    }
    function action()
    {
        $action=$this->input->get('action');
        $id=$this->input->get('hid_id');
        $brand_id=explode(",",$id);
        if ($action=="active") 
        {
            $data=array('brand_status'=>'active');
            foreach ($brand_id as $brand)
            {           
                $this->admin_model->updateData($data,'tbl_brand','brand_id',$brand);
            }
        }
        else if ($action=="inactive") 
        {
            $data=array('brand_status'=>'inactive');
            foreach ($brand_id as $brand)
            {           
                $this->admin_model->updateData($data,'tbl_brand','brand_id',$brand);
            }
        }
        else if ($action=="show_menu") 
        {
            $data=array('show_menu'=>'1');
            foreach ($brand_id as $brand)
            {           
                $this->admin_model->updateData($data,'tbl_brand_description','brand_id',$brand);
            }
        }
        else if ($action=="hide_menu") 
        {
            $data=array('show_menu'=>'0');
            foreach ($brand_id as $brand)
            {           
                $this->admin_model->updateData($data,'tbl_brand_description','brand_id',$brand);
            }
        }
        
        $this->session->set_flashdata('success','brand Has Been Updated !');
        redirect(base_url().'admin_brand');
    }
    function get_brand_slug_name()
    {
        $brand_name=$this->input->post('brand_name');
        $slug=$this->admin_model->url_slug($brand_name);
        echo json_encode(array('slug_name'=>$slug));
    }
    function getMenuList($brand_id)
    {
        $c1=$c2=$c3="";
        
        $data=$this->admin_model->selectOne('tbl_brand','brand_id',$brand_id);
        foreach ($data as $brand)
        {   
            $c1=$c2=$c3="";
            $c1=$brand->brand_name; 
            $p_data=$this->admin_model->selectOne('tbl_brand','brand_id',$brand->parent_brand);            
            if(count($p_data)) 
            { 
                $c2=$p_data[0]->brand_name." >> "; 
                $s_data=$this->admin_model->selectOne('tbl_brand','brand_id',$p_data[0]->parent_brand);
                if(count($s_data))
                {
                    $c3=@$s_data[0]->brand_name." >> ";
                }
            }
        }
        return $c3.$c2.$c1;        
    }
}

?>
