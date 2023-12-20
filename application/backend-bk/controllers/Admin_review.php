<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class admin_review extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('image_lib');
        $this->load->model('review_model');
        $this->load->model('category_model');
        if ($this->session->userdata('jw_admin_id')=="")
        {
            redirect(base_url().'admin_login');
        }
    }
	
	 function index()
    {
		
		$page=$this->input->get('page');
        $per_page=$this->input->get('per_page');
        $user_id=$this->session->userdata('jw_admin_id');      
        $group_id=$this->session->userdata('jw_admin_group');
        $filter_name=$this->input->get('filter_name');
        $filter_sku=$this->input->get('filter_sku');
        $filter_model=$this->input->get('filter_model');
        $filter_status=$this->input->get('filter_status');
        $where ='pr.product_review_id > 0 ';
        // if($filter_name!="")
        // {
        //     $where .=' AND pr.product_name like "%'.$filter_name.'%"';
        // }
        // if($filter_status!="")
        // {
        //     $where .=' AND pr.status = "'.$filter_status.'"';
        // }
        //$order_by=' ORDER BY product_id ';
        //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
        $review_total=$this->review_model->getProductReviewCount($where);
        $data['review_count'] =$review_total['0']->review_count;         
        $data['records']=$this->review_model->getProductReview($where);
        //echo json_encode(array('records'=>$records,'page_link'=>$page_link,'total_records'=>$data['review_count']));      
		//print_ex($data['records']);
        $data['active']="review";
        $this->load->view('common/header');
        $this->load->view('common/sidebar',$data);
        $this->load->view('review/product_review_list_view',$data);
        $this->load->view('common/footer');
    }
	
    function product_action()
    {
        $product_id=$this->input->post('product_id');
        $action=$this->input->post('action');
        //$product_id=explode(',',$product_id);
        $message='';
        if($action=="active")
        {
            $data=array('product_status'=>'active');
            foreach($product_id as $product) {
                $where=array('product_id'=>$product);
                $this->admin_model->updateData('tbl_product',$data,$where);
            }
            $message='Status Has Been Updated!';
        }
        if($action=="inactive")
        {
            $data=array('product_status'=>'inactive');
            foreach($product_id as $product) {
                $where=array('product_id'=>$product);
                $this->admin_model->updateData('tbl_product',$data,$where);
            }
            $message='Status Has Been Updated!';
        }
        if($action=="delete")
        {
            foreach($product_id as $product)
            {
                $where=array('product_id'=>$product);

                $this->admin_model->deleteData('tbl_product',$where);
                $this->admin_model->deleteData('tbl_product_shipping',$where);
                $this->admin_model->deleteData('tbl_product_description',$where);
                $this->admin_model->deleteData('tbl_product_category',$where);
                $this->admin_model->deleteData('tbl_product_diamond_shape',$where);

                $pro_image=$this->admin_model->selectWhere('tbl_product_image',$where);
                foreach ($pro_image as $row) {
                    //@unlink("../ftp_upload/".$folder."/product/image/".$row->product_image);
                }
                $this->admin_model->deleteData('tbl_product_image',$where);

                $pro_video=$this->admin_model->selectWhere('tbl_product_video',$where);
                foreach ($pro_video as $row) {
                    //@unlink("../ftp_upload/".$folder."/product/video/".$row->product_video);
                }
                $this->admin_model->deleteData('tbl_product_video',$where);
                $this->admin_model->deleteData('tbl_product_option',$where); 
                $this->admin_model->deleteData('tbl_product_feature',$where);

                $pro_variation=$this->admin_model->selectWhere('tbl_product_price_variation',$where);
                foreach ($pro_variation as $pro_row) {
                    $this->admin_model->deleteData('tbl_product_price_variation_attributes',array('variation_id'=>$pro_row->variation_id)); 
                }
                $this->admin_model->deleteData('tbl_product_price_variation',$where); 
            }
            $message='Product Has Been Deleted!';
        }        
        if($action=="sale")
        {
            $data=array('product_sale_allow'=>'yes');
            foreach($product_id as $product) {
                $where=array('product_id'=>$product);
                $this->admin_model->updateData('tbl_product',$data,$where);
            }
            $message='Product Has Been Updated!';
        }
        echo json_encode(array('message'=>$message));
    }
    //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
   
    function review_action()
    {
        $product_review_id=$this->input->post('product_review_id');
        $action=$this->input->post('action');
        $message='';
        if($action=="active")
        {
            $data=array('status'=>'active');
            foreach($product_review_id as $product)
            {
                $where=array('product_review_id'=>$product);
                $this->admin_model->updateData('tbl_product_review',$data,$where);
            }
            $message='Status Has Been Updated!';
        }
        if($action=="inactive")
        {
            $data=array('status'=>'inactive');
            foreach($product_review_id as $product)
            {
                $where=array('product_review_id'=>$product);
                $this->admin_model->updateData('tbl_product_review',$data,$where);
            }
            $message='Status Has Been Updated!';
        }
        if($action=="delete")
        {
            $data=array('status'=>'delete');
            foreach($product_review_id as $product)
            {
                $where=array('product_review_id'=>$product);
                $this->admin_model->updateData('tbl_product_review',$data,$where);
            }
            $message='Review Has Been Deleted!';
        }
        echo json_encode(array('message'=>$message));
    }


   
	function edit_product_review($product_id)
    {
        $user_id=$this->session->userdata('jw_admin_id');
        $group_id=$this->session->userdata('jw_admin_group'); 
        $folder=$this->session->userdata('jw_admin_folder'); 
        //print_ex($user_details);
		$where = "product_review_id = ".$product_id."";
        
        $data['product_review_detail']=$this->review_model->getProductReview($where);
      // print_ex($data);
	     $data['active']="review";
        $this->load->view('common/header');
        $this->load->view('common/sidebar',$data);
        $this->load->view('review/product_edit_review_view',$data);
        $this->load->view('common/footer');
    }
	
	 function edit_product_review_submit()
    {
         
        $product_review_id=$this->input->post('product_review_id');       
        if($product_review_id)
        {
            //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++  
            $where=array('product_review_id'=>$product_review_id);
            $data=array(
                'product_review_title'=>$this->input->post("product_review_title"),
                'product_review'=>$this->input->post("product_review"),
                'product_rating'=>$this->input->post("product_rating"),
                'status'=>$this->input->post("status"),
               );
            $this->admin_model->updateData('tbl_product_review',$data,$where);
            
            
        }

        $this->session->set_flashdata('success','Product Review Updated Successfully!');
        redirect(base_url()."admin_review");
    }
	
	 function delete_product_review($product_id)
    {
        
    
                $where=array('product_review_id'=>$product_id);

                $this->admin_model->deleteData('tbl_product_review',$where);
               
        		$this->session->set_flashdata('success','Product Review Has Been Deleted Successfully!');
        		redirect(base_url().'admin_review');

        
    }
	
	function product_review_reply($product_id)
    {
		
		
        $where ='prr.review_id = '.$product_id.'';
        
        //$order_by=' ORDER BY product_id ';
        //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
        $data['records']=$this->review_model->getProductReviewReply($where);
		//echo $this->db->last_query();
       // print_ex($data);
		$data['active']="review";
        $this->load->view('common/header');
        $this->load->view('common/sidebar',$data);
        $this->load->view('review/product_review_reply_list_view',$data);
        $this->load->view('common/footer');
    }
	
	function edit_product_review_reply($product_id)
    {
        $user_id=$this->session->userdata('jw_admin_id');
        $group_id=$this->session->userdata('jw_admin_group'); 
        $folder=$this->session->userdata('jw_admin_folder'); 
        //print_ex($user_details);
		 $where ='prr.prr_id = '.$product_id.'';
        
        //$order_by=' ORDER BY product_id ';
        //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
        $data['product_review_detail']=$this->review_model->getProductReviewReply($where);
       // echo $this->db->last_query();
		 //print_ex($data);
	     $data['active']="review";
        $this->load->view('common/header');
        $this->load->view('common/sidebar',$data);
        $this->load->view('review/product_edit_review_reply_view',$data);
        $this->load->view('common/footer');
    }
	
	 function edit_product_review_reply_submit()
    {
         
        $prr_id=$this->input->post('prr_id'); 
		$review_id=$this->input->post('review_id');       
        if($prr_id)
        {
            //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++  
            $where=array('prr_id'=>$prr_id);
            $data=array(
                'reply'=>$this->input->post("reply"),
                'status'=>$this->input->post("status"),
               );
            $this->admin_model->updateData('tbl_product_review_reply',$data,$where);
            
            
        }

        $this->session->set_flashdata('success','Product Review Reply Updated Successfully!');
        redirect(base_url()."admin_review/product_review_reply/".$review_id."");
    }
}
?>
