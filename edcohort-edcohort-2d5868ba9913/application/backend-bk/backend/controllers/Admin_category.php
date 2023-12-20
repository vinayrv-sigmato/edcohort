<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin_category extends CI_Controller
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
        $c1=$c2=$c3="";
        $data['category_list']=$this->category_model->get_category();

        $data['active']="category";
        $this->load->view('common/header');
        $this->load->view('common/sidebar',$data);
        $this->load->view('category/category_view');
        $this->load->view('common/footer');
    }
    function add_category()
    {
        $data['parent_category_list']=$this->category_model->get_category();

        $data['active']="category";
        $this->load->view('common/header');
        $this->load->view('common/sidebar',$data);
        $this->load->view('category/category_add_view');
        $this->load->view('common/footer');
    }
    function add_category_submit()
    {
        $parent_category=$this->input->post('parent_category');
        $sub_category=$this->input->post('sub_category');
        $category=$this->input->post('category');
        $category_slug=$this->input->post('category_slug');
        $category_description=$this->input->post('category_description');
        $meta_title=$this->input->post('meta_title');
        $meta_description=$this->input->post('meta_description');
        $meta_keyword=$this->input->post('meta_keyword');
        $canonical=$this->input->post('canonical');
        //$commission_fixed=$this->input->post('commission_fixed');
        //$commission_percent=$this->input->post('commission_percent');
        $sort_order=$this->input->post('sort_order');
        if($sort_order=="")
        {
          $sort_order=0;
        }
        $show_menu=1;
        $status=$this->input->post('status');

        $where=array(
          'parent_category'=>$parent_category,
          'category_name'=>$category,
        );
        $check_category = $this->admin_model->selectWhere('tbl_category',$where);
        if(count($check_category)){
          $this->session->set_flashdata('alert','This Category Already Exists!');
          redirect($_SERVER['HTTP_REFERER']);
        }
        //+++++++++++++++++++++++++++++++++++++++++++++++++++++
        $data=array(
          'parent_category'=>$parent_category,
          //'sub_category'=>$sub_category,
          'category_name'=>$category,
          'category_sort_order'=>$sort_order,
          'category_status'=>$status,
          'category_added'=>date('Y-m-d H:i:s'),
        );
        $category_id=$this->admin_model->insertData('tbl_category',$data);
        //+++++++++++++++++++++++++++++++++++++++++++++++++++++
        if($category_id)
        {
          $new_name1 = str_replace(".","",microtime());
          $new_name=str_replace(" ","_",$new_name1);
          $file_tmp =$_FILES['img_upload']['tmp_name'];
          $file=$_FILES['img_upload']['name'];
          $ext=substr(strrchr($file,'.'),1);
          if($ext=="png" || $ext=="gif" || $ext=="jpg" || $ext=="jpeg")
          {
            move_uploaded_file($file_tmp,"../uploads/category/".$new_name.".".$ext);
            $category_image=$new_name.".".$ext;
          }
          //+++++++++++++++++++++++++++++++++++++++++++++++++++++
          $data_description=array(
            'category_id'=>$category_id,
            'category_description'=>$category_description,
            'category_image'=>@$category_image,
            'category_meta_title'=>$meta_title,
            'category_meta_description'=>$meta_description,
            'category_meta_keyword'=>$meta_keyword,
            'category_canonical'=>$canonical,
            'category_slug'=>$category_slug,
            'show_menu'=>$show_menu,
          );
          $this->admin_model->insertData('tbl_category_description',$data_description);
          //+++++++++++++++++++++++++++++++++++++++++++++++++++++
          // $data_commission=array(
          //   'category_id'=>$category_id,
          //   'category_commission_fixed'=>$commission_fixed,
          //   'category_commission_percent'=>$commission_percent,
          // );
          // $this->admin_model->insertData('tbl_category_commission',$data_commission);
          //+++++++++++++++++++++++++++++++++++++++++++++++++++++
        }
        $this->session->set_flashdata('success','Category Has Been Added !');
        redirect(base_url().'admin_category');

    }
    function get_subcategory()
    {
        $category_id=$this->input->post('category_id');
        $data=$this->category_model->get_sub_category($category_id);
        echo json_encode($data);
    }
    function edit_category($category_id)
    {
        //$data['parent_category_list']=$this->category_model->get_parent_category();
        $data['parent_category_list']=$this->category_model->get_category();

        $data['category_detail']=$this->category_model->get_category_detail($category_id);
        $data['sub_category_list']=$this->category_model->get_sub_category($data['category_detail'][0]->parent_category);

        $data['active']="category";
        $this->load->view('common/header');
        $this->load->view('common/sidebar',$data);
        $this->load->view('category/category_edit_view');
        $this->load->view('common/footer');
    }
    function edit_category_submit()
    {
        $category_id=$this->input->post('category_id');

        $parent_category=$this->input->post('parent_category');
        $sub_category=$this->input->post('sub_category');
        $category=$this->input->post('category');
        $category_slug=$this->input->post('category_slug');
        $category_description=$this->input->post('category_description');
        $meta_title=$this->input->post('meta_title');
        $meta_description=$this->input->post('meta_description');
        $meta_keyword=$this->input->post('meta_keyword');
        $canonical=$this->input->post('canonical');
        //$commission_fixed=$this->input->post('commission_fixed');
        //$commission_percent=$this->input->post('commission_percent');
        $sort_order=$this->input->post('sort_order');
        $category_image=$this->input->post('hid_image');
        if($sort_order=="")
        {
          $sort_order=0;
        }
        $show_menu=$this->input->post('show_menu');
        $status=$this->input->post('status');

        $where=array(
          'category_id !='=>$category_id,
          'parent_category'=>$parent_category,
          'category_name'=>$category,
        );
        $check_category = $this->admin_model->selectWhere('tbl_category',$where);
        if(count($check_category)){
          $this->session->set_flashdata('alert','This Category Already Exists!');
          redirect($_SERVER['HTTP_REFERER']);
        }
        //+++++++++++++++++++++++++++++++++++++++++++++++++++++
        $data=array(
          'parent_category'=>$parent_category,
          //'sub_category'=>$sub_category,
          'category_name'=>$category,
          'category_sort_order'=>$sort_order,
          'category_status'=>$status,
          'category_edited'=>date('Y-m-d H:i:s'),
        );
        //echo "<pre>";print_r($data);exit;
        $where=array('category_id'=>$category_id);
        $this->admin_model->updateData('tbl_category',$data,$where);
        //+++++++++++++++++++++++++++++++++++++++++++++++++++++
        if($category_id)
        {
          $new_name1 = str_replace(".","",microtime());
          $new_name=str_replace(" ","_",$new_name1);
          $file_tmp =$_FILES['img_upload']['tmp_name'];
          $file=$_FILES['img_upload']['name'];
          $ext=substr(strrchr($file,'.'),1);
          if($ext=="png" || $ext=="gif" || $ext=="jpg" || $ext=="jpeg")
          {
            move_uploaded_file($file_tmp,"../assets/upload/category/".$new_name.".".$ext);
            $category_image=$new_name.".".$ext;
          }
          //+++++++++++++++++++++++++++++++++++++++++++++++++++++
          $data_description=array(
            'category_description'=>$category_description,
            'category_image'=>@$category_image,
            'category_meta_title'=>$meta_title,
            'category_meta_description'=>$meta_description,
            'category_meta_keyword'=>$meta_keyword,
            'category_canonical'=>$canonical,
            'category_slug'=>$category_slug,
            'show_menu'=>$show_menu,
          );
          $where=array('category_id'=>$category_id);
          $this->admin_model->updateData('tbl_category_description',$data_description,$where);
          //+++++++++++++++++++++++++++++++++++++++++++++++++++++
          // $data_commission=array(
          //   'category_commission_fixed'=>$commission_fixed,
          //   'category_commission_percent'=>$commission_percent,
          // );
          // $this->admin_model->updateData($data_commission,'tbl_category_commission','category_id',$category_id);
          //+++++++++++++++++++++++++++++++++++++++++++++++++++++
        }
        $this->session->set_flashdata('success','Category Has Been Updated !');
        redirect(base_url().'admin_category');

    }
    function delete_category($category_id)
    {
       // $id=$this->input->post('id');
       // $category_id=explode(",",$id);
       // foreach ($category_id as $category)
       // {
            $this->admin_model->deleteData('tbl_category',array('category_id'=>$category_id));
            $this->admin_model->deleteData('tbl_category_commission',array('category_id'=>$category_id));
            $this->admin_model->deleteData('tbl_category_description',array('category_id'=>$category_id));
      //  }
        $this->session->set_flashdata('success','Category Has Been Deleted !');
        redirect(base_url().'admin_category');
    }
    function action()
    {
        $action=$this->input->get('action');
        $id=$this->input->get('hid_id');
        $category_id=explode(",",$id);
        if ($action=="active") 
        {
            $data=array('category_status'=>'active');
            foreach ($category_id as $category)
            {           
                $this->admin_model->updateData($data,'tbl_category','category_id',$category);
            }
        }
        else if ($action=="inactive") 
        {
            $data=array('category_status'=>'inactive');
            foreach ($category_id as $category)
            {           
                $this->admin_model->updateData($data,'tbl_category','category_id',$category);
            }
        }
        else if ($action=="show_menu") 
        {
            $data=array('show_menu'=>'1');
            foreach ($category_id as $category)
            {           
                $this->admin_model->updateData($data,'tbl_category_description','category_id',$category);
            }
        }
        else if ($action=="hide_menu") 
        {
            $data=array('show_menu'=>'0');
            foreach ($category_id as $category)
            {           
                $this->admin_model->updateData($data,'tbl_category_description','category_id',$category);
            }
        }
        
        $this->session->set_flashdata('success','Category Has Been Updated !');
        redirect(base_url().'admin_category');
    }
    function get_category_slug_name()
    {
        $category_name=$this->input->post('category_name');
        $slug=$this->admin_model->url_slug($category_name);
        echo json_encode(array('slug_name'=>$slug));
    }
    function getMenuList($category_id)
    {
        $c1=$c2=$c3="";
        
        $data=$this->admin_model->selectOne('tbl_category','category_id',$category_id);
        foreach ($data as $category)
        {   
            $c1=$c2=$c3="";
            $c1=$category->category_name; 
            $p_data=$this->admin_model->selectOne('tbl_category','category_id',$category->parent_category);            
            if(count($p_data)) 
            { 
                $c2=$p_data[0]->category_name." >> "; 
                $s_data=$this->admin_model->selectOne('tbl_category','category_id',$p_data[0]->parent_category);
                if(count($s_data))
                {
                    $c3=@$s_data[0]->category_name." >> ";
                }
            }
        }
        return $c3.$c2.$c1;        
    }
}

?>
