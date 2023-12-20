<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {

	public function __construct()
	{
	  parent::__construct();	 
	  //$this->load->library('pagination'); 
	  $this->load->model('cart_model');	
    if($this->session->userdata('user_id')=="")
    {
        redirect(base_url());
    }
	}	
	function index()
	{	
      $where="";    

      $user_id=$this->session->userdata('user_id');
      
      $data['address']=$this->common_model->selectWhere('tbl_address',array('customer_id'=>$user_id));
      $data['shipping_address']=$this->common_model->selectWhere('tbl_address',array('customer_id'=>$user_id,'default_ship'=>'1'));
      $data['billing_address']=$this->common_model->selectWhere('tbl_address',array('customer_id'=>$user_id,'default_bill'=>'1'));

      $country_name=$this->common_model->selectWhere('countries',array('name'=>@$data['shipping_address']['0']->country));
      $data['ship_states']=$this->common_model->selectWhere('states',array('country_id'=>@$country_name['0']->id));

      $country_name=$this->common_model->selectWhere('countries',array('name'=>@$data['billing_address']['0']->country));
      $data['bill_states']=$this->common_model->selectWhere('states',array('country_id'=>@$country_name['0']->id));

      $data['country']=$this->common_model->selectAll('countries');

      $where=array('customer_id'=>$user_id);
      $data['all_cart']=$this->cart_model->get_cart($where);
      if($data['all_cart']['total_price']<1){
        redirect(base_url().'cart');
      }
      $data['page_head'] = 'Shipping Address';      
      $data['where'] = $where;      

			$this->load->view('common/header',$data);
			$this->load->view('order/order_address',$data);
			$this->load->view('common/footer');
	}
  function address_submit()
  {
      $user_id=$this->session->userdata('user_id');
      $where=array('customer_id'=>$user_id);
      $user_details=$this->common_model->selectWhere('tbl_customer',$where);
      $all_cart=$this->cart_model->all_cart($where);
      //print_ex($all_cart);
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
      
      $address=array(
        'firstname'=>$ship_fname,
        'lastname'=>$ship_lname,
        'phone'=>$ship_phone,
        'address_1'=>$ship_address,
        'city'=>$ship_city,
        'state'=>$ship_state,
        'country'=>$ship_country,
        'zip'=>$ship_zip,
        'customer_id'=>$user_id,
        'date_added'=>date('Y-m-d H:i:s')        
      );
////////////////////////////////////////////////////
      if($address_id==""){              
          if($bill_check==1){                  
              $this->common_model->insertData('tbl_address',$address_s+array('default_bill'=>'1'));
          }
          else{
              $this->common_model->insertData('tbl_address',$address_s);
              $this->common_model->insertData('tbl_address',$address_b);
          }
      } else {          
          $this->common_model->updateData('tbl_address',$address_s,array('customer_id'=>$user_id,'address_id'=>$address_id));
      }
////////////////////////////////////////////////////
      // $check_address_s=$this->common_model->selectWhere('tbl_address',array('customer_id'=>$user_id));
      // if(!count(array_filter($check_address_s))){
      //     if($address_id==""){              
      //         if($bill_check==1){                  
      //             $this->common_model->insertData('tbl_address',$address_s+array('default_bill'=>'1'));
      //         }
      //         else{
      //             $this->common_model->insertData('tbl_address',$address_s);
      //             $this->common_model->insertData('tbl_address',$address_b);
      //         }
      //     }
      // }
      // else{
      //     if($address_id==""){              
      //         if($bill_check==1){                  
      //             $this->common_model->insertData('tbl_address',$address_s+array('default_bill'=>'1'));
      //         }
      //         else{
      //             $this->common_model->insertData('tbl_address',$address_s);
      //             $this->common_model->insertData('tbl_address',$address_b);
      //         }
      //     }
      //     $this->common_model->updateData('tbl_address',$address_s,array('customer_id'=>$user_id,'address_type'=>'shipping'));
      // }
      // $check_address_b=$this->common_model->selectWhere('tbl_address',array('customer_id'=>$user_id,'address_type'=>'billing'));
      // if(!count(array_filter($check_address_b)))
      // { 
      //     if($bill_check==1){
      //         $this->common_model->insertData('tbl_address',$address_s+array('address_type'=>'billing'));
      //     }
      //     else{
      //         $this->common_model->insertData('tbl_address',$address_b);
      //     }
      // }
      // else
      // {
      //     if($bill_check==1){
      //         $this->common_model->updateData('tbl_address',$address_s+array('address_type'=>'billing'),array('customer_id'=>$user_id,'address_type'=>'billing'));
      //     }
      //     else{
      //         $this->common_model->updateData('tbl_address',$address_b,array('customer_id'=>$user_id,'address_type'=>'billing'));
      //     }
      // }
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
            'total'=>$row->total_price,
            'date_added'=>date('Y-m-d H:i:s'), 
            'order_status'=>'idle'           
          );

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
                'image'=>$row->image          
              );
              $this->common_model->insertData('tbl_order_product',$order_product);

              $where=array('order_id'=>$order_id);
              $this->common_model->updateData('tbl_order',$shipping,$where);
              if($bill_check==1){
                  $this->common_model->updateData('tbl_order',$billing_same,$where);
              }
              else{
                  $this->common_model->updateData('tbl_order',$billing,$where);
              }
          }
      }
      if($order_id)
      {
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
      if(!$order_id)
      {
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
	function confirm()
  {
      $user_id=$this->session->userdata('user_id');
      $order_id=$this->session->userdata('order_id');
      if(!$order_id)
      {
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
              if($row->product_subtract_stock=='yes'){
                  $pro=array(
                    'product_quantity'=>$row->product_quantity-$row->order_product_quantity,          
                  );
                  $where=array('product_id'=>$row->product_id);
                  $this->common_model->updateData('tbl_product',$pro,$where);
              }            
          }
      }
      
      $where=array('customer_id'=>$user_id);
      $this->common_model->deleteData('tbl_cart',$where);      
      $this->session->unset_userdata('order_id');

      //print_ex($data['diamond_cart']);
      $data['page_head'] = 'Order Confirmation';
      $data['where'] = $where;      

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
  
}
