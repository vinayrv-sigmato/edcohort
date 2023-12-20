<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_sales_person extends CI_Controller {

	public function __construct()
  {
      parent::__construct();
      
      $this->load->model('sales_person_model');
      $this->load->model('vendor_model');
      if($this->session->userdata('jw_admin_id')=="")
      {
      	redirect(base_url());
      }
  }
	public function index()
	{		
		$filter=$this->input->get();
		$data['vendor_list']=$this->sales_person_model->vendor_list($filter);
		$data['group_list']=$this->admin_model->selectAll('tbl_vendor_group');
		
		$data['active_sidebar']='vendor_list';
		//print_ex($data);
		
		$this->load->view('common/header');
		$this->load->view('common/sidebar',$data);
		$this->load->view('sales_person/vendor_list',$data);
		$this->load->view('common/footer');
	}
	function add_sales_person()
	{
		$data['group_list']=$this->admin_model->selectAll('tbl_vendor_group');
		$data['active_sidebar']='vendor_add';
		$this->load->view('common/header');
		$this->load->view('common/sidebar',$data);
		$this->load->view('sales_person/vendor_add',$data);
		$this->load->view('common/footer');
	}
	function add_sales_person_submit()
	{
			$jw_admin_id=$this->session->userdata('jw_admin_id');

			$name=$this->input->post('name');
			//$company=$this->input->post('company');
			//$website=$this->input->post('website');
			$password=$this->input->post('password');
			$email=$this->input->post('email');
			$phone=$this->input->post('phone');
			$status=$this->input->post('status');
			//$markup=$this->input->post('markup');
			$category=$this->input->post('category');
			$diamond=$this->input->post('diamond');
			$vendor=$this->input->post('vendor');
			$sales_person=$this->input->post('sales_person');
			$product=$this->input->post('product');
			$sales=$this->input->post('sales');
			$customer=$this->input->post('customer');
			$design_with_us=$this->input->post('design_with_us');
			$setting_master=$this->input->post('setting_master');
			$appointment=$this->input->post('appointment');
			$banner=$this->input->post('banner');
			$contact=$this->input->post('contact');
			$enquiry=$this->input->post('enquiry');
			$subscriber=$this->input->post('subscriber');
			$manage_page=$this->input->post('manage_page');
			$blog=$this->input->post('blog');
			$currency=$this->input->post('currency');
			$group=2;

			// if($group==0)
			// {
			// 	$new_group=$this->input->post('new_group');
			// 	$data_group=array(					
			//       'SN_VENDOR_GROUP_NAME' => $new_group ,
			//       'SN_CREATED_BY' => $jw_admin_id ,
			//       'TS_CREATED_AT' => date('Y-m-d H:i:s') ,		      
			// 		);
			// 	$group=$this->admin_model->insertData('tbl_vendor_group',$data_group);
			// }
			//echo implode(',',$group);exit;

			$data=array(
			    'CD_GROUP_ID' => '2',
		      'NM_USER_EMAIL' => $email,
		      'SN_USERNAME' => $email,		      
		      'USER_PASSWORD' => getHash($password),
		      'SN_USER_MOBILE' => $phone,
		      'SN_CREATED_BY' => $jw_admin_id,
	      	'TS_CREATED_AT' => date('Y-m-d H:i:s'),
		      'FL_USER_ACTIVE' => $status,		        
		      'EMAIL_VERIFY' => getHash($email),
		      'CD_PARENT_ID'  =>0,    
				);
			$user_id=$this->admin_model->insertData('tbl_user',$data);

			if($user_id)
			{
					$data_details=array(
							'CD_USER_ID' => $user_id,	
							'NM_PRIMARY_CONTACT_NAME' => $name,
							//'SN_VENDOR_GROUP_ID' =>  implode(',',$group),
							'NM_FOLDER_NAME'=> str_replace(' ', '_', $company)."_".date('Y_m_d'),      
					);
					$this->admin_model->insertData('tbl_user_details',$data_details);
					//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
					foreach ($group as $key => $value) 
					{
							$data_group=array(
										'vendor_id' => $user_id,	
										'vendor_group_id' => $value,							      
							);
							$this->admin_model->insertData('tbl_vendor_group_id',$data_group);
					}

					$data_permission=array(
						   'user_id'=>$user_id,
						   'category'=>$category,
						   'diamond'=>$diamond,
               'vendor'=>$vendor,
					     'sales_person'=>$sales_person,
					     'product'=>$product,
					     'sales'=>$sales,
					     'customer'=>$customer,
					     'design_with_us'=>$design_with_us,
					     'setting_master'=>$setting_master,
					     'appointment'=>$appointment,
					     'banner'=>$banner,
					     'contact'=>$contact,
					     'enquiry'=>$enquiry,
					     'subscriber'=>$subscriber,
					     'manage_page'=>$manage_page,
					     'blog'=>$blog,
					     'currency'=>$currency,
					     	);
					$this->admin_model->insertData('tbl_permission',$data_permission);

					//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
					// $mail_data=array();
					// $this->email->set_mailtype("html");
					// $message=$this->load->view('mail_template/vendor_registration',$mail_data,true);
					// $this->email->from(from_email(), '');
					// $this->email->to($email);					

					// $this->email->subject('Registratin Gemsbridge');
					// $this->email->message($message);

					// $this->email->send();

					//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
					//$this->make_directory(str_replace(' ', '_', $company)."_".date('Y_m_d'));
					
			}			

			$this->session->set_flashdata('success','Sales Person ['.$name.'] Has Been Added Successfully!');
			redirect(base_url().'admin_sales_person');
	}
	function edit_sales_person($vendor_id)
	{
		$data['vendor_details']=$this->sales_person_model->select_vendor($vendor_id);
		$data['group_list']=$this->admin_model->selectAll('tbl_vendor_group');
		$data['vendor_group']=$this->admin_model->selectWhere('tbl_vendor_group_id',array('vendor_id'=>$vendor_id));
		$data['vendor_permission']=$this->admin_model->selectWhere('tbl_permission',array('user_id'=>$vendor_id));
		//echo "<pre>";print_ex($data);

		$data['active_sidebar']='vendor_list';
		$this->load->view('common/header');
		$this->load->view('common/sidebar',$data);
		$this->load->view('sales_person/vendor_edit',$data);
		$this->load->view('common/footer');
	}
	function edit_sales_person_submit()
	{
		$jw_admin_id=$this->session->userdata('jw_admin_id');
		
		$vendor_id=$this->input->post('vendor_id');		
		$name=$this->input->post('name');
		$company=$this->input->post('company');
		$website=$this->input->post('website');
		$password=$this->input->post('password');
		// $email=$this->input->post('email');
		$phone=$this->input->post('phone');
		$status=$this->input->post('status');
		$group=$this->input->post('group');
		$markup=$this->input->post('markup');
		$category=$this->input->post('category');
			$diamond=$this->input->post('diamond');
			$vendor=$this->input->post('vendor');
			$sales_person=$this->input->post('sales_person');
			$product=$this->input->post('product');
			$sales=$this->input->post('sales');
			$customer=$this->input->post('customer');
			$design_with_us=$this->input->post('design_with_us');
			$setting_master=$this->input->post('setting_master');
			$appointment=$this->input->post('appointment');
			$banner=$this->input->post('banner');
			$contact=$this->input->post('contact');
			$enquiry=$this->input->post('enquiry');
			$subscriber=$this->input->post('subscriber');
			$manage_page=$this->input->post('manage_page');
			$blog=$this->input->post('blog');
			$currency=$this->input->post('currency');
		//markup
		// if($group==0)
		// {
		// 	$new_group=$this->input->post('new_group');
		// 	$data_group=array(					
		//       'SN_VENDOR_GROUP_NAME' => $new_group ,
		//       'SN_CREATED_BY' => $jw_admin_id ,
		//       'TS_CREATED_AT' => date('Y-m-d H:i:s') ,		      
		// 		);
		// 	$group=$this->admin_model->insertData('tbl_vendor_group',$data_group);
		// }

		if($password!="")
		{
				$data=array(	
		      'NM_USER_FULLNAME' => $company,
		      'USER_PASSWORD' => getHash($password),
		      'SN_USER_MOBILE' => $phone,
		      'SN_EDITED_BY' => $jw_admin_id,
	    	  'TS_EDITED_AT' => date('Y-m-d H:i:s'),
		      'FL_USER_ACTIVE' => $status, 
		      'markup' => $markup,
				);
		}
		else
		{
				$data=array(			
	      	  'NM_USER_FULLNAME' => $company,		      
		      'SN_USER_MOBILE' => $phone,
		      'SN_EDITED_BY' => $jw_admin_id,
	    	  'TS_EDITED_AT' => date('Y-m-d H:i:s'),
		      'FL_USER_ACTIVE' => $status, 
		       'markup' => $markup,    
				);
		}		
		$this->admin_model->updateData('tbl_user',$data,array('CD_USER_ID'=>$vendor_id));

		$data_details=array(				
				'NM_COMPANY_NAME' => $company,
				'NM_COMPANY_WEBSITE' => $website,  
				'NM_PRIMARY_CONTACT_NAME' => $name, 
				//'SN_VENDOR_GROUP_ID' =>  implode(',',$group),       
		);
		$this->admin_model->updateData('tbl_user_details',$data_details,array('CD_USER_ID'=>$vendor_id));

		$this->admin_model->deleteData('tbl_vendor_group_id',array('vendor_id'=>$vendor_id));
		foreach ($group as $key => $value) 
		{
				$data_group=array(
							'vendor_id' => $vendor_id,	
							'vendor_group_id' => $value,							      
				);
				$this->admin_model->insertData('tbl_vendor_group_id',$data_group);
		}

		$data_permission=array(
						   'category'=>$category,
						   'diamond'=>$diamond,
               'vendor'=>$vendor,
					     'sales_person'=>$sales_person,
					     'product'=>$product,
					     'sales'=>$sales,
					     'customer'=>$customer,
					     'design_with_us'=>$design_with_us,
					     'setting_master'=>$setting_master,
					     'appointment'=>$appointment,
					     'banner'=>$banner,
					     'contact'=>$contact,
					     'enquiry'=>$enquiry,
					     'subscriber'=>$subscriber,
					     'manage_page'=>$manage_page,
					     'blog'=>$blog,
					     'currency'=>$currency,
					     	);
		$this->admin_model->updateData('tbl_permission',$data_permission,array('user_id'=>$vendor_id));
     
		
		$this->session->set_flashdata('success','Sales Person ['.$name.'] Has Been Updated Successfully!');
		redirect(base_url().'admin_sales_person');
	}
	function vendor_details_ajax()
	{
			$vendor_id=$this->input->post('vendor_id');
			$result=$this->sales_person_model->select_vendor($vendor_id);
			$last_login=$this->admin_model->last_login($vendor_id);

			$vendor_group=$this->sales_person_model->vendor_group($vendor_id);
			$group_array=array();
      foreach ($vendor_group as $row){
          $group_array[]= $row->SN_VENDOR_GROUP_NAME;
      }

			echo json_encode(array('last_login'=>$last_login,'result'=>$result,'v_group'=>implode(',',$group_array)));
	}
	function vendor_log()
	{		
			$data['log_list']=$this->sales_person_model->vendor_log();
			
			$data['active_sidebar']='vendor_log';
			//echo "<pre>";print_ex($data);
			
			$this->load->view('common/header');
			$this->load->view('common/sidebar',$data);
			$this->load->view('sales_person/vendor_log',$data);
			$this->load->view('common/footer');
	}
	function vendor_group()
	{		
			$data['group_list']=$this->admin_model->selectAll('tbl_vendor_group');
			
			$data['active_sidebar']='vendor_group';
			//echo "<pre>";print_ex($data);
			
			$this->load->view('common/header');
			$this->load->view('common/sidebar',$data);
			$this->load->view('sales_person/vendor_group',$data);
			$this->load->view('common/footer');
	}
	function add_group()
	{
		$data['active_sidebar']='vendor_group';
		$this->load->view('common/header');
		$this->load->view('common/sidebar',$data);
		$this->load->view('sales_person/group_add',$data);
		$this->load->view('common/footer');
	}
	function add_group_submit()
	{
		$this->form_validation->set_rules('name', 'Name', 'trim|required|max_length[15]');
		
		if($this->form_validation->run() == FALSE)
    {
    	$this->session->set_flashdata('alert','Please Fill the Form Correctly!');
			redirect(base_url().'admin_sales_person/add_group');
    }

		$jw_admin_id=$this->session->userdata('jw_admin_id');

		$name=$this->input->post('name');		

		$data=array(
			'SN_VENDOR_GROUP_NAME' =>$name,			
      'SN_CREATED_BY' =>$jw_admin_id,
      'TS_CREATED_AT' =>date('Y-m-d H:i:s'),      
			);
		$this->admin_model->insertData('tbl_vendor_group',$data);
		$this->session->set_flashdata('success','Vendor Group ['.$name.'] Has Been Added Successfully!');
		redirect(base_url().'admin_sales_person/vendor_group');
	}
	function edit_group($group_id)
	{
		$data['group_details']=$this->admin_model->selectOne('tbl_vendor_group','CD_VENDOR_GROUP_ID',$group_id);

		$data['active_sidebar']='vendor_group';
		$this->load->view('common/header');
		$this->load->view('common/sidebar',$data);
		$this->load->view('sales_person/group_edit',$data);
		$this->load->view('common/footer');
	}
	function edit_group_submit()
	{
		$jw_admin_id=$this->session->userdata('jw_admin_id');

		$group_id=$this->input->post('group_id');
		$name=$this->input->post('name');		

		$this->form_validation->set_rules('group_id', 'Group_id', 'trim|required');
		$this->form_validation->set_rules('name', 'Name', 'trim|required|max_length[15]');
		
		if($this->form_validation->run() == FALSE)
    {
    	$this->session->set_flashdata('alert','Please Fill the Form Correctly!');
			redirect(base_url().'admin_sales_person/edit_group/'.$group_id);
    }

		$data=array(
			'SN_VENDOR_GROUP_NAME' =>$name,			
      'SN_EDITED_BY' =>$jw_admin_id,
      'TS_EDITED_AT' =>date('Y-m-d H:i:s'),      
			);
		$this->admin_model->updateData('tbl_vendor_group',$data,array('CD_VENDOR_GROUP_ID'=>$group_id));
		$this->session->set_flashdata('success','Vendor Group ['.$name.'] Has Been Updated Successfully!');
		redirect(base_url().'admin_sales_person/vendor_group');
	}
	function make_directory($company)
  {
  	$txt = "<!DOCTYPE html><html><head><title>403 Forbidden</title></head><body><p>Directory access is forbidden.</p></body></html>";
  	//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
  	mkdir('../ftp_upload/'.$company);
  	$myfile = fopen("../ftp_upload/".$company."/index.html", "w");		
		fwrite($myfile, $txt);
		//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
		mkdir('../ftp_upload/'.$company.'/diamond');
  	$myfile = fopen('../ftp_upload/'.$company.'/diamond/index.html', "w");
		fwrite($myfile, $txt);

		mkdir('../ftp_upload/'.$company.'/diamond/excel');
  	$myfile = fopen('../ftp_upload/'.$company.'/diamond/excel/index.html', "w");
		fwrite($myfile, $txt);

		mkdir('../ftp_upload/'.$company.'/diamond/certificate');
  	$myfile = fopen('../ftp_upload/'.$company.'/diamond/certificate/index.html', "w");
		fwrite($myfile, $txt);

		mkdir('../ftp_upload/'.$company.'/diamond/image');
  	$myfile = fopen('../ftp_upload/'.$company.'/diamond/image/index.html', "w");
		fwrite($myfile, $txt);
		
		mkdir('../ftp_upload/'.$company.'/diamond/video');
  	$myfile = fopen('../ftp_upload/'.$company.'/diamond/video/index.html', "w");
		fwrite($myfile, $txt);
		//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
		mkdir('../ftp_upload/'.$company.'/product');
  	$myfile = fopen('../ftp_upload/'.$company.'/product/index.html', "w");
		fwrite($myfile, $txt);

		mkdir('../ftp_upload/'.$company.'/product/excel');
  	$myfile = fopen('../ftp_upload/'.$company.'/product/excel/index.html', "w");
		fwrite($myfile, $txt);

		mkdir('../ftp_upload/'.$company.'/product/certificate');
  	$myfile = fopen('../ftp_upload/'.$company.'/product/certificate/index.html', "w");
		fwrite($myfile, $txt);

		mkdir('../ftp_upload/'.$company.'/product/image');
  	$myfile = fopen('../ftp_upload/'.$company.'/product/image/index.html', "w");
		fwrite($myfile, $txt);
		
		mkdir('../ftp_upload/'.$company.'/product/video');
  	$myfile = fopen('../ftp_upload/'.$company.'/product/video/index.html', "w");
		fwrite($myfile, $txt);
		//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
		// mkdir('../ftp_upload/'.$company.'/watch');
  // 	$myfile = fopen('../ftp_upload/'.$company.'/watch/index.html', "w");
		// fwrite($myfile, $txt);

		// mkdir('../ftp_upload/'.$company.'/watch/excel');
  // 	$myfile = fopen('../ftp_upload/'.$company.'/watch/excel/index.html', "w");
		// fwrite($myfile, $txt);

		// mkdir('../ftp_upload/'.$company.'/watch/certificate');
  // 	$myfile = fopen('../ftp_upload/'.$company.'/watch/certificate/index.html', "w");
		// fwrite($myfile, $txt);

		// mkdir('../ftp_upload/'.$company.'/watch/image');
  // 	$myfile = fopen('../ftp_upload/'.$company.'/watch/image/index.html', "w");
		// fwrite($myfile, $txt);
		
		// mkdir('../ftp_upload/'.$company.'/watch/video');
  // 	$myfile = fopen('../ftp_upload/'.$company.'/watch/video/index.html', "w");
		// fwrite($myfile, $txt);
		//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
		// mkdir('../ftp_upload/'.$company.'/jewelry');
  // 	$myfile = fopen('../ftp_upload/'.$company.'/jewelry/index.html', "w");
		// fwrite($myfile, $txt);

		// mkdir('../ftp_upload/'.$company.'/jewelry/excel');
  // 	$myfile = fopen('../ftp_upload/'.$company.'/jewelry/excel/index.html', "w");
		// fwrite($myfile, $txt);

		// mkdir('../ftp_upload/'.$company.'/jewelry/certificate');
  // 	$myfile = fopen('../ftp_upload/'.$company.'/jewelry/certificate/index.html', "w");
		// fwrite($myfile, $txt);

		// mkdir('../ftp_upload/'.$company.'/jewelry/image');
  // 	$myfile = fopen('../ftp_upload/'.$company.'/jewelry/image/index.html', "w");
		// fwrite($myfile, $txt);
		
		// mkdir('../ftp_upload/'.$company.'/jewelry/video');
  // 	$myfile = fopen('../ftp_upload/'.$company.'/jewelry/video/index.html', "w");
		// fwrite($myfile, $txt);
		//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
  }

}
