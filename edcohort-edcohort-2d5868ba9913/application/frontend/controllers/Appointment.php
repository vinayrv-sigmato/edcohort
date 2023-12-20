<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class appointment extends CI_Controller
{    
    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->helper(array('form', 'url'));  
        $this->load->library('email');
   		$this->load->library('parser');
    }     	
    function appointment_submit()
    {        
        $firstname = $this->input->post('firstname');        
        $lastname = $this->input->post('lastname');
        $email = $this->input->post('email');
        $phone = $this->input->post('phone');
        $time = $this->input->post('time');        
        $date = $this->input->post('date');
        $comment = $this->input->post('comment');
        
		$newDate = date("Y-m-d", strtotime($date));
        //echo $newDate; die;        
        if(!empty($email))
        {          
            $data = array(
                'first_name'=>$firstname,
                'last_name'=>$lastname,
                'email'=>$email,
                'phone'=>$phone,
                'time'=>$time,
                'date'=>$newDate,
                'comment'=>$comment,                    
                'created_by'=>0,
				'created_at'=>date('Y-m-d H:i:s'),                    
            );
            $user_id=$this->common_model->insertData('tbl_appointment',$data);	
            //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
            $config['wordwrap'] = TRUE;
			$config['mailtype'] = 'html';			
			$config['charset'] = 'utf-8';
			$config['priority'] = '1';			
			$config['crlf']      = "\r\n";			
			$config['newline']      = "\r\n";		
			$this->email->initialize($config);			
			$this->email->from(SITE_EMAIL,SITE_NAME);			
			$this->email->to(SITE_EMAIL);
			$this->email->subject('Appointment Request');
            $data_email['message_body'] = '<p>This is system generated email.<br>
                There is an Appointment request for you with following details,<br>           
                <b> Name : </b>' .$firstname.' '.$lastname.'<br>
                <b> Email : </b>' . $email . '<br>
                <b> Phone : </b>' . $phone . '<br>
                <b> Date : </b>' .$date.'<br>
				<b> Time : </b>' .$time.'<br>
                <b> Comment </b>: ' . $comment . '</p>';
            $data_email['product_name'] ='';       
            $data_email['product_image'] ='';
            $data_email['product_detail'] ='';              
            $data_email['detail_link'] ='';
            $msg = $this->load->view('email/jewelry_details',$data_email, TRUE);
			$this->email->message($msg);
			$data['message'] = "Sorry Unable to send email..."; 
			if($this->email->send()){     
				$data['message'] = "Mail sent..."; 
			}                
            //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++   
            $config['wordwrap'] = TRUE;
			$config['mailtype'] = 'html';			
			$config['charset'] = 'utf-8';
			$config['priority'] = '1';			
			$config['crlf']      = "\r\n";			
			$config['newline']      = "\r\n";			
			$this->email->initialize($config);			
			$this->email->from(SITE_EMAIL,SITE_NAME);			
			$this->email->to($email);
			$this->email->subject("Appointment Request");   
            $data_email['message_body'] = '<p>This is system generated email.<br>
                We have received your message and would like to thank you for writing to us. <br>
                If your enquiry is urgent, please use the telephone number listed below to <br>
                talk to one of our staff members. <br>
                Otherwise, we will reply by email as soon as possible.</p>';
            $data_email['product_name'] ='';       
            $data_email['product_image'] ='';
            $data_email['product_detail'] ='';              
            $data_email['detail_link'] ='';
            $msg = $this->load->view('email/jewelry_details',$data_email, TRUE);
			$this->email->message($msg);
			$data['message'] = "Sorry Unable to send email..."; 
			if($this->email->send()){     
				$data['message'] = "Mail sent...";
			}	
	        $this->session->set_flashdata('alert_message','Thank you for contacting us. We will contact you very soon!');
	        redirect(base_url('appointment'));            
        }
    	else {
            $this->session->set_flashdata('error_message','Please fill in required fields!');
            redirect(base_url('appointment'));
        }
    }

	function appointment_form()
    {        
        $firstname = $this->input->post('firstname');        
        $lastname = $this->input->post('lastname');
        $email = $this->input->post('email');
        $phone = $this->input->post('phone');
        $time = $this->input->post('time');        
        $date = $this->input->post('date');
        $comment = $this->input->post('comment');        
        $newDate = date("Y-m-d", strtotime($date));        
        if(!empty($email))
        { 
            $data = array(
                'first_name'=>$firstname,
                'last_name'=>$lastname,
                'email'=>$email,
                'phone'=>$phone,
                'time'=>$time,
                'date'=>$newDate,
                'comment'=>$comment,                    
                'created_by'=>0,
				'created_at'=>date('Y-m-d H:i:s'),                    
            );
            $user_id=$this->common_model->insertData('tbl_appointment',$data);		
            //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
            $config['wordwrap'] = TRUE;
			$config['mailtype'] = 'html';			
			$config['charset'] = 'utf-8';
			$config['priority'] = '1';			
			$config['crlf']      = "\r\n";			
			$config['newline']      = "\r\n";		
			$this->email->initialize($config);			
			$this->email->from(SITE_EMAIL,SITE_NAME);			
			$this->email->to(SITE_EMAIL);
			$this->email->subject('Appointment Request');
            $data_email['message_body'] = '<p>This is system generated email.<br>
                There is an Appointment request for you with following details,<br>           
                <b> Name : </b>' .$firstname.' '.$lastname.'<br>
                <b> Email : </b>' . $email . '<br>
                <b> Phone : </b>' . $phone . '<br>
                <b> Date : </b>' .$date.'<br>
				<b> Time : </b>' .$time.'<br>
                <b> Comment </b>: ' . $comment . '</p>';
            $data_email['product_name'] ='';       
            $data_email['product_image'] ='';
            $data_email['product_detail'] ='';              
            $data_email['detail_link'] ='';
            $msg = $this->load->view('email/jewelry_details',$data_email, TRUE);
			$this->email->message($msg);
			$data['message'] = "Sorry Unable to send email..."; 
			if($this->email->send()){     
				$data['message'] = "Mail sent..."; 
			}                
            //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++   
            $config['wordwrap'] = TRUE;
			$config['mailtype'] = 'html';			
			$config['charset'] = 'utf-8';
			$config['priority'] = '1';			
			$config['crlf']      = "\r\n";			
			$config['newline']      = "\r\n";			
			$this->email->initialize($config);			
			$this->email->from(SITE_EMAIL,SITE_NAME);			
			$this->email->to($email);
			$this->email->subject("Appointment Request");   
            $data_email['message_body'] = '<p>This is system generated email.<br>
                We have received your message and would like to thank you for writing to us. <br>
                If your enquiry is urgent, please use the telephone number listed below to <br>
                talk to one of our staff members. <br>
                Otherwise, we will reply by email as soon as possible.</p>';
            $data_email['product_name'] ='';       
            $data_email['product_image'] ='';
            $data_email['product_detail'] ='';              
            $data_email['detail_link'] ='';
            $msg = $this->load->view('email/jewelry_details',$data_email, TRUE);
			$this->email->message($msg);
			$data['message'] = "Sorry Unable to send email..."; 
			if($this->email->send()){     
				$data['message'] = "Mail sent...";
			} 
	        $this->session->set_flashdata('alert_message','Thank you for contacting us. We will contact you very soon!');
	        redirect($_SERVER['HTTP_REFERER']);            
        }
    	else {
            $this->session->set_flashdata('error_message','Please fill in required fields!');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }


}