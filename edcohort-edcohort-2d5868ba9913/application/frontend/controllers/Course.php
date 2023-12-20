<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Course extends CI_Controller {
    public function __construct()
    {
      parent::__construct();     
      $this->load->library('pagination');
      $this->load->helper('form');
      $this->load->model('course_model');       
    }   
      function index()
     {    
        
      $where_board = 'status = 1';
      $data['board_list'] = $this->common_model->selectWhere('tbl_board',$where_board);

      $where_class = "status = 1 ";
      $data['class_list'] = $this->common_model->selectWhere('tbl_class',$where_class);
    
      $where_batch = 'status = 1';
      $data['batch_list'] = $this->common_model->selectWhere('tbl_batch',$where_batch);
    
      $where_brand = 'brand_status = 1';
      $data['brand_list'] = $this->common_model->selectWhere('tbl_brand',$where_brand);
		  
      $data['page_head']='Course ';
        $this->load->view('common/header',$data);
        $this->load->view('course/course',$data);
        $this->load->view('common/footer');
    }
    function load_more_data()
    {
        $where = "product_id > 0";
        
        $board = $this->input->get('board');
        $batch = $this->input->get('batch');
        $class = $this->input->get('class');

         if(!empty($board)) {          
          $where .= " and board_id IN ('".$board."')";

      }
        
         if(!empty($batch)) {   
         $where .=" and batch_id = ".$batch." ";       

      }
       if(!empty($class)) { 
       $where .=" and class_id = ".$class." ";         
          
      }

      $query = $this->input->get('course_query');
  
      if (!empty($query)) {
          $where .= " and product_name like '%".$query."%'";
      }
     
   
        $page=$this->input->get('page');
        $per_page=$this->input->post('per_page'); 

        $records_count = $this->course_model->course_count($where);
          
        $data['records_count'] =$records_count['0']->course_count;          
        $per_page= ($per_page) ? $per_page : 10;
        $config['base_url'] = base_url().'load-more-course';
        $config['total_rows'] = $data['records_count'];
        $config['per_page'] = $per_page;
        $config['page_query_string']=true;
        $config['query_string_segment'] = 'page';
        $config['num_tag_open'] = '<li class="page-item">'; 
        $config['num_tag_close'] = '</li>'; 
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link">'; 
        $config['cur_tag_close'] = '</a></li>'; 
        $config['next_link'] = 'Next'; 
        $config['prev_link'] = 'Prev'; 
        $config['next_tag_open'] = '<li class="page-item page-next">'; 
        $config['next_tag_close'] = '</li>'; 
        $config['prev_tag_open'] = '<li class="page-item page-prev">'; 
        $config['prev_tag_close'] = '</li>'; 
        $config['first_tag_open'] = '<li class="page-item">'; 
        $config['first_tag_close'] = '</li>'; 
        $config['last_tag_open'] = '<li class="page-item">'; 
        $config['last_tag_close'] = '</li>';
        $config['anchor_class'] = 'class="page-link" ';
        $config['attributes'] = array('class' => 'page-link');
        $config['num_links'] = 2;
        $config['first_link'] = false;
        $config['last_link'] = false;

        $page= ($page) ? $page : 0 ;
        $this->pagination->initialize($config);
        $page_link=$this->pagination->create_links();

        $course_records = $this->course_model->course_limit($where,$per_page,$page);
         echo json_encode(array('records'=>$course_records,'page_link'=>$page_link,'total_records'=>$data['records_count']));  
    }
  //   function course_detail($brand_id)
  //   {
  //       $data['page_head']='course Detail';
  //       $where = "status = '1' AND brand_slug = '".$brand_id."'";
  //       $data['course_list']=$this->common_model->selectWhere('tbl_brand',$where);
      
		// $where = "brand_status = '1' AND brand_id != '".$data['course_list'][0]->brand_id."' ORDER BY brand_id DESC LIMIT 0,10";
  //       $data['similar_brand_list']=$this->common_model->selectWhere('tbl_brand',$where);
		
  //       $this->load->view('common/header',$data);
  //       $this->load->view('course/course_detail',$data);
  //       $this->load->view('common/footer');
  //   }

     function course_list(){
        $where = "product_id > 0";
        $data['course_records'] = $this->course_model->course_list($where);
        $data['brands_records']=$this->common_model->selectAll('tbl_brand');
        $data['class_records']=$this->common_model->selectAll('tbl_class');
        $data['board_records']=$this->common_model->selectAll('tbl_board');
        $data['batch_records']=$this->common_model->selectAll('tbl_batch');
        $data['page_head']='Course';
        $this->load->view('common/header',$data);
        $this->load->view('course/course',$data);
        $this->load->view('common/footer');
    }
	
    function get_class_list() {
        $board_id = $this->input->post('board_id');
        if($board_id){
   echo $this->common_model->fetch_class_list($board_id);
  }
    }

     function get_batch_list() {
        $class_id = $this->input->post('class_id');
        if($class_id) {
  echo $this->common_model->fetch_batch_list($class_id);
  }
    }
	
}
