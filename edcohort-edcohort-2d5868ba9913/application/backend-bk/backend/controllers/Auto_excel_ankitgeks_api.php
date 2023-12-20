<?php //defined('BASEPATH') OR exit('No direct script access allowed');
class Auto_excel_ankitgeks_api extends CI_Controller {
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
        CURLOPT_PORT => "4443",
        CURLOPT_URL => "https://api1.ankitgems.com:4443/apiuser/logincheck",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"name\"\r\n\r\nAbhishek123456\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"password\"\r\n\r\nragems29\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
        CURLOPT_HTTPHEADER => array(
          "cache-control: no-cache",
          "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW",
          "postman-token: fa74d4c0-9630-49f8-730c-ef6e7aeb0296"
        ),
      ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if (empty($err)){
          $response = json_decode($response, true);
          $token = $response['data']['accessToken'];
        }  

        //print_ex($token);      
        //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
       $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_PORT => "4443",
      CURLOPT_URL => "https://api1.ankitgems.com:4443/apistock/stockdetail",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_HTTPHEADER => array(
        "authorization: bearer ".$token."",
        "cache-control: no-cache",
        'Content-Length: 0'
        
      ),
    ));


        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if (empty($err)){
          $response = json_decode($response, true);
          $record = $response['data']['list'];
        } 
         //print_pre($err);
        // print_ex($response['data']['list']);     
        //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
        if(!empty($record)){
          $where=array('vendor_id'=>'29');
          $this->admin_model->deleteData('tbl_diamond',$where);
        }
        //print_ex($record);
        foreach ($record as $row) {
            //if($row["Availability"] == ''){ $availability = 'Available';}else{ $availability = $row["Availability"];}
            $data = array (
                    "stock_id" => $row["PACKETCODE"],
                    "availability" => $row["STATUS"],
                    "shape" => $row["SHAPE"],
                    "weight" => $row["CRTWT"],
                    "color" => $row["COL"],
                    "grade" => $row["CLR"],
                    "cut" => $row["CUT"],
                    "polish" => $row["POL"],
                    "symmetry" => $row["SYM"],
                    "fluorescence_int" => $row["FLOURESENCE"],
                    //"fluorescence_color" => $row["Fluorescence_Color"],
                    "measurements" => $row["measurement"],
                    "lab" => $row["LAB"],
                    "report_no" => $row["CERT_NO"],
                    //"treatment" => $row["Treatment"],
                    "rapnet" => $row["rapaport"],
                    "rapnet_discount" => $row["final_discount"],
                    "cash_price" => $row["final_amount"],
                    "cash_price_discount" => $row["final_discount"],
                   // "fancy_color" => $row["FancyColor"],
                    //"fancy_color_intensity" => $row["Fancy_Color_Intensity"],
                    //"fancy_color_overtone" => $row["FancyColorOvertone"],
                    "depth" => $row["DPL"],
                    "table_d" => $row["TBL"],
                    //"girdle_thin" => $row["Girdle_Thin"],
                   // "girdle_thick" => $row["Girdle_Thick"],
                    "girdle_perct" => $row["GIRDLE"],
                    //"girdle_con" => $row["Girdle_Condition"],
                    "culet" => $row["Culet"],
                    //"culet_con" => $row["Culet_Condition"],
                    "crown_ht" => $row["CH"],
                    "crown_angle" => $row["CA"],
                    "pavillion_depth" => $row["PD"],
                    "pavillion_angle" => $row["PA"],
                    "insp" => $row["INS"],
                    "notes" => $row["COMMENT"],
                    //"country" => $row["Country"],
                    //"state" => $row["State"],
                    //"city" => $row["City"],
                    "time_to_location" => $row["LOC"],
                    //"is_match_pair_sep" => $row["LsMatchedPairSeparable"],
                    //"pair_stock" => $row["Pair_Stock"],
                   // "allow_raplink_feed" => $row["Allow_Raplink_Feed"],
                   // "parcel_stones" => $row["Parcel_Stones"],
                    "report_filename" => $row["CERTIMG"],
                    "diamond_image" => $row["DIAMONDIMG"],
                    "diamond_video" => $row["VIDEOS"],
                   // "trade_show" => $row["Trade_Show"],
                    "keytosymb" => $row["KTSVIEW"],
                    "shade" => $row["COL-SHADE"],
                    //"star_len" => $row["Star_Length"],
                    //"center_inclusion" => $row["Center_Inclusion"],
                    "black_inclusion" => $row["NATTS"],
                    "member_comment" => $row["COMMENT"],
                    //"report_dt" => $row["Report_Issue_Date"],
                    //"report_type" => $row["Report_Type"],
                    //"lab_location" => $row["Lab_Location"],
                    "milky" => $row["MILKY"],
                    "eye_clean" => $row["eye_clean"],
                    //"brand" => $row["Brand"],
                   // "cn" => $row["Cn"],
                   // "sn" => $row["Sn"],
                   // "cw" => $row["Cw"],
                   // "sw" => $row["Sw"],
                   // "answerdate" => $row["AnswerDate"],
                   // "memotootltip" => $row["MemoTootlTip"],
                    "origin" => $row["Origin"],
                    "created_at" => date('Y-m-d H:i:s'),
                    "created_by" => 29,
                    "vendor_id" => 29,
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
           'file'=>'Ankitgems_diamond',
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