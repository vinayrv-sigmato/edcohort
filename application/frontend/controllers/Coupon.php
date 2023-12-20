<?php defined('BASEPATH') OR exit('No direct script access allowed');

class coupon extends CI_Controller {

public function __construct()
{
    parent::__construct();

    $this->load->library('pagination');
    $this->load->helper('form');
    $this->load->model('jewelry_model');
    $this->load->model('coupon_model');
}

function index(){

  $course = $this->input->get('course');
  ////Filter data ////////
  $where_brand = 'brand_status = 1';
  $data['brand_records'] = $this->common_model->selectWhereorderby('tbl_brand', $where_brand, 'brand_sort_order', 'ASC');
  $where_board = 'status = 1';
  $data['board_records'] = $this->common_model->selectWhereorderby('tbl_board', $where_board, 'board_name', 'ASC');
  $where_batch = 'status = 1 and batch_end >= NOW()';
  $data['batch_records'] = $this->common_model->selectWhereorderby('tbl_batch', $where_board, 'batch_start', 'ASC');
  $where_class = "status = 1 ";
  $data['class_records'] = $this->common_model->selectWhereorderby('tbl_class', $where_class, 'title', 'ASC');
  ////Filter////////
  //print_pre($_POST);
  $where = "product_status = 'active'";
  
  $brandID = $this->input->get('brand');
  $product_type = $this->input->get('product_type');
  $board = $this->input->get('board');
  $class = $this->input->get('class');
  $batch = $this->input->get('batch');
  $customer_rating = $this->input->get('customer_rating');
  $date_posted = $this->input->get('date_posted');
  $sort_by = $this->input->get('sort_by');
  $complaint_resolved = $this->input->get('complaint_resolved');

  if ($_GET) {
    if (!empty($brandID)) {
      $where .= " and brand_id = " . $brandID . " ";
    }
    if (!empty($product_type)) {
      $where .= " and product_type = " . $product_type . " ";
    }
    if (!empty($board)) {
      $where .= " and board_id = " . $board . " ";
    }
    if (!empty($class)) {
      $where .= " and class_id = " . $class . " ";
    }
    if (!empty($batch)) {
      $where .= " and batch_id = " . $batch . " ";
    }
  } else {
    if (!empty($course)) {
      $where .= " and product_id = " . $course . " ";
    }
  }
  $order = "product_name ASC";
  $data['product_list'] = $this->jewelry_model->jewelry_list($where, $order);
  //echo $this->db->last_query();
 
  //$data['group_list'] = $this->coupon_model->jewelry_list_limit($where,$limit,$offset,$order);


  $where_coupon = 'coupon_status = "active" and product_id = '.$data['product_list']['0']->product_id.'';
  $data['coupon_records'] = $this->common_model->selectWhereorderby('tbl_coupon',$where_coupon,'coupon_id','ASC');

  //print_pre($data['ongoing_group_list']);

  //echo $this->db->last_query(); 
  //die;

 // print_ex($data['product_list']);

  $this->load->view('common/header',$data);
  $this->load->view('coupon/coupon',$data);
  $this->load->view('common/footer');

}

function search()
  {
    $course = $this->input->get('course');

    ////Filter data ////////

    $where_brand = 'brand_status = 1';
    $data['brand_records'] = $this->common_model->selectWhereorderby('tbl_brand', $where_brand, 'brand_sort_order', 'ASC');

    $where_board = 'status = 1';
    $data['board_records'] = $this->common_model->selectWhereorderby('tbl_board', $where_board, 'board_name', 'ASC');

    $where_batch = 'status = 1 and batch_end >= NOW()';
    $data['batch_records'] = $this->common_model->selectWhereorderby('tbl_batch', $where_board, 'batch_start', 'ASC');

    $where_class = "status = 1 ";
    $data['class_records'] = $this->common_model->selectWhereorderby('tbl_class', $where_class, 'title', 'ASC');

    ////Filter////////

    //print_pre($_POST);

     $where = "product_status = 'active'";

   	$where = "product_status = 'active'";
  
  $brandID = $this->input->get('brand');
  $product_type = $this->input->get('product_type');
  $board = $this->input->get('board');
  $class = $this->input->get('class');
  $batch = $this->input->get('batch');
  $customer_rating = $this->input->get('customer_rating');
  $date_posted = $this->input->get('date_posted');
  $sort_by = $this->input->get('sort_by');
  $complaint_resolved = $this->input->get('complaint_resolved');

  if ($_GET) {
    if (!empty($brandID)) {
      $where .= " and brand_id = " . $brandID . " ";
    }
    if (!empty($product_type)) {
      $where .= " and product_type = " . $product_type . " ";
    }
    if (!empty($board)) {
      $where .= " and board_id = " . $board . " ";
    }
    if (!empty($class)) {
      $where .= " and class_id = " . $class . " ";
    }
    if (!empty($batch)) {
      $where .= " and batch_id = " . $batch . " ";
    }
  } else {
    if (!empty($course)) {
      $where .= " and product_id = " . $course . " ";
    }
  }
  $order = "product_name ASC";
  $data['product_list'] = $this->jewelry_model->jewelry_list($where, $order);
    //echo $this->db->last_query(); 
    //print_ex($data['product_list']);
    ////////////////////////////////////


    redirect(base_url('coupon?course=' . $data['product_list']['0']->product_id . '&brand='.$brandID.'&product_type='.$product_type.'&board='.$board.'&class='.$class.'&customer_rating='.$customer_rating.'&brand='.$date_posted.'&sort_by='.$sort_by.''));

    //print_ex($data['review_list']);

    // $this->load->view('common/header',$data);
    // $this->load->view('review/review',$data);
    // $this->load->view('common/footer');
  }

  function coupon_submit() {

     // print_ex($_REQUEST);
      $this->form_validation->set_rules('brand', 'Brand', 'trim|required');
      $this->form_validation->set_rules('course', 'Course ID', 'trim|required');
      $this->form_validation->set_rules('confirm_bying', 'Confirm Bying', 'trim|required');
      $this->form_validation->set_rules('user_id', 'User login', 'trim|required');
      if ($this->form_validation->run() == FALSE) {
          $errors = validation_errors();
         // echo json_encode(['message'=>$errors]);
          $message = $errors;
          $status = 0;
          echo json_encode(array('message' => $message, 'status' => $status));
          exit();
      }
      $brand = $this->input->post('brand');
      $course = $this->input->post('course');
      $confirm_bying = $this->input->post('confirm_bying');
      $user_id = $this->input->post('user_id');
      $getbrand = $this->uri->segment(2);
  
  
      $brand_id=$this->common_model->selectOne('tbl_brand','brand_id',$brand);

      $brand_name = @$brand_id['0']->brand_name;      
     //  print_ex($result);
  //   echo $this->db->last_query(); 
    
          $data = array(
              'brand_name' => $brand_name, 
              'brand_id' => $brand,                 
              'product_id' => $course, 
              'coupon_id' => $confirm_bying,
              'user_id' => $user_id,
              'date_added' => date('Y-m-d H:i:s'), 
                              
          );
          $inst_id = $this->common_model->insertData('tbl_coupon_buying', $data);
         
     $where=array('coupon_id'=>$confirm_bying);
    $details=$this->common_model->selectWhere('tbl_coupon',$where);
    //print_ex($details);
 $newcont =  $details['0']->coupon_count+1;
    if(!empty($details)){
      $data=array(
        
        'coupon_count'=> $newcont,
        
      );        
      $this->common_model->updateData('tbl_coupon',$data,$where);
    }
          $message = 'Query submitted successfully';
          $status = 1;
          $this->session->set_flashdata('alert_message','Request has been sent successfully.');
        // echo json_encode(array('message' => $message, 'status' => $status));
        //exit();
    
       $userDetails=$this->common_model->selectOne('tbl_customer','customer_id',$user_id);   
     //echo $this->db->last_query();
    // print_ex($userDetails);      
                                    
            $config['wordwrap'] = TRUE;
            $config['mailtype'] = 'html';      
            $config['charset'] = 'utf-8';
            $config['priority'] = '1';      
            $config['crlf']  = "\r\n";      
            $config['newline']  = "\r\n";
            //$config['smtp_crypto']  = 'tls';      
            $this->email->initialize($config);      
            $this->email->from(SITE_EMAIL,SITE_NAME);      
            $this->email->to(SITE_EMAIL);
            $this->email->subject("Buy Coupon");      

           
           
           
            $data_email['message_body'] = 'This email is generated from website.<br> 
            Name : '.$userDetails['0']->firstname.' '.$userDetails['0']->lastname.'<br>
            Email : '.$userDetails['0']->email.'<br>
            Phone : '.$userDetails['0']->phone.'<br>';
           
            $data_email['product_name'] ="";       
            $data_email['product_image'] ='';
            $data_email['product_detail'] ='';              
                 

            $msg = $this->load->view('email/jewelry_details',$data_email, TRUE);
            $this->email->message($msg);
            $this->email->send();
            //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
            $this->email->initialize($config);      
            $this->email->from(SITE_EMAIL,SITE_NAME);      
            $this->email->to($userDetails['0']->email);
            $this->email->subject("Coupon Request");      
            
            $data_email['message_body'] = 'Thanks for your interest. We will get back to you very soon.<br> 
             <br> ';              
            $msg = $this->load->view('email/jewelry_details',$data_email, TRUE);
            $this->email->message($msg);  
            if($this->email->send()){     
              // $this->session->set_flashdata('alert_message','Request has been sent successfully.');
            }else{
             //  $this->session->set_flashdata('error_message','Sorry Unable to send email.');
            }     
        //redirect($_SERVER['HTTP_REFERER']);
    
    $message = 'Request has been sent successfully.';
    $status = 1;
    //$this->session->set_flashdata('alert_message','Request has been sent successfully.');
         echo json_encode(array('message' => $message, 'status' => $status));
        exit();
      
  }

  

function createcoupon()
{
  $where_category = 'product_id > 31';
    $productdata = $this->common_model->selectWhereorderby('tbl_product',$where_category,'product_id','ASC'); 
  //print_ex($productdata);
  foreach($productdata as $rec)
  {
     $data = array(
              'coupon_code' => 'Now', 
              'product_id' => $rec->product_id,                 
              'coupon_status' => 'active', 
          'coupon_count' => 10,
              'coupon_added' => date('Y-m-d H:i:s'), 
                              
          );
          $inst_id = $this->common_model->insertData(' tbl_coupon', $data);
    
    $data1 = array(
              'coupon_code' => 'Today', 
              'product_id' => $rec->product_id,                 
              'coupon_status' => 'active', 
          'coupon_count' => 20,
              'coupon_added' => date('Y-m-d H:i:s'), 
                              
          );
          $inst_id1 = $this->common_model->insertData(' tbl_coupon', $data1);
    
    $data2 = array(
              'coupon_code' => 'Tomorrow', 
              'product_id' => $rec->product_id,                 
              'coupon_status' => 'active', 
          'coupon_count' => 25,
              'coupon_added' => date('Y-m-d H:i:s'), 
                              
          );
          $inst_id2 = $this->common_model->insertData(' tbl_coupon', $data2);
    
    $data3 = array(
              'coupon_code' => 'Day After Tomorrow', 
              'product_id' => $rec->product_id,                 
              'coupon_status' => 'active', 
          'coupon_count' => 30,
              'coupon_added' => date('Y-m-d H:i:s'), 
                              
          );
          $inst_id3 = $this->common_model->insertData(' tbl_coupon', $data3);
    
    $data4 = array(
              'coupon_code' => 'Later', 
              'product_id' => $rec->product_id,                 
              'coupon_status' => 'active', 
          'coupon_count' => 20,
              'coupon_added' => date('Y-m-d H:i:s'), 
                              
          );
          $inst_id4 = $this->common_model->insertData(' tbl_coupon', $data4);
  }
  
}

function indexold($id = '')
{

  $course = $this->input->get('course');

  ////Filter data ////////

  $where_category = 'status = 1 and parent_id = 0';
  $data['category_records'] = $this->common_model->selectWhereorderby('tbl_class',$where_category,'title','ASC');
  
  $where_brand = 'brand_status = 1';
  $data['brand_records'] = $this->common_model->selectWhereorderby('tbl_brand', $where_brand, 'brand_sort_order', 'ASC');

  $where_board = 'status = 1';
  $data['board_records'] = $this->common_model->selectWhereorderby('tbl_board', $where_board, 'board_name', 'ASC');

  $where_batch = 'status = 1 and batch_end >= NOW()';
  $data['batch_records'] = $this->common_model->selectWhereorderby('tbl_batch', $where_board, 'batch_start', 'ASC');

  $where_class = "status = 1 ";
  $data['class_records'] = $this->common_model->selectWhereorderby('tbl_class', $where_class, 'title', 'ASC');


  ////Filter////////

  //print_pre($_POST);

  $where = "product_status = 'active'";

  $brandID = $this->input->get('brand');
  $product_type = $this->input->get('product_type');
  $board = $this->input->get('board');
  $class = $this->input->get('class');
  $batch = $this->input->get('batch');
  $customer_rating = $this->input->get('customer_rating');
  $date_posted = $this->input->get('date_posted');
  $sort_by = $this->input->get('sort_by');


  if ($_GET) {

    if (!empty($brandID)) {
      $where .= " and brand_id = " . $brandID . " ";
    }
    if (!empty($product_type)) {
      $where .= " and product_type = " . $product_type . " ";
    }
    if (!empty($board)) {
      $where .= " and board_id = " . $board . " ";
    }
    if (!empty($class)) {
      $where .= " and class_id = " . $class . " ";
    }
    if (!empty($batch)) {
      $where .= " and batch_id = " . $batch . " ";
    }

  } else {

    if (!empty($course)) {
      $where .= " and product_id = " . $course . " ";
    }

  }
  
  //die('dsds');

//print_ex($this->session->userdata);
       
    $parent_id = 0;
    $href = '';
    $bread = array();
    $segs = $this->uri->segment_array();
 // print_ex($segs);     
   foreach ($segs as $key => $value) 
    {
        $segment_show = $value;
        $href .= $value.'/';
        $query = $this->db->query(" SELECT c.category_id,c.category_name,cd.category_slug FROM tbl_category c
                                    join tbl_category_description cd on  cd.category_id=c.category_id
                                    where cd.category_slug = '" .$value . "' and parent_category='".$parent_id."' ");
        $result = $query->result();
        if (!empty($result)) {
           $parent_id = $result['0']->category_id;
           $segment_show = $result['0']->category_name;
        }  
        $bread[$key]['href'] = base_url().$href;        
        $bread[$key]['name'] = $segment_show;        
    }
    $this->session->set_userdata('category_id',$parent_id);      

    $query = $this->db->query(" SELECT c.category_id,c.category_name,cd.category_slug FROM tbl_category c
                              join tbl_category_description cd on  cd.category_id=c.category_id
                              where c.parent_category = '" .$parent_id . "'");
    $data['cat_list'] = $query->result();
   
  $getbrand = $this->uri->segment(2);
  $getcourse_type = $this->input->get('course_type');
  
    $brand_id=$this->common_model->selectOne('tbl_brand','brand_name',$getbrand);
  $brandID = @$brand_id['0']->brand_id;
 // print_ex($brand_id);
  
  $where_brand = 'brand_status = 1';
  $data['brand_records'] = $this->common_model->selectWhereorderby('tbl_brand',$where_brand,'brand_sort_order','ASC');

  $where_blog = 'FIND_IN_SET ("'.$getbrand.'",brand) and status = 1';
  $data['blog_records'] = $this->common_model->selectWhereorderby('tbl_blog',$where_blog,'blog_id','DESC');
  
  $where_prodcut=" product_status = 'active' ";
  if(!empty($brandID)){
    $where_prodcut .=" and product_brand = ".$brandID." ";
    }
    
 
  
  $order = "product_name ASC";
  $data['product_list'] = $this->jewelry_model->jewelry_list($where_prodcut,$order);
//print_ex($date['product_list']);

 $where_coupon = 'coupon_status = "active"';
  $data['coupon_records'] = $this->common_model->selectWhereorderby('tbl_coupon',$where_coupon,'coupon_id','ASC');
// print_ex($data['coupon_records']);
  $course = $this->input->get('course');
  $course_type = $this->input->get('course_type');
  if(!empty($course)){
  /*$where_coupon = 'PR.status = "active" and product_id = '.$course.'';
  $data['coupon_records'] = $this->coupon_model->getcoupon($where_coupon);
 
 
  $data['count_total_rating'] = $this->coupon_model->count_total_rating($course);
  
  $data['rating_total'] = $this->coupon_model->rating_total($course);   
  $data['five_total'] = $this->coupon_model->rating_total($course,5);
  $data['four_total'] = $this->coupon_model->rating_total($course,4);
  $data['three_total'] = $this->coupon_model->rating_total($course,3);
  $data['two_total'] = $this->coupon_model->rating_total($course,2);
  $data['one_total'] = $this->coupon_model->rating_total($course,1);
  
  $data['coupon_search_count'] = $this->coupon_model->coupon_search_count($course);
  
  $order = "product_name ASC";
  $where_course = "product_id = ".$course."";
  $data['course_name'] = $this->jewelry_model->jewelry_list($where_course,$order);
  // echo $this->db->last_query();
  
  $where_coupon_search = 'user_id != "" and product_id = "'.$course.'" group by user_id';
  $data['coupon_search'] = $this->common_model->selectWhereorderby('tbl_product_coupon_search',$where_coupon_search,'prs_id','ASC');
*/
  
  }

  //print_ex($data['coupon_search']);
  if($course){
  /* $dataInser = array(
              'name' => $this->session->userdata('user_fullname'), 
              'email' => $this->session->userdata('user_email'),
              'product_id' => $course,
              'user_id' => $this->session->userdata('user_id'), 
              'date_added' => date('Y-m-d H:i:s')
          );
          $insert_id = $this->common_model->insertData('tbl_product_coupon_search', $dataInser);*/
  }
  
    $data['bread'] = $bread;
    $data['page_head'] = ucwords(str_replace('-', ' ', $segment_show));
    //$data['metal_type']=$this->jewelry_model->getProductFilter("name LIKE '%Metal Type%'");
  //print_ex($data['blog_records']);
    $this->load->view('common/header',$data);
    $this->load->view('coupon/coupon',$data);
    $this->load->view('common/footer');
}
private function get_child_category($category_id,$block="") 
{
    $menu = '';
    $query = $this->db->query(" SELECT category_id FROM tbl_category c where c.parent_category = '" .$category_id . "'");
    $result = $query->result();

    foreach ($result as $row) {
        $menu .= '/'.$row->category_id;
        $menu .= '/'.$this->get_child_category($row->category_id);
    }      
    return $menu;
} 


function list_image($folder,$product_id)
{
    $image_array=array();
                  
    $where = array('product_id'=>$product_id);       
    $records= $this->common_model->selectWhere('tbl_product_image',$where); 

    foreach ($records as $row) {
        $file='ftp_upload/'.$folder.'/product/image/'.$row->product_image;
        if(file_exists($file) && $row->product_image!=""){
            $image_array[]=$file;
        } 
    }
    if(empty($image_array)){
        $file='assets/No_image.png';
        if(file_exists($file)){
            $image_array[]=$file;
        } 
    } 

    return $image_array; 
}

function add_coupon()
{
    if(!$this->input->is_ajax_request()){ exit('No direct script access allowed'); }
    $coupon_jewelry=array();
    $message='Added To coupon';
    $status='0';
    if($this->session->userdata('coupon_jewelry'))
    {
      $coupon_jewelry=$this->session->userdata('coupon_jewelry');
    }    
    $jewelry_id=$this->input->get('jewelry_id');

    if (($key = array_search($jewelry_id, $coupon_jewelry)) !== false) {
      unset($coupon_jewelry[$key]);
      $message='Removed From coupon';
    }
    else if(count(array_unique($coupon_jewelry))<10){        
      $coupon_jewelry[]= $jewelry_id;       
    }
    else{
      $message='coupon List got Full. Please Remove Some Item.(Max:10)'; 
    }

    $this->session->set_userdata('coupon_jewelry',array_unique($coupon_jewelry));
    echo json_encode(array('message'=>$message,'status'=>$status));
}
function remove_coupon()
{
    if(!$this->input->is_ajax_request()){ exit('No direct script access allowed'); }
    $id=$this->input->get('id');
    $coupon_jewelry=$this->session->userdata('coupon_jewelry');

    if (($key = array_search($id, $coupon_jewelry)) !== false) {
      unset($coupon_jewelry[$key]);
    }

    $this->session->set_userdata('coupon_jewelry',array_unique(array_filter($coupon_jewelry)));
    echo json_encode('ok');
}

function product_coupon_submit()
{
    if($this->session->userdata('user_id')=="")
    {
        $this->session->set_flashdata('error_message', 'Please Login!');
        redirect(base_url('login'));
    }
    $product_id=$this->input->post('product_id');
    $coupon_rating=$this->input->post('coupon_rating');
    $coupon_title=$this->input->post('coupon_title');
    $coupon_content=$this->input->post('coupon_content');

    $where=array(
      'product_id'=>$product_id,
      'user_id'=>$this->session->userdata('user_id')
    );
    $details=$this->common_model->selectWhere('tbl_product_coupon',$where);
    print_ex($details);
    if(!empty($details)){
      $data=array(
        'product_coupon_title'=>$coupon_title,
        'product_coupon'=>$coupon_content,
        'product_rating'=>$coupon_rating['0'],
        'product_coupon_added'=>date('Y-m-d'),
      );        
      $this->common_model->updateData('tbl_product_coupon',$data,$where);
    }else{
      $data=array(
        'product_id'=>$product_id,
        'user_id'=>$this->session->userdata('user_id'),
        'product_coupon_title'=>$coupon_title,
        'product_coupon'=>$coupon_content,
        'product_rating'=>$coupon_rating['0'],
        'product_coupon_added'=>date('Y-m-d'),
      );
      $this->common_model->insertData('tbl_product_coupon',$data);
    }
    redirect($_SERVER['HTTP_REFERER']);
}
function product_coupon()
{    
    $segment_2=$this->uri->segment(2);
    $image_array=array(); 

    $where = "product_slug = '".$segment_2."'";
    $records= $this->jewelry_model->jewelry_list($where); 

    $jewelry_id=$records['0']->product_id;
    $product_price_arr=$this->product_price($jewelry_id);
    if(!$product_price_arr['price_var'] && $product_price_arr['price']){
      $product_price_show='$'.$product_price_arr['price'];
    }else{
      $product_price_show='$'.$product_price_arr['price_min'].'-$'.$product_price_arr['price_max'];
    }
    $img=$this->list_image($records['0']->NM_FOLDER_NAME,$records['0']->product_id);
    $image_array[] = @$img['0'];

    $where = "product_id = ".$jewelry_id." and status='active' ";
    $coupon_count = $this->jewelry_model->getProductcouponCount($where);
    $coupon_sum = $this->jewelry_model->getProductcouponSum($where);
    $coupon_rating = @round($coupon_sum['0']->coupon_sum / $coupon_count['0']->coupon_count);

    $data= array(
        'records'=>$records,
        'image_array'=>$image_array,
        'product_price_show'=>$product_price_show,
        'coupon_count'=>$coupon_count['0']->coupon_count,
        'coupon_rating'=>$coupon_rating,
    );
    //print_ex($data);
    $data['page_head'] = 'Jewelry coupon';

    $this->load->view('common/header',$data);
    $this->load->view('jewelry/jewelry_coupon',$data);
    $this->load->view('common/footer');
}
function load_product_coupon()
{
    if(!$this->input->is_ajax_request()){ exit('No direct script access allowed'); }

    $product_id=$this->input->get('product_id');
    $page=$this->input->get('page');
    $per_page=$this->input->get('per_page');
     
    $where = "product_id = ".$product_id." and status='active'";
    $records_count = $this->jewelry_model->getProductcouponCount($where);      
    $data['records_count'] =@$records_count['0']->coupon_count;  

    $per_page= ($per_page) ? $per_page : 10 ;
    $config['base_url'] = base_url().'load-product-coupon';
    $config['total_rows'] = $data['records_count'];
    $config['per_page'] = $per_page;
    $config['page_query_string'] = true;
    $config['query_string_segment'] = 'page';
    $config['cur_tag_open'] = '<a class="active paginate_button current">';
    $config['cur_tag_close'] = '</a>';
    $config['next_link'] = '>';
    $config['prev_link'] = '<';
    $config['num_links'] = 2;
    $config['first_link'] = false;
    $config['last_link'] = false;
    
    $page= ($page) ? $page : 0 ;
    $this->pagination->initialize($config);
    $page_link=$this->pagination->create_links();

    $where = "p.product_id = ".$product_id." and pr.status='active'";
    $records = $this->jewelry_model->getProductcouponLimit($where,$per_page,$page);

    echo json_encode(array('records'=>$records,'page_link'=>$page_link,'total_records'=>$data['records_count']));     
}
/// search //
public function header_search()
{
    $searchText=$this->input->get('searchText');

    $query_c = $this->db->query("select category_name as keyword from tbl_category where category_status ='active' and category_name like '%".$searchText."%' limit 0,100");
    $result_c = $query_c->result();        

    $query_p = $this->db->query("select product_sku as keyword from tbl_product where product_status ='active' and product_sku like '%".$searchText."%' limit 0,100");
    $result_p = $query_p->result();

    $result = $result_c + $result_p;

    echo json_encode(array('list'=>$result));   
}

public function header_search_result()
{  
    $data=array();
    $search = $this->input->post('search'); 
    if($search)
    { 
      $where="product_name LIKE '%$search%'";
      $where .="AND product_status = 'active' ";
      //$where .="OR product_description LIKE '%$keyword%'";
      $data = $this->jewelry_model->jewelry_list($where); 
    }
    //print_ex($data);
    if(!empty($data)){
        redirect(base_url().'jewelry-details/'.$data['0']->product_slug);
    }
    else{
        redirect(base_url().'jewelry');
    }       
}



}
