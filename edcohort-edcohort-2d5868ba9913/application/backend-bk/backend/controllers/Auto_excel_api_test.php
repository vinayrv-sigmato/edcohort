<?php //defined('BASEPATH') OR exit('No direct script access allowed');



class Auto_excel_api_test extends CI_Controller {



	public function __construct()

  	{

      parent::__construct();

      $this->load->library('excel');

      $this->load->model('vendor_model'); 

  	}

  	public function index()

  	{

        $total_record=0;

        $total_update=0;

        $total_insert=0;

    		$token="";

    		$record=array();

    		//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

    		$curl = curl_init();

    		curl_setopt_array($curl, array(

    		  CURLOPT_URL => "http://brainapis.com/api/royal-touch/get-token",

    		  CURLOPT_RETURNTRANSFER => true,

    		  CURLOPT_ENCODING => "",

    		  CURLOPT_MAXREDIRS => 10,

    		  CURLOPT_TIMEOUT => 30,

    		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,

    		  CURLOPT_CUSTOMREQUEST => "POST",

    		  CURLOPT_POSTFIELDS => "username=royaltouch&password=royaltouch!123!",

    		  CURLOPT_HTTPHEADER => array(

    		    "Accept: */*",

    		    "Content-Type: application/x-www-form-urlencoded",

    		  ),

    		));

    		$response = curl_exec($curl);

    		$err = curl_error($curl);

    		curl_close($curl);

    		if (empty($err)){

    		  $response = json_decode($response, true);

    		  $token = $response['token'];

    		}  





        //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

        // $curl = curl_init();

        // curl_setopt_array($curl, array(

        //   CURLOPT_URL => "http://brainapis.com/api/royal-touch/insert-order",

        //   CURLOPT_RETURNTRANSFER => true,

        //   CURLOPT_ENCODING => "",

        //   CURLOPT_MAXREDIRS => 10,

        //   CURLOPT_TIMEOUT => 30,

        //   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,

        //   CURLOPT_CUSTOMREQUEST => "POST",

        //   CURLOPT_POSTFIELDS => "sn_document=032021&am_total_amount=40&fl_order=100&sn_barcode=53477&sn_unit=P&pcs_actual=10&wt_actual=10&sp_item=10&dt_doc=02/26/2021&dt_due=02/26/2021&dt_sendtime=02/26/2021&sn_item=10&sn_size=null",

        //   CURLOPT_HTTPHEADER => array(

        //     "Accept: */*",

        //     "Authorization: Bearer ".$token         

        //   ),

        // ));

        // $response = curl_exec($curl);

        // $err = curl_error($curl);

        // curl_close($curl);

        // if (empty($err)){

        //   $response = json_decode($response, true);

        //   //$token = $response['token'];

        // }  



        //CURLOPT_URL => "http://brainapis.com/api/royal-touch/item-activity",  

        //print_ex($response);  

    		//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

    		$curl = curl_init();

    		curl_setopt_array($curl, array(

    		  CURLOPT_URL => "http://brainapis.com/api/royal-touch/item-activity",

    		  CURLOPT_RETURNTRANSFER => true,

    		  CURLOPT_ENCODING => "",

    		  CURLOPT_MAXREDIRS => 10,

    		  CURLOPT_TIMEOUT => 30,

    		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,

    		  CURLOPT_CUSTOMREQUEST => "POST",

    		  CURLOPT_HTTPHEADER => array(

    		    "Accept: */*",

    		    "Authorization: Bearer ".$token			    

    		  ),

    		));

    		$response = curl_exec($curl);

    		$err = curl_error($curl);

    		curl_close($curl);

    		if (empty($err)){

    		  $response = json_decode($response, true);

    		  $record = $response['record'];

    		}			

    		//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

       // print_ex($response);

    		if(!empty($record)){

    			$where=array('vendor_id'=>'24');

    			//$this->admin_model->deleteData('tbl_diamond',$where);

    		}

        print_ex($record);

    		foreach ($record as $row) {



            //if($row["Availability"] == ''){ $availability = 'Available';}else{ $availability = $row["Availability"];}



    			  $data = array (

                    "stock_id" => $row["Stock"],

                    "availability" => $row["MemoStatus"],

                    "shape" => $row["Shape"],

                    "weight" => $row["Weight"],

                    "color" => $row["Color"],

                    "grade" => $row["Clarity"],

                    "cut" => $row["Cut_Grade"],

                    "polish" => $row["Polish"],

                    "symmetry" => $row["Symmetry"],

                    "fluorescence_int" => $row["Fluorescence_Intensity"],

                    "fluorescence_color" => $row["Fluorescence_Color"],

                    "measurements" => $row["Measurements"],

                    "lab" => $row["Lab"],

                    "report_no" => $row["Certificate"],

                    "treatment" => $row["Treatment"],

                    "rapnet" => $row["Rapnet_Price"],

                    "rapnet_discount" => $row["Rapnet_Discount"],

                    "cash_price" => $row["Cash_Price"],

                    "cash_price_discount" => $row["Cash_Price_Discount"],

                    "fancy_color" => $row["FancyColor"],

                    "fancy_color_intensity" => $row["Fancy_Color_Intensity"],

                    "fancy_color_overtone" => $row["FancyColorOvertone"],

                    "depth" => $row["Depth"],

                    "table_d" => $row["Table"],

                    "girdle_thin" => $row["Girdle_Thin"],

                    "girdle_thick" => $row["Girdle_Thick"],

                    "girdle_perct" => $row["Girdle"],

                    "girdle_con" => $row["Girdle_Condition"],

                    "culet" => $row["Culet_Size"],

                    "culet_con" => $row["Culet_Condition"],

                    "crown_ht" => $row["Crown_Height"],

                    "crown_angle" => $row["Crown_Angle"],

                    "pavillion_depth" => $row["Pavilion_Depth"],

                    "pavillion_angle" => $row["Pavilion_Angle"],

                    "insp" => $row["LaserInscription"],

                    "notes" => $row["Cert_Comments"],

                    "country" => $row["Country"],

                    "state" => $row["State"],

                    "city" => $row["City"],

                    "time_to_location" => $row["Time_to_Location"],

                    "is_match_pair_sep" => $row["LsMatchedPairSeparable"],

                    "pair_stock" => $row["Pair_Stock"],

                    "allow_raplink_feed" => $row["Allow_Raplink_Feed"],

                    "parcel_stones" => $row["Parcel_Stones"],

                    "report_filename" => $row["Certificate_filename"],

                    "diamond_image" => $row["Diamond_Image"],

                    "diamond_video" => $row["Diamond_Video"],

                    "trade_show" => $row["Trade_Show"],

                    "keytosymb" => $row["Key_To_Symbols"],

                    "shade" => $row["Shade"],

                    "star_len" => $row["Star_Length"],

                    "center_inclusion" => $row["Center_Inclusion"],

                    "black_inclusion" => $row["Black_Inclusion"],

                    "member_comment" => $row["Member_Comments"],

                    "report_dt" => $row["Report_Issue_Date"],

                    "report_type" => $row["Report_Type"],

                    "lab_location" => $row["Lab_Location"],

                    "milky" => $row["Milky"],

                    "eye_clean" => $row["Eye_Clean"],

                    "brand" => $row["Brand"],

                    "cn" => $row["Cn"],

                    "sn" => $row["Sn"],

                    "cw" => $row["Cw"],

                    "sw" => $row["Sw"],

                    "answerdate" => $row["AnswerDate"],

                    "memotootltip" => $row["MemoTootlTip"],

                    "origin" => $row["ORIGIN"],

                    "created_at" => date('Y-m-d H:i:s'),

    				        "created_by" => 24,

                    "vendor_id" => 24,

                    "diamond_type" => 1

                );

    			  $insert_id=$this->admin_model->insertData('tbl_diamond',$data);

            if($insert_id) {

                $total_insert++;

            }

            $total_record++;

		    }



        $log_data=array(

           'total_record'=>$total_record,

           'total_update'=>$total_update,

           'total_insert'=>$total_insert,

           'file'=>'Ashiv_diamond',

           'log_time'=>time(),

           'type'=>'diamond',

        );

        $this->admin_model->insertData('tbl_inventory_log',$log_data);  

	  }



    public function other()

    {

        $total_record=0;

        $total_update=0;

        $total_insert=0;

        $token="";

        $record=array();

        //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

        $curl = curl_init();

        curl_setopt_array($curl, array(

          CURLOPT_URL => "http://34.194.187.100/api/bt/get-token",

          CURLOPT_RETURNTRANSFER => true,

          CURLOPT_ENCODING => "",

          CURLOPT_MAXREDIRS => 10,

          CURLOPT_TIMEOUT => 30,

          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,

          CURLOPT_CUSTOMREQUEST => "POST",

          CURLOPT_POSTFIELDS => "username=davidweisz&password=davidweisz!123!",

          CURLOPT_HTTPHEADER => array(

            "Accept: */*",

            "Content-Type: application/x-www-form-urlencoded",

          ),

        ));

        $response = curl_exec($curl);

        $err = curl_error($curl);

        curl_close($curl);

        if (empty($err)){

          $response = json_decode($response, true);

          $token = $response['token'];

        }        

        //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

        $curl = curl_init();

        curl_setopt_array($curl, array(

          CURLOPT_URL => "http://34.194.187.100/api/bt/diamond",

          CURLOPT_RETURNTRANSFER => true,

          CURLOPT_ENCODING => "",

          CURLOPT_MAXREDIRS => 10,

          CURLOPT_TIMEOUT => 30,

          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,

          CURLOPT_CUSTOMREQUEST => "GET",

          CURLOPT_HTTPHEADER => array(

            "Accept: */*",

            "Authorization: Bearer ".$token         

          ),

        ));

        $response = curl_exec($curl);

        $err = curl_error($curl);

        curl_close($curl);

        if (empty($err)){

          $response = json_decode($response, true);

          $record = $response['record'];

        }     

        //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

       

        print_ex($record);

        foreach ($record as $row) {



            //if($row["Availability"] == ''){ $availability = 'Available';}else{ $availability = $row["Availability"];}



            $data = array (

                    "stock_id" => $row["Stock"],

                    "availability" => $row["MemoStatus"],

                    "shape" => $row["Shape"],

                    "weight" => $row["Weight"],

                    "color" => $row["Color"],

                    "grade" => $row["Clarity"],

                    "cut" => $row["Cut_Grade"],

                    "polish" => $row["Polish"],

                    "symmetry" => $row["Symmetry"],

                    "fluorescence_int" => $row["Fluorescence_Intensity"],

                    "fluorescence_color" => $row["Fluorescence_Color"],

                    "measurements" => $row["Measurements"],

                    "lab" => $row["Lab"],

                    "report_no" => $row["Certificate"],

                    "treatment" => $row["Treatment"],

                    "rapnet" => $row["Rapnet_Price"],

                    "rapnet_discount" => $row["Rapnet_Discount"],

                    "cash_price" => $row["Cash_Price"],

                    "cash_price_discount" => $row["Cash_Price_Discount"],

                    "fancy_color" => $row["FancyColor"],

                    "fancy_color_intensity" => $row["Fancy_Color_Intensity"],

                    "fancy_color_overtone" => $row["FancyColorOvertone"],

                    "depth" => $row["Depth"],

                    "table_d" => $row["Table"],

                    "girdle_thin" => $row["Girdle_Thin"],

                    "girdle_thick" => $row["Girdle_Thick"],

                    "girdle_perct" => $row["Girdle"],

                    "girdle_con" => $row["Girdle_Condition"],

                    "culet" => $row["Culet_Size"],

                    "culet_con" => $row["Culet_Condition"],

                    "crown_ht" => $row["Crown_Height"],

                    "crown_angle" => $row["Crown_Angle"],

                    "pavillion_depth" => $row["Pavilion_Depth"],

                    "pavillion_angle" => $row["Pavilion_Angle"],

                    "insp" => $row["LaserInscription"],

                    "notes" => $row["Cert_Comments"],

                    "country" => $row["Country"],

                    "state" => $row["State"],

                    "city" => $row["City"],

                    "time_to_location" => $row["Time_to_Location"],

                    "is_match_pair_sep" => $row["LsMatchedPairSeparable"],

                    "pair_stock" => $row["Pair_Stock"],

                    "allow_raplink_feed" => $row["Allow_Raplink_Feed"],

                    "parcel_stones" => $row["Parcel_Stones"],

                    "report_filename" => $row["Certificate_filename"],

                    "diamond_image" => $row["Diamond_Image"],

                    "diamond_video" => $row["Diamond_Video"],

                    "trade_show" => $row["Trade_Show"],

                    "keytosymb" => $row["Key_To_Symbols"],

                    "shade" => $row["Shade"],

                    "star_len" => $row["Star_Length"],

                    "center_inclusion" => $row["Center_Inclusion"],

                    "black_inclusion" => $row["Black_Inclusion"],

                    "member_comment" => $row["Member_Comments"],

                    "report_dt" => $row["Report_Issue_Date"],

                    "report_type" => $row["Report_Type"],

                    "lab_location" => $row["Lab_Location"],

                    "milky" => $row["Milky"],

                    "eye_clean" => $row["Eye_Clean"],

                    "brand" => $row["Brand"],

                    "cn" => $row["Cn"],

                    "sn" => $row["Sn"],

                    "cw" => $row["Cw"],

                    "sw" => $row["Sw"],

                    "answerdate" => $row["AnswerDate"],

                    "memotootltip" => $row["MemoTootlTip"],

                    "origin" => $row["ORIGIN"],

                    "created_at" => date('Y-m-d H:i:s'),

                    "created_by" => 24,

                    "vendor_id" => 24,

                    "diamond_type" => 1

                );

            $insert_id=$this->admin_model->insertData('tbl_diamond',$data);

            if($insert_id) {

                $total_insert++;

            }

            $total_record++;

        }



        $log_data=array(

           'total_record'=>$total_record,

           'total_update'=>$total_update,

           'total_insert'=>$total_insert,

           'file'=>'Ashiv_diamond',

           'log_time'=>time(),

           'type'=>'diamond',

        );

        $this->admin_model->insertData('tbl_inventory_log',$log_data);  

    }



    function auto_excel()

    {     

        $vendor_list=$this->vendor_model->vendor_list_excel();

        //print_ex($vendor_list);   

        foreach ($vendor_list as $vendor) 

        {   

          $total_record=0;

          $total_update=0;

          $total_insert=0;

          $file='';

          $file1='';

          $file2='';

          $file3='';



          if($vendor->NM_FOLDER_NAME!="")

          {

            $file='../ftp_upload/'.$vendor->NM_FOLDER_NAME.'/diamond/excel/Stock.csv';

            if(file_exists($file))

            {

              $columns=array();

              $where=array('created_by'=>$vendor->CD_USER_ID);

              $this->admin_model->deleteData('tbl_diamond',$where);



              $objPHPExcel = PHPExcel_IOFactory::load($file);

              $excel_array = $objPHPExcel->getActiveSheet()->toArray(null,true,true,false);

              foreach($excel_array['0'] as $key => $value) {              

                if($value!="") {

                    $columns[] = $this->check_header($value);

                }         

              }

              //print_ex($columns);          

            foreach ($excel_array as $ekey => $evalue) 

            { 

              if($ekey>0) {

                foreach ($columns as $ckey => $cvalue) {  

                  if($cvalue) {

                    $data[$cvalue]=  $evalue[$ckey];

                  }

                }

                

                  $data['created_at'] = date('Y-m-d H:i:s');

                  $data['created_by'] = $vendor->CD_USER_ID;

                  

                  $total_record++;

                  //if($this->validate_diamond($data))

                  //{   

                    //print_pre($data);                         

                    $insert_id=$this->admin_model->insertData('tbl_diamond',$data);

                    if($insert_id) {

                      $total_insert++;

                    }                   

                  //}

              }

            }

            /*$log_data=array(

               'total_record'=>$total_record,

               'total_update'=>$total_update,

               'total_insert'=>$total_insert,

               'log_time'=>time(),

               'type'=>'diamond',

            );

            $this->admin_model->insertData('tbl_inventory_log',$log_data);*/ 

            //unlink($file);                      

          }                           

        }         

      }

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