<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Myorder extends CI_Controller {
    public function __construct() {
        parent::__construct();

      $this->load->model('order_model');
      $this->load->library('excel');
      $this->load->library('pagination');      
      $this->load->library('upload');
      if($this->session->userdata('user_id')=="")
      {
        redirect(base_url('login'));
      }

    }

   public function index()
	{
      	
		//$this->load->view('admin/common/test');
		    $data['page_head'] = 'My Quote';
        $this->load->view('common/header', $data);
        $this->load->view('myorder/myquote');
        $this->load->view('common/footer');
	}

    public function myquote() { 

      $where="is_approved = 0 AND create_by = '".$this->session->userdata('user_id')."'";

      $records_count = $this->order_model->design_count($where);      
      $data['records_count'] =$records_count['0']->diamond_count;
      $per_page= ($this->input->get('per_page')) ? $this->input->get('per_page') : 100 ;
      $config['base_url'] = base_url().'myorder/myquote';
      $config['total_rows'] = $data['records_count'];
      $config['per_page'] = $per_page;
      $config['page_query_string']=true;
      $config['query_string_segment'] = 'page';
      $config['cur_tag_open'] = '<a class="active paginate_button current">';
      $config['cur_tag_close'] = '</a>';
      $config['next_link'] = '›';
      $config['prev_link'] = '‹';
      $config['num_links'] = 2;
      $config['first_link'] = false;
	    $config['last_link'] = false;
	  
      $page= ($this->input->get('page')) ? $this->input->get('page') : 0 ;
      $this->pagination->initialize($config);
      $data['page_link']=$this->pagination->create_links();

      $data['records'] = $this->order_model->design_list_limit($where,$per_page,$page);     
     // print_ex($data['records']);
      $data['where'] = $where; 		
	    $data['active_sidebar']='design_list';      

        $data['page_head'] = 'My Quote';
        $data['title'] = 'My Quote';
        $this->load->view('common/header', $data);
        $this->load->view('myorder/myquote', $data);
        $this->load->view('common/footer');
    }

    public function myorders() { 

      $where="is_approved = 1 AND (status = 'Order' or  status = 'Processed')AND create_by = '".$this->session->userdata('user_id')."'";

      $records_count = $this->order_model->design_count($where);      
      $data['records_count'] =$records_count['0']->diamond_count;
      $per_page= ($this->input->get('per_page')) ? $this->input->get('per_page') : 100 ;
      $config['base_url'] = base_url().'myorder/myorders';
      $config['total_rows'] = $data['records_count'];
      $config['per_page'] = $per_page;
      $config['page_query_string']=true;
      $config['query_string_segment'] = 'page';
      $config['cur_tag_open'] = '<a class="active paginate_button current">';
      $config['cur_tag_close'] = '</a>';
      $config['next_link'] = '›';
      $config['prev_link'] = '‹';
      $config['num_links'] = 2;
      $config['first_link'] = false;
      $config['last_link'] = false;
    
      $page= ($this->input->get('page')) ? $this->input->get('page') : 0 ;
      $this->pagination->initialize($config);
      $data['page_link']=$this->pagination->create_links();

      $data['records'] = $this->order_model->design_list_limit($where,$per_page,$page);     
     // print_ex($data['records']);
      $data['where'] = $where;    
      $data['active_sidebar']='design_list';      

        $data['page_head'] = 'My Orders';
        $data['title'] = 'My Orders';
        $this->load->view('common/header', $data);
        $this->load->view('myorder/myorders', $data);
        $this->load->view('common/footer');
    }

    public function completedquote() { 
      //echo $this->session->userdata('user_id');
      $where="status = 'Completed' AND create_by = '".$this->session->userdata('user_id')."'";

      $records_count = $this->order_model->design_count($where);      
      $data['records_count'] =$records_count['0']->diamond_count;
      $per_page= ($this->input->get('per_page')) ? $this->input->get('per_page') : 100 ;
      $config['base_url'] = base_url().'myorder/myorders';
      $config['total_rows'] = $data['records_count'];
      $config['per_page'] = $per_page;
      $config['page_query_string']=true;
      $config['query_string_segment'] = 'page';
      $config['cur_tag_open'] = '<a class="active paginate_button current">';
      $config['cur_tag_close'] = '</a>';
      $config['next_link'] = '›';
      $config['prev_link'] = '‹';
      $config['num_links'] = 2;
      $config['first_link'] = false;
      $config['last_link'] = false;
    
      $page= ($this->input->get('page')) ? $this->input->get('page') : 0 ;
      $this->pagination->initialize($config);
      $data['page_link']=$this->pagination->create_links();

      $data['records'] = $this->order_model->design_list_limit($where,$per_page,$page);     
      //print_ex($data['records']);
      $data['where'] = $where;    
      $data['active_sidebar']='design_list';      

        $data['page_head'] = 'My Completed Orders';
        $data['title'] = 'My Orders';
        $this->load->view('common/header', $data);
        $this->load->view('myorder/mycompletedorders', $data);
        $this->load->view('common/footer');
    }

     public function design_detail() 
    {
        $id=$this->uri->segment(2);
        $designid=$this->uri->segment(2);
        $where="design_id='".$id."'";
        $data['details']=$this->order_model->design_list($where);

        if($data['details'][0]->type == 'custom'){
          $id = $data['details'][0]->product_id;
          $where1=array('id'=>$id,'type'=>'product');
          $data['images']=$this->common_model->selectWhere('tbl_image',$where1);
        
        }else{
          $where1=array('design_id'=>$id);
          $data['images']=$this->common_model->selectWhere('tbl_custom_design_image',$where1);
        }

        $where2=array('design_id'=>$designid);
        $data['process']=$this->common_model->selectWhere('tbl_design_process',$where2);
        //echo $this->db->last_query(); die;
        $data['title'] = 'Design Detail';
       // print_ex($data);
        $this->load->view('common/header', $data);
        $this->load->view('myorder/design_detail', $data);
        $this->load->view('common/footer');
    }

    function design_process_submit()
  {


    $design_id=$this->input->post('design_id'); 
    $user_id=$this->input->post('user_id');   
    $reply=$this->input->post('reply');
   


    $data=array(
        'design_id' => $design_id,
        'message' => $reply,
        'created_by' => $user_id,        
        'create_date' => date('Y-m-d H:i:s')
      );

      $insert_id=$this->common_model->insertData('tbl_design_process',$data);

      if($insert_id){
      
      foreach ($_FILES['img_upload']['name'] as $key => $value)
          {  

              $new_name1 = str_replace(".","",microtime());
              $new_name=str_replace(" ","_",$new_name1);
              $file_tmp =$_FILES['img_upload']['tmp_name'][$key];
              $file=$_FILES['img_upload']['name'][$key];
              $ext=substr(strrchr($file,'.'),1);
              if($ext=="png" || $ext=="gif" || $ext=="jpg" || $ext=="jpeg" || $ext=="JPG" || $ext=="JPEG" || $ext=="PNG")
              {
                  $product_image=$new_name.".".$ext;
                  $uploaded=move_uploaded_file($file_tmp,"./ftp_upload/design/".$product_image);                  
                  $product_image_array[]=$product_image;
              }
          }
         
          foreach ($product_image_array as $key => $value) 
            {
               $data_image=array(
                    'process_id'=>$insert_id,
                    'image'=>$value,
                    'type'=>$type,
                );
                $this->common_model->insertData('tbl_process_image',$data_image);
            } 

        
    }
  
            $where = 'design_id = '."'".$design_id."'";      
            $records = $this->order_model->design_list($where);

            // $where1 = 'CD_USER_ID = '."'".$user_id."'"; 
            // $userrecords = $this->common_model->selectWhere('tbl_user',$where1);

           // print_ex($userrecords);

            $this->load->library('email');
            $this->load->library('parser');
            $config['wordwrap'] = TRUE;
            $config['mailtype'] = 'html';
            $config['charset'] = 'utf-8';
            $config['priority'] = '1';
            $config['crlf'] = "\r\n";
            $config['newline'] = "\r\n";
            //$config['smtp_crypto']  = 'tls';
            $this->email->initialize($config);
            $this->email->from(SITE_EMAIL, SITE_NAME);
            $this->email->to(SITE_EMAIL);
            //$this->email->cc("testcc@domainname.com");
            $this->email->subject('Reply on Design with Us');
            //$url = base_url().'UserNewPassword/'.$check_register['email_code'];
            $data_email['fname'] = $records['0']->name;
            //$data_email['email_code'] = $email_code;
            //$this->email->message("Please click on this link for reset password".$url);
            $str_content = '';
            $str_name = ucwords($data_email['fname']);
            $str_url = '<p>Design with Us</p>
            <p>'. $reply .'</p>
            <p> Reference Number : ' . $records['0']->reference_number . '</p>
            <p> Comapny : ' . $records['0']->company . '</p>
            ';
            $data_email['str_final'] = $str_url;
            $msg = $this->load->view('email/email_template', $data_email, TRUE);
            //echo $msg; die;
            $this->email->message($msg);
            $data['message'] = "Sorry Unable to send email...";
            if ($this->email->send()) {
                $data['message'] = "Mail sent...";
            }
     $this->session->set_flashdata('alert_message','Reply Has Been Sent Successfully!');
    redirect(base_url('design-detail/'.$design_id.''));
  }


  public function send_images() 
    {
        $id=$this->uri->segment(2);
        $designid=$this->uri->segment(2);

        $designid=$this->input->post('design_id'); 
        $email=$this->input->post('email');   
       

        $where2=array('design_id'=>$designid);
        $data['process']=$this->common_model->selectWhere('tbl_design_process',$where2);

        $where = "design_id = '".$designid."' and type = 'CAD' and created_by = 1";
        $processimage =$this->common_model->selectJointwo('tbl_design_process','process_id','tbl_process_image','process_id',$where);

            $this->load->library('email');
            $this->load->library('parser');
            $config['wordwrap'] = TRUE;
            $config['mailtype'] = 'html';
            $config['charset'] = 'utf-8';
            $config['priority'] = '1';
            $config['crlf'] = "\r\n";
            $config['newline'] = "\r\n";
            //$config['smtp_crypto']  = 'tls';
            $this->email->initialize($config);
            $this->email->from(SITE_EMAIL, SITE_NAME);
            $this->email->to($email);            
            $this->email->subject('CAD Images');
            //$url = base_url().'UserNewPassword/'.$check_register['email_code'];
            $data_email['fname'] = '';
            //$data_email['email_code'] = $email_code;
            //$this->email->message("Please click on this link for reset password".$url);
            $str_content = '';
            $str_name = ucwords($data_email['fname']);
            $str_url = '<p>Design with Us CAD Images</p>';
            foreach ($processimage as $img) {

              $str_url .= '<img src="'.base_url().'ftp_upload/design/'.$img->image.'" alt="my picture">';
            }
           

            $data_email['str_final'] = $str_url;
            $msg = $this->load->view('email/email_template', $data_email, TRUE);
            //echo $msg; die;
            $this->email->message($msg);
            $data['message'] = "Sorry Unable to send email...";
            if ($this->email->send()) {
                $data['message'] = "Mail sent...";
            }

        //echo $this->db->last_query(); die;
        //$data['title'] = 'Design Detail';
        //print_ex($process);
       
       $this->session->set_flashdata('alert_message','Email Has Been Sent Successfully!');
      redirect(base_url('design-detail/'.$designid.''));
    }


    

}
