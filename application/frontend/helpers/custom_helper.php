<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
   function print_pre($data)
   { 
      echo "<pre>";print_r($data);echo "</pre>";       
   }
   function print_ex($data)
   { 
      echo "<pre>";print_r($data);echo "</pre>";exit();       
   }
   function base_admin()
   { 
      return base_url()."admin/";       
   }
   function base_front(){
       return base_url()."front/";
   }
   function base_gb(){
       return "../../easy_diam/";
   }
   function base_gb_ftp(){
       return "../easy_diam/";
   }
   function csrf_field()
   { 
      $ci =& get_instance();
      $csrf = array(
            'name' => $ci->security->get_csrf_token_name(),
            'hash' => $ci->security->get_csrf_hash()
            );      
      return '<input type="hidden" name="'.$csrf['name'].'" value="'.$csrf['hash'].'" />';       
   }
   function hashcode($data)
   {
      return hash('sha512',$data);
   }
   function from_email()
   {
      // $ci =& get_instance();
      // $ci->db->select('*');
      // $ci->db->from('TBL_USER');      
      // $query=$ci->db->get();
      // return $query->result();
      return 'info@gemsbridge.com';
   }
   function vendor_id()
   {
      $ci =& get_instance();
      $vd_user_id=$ci->session->userdata('vd_user_id');
      $vd_parent_id = $ci->session->userdata('vd_parent_id');
      if($vd_parent_id==0)
      {
        $vendor_id=$vd_user_id;
      }
      else
      {
        $vendor_id=$vd_parent_id;
      }
      return $vendor_id;
   }
   function shape_img($shape)
   {
      if($shape=='ASSCHER')
      {
         return 'assets/images/diamond/ascher.jpg';
      }
      else if($shape=='CUSHION')
      {
         return 'assets/images/diamond/cushion.jpg';
      }
      else if($shape=='EMERALD')
      {
         return 'assets/images/diamond/emerald.jpg';
      }
      else if($shape=='HEART')
      {
         return 'assets/images/diamond/heart.jpg';
      }
      else if($shape=='MARQUISE')
      {
         return 'assets/images/diamond/marquise.jpg';
      }
      else if($shape=='OVAL')
      {
         return 'assets/images/diamond/oval.jpg';
      }
      else if($shape=='PEAR')
      {
         return 'assets/images/diamond/pear.jpg';
      }
      else if($shape=='PRINCESS')
      {
         return 'assets/images/diamond/princess.jpg';
      }
      else if($shape=='RADIANT')
      {
         return 'assets/images/diamond/radiant.jpg';
      }
      else if($shape=='Round' || $shape=='RBC' || $shape=='ROUND')
      {
         return 'assets/images/diamond/round.jpg';
      }     
   }
  function ci_enc($str){
   $new_str = strtr(base64_encode(addslashes(@gzcompress(serialize($str), 9))), '+/=', '-_.');
   return $new_str;  
} 
  function ci_dec($str){
   $new_str = unserialize(@gzuncompress(stripslashes(base64_decode(strtr($str, '-_.', '+/=')))));
   return $new_str;
}
  function send_mail($recipients, $subject, $message, $from='')
{
  //echo 'ok this called';exit;
   $ci =& get_instance();
   $from_email = ($from=='')? $from : SITE_EMAIL;
   $ci->load->library('email');
   $ci->email->clear(TRUE);
   $ci->email->from($from_email, SITE_NAME); 
   $ci->email->to($recipients);
   $ci->email->set_mailtype("html");
   $ci->email->subject($subject);
   $ci->email->message($message);  
   $ci->email->send();
   return TRUE;
}
 function percent($num,$per)
   {
      return number_format((($num*$per)/100),2);
   }
   function message()
   { 
      $ci =& get_instance();
      if($ci->session->flashdata('alert_message')){ 
         return '<div class="w-100 p-0">
                 <div class="alert alert-outline alert-outline-success alert-primary-style reg-message-success" role="alert">
                   <button type="button" class="close" data-bs-dismiss="alert" aria-hidden="true">×</button>
                   <strong> '.$ci->session->flashdata('alert_message').' </strong>
                 </div>
               </div>';
      } 
      if($ci->session->flashdata('error_message')){ 
         return '<div class="w-100 p-0">
                 <div  class="alert alert-outline alert-outline-danger alert-danger-style reg-message-error"  role="alert">
                   <button type="button" class="close" data-bs-dismiss="alert" aria-hidden="true">×</button>
                   <strong>'.$ci->session->flashdata('error_message').' </strong>
                 </div>
               </div>';
      }       
   }
  function checkLink($url)
  {    
      $headers = get_headers($url);
      return substr($headers[0], 9, 3);      
  }
  function strFlat($value)
  {
      return strtolower(str_replace(" ", "_", $value)); 
  }
  function userIp()
  {
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return  $ip;
  }
  
  function get_parameter_value()
  {
        $CI =& get_instance();
        $course = '';
        $brandID = '';
        $product_type ='';
        $board ='';
        $class ='';
        $batch ='';
        $customer_rating ='';
        $date_posted ='';
        $sort_by ='';
        $parameter_value = array(
            'course' => $CI->input->get('course'),
            'brandID' => $CI->input->get('brand'),
            'product_type' => $CI->input->get('product_type'),
            'board' => $CI->input->get('board'),
            'class' => $CI->input->get('class'),
            'batch' => $CI->input->get('batch'),
            'customer_rating' => $CI->input->get('customer_rating'),
            'date_posted' => $CI->input->get('date_posted'),
            'sort_by' => $CI->input->get('sort_by'),
            );    
       /* $course = $CI->input->get('course');
        $brandID = $CI->input->get('brand');
        $product_type = $CI->input->get('product_type');
        $board = $CI->input->get('board');
        $class = $CI->input->get('class');
        $batch = $CI->input->get('batch');
        $customer_rating = $CI->input->get('customer_rating');
        $date_posted = $CI->input->get('date_posted');
        $sort_by = $CI->input->get('sort_by');*/
        return $parameter_value;
  }
  
  function get_breadcrumb_value()
  {
          $CI =& get_instance();
          $product = '';
          $where = "product_status = 'active'";
          $resp_parameter =  get_parameter_value();
          if(!empty($resp_parameter)) 
          {
               /* if (!empty($resp_parameter['course'])) 
                {
                    $where .= " and product_id = " . $resp_parameter['course'] . " ";
                }
                if (!empty($resp_parameter['brandID'])) 
                {
                    $where .= " and brand_id = " . $resp_parameter['brandID'] . " ";
                }
                if (!empty($resp_parameter['product_type'])) 
                {
                    $where .= " and product_type = " . $resp_parameter['product_type'] . " ";
                }
                if (!empty($resp_parameter['board'])) 
                {
                    $where .= " and board_id = " . $resp_parameter['board'] . " ";
                }
                if (!empty($resp_parameter['class'])) 
                {
                    $where .= " and class_id = " . $resp_parameter['class'] . " ";
                }
                if (!empty($resp_parameter['batch'])) 
                {
                    $where .= " and batch_id = " . $resp_parameter['batch'] . " ";
                }*/
                
                if (!empty($resp_parameter['course'])) 
                {
                    $product_id = $resp_parameter['course'];
                }
          }
          
         
          $resp_data =  $CI->review_model->get_course_name($product_id);
          return $resp_data;
          
         /* $order = "product_name ASC";
    $data['product_list'] = $CI->review_model->review_list($where, $order);
         print_R($data['product_list']);*/
          
         
  }
  
  
  function get_review_course_name_total_review()
  {
    
  }
 
function hideEmailAddress($email)
{
    if(filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        list($first, $last) = explode('@', $email);
        $first = str_replace(substr($first, '3'), str_repeat('*', strlen($first)-3), $first);
        $last = explode('.', $last);
        $last_domain = str_replace(substr($last['0'], '1'), str_repeat('*', strlen($last['0'])-1), $last['0']);
        $hideEmailAddress = $first.'@'.$last_domain.'.'.$last['1'];
        return $hideEmailAddress;
    }
}

function getClassName($class_id)
    {
		
        $CI =& get_instance();
        $c1="";
        
        $data=$CI->common_model->selectOne('tbl_class','class_id',$class_id);
        foreach ($data as $category)
        {   
            
            $c1=$category->title;             
        }
        return $c1;        
    }

    function getBrandName($brand_id)
    {
        
        $CI =& get_instance();
        $c1="";
        
        $data=$CI->common_model->selectOne('tbl_brand','brand_id',$brand_id);
        foreach ($data as $category)
        {   
            
            $c1=$category->brand_name;             
        }
        return $c1;        
    }

     function getBrandID($brand_name)
    {
        
        $CI =& get_instance();
        $c1="";
        
        $data=$CI->common_model->selectOne('tbl_brand','brand_name',$brand_name);
        foreach ($data as $category)
        {   
            
            $c1=$category->brand_id;             
        }
        return $c1;        
    }
	
	function getClassNameList()
    {
		
        $CI =& get_instance();
        $c1="";
		$data="";
		
        $where = "status = '1' and parent_id = 0";
        $data=$CI->common_model->selectWhere('tbl_class',$where);
        
        return $data;        
    }

    function getreplyMsg($reply_id)
    {
        
        $CI =& get_instance();
        $c1="";
        
        $data=$CI->common_model->selectOne('tbl_message','c_id',$reply_id);
        
        return $data;        
    }


 function getseg_brand_list($id)
    {
        $data = '';
        $CI =& get_instance();
       // print_R("hiii"); 
        $data=$CI->common_model->getseg_brand_list($id);
        if($data)
        {
            return $data;
        }
        else
        {
            return $data;
        }
                
    }

    function get_all_brand()
    {
        $data = '';
        $CI =& get_instance();
       // print_R("hiii"); 
        $data=$CI->common_model->get_all_brand();
        if($data)
        {
            return $data;
        }
        else
        {
            return $data;
        }
    }
    
    function getseg_course_list($id)
    {
        $data = '';
        $CI =& get_instance();
       // print_R("hiii"); 
        $data=$CI->common_model->getseg_course_list($id);
        if($data)
        {
            return $data;
        }
        else
        {
            return $data;
        }
                
    }
