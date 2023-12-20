<?php
class Admin_chat extends CI_Controller{
	
	/**
	 * Constructor duh
	 * - loads the model
	 */
	function __construct()
	{
		parent::__construct();
		
		$this->load->model('common_model');
		$this->load->model('vendor_model');
		$this->load->library('upload');
	}
	
	/**
	 * Loads the default page for the XML example
	 * 
	 */
	 public function index()
	 {
	     if($this->session->userdata('jw_admin_id')=="")
          {
          	redirect(base_url());
          }
	     $data['vendor_list']=$this->db->query("SELECT * FROM tbl_user WHERE CD_GROUP_ID = 4")->result();
		$data['group_list']=$this->admin_model->selectAll('tbl_vendor_group');
		
		$data['active_sidebar']='chat_vendor_list';
		//print_ex($data);
		
		$this->load->view('common/header');
		$this->load->view('common/sidebar',$data);
		$this->load->view('chat/vendor_list',$data);
		$this->load->view('common/footer');
	 }
	public function online_visitors()
	{	
	    if($this->session->userdata('jw_admin_id')=="")
          {
          	redirect(base_url());
          }
	    $session = $this->session->userdata();
	    if($session['jw_admin_group'] == 4 || $session['jw_admin_group'] == 1){
	    $data['result'] = $this->db->query("SELECT * FROM tbl_messages WHERE user_id = ".$session['jw_admin_group']." group by ip order by id DESC")->result();
	    $this->load->view('common/header');
	    $this->load->view('common/sidebar');
		$this->load->view('chat/chatView',$data);		
		$this->load->view('common/footer');
	    }else{
	        redirect(base_url());
	    }
	}
	
	/**
	 * UPDATES the DB
	 * 
	 * @param $_POST array
	 * @return bool
	 */
	public function update()
	{
        $ip = $this->input->post('ip_address');
	
		$message = $this->input->post('msg');
        
		$current = new DateTime();		
		$data = array('msg'=>$message,
		                'ip'=>$ip,
		            'time' => date('H:i:s'),
		            'role'=>0);
		$insertid = $this->common_model->insertData('tbl_messages',$data);
		if($insertid){
		    return true;
		}else{
		    return false;}
		
	}
	
	/**
	 * XML Backend
	 * 
	 * @return
	 */
	public function get_all()
	{	
		//HTTP headers for XML							
		header("Content-type: text/xml");
		header("Cache-Control: no-cache");
		
		//get the data		
		$ip = $this->input->get("ip");
		$query = $this->db->query("SELECT * FROM tbl_messages where ip = '$ip' ORDER BY id ASC")->result();
		
		$html ='';
		//Loop through all the data
			foreach($query as $row){
			    if($row->role == 0){
			        $html .= '<p class="right">';
			    }
			    else if($row->role == 1){
			        $html .= '<p class="left">';
			    }
			    $html .= $row->msg;
			    $html .= '</p>';
			}

		echo $html;
				
	}
	function add_chat_vendor()
	{
	    if($this->session->userdata('jw_admin_id')=="")
          {
          	redirect(base_url());
          }
		$data['group_list']=$this->admin_model->selectAll('tbl_vendor_group');
		$data['active_sidebar']='chat_vendor_add';
		$this->load->view('common/header');
		$this->load->view('common/sidebar',$data);
		$this->load->view('chat/vendor_add',$data);
		$this->load->view('common/footer');
	}
	function add_vendor_submit()
	{
			$jw_admin_id=$this->session->userdata('jw_admin_id');

			$name=$this->input->post('name');
			$password=$this->input->post('password');
			$email=$this->input->post('email');
			$status=$this->input->post('status');
			$group=4;
			
			$data=array(
					'CD_GROUP_ID' => $group,
		      'NM_USER_EMAIL' => $email,
		      'SN_USERNAME' => $email,
		      'NM_USER_FULLNAME' => $name,
		      'USER_PASSWORD' => getHash($password),
		      'SN_CREATED_BY' => $jw_admin_id,
	      	'TS_CREATED_AT' => date('Y-m-d H:i:s'),
		      'FL_USER_ACTIVE' => $status,    
		      'EMAIL_VERIFY' => getHash($email),
		      'CD_PARENT_ID'  =>0,    
				);
				
          $file_dir='../uploads/chat/profile/';
          clearstatcache();
          if($_FILES['userfile']['name'] != '')
          {
              $config['upload_path'] = $file_dir;
              $config['allowed_types'] = 'gif|jpg|jpeg|png';
              $config['max_size']      = '6000';
              $config['overwrite']     = TRUE;

              $this->upload->initialize($config);
              $this->upload->do_upload();
              $upload_data = $this->upload->data(); 
                $data['profile_pic'] = $upload_data['file_name'];
          }
			$user_id=$this->admin_model->insertData('tbl_user',$data);
            if($user_id)
            {
                $data_details=array(
							'CD_USER_ID' => $user_id
					);
					$this->admin_model->insertData('tbl_user_details',$data_details);
            }
			$this->session->set_flashdata('success','Vendor ['.$name.'] Has Been Added Successfully!');
			redirect(base_url().'admin_chat');
	}
	function edit_vendor($vendor_id)
	{
	    if($this->session->userdata('jw_admin_id')=="")
          {
          	redirect(base_url());
          }
		$data['vendor_details']=$this->db->query("SELECT * FROM tbl_user WHERE CD_USER_ID = $vendor_id")->result();
		
		$data['active_sidebar']='chat_vendor_list';
		$this->load->view('common/header');
		$this->load->view('common/sidebar',$data);
		$this->load->view('chat/vendor_edit',$data);
		$this->load->view('common/footer');
	}
	function edit_vendor_submit()
	{
		$jw_admin_id=$this->session->userdata('jw_admin_id');
		
		$vendor_id=$this->input->post('vendor_id');		
		$name=$this->input->post('name');
		$password=$this->input->post('password');
		// $email=$this->input->post('email');
		$status=$this->input->post('status');
		if($password!="")
		{
				$data=array(	
		      'NM_USER_FULLNAME' => $name,
		      'USER_PASSWORD' => getHash($password),
		      'SN_EDITED_BY' => $jw_admin_id,
	    		'TS_EDITED_AT' => date('Y-m-d H:i:s'),
		      'FL_USER_ACTIVE' => $status, 
				);
		}
		else
		{
				$data=array(			
	      	'NM_USER_FULLNAME' => $name,		      
		      'SN_EDITED_BY' => $jw_admin_id,
	    		'TS_EDITED_AT' => date('Y-m-d H:i:s'),
		      'FL_USER_ACTIVE' => $status,      
				);
		}
		    $file_dir='../uploads/chat/profile/';
          clearstatcache();
          
          if($_FILES['userfile']['name'] != '')
          {
              $config['upload_path'] = $file_dir;
              $config['allowed_types'] = 'gif|jpg|jpeg|png';
              $config['max_size']      = '6000';
              $config['overwrite']     = TRUE;

              $this->upload->initialize($config);
              $this->upload->do_upload();
              $upload_data = $this->upload->data(); 
                $data['profile_pic'] = $upload_data['file_name'];
          }
          
		$this->admin_model->updateData('tbl_user',$data,array('CD_USER_ID'=>$vendor_id));
		$this->session->set_flashdata('success','Vendor ['.$name.'] Has Been Updated Successfully!');
		redirect(base_url().'admin_chat');
	}
}
?>