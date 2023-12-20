<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class admin_complaint extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('image_lib');
        $this->load->model('complaint_model');
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
        $where ='p.product_id > 0  AND pr.status!="delete"';
        if($filter_name!="")
        {
            $where .=' AND pr.product_name like "%'.$filter_name.'%"';
        }
        if($filter_status!="")
        {
            $where .=' AND pr.status = "'.$filter_status.'"';
        }
        //$order_by=' ORDER BY product_id ';
        //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
        $complaint_total=$this->complaint_model->getProductcomplaintCount($where);
        $data['complaint_count'] =$complaint_total['0']->complaint_count;         
        $data['records']=$this->complaint_model->getProductcomplaint($where);
        //echo json_encode(array('records'=>$records,'page_link'=>$page_link,'total_records'=>$data['complaint_count']));      
		//print_ex($data['records']);
        $data['active']="complaint";
        $this->load->view('common/header');
        $this->load->view('common/sidebar',$data);
        $this->load->view('complaint/product_complaint_list_view',$data);
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
   
    function complaint_action()
    {
        $product_complaint_id=$this->input->post('product_complaint_id');
        $action=$this->input->post('action');
        $message='';
        if($action=="active")
        {
            $data=array('status'=>'active');
            foreach($product_complaint_id as $product)
            {
                $where=array('product_complaint_id'=>$product);
                $this->admin_model->updateData('tbl_product_complaint',$data,$where);
            }
            $message='Status Has Been Updated!';
        }
        if($action=="inactive")
        {
            $data=array('status'=>'inactive');
            foreach($product_complaint_id as $product)
            {
                $where=array('product_complaint_id'=>$product);
                $this->admin_model->updateData('tbl_product_complaint',$data,$where);
            }
            $message='Status Has Been Updated!';
        }
        if($action=="delete")
        {
            $data=array('status'=>'delete');
            foreach($product_complaint_id as $product)
            {
                $where=array('product_complaint_id'=>$product);
                $this->admin_model->updateData('tbl_product_complaint',$data,$where);
            }
            $message='complaint Has Been Deleted!';
        }
        echo json_encode(array('message'=>$message));
    }


   
	function edit_product_complaint($product_id)
    {
        $user_id=$this->session->userdata('jw_admin_id');
        $group_id=$this->session->userdata('jw_admin_group'); 
        $folder=$this->session->userdata('jw_admin_folder'); 
        //print_ex($user_details);
		$where = "product_complaint_id = ".$product_id."";
        
        $data['product_complaint_detail']=$this->complaint_model->getProductcomplaint($where);
      // print_ex($data);
	     $data['active']="complaint";
        $this->load->view('common/header');
        $this->load->view('common/sidebar',$data);
        $this->load->view('complaint/product_edit_complaint_view',$data);
        $this->load->view('common/footer');
    }
	
	 function edit_product_complaint_submit()
    {
         
        $product_complaint_id=$this->input->post('product_complaint_id');       
        if($product_complaint_id)
        {
            //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++  
            $where=array('product_complaint_id'=>$product_complaint_id);
            $data=array(
                'product_complaint_title'=>$this->input->post("product_complaint_title"),
                'product_complaint'=>$this->input->post("product_complaint"),
                'product_rating'=>$this->input->post("product_rating"),
                'complaint_for'=>$this->input->post("complaint_for"),
                'complaint_resolved'=>$this->input->post("complaint_resolved"),
                'status'=>$this->input->post("status"),
               );
            $this->admin_model->updateData('tbl_product_complaint',$data,$where);
            
            
        }

        $this->session->set_flashdata('success','Product complaint Updated Successfully!');
        redirect(base_url()."admin_complaint");
    }
	
	 function delete_product_complaint($product_id)
    {
        
    
                $where=array('product_complaint_id'=>$product_id);

                $this->admin_model->deleteData('tbl_product_complaint',$where);
               
        		$this->session->set_flashdata('success','Product complaint Has Been Deleted Successfully!');
        		redirect(base_url().'admin_complaint');

        
    }
	
	function product_complaint_reply($product_id)
    {
		
		
        $where ='prr.complaint_id = '.$product_id.'';
        
        //$order_by=' ORDER BY product_id ';
        //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
        $data['records']=$this->complaint_model->getProductcomplaintReply($where);
		//echo $this->db->last_query();
       // print_ex($data);
		$data['active']="complaint";
        $this->load->view('common/header');
        $this->load->view('common/sidebar',$data);
        $this->load->view('complaint/product_complaint_reply_list_view',$data);
        $this->load->view('common/footer');
    }
	
	function edit_product_complaint_reply($product_id)
    {
        $user_id=$this->session->userdata('jw_admin_id');
        $group_id=$this->session->userdata('jw_admin_group'); 
        $folder=$this->session->userdata('jw_admin_folder'); 
        //print_ex($user_details);
		 $where ='prr.prr_id = '.$product_id.'';
        
        //$order_by=' ORDER BY product_id ';
        //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
        $data['product_complaint_detail']=$this->complaint_model->getProductcomplaintReply($where);
       // echo $this->db->last_query();
		 //print_ex($data);
	     $data['active']="complaint";
        $this->load->view('common/header');
        $this->load->view('common/sidebar',$data);
        $this->load->view('complaint/product_edit_complaint_reply_view',$data);
        $this->load->view('common/footer');
    }
	
	 function edit_product_complaint_reply_submit()
    {
         
        $prr_id=$this->input->post('prr_id'); 
		$complaint_id=$this->input->post('complaint_id');       
        if($prr_id)
        {
            //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++  
            $where=array('prr_id'=>$prr_id);
            $data=array(
                'reply'=>$this->input->post("reply"),
                'status'=>$this->input->post("status"),
               );
            $this->admin_model->updateData('tbl_product_complaint_reply',$data,$where);
            
            
        }

        $this->session->set_flashdata('success','Product complaint Reply Updated Successfully!');
        redirect(base_url()."admin_complaint/product_complaint_reply/".$complaint_id."");
    }
}
?>
