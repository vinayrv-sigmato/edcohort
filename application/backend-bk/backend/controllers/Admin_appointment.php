<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_appointment extends CI_Controller {

	public function __construct()
  {
      parent::__construct();
      
      $this->load->model('appointment_model');
      $this->load->model('common_model');
      if($this->session->userdata('jw_admin_id')=="")
      {
      	redirect(base_url().'admin_login');
      }
  }
	public function index()
	{	

		// $filter=$this->input->get();
		// $where = 'appointment_id > 0';
		// $data['appointment_list']=$this->common_model->selectWhereorderby('tbl_appointment',$where,'appointment_id','DESC');		
		// $data['active_sidebar']='appointment_list';
		//echo $this->db->last_query(); die;
		//print_ex($data);
		
		 $data['active'] = "appointment";
        $this->load->view('common/header');
        $this->load->view('common/sidebar', $data);
        $this->load->view('appointment/appointment_list');
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

        $where ='appointment_id > 0';       
        if($filter_name!="")
        {
            $where .=' AND first_name = "'.$filter_name.'"';
        }
        if($filter_email!="")
        {
            $where .=' AND email = "'.$filter_email.'"';
        }
        if($filter_phone!="")
        {
            $where .=' AND phone = "'.$filter_phone.'"';
        }
        if($filter_status!="")
        {
            $where .=' AND status = "'.$filter_status.'"';
        }

        $order_by=' ORDER BY appointment_id DESC';
        //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
        $appointment=$this->appointment_model->appointmentTotal($where,$order_by);
        $data['appointment_count'] =$appointment['0']->appointment_count;         
        
        $per_page= ($per_page) ? $per_page : 100 ;
        $config['base_url'] = base_url().'admin_appointment/loadData';
        $config["total_rows"] = $data['appointment_count'];
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

        $records=$this->appointment_model->appointment_list($per_page,$page,$where,$order_by);

        echo json_encode(array('records'=>$records,'page_link'=>$page_link,'total_records'=>$data['appointment_count']));      
    }
    
	function add_blog()
	{
		//$data['group_list']=$this->common_model->selectAll('TBL_VENDOR_GROUP');
		$path = '../assets/admin/plugins/ckeditor/ckfinder';
		$width = '850px';
		$this->editor($path, $width);

		$data['active_sidebar']='add_blog';
		$this->load->view('admin/common/header');
		$this->load->view('admin/common/sidebar',$data);
		$this->load->view('admin/blog/blog_add',$data);
		$this->load->view('admin/common/footer');
	}
	function add_blog_submit()
	{

			$jad_user_id=$this->session->userdata('jad_user_id');

			$title=$this->input->post('title');
			$blog_slug=$this->input->post('blog_slug');
			$blog_dec=$this->input->post('blog_dec');
			$status=$this->input->post('status');
			


			$this->form_validation->set_rules('title', 'Title', 'trim|required');			
			
			if($this->form_validation->run() == FALSE)
		    {
		    	$this->session->set_flashdata('alert','Please Fill the Form Correctly!');
				redirect(base_admin().'blog/add_blog');
		    }
			
			
		  $new_name1 = str_replace(".","",microtime());
          $new_name=str_replace(" ","_",$new_name1);
          $file_tmp =$_FILES['img_upload']['tmp_name'];
          $file=$_FILES['img_upload']['name'];
          $ext=substr(strrchr($file,'.'),1);
          if($ext=="png" || $ext=="gif" || $ext=="jpg" || $ext=="jpeg")
          {          	
            move_uploaded_file($file_tmp,"./uploads/blog/".$new_name.".".$ext);          
            $category_image=$new_name.".".$ext;
          }
			//echo $group;exit;

			$data=array(
			  'blog_title' => $title,
		      'blog_slug' => $blog_slug,
		      'blog_dec' => $blog_dec,		      
		      'blog_image' => $category_image,
		      'created_by' => $jad_user_id,
	      	  'created_at' => date('Y-m-d H:i:s'),
		      'status' => $status,
				);
			$user_id=$this->common_model->insertData('tbl_blog',$data);
					

			$this->session->set_flashdata('success','Blog ['.$title.'] Has Been Added Successfully!');
			redirect(base_admin().'blog');
	}
	
	
	function edit_blog($page_id)
	{
		$path = '../assets/admin/plugins/ckeditor/ckfinder';
		$width = '850px';
		$this->editor($path, $width);
		
		$data['blog_details']=$this->common_model->selectAll('tbl_blog');
		//echo "<pre>";print_ex($data);

		$data['active_sidebar']='edit_blog';
		$this->load->view('admin/common/header');
		$this->load->view('admin/common/sidebar',$data);
		$this->load->view('admin/blog/blog_edit',$data);
		$this->load->view('admin/common/footer');
	}
	
	function edit_blog_submit()
	{
		
		$jad_user_id=$this->session->userdata('jad_user_id');

			$blog_id=$this->input->post('blog_id');
			$title=$this->input->post('title');
			$blog_slug=$this->input->post('blog_slug');
			$blog_dec=$this->input->post('description');
			$status=$this->input->post('status');
			$hid_image=$this->input->post('hid_image');	

		$this->form_validation->set_rules('blog_id', 'Blog Id', 'trim|required');
		$this->form_validation->set_rules('title', 'Title', 'trim|required');
		
		if($this->form_validation->run() == FALSE)
    {
    	$this->session->set_flashdata('alert','Please Fill the Form Correctly!');
			redirect(base_admin().'blog/blog_edit/'.$blog_id);
    }

    	if(!empty($_FILES['img_upload']['tmp_name']))
    	{
    	  $new_name1 = str_replace(".","",microtime());
          $new_name=str_replace(" ","_",$new_name1);
          $file_tmp =$_FILES['img_upload']['tmp_name'];
          $file=$_FILES['img_upload']['name'];
          $ext=substr(strrchr($file,'.'),1);
          if($ext=="png" || $ext=="gif" || $ext=="jpg" || $ext=="jpeg")
          {          	
            move_uploaded_file($file_tmp,"./uploads/blog/".$new_name.".".$ext);          
            $category_image=$new_name.".".$ext;
          }
    	}else{
    		$category_image=$hid_image;
    	}
		  


		$data=array(
			  'blog_title' => $title,
		      'blog_slug' => $blog_slug,
		      'blog_dec' => $blog_dec,		      
		      'blog_image' => $category_image,
		      'edited_by' => $jad_user_id,
	      	  'edited_at' => date('Y-m-d H:i:s'),
		      'status' => $status,
				);
		$this->common_model->updateData('tbl_blog',$data,array('blog_id'=>$blog_id));
		$this->session->set_flashdata('success','['.$title.'] Blog Detail Has Been Updated Successfully!');
		redirect(base_admin().'blog');
    	
	}
	
	
	
	function get_blog_slug_name()
    {

        $category_name=$this->input->post('category_name');
        $slug=$this->common_model->url_slug($category_name);
       // print_ex($slug);
        echo json_encode(array('slug_name'=>$slug));
    }
	
	
	
	
	// for page editor
	function editor($path,$width) 
	{
		//Loading Library For Ckeditor
		$this->load->library('ckeditor');
		$this->load->library('ckFinder');
		//configure base path of ckeditor folder 
		$this->ckeditor->basePath = base_url().'assets/admin/plugins/ckeditor/';
		$this->ckeditor-> config['toolbar'] = 'Full';
		$this->ckeditor->config['language'] = 'en';
		$this->ckeditor-> config['width'] = $width;
		//configure ckfinder with ckeditor config 
		$this->ckfinder->SetupCKEditor($this->ckeditor,$path); 
  	}

  	function delete_enquiry($blog_id)
	{
		
	
		$data['blog_details']=$this->common_model->deleteData('tbl_appointment',array('appointment_id'=>$blog_id));
		//echo "<pre>";print_ex($data);
		$this->session->set_flashdata('success','Appointment Detail Has Been Deleted Successfully!');
		redirect(base_admin().'appointment');

		
	}
	
	

}
