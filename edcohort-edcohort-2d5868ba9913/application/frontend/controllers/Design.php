<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Design extends CI_Controller {
    public function __construct() {
        parent::__construct();
    }
    public function index() {

    	$user_id = $this->session->userdata('user_id');
    	$data['record'] = $this->common_model->selectOne('tbl_user', 'CD_USER_ID', $user_id);
    	

        $data['title'] = 'Design With Us';

        $this->load->view('common/header',$data);
        $this->load->view('design/design',$data);
        $this->load->view('common/footer');
    }

    public function custom_design() {

    	$user_id = $this->session->userdata('user_id');
    	$data['record'] = $this->common_model->selectOne('tbl_user', 'CD_USER_ID', $user_id);

        $data['title'] = 'Design With Us';
        $this->load->view('common/header',$data);
        $this->load->view('design/custom_design',$data);
        $this->load->view('common/footer');
    }


    public function design_submit_old() {
       
    		//print_ex($_POST);

       		$company=$this->input->post('company');
			$name=$this->input->post('name');
			$email=$this->input->post('email');
			$contact=$this->input->post('contact');
			$msg=$this->input->post('msg');
			$frame=$this->input->post('frame');
			$budget=$this->input->post('budget');
			$remark=$this->input->post('remark');


			$this->form_validation->set_rules('name', 'Name', 'trim|required');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
			$this->form_validation->set_rules('contact', 'Contact', 'trim|required');
						
			
			if($this->form_validation->run() == FALSE)
		    {
		    	$this->session->set_flashdata('alert_message','Please Fill the Form Correctly!');
				redirect(base_url().'design-with-us');
		    }
			

		    	

		    	 $name_array = array();
		    	 if($_FILES['userfile']['name'][0] != ''){
		    	 	
        		 $count = count($_FILES['userfile']['size']);
			        foreach ($_FILES as $key => $value)
			            for ($s = 0; $s <= $count - 1; $s++) {
			                $_FILES['userfile']['name'] = $value['name'][$s];
			                $_FILES['userfile']['type'] = $value['type'][$s];
			                $_FILES['userfile']['tmp_name'] = $value['tmp_name'][$s];
			                $_FILES['userfile']['error'] = $value['error'][$s];
			                $_FILES['userfile']['size'] = $value['size'][$s];

			                $config['upload_path'] = '../ftp_upload/design/';
			                $config['allowed_types'] = 'gif|jpg|png';
			                $config['max_size'] = '10000000';
			                $config['max_width'] = '51024';
			                $config['max_height'] = '5768';

			                $this->load->library('upload', $config);
			                if (!$this->upload->do_upload()) {
			                    $data_error = array('msg' => $this->upload->display_errors());
			                    var_dump($data_error);
			                } else {
			                    $data = $this->upload->data();
			                }
			                $name_array[] = $data['file_name'];
			            }

        		$names = implode(',', $name_array);

        		}

			$data=array(
			  'company' => $company,
		      'name' => $name,
		      'email' => $email,		      
		      'contact' => $contact,
		      'msg' => $msg,
		      'frame' => $frame,
		      'budget' => $budget,
		      'remark' => $remark,		      
		      'image' => $names,
		      'create_by' => '2',
	      	  'create_date' => date('Y-m-d H:i:s'),
		      'status' => 'Open',
				);
			$user_id=$this->common_model->insertData('tbl_design',$data);
					


			$this->load->library('email');
            $this->load->library('parser');
            $config['wordwrap'] = TRUE;
            $config['mailtype'] = 'html';
            $config['charset'] = 'utf-8';
            $config['priority'] = '1';
            $config['crlf'] = "\r\n";
            $config['newline'] = "\r\n";
            //$config['smtp_crypto']  = 'tls';
            $this->email->initialize($config);
            $this->email->from(SITE_EMAIL, SITE_NAME);
            $this->email->to(SITE_EMAIL);
            //$this->email->cc("testcc@domainname.com");
            $this->email->subject('DESIGN WITH US');
            //$url = base_url().'UserNewPassword/'.$check_register['email_code'];
            $data_email['fname'] = SITE_NAME;
            //$data_email['email_code'] = $email_code;
            //$this->email->message("Please click on this link for reset password".$url);
            $str_content = '';
            $str_name = ucwords($data_email['fname']);
            $str_url = '<p>Contact Details</p>
						<br>
						<p> Company : ' . $company . '</p>
						<p> Full Name : ' . $name . '</p>
						<p> Email Address : ' . $email . '</p>
						<p> Phone Number : ' . $contact . '</p>						
						<p>Project Details </p>
						<p> Project : ' . $msg . '</p>
						<p> Timeframe : ' . $frame . '</p>
						<p> Budget : ' . $budget . '</p>
						';
            $data_email['str_final'] = $str_url;
            $message = $this->load->view('email/email_template', $data_email, TRUE);
            $this->email->message($message);
            $data['message'] = "Sorry Unable to send email...";
            if ($this->email->send()) {
                $data['message'] = "Mail sent...";
            }
            //User Mail
            $this->load->library('email');
            $config['wordwrap'] = TRUE;
            $config['mailtype'] = 'html';
            $config['charset'] = 'utf-8';
            $config['priority'] = '1';
            $config['crlf'] = "\r\n";
            $config['newline'] = "\r\n";
            //$config['smtp_crypto']  = 'tls';
            $this->email->initialize($config);
            $this->email->from(SITE_EMAIL, SITE_NAME);
            $this->email->to($email);
            //$this->email->cc("testcc@domainname.com");
            $this->email->subject("DESIGN WITH US");
            //$url = base_url().'UserNewPassword/'.$check_register['email_code'];
            $data_email['fname'] = $name;
            $str_content = '';
            $str_name = ucwords($data_email['fname']);
            //$str_url = '<p>Message : '.$message.'</p>';
            $str_url = '<p>We have received your message and would like to thank you for writing to us. If your inquiry is urgent, please use the telephone number listed below to talk to one of our staff members. Otherwise, we will reply by email as soon as possible.</p>';
            $data_email['str_final'] = $str_url;
            //print_pre($data_email);
            $msg = $this->load->view('email/email_template', $data_email, TRUE);
            //echo $msg; die;
            $this->email->message($msg);
            $data['message'] = "Sorry Unable to send email...";
            if ($this->email->send()) {
                $data['message'] = "Mail sent...";
                //die;
                
            }

			$this->session->set_flashdata('alert_message','<p>Thank You for giving us opportunity to service your company for custom design needs. 
			All information received will remain confidential. One of our designer will be in touch as soon as possible. </p>
			<p>For immediate assistance, please call +66 2 267 0702.</p>');
		$this->session->set_flashdata('alert_title','DESIGN WITH US');
			redirect(base_url().'design-with-us');
        
    }

    function design_submit() 
	{
		if(!$this->session->userdata('user_id')) {
			redirect(base_url());
	    }
	    $user_id=$this->session->userdata('user_id');
   		$company=$this->input->post('company');
		$name=$this->input->post('name');
		$email=$this->input->post('email');
		$contact=$this->input->post('contact');
		$msg=$this->input->post('msg');
		$frame=$this->input->post('frame');
		$budget=$this->input->post('budget');
		$reference_number=$this->input->post('reference_number');
		$size=$this->input->post('size');
		$metal=$this->input->post('metal');
		$center_diamond=$this->input->post('center_diamond');
		$product_image_array=array();

		$this->form_validation->set_rules('name', 'Name', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('contact', 'Contact', 'trim|required');					
		
		if($this->form_validation->run() == FALSE) {
	    	$this->session->set_flashdata('alert_message','Please Fill the Form Correctly!');
			redirect(base_url().'design-with-us');
	    }
		$data=array(
		  'company' => $company,
	      'name' => $name,
	      'email' => $email,		      
	      'contact' => $contact,
	      'msg' => $msg,
	      'frame' => $frame,
	      'budget' => $budget,
	      'size' => $size,
	      'metal' => $metal,
	      'center_diamond' => $center_diamond,
	      'reference_number' => $reference_number,
	      'create_by' => $user_id,
      	  'create_date' => date('Y-m-d H:i:s'),
	      'status' => 'Quote',
	      'processing_status' =>1
		);
		$design_id=$this->common_model->insertData('tbl_design',$data);
		if($design_id)
		{
			foreach ($_FILES['img_upload']['name'] as $key => $value)
	        {   
	            $new_name1 = str_replace(".","",microtime());
	            $new_name=str_replace(" ","_",$new_name1);
	            $file_tmp =$_FILES['img_upload']['tmp_name'][$key];
	            $file=$_FILES['img_upload']['name'][$key];
	            $ext=substr(strrchr($file,'.'),1);
	            $new_file=$new_name.".".$ext;

	            if($ext=="png" || $ext=="gif" || $ext=="jpg" || $ext=="jpeg" || $ext=="JPG" || $ext=="JPEG" || $ext=="PNG")
	            {
	                $uploaded=move_uploaded_file($file_tmp,"./ftp_upload/design/".$new_file);    
	                $product_image_array[]=$new_file;
	            }
			}
			foreach ($product_image_array as $key => $value) 
            {
                $data_image=array(
                    'design_id'=>$design_id,
                    'image'=>$value
                );
                $this->common_model->insertData('tbl_custom_design_image',$data_image);
            }
		}

		$this->load->library('email');
        $this->load->library('parser');
        $config['wordwrap'] = TRUE;
        $config['mailtype'] = 'html';
        $config['charset'] = 'utf-8';
        $config['priority'] = '1';
        $config['crlf'] = "\r\n";
        $config['newline'] = "\r\n";
        //$config['smtp_crypto']  = 'tls';
        $this->email->initialize($config);
        $this->email->from(SITE_EMAIL, SITE_NAME);
        $this->email->to(SITE_EMAIL);
        //$this->email->cc("testcc@domainname.com");
        $this->email->subject('DESIGN WITH US');
        //$url = base_url().'UserNewPassword/'.$check_register['email_code'];
        $data_email['fname'] = SITE_NAME;
        //$data_email['email_code'] = $email_code;
        //$this->email->message("Please click on this link for reset password".$url);
        $str_content = '';
        $str_name = ucwords($data_email['fname']);
        $str_url = '<p><b>Contact Details</b></p>
					<p> Company : ' . $company . '</p>
					<p> Full Name : ' . $name . '</p>
					<p> Email Address : ' . $email . '</p>
					<p> Phone Number : ' . $contact . '</p>						
					<p>Project Details </p>
					<p> Project : ' . $msg . '</p>
					<p> Timeframe : ' . $frame . '</p>
					<p> Budget : ' . $budget . '</p>
					<p> Reference Number : ' . $reference_number . '</p>
					';
        $data_email['str_final'] = $str_url;
        $message = $this->load->view('email/email_template', $data_email, TRUE);
        $this->email->message($message);
        $data['message'] = "Sorry Unable to send email...";
        if ($this->email->send()) {
            $data['message'] = "Mail sent...";
        }
        //User Mail
        $this->load->library('email');
        $config['wordwrap'] = TRUE;
        $config['mailtype'] = 'html';
        $config['charset'] = 'utf-8';
        $config['priority'] = '1';
        $config['crlf'] = "\r\n";
        $config['newline'] = "\r\n";
        $this->email->initialize($config);
        $this->email->from(SITE_EMAIL, SITE_NAME);
        $this->email->to($email);
        $this->email->subject("DESIGN WITH US");
        $data_email['fname'] = $name;
        $str_content = '';
        $str_name = ucwords($data_email['fname']);

        $str_url = '<p>We have received your message and would like to thank you for writing to us. 
        	If your inquiry is urgent, please use the telephone number listed below to talk to one of our staff members. 
        	Otherwise, we will reply by email as soon as possible.</p>';
        $data_email['str_final'] = $str_url;
        $msg = $this->load->view('email/email_template', $data_email, TRUE);
        $this->email->message($msg);
        $data['message'] = "Sorry Unable to send email...";
        if ($this->email->send()) {
            $data['message'] = "Mail sent...";
        }

		$this->session->set_flashdata('alert_message','<p>Thank You for giving us opportunity to service your company for custom design needs. 
			All information received will remain confidential. One of our designer will be in touch as soon as possible. </p>
			<p>For immediate assistance, please call  (662) 267-0702.</p>');
		$this->session->set_flashdata('alert_title','DESIGN WITH US');
		redirect(base_url().'design-with-us');
        
    }

     public function custom_design_submit() {
       
    		//print_ex($_POST);
     		if(!$this->session->userdata('user_id')) {
				redirect(base_url());
	    	}
	    	$user_id=$this->session->userdata('user_id');
     		$item_no=$this->input->post('item_no');
			$product_id=$this->input->post('product_id');
			$product_title=$this->input->post('product_title');
			$metal=$this->input->post('metal');
			$diamond_clarity=$this->input->post('diamond_clarity');
			$size=$this->input->post('size');
			$diamond_weight=$this->input->post('diamond_weight');
			$engraving=$this->input->post('engraving');
			$center_diamond=$this->input->post('center_diamond');
			$reference_number=$this->input->post('reference_number');

       		$company=$this->input->post('company');
			$name=$this->input->post('name');
			$email=$this->input->post('email');
			$contact=$this->input->post('contact');
			$msg=$this->input->post('msg');
			$frame=$this->input->post('frame');
			$budget=$this->input->post('budget');


			$this->form_validation->set_rules('name', 'Name', 'trim|required');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
			$this->form_validation->set_rules('contact', 'Contact', 'trim|required');
						
			
			if($this->form_validation->run() == FALSE)
		    {
		    	$this->session->set_flashdata('alert_message','Please Fill the Form Correctly!');
				redirect(base_url().'custom-design-with-us');
		    }
			

 


			$data=array(
			  'company' => $company,
		      'name' => $name,
		      'email' => $email,		      
		      'contact' => $contact,
		      'msg' => $msg,
		      'frame' => $frame,
		      'budget' => $budget,	
		      'item_no' => $item_no,
		      'product_id' => $product_id,
		      'product_title' => $product_title,		      
		      'metal' => $metal,
		      'diamond_clarity' => $diamond_clarity,
		      'size' => $size,
		      'center_diamond' => $center_diamond,
		      'reference_number' => $reference_number,
		      'diamond_weight' => $diamond_weight,		      
		      'engraving' => $engraving,
		      'create_by' => $user_id,
	      	  'create_date' => date('Y-m-d H:i:s'),
		      'status' => 'Quote',
		      'type' => 'custom',
		      'processing_status' => 1
				);
			$user_id=$this->common_model->insertData('tbl_design',$data);
					


			$this->load->library('email');
            $this->load->library('parser');
            $config['wordwrap'] = TRUE;
            $config['mailtype'] = 'html';
            $config['charset'] = 'utf-8';
            $config['priority'] = '1';
            $config['crlf'] = "\r\n";
            $config['newline'] = "\r\n";
            //$config['smtp_crypto']  = 'tls';
            $this->email->initialize($config);
            $this->email->from(SITE_EMAIL, SITE_NAME);
            $this->email->to(SITE_EMAIL);
            //$this->email->cc("testcc@domainname.com");
            $this->email->subject('Get Customize Quote');
            //$url = base_url().'UserNewPassword/'.$check_register['email_code'];
            $data_email['fname'] = SITE_NAME;
            //$data_email['email_code'] = $email_code;
            //$this->email->message("Please click on this link for reset password".$url);
            $str_content = '';
            $str_name = ucwords($data_email['fname']);
            $str_url = '<p>Project Details </p>
						<br>
						<p> Item No : ' . $item_no . '</p>
						<p> Product Name : ' . $product_title . '</p>
						<p> Size : ' . $size . '</p>
						<p> Metal : ' . $metal . '</p>
						<p> Diamond Clarity : ' . $diamond_clarity . '</p>
						<p> Diamond Weight : ' . $diamond_weight . '</p>
						<p> Engraving : ' . $engraving . '</p>
						<p> Company : ' . $company . '</p>
						<p> Full Name : ' . $name . '</p>
						<p> Email Address : ' . $email . '</p>
						<p> Phone Number : ' . $contact . '</p>	
						<p> Note : ' . $msg . '</p>						
						';
            $data_email['str_final'] = $str_url;
            $message = $this->load->view('email/email_template', $data_email, TRUE);
            $this->email->message($message);
            $data['message'] = "Sorry Unable to send email...";
            if ($this->email->send()) {
                $data['message'] = "Mail sent...";
            }
            //User Mail
            $this->load->library('email');
            $config['wordwrap'] = TRUE;
            $config['mailtype'] = 'html';
            $config['charset'] = 'utf-8';
            $config['priority'] = '1';
            $config['crlf'] = "\r\n";
            $config['newline'] = "\r\n";
            //$config['smtp_crypto']  = 'tls';
            $this->email->initialize($config);
            $this->email->from(SITE_EMAIL, SITE_NAME);
            $this->email->to($email);
            //$this->email->cc("testcc@domainname.com");
            $this->email->subject("Get Customize Quote");
            //$url = base_url().'UserNewPassword/'.$check_register['email_code'];
            $data_email['fname'] = $name;
            $str_content = '';
            $str_name = ucwords($data_email['fname']);
            //$str_url = '<p>Message : '.$message.'</p>';
            $str_url = '<p>We have received your message and would like to thank you for writing to us. If your inquiry is urgent, please use the telephone number listed below to talk to one of our staff members. Otherwise, we will reply by email as soon as possible.</p>';
            $data_email['str_final'] = $str_url;
            //print_pre($data_email);
            $msg = $this->load->view('email/email_template', $data_email, TRUE);
            //echo $msg; die;
            $this->email->message($msg);
            $data['message'] = "Sorry Unable to send email...";
            if ($this->email->send()) {
                $data['message'] = "Mail sent...";
                //die;
                
            }



			$this->session->set_flashdata('alert_message','<p>Thank you for your order query. We will be in touch with customization quote. </p>  <p>For any questions, please call (800)654-4747</p>');

			$this->session->set_flashdata('alert_title','Customization');
			redirect(base_url().'design-success');
        
    }


    public function testimonial_submit() {
       
    		//print_ex($_POST);

       		
			$name=$this->input->post('name');
			$designation=$this->input->post('designation');
			$comment=$this->input->post('comment');
			

			$this->form_validation->set_rules('name', 'Name', 'trim|required');
			$this->form_validation->set_rules('designation', 'Designation', 'trim|required');
			$this->form_validation->set_rules('comment', 'Comment', 'trim|required');
						
			
			if($this->form_validation->run() == FALSE)
		    {
		    	 echo '<div class="alert alert-danger">Please Fill the Form Correctly!..</div>'; 
		    	 exit;
		    	
		    }
			
					if(!empty($_FILES['img_upload']['name'])){

					  $new_name1 = str_replace(".","",microtime());
			          $new_name=str_replace(" ","_",$new_name1);
			          $file_tmp =$_FILES['img_upload']['tmp_name'];
			          $file=$_FILES['img_upload']['name'];
			          $ext=substr(strrchr($file,'.'),1);
			          if($ext=="png" || $ext=="gif" || $ext=="jpg" || $ext=="jpeg" || $ext=="JPG" || $ext=="JPEG" || $ext=="PNG")
			          {          	
			            move_uploaded_file($file_tmp,"./uploads/testimonial/".$new_name.".".$ext);          
			            $category_image=$new_name.".".$ext;
			          }
			      }else{
			          	$category_image = 'default-user.png';
			          }



				
			//echo $group;exit;

			$data=array(			  
		      'name' => $name,
		      'designation' => $designation,		      
		      'comment' => $comment,
		      'image' => $category_image,
		      'create_by' => '2',
	      	  'create_date' => date('Y-m-d H:i:s'),
		      'status' => 'Open',
				);

			//print_ex($data);
			$user_id=$this->common_model->insertData('tbl_testimonial',$data);


			if($user_id)
		    {
		    	 echo '<div class="alert alert-success">Request Has Been Added Successfully!</div>'; 
		    	
		    }else{
		    	echo '<div class="alert alert-danger">Try again..!</div>'; 
		    }
			
        
    }

     public function design_success() {
     	
        $data['title'] = 'Design Success';

        $this->load->view('common/header',$data);
        $this->load->view('design/design_success',$data);
        $this->load->view('common/footer');
    }


}
