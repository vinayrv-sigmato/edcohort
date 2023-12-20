<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller{
    public function __construct() {
        parent::__construct();        
    }    
    public function index()
    {  
        $data['page_head']='About Us';
        $this->load->view('common/header',$data);
        $this->load->view('common/about',$data);
        $this->load->view('common/footer');
    }
    function terms()
    {
        $data['page_head']='Terms & Conditions';
        $this->load->view('common/header',$data);
        $this->load->view('common/terms',$data);
        $this->load->view('common/footer');
    }
    function privacy()
    {
        $data['page_head']='Privacy Policy';
        $this->load->view('common/header',$data);
        $this->load->view('common/privacy',$data);
        $this->load->view('common/footer');
    }
    function return_policy()
    {
        $data['page_head']='Return Policy';
        $this->load->view('common/header',$data);
        $this->load->view('common/return',$data);
        $this->load->view('common/footer');
    }
    function shipping()
    {
        $data['page_head']='Shipping Policy';
        $this->load->view('common/header',$data);
        $this->load->view('common/shipping',$data);
        $this->load->view('common/footer');
    }
    function education()
    {
        $data['page_head']='Education';
        $this->load->view('common/header',$data);
        $this->load->view('common/education',$data);
        $this->load->view('common/footer');
    }
    function jewelry_education()
    {
        $data['page_head']='Jewelry Education';
        $this->load->view('common/header',$data);
        $this->load->view('common/jewel_education',$data);
        $this->load->view('common/footer');
    }
    function customer_experiences()
    {
        $data['page_head']='Education';
        $this->load->view('common/header',$data);
        $this->load->view('common/customer_experiences',$data);
        $this->load->view('common/footer');
    }
    function appointments()
    {
        $data['page_head']='Appointments';
        $this->load->view('common/header',$data);
        $this->load->view('common/appointments',$data);
        $this->load->view('common/footer');
    }
    function faq()
    {
        $data['page_head']='FAQ';
        $this->load->view('common/header',$data);
        $this->load->view('common/faq',$data);
        $this->load->view('common/footer');
    }
    function services()
    {
        $data['page_head']='Services';
        $this->load->view('common/header',$data);
        $this->load->view('common/services',$data);
        $this->load->view('common/footer');
    }
    function conflict_free_policy()
    {
        $data['page_head']='Conflict Free Policy';
        $this->load->view('common/header',$data);
        $this->load->view('common/conflict_free_policy',$data);
        $this->load->view('common/footer');
    }
    function why_choose_european()
    {
        $data['page_head']='Why Choose Certificate';
        $this->load->view('common/header',$data);
        $this->load->view('common/why_choose_european',$data);
        $this->load->view('common/footer');
    }
    function custom_work()
    {
        $data['page_head']='Custom Work';
        $this->load->view('common/header',$data);
        $this->load->view('common/custom_work',$data);
        $this->load->view('common/footer');
    }
    function jewelry_repairs()
    {
        $data['page_head']='Jewelry Repairs';
        $this->load->view('common/header',$data);
        $this->load->view('common/jewelry_repairs',$data);
        $this->load->view('common/footer');
    }
    function credit_card()
    {
        $data['page_head']='Credit Card';
        $this->load->view('common/header',$data);
        $this->load->view('common/credit_card',$data);
        $this->load->view('common/footer');
    }
    function blog()
    {
        $where = "status = '1' order by blog_id DESC";
        $data['blog_list']=$this->common_model->selectWhere('tbl_blog',$where);
        $data['page_head']='Blog';
        $this->load->view('common/header',$data);
        $this->load->view('common/blog',$data);
        $this->load->view('common/footer');
    }
    function blog_detail($blog_id)
    {
        $data['page_head']='Blog Detail';
        $where = "status = '1' AND blog_slug = '".$blog_id."'";
        $data['blog_list']=$this->common_model->selectWhere('tbl_blog',$where);
        //print_ex($data['blog_list']);
        $this->load->view('common/header',$data);
        $this->load->view('common/blog_detail',$data);
        $this->load->view('common/footer');
    }
    function engagement_rings()
    {
        $data['page_head']='Home';
        $this->load->view('common/header',$data);
        $this->load->view('other/engagement_rings',$data);
        $this->load->view('common/footer');
    }
     function dashboard()
    {
        $data['page_head']='Home';
        $this->load->view('common/header',$data);
        $this->load->view('common/dashboard',$data);
        $this->load->view('common/footer');
    }
     function bank_wire()
    {
        $data['page_head']='Home';
        $this->load->view('common/header',$data);
        $this->load->view('common/bank_wire',$data);
        $this->load->view('common/footer');
    }  
    function partner_us()
    {
        $data['page_head']='Home';
        $this->load->view('common/header',$data);
        $this->load->view('common/partner_us',$data);
        $this->load->view('common/footer');
    } 
     function review_us()
    {
        $data['page_head']='Home';
        $this->load->view('common/header',$data);
        $this->load->view('common/review_us',$data);
        $this->load->view('common/footer');
    }
    function add_comment()
    {
       $comment     = $this->uri->segment(3);
       $blogslug    = $this->uri->segment(4);
       $rating    = $this->uri->segment(5) ? $this->uri->segment(5) : 0;
       $user_id     = $this->session->userdata('user_id');
       $data = array('user_id'=>$user_id,'blog_slug'=>$blogslug,'body'=>$comment,'rating'=>$rating);
     //  echo $this->db->last_query(); exit;
       if($this->common_model->insertData('tbl_comments',$data)) {
        echo '100'; exit;
       } else {
        echo '101'; exit;
       }    
    } 
    function get_comments()
    {
        $arr = array();
        $blogSlug     = $this->uri->segment(3);
        $this->db->select('*');
        $this->db->from('tbl_customer');
        $this->db->join('tbl_comments','tbl_comments.user_id = tbl_customer.customer_id');
        $this->db->where('tbl_comments.blog_slug',$blogSlug);
        $this->db->limit(5,0);
        $this->db->order_by('tbl_comments.id', 'DESC');
        $query=$this->db->get();
        $blogs = $query->result();
        //print_r($blogs); exit;
        $html = '';
        $rating = '';
        if($blogs > 0) {
            foreach ($blogs as $blog) {
                if($blog->rating > 0) { 
                    for($i=0;$i<$blog->rating;$i++){
                        $rating .= '<div class="fa fa-star selected""></div>';
                    }
                }
                    $html .= '<li class="media">
                <div class="media-body">
                <strong class="text-success">'.$blog->firstname.'</strong>
                <p>
                '.htmlentities($blog->body).'
                </p>
                <p>
                '.$rating.'
                </p>
                </div>
                </li>';
                $rating ='';
                }
                $arr['res_code'] = 'success';
                $arr['html'] = $html;
                //echo $html;
                }  else {
                  $arr['res_code'] = 'fail';
                $arr['html'] = '<li class="media">
                <div class="media-body">
                <p>
                No Comments available
                </p>
                </div>
                </li>';
        }
        echo json_encode($arr); exit;
    }
    function testimonial_submit() {
       // print_ex($_REQUEST);
        $this->form_validation->set_rules('rating', 'Rating', 'trim|required');
        $this->form_validation->set_rules('testimonial', 'Comment', 'trim|required|min_length[5]');
        $this->form_validation->set_rules('user_id', 'user_id', 'trim|required');
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('phone', 'Phone', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $errors = validation_errors();
           // echo json_encode(['message'=>$errors]);
            $message = $errors;
            $status = 0;
            echo json_encode(array('message' => $message, 'status' => $status));
            exit();
        }
        $rating = $this->input->post('rating');
        $testimonial = $this->input->post('testimonial');
        $user_id = $this->input->post('user_id'); 
        $name = $this->input->post('name'); 
        $email = $this->input->post('email');  
        $phone = $this->input->post('phone');      
         //print_ex($result);
       // echo $this->db->last_query(); 
        $where = "customer_id='".$user_id."' ";
        $user_details=$this->common_model->selectWhere('tbl_customer',$where);
        if(!empty($user_details['0']->image)){
            $image = $user_details['0']->image;
            $source = './uploads/user/'.$image.''; 
            // Store the path of destination file
            $destination = './uploads/testimonial/'.$image.''; 
            // Copy the file from /user/desktop/geek.txt 
            // to user/Downloads/geeksforgeeks.txt'
            // directory
            if( !copy($source, $destination) ) { 
            } 
            else { 
            } 
            }else{
                $image = 'no_user.png';
                }
            $data = array(
                'testimonial' => $testimonial, 
                'testimonial_by' => $name,
                'user_id' => $user_id,
                'rating' => $rating, 
                'image' => $image, 
                'date' => date('Y-m-d H:i:s'), 
                'status' => '1',   
                'email' => $email,   
                'phone' => $phone,                
            );
            $inser_id = $this->common_model->insertData('tbl_testimonial', $data);
            $message = 'Comment submitted successfully';
            $status = 1;
           echo json_encode(array('message' => $message, 'status' => $status));
           exit();
    }
}
