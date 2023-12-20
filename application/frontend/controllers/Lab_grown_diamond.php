<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lab_grown_diamond extends CI_Controller {

  public function __construct()
  {
    parent::__construct();   
    $this->load->library('pagination'); 
    $this->load->model('diamond_model');  
    $this->load->library('excel');  
  } 
  function index()
  { 
      $data['page_head'] = 'Lab Grown Diamond '.$this->input->get('sf');
      $this->load->view('common/header',$data);
      $this->load->view('lab_grown_diamond/diamond',$data);
      $this->load->view('common/footer');
  }
  function load_more_data()
  {
    if(!$this->input->is_ajax_request()){ exit('No direct script access allowed'); }
      $page=$this->input->get('page');
      $per_page=$this->input->post('per_page');
     
      $where="diamond_id > 0 AND diamond_type = 2 AND total_price > 100";    
     
      $stock = $this->input->post('stock');       
      if(!empty($stock))
      {           
          $splitstock = explode(',', $stock); 
          $q1stock=implode("','",$splitstock);              
          $where .= " AND stock_id IN ('".$q1stock."')"; 
          //print_ex($where);            
      }     
      $shape = $this->input->post('checkbox');      
      if(!empty($shape))
      {
          $q1=implode("','",$shape);
          $where .= " AND shape_filter IN ('".$q1."')";
      }   
       $color = $this->input->post('color');                  
       if(!empty($color))
       {
           $color_array=array("D", "E", "F", "G", "H", "I", "J", "K", "L", "M");
           $color_array=$this->find_range($color,$color_array);
           $q2=implode("','",$color_array);
           $where .= " AND color IN ('".$q2."')";           
       }      
       $checkboxcut = $this->input->post('cut');                
       if(!empty($checkboxcut))
       {         
          $array_va=array("Ideal","Excellent", "Very Good", "Good", "Fair");
          $checkboxcut_range=$this->find_range($checkboxcut,$array_va);
          if(in_array('Round',  $shape))
          {
            if($checkboxcut=='Ideal;Fair') {
              $checkboxcut_range[]='NA';
            }
            $qcut = implode("','", $checkboxcut_range);
            $where .= " AND cut_full IN ('".$qcut."')";
          }                  
       }     
       $checkboxpolish = $this->input->post('polish');                
       if(!empty($checkboxpolish))
       {            
            $array_va=array("Excellent", "Very Good", "Good", "Fair");
            $checkboxpolish_range=$this->find_range($checkboxpolish,$array_va);

            if($checkboxpolish=='Excellent;Fair') {
                $checkboxpolish_range[]='NA';
            }

            $qpolish = implode("','", $checkboxpolish_range);
            $where .= " AND polish_full IN ('".$qpolish."')";       
       }         
       $checkboxsymm = $this->input->post('symmetry');                
       if(!empty($checkboxsymm))
       {           
          $array_va=array("Excellent", "Very Good", "Good", "Fair");
          $checkboxsymm_range=$this->find_range($checkboxsymm,$array_va);

           if($checkboxsymm=='Excellent;Fair') {
              $checkboxsymm_range[]='NA';
          }

          $qsymm = implode("','", $checkboxsymm_range);
          $where .= " AND symmetry_full IN ('".$qsymm."')";      
       }     
       $checkboxClarity = $this->input->post('clarity');
       if(!empty($checkboxClarity))
       {       
          $clarity_va=array("FL","IF","VVS1","VVS2","VS1","VS2","SI1","SI2","SI3","I1","I2","I3");
          $checkboxClarity=$this->find_range($checkboxClarity,$clarity_va);
         
          $qClarity = implode("','", $checkboxClarity);
          $where .= " AND grade IN ('".$qClarity."')";
       }   
       $checkboxFlour = $this->input->post('fluorescence');
       if(!empty($checkboxFlour))
       {         
          $array_va=array("None", "Faint", "Medium", "Strong","Very Strong");
          $checkboxFlour=$this->find_range($checkboxFlour,$array_va);

          $qFlour = implode("','", $checkboxFlour);
          $where .= " AND fluor_full IN ('".$qFlour."')";      
       }
      $range = $this->input->post('size');
      $split = explode(';', $range);
      $split1 = @$split['0'];    
      $split2 = @$split['1'];
      if($split2=='6'){
        $split2 = '200';
      }     
      if(!empty($range))
      {        
        $where .= " AND weight BETWEEN ('".$split1."') AND ('".$split2."')";     
      }     
      $total = $this->input->post('price');
      $splittotal = explode(';', $total);
      $splittotal1 = $splittotal['0'];
      $splittotal2 = @$splittotal['1'];    
      if(!empty($total))
      {
         $where .= " AND total_price BETWEEN (".$splittotal1.") AND (".$splittotal2.")";
      }
      $cert = $this->input->post('cert');      
      if(!empty($cert))
      {      
          $q1=implode("','",$cert); 
          $where .= " AND lab_filter IN ('".$q1."')";
      }

      //print_ex($where);
      $records_count = $this->diamond_model->diamond_count($where);
      //print_ex($this->db->last_query());
      $data['records_count'] =$records_count['0']->diamond_count;  
      //print_ex($this->input->get());  
      $per_page= ($per_page) ? $per_page : 100 ;
      $config['base_url'] = base_url().'load-more-diamond';
      $config['total_rows'] = $data['records_count'];
      $config['per_page'] = $per_page;
      $config['page_query_string']=true;
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

      $records = $this->diamond_model->diamond_list_limit($where,$per_page,$page);
      echo json_encode(array('records'=>$records,'page_link'=>$page_link,'total_records'=>$data['records_count']));
  }
  function diamond_details()
  {
      $inventory_id = $this->uri->segment(2);  
      $image_array=array();
      $sample_image_array=array();
      $image_link=array();
      $video_array=array();
      $video_link=array();
      $certificate_array=array();
      $where = 'diamond_id = '."'".$inventory_id."'";      
      $records = $this->diamond_model->diamond_list($where);
      if(count($records))
      {
        if($records['0']->diamond_image!="")
        {
          if(checkLink($records['0']->diamond_image)=='200')
          {
            if(preg_match("/png|jpg|jpeg|gif$/", $records['0']->diamond_image)){ 
              $image_array[]=$records['0']->diamond_image;
            }else{
              $image_link[]=$records['0']->diamond_image;
            }
          }
        }
        if(!count($image_array))
        {
            $file='assets/images/shape/'.$records['0']->shape_full.'.jpg';            
            if(file_exists($file)){
                $sample_image_array[]=base_url().$file;
            }else{
                $image_array[]=base_url().'assets/images/shape/No_image.jpg';
            } 
        }
        if($records['0']->diamond_video!="")
        {
          if(checkLink($records['0']->diamond_video)=='200'){
            $video_link[]=$records['0']->diamond_video;
          }
        }
        if($records['0']->report_filename!="")
        {
          if(checkLink($records['0']->report_filename)=='200'){
            $certificate_array[]=$records['0']->report_filename;
          }
        }
        //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
        $crange1= number_format($records['0']->weight-0.20,2); 
        $crange2= number_format($records['0']->weight+0.20,2);
        $where1 = " weight BETWEEN (".$crange1.") AND (".$crange2.")";

        $shape[]=$records['0']->shape;
        if($records['0']->shape=='RBC')
        {            
          $shape[]='Round';
          $shape[]='ROUND';              
        }

        $s1=implode("','",$shape);
        $where1 .= " AND shape IN ('".$s1."')";

        $similar_records = $this->diamond_model->diamond_list_limit($where1,10,0);
        //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
      }
      else
      {
        redirect(base_url().'diamond');
      } 
      //print_pre($similar_records);   
      $data= array(
          'records'=>$records,
          'similar_records'=>$similar_records,
          'image_array'=>$image_array,
          'sample_image_array'=>$sample_image_array,
          'video_array'=>$video_array,
          'certificate_array'=>$certificate_array,
          'image_link'=>$image_link,
          'video_link'=>$video_link
      );
      //print_ex($data);
      $data['page_head'] = 'Diamond Details';     

      $this->load->view('common/header',$data);
      $this->load->view('lab_grown_diamond/diamond_details',$data);
      $this->load->view('common/footer');
  }


  function print_details()
  {
      $inventory_id = $this->input->get('diamond_id');
      $image_array=array();
      $sample_image_array=array();
      $image_link=array();
      $where = 'diamond_id = '."'".$inventory_id."'";      
      $records = $this->diamond_model->diamond_list($where);
      //print_ex($records['0']->shape_full);

      if($records['0']->diamond_image!="")
      {
        if(checkLink($records['0']->diamond_image)=='200')
        {
          if(preg_match("/png|jpg|jpeg|gif$/", $records['0']->diamond_image)){ 
            $image_array[]=$records['0']->diamond_image;
          }
        }
      }
      if(!count($image_array))
      {
          $file='assets/images/shape/'.$records['0']->shape_full.'.jpg';            
          if(file_exists($file)){
              $image_array[]=base_url().$file;
          }else{
              $image_array[]=base_url().'assets/images/shape/No_image.jpg';
          } 
      }          
      $data= array(
          'records'=>$records,
          'image_array'=>$image_array
      );
      //print_ex($data);
      
      echo json_encode(array('records'=>$data));
  }
  function list_image($NM_FOLDER_NAME,$STOCK_ID)
  {
      $image_array=array(); 
          
      $file='ftp_upload/'.$NM_FOLDER_NAME.'/diamond/image/'.$STOCK_ID.'.jpg';

      if(file_exists($file))
      {
          $image_array[]=$file;
      } 
      for($i=1;$i<=5;$i++)
      {
          $file='ftp_upload/'.$NM_FOLDER_NAME.'/diamond/image/'.$STOCK_ID.'_'.$i.'.jpg';

          if(file_exists($file))
          {
              $image_array[]=$file;
          } 
      }
      //echo json_encode($image_array);
      return $image_array; 
  }
  function find_range($range,$array_from)
  {
      $split = explode(';', $range);
      $split1 = @$split['0'];    
      $split2 = @$split['1'];
      $split1_key = array_search($split1, $array_from); 
      $split2_key = array_search($split2, $array_from);
      for ($i=$split1_key; $i <= $split2_key; $i++) { 
          $array[]=$array_from[$i];
      }
      return $array;
  }
 function add_cart()
  {     
    $user_id=$this->session->userdata('user_id');
    $diamond_id=$this->input->get('diamond_id');

    $where = 'diamond_id = '."'".$diamond_id."'";      
    $records = $this->diamond_model->diamond_list($where);
    foreach ($records as $row) 
    {
      $img=$this->list_image($row->NM_FOLDER_NAME,$row->stock_id);
      //print_pre($img);
      if(count(array_filter($img)))
      {
        $image_show = @$img['0'];
      }
      else
      {
        $image_show = shape_img($records['0']->shape);
      }

    }  
    if(count($records))
    {
      if($user_id!="")
      {
          $where=array('product_id'=>$diamond_id,'product_type'=>'diamond','customer_id'=>$user_id,);
          $cart_detail=$this->common_model->selectWhere('tbl_cart',$where);
          if(!count($cart_detail))
          {        
            $data=array(
              'product_id'=>$diamond_id,
              'stock_id'=>$records['0']->stock_id,
              'quantity'=>1,
              'product_type'=>'diamond',
              'price'=>$records['0']->total_price,
              'total_price'=>$records['0']->total_price,
              'name'=>$records['0']-> shape.' diamond',
              'description'=>$records['0']->shape.', '.$records['0']->cut_full.'-cut, '.$records['0']->color.'-color, '.$records['0']->grade.'-clarity diamond',
              'image'=>$image_show,
              'created_at'=>date('Y-m-d H:i:s'),
              'customer_id'=>$user_id,
            );
            $cart_id=$this->common_model->insertData('tbl_cart',$data);

          }
          $where1=array('customer_id'=>$user_id);
          $cart_details=$this->cart_model->get_cart($where1);  
          echo json_encode(array('records'=>$cart_details,'message'=>'ok'));

      }
      else
      { 
        echo json_encode(array('records'=>array(),'message'=>'login')); 
      }
    }
    
  }
  function add_wish()
  {     
    $user_id=$this->session->userdata('user_id');
    $diamond_id=$this->input->get('diamond_id');

    $where = 'diamond_id = '."'".$diamond_id."'";      
    $records = $this->diamond_model->diamond_list($where);
    foreach ($records as $row) 
    {
      $img=$this->list_image($row->NM_FOLDER_NAME,$row->stock_id);
      if(count(array_filter($img)))
      {
        $image_show = @$img['0'];
      }
      else
      {
        $image_show = shape_img($records['0']->shape);
      }
    } 
    if(count($records))
    {
      if($user_id!="")
      {
          $where=array('product_id'=>$diamond_id,'product_type'=>'diamond','customer_id'=>$user_id,);
          $cart_detail=$this->common_model->selectWhere('tbl_wishlist',$where);
          if(!count($cart_detail))
          {        
            $data=array(
              'product_id'=>$diamond_id,
              'stock_id'=>$records['0']->stock_id,
              'quantity'=>1,
              'product_type'=>'diamond',
              'price'=>$records['0']->total_price,
              'total_price'=>$records['0']->total_price,
              'name'=>$records['0']-> shape.' diamond',
              'description'=>$records['0']->shape_full.', '.$records['0']->cut_full.'-cut, '.$records['0']->color.'-color, '.$records['0']->grade.'-clarity diamond',
              'image'=>$image_show,
              'created_at'=>date('Y-m-d H:i:s'),
              'customer_id'=>$user_id,
            );
            $cart_id=$this->common_model->insertData('tbl_wishlist',$data);

          }
          $where1=array('customer_id'=>$user_id);          
          $details=$this->wishlist_model->get_wishlist($where1);
          //$data=array();
          echo json_encode(array('records'=>$details,'message'=>'ok'));
      }
      else
      { 
        echo json_encode(array('records'=>array(),'message'=>'login')); 
      }
    }
    
  }
  
  function email_to_friend()
  {
      $user_id=$this->session->userdata('user_id');
     
      $name=$this->input->post('name');
      $email=$this->input->post('email');
      $phone = $this->input->post('phone');
      $comment = $this->input->post('comment');
      
      $inventory_id = $this->input->post('inventory_id');
      $where = 'diamond_id = '."'".$inventory_id."'";       
      $records = $this->diamond_model->diamond_list($where);      
      ////////////////  Email code /////////////////////////
      $this->load->library('email');                        
      $config['wordwrap'] = TRUE;
      $config['mailtype'] = 'html';     
      $config['charset'] = 'utf-8';
      $config['priority'] = '1';      
      $config['crlf']      = "\r\n";      
      $config['newline']      = "\r\n";
      //$config['smtp_crypto']  = 'tls';      
      $this->email->initialize($config);      
      $this->email->from(SITE_EMAIL,SITE_NAME);     
      $this->email->to($email);
      $this->email->subject("Contact Inquiry");   
      
      $data_email['fname'] = $name;     
      $str_content = '';
      $str_name = ucwords($data_email['fname']);
      $str_url = '<table border="1" style="border-collapse: collapse;"> 
        <thead> 
            <tr>
                <th style="border: 1px solid black;" class="header">Stock #</th>
                <th style="border: 1px solid black;" class="header">Shape</th>
                <th style="border: 1px solid black;" class="header">Cts</th>
                <th style="border: 1px solid black;" class="header">Color</th>
                <th style="border: 1px solid black;" class="header">Clarity</th>
                <th style="border: 1px solid black;" class="header">Cut</th>
                <th style="border: 1px solid black;" class="header">Pol</th>                
                <th style="border: 1px solid black;" class="header">Sym</th>
                <th style="border: 1px solid black;" class="header">Flour</th>
                <th style="border: 1px solid black;" class="header">Depth%</th>                
                <th style="border: 1px solid black;" class="header">Table%</th> 
                <th style="border: 1px solid black;" class="header">Price</th>               
                <th style="border: 1px solid black;" class="header">Lab</th>               
                <th style="border: 1px solid black;" class="header">Measurements</th>
            </tr>
        <tbody id="add_data" style=""> ';
             //$cnt = 1;
        foreach($records as $member) {

      $str_url .='<tr style="border: 1px solid black; text-align: center;">
                <td style="border: 1px solid black; text-align: center;">'.$member->stock_id.'</td>
                <td style="border: 1px solid black; text-align: center;">'.$member->shape_full.'</td>
                <td style="border: 1px solid black; text-align: center;">'.number_format($member->weight,2,'.','').'</td>              
                <td style="border: 1px solid black; text-align: center;">'.$member->color.'</td>
                <td style="border: 1px solid black; text-align: center;">'.$member->grade.'</td>
                <td style="border: 1px solid black; text-align: center;">'.$member->cut_full.'</td>
                <td style="border: 1px solid black; text-align: center;">'.$member->polish_full.'</td>
                <td style="border: 1px solid black; text-align: center;">'.$member->symmetry_full.'</td>
                <td style="border: 1px solid black; text-align: center;">'.$member->fluor_full.'</td>
                <td style="border: 1px solid black; text-align: center;">'.number_format($member->depth,1).'</td>
                <td style="border: 1px solid black; text-align: center;">'.$member->table_d.'</td>   
                <td style="border: 1px solid black; text-align: center;">$'.round($member->total_price).'</td>
                <td style="border: 1px solid black; text-align: center;">'.$member->lab.'</td>
                <td style="border: 1px solid black; text-align: center;">'.$member->measurements.'</td>                                   
            </tr>
           '; }  '
        </tbody>        
    </table>';
      
      $data_email['str_final'] = '<p>Message : '.$comment.'</p>'.$str_url;
      //print_pre($data_email);  die();
      $msg = $this->load->view('email/email_template',$data_email, TRUE);     
      $this->email->message($msg);
       $data['message'] = "Sorry Unable to send email..."; 
      if($this->email->send())
      {     
         $data['message'] = "Mail sent..."; 
      }             
      //++++++++++++++++++++++++++++++ Admin +++++++++++++++++++++++++++++++++++
      $this->email->initialize($config);      
      $this->email->from(SITE_EMAIL,SITE_NAME);
      $this->email->to(SITE_EMAIL);
      $this->email->subject("Diamond Detail");
      $data_email['fname'] = 'Admin';  
      $data_email['str_final'] = '<p>A user has sent diamond Detail to following address</p>
      <p><b>Name: </b>'.$name.'</p>
      <p><b>Email: </b>'.$email.'</p>
      <p><b>Phone: </b>'.$phone.'</p>
      <p><b>Message: </b>'.$message.'</p>'.$str_url;
      //print_pre($data_email);  die();
      $msg = $this->load->view('email/email_template',$data_email, TRUE);
      //echo $msg; die;
      $this->email->message($msg);
      $data['message'] = "Sorry Unable to send email..."; 
      $this->email->send();
      if($this->email->send())
      {                     
         $data['message'] = "Mail Sent...";
      }          
      echo '<div class="alert alert-success">Email has been sent successfully..</div>';
  }

  function email_to_vendor()
  {
      $user_id=$this->session->userdata('user_id');

      $name=$this->input->post('name');
      $email=$this->input->post('email');
      $phone = $this->input->post('phone');
      $comment = $this->input->post('comment');

      $inventory_id = $this->input->post('inventory_id');
      $where = 'diamond_id = '."'".$inventory_id."'";
      $records = $this->diamond_model->diamond_list($where);
      $data = $this->common_model->selectWhere('tbl_customer',array('customer_id'=>$user_id));

      $this->load->library('email');                        
      $config['wordwrap'] = TRUE;
      $config['mailtype'] = 'html';     
      $config['charset'] = 'utf-8';
      $config['priority'] = '1';      
      $config['crlf']      = "\r\n";      
      $config['newline']      = "\r\n";
      
      $this->email->initialize($config);      
      $this->email->from(SITE_EMAIL,SITE_NAME);     
      $this->email->to($email);
      $this->email->subject("Diamond Inquiry");   
      
      $data_email['fname'] = $name;     
      $str_content = '';
      $str_name = ucwords($data_email['fname']);
      $str_url = ' <p>Name : '.$name.'</p>
      <p>Email : '.$email.'</p>
      <p>Phone : '.$phone.'</p>
      <p>Message : '.$comment.'</p>
      <table border="1" style="border-collapse: collapse;"> 
        <thead> 
            <tr> 
                <th style="border: 1px solid black;" class="header">Stock #</th>
                <th style="border: 1px solid black;" class="header">Shape</th>
                <th style="border: 1px solid black;" class="header">Cts</th>
                <th style="border: 1px solid black;" class="header">Color</th>
                <th style="border: 1px solid black;" class="header">Clarity</th>
                <th style="border: 1px solid black;" class="header">Cut</th>
                <th style="border: 1px solid black;" class="header">Pol</th>                
                <th style="border: 1px solid black;" class="header">Sym</th>
                <th style="border: 1px solid black;" class="header">Flour</th>
                <th style="border: 1px solid black;" class="header">Depth%</th>
                <th style="border: 1px solid black;" class="header">Table%</th>    
                <th style="border: 1px solid black;" class="header">Price</th>               
                <th style="border: 1px solid black;" class="header">Lab</th>               
                <th style="border: 1px solid black;" class="header">Measurements</th>
            </tr>
        <tbody id="add_data" style=""> ';                
            foreach($records as $member) {                
              $str_url .='<tr style="border: 1px solid black; text-align: center;">
                <td style="border: 1px solid black; text-align: center;">'.$member->stock_id.'</td>
                <td style="border: 1px solid black; text-align: center;">'.$member->shape.'</td>
                <td style="border: 1px solid black; text-align: center;">'.number_format($member->weight,2,'.','').'</td>              
                <td style="border: 1px solid black; text-align: center;">'.$member->color.'</td>
                <td style="border: 1px solid black; text-align: center;">'.$member->grade.'</td>
                <td style="border: 1px solid black; text-align: center;">'.$member->cut_full.'</td>
                <td style="border: 1px solid black; text-align: center;">'.$member->polish_full.'</td>
                <td style="border: 1px solid black; text-align: center;">'.$member->symmetry_full.'</td>
                <td style="border: 1px solid black; text-align: center;">'.$member->fluor_full.'</td>
                <td style="border: 1px solid black; text-align: center;">'.number_format($member->depth,1).'</td>
                <td style="border: 1px solid black; text-align: center;">'.$member->table_d.'</td>           
                <td style="border: 1px solid black; text-align: center;">$'.round($member->total_price).'</td>
                <td style="border: 1px solid black; text-align: center;">'.$member->lab.'</td>
                <td style="border: 1px solid black; text-align: center;">'.$member->measurements.'</td>                                   
            </tr>
           '; }  '
        </tbody>        
    </table>';
      
      $data_email['str_final'] = '<p>You have just asked for diamond Inquiry. We will get back to you soon. You query is as follows.</p>'.$str_url;
      $msg = $this->load->view('email/email_template',$data_email, TRUE);     
      $this->email->message($msg);
      $data['message'] = "Sorry Unable to send email..."; 
      if($this->email->send())
      {     
         $data['message'] = "Mail sent...";
      }                
      //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
      $this->email->initialize($config);      
      $this->email->from(SITE_EMAIL,SITE_NAME);     
      $this->email->to(SITE_EMAIL);
      $this->email->subject("Diamond Inquiry");   
      
      $data_email['fname'] = 'Admin';     
      $str_content = '';
      $str_name = ucwords($data_email['fname']);
      $data_email['str_final'] = '<p>Customer has just asked for diamond Inquiry. The query is as follows.</p>'.$str_url;
      $msg = $this->load->view('email/email_template',$data_email, TRUE);     
      $this->email->message($msg);
      $data['message'] = "Sorry Unable to send email..."; 
      if($this->email->send())
      {     
         $data['message'] = "Mail sent...";
      }

      echo '<div class="alert alert-success">Email has been sent successfully..</div>';       
  }
  //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
  function export_diamond()
  {        
    $where = ""; 
    $dis_value=$this->input->get('dis_value');
    $all_id=$this->input->get('all_id');
    if($all_id!="") 
    {
        $all_id=explode(',', $all_id);
        $all_id_arr=implode("','",$all_id);                       
        $where .= "diamond_id IN ('".$all_id_arr."')";
    }        
    $records = $this->diamond_model->diamond_list_limit($where,1000,0);
  
    $this->excel->setActiveSheetIndex(0);
    $this->excel->getActiveSheet()->setTitle('Stock');
    $styleArray = array(
      'font'  => array(
          'color' => array('rgb' => '8c0808'),
          'size'  => 18,
          'name' => 'Verdana',
          'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,              
    )); 

    $this->excel->getActiveSheet()->setCellValueByColumnAndRow('0','1' ,'Stock#');
    $this->excel->getActiveSheet()->setCellValueByColumnAndRow('1','1' ,'Shape');
    $this->excel->getActiveSheet()->setCellValueByColumnAndRow('2','1' ,'Carat');
    $this->excel->getActiveSheet()->setCellValueByColumnAndRow('3','1' ,'Color');
    $this->excel->getActiveSheet()->setCellValueByColumnAndRow('4','1' ,'Clarity');
    $this->excel->getActiveSheet()->setCellValueByColumnAndRow('5','1' ,'Cut');
    $this->excel->getActiveSheet()->setCellValueByColumnAndRow('6','1' ,'Polish');
    $this->excel->getActiveSheet()->setCellValueByColumnAndRow('7','1' ,'Symmetry');
    $this->excel->getActiveSheet()->setCellValueByColumnAndRow('8','1' ,'Fluorescence');    
    $this->excel->getActiveSheet()->setCellValueByColumnAndRow('9','1' ,'Depth%');
    $this->excel->getActiveSheet()->setCellValueByColumnAndRow('10','1' ,'Table%');
    //$this->excel->getActiveSheet()->setCellValueByColumnAndRow('11','1' ,'$/Carat');
    $this->excel->getActiveSheet()->setCellValueByColumnAndRow('11','1' ,'Price');
    $this->excel->getActiveSheet()->setCellValueByColumnAndRow('12','1' ,'Lab');
    $this->excel->getActiveSheet()->setCellValueByColumnAndRow('13','1' ,'Measurements');
  
    $this->excel->getActiveSheet()->getStyle('A1:P1')
      ->applyFromArray(
          array(
              'font' => array(                    
                  'color' => array('rgb' => '000000'),
                  'size'  => 11,
                  'name' => 'Calibri'
              ),
              'fill' => array(
                  'type' => PHPExcel_Style_Fill::FILL_SOLID,
                  'color' => array('rgb' => 'ffa600')
              )
          )
      );
    $i=2;       
    foreach($records as $row) 
    {  
        // $new_discount=$row->rapnet_discount+$dis_value;
        // $total=(($row->total_price*$new_discount)/100);
        // $ppc=($row->total_price-$total);
        // $new_total=($ppc*$row->weight);
        
        $this->excel->getActiveSheet()->setCellValueByColumnAndRow('0',$i,$row->stock_id);
        $this->excel->getActiveSheet()->setCellValueByColumnAndRow('1',$i,$row->shape);        
        $this->excel->getActiveSheet()->setCellValueByColumnAndRow('2',$i,number_format($row->weight,2));
        $this->excel->getActiveSheet()->setCellValueByColumnAndRow('3',$i,$row->color);
        $this->excel->getActiveSheet()->setCellValueByColumnAndRow('4',$i,$row->grade);
        $this->excel->getActiveSheet()->setCellValueByColumnAndRow('5',$i,$row->cut_full);
        $this->excel->getActiveSheet()->setCellValueByColumnAndRow('6',$i,$row->polish_full);
        $this->excel->getActiveSheet()->setCellValueByColumnAndRow('7',$i,$row->symmetry_full);
        $this->excel->getActiveSheet()->setCellValueByColumnAndRow('8',$i,$row->fluor_full);        
        $this->excel->getActiveSheet()->setCellValueByColumnAndRow('9',$i,number_format($row->depth,1));
        $this->excel->getActiveSheet()->setCellValueByColumnAndRow('10',$i,(int)$row->table_d);
        //$this->excel->getActiveSheet()->setCellValueByColumnAndRow('11',$i,number_format($ppc));
        $this->excel->getActiveSheet()->setCellValueByColumnAndRow('11',$i,'$'.round($row->total_price));        
        $this->excel->getActiveSheet()->setCellValueByColumnAndRow('12',$i,$row->lab);        
        $this->excel->getActiveSheet()->setCellValueByColumnAndRow('13',$i,$row->measurements);       
        $i++;
    }
    $avg_AM_PRICECTS=$total_AM_PRICECTS/count($records);
    for($col = 'A'; $col !== 'P'; $col++) {
        $this->excel->getActiveSheet()->getColumnDimension($col)->setAutoSize(true);
    }
    $this->excel->getActiveSheet()->setCellValueByColumnAndRow('0',$i,count($records));
    $this->excel->getActiveSheet()->getStyle('A'.$i.':P'.$i.'')
      ->applyFromArray(
          array(
              'font' => array(                    
                  'color' => array('rgb' => '000000'),
                  'size'  => 11,
                  'name' => 'Calibri'
              ),
              'fill' => array(
                  'type' => PHPExcel_Style_Fill::FILL_SOLID,
                  'color' => array('rgb' => '939496')
              )
          )
      );
      $this->excel->getActiveSheet()
        ->getStyle( $this->excel->getActiveSheet()->calculateWorksheetDimension() )
        ->getAlignment()
        ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
    
      $filename='Diamonds_'.date('d_m_Y_h_i_s_A').'.xls'; 
      header('Content-Type: application/vnd.ms-excel'); 
      header('Content-Disposition: attachment;filename="'.$filename.'"'); 
      header('Cache-Control: max-age=0');                     
      //save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
      //if you want to save it as .XLSX Excel 2007 format
      $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');  
      //force user to download the Excel file without writing it to server's HD
      $objWriter->save('php://output');
  }

  function print_data()
  {
    $all_id=$this->input->post('all_id');
    $all_id_arr=implode("','",$all_id);                     
    $where = "diamond_id IN ('".$all_id_arr."')";     
    $records = $this->diamond_model->diamond_list_limit($where,1000,0);                    
    echo json_encode(array('records'=>$records));
  }
  // for send diamond details to friend    
  function send_data()
  { 
      $all_id=$this->input->post('checkbox_arr');
      $name=$this->input->post('name');   
      $email=$this->input->post('email');
      $message=$this->input->post('message');
      if($all_id!="") 
      {
          $all_id=explode(',', $all_id);
          $all_id_arr=implode("','",$all_id);                       
          $where .= "diamond_id IN ('".$all_id_arr."')";
      }        
      $records = $this->diamond_model->diamond_list_limit($where,1000,0);
      //print_ex($records);
      $this->load->library('email');
      $this->load->library('parser');    
      $config['wordwrap'] = TRUE;
      $config['mailtype'] = 'html';      
      $config['charset'] = 'utf-8';
      $config['priority'] = '1';      
      $config['crlf']      = "\r\n";      
      $config['newline']      = "\r\n";
      
      $this->email->initialize($config);      
      $this->email->from(SITE_EMAIL,SITE_NAME);
      $this->email->to($email);
      $this->email->subject("Diamond List");
      
      $str_content = '';
          $str_url = '<table border="1" cellpadding="5" style="border-collapse: collapse;"> 
              <thead> 
                <tr>
                    <th style="border: 1px solid black; text-align: center;" >Stock</th>                       
                    <th style="border: 1px solid black; text-align: center;" >Shape</th>
                    <th style="border: 1px solid black; text-align: center;" >Cts</th>
                    <th style="border: 1px solid black; text-align: center;" >Color</th>                  
                    <th style="border: 1px solid black; text-align: center;" >Clarity</th>
                    <th style="border: 1px solid black; text-align: center;" >Cut</th>
                    <th style="border: 1px solid black; text-align: center;" >Polish</th>                    
                    <th style="border: 1px solid black; text-align: center;" >Sym</th>
                    <th style="border: 1px solid black; text-align: center;" >Fluor</th>                    
                    <th style="border: 1px solid black; text-align: center;" >Depth%</th>                    
                    <th style="border: 1px solid black; text-align: center;" >Table%</th>
                    <th style="border: 1px solid black; text-align: center;" >Price</th>                  
                    <th style="border: 1px solid black; text-align: center;" >Lab</th>                  
                    <th style="text-align: center; width:130px;display:table-cell" >Measurements</th>  
                    <th style="border: 1px solid black; text-align: center;" >More Details</th>               
                </tr>
              </thead>    
          <tbody> ';
             //$cnt = 1;
        foreach($records as $row) 
        {
        $str_url .='<tr style="border: 1px solid black; text-align: center;">
                      <td style="border: 1px solid black; text-align: center;">'.$row->stock_id.'</td>
                      <td style="border: 1px solid black; text-align: center;">'.$row->shape.'</td>
                      <td style="border: 1px solid black; text-align: center;">'.number_format($row->weight,2).'</td>              
                      <td style="border: 1px solid black; text-align: center;">'.$row->color.'</td>
                      <td style="border: 1px solid black; text-align: center;">'.$row->grade.'</td>
                      <td style="border: 1px solid black; text-align: center;">'.$row->cut_full.'</td>
                      <td style="border: 1px solid black; text-align: center;">'.$row->polish_full.'</td>
                      <td style="border: 1px solid black; text-align: center;">'.$row->symmetry_full.'</td>
                      <td style="border: 1px solid black; text-align: center;">'.$row->fluor_full.'</td>
                      <td style="border: 1px solid black; text-align: center;">'.number_format($row->depth,1).'</td>
                      <td style="border: 1px solid black; text-align: center;">'.$row->table_d.'</td>   
                      <td style="border: 1px solid black; text-align: center;">$'.round($row->total_price).'</td>
                      <td style="border: 1px solid black; text-align: center;">'.$row-> lab.'</td>
                      <td style="text-align: center;border: 1px solid black">'.$row->measurements.'</td>
                      <td style="border: 1px solid black; text-align: center;">
                        <a href="'.base_url().'diamond-details/'.$row->diamond_id.'" target="_blank" title="More Details">More Details</a>           
                      </td>                                             
                  </tr>
             '; } '
          </tbody>        
      </table>';
      // echo $str_url;exit;
      $data_email['fname'] = $name;  
      $data_email['vendor_mail'] = $vendor_email;
      $data_email['str_final'] = '<p>Message : '.$message.'</p>'.$str_url;
      //print_pre($data_email);  die();
      $msg = $this->load->view('email/email_template',$data_email, TRUE);
      //echo $msg; die;
      $this->email->message($msg);
      $data['message'] = "Sorry Unable to send email..."; 
      if($this->email->send())
      {                     
         $data['message'] = "Mail Sent...";
      }     
      //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
      $this->email->initialize($config);      
      $this->email->from(SITE_EMAIL,SITE_NAME);
      $this->email->to(SITE_EMAIL);
      $this->email->subject("Diamond List");
      $data_email['fname'] = 'Admin';  
      $data_email['str_final'] = '<p>Customer has sent diamond list to following address</p>
      <p><b>Name: </b>'.$name.'</p>
      <p><b>Email: </b>'.$email.'</p>
      <p><b>Message: </b>'.$message.'</p>'.$str_url;
      //print_pre($data_email);  die();
      $msg = $this->load->view('email/email_template',$data_email, TRUE);
      //echo $msg; die;
      $this->email->message($msg);
      $data['message'] = "Sorry Unable to send email..."; 
      $this->email->send();
      if($this->email->send())
      {                     
         $data['message'] = "Mail Sent...";
      } 
      //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
      $this->session->set_flashdata('success',"Email has been sent successfully..");
      redirect(base_url('diamond'));    
  }
  function compare_diamond()
  { 
      $this->load->view('common/header');
      $this->load->view('lab_grown_diamond/compare_diamond');
      $this->load->view('common/footer');
  }  
  function getCompareAjax()
  {  
      $image_array=array();
      $sample_image_array=array();
      $compare_diamond=array();

      $compare_diamond=$this->session->userdata('compare_diamond');
      $compare_diamond=implode("','", $compare_diamond);

      $where = "diamond_id IN ('".$compare_diamond."')";      
      $records = $this->diamond_model->diamond_list_limit($where,20,0);

      foreach($records as $row)
      {
        $test_array=array();
        $file='ftp_upload/'.$row->NM_FOLDER_NAME.'/diamond/image/'.$row->stock_id.'.jpg';
        if(file_exists($file)){
            $image_array[]=$file;
            $test_array[]='1';
        } 
        for($i=1;$i<=5;$i++)
        {
            $file='ftp_upload/'.$row->NM_FOLDER_NAME.'/diamond/image/'.$row->stock_id.'_'.$i.'.jpg';
            if(file_exists($file)){
                $image_array[]=$file;
                $test_array[]='1';
            } 
        }
        if(!count($test_array))
        {
            $file='assets/images/shape/'.$row->shape_full.'.jpg';            
            if(file_exists($file)){
                $sample_image_array[]=$file;
            } 
        }
      }
   
      $data= array(
          'records'=>$records,
          'image_array'=>$image_array,
          'sample_image_array'=>$sample_image_array,
          'total_records'=>count(array_filter($records))
      );
      echo json_encode($data);
  }
  function add_compare()
  {
    $compare_diamond=array();
    $message='Added To Compare';
    $status='0';
    if($this->session->userdata('compare_diamond'))
    {
      $compare_diamond=$this->session->userdata('compare_diamond');
    }    
    $diamond_id=$this->input->get('diamond_id');    
    if (($key = array_search($diamond_id, $compare_diamond)) !== false) {
      unset($compare_diamond[$key]);
      $message='Removed From Compare';
    }
    else if(count(array_unique($compare_diamond))<10){        
        $compare_diamond[]= $diamond_id;       
    }
    else{
      $message='Compare List got Full. Please Remove Some Item.(Max:10)'; 
    }

    $this->session->set_userdata('compare_diamond',array_unique($compare_diamond));
    echo json_encode(array('message'=>$message,'status'=>$status));
  }
  function remove_compare()
  {
    $id=$this->input->get('id');
    $compare_diamond=$this->session->userdata('compare_diamond');

    if (($key = array_search($id, $compare_diamond)) !== false) {
      unset($compare_diamond[$key]);
    }

    $this->session->set_userdata('compare_diamond',array_unique(array_filter($compare_diamond)));
    echo json_encode('ok');
  }
  
}
