<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_ranking extends CI_Controller {

	public function __construct()
  {
      parent::__construct();
      
      $this->load->model('ranking_model');
      $this->load->model('common_model');
      if($this->session->userdata('jw_admin_id')=="")
      {
      	redirect(base_url().'admin_login');
      }
  }
	public function index()
	{	
         $where ='ranking_id > 0';
         $order_by=' ORDER BY ranking_id DESC';
         $data['records']=$this->ranking_model->ranking_list($where,$order_by);
		
		 $data['active'] = "ranking";
        $this->load->view('common/header');
        $this->load->view('common/sidebar', $data);
        $this->load->view('ranking/ranking_list');
        $this->load->view('common/footer');
	}

    public function brand_wise()
    {   
         $where ='rbw_id > 0';
         $order_by=' ORDER BY rbw_id DESC';
         $data['records']=$this->ranking_model->ranking_list_brand_wise($where,$order_by);
        //print_ex($data['records']);
         $data['active'] = "ranking";
        $this->load->view('common/header');
        $this->load->view('common/sidebar', $data);
        $this->load->view('ranking/ranking_list_brand_wise');
        $this->load->view('common/footer');
    }

    function add_ranking_brand_wise()
    {

        $where = 'brand_status = 1';
        $data['brand_list']=$this->common_model->selectWhereorderby('tbl_brand',$where,'brand_name','ASC'); 

        $where = 'status = 1';
        $data['class_list']=$this->common_model->selectWhereorderby('tbl_class',$where,'title','ASC');
       
        $data['active']="category";
        $this->load->view('common/header');
        $this->load->view('common/sidebar',$data);
        $this->load->view('ranking/testimonial_add_view');
        $this->load->view('common/footer');
    }

     function edit_ranking_brand_wise($ranking_id)
    {
        
        $data['parent_ranking_list']='';

        $data['ranking_detail']=$this->ranking_model->get_ranking_detail($ranking_id);
        

        $data['active']="ranking";
        $this->load->view('common/header');
        $this->load->view('common/sidebar',$data);
        $this->load->view('ranking/ranking_edit_view');
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

        $where ='ranking_id > 0';       
        if($filter_name!="")
        {
            $where .=' AND ranking_by = "'.$filter_name.'"';
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

        $order_by=' ORDER BY ranking_id DESC';
        //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
        $enquiry=$this->ranking_model->rankingTotal($where,$order_by);
        $data['ranking_count'] =$enquiry['0']->ranking_count;         
        
        $per_page= ($per_page) ? $per_page : 100 ;
        $config['base_url'] = base_url().'admin_ranking/loadData';
        $config["total_rows"] = $data['ranking_count'];
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

        $records=$this->ranking_model->ranking_list($per_page,$page,$where,$order_by);

        echo json_encode(array('records'=>$records,'page_link'=>$page_link,'total_records'=>$data['ranking_count']));      
    }
    
	
	 function action()
    {
         $ranking_id=$this->input->post('id');
         //print_ex($ranking_id);
         $action=$this->input->post('action'); 
        $message='';
        if($action=='active')
        {
            $data=array('status'=>1);
            foreach($ranking_id as $ranking)
            {
                $where=array('ranking_id'=>$ranking);
                $this->admin_model->updateData('tbl_ranking',$data,$where);
                //echo $this->db->last_query(); die;
            }
            $message='Status Has Been Updated!';
        }
        if($action=='inactive')
        {
            $data=array('status'=>0);
            foreach($ranking_id as $ranking)
            {
                $where=array('ranking_id'=>$ranking);
                $this->admin_model->updateData('tbl_ranking',$data,$where);
                //echo $this->db->last_query(); die;
            }
            $message='Status Has Been Updated!';
        }
        if($action=="delete")
        {
            $data=array('status'=>'delete');
            foreach($ranking_id as $ranking)
            {
                $where=array('ranking_id'=>$ranking);
                $this->admin_model->updateData('tbl_ranking',$data,$where);
            }
            $message='ranking Has Been Deleted!';
        }
        echo json_encode(array('message'=>$message));
    }

    function add_ranking()
    {
       
        $data['active']="category";
        $this->load->view('common/header');
        $this->load->view('common/sidebar',$data);
        $this->load->view('ranking/ranking_add_view');
        $this->load->view('common/footer');
    }
    function add_ranking_submit()
    {
        $name=$this->input->post('name');
        $ranking=$this->input->post('ranking');
        $status=$this->input->post('status');
        $rating=$this->input->post('rating');
        $ranking_image = 'no_image.jpg';


          $new_name1 = str_replace(".","",microtime());
          $new_name=str_replace(" ","_",$new_name1);
          $file_tmp =$_FILES['img_upload']['tmp_name'];
          $file=$_FILES['img_upload']['name'];
          $ext=substr(strrchr($file,'.'),1);
          if($ext=="png" || $ext=="gif" || $ext=="jpg" || $ext=="jpeg")
          {
            move_uploaded_file($file_tmp,"../uploads/ranking/".$new_name.".".$ext);
            $ranking_image=$new_name.".".$ext;
          }
       
       
        //+++++++++++++++++++++++++++++++++++++++++++++++++++++
        $data=array(
          'ranking'=>$ranking,         
          'ranking_by'=>$name,
          'status'=>$status,
          'rating'=>$rating,
          'image'=>$ranking_image,         
          'date'=>date('Y-m-d H:i:s'),
        );
        $category_id=$this->admin_model->insertData('tbl_ranking',$data);
        //+++++++++++++++++++++++++++++++++++++++++++++++++++++
       
       

        $this->session->set_flashdata('message','ranking Has Been Added !');
        redirect(base_url().'admin_ranking');

    }

    function edit_ranking($ranking_id)
    {
        
        $data['parent_ranking_list']='';

        $data['ranking_detail']=$this->ranking_model->get_ranking_detail($ranking_id);
        

        $data['active']="ranking";
        $this->load->view('common/header');
        $this->load->view('common/sidebar',$data);
        $this->load->view('ranking/ranking_edit_view');
        $this->load->view('common/footer');
    }

     function edit_ranking_submit()
    {
        $ranking_id=$this->input->post('ranking_id');

       
        $ranking_name=$this->input->post('ranking_name');       
        $ranking=$this->input->post('ranking');
        $rating=$this->input->post('rating');
        $ranking_image=$this->input->post('hid_image');
        $status=$this->input->post('status');

          $new_name1 = str_replace(".","",microtime());
          $new_name=str_replace(" ","_",$new_name1);
          $file_tmp =$_FILES['img_upload']['tmp_name'];
          $file=$_FILES['img_upload']['name'];
          $ext=substr(strrchr($file,'.'),1);
          if($ext=="png" || $ext=="gif" || $ext=="jpg" || $ext=="jpeg")
          {
            move_uploaded_file($file_tmp,"../uploads/ranking/".$new_name.".".$ext);
            $ranking_image=$new_name.".".$ext;
          }
          //+++++++++++++++++++++++++++++++++++++++++++++++++++++

        
        //+++++++++++++++++++++++++++++++++++++++++++++++++++++
        $data=array(
          
          'ranking_by'=>$ranking_name,          
          'ranking'=>$ranking,
          'rating'=>$rating,          
          'status'=>$status,
          'image'=>$ranking_image,
          'date'=>date('Y-m-d H:i:s'),
        );
        //echo "<pre>";print_r($data);exit;
        $where=array('ranking_id'=>$ranking_id);
        $this->admin_model->updateData('tbl_ranking',$data,$where);
        //+++++++++++++++++++++++++++++++++++++++++++++++++++++
        
        $this->session->set_flashdata('success','ranking Has Been Updated !');
        redirect(base_url().'admin_ranking');

    }
	

  	function delete_ranking($ranking_id)
	{
		
	
		$data['blog_details']=$this->common_model->deleteData('tbl_ranking',array('ranking_id'=>$ranking_id));
		//echo "<pre>";print_ex($data);
		$this->session->set_flashdata('success','ranking Detail Has Been Deleted Successfully!');
		redirect(base_url().'admin_ranking');

		
	}
	
	

}
