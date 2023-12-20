<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_jbapi_diamond extends CI_Controller {

	public function __construct()
  {
      parent::__construct();
      $this->load->model('diamond_model');
	  $this->load->model('vendor_model');
	  $this->load->model('admin_model');
	  $this->load->model('common_model');
      $this->load->library('excel');
      $this->load->library('pagination');      
      $this->load->library('upload');     
  }
	
  function download_excel()
  {
	    $this->load->helper('download');
		$file = "http://websvr.jbbros.com/jbapi.aspx?UserId=ROHANDESAI&APIKey=339861E1-1A4C-437E-8A91-15094E907A5D&Action=F&Shape=CUMBR,EM,FS,HRT,MQ,OV,PS,PR,RT,RD,SQEM,SQRT,TR,SQBR,RECBR,TA,ST,CUBR,CU&CaratFrom=0.01&CaratTo=99.99&Color=D,E,F,G,H,I,J,K,L,M,N,O,P&Purity=FL,IF,VVS1,VVS2,VS1,VS2,SI1,SI2,SI3,I1,I2,I3,I4&Lab=GIA,IGI,AGS,EGL
";
		$name = $file;
		$data = file_get_contents('./uploads/foldername/'.$file); 
		force_download($name, $data); 
		redirect('index','refresh');
  }
  function jsonToCSV($data, $cfilename)
    {
        // if (($json = file_get_contents($jfilename)) == false)
        //     die('Error reading json file...');
         $data = json_decode($data, true);
        $fp = fopen($cfilename, 'w');
        $header = false;
        foreach ($data as $row)
        {
            if (empty($header))
            {
                $header = array_keys($row);
                fputcsv($fp, $header);
                $header = array_flip($header);
            }
            fputcsv($fp, array_merge($header, $row));
        }
        fclose($fp);
        return;
    }
  function upload_diamond_submit() 
  {	
  
  
  //  Calling cURL Library
$this->load->library('curl');


$total_record=0;
$total_update=0;
$total_insert=0; 
	

//for($i = 1; $i <= 200; $i++){
	
//  Setting URL To Fetch Data From
//$this->curl->create('http://websvr.jbbros.com/jbapi.aspx?UserId=ROHANDESAI&APIKey=339861E1-1A4C-437E-8A91-15094E907A5D&Action=S&Shape=CUMBR,EM,FS,HRT,MQ,OV,PS,PR,RT,RD,SQEM,SQRT,TR,SQBR,RECBR,TA,ST,CUBR,CU&CaratFrom=0.01&CaratTo=99.99&Color=D,E,F,G,H,I,J,K,L,M,N,O,P&Purity=FL,IF,VVS1,VVS2,VS1,VS2,SI1,SI2,SI3,I1,I2,I3,I4&Lab=GIA&PG='.$i.'');

$this->curl->create('http://websvr.jbbros.com/jbapi.aspx?UserId=ROHANDESAI&APIKey=339861E1-1A4C-437E-8A91-15094E907A5D&Action=FJ');

//  To Temporarily Store Data Received From Server
$this->curl->option('buffersize', 10);

//  To support Different Browsers
$this->curl->option('useragent', 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.2.8) Gecko/20100722 Firefox/3.6.8 (.NET CLR 3.5.30729)');

//  To Receive Data Returned From Server
$this->curl->option('returntransfer', 1);

//  To follow The URL Provided For Website
$this->curl->option('followlocation', 1);

//  To Retrieve Server Related Data
$this->curl->option('HEADER', false);

//  To Set Time For Process Timeout
$this->curl->option('connecttimeout', 600);

//  To Execute 'option' Array Into cURL Library & Store Returned Data Into $data
$data = $this->curl->execute();

$this->jsonToCSV($data,'../uploads/diamond/excel/jbb.csv');
// file_put_contents('../uploads/diamond/excel/jbb.csv', file_get_contents("http://websvr.jbbros.com/jbapi.aspx?UserId=ROHANDESAI&APIKey=339861E1-1A4C-437E-8A91-15094E907A5D&Action=FJ"));
//  To Display Returned Data
//echo $data;
//echo $i;

//echo $result; 



$record = json_decode($data);
//print_ex($record); 
// if(!count($record))
// {
// 	break;
// }
//echo count($record); die;


foreach($record as $rec)
{	
	$check_data=$this->check_diamond($rec->RefNo); 
	if(empty($check_data))
	{
		//print_pre($check_data);

      $newprice = $rec->Price*$rec->Carat;

      	$image = $rec->StoneImageLink;
      	$video = $rec->Stone360Link;

      	if($rec->StoneImageLink != ""){
      		$imageurl = "http://i.stonehdfile.com/StoneDetail/StoneImages/".$rec->RefNo.".JPG";
      	}else{
      		$imageurl = "";
      	}

	   if($rec->Stone360Link != ""){
	 	 	$videourl = "https://dna.stonehdfile.com/Vision360.html?d=".$rec->RefNo."&sv=0,1,2,3,4&btn=0,1,2,3,4,5";
		}else{

			$videourl = "";
		}

      //$imageurl = "http://i.stonehdfile.com/StoneDetail/StoneImages/919722740.JPG";
      //$videourl = "https://dna.stonehdfile.com/Vision360.html?d=".$rec->RefNo."&sv=0,1,2,3,4&btn=0,1,2,3,4,5";
			
			$measurements = $rec->DimMinAndWidth.' x '.$rec->DimMaxAndWidth.' x '.$rec->TotalDept_mm;				
				$data=array(					  	
					  	'stock_id'=>$rec->RefNo,
					  	'vendor_id'=>13,
						'shape'=>$rec->Shape,
					  	'availability'=>$rec->Availability,						
					  	'weight'=>$rec->Carat,
					  	'color'=>str_replace(array('+' , '-'),'', $rec->Color),
						'grade'=>str_replace(array('+' , '-'),'', $rec->Purity),
					  	'cut'=>str_replace(array('+' , '-'),'', $rec->Cut),
					  	'polish'=>$rec->Polish,
						'symmetry'=>$rec->Symmetry,
					  	'fluorescence_int'=>$rec->FL,
					  	'fluorescence_color'=>$rec->FluoresentColor,
						'lab'=>$rec->Lab,
					  	'report_no'=>$rec->CertNo,						
					  	'rapnet'=>$rec->RapaportPrice,
					  	'rapnet_discount'=>$rec->RapOff,
						'cash_price'=>$newprice,
					  	'depth'=>$rec->TotalDepthPer,
					  	'table_d'=>$rec->TabelPer,
						'girdle_thin'=>$rec->Girdle,
					  	'girdle_con'=>$rec->GirdleCondition,
					  	'culet'=>$rec->Culate,
						'crown_angle'=>$rec->CrownAngle,
					  	'crown_ht'=>$rec->CrownHeight,						
					  	'pavillion_depth'=>$rec->PavalionHeight,
					  	'pavillion_angle'=>$rec->PavalionAngle,
						'diamond_image'=>$imageurl,
						'diamond_video'=>$videourl,
						'eye_clean'=>$rec->EyeClean,
						'measurements'=>$rec->Measurements,
						'diamond_type'=>1,
						'fancy_color_intensity'=>$rec->Intensity,
						'fancy_color_overtone'=>$rec->Overtone,
						'fancy_color'=>$rec->FancyColor,
						'keytosymb'=>$rec->KeytoSymbols,
						'report_filename'=>$rec->CertiLink,
						'created_at'=>date('Y-m-d H:i:s'),
					  	'created_by'=>1,
					  );
				
				
				$insert_id=$this->common_model->insertData('tbl_diamond',$data);
				
				if($insert_id)
				{
					$total_insert++;
				}
	}
	else
	{
	    $newprice = $rec->Price*$rec->Carat;
     
	     	$image = $rec->StoneImageLink;
	      	$video = $rec->Stone360Link;

	      	if($rec->StoneImageLink != ""){
	      		$imageurl = "http://i.stonehdfile.com/StoneDetail/StoneImages/".$rec->RefNo.".JPG";
	      	}else{
	      		$imageurl = "";
	      	}

		   if($rec->Stone360Link != ""){
		 	 	$videourl = "https://dna.stonehdfile.com/Vision360.html?d=".$rec->RefNo."&sv=0,1,2,3,4&btn=0,1,2,3,4,5";
			}else{

				$videourl = "";
			}

			$measurements = $rec->DimMinAndWidth.' x '.$rec->DimMaxAndWidth.' x '.$rec->TotalDept_mm;				
				$data=array(					  	
					  	'vendor_id'=>13,
						'shape'=>$rec->Shape,
					  	'availability'=>$rec->Availability,						
					  	'weight'=>$rec->Carat,
					  	'color'=>str_replace(array('+' , '-'),'', $rec->Color),
						'grade'=>str_replace(array('+' , '-'),'', $rec->Purity),
					  	'cut'=>str_replace(array('+' , '-'),'', $rec->Cut),
					  	'polish'=>$rec->Polish,
						'symmetry'=>$rec->Symmetry,
					  	'fluorescence_int'=>$rec->FL,
					  	'fluorescence_color'=>$rec->FluoresentColor,
						'lab'=>$rec->Lab,
					  	'report_no'=>$rec->CertNo,						
					  	'rapnet'=>$rec->RapaportPrice,
					  	'rapnet_discount'=>$rec->RapOff,
						'cash_price'=>$newprice,
					  	'depth'=>$rec->TotalDepthPer,
					  	'table_d'=>$rec->TabelPer,
						'girdle_thin'=>$rec->Girdle,
					  	'girdle_con'=>$rec->GirdleCondition,
					  	'culet'=>$rec->Culate,
						'crown_angle'=>$rec->CrownAngle,
					  	'crown_ht'=>$rec->CrownHeight,						
					  	'pavillion_depth'=>$rec->PavalionHeight,
					  	'pavillion_angle'=>$rec->PavalionAngle,
						'diamond_image'=>$imageurl,
						'diamond_video'=>$videourl,
						'eye_clean'=>$rec->EyeClean,
						'measurements'=>$rec->Measurements,
						'diamond_type'=>1,
						'fancy_color_intensity'=>$rec->Intensity,
						'fancy_color_overtone'=>$rec->Overtone,
						'fancy_color'=>$rec->FancyColor,
						'keytosymb'=>$rec->KeytoSymbols,
						'report_filename'=>$rec->CertiLink,
						'created_at'=>date('Y-m-d H:i:s'),
					  	'created_by'=>1,
					  );
					  $this->common_model->updateData('tbl_diamond',$data,array("stock_id"=>$rec->RefNo));
					  $total_update++;
	}
				
		
}
		
//}	
 				$total_record=$total_update+$total_insert;
				$log_data=array(					  	
					  	'total_record'=>$total_record,
					  	'total_update'=>$total_update,
					  	'total_insert'=>$total_insert,
					  	'file'=>'JB_brothers_API',
					  	'log_time'=>time(),
					  	'type'=>'diamond',
					  );
				$this->common_model->insertData('tbl_inventory_log',$log_data);	
				
				echo $total_record.'total <br>';
				echo $total_update.'update <br>';
				echo $total_insert.'Insert <br>';
				exit;
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
      $where .= "WHERE stock_id = '".$stock_id."' AND vendor_id='13' "; 
      $select='diamond_id,stock_id,vendor_id';
      $table_name='tbl_diamond';  
      //echo "select ".$select." from ".$table_name."  ".$where;exit;    
      $query = $this->db->query("select ".$select." from ".$table_name."  ".$where);
      return $query->result();  
  }
  function validate_diamond($data)
  {	
      //print_ex($data);
		if($data['stock_id']!="" && $data['shape']!="" && $data['weight']!="" && $data['color']!="" && $data['grade']!="" && $data['lab']!="" && $data['rapnet']!="" )
      {
      	return true;
      } 
      else
      {
      	//return true;
      	return false;
      }
  }
 
  function delete_diamond()
  {                  
      $all_id=$this->input->get('all_id'); 
      $all_id=array_filter($all_id);  
        
      foreach ($all_id as $key => $value) 
      {  
          $where=array(          	
          	'diamond_id'=>$value
          	);           
          $this->common_model->deleteData('tbl_diamond',$where);
      }          

      echo json_encode(array('records'=>""));
  }
 
  //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
  function upload_history()
	{
			$where=array('type'=>'diamond');
			$where1=array('type'=>'diamond','file_type'=>'image');
			$where2=array('type'=>'diamond','file_type'=>'video');
			$where3=array('type'=>'diamond','file_type'=>'certificate');
			$data['excel_history']=$this->common_model->selectWhereorderby('tbl_inventory_log',$where,'inventory_log_id','desc');
			$data['image_history']=$this->common_model->selectWhereorderby('tbl_inventory_file_log',$where1,'file_log_id','desc');
			$data['video_history']=$this->common_model->selectWhereorderby('tbl_inventory_file_log',$where2,'file_log_id','desc');
			$data['certificate_history']=$this->common_model->selectWhereorderby('tbl_inventory_file_log',$where3,'file_log_id','desc');
			//print_ex($data);
			$data['active_sidebar']='diamond_history';
			$this->load->view('admin/common/header');
  		$this->load->view('admin/common/sidebar',$data);
			$this->load->view('admin/diamond/upload_history',$data);
			$this->load->view('admin/common/footer');
	}
	//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
  function delete_history()
  {   
  		$file_type=$this->uri->segment(4);
  		$this->session->set_flashdata('alert_message','History Cleared!');
  		if($file_type=='excel')
  		{
  			$where=array(          	
      	'type'=>'diamond'
      	);           
      	$this->common_model->deleteData('tbl_inventory_log',$where);
  		}
  		else if($file_type=='image')
  		{
  			$where=array(          	
      	'type'=>'diamond',
      	'file_type'=>'image'
      	);           
      	$this->common_model->deleteData('tbl_inventory_file_log',$where);
  		}
  		else if($file_type=='video')
  		{
  			$where=array(          	
      	'type'=>'diamond',
      	'file_type'=>'video'
      	);           
      	$this->common_model->deleteData('tbl_inventory_file_log',$where);
  		}
  		else if($file_type=='certificate')
  		{
  			$where=array(          	
      	'type'=>'diamond',
      	'file_type'=>'certificate'
      	);           
      	$this->common_model->deleteData('tbl_inventory_file_log',$where);
  		}
  		else
  		{
  				$this->session->set_flashdata('alert_message','History Not Cleared!');
  		}        
      redirect(base_admin() . "diamond/upload_history");
  }
 

}