<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin_sponsors extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('sponsors_model');
        if ($this->session->userdata('jw_admin_id')=="")
        {
            redirect(base_url().'admin_login');
        }
    }
    function index()
    {
        $c1=$c2=$c3="";
        $data['records']=$this->sponsors_model->get_sponsors();

        $data['active']="sponsors";
        $this->load->view('common/header');
        $this->load->view('common/sidebar',$data);
        $this->load->view('sponsors/sponsors_view');
        $this->load->view('common/footer');
    }
    function add_sponsors()
    {
        $data['parent_sponsors_list']=$this->sponsors_model->get_sponsors();

        $data['active']="sponsors";
        $this->load->view('common/header');
        $this->load->view('common/sidebar',$data);
        $this->load->view('sponsors/sponsors_add_view');
        $this->load->view('common/footer');
    }
    function add_sponsors_submit()
    {
       
        $sponsors_name=$this->input->post('sponsors_name');
        $sponsors_slug=$this->input->post('sponsors_slug');
        $sponsors_description=$this->input->post('sponsors_description');
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
            move_uploaded_file($file_tmp,"../uploads/sponsors/".$new_name.".".$ext);
            $sponsors_image=$new_name.".".$ext;
          }

        $where=array(         
          'sponsors_name'=>$sponsors_name,
        );
        $check_sponsors = $this->admin_model->selectWhere('tbl_sponsors',$where);
        if(count($check_sponsors)){
          $this->session->set_flashdata('alert','This sponsors Already Exists!');
          redirect($_SERVER['HTTP_REFERER']);
        }
        //+++++++++++++++++++++++++++++++++++++++++++++++++++++
        $data=array(          
          'sponsors_name'=>$sponsors_name,
          'sponsors_slug'=>$sponsors_slug,
          'sponsors_description'=>$sponsors_description,
          'sponsors_meta_title'=>$meta_title,
          'sponsors_meta_description'=>$meta_description,
          'sponsors_meta_keyword'=>$meta_keyword,
          'sponsors_sort_order'=>$sort_order,
          'sponsors_status'=>$status,
          'sponsors_image'=>$sponsors_image,
          'date_added'=>date('Y-m-d H:i:s'),
        );
        $sponsors_id=$this->admin_model->insertData('tbl_sponsors',$data);
        //+++++++++++++++++++++++++++++++++++++++++++++++++++++
       
        $this->session->set_flashdata('success','sponsors Has Been Added !');
        redirect(base_url().'admin_sponsors');

    }
    function get_subsponsors()
    {
        $sponsors_id=$this->input->post('sponsors_id');
        $data=$this->sponsors_model->get_sub_sponsors($sponsors_id);
        echo json_encode($data);
    }
    function edit_sponsors($sponsors_id)
    {
        
        $data['parent_sponsors_list']='';

        $data['sponsors_detail']=$this->sponsors_model->get_sponsors_detail($sponsors_id);
        

        $data['active']="sponsors";
        $this->load->view('common/header');
        $this->load->view('common/sidebar',$data);
        $this->load->view('sponsors/sponsors_edit_view');
        $this->load->view('common/footer');
    }
    function edit_sponsors_submit()
    {
        $sponsors_id=$this->input->post('sponsors_id');

       
        $sponsors=$this->input->post('sponsors_name');
        $sponsors_slug=$this->input->post('sponsors_slug');
        $sponsors_description=$this->input->post('sponsors_description');
        $meta_title=$this->input->post('meta_title');
        $meta_description=$this->input->post('meta_description');
        $meta_keyword=$this->input->post('meta_keyword');       
        $sort_order=$this->input->post('sort_order');
        $sponsors_image=$this->input->post('hid_image');

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
            move_uploaded_file($file_tmp,"../uploads/sponsors/".$new_name.".".$ext);
            $sponsors_image=$new_name.".".$ext;
          }
          //+++++++++++++++++++++++++++++++++++++++++++++++++++++

        $where=array(
          'sponsors_id !='=>$sponsors_id,         
          'sponsors_name'=>$sponsors,
        );
        $check_sponsors = $this->admin_model->selectWhere('tbl_sponsors',$where);
        if(count($check_sponsors)){
          $this->session->set_flashdata('alert','This sponsors Already Exists!');
          redirect($_SERVER['HTTP_REFERER']);
        }
        //+++++++++++++++++++++++++++++++++++++++++++++++++++++
        $data=array(
          
          'sponsors_name'=>$sponsors,
          'sponsors_slug'=>$sponsors_slug,
          'sponsors_description'=>$sponsors_description,
          'sponsors_meta_title'=>$meta_title,
          'sponsors_meta_description'=>$meta_description,
          'sponsors_meta_keyword'=>$meta_keyword,
          'sponsors_sort_order'=>$sort_order,
          'sponsors_status'=>$status,
          'sponsors_image'=>$sponsors_image,
          'date_edited'=>date('Y-m-d H:i:s'),
        );
        //echo "<pre>";print_r($data);exit;
        $where=array('sponsors_id'=>$sponsors_id);
        $this->admin_model->updateData('tbl_sponsors',$data,$where);
        //+++++++++++++++++++++++++++++++++++++++++++++++++++++
        
        $this->session->set_flashdata('success','sponsors Has Been Updated !');
        redirect(base_url().'admin_sponsors');

    }
    function delete_sponsors($sponsors_id)
    {
        $id=$sponsors_id;
       
        $this->admin_model->deleteData('tbl_sponsors',array('sponsors_id'=>$sponsors_id)); 
        $this->session->set_flashdata('success','sponsors Has Been Deleted !');
        redirect(base_url().'admin_sponsors');
    }
    function action()
    {
        $action=$this->input->get('action');
        $id=$this->input->get('hid_id');
        $sponsors_id=explode(",",$id);
        if ($action=="active") 
        {
            $data=array('sponsors_status'=>'active');
            foreach ($sponsors_id as $sponsors)
            {           
                $this->admin_model->updateData($data,'tbl_sponsors','sponsors_id',$sponsors);
            }
        }
        else if ($action=="inactive") 
        {
            $data=array('sponsors_status'=>'inactive');
            foreach ($sponsors_id as $sponsors)
            {           
                $this->admin_model->updateData($data,'tbl_sponsors','sponsors_id',$sponsors);
            }
        }
        else if ($action=="show_menu") 
        {
            $data=array('show_menu'=>'1');
            foreach ($sponsors_id as $sponsors)
            {           
                $this->admin_model->updateData($data,'tbl_sponsors_description','sponsors_id',$sponsors);
            }
        }
        else if ($action=="hide_menu") 
        {
            $data=array('show_menu'=>'0');
            foreach ($sponsors_id as $sponsors)
            {           
                $this->admin_model->updateData($data,'tbl_sponsors_description','sponsors_id',$sponsors);
            }
        }
        
        $this->session->set_flashdata('success','sponsors Has Been Updated !');
        redirect(base_url().'admin_sponsors');
    }
    function get_sponsors_slug_name()
    {
        $sponsors_name=$this->input->post('sponsors_name');
        $slug=$this->admin_model->url_slug($sponsors_name);
        echo json_encode(array('slug_name'=>$slug));
    }
    function getMenuList($sponsors_id)
    {
        $c1=$c2=$c3="";
        
        $data=$this->admin_model->selectOne('tbl_sponsors','sponsors_id',$sponsors_id);
        foreach ($data as $sponsors)
        {   
            $c1=$c2=$c3="";
            $c1=$sponsors->sponsors_name; 
            $p_data=$this->admin_model->selectOne('tbl_sponsors','sponsors_id',$sponsors->parent_sponsors);            
            if(count($p_data)) 
            { 
                $c2=$p_data[0]->sponsors_name." >> "; 
                $s_data=$this->admin_model->selectOne('tbl_sponsors','sponsors_id',$p_data[0]->parent_sponsors);
                if(count($s_data))
                {
                    $c3=@$s_data[0]->sponsors_name." >> ";
                }
            }
        }
        return $c3.$c2.$c1;        
    }
}

?>
