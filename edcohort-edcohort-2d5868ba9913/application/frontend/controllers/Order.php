<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {

    public function __construct()
    {
        parent::__construct();   
        //$this->load->library('pagination'); 
        $this->load->model('cart_model');   
        if($this->session->userdata('user_id')=="") {
            //redirect(base_url());
        }
    }   
    function index()
    {   
        $where="";
        $user_id=$this->session->userdata('user_id');
        $get_cookie = get_cookie('fc_cart_cookie');

        $data['address']=$this->common_model->selectWhere('tbl_address',array('customer_id'=>$user_id));
        $data['shipping_address']=$this->common_model->selectWhere('tbl_address',array('customer_id'=>$user_id,'default_ship'=>'1'));
        $data['billing_address']=$this->common_model->selectWhere('tbl_address',array('customer_id'=>$user_id,'default_bill'=>'1'));
        $country_name=$this->common_model->selectWhere('countries',array('name'=>@$data['shipping_address']['0']->country));
        $data['ship_states']=$this->common_model->selectWhere('states',array('country_id'=>@$country_name['0']->id));
        $country_name=$this->common_model->selectWhere('countries',array('name'=>@$data['billing_address']['0']->country));
        $data['bill_states']=$this->common_model->selectWhere('states',array('country_id'=>@$country_name['0']->id));
        $data['country']=$this->common_model->selectAll('countries');

        if ($user_id) {
            $where=array('customer_id'=>$user_id);
            $data['all_cart']=$this->cart_model->get_cart($where);
            if($data['all_cart']['total_price']<1) {
                redirect(base_url().'cart');
            }
        } else if ($get_cookie) {
            
            $where = array('cookie_id'=>$get_cookie);
            $data['all_cart'] = $this->cart_model->get_cart_cookie($where);
            
            if ($data['all_cart']['total_price']<1) {
                redirect(base_url().'cart');
             } 
             //else {
            //     print_r("b");exit;
            //     //redirect(base_url().'checkout-login');
            // }            
        } else {
            redirect(base_url().'cart');
        }
        $data['page_head'] = 'Shipping Address';      
        $data['where'] = $where;      

        $this->load->view('common/header',$data);
        $this->load->view('order/order_address',$data);
        $this->load->view('common/footer');
    }
    function checkout_login() {
        $user_id=$this->session->userdata('user_id');
        if ($user_id) {
            redirect(base_url().'checkout');
        }
        $data['page_head'] = 'Checkout Login'; 
        $data['title'] = 'User | Login';

        $this->load->view('common/header', $data);
        $this->load->view('order/ckeckout_login');
        $this->load->view('common/footer');
    }
    function address_submit()
    {
        
        $user_id=$this->session->userdata('user_id');
        $get_cookie = get_cookie('fc_cart_cookie');
        
        $address_id=$this->input->post('address_id');
        $ship_country=$this->input->post('ship_country');
        $ship_fname=$this->input->post('ship_fname');
        $ship_lname=$this->input->post('ship_lname');
        $ship_address=$this->input->post('ship_address');
        $ship_city=$this->input->post('ship_city');
        $ship_state=$this->input->post('ship_state');
        $ship_zip=$this->input->post('ship_zip');
        $ship_phone=$this->input->post('ship_phone');
        $bill_country=$this->input->post('bill_country');
        $bill_fname=$this->input->post('bill_fname');
        $bill_lname=$this->input->post('bill_lname');
        $bill_address=$this->input->post('bill_address');
        $bill_city=$this->input->post('bill_city');
        $bill_state=$this->input->post('bill_state');
        $bill_zip=$this->input->post('bill_zip');
        $bill_phone=$this->input->post('bill_phone');
        $bill_check=$this->input->post('bill_check');
        
        if($user_id != '')
        {
            $where=array('customer_id'=>$user_id);
            $user_details=$this->common_model->selectWhere('tbl_customer',$where);
            $all_cart=$this->cart_model->all_cart($where);
        }
        else if($get_cookie) {
            
            $where = array('cookie_id'=>$get_cookie);
            $all_cart = $this->cart_model->get_cart_cookie($where);
            if($bill_check==1){
            $email = $this->input->post('ship_email');
            }else{
            $email = $this->input->post('bill_email');    
            }
            if($email != ''){
                
                $where = array('email' => $email);
                $user_details = $this->common_model->selectWhere('tbl_customer',$where);
                if (empty($user_details)) {
                        $data = array(
                    	'email' => $email, 
                    	'firstname' => $bill_fname, 
                    	'date_added' => date('Y-m-d H:i:s'), 
                    	'status' => 1, 
                    );
                    if($this->input->post('password'))
                    {
                        $data['password'] = hashcode($this->input->post('password')); 
                    }
                    $user_id = $this->common_model->insertData('tbl_customer', $data);
                }
                
                    //login guest
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

        		$this->session->set_userdata('user_id', $user_id);
	            $this->session->set_userdata('user_fullname', $bill_fname.' '.$bill_lname);
	            $this->session->set_userdata('user_active', 1);
	            //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	            //$this->common_model->userLog($user_id);
                    //login guest code end
                }
            }
            $where=array('customer_id'=>$user_id);
            $all_cart=$this->cart_model->all_cart($where);
            $user_details=$this->common_model->selectWhere('tbl_customer',$where);
            
        
        $shipping=array(
            'shipping_firstname'=>$ship_fname,
            'shipping_lastname'=>$ship_lname,
            'shipping_phone'=>$ship_phone,
            'shipping_address_1'=>$ship_address,
            'shipping_city'=>$ship_city,
            'shipping_state'=>$ship_state,
            'shipping_country'=>$ship_country,
            'shipping_postcode'=>$ship_zip,
        );

        $billing=array(
            'payment_firstname'=>$bill_fname,
            'payment_lastname'=>$bill_lname,
            'payment_phone'=>$bill_phone,
            'payment_address_1'=>$bill_address,
            'payment_city'=>$bill_city,
            'payment_state'=>$bill_state,
            'payment_country'=>$bill_country,
            'payment_postcode'=>$bill_zip,
        );

        $billing_same=array(
            'payment_firstname'=>$ship_fname,
            'payment_lastname'=>$ship_lname,
            'payment_phone'=>$ship_phone,
            'payment_address_1'=>$ship_address,
            'payment_city'=>$ship_city,
            'payment_state'=>$ship_state,
            'payment_country'=>$ship_country,
            'payment_postcode'=>$ship_zip,
        );
        $address_s=array(
            'firstname'=>$ship_fname,
            'lastname'=>$ship_lname,
            'phone'=>$ship_phone,
            'address_1'=>$ship_address,
            'city'=>$ship_city,
            'state'=>$ship_state,
            'country'=>$ship_country,
            'zip'=>$ship_zip,
            'customer_id'=>$user_id,
            'date_added'=>date('Y-m-d H:i:s'),
            'default_ship'=>'1',
        );
        $address_b=array(
            'firstname'=>$bill_fname,
            'lastname'=>$bill_lname,
            'phone'=>$bill_phone,
            'address_1'=>$bill_address,
            'city'=>$bill_city,
            'state'=>$bill_state,
            'country'=>$bill_country,
            'zip'=>$bill_zip,
            'customer_id'=>$user_id,
            'date_added'=>date('Y-m-d H:i:s'),
            'default_bill'=>'1',
        );

        // $address=array(
        //     'firstname'=>$ship_fname,
        //     'lastname'=>$ship_lname,
        //     'phone'=>$ship_phone,
        //     'address_1'=>$ship_address,
        //     'city'=>$ship_city,
        //     'state'=>$ship_state,
        //     'country'=>$ship_country,
        //     'zip'=>$ship_zip,
        //     'customer_id'=>$user_id,
        //     'date_added'=>date('Y-m-d H:i:s')        
        // );
        ////////////////////////////////////////////////////
        if ($user_id) {
            if ($address_id == "") {              
                if($bill_check==1) {                  
                    $this->common_model->insertData('tbl_address',$address_s+array('default_bill'=>'1'));
                } else {
                    $this->common_model->insertData('tbl_address',$address_s);
                    $this->common_model->insertData('tbl_address',$address_b);
                }
            } else {          
                $this->common_model->updateData('tbl_address',$address_s,array('customer_id'=>$user_id,'address_id'=>$address_id));
            }
        }

        foreach ($all_cart as $row) 
        {
            
            $order=array(
                'customer_id'=>$user_id,
                'order_reference'=>rand(1111,9999).time().$user_id,
                'firstname'=>$user_details['0']->firstname,
                'lastname'=>$user_details['0']->lastname,
                'email'=>$user_details['0']->email,
                'telephone'=>$user_details['0']->phone,
                'fax'=>$user_details['0']->fax,
                //'total'=>$row->total_price,
                'date_added'=>date('Y-m-d H:i:s'), 
                'order_status'=>'idle',           
                'is_ring_builder'=>$row->is_ring_builder,           
            );

            $order_total=0;
            $order_id=$this->common_model->insertData('tbl_order',$order);
            $order_id_session[]=$order_id; 

            if($order_id)
            {
                $order_product=array(
                    'order_id'=>$order_id,
                    'product_id'=>$row->product_id,
                    'stock_id'=>$row->stock_id,
                    'order_product_quantity'=>$row->quantity,
                    'product_type'=>$row->product_type,
                    'order_product_price'=>$row->price,
                    'order_product_total'=>$row->total_price,
                    'order_product_name'=>$row->name,
                    'image'=>$row->image,          
                    'cart_attributes'=>$row->attributes,          
                    'cart_info_array'=>$row->info_array,          
                );
                $this->common_model->insertData('tbl_order_product',$order_product);

                $order_total = $order_total + $row->total_price;

                if($row->is_ring_builder) 
                {
                    $cart_diamond=$this->common_model->selectOne('tbl_cart_diamond','cart_id',$row->cart_id);    
                    if(count($cart_diamond)) 
                    {
                        $order_product=array(
                            'order_id'=>$order_id,
                            'product_id'=>$cart_diamond['0']->product_id,
                            'stock_id'=>$cart_diamond['0']->stock_id,
                            'order_product_quantity'=>$cart_diamond['0']->quantity,
                            'product_type'=>$cart_diamond['0']->product_type,
                            'order_product_price'=>$cart_diamond['0']->price,
                            'order_product_total'=>$cart_diamond['0']->total_price,
                            'order_product_name'=>$cart_diamond['0']->name,
                            'image'=>$cart_diamond['0']->image,
                            'cart_attributes'=>$cart_diamond['0']->attributes,          
                            'cart_info_array'=>$cart_diamond['0']->info_array,           
                        );
                        $this->common_model->insertData('tbl_order_product',$order_product);

                        $order_total = $order_total + $cart_diamond['0']->total_price;
                    }              
                }

                $where=array('order_id'=>$order_id);
                $this->common_model->updateData('tbl_order',$shipping,$where);

                $price_data = array('total'=>$order_total);
                $this->common_model->updateData('tbl_order',$price_data,$where);

                if($bill_check==1){
                  $this->common_model->updateData('tbl_order',$billing_same,$where);
                } else {
                  $this->common_model->updateData('tbl_order',$billing,$where);
                }
            }
        }
        if($order_id) {
            $this->session->set_userdata('order_id',$order_id_session);
            redirect(base_url().'checkout-payment');
        }
        redirect(base_url().'cart');
    }
    function payment()
    {
        $where="";    

        $user_id=$this->session->userdata('user_id');
        $order_id=$this->session->userdata('order_id');
        if(!$order_id) {
            redirect(base_url().'cart');
        }
        $where=array('customer_id'=>$user_id);
        $data['all_cart']=$this->cart_model->get_cart($where);
        $data['user_details']=$this->common_model->selectOne('tbl_user','CD_USER_ID',$user_id);
     
        //print_ex($data['diamond_cart']);
        $data['where'] = $where;      
        $data['page_head'] = 'Payment Option'; 

        $this->load->view('common/header',$data);
        $this->load->view('order/order_payment',$data);
        $this->load->view('common/footer');
    }
    function submit_wire()
    {
        $where="";    

        $user_id=$this->session->userdata('user_id');
        $order_id=$this->session->userdata('order_id');
        if(!$order_id) {
            redirect(base_url().'cart');
        }
        $where=array('customer_id'=>$user_id);
        $data['all_cart']=$this->cart_model->get_cart($where);
        $data['user_details']=$this->common_model->selectOne('tbl_user','CD_USER_ID',$user_id);
     
        foreach ($order_id as $key => $value)
        {
            $order=array(
                'payment_status'=>0,
                'payment_method'=>'Wire Bank',
                'order_status'=>'processing',          
            );
            $where=array('order_id'=>$value);
            $this->common_model->updateData('tbl_order',$order,$where);
            $payment = array(
              'user_id'=>$user_id, 
              'product_id'=>$value,
            );
            $this->common_model->insertData('tbl_payments',$payment);
        }
        $this->email($order_id);
        
        redirect('checkout-confirm');
    }
    public function email($order_id)
        {
            $this->load->model('user_model');
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
    function wire_confirm()
    {
        $user_id=$this->session->userdata('user_id');
        $where=array('customer_id'=>$user_id);
        $data['cart']=$this->cart_model->all_cart($where); 
        $data['user_id'] = $user_id;
        $data['user_details']=$this->common_model->selectOne('tbl_user','CD_USER_ID',$user_id);
        $data['shipping'] = $this->common_model->selectOne('tbl_address','customer_id',$user_id);
        
        $data['page_head'] = 'Review and Confirmation'; 

        $this->load->view('common/header');
        $this->load->view('order/order_confirm_wire',$data);
        $this->load->view('common/footer');
    }
    function confirm()
    {
        $user_id=$this->session->userdata('user_id');
        $order_id=$this->session->userdata('order_id');
        if(!$order_id) {
            redirect(base_url().'cart');
        }
        foreach ($order_id as $key => $value)
        {
            $order=array(
                'order_status'=>'processing',          
            );
            $where=array('order_id'=>$value);
            $this->common_model->updateData('tbl_order',$order,$where);
            //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
            $query=$this->db->query('select P.product_quantity, P.product_subtract_stock, OP.order_product_quantity 
                from tbl_order_product as OP
                join tbl_product as P on OP.product_id=P.product_id where OP.order_id='.$value.'');
            $product_details=$query->result();
            foreach ($product_details as $row) {
                if ($row->product_subtract_stock=='yes') {
                    $pro=array(
                        'product_quantity'=>$row->product_quantity-$row->order_product_quantity,          
                    );
                    $where=array('product_id'=>$row->product_id);
                    $this->common_model->updateData('tbl_product',$pro,$where);
                }            
            }
        }
      
        $where=array('customer_id'=>$user_id);
        if(is_array($order_id)){
            $order_id = implode(',',$order_id);
        }
             $query=$this->db->query('select O.order_reference, OP.order_product_quantity, OP.order_product_name,OP.stock_id from tbl_order_product as OP join tbl_order as O on OP.order_id=O.order_id where OP.order_id IN ('.$order_id.')');
            $order_details=$query->result();

        $this->common_model->deleteData('tbl_cart',$where);      
        $this->session->unset_userdata('order_id');

        //print_ex($data['diamond_cart']);
        $data['page_head'] = 'Order Confirmation'; 
        $data['order_details'] =  $order_details;      

        $this->load->view('common/header');
        $this->load->view('order/order_confirm',$data);
        $this->load->view('common/footer');
    }
    function get_state()
    {
        $country=$this->input->get('country');
        $country_name=$this->common_model->selectWhere('countries',array('name'=>$country));
        $states=$this->common_model->selectWhere('states',array('country_id'=>$country_name['0']->id));
        echo json_encode(array('records'=>$states));
    }  
    function checkout_register() {
        $user_id=$this->session->userdata('user_id');
        if ($user_id) {
            redirect(base_url().'checkout');
        }
        $data['page_head'] = 'Checkout Login'; 
        $data['title'] = 'User | Login';

        $this->load->view('common/header', $data);
        $this->load->view('order/ckeckout_register');
        $this->load->view('common/footer');
    }
    function signup_submit() {
        $this->form_validation->set_rules('fname', 'fName', 'trim|required');
        $this->form_validation->set_rules('lname', 'lName', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules('password_confirm', 'Password Confirmation', 'trim|required|matches[password]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error_message', 'Please Fill the Form Correctly!');
            redirect($_SERVER['HTTP_REFERER']);
        }
        $fname = $this->input->post('fname');
        $lname = $this->input->post('lname');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $where = array('email' => $email);
        $result = $this->common_model->selectWhere('tbl_customer',$where);

        if (count(array_filter($result))) {
            $this->session->set_flashdata('error_message', 'User Exist!');
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $data = array(
                'email' => $email, 
                'firstname' => $fname, 
                'lastname' => $lname, 
                'password' => hashcode($password), 
                'date_added' => date('Y-m-d H:i:s'), 
                'status' => 1, 
                'email_verify' => hashcode($email)
            );
            $user_id = $this->common_model->insertData('tbl_customer', $data);

            $this->session->set_userdata('user_id', $user_id);
            $this->session->set_userdata('user_fullname', $fname.' '.$lname);
            $this->session->set_userdata('user_active', 1); 

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
                        'customer_id'=>$user_id,
                    );
                    $cart_id = $this->common_model->insertData('tbl_cart',$cart_data);

                    if ($cookie->is_ring_builder=='1') 
                    {
                        $cookie_diamond=$this->common_model->selectWhere('tbl_cart_cookie_diamond',array('cart_id' => $cookie->cart_cookie_id));
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
            }           
            
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
}