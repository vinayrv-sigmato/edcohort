<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('jewelry_model');
        $this->load->library('excel'); 
        $this->load->helper('download');
        $this->load->model('review_model');
        $this->load->model('complaint_model');

        //$this->load->helper(array('form', 'url','custom'));
        if ($this->session->userdata('user_id') == "") {
            redirect(base_url());
        }
    }

    function edit_profile() {
        $customer_id = $this->session->userdata('user_id');

        $where=array('customer_id'=>$customer_id);
        $data['customer_list'] = $this->common_model->selectWhere('tbl_customer',$where);
        //print_ex($data['customer_list']);
        $where_brand = "";

        if($data['customer_list']['0']->customer_type == 1){

            $where_brand = " or PR.brand_id = ".$data['customer_list']['0']->brand_id." ";
        }

        $where_review = 'PR.status = "active" and user_id = '.$customer_id.' '.$where_brand.' ';
        $data['review_records'] = $this->review_model->getreviewdetails($where_review); 

        //echo $this->db->last_query(); die;

        $where_complaint = 'PR.status = "active" and user_id = '.$customer_id.' '.$where_brand.' ';
        $data['complaint_records'] = $this->complaint_model->getcomplaint($where_complaint);

        //print_ex($data);

        $data['active_sidebar'] = 'dashboard';
        $page_head['page_head'] = 'Edit Profile';
        //print_ex($data);
        $this->load->view('common/header', $page_head);        
        $this->load->view('user/profile', $data);
        $this->load->view('common/footer');
    }
    function update_profile() {
		$message = '';
        $status = '0';
		
        $this->form_validation->set_rules('userfirstname', 'First Name', 'trim|required');
        $this->form_validation->set_rules('phone', 'Phone No.', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            //$this->session->set_flashdata('error_message','Please Fill Required Form!'); 
			$errors = validation_errors();
		    $message = $errors;           
            echo json_encode(array('message' => $message, 'status' => $status));
            exit();                     
        } 
        else {
            $customer_id = $this->session->userdata('user_id');
            $firstname = $this->input->post('userfirstname');
            $lastname = $this->input->post('userlastname');
            $phone = $this->input->post('phone');
            $data = array(
            	'firstname' => $firstname, 
                'lastname' => $lastname, 
            	'phone' => $phone, 
            	'date_edited' => date("Y-m-d")
            );
            $where = array('customer_id' => $customer_id);
            $this->common_model->updateData('tbl_customer',$data,$where);

            //this->session->set_flashdata('alert_message','Details has been updated successfully!'); 
			 $status = '1';
             $message = 'Details has been updated successfully!';
			 echo json_encode(array('message' => $message, 'status' => $status));
             exit();
        }
       // redirect(base_url().'edit-profile');
    }
    function change_password() {    
        $data['page_head'] = 'Change Password';
        $this->load->view('common/header', $data);
        $this->load->view('user/change-password');
        $this->load->view('common/footer');
    }
    function update_password() 
    {
		$message = '';
        $status = '0';
        //print_ex($this->input->post());
        $this->form_validation->set_rules('oldpassword', 'Old Password', 'trim|required');
        $this->form_validation->set_rules('newpassword', 'New Password', 'trim|required');
        $this->form_validation->set_rules('cnfpassword','Confirm Password','trim|required|matches[newpassword]');
        $this->form_validation->run();
        if($this->form_validation->run()== FALSE)
        {
            // $this->session->set_flashdata('error_message','Please fill correct credential');
            // redirect(base_url().'change-password');
			$errors = validation_errors();
		    $message = $errors;           
            echo json_encode(array('message' => $message, 'status' => $status));
            exit();
        }
        $customer_id = $this->session->userdata('user_id');
        $oldpassword = $this->input->post('oldpassword');        
        $newpassword = $this->input->post('newpassword');
        $cnfpassword = $this->input->post('cnfpassword');

        $existdata = array(
        	'password' => hashcode($oldpassword), 
        	'customer_id' => $customer_id
        );
        $check_old_password = $this->common_model->selectWhere('tbl_customer', $existdata);
        if($check_old_password) 
        {
            $data = array('password' => hashcode($newpassword));
            $where = array('customer_id' => $customer_id);
            $this->common_model->updateData('tbl_customer', $data, $where);
            //$this->session->set_flashdata('alert_message','Details has been updated successfully!');
            //redirect(base_url().'change-password');
			$message = 'Password has been updated successfully!';  
			$status = 1;         
            echo json_encode(array('message' => $message, 'status' => $status));
            exit();
			 
        }else{
           // $this->session->set_flashdata('error_message','Current Password is not Correct!');
            //redirect(base_url().'change-password'); 			
		    $message = 'Current Password is not Correct!';           
            echo json_encode(array('message' => $message, 'status' => $status));
            exit();          
        }
    }
     function address() {
        $customer_id = $this->session->userdata('user_id');

        $data['address'] = $this->common_model->selectWhere('tbl_address',array('customer_id'=>$customer_id));
        
        $data['country'] = $this->common_model->selectAll('countries');
        $data['active_sidebar'] = 'dashboard';
        $page_head['page_head'] = 'Address';
        $this->load->view('common/header', $page_head);
        $this->load->view('user/address', $data);
        $this->load->view('common/footer');
    }

    function get_address()
    {
    	$user_id = $this->session->userdata('user_id');
    	$address_id=$this->input->get('address_id');
    	$address = $this->common_model->selectWhere('tbl_address', array('customer_id' => $user_id, 'address_id' => $address_id));
    	echo json_encode(array('records'=>$address));
    }
    function makeDefaultAddress()
    {
    	$user_id = $this->session->userdata('user_id');
    	$address_id=$this->input->get('address_id');
    	$type=$this->input->get('type');
        $value=$this->input->get('value');
    	if($type=='sad')
    	{
    		$data=array('default_ship' => $value);
    		$data1=array('default_ship' => 0);
    	}
    	else if($type=='bad')
    	{
    		$data=array('default_bill' => $value);
    		$data1=array('default_bill' => 0);
    	} 
    	$where1=array('customer_id'=>$user_id);
    	$this->common_model->updateData('tbl_address',$data1,$where1);

    	$where=array('customer_id'=>$user_id,'address_id'=>$address_id);
    	$this->common_model->updateData('tbl_address',$data,$where);

    	$this->session->set_flashdata('alert_message', 'Address has been updated successfully!');

    	echo json_encode(array('status'=>'ok'));
    }
    function update_billing_address() {    	
        $this->form_validation->set_rules('firstname', 'First Name', 'trim|required');
        $this->form_validation->set_rules('phone', 'Phone', 'trim|required');
        $this->form_validation->set_rules('address1', 'Address', 'trim|required');
        $this->form_validation->set_rules('country', 'Country Name', 'trim|required');
        $this->form_validation->set_rules('state', 'State Name', 'trim|required');
        $this->form_validation->set_rules('city', 'City Name', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error_message', 'Please Fill Required Form!');
            redirect(base_url() . 'address');
        }
        $user_id = $this->session->userdata('user_id');
        $address_id = $this->input->post('address_id');
        $firstname = $this->input->post('firstname');
        $lastname = $this->input->post('lastname');
        $phone = $this->input->post('phone');
        $address1 = $this->input->post('address1');
        $city = $this->input->post('city');
        $state = $this->input->post('state');
        $country = $this->input->post('country');
        $zip = $this->input->post('zip');

        $ds_address = 0;
        $db_address = 0;

        if($this->input->post('ds_address')) 
        {
        	$ds_address = $this->input->post('ds_address');

        	$data1=array('default_ship' => 0);
        	$where1=array('customer_id'=>$user_id);
    		$this->common_model->updateData('tbl_address',$data1,$where1);
        } 
        if($this->input->post('db_address')) 
        {
        	$db_address = $this->input->post('db_address');

        	$data1=array('default_bill' => 0);
        	$where1=array('customer_id'=>$user_id);
    		$this->common_model->updateData('tbl_address',$data1,$where1);
        }
        
        $shippingdata = array(
        	'firstname' => $firstname, 
        	'lastname' => $lastname, 
        	'phone' => $phone, 
        	'address_1' => $address1, 
        	'city' => $city, 
        	'state' => $state, 
        	'country' => $country, 
        	'zip' => $zip, 
        	'date_edited'=>date('Y-m-d H:i:s'),
        	'default_ship'=>$ds_address,    
        	'default_bill'=>$db_address,    	
        );        
       	if($address_id!=""){
       		$where = array('address_id' => $address_id);
       		$this->common_model->updateData('tbl_address',$shippingdata+array('date_edited'=>date('Y-m-d H:i:s')),$where);
       		$this->session->set_flashdata('alert_message','Address has been updated successfully!');
       	}else{
       		$this->common_model->insertData('tbl_address',$shippingdata+array('customer_id'=>$user_id,'date_added'=>date('Y-m-d H:i:s')));
       		$this->session->set_flashdata('alert_message','Address has been Added successfully!');
       	}        
        redirect(base_url() . 'address');
    }
    function delete_address()
    {
    	$address_id = $this->input->get('address_id');
    	if($address_id!="")
       	{
       		$where = array('address_id' => $address_id);
       		$this->common_model->deleteData('tbl_address',$where);
       		$this->session->set_flashdata('alert_message', 'Address has been deleted successfully!');
       	}
       	redirect(base_url() . 'address');
    }
    function your_orders() {       

        $data['active_sidebar'] = 'dashboard';
        $page_head['page_head'] = 'Orders';
        $this->load->view('common/header', $page_head);
        $this->load->view('order/your_orders', $data);
        $this->load->view('common/footer');
    }
    function getOrderAjax()
    {
    	$vendor_id = $this->session->userdata('user_id');       
        $where = array('customer_id' => $vendor_id, 'order_status !=' => 'idle');
        if($this->input->get('search'))
        {
        	$where['order_reference']=$this->input->get('search');
        }
        $data = $this->user_model->getOrder($where);

        foreach ($data as $row) 
        {   
            if ($row->is_ring_builder){
                $cart_diamond=$this->common_model->selectWhere('tbl_order_product',array('order_id'=>$row->order_id,'product_type'=>'diamond'));
                if(count($cart_diamond)){
                    $row->diamond_attach = $cart_diamond;

                    $cart_diamond['0']->product_slug = $cart_diamond['0']->stock_id;
                }                
            }else{
                $row->diamond_attach = array();
            } 

            if($row->product_type=='jewelry'){
                $where = "product_sku = '".$row->stock_id."'";
                $records= $this->jewelry_model->jewelry_list($where);
                
                $row->product_slug=@$records['0']->product_slug; 
            }else{
                $row->product_slug=$row->stock_id; 
            }        
        }
      
        echo json_encode(array('records'=>$data,'total_records'=>count(array_filter($data))));
    }
    function order_diamond()
      {
         $user_id=$this->session->userdata('user_id');

        $where=array('customer_id'=>$user_id); 
        $data['order_list']=$this->user_model->getDiamondOrder($where); 
        $data['page_head'] = 'Order Details';    
        $this->load->view('common/header',$data);
        $this->load->view('order/diamond_orders',$data);
        $this->load->view('common/footer');
      }
     function export_order()
    {

        $vendor_id = $this->session->userdata('user_id');       
        $where = array('customer_id' => $vendor_id);
        $dis_value=$this->input->get('dis_value');
        $data = $this->user_model->getDiamondOrder($where);

   $this->excel->setActiveSheetIndex(0);
   $this->excel->getActiveSheet()->setTitle('Stock');
   $styleArray = array(
     'font'  => array(
       'color' => array('rgb' => '8c0808'),
       'size'  => 18,
       'name' => 'Verdana',
       'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,              
     )); 

   $this->excel->getActiveSheet()->setCellValueByColumnAndRow('0','1' ,'Stock#');
   $this->excel->getActiveSheet()->setCellValueByColumnAndRow('1','1' ,'Shape');
   $this->excel->getActiveSheet()->setCellValueByColumnAndRow('2','1' ,'Carat');
   $this->excel->getActiveSheet()->setCellValueByColumnAndRow('3','1' ,'Color');
   $this->excel->getActiveSheet()->setCellValueByColumnAndRow('4','1' ,'Clarity');
   $this->excel->getActiveSheet()->setCellValueByColumnAndRow('5','1' ,'Cut');
   $this->excel->getActiveSheet()->setCellValueByColumnAndRow('6','1' ,'Polish');
   $this->excel->getActiveSheet()->setCellValueByColumnAndRow('7','1' ,'Symmetry');
   $this->excel->getActiveSheet()->setCellValueByColumnAndRow('8','1' ,'Fluorescence');    
   $this->excel->getActiveSheet()->setCellValueByColumnAndRow('9','1' ,'Depth%');
   $this->excel->getActiveSheet()->setCellValueByColumnAndRow('10','1' ,'Table%');
   $this->excel->getActiveSheet()->setCellValueByColumnAndRow('11','1' ,'Disc%');
   $this->excel->getActiveSheet()->setCellValueByColumnAndRow('12','1' ,'$/Carat');
   $this->excel->getActiveSheet()->setCellValueByColumnAndRow('13','1' ,'Price');
   $this->excel->getActiveSheet()->setCellValueByColumnAndRow('14','1' ,'Thai Baht');
   $this->excel->getActiveSheet()->setCellValueByColumnAndRow('15','1' ,'Lab');
   $this->excel->getActiveSheet()->setCellValueByColumnAndRow('16','1' ,'Certificate');
   $this->excel->getActiveSheet()->setCellValueByColumnAndRow('17','1' ,'Measurements');
   $this->excel->getActiveSheet()->setCellValueByColumnAndRow('18','1' ,'Certificate_link');
   $this->excel->getActiveSheet()->setCellValueByColumnAndRow('19','1' ,'Image_link');
   $this->excel->getActiveSheet()->setCellValueByColumnAndRow('20','1' ,'Video_link'); 


   $this->excel->getActiveSheet()->getStyle('A1:T1')
   ->applyFromArray(
     array(
       'font' => array(                    
         'color' => array('rgb' => '000000'),
         'size'  => 11,
         'name' => 'Calibri'
       ),
       'fill' => array(
         'type' => PHPExcel_Style_Fill::FILL_SOLID,
         'color' => array('rgb' => 'ffa600')
       )
     )
   );
   $i=2;       
   foreach($data as $row) 
   {  

    $this->excel->getActiveSheet()->setCellValueByColumnAndRow('0',$i,$row->stock_id);
    $this->excel->getActiveSheet()->setCellValueByColumnAndRow('1',$i,$row->shape);        
    $this->excel->getActiveSheet()->setCellValueByColumnAndRow('2',$i,number_format($row->weight,2));
    $this->excel->getActiveSheet()->setCellValueByColumnAndRow('3',$i,$row->color);
    $this->excel->getActiveSheet()->setCellValueByColumnAndRow('4',$i,$row->grade);
    $this->excel->getActiveSheet()->setCellValueByColumnAndRow('5',$i,$row->cut);
    $this->excel->getActiveSheet()->setCellValueByColumnAndRow('6',$i,$row->polish);
    $this->excel->getActiveSheet()->setCellValueByColumnAndRow('7',$i,$row->symmetry);
    $this->excel->getActiveSheet()->setCellValueByColumnAndRow('8',$i,$row->fluorescence_int);        
    $this->excel->getActiveSheet()->setCellValueByColumnAndRow('9',$i,number_format($row->depth,1));
    $this->excel->getActiveSheet()->setCellValueByColumnAndRow('10',$i,(int)$row->table_d);
    $this->excel->getActiveSheet()->setCellValueByColumnAndRow('11',$i,number_format($row->new_discount,2));
    $this->excel->getActiveSheet()->setCellValueByColumnAndRow('12',$i,number_format($row->cost_carat));
    $this->excel->getActiveSheet()->setCellValueByColumnAndRow('13',$i,'$'.round($row->total_price)); 
    $this->excel->getActiveSheet()->setCellValueByColumnAndRow('14',$i,'&#3647;'.round($row->currency));        
    $this->excel->getActiveSheet()->setCellValueByColumnAndRow('15',$i,$row->lab);  
    $this->excel->getActiveSheet()->setCellValueByColumnAndRow('16',$i,$row->report_no);      
    $this->excel->getActiveSheet()->setCellValueByColumnAndRow('17',$i,$row->measurements); 
    $this->excel->getActiveSheet()->setCellValueByColumnAndRow('18',$i,$row->report_filename);  
    $this->excel->getActiveSheet()->setCellValueByColumnAndRow('19',$i,$row->diamond_image); 
    $this->excel->getActiveSheet()->setCellValueByColumnAndRow('20',$i,$row->diamond_video);   

    $i++;
  }
  $avg_AM_PRICECTS=$total_AM_PRICECTS/count($data);
  for($col = 'A'; $col !== 'T'; $col++) {
   $this->excel->getActiveSheet()->getColumnDimension($col)->setAutoSize(true);
 }
 $this->excel->getActiveSheet()->setCellValueByColumnAndRow('0',$i,count($data));
 $this->excel->getActiveSheet()->getStyle('A'.$i.':T'.$i.'')
 ->applyFromArray(
   array(
     'font' => array(                    
       'color' => array('rgb' => '000000'),
       'size'  => 11,
       'name' => 'Calibri'
     ),
     'fill' => array(
       'type' => PHPExcel_Style_Fill::FILL_SOLID,
       'color' => array('rgb' => '939496')
     )
   )
 );
 $this->excel->getActiveSheet()
 ->getStyle( $this->excel->getActiveSheet()->calculateWorksheetDimension() )
 ->getAlignment()
 ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);

 $filename='Order_Diamonds_'.date('d_m_Y_h_i_s_A').'.xls'; 
 header('Content-Type: application/vnd.ms-excel'); 
 header('Content-Disposition: attachment;filename="'.$filename.'"'); 
 header('Cache-Control: max-age=0');                     
       //save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
       //if you want to save it as .XLSX Excel 2007 format
 $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');  
       //force user to download the Excel file without writing it to server's HD
 $objWriter->save('php://output');
}
    function order_details() {
        $order_id = $this->uri->segment('2');
        $customer_id = $this->session->userdata('user_id');

        $where = array(
        	'customer_id' => $customer_id, 
        	'order_reference' => $order_id
        );
        $data['order_details'] = $this->user_model->getOrder($where);

        foreach ($data['order_details'] as $row) 
        {
            if ($row->is_ring_builder){
                $cart_diamond=$this->common_model->selectWhere('tbl_order_product',array('order_id'=>$row->order_id,'product_type'=>'diamond'));
                if(count($cart_diamond)){
                    $row->diamond_attach = $cart_diamond;
                    $cart_diamond['0']->product_slug=$cart_diamond['0']->stock_id;
                }
            }else{
                $row->diamond_attach = array();
            }

            if($row->product_type=='jewelry'){
                $where = "product_sku = '".$row->stock_id."'";
                $records= $this->jewelry_model->jewelry_list($where);                
                $row->product_slug=@$records['0']->product_slug; 
            }else{
                $row->product_slug=$row->stock_id; 
            }       
        }
        //print_ex($data);
        $data['active_sidebar'] = 'dashboard';
        $page_head['page_head'] = 'Order Details';
        $this->load->view('common/header', $page_head);
        $this->load->view('order/order_detail', $data);
        $this->load->view('common/footer');
    }
    function cancel_order()
    {
		$customer_id = $this->session->userdata('user_id');
		$order_id = $this->input->post('cancel_id');
		$cancel_type = $this->input->post('cancel_type');

    	if($order_id!="")
        {
       		$data=array('order_status'=>'cancelled');
       		$where = array('order_id' => $order_id,'customer_id'=>$customer_id);
       		$this->common_model->updateData('tbl_order',$data,$where);
       		$this->session->set_flashdata('alert_message', 'Order has been cancelled successfully!');
       	}
       	redirect(base_url() . 'your-orders');
    }
    function logout() {
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('group_id');
        $this->session->unset_userdata('user_fullname');
        $this->session->unset_userdata('user_active');
        //$this->session->unset_userdata('vd_user_email');
        //Remove cookies
        //set_cookie("username", "", time() - 3600 * 24 * 30);
        //set_cookie("password", "", time() - 3600 * 24 * 30);
        redirect(base_url());
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

     function update_image() {
        $message = '';
        $status = '0';
        
        //$this->form_validation->set_rules('profile_image', 'Image', 'trim|required');
        
         if ((!isset($_FILES['profile_image'])) || $_FILES['profile_image']['size'] == 0) {
            $this->session->set_flashdata('error_message','Please Select Image!'); 
            $errors = validation_errors();
            $message = $errors;           
           // echo json_encode(array('message' => $message, 'status' => $status));
           // exit();                     
        } 
        else {
            $customer_id = $this->session->userdata('user_id');
            
            //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
        $media = '';
        $config['upload_path'] = './uploads/user/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size'] = 2000;
        $config['max_width'] = 1500;
        $config['max_height'] = 1500;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('profile_image')) {
            $errors = array('error' => $this->upload->display_errors());
             $this->session->set_flashdata('error_message',$errors);
            //  $message = $errors;
            // $status = 0;
            // echo json_encode(array('message' => $message, 'status' => $status));
            //exit();
        } else {
            $mediadata =  $this->upload->data(); 
             $media =  $mediadata['file_name'];     
        }           
            $data = array(
                'image' => $media, 
            );
            $where = array('customer_id' => $customer_id);
            $this->common_model->updateData('tbl_customer',$data,$where);

            $this->session->set_flashdata('alert_message','Details has been updated successfully!'); 
             $status = '1';
             $message = 'Details has been updated successfully!';
             echo json_encode(array('message' => $message, 'status' => $status));
            // exit();
        }
        redirect(base_url().'edit-profile');
    }

    

}
