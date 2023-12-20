<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_testimonial extends CI_Controller {

	public function __construct()
  {
      parent::__construct();
      
      $this->load->model('testimonial_model');
      $this->load->model('common_model');
      if($this->session->userdata('jw_admin_id')=="")
      {
      	redirect(base_url().'admin_login');
      }
  }
	public function index()
	{	
         $where ='testimonial_id > 0';
         $order_by=' ORDER BY testimonial_id DESC';
         $data['records']=$this->testimonial_model->testimonial_list($where,$order_by);
		
		 $data['active'] = "testimonial";
        $this->load->view('common/header');
        $this->load->view('common/sidebar', $data);
        $this->load->view('testimonial/testimonial_list');
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

        $where ='testimonial_id > 0';       
        if($filter_name!="")
        {
            $where .=' AND testimonial_by = "'.$filter_name.'"';
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

        $order_by=' ORDER BY testimonial_id DESC';
        //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
        $enquiry=$this->testimonial_model->testimonialTotal($where,$order_by);
        $data['testimonial_count'] =$enquiry['0']->testimonial_count;         
        
        $per_page= ($per_page) ? $per_page : 100 ;
        $config['base_url'] = base_url().'admin_testimonial/loadData';
        $config["total_rows"] = $data['testimonial_count'];
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

        $records=$this->testimonial_model->testimonial_list($per_page,$page,$where,$order_by);

        echo json_encode(array('records'=>$records,'page_link'=>$page_link,'total_records'=>$data['testimonial_count']));      
    }
    
	
	 function action()
    {
         $testimonial_id=$this->input->post('id');
         //print_ex($testimonial_id);
         $action=$this->input->post('action'); 
        $message='';
        if($action=='active')
        {
            $data=array('status'=>1);
            foreach($testimonial_id as $testimonial)
            {
                $where=array('testimonial_id'=>$testimonial);
                $this->admin_model->updateData('tbl_testimonial',$data,$where);
                //echo $this->db->last_query(); die;
            }
            $message='Status Has Been Updated!';
        }
        if($action=='inactive')
        {
            $data=array('status'=>0);
            foreach($testimonial_id as $testimonial)
            {
                $where=array('testimonial_id'=>$testimonial);
                $this->admin_model->updateData('tbl_testimonial',$data,$where);
                //echo $this->db->last_query(); die;
            }
            $message='Status Has Been Updated!';
        }
        if($action=="delete")
        {
            $data=array('status'=>'delete');
            foreach($testimonial_id as $testimonial)
            {
                $where=array('testimonial_id'=>$testimonial);
                $this->admin_model->updateData('tbl_testimonial',$data,$where);
            }
            $message='Testimonial Has Been Deleted!';
        }
        echo json_encode(array('message'=>$message));
    }

    function add_testimonial()
    {
       
        $data['active']="category";
        $this->load->view('common/header');
        $this->load->view('common/sidebar',$data);
        $this->load->view('testimonial/testimonial_add_view');
        $this->load->view('common/footer');
    }
    function add_testimonial_submit()
    {
        $name=$this->input->post('name');
        $testimonial=$this->input->post('testimonial');
        $status=$this->input->post('status');
        $rating=$this->input->post('rating');
        $testimonial_image = 'no_image.jpg';


          $new_name1 = str_replace(".","",microtime());
          $new_name=str_replace(" ","_",$new_name1);
          $file_tmp =$_FILES['img_upload']['tmp_name'];
          $file=$_FILES['img_upload']['name'];
          $ext=substr(strrchr($file,'.'),1);
          if($ext=="png" || $ext=="gif" || $ext=="jpg" || $ext=="jpeg")
          {
            move_uploaded_file($file_tmp,"../uploads/testimonial/".$new_name.".".$ext);
            $testimonial_image=$new_name.".".$ext;
          }
       
       
        //+++++++++++++++++++++++++++++++++++++++++++++++++++++
        $data=array(
          'testimonial'=>$testimonial,         
          'testimonial_by'=>$name,
          'status'=>$status,
          'rating'=>$rating,
          'image'=>$testimonial_image,         
          'date'=>date('Y-m-d H:i:s'),
        );
        $category_id=$this->admin_model->insertData('tbl_testimonial',$data);
        //+++++++++++++++++++++++++++++++++++++++++++++++++++++
       
       

        $this->session->set_flashdata('message','Testimonial Has Been Added !');
        redirect(base_url().'admin_testimonial');

    }

    function edit_testimonial($testimonial_id)
    {
        
        $data['parent_testimonial_list']='';

        $data['testimonial_detail']=$this->testimonial_model->get_testimonial_detail($testimonial_id);
        

        $data['active']="testimonial";
        $this->load->view('common/header');
        $this->load->view('common/sidebar',$data);
        $this->load->view('testimonial/testimonial_edit_view');
        $this->load->view('common/footer');
    }

     function edit_testimonial_submit()
    {
        $testimonial_id=$this->input->post('testimonial_id');

       
        $testimonial_name=$this->input->post('testimonial_name');       
        $testimonial=$this->input->post('testimonial');
        $rating=$this->input->post('rating');
        $testimonial_image=$this->input->post('hid_image');
        $status=$this->input->post('status');

          $new_name1 = str_replace(".","",microtime());
          $new_name=str_replace(" ","_",$new_name1);
          $file_tmp =$_FILES['img_upload']['tmp_name'];
          $file=$_FILES['img_upload']['name'];
          $ext=substr(strrchr($file,'.'),1);
          if($ext=="png" || $ext=="gif" || $ext=="jpg" || $ext=="jpeg")
          {
            move_uploaded_file($file_tmp,"../uploads/testimonial/".$new_name.".".$ext);
            $testimonial_image=$new_name.".".$ext;
          }
          //+++++++++++++++++++++++++++++++++++++++++++++++++++++

        
        //+++++++++++++++++++++++++++++++++++++++++++++++++++++
        $data=array(
          
          'testimonial_by'=>$testimonial_name,          
          'testimonial'=>$testimonial,
          'rating'=>$rating,          
          'status'=>$status,
          'image'=>$testimonial_image,
          'date'=>date('Y-m-d H:i:s'),
        );
        //echo "<pre>";print_r($data);exit;
        $where=array('testimonial_id'=>$testimonial_id);
        $this->admin_model->updateData('tbl_testimonial',$data,$where);
        //+++++++++++++++++++++++++++++++++++++++++++++++++++++
        
        $this->session->set_flashdata('success','Testimonial Has Been Updated !');
        redirect(base_url().'admin_testimonial');

    }
	

  	function delete_testimonial($testimonial_id)
	{
		
	
		$data['blog_details']=$this->common_model->deleteData('tbl_testimonial',array('testimonial_id'=>$testimonial_id));
		//echo "<pre>";print_ex($data);
		$this->session->set_flashdata('success','Testimonial Detail Has Been Deleted Successfully!');
		redirect(base_url().'admin_testimonial');

		
	}
	
	

}
