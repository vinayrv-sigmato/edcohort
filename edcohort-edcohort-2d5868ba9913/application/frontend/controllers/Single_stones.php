<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Single_stones extends CI_Controller {

  public function __construct()
  {
    parent::__construct(); 
    $this->load->library('pagination'); 
    $this->load->model('diamond_model');  
    $this->load->library('excel');  
    $this->load->helper('diamond');
    $this->load->helper('download');
    $this->load->library('pdf');

  } 
  function index()
  { 
     // if($this->session->userdata('user_id')=="")
     //  {
     //    redirect(base_url('login'));
     //  }
      
      $data['page_head'] = 'Diamond '.$this->input->get('sf');
      $this->load->view('common/header',$data);
      $this->load->view('single_stones/diamond',$data);
      $this->load->view('common/footer');
  }
  private function strRepIn($column, $input) {
    $value = $this->input->post($input);
    $str = '';
    if (!empty($value)) {
      $replacedStr = implode("','",$value);             
      $str = " AND $column IN ('$replacedStr')";      
    }
    return $str;
  }

  private function strRepBetween($column, $input) {
    $str = '';
    $from = $this->input->post($input.'_from');
    $to = $this->input->post($input.'_to');
    if (trim($from) != '' && trim($to)) {      
        $str = " AND $column BETWEEN ('$from') AND ('$to')";
    }
    return $str;
  }

function dashboard_count() {  
      $where = "diamond_id";  
      $records_count = $this->diamond_model->diamond_count($where);
       $data['records_count'] = $records_count['0']->diamond_count;  
       echo json_encode($data);
}

  function load_more_data()
  {
     // if($this->session->userdata('user_id')=="")
     //  {
     //    redirect(base_url('login'));
     //  }
      
    if(!$this->input->is_ajax_request()){ exit('No direct script access allowed'); }
      $page=$this->input->get('page');
      $per_page=$this->input->post('per_page');
      $user_id = $this->session->userdata('user_id');
        
      $login = ($user_id) ? 1 : 0;
      
      // $page = $this->input->get('page');
      // $per_page = $this->input->post('per_page');
     
      $where="diamond_id > 0 AND diamond_type = 1 AND total_price > 0 AND FL_USER_ACTIVE = 1 AND diamond_status = 'active'";  

      $stock = $this->input->post('stock');       
      if(!empty($stock))
      {           
          $replacedStr = str_replace("," , "','", $stock);    
          $where .= " AND stock_id IN ('".$replacedStr."')"; 
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
          if(in_array('M', $color)) {
            array_push($color, "N", "O", "P", "Q", "R", "S");
          }
          $q = implode("','",$color);
          $where .= " AND color IN ('".$q."')";        
       }   

         $carat_from = $this->input->post('carat_from');
         $carat_to = $this->input->post('carat_to');
      if (trim($carat_from) != '' && trim($carat_to)) {      
          $carat_to = ($carat_to=='10') ? '200' : $carat_to;
          $where .= " AND weight BETWEEN ('$carat_from') AND ('$carat_to')";
      }

         $price_from = $this->input->post('price_from');
         $price_to = $this->input->post('price_to');
      if (trim($price_from) != '' && trim($price_to)) {      
          $price_to = ($price_to=='10') ? '200' : $price_to;
          $where .= " AND total_price BETWEEN ('$price_from') AND ('$price_to')";


      }
         $discount_from = $this->input->post('discount_from');
         $discount_to = $this->input->post('discount_to');
      if (trim($discount_from) != '' && trim($discount_to)) {      
           $discount_to = ($discount_to=='10') ? '200' : $discount_to;
          $where .= " AND new_discount BETWEEN ('$discount_from') AND ('$discount_to')";
           
      }

       $filter_ex3 = $this->input->post('ex3');                
       if(!empty($filter_ex3))
       {        
        $where ="cut_full = '".EX."' and symmetry_full = '".EX."' and polish_full = '".EX."'";
        }     
      $filter_ex3n = $this->input->post('ex3n');                
       if(!empty($filter_ex3n))
       {        
        $where ="cut_full = '".EX."' and symmetry_full = '".EX."' and polish_full = '".EX."' and fluor_full ='".NON."'";
        }

      $hca = $this->input->post('hca');
      if(!empty($hca)) {
        if(in_array('H&A', $hca)) { array_push($hca, "TH");  }
        $replacedStr = implode(",",$hca);
        $replacedStr = str_replace("," , "|", $replacedStr);              
        $where .= " AND br_comment REGEXP '$replacedStr'"; 
      }

      $where .= $this->strRepIn('shape_filter', 'checkbox');  
      $where .= $this->strRepIn('cut_full', 'cut');  
      $where .= $this->strRepIn('polish_full', 'polish');  
      $where .= $this->strRepIn('symmetry_full', 'symmetry');  
      $where .= $this->strRepIn('grade', 'clarity');  
      $where .= $this->strRepIn('fluor_full', 'fluorescence');
      $where .= $this->strRepIn('lab_filter', 'cert'); 
      $where .= $this->strRepIn('brand', 'ha'); 
      $where .= $this->strRepIn('culet_size', 'culet'); 
      $where .= $this->strRepBetween('table_d', 'table_per');
      $where .= $this->strRepBetween('depth', 'depth_per');
      $where .= $this->strRepBetween('crown_angle', 'cr_angle');
      $where .= $this->strRepBetween('crown_ht', 'cr_height');
      $where .= $this->strRepBetween('pavillion_angle', 'pav_angle');
      $where .= $this->strRepBetween('pavillion_depth', 'pav_height');
      $where .= $this->strRepBetween('girdle_perct', 'girdle_per');
      $where .= $this->strRepBetween('star_len', 'star_len');  
      
       //  $checkboxcut = $this->input->post('cut');                
      //  if(!empty($checkboxcut))
      //  {         
      //     $array_va=array("Ideal","Excellent", "Very Good", "Good", "Fair");
      //     $checkboxcut_range=$this->find_range($checkboxcut,$array_va);
      //     if(in_array('Round',  $shape))
      //     {
      //       if($checkboxcut=='Ideal;Fair') {
      //         $checkboxcut_range[]='NA';
      //       }
      //       $qcut = implode("','", $checkboxcut_range);
      //       $where .= " AND cut_full IN ('".$qcut."')";
      //     }                  
      //  }     
      //  $checkboxpolish = $this->input->post('polish');                
      //  if(!empty($checkboxpolish))
      //  {            
      //       $array_va=array("Excellent", "Very Good", "Good", "Fair");
      //       $checkboxpolish_range=$this->find_range($checkboxpolish,$array_va);

      //       if($checkboxpolish=='Excellent;Fair') {
      //           $checkboxpolish_range[]='NA';
      //       }

      //       $qpolish = implode("','", $checkboxpolish_range);
      //       $where .= " AND polish_full IN ('".$qpolish."')";      
      //  }         
      //  $checkboxsymm = $this->input->post('symmetry');                
      //  if(!empty($checkboxsymm))
      //  {           
      //     $array_va=array("Excellent", "Very Good", "Good", "Fair");
      //     $checkboxsymm_range=$this->find_range($checkboxsymm,$array_va);

      //      if($checkboxsymm=='Excellent;Fair') {
      //         $checkboxsymm_range[]='NA';
      //     }

      //     $qsymm = implode("','", $checkboxsymm_range);
      //     $where .= " AND symmetry_full IN ('".$qsymm."')";     
      //  }     
      //  $checkboxClarity = $this->input->post('clarity');
      //  if(!empty($checkboxClarity))
      //  {       
      //     $clarity_va=array("FL","IF","VVS1","VVS2","VS1","VS2","SI1","SI2","SI3","I1","I2","I3");
      //     $checkboxClarity=$this->find_range($checkboxClarity,$clarity_va);
         
      //     $qClarity = implode("','", $checkboxClarity);
      //     $where .= " AND grade IN ('".$qClarity."')";
      //  }   
      //  $checkboxFlour = $this->input->post('fluorescence');
      //  if(!empty($checkboxFlour))
      //  {         
      //     $array_va=array("None", "Faint", "Medium", "Strong","Very Strong");
      //     $checkboxFlour=$this->find_range($checkboxFlour,$array_va);

      //     $qFlour = implode("','", $checkboxFlour);
      //     $where .= " AND fluor_full IN ('".$qFlour."')";      
      //  }
      // $range = $this->input->post('size');
      // $split = explode(';', $range);
      // $split1 = @$split['0'];    
      // $split2 = @$split['1'];
      // if($split2=='6'){
      //   $split2 = '200';
      // }     
      // if(!empty($range))
      // {        
      //   $where .= " AND weight BETWEEN ('".$split1."') AND ('".$split2."')";     
      // }     
      // if(!empty($user_id)) 
      // {
      //   $total = $this->input->post('price');
      //   $splittotal = explode(';', $total);
      //   $splittotal1 = $splittotal['0'];
      //   $splittotal2 = @$splittotal['1'];    
      //   if(!empty($total))
      //   {
      //      $where .= " AND total_price BETWEEN (".$splittotal1.") AND (".$splittotal2.")";
      //   }
      // }
      $cert = $this->input->post('cert');      
      if(!empty($cert))
      {      
          $q1=implode("','",$cert); 
          $where .= " AND lab_filter IN ('".$q1."')";
      }

      $available = $this->input->post('available');      
      if(!empty($available))
      {      
          $q1=implode("','",$available); 
          $where .= " AND availability IN ('".$q1."')";
      }

      // $pointer = $this->input->post('pointer');      
      // if(!empty($pointer))
      // {      
      //     $q1=implode("','",$pointer); 
      //     $where .= " AND weight IN ('".$q1."')";
      // }
           $pointer = $this->input->post('pointer');
     $i = 1;
    if(!empty($pointer))          
    { 
             foreach($pointer as $rows){
              
               // echo $rows;
              $pointer_split = explode("-",$rows);
              $pointer_count = count($pointer);
               $min = $pointer_split[0];            
               $max = $pointer_split[1]; 
               $open = '(';
               $close = ')';

            if($i == 1){
             if($pointer_count == 1){
              $where .= "  AND ".$open." weight BETWEEN  ".$min."  AND  ".$max."  ";
             }
               if($pointer_count >=2){
                $where .= "  AND ".$open." weight BETWEEN  ".$min."  AND  ".$max."  " ;       
              }            
             } else {
            $where .= "  OR  weight BETWEEN  ".$min."  AND  ".$max." " ;
           }  
           $i++;
              }
              $where .= "".$close."";    
      }
     
      $records_count = $this->diamond_model->diamond_count($where);
     // echo $this->db->last_query();
      $data['records_count'] =$records_count['0']->diamond_count;  

      $per_page= ($per_page) ? $per_page : 200 ;
      $config['base_url'] = base_url().'load-more-diamond-single-stones';
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
    
        foreach ($records as $row) {
          //$records = $this->diamond_model->diamond_price($row->vendor_id,$row->weight);
          $price=$this->diamond_price($row->vendor_id,$row->weight,$row->rapnet,$row->rapnet_discount,$row->currency);
           $row->new_discount = $price['new_discount'];
           $row->cost_carat = $price['new_rapnet'];
           $row->total_price = $price['new_totalprice'];
           $row->currency = $price['currency'];
                }
      
      // if(empty($user_id)) {        
      //   foreach ($records as $row) {
      //      $row->rapnet_discount = '';
      //     $row->rapnet = '';
      //     $row->cost_carat = '';
      //     $row->total_price = '';
      //   }
      // }
            // print_ex($records);
      echo json_encode(array(
        'records'=>$records,
        'page_link'=>$page_link,
        'total_records'=>$data['records_count'],
        'isLogin' => (!empty($user_id)) ? 1 : 0
      ));
  }

  function diamond_price($vendor_id,$weight,$rapnet,$rapnet_discount)
  {
      $records = $this->diamond_model->diamond_price($vendor_id,$weight);

      $data['new_rapnet'] = $rapnet+(($rapnet * ($rapnet_discount+($records[0]->markup)))/100);      
      $data['new_totalprice'] = (($rapnet+(($rapnet * ($rapnet_discount+($records[0]->markup)))/100)) *$weight);
      $data['new_discount'] = ($rapnet_discount)+($records[0]->markup);
      
      $customer_id = $this->session->userdata('user_id');
      if(!empty($customer_id)){
    $currency_data = $this->db->query(" SELECT cur.currency_id,cur.currency_value FROM tbl_currency cur join tbl_customer cus on cus.currency_id=cur.currency_id where cus.customer_id = '" .$customer_id . "'");
      $currency_det = $currency_data->result();      
      $data['currency'] = ($currency_det[0]->currency_value*$data['new_totalprice']);
    }  else {
      $currency_data = $this->db->query("SELECT currency_id,currency_value FROM tbl_currency  where currency_id = 4");
      $currency_det = $currency_data->result(); 
      $data['currency'] = ($currency_det[0]->currency_value*$data['new_totalprice']);
}
//print_ex($data);
      return $data;
      // currency tbl_currency se value 
  }
  function diamond_details()
  {
      $inventory_id = $this->uri->segment(2);  
      $image_array=array();
      $sample_image_array=array();
      // $image_link=array();
      $video_array=array();
      $video_link=array();
      $certificate_array=array();
      $where = 'diamond_id = '."'".$inventory_id."'";      
      $records = $this->diamond_model->diamond_list($where);

        foreach ($records as $row) {
          $price=$this->diamond_price($row->vendor_id,$row->weight,$row->rapnet,$row->rapnet_discount,$row->currency);
          
           $row->new_discount = $price['new_discount'];
           $row->cost_carat = $price['new_rapnet'];
          $row->total_price = $price['new_totalprice'];
         $row->currency = $price['currency'];
                }
     
      //echo $this->db->last_query(); die;
      if(count($records))
      {
        if($records['0']->diamond_image!="")
        {
          if(checkLink($records['0']->diamond_image)=='200')
          {
            
            if(preg_match("/png|jpg|jpeg|gif$/", $records['0']->diamond_image)){ 

              $image_array[]=$records['0']->diamond_image;
            }else{
              $image_array[]=$records['0']->diamond_image;


            }

          }
        }
        if(!count($image_array) && !count($image_array))
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
          foreach ($similar_records as $row) {
          $price=$this->diamond_price($row->vendor_id,$row->weight,$row->rapnet,$row->rapnet_discount,$row->currency);
           $row->new_discount = $price['new_discount'];
           $row->cost_carat = $price['new_rapnet'];
          $row->total_price = $price['new_totalprice'];
         $row->currency = $price['currency'];
                }
        //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
      }
      else
      {
        redirect(base_url().'diamond');
      } 
      //print_ex($similar_records);   
      $data= array(
          'records'=>$records,
          'similar_records'=>$similar_records,
          'image_array'=>$image_array,
          'sample_image_array'=>$sample_image_array,
          'video_array'=>$video_array,
          'certificate_array'=>$certificate_array,
          // 'image_link'=>$image_link,
          'video_link'=>$video_link
      );
    
      //print_ex($data);
      $data['page_head'] = 'Diamond Details';     

     // $this->load->view('common/header',$data);
      $this->load->view('single_stones/diamond_details',$data);
   //   $this->load->view('common/footer');
  }

  function dna_details()
  {
      $inventory_id = $this->uri->segment(2);  
      $image_array=array();
      $sample_image_array=array();
      // $image_link=array();
      $video_array=array();
      $video_link=array();
      $certificate_array=array();
      $where = 'stock_id = '."'".$inventory_id."'";      
      $records = $this->diamond_model->diamond_list($where);

       foreach ($records as $row) {
          $price=$this->diamond_price($row->vendor_id,$row->weight,$row->rapnet,$row->rapnet_discount,$row->currency);
           $row->new_discount = $price['new_discount'];
           $row->cost_carat = $price['new_rapnet'];
          $row->total_price = $price['new_totalprice'];
         $row->currency = $price['currency'];
                }
      //print_ex($records);
      //echo $this->db->last_query(); die;
      if(count($records))
      {
        if($records['0']->diamond_image!="")
        {
          if(checkLink($records['0']->diamond_image)=='200')
          {
            
            if(preg_match("/png|jpg|jpeg|gif$/", $records['0']->diamond_image)){ 

              $image_array[]=$records['0']->diamond_image;
            }else{
              $image_array[]=$records['0']->diamond_image;


            }

          }
        }
        if(!count($image_array) && !count($image_array))
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

       // $similar_records = $this->diamond_model->diamond_list_limit($where1,10,0);
        //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
      }
      else
      {
        redirect(base_url().'diamond');
      } 
      //print_ex($similar_records);   
     $data = array(
          'records'=>$records,
          'similar_records'=>$similar_records,
          'image_array'=>$image_array,
          'sample_image_array'=>$sample_image_array,
          'video_array'=>$video_array,
          'certificate_array'=>$certificate_array,
          // 'image_link'=>$image_link,
          'video_link'=>$video_link
      );

     
    //  print_ex($data);
     $data['page_head'] = 'Diamond DNA'; 

     echo json_encode($data);    

     // $this->load->view('common/header',$data);
    // $this->load->view('single_stones/diamond_dna_details',$data);
   //   $this->load->view('common/footer');
  }

  function download_file()
  {
  	
      $stock=$this->input->get('stock');
      $type=$this->input->get('type');

      $image_array=array();
      $video_array=array();
      $certificate_array=array();

      $where = 'stock_id = '."'".$stock."'";
      $records = $this->diamond_model->diamond_list($where);  
      $image_array = $records['0']->diamond_image;
      $video_array = $records['0']->diamond_video;
      $certificate_array = $records['0']->report_filename;
      
         if($type=='cert') {
          $zip = new ZipArchive();
           $zipFile = $stock.'Cert'.time().'.zip';

          if ($zip->open("uploads/".$zipFile, ZipArchive::CREATE | ZipArchive::OVERWRITE) !== TRUE) {
               die ("Could not open archive");
          }
          
            $file_content = file_get_contents($certificate_array);
            $zip->addFromString($stock.'.pdf', $file_content);
            $zip->close();
          
          header('Content-disposition: attachment; filename='.$zipFile);
          header('Content-type: application/zip');
           force_download('uploads/'.$zipFile, NULL);    
      }

      else if($type=='image') {
          $zip = new ZipArchive();
          $zipFile = $stock.'Image'.time().'.zip';

          if ($zip->open("uploads/".$zipFile, ZipArchive::CREATE | ZipArchive::OVERWRITE) !== TRUE) {
               die ("Could not open archive");
          }
           
            $file_content = file_get_contents($image_array);
            print_ex($file_content);
            $zip->addFromString('still.jpg', $file_content);
            $zip->close();

          header('Content-disposition: attachment; filename='.$zipFile);
          header('Content-type: application/zip');
        
           force_download('uploads/'.$zipFile, NULL); 
   
      }  
      else if($type=='video') {
          $zip = new ZipArchive();
          $zipFile = $stock.'Video'.time().'.zip';

          if ($zip->open("uploads/".$zipFile, ZipArchive::CREATE | ZipArchive::OVERWRITE) !== TRUE) {
               die ("Could not open archive");
          }
        
            $file_content = file_get_contents($video_array);
            $zip->addFromString($stock.'.mp4', $file_content);
             $zip->close();
          header('Content-disposition: attachment; filename='.$zipFile);
          header('Content-type: application/zip');
           force_download('uploads/'.$zipFile, NULL);    
      }

      else if($type=='excel'){
        $this->diamond_export();
      }   
  }

   private function diamond_export()
  {        
    $where = ""; 
    $stock = $this->input->get('stock');
    $type = $this->input->get('type'); 
    //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
      $record = $this->diamond_model->diamond_list($stock);     
    //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++       
  
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
   $this->excel->getActiveSheet()->setCellValueByColumnAndRow('11','1' ,'Disc%');
   $this->excel->getActiveSheet()->setCellValueByColumnAndRow('12','1' ,'$/Carat');
   $this->excel->getActiveSheet()->setCellValueByColumnAndRow('13','1' ,'Price');
   $this->excel->getActiveSheet()->setCellValueByColumnAndRow('14','1' ,'Lab');
   $this->excel->getActiveSheet()->setCellValueByColumnAndRow('15','1' ,'Certificate');
   $this->excel->getActiveSheet()->setCellValueByColumnAndRow('16','1' ,'Measurements');
   $this->excel->getActiveSheet()->setCellValueByColumnAndRow('17','1' ,'Availability');
   $this->excel->getActiveSheet()->setCellValueByColumnAndRow('18','1' ,'Image_link');
   $this->excel->getActiveSheet()->setCellValueByColumnAndRow('19','1' ,'Video_link'); 
   $this->excel->getActiveSheet()->setCellValueByColumnAndRow('20','1' ,'Origin'); 
   $this->excel->getActiveSheet()->setCellValueByColumnAndRow('21','1' ,'Country'); 


 
   $this->excel->getActiveSheet()->getStyle('A1:T1')
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
   foreach($record as $row) 
   {  
       // $new_discount=$row->rapnet_discount+$dis_value;
       // $total=(($row->total_price*$new_discount)/100);
       // $ppc=($row->total_price-$total);
       // $new_total=($ppc*$row->weight);

          $price=$this->diamond_price($row->vendor_id,$row->weight,$row->rapnet,$row->rapnet_discount,$row->currency);
           $row->new_discount = $price['new_discount'];
           $row->cost_carat = $price['new_rapnet'];
          $row->total_price = $price['new_totalprice'];
         $row->currency = $price['currency'];
                
       
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
       $this->excel->getActiveSheet()->setCellValueByColumnAndRow('11',$i,number_format($row->new_discount,2));
       $this->excel->getActiveSheet()->setCellValueByColumnAndRow('12',$i,number_format($row->cost_carat));
       $this->excel->getActiveSheet()->setCellValueByColumnAndRow('13',$i,'$'.round($row->total_price));        
       $this->excel->getActiveSheet()->setCellValueByColumnAndRow('14',$i,$row->lab); 
       $this->excel->getActiveSheet()->setCellValueByColumnAndRow('15',$i,$row->report_no);        
       $this->excel->getActiveSheet()->setCellValueByColumnAndRow('16',$i,$row->measurements); 
       $this->excel->getActiveSheet()->setCellValueByColumnAndRow('17',$i,$row->availability); 
       $this->excel->getActiveSheet()->setCellValueByColumnAndRow('18',$i,$row->diamond_image); 
       $this->excel->getActiveSheet()->setCellValueByColumnAndRow('19',$i,$row->diamond_video);    
       $this->excel->getActiveSheet()->setCellValueByColumnAndRow('20',$i,$row->origin);    
       $this->excel->getActiveSheet()->setCellValueByColumnAndRow('21',$i,$row->country);      
  
       $i++;
   }
   $avg_AM_PRICECTS=$total_AM_PRICECTS/count($records);
   for($col = 'A'; $col !== 'T'; $col++) {
       $this->excel->getActiveSheet()->getColumnDimension($col)->setAutoSize(true);
   }
   $this->excel->getActiveSheet()->setCellValueByColumnAndRow('0',$i,count($records));
   $this->excel->getActiveSheet()->getStyle('A'.$i.':T'.$i.'')
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
    
      $filename='Stock_'.date('m_d_Y_h_i_s_A').'.xls'; 
      header('Content-Type: application/vnd.ms-excel'); 
      header('Content-Disposition: attachment;filename="'.$filename.'"'); 
      header('Cache-Control: max-age=0');                   
      $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');  
      $objWriter->save('uploads/'.$filename);
  }

  
  function print_details()
  {
      $user_id = $this->session->userdata('user_id');
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
       foreach ($records as $row) {
          $price=$this->diamond_price($row->vendor_id,$row->weight,$row->rapnet,$row->rapnet_discount,$row->currency);
           $row->new_discount = $price['new_discount'];
           $row->cost_carat = $price['new_rapnet'];
          $row->total_price = $price['new_totalprice'];
         $row->currency = $price['currency'];
                }
      // if(empty($user_id)) {        
      //   foreach ($records as $row) {
      //     $row->rapnet_discount = '';
      //     $row->rapnet = '';
      //     $row->cost_carat = '';
      //     $row->total_price = '';
      //   }
      // }         
      $data= array(
          'isLogin' => ($user_id) ? 1 : 0,
          'records'=>$records,
          'image_array'=>$image_array
      );
      //print_ex($data);
      
      echo json_encode($data);
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
 function add_cart_single()
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

    $price=$this->diamond_price($row->vendor_id,$row->weight,$row->rapnet,$row->rapnet_discount,$row->currency);
    $row->new_discount = $price['new_discount'];
    $row->cost_carat = $price['new_rapnet'];
    $row->total_price = $price['new_totalprice'];
    $row->currency = $price['currency'];

    }  
     if(count($records))
  {
    if($user_id!="")
    {
      $where=array('diamond_id'=>$diamond_arr,'customer_id'=>$user_id,);
      $cart_detail=$this->common_model->selectWhere('tbl_wish_cart_diamond',$where);


     if(count($cart_detail))
      { 
        $this->session->set_flashdata('error_message', 'Product Already Exist!');
           
      } else {  
       
        foreach($records as $row){   
           $data=array(
            'diamond_id'=>$row->diamond_id,
            'stock_id'=>$row->stock_id,
            'quantity'=>1,
            'product_choice'=>1,
            'shape'=>$row->shape,
            'weight'=>$row->weight,
            'color'=>$row->color, 
            'grade'=>$row->grade, 
            'cut'=>$row->cut_full,
            'polish'=>$row->polish_full, 
            'symmetry'=>$row->symmetry_full, 
            'fluorescence_int'=>$row->fluor_full,  
            'measurements'=>$row->measurements, 
            'lab'=>$row->lab, 
            'report_no'=>$row->report_no,
            'rapnet' => $row->rapnet,
            'cost_carat' => $row->cost_carat,
            'new_discount' => $row->new_discount,
            'total_price'=>$row->total_price,
            'currency'=>$row->currency,
            'depth'=>$row->depth, 
            'table_d'=>$row->table_d,
            'report_filename'=>$row->report_filename,
            'diamond_image'=>$row->diamond_image,
            'diamond_video'=>$row->diamond_video,
            'created_by'=>$row->vendor_id,
            'created_at'=>date('Y-m-d H:i:s'),
            'customer_id'=>$user_id,
            'image'=>$image_show,
           'crown_angle' => $row->crown_angle,
           'crown_ht' => $row->crown_ht,
           'culet' => $row->culet,
           'culet_con' => $row->culet_con,
           'culet_size' =>$row->culet_size,
           'girdle' => $row->girdle,
           'girdle_con' => $row->girdle_con,
           'girdle_perct' => $row->girdle_perct,
           'pavillion_angle' => $row->pavillion_angle,
           'pavillion_depth' =>$row->pavillion_depth,
           'shade' => $row->shade,
           'diamond_type' => 1,
           'eye_clean' => $row->eye_clean,
           'diamond_status' => $row->diamond_status,
           'keytosymb' => $row->keytosymb,
           'milky' => $row->milky,
           'm_length' =>$row->m_length,
           'm_width' => $row->m_width,
           'm_depth' => $row->m_depth,

          );
          // print_ex($data);
          $cart_id=$this->common_model->insertData('tbl_wish_cart_diamond',$data);
        }
      }
   
      $where1=array('customer_id'=>$user_id);          
       $cart_details=$this->cart_model->get_cart_diamond($where1);
      echo json_encode(array('records'=>$cart_details,'message'=>'Added to cart!'));
    } else{
      echo json_encode(array('records'=>array(),'message'=>'login'));
    }
  }
}
  function add_cart()
{     
  $user_id=$this->session->userdata('user_id');
  $diamond_id=$this->input->get('diamond_id');
  $diamond_arr=implode("','", $diamond_id);
  $where = "diamond_id IN ('".$diamond_arr."')";    
  $records = $this->diamond_model->diamond_list_limit($where,20,0);

     // print_ex($records);
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

    $price=$this->diamond_price($row->vendor_id,$row->weight,$row->rapnet,$row->rapnet_discount,$row->currency);
    $row->new_discount = $price['new_discount'];
    $row->cost_carat = $price['new_rapnet'];
    $row->total_price = $price['new_totalprice'];
    $row->currency = $price['currency'];

  }  
  if(count($records))
  {
    if($user_id!="")
    {
      $where=array('diamond_id'=>$diamond_arr,'customer_id'=>$user_id,);
      $cart_detail=$this->common_model->selectWhere('tbl_wish_cart_diamond',$where);


      if(count($cart_detail))
      { 
        $this->session->set_flashdata('error_message', 'Product Already Exist!');
           
      } else {  
       
        foreach($records as $row){   
           $data=array(
            'diamond_id'=>$row->diamond_id,
            'stock_id'=>$row->stock_id,
            'quantity'=>1,
            'product_choice'=>1,
            'shape'=>$row->shape,
            'weight'=>$row->weight,
            'color'=>$row->color, 
            'grade'=>$row->grade, 
            'cut'=>$row->cut_full,
            'polish'=>$row->polish_full, 
            'symmetry'=>$row->symmetry_full, 
            'fluorescence_int'=>$row->fluor_full,  
            'measurements'=>$row->measurements, 
            'lab'=>$row->lab, 
            'report_no'=>$row->report_no,
            'rapnet' => $row->rapnet,
            'cost_carat' => $row->cost_carat,
            'new_discount' => $row->new_discount,
            'total_price'=>$row->total_price,
            'currency'=>$row->currency,
            'depth'=>$row->depth, 
            'table_d'=>$row->table_d,
            'report_filename'=>$row->report_filename,
            'diamond_image'=>$row->diamond_image,
            'diamond_video'=>$row->diamond_video,
            'created_by'=>$row->vendor_id,
            'created_at'=>date('Y-m-d H:i:s'),
            'customer_id'=>$user_id,
            'image'=>$image_show,
           'crown_angle' => $row->crown_angle,
           'crown_ht' => $row->crown_ht,
           'culet' => $row->culet,
           'culet_con' => $row->culet_con,
           'culet_size' =>$row->culet_size,
           'girdle' => $row->girdle,
           'girdle_con' => $row->girdle_con,
           'girdle_perct' => $row->girdle_perct,
           'pavillion_angle' => $row->pavillion_angle,
           'pavillion_depth' =>$row->pavillion_depth,
           'shade' => $row->shade,
           'diamond_type' => 1,
           'eye_clean' => $row->eye_clean,
           'diamond_status' => $row->diamond_status,
           'keytosymb' => $row->keytosymb,
           'milky' => $row->milky,
           'm_length' =>$row->m_length,
           'm_width' => $row->m_width,
           'm_depth' => $row->m_depth,

          );
          // print_ex($data);
          $cart_id=$this->common_model->insertData('tbl_wish_cart_diamond',$data);
        }
      }
   
      $where1=array('customer_id'=>$user_id);          
       $cart_details=$this->cart_model->get_cart_diamond($where1);
      echo json_encode(array('records'=>$cart_details,'message'=>'Added to cart!'));
    } else{
      echo json_encode(array('records'=>array(),'message'=>'login'));
    }
   
  }

}
function add_wish()
{     
  $user_id=$this->session->userdata('user_id');
  $diamond_id=$this->input->get('diamond_id');

  $diamond_arr=@implode("','", $diamond_id);
  $where = "diamond_id IN ('".$diamond_arr."')";    
  $records = $this->diamond_model->diamond_list_limit($where,20,0);

  foreach ($records as $row) 
  {
    $img=$this->list_image($row->NM_FOLDER_NAME,$row->stock_id);
    if(count(array_filter($img)))
    {
      $image_show = @$img['0'];
    }
    else
    {
      $image_show = shape_img($records['0']->shape_full);
    }


    $price=$this->diamond_price($row->vendor_id,$row->weight,$row->rapnet,$row->rapnet_discount,$row->currency);
    $row->new_discount = $price['new_discount'];
    $row->cost_carat = $price['new_rapnet'];
    $row->total_price = $price['new_totalprice'];
    $row->currency = $price['currency'];

  } 
  if(count($records))
  {
    if($user_id!="")
    {  

      $where=array('diamond_id'=>$diamond_arr,'customer_id'=>$user_id);
      $cart_detail=$this->common_model->selectWhere('tbl_wish_cart_diamond',$where);
     if(count($cart_detail))
      { 
        $this->session->set_flashdata('error_message', 'Product Already Exist!');
           
      } else {  
        
        foreach($records as $row){   
          $data=array(
            'diamond_id'=>$row->diamond_id,
            'stock_id'=>$row->stock_id,
            'quantity'=>1,
            'product_choice'=>2,
            'shape'=>$row->shape,
            'weight'=>$row->weight,
            'color'=>$row->color, 
            'grade'=>$row->grade, 
            'cut'=>$row->cut_full,
            'polish'=>$row->polish_full, 
            'symmetry'=>$row->symmetry_full, 
            'fluorescence_int'=>$row->fluor_full,  
            'measurements'=>$row->measurements, 
            'lab'=>$row->lab, 
            'report_no'=>$row->report_no,
            'rapnet' => $row->rapnet,
            'cost_carat' => $row->cost_carat,
            'new_discount'=> $row->new_discount,
            'total_price'=>$row->total_price,
            'currency'=>$row->currency,
            'depth'=>$row->depth, 
            'table_d'=>$row->table_d,
            'report_filename'=>$row->report_filename,
            'diamond_image'=>$row->diamond_image,
            'diamond_video'=>$row->diamond_video,
            'created_by'=>$row->vendor_id,
            'created_at'=>date('Y-m-d H:i:s'),
            'customer_id'=>$user_id,
            'image'=>$image_show,
           'crown_angle' => $row->crown_angle,
           'crown_ht' => $row->crown_ht,
           'culet' => $row->culet,
           'culet_con' => $row->culet_con,
           'culet_size' =>$row->culet_size,
           'girdle' => $row->girdle,
           'girdle_con' => $row->girdle_con,
           'girdle_perct' => $row->girdle_perct,
           'pavillion_angle' => $row->pavillion_angle,
           'pavillion_depth' =>$row->pavillion_depth,
           'shade' => $row->shade,
           'diamond_type' => 1,
           'eye_clean' => $row->eye_clean,
           'diamond_status' => $row->diamond_status,
           'keytosymb' => $row->keytosymb,
           'milky' => $row->milky,
           'm_length' =>$row->m_length,
           'm_width' => $row->m_width,
           'm_depth' => $row->m_depth,

          );
          $cart_id=$this->common_model->insertData('tbl_wish_cart_diamond',$data);
        }
      }
      $where1=array('customer_id'=>$user_id);          
      $details=$this->wishlist_model->get_wishlist_diamond($where1);

      echo json_encode(array('records'=>$details,'message'=>'Added to wishlist!'));
    } else{
      echo json_encode(array('records'=>array(),'message'=>'login'));
    }
  }
}
  function add_wish_single()
  {     
    $user_id=$this->session->userdata('user_id');
    $diamond_id=$this->input->get('diamond_id');
    
     $where = 'diamond_id = '."'".$diamond_id."'";         
     $records = $this->diamond_model->diamond_list($where);
//print_ex($records);
    foreach ($records as $row) 
    {
      $img=$this->list_image($row->NM_FOLDER_NAME,$row->stock_id);
      if(count(array_filter($img)))
      {
        $image_show = @$img['0'];
      }
      else
      {
        $image_show = shape_img($records['0']->shape_full);
      }


          $price=$this->diamond_price($row->vendor_id,$row->weight,$row->rapnet,$row->rapnet_discount,$row->currency);
            $row->new_discount = $price['new_discount'];
           $row->cost_carat = $price['new_rapnet'];
          $row->total_price = $price['new_totalprice'];
         $row->currency = $price['currency'];
        
    } 
    if(count($records))
  {
    if($user_id!="")
    {  

      $where=array('diamond_id'=>$diamond_arr,'customer_id'=>$user_id);
      $cart_detail=$this->common_model->selectWhere('tbl_wish_cart_diamond',$where);
      
     if(count($cart_detail))
      { 
        $this->session->set_flashdata('error_message', 'Product Already Exist!');
           
      } else {  
        
        foreach($records as $row){   
          $data=array(
            'diamond_id'=>$row->diamond_id,
            'stock_id'=>$row->stock_id,
            'quantity'=>1,
            'product_choice'=>2,
            'shape'=>$row->shape,
            'weight'=>$row->weight,
            'color'=>$row->color, 
            'grade'=>$row->grade, 
            'cut'=>$row->cut_full,
            'polish'=>$row->polish_full, 
            'symmetry'=>$row->symmetry_full, 
            'fluorescence_int'=>$row->fluor_full,  
            'measurements'=>$row->measurements, 
            'lab'=>$row->lab, 
            'report_no'=>$row->report_no,
            'rapnet' => $row->rapnet,
            'cost_carat' => $row->cost_carat,
            'new_discount'=> $row->new_discount,
            'total_price'=>$row->total_price,
            'currency'=>$row->currency,
            'depth'=>$row->depth, 
            'table_d'=>$row->table_d,
            'report_filename'=>$row->report_filename,
            'diamond_image'=>$row->diamond_image,
            'diamond_video'=>$row->diamond_video,
            'created_by'=>$row->vendor_id,
            'created_at'=>date('Y-m-d H:i:s'),
            'customer_id'=>$user_id,
            'image'=>$image_show,
           'crown_angle' => $row->crown_angle,
           'crown_ht' => $row->crown_ht,
           'culet' => $row->culet,
           'culet_con' => $row->culet_con,
           'culet_size' =>$row->culet_size,
           'girdle' => $row->girdle,
           'girdle_con' => $row->girdle_con,
           'girdle_perct' => $row->girdle_perct,
           'pavillion_angle' => $row->pavillion_angle,
           'pavillion_depth' =>$row->pavillion_depth,
           'shade' => $row->shade,
           'diamond_type' => 1,
           'eye_clean' => $row->eye_clean,
           'diamond_status' => $row->diamond_status,
           'keytosymb' => $row->keytosymb,
           'milky' => $row->milky,
           'm_length' =>$row->m_length,
           'm_width' => $row->m_width,
           'm_depth' => $row->m_depth,

          );
          $cart_id=$this->common_model->insertData('tbl_wish_cart_diamond',$data);
        }
      }
      $where1=array('customer_id'=>$user_id);          
      $details=$this->wishlist_model->get_wishlist_diamond($where1);

      echo json_encode(array('records'=>$details,'message'=>'Added to wishlist!'));
    } else{
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


          $price=$this->diamond_price($member->vendor_id,$member->weight,$member->rapnet,$member->rapnet_discount,$member->currency);
           $member->new_discount = $price['new_discount'];
           $member->cost_carat = $price['new_rapnet'];
          $member->total_price = $price['new_totalprice'];
         $member->currency = $price['currency'];
               

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


          $price=$this->diamond_price($member->vendor_id,$member->weight,$member->rapnet,$member->rapnet_discount,$member->currency);
           $member->new_discount = $price['new_discount'];
           $member->cost_carat = $price['new_rapnet'];
          $member->total_price = $price['new_totalprice'];
         $member->currency = $price['currency'];
                
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
   $this->excel->getActiveSheet()->setCellValueByColumnAndRow('11','1' ,'Disc%');
   $this->excel->getActiveSheet()->setCellValueByColumnAndRow('12','1' ,'$/Carat');
   $this->excel->getActiveSheet()->setCellValueByColumnAndRow('13','1' ,'Price');
   $this->excel->getActiveSheet()->setCellValueByColumnAndRow('14','1' ,'Lab');
   $this->excel->getActiveSheet()->setCellValueByColumnAndRow('15','1' ,'Certificate');
   $this->excel->getActiveSheet()->setCellValueByColumnAndRow('16','1' ,'Measurements');
   $this->excel->getActiveSheet()->setCellValueByColumnAndRow('17','1' ,'Availability');
   $this->excel->getActiveSheet()->setCellValueByColumnAndRow('18','1' ,'Image_link');
   $this->excel->getActiveSheet()->setCellValueByColumnAndRow('19','1' ,'Video_link'); 
   $this->excel->getActiveSheet()->setCellValueByColumnAndRow('20','1' ,'Origin'); 
   $this->excel->getActiveSheet()->setCellValueByColumnAndRow('21','1' ,'Country'); 


 
   $this->excel->getActiveSheet()->getStyle('A1:T1')
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
          $price=$this->diamond_price($row->vendor_id,$row->weight,$row->rapnet,$row->rapnet_discount,$row->currency);
           $row->new_discount = $price['new_discount'];
           $row->cost_carat = $price['new_rapnet'];
          $row->total_price = $price['new_totalprice'];
         $row->currency = $price['currency'];
                
       
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
       $this->excel->getActiveSheet()->setCellValueByColumnAndRow('11',$i,number_format($row->new_discount,2));
       $this->excel->getActiveSheet()->setCellValueByColumnAndRow('12',$i,number_format($row->cost_carat));
       $this->excel->getActiveSheet()->setCellValueByColumnAndRow('13',$i,'$'.round($row->total_price));        
       $this->excel->getActiveSheet()->setCellValueByColumnAndRow('14',$i,$row->lab); 
       $this->excel->getActiveSheet()->setCellValueByColumnAndRow('15',$i,$row->report_no);        
       $this->excel->getActiveSheet()->setCellValueByColumnAndRow('16',$i,$row->measurements); 
       $this->excel->getActiveSheet()->setCellValueByColumnAndRow('17',$i,$row->availability); 
       $this->excel->getActiveSheet()->setCellValueByColumnAndRow('18',$i,$row->diamond_image); 
       $this->excel->getActiveSheet()->setCellValueByColumnAndRow('19',$i,$row->diamond_video);    
       $this->excel->getActiveSheet()->setCellValueByColumnAndRow('20',$i,$row->origin);    
       $this->excel->getActiveSheet()->setCellValueByColumnAndRow('21',$i,$row->country);      
  
       $i++;
   }
   $avg_AM_PRICECTS=$total_AM_PRICECTS/count($records);
   for($col = 'A'; $col !== 'T'; $col++) {
       $this->excel->getActiveSheet()->getColumnDimension($col)->setAutoSize(true);
   }
   $this->excel->getActiveSheet()->setCellValueByColumnAndRow('0',$i,count($records));
   $this->excel->getActiveSheet()->getStyle('A'.$i.':T'.$i.'')
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
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
 function export_all_diamond()
 {        
   $where = "diamond_id > 0 AND diamond_type = 1 AND total_price > 0"; 
   $dis_value=$this->input->get('dis_value');
   // $all_id=$this->input->get('all_id');
   // if($all_id!="") 
   // {
   //     $all_id=explode(',', $all_id);
   //     $all_id_arr=implode("','",$all_id);                       
   //     $where .= "diamond_id IN ('".$all_id_arr."')";
   // }        
   $records = $this->diamond_model->diamond_list_limit($where,5000,0);
 
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
   $this->excel->getActiveSheet()->setCellValueByColumnAndRow('11','1' ,'Disc%');
   $this->excel->getActiveSheet()->setCellValueByColumnAndRow('12','1' ,'$/Carat');
   $this->excel->getActiveSheet()->setCellValueByColumnAndRow('13','1' ,'Price');
   $this->excel->getActiveSheet()->setCellValueByColumnAndRow('14','1' ,'Lab');
   $this->excel->getActiveSheet()->setCellValueByColumnAndRow('15','1' ,'Certificate');
   $this->excel->getActiveSheet()->setCellValueByColumnAndRow('16','1' ,'Measurements');
   $this->excel->getActiveSheet()->setCellValueByColumnAndRow('17','1' ,'Availability');
   $this->excel->getActiveSheet()->setCellValueByColumnAndRow('18','1' ,'Image_link');
   $this->excel->getActiveSheet()->setCellValueByColumnAndRow('19','1' ,'Video_link'); 
   $this->excel->getActiveSheet()->setCellValueByColumnAndRow('20','1' ,'Origin'); 
   $this->excel->getActiveSheet()->setCellValueByColumnAndRow('21','1' ,'Country'); 

   $this->excel->getActiveSheet()->getStyle('A1:T1')
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
          $price=$this->diamond_price($row->vendor_id,$row->weight,$row->rapnet,$row->rapnet_discount,$row->currency);
           $row->new_discount = $price['new_discount'];
           $row->cost_carat = $price['new_rapnet'];
          $row->total_price = $price['new_totalprice'];
         $row->currency = $price['currency'];
                
       
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
       $this->excel->getActiveSheet()->setCellValueByColumnAndRow('11',$i,number_format($row->new_discount,2));
       $this->excel->getActiveSheet()->setCellValueByColumnAndRow('12',$i,number_format($row->cost_carat));
       $this->excel->getActiveSheet()->setCellValueByColumnAndRow('13',$i,'$'.round($row->total_price));        
       $this->excel->getActiveSheet()->setCellValueByColumnAndRow('14',$i,$row->lab);  
       $this->excel->getActiveSheet()->setCellValueByColumnAndRow('15',$i,$row->report_no);      
       $this->excel->getActiveSheet()->setCellValueByColumnAndRow('16',$i,$row->measurements); 
       $this->excel->getActiveSheet()->setCellValueByColumnAndRow('17',$i,$row->availability);  
       $this->excel->getActiveSheet()->setCellValueByColumnAndRow('18',$i,$row->diamond_image); 
       $this->excel->getActiveSheet()->setCellValueByColumnAndRow('19',$i,$row->diamond_video);  
       $this->excel->getActiveSheet()->setCellValueByColumnAndRow('20',$i,$row->origin);  
       $this->excel->getActiveSheet()->setCellValueByColumnAndRow('21',$i,$row->country);  

       $i++;
   }
   $avg_AM_PRICECTS=$total_AM_PRICECTS/count($records);
   for($col = 'A'; $col !== 'T'; $col++) {
       $this->excel->getActiveSheet()->getColumnDimension($col)->setAutoSize(true);
   }
   $this->excel->getActiveSheet()->setCellValueByColumnAndRow('0',$i,count($records));
   $this->excel->getActiveSheet()->getStyle('A'.$i.':T'.$i.'')
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
     foreach ($records as $row) {
          $price=$this->diamond_price($row->vendor_id,$row->weight,$row->rapnet,$row->rapnet_discount,$row->currency);
           $row->new_discount = $price['new_discount'];
           $row->cost_carat = $price['new_rapnet'];
          $row->total_price = $price['new_totalprice'];
         $row->currency = $price['currency'];
                }                   
    echo json_encode(array('records'=>$records));
  }

    function send_quote_single_stone()
{
  $user_id=$this->session->userdata('user_id');
  $all_id=$this->input->post('checkbox_quote_arr');
  $comment=$this->input->post('comment');
  if($all_id!="") 
  {
    $all_id=explode(',', $all_id);
    $all_id_arr=implode("','",$all_id);                       
    $where .= "diamond_id IN ('".$all_id_arr."')";
  }        
  $records = $this->diamond_model->diamond_list_limit($where,1000,0);
        //print_ex($records);
  foreach($records as $member) { 

 $img=$this->list_image($member->NM_FOLDER_NAME,$member->stock_id);
        //print_pre($img);
    if(count(array_filter($img)))
    {
      $image_show = @$img['0'];
    }
    else
    {
      $image_show = shape_img($records['0']->shape);
    }

    $price=$this->diamond_price($member->vendor_id,$member->weight,$member->rapnet,$member->rapnet_discount,$member->currency);
    $member->new_discount = $price['new_discount'];
    $member->cost_carat = $price['new_rapnet'];
    $member->total_price = $price['new_totalprice'];
    $member->currency = $price['currency'];


    $data=array(
      'diamond_id'=>$member->diamond_id,
      'stock_id'=>$member->stock_id,
      'shape'=>$member->shape,
      'weight'=>$member->weight,
      'color'=>$member->color, 
      'grade'=>$member->grade, 
      'cut'=>$member->cut_full,
      'polish'=>$member->polish_full, 
      'symmetry'=>$member->symmetry_full, 
      'fluorescence_int'=>$member->fluor_full,  
      'measurements'=>$member->measurements, 
      'lab'=>$member->lab, 
      'report_no'=>$member->report_no,
      'rapnet' => $member->rapnet, 
      'total_price'=>$member->total_price,
      'currency'=>$member->currency,
      'new_discount'=>$member->new_discount,
      'cost_carat'=>$member->cost_carat,
      'customer_id'=>$user_id,
      'image'=>$image_show,
      'depth'=>$member->depth, 
      'table_d'=>$member->table_d, 
      'report_filename'=>$member->report_filename,
      'diamond_image'=>$member->diamond_image,
      'diamond_video'=>$member->diamond_video,
      'created_by'=>$member->vendor_id,
      'created_at'=>date('Y-m-d H:i:s'),
      'status'=>'pending',
      'comment'=>$comment,
      'vendor_id'=>$member->vendor_id, 
    );
    $insert_id=$this->common_model->insertData('tbl_diamond_enquiry',$data);
  }
  if($insert_id)
  {            

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
    $this->email->to(SITE_EMAIL);
    $this->email->subject("Diamond Enquiry");   

    $str_content = '';
    $str_name = ucwords($data_email['fname']);
    $str_url = ' 
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
    <th style="border: 1px solid black;" class="header">Rap$</th>    
    <th style="border: 1px solid black;" class="header">Disc%</th>    
    <th style="border: 1px solid black;" class="header">$/Carat</th>    
    <th style="border: 1px solid black;" class="header">Price</th> 
    <th style="border: 1px solid black;" class="header">Thai Baht</th>              
    <th style="border: 1px solid black;" class="header">Lab</th>               
    <th style="border: 1px solid black;" class="header">Measurements</th>
    <th style="border: 1px solid black;" class="header">Certificate No.</th>
    <th style="border: 1px solid black;" class="header">Certificate</th>
    <th style="border: 1px solid black;" class="header">Image</th>
    <th style="border: 1px solid black;" class="header">Video</th>
    </tr>
    <tbody> ';                
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
    <td style="border: 1px solid black; text-align: center;">'.$member->rapnet.'</td>           
    <td style="border: 1px solid black; text-align: center;">'.$member->new_discount.'</td>           
    <td style="border: 1px solid black; text-align: center;">'.$member->cost_carat.'</td>           
    <td style="border: 1px solid black; text-align: center;">$'.round($member->total_price).'</td>
    <td style="border: 1px solid black; text-align: center;">$'.round($member->currency).'</td>
    <td style="border: 1px solid black; text-align: center;">'.$member->lab.'</td>
    <td style="border: 1px solid black; text-align: center;">'.$member->measurements.'</td>
    <td style="border: 1px solid black; text-align: center;">'.$member->report_no.'</td><td style="border: 1px solid black; text-align: center;">'.$member->report_filename.'</td>
    <td style="border: 1px solid black; text-align: center;">'.$member->diamond_image.'</td>
    <td style="border: 1px solid black; text-align: center;">'.$member->diamond_video.'</td>                                   
    </tr>
    ';   '
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
   $this->email->subject("Diamond Enquiry");   

   $data_email['fname'] = 'Admin';     
   $str_content = '';
   $str_name = ucwords($data_email['fname']);
   $data_email['str_final'] = '<p>Customer has just asked for diamond enquiry. The query is as follows.</p>'.$str_url;
   $msg = $this->load->view('email/email_template',$data_email, TRUE);     
   $this->email->message($msg);
   $data['message'] = "Sorry Unable to send email..."; 
   if($this->email->send())
   {     
     $data['message'] = "Mail sent...";
   }

   echo json_encode(array('status' => 1, 'message' => 'Email has been sent successfully'));
 }
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
                    <th style="border: 1px solid black; text-align: center;" >Disc%</th>
                    <th style="border: 1px solid black; text-align: center;" >$/Carat</th>
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
          $price=$this->diamond_price($row->vendor_id,$row->weight,$row->rapnet,$row->rapnet_discount,$row->currency);
           $row->new_discount = $price['new_discount'];
           $row->cost_carat = $price['new_rapnet'];
          $row->total_price = $price['new_totalprice'];
         $row->currency = $price['currency'];
                
        $str_url .=   '<tr style="border: 1px solid black; text-align: center;">
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
                      <td style="border: 1px solid black; text-align: center;">'.number_format($row->new_discount,2).'</td>
                      <td style="border: 1px solid black; text-align: center;">$'.round($row->cost_carat).'</td>   
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
      // $this->session->set_flashdata('success',"Email has been sent successfully..");
      // redirect(base_url('diamond'));    

     echo json_encode(array('status' => 1, 'message' => 'Email has been sent successfully'));

  }
  function check_avail()
  { 
      if(!$this->input->is_ajax_request()){ exit('No direct script access allowed'); }
      $user_id = $this->session->userdata('user_id');
      $all_id=$this->input->post('checkbox_arr');
      $name=$this->input->post('name');   
      $company=$this->input->post('company');   
      $email=$this->input->post('email');
      $mobile=$this->input->post('mobile');
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
      $this->email->subject("Check Availability Request");
      
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
                <th style="border: 1px solid black; text-align: center;" >Disc.</th>                  
                <th style="border: 1px solid black; text-align: center;" >Rap Price</th>                  
                <th style="border: 1px solid black; text-align: center;" >$/Carat</th>                  
                <th style="border: 1px solid black; text-align: center;" >Total$</th>                  
                <th style="border: 1px solid black; text-align: center;" >Lab</th>                  
                <th style="text-align: center; width:130px;display:table-cell" >Measurements</th>  
                <th style="border: 1px solid black; text-align: center;" >More Details</th>               
            </tr>
          </thead>    
      <tbody> ';
         //$cnt = 1;
    foreach($records as $row) 
    {
      $stock_id = ($row->stock_id != null) ? $row->stock_id : "";
      $shape = ($row->shape_full != null) ? $row->shape_full : "";
      $weight = ($row->weight != null) ? number_format($row->weight,2) : "";
      $color = ($row->color != null) ? $row->color : "";
      $grade = ($row->grade != null) ? $row->grade : "";
      $cut = ($row->cut_full != null) ? $row->cut_full : "";
      $polish = ($row->polish_full != null) ? $row->polish_full : "";
      $symmetry = ($row->symmetry_full != null) ? $row->symmetry_full : "";
      $fluorescence_int = ($row->fluor_full != null) ? $row->fluor_full : "";
      $depth = ($row->depth != null) ? number_format($row->depth,1) : "";
      $table_d = ($row->table_d != null) ? (int)$row->table_d : "";
      $rapnet_discount = ($row->rapnet_discount != null) ? number_format($row->rapnet_discount,1) . '%' : "";
      $rapnet = ($row->rapnet != null) ? '$' . round($row->rapnet) : "";
      $cost_carat = ($row->cost_carat != null) ? '$' . round($row->cost_carat) : "";
      $total_price = ($row->total_price != null) ? '$' . round($row->total_price) : "";
      $lab = ($row->lab != null) ? $row->lab : "";
      $measurements = ($row->measurements != null) ? $row->measurements : "";
      if(empty($user_id)) {
        $rapnet_discount = '*****';
        $rapnet = '*****';
        $cost_carat = '*****';
        $total_price = '*****';
      }
                    
    $str_url .='<tr style="border: 1px solid black; text-align: center;">
                  <td style="border: 1px solid black; text-align: center;">'.$stock_id.'</td>
                  <td style="border: 1px solid black; text-align: center;">'.$shape.'</td>
                  <td style="border: 1px solid black; text-align: center;">'.$weight.'</td>              
                  <td style="border: 1px solid black; text-align: center;">'.$color.'</td>
                  <td style="border: 1px solid black; text-align: center;">'.$grade.'</td>
                  <td style="border: 1px solid black; text-align: center;">'.$cut.'</td>
                  <td style="border: 1px solid black; text-align: center;">'.$polish.'</td>
                  <td style="border: 1px solid black; text-align: center;">'.$symmetry.'</td>
                  <td style="border: 1px solid black; text-align: center;">'.$fluorescence_int.'</td>
                  <td style="border: 1px solid black; text-align: center;">'.$depth.'</td>
                  <td style="border: 1px solid black; text-align: center;">'.$table_d.'</td>   
                  <td style="border: 1px solid black; text-align: center;">'.$rapnet_discount.'</td>
                  <td style="border: 1px solid black; text-align: center;">'.$rapnet.'</td>
                  <td style="border: 1px solid black; text-align: center;">'.$cost_carat.'</td>
                  <td style="border: 1px solid black; text-align: center;">'.$total_price.'</td>
                  <td style="border: 1px solid black; text-align: center;">'.$lab.'</td>
                  <td style="text-align: center;border: 1px solid black">'.$measurements.'</td>
                  <td style="border: 1px solid black; text-align: center;">
                    <a href="'.base_url().'diamond-details/'.$row->stock_id.'" target="_blank" title="More Details">More Details</a>           
                  </td>                                             
              </tr>
         '; } '
      </tbody>        
  </table>';
      
      $message = 'You have asked for following stones, we will get back to you soon!';
      $data_email['fname'] = $name;  
      $data_email['vendor_mail'] = '';
      $data_email['str_final'] = '<p>'.$message.'</p>'.$str_url;
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
      $this->email->subject("Check Availability Request");
      $data_email['fname'] = 'Admin';  
      $data_email['str_final'] = '<p>Customer has Sent Check Availability Request</p>
      <p><b>Name: </b>'.$name.'</p>
      <p><b>Company: </b>'.$company.'</p>
      <p><b>Email: </b>'.$email.'</p>
      <p><b>Phone: </b>'.$mobile.'</p>'.$str_url;
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
      //$this->session->set_flashdata('alert_message',"Request has been sent successfully..");
      //redirect($_SERVER['HTTP_REFERER']);
      echo json_encode(array('status' => 1, 'message' => 'Request has been sent successfully'));
  }
  function compare_diamond()
  { 
      $this->load->view('common/header');
      $this->load->view('single_stones/compare_diamond');
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
      $diamond_id=$this->input->get('diamond_id');
      $diamond_arr=implode("','", $diamond_id);
      $where = "diamond_id IN ('".$diamond_arr."')";      
      $records = $this->diamond_model->diamond_list_limit($where,20,0);
        
       echo $data = json_encode($records);

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

  function show_calc()
  {
      $diamond_id=$this->input->get('diamond_id');
      $new_disc_input=$this->input->get('new_disc_input');
      $diamond_arr=implode("','", $diamond_id);
      $where = "diamond_id IN ('".$diamond_arr."')";      
      $records = $this->diamond_model->diamond_list_limit($where,20,0);
        echo json_encode(array('records'=>$records));
  }

 function short_link() 
  {
      $diamond_id = $this->input->get('diamond_id');
      $report = $this->input->get('report');
      $image_array=array();
      $video_link=array();
      $certificate_array=array();
      $diamond_arr=implode("','", $diamond_id);
      $where = "diamond_id IN ('".$diamond_arr."')";     
      $records = $this->diamond_model->diamond_list($where);
           
           foreach ($records as $row) {
          
        $image_array[] = $row->diamond_image;  
        $video_link[]=$row->diamond_video;     
        $certificate_array[]=$row->report_filename;

           }
      $data= array(
          'records'=>$records,
          'image_array'=>$image_array,
          'certificate_array'=>$certificate_array,
          'video_link'=>$video_link
      );
   echo json_encode($data);
  }

  function quick_view()
  {
     $diamond_id=$this->input->get('diamond_id');
    // print_ex($diamond_id);
     $where = 'diamond_id = '."'".$diamond_id."'";     
      $records = $this->diamond_model->diamond_list($where);
     // print_ex($records);
       foreach ($records as $row) {
          $price=$this->diamond_price($row->vendor_id,$row->weight,$row->rapnet,$row->rapnet_discount,$row->currency,$row->new_discount);
        //  print_ex($price);
           $row->new_discount = $price['new_discount'];
           $row->cost_carat = $price['new_rapnet'];
          $row->total_price = $price['new_totalprice'];
         $row->currency = $price['currency'];
                }
        echo $single_stone_data = json_encode($records);
  }

   function print_pdf()
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
   $data['records'] = $this->diamond_model->diamond_list_limit($where,1000,0);
  foreach ($data['records'] as $row) {
          
          $price=$this->diamond_price($row->vendor_id,$row->weight,$row->rapnet,$row->rapnet_discount,$row->currency);
          
           $row->new_discount = $price['new_discount'];
           $row->cost_carat = $price['new_rapnet'];
          $row->total_price = $price['new_totalprice'];
         $row->currency = $price['currency'];
                }
        $html = $this->load->view('single_stones/GeneratePdfView', $data, true);

        //echo $html; die;

        $this->pdf->createPDF($html, 'diamondpdf', true);   
  
 }
}
