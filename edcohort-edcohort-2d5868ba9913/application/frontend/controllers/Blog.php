<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Blog extends CI_Controller {
    public function __construct()
    {
      parent::__construct();     
      $this->load->library('pagination');
      $this->load->model('blog_model');       
    }   
      function index()
    {
		$page=$this->input->get('page');
        $per_page=$this->input->post('per_page');
		$where = "status = '1' order by blog_id DESC";
		
		$records_count = $this->blog_model->blog_count($where);      
        $data['records_count'] =$records_count['0']->blog_count;          
        $per_page= ($per_page) ? $per_page : 20;
        $config['base_url'] = base_url().'blog';
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
        $data['page_link']=$this->pagination->create_links();

        $data['blog_list'] = $this->blog_model->blog_limit($where,$per_page,$page);  
		
		foreach($data['blog_list'] as $blog)
		{				
			 $count = $this->blog_model->blog_comment_count($blog->blog_id);
			 $blog->comment_count = $count[0]->blog_comment_count;
		}
		
		//print_ex($data);

        //$where = "status = '1' order by blog_id DESC";
        //$data['blog_list']=$this->common_model->selectWhere('tbl_blog',$where);
		
        $data['page_head']='Blog';
        $this->load->view('common/header',$data);
        $this->load->view('blog/blog',$data);
        $this->load->view('common/footer');
    }
    function blog_detail($blog_id)
    {
        $data['page_head']='Blog Detail';
        $where = "status = '1' AND blog_slug = '".$blog_id."'";
        $data['blog_list']=$this->common_model->selectWhere('tbl_blog',$where);
        //print_ex($data['blog_list']);
		foreach($data['blog_list'] as $blog)
		{				
			 $count = $this->blog_model->blog_comment_count($blog->blog_id);
			 $blog->comment_count = $count[0]->blog_comment_count;
		}
		
		$where = "status = '1' AND blog_id = '".$data['blog_list']['0']->blog_id."'";
        $data['blog_comment_list']=$this->common_model->selectWhere('tbl_blog_comment',$where);
		foreach($data['blog_comment_list'] as $blog_cmnt)
		{
			$where = "status = '1' AND bc_id = '".$blog_cmnt->bc_id."'";
        	$blog_cmnt->reply_list=$this->common_model->selectWhere('tbl_blog_comment_reply',$where);
		}
		
		$value = str_replace(",","|",$data['blog_list'][0]->category);
		
		$where = "status = '1' AND blog_id != '".$data['blog_list'][0]->blog_id."' ORDER BY blog_id DESC LIMIT 0,10";
        $data['similar_blog_list']=$this->common_model->selectWhere('tbl_blog',$where);
		
			//$data['blog_comment_list']['list'] = $reply_list;
		
		//echo $this->db->last_query();
		//print_ex($data);
        $this->load->view('common/header',$data);
        $this->load->view('blog/blog_detail',$data);
        $this->load->view('common/footer');
    }
	
	function blog_comment_submit() {

       // print_ex($_REQUEST);
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
		$this->form_validation->set_rules('blog_id', 'Blog Name', 'trim|required');
        $this->form_validation->set_rules('comment', 'Comment', 'trim|required|min_length[5]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        if ($this->form_validation->run() == FALSE) {
            $errors = validation_errors();
           // echo json_encode(['message'=>$errors]);
            $message = $errors;
            $status = 0;
            echo json_encode(array('message' => $message, 'status' => $status));
            exit();
        }
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $comment = $this->input->post('comment');
		$phone = $this->input->post('phone');
        $rating = $this->input->post('rating');
        $blog_id = $this->input->post('blog_id');
		$user_id = $this->input->post('user_id');       
         //print_ex($result);
       // echo $this->db->last_query(); 
      
            $data = array(
                'name' => $name, 
                'email' => $email,                 
                'phone' => $phone, 
				'comment' => $comment, 
                'rating' => $rating,                 
                'blog_id' => $blog_id,
				'user_id' => $user_id, 
                'date_added' => date('Y-m-d H:i:s'), 
                'status' => 0                
            );
            $user_id = $this->common_model->insertData('tbl_blog_comment', $data);
           

            $message = 'Comment submitted successfully';
            $status = 1;
           echo json_encode(array('message' => $message, 'status' => $status));
           exit();
        
    }
}
