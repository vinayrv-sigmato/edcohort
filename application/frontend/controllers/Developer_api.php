<?php    
defined('BASEPATH') OR exit('No direct script access allowed');

class Developer_api extends CI_Controller { 

	public function __construct()
	{
		parent::__construct();
		$this->load->model('diamond_model');
	}

	public function index() 
	{
		header('Content-Type: application/json');
		$stock = null;
	    $data_message = "Fail";
	    $token = "";
	    $code = '0';
    	$record = array();
    	$field = array();
    	$result = array();
    	$type = '';

        //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
        $stock = $this->input->get('stock');
        $api_key = $this->input->get('APIKEY');
        $cert_key = $this->input->get('CERTKEY');
        $cts = $this->input->get('CTS');
        if(trim($stock)) {
        	$field['stock'] = $stock;
        }        
        if(trim($cts)) {
        	$field['cts'] = $cts;
        }

        if($api_key!="" && $cert_key!="") 
        {
        	$where = array( 
        		'api_key'=> $api_key,
        		'cert_key'=> $cert_key,
        		'status'=> '1',
        	);
        	$result = $this->common_model->selectWhere('tbl_api_key', $where);
        	if(!empty($result)) {
        		$api_no = $result['0']->api_no;
        		if($api_no=='2'){
        			$type = 'cert';
        		}
        		else if($api_no=='3') {
        			$type = 'rare';
        		}
        		else {
                    $data_message = "Please Enter Correct API and CERT KEY";
	        	}
        	} else {
        		 $data_message = "Please Enter Correct API and CERT KEY";
        	}        	
        }        
        else if($api_key!="") 
        {
        	$where = array( 
        		'api_key'=> $api_key,
        		'status'=> '1',
        	);
        	$result = $this->common_model->selectWhere('tbl_api_key', $where);
        	if(!empty($result)) {
        		$api_no = $result['0']->api_no;
        		if($api_no=='1'){
        			$type = 'stock';
        		} else {
	        		$data_message = "Please Enter Correct API KEY";
	        	}   		
        	} else {
        		$data_message = "Please Enter Correct API KEY";
        	}        	
        } 
        if($type=="") {
    		$data = array("Stock" => null,"Message" => $data_message);
		    echo json_encode($data); exit;
    	}
        $field['type'] = $type;
        
        $field['diamond_type'] = 'natural';
        if(!empty($result)) {
        	if($result['0']->is_natural && $result['0']->is_labgrown) {
        		$field['diamond_type'] = 'all';
        	} else if($result['0']->is_labgrown && !$result['0']->is_natural) {
        		$field['diamond_type'] = 'labgrown';
        	}
        }
        //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
		$token = $this->get_token();
		//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
		$curl = curl_init();
		curl_setopt_array($curl, array(
		  CURLOPT_URL => APIURL.'/diamond-dev-api?'.http_build_query($field),
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
		  $code = $response['code'];
		}
		//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	    if($code=='1') {
	    	$message = "Success";
	    } else {
	    	$message = "Fail";
	    }

	    $data = array(
	    	"Stock" => $record,
	    	"Message" => $message,
	    );
	    echo json_encode($data);
	} 
	
	private function get_token() 
	{		
		$token = $this->session->userdata('memo_token');

		if(empty($token)) 
		{
			$curl = curl_init();
			curl_setopt_array($curl, array(
			CURLOPT_URL => APIURL."/get-token",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS => "username=".APIUSER."&password=".APIPASSWORD."",
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
				$this->session->set_userdata('memo_token',$token);
			}	
		}	

		return $token;
	}

}
