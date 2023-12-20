<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mywishlist extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        $this->load->model('cart_model');
        $this->load->model('jewelry_model');
        if($this->session->userdata('user_id')=="")
        {
            $this->session->set_flashdata('error_message', 'Please Login!');
            redirect(base_url('login'));
        }

    }
    
    public function index()
    {   
        $user_id=$this->session->userdata('user_id');

        $where=array('customer_id'=>$user_id); 
        $data['wishlist']=$this->wishlist_model->all_wishlist($where); 
        foreach ($data['wishlist'] as $row) 
        {   
            if($row->product_type=='jewelry'){
                $where = "product_id = ".$row->product_id;
                $records= $this->jewelry_model->jewelry_list($where);
                
                //print_pre($records);
                //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
                $product_price_arr=$this->product_price($row->product_id);
                if(!$product_price_arr['price_var'] && $product_price_arr['price']){
                  $row->product_price_show='$'.$product_price_arr['price'];
                }else{
                  $row->product_price_show='$'.$product_price_arr['price_min'].'-$'.$product_price_arr['price_max'];
                }
                if(count($records)){
                    $row->product_slug=$records['0']->product_slug;

                    $row->product_sale_price=$records['0']->product_sale_price;
                    $row->product_price=$records['0']->product_price;
                    if($records['0']->product_subtract_stock == 'yes' && $records['0']->product_quantity < 1){
                        $row->product_available=0;
                    }else{
                        $row->product_available=1;
                    }                
                }else{
                    $row->product_available=0;
                    $row->product_sale_price=0;
                    $row->product_price=0;
                    $row->product_slug=$row->stock_id;
                }
            }else{
                $row->product_price_show=$row->total_price;
                $row->product_available=1;
                $row->product_sale_price=0;
                $row->product_price=0;
                $row->product_slug=$row->product_id;
            }
        }
        //print_ex($data['wishlist']);
        $data['page_head'] = 'Wishlist Details';    
        $this->load->view('common/header',$data);
        $this->load->view('wishlist/wishlist',$data);
        $this->load->view('common/footer');
    }
    function delete_wishlist()
    {
            $type=$this->uri->segment('2');
            $wishlist_id=$this->uri->segment('3');
            // if($type=='diamond')
            // {
            //  $product_type='diamond';
            // }
            // else if($type=='watch')
            // {
            //  $product_type='watch';
            // }
            // else if($type=='jewelry')
            // {
            //  $product_type='jewelry';
            // }
            $where=array(
                'wishlist_id'=>$wishlist_id,
                'product_type'=>$type
            );
            //print_ex($where);
            $this->common_model->deleteData('tbl_wishlist',$where);

            $this->session->set_flashdata('alert_message', 'Wishlist Item Deleted Successfully!');
            redirect(base_url().'wishlist');
    }
    function product_price($product_id){
        $price=0;
        $price_min=0;
        $price_max=0;
        $price_var=0;

        $where="product_id='".$product_id."' ";
        $product_details=$this->common_model->selectWhere('tbl_product',$where);
        if($product_details['0']->product_sale_price>0){
          $price=$product_details['0']->product_sale_price;
        }else{
          $price=$product_details['0']->product_price;
        }   

        $where="product_id='".$product_id."' and is_active='1'";
        $variation_price_min=$this->jewelry_model->variation_price_min($where);
        $variation_price_max=$this->jewelry_model->variation_price_max($where);
        if($variation_price_min['0']->min_price){
          $price_min=$variation_price_min['0']->min_price;
        }
        if($variation_price_max['0']->max_price){
          $price_max=$variation_price_max['0']->max_price;
        }
        if(($price_min!=$price_max) && $price_min && $price_max){
          $price_var=1;
        }
        $result= array(
                'price'=>$price,
                'price_min'=>$price_min,
                'price_max'=>$price_max,
                'price_var'=>$price_var
              );
        return $result;
      }

      function wishlist_diamond()
      {
         $user_id=$this->session->userdata('user_id');

        $where=array('customer_id'=>$user_id); 
        $data['wishlist']=$this->wishlist_model->all_wishlist_diamond($where); 
        
        //print_ex($data['wishlist']);
        $data['page_head'] = 'Wishlist Details';    
        $this->load->view('common/header',$data);
        $this->load->view('wishlist/wishlist_diamond',$data);
        $this->load->view('common/footer');
      }
      function delete_wishlist_diamond()
    {
            
         $wishlist_id=$this->uri->segment('3');
         //$wishlist_id=$this->input->get('diamond_wish_id');


             $where=array(
                 'diamond_wish_id'=>$wishlist_id,
                 'product_choice'=>2,
             );
             //print_ex($where);
             $this->common_model->deleteData('tbl_wish_cart_diamond',$where);

             $this->session->set_flashdata('alert_message', 'Wishlist Item Deleted Successfully!');
             redirect(base_url().'wishlist-diamond');
    }
    
}

