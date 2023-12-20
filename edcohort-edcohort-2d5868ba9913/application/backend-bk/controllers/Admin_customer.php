<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class admin_customer extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        if($this->session->userdata('jw_admin_id')=="") {
            redirect(base_url());
        }
        $this->load->model('customer_model');
        $this->load->model('vendor_model');
        $this->load->library('excel');
        $this->load->library('pagination');      
        $this->load->library('upload');
    }
    function index()
    {
        $data['active'] = "customer";
		$where ='customer_id > 0';
		$order_by=' ORDER BY customer_id DESC';		
		$data['records']=$this->customer_model->customer_list($where,$order_by);

        //print_ex($data['records']);
        $this->load->view('common/header');
        $this->load->view('common/sidebar', $data);
        $this->load->view('customer/buyer_view');
        $this->load->view('common/footer');
    }
    function loadData()
    {
        $user_id=$this->session->userdata('jw_admin_id'); 

        if($user_id != 1){
            $wheres = ' and sales_person_id ='.$user_id.'';  
        }else{
            $wheres = '';   
        }

        $page=$this->input->get('page');
        $per_page=$this->input->get('per_page');
        $filter_name=$this->input->get('filter_name');
        $filter_email=$this->input->get('filter_email');
        $filter_phone=$this->input->get('filter_phone');
        $filter_status=$this->input->get('filter_status');
        $where ='customer_id > 0'.$wheres;       
        if($filter_name!="") {
            $where .=' AND firstname = "'.$filter_name.'"';
        }
        if($filter_email!="") {
            $where .=' AND email = "'.$filter_email.'"';
        }
        if($filter_phone!="") {
            $where .=' AND phone = "'.$filter_phone.'"';
        }
        if($filter_status!="") {
            $where .=' AND status = "'.$filter_status.'"';
        }
        $order_by=' ORDER BY customer_id ';
        //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
        $customer_total=$this->customer_model->customerTotal($where,$order_by);
        $data['customer_count'] =$customer_total['0']->customer_count;         
        $per_page= ($per_page) ? $per_page : 100 ;
        $config['base_url'] = base_url().'admin_customer/loadData';
        $config["total_rows"] = $data['customer_count'];
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
        $records=$this->customer_model->customer_list($per_page,$page,$where,$order_by);  
       // print_ex($records);      
        echo json_encode(array('records'=>$records,'page_link'=>$page_link,'total_records'=>$data['customer_count']));      
    }
    function add_customer()
    {
       // $data['customer_list']=$this->admin_model->selectAll('tbl_vendor_group');
        $where=array('brand_status'=>1);
        $data['brand_list']=$this->admin_model->selectAll('tbl_brand',$where);

        $whereRole=array('status'=>1);
        $data['role_list']=$this->admin_model->selectAll('tbl_role',$whereRole);
        

       // print_ex($data);
        $data['active_sidebar']='vendor_add';
        $this->load->view('common/header');
        $this->load->view('common/sidebar',$data);
        $this->load->view('customer/buyer_add_view',$data);
        $this->load->view('common/footer');
    }
    function add_customer_submit()
    {
            $jw_admin_id=$this->session->userdata('jw_admin_id');
            $name=$this->input->post('name');
            $email=$this->input->post('email');
            $phone=$this->input->post('phone');
            $status=$this->input->post('status');
            $password=$this->input->post('password');
            $role_id=$this->input->post('role_id');
            $brand_id=$this->input->post('brand_id');
           
            $where = array('email' => $email);
        $result = $this->admin_model->selectWhere('tbl_customer',$where);
        //print_ex($result);
        if (count(array_filter($result))) {
            $this->session->set_flashdata('error_message', 'User Exist!');
           // redirect(base_url('register'));
            redirect(base_url().'admin_customer');
        } else {
            $data = array(
                'email' => $email, 
                'firstname' => $name,
                'phone' => $phone,
                'customer_type' => $role_id,
                'password' => getHash($password), 
                'org_password' => $password,
                'date_added' => date('Y-m-d H:i:s'),
                'brand_id'=>$brand_id, 
                'status' => 1, 
                //'email_verify' => hashcode($email)
            );
           // print_ex($data);
            $user_id = $this->admin_model->insertData('tbl_customer', $data);
            if ($user_id) {
                $this->session->set_flashdata('success', 'Thank you for Registering with us!');
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
                $msg = $this->load->view('email/email_template',$data_email, TRUE);
                $this->email->message($msg);
                $this->email->send();                
                //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
                $data=array(
                        'id' => mt_rand(1111,9999), 
                        'token_id' => mt_rand(000,999),
                        'token' => getHash($email)        
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
                $data_email['message_body'] = '<p>Thank you for creating an online account with Edcohort</p>';
                $data_email['product_name'] ='';       
                $data_email['product_image'] ='';
                $data_email['product_detail'] ='';              
                $data_email['detail_link'] ='<a class="mcnButton " title="Verify Email" href="'.$link.'" 
              style="font-weight: bold;letter-spacing: -0.5px;line-height: 100%;text-align: center;text-decoration: none;color: #FFFFFF;">Verify Email</a>'; 
                $msg = $this->load->view('email/email_template',$data_email, TRUE);
                $this->email->message($msg);
                if ($this->email->send()) {
                    $this->session->set_flashdata('alert_message', 'Thanks For Registration. Please Verify Your Email!');
                }
            }
           // redirect(base_url('register'));
        }
            $this->session->set_flashdata('success','Customer ['.$name.'] Has Been Added Successfully!');
            redirect(base_url().'admin_customer');
    }
     

     function edit_customer($customer_id)
    {

        $where=array('customer_id'=>$customer_id);
        $data['customer_detail']=$this->admin_model->selectWhere('tbl_customer',$where); 
		
		//print_ex($data['customer_detail']);   

        $where=array('brand_status'=>1);
        $data['brand_list']=$this->admin_model->selectAll('tbl_brand',$where);

        $whereRole=array('status'=>1);
        $data['role_list']=$this->admin_model->selectAll('tbl_role',$whereRole);
            
        $vendor=$this->input->get();
        

         $data['active'] = "customer";
        $this->load->view('common/header');
        $this->load->view('common/sidebar',$data);
        $this->load->view('customer/edit_view',$data);
        $this->load->view('common/footer');
    }
    function edit_customer_submit()
    { 

           $customer_id=$this->input->post('customer_id'); 

            $name=$this->input->post('name');
            $email=$this->input->post('email');
            $phone=$this->input->post('phone');
            $status=$this->input->post('status');
            $password=$this->input->post('password');
			$role_id=$this->input->post('role_id');
            $brand_id=$this->input->post('brand_id');
           
             $where = array('customer_id' => $customer_id);
         //print_eX($where);
		 
		 
               

             if(!empty($password))
             {

                 $data = array(
                    'email' => $email, 
                    'firstname' => $name,
                    'phone' => $phone,                
                    'password' => getHash($password), 
                    'org_password' => $password,
                    'date_added' => date('Y-m-d H:i:s'),               
                    'status' => $status,
					'customer_type' => $role_id,
					'brand_id'=>$brand_id, 
                );
             }else{

             $data = array(
                'email' => $email, 
                'firstname' => $name,
                'phone' => $phone,
                'date_added' => date('Y-m-d H:i:s'),               
                'status' => $status,
				'customer_type' => $role_id,
				'brand_id'=>$brand_id, 

                );
             //print_ex($data);
            }

            $this->admin_model->updateData('tbl_customer', $data,$where);
            //echo $this->db->last_query(); die;
            $this->session->set_flashdata('success','Customer ['.$name.'] Has Been Updated Successfully!');
            redirect(base_url().'admin_customer');
            
    }
    function customer_details($customer_id)
    {
        $where=array('customer_id'=>$customer_id);
        $data['address_detail']=$this->admin_model->selectWhere('tbl_address',$where);
        $data['wishlist_detail']=$this->admin_model->selectWhere('tbl_wishlist',$where);
        $data['cart_detail']=$this->admin_model->selectWhere('tbl_cart',$where);
        $data['order_detail']=$this->admin_model->selectWhere('tbl_order',$where);
        $data['customer_detail']=$this->admin_model->selectWhere('tbl_customer',$where);
        //print_ex($data);
        $data['active'] = "customer";
        $this->load->view('common/header');
        $this->load->view('common/sidebar',$data);
        $this->load->view('customer/customer_detail',$data);
        $this->load->view('common/footer');
    }

    function forget_password($customer_id){
          $where=array('customer_id'=>$customer_id);
          $data['customer_list']=$this->admin_model->selectWhere('tbl_customer',$where);

           foreach($data['customer_list'] as $row){
            $username = $row->firstname;
            $password = $row->org_password;
           }
                $config['wordwrap'] = TRUE;
                $config['mailtype'] = 'html';
                $config['charset'] = 'utf-8';
                $config['priority'] = '1';
                $config['crlf'] = "\r\n";
                $config['newline'] = "\r\n";
                $this->email->initialize($config);
                $this->email->from(SITE_EMAIL, SITE_NAME);
                $this->email->to(SITE_EMAIL);
                $this->email->subject("User Detail");
                $data_email['message_body'] = '<p>This mail is generated from website. A  user forget detail.<br>
                        <b>Customer Name: </b>'.$username.' <br>
                        <b>Customer Password: </b>'.$password.' </p>';       
                $msg = $this->load->view('email/email_template',$data_email, TRUE);
                $this->email->message($msg);   
               if ($this->email->send()) {
                    $this->session->set_flashdata('success', 'Please check your email for password reset.');
                    redirect(base_url().'admin_customer');
                }
         
    }
    function status_active($customer_id) 
    {
        $where = array('customer_id' =>$customer_id);
        $result = $this->admin_model->selectWhere('tbl_customer',$where); 
        if($result)
        {            
            $data=array(
                'status'=>1,
            );
            $where=array('customer_id'=>$result['0']->customer_id);
            $this->admin_model->updateData('tbl_customer',$data,$where);                
           $this->session->set_flashdata('success','User Successfully Active!');
            redirect(base_url().'admin_customer');
            // $message = 'User Successfully Active!';
            // $this->session->set_flashdata('alert_message',$message);
            // redirect(base_url('admin_customer'));               
        }  
        else
        {
             $this->session->set_flashdata('error','User Not Valid!');
             redirect(base_url().'admin_customer');
        }         
    }
     function status_inactive($customer_id) 
    {
        $where = array('customer_id' =>$customer_id);
        $result = $this->admin_model->selectWhere('tbl_customer',$where); 
        if($result)
        {            
            $data=array(
                'status'=>0,
            );
            $where=array('customer_id'=>$result['0']->customer_id);
            $this->admin_model->updateData('tbl_customer',$data,$where);                
            $this->session->set_flashdata('success','User Successfully Inactive!');
        redirect(base_url().'admin_customer');              
        }  
        else
        {
            $this->session->set_flashdata('error','User Not Valid!');
        redirect(base_url().'admin_customer');
        }         
    }

    function delete($customer_id) 
    {
        
        $where=array('customer_id'=>$customer_id);
        $this->admin_model->deleteData('tbl_customer',$where); 

        $this->session->set_flashdata('success','User Deleted Successfully!');
        redirect(base_url().'admin_customer');  

    }

    function action()
    {
         $customer_id=$this->input->post('id');
         $action=$this->input->post('action'); 
         $message='';

        if($action=='active')

        {

            $data=array('status'=>1);
            foreach($customer_id as $customer)

            {
                $where=array('customer_id'=>$customer);

                $this->admin_model->updateData('tbl_customer',$data,$where);

               // echo $this->db->last_query(); die;

            }

            $message='Status Has Been Updated!';

        }

        if($action=='inactive')

        {

            $data=array('status'=>0);

            foreach($customer_id as $customer)

            {

                $where=array('customer_id'=>$customer);

                $this->admin_model->updateData('tbl_customer',$data,$where);

               // echo $this->db->last_query(); die;

            }

            $message='Status Has Been Updated!';

        }

        if($action=="delete")

        {

           // $data=array('customer_id'=>'delete');

            foreach($customer_id as $customer)

            {

                $where=array('customer_id'=>$customer);

                $this->admin_model->deleteData('tbl_customer',$where);

             //   echo $this->db->last_query(); die;

            }

            $message='Customer Has Been Deleted!';

        }

        echo json_encode(array('message'=>$message));

    }

    function customer_log()
    {
            $user_id=$this->session->userdata('jw_admin_id'); 

            if($user_id != 1){
                $user_id = $user_id;  
            }else{
                $user_id = '';   
            }

            $data['log_list']=$this->customer_model->customer_log($user_id);
            
            $data['active_sidebar']='customer_log';
            //echo "<pre>";print_ex($data);
            
            $this->load->view('common/header');
            $this->load->view('common/sidebar',$data);
            $this->load->view('customer/customer_log',$data);
            $this->load->view('common/footer');
    }

     function customer_view()
    {
            $user_id=$this->session->userdata('jw_admin_id'); 

            if($user_id != 1){
                $user_id = $user_id;  
            }else{
                $user_id = '';   
            }

            $data['log_list']=$this->customer_model->customer_view($user_id);
            
            $data['active_sidebar']='customer_view';
            //echo "<pre>";print_ex($data);
            
            $this->load->view('common/header');
            $this->load->view('common/sidebar',$data);
            $this->load->view('customer/customer_view',$data);
            $this->load->view('common/footer');
    }

     function customer_history()
    {
            $user_id=$this->session->userdata('jw_admin_id'); 

            if($user_id != 1){
                $user_id = $user_id;  
            }else{
                $user_id = '';   
            }

            $data['history_list']=$this->customer_model->customer_history($user_id);
            
            $data['active_sidebar']='customer_history';
            //echo "<pre>";print_ex($data);
            
            $this->load->view('common/header');
            $this->load->view('common/sidebar',$data);
            $this->load->view('customer/customer_history',$data);
            $this->load->view('common/footer');
    }

    function upload_customer()
    {
      if($this->session->userdata('jw_admin_id')=="")
      {
        redirect(base_url());
      }
      
      $data['active_sidebar']='upload_customer';
     // print_ex($data);
      $this->load->view('common/header');
      $this->load->view('common/sidebar',$data);
      $this->load->view('customer/upload_customer',$data);
      $this->load->view('common/footer');
    } 

    function upload_customer_submit() 
  {  
      $total_record=0;
      $total_update=0;
      $total_insert=0;              
      $replace_all = $this->input->post('replace_all');
      $user_id=$this->session->userdata('jw_admin_id');
      $vendor = $this->input->post('vendor');
      $files = $_FILES;
      $file_dir='../uploads/user/excel/';
      $config['upload_path'] = $file_dir;
      $config['allowed_types'] = 'xls|xlsx|csv';
      $config['max_size']      = '600000000';
      $config['overwrite']     = TRUE;
      $config['file_name']     = $vendor;
   
      $_FILES['userfile']['name']= $files['userfile']['name'];
      $_FILES['userfile']['type']= $files['userfile']['type'];
      $_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'];
      $_FILES['userfile']['error']= $files['userfile']['error'];
      $_FILES['userfile']['size']= $files['userfile']['size'];

      $this->upload->initialize($config);
      $do_upload=$this->upload->do_upload();

      $file_full=$file_dir.str_replace(" ", '_', $_FILES['userfile']['name']);
     
      
        if(file_exists($file_full))
        {  
            $objPHPExcel = PHPExcel_IOFactory::load($file_full);
            $excel_array = $objPHPExcel->getActiveSheet()->toArray(null,true,true,false);
            
             foreach ($excel_array as $ekey => $evalue) 
              { 
                  if($ekey>0)
                  {
                    //print_ex($evalue);

                    // echo $evalue['0']; die;
                      $data['email'] = $evalue['1'];
                      $data['firstname'] = $evalue['0'];
                      $data['phone'] = $evalue['2'];
                      $data['customer_type'] = 4;
                      $data['password'] = getHash($evalue['3']);
                      $data['org_password'] = $evalue['3'];
                      $data['status'] = 1;
                      $data['date_added'] = date('Y-m-d H:i:s');
                      $total_record++;
                      //if($this->validate_diamond($data))
                      {
                        //print_pre($data);
                        $insert_id[]=$this->admin_model->insertData('tbl_customer',$data);
                      }
                  }
              }
           
            $this->session->set_flashdata('success','Total '.($total_update+$total_insert).' Record(s) Uploaded Successfully!');  
        }
       
                   
    
      redirect(base_url() . "admin_customer");
  }

}
?>


