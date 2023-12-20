<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin_return extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('image_lib');
        $this->load->model('order_model');
        if ($this->session->userdata('jw_admin_id')=="")
        {
            redirect(base_url().'admin_login');
        }
    }
    function index()
    {
        $data['filter_return_status_list']=$this->admin_model->selectAll('tbl_return_status');

        //print_ex($data);
        $data['active']="return";
        $this->load->view('common/header');
        $this->load->view('common/sidebar',$data);
        $this->load->view('return/return_list_view',$data);
        $this->load->view('common/footer');
    }
    function loadData()
    {
        $page=$this->input->get('page');
        $per_page=$this->input->get('per_page');
        //$filter_status=$this->input->get('filter_status');

        $filter_return_id=$this->input->get('filter_return_id');
        $filter_order_id=$this->input->get('filter_order_id');
        $filter_customer=$this->input->get('filter_customer');
        $filter_product=$this->input->get('filter_product');
        $filter_model=$this->input->get('filter_model');
        $filter_return_status=$this->input->get('filter_return_status');

        $where ='return_id > 0';
        if($filter_return_id!="")
        {
            $where .=' AND return_id = "'.$filter_return_id.'"';
        } 
        if($filter_order_id!="")
        {
            $where .=' AND order_id = "'.$filter_order_id.'"';
        }
        if($filter_customer!="")
        {
            $where .=' AND R.firstname = "'.$filter_customer.'"';
        }
        if($filter_return_status!="")
        {
            $where .=' AND return_status = "'.$filter_return_status.'"';
        }         
        if($filter_product!="")
        {
            $where .=' AND product = "'.$filter_product.'"';
        } 
        if($filter_model!="")
        {
            $where .=' AND model = "'.$filter_model.'"';
        }        

        //print_ex($where);

        $order_by=' ORDER BY return_id ';
        //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
        $return_total=$this->order_model->returnTotal($where,$order_by);
        $data['return_count'] =$return_total['0']->return_count;         
        
        $per_page= ($per_page) ? $per_page : 100 ;
        $config['base_url'] = base_url().'admin_return/loadData';
        $config["total_rows"] = $data['return_count'];
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

        $records=$this->order_model->return_list($per_page,$page,$where,$order_by);

        echo json_encode(array('records'=>$records,'page_link'=>$page_link,'total_records'=>$data['return_count']));      
    }
    function return_details($return_id)
    {
        $data['status_list']=$this->admin_model->selectAll('tbl_return_status');
        $data['return_details']=$this->order_model->return_details($return_id);
        $data['status_history']=$this->admin_model->selectWhere('tbl_return_history',array('return_id'=>$return_id));

        //print_ex($data);
        $data['active']="return";
        $this->load->view('common/header');
        $this->load->view('common/sidebar',$data);
        $this->load->view('return/return_details_view',$data);
        $this->load->view('common/footer');
    }

    function add_return_history()
    {
        $return_id=$this->input->post('return_id');     
        $return_status=$this->input->post('return_status');      
        $comment=$this->input->post('comment');      
        $notify_customer=$this->input->post('notify_customer');
        $notify=0;
        if($notify_customer)
        {
            $notify=1;
        }
        $data=array(
            'return_id' =>$return_id,
            'status' =>$return_status,
            'comment' =>$comment,
            'notify' =>$notify,
            'date_added' =>date('Y-m-d H:i:s'),
        );               
        $id=$this->admin_model->insertData('tbl_return_history',$data);
        if($id)
        {
            $data1=array(
                'return_status' =>$return_status,
                'date_modified' =>date('Y-m-d H:i:s'),
            );  
            $where=array('return_id'=>$return_id);
            $this->admin_model->updateData('tbl_return',$data1,$where);
        }

        $this->session->set_flashdata('success','History Added Successfully!');
        redirect(base_url()."admin_return/return_details/".$return_id);
    }
    function loadFilter()
    {
        $searchText=$this->input->get('searchText');
        $select=$this->input->get('select');
        $where=array(
            $select=>$searchText
        );        
        $data=$this->admin_model->getFilter($select,'tbl_return',$where);
        echo json_encode(array('list'=>$data));
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
                    'return_status' =>$action,
                    'date_modified' =>date('Y-m-d H:i:s'),
                );               

                $where=array('return_id'=>$row);
                $this->admin_model->updateData('tbl_return',$data,$where);              

            }
            $message='Status Has Been Updated!';
        }

        echo json_encode(array('message'=>$message));
    }
    


}
?>
