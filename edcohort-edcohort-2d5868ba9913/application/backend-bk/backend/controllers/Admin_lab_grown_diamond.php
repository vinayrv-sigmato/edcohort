<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_lab_grown_diamond extends CI_Controller {

  public function __construct()
  {
      parent::__construct();
      $this->load->model('diamond_model');
      $this->load->model('vendor_model');
      $this->load->library('excel');
      $this->load->library('pagination');      
      $this->load->library('upload');
      if($this->session->userdata('jw_admin_id')=="")
      {
        redirect(base_url());
      }
  }
  public function index()
  {  
      $data['active_sidebar']='diamond_list';    
      $data['vendor_list']=$this->vendor_model->vendor_list($filter);

      $this->load->view('common/header');
      $this->load->view('common/sidebar',$data);
      $this->load->view('lab_grown_diamond/diamond_list',$data);
      $this->load->view('common/footer');
  }

  function load_more_data()
  {
      $page=$this->input->get('page');
      $per_page=$this->input->get('per_page');
      $user_id=$this->session->userdata('jw_admin_id');      
      $group_id=$this->session->userdata('jw_admin_group');      
     
      $where="diamond_id > 0 AND diamond_type = 2";    
      // if($group_id!='1'){
      //   $where .="AND created_by ='".$user_id."'";
      // }
     
      // $vendor = $this->input->get('vendor');       
      // if(!empty($vendor))
      // {               
      //     $where .="AND created_by ='".$vendor."'";            
      // }

      $stock = $this->input->get('stock');       
      if(!empty($stock))
      {           
          $splitstock = explode(',', $stock); 
          $q1stock=implode("','",$splitstock);              
          $where .= " AND stock_id IN ('".$q1stock."')";             
      }     
      $shape = $this->input->get('checkbox');      
      if(!empty($shape))
      {   
          $q1=implode("','",$shape);
          $where .= " AND shape_filter IN ('".$q1."')";
      }          
       $color = $this->input->get('color');                  
       if(!empty($color))
       {
           $color_array=array("D", "E", "F", "G", "H", "I", "J", "K", "L", "M");
           $color_array=$this->find_range($color,$color_array);
           $q2=implode("','",$color_array);
           $where .= " AND color IN ('".$q2."')";           
       }       
       $checkboxcut = $this->input->get('cut');                
       if(!empty($checkboxcut))
       {         
          $array_va=array("Excellent", "Very Good", "Good", "Fair");
          $checkboxcut=$this->find_range($checkboxcut,$array_va);
          if(in_array('Round',  $shape))
          {
            $qcut = implode("','", $checkboxcut);
            $where .= " AND cut_full IN ('".$qcut."')";
          }                  
       }     
       $checkboxpolish = $this->input->get('polish');                
       if(!empty($checkboxpolish))
       {            
            $array_va=array("Excellent", "Very Good", "Good", "Fair");
            $checkboxpolish=$this->find_range($checkboxpolish,$array_va);

            $qpolish = implode("','", $checkboxpolish);
            $where .= " AND polish_full IN ('".$qpolish."')";      
       }
       $checkboxsymm = $this->input->get('symmetry');                
       if(!empty($checkboxsymm))
       {          
          $array_va=array("Excellent", "Very Good", "Good", "Fair");
          $checkboxsymm=$this->find_range($checkboxsymm,$array_va);

          $qsymm = implode("','", $checkboxsymm);
          $where .= " AND symmetry_full IN ('".$qsymm."')";      
       }   
       $checkboxClarity = $this->input->get('clarity');
       if(!empty($checkboxClarity))
       {        
          $clarity_va=array("FL","IF","VVS1","VVS2","VS1","VS2","SI1","SI2","SI3","I1","I2","I3");
          $checkboxClarity=$this->find_range($checkboxClarity,$clarity_va);
         
          $qClarity = implode("','", $checkboxClarity);
          $where .= " AND grade IN ('".$qClarity."')";
       }     
       $checkboxFlour = $this->input->get('fluorescence');
       if(!empty($checkboxFlour))
       {          
          $array_va=array("None", "Faint", "Medium", "Strong","Very Strong");
          $checkboxFlour=$this->find_range($checkboxFlour,$array_va);

          $qFlour = implode("','", $checkboxFlour);
          $where .= " AND fluor_full IN ('".$qFlour."')";      
       }
      $range = $this->input->get('size');
      $split = explode(';', $range);
      $split1 = @$split['0'];    
      $split2 = @$split['1'];
      if($split2=='6'){
        $split2 = '20';
      }     
      if(!empty($range))
      {        
        $where .= " AND weight BETWEEN ('".$split1."') AND ('".$split2."')";     
      }     
      $total = $this->input->get('price');
      $splittotal = explode(';', $total);
      $splittotal1 = $splittotal['0'];
      $splittotal2 = @$splittotal['1'];    
      if(!empty($total))
      {
         $where .= " AND total_price BETWEEN (".$splittotal1.") AND (".$splittotal2.")";
      }

      $cert = $this->input->get('cert');      
      if(!empty($cert))
      {      
          $q1=implode("','",$cert); 
          $where .= " AND lab_filter IN ('".$q1."')";
      }

      $records_count = $this->diamond_model->diamond_count($where);      
      $data['records_count'] =$records_count['0']->diamond_count;  
      //print_ex($this->input->get());  
      $per_page= ($per_page) ? $per_page : 100 ;
      $config['base_url'] = base_url().'admin_lab_grown_diamond/load_more_data';
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
      
      $page= ($page) ? $page : 0 ;
      $this->pagination->initialize($config);
      $page_link=$this->pagination->create_links();

      $records = $this->diamond_model->diamond_list_limit($where,$per_page,$page);
      echo json_encode(array('records'=>$records,'page_link'=>$page_link,'total_records'=>$data['records_count']));
      // echo json_encode(array('records'=>$records);
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
  function print_data()
  {
    $all_id=$this->input->get('all_id');
    //print_r($all_id);
    $all_id_arr=implode("','",$all_id);                     
    $where = "diamond_id IN ('".$all_id_arr."')";     
    $records = $this->diamond_model->diamond_list_limit($where,1000,0);                    
    echo json_encode(array('records'=>$records));
  }
  function diamond_details()
  {
      $inventory_id = $this->uri->segment(3);

      $image_array=array();
      $sample_image_array=array();
      $image_link=array();
      $video_array=array();
      $video_link=array();
      $certificate_array=array();
      $where = 'diamond_id = '."'".$inventory_id."'";      
      $records = $this->diamond_model->diamond_list($where);
      //print_ex($records['0']->shape_full);
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
      $data['active_sidebar']='diamond_list';   

      $this->load->view('common/header');
      $this->load->view('common/sidebar',$data);
      $this->load->view('lab_grown_diamond/diamond_details',$data);
      $this->load->view('common/footer');
  }
  function upload_diamond()
  {
      $data['active_sidebar']='diamond_upload';
      $this->load->view('common/header');
      $this->load->view('common/sidebar',$data);
      $this->load->view('lab_grown_diamond/upload_diamond',$data);
      $this->load->view('common/footer');
  }           
  function upload_diamond_submit() 
  {  
      $total_record=0;
      $total_update=0;
      $total_insert=0;              
      $replace_all = $this->input->post('replace_all');
      $user_id=$this->session->userdata('jw_admin_id');
      
      $files = $_FILES;
      $file_dir='../uploads/diamond/excel/';
    
      $config['upload_path'] = $file_dir;
      $config['allowed_types'] = 'xls|xlsx|csv';
      $config['max_size']      = '600000000';
      $config['overwrite']     = TRUE;
   
      $_FILES['userfile']['name']= $files['userfile']['name'];
      $_FILES['userfile']['type']= $files['userfile']['type'];
      $_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'];
      $_FILES['userfile']['error']= $files['userfile']['error'];
      $_FILES['userfile']['size']= $files['userfile']['size'];

      $this->upload->initialize($config);
      $do_upload=$this->upload->do_upload();

      $file_full=$file_dir.str_replace(" ", '_', $_FILES['userfile']['name']);
     
      if($replace_all['0'] =="replace_all")
      { 
          if(file_exists($file_full))
          {   //die('test'); 
              $where=array('stock_id !='=>"",'diamond_type' => 2  );
              $this->admin_model->deleteData('tbl_diamond',$where);  
              $objPHPExcel = PHPExcel_IOFactory::load($file_full);
              $excel_array = $objPHPExcel->getActiveSheet()->toArray(null,true,true,false);
              //print_ex($excel_array);
              foreach($excel_array['0'] as $key => $value)
              {             
                  if($value)
                  {
                    $columns[]= $this->check_header($value);
                  }
              }
              //print_ex($columns);
              foreach ($excel_array as $ekey => $evalue) 
              { 
                  if($ekey>0)
                  {
                      foreach ($columns as $ckey => $cvalue) 
                      {               
                        if($cvalue)
                        {
                          $data[$cvalue]=  $evalue[$ckey];
                        }
                      }
                      $data['created_at'] = date('Y-m-d H:i:s');
                      $data['created_by'] = $user_id;
                      $data['diamond_type'] = 2;
                      $total_record++;
                      if($this->validate_diamond($data))
                      {
                        //print_pre($data);
                        $insert_id[]=$this->admin_model->insertData('tbl_diamond',$data);
                      }
                  }
              } 
              $total_insert=count($insert_id);
              $log_data=array(              
                'total_record'=>$total_record,
                'total_update'=>$total_update,
                'total_insert'=>$total_insert,
                'log_time'=>time(),
                'type'=>'lab grown',
              );
              //print_pre($log_data);
              $this->admin_model->insertData('tbl_inventory_log',$log_data);         
          }              
          if($do_upload)
          {
              $status= 'completed';
              $this->session->set_userdata('status',$status); 
              $this->session->set_flashdata('success','Total '.count($insert_id).' Record(s) Uploaded Successfully!');              
          }
      }              
      else
      {
        if(file_exists($file_full))
        {  
            $objPHPExcel = PHPExcel_IOFactory::load($file_full);
            $excel_array = $objPHPExcel->getActiveSheet()->toArray(null,true,true,false);
            foreach($excel_array['0'] as $key => $value)
            {             
                if($value)
                {
                  $columns[]= $this->check_header($value);
                }
            }
            foreach ($excel_array as $ekey => $evalue) 
            { 
                if($ekey>0)
                {
                    foreach ($columns as $ckey => $cvalue) 
                    {               
                        if($cvalue)
                        {
                          $data[$cvalue]=  $evalue[$ckey];
                        }
                    }
                    $data['created_at'] = date('Y-m-d H:i:s');
                    $data['created_by'] = $user_id;
                    $data['diamond_type'] = 2;
                    $total_record++;
                    if($this->validate_diamond($data))
                    {
                        $where=array('stock_id'=>@$data['stock_id']);
                        $check_data=$this->check_diamond($data['stock_id']); 
                        //print_pre($check_data); 
                        if(count(array_filter($check_data)))
                        {                                               
                            $data=array("diamond_id"=>$check_data['0']->diamond_id) + $data;                                          

                            $this->db->replace('tbl_diamond', $data);
                            if($this->db->affected_rows())
                            {
                              $total_update++;  
                            }                                                         
                        }
                        else
                        {                               
                            unset($data['diamond_id']);                             
                            $insert_id=$this->admin_model->insertData('tbl_diamond',$data);
                            if($insert_id)
                            {
                              $total_insert++;
                            }
                        }   
                    } 
                    
                }
            }
            $this->session->set_flashdata('success','Total '.($total_update+$total_insert).' Record(s) Uploaded Successfully!');  
        }
        $log_data=array(              
            'total_record'=>$total_record,
            'total_update'=>$total_update,
            'total_insert'=>$total_insert,
            'log_time'=>time(),
            'type'=>'lab grown',
        );
        //print_pre($log_data);
        $this->admin_model->insertData('tbl_inventory_log',$log_data); 
      }              
    
      redirect(base_url() . "admin_lab_grown_diamond/upload_diamond");
  }
  function check_header($header)
  {
      $this->db->select('H.table_column');
      $this->db->from('tbl_diamond_accepted_header AH');
      $this->db->join('tbl_diamond_header H', 'AH.header_id = H.header_id','right'); 
      
      $this->db->or_where('H.header_name',$header);
      $this->db->or_where('AH.accepted_header_name',$header);    
      $query=$this->db->get();
      $result=$query->result();
      return $result['0']->table_column;
  }
  function check_diamond($stock_id)
  {  
      $user_id=$this->session->userdata('jw_admin_id');
      $where .= "WHERE stock_id = '".$stock_id."' AND created_by='".$user_id."' "; 
      $select='diamond_id,stock_id';
      $table_name='tbl_diamond';     
      $query = $this->db->query("select ".$select." from ".$table_name."  ".$where);
      return $query->result();  
  }
  function validate_diamond($data)
  { 
      //print_ex($data);
      $lab_arr=array('GIL','NONE','None','NA','NC','N','NULL');
      if($data['stock_id']!="" && $data['shape']!="" && $data['weight']!="" && $data['color']!=""&& $data['lab']!="" && !in_array($data['lab'], $lab_arr))
      {
        return true;
      } 
      else
      {
        return false;
      }
  }
  //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
  function upload_diamond_image()
  {   
      $user_id=$this->session->userdata('jw_admin_id');
      $count=0;
      $files = $_FILES;
      $cpt = count($_FILES['userfile']['name']);

      $file_dir='../ftp_upload/diamond/image/';
      clearstatcache();
      if(is_dir($file_dir))
      {
          $config['upload_path'] = $file_dir;
          $config['allowed_types'] = 'gif|jpg|jpeg|png';
          $config['max_size']      = '6000';
          $config['overwrite']     = TRUE;

          for($i=0; $i<$cpt; $i++)
          {           
              $_FILES['userfile']['name']= $files['userfile']['name'][$i];
              $_FILES['userfile']['type']= $files['userfile']['type'][$i];
              $_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
              $_FILES['userfile']['error']= $files['userfile']['error'][$i];
              $_FILES['userfile']['size']= $files['userfile']['size'][$i];

              $this->upload->initialize($config);
              if($this->upload->do_upload())
              {
                 $count++;
              }            
          }
          $log_data=array(              
              'total_record'=>$cpt,             
              'total_insert'=>$count,       
              'created_by'=>$user_id,     
              'created_at'=>date('Y-m-d h:i:s'),
              'type'=>'lab grown',
              'file_type'=>'image',
            );
          $this->admin_model->insertData('tbl_inventory_file_log',$log_data);  
      }
      $this->session->set_flashdata('success','Total '.$count.' File Uploaded !');
      redirect(base_url() . "admin_lab_grown_diamond/upload_diamond");
      
  }
  //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
  function upload_diamond_video()
  {
      $user_id=$this->session->userdata('jw_admin_id');
      $count=0;
      $files = $_FILES;
      $cpt = count($_FILES['userfile']['name']);

      $file_dir='../ftp_upload/diamond/video/';
      clearstatcache();
      if(is_dir($file_dir))
      {
          $config['upload_path'] = $file_dir;
          $config['allowed_types'] = 'mp4';
          $config['max_size']      = '60000';
          $config['overwrite']     = TRUE;

          for($i=0; $i<$cpt; $i++)
          {           
              $_FILES['userfile']['name']= $files['userfile']['name'][$i];
              $_FILES['userfile']['type']= $files['userfile']['type'][$i];
              $_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
              $_FILES['userfile']['error']= $files['userfile']['error'][$i];
              $_FILES['userfile']['size']= $files['userfile']['size'][$i];

              $this->upload->initialize($config);
              if($this->upload->do_upload())
              {
                 $count++;
              }            
          }
          $log_data=array(              
              'total_record'=>$cpt,             
              'total_insert'=>$count,       
              'created_by'=>$user_id,     
              'created_at'=>date('Y-m-d h:i:s'),
              'type'=>'lab grown',
              'file_type'=>'video',
            );
          //print_pre($log_data);
          $this->admin_model->insertData('tbl_inventory_file_log',$log_data);
      }
      $this->session->set_flashdata('success','Total '.$count.' File Uploaded !');
      redirect(base_url() . "admin_lab_grown_diamond/upload_diamond");
      
  }
  //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
  function upload_diamond_certificate()
  {
      $user_id=$this->session->userdata('jw_admin_id');
      $count=0;
      $files = $_FILES;
      $cpt = count($_FILES['userfile']['name']);

      $file_dir='../ftp_upload/diamond/certificate/';
      clearstatcache();
      if(is_dir($file_dir))
      {
          $config['upload_path'] = $file_dir;
          $config['allowed_types'] = 'pdf';
          $config['max_size']      = '6000';
          $config['overwrite']     = TRUE;

          for($i=0; $i<$cpt; $i++)
          {           
              $_FILES['userfile']['name']= $files['userfile']['name'][$i];
              $_FILES['userfile']['type']= $files['userfile']['type'][$i];
              $_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
              $_FILES['userfile']['error']= $files['userfile']['error'][$i];
              $_FILES['userfile']['size']= $files['userfile']['size'][$i];

              $this->upload->initialize($config);
              if($this->upload->do_upload())
              {
                 $count++;
              }            
          }
          $log_data=array(              
              'total_record'=>$cpt,             
              'total_insert'=>$count,       
              'created_by'=>$user_id,     
              'created_at'=>date('Y-m-d h:i:s'),
              'type'=>'lab grown',
              'file_type'=>'certificate',
            );
          //print_pre($log_data);
          $this->admin_model->insertData('tbl_inventory_file_log',$log_data);
      }
      $this->session->set_flashdata('success','Total '.$count.' File Uploaded !');
      redirect(base_url() . "admin_lab_grown_diamond/upload_diamond");
      
  }
  //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
  function delete_diamond()
  {                  
      $all_id=$this->input->get('all_id'); 
      $all_id=array_filter($all_id);  
        
      foreach ($all_id as $key => $value) 
      {  
          $where=array(           
            'diamond_id'=>$value
            );           
          $this->admin_model->deleteData('tbl_diamond',$where);
      }          

      echo json_encode(array('records'=>""));
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
        // $total=(($row->cash_price*$new_discount)/100);
        // $ppc=($row->cash_price-$total);
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

    for($col = 'A'; $col !== 'Q'; $col++) {
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


      //$this->excel->getActiveSheet()->setAutoFilter('A2:Q2');
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
  //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
  function upload_history()
  {
      $where=array('type'=>'lab grown');
      $where1=array('type'=>'lab grown','file_type'=>'image');
      $where2=array('type'=>'lab grown','file_type'=>'video');
      $where3=array('type'=>'lab grown','file_type'=>'certificate');
      $data['excel_history']=$this->admin_model->selectWhereorderby('tbl_inventory_log',$where,'inventory_log_id','desc');
      $data['image_history']=$this->admin_model->selectWhereorderby('tbl_inventory_file_log',$where1,'file_log_id','desc');
      $data['video_history']=$this->admin_model->selectWhereorderby('tbl_inventory_file_log',$where2,'file_log_id','desc');
      $data['certificate_history']=$this->admin_model->selectWhereorderby('tbl_inventory_file_log',$where3,'file_log_id','desc');
      //print_ex($data);
      $data['active_sidebar']='diamond_history';
      $this->load->view('common/header');
      $this->load->view('common/sidebar',$data);
      $this->load->view('lab_grown_diamond/upload_history',$data);
      $this->load->view('common/footer');
  }
  //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
  function delete_history()
  {   
      $file_type=$this->uri->segment(3);
      
      if($file_type=='excel')
      {
        $where=array(           
        'type'=>'diamond'
        );           
        $this->admin_model->deleteData('tbl_inventory_log',$where);
        $this->session->set_flashdata('success','History Cleared!');
      }
      else if($file_type=='image')
      {
        $where=array(           
        'type'=>'diamond',
        'file_type'=>'image'
        );           
        $this->admin_model->deleteData('tbl_inventory_file_log',$where);
        $this->session->set_flashdata('success','History Cleared!');
      }
      else if($file_type=='video')
      {
        $where=array(           
        'type'=>'diamond',
        'file_type'=>'video'
        );           
        $this->admin_model->deleteData('tbl_inventory_file_log',$where);
        $this->session->set_flashdata('success','History Cleared!');
      }
      else if($file_type=='certificate')
      {
        $where=array(           
        'type'=>'diamond',
        'file_type'=>'certificate'
        );           
        $this->admin_model->deleteData('tbl_inventory_file_log',$where);
        $this->session->set_flashdata('success','History Cleared!');
      }
      else
      {
          $this->session->set_flashdata('alert','History Not Cleared!');
      }        
      redirect(base_url() . "admin_lab_grown_diamond/upload_history");
  }
  function download_file()
  {
      $where = ""; 
      $all_id=$this->input->get('all_id');
           
      if(count($all_id)) 
      {
          $all_id_arr=implode("','",$all_id);                       
          $where .= "diamond_id IN ('".$all_id_arr."')";
      } 
      //print_ex($where);    
      $records = $this->diamond_model->diamond_list($where);
       
      $image_array=array();
      $image_link=array();
      $video_array=array();
      $video_link=array();
      $certificate_array=array();
      
      foreach ($records as $row) 
      { 
        $file='ftp_upload/diamond/image/'.$row->stock_id.'.jpg';

        if(file_exists($file))
        {
            $image_array[]=$file;
        } 
        for($i=1;$i<=5;$i++)
        {
            $file='ftp_upload/diamond/image/'.$row->stock_id.'_'.$i.'.jpg';

            if(file_exists($file))
            {
                $image_array[]=$file;
            } 
        }

        $video='ftp_upload/diamond/video/'.$row->stock_id.'.mp4';
        if(file_exists($video))
        {
            $video_array[]=$video;
        } 
        
        $certificate='ftp_upload/diamond/certificate/'.$row->report_no.'.pdf';
        if(file_exists($certificate))
        {
            $certificate_array[]=$certificate;
        }
      }
       
      //print_pre($image_link);   
      $data= array(
          'image_array'=>$image_array,
          'video_array'=>$video_array,
          'certificate_array'=>$certificate_array
        );
      //print_ex($data);  
      echo json_encode($data);      
  }
  function add_markup()
  {  
      //$data['active_sidebar']='diamond_list';    
      $data['pricing']=$this->admin_model->selectWhere('tbl_pricing',array('pricing_id'=>'1'));

      $this->load->view('common/header');
      $this->load->view('common/sidebar',$data);
      $this->load->view('lab_grown_diamond/diamond_markup',$data);
      $this->load->view('common/footer');
  }
  function add_markup_submit()
  {
      $user_id=$this->session->userdata('jw_admin_id');

      $markup=$this->input->post('markup');

      $data=array(              
          'markup'=>$markup,       
          'created_by'=>$user_id,     
          'created_at'=>date('Y-m-d h:i:s')
      );
      //print_pre($log_data);
      $this->admin_model->updateData('tbl_pricing',$data,array('pricing_id'=>'1'));

      $this->session->set_flashdata('success','Markup Has been updated successfully!');
      redirect(base_url() . "admin_lab_grown_diamond/add_markup");
     
    }


}