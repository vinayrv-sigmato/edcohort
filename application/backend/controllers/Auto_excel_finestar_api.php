<?php //defined('BASEPATH') OR exit('No direct script access allowed');

class Auto_excel_finestar_api extends CI_Controller {

	public function __construct()
  {
      parent::__construct();
      
      $this->load->library('excel'); 
      $this->load->model('common_model');           
  }
  public function index()
  {


  			$total_record=0;
			$total_update=0;
			$total_insert=0; 

			$where=array('created_by'=>1);
			$this->common_model->deleteData('tbl_diamond',$where);
			

  			//$file_name = "http://www.belgiumny.com/api/DeveloperAPI?stock=&APIKEY=4AEC37FD-E81F-4AF8-ACD2-0238D227744C";
  			$file_name = "https://finestardiamonds.com/api/Stock/GetFullStockInventory?Username=abhishek107@hotmail.com&Password=shreya12345&Company=R.A_GEMSINTERNATIONALCO.LTD";
			$file_content = file_get_contents($file_name);
			$record = json_decode($file_content);
			$record =  json_decode($record);
//echo $file_name;
		    //$record->Message; 
			//print_ex($record);


			//if($record->Message=='Success')
			{
				//die('hello');
				foreach($record as $rec)
				{
					//die('hellooo');
					//echo $rec->REPORT_NO;
					//  $price = $rec->Buy_Price*$rec->Weight;
					//  $discount = str_replace("-","",$rec->Buy_Price_Discount_PER);
					//  $rap = (100*($price/$rec->Weight))/(100-$discount);

					//  $percent = ($price*9)/100;

					//  $new_price = $price + $percent;
					//  $new_diccount = $discount-9;

					//echo $rap = (100-$rec->Buy_Price_Discount_PER);
					//die;
					
					$data = array(

						'stock_id'=>$rec->PACKET_NO,					  	
						'shape'=>$rec->SHAPE,
					  	'availability'=>$rec->Availability,						
					  	'weight'=>$rec->CTS,
					  	'color'=>$rec->COLOR,
						'grade'=>$rec->PURITY,
					  	'cut'=>$rec->CUT,
					  	'polish'=>$rec->POLISH,
						'symmetry'=>$rec->SYMM,
					  	'fluorescence_int'=>$rec->FLS,
					  	'fluorescence_color'=>$rec->FLS,
						'lab'=>$rec->LAB,
					  	'report_no'=>$rec->REPORT_NO,						
					  	'rapnet'=>$rec->RAP_PRICE,
					  	'rapnet_discount'=>$rec->DISC_PER,
						'cash_price'=>$rec->NET_RATE,
					  	'depth'=>$rec->DEPTH_PER,
					  	'table_d'=>$rec->TABLE_PER,
						//'SHAPE'=>$rec->Girdle_Min,
					  	//'girdle_thick'=>$rec->Girdle_Max,
					  	//'girdle_perct'=>$rec->Girdle_Per,
					  	'girdle_con'=>$rec->GIRDLE,	
					  	'culet'=>$rec->CULET,
					  	//'culet_con'=>$rec->Culet_Condition,
						'crown_angle'=>$rec->CROWN_ANGLE,
					  	'crown_ht'=>$rec->CROWN_OPEN,						
					  	'pavillion_depth'=>$rec->PAV_HEIGHT,
					  	'pavillion_angle'=>$rec->PAV_ANGLE,
					  	//'insp'=>$rec->LaserInscription,
					  	'notes'=>$rec->COMMENTS,
					  	'country'=>$rec->LOCATION,
					  	'm_length'=>$rec->LENGTH_1,
					  	'm_width'=>$rec->WIDTH,
					  	'm_depth'=>$rec->WIDTH,
					  	//'state'=>$rec->State,
					  	//'city'=>$rec->City,
					  	//'is_match_pair_sep'=>$rec->LsMatchedPairSeparable,
					  	//'pair_stock'=>$rec->Pair_Stock,
					  	//'allow_raplink_feed'=>$rec->Allow_Raplink_Feed,
					  	//'parcel_stones'=>$rec->Parcel_Stones,
					  	'report_filename'=>$rec->CERTI_IMAGE,
						'diamond_image'=>$rec->REAL_IMAGE,
						'diamond_video'=>$rec->VIDEO,
						'keytosymb'=>$rec->KEY_TO_SYMBOLS,
						'shade'=>$rec->SHADE,
						//'star_len'=>$rec->Star_Length,
						//'center_inclusion'=>$rec->Center_Inclusion,
						//'black_inclusion'=>$rec->Black_Inclusion,
						//'member_comment'=>$rec->Member_Comments,
						//'report_dt'=>$rec->Report_Issue_Date,
						//'report_type'=>$rec->Report_Type,
						'eye_clean'=>$rec->EYE_CLEAN,
						'measurements'=>$rec->MEASUREMENT,
						'created_at'=>date('Y-m-d H:i:s'),
					  	'created_by'=>1,
					  	"created_by" => 27,
                    "vendor_id" => 27,
                    "diamond_type" => 1
					);

					$insert_id=$this->common_model->insertData('tbl_diamond',$data);
					if($insert_id)
					{
						$total_insert++;
					}

				}
			}

  			//$api = http://www.belgiumny.com/api/GetStock


				  //Copy file
				 // $newfile = 'uploads/diamond/excel/vinayak_Diamond_'.date('d_m_Y_h_i_s_A').$file_ext;
      		//copy($file, $newfile);
				  // Insert Log
				  $log_data=array(					  	
					  	'total_record'=>$total_record,
					  	'total_update'=>$total_update,
					  	'total_insert'=>$total_insert,
					  	'file'=>'Finestar_Diamond_'.date('d_m_Y_h_i_s_A'),
					  	'log_time'=>time(),
					  	'type'=>'diamond',
					  );
					//print_pre($log_data);
					$this->common_model->insertData('tbl_inventory_log',$log_data);	
					// Delete after fetching the data
					//unlink($file);											
		  //}						  						  

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