<?php //defined('BASEPATH') OR exit('No direct script access allowed');

class Auto_excel_diamond extends CI_Controller {

	public function __construct()
	{
	    
		parent::__construct();
		$this->load->library('excel');
		$this->load->model('admin_model');
		$this->load->model('vendor_model');  
		$this->load->model('product_model');  
		$this->load->model('common_model');
	}

	public function index()
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
  				$file='../ftp_upload/'.$vendor->NM_FOLDER_NAME.'/diamond/excel/diamond.csv';
  				if(file_exists($file))
  				{
  					$columns=array();
  					$where=array('vendor_id'=>$vendor->CD_USER_ID);
  					$this->common_model->deleteData('tbl_inventory',$where);

					$objPHPExcel = PHPExcel_IOFactory::load($file);
					$excel_array = $objPHPExcel->getActiveSheet()->toArray(null,true,true,false);
					foreach($excel_array['0'] as $key => $value) {							
						if($value!="") {
						    $columns[] = $this->check_header($value);
						}					
					}
					//print_pre($excel_array);					
					foreach ($excel_array as $ekey => $evalue) 
					{	
						if($ekey>0) {
							foreach ($columns as $ckey => $cvalue) {	
								if($cvalue) {
									$data[$cvalue]=  $evalue[$ckey];
								}
							}
							
						    $data['TS_CREATED_AT'] = date('Y-m-d H:i:s');
						    $data['CD_CREATED_BY'] = $vendor->CD_USER_ID;
						    $data['CD_VENDOR_ID'] = $vendor->CD_USER_ID;
						    
						    $total_record++;
						    //if($this->validate_diamond($data))
						    //{		
					    		//print_pre($data);									    		
					    		$insert_id=$this->common_model->insertData('tbl_inventory',$data);
					    		if($insert_id) {
					    			$total_insert++;
					    		}					    			
						    //}
						}
					}
				 //  	$log_data=array(
					//   	'vendor_id'=>$vendor->CD_USER_ID,
					//   	'total_record'=>$total_record,
					//   	'total_update'=>$total_update,
					//   	'total_insert'=>$total_insert,
					//   	'log_time'=>time(),
					//   	'type'=>'diamond',
					// );
					// $this->common_model->insertData('tbl_inventory_auto_log',$log_data);	
					//unlink($file);											
				}						  						  
			}					
		}
	}

	public function diamond_inventory()
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
  			 	 $file='../ftp_upload/'.$vendor->NM_FOLDER_NAME.'/diamond/excel/diamond.csv';
  				//die('debug');
  				
  				if(file_exists($file))
  				{
  					
  					$columns=array();
  					$where=array('vendor_id'=>$vendor->CD_USER_ID);
  					$this->admin_model->deleteData('tbl_diamond',$where);

					$objPHPExcel = PHPExcel_IOFactory::load($file);
					$excel_array = $objPHPExcel->getActiveSheet()->toArray(null,true,true,false);
					foreach($excel_array['0'] as $key => $value) {							
						if($value!="") {
						    $columns[] = $this->check_header($value);
						}					
					}
					//print_ex($excel_array);					
					foreach ($excel_array as $ekey => $evalue) 
					{	
						if($ekey>0) {
							foreach ($columns as $ckey => $cvalue) {	
								if($cvalue) {
									$data[$cvalue]=  $evalue[$ckey];
								}
							}
							
							
							//$data['diamond_image'] = str_replace( 'http://', 'https://', $data['diamond_image'] );

						    $data['created_at'] = date('Y-m-d H:i:s');
						    $data['created_by'] = $vendor->CD_USER_ID;
						    $data['diamond_type'] = 1;
						    $data['vendor_id'] = $vendor->CD_USER_ID;
						    
						    $total_record++;
						    //if($this->validate_diamond($data))
						    //{		
					    		//print_pre($data);									    		
					    		$insert_id=$this->common_model->insertData('tbl_diamond',$data);
					    		if($insert_id) {
					    			$total_insert++;
					    		}					    			
						    //}
						}
					}
				 $log_data=array(					  	
					  	'total_record'=>$total_record,
					  	'total_update'=>$total_update,
					  	'total_insert'=>$total_insert,
					  	'file'=>$vendor->NM_USER_FULLNAME,
					  	'log_time'=>time(),
					  	'type'=>'diamond',
					  	'vendor_id'=>$vendor->CD_USER_ID,
					  );
				$this->common_model->insertData('tbl_inventory_log',$log_data);
					unlink($file);											
				}						  						  
			}					
		}
	}

	public function vaibhav_inventory()
	{  		
  		//$vendor_list=$this->vendor_model->vendor_list_excel();
  		//print_ex($vendor_list);		
  		//foreach ($vendor_list as $vendor) 
  		//{ 	
			$total_record=0;
			$total_update=0;
			$total_insert=0;
			$file='';
			$file1='';
			$file2='';
			$file3='';

  			//if($vendor->NM_FOLDER_NAME!="")
  			//{
  			 	 $path= $_SERVER['DOCUMENT_ROOT'].'/dailystock.in/vaibhav/Vaibhav.csv';
  				 $file = str_replace("certificate.one/","",$path);
  				//die('debug');
  				if(file_exists($file))
  				{
  					
  					$columns=array();
  					$where=array('vendor_id'=>12);
  					$this->admin_model->deleteData('tbl_diamond',$where);

					$objPHPExcel = PHPExcel_IOFactory::load($file);
					$excel_array = $objPHPExcel->getActiveSheet()->toArray(null,true,true,false);
					foreach($excel_array['0'] as $key => $value) {							
						if($value!="") {
						    $columns[] = $this->check_header($value);
						}					
					}
					//print_pre($excel_array);					
					foreach ($excel_array as $ekey => $evalue) 
					{	
						if($ekey>0) {
							foreach ($columns as $ckey => $cvalue) {	
								if($cvalue) {
									$data[$cvalue]=  $evalue[$ckey];
								}
							}
							
							
							$data['diamond_image'] = str_replace( 'http://', 'https://', $data['diamond_image'] );

						    $data['created_at'] = date('Y-m-d H:i:s');
						    $data['created_by'] = 1;
						    $data['diamond_type'] = 1;
						    $data['vendor_id'] = 12;
						    
						    $total_record++;
						    //if($this->validate_diamond($data))
						    //{		
					    										    		
					    		$insert_id=$this->common_model->insertData('tbl_diamond',$data);
					    		if($insert_id) {
					    			$total_insert++;
					    		}					    			
						    //}
						}
					}
				 $log_data=array(					  	
					  	'total_record'=>$total_record,
					  	'total_update'=>$total_update,
					  	'total_insert'=>$total_insert,
					  	'file'=>'vaibhav',
					  	'log_time'=>time(),
					  	'type'=>'diamond',
					  );
				$this->common_model->insertData('tbl_inventory_log',$log_data);
					unlink($file);											
				}						  						  
			//}					
		//}
	}

	public function mehtadiam_cvdinventory()
	{  		
  		//$vendor_list=$this->vendor_model->vendor_list_excel();
  		//print_ex($vendor_list);		
  		//foreach ($vendor_list as $vendor) 
  		//{ 	
			$total_record=0;
			$total_update=0;
			$total_insert=0;
			$file='';
			$file1='';
			$file2='';
			$file3='';

  			//if($vendor->NM_FOLDER_NAME!="")
  			//{
  				$path= $_SERVER['DOCUMENT_ROOT'].'/dailystock.in/10west46/YASHITADESIGN.csv';
  				$file = str_replace("certificate.one/","",$path);
  				//die('debug');
  				if(file_exists($file))
  				{
  					
  					$columns=array();
  					$where=array('vendor_id'=>14);
  					$this->admin_model->deleteData('tbl_diamond',$where);

					$objPHPExcel = PHPExcel_IOFactory::load($file);
					$excel_array = $objPHPExcel->getActiveSheet()->toArray(null,true,true,false);
					foreach($excel_array['0'] as $key => $value) {							
						if($value!="") {
						    $columns[] = $this->check_header($value);
						}					
					}
					//print_pre($excel_array);					
					foreach ($excel_array as $ekey => $evalue) 
					{	
						if($ekey>0) {
							foreach ($columns as $ckey => $cvalue) {	
								if($cvalue) {
									$data[$cvalue]=  $evalue[$ckey];
								}
							}
							

						    $data['created_at'] = date('Y-m-d H:i:s');
						    $data['created_by'] = 1;
						    $data['diamond_type'] = 2;
						    $data['vendor_id'] = 14;
						    
						    $total_record++;
						    //if($this->validate_diamond($data))
						    //{		
					    		//print_pre($data);									    		
					    		$insert_id=$this->common_model->insertData('tbl_diamond',$data);
					    		if($insert_id) {
					    			$total_insert++;
					    		}					    			
						    //}
						}
					}
				 $log_data=array(					  	
					  	'total_record'=>$total_record,
					  	'total_update'=>$total_update,
					  	'total_insert'=>$total_insert,
					  	'file'=>'mehtadiam',
					  	'log_time'=>time(),
					  	'type'=>'lab grown',
					  );
				$this->common_model->insertData('tbl_inventory_log',$log_data);
					unlink($file);											
				}						  						  
			//}					
		//}
	}

	public function yashita_inventory()
	{  		
  		//$vendor_list=$this->vendor_model->vendor_list_excel();
  		//print_ex($vendor_list);		
  		//foreach ($vendor_list as $vendor) 
  		//{ 	
			$total_record=0;
			$total_update=0;
			$total_insert=0;
			$file='';
			$file1='';
			$file2='';
			$file3='';

  			//if($vendor->NM_FOLDER_NAME!="")
  			//{
  				$path= $_SERVER['DOCUMENT_ROOT'].'/dailystock.in/yashita/yashitadesign.csv';
  				$file = str_replace("certificate.one/","",$path);
  				//die('debug');
  				if(file_exists($file))
  				{
  					
  					$columns=array();
  					$where=array('vendor_id'=>15);
  					$this->admin_model->deleteData('tbl_diamond',$where);

					$objPHPExcel = PHPExcel_IOFactory::load($file);
					$excel_array = $objPHPExcel->getActiveSheet()->toArray(null,true,true,false);
					foreach($excel_array['0'] as $key => $value) {							
						if($value!="") {
						    $columns[] = $this->check_header($value);
						}					
					}
					//print_pre($excel_array);					
					foreach ($excel_array as $ekey => $evalue) 
					{	
						if($ekey>0) {
							foreach ($columns as $ckey => $cvalue) {	
								if($cvalue) {
									$data[$cvalue]=  $evalue[$ckey];
								}
							}
							
						    $data['created_at'] = date('Y-m-d H:i:s');
						    $data['created_by'] = 1;
						    $data['diamond_type'] = 1;
						    $data['vendor_id'] = 15;
						    
						    $total_record++;
						    //if($this->validate_diamond($data))
						    //{		
					    		//print_pre($data);									    		
					    		$insert_id=$this->common_model->insertData('tbl_diamond',$data);
					    		if($insert_id) {
					    			$total_insert++;
					    		}					    			
						    //}
						}
					}
				 $log_data=array(					  	
					  	'total_record'=>$total_record,
					  	'total_update'=>$total_update,
					  	'total_insert'=>$total_insert,
					  	'file'=>'yashita',
					  	'log_time'=>time(),
					  	'type'=>'diamond',
					  );
				$this->common_model->insertData('tbl_inventory_log',$log_data);
					unlink($file);											
				}						  						  
			//}					
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

	function send_notification()
	{
		$data['group_f']='1';
		$vendor_list=$this->vendor_model->vendor_list($data);
		//print_ex($vendor_list);
		foreach ($vendor_list as $vendor) 
  		{
			$query=$this->db->query("select * from tbl_inventory_auto_log  where vendor_id='".$vendor->CD_USER_ID."' and type='diamond' order by inventory_auto_log_id desc limit 1");
			$result=$query->result();

			if(count($result))
			{
				$last_date=date('Y-m-d',$result['0']->log_time);				
				$date=date('Y-m-d');
				if($last_date<$date)
				{
					$result['0']->vendor_id;
					$to_email=$vendor->NM_USER_EMAIL;
					$data_email['fname'] = $vendor->NM_USER_FULLNAME;
					$str_url = '<p>This is to inform you that your inventory for <b>DIAMOND</b> has not been uploaded since <b>'.date('d-M-Y H:i',$result['0']->log_time).'</b>.</p>
					<p>Kindly upload inventory for better business experience.</p>					
					<p>If you have any query Please contact to our support team.</p>';

					$data_email['str_final'] = $str_url;
					$msg = $this->load->view('email/email_template',$data_email, TRUE);  
					//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
					$HTMLBODY=$msg;
					$SENDER=SITE_EMAIL;
					$SENDER_NAME=SITE_NAME;
					$SUBJECT="Inventory Notification";     
					$RECIPIENT=$to_email;
					$data['message']=$this->sesmail->send($SENDER,$SENDER_NAME,$RECIPIENT,$SUBJECT,$HTMLBODY);       
					//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
				}
			}
		}
	}

	function auto_jewelry()
	{
		//exit;
		$file='../ftp_upload/admin_jewelstree/product/excel/unique.xlsx';
		echo file_exists($file);
		//exit;
		if(file_exists($file))
		{
			$columns=array();
			//$where=array('CD_VENDOR_ID'=>$vendor->CD_USER_ID);
			//$this->common_model->deleteData('tbl_inventory',$where);

			$objPHPExcel = PHPExcel_IOFactory::load($file);
			$excel_array = $objPHPExcel->getActiveSheet()->toArray(null,true,true,false);
			foreach($excel_array['0'] as $key => $value) {							
				if($value!="") {
				    $columns[] = $this->check_header_jewelry($value);
				}					
			}
			//print_ex($excel_array);			
								
			foreach ($excel_array as $ekey => $evalue) 
			{	
				if($ekey>0) {
					foreach ($columns as $ckey => $cvalue) {	
						if($cvalue) {
							$datax[$cvalue]=  $evalue[$ckey];
						}
					}


				    $item = $datax['product_sku'];
				    $images = $datax['images'];
				    $videos = $datax['videos'];
				    $cat_code = $datax['cat_code'];

				    $semi_mount_dwt = $datax['semi_mount_dwt'];
				    $stone_breakdown = $datax['stone_breakdown'];
				    $diamond_cttw_provided = $datax['diamond_cttw_provided'];
				    $diamond_quality = $datax['diamond_quality'];

				    $price_14k = $datax['14k_price'];
				    $price_18k = $datax['18k_price'];
				    $platinum_price = $datax['platinum_price'];

				    $product_price=0;
				    if(!empty($price_14k) && $price_14k>0) {
				    	$product_price=$price_14k;
				    }
					else if(!empty($price_18k) && $price_18k>0) {
						$product_price=$price_18k;
					}
					else if(!empty($platinum_price) && $platinum_price>0) {
						$product_price=$platinum_price;
					}	

					$option = array();
					if(!empty($price_14k)) {
				    	$option['14kt']['id'] = '4';
				    	$option['14kt']['value'] = '14k';
				    }

					if(!empty($price_18k)) {
				    	$option['18kt']['id'] = '4';
				    	$option['18kt']['value'] = '18k';
					}					

					if(!empty($platinum_price)) {
				    	$option['platinum']['id'] = '4';
				    	$option['platinum']['value'] = 'Platinum';
					}					

					//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
					//print_pre($datax);
					//print_pre($option);
					//continue;
					$slug = makeSlug($item);
				    $data=array(
			                'product_name'=>$item,
			                'product_added_by'=>'admin',
			                'seller_id'=>'1',
			                'product_sku'=>$item,             
			                'product_short_description'=>$item,                
			                'product_price'=>$product_price,
			                'product_subtract_stock'=>'no', 
			                'product_status'=>'inactive',
			                'product_global_addons'=>'inactive',
			                'product_slug'=>$slug,
			                'product_is_price'=>'1',
			                'product_is_get_quote'=>'0',
			        );
			        if(empty($item)){
			        	exit();
			        }
			        $product_id=$this->admin_model->insertData('tbl_product',$data);
			        if($product_id)
			        {
			            $data_shipping=array(
			                    'product_id'=>$product_id,
			            );
			            $this->admin_model->insertData('tbl_product_shipping',$data_shipping);

			            $data_description=array(
			                    'product_id'=>$product_id,  
			                    'semi_mount_dwt'=>$semi_mount_dwt,  
			                    'stone_breakdown'=>$stone_breakdown,  
			                    'diamond_cttw_provided'=>$diamond_cttw_provided,  
			                    'diamond_quality'=>$diamond_quality,  
			            );
			            $this->admin_model->insertData('tbl_product_description',$data_description);

			            $cat_array = array();
			            if(!empty($cat_code)){
			            	$cat_array = explode(',', $cat_code);
				            foreach ($cat_array as $key => $value) 
				            {
				                $data_category=array(
				                    'product_id' => $product_id,
				                    'category_id' => $value,
				                );
				                $this->admin_model->insertData('tbl_product_category',$data_category);
				            }
			            }

			            if(!empty($images)){
			            	$images_array = explode(',', $images);
			            	foreach ($images_array as $key => $value) 
				            {
				                $data_image=array(
				                    'product_id'=>$product_id,
				                    'product_image'=>$value.'.jpg',
				                    'product_image_sort_order'=>$key+1,
				                );
				                $this->admin_model->insertData('tbl_product_image',$data_image);
				            }
			            }

			            if (!empty($videos)) 
			            {
			            	$videos_array = explode(',', $videos);
			            	foreach ($videos_array as $key => $value) 
				            {
				                $data_video=array(
				                    'product_id' => $product_id,
				                    'product_video' => $value,
				                    'video_type' => 'link',
				                );
				                $this->admin_model->insertData('tbl_product_video',$data_video);
				            }
			            }

			            foreach ($option as $row) {
			            	$data_option=array(
	                            'product_id'=>$product_id,
	                            'option_id'=> $row['id'],
	                            'value'=> $row['value'],
	                            'is_visible'=>0,
	                            'is_variation'=>1 ,
	                        );
	                        $this->admin_model->insertData('tbl_product_option',$data_option); 		
			            }

			            if(!empty($price_14k)) {
			            	$var_data=array(                             
		                        'variation_price'=>$price_14k, 
		                        'variation_sale_price'=>0.00,                              
		                        'product_id'=>$product_id
		                    );
		                    $variation_id=$this->admin_model->insertData('tbl_product_price_variation',$var_data);
		                    if($variation_id) {
	                            $cart_data=array(                             
	                                'variation_id'=>$variation_id, 
	                                'variation_attributes_name'=>'Metal Type', 
	                                'variation_attributes_value'=>'14k'
	                            );
	                            $this->admin_model->insertData('tbl_product_price_variation_attributes',$cart_data);
	                        }
			            }

			            if(!empty($price_18k)) {
			            	$var_data=array(                             
		                        'variation_price'=>$price_18k, 
		                        'variation_sale_price'=>0.00,                              
		                        'product_id'=>$product_id
		                    );
		                    $variation_id=$this->admin_model->insertData('tbl_product_price_variation',$var_data);

		                    if($variation_id) {
	                            $cart_data=array(                             
	                                'variation_id'=>$variation_id, 
	                                'variation_attributes_name'=>'Metal Type', 
	                                'variation_attributes_value'=>'18k'
	                            );
	                            $this->admin_model->insertData('tbl_product_price_variation_attributes',$cart_data); 	     	                            
	                        }
			            }			            
			            if(!empty($platinum_price)) {
			            	$var_data=array(                             
		                        'variation_price'=>$platinum_price, 
		                        'variation_sale_price'=>0.00,                              
		                        'product_id'=>$product_id
		                    );
		                    $variation_id=$this->admin_model->insertData('tbl_product_price_variation',$var_data);

		                    if($variation_id) {
	                            $cart_data=array(                             
	                                'variation_id'=>$variation_id, 
	                                'variation_attributes_name'=>'Metal Type', 
	                                'variation_attributes_value'=>'Platinum'
	                            );
	                            $this->admin_model->insertData('tbl_product_price_variation_attributes',$cart_data);  
	                        }
			            }						
						//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
			        }
				}
			}

		}
	}
	function check_header_jewelry($header)
	{
		$this->db->select('H.TABLE_COLUMN');
		$this->db->from('tbl_jewelry_accepted_header AH');
		$this->db->join('tbl_jewelry_header H', 'AH.HEADER_ID = H.HEADER_ID','right');  

		$this->db->or_where('H.HEADER_NAME',$header);
		$this->db->or_where('AH.ACCEPTED_HEADER_NAME',$header);    
		$query=$this->db->get();
		$result=$query->result();      

		return @$result['0']->TABLE_COLUMN;      
	}

	function delete_products(){
		exit;
		$CAT_ID = '12';
		$cat_arr=$this->get_child_category($CAT_ID);
		$cat_arr = explode('/', $cat_arr);
		$cat_arr = array_values(array_filter($cat_arr));
		$cat_arr[] = $CAT_ID;
		$cat_arr_length = count($cat_arr);
		$cat_arr = implode("','", $cat_arr);

		$where_1.="where category_id in ('".$cat_arr."') ";

      	//$product_total=$this->product_model->productTotal($where_1,$order_by);
        //echo $count =$product_total['0']->product_count; 

      	$query = $this->db->query("select product_id from v_product ".$where_1." group by product_id LIMIT  0 , 5000");
        $records = $query->result();

        foreach ($records as $row) 
        {
            $where=array('product_id'=>$row->product_id);
        	//print_pre($row);

            $this->admin_model->deleteData('tbl_product',$where);
            $this->admin_model->deleteData('tbl_product_shipping',$where);
            $this->admin_model->deleteData('tbl_product_description',$where);
            $this->admin_model->deleteData('tbl_product_category',$where);
            $this->admin_model->deleteData('tbl_product_diamond_shape',$where);

            $pro_image=$this->admin_model->selectWhere('tbl_product_image',$where);
            //foreach ($pro_image as $row) {
                //@unlink("../ftp_upload/".$folder."/product/image/".$row->product_image);
            //}
            $this->admin_model->deleteData('tbl_product_image',$where);

            $pro_video=$this->admin_model->selectWhere('tbl_product_video',$where);
            //foreach ($pro_video as $row) {
                //@unlink("../ftp_upload/".$folder."/product/video/".$row->product_video);
            //}
            $this->admin_model->deleteData('tbl_product_video',$where);
            $this->admin_model->deleteData('tbl_product_option',$where); 
            $this->admin_model->deleteData('tbl_product_feature',$where);

            $pro_variation=$this->admin_model->selectWhere('tbl_product_price_variation',$where);
            foreach ($pro_variation as $pro_row) {
                $this->admin_model->deleteData('tbl_product_price_variation_attributes',array('variation_id'=>$pro_row->variation_id)); 
            }
            $this->admin_model->deleteData('tbl_product_price_variation',$where);
        }
	}
	function update_products(){
		//exit;

		$CAT_ID = '102';
		$cat_arr=$this->get_child_category($CAT_ID);
		$cat_arr = explode('/', $cat_arr);
		$cat_arr = array_values(array_filter($cat_arr));
		$cat_arr[] = $CAT_ID;
		$cat_arr_length = count($cat_arr);
		$cat_arr = implode("','", $cat_arr);

		//$where_1.=" where category_id in ('".$cat_arr."') and product_is_builder != '1' ";
		$where_1.=" where category_id in ('".$cat_arr."') ";

      	//$product_total=$this->product_model->productTotal($where_1,$order_by);
        //echo $count =$product_total['0']->product_count; 
        //exit;

        //$query_d = $this->db->query("select * from tbl_diamond_shape");
        //$records_diamond = $query_d->result();

      	$query = $this->db->query("select product_id,product_sku from v_product ".$where_1." group by product_id LIMIT  0 , 5000");
        $records = $query->result();

        foreach ($records as $row) 
        {
        	/*$shape="";
        	if($row->stone_breakdown){
        		$a = explode(",", strtoupper($row->stone_breakdown));
        		foreach ($records_diamond as $row_d) {
	        		if(strrpos($a['0'], $row_d->shape)){
	        			$shape = $row_d->shape;
	        		}
        		}
        		if($shape){
        			$where_v =" where ppv.product_id = '.$row->product_id.' and ppva.variation_attributes_name = 'Finish Level' and ppva.variation_attributes_value = 'Semi Mount' ";
        			$query_v = $this->db->query("select count(product_id) as count from tbl_product_price_variation ppv 
        				join tbl_product_price_variation_attributes ppva 
        				on ppv.variation_id=ppva.variation_id ".$where_v."");
        			$records_variation = $query_v->result();
        			if($records_variation['0']->count){
	        			$data_diamond = array(
	        				'product_id' => $row->product_id,
	        				'diamond_shape' => $shape
	        			);
	        			$this->admin_model->insertData('tbl_product_diamond_shape',$data_diamond);

	        			$where=array('product_id'=>$row->product_id);
			            $data=array(
			                'product_is_builder'=>'1'
			            );
			            $this->admin_model->updateData('tbl_product',$data,$where);
        			}

        		}
        	}*/

            $where=array('product_id'=>$row->product_id);

            $sku = 'APF'.$row->product_sku;
    		$slug = makeSlug($sku);
		    $data=array(
	                'product_name'=>$sku,
	                'product_sku'=>$sku,             
	                'product_short_description'=>$sku,                
	                'product_slug'=>$slug
	        );

            /*$data=array(
                'product_global_addons'=>'active',
                //'product_is_builder'=>$this->input->post("is_builder"),
            );*/
            $this->admin_model->updateData('tbl_product',$data,$where);
        }
	}

	private function get_child_category($category_id) 
	{
	      $menu = '';
	      $query = $this->db->query(" SELECT category_id FROM tbl_category c where c.parent_category = '" .$category_id . "'");
	      $result = $query->result();
	  
	      foreach ($result as $row) {
	          $menu .= '/'.$row->category_id;
	          $menu .= '/'.$this->get_child_category($row->category_id);
	      }      
	      return $menu;
	}
	public function snj_inventory()
    {
        print_r("A");exit;
    //     include base_url().'assets/simplexlsx-master/src/SimpleXLSX.php';
    // 	include_once("xlsxwriter.class.php");
    //     require_once APPPATH.'third_party/PHPExcel.php';
    //     require_once APPPATH.'third_party/PHPExcel/IOFactory.php';
        
        //$dir = 'http://dailystock.in/snj/';
        $files = scandir($dir);
        foreach($files as $file){
            unset($columns); 
            
            $vendor_id = 1;
            
            if(file_exists($dir.$file) ){
                
                $file_path = $dir.''.$file;
            	$objPHPExcel = PHPExcel_IOFactory::load($file_path);
        	
                $excel_array = $objPHPExcel->getActiveSheet()->toArray(null,true,true,false);
                echo "<pre>";print_r($excel_array);exit;
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
                }}
                //send mail end
        }//end files foreach
    	
        
    }
    //end code here


}