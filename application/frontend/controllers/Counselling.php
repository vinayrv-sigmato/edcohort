<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Counselling extends CI_Controller {

  public function __construct()
  {
    parent::__construct();

    $this->load->library('pagination');
    $this->load->helper('form');
    $this->load->model('counselling_model');
  }
  function index($id = '')
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

  //print_pre($_GET);

  $where =" c_status = 1  and c_date >= CURDATE()";
    //$where = "product_status = 'active'";

  $brandID = $this->input->get('brand');
  $product_type = $this->input->get('product_type');
  $board = $this->input->get('board');
  $class = $this->input->get('class');
  $batch = $this->input->get('batch');
  $customer_rating = $this->input->get('customer_rating');
  $date_posted = $this->input->get('date_posted');
  $cdate = $this->input->get('cdate');
  $sort_by = $this->input->get('sort_by');

//print_ex($_GET);
    if ($_GET) {

      if (!empty($brandID)) {
        $where .= " and PC.brand_id = " . $brandID . " ";
      }
      if (!empty($product_type)) {
        $where .= " and PR.product_type = " . $product_type . " ";
      }
      if (!empty($board)) {
        $where .= " and PC.board_id = " . $board . " ";
      }
      if (!empty($class)) {
        $where .= " and PC.class_id = " . $class . " ";
      }
      if (!empty($batch)) {
        $where .= " and PC.batch_id = " . $batch . " ";
      }
      if(!empty($cdate)){
        $where .= "and PC.c_date = ".$cdate." ";
      }
        if (!empty($course)) {
        $where .= " and PC.product_id = " . $course . " ";
      }

    } else {

      if (!empty($course)) {
        $where .= " and PC.product_id = " . $course . " ";
      }

    }

    $order = " PC.c_id DESC";
    $offset = 0;
    $limit = 200;
    
    $data['counselling_list'] = $this->counselling_model->counselling_list_limit($where,$limit,$offset,$order);
    //print_ex($data['counselling_list']);


    $where1 = "product_status = 'active'";
    if ($_POST) {

      if (!empty($brandID)) {
        $where1 .= " and brand_id = " . $brandID . " ";
      }
      if (!empty($product_type)) {
        $where1 .= " and product_type = " . $product_type . " ";
      }
      if (!empty($board)) {
        $where1 .= " and board_id = " . $board . " ";
      }
      if (!empty($class)) {
        $where1 .= " and class_id = " . $class . " ";
      }
      if (!empty($batch)) {
        $where1 .= " and batch_id = " . $batch . " ";
      }

    } else {

      if (!empty($course)) {
        $where1 .= " and product_id = " . $course . " ";
      }

    }

    $order = "product_name ASC";
    $data['product_list'] = $this->counselling_model->counselling_list($where1, $order);

  ////////////////////////////////////

  //print_ex($_POST);

    $wherecounselling = "PC.c_status = 1";

    if (!empty($course)) {
      $wherecounselling .= " and PC.product_id = " . $course . " ";
    }

    if (!empty($customer_rating)) {
      $wherecounselling .= " and PC.product_rating = " . $customer_rating . " ";
    }

    if (!empty($date_posted)) {
      $wherecounselling .= " and PC.c_date > " . $date_posted . " ";
    }
    $orderby = '';
    if (!empty($sort_by)) {
      $orderby = " PC.product_rating " . $sort_by . " ";
    }
    $page = 1;
    $page = $this->input->get('page');
    $per_page = $this->input->get('per_page');
    $records_count = $this->counselling_model->getProductcounsellingCount($wherecounselling);
  //echo $this->db->last_query(); die;
    $data['records_count'] = @$records_count['0']->counselling_count;
  // print_ex($data['records_count']);  
    $per_page = ($per_page) ? $per_page : 9;
    $config['base_url'] = base_url() . 'counselling?course=' .$course. '&brand='.$brandID.'&product_type='.$product_type.'&board='.$board.'&class='.$class.'&customer_rating='.$customer_rating.'&date='.$date_posted.'&sort_by='.$sort_by.'';
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
    $page = ($page) ? $page : 0;
    $this->pagination->initialize($config);

    $data['page_link'] = $this->pagination->create_links();
  //$records = $this->jewelry_model->jewelry_list_limit($wherecounselling, $per_page, $page, $order);

    $data['counselling_list'] = $this->counselling_model->getProductcounsellingLimit($wherecounselling,$orderby, $per_page, $page);
 //  print_ex($data['counselling_list']);  
  //echo $this->db->last_query();
    $counsellingCount = $this->counselling_model->getProductcounsellingCount($wherecounselling);
    $n = @$counsellingCount['0']->counselling_count;

    $data['counselling_count'] = $this->number_format_short($n);

    $this->load->view('common/header',$data);
    $this->load->view('counselling/counselling',$data);
    $this->load->view('common/footer');
  }

  function counselling_search()

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

     $brandID = $this->input->post('brand');
     $product_type = $this->input->post('product_type');
     $board = $this->input->post('board');
     $class = $this->input->post('class');
     $batch = $this->input->post('batch');
     $customer_rating = $this->input->post('customer_rating');
     $date_posted = $this->input->post('date_posted');
     $c_date = $this->input->post('c_date');
     $sort_by = $this->input->post('sort_by');

    if ($_POST) {

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
      if (!empty($c_date)) {
        $where .= " and c_date = " . $c_date . " ";
      }

   } else {

      if (!empty($course)) {
        $where .= " and product_id = " . $course . " ";
      }

    }

    $order = "product_name ASC";
    $data['product_list'] = $this->counselling_model->counselling_list($where, $order);

    $wherecounselling = "PC.c_status = 1";

    if (!empty($course)) {
      $wherecounselling .= " and PC.product_id = " . $course . " ";
    }

    if (!empty($brandID)) {
      $wherecounselling .= " and PC.brand_id = " . $brandID . " ";
    }

   // if (!empty($date_posted)) {
     // $wherecounselling .= " and pr.product_counselling_added > " . $date_posted . " ";
   // }
    $orderby = '';
    if (!empty($sort_by)) {
      $orderby = " PC.product_rating " . $sort_by . " ";
    }

    $data['counselling_list'] = $this->counselling_model->getProductcounselling($wherecounselling,$orderby);
//    print_ex($data['counselling_list']);
  //  echo $this->db->last_query(); 
    $counsellingCount = $this->counselling_model->getProductcounsellingCount($wherecounselling);
    $n = @$counsellingCount['0']->counselling_count;

    $data['counselling_count'] = $this->number_format_short($n);

    redirect(base_url('counselling?course=' . $data['product_list']['0']->product_id . '&brand='.$brandID.'&product_type='.$product_type.'&board='.$board.'&class='.$class.'&batch='.$batch.'&customer_rating='.$customer_rating.'&date='.$date_posted.'&sort_by='.$sort_by.''));

  }
//   {
//     $course = $this->input->get('course');

//   ////Filter data ////////

//     $where_category = 'status = 1 and parent_id = 0';
//     $data['category_records'] = $this->common_model->selectWhereorderby('tbl_class',$where_category,'title','ASC');

//     $where_brand = 'brand_status = 1';
//     $data['brand_records'] = $this->common_model->selectWhereorderby('tbl_brand', $where_brand, 'brand_sort_order', 'ASC');

//     $where_board = 'status = 1';
//     $data['board_records'] = $this->common_model->selectWhereorderby('tbl_board', $where_board, 'board_name', 'ASC');

//     $where_batch = 'status = 1 and batch_end >= NOW()';
//     $data['batch_records'] = $this->common_model->selectWhereorderby('tbl_batch', $where_board, 'batch_start', 'ASC');

//     $where_class = "status = 1 ";
//     $data['class_records'] = $this->common_model->selectWhereorderby('tbl_class', $where_class, 'title', 'ASC');

//    ////Filter////////

//   //print_pre($_GET);

//   $where =" c_status = 1  and c_date >= CURDATE()";
//     //$where = "product_status = 'active'";

//     $brandID = $this->input->get('brand');
//     $product_type = $this->input->get('product_type');
//     $board = $this->input->get('board');
//     $class = $this->input->get('class');
//     $batch = $this->input->get('batch');
//     $customer_rating = $this->input->get('customer_rating');
//     $date_posted = $this->input->get('date_posted');
//     $cdate = $this->input->get('cdate');
//     $sort_by = $this->input->get('sort_by');


//     if ($_POST) {

//       if (!empty($brandID)) {
//         $where .= " and PC.brand_id = " . $brandID . " ";
//       }
//       if (!empty($product_type)) {
//         $where .= " and PR.product_type = " . $product_type . " ";
//       }
//       if (!empty($board)) {
//         $where .= " and PC.board_id = " . $board . " ";
//       }
//       if (!empty($class)) {
//         $where .= " and PC.class_id = " . $class . " ";
//       }
//       if (!empty($batch)) {
//         $where .= " and PC.batch_id = " . $batch . " ";
//       }
//       if(!empty($cdate)){
//         $where .= "and PC.c_date = ".$cdate." ";
//       }
//         if (!empty($course)) {
//         $where .= " and PC.product_id = " . $course . " ";
//       }

//     } else {

//       if (!empty($course)) {
//         $where .= " and PC.product_id = " . $course . " ";
//       }

//     }

//     $order = " PC.c_id DESC";
//     $offset = 0;
//     $limit = 200;
    
//     $data['counselling_list'] = $this->counselling_model->counselling_list_limit($where,$limit,$offset,$order);
//    // print_ex($data['counselling_list']);


//     $where1 = "c_status = 1";
//     if ($_POST) {

//       if (!empty($brandID)) {
//         $where1 .= " and brand_id = " . $brandID . " ";
//       }
//       if (!empty($product_type)) {
//         $where1 .= " and product_type = " . $product_type . " ";
//       }
//       if (!empty($board)) {
//         $where1 .= " and board_id = " . $board . " ";
//       }
//       if (!empty($class)) {
//         $where1 .= " and class_id = " . $class . " ";
//       }
//       if (!empty($batch)) {
//         $where1 .= " and batch_id = " . $batch . " ";
//       }

//     } else {

//       if (!empty($course)) {
//         $where1 .= " and product_id = " . $course . " ";
//       }

//     }

//     $order = "product_name ASC";
//     $data['counselling_list'] = $this->counselling_model->getProductcounselling($where1, $order);
//    // echo $this->db->last_query();

//     redirect(base_url().'counselling?course=' . $data['product_list']['0']->product_id . '&brand='.$brandID.'&product_type='.$product_type.'&board='.$board.'&class='.$class.'&batch='.$batch.'&customer_rating='.$customer_rating.'&date='.$date_posted.'&sort_by='.$sort_by);
// }
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

function create_counselling()
{
  $course = $this->input->get('course');
  $user_id = $this->session->userdata('user_id');

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

  $this->load->view('common/header', $data);
  $this->load->view('counselling/write-a-counselling', $data);
  $this->load->view('common/footer');
}

function create_counselling_submit() {

    // print_ex($_REQUEST);
  $this->form_validation->set_rules('counsellingId', 'counsellingId', 'trim|required');
  $this->form_validation->set_rules('userId', 'userId', 'trim|required');

     // if ($this->form_validation->run() == FALSE) {
     //     $errors = validation_errors();
     //    // echo json_encode(['message'=>$errors]);
     //     $message = $errors;
     //     $status = 0;
     //     echo json_encode(array('message' => $message, 'status' => $status));
     //     exit();
     // }

  $counsellingId = $this->input->post('counselling_id');
  $userId = $this->input->post('user_id');   
  $email = $this->input->post('email');
  $name = $this->input->post('name'); 
  $phone = $this->input->post('phone');
  $comment = $this->input->post('comment'); 

  $product_id = $this->input->post('product_id');
  $category_id = $this->input->post('category');
  $write_counselling = $this->input->post('write_counselling');
  $board = $this->input->post('board'); 
  $brand = $this->input->post('brand');
  $class = $this->input->post('class'); 
  $batch = $this->input->post('batch');
  $counselling_title = $this->input->post('counselling_title'); 
  $cdate = $this->input->post('cdate');
  $start_time = $this->input->post('start_time');
  $end_time = $this->input->post('end_time'); 
  $youtube_channel_name = $this->input->post('youtube_channel_name');
  $youtube_channel_link = $this->input->post('youtube_channel_link'); 
  $youtube_meeting_name = $this->input->post('youtube_meeting_name');
  $description = $this->input->post('comment');
  $rating = $this->input->post('rating');

     //print_ex($_REQUEST);
      //print_ex($result);
      // echo $this->db->last_query(); 

  $data = array(
   'title' => $counselling_title,
   'product_id' => $product_id, 
   'brand_id' => $brand,
   'board_id' => $board,
   'class_id' => $class,
   'batch_id' => $batch,
   'user_id' => $userId, 
   'write_counselling'=> $write_counselling,
   'category_id' => $category_id,
   'c_status' => 1,
   'c_date' => $cdate,
   'start_time' => $start_time,
   'end_time' => $end_time,
   'description' => $description,
   'product_rating' => $rating,
   'date_added' => date('Y-m-d H:i:s')                                
 );
  //print_ex($data);
  $id = $this->common_model->insertData('tbl_product_counselling', $data);

  if($id){
    $data = array(
      'youtube_channel_name' => $youtube_channel_name,
      'youtube_channel_link' => $youtube_channel_link, 
      'youtube_meeting_name' => $youtube_meeting_name,
      'user_id' => $userId,
      'meeting_id' => $id,
      'youtube_status' => 1,
      'date_added' => date('Y-m-d H:i:s')                                
    );
    $ytid = $this->common_model->insertData('tbl_youtube_meeting', $data);
  }
  //$userDetails=$this->common_model->selectOne('tbl_customer','customer_id',$counsellingId);   
  // $userDetails=$this->common_model->selectOne('tbl_customer','customer_id',$userId);  
  // $order = "c_date ASC";
  // $where = "c_id = ".$counsellingId."";
  // $counselling_list = $this->counselling_model->getProductcounsellingLimit($where,1,0);
  //        // echo $this->db->last_query();
  //        // print_ex($counselling_list);      

  // $config['wordwrap'] = TRUE;
  // $config['mailtype'] = 'html';      
  // $config['charset'] = 'utf-8';
  // $config['priority'] = '1';      
  // $config['crlf']  = "\r\n";      
  // $config['newline']  = "\r\n";
  //          //$config['smtp_crypto']  = 'tls';      
  // $this->email->initialize($config);      
  // $this->email->from(SITE_EMAIL,SITE_NAME);      
  // $this->email->to(SITE_EMAIL);
  // $this->email->subject("Counselling Created");      
  // $data_email['message_body'] = 'This email is generated from website.<br> 
  // Name : '.$userDetails['0']->firstname.' '.$userDetails['0']->lastname.'<br>
  // Email : '.$userDetails['0']->email.'<br>
  // Phone : '.$userDetails['0']->phone.'<br>';
  // $data_email['product_name'] ="";       
  // $data_email['product_image'] ='';
  // $data_email['product_detail'] ='';              
  // $msg = $this->load->view('email/jewelry_details',$data_email, TRUE);
  // $this->email->message($msg);
  // $this->email->send();
  //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
  // $this->email->initialize($config);      
  // $this->email->from(SITE_EMAIL,SITE_NAME);      
  // $this->email->to($userDetails['0']->email);
  // $this->email->subject("Counselling Booking");      

  // $data_email['message_body'] = 'Thanks for your interest. We will get back to you very soon.<br> 
  // <br> ';              
  // $msg = $this->load->view('email/jewelry_details',$data_email, TRUE);
  // $this->email->message($msg);  
  // if($this->email->send()){     
  //            // $this->session->set_flashdata('alert_message','Request has been sent successfully.');
  // }else{
  //           //  $this->session->set_flashdata('error_message','Sorry Unable to send email.');
  // }     
        //$message = 'Comment submitted successfully';
  $this->session->set_flashdata('alert_message','Counselling created successfully.');
  redirect($_SERVER['HTTP_REFERER']);
}
function counselling_confirm()
{  
  $user_id = $this->session->userdata('user_id');
  $segment_2=$this->uri->segment(2);

  $where = "c_id = ".$segment_2;     
  $order = "c_date ASC";
  $data['counselling_list'] = $this->counselling_model->getProductcounselling($where,$order);

  $counsellingCount = $this->counselling_model->getProductCounsellingCount($where);
  $n = @$counsellingCount['0']->counselling_count;
  $data['counselling_count'] = $this->number_format_short($n);

  $data['page_head'] = 'Counselling Details';
  $this->load->view('common/header',$data);
  $this->load->view('counselling/counselling-confirm',$data);
  $this->load->view('common/footer');
}
function number_format_short($n)
{
  // first strip any formatting;
  $n = (0 + str_replace(",", "", $n));
  // is this a number?
  if (!is_numeric($n))
    return false;
  // now filter it;
  if ($n > 1000000000000)
    return round(($n / 1000000000000), 2) . 'T';
  elseif ($n > 1000000000)
    return round(($n / 1000000000), 2) . 'B';
  elseif ($n > 1000000)
    return round(($n / 1000000), 2) . 'M';
  elseif ($n > 1000)
    return round(($n / 1000), 2) . 'K';

  return number_format($n);
}

function get_counselling_board()
{
  $product_type = 0;
  $brand_id = $this->input->post('brand_id');
  $product_type = $this->input->post('product_type');
  if ($brand_id) {
    echo $this->counselling_model->fetch_counselling_board_list($brand_id,$product_type);
  }
}

function get_counselling_class() {
   //$category_id = $this->input->post('category_id');
 $product_type = 0;
 $product_type = $this->input->post('product_type');
 $board_id = $this->input->post('board_id');
 $brand_id = $this->input->post('brand_id');
  // $class_id = $this->input->post('class_id');
 echo $this->counselling_model->fetch_counselling_class_list($brand_id,$product_type,$board_id);
 // echo $output;
}

function get_counselling_batch()
{
  $product_type = 0;
  //$board_id = $this->input->post('board_id');
  $product_type = $this->input->post('product_type');
  $board_id = $this->input->post('board_id');
  $brand_id = $this->input->post('brand_id');
  $class_id = $this->input->post('class_id');
  if ($board_id) {
    echo $this->counselling_model->fetch_counselling_batch_list($brand_id,$product_type,$board_id,$class_id);
  }
}

}

// function list_image($folder,$product_id)
// {
//   $image_array=array();

//   $where = array('product_id'=>$product_id);       
//   $records= $this->common_model->selectWhere('tbl_product_image',$where); 

//   foreach ($records as $row) {
//     $file='ftp_upload/'.$folder.'/product/image/'.$row->product_image;
//     if(file_exists($file) && $row->product_image!=""){
//       $image_array[]=$file;
//     } 
//   }
//   if(empty($image_array)){
//     $file='assets/No_image.png';
//     if(file_exists($file)){
//       $image_array[]=$file;
//     } 
//   } 

//   return $image_array; 
// }

/// search //
// public function header_search()
// {
//   $searchText=$this->input->get('searchText');

//   $query_c = $this->db->query("select category_name as keyword from tbl_category where category_status ='active' and category_name like '%".$searchText."%' limit 0,100");
//   $result_c = $query_c->result();        

//   $query_p = $this->db->query("select product_sku as keyword from tbl_product where product_status ='active' and product_sku like '%".$searchText."%' limit 0,100");
//   $result_p = $query_p->result();

//   $result = $result_c + $result_p;

//   echo json_encode(array('list'=>$result));   
// }

// public function header_search_result()
// {  
//   $data=array();
//   $search = $this->input->post('search'); 
//   if($search)
//   { 
//     $where="product_name LIKE '%$search%'";
//     $where .="AND product_status = 'active' ";
//       //$where .="OR product_description LIKE '%$keyword%'";
//     $data = $this->jewelry_model->jewelry_list($where); 
//   }
//     //print_ex($data);
//   if(!empty($data)){
//     redirect(base_url().'jewelry-details/'.$data['0']->product_slug);
//   }
//   else{
//     redirect(base_url().'jewelry');
//   }       
// }



