<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_currency extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('image_lib');
        $this->load->model('common_model');
        $this->load->model('currency_model');
        if ($this->session->userdata('jw_admin_id')=="")
        {
            redirect(base_url().'admin_login');
        }
    }
    function index()
    {
        //$data['filter_product_list']=$this->product_model->product_list_total(array());

        //print_ex($data);
        $data['active']="currency";
        $this->load->view('common/header');
        $this->load->view('common/sidebar',$data);
        $this->load->view('currency/currency_list_view',$data);
        $this->load->view('common/footer');
    }
    function loadData()
    {
        $page=$this->input->get('page');
        $per_page=$this->input->get('per_page');
        //$filter_status=$this->input->get('filter_status');
        $user_id=$this->session->userdata('jw_admin_id');      
       

        $filter_status=$this->input->get('filter_status');

       
       
        $where = " currency_id > 0";

        $order_by=' ORDER BY currency_id ';
        //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
        $product_total=$this->currency_model->currencyTotal($where,$order_by);
        $data['product_count'] =$product_total['0']->product_count;         
        
        $per_page= ($per_page) ? $per_page : 100 ;
        $config['base_url'] = base_url().'admin_product/loadData';
        $config["total_rows"] = $data['product_count'];
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

        $records=$this->currency_model->product_list($per_page,$page,$where,$order_by);
       

        echo json_encode(array('records'=>$records,'page_link'=>$page_link,'total_records'=>$data['product_count']));      
    }
   
    function add_currency()
    {
        
        $data['active']="currency";
        $this->load->view('common/header');
        $this->load->view('common/sidebar',$data);
        $this->load->view('currency/currency_add_view');
        $this->load->view('common/footer');
    }
    function add_currency_submit()
    {
        
        $POST=$this->input->post();        

        $user_id=$this->session->userdata('jw_admin_id');
        
        //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
        $data=array(
                'currency_name'=>$this->input->post("title_1"),                
                'currency_value'=>$this->input->post("title_2"),               
                'status'=>$this->input->post("status"),
        );
        $product_id=$this->admin_model->insertData('tbl_currency',$data);
      
        redirect(base_url()."admin_currency");
    }
    function edit_currency($product_id)
    {
        $user_id=$this->session->userdata('jw_admin_id');
       
        //print_ex($user_details);
        $option_array=array();
        $category_array=array();
        $diamond_shape_array=array();
        $data['product_detail']=$this->currency_model->product_details($product_id);

        $where=array('currency_id'=>$product_id);
        
        $data['active']="currency";
        $this->load->view('common/header');
        $this->load->view('common/sidebar',$data);
        $this->load->view('currency/currency_edit_view',$data);
        $this->load->view('common/footer');
    }
    function edit_product_submit()
    {
       
        $user_id=$this->session->userdata('jw_admin_id');
       
        $POST=$this->input->post();
        $product_id=$this->input->post('currency_id');       
        
        
        if($product_id)
        {
            if(!empty($product_image)){

            $where=array('currency_id'=>$product_id);
            $data=array(
                'currency_name'=>$this->input->post("title_1"),                
                'currency_value'=>$this->input->post("title_2"),
                'status'=>$this->input->post("status"),
                
            );

            }else{

                 $where=array('currency_id'=>$product_id);
            $data=array(
                'currency_name'=>$this->input->post("title_1"),                
                'currency_value'=>$this->input->post("title_2"),
                'status'=>$this->input->post("status"),
                );
            }
            $this->admin_model->updateData('tbl_currency',$data,$where);
           
        }
        $this->session->set_flashdata('success','currency Updated Successfully!');
        redirect(base_url()."admin_currency");
    }
    
    function product_action()
    {
        $product_id=$this->input->post('currency_id');
        $action=$this->input->post('action');
        //$product_id=explode(',',$product_id);
        $message='';
        if($action=="active")
        {
            $data=array('status'=>'active');
            foreach($product_id as $product)
            {
                $where=array('currency_id'=>$product);
                $this->admin_model->updateData('tbl_currency',$data,$where);
            }
            $message='Status Has Been Updated!';
        }
        if($action=="inactive")
        {
            $data=array('status'=>'inactive');
            foreach($product_id as $product)
            {
                $where=array('currency_id'=>$product);
                $this->admin_model->updateData('tbl_currency',$data,$where);
            }
            $message='Status Has Been Updated!';
        }
        if($action=="delete")
        {
            $data=array('status'=>'delete');
            foreach($product_id as $product)
            {
                $where=array('currency_id'=>$product);
                $this->admin_model->deleteData('tbl_currency',$where);
            }
            $message='currency Has Been Deleted!';
        }        
        if($action=="sale")
        {
            $data=array('product_sale_allow'=>'yes');
            foreach($product_id as $product)
            {
                $where=array('currency_id'=>$product);
                $this->admin_model->updateData('tbl_currency',$data,$where);
            }
            $message='Product Has Been Updated!';
        }
        echo json_encode(array('message'=>$message));
    }
    
    function removeImage()
    {
       echo json_encode('ok');
    } 
    function loadFilter()
    {
        $searchText=$this->input->get('searchText');
        $select=$this->input->get('select');
        $where=array(
            $select=>$searchText
        );        
        $data=$this->admin_model->getFilter($select,'tbl_product',$where);
        echo json_encode(array('list'=>$data));
    }  
   
    
    //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    
   
    

}
?>
