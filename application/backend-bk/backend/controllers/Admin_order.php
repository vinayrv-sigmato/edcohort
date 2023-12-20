<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin_order extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('order_model');
        if ($this->session->userdata('jw_admin_id')=="")
        {
            redirect(base_url().'admin_login');
        }
    }
    function index()
    {
        $data['filter_order_status_list']=$this->admin_model->selectAll('tbl_order_status');

        //print_ex($data);
        $data['active']="order";
        $this->load->view('common/header');
        $this->load->view('common/sidebar',$data);
        $this->load->view('order/order_list_view',$data);
        $this->load->view('common/footer');
    }
    function loadData()
    {
        $page=$this->input->get('page');
        $per_page=$this->input->get('per_page');
        //$filter_status=$this->input->get('filter_status');
        $user_id=$this->session->userdata('jw_admin_id');      
        $group_id=$this->session->userdata('jw_admin_group');

        $filter_order_id=$this->input->get('filter_order_id');
        $filter_customer=$this->input->get('filter_customer');
        $filter_order_status=$this->input->get('filter_order_status');
        $filter_total=$this->input->get('filter_total');

        $where ='O.order_id > 0  AND order_status != "idle" ';
        if($group_id!='1'){
            $where .=" AND seller_id ='".$user_id."'";
        }
        if($filter_order_id!="")
        {
            $where .=' AND order_reference = "'.$filter_order_id.'"';
        }
        if($filter_customer!="")
        {
            $where .=' AND firstname = "'.$filter_customer.'"';
        }
        if($filter_order_status!="")
        {
            $where .=' AND order_status = "'.$filter_order_status.'"';
        }        
        if($filter_total!="")
        {
            $splittotal = explode(';', $filter_total);
            $splittotal1 = $splittotal['0'];
            $splittotal2 = @$splittotal['1'];

            $where .= " AND total BETWEEN ('".$splittotal1."') AND ('".$splittotal2."')";
        }
        //print_ex($filter_total);

        $order_by=' ORDER BY O.order_id Desc';
        //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
        $order_total=$this->order_model->orderTotal($where,$order_by);
        $data['order_count'] =$order_total['0']->order_count;
        
        $per_page= ($per_page) ? $per_page : 100 ;
        $config['base_url'] = base_url().'admin_order/loadData';
        $config["total_rows"] = $data['order_count'];
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

        $records=$this->order_model->order_list($per_page,$page,$where,$order_by);

        echo json_encode(array('records'=>$records,'page_link'=>$page_link,'total_records'=>$data['order_count']));      
    }
    function order_details($order_id)
    {
        $data['status_list'] = $this->admin_model->selectAll('tbl_order_status');
        $data['order_details'] = $this->order_model->order_details($order_id);
        $data['status_history'] = $this->admin_model->selectWhere('tbl_order_status_history',array('order_id'=>$order_id));

        foreach ($data['order_details'] as $row) 
        {
            if ($row->is_ring_builder) {
                $cart_diamond = $this->admin_model->selectWhere('tbl_order_product',array('order_id'=>$row->order_id,'product_type'=>'diamond'));
                if (count($cart_diamond)) {
                    $row->diamond_attach = $cart_diamond;
                }
            } else {
                $row->diamond_attach = array();
            }      
        }

        //print_ex($data['order_details']);
        $data['active']="order";
        $this->load->view('common/header');
        $this->load->view('common/sidebar',$data);
        $this->load->view('order/order_details_view',$data);
        $this->load->view('common/footer');
    }

    function add_order_history()
    {
        //print_pre($this->input->post());
        $order_id=$this->input->post('order_id');     
        $order_status=$this->input->post('order_status');      
        $comment=$this->input->post('comment');      
        $notify_customer=$this->input->post('notify_customer');
        $notify=0;
        if($notify_customer)
        {
            $notify=1;
        }
        $data=array(
            'order_id' =>$order_id,
            'status' =>$order_status,
            'comment' =>$comment,
            'notify' =>$notify,
            'date' =>date('Y-m-d H:i:s'),
        );               
        $id=$this->admin_model->insertData('tbl_order_status_history',$data);
        if($id)
        {
            $data1=array(
                'order_status' =>$order_status,
                'date_modified' =>date('Y-m-d H:i:s'),
            );  
            $where=array('order_id'=>$order_id);
            $this->admin_model->updateData('tbl_order',$data1,$where);
        }

        $this->session->set_flashdata('success','History Added Successfully!');
        redirect(base_url()."admin_order/order_details/".$order_id);
    }
    function action()
    {
        $id=$this->input->post('id');
        $action=$this->input->post('action');
        $message='';
        if($action!="")
        {
            foreach($id as $row)
            {
                $data=array(
                    'order_id' =>$row,
                    'status' =>$action,
                    'comment' =>'',
                    'notify' =>0,
                    'date' =>date('Y-m-d H:i:s'),
                );               
                $returnid=$this->admin_model->insertData('tbl_order_status_history',$data);
                if($returnid)
                {
                    $data1=array(
                        'order_status' =>$action,
                        'date_modified' =>date('Y-m-d H:i:s'),
                    );  
                    $where=array('order_id'=>$row);
                    $this->admin_model->updateData('tbl_order',$data1,$where);
                }
            }
            $message='Status Has Been Updated!';
        }
        echo json_encode(array('message'=>$message));
    }
    function wire_email($order_id)
    {
        // $data1=array(
        //                 'order_status' =>'Pending',
        //                 'date_modified' =>date('Y-m-d H:i:s'),
        //         );  
        // $where=array('order_id'=>$order_id);
        // $this->admin_model->updateData('tbl_order',$data1,$where);
        $data['order_details'] = $this->order_model->order_details($order_id);
        $data['status_history'] = $this->admin_model->selectWhere('tbl_order_status_history',array('order_id'=>$order_id));

        foreach ($data['order_details'] as $row) 
        {
            if ($row->is_ring_builder) {
                $cart_diamond = $this->admin_model->selectWhere('tbl_order_product',array('order_id'=>$row->order_id,'product_type'=>'diamond'));
                if (count($cart_diamond)) {
                    $row->diamond_attach = $cart_diamond;
                }
            } else {
                $row->diamond_attach = array();
            }      
        }

        $data['active']="order";
        $this->load->view('common/header');
        $this->load->view('common/sidebar',$data);
        $this->load->view('order/wire_bank_info',$data);
        $this->load->view('common/footer');
    }


}
?>
