<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_blog extends CI_Controller {

	public function __construct()
  {
      parent::__construct();
      
      $this->load->model('blog_model');
      $this->load->model('common_model');
      if($this->session->userdata('jw_admin_id')=="")
      {
      	redirect(base_url().'admin_login');
      }
  }
	public function index()
	{	
		$where ='status != "delete"';
		$order_by=' ORDER BY blog_id DESC'; 
		$data['records']=$this->blog_model->blog_list($where,$order_by);

		 $data['active'] = "blog";
        $this->load->view('common/header');
        $this->load->view('common/sidebar', $data);
        $this->load->view('blog/blog_list');
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

        $where ='status != "delete"';       
        if($filter_name!="")
        {
            $where .=' AND blog_title = "'.$filter_name.'"';
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

        $order_by=' ORDER BY blog_id DESC';
        //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
        $enquiry=$this->blog_model->blogTotal($where,$order_by);
        $data['blog_count'] =$enquiry['0']->blog_count;         
        
        $per_page= ($per_page) ? $per_page : 100 ;
        $config['base_url'] = base_url().'admin_blog/loadData';
        $config["total_rows"] = $data['blog_count'];
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

        $records=$this->blog_model->blog_list($per_page,$page,$where,$order_by);

        echo json_encode(array('records'=>$records,'page_link'=>$page_link,'total_records'=>$data['blog_count']));      
    }

	function add_blog()
	{

		$where_cat ='status = 1';
		$order_by=' ORDER BY cat_title ASC'; 
		$data['blog_cat_records']=$this->blog_model->blog_category_list($where_cat,$order_by);
		
		$where=array(
          'brand_status ='=>1,
        );
       $data['brand_records'] = $this->admin_model->selectWhere('tbl_brand',$where);
		 
        $data['active']="add_blog";
        $this->load->view('common/header');
        $this->load->view('common/sidebar',$data);
        $this->load->view('blog/blog_add');
        $this->load->view('common/footer');
	}
	function add_blog_submit()
	{

			$jad_user_id=$this->session->userdata('jw_admin_id');

			$title=$this->input->post('title');
			$blog_slug=$this->input->post('blog_slug');
			$blog_dec=$this->input->post('product_description');
			$status=$this->input->post('status');
			$meta_title=$this->input->post('meta_title');
			$meta_keyword=$this->input->post('meta_keyword');
			$meta_description=$this->input->post('meta_description');
			$blog_image = 'no_image.jpg';
			$tag=$this->input->post('tag');
			$cateory=$this->input->post('cateory');
			$cat = implode(",",$cateory);
			$brands=$this->input->post('brand');
			$brand = implode(",",$brands);
		   //print_ex($_POST);

			$this->form_validation->set_rules('title', 'Title', 'trim|required');			
			
			if($this->form_validation->run() == FALSE)
		    {
		    	$this->session->set_flashdata('alert','Please Fill the Form Correctly!');
				redirect(base_admin().'blog/add_blog');
		    }
			

				$slug = makeSlug($this->input->post("title"));
		        $wheres = " blog_slug like '".$slug."%'";
		        $slug_list = $this->blog_model->getProductSlug($wheres);
		       // echo $this->db->last_query(); die;
		        if(count($slug_list)){
		            foreach($slug_list as $row)
		            {
		                $slug_arr[] = $row->blog_slug;
		            }
		            if(in_array($slug, $slug_arr))
		            {
		                for ($i=1; in_array(($slug.'-'.$i),$slug_arr); $i++) { }                    
		                $slug = $slug.'-'.$i;
		            }
		        } 

		      $new_name1 = str_replace(".","",microtime());
	          $new_name=str_replace(" ","_",$new_name1);
	          $file_tmp =$_FILES['img_upload']['tmp_name'];
	          $file=$_FILES['img_upload']['name'];
	          $ext=substr(strrchr($file,'.'),1);
	          if($ext=="png" || $ext=="gif" || $ext=="jpg" || $ext=="jpeg")
	          {
	            move_uploaded_file($file_tmp,"../uploads/blog/".$new_name.".".$ext);
	            $blog_image=$new_name.".".$ext;
	          }
			//echo $group;exit;
            
			$data=array(
			  'blog_title' => $title,
		      'blog_slug' => $slug,
		      'blog_dec' => $blog_dec,		      
		      'blog_image' => $blog_image,
		      'meta_description' => $meta_description,
		      'meta_title' => $meta_title,		      
		      'meta_keyword' => $meta_keyword,
		      'category' => $cat,
		      'tag' => $tag,
			  'brand' => $brand,
		      'created_by' => $jad_user_id,
	      	  'created_at' => date('Y-m-d H:i:s'),
		      'status' => $status,
				);
			$user_id=$this->common_model->insertData('tbl_blog',$data);
			
			//echo $this->db->last_query(); die;		

			$this->session->set_flashdata('success','Blog ['.$title.'] Has Been Added Successfully!');
			redirect(base_url().'admin_blog');
	}

	function action()
    {
        $product_id=$this->input->post('id');
        $action=$this->input->post('action');
        //$product_id=explode(',',$product_id);
        $message='';
        if($action=="1")
        {
            $data=array('status'=>'1');
            foreach($product_id as $product)
            {
                $where=array('blog_id'=>$product);
                $this->admin_model->updateData('tbl_blog',$data,$where);

                //echo $this->db->last_query(); die;
            }
            $message='Status Has Been Updated!';
        }
        if($action=="0")
        {
            $data=array('status'=>'0');
            foreach($product_id as $product)
            {
                $where=array('blog_id'=>$product);
                $this->admin_model->updateData('tbl_blog',$data,$where);
               // echo $this->db->last_query(); die;
            }
            $message='Status Has Been Updated!';
        }
        if($action=="delete")
        {
            $data=array('status'=>'delete');
            foreach($product_id as $product)
            {
                $where=array('blog_id'=>$product);
                $this->admin_model->updateData('tbl_blog',$data,$where);

                //echo $this->db->last_query(); die;
            }
            $message='Blog Has Been Deleted!';
        }        
        
        echo json_encode(array('message'=>$message));
    }
	
	
	function edit_blog($blog_id)
	{
	// 	$path = '../assets/admin/plugins/ckeditor/ckfinder';
	// 	$width = '850px';
	// 	$this->editor($path, $width);

		$where_cat ='status = 1';
		$order_by=' ORDER BY cat_title ASC'; 
		$data['blog_cat_records']=$this->blog_model->blog_category_list($where_cat,$order_by);

		$where=array(
          'blog_id ='=>$blog_id,
        );
       $data['blog_details'] = $this->admin_model->selectWhere('tbl_blog',$where);
	   
	   $where=array(
          'brand_status ='=>1,
        );
       $data['brand_records'] = $this->admin_model->selectWhere('tbl_brand',$where);
		 

		$data['active_sidebar']='edit_blog';
		$this->load->view('common/header');
		$this->load->view('common/sidebar',$data);
		$this->load->view('blog/blog_edit',$data);
		$this->load->view('common/footer');
	}
	
	function edit_blog_submit()
	{
		
		$jad_user_id=$this->session->userdata('jad_user_id');

			$blog_id=$this->input->post('blog_id');
			$title=$this->input->post('title');
			$blog_slug=$this->input->post('blog_slug');
			$blog_image = 'no_image.jpg';
			$status=$this->input->post('status');
			$hid_image=$this->input->post('hid_image');			
			$blog_dec=$this->input->post('product_description');
			
			$meta_title=$this->input->post('meta_title');
			$meta_keyword=$this->input->post('meta_keyword');
			$meta_description=$this->input->post('meta_description');

			$tag=$this->input->post('tag');
			$cateory=$this->input->post('cateory');
			$cat = implode(",",$cateory);
			
			$brands=$this->input->post('brand');
			$brand = implode(",",$brands);
			

		$this->form_validation->set_rules('blog_id', 'Blog Id', 'trim|required');
		$this->form_validation->set_rules('title', 'Title', 'trim|required');
		
		if($this->form_validation->run() == FALSE)
    {
    	$this->session->set_flashdata('alert','Please Fill the Form Correctly!');
			redirect(base_url().'blog/blog_edit/'.$blog_id);
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
	            move_uploaded_file($file_tmp,"../uploads/blog/".$new_name.".".$ext);
	            $blog_image=$new_name.".".$ext;
	          }
    	}else{
    		$blog_image=$hid_image;
    	}
		 
		$slug = makeSlug($this->input->post("title"));
        $wheres = " blog_slug like '".$slug."%'";
        $slug_list = $this->blog_model->getProductSlug($wheres);

        if(count($slug_list)){
            foreach($slug_list as $row)
            {
                $slug_arr[] = $row->product_slug;
            }
            if(in_array($slug, $slug_arr))
            {
                for ($i=1; in_array(($slug.'-'.$i),$slug_arr); $i++) { }                    
                $slug = $slug.'-'.$i;
            }
        } 


		$data=array(
			  'blog_title' => $title,
		      'blog_slug' => $slug,
		      'blog_dec' => $blog_dec,		      
		      'blog_image' => $blog_image,
		      'meta_description' => $meta_description,
		      'meta_title' => $meta_title,		      
		      'meta_keyword' => $meta_keyword,
		      'edited_by' => $jad_user_id,
	      	  'edited_at' => date('Y-m-d H:i:s'),
		      'status' => $status,
		      'category' => $cat,
		      'tag' => $tag,
			  'brand' => $brand
				);
		$this->common_model->updateData('tbl_blog',$data,array('blog_id'=>$blog_id));
		$this->session->set_flashdata('success','['.$title.'] Blog Detail Has Been Updated Successfully!');
		redirect(base_url().'admin_blog');
    	 
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
		$this->ckeditor->basePath = base_url().'assets/plugins/ckeditor/';
		$this->ckeditor-> config['toolbar'] = 'Full';
		$this->ckeditor->config['language'] = 'en';
		$this->ckeditor-> config['width'] = $width;
		//configure ckfinder with ckeditor config 
		$this->ckfinder->SetupCKEditor($this->ckeditor,$path); 
  	}

  	function delete_blog($blog_id)
	{
		
	
		$data['blog_details']=$this->common_model->deleteData('tbl_blog',array('blog_id'=>$blog_id));
		//echo "<pre>";print_ex($data);
		$this->session->set_flashdata('success','Blog Detail Has Been Deleted Successfully!');
		redirect(base_url().'admin_blog');

		
	}
	
	
	public function blog_category_list()
	{	
		$where ='blog_cat_id > 0';
		$order_by=' ORDER BY blog_cat_id DESC'; 
		$data['records']=$this->blog_model->blog_category_list($where,$order_by);

		 $data['active'] = "blog";
        $this->load->view('common/header');
        $this->load->view('common/sidebar', $data);
        $this->load->view('blog/blog_cat_list');
        $this->load->view('common/footer');
	}

	function get_blog_cat_slug_name()
    {

        $category_name=$this->input->post('category_name');
        $slug=$this->common_model->url_slug($category_name);
       // print_ex($slug);
        echo json_encode(array('slug_name'=>$slug));
    }

	function add_blog_category()
	{
		 
        $data['active']="add_blog";
        $this->load->view('common/header');
        $this->load->view('common/sidebar',$data);
        $this->load->view('blog/blog_cat_add_view');
        $this->load->view('common/footer');
	}

	function add_blog_category_submit()
	{

			$jad_user_id=$this->session->userdata('jw_admin_id');

			$title=$this->input->post('name');
			$status=$this->input->post('status');
			

			$this->form_validation->set_rules('name', 'Title', 'trim|required');			
			
			if($this->form_validation->run() == FALSE)
		    {
		    	$this->session->set_flashdata('alert','Please Fill the Form Correctly!');
				redirect(base_admin().'admin_blog/add_blog_category');
		    }

		     
			//echo $group;exit;
            
			$data=array(
			  'cat_title' => $title,		     
		      'added_by' => $jad_user_id,
	      	  'date_added' => date('Y-m-d H:i:s'),
		      'status' => $status,
				);
			$user_id=$this->common_model->insertData('tbl_blog_category',$data);
			
			//echo $this->db->last_query(); die;		

			$this->session->set_flashdata('success','Blog cateory ['.$title.'] Has Been Added Successfully!');
			redirect(base_url().'admin_blog/blog_category_list');
	}

	function edit_blog_category($blog_cat_id)
	{
	
		$where=array(
          'blog_cat_id ='=>$blog_cat_id,
        );
       $data['blog_details'] = $this->admin_model->selectWhere('tbl_blog_category',$where);

		$data['active_sidebar']='edit_blog';
		$this->load->view('common/header');
		$this->load->view('common/sidebar',$data);
		$this->load->view('blog/blog_cat_edit_view',$data);
		$this->load->view('common/footer');
	}


	function edit_blog_category_submit()
	{
		
		$jad_user_id=$this->session->userdata('jad_user_id');

			$blog_cat_id=$this->input->post('blog_cat_id');
			$title=$this->input->post('name');
			$status=$this->input->post('status');
			
			

		$this->form_validation->set_rules('blog_cat_id', 'Blog cateory Id', 'trim|required');
		$this->form_validation->set_rules('name', 'Title', 'trim|required');
		
		if($this->form_validation->run() == FALSE)
    	{
    	$this->session->set_flashdata('alert','Please Fill the Form Correctly!');
			redirect(base_url().'admin_blog/edit_blog_category/1'.$blog_cat_id);
   		 }



		$data=array(
			  'cat_title' => $title,		           
		      'edited_by' => $this->session->userdata('jw_admin_id'),
	      	  'date_edited' => date('Y-m-d H:i:s'),
		      'status' => $status,
				);
		$this->common_model->updateData('tbl_blog_category',$data,array('blog_cat_id'=>$blog_cat_id));
		$this->session->set_flashdata('success','['.$title.'] Blog cateory Detail Has Been Updated Successfully!');
		redirect(base_url().'admin_blog/blog_category_list');
    	 
	}


	function delete_blog_category($blog_id)
	{
		
	
		$data['blog_details']=$this->common_model->deleteData('tbl_blog_category',array('blog_cat_id'=>$blog_id));
		//echo "<pre>";print_ex($data);
		$this->session->set_flashdata('success','Blog Category Detail Has Been Deleted Successfully!');
		redirect(base_url().'admin_blog/blog_category_list');

		
	}

	
	

}
