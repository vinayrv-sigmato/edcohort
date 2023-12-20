<?php //defined('BASEPATH') OR exit('No direct script access allowed');

class Auto_excel_api_shyam extends CI_Controller {

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
          CURLOPT_URL => "https://shyamcorporation.net/WServices/GeneralFetchStockService.svc/FetchStock?sidx=&sord=&page=1&rows=5000&loginUserName=ashiv1136&loginPwd=ashiv1136",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS =>"{\r\n\"SearchUserID\":\"ashiv1136\",\r\n\"SearchUserName\":\"ashiv1136\",\r\n\"strShape\":\"Cushion,Emerald,Heart,Marquise,Oval,Pear,Princess,Radiant,Round,Asscher\",\r\n\"CARAT_FROM\": 0,\r\n\"CARAT_TO\": 20,\r\n\"strColor\": \"D,E,F,G,H,I,J,K,L,M,N\",\r\n\"strPolish\": \"EX,Fair,GD,Ideal,Poor,VG\",\r\n\"strSymmetry\": \"EX,FR,GD,Ideal,Poor,VG\",\r\n\"strCut\": \"EX,FR,GD,Ideal,Poor,VG\"\r\n}\r\n",
          CURLOPT_HTTPHEADER => array(
            "Authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VyIjoibGFiZ2QiLCJpYXQiOjE1OTcwODIxMTIsImV4cCI6MTU5NzA4NTcxMiwiaXNzIjoiaHR0cHM6Ly9icmFpbmFwaXMuY29tIn0.WMiPnoZxvPtsy8YlOrBbdv3cjdf5sVfVQ3YZ-ZkOY4Y",
            "Content-Type: application/json"
          ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        //echo $response; 
          $response = json_decode($response, true);
          $record = $response['rows'];
       // print_ex($err);

        //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
        if(!empty($record)){
          $where=array('vendor_id'=>'25');
          $this->admin_model->deleteData('tbl_diamond',$where);
        }
        //print_ex($record);
        foreach ($record as $row) {

            if(trim($row["country"]) == 'USA'){ $availability = 'Available';}else{ $availability = 'On Call';}

            $data = array (
                    "stock_id" => $row["stoneid"],
                    "availability" => $availability,
                    "shape" => $row["shape"],
                    "weight" => $row["size"],
                    "color" => $row["color"],
                    "grade" => $row["clarity"],
                    "cut" => $row["cut"],
                    "polish" => $row["polish"],
                    "symmetry" => $row["symmetry"],
                    "fluorescence_int" => $row["fluorescence"],
                   //"fluorescence_color" => $row["Fluorescence_Color"],
                    "measurements" => $row["measurements"],
                    "lab" => $row["lab"],
                    "report_no" => $row["CertificateNo"],
                    //"treatment" => $row["Treatment"],
                    "rapnet" => $row["rapnetcaratprice"],
                    "rapnet_discount" => $row["rapnetdiscount"],
                    "cash_price" => $row["amont"],
                    "cash_price_discount" => $row["rapnetdiscount"],
                    //"fancy_color" => $row["FancyColor"],
                   //"fancy_color_intensity" => $row["Fancy_Color_Intensity"],
                   //"fancy_color_overtone" => $row["FancyColorOvertone"],
                    "depth" => $row["depthpercent"],
                    "table_d" => $row["tablepercent"],
                    //"girdle_thin" => $row["Girdle_Thin"],
                    "girdle_thick" => $row["GirdleThick"],
                    "girdle_perct" => $row["GirdlePercent"],
                   //"girdle_con" => $row["Girdle_Condition"],
                    "culet" => $row["CuletSize"],
                    //"culet_con" => $row["Culet_Condition"],
                    "crown_ht" => $row["CuletSize"],
                    "crown_angle" => $row["CrownAngle"],
                    "pavillion_depth" => $row["PavilionDepth"],
                    "pavillion_angle" => $row["PavilionAngle"],
                    "insp" => $row["Incription"],
                    "notes" => $row["Comment"],
                    "country" => $row["country"],
                    //"state" => $row["State"],
                    //"city" => $row["City"],
                    //"time_to_location" => $row["Time_to_Location"],
                    //"is_match_pair_sep" => $row["LsMatchedPairSeparable"],
                    //"pair_stock" => $row["Pair_Stock"],
                    //"allow_raplink_feed" => $row["Allow_Raplink_Feed"],
                    //"parcel_stones" => $row["Parcel_Stones"],
                    //"report_filename" => $row["Certificate_filename"],
                    "diamond_image" => $row["ImageLink"],
                    //"diamond_video" => $row["Diamond_Video"],
                    //"trade_show" => $row["Trade_Show"],
                    "keytosymb" => $row["KeyToSymbols"],
                    //"shade" => $row["Shade"],
                    //"star_len" => $row["Star_Length"],
                    "center_inclusion" => $row["OtherInclusion"],
                    "black_inclusion" => $row["BlackInclusion"],
                    "member_comment" => $row["Comment"],
                    //"report_dt" => $row["Report_Issue_Date"],
                    //"report_type" => $row["Report_Type"],
                    //"lab_location" => $row["Lab_Location"],
                    "milky" => $row["milky"],
                    "eye_clean" => $row["EyeClean"],
                    "created_at" => date('Y-m-d H:i:s'),
                    "created_by" => 25,
                    "vendor_id" => 25,
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
           'file'=>'Shyam_diamond',
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