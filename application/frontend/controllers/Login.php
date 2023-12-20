<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->helper(array('form', 'url','custom'));
        $this->load->library('email');
        $this->load->library('parser');
    }
    public function index() {
        $data['title'] = 'User | Login';
		
		$where=array('brand_status'=>1);
        $data['brand_list']=$this->common_model->selectWhere('tbl_brand',$where);

        $whereRole=array('status'=>1);
        $data['role_list']=$this->common_model->selectWhere('tbl_role',$whereRole);
		
        $this->load->view('common/header', $data);
        $this->load->view('user/user');
        $this->load->view('common/footer');
    }
    function login_submit() {

        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error_message', 'Please Fill the Form Correctly!');
            redirect($_SERVER['HTTP_REFERER']);
        }
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $data = array('user' => $username, 'pass' => hashcode($password));
        $result = $this->user_model->login_check($data);
        if (count(array_filter($result))) {
            if($result['0']->status=='1')
            {
                $get_cookie=get_cookie('fc_cart_cookie');
                if($get_cookie!="")
                {
                    $cookie_detail=$this->cart_model->check_cart_cookie("",$get_cookie);                    
                    //print_ex($cookie_detail);
                    foreach($cookie_detail as $cookie)
                    {
                        $cart_data=array(
                            'product_id'=>$cookie->product_id,
                            'stock_id'=>$cookie->stock_id,
                            'quantity'=>$cookie->quantity,
                            'product_type'=>$cookie->product_type,
                            'price'=>$cookie->price,
                            'total_price'=>$cookie->total_price,
                            'name'=>$cookie->name,
                            'description'=>$cookie->description,
                            'attributes'=>$cookie->attributes,
                            'info_array'=>$cookie->info_array,
                            'image'=>$cookie->image,
                            'created_at'=>$cookie->created_at,
                            'is_ring_builder'=>$cookie->is_ring_builder,
                            'customer_id'=>$result['0']->customer_id,
                        );
                        $cart_id = $this->common_model->insertData('tbl_cart',$cart_data);
                        if ($cookie->is_ring_builder=='1') 
                        {
                            $cookie_diamond = $this->common_model->selectWhere('tbl_cart_cookie_diamond',array('cart_id' => $cookie->cart_cookie_id));
                            if(!empty($cookie_diamond)){
                                $cart_data=array(
                                    'product_id'=>$cookie_diamond['0']->product_id,
                                    'stock_id'=>$cookie_diamond['0']->stock_id,
                                    'quantity'=>$cookie_diamond['0']->quantity,
                                    'product_type'=>$cookie_diamond['0']->product_type,
                                    'price'=>$cookie_diamond['0']->price,
                                    'total_price'=>$cookie_diamond['0']->total_price,
                                    'name'=>$cookie_diamond['0']->name,
                                    'description'=>$cookie_diamond['0']->description,
                                    'attributes'=>$cookie_diamond['0']->attributes,
                                    'info_array'=>$cookie_diamond['0']->info_array,
                                    'image'=>$cookie_diamond['0']->image,
                                    'created_at'=>$cookie_diamond['0']->created_at,
                                    'customer_id'=>$result['0']->customer_id,
                                    'cart_id'=>$cart_id,
                                );
                                $this->common_model->insertData('tbl_cart_diamond',$cart_data);
                            }
                        }
                    }
                    delete_cookie('fc_cart_cookie');
                    $this->common_model->deleteData('tbl_cart_cookie',array('cookie_id'=>$get_cookie));
                    $this->common_model->deleteData('tbl_cart_cookie_diamond',array('cookie_id'=>$get_cookie));
                }
                $this->session->set_userdata('user_id', $result['0']->customer_id);
                $this->session->set_userdata('user_fullname', $result['0']->firstname.' '.$result['0']->lastname);
                $this->session->set_userdata('user_active', $result['0']->status);
                $this->session->set_userdata('jewelry_menu', $result['0']->jewelry_menu);
                $this->session->set_userdata('user_phone', $result['0']->phone);
                //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
                $this->common_model->userLog($result['0']->customer_id);
                if ($this->input->post('remember')) {
                    $hour = time()+3600*24*30;
                    setcookie('username', $username, $hour);
                    setcookie('password', $password, $hour);
                    $cookie = array('name' => 'username', 'value' => $password, 'expire' => '86500',);
                    $cookie1 = array('name' => 'password', 'value' => $username, 'expire' => '86500',);
                    $this->input->set_cookie($cookie);
                    $this->input->set_cookie($cookie1);
                } else {
                    set_cookie("username",'',time()-3600*24*30);
                    set_cookie("password",'',time()-3600*24*30);
                }
                if($this->input->post('referer')){
                    if(preg_match("/register$/", $this->input->post('referer'))){ 
                      redirect(base_url());
                    }else{
                      redirect($this->input->post('referer'));
                    }
                }
                redirect(base_url());
            }
            else {
                    $this->session->set_flashdata('error_message', 'Please Verify Your Email!');
                redirect($_SERVER['HTTP_REFERER']);
            }
        } else {
            $this->session->set_flashdata('error_message', 'Username or Password is Incorrect!');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
    function login_pop() {
        $message = '';
        $status = '0';
        $this->form_validation->set_rules('username', 'Username', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
           // $message = 'Please Fill the Form Correctly!';
            $errors = validation_errors();
		    $message = $errors;           
            echo json_encode(array('message' => $message, 'status' => $status));
            exit();
        }
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $data = array('user' => $username, 'pass' => hashcode($password));
        $result = $this->user_model->login_check($data);
        if (count(array_filter($result))) 
        {
            if($result['0']->status=='1')
            {
           
                $this->session->set_userdata('user_id', $result['0']->customer_id);
                $this->session->set_userdata('user_fullname', $result['0']->firstname.' '.$result['0']->lastname);
                $this->session->set_userdata('user_active', $result['0']->status);
				$this->session->set_userdata('user_email', $result['0']->email);
                $this->session->set_userdata('user_phone', $result['0']->phone);
                //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
                $this->common_model->userLog($result['0']->customer_id);
                $status = '1';
                $message = 'Successfully login';
            }else{

                $status = '0';
                $message = 'Please Verify Your Email!';

               // $this->session->set_flashdata('error_message', 'Please Verify Your Email!');
               // redirect($_SERVER['HTTP_REFERER']); 
            }
        } else {
            $message = 'Email or Password is Incorrect!';
        }
        echo json_encode(array('message' => $message, 'status' => $status));
    }
    function signup() {
        $data['title'] = '';
		
		$where=array('brand_status'=>1);
        $data['brand_list']=$this->common_model->selectWhere('tbl_brand',$where);

        $whereRole=array('status'=>1);
        $data['role_list']=$this->common_model->selectWhere('tbl_role',$whereRole);
        
        $data['country_list']=$this->common_model->selectAll('countries');
        $data['currency_list']=$this->common_model->selectAll('tbl_currency');
        $this->load->view('common/header', $data);
        $this->load->view('user/register',$data);
        $this->load->view('common/footer');
    }
    function signup_submit() {

       // print_ex($_REQUEST);
	   $userID= '';
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]');
        $this->form_validation->set_rules('password_confirm', 'Password Confirmation', 'trim|required|matches[password]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('phone', 'Phone', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $errors = validation_errors();
           // echo json_encode(['message'=>$errors]);
            $message = $errors;
            $status = 0;
            echo json_encode(array('message' => $message, 'status' => $status));
            exit();
        }
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $password = $this->input->post('password'); 
		$phone = $this->input->post('phone');
		$role_id=$this->input->post('role_id');
        $brand_id=$this->input->post('brand_id');       
        $where = array('email' => $email);
        $result = $this->common_model->selectWhere('tbl_customer',$where);
        //print_ex($result);
       // echo $this->db->last_query(); 
        if (count(array_filter($result))) {
            $message = 'User already exists';
            $status = 0;
            echo json_encode(array('message' => $message, 'status' => $status));
            exit();
        } else {
			$six_digit_random_number = sprintf("%06d", mt_rand(1, 999999));
            $data = array(
                'email' => $email, 
                'firstname' => $name,                 
                'password' => hashcode($password), 
                'date_added' => date('Y-m-d H:i:s'), 
                'status' => 0, 
				'otp_sms' => $six_digit_random_number,
                'email_verify' => hashcode($email),
				'customer_type' => $role_id,
				'brand_id'=>$brand_id,
                'phone'=>$phone
            );
            $user_id = $this->common_model->insertData('tbl_customer', $data);
            if ($user_id) {


                                // Account details
                $apiKey = urlencode('MzkzMzM5NmI0YzcyNDU0MzRiNjI3MjQxNTg2NzQ4NDk=');
                // Message details
                $numbers = urlencode('919977015304');
                $sender = urlencode('TXTLCL');
                $message = rawurlencode('This is your message');
                 
                // Prepare data for POST request
                $data = 'apikey=' . $apiKey . '&numbers=' . $numbers . '&sender=' . $sender . '&message=' . $message;
                // Send the GET request with cURL
                $ch = curl_init('https://api.textlocal.in/send/?' . $data);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $response = curl_exec($ch);
                curl_close($ch);
                // Process your response here
                //echo $response;

                $this->session->set_flashdata('alert_message', 'Thank you for Registering with us! An OTP has been sent to your registered mobile number');
                //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
                $config['wordwrap'] = TRUE;
                $config['mailtype'] = 'html';
                $config['charset'] = 'utf-8';
                $config['priority'] = '1';
                $config['crlf'] = "\r\n";
                $config['newline'] = "\r\n";
                $this->email->initialize($config);
                $this->email->from(SITE_EMAIL, SITE_NAME);
                $this->email->to(SITE_EMAIL);
                $this->email->subject("New User Registered");
                $data_email['message_body'] = '<p>This mail is generated from website. A new user has registered with us.<br>
                        <b>Customer Name: </b>'.$name.' <br>
                        <b>Customer Email: </b>'.$email.' </p>';
                $data_email['product_name'] ='';       
                $data_email['product_image'] ='';
                $data_email['product_detail'] ='';              
                $data_email['detail_link'] ='';        
                $msg = $this->load->view('email/jewelry_details',$data_email, TRUE);
                $this->email->message($msg);
                $this->email->send();                
                //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
                $data=array(
                        'id' => mt_rand(1111,9999), 
                        'token_id' => mt_rand(000,999),
                        'token' => hashcode($email)        
                    );        
                $link=base_url().'verify-email?id='.$data['id'].'&token='.$data['token'].'&token_id='.$data['token_id'];
                $config['wordwrap'] = TRUE;
                $config['mailtype'] = 'html';
                $config['charset'] = 'utf-8';
                $config['priority'] = '1';
                $config['crlf'] = "\r\n";
                $config['newline'] = "\r\n";
                $this->email->initialize($config);
                $this->email->from(SITE_EMAIL, SITE_NAME);
                $this->email->to($email);
                $this->email->subject("Thank you from Edcohort");
                $data_email['message_body'] = '<p>Thank you for creating an online account with Us</p>';
                $data_email['product_name'] ='';       
                $data_email['product_image'] ='';
                $data_email['product_detail'] ='';              
                $data_email['detail_link'] ='<a class="mcnButton " title="Verify Email" href="'.$link.'" 
              style="font-weight: bold;letter-spacing: -0.5px;line-height: 100%;text-align: center;text-decoration: none;color: #FFFFFF;">Verify Email</a>'; 
                $msg = $this->load->view('email/jewelry_details',$data_email, TRUE);
                $this->email->message($msg);
                if ($this->email->send()) {
                    $this->session->set_flashdata('alert_message', 'Thanks For Registration. Please Verify Your Email!');
                }
            }

            $message = 'Thanks For Registration. Please Verify Your Email! and An OTP has been sent to your registered mobile number';
            $status = 1;
			$userID = $user_id;
           echo json_encode(array('message' => $message, 'status' => $status, 'userID' => $userID));
           exit();
        }
    }

    function otp_submit() {

       // print_ex($_REQUEST);
       $userID= '';
        $this->form_validation->set_rules('otp', 'OTP', 'trim|required');
       
        if ($this->form_validation->run() == FALSE) {
            $errors = validation_errors();
           // echo json_encode(['message'=>$errors]);
            $message = $errors;
            $status = 0;
            echo json_encode(array('message' => $message, 'status' => $status));
            exit();
        }
        $otp = $this->input->post('otp');
        $otpuserID = $this->input->post('otpuserID');
             
        $where = array('customer_id' => $otpuserID);
        $result = $this->common_model->selectWhere('tbl_customer',$where);
        //print_ex($result);
       // echo $this->db->last_query(); 
        if (count(array_filter($result))) {
            $tbl_otp = $result[0]->otp_sms;
           
            if($otp == $tbl_otp){

                $data=array(
                'status'=>1,
                'otp_sms' => ''
                );
                $where=array('customer_id'=>$otpuserID);
                $this->common_model->updateData('tbl_customer',$data,$where); 

                $message = 'Mobile Number Successfully Verified! Login With Your Credentials';
                $status = 1;
                echo json_encode(array('message' => $message, 'status' => $status));
                exit();

            }else{
                $message = 'OTP Not Match';
                $status = 0;
               
               echo json_encode(array('message' => $message, 'status' => $status));
               exit();
            }
            
        } else {
           
            $message = 'OTP Not Match';
            $status = 0;
           
           echo json_encode(array('message' => $message, 'status' => $status, 'userID' => $userID));
           exit();
        }
    }
 function verify_email()
    {
        $id=$this->input->get('id');
        $token_id=$this->input->get('token_id');
        $token=$this->input->get('token');
        if($id=='' || $token=='' || $token_id=='')
        {
            $message = 'Sorry! Invalid Token';
            $this->session->set_flashdata('error_message',$message);
            redirect(base_url('login'),'refresh'); 
        }           
        $where = array(
            'email_verify' => $token,
            'status' => '0'
        );
        $result = $this->common_model->selectWhere('tbl_customer',$where);  
        if(count(array_filter($result))) 
        {            
            $data=array(
                'status'=>1,
                'email_verify' => ''
            );
            $where=array('customer_id'=>$result['0']->customer_id);
            $this->common_model->updateData('tbl_customer',$data,$where);                
            //++++++++++++++++++++++++++++++++++++++++++++++++++++++++
            $message = 'Email Successfully Verified! Login With Your Credentials';
            $this->session->set_flashdata('alert_message',$message);
            redirect(base_url('login'),'refresh');               
        }  
        else
        {
             $message = 'Sorry! Invalid Token';
             $this->session->set_flashdata('error_message',$message);
             redirect(base_url('login'),'refresh'); 
        }         
    }
    function logout() {
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('group_id');
        $this->session->unset_userdata('user_fullname');
        $this->session->unset_userdata('user_active');
        $this->session->unset_userdata('jewelry_menu');
		$this->session->unset_userdata('user_email');
        $this->session->unset_userdata('user_phone');
        //$this->session->unset_userdata('vd_user_email');
        //Remove cookies
        //set_cookie("username", "", time() - 3600 * 24 * 30);
        //set_cookie("password", "", time() - 3600 * 24 * 30);
        redirect(base_url());
    }
    function resetPassword() 
    {
        $config['page_head'] = 'Forgot Password';
        if ($this->input->post('forgetemail') != "") {
            $email = $this->input->post('forgetemail'); 

            $rs = $this->common_model->get_entry_by_data('tbl_customer', true, array('email' => $email));
            if ($rs) {
                $email_link = $this->ci_enc($email);
                $config['wordwrap'] = TRUE;
                $config['mailtype'] = 'html';
                $config['charset'] = 'utf-8';
                $config['priority'] = '1';
                $config['crlf'] = "\r\n";
                $config['newline'] = "\r\n";
                $this->email->initialize($config);
                $this->email->from(SITE_EMAIL, SITE_NAME);
                $this->email->to($email);
                $this->email->subject("Password Reset");
                $data_email['message_body'] = '<p>This is system generated email.</p><p>Please click on this link to reset password.</p>';
                $data_email['product_name'] ='';       
                $data_email['product_image'] ='';
                $data_email['product_detail'] ='';              
                $data_email['detail_link'] ='<a class="mcnButton " title="Verify Email" href="'.base_url().'UserNewPassword/'.$email_link.'" 
              style="font-weight: bold;letter-spacing: -0.5px;line-height: 100%;text-align: center;text-decoration: none;color: #FFFFFF;">Click Here</a>';         
                $msg = $this->load->view('email/jewelry_details',$data_email, TRUE);

                $this->email->message($msg);
                $data['message'] = "Sorry Unable to send email...";
                if ($this->email->send()) {
                    $data['message'] = "Mail sent...";
                }
                $this->session->set_flashdata('alert_message', "Please check your email for password reset.");
                redirect('forgot-password');
            } else {
                $this->session->set_flashdata('error_message', "Invalid email id please check again.");
                redirect('forgot-password');
            }
        } else {
            $this->load->view('common/header');
            $this->load->view('user/forget', $config);
            $this->load->view('common/footer');
        }
    }
    // set new password
    public function new_password($id) {
        $email = $this->ci_dec($id);
        $config['page_head'] = 'Set New Password';
        $data['records'] = $this->common_model->get_entry_by_data('tbl_customer', true, array('email' => $email));
        //print_r($data['records']);
        if (!empty($data['records'])) {
            //echo "tarun";
            $this->form_validation->set_rules('newpassword', 'New Password', 'trim|required');
            $this->form_validation->set_rules('conpassword', 'Confirm Password', 'trim|required|matches[newpassword]');
            if ($this->form_validation->run() == TRUE) {
                $up_array = array('password' => hashcode($this->input->post('conpassword')),);
                $this->common_model->updateData('tbl_customer', $up_array, array('email' => $email));
                $this->session->set_flashdata('alert_message', 'Password has been updated successfully.');
                redirect(base_url('login'));
            } else {
                $errors = validation_errors();           
                $this->session->set_flashdata('error_message', $errors);
                $this->load->view('common/header');
                $this->load->view('user/new_password', $config);
                $this->load->view('common/footer');                
            }
        } else {
            $this->session->set_flashdata('error_message', 'Please Fill Required Form!');
            $this->load->view('common/header');
            $this->load->view('user/new_password', $config);
            $this->load->view('common/footer');
        }
    }
    // for check user login
    private function check_user_login() {
        $user_login = $this->session->userdata('user_id');
        if ($user_login) {
            return true;
        } else {
            redirect(base_url());
        }
    }
    function subscribe_submit() {
        $data = $this->input->post('user_subs_email');
        if (!empty($data)) {
            $where = array('email' => $data);
            $result = $this->common_model->selectWhere('tbl_subscribe', $where);
            // print_ex($result);
            if (count(array_filter($result))) {
                echo '<div class="alert alert-outline alert-outline-danger">
                                <button type="button" class="close" data-bs-dismiss="alert" aria-hidden="true">×</button>
                               You have already subscribed. </div>';
            } else {
                $data = array('email' => $data, 'date_added' => date('Y-m-d H:i:s'),);
                $user_id = $this->common_model->insertData('tbl_subscribe', $data);
                echo '<div class="alert alert-outline alert-outline-success">
                                <button type="button" class="close" data-bs-dismiss="alert" aria-hidden="true">×</button>
                               Thank you, you have successfully subscribed. </div>';
            }
        } else {
            echo '<div class="alert alert-outline alert-outline-danger">
                               <button type="button" class="close" data-bs-dismiss="alert" aria-hidden="true">×</button>
                               Please Use proper Email Format. </div>';
        }
    }
    function contact_submit() {
        //print_ex($this->input->post());
         $secret='6LeJ4ugdAAAAANvQ_ZEHHm8zM-UjgC1L3mBkl8AG';
        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$this->input->post('g-recaptcha-response'));
        $responseData = json_decode($verifyResponse);
       // if($responseData->success)
        {

        $this->form_validation->set_rules('fullname', 'Name', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('mobile', 'Mobile', 'trim|required');
        $this->form_validation->set_rules('message', 'Message', 'trim|required|min_length[5]|max_length[500]');

        if ($this->form_validation->run() == FALSE) {
            $errors = validation_errors();  
            $this->session->set_flashdata('error_message', $errors); 
            redirect($_SERVER['HTTP_REFERER']);       
           
        }

        $name = $this->input->post('fullname');
        $email = $this->input->post('email');
        $mobile = $this->input->post('mobile');
        $message = $this->input->post('message');
        if (!empty($email)) {
            $data = array(
                'name' => $name, 
                'email' => $email, 
                'mobile' => $mobile, 
                'message' => $message
            );
            $user_id = $this->common_model->insertData('tbl_contactus', $data);            
            //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++  
            $config['wordwrap'] = TRUE;
            $config['mailtype'] = 'html';
            $config['charset'] = 'utf-8';
            $config['priority'] = '1';
            $config['crlf'] = "\r\n";
            $config['newline'] = "\r\n";
            $this->email->initialize($config);
            $this->email->from(SITE_EMAIL, SITE_NAME);
            $this->email->to(SITE_EMAIL);
            $this->email->subject('Contact Enquiry');          
            $data_email['message_body'] = '<p>This is system generated email.<br>
                There is a contact enquiry with following details,<br>           
                <b> Name : </b>' . $name . '</br>
                <b> Email : </b>' . $email . '</br>
                <b> Phone : </b>' . $mobile . '</br>
                <b> Comment </b>: ' . $message . '</p>';
            $data_email['product_name'] ='';       
            $data_email['product_image'] ='';
            $data_email['product_detail'] ='';              
            $data_email['detail_link'] ='';
            $msg = $this->load->view('email/jewelry_details',$data_email, TRUE);
            $this->email->message($msg);
            $data['message'] = "Sorry Unable to send email...";
            if ($this->email->send()) {
                $data['message'] = "Mail sent...";
            }
            //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++   
            $config['wordwrap'] = TRUE;
            $config['mailtype'] = 'html';
            $config['charset'] = 'utf-8';
            $config['priority'] = '1';
            $config['crlf'] = "\r\n";
            $config['newline'] = "\r\n";
            $this->email->initialize($config);
            $this->email->from(SITE_EMAIL, SITE_NAME);
            $this->email->to($email);
            $this->email->subject("Contact Enquiry");    
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
            if ($this->email->send()) {
                $data['message'] = "Mail sent...";
            }
            $this->session->set_flashdata('alert_message',"Thank you for contacting us. We will contact you very soon!");
        } else {
            $this->session->set_flashdata('error_message',"Please fill in required fields!");
        }
         redirect(base_url().'contact-us');
          }
        // else
        // {
        //     $this->session->set_flashdata('error_message', 'Please Fill CAPTCHA.');
        //     redirect($_SERVER['HTTP_REFERER']);
        // }
    }
     function partner_submit() {
        //print_ex($this->input->post());
         $secret='6LeJ4ugdAAAAANvQ_ZEHHm8zM-UjgC1L3mBkl8AG';
        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$this->input->post('g-recaptcha-response'));
        $responseData = json_decode($verifyResponse);
       // if($responseData->success)
        {

        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('mobile', 'Mobile', 'trim|required');
        $this->form_validation->set_rules('institution', 'institution', 'trim|required');
        $this->form_validation->set_rules('designation', 'designation', 'trim|required');
        

        if ($this->form_validation->run() == FALSE) {
            $errors = validation_errors();  
            $this->session->set_flashdata('error_message', $errors); 
            redirect($_SERVER['HTTP_REFERER']);       
           
        }

        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $mobile = $this->input->post('mobile');
        $institution = $this->input->post('institution');
        $designation = $this->input->post('designation');
        if (!empty($email)) {
            $data = array(
                'name' => $name, 
                'email' => $email, 
                'mobile' => $mobile, 
                'designation' => $designation,
                'institution'=>$institution
            );
            $user_id = $this->common_model->insertData('tbl_partner', $data);            
            //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++  
            $config['wordwrap'] = TRUE;
            $config['mailtype'] = 'html';
            $config['charset'] = 'utf-8';
            $config['priority'] = '1';
            $config['crlf'] = "\r\n";
            $config['newline'] = "\r\n";
            $this->email->initialize($config);
            $this->email->from(SITE_EMAIL, SITE_NAME);
            $this->email->to(SITE_EMAIL);
            $this->email->subject('Partner Enquiry');          
            $data_email['message_body'] = '<p>This is system generated email.<br>
                There is a contact enquiry with following details,<br>           
                <b> Name : </b>' . $name . '</br>
                <b> Email : </b>' . $email . '</br>
                <b> Phone : </b>' . $mobile . '</br>
                <b> Institution : </b>' . $institution . '</br>
                <b> Designation </b>: ' . $designation . '</p>';
            $data_email['product_name'] ='';       
            $data_email['product_image'] ='';
            $data_email['product_detail'] ='';              
            $data_email['detail_link'] ='';
            $msg = $this->load->view('email/jewelry_details',$data_email, TRUE);
            $this->email->message($msg);
            $data['message'] = "Sorry Unable to send email...";
            if ($this->email->send()) {
                $data['message'] = "Mail sent...";
            }
            //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++   
            $config['wordwrap'] = TRUE;
            $config['mailtype'] = 'html';
            $config['charset'] = 'utf-8';
            $config['priority'] = '1';
            $config['crlf'] = "\r\n";
            $config['newline'] = "\r\n";
            $this->email->initialize($config);
            $this->email->from(SITE_EMAIL, SITE_NAME);
            $this->email->to($email);
            $this->email->subject("Partner Enquiry");    
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
            if ($this->email->send()) {
                $data['message'] = "Mail sent...";
            }
            $this->session->set_flashdata('alert_message',"Thank you for Partner with us. We will contact you very soon!");
        } else {
            $this->session->set_flashdata('error_message',"Please fill in required fields!");
        }
         redirect(base_url().'partner-us');
          }
        // else
        // {
        //     $this->session->set_flashdata('error_message', 'Please Fill CAPTCHA.');
        //     redirect($_SERVER['HTTP_REFERER']);
        // }
    }
     function counseller_submit() {
        //print_ex($this->input->post());
         $secret='6LeJ4ugdAAAAANvQ_ZEHHm8zM-UjgC1L3mBkl8AG';
        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$this->input->post('g-recaptcha-response'));
        $responseData = json_decode($verifyResponse);
       // if($responseData->success)
        {

        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('mobile', 'Mobile', 'trim|required');
        $this->form_validation->set_rules('experience', 'experience', 'trim|required');
        $this->form_validation->set_rules('organisation', 'organisation', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $errors = validation_errors();  
            $this->session->set_flashdata('error_message', $errors); 
            redirect($_SERVER['HTTP_REFERER']);       
           
        }

        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $mobile = $this->input->post('mobile');
        $organisation = $this->input->post('organisation');
        $experience = $this->input->post('experience');
        if (!empty($email)) {
            $data = array(
                'name' => $name, 
                'email' => $email, 
                'mobile' => $mobile, 
                'experience' => $experience,
                'organisation'=>$organisation
            );
            $user_id = $this->common_model->insertData('tbl_counseller', $data);            
            //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++  
            $config['wordwrap'] = TRUE;
            $config['mailtype'] = 'html';
            $config['charset'] = 'utf-8';
            $config['priority'] = '1';
            $config['crlf'] = "\r\n";
            $config['newline'] = "\r\n";
            $this->email->initialize($config);
            $this->email->from(SITE_EMAIL, SITE_NAME);
            $this->email->to(SITE_EMAIL);
            $this->email->subject('Counseller Enquiry');          
            $data_email['message_body'] = '<p>This is system generated email.<br>
                There is a contact enquiry with following details,<br>           
                <b> Name : </b>' . $name . '</br>
                <b> Email : </b>' . $email . '</br>
                <b> Phone : </b>' . $mobile . '</br>
                <b> Experience : </b>' . $experience . '</br>
                <b> Organisation </b>: ' . $organisation . '</p>';
            $data_email['product_name'] ='';       
            $data_email['product_image'] ='';
            $data_email['product_detail'] ='';              
            $data_email['detail_link'] ='';
            $msg = $this->load->view('email/jewelry_details',$data_email, TRUE);
            $this->email->message($msg);
            $data['message'] = "Sorry Unable to send email...";
            if ($this->email->send()) {
                $data['message'] = "Mail sent...";
            }
            //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++   
            $config['wordwrap'] = TRUE;
            $config['mailtype'] = 'html';
            $config['charset'] = 'utf-8';
            $config['priority'] = '1';
            $config['crlf'] = "\r\n";
            $config['newline'] = "\r\n";
            $this->email->initialize($config);
            $this->email->from(SITE_EMAIL, SITE_NAME);
            $this->email->to($email);
            $this->email->subject("Counseller Enquiry");    
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
            if ($this->email->send()) {
                $data['message'] = "Mail sent...";
            }
            $this->session->set_flashdata('alert_message',"Thank you for counslling with us. We will contact you very soon!");
        } else {
            $this->session->set_flashdata('error_message',"Please fill in required fields!");
        }
         redirect(base_url().'partner-us');
          }
        // else
        // {
        //     $this->session->set_flashdata('error_message', 'Please Fill CAPTCHA.');
        //     redirect($_SERVER['HTTP_REFERER']);
        // }
    }
    //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    function facebook_login() {
        require_once APPPATH . 'third_party/Facebook/autoload.php';
        $redirectUrl = base_url() . 'facebooklogin/';
        $fbPermissions = 'email';
        $app_id = fbAppId;
        $fb = new Facebook\Facebook(['app_id' => fbAppId, 'app_secret' => fbAppSecret, 'default_graph_version' => 'v2.2', ]);
        $helper = $fb->getRedirectLoginHelper();
        try {
            $accessToken = $helper->getAccessToken();
        }
        catch(Facebook\Exceptions\FacebookResponseException $e) {
            echo 'Graph returned an error: ' . $e->getMessage();
            redirect(base_url());
        }
        catch(Facebook\Exceptions\FacebookSDKException $e) {
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            redirect(base_url());
        }
        if (!isset($accessToken)) {
            redirect(base_url());
        }
        // Logged in
        $oAuth2Client = $fb->getOAuth2Client();
        $tokenMetadata = $oAuth2Client->debugToken($accessToken);
        $tokenMetadata->validateAppId($app_id);
        $tokenMetadata->validateExpiration();
        if (!$accessToken->isLongLived()) {
            try {
                $accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
            }
            catch(Facebook\Exceptions\FacebookSDKException $e) {
                echo "<p>Error getting long-lived access token: " . $helper->getMessage() . "</p>\n\n";
                redirect(base_url('login'));
            }
        }
        $_SESSION['fb_access_token'] = (string)$accessToken;
        try {
            $response = $fb->get('/me?fields=id,first_name,last_name,email,gender,locale,picture', (string)$accessToken);
        }
        catch(Facebook\Exceptions\FacebookResponseException $e) {
            echo 'Graph returned an error: ' . $e->getMessage();
            redirect(base_url('login'));
        }
        catch(Facebook\Exceptions\FacebookSDKException $e) {
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            redirect(base_url());
        }
        $user = $response->getGraphUser();
        //print_ex($user);
        $userData['oauth_provider'] = 'facebook';
        $userData['oauth_uid'] = $user['id'];
        $userData['first_name'] = $user['first_name'];
        $userData['last_name'] = $user['last_name'];
        $userData['email'] = $user['email'];
        $userData['gender'] = $user['gender'];
        $password = 'edcohort@123';
        $result = $this->user_model->social_login($user['email']);
        if (count(array_filter($result))) {
            if ($result['0']->auth_provider == 'facebook') {
                $this->session->set_userdata('user_id', $result['0']->customer_id);
                $this->session->set_userdata('group_id', $result['0']->customer_group_id);
                $this->session->set_userdata('user_fullname', $result['0']->firstname.' '.$result['0']->lastname);
                $this->session->set_userdata('user_active', $result['0']->status);
                $this->session->set_userdata('user_email', $result['0']->email);
                $this->session->set_userdata('user_phone', $result['0']->phone);
                //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
                $this->common_model->userLog($result['0']->customer_id);
                redirect(base_url());
            } else {
                $this->session->set_flashdata('alert_message', 'Email Already Exist!');
                redirect(base_url('login'));
            }
        } else {
            
             $data = array('email' => $user['email'], 'firstname' => $user['first_name']. ' ' . $user['last_name'], 'password' => hashcode($password), 'org_password' => $password, 'date_added' => date('Y-m-d H:i:s'), 'status' => 1, 'email_verify' => '', 'auth_provider' => 'facebook',);
            $user_id = $this->common_model->insertData('tbl_customer', $data);
            if ($user_id) {
              
                $this->session->set_userdata('user_id', $user_id);
                $this->session->set_userdata('user_fullname', $user['first_name'] . ' ' . $user['last_name']);
                $this->session->set_userdata('user_active', 1);
                $this->session->set_userdata('user_email', $user['email']);

                //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
                $this->common_model->userLog($user_id);
                //$this->session->set_flashdata('alert_message','Thank you for Registering with us!');
            }
            redirect(base_url());
        }
        redirect(base_url());
    }
    function google_login() {
        include_once APPPATH . 'third_party/google-api-php-client-2/vendor/autoload.php';
        $clientId = GoogleClientId;
        $clientSecret = GoogleClientSecret;
        $redirectUrl = base_url() . 'google-login';
        $gClient = new Google_Client();
        $gClient->setApplicationName('Login to Edcohort');
        $gClient->setClientId($clientId);
        $gClient->setClientSecret($clientSecret);
        $gClient->setRedirectUri($redirectUrl);
        $gClient->setScopes(array("https://www.googleapis.com/auth/plus.login", "https://www.googleapis.com/auth/userinfo.email", "https://www.googleapis.com/auth/userinfo.profile", "https://www.googleapis.com/auth/plus.me"));
        $google_oauthV2 = new Google_Service_Oauth2($gClient);
        $code = $this->input->get('code');
        if ($code != "") {
            $auth = $gClient->authenticate($code);
            $token = $gClient->getAccessToken();
            $this->session->set_userdata('token', $token);
        }
        if ($this->session->userdata('token') != "") {
            $gClient->setAccessToken($this->session->userdata('token'));
        }
        $user = $google_oauthV2->userinfo_v2_me->get();
        //print_ex($user);
        $password = 'edcohort@123';
        $result = $this->user_model->social_login($user['email']);
		//print_ex($result);
        if (count(array_filter($result))) {
			//die('if');
            if ($result['0']->auth_provider == 'google') {
                $this->session->set_userdata('user_id', $result['0']->customer_id);
                $this->session->set_userdata('group_id', $result['0']->customer_group_id);
                $this->session->set_userdata('user_fullname', $result['0']->firstname.' '.$result['0']->lastname);
                $this->session->set_userdata('user_active', $result['0']->status);
                $this->session->set_userdata('user_email', $result['0']->email);
                $this->session->set_userdata('user_phone', $result['0']->phone);
                //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
                $this->common_model->userLog($result['0']->customer_id);
				//print_ex($_session);
                redirect(base_url());
            } else {
				
				$this->session->set_userdata('user_id', $result['0']->customer_id);
                $this->session->set_userdata('group_id', $result['0']->customer_group_id);
                $this->session->set_userdata('user_fullname', $result['0']->firstname.' '.$result['0']->lastname);
                $this->session->set_userdata('user_active', $result['0']->status);
                $this->session->set_userdata('user_email', $result['0']->email);
                $this->session->set_userdata('user_phone', $result['0']->phone);
				
                //$this->session->set_flashdata('alert_message', 'Email Already Exist!');
                redirect(base_url());
            }
        } else {
			//die('else');
            $data = array('email' => $user['email'], 'firstname' => $user['name'], 'password' => hashcode($password), 'org_password' => $password, 'date_added' => date('Y-m-d H:i:s'), 'status' => 1, 'email_verify' => '', 'auth_provider' => 'google',);
            $user_id = $this->common_model->insertData('tbl_customer', $data);

                $this->session->set_userdata('user_id', $user_id);
                $this->session->set_userdata('user_fullname', $user['name']);
                $this->session->set_userdata('user_active', 1);
                $this->session->set_userdata('user_email', $user['email']);
                
           
            redirect(base_url());
        }
        redirect(base_url());
    }
function ci_enc($str){
   $new_str = strtr(base64_encode(addslashes(@gzcompress(serialize($str), 9))), '+/=', '-_.');
   return $new_str;  
}
function ci_dec($str){
   $new_str = unserialize(@gzuncompress(stripslashes(base64_decode(strtr($str, '-_.', '+/=')))));
   return $new_str;
}
    public function contact() {
        $config['title'] = 'Contact Us';
        $config['page_head'] = 'Contact Us';
        $this->load->view('common/header.php', $config);
        $this->load->view('common/contact');
        $this->load->view('common/footer');
    }
    //About us page
    public function about() {
        $config['title'] = 'About Us';
        $this->load->view('common/header.php', $config);
        $this->load->view('common/about');
        $this->load->view('common/footer');
    }
}
