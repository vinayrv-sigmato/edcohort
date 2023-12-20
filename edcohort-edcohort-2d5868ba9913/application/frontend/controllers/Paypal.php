<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class Paypal extends CI_Controller 
    {
         function  __construct(){
            parent::__construct();
            $this->load->library('paypal_lib');
            $this->load->model('cart_model');
            $this->load->model('user_model');
            $this->load->model('jewelry_model');
         }
         
         function success()
         {
            $user_id=$this->session->userdata('user_id');
            $order_id=$this->session->userdata('order_id');
            if(empty($order_id)){
              redirect(base_url().'cart');
            }
            //get the transaction data
            $paypalInfo = $this->input->post();
            if(!count($paypalInfo)){
                $paypalInfo = $this->input->get();
                $txn_id = $paypalInfo['tx'];
            }else{
                $txn_id = $paypalInfo['txn_id'];
            }

            $where=array(
              'payment_txn_id'=>$txn_id     
            );
            $check_tx=$this->common_model->selectWhere('tbl_order',$where);

            if(!count($paypalInfo) || count($check_tx))
            {
                redirect(base_url().'cart');
            }

            $request = curl_init();
            curl_setopt_array($request, array
            (
              CURLOPT_URL => 'https://www.paypal.com/cgi-bin/webscr',
              CURLOPT_POST => TRUE,
              CURLOPT_POSTFIELDS => http_build_query(array
                (
                  'cmd' => '_notify-synch',
                  'tx' => $txn_id,
                  'at' => 'svvFK9hayfiYHTDES4FgciVDm6aHpOCc4Hh06a5LZCVII963a53UjyEzfL8',
                )),
              CURLOPT_RETURNTRANSFER => TRUE,
              CURLOPT_HEADER => FALSE,
            ));

            $response = curl_exec($request);
            $status   = curl_getinfo($request, CURLINFO_HTTP_CODE);
            curl_close($request);
            if($status == 200 AND strpos($response, 'SUCCESS') === 0)
            {
                $response = substr($response, 7);
                $response = urldecode($response);
                preg_match_all('/^([^=\s]++)=(.*+)/m', $response, $m, PREG_PATTERN_ORDER);
                $response = array_combine($m[1], $m[2]);
                if(isset($response['charset']) AND strtoupper($response['charset']) !== 'UTF-8')
                {
                  foreach($response as $key => &$value)
                  {
                    $value = mb_convert_encoding($value, 'UTF-8', $response['charset']);
                  }
                  $response['charset_original'] = $response['charset'];
                  $response['charset'] = 'UTF-8';
                }
                ksort($response);

                foreach ($order_id as $key => $value)
                {
                    $order=array(
                      'payment_status'=>$response['payment_status'],
                      'payment_txn_id'=>$response['txn_id'],
                      'payment_method'=>'Paypal',
                      'order_status'=>'processing',          
                    );
                    $where=array('order_id'=>$value);
                    $this->common_model->updateData('tbl_order',$order,$where);

                    $payment = array(
                      'user_id'=>$user_id, 
                      'product_id'=>$value,
                      'txn_id'=>$response['txn_id'],
                      'payment_gross'=>$response['payment_gross'],
                      'currency_code'=>$response['mc_currency'],
                      'payer_email'=>$response['payer_email'],
                      'payment_status'=>$response['payment_status'],         
                    );
                    $this->common_model->insertData('tbl_payments',$payment);
                }

                $where=array('customer_id'=>$user_id);
                $this->common_model->deleteData('tbl_cart',$where);      
                $this->session->unset_userdata('order_id');
                //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
                $this->email($order_id);
                //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
            } else {
                redirect(base_url().'cart');
            }

            $data['page_head'] = 'Order Confirmation';
            $data['where'] = $where;      

            $this->load->view('common/header', $data);
            $this->load->view('order/order_confirm',$data);
            $this->load->view('common/footer');
         }
         
         function cancel(){
            $this->load->view('paypal/cancel');
         }
         
         function ipn(){
            //paypal return transaction details array
            $paypalInfo    = $this->input->post();

            $data['user_id'] = $paypalInfo['custom'];
            $data['product_id']    = $paypalInfo["item_number"];
            $data['txn_id']    = $paypalInfo["txn_id"];
            $data['payment_gross'] = $paypalInfo["payment_gross"];
            $data['currency_code'] = $paypalInfo["mc_currency"];
            $data['payer_email'] = $paypalInfo["payer_email"];
            $data['payment_status']    = $paypalInfo["payment_status"];

            $paypalURL = $this->paypal_lib->paypal_url;        
            $result    = $this->paypal_lib->curlPost($paypalURL,$paypalInfo);
            
            //check whether the payment is verified
            if(preg_match("/VERIFIED/i",$result)){
                //insert the transaction data into the database
                $this->product->insertTransaction($data);
            }
        }


        function payment()
        {
            $user_id=$this->session->userdata('user_id');
            $order_id=$this->session->userdata('order_id');

            $where=array('customer_id'=>$user_id);
            $amount=$this->cart_model->get_cart($where);            

            //Set variables for paypal form
            $returnURL = base_url().'paypal-success'; //payment success url
            //$returnURL = base_url().'checkout-confirm'; //payment success url
            $cancelURL = base_url().'your-orders'; //payment cancel url
            //$notifyURL = base_url().'paypal/ipn'; //ipn url                
            
            $userID = $user_id; //current user id
            $logo = base_url().'assets/images/logo.png';
            
            $this->paypal_lib->add_field('return', $returnURL);
            $this->paypal_lib->add_field('cancel_return', $cancelURL);
            //$this->paypal_lib->add_field('notify_url', $notifyURL);
            $this->paypal_lib->add_field('custom', $userID);
            $this->paypal_lib->add_field('item_name', 'Order details');                
            $this->paypal_lib->add_field('item_number', $order_id);
            $this->paypal_lib->add_field('amount', $amount['total_price']); 

            $this->paypal_lib->image($logo);            
            $this->paypal_lib->paypal_auto_form();
        }

        function test(){
          $this->email(array('4'));
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
?>