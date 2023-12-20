<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class admin_dashboard extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
         $this->load->database();
         $this->load->model('dashboard_model');
        if ($this->session->userdata('jw_admin_id')=="")
        {
            redirect(base_url().'admin_login');
        }
    }
    function index()
    { 

            
        $user_id=$this->session->userdata('jw_admin_id');      
        $group_id=$this->session->userdata('jw_admin_group'); 

        if($user_id != 1){
            $where = ' and sales_person_id ='.$user_id.'';  
        }else{
            $where = '';   
        }

        $whered="diamond_id > 0 ";    
        $wherep="product_id > 0  AND product_status!='delete' ";    
        $whereo ='O.order_id > 0  AND order_status != "idle" ';
        $wherec ='customer_id > 0 '.$where;       
        // if($group_id!='1'){
        //     $whered .="AND created_by ='".$user_id."'";
        //     $wherep .="AND seller_id ='".$user_id."' AND product_status!='delete' ";            
        //     $whereo .="AND CD_USER_ID ='".$user_id."'";
        // }
        $data['admin_detail']=$this->admin_model->selectOne('tbl_user','CD_USER_ID',$user_id);
        $data['product_total']=$this->dashboard_model->product_total($wherep);
        $data['order_total']=$this->dashboard_model->order_total($whereo);
        //$data['sale_total']=$this->dashboard_model->sale_total('');
        $data['customer_total']=$this->dashboard_model->customer_total($wherec);       
        $data['diamond_total']=$this->dashboard_model->diamond_total($whered);
        //print_ex($data);
        $this->load->view('common/header',$data);
        $this->load->view('common/sidebar');
        $this->load->view('dashboard/dashboard');
        $this->load->view('common/footer');
    }
}
?>
