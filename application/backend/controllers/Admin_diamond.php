<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_diamond extends CI_Controller {

  public function __construct()
  {
      parent::__construct();
      $this->load->model('diamond_model');
      $this->load->model('common_model');
      $this->load->model('vendor_model'); 
      $this->load->library('excel');
      $this->load->library('pagination');      
      $this->load->library('upload');
      
  }
  public function index()
  {  
      if($this->session->userdata('jw_admin_id')=="")
      {
        redirect(base_url());
      }
      
      $data['active_sidebar']='diamond_list';    
      $data['vendor_list']=$this->vendor_model->vendor_list($filter);

      $this->load->view('common/header');
      $this->load->view('common/sidebar',$data);
      $this->load->view('diamond/diamond_list',$data);
      $this->load->view('common/footer');
  }

  function load_more_data()
  {
      if($this->session->userdata('jw_admin_id')=="")
      {
        redirect(base_url());
      }
      $page=$this->input->get('page');
      $per_page=$this->input->get('per_page');
      $user_id=$this->session->userdata('jw_admin_id');      
      $group_id=$this->session->userdata('jw_admin_group');   
      
      $login = $user_id;   
     
      $where="diamond_id > 0 AND diamond_type = 1 "; 
         
      // if($group_id!='1'){
      //   $where .="AND created_by ='".$user_id."'";
      // }
     
      $vendor = $this->input->get('vendor');       
      if(!empty($vendor))
      {               
          $where .="AND created_by ='".$vendor."'";            
      }
     $filter_status=$this->input->get('filter_status');
      if($filter_status!="")
        {
            $where .=' AND diamond_status = "'.$filter_status.'"';
        }

      $stock = $this->input->get('stock');       
      if(!empty($stock))
      {           
          $splitstock = explode(',', $stock); 
          $q1stock=implode("','",$splitstock);              
          $where .= " AND stock_id IN ('".$q1stock."')";             
      }   

      $certificate = $this->input->get('certificate');       
      if(!empty($certificate))
      {           
          $splitcertificate = explode(',', $certificate); 
          $q1certificate=implode("','",$splitcertificate);              
          $where .= " AND report_no IN ('".$q1certificate."')";             
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
          $array_va=array("EX", "VG", "GD", "FR");
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
            $array_va=array("EX", "VG", "GD", "FR");
            $checkboxpolish=$this->find_range($checkboxpolish,$array_va);

            $qpolish = implode("','", $checkboxpolish);
            $where .= " AND polish_full IN ('".$qpolish."')";      
       }
       $checkboxsymm = $this->input->get('symmetry');                
       if(!empty($checkboxsymm))
       {          
          $array_va=array("EX", "VG", "GD", "FR");
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
          $array_va=array("NON", "FNT", "MED", "STG","VST");
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
      $config['base_url'] = base_url().'admin_diamond/load_more_data';
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
      echo json_encode(array('records'=>$records,'page_link'=>$page_link,'total_records'=>$data['records_count'],'isLogin' =>$user_id));
      // echo json_encode(array('records'=>$records);
  }
  function find_range($range,$array_from)
  {
      if($this->session->userdata('jw_admin_id')=="")
      {
        redirect(base_url());
      }
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
      if($this->session->userdata('jw_admin_id')=="")
      {
        redirect(base_url());
      }
    $all_id=$this->input->get('all_id');
    //print_r($all_id);
    $all_id_arr=implode("','",$all_id);                     
    $where = "diamond_id IN ('".$all_id_arr."')";     
    $records = $this->diamond_model->diamond_list_limit($where,1000,0);                    
    echo json_encode(array('records'=>$records));
  }
  function diamond_details()
  {
      if($this->session->userdata('jw_admin_id')=="")
      {
        redirect(base_url());
      }
      $inventory_id = $this->uri->segment(3);
      $status = $this->uri->segment(4);

      $image_array=array();
      $sample_image_array=array();
      $image_link=array();
      $video_array=array();
      $video_link=array();
      $certificate_array=array();
      if($status !=  ''){
          $where = 'report_no = '."'".$inventory_id."'";      
      }else{
      $where = 'diamond_id = '."'".$inventory_id."'";      }
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
      $this->load->view('diamond/diamond_details',$data);
      $this->load->view('common/footer');
  }

  function edit_diamond_details()
  {
      if($this->session->userdata('jw_admin_id')=="")
      {
        redirect(base_url());
      }
      $inventory_id = $this->uri->segment(3);
      $status = $this->uri->segment(4);

      $image_array=array();
      $sample_image_array=array();
      $image_link=array();
      $video_array=array();
      $video_link=array();
      $certificate_array=array();
      if($status !=  ''){
          $where = 'report_no = '."'".$inventory_id."'";      
      }else{
      $where = 'diamond_id = '."'".$inventory_id."'";      }
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
      $this->load->view('diamond/edit_diamond_details',$data);
      $this->load->view('common/footer');
  }
  function edit_diamond_submit(){
        $user_id=$this->session->userdata('jw_admin_id');
        $group_id=$this->session->userdata('jw_admin_group'); 
        $folder=$this->session->userdata('jw_admin_folder'); 
        $POST=$this->input->post();
        $diamond_id=$this->input->post('diamond_id'); 
        $where=array('diamond_id'=>$diamond_id);
            $data=array(
                'stock_id'=>$this->input->post("stock_id"),
                'rapnet'=>$this->input->post("cost_carat"),
                'cash_price'=>$this->input->post("total_price"),
                'rapnet_discount'=>$this->input->post("new_discount"),               
                 );
            $this->admin_model->updateData('tbl_diamond',$data,$where);
            $this->session->set_flashdata('success','Diamond Updated Successfully!');
        redirect(base_url()."admin_diamond/edit_diamond_details/".$diamond_id);
  }
  function upload_diamond()
  {
      if($this->session->userdata('jw_admin_id')=="")
      {
        redirect(base_url());
      }
      
      $data['active_sidebar']='diamond_upload';
      $data['vendors']=$this->vendor_model->vendor_list($filter);
     // print_ex($data);
      $this->load->view('common/header');
      $this->load->view('common/sidebar',$data);
      $this->load->view('diamond/upload_diamond',$data);
      $this->load->view('common/footer');
  }           
  function upload_diamond_submit() 
  {  
      $total_record=0;
      $total_update=0;
      $total_insert=0;              
      $replace_all = $this->input->post('replace_all');
      $user_id=$this->session->userdata('jw_admin_id');
      $vendor = $this->input->post('vendor');
      $files = $_FILES;
      $file_dir='../uploads/diamond/excel/';
      $config['upload_path'] = $file_dir;
      $config['allowed_types'] = 'xls|xlsx|csv';
      $config['max_size']      = '600000000';
      $config['overwrite']     = TRUE;
      $config['file_name']     = $vendor;
   
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
              $where=array('stock_id !='=>"",'diamond_type' => 1);
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
                      $data['vendor_id'] = 24;
                      $data['diamond_type'] = 1;
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
                'type'=>'diamond',
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
                    $data['diamond_type'] = 1;
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
            'type'=>'diamond',
        );
        //print_pre($log_data);
        $this->admin_model->insertData('tbl_inventory_log',$log_data); 
      }              
    
      redirect(base_url() . "admin_diamond/upload_diamond");
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
      if($this->session->userdata('jw_admin_id')=="")
      {
        redirect(base_url());
      }
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
              'type'=>'diamond',
              'file_type'=>'image',
            );
          $this->admin_model->insertData('tbl_inventory_file_log',$log_data);  
      }
      $this->session->set_flashdata('success','Total '.$count.' File Uploaded !');
      redirect(base_url() . "admin_diamond/upload_diamond");
      
  }
  //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
  function upload_diamond_video()
  {
      if($this->session->userdata('jw_admin_id')=="")
      {
        redirect(base_url());
      }
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
              'type'=>'diamond',
              'file_type'=>'video',
            );
          //print_pre($log_data);
          $this->admin_model->insertData('tbl_inventory_file_log',$log_data);
      }
      $this->session->set_flashdata('success','Total '.$count.' File Uploaded !');
      redirect(base_url() . "admin_diamond/upload_diamond");
      
  }
  //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
  function upload_diamond_certificate()
  {
      if($this->session->userdata('jw_admin_id')=="")
      {
        redirect(base_url());
      }
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
              'type'=>'diamond',
              'file_type'=>'certificate',
            );
          //print_pre($log_data);
          $this->admin_model->insertData('tbl_inventory_file_log',$log_data);
      }
      $this->session->set_flashdata('success','Total '.$count.' File Uploaded !');
      redirect(base_url() . "admin_diamond/upload_diamond");
      
  }
  //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
  function delete_diamond()
  {                  
      if($this->session->userdata('jw_admin_id')=="")
      {
        redirect(base_url());
      }
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
      if($this->session->userdata('jw_admin_id')=="")
      {
        redirect(base_url());
      }
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
    $this->excel->getActiveSheet()->setCellValueByColumnAndRow('17','1' ,'Image_link');
    $this->excel->getActiveSheet()->setCellValueByColumnAndRow('18','1' ,'Video_link'); 
  
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
        $this->excel->getActiveSheet()->setCellValueByColumnAndRow('11',$i,number_format($row->new_discount,2));
        $this->excel->getActiveSheet()->setCellValueByColumnAndRow('12',$i,number_format($row->cost_carat));
        $this->excel->getActiveSheet()->setCellValueByColumnAndRow('13',$i,'$'.round($row->total_price));        
        $this->excel->getActiveSheet()->setCellValueByColumnAndRow('14',$i,$row->lab); 
        $this->excel->getActiveSheet()->setCellValueByColumnAndRow('15',$i,$row->report_no);        
        $this->excel->getActiveSheet()->setCellValueByColumnAndRow('16',$i,$row->measurements); 
        $this->excel->getActiveSheet()->setCellValueByColumnAndRow('17',$i,$row->diamond_image); 
        $this->excel->getActiveSheet()->setCellValueByColumnAndRow('18',$i,$row->diamond_video); 
      
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


      //$this->excel->getActiveSheet()->setAutoFilter('A2:Q2');
      $this->excel->getActiveSheet()
        ->getStyle( $this->excel->getActiveSheet()->calculateWorksheetDimension() )
        ->getAlignment()
        ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
    
      $filename='Diamonds_'.date('d_m_Y_h_i_s_A').'.xls';
      ob_end_clean(); 
     header('Content-Type: application/vnd.ms-excel'); 
     header('Content-Disposition: attachment;filename="'.$filename.'"'); 
     header('Cache-Control: max-age=0');                     
     //save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
     //if you want to save it as .XLSX Excel 2007 format
     $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');  
     //force user to download the Excel file without writing it to server's HD
     $objWriter->save('php://output');
  } 
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
    $this->excel->getActiveSheet()->setCellValueByColumnAndRow('17','1' ,'Certificate_link');
    $this->excel->getActiveSheet()->setCellValueByColumnAndRow('18','1' ,'Image_link');
    $this->excel->getActiveSheet()->setCellValueByColumnAndRow('19','1' ,'Video_link'); 
  
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
        $this->excel->getActiveSheet()->setCellValueByColumnAndRow('17',$i,$row->report_filename);  
        $this->excel->getActiveSheet()->setCellValueByColumnAndRow('18',$i,$row->diamond_image); 
        $this->excel->getActiveSheet()->setCellValueByColumnAndRow('19',$i,$row->diamond_video);        
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
      ob_end_clean();
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
      if($this->session->userdata('jw_admin_id')=="")
      {
        redirect(base_url());
      }
      $where=array('type'=>'diamond');
      $where1=array('type'=>'diamond','file_type'=>'image');
      $where2=array('type'=>'diamond','file_type'=>'video');
      $where3=array('type'=>'diamond','file_type'=>'certificate');
      $data['excel_history']=$this->admin_model->selectWhereorderby('tbl_inventory_log',$where,'inventory_log_id','desc');
      $data['image_history']=$this->admin_model->selectWhereorderby('tbl_inventory_file_log',$where1,'file_log_id','desc');
      $data['video_history']=$this->admin_model->selectWhereorderby('tbl_inventory_file_log',$where2,'file_log_id','desc');
      $data['certificate_history']=$this->admin_model->selectWhereorderby('tbl_inventory_file_log',$where3,'file_log_id','desc');
      //print_ex($data);
      $data['active_sidebar']='diamond_history';
      $this->load->view('common/header');
      $this->load->view('common/sidebar',$data);
      $this->load->view('diamond/upload_history',$data);
      $this->load->view('common/footer');
  }
  //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
  function delete_history()
  {   
      if($this->session->userdata('jw_admin_id')=="")
      {
        redirect(base_url());
      }
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
      redirect(base_url() . "admin_diamond/upload_history");
  }
  function download_file()
  {
      if($this->session->userdata('jw_admin_id')=="")
      {
        redirect(base_url());
      }
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
      if($this->session->userdata('jw_admin_id')=="")
      {
        redirect(base_url());
      }
      //$data['active_sidebar']='diamond_list';    
      $data['pricing']=$this->admin_model->selectWhere('tbl_pricing',array('pricing_id'=>'1'));

      $this->load->view('common/header');
      $this->load->view('common/sidebar',$data);
      $this->load->view('diamond/diamond_markup',$data);
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
      redirect(base_url() . "admin_diamond/add_markup");
     
    }
    
    
    public function add_stock_files()
    {
        if($this->session->userdata('jw_admin_id')=="")
      {
        redirect(base_url());
      }
        $data['vendors']=$this->vendor_model->vendor_list();

          $this->load->view('common/header');
          $this->load->view('common/sidebar',$data);
          $this->load->view('diamond/add_stock_file',$data);
          $this->load->view('common/footer');
    }
    public function upload_stock_file()
    {
        if($this->session->userdata('jw_admin_id')=="")
      {
        redirect(base_url());
      }
        $files = $_FILES;
        $file_dir='../uploads/diamond/excel/';
       $vendor = $this->input->post('vendor');
        $user_id=$this->session->userdata('jw_admin_id');
          $config['upload_path'] = $file_dir;
          $config['allowed_types'] = 'xls|xlsx|csv';
          $config['max_size']      = '600000000';
          $config['overwrite']     = TRUE;
          $config['file_name']     = $vendor;
       
          $_FILES['userfile']['name']= $files['userfile']['name'];
          $_FILES['userfile']['type']= $files['userfile']['type'];
          $_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'];
          $_FILES['userfile']['error']= $files['userfile']['error'];
          $_FILES['userfile']['size']= $files['userfile']['size'];
    
          $this->upload->initialize($config);
          $do_upload=$this->upload->do_upload();
          if($do_upload)
          {
              $status= 'completed';
              $this->session->set_userdata('status',$status); 
              $this->session->set_flashdata('success','Uploaded Successfully!');              
          }
          redirect(base_url() . "admin_diamond/add_stock_files");
    }
    public function starrays(){
        $url = 'https://starrays.com/DataService/StockDownLoad/FrmDataDownloader.aspx?uname=Dealson&pwd=Dealson';
    	$filename = 'starrays.csv';
        /* Save file wherever you want */
        $data = file_put_contents('../uploads/diamond/excel/'.$filename, file_get_contents($url));
    }
    public function parishi(){
        $url = 'http://dailystock.in/parishi/parishi.csv';
        $filename = 'parishi.csv';
        /* Save file wherever you want */
        $data = file_put_contents('../uploads/diamond/excel/'.$filename, file_get_contents($url));
    
    }
    public function pansuriya(){
        $url = 'http://dailystock.in/pansuriya/pansuriya.xls';
        $filename = 'pansuriya.csv';
        /* Save file wherever you want */
        $data = file_put_contents('../uploads/diamond/excel/'.$filename, file_get_contents($url));
    
    }
    //start code here
    public function upload_stock($name)
    {
        include base_url().'assets/simplexlsx-master/src/SimpleXLSX.php';
    	include_once("xlsxwriter.class.php");
        require_once APPPATH.'third_party/PHPExcel.php';
        require_once APPPATH.'third_party/PHPExcel/IOFactory.php';
        $data['user_name'] =$name;
        $vendors = $this->vendor_model->vendor_list($data);
        $dir = '../uploads/diamond/excel/';
        foreach($vendors as $vendor){
        //  if($vendor->NM_COMPANY_NAME == 'pansuriya'){
            unset($columns); 
            $filecsv = strtolower(str_replace(" ",'-',$vendor->NM_COMPANY_NAME)).'.csv';
            $filexl = strtolower(str_replace(" ",'-',$vendor->NM_COMPANY_NAME)).'.xlsx';
            $filexls = strtolower(str_replace(" ",'-',$vendor->NM_COMPANY_NAME)).'.xls';
            if(file_exists($dir.$filecsv))
            {
                $file = strtolower(str_replace(" ",'-',$vendor->NM_COMPANY_NAME)).'.csv';
            }else if(file_exists($dir.$filexl)){
                $file = strtolower(str_replace(" ",'-',$vendor->NM_COMPANY_NAME)).'.xlsx';
            }else if(file_exists($dir.$filexls)){
                $file = strtolower(str_replace(" ",'-',$vendor->NM_COMPANY_NAME)).'.xls';
            }
            
            $vendor_id = $vendor->CD_USER_ID;
            
            if(file_exists($dir.$file) ){
                
                $file_path = $dir.''.$file;
            	$objPHPExcel = PHPExcel_IOFactory::load($file_path);
        	    
                $excel_array = $objPHPExcel->getActiveSheet()->toArray(null,true,true,false);
                
                for($i=0;$i<=16;$i++)
                {    //$i = 9;
                    foreach($excel_array[$i] as $value)
                    {
                        if($excel_array[$i][0] != '')
                        {
                            $col = strtolower($excel_array[$i][0]);
                            
                            if($col != '')
                            {
                                if($col == 'Stk Id #' or $col == 'report' or $col == 'ref no' or $col == 'sn' or $col == 'loction' or $col == 'clientref' or $col == 'sr.no' or $col == 'no' or $col == 'h&a' or $col == 'refno.' or $col == 'srn' or $col == 'stock#' or $col == 'country' or $col == 'image' or $col == 'stock id' or $col == 'lot id' or $col == 'stock #' or $col == 'stone no' or $col == 'certificate' or $col == 'sr no.' or $col == 'sr no' or $col == 'stock no.' or $col == 'lab' or $col == 'srno' or $col == 'sr.no' or $col == 'id' or $col == 'stone id' or $col == 'report no' or $col == 'sr.' or $col == 'sr' or $col == 'sizing' or $col == 'sr.no.' or $col == 'refno')
                                {
                                    $columns[] = $value;
                                }
                            }
                        }
                        else if($excel_array[$i][1] != '')
                        {
                            $col = strtolower($excel_array[$i][1]);
                            if($col != '')
                            {
                                if( $col == 'shape' or $col == 'stock id' or $col == 'ref no')
                                {
                                    $columns[] = $value;
                                }
                            }
                        }
                    }
                }
            	$count = 1;
            	
            	foreach ($excel_array as $ekey => $evalue) 
                {   
                    $count++;
                    $data=array();
            	    if($ekey>0)
            		{
            		    foreach ($columns as $ckey => $cvalue) 
                        {		
            			    if($cvalue)
            				{  
                                $cvalue = strtolower($cvalue);
                                if($cvalue == 'country')
                                {
                                    $data['country']  =  $evalue[$ckey];
                                }
                                else if($cvalue == 'report no' or $cvalue == 'lab' or $cvalue == 'report#' or $cvalue == 'report number' or $cvalue == 'laser no' or $cvalue == 'report_no' or $cvalue == 'reportno' or $cvalue == 'report #' or $cvalue == 'certificate' or $cvalue == 'certificate #' or $cvalue == 'cert_no' or $cvalue == 'cert.' or $cvalue == 'cert' or $cvalue == 'certi no' or $cvalue == 'report' or $cvalue == 'certificateno' or $cvalue == 'certificateid' or $cvalue == 'cert.no.' or $cvalue == 'certno.' or $cvalue == 'certno' or $cvalue == 'certi.no' or $cvalue == 'cert no' or $cvalue == 'certificate no')
                                {  
                                    if($evalue[$ckey] == 'GIA' || $evalue[$ckey] == 'IGI' || $evalue[$ckey] == 'HRD')
                                    {
                                        $data['lab'] = $evalue[$ckey];
                                    }
                                    else
                                    {
                                        $data['certificate'] = str_replace("$",'',$evalue[$ckey]);
                                    }
                                    
                                }
                                else if($cvalue == 'stone no' or $cvalue == 'lot-serial' or $cvalue == 'stockid' or $cvalue == 'stock#' or $cvalue == 'stock no' or $cvalue == 'stone_no' or $cvalue == 'lot id' or $cvalue == 'stock_id' or $cvalue == 'stock id' or $cvalue == 'stock #' or $cvalue == 'packetno' or $cvalue == 'packet no' or $cvalue == 'stock no.' or $cvalue == 'ref' or $cvalue == 'stock ' or $cvalue == 'lotno' or $cvalue == 'id' or $cvalue == 'stone id' or $cvalue == 'stkid' or $cvalue == ' stock # ' or $cvalue == 'refno.' or $cvalue == 'refnumber' or $cvalue == 'clientref' or $cvalue == 'refno')
                                {
                                    $data['stock_id']  =  $evalue[$ckey];
                                }
                                else if($cvalue == 'shape' or $cvalue == 'sh' or $cvalue == 'shp' or $cvalue == 'cutname')
                                {
                                    $data['shape']  =  $evalue[$ckey];
                                    
                                }
                                else if($cvalue == 'carat' or $cvalue == 'car' or $cvalue == 'wet' or $cvalue == 'weight' or $cvalue == 'cts.' or $cvalue == 'cts' or $cvalue == 'carats' or $cvalue == 'wt' or $cvalue == 'crtwt' or $cvalue == 'size')
                                {
                                    $data['weight']  =  $evalue[$ckey];
                                }
                                else if($cvalue == 'color' or $cvalue == 'colour' or $cvalue == 'col' or $cvalue == 'co' or $cvalue == 'colorcode')
                                {
                                    $data['color']  =  $evalue[$ckey];
                                }
                                else if($cvalue == 'clarity' or $cvalue == 'cal' or $cvalue == 'clr' or $cvalue == 'cla' or $cvalue == 'purity' or $cvalue == 'pu' or $cvalue == 'clar' or $cvalue == 'clarityname')
                                {
                                    $data['clarity']  =  $evalue[$ckey];
                                }
                                else if($cvalue == 'length' or $cvalue == 'len')
                                {
                                    $data['length']  =  $evalue[$ckey];
                                }
                                else if($cvalue == 'height' )
                                {
                                    $data['height']  =  $evalue[$ckey];
                                }
                                else if($cvalue == 'width' or $cvalue == 'wid')
                                {
                                    $data['width']  =  $evalue[$ckey];
                                }
                                else if($cvalue == 'depth' or $cvalue == 'pavilion depth' or $cvalue == 'td%' or $cvalue == 't.dep' or $cvalue == 'depth(%)' or $cvalue == 'td.' or $cvalue == 'depth %' or $cvalue == 'depth%' or $cvalue == 'depthper' or $cvalue == 'dp' or $cvalue == 'td' or $cvalue == 'tot depth %' or $cvalue == 'dep%' or $cvalue == 'dpt' or $cvalue == 'tot. depth' or $cvalue == 't.d.%')
                                {
                                    $data['depth']  =  $evalue[$ckey];
                                }
                                else if($cvalue == 'table' or $cvalue == 'table width' or $cvalue == 'table(%)' or $cvalue == 'ta.' or $cvalue == 'table%' or $cvalue == 'table %' or $cvalue == 'tableper' or $cvalue == 'tables' or $cvalue == 'tbl' or $cvalue == 'tb' or $cvalue == 'ta' or $cvalue == 'tble %' or $cvalue == 'tab' or $cvalue == 'tab%')
                                {
                                    $data['table']  =  $evalue[$ckey];
                                }
                                else if($cvalue == 'fluorescent' or $cvalue == 'flor.' or $cvalue == 'flouresence' or $cvalue == 'fluorence' or $cvalue == 'flour' or $cvalue == 'fluo int' or $cvalue == 'flo' or $cvalue == 'flu' or $cvalue == 'fluo' or $cvalue == 'fluor' or $cvalue == 'flourence' or $cvalue == 'flour.' or $cvalue == 'fluorescence intensity' or $cvalue == 'flur' or $cvalue == 'fluorecsence' or $cvalue == 'fl' or $cvalue == 'flrn' or $cvalue == 'fluorescence' or $cvalue == 'fls' or $cvalue == 'flor' or $cvalue == 'flname')
                                {
                                    $data['flour']  =  $evalue[$ckey];
                                }
                                else if($cvalue == 'cut' or $cvalue == 'cut grade' or $cvalue == 'ct')
                                {
                                    $data['cut']  =  $evalue[$ckey];
                                }
                                else if($cvalue == 'polish' or $cvalue == 'pol' or $cvalue == 'po' or $cvalue == 'polishname')
                                {
                                    $data['polish']  =  $evalue[$ckey];
                                }
                                else if($cvalue == 'symmetry' or $cvalue == 'symm' or $cvalue == 'sym' or $cvalue == 'sy' or $cvalue == 'symname')
                                {
                                    $data['symmetry']  =  $evalue[$ckey];
                                }
                                else if($cvalue == 'rap. price' or $cvalue == 'rap price' or $cvalue == 'rapnet price' or $cvalue == 'rap_rte' or $cvalue == 'rapprice' or $cvalue == 'raprate' or $cvalue == 'rap')
                                {
                                    $data['rapnet_price']  =  $evalue[$ckey];
                                }
                                else if($cvalue == 'disc%' or $cvalue == 'r.dn' or $cvalue == 'dis%' or $cvalue == 'cash  discount %' or $cvalue == 'disc(%)' or $cvalue == 'disc %'  or $cvalue == 'discount %' or $cvalue == 'discount%' or $cvalue == 'discount' or $cvalue == 'rapnet  discount %' or $cvalue == 'rap%' or $cvalue == 'back' or $cvalue == 'rap_dis' or $cvalue == 'disc' or $cvalue == 'dis' or $cvalue == 'final disc' or $cvalue == 'final disc%' or $cvalue == 'rap_discount' or $cvalue == 'rapdis')
                                {
                                    $data['discount']  =  $evalue[$ckey];
                                }
                                else if($cvalue == 'cash price' or $cvalue == 'final value' or $cvalue == 'price$' or $cvalue == 'total usd' or $cvalue == 'f amt' or $cvalue == 'netvalue' or $cvalue == 'final amt' or $cvalue == 'amt($)' or $cvalue == 'total us$' or $cvalue == 'amount us$' or  $cvalue == 'value' or $cvalue =='amount' or $cvalue =='net value' or $cvalue == 'totalprice' or $cvalue == 'finalprice' or $cvalue == 'price' or $cvalue == 'netd' or $cvalue == '$ value' or $cvalue == 'total price' or $cvalue == 'final amount' or $cvalue == 'total amt' or $cvalue == 'r vlu' or $cvalue == 'total')  
                                {
                                    $data['cash_price']  =  $evalue[$ckey];
                                }
                                else if($cvalue == 'image' or $cvalue == 'imagepath' or $cvalue == 'diamond image' or $cvalue =='imagelink' or $cvalue == 'diaimg' or $cvalue == 'dia image')
                                {
                                    if(strpos($evalue[$ckey],'://') == true)
                                    {
                                        $data['image']  =  $evalue[$ckey];
                                    }
                                }
                                else if($cvalue == 'video' or $cvalue == 'videopath' or $cvalue == 'diamond video' or $cvalue == 'videolink' or $cvalue == 'video link')
                                {
                                    $data['video']  =  $evalue[$ckey];
                                }
                                else if($cvalue == 'measurements' or $cvalue == 'diam.' or $cvalue == 'measurement' or $cvalue == 'diam' or $cvalue == 'meas' or $cvalue == 'measure')
                                {
                                    $data['measurements']  =  $evalue[$ckey];
                                }
                                else if($cvalue == 'ratio')
                                {
                                    $data['ratio']  =  $evalue[$ckey];
                                }
                                else if($cvalue == 'certificateurl' or $cvalue == 'certificatelink' or $cvalue == 'imagecerti' or $cvalue == 'certificate filename')
                                {
                                    $data['certificate_url']  =  $evalue[$ckey];
                                }
                                else if($cvalue == 'image - video - certificate')
                                {
                                    $data['certificate_url']  =  $evalue[$ckey];
                                    $data['image']  =  $evalue[$ckey];
                                    $data['video']  =  $evalue[$ckey];
                                }
                                
                            }
                            
                            
                                if(!isset($data['country'])){$data['country'] = '' ;}
                                
                                if(!isset($data['stock_id'])){
                                    if(isset($data['certificate']) && $data['certificate'] != ''){
                                        $data['stock_id'] = $data['certificate'] ;
                                    }
                                    else{$data['stock_id']='';}}
                               
                                if(!isset($data['weight'])){$data['weight'] = '' ;}
                                if(!isset($data['color'])){$data['color'] = '' ;}
                                if(!isset($data['clarity'])){$data['clarity'] = '' ;}
                                if(!isset($data['cut'])){$data['cut'] = '' ;}
                                if(!isset($data['polish'])){$data['polish'] = '' ;}
                                if(!isset($data['symmetry'])){$data['symmetry'] = '' ;}
                                if(!isset($data['flour'])){$data['flour'] = '' ;}
                                if(!isset($data['measurements'])){$data['measurements'] = '' ;}
                                if(!isset($data['ratio'])){$data['ratio'] = '' ;}
                                if(!isset($data['lab'])){$data['lab'] = '' ;}
                                if(!isset($data['cash_price'])){$data['cash_price'] = '' ;}
                                if(!isset($data['discount'])){$data['discount'] = '' ;}
                                if(!isset($data['depth'])){$data['depth'] = '' ;}
                                if(!isset($data['table'])){$data['table'] = '' ;}
                                if(!isset($data['image'])){$data['image'] = '' ;}
                                if(!isset($data['girdle'])){$data['girdle'] = '' ;}
                                if(!isset($data['culet'])){$data['culet'] = '' ;}
                                if(!isset($data['video'])){$data['video'] = '' ;}
                                if(!isset($data['length'])){$data['length'] = '' ;}
                                if(!isset($data['width'])){$data['width'] = '' ;}
                                if(!isset($data['height'])){$data['height'] = '' ;}
                                if(!isset($data['certificate'])){$data['certificate'] = '' ;}
                                if(!isset($data['certificate_url'])){$data['certificate_url'] = '' ;}
                                
                        }
                        //start dod code
                        echo "<pre>";print_r($data);
                        //print_r("a");exit;
                        if($data['lab'] != "")
                        {
                            if(isset($data['stock_id']) && $data['stock_id'] == ''){$data['stock_id'] = $data['certificate'];}
                            $data['cut'] = str_replace("+","",$data['cut']);
                            $data['polish'] = str_replace("+","",$data['polish']);
                            //if($data['cut'] ==  "EX" or $data['cut'] ==  "VG" or $data['cut'] ==  "GD" or $data['cut'] ==  "G" or $data['cut'] ==  "") //cut
                            if($data['cut'] != '') //cut
                            {
                                if($data['cut'] == 'G')
                                {
                                    $data['cut'] = 'GD';
                                }
                                if($data['polish'] == 'G')
                                {
                                    $data['polish'] = 'GD';
                                }
                                if($data['symmetry'] == 'G')
                                {
                                    $data['symmetry'] = 'GD';
                                }
                                $data['shape'] = strtolower($data['shape']);

                                if($data['shape'] != '')
                                {
                                    if($data['shape']=='round' or  $data['shape']=='br' or $data['shape']=='rd' or $data['shape'] == 'rbc')
                                    {
                                        $data['shape']='Round';
                                    }
                                    else if($data['shape']=='princess' or $data['shape'] == 'pri' or $data['shape'] == 'pr' or $data['shape'] == 'ps' or $data['shape'] == 'prn')
                                    {
                                        $data['shape']='Princess';
                                    }
                                    else if($data['shape']=='pear' or  $data['shape']=='pe' or $data['shape']=='pmb' or $data['shape'] == 'pb' or $data['shape'] == 'pb*' or $data['shape'] == 'pears')
                                    {
                                        $data['shape']='Pear';
                                    }
                                    else if($data['shape']=='oval' or $data['shape']=='ovel' or $data['shape'] == 'ov' or $data['shape'] == 'ob')
                                    {
                                        $data['shape']='Oval';
                                    }
                                    else if($data['shape']=='emerald' or $data['shape']=='sq.emerald' or $data['shape'] == 'emr' or $data['shape'] == 'em' or $data['shape'] == 'sq emerald')
                                    {
                                        $data['shape']='Emerald';
                                    }
                                    else if($data['shape']=='cushion' or $data['shape'] == 'cus' or $data['shape'] == 'crsc' or $data['shape'] == 'cushion ' or $data['shape'] == 'cushion brilliant' or $data['shape']=='cushion modified' or $data['shape']=='cs' or $data['shape'] == 'cmb' or $data['shape'] == 'cu' or $data['shape'] == 'cushion mod' or $data['shape'] == 'cm' or $data['shape'] == 'cb')
                                    {
                                        $data['shape']='Cushion';
                                    }
                                    else if($data['shape']=='radiant' or $data['shape']=='radi' or $data['shape']=='sq radi' or $data['shape']=='sq.radiant' or $data['shape'] == 'square radiant' or $data['shape'] == 'square radiant ' or $data['shape'] == 'rad')
                                    {
                                        $data['shape']='Radiant';
                                    }
                                    else if($data['shape']=='marquise' or $data['shape'] == 'mq' or $data['shape']=='mhb' or $data['shape'] == 'mb')
                                    {
                                        $data['shape']='Marquise';
                                    }
                                    else if($data['shape']=='tri')
                                    {
                                        $data['shape']='Triangle';
                                    }
                                    else if($data['shape']=='sq. emerald' or $data['shape'] == 'as')
                                    {
                                        $data['shape']='Asscher';
                                    }
                                if($vendor == 'kumar'){
                                    $color = preg_replace('/[^\p{L}\p{N}\s]/u', '', $data['color']);
                                    
                                }
                                else
                                {
                                $color7 = str_replace('(IBR)','',$data['color']);
                                $color1 = str_replace('(FBR)','',$color7);
                                $color2 = str_replace('(LBR)','',$color1);
                                $color3= str_replace('(MRB)','',$color2);
                                $color4 = str_replace('(BR1)','',$color3);
                                $color5 = str_replace('(BR2)','',$color4);
                                $color6 = str_replace('(MBR)','',$color5);
                                $color7 = str_replace('DMIX','',$color6);
                                $color8 = str_replace('EMIX','',$color7);
                                $color9 = str_replace('FMIX','',$color8);
                                $color10 = str_replace('GMIX','',$color9);
                                $color11 = str_replace('HMIX','',$color10);
                                $color12 = str_replace('IMIX','',$color11);
                                $color13 = str_replace('JMIX','',$color12);
                                $color14 = str_replace('KMIX','',$color13);
                                $color10 = str_replace('(FGR)','',$color14);
                                $color16 = str_replace('(MGR)','',$color10);
                                $color17 = str_replace('(BR3)','',$color16);
                                $color = str_replace('LMIX','',$color17);
                                }
                                
                                 
                                    if($color !='')
                                    {
                                        if (strpos($color, '+') == true) {
                                            $color = str_replace("+","",$color);
                                        }
                                        /*end color*/
                                        $clarity = preg_replace('/[^\p{L}\p{N}\s]/u', '', $data['clarity']);
                                        
                                        if($clarity != '')
                                        {
                                            if($data['flour'] != '') 
                                            {
                                                if($data['flour'] ==  "n" or $data['flour'] ==  "N" or $data['flour'] ==  "non" or $data['flour'] ==  "NON" or $data['flour'] ==  "None" or $data['flour'] ==  "N" or $data['flour'] ==  "n" or $data['flour'] ==  "NONE" )
                                                {
                                                    $data['flour']='None';
                                                }
                                                else if($data['flour'] ==  "M" or $data['flour'] ==  "M" or $data['flour'] ==  "Med" or $data['flour'] ==  "MED" or $data['flour'] ==  "MD-BL" or $data['flour'] ==  "MEDIUM")
                                                {
                                                    $data['flour']='Medium';
                                                }
                                                else if($data['flour'] ==  "STG" or $data['flour'] ==  "Stg" or $data['flour'] ==  "S"  or $data['flour'] ==  "ST-BL" or $data['flour'] ==  "strong" or $data['flour'] ==  "STRONG" )
                                                {
                                                    $data['flour']='Strong';
                                                }                                            
                                                else if($data['flour'] == "F" or $data['flour'] == "FNT" or $data['flour'] == 'f' or $data['flour'] == "faint" or $data['flour'] ==  "FAINT")
                                                {
                                                    $data['flour']='Faint';
                                                }     
                                                
                                                if($data['cut'] != '')
                                                {  
                                                    $dep=$data['depth'];
                                                    $depth=number_format((float)$dep, 2, '.', '');
                                                    $tab=$data['table'];
                                                    $table=number_format((float)$tab, 0, '.', '');                
                                                    //end all dod dod dod code
                                                    $data['depth'] = $depth;
                                                    $data['table'] = $table;
                                                    if($data['length'] != '')
                                                    {
                                                        $data['length'] = number_format((float)$data['length'], 2, '.', '');
                                                    }
                                                    if($data['width'] != '')
                                                    {
                                                        $data['width'] = number_format((float)$data['width'], 2, '.', '');
                                                    }
                                                    if($data['height'] != '')
                                                    {
                                                        $data['height'] = number_format((float)$data['height'], 2, '.', '');
                                                    }
                                                    if(isset($data['measurements']) && $data['measurements'] !='')
                                                    {
                                                        if (strpos($data['measurements'], '*') == true) {
                                                                $pieces = explode('*', $data['measurements']);//measurement
                                                            }
                                                            else if (strpos($data['measurements'], 'x') == true) {
                                                                $pieces = explode('x', $data['measurements']);//measurement
                                                            }
                                                            else if (strpos($data['measurements'], 'x ') == true) {
                                                                $pieces = explode('x ', $data['measurements']);//measurement
                                                            }
                                                            else if (strpos($data['measurements'], 'X') == true) {
                                                                $pieces = explode('X', $data['measurements']);//measurement
                                                            }
                                                            else if (strpos($data['measurements'], '-') == true) {
                                                                $pieces = explode('-', $data['measurements']);//measurement
                                                            }
                                                            
                                                            
                                                            $n=0;                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     
                                                            $l=1;
                                                            $m=2; 
                                                            if (strpos($pieces[0], '-') == true) {
                                                                
                                                                $pieces2 = explode('-', $pieces[0]);//measurement
                                                                $length=number_format((float)$pieces2[0], 2, '.', '');
                                                                $width=number_format((float)$pieces2[1], 2, '.', '');
                                                                $data['length'] = $length;
                                                                $data['width'] = $width;
                                                                $data['measurements'] = $length.'x'.$width;
                                                                if(isset($pieces[1])){
                                                                    $data['height'] = number_format((float)$pieces[1], 2, '.', '');
                                                                    $data['measurements'] = $length.'x'.$width.'x'.$pieces[1];
                                                                }
                                                            }
                                                            else if (strpos($pieces[1], '-') == true) {
                                                                
                                                                $pieces2 = explode('-', $pieces[1]);//measurement
                                                                $width=number_format((float)$pieces2[0], 2, '.', '');
                                                                $height=number_format((float)$pieces2[1], 2, '.', '');
                                                                $data['length'] = number_format((float)$pieces[0], 2, '.', '');
                                                                $data['width'] = $width;
                                                                $data['height'] = $height;
                                                                $data['measurements'] = $pieces[0].'x'.$width.'x'.$height;
                                                            }
                                                            else
                                                            {
                                                                
                                                                $part1 = $pieces[0];
                                                                $length=number_format((float)$part1, 2, '.', '');
                                                                $data['length'] = $length;
                                                                $part2 = $pieces[1];
                                                                $width=number_format((float)$part2, 2, '.', '');
                                                                $data['width'] = $width;
                                                                $data['measurements'] = $pieces[0].'x'.$pieces[1];
                                                                if(isset($pieces[2]))
                                                                {
                                                                    $part3 = $pieces[2];
                                                                    $height=number_format((float)$part3, 2, '.', '');
                                                                    //$data['measurements'] = $length.'x'.$width.'x'.$height;
                                                                    $data['height']= $height;
                                                                    $data['measurements'] = $pieces[0].'x'.$pieces[1].'x'.$pieces[2];
                                                                }
                                                            }
                                                    }
                                                    else if($data['length'] != '' && $data['width'] != '' && $data['measurements'] == '')
                                                    {
                                                        $length = $data['length'];
                                                        $width = $data['width'];
                                                        $ration = 0;
                                                        if($length != 0 and $width != 0)
                                                        {
                                                            if($length > $width)
                                                            {
                                                                $ratio=$length/$width;
                                                            }
                                                            else
                                                            {
                                                                $ratio=$width/$length;
                                                            }
                                                        }
                                                        $data['measurements'] = $data['length'].'x'.$data['width'];
                                                    }
                                                    else if($data['length'] != '' && $data['width'] != '' && $data['height'] != '' && $data['measurements'] == '') 
                                                    {
                                                        $data['measurements'] = $data['length'].'x'.$data['width'].'x'.$data['height'];
                                                    }
                                                    $data['color'] = $color;
                                                    $data['clarity'] = $clarity;
                                                
                                                    
                                                    
                                                    $user_id=$this->session->userdata('jw_admin_id');
                                                    $insert_data = array('stock_id' => $data['stock_id'],
                                                                        'shape' => $data['shape'],
                                                                        'weight' => $data['weight'],
                                                                        'grade' => $data['clarity'],
                                                                        'color' => $data['color'],
                                                                        'cut' => $data['cut'],
                                                                        'polish' => $data['polish'],
                                                                        'symmetry' => $data['symmetry'],
                                                                        'fluorescence_int' => $data['flour'],
                                                                        'measurements' => $data['measurements'],
                                                                        'm_length' => $data['length'],
                                                                        'm_width' => $data['width'],
                                                                        'm_depth' => $data['height'],
                                                                        'lab' => $data['lab'],
                                                                        'report_no' => $data['certificate'],
                                                                        'rapnet' => $data['rapnet_price'],
                                                                        'cash_price' => $data['cash_price'],
                                                                        'cash_price_discount' => $data['discount'],
                                                                        'depth' => $data['depth'],
                                                                        'table_d' => $data['table'],
                                                                        'girdle' => $data['girdle'],
                                                                        'culet' => $data['culet'],
                                                                        'country' => $data['country'],
                                                                        'diamond_image' => $data['image'],
                                                                        'diamond_video' => $data['video'],
                                                                        'created_by' =>$user_id,
                                                                        'created_at' => date('Y-m-d H:i:s'),
                                                                        'diamond_type' => 1,
                                                                        'vendor_id'=>$vendor_id
                                                    );
                                                    $check_data=$this->check_diamond($data['stock_id']); 
                                                    
                                                    if(empty($check_data)){
                                                        $insert_id[]=$this->admin_model->insertData('tbl_diamond',$insert_data);
                                                    }else{
                                                        $update_id[]=$this->admin_model->updateData('tbl_diamond',array('stock_id'=>$data['stock_id']),$insert_data);
                                                    }
                                                    
                                                    $check_stock_h = $this->db->query("SELECT report_no FROM tbl_recent_uploaded_stock WHERE report_no = ".$insert_data['report_no']." ");
                                                    $result_h = $check_stock_h->row();
                                                    if(empty($result_h)){
                                                        $update_h = array("updated_date"=>date('Y-m-d H:i:s'),
                                                        "report_no"=>$insert_data['report_no'],
                                                        "status" => 'Inserted'
                                                        );
                                                        $this->admin_model->insertData("tbl_recent_uploaded_stock",$update_h);
                                                    }else{
                                                        $update_h = array("updated_date"=>date('Y-m-d H:i:s'),
                                                        "report_no"=>$insert_data['report_no'],
                                                        "status" => 'Updated'
                                                        );
                                                        $this->admin_model->updateData("tbl_recent_uploaded_stock",array("report_no"=>$data['certificate']),$update_h);
                                                    }
                                                
                                                }        
                                            }
                                        }
                                    }
                                }
                            }
                        }}
                        //end dod code        
                    }
                }
                $total_insert=count($insert_id);
                $total_update=count($update_id);
                if($total_insert != '' || $total_update != ''){
                    
                print_r("inserted==".$total_insert);
                print_r("updated==".$total_update);
                
                
                //add history
                $total_record=$total_update+$total_insert;
				$log_data=array(					  	
					  	'total_record'=>$total_record,
					  	'total_update'=>$total_update,
					  	'total_insert'=>$total_insert,
					  	'file'=>$vendor->NM_COMPANY_NAME,
					  	'log_time'=>time(),
					  	'type'=>'diamond',
					  );
				$this->common_model->insertData('tbl_inventory_log',$log_data);	
                //
                //send mail start
                $this->load->config('email');
                $this->load->library('email');
                
                $from = 'jewelsofcanada.ca@gmail.com';
                $to = 'apurvadeals@gmail.com';
                //$to = 'kavaaarti008@gmail.com';
                $subject = 'Stock uploaded of '.$file;
                $message = 'Total '.$total_insert.' inserted diamonds and Total '.$total_update.' updated diamonds';
        
                $this->email->set_newline("\r\n");
                $this->email->from($from);
                $this->email->to($to);
                $this->email->subject($subject);
                $this->email->message($message);
        
                if ($this->email->send()) {
                    echo 'Your Email has successfully been sent.';
                } else {
                    show_error($this->email->print_debugger());
                }
                //send mail end
            }//end file exists
        }//end files foreach
    }
    //end code here
    //all inventory code start
    
	public function starrays_stock()
    {
        include base_url().'assets/simplexlsx-master/src/SimpleXLSX.php';
    	include_once("xlsxwriter.class.php");
        require_once APPPATH.'third_party/PHPExcel.php';
        require_once APPPATH.'third_party/PHPExcel/IOFactory.php';
        $data ='';
        //$vendors = $this->vendor_model->vendor_list($data);
        $dir = '../uploads/diamond/excel/';
            $vendor_id = 16;
            $file = 'starrays.csv';
            if(file_exists($dir.$file) ){
                
                $file_path = $dir.''.$file;
            	$objPHPExcel = PHPExcel_IOFactory::load($file_path);
        	
                $excel_array = $objPHPExcel->getActiveSheet()->toArray(null,true,true,false);
                //echo "<pre>";print_r($excel_array);
                for($i=0;$i<=16;$i++)
                {    //$i = 9;
                    foreach($excel_array[$i] as $value)
                    {
                        if($excel_array[$i][0] != '')
                        {
                            $col = strtolower($excel_array[$i][0]);
                            
                            if($col != '')
                            {
                                if($col == 'Stk Id #' or $col == 'report' or $col == 'ref no' or $col == 'sn' or $col == 'loction' or $col == 'clientref' or $col == 'sr.no' or $col == 'no' or $col == 'h&a' or $col == 'refno.' or $col == 'srn' or $col == 'stock#' or $col == 'country' or $col == 'image' or $col == 'stock id' or $col == 'lot id' or $col == 'stock #' or $col == 'stone no' or $col == 'certificate' or $col == 'sr no.' or $col == 'sr no' or $col == 'stock no.' or $col == 'lab' or $col == 'srno' or $col == 'sr.no' or $col == 'id' or $col == 'stone id' or $col == 'report no' or $col == 'sr.' or $col == 'sr' or $col == 'sizing' or $col == 'sr.no.' or $col == 'refno')
                                {
                                    $columns[] = $value;
                                }
                            }
                        }
                        else if($excel_array[$i][1] != '')
                        {
                            $col = strtolower($excel_array[$i][1]);
                            if($col != '')
                            {
                                if( $col == 'shape' or $col == 'stock id' or $col == 'ref no')
                                {
                                    $columns[] = $value;
                                }
                            }
                        }
                    }
                }
            	$count = 1;
            	
            	foreach ($excel_array as $ekey => $evalue) 
                {   
                    $count++;
                    $data=array();
            	    if($ekey>0)
            		{
            		    foreach ($columns as $ckey => $cvalue) 
                        {		
            			    if($cvalue)
            				{  
                                $cvalue = strtolower($cvalue);
                                if($cvalue == 'country')
                                {
                                    $data['country']  =  $evalue[$ckey];
                                }
                                else if($cvalue == 'report no' or $cvalue == 'lab' or $cvalue == 'report#' or $cvalue == 'report number' or $cvalue == 'laser no' or $cvalue == 'report_no' or $cvalue == 'reportno' or $cvalue == 'report #' or $cvalue == 'certificate' or $cvalue == 'certificate #' or $cvalue == 'cert_no' or $cvalue == 'cert.' or $cvalue == 'cert' or $cvalue == 'certi no' or $cvalue == 'report' or $cvalue == 'certificateno' or $cvalue == 'certificateid' or $cvalue == 'cert.no.' or $cvalue == 'certno.' or $cvalue == 'certno' or $cvalue == 'certi.no' or $cvalue == 'cert no' or $cvalue == 'certificate no')
                                {  
                                    if($evalue[$ckey] == 'GIA' || $evalue[$ckey] == 'IGI' || $evalue[$ckey] == 'HRD')
                                    {
                                        $data['lab'] = $evalue[$ckey];
                                    }
                                    else
                                    {
                                        $data['certificate'] = str_replace("$",'',$evalue[$ckey]);
                                    }
                                    
                                }
                                else if($cvalue == 'stone no' or $cvalue == 'lot-serial' or $cvalue == 'stockid' or $cvalue == 'stock#' or $cvalue == 'stock no' or $cvalue == 'stone_no' or $cvalue == 'lot id' or $cvalue == 'stock_id' or $cvalue == 'stock id' or $cvalue == 'stock #' or $cvalue == 'packetno' or $cvalue == 'packet no' or $cvalue == 'stock no.' or $cvalue == 'ref' or $cvalue == 'stock ' or $cvalue == 'lotno' or $cvalue == 'id' or $cvalue == 'stone id' or $cvalue == 'stkid' or $cvalue == ' stock # ' or $cvalue == 'refno.' or $cvalue == 'refnumber' or $cvalue == 'clientref' or $cvalue == 'refno')
                                {
                                    $data['stock_id']  =  $evalue[$ckey];
                                }
                                else if($cvalue == 'shape' or $cvalue == 'sh' or $cvalue == 'shp' or $cvalue == 'cutname')
                                {
                                    $data['shape']  =  $evalue[$ckey];
                                    
                                }
                                else if($cvalue == 'carat' or $cvalue == 'car' or $cvalue == 'wet' or $cvalue == 'weight' or $cvalue == 'cts.' or $cvalue == 'cts' or $cvalue == 'carats' or $cvalue == 'wt' or $cvalue == 'crtwt' or $cvalue == 'size')
                                {
                                    $data['weight']  =  $evalue[$ckey];
                                }
                                else if($cvalue == 'color' or $cvalue == 'colour' or $cvalue == 'col' or $cvalue == 'co' or $cvalue == 'colorcode')
                                {
                                    $data['color']  =  $evalue[$ckey];
                                }
                                else if($cvalue == 'clarity' or $cvalue == 'cal' or $cvalue == 'clr' or $cvalue == 'cla' or $cvalue == 'purity' or $cvalue == 'pu' or $cvalue == 'clar' or $cvalue == 'clarityname')
                                {
                                    $data['clarity']  =  $evalue[$ckey];
                                }
                                else if($cvalue == 'length' or $cvalue == 'len')
                                {
                                    $data['length']  =  $evalue[$ckey];
                                }
                                else if($cvalue == 'height' )
                                {
                                    $data['height']  =  $evalue[$ckey];
                                }
                                else if($cvalue == 'width' or $cvalue == 'wid')
                                {
                                    $data['width']  =  $evalue[$ckey];
                                }
                                else if($cvalue == 'depth' or $cvalue == 'pavilion depth' or $cvalue == 'td%' or $cvalue == 't.dep' or $cvalue == 'depth(%)' or $cvalue == 'td.' or $cvalue == 'depth %' or $cvalue == 'depth%' or $cvalue == 'depthper' or $cvalue == 'dp' or $cvalue == 'td' or $cvalue == 'tot depth %' or $cvalue == 'dep%' or $cvalue == 'dpt' or $cvalue == 'tot. depth' or $cvalue == 't.d.%')
                                {
                                    $data['depth']  =  $evalue[$ckey];
                                }
                                else if($cvalue == 'table' or $cvalue == 'table width' or $cvalue == 'table(%)' or $cvalue == 'ta.' or $cvalue == 'table%' or $cvalue == 'table %' or $cvalue == 'tableper' or $cvalue == 'tables' or $cvalue == 'tbl' or $cvalue == 'tb' or $cvalue == 'ta' or $cvalue == 'tble %' or $cvalue == 'tab' or $cvalue == 'tab%')
                                {
                                    $data['table']  =  $evalue[$ckey];
                                }
                                else if($cvalue == 'fluorescent' or $cvalue == 'flor.' or $cvalue == 'flouresence' or $cvalue == 'fluorence' or $cvalue == 'flour' or $cvalue == 'fluo int' or $cvalue == 'flo' or $cvalue == 'flu' or $cvalue == 'fluo' or $cvalue == 'fluor' or $cvalue == 'flourence' or $cvalue == 'flour.' or $cvalue == 'fluorescence intensity' or $cvalue == 'flur' or $cvalue == 'fluorecsence' or $cvalue == 'fl' or $cvalue == 'flrn' or $cvalue == 'fluorescence' or $cvalue == 'fls' or $cvalue == 'flor' or $cvalue == 'flname')
                                {
                                    $data['flour']  =  $evalue[$ckey];
                                }
                                else if($cvalue == 'cut' or $cvalue == 'cut grade' or $cvalue == 'ct')
                                {
                                    $data['cut']  =  $evalue[$ckey];
                                }
                                else if($cvalue == 'polish' or $cvalue == 'pol' or $cvalue == 'po' or $cvalue == 'polishname')
                                {
                                    $data['polish']  =  $evalue[$ckey];
                                }
                                else if($cvalue == 'symmetry' or $cvalue == 'symm' or $cvalue == 'sym' or $cvalue == 'sy' or $cvalue == 'symname')
                                {
                                    $data['symmetry']  =  $evalue[$ckey];
                                }
                                else if($cvalue == 'rap. price' or $cvalue == 'rap price' or $cvalue == 'rapnet price' or $cvalue == 'rap_rte' or $cvalue == 'rapprice' or $cvalue == 'raprate' or $cvalue == 'rap')
                                {
                                    $data['rapnet_price']  =  $evalue[$ckey];
                                }
                                else if($cvalue == 'disc%' or $cvalue == 'r.dn' or $cvalue == 'dis%' or $cvalue == 'cash  discount %' or $cvalue == 'disc(%)' or $cvalue == 'disc %'  or $cvalue == 'discount %' or $cvalue == 'discount%' or $cvalue == 'discount' or $cvalue == 'rapnet  discount %' or $cvalue == 'rap%' or $cvalue == 'back' or $cvalue == 'rap_dis' or $cvalue == 'disc' or $cvalue == 'dis' or $cvalue == 'final disc' or $cvalue == 'final disc%' or $cvalue == 'rap_discount' or $cvalue == 'rapdis')
                                {
                                    $data['discount']  =  $evalue[$ckey];
                                }
                                else if($cvalue == 'cash price' or $cvalue == 'final value' or $cvalue == 'price$' or $cvalue == 'total usd' or $cvalue == 'f amt' or $cvalue == 'netvalue' or $cvalue == 'final amt' or $cvalue == 'amt($)' or $cvalue == 'total us$' or $cvalue == 'amount us$' or  $cvalue == 'value' or $cvalue =='amount' or $cvalue =='net value' or $cvalue == 'totalprice' or $cvalue == 'finalprice' or $cvalue == 'price' or $cvalue == 'netd' or $cvalue == '$ value' or $cvalue == 'total price' or $cvalue == 'final amount' or $cvalue == 'total amt' or $cvalue == 'r vlu' or $cvalue == 'total')  
                                {
                                    $data['cash_price']  =  $evalue[$ckey];
                                }
                                else if($cvalue == 'image' or $cvalue == 'imagepath' or $cvalue == 'diamond image' or $cvalue =='imagelink' or $cvalue == 'diaimg' or $cvalue == 'dia image')
                                {
                                    if(strpos($evalue[$ckey],'://') == true)
                                    {
                                        $data['image']  =  $evalue[$ckey];
                                    }
                                }
                                else if($cvalue == 'video' or $cvalue == 'videopath' or $cvalue == 'diamond video' or $cvalue == 'videolink' or $cvalue == 'video link')
                                {
                                    $data['video']  =  $evalue[$ckey];
                                }
                                else if($cvalue == 'measurements' or $cvalue == 'diam.' or $cvalue == 'measurement' or $cvalue == 'diam' or $cvalue == 'meas' or $cvalue == 'measure')
                                {
                                    $data['measurements']  =  $evalue[$ckey];
                                }
                                else if($cvalue == 'ratio')
                                {
                                    $data['ratio']  =  $evalue[$ckey];
                                }
                                else if($cvalue == 'certificateurl' or $cvalue == 'certificatelink' or $cvalue == 'imagecerti' or $cvalue == 'certificate filename')
                                {
                                    $data['certificate_url']  =  $evalue[$ckey];
                                }
                                else if($cvalue == 'image - video - certificate')
                                {
                                    $data['certificate_url']  =  $evalue[$ckey];
                                    $data['image']  =  $evalue[$ckey];
                                    $data['video']  =  $evalue[$ckey];
                                }
                                
                            }
                            
                            
                                if(!isset($data['country'])){$data['country'] = '' ;}
                                
                                if(!isset($data['stock_id'])){
                                    if(isset($data['certificate']) && $data['certificate'] != ''){
                                        $data['stock_id'] = $data['certificate'] ;
                                    }
                                    else{$data['stock_id']='';}}
                               
                                if(!isset($data['weight'])){$data['weight'] = '' ;}
                                if(!isset($data['color'])){$data['color'] = '' ;}
                                if(!isset($data['clarity'])){$data['clarity'] = '' ;}
                                if(!isset($data['cut'])){$data['cut'] = '' ;}
                                if(!isset($data['polish'])){$data['polish'] = '' ;}
                                if(!isset($data['symmetry'])){$data['symmetry'] = '' ;}
                                if(!isset($data['flour'])){$data['flour'] = '' ;}
                                if(!isset($data['measurements'])){$data['measurements'] = '' ;}
                                if(!isset($data['ratio'])){$data['ratio'] = '' ;}
                                if(!isset($data['lab'])){$data['lab'] = '' ;}
                                if(!isset($data['cash_price'])){$data['cash_price'] = '' ;}
                                if(!isset($data['discount'])){$data['discount'] = '' ;}
                                if(!isset($data['depth'])){$data['depth'] = '' ;}
                                if(!isset($data['table'])){$data['table'] = '' ;}
                                if(!isset($data['image'])){$data['image'] = '' ;}
                                if(!isset($data['girdle'])){$data['girdle'] = '' ;}
                                if(!isset($data['culet'])){$data['culet'] = '' ;}
                                if(!isset($data['video'])){$data['video'] = '' ;}
                                if(!isset($data['length'])){$data['length'] = '' ;}
                                if(!isset($data['width'])){$data['width'] = '' ;}
                                if(!isset($data['height'])){$data['height'] = '' ;}
                                if(!isset($data['certificate'])){$data['certificate'] = '' ;}
                                if(!isset($data['certificate_url'])){$data['certificate_url'] = '' ;}
                                
                        }
                        //start dod code
                        
                        if($data['lab'] != "")
                        {
                            if(isset($data['stock_id']) && $data['stock_id'] == ''){$data['stock_id'] = $data['certificate'];}
                            $data['cut'] = str_replace("+","",$data['cut']);
                            $data['polish'] = str_replace("+","",$data['polish']);
                            //if($data['cut'] ==  "EX" or $data['cut'] ==  "VG" or $data['cut'] ==  "GD" or $data['cut'] ==  "G" or $data['cut'] ==  "") //cut
                            if($data['cut'] != '') //cut
                            {
                                if($data['cut'] == 'G')
                                {
                                    $data['cut'] = 'GD';
                                }
                                if($data['polish'] == 'G')
                                {
                                    $data['polish'] = 'GD';
                                }
                                if($data['symmetry'] == 'G')
                                {
                                    $data['symmetry'] = 'GD';
                                }
                                $data['shape'] = strtolower($data['shape']);

                                if($data['shape'] != '')
                                {
                                    if($data['shape']=='round' or  $data['shape']=='br' or $data['shape']=='rd' or $data['shape'] == 'rbc')
                                    {
                                        $data['shape']='Round';
                                    }
                                    else if($data['shape']=='princess' or $data['shape'] == 'pri' or $data['shape'] == 'pr' or $data['shape'] == 'ps' or $data['shape'] == 'prn')
                                    {
                                        $data['shape']='Princess';
                                    }
                                    else if($data['shape']=='pear' or  $data['shape']=='pe' or $data['shape']=='pmb' or $data['shape'] == 'pb' or $data['shape'] == 'pb*' or $data['shape'] == 'pears')
                                    {
                                        $data['shape']='Pear';
                                    }
                                    else if($data['shape']=='oval' or $data['shape']=='ovel' or $data['shape'] == 'ov' or $data['shape'] == 'ob')
                                    {
                                        $data['shape']='Oval';
                                    }
                                    else if($data['shape']=='emerald' or $data['shape']=='sq.emerald' or $data['shape'] == 'emr' or $data['shape'] == 'em' or $data['shape'] == 'sq emerald')
                                    {
                                        $data['shape']='Emerald';
                                    }
                                    else if($data['shape']=='cushion' or $data['shape'] == 'cus' or $data['shape'] == 'crsc' or $data['shape'] == 'cushion ' or $data['shape'] == 'cushion brilliant' or $data['shape']=='cushion modified' or $data['shape']=='cs' or $data['shape'] == 'cmb' or $data['shape'] == 'cu' or $data['shape'] == 'cushion mod' or $data['shape'] == 'cm' or $data['shape'] == 'cb')
                                    {
                                        $data['shape']='Cushion';
                                    }
                                    else if($data['shape']=='radiant' or $data['shape']=='radi' or $data['shape']=='sq radi' or $data['shape']=='sq.radiant' or $data['shape'] == 'square radiant' or $data['shape'] == 'square radiant ' or $data['shape'] == 'rad')
                                    {
                                        $data['shape']='Radiant';
                                    }
                                    else if($data['shape']=='marquise' or $data['shape'] == 'mq' or $data['shape']=='mhb' or $data['shape'] == 'mb')
                                    {
                                        $data['shape']='Marquise';
                                    }
                                    else if($data['shape']=='tri')
                                    {
                                        $data['shape']='Triangle';
                                    }
                                    else if($data['shape']=='sq. emerald' or $data['shape'] == 'as')
                                    {
                                        $data['shape']='Asscher';
                                    }
                                if($vendor == 'kumar'){
                                    $color = preg_replace('/[^\p{L}\p{N}\s]/u', '', $data['color']);
                                    
                                }
                                else
                                {
                                $color7 = str_replace('(IBR)','',$data['color']);
                                $color1 = str_replace('(FBR)','',$color7);
                                $color2 = str_replace('(LBR)','',$color1);
                                $color3= str_replace('(MRB)','',$color2);
                                $color4 = str_replace('(BR1)','',$color3);
                                $color5 = str_replace('(BR2)','',$color4);
                                $color6 = str_replace('(MBR)','',$color5);
                                $color7 = str_replace('DMIX','',$color6);
                                $color8 = str_replace('EMIX','',$color7);
                                $color9 = str_replace('FMIX','',$color8);
                                $color10 = str_replace('GMIX','',$color9);
                                $color11 = str_replace('HMIX','',$color10);
                                $color12 = str_replace('IMIX','',$color11);
                                $color13 = str_replace('JMIX','',$color12);
                                $color14 = str_replace('KMIX','',$color13);
                                $color10 = str_replace('(FGR)','',$color14);
                                $color16 = str_replace('(MGR)','',$color10);
                                $color17 = str_replace('(BR3)','',$color16);
                                $color = str_replace('LMIX','',$color17);
                                }
                                
                                 
                                    if($color !='')
                                    {
                                        if (strpos($color, '+') == true) {
                                            $color = str_replace("+","",$color);
                                        }
                                        /*end color*/
                                        $clarity = preg_replace('/[^\p{L}\p{N}\s]/u', '', $data['clarity']);
                                        
                                        if($clarity != '')
                                        {
                                            if($data['flour'] != '') 
                                            {
                                                if($data['flour'] ==  "n" or $data['flour'] ==  "N" or $data['flour'] ==  "non" or $data['flour'] ==  "NON" or $data['flour'] ==  "None" or $data['flour'] ==  "N" or $data['flour'] ==  "n" or $data['flour'] ==  "NONE" )
                                                {
                                                    $data['flour']='None';
                                                }
                                                else if($data['flour'] ==  "M" or $data['flour'] ==  "M" or $data['flour'] ==  "Med" or $data['flour'] ==  "MED" or $data['flour'] ==  "MD-BL" or $data['flour'] ==  "MEDIUM")
                                                {
                                                    $data['flour']='Medium';
                                                }
                                                else if($data['flour'] ==  "STG" or $data['flour'] ==  "Stg" or $data['flour'] ==  "S"  or $data['flour'] ==  "ST-BL" or $data['flour'] ==  "strong" or $data['flour'] ==  "STRONG" )
                                                {
                                                    $data['flour']='Strong';
                                                }                                            
                                                else if($data['flour'] == "F" or $data['flour'] == "FNT" or $data['flour'] == 'f' or $data['flour'] == "faint" or $data['flour'] ==  "FAINT")
                                                {
                                                    $data['flour']='Faint';
                                                }     
                                                
                                                if($data['cut'] != '')
                                                {  
                                                    $dep=$data['depth'];
                                                    $depth=number_format((float)$dep, 2, '.', '');
                                                    $tab=$data['table'];
                                                    $table=number_format((float)$tab, 0, '.', '');                
                                                    //end all dod dod dod code
                                                    $data['depth'] = $depth;
                                                    $data['table'] = $table;
                                                    if($data['length'] != '')
                                                    {
                                                        $data['length'] = number_format((float)$data['length'], 2, '.', '');
                                                    }
                                                    if($data['width'] != '')
                                                    {
                                                        $data['width'] = number_format((float)$data['width'], 2, '.', '');
                                                    }
                                                    if($data['height'] != '')
                                                    {
                                                        $data['height'] = number_format((float)$data['height'], 2, '.', '');
                                                    }
                                                    if(isset($data['measurements']) && $data['measurements'] !='')
                                                    {
                                                        if (strpos($data['measurements'], '*') == true) {
                                                                $pieces = explode('*', $data['measurements']);//measurement
                                                            }
                                                            else if (strpos($data['measurements'], 'x') == true) {
                                                                $pieces = explode('x', $data['measurements']);//measurement
                                                            }
                                                            else if (strpos($data['measurements'], 'x ') == true) {
                                                                $pieces = explode('x ', $data['measurements']);//measurement
                                                            }
                                                            else if (strpos($data['measurements'], 'X') == true) {
                                                                $pieces = explode('X', $data['measurements']);//measurement
                                                            }
                                                            else if (strpos($data['measurements'], '-') == true) {
                                                                $pieces = explode('-', $data['measurements']);//measurement
                                                            }
                                                            
                                                            
                                                            $n=0;                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     
                                                            $l=1;
                                                            $m=2; 
                                                            if (strpos($pieces[0], '-') == true) {
                                                                
                                                                $pieces2 = explode('-', $pieces[0]);//measurement
                                                                $length=number_format((float)$pieces2[0], 2, '.', '');
                                                                $width=number_format((float)$pieces2[1], 2, '.', '');
                                                                $data['length'] = $length;
                                                                $data['width'] = $width;
                                                                $data['measurements'] = $length.'x'.$width;
                                                                if(isset($pieces[1])){
                                                                    $data['height'] = number_format((float)$pieces[1], 2, '.', '');
                                                                    $data['measurements'] = $length.'x'.$width.'x'.$pieces[1];
                                                                }
                                                            }
                                                            else if (strpos($pieces[1], '-') == true) {
                                                                
                                                                $pieces2 = explode('-', $pieces[1]);//measurement
                                                                $width=number_format((float)$pieces2[0], 2, '.', '');
                                                                $height=number_format((float)$pieces2[1], 2, '.', '');
                                                                $data['length'] = number_format((float)$pieces[0], 2, '.', '');
                                                                $data['width'] = $width;
                                                                $data['height'] = $height;
                                                                $data['measurements'] = $pieces[0].'x'.$width.'x'.$height;
                                                            }
                                                            else
                                                            {
                                                                
                                                                $part1 = $pieces[0];
                                                                $length=number_format((float)$part1, 2, '.', '');
                                                                $data['length'] = $length;
                                                                $part2 = $pieces[1];
                                                                $width=number_format((float)$part2, 2, '.', '');
                                                                $data['width'] = $width;
                                                                $data['measurements'] = $pieces[0].'x'.$pieces[1];
                                                                if(isset($pieces[2]))
                                                                {
                                                                    $part3 = $pieces[2];
                                                                    $height=number_format((float)$part3, 2, '.', '');
                                                                    //$data['measurements'] = $length.'x'.$width.'x'.$height;
                                                                    $data['height']= $height;
                                                                    $data['measurements'] = $pieces[0].'x'.$pieces[1].'x'.$pieces[2];
                                                                }
                                                            }
                                                    }
                                                    else if($data['length'] != '' && $data['width'] != '' && $data['measurements'] == '')
                                                    {
                                                        $length = $data['length'];
                                                        $width = $data['width'];
                                                        $ration = 0;
                                                        if($length != 0 and $width != 0)
                                                        {
                                                            if($length > $width)
                                                            {
                                                                $ratio=$length/$width;
                                                            }
                                                            else
                                                            {
                                                                $ratio=$width/$length;
                                                            }
                                                        }
                                                        $data['measurements'] = $data['length'].'x'.$data['width'];
                                                    }
                                                    else if($data['length'] != '' && $data['width'] != '' && $data['height'] != '' && $data['measurements'] == '') 
                                                    {
                                                        $data['measurements'] = $data['length'].'x'.$data['width'].'x'.$data['height'];
                                                    }
                                                    $data['color'] = $color;
                                                    $data['clarity'] = $clarity;
                                                
                                                    
                                                    
                                                    $user_id=$this->session->userdata('jw_admin_id');
                                                    $insert_data = array('stock_id' => $data['stock_id'],
                                                                        'shape' => $data['shape'],
                                                                        'weight' => $data['weight'],
                                                                        'grade' => $data['clarity'],
                                                                        'color' => $data['color'],
                                                                        'cut' => $data['cut'],
                                                                        'polish' => $data['polish'],
                                                                        'symmetry' => $data['symmetry'],
                                                                        'fluorescence_int' => $data['flour'],
                                                                        'measurements' => $data['measurements'],
                                                                        'm_length' => $data['length'],
                                                                        'm_width' => $data['width'],
                                                                        'm_depth' => $data['height'],
                                                                        'lab' => $data['lab'],
                                                                        'report_no' => $data['certificate'],
                                                                        'rapnet' => $data['rapnet_price'],
                                                                        'cash_price' => $data['cash_price'],
                                                                        'cash_price_discount' => $data['discount'],
                                                                        'depth' => $data['depth'],
                                                                        'table_d' => $data['table'],
                                                                        'girdle' => $data['girdle'],
                                                                        'culet' => $data['culet'],
                                                                        'country' => $data['country'],
                                                                        'diamond_image' => $data['image'],
                                                                        'diamond_video' => $data['video'],
                                                                        'created_by' =>$user_id,
                                                                        'created_at' => date('Y-m-d H:i:s'),
                                                                        'diamond_type' => 1,
                                                                        'vendor_id'=>$vendor_id
                                                    );
                                                    $check_data=$this->check_diamond($data['stock_id']); 
                                                    
                                                    if(empty($check_data)){
                                                        $insert_id[]=$this->admin_model->insertData('tbl_diamond',$insert_data);
                                                    }else{
                                                        $update_id[]=$this->admin_model->updateData('tbl_diamond',array('stock_id'=>$data['stock_id']),$insert_data);
                                                    }
                                                    
                                                    $check_stock_h = $this->db->query("SELECT report_no FROM tbl_recent_uploaded_stock WHERE report_no = ".$insert_data['report_no']." ");
                                                    $result_h = $check_stock_h->row();
                                                    if(empty($result_h)){
                                                        $update_h = array("updated_date"=>date('Y-m-d H:i:s'),
                                                        "report_no"=>$insert_data['report_no'],
                                                        "status" => 'Inserted'
                                                        );
                                                        $this->admin_model->insertData("tbl_recent_uploaded_stock",$update_h);
                                                    }else{
                                                        $update_h = array("updated_date"=>date('Y-m-d H:i:s'),
                                                        "report_no"=>$insert_data['report_no'],
                                                        "status" => 'Updated'
                                                        );
                                                        $this->admin_model->updateData("tbl_recent_uploaded_stock",array("report_no"=>$data['certificate']),$update_h);
                                                    }
                                                
                                                }        
                                            }
                                        }
                                    }
                                }
                            }
                        }}
                        //end dod code        
                    }
                }
                $total_insert=count($insert_id);
                $total_update=count($update_id);
                if($total_insert != '' || $total_update != ''){
                    
                print_r("inserted==".$total_insert);
                print_r("updated==".$total_update);
                
                
                //add history
                $total_record=$total_update+$total_insert;
				$log_data=array(					  	
					  	'total_record'=>$total_record,
					  	'total_update'=>$total_update,
					  	'total_insert'=>$total_insert,
					  	'file'=>$vendor->NM_COMPANY_NAME,
					  	'log_time'=>time(),
					  	'type'=>'diamond',
					  );
				$this->common_model->insertData('tbl_inventory_log',$log_data);	
                //
                //send mail start
                $this->load->config('email');
                $this->load->library('email');
                
                $from = 'jewelsofcanada.ca@gmail.com';
                $to = 'apurvadeals@gmail.com';
                //$to = 'kavaaarti008@gmail.com';
                $subject = 'Stock uploaded of '.$file;
                $message = 'Total '.$total_insert.' inserted diamonds and Total '.$total_update.' updated diamonds';
        
                $this->email->set_newline("\r\n");
                $this->email->from($from);
                $this->email->to($to);
                $this->email->subject($subject);
                $this->email->message($message);
        
                if ($this->email->send()) {
                    echo 'Your Email has successfully been sent.';
                } else {
                    show_error($this->email->print_debugger());
                }
                //send mail end
            }//end file exists
    }
    //end starrays

  function diamond_action()
   {
         $diamond_id=$this->input->post('diamond_id');
         $action=$this->input->post('action'); 
         $message='';

        if($action=='active')

        {

            $data=array('diamond_status'=>'active');
            foreach($diamond_id as $diamond)

            {
                $where=array('diamond_id'=>$diamond);

                $this->admin_model->updateData('tbl_diamond',$data,$where);

               // echo $this->db->last_query(); die;
            }

            $message='Status Has Been Updated!';

        }

        if($action=='inactive')

        {

            $data=array('diamond_status'=>'inactive');

            foreach($diamond_id as $diamond)
        {

                $where=array('diamond_id'=>$diamond);

                $this->admin_model->updateData('tbl_diamond',$data,$where);

             // echo $this->db->last_query(); die;

            }

            $message='Status Has Been Updated!';

        }
        echo json_encode(array('message'=>$message));

    }
}