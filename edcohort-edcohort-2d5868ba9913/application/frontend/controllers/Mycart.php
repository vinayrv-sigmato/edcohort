<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mycart extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        $this->load->model('cart_model');
        $this->load->model('jewelry_model');
        // if($this->session->userdata('user_id')=="")
        // {
        //  redirect(base_url());
        // }
    }
    
    public function index()
    {  
        $user_id=$this->session->userdata('user_id');
        $data['cart']=array();
        if($user_id){
            $where=array('customer_id'=>$user_id);
            $data['cart']=$this->cart_model->all_cart($where);             
        }else{
            $get_cookie=get_cookie('fc_cart_cookie');
            if($get_cookie!="")
            {
                $where=array('cookie_id'=>$get_cookie);
                $data['cart']=$this->cart_model->all_cart_cookie($where);
            }
        }

        $data['page_head'] = 'Cart Details';    
        $this->load->view('common/header',$data);
        $this->load->view('cart/cart',$data);
        $this->load->view('common/footer');
    }
    function delete_cart()
    {
        $user_id=$this->session->userdata('user_id');
        $type=$this->uri->segment('2');
        $cart_id=$this->uri->segment('3');

        if($user_id){
            $where=array(
                'cart_id'=>$cart_id,
                'product_type'=>$type
            );
            $this->common_model->deleteData('tbl_cart',$where);
        } else {
            $where=array(
                'cart_cookie_id'=>$cart_id,
                'product_type'=>$type
            );
            $this->common_model->deleteData('tbl_cart_cookie',$where);
        }

        $this->session->set_flashdata('alert_message', 'Cart Item Deleted Successfully!');
        redirect(base_url().'cart');
    }
    function update_cart_quantity()
    {
        $user_id=$this->session->userdata('user_id');
        $cart_id=$this->input->post('cart_id');
        $quantity=$this->input->post('quantity');

        $this->form_validation->set_rules('quantity', 'Quantity', 'trim|required|integer|greater_than[0]|less_than[11]');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('alert_message', 'Sorry! Something Went Wrong.');
            redirect(base_url().'cart');
        }

        if($user_id) {
            $where=array(
                'cart_id'=>$cart_id,
            );
            $cart_details=$this->common_model->selectWhere('tbl_cart',$where);
            if(count($cart_details))
            {
                $total_price=round($cart_details['0']->price*$quantity);
                $data=array(
                    'quantity'=>$quantity,
                    'total_price'=>$total_price,
                );
                $this->common_model->updateData('tbl_cart',$data,$where);
                $this->session->set_flashdata('alert_message', 'Cart Item Updated Successfully!');
            }
        } else {
            $where=array(
                'cart_cookie_id'=>$cart_id,
            );
            $cart_details=$this->common_model->selectWhere('tbl_cart_cookie',$where);
            if(count($cart_details))
            {
                $total_price=round($cart_details['0']->price*$quantity);
                $data=array(
                    'quantity'=>$quantity,
                    'total_price'=>$total_price,
                );
                $this->common_model->updateData('tbl_cart_cookie',$data,$where);
                $this->session->set_flashdata('alert_message', 'Cart Item Updated Successfully!');
            }
        }
        redirect(base_url().'cart');
    } 

    function cart_diamond()
     {  
        $user_id=$this->session->userdata('user_id');
        $data['cart']=array();
        if($user_id){
            $where=array('customer_id'=>$user_id);
            $data['cart']=$this->cart_model->all_cart_diamond($where);             
        }else{
            $get_cookie=get_cookie('fc_cart_cookie');
            if($get_cookie!="")
            {
                $where=array('cookie_id'=>$get_cookie);
                $data['cart']=$this->cart_model->all_cart_cookie($where);
            }
        }


        $data['page_head'] = 'Cart Details';    
        $this->load->view('common/header',$data);
        $this->load->view('cart/cart_diamond',$data);
        $this->load->view('common/footer');
    }
    function delete_cart_diamond()
    {
        $user_id=$this->session->userdata('user_id');
        $type=$this->uri->segment('2');
        $cart_id=$this->uri->segment('3');

        if($user_id){
            $where=array(
                'diamond_wish_id'=>$cart_id,
                'product_choice'=>1
            );
            $this->common_model->deleteData('tbl_wish_cart_diamond',$where);
        } 

        $this->session->set_flashdata('alert_message', 'Cart Item Deleted Successfully!');
        redirect(base_url().'cart-diamond');
    }   
    
}