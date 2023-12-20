<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authorize_net extends CI_Controller {

	function  __construct(){
            parent::__construct();
            //$this->load->library('paypal_lib');
            $this->load->model('cart_model');
            $this->load->model('user_model');
            $this->load->model('common_model');
            $this->load->model('jewelry_model');
            $this->load->library('auth_payment');	
         }

	function do_user_payment()
{

  //print_ex($_POST);

	  $user_id=$this->session->userdata('user_id');
    $order_id=$this->session->userdata('order_id');

     $where=array('customer_id'=>$user_id);
     $customer = $this->common_model->selectWhere('tbl_customer',$where);

      
     //print_ex($customer);

     $where=array('customer_id'=>$user_id);
     $amount=$this->cart_model->get_cart($where);  

     //print_ex($amount);

     $this->load->library('auth_payment');	
     $card_expiration = $_POST['card_month'].$_POST['card_year'];
     $user_first_name = $_POST['name_on_card'];
     $user_last_name = '';
     $user_address1 = $_POST['address'];
     $user_state = $_POST['state'];
     $user_zip = $_POST['zip'];

     //$card_expiration = '12'.'2021';
	   
     $x_login  	 = "9qgC8Q9MEP";
     $x_tran_key  = "6vU2rLRxyW5y462Y";
     $card_number = $_POST['card_number']; 
   
     $invoice_num = '';
		   
     $x_card_code = $_POST['card_cvv'];
	   
     $post_values['x_invoice_num'] = $invoice_num;
     $post_values['x_login'] 		 = $x_login;
     $post_values['x_tran_key'] 	 = $x_tran_key;
		   
     $post_values['x_card_code'] 	 = $x_card_code;
			   
      $post_values['x_version'] 	= "3.1";
      $post_values['x_delim_data'] = "TRUE";
      $post_values['x_delim_char'] = "|";
      $post_values['x_relay_response'] = "FALSE";
			   
      $post_values['x_type'] 	= "AUTH_CAPTURE"; //Optional
      $post_values['x_method'] = "CC";
      $post_values['x_card_num'] = $card_number;
      $post_values['x_exp_date'] = $card_expiration;
      $post_values['x_amount']   =  $amount['total_price'];
			   
      $post_values['x_first_name'] = $user_first_name; //Optional (From Client)
      $post_values['x_last_name'] = $user_last_name; //Optional (From Client)
      $post_values['x_address'] = $user_address1; //Optional (From Client)
      $post_values['x_state'] = $user_state; //Optional (From Client)
      $post_values['x_zip'] = $user_zip; //Optional (From Client)
			   
      //Calling Payment function
			  
     $paymentResponse = $this->auth_payment->do_payment($post_values);

     //print_pre($paymentResponse); 

     if($paymentResponse[0]==1 && $paymentResponse[1]==1 && $paymentResponse[2]==1)
     {
          // payment is successful. Do your action here

     	foreach ($order_id as $key => $value)
                {

			     	 $order=array(
			                      'payment_status'=>$paymentResponse[3],
			                      'payment_txn_id'=>$paymentResponse[6],
			                      'payment_method'=>'Authorize Net',
			                      'order_status'=>'processing',          
			                    );
			                    $where=array('order_id'=>$value);
			                    $this->common_model->updateData('tbl_order',$order,$where);

			                    $payment = array(
			                      'user_id'=>$user_id, 
			                      'product_id'=>$value,
			                      'txn_id'=>$paymentResponse[6],
			                      'payment_gross'=>$paymentResponse[9],
			                      'currency_code'=>'USD',
			                      'payer_email'=>$customer[0]->email,
			                      'payment_status'=>$paymentResponse[3],         
			                    );
			                    $this->common_model->insertData('tbl_payments',$payment);

                    }

                $where=array('customer_id'=>$user_id);
                $this->common_model->deleteData('tbl_cart',$where);      
                $this->session->unset_userdata('order_id');
                //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
                $this->email($order_id);
                //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

            $data['page_head'] = 'Order Confirmation';
            $data['where'] = $where;      

            $this->load->view('common/header', $data);
            $this->load->view('order/order_confirm',$data);
            $this->load->view('common/footer');
     }
    else
     {
          // payment failed.
          $this->session->set_flashdata('error_message', $paymentResponse[3]);
          //return $paymentResponse[3]; // return error
          redirect($_SERVER['HTTP_REFERER']);
          //redirect(base_url().'card-payment');
     }
}

  private function email($order_id)
        {
          foreach ($order_id as $key => $value)
          {
              $where = array(
                'O.order_id' => $value
              );
              $data_email['order_details'] = $this->user_model->getOrder($where);

              foreach ($data_email['order_details'] as $row) 
              {
                  if ($row->is_ring_builder) {
                      $cart_diamond=$this->common_model->selectWhere('tbl_order_product',array('order_id'=>$row->order_id,'product_type'=>'diamond'));
                      if (count($cart_diamond)) {
                          $row->diamond_attach = $cart_diamond;
                          //$cart_diamond['0']->product_slug=$cart_diamond['0']->stock_id;
                      }
                  } else {
                      $row->diamond_attach = array();
                  }

                  /*if ($row->product_type=='jewelry') {
                      $where = "product_sku = '".$row->stock_id."'";
                      $records = $this->jewelry_model->jewelry_list($where);                
                      $row->product_slug = @$records['0']->product_slug; 
                  } else {
                      $row->product_slug = $row->stock_id; 
                  } */      
              }
              //print_ex($data_email['order_details']);
              $customer_email = $data_email['order_details']['0']->email;
              $data_email['detail_link'] ='';    

              $config['wordwrap'] = TRUE;
              $config['mailtype'] = 'html';      
              $config['charset'] = 'utf-8';
              $config['priority'] = '1';      
              $config['crlf']  = "\r\n";      
              $config['newline']  = "\r\n";
     
              $this->email->initialize($config);      
              $this->email->from(SITE_EMAIL,SITE_NAME);      
              $this->email->to($customer_email);
              $this->email->subject("Your order ".$data_email['order_details']['0']->order_reference." has been confirmed"); 

              $msg = $this->load->view('email/order_confirm',$data_email, TRUE);              
              $this->email->message($msg);
              $this->email->send();
              //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
              $this->email->initialize($config);      
              $this->email->from(SITE_EMAIL,SITE_NAME);      
              $this->email->to(SITE_EMAIL);
              $this->email->cc('jewelsofcanada.ca@gmail.com');
              $this->email->subject("Order ".$data_email['order_details']['0']->order_reference." has been Placed");     

              $msg = $this->load->view('email/order_confirm_admin',$data_email, TRUE);
              $this->email->message($msg);
              $this->email->send();
          }

        }
	
}

/* EOF */