<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_subscribe extends CI_Controller {

	public function __construct()
  {
      parent::__construct();
      
      $this->load->model('subscribe_model');
      $this->load->model('common_model');
      if($this->session->userdata('jw_admin_id')=="")
      {
      	redirect(base_url().'admin_login');
      }
  }
	public function index()
	{	

		 $where ='id > 0'; 
         $order_by=' ORDER BY id DESC';
         $data['records']=$this->subscribe_model->subscribe_list($where,$order_by);

		 $data['active'] = "subscribe";
        $this->load->view('common/header');
        $this->load->view('common/sidebar', $data);
        $this->load->view('subscribe/subscribe_list');
        $this->load->view('common/footer');
	}

	 function loadData()
    {
        //echo "hjk"; die;
        $page=$this->input->get('page');
        $per_page=$this->input->get('per_page');

        $filter_name=$this->input->get('filter_name');
        $filter_email=$this->input->get('filter_email');
        $filter_phone=$this->input->get('filter_phone');
        $filter_status=$this->input->get('filter_status');
         $filter_stock=$this->input->get('filter_stock');

        $where ='id > 0';       
        if($filter_name!="")
        {
            $where .=' AND testimonial_by = "'.$filter_name.'"';
        }
        if($filter_email!="")
        {
            $where .=' AND email = "'.$filter_email.'"';
        }
        if($filter_phone!="")
        {
            $where .=' AND mobile = "'.$filter_phone.'"';
        }
        if($filter_status!="")
        {
            $where .=' AND status = "'.$filter_status.'"';
        }
        if($filter_stock!="")
        {
            $where .=' AND stock_name = "'.$filter_stock.'"';
        }

        $order_by=' ORDER BY id DESC';
        //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
        $enquiry=$this->subscribe_model->subscribeTotal($where,$order_by);
        $data['subscribe_count'] =$enquiry['0']->subscribe_count;         
        
        $per_page= ($per_page) ? $per_page : 100 ;
        $config['base_url'] = base_url().'admin_subscribe/loadData';
        $config["total_rows"] = $data['subscribe_count'];
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

        $records=$this->subscribe_model->subscribe_list($per_page,$page,$where,$order_by);

        echo json_encode(array('records'=>$records,'page_link'=>$page_link,'total_records'=>$data['subscribe_count']));      
    }
    
    function delete_subscriber($blog_id)
    {
        
    
        $data['blog_details']=$this->common_model->deleteData('tbl_subscribe',array('id'=>$blog_id));
        //echo "<pre>";print_ex($data);
        $this->session->set_flashdata('alert_message','Subscriber Detail Has Been Deleted Successfully!');
        redirect(base_url().'admin_subscribe');

        
    }
	
	 function action()
    {
         $subscribe_id=$this->input->post('id');
         //print_ex($subscribe_id);
         $action=$this->input->post('action'); 
        $message='';
        if($action=='active')
        {
            $data=array('status'=>1);
            foreach($subscribe_id as $subscribe)
            {
                $where=array('id'=>$subscribe);
                $this->admin_model->updateData('tbl_subscribe',$data,$where);
                //echo $this->db->last_query(); die;
            }
            $message='Status Has Been Updated!';
        }
        if($action=='inactive')
        {
            $data=array('status'=>0);
            foreach($subscribe_id as $subscribe)
            {
                $where=array('id'=>$subscribe);
                $this->admin_model->updateData('tbl_subscribe',$data,$where);
                //echo $this->db->last_query(); die;
            }
            $message='Status Has Been Updated!';
        }
        if($action=="delete")
        {
            $data=array('status'=>'delete');
            foreach($subscribe_id as $subscribe)
            {
                $where=array('id'=>$subscribe);
                $this->admin_model->updateData('tbl_subscribe',$data,$where);
            }
            $message='Subscribe Has Been Deleted!';
        }
        echo json_encode(array('message'=>$message));
    }

    function add_testimonial()
    {
       
        $data['active']="category";
        $this->load->view('common/header');
        $this->load->view('common/sidebar',$data);
        $this->load->view('testimonial/testimonial_add_view');
        $this->load->view('common/footer');
    }
    function add_testimonial_submit()
    {
        $name=$this->input->post('name');
        $testimonial=$this->input->post('testimonial');
        $status=$this->input->post('status');
       
       
        //+++++++++++++++++++++++++++++++++++++++++++++++++++++
        $data=array(
          'testimonial'=>$testimonial,         
          'testimonial_by'=>$name,
          'status'=>$status,         
          'date'=>date('Y-m-d H:i:s'),
        );
        $category_id=$this->admin_model->insertData('tbl_testimonial',$data);
        //+++++++++++++++++++++++++++++++++++++++++++++++++++++
       
       

        $this->session->set_flashdata('message','Testimonial Has Been Added !');
        redirect(base_url().'admin_testimonial');

    }
	

  	function delete_enquiry($blog_id)
	{
		
	
		$data['blog_details']=$this->common_model->deleteData('tbl_enquiry',array('id'=>$blog_id));
		//echo "<pre>";print_ex($data);
		$this->session->set_flashdata('alert_message','enquiry Detail Has Been Deleted Successfully!');
		redirect(base_admin().'enquiry');

		
	}
	
	

}
