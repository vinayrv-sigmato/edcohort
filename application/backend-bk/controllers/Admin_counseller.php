<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_counseller extends CI_Controller {

	public function __construct()
  {
      parent::__construct();
      
      $this->load->model('counseller_model');
      $this->load->model('common_model');
      if($this->session->userdata('jw_admin_id')=="")
      {
      	redirect(base_url().'admin_login');
      }
  }
	public function index()
	{	
         $where ='id > 0';
         $order_by=' ORDER BY id DESC';
         $data['records']=$this->counseller_model->counseller_list($where,$order_by);
		
		 $data['active'] = "counseller";
        $this->load->view('common/header');
        $this->load->view('common/sidebar', $data);
        $this->load->view('counseller/counseller_list');
        $this->load->view('common/footer');
	}

	 function loadData()
    {
        $page=$this->input->get('page');
        $per_page=$this->input->get('per_page');

        $filter_name=$this->input->get('filter_name');
        $filter_email=$this->input->get('filter_email');
        $filter_phone=$this->input->get('filter_phone');
        $filter_status=$this->input->get('filter_status');
         $filter_stock=$this->input->get('filter_stock');

        $where ='id > 0';       
        if($filter_name!="")
        {
            $where .=' AND counseller_by = "'.$filter_name.'"';
        }
        if($filter_email!="")
        {
            $where .=' AND email = "'.$filter_email.'"';
        }
        if($filter_phone!="")
        {
            $where .=' AND mobile = "'.$filter_phone.'"';
        }
        if($filter_status!="")
        {
            $where .=' AND status = "'.$filter_status.'"';
        }
        if($filter_stock!="")
        {
            $where .=' AND stock_name = "'.$filter_stock.'"';
        }

        $order_by=' ORDER BY id DESC';
        //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
        $enquiry=$this->counseller_model->counsellerTotal($where,$order_by);
        $data['counseller_count'] =$enquiry['0']->counseller_count;         
        
        $per_page= ($per_page) ? $per_page : 100 ;
        $config['base_url'] = base_url().'admin_counseller/loadData';
        $config["total_rows"] = $data['counseller_count'];
        $config["per_page"] = $per_page;
        $config['first_link'] = 'FIRST';
        $config['last_link'] = 'LAST';
        $config['first_tag_open'] = '<li class="paginate_button">';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li class="paginate_button">';
        $config['last_tag_close'] = '</li>';
        $config['next_link'] = 'NEXT';
        $config['next_tag_open'] = '<li class="paginate_button">';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = 'PREV';
        $config['prev_tag_open'] = '<li class="paginate_button">';
        $config['prev_tag_close'] = '</li>';
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['cur_tag_open'] = '<li class="active"><a href="">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="paginate_button">';
        $config['num_tag_close'] = '</li>';
        $config["num_links"] = 8;
        $config['page_query_string'] = TRUE;
        $config['query_string_segment'] = 'page';

        $this->pagination->initialize($config);
        $page = ($page) ? $page : 0;
        $page_link = $this->pagination->create_links();

        $records=$this->counseller_model->counseller_list($per_page,$page,$where,$order_by);

        echo json_encode(array('records'=>$records,'page_link'=>$page_link,'total_records'=>$data['counseller_count']));      
    }
    
	
	 function action()
    {
         $id=$this->input->post('id');
         //print_ex($id);
         $action=$this->input->post('action'); 
        $message='';
        if($action=='active')
        {
            $data=array('status'=>1);
            foreach($id as $counseller)
            {
                $where=array('id'=>$counseller);
                $this->admin_model->updateData('tbl_counseller',$data,$where);
                //echo $this->db->last_query(); die;
            }
            $message='Status Has Been Updated!';
        }
        if($action=='inactive')
        {
            $data=array('status'=>0);
            foreach($id as $counseller)
            {
                $where=array('id'=>$counseller);
                $this->admin_model->updateData('tbl_counseller',$data,$where);
                //echo $this->db->last_query(); die;
            }
            $message='Status Has Been Updated!';
        }
        if($action=="delete")
        {
            $data=array('status'=>'delete');
            foreach($id as $counseller)
            {
                $where=array('id'=>$counseller);
                $this->admin_model->updateData('tbl_counseller',$data,$where);
            }
            $message='counseller Has Been Deleted!';
        }
        echo json_encode(array('message'=>$message));
    }

    function add_counseller()
    {
       
        $data['active']="category";
        $this->load->view('common/header');
        $this->load->view('common/sidebar',$data);
        $this->load->view('counseller/counseller_add_view');
        $this->load->view('common/footer');
    }
    function add_counseller_submit()
    {
        $name=$this->input->post('name');
        $counseller=$this->input->post('counseller');
        $status=$this->input->post('status');
        $rating=$this->input->post('rating');
        $counseller_image = 'no_image.jpg';


          $new_name1 = str_replace(".","",microtime());
          $new_name=str_replace(" ","_",$new_name1);
          $file_tmp =$_FILES['img_upload']['tmp_name'];
          $file=$_FILES['img_upload']['name'];
          $ext=substr(strrchr($file,'.'),1);
          if($ext=="png" || $ext=="gif" || $ext=="jpg" || $ext=="jpeg")
          {
            move_uploaded_file($file_tmp,"../uploads/counseller/".$new_name.".".$ext);
            $counseller_image=$new_name.".".$ext;
          }
       
       
        //+++++++++++++++++++++++++++++++++++++++++++++++++++++
        $data=array(
          'counseller'=>$counseller,         
          'counseller_by'=>$name,
          'status'=>$status,
          'rating'=>$rating,
          'image'=>$counseller_image,         
          'date'=>date('Y-m-d H:i:s'),
        );
        $category_id=$this->admin_model->insertData('tbl_counseller',$data);
        //+++++++++++++++++++++++++++++++++++++++++++++++++++++
       
       

        $this->session->set_flashdata('message','counseller Has Been Added !');
        redirect(base_url().'admin_counseller');

    }

    function edit_counseller($id)
    {
        
        $data['parent_counseller_list']='';

        $data['counseller_detail']=$this->counseller_model->get_counseller_detail($id);
        

        $data['active']="counseller";
        $this->load->view('common/header');
        $this->load->view('common/sidebar',$data);
        $this->load->view('counseller/counseller_edit_view');
        $this->load->view('common/footer');
    }

     function edit_counseller_submit()
    {
        $id=$this->input->post('id');

       
        $counseller_name=$this->input->post('counseller_name');       
        $counseller=$this->input->post('counseller');
        $rating=$this->input->post('rating');
        $counseller_image=$this->input->post('hid_image');
        $status=$this->input->post('status');

          $new_name1 = str_replace(".","",microtime());
          $new_name=str_replace(" ","_",$new_name1);
          $file_tmp =$_FILES['img_upload']['tmp_name'];
          $file=$_FILES['img_upload']['name'];
          $ext=substr(strrchr($file,'.'),1);
          if($ext=="png" || $ext=="gif" || $ext=="jpg" || $ext=="jpeg")
          {
            move_uploaded_file($file_tmp,"../uploads/counseller/".$new_name.".".$ext);
            $counseller_image=$new_name.".".$ext;
          }
          //+++++++++++++++++++++++++++++++++++++++++++++++++++++

        
        //+++++++++++++++++++++++++++++++++++++++++++++++++++++
        $data=array(
          
          'counseller_by'=>$counseller_name,          
          'counseller'=>$counseller,
          'rating'=>$rating,          
          'status'=>$status,
          'image'=>$counseller_image,
          'date'=>date('Y-m-d H:i:s'),
        );
        //echo "<pre>";print_r($data);exit;
        $where=array('id'=>$id);
        $this->admin_model->updateData('tbl_counseller',$data,$where);
        //+++++++++++++++++++++++++++++++++++++++++++++++++++++
        
        $this->session->set_flashdata('success','counseller Has Been Updated !');
        redirect(base_url().'admin_counseller');

    }
	

  	function delete_counseller($id)
	{
		
	
		$data['blog_details']=$this->common_model->deleteData('tbl_counseller',array('id'=>$id));
		//echo "<pre>";print_ex($data);
		$this->session->set_flashdata('success','counseller Detail Has Been Deleted Successfully!');
		redirect(base_url().'admin_counseller');

		
	}
	
	

}
