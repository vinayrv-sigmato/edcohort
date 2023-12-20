<?php //defined('BASEPATH') OR exit('No direct script access allowed');

class Auto_rapnet_excel extends CI_Controller {

	public function __construct()
  	{
      parent::__construct();
      $this->load->library('excel');
  	}
  	public function index()
  	{
  		$this->get_rapnet_data();
  		
		$total_record=0;
		$total_update=0;
		$total_insert=0;

		$file='';

		$file='rapnetfeed.csv';	
		
		if(file_exists($file))
		{		
			$where=array('stock_id !='=>"");
			$this->admin_model->deleteData('tbl_diamond',$where);	 

	  		//read file from path
			$objPHPExcel = PHPExcel_IOFactory::load($file);
			$excel_array = $objPHPExcel->getActiveSheet()->toArray(null,true,true,false);
			//print_ex($excel_array);
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
				    $data['created_by'] = 1;
				    $total_record++;
	      			if($this->validate_diamond($data))
				    {											    		
			    		$insert_id=$this->admin_model->insertData('tbl_diamond',$data);
			    		//echo $this->db->last_query();exit;
			    		//print_pre($data);
			    		if($insert_id)
			    		{
			    			$total_insert++;
			    		}		
					} 
				    else
				    {

				    }
				}
		  	}
		  	//$newfile = 'uploads/diamond/excel/David_Diamond_'.date('d_m_Y_h_i_s_A').$file_ext;
			//copy($file, $newfile);
		  	$log_data=array(					  	
			  	'total_record'=>$total_record,
			  	'total_update'=>$total_update,
			  	'total_insert'=>$total_insert,
			  	//'file'=>'David_Diamond_'.date('d_m_Y_h_i_s_A').$file_ext,
			  	'log_time'=>time(),
			  	'type'=>'diamond',
			);
			//print_pre($log_data);
			$this->admin_model->insertData('tbl_inventory_log',$log_data);	
			// Delete after fetching the data
			//unlink($file);
	  	}
	}
	 function get_rapnet_data()
	{
	  	$auth_url = "https://technet.rapaport.com/HTTP/Authenticate.aspx";
		$post_string = "username=69975&password=" . urlencode("wissam130");

		$request = curl_init($auth_url); 
		curl_setopt($request, CURLOPT_HEADER, 0); 
		curl_setopt($request, CURLOPT_RETURNTRANSFER, 1); 
		curl_setopt($request, CURLOPT_POSTFIELDS, $post_string); 
		curl_setopt($request, CURLOPT_SSL_VERIFYPEER, FALSE); 
		$auth_ticket = curl_exec($request); 
		curl_close ($request);

		$feed_url = "http://technet.rapaport.com/HTTP/DLS/GetFile.aspx";
		$feed_url .= "?ticket=".$auth_ticket; 

		//$fp = 'rapnetfeed.csv';
		$fp = fopen('rapnetfeed.csv', 'wb');
		// if ($fp == FALSE)
		// {
		// 	echo "File not opened";
		// 	exit;
		// }

		$request = curl_init($feed_url); 
		curl_setopt($request, CURLOPT_FILE, $fp); 
		curl_setopt($request, CURLOPT_HEADER, 0); 
		curl_setopt($request, CURLOPT_TIMEOUT, 300); 
		curl_exec($request); 
		curl_close ($request); 
		fclose($fp); 
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
      $where .= "WHERE stock_id = '".$stock_id."' "; 
      $select='diamond_id,stock_id';
      $table_name='tbl_diamond';  
      //echo "select ".$select." from ".$table_name."  ".$where;exit;    
      $query = $this->db->query("select ".$select." from ".$table_name."  ".$where);
      return $query->result();  
  }
  function validate_diamond($data)
  {	      
      $lab_arr=array('GIL','NONE','None','NA','NC','N','NULL');
      if($data['stock_id']!="" && $data['shape']!="" && $data['weight']!="" && $data['color']!="" && $data['lab']!="" && !in_array($data['lab'], $lab_arr))
      {
      	return true;
      } 
      else
      {
      	//return true;
      	return false;
      }

  }





}