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
							
						    $data['created_at'] = date('Y-m-d H:i:s');
						    $data['created_by'] = 1;
						    $data['vendor_id'] = 12;
						    
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
				 //  	$log_data=array(
					//   	'vendor_id'=>$vendor->CD_USER_ID,
					//   	'total_record'=>$total_record,
					//   	'total_update'=>$total_update,
					//   	'total_insert'=>$total_insert,
					//   	'log_time'=>time(),
					//   	'type'=>'diamond',
					// );
					// $this->common_model->insertData('tbl_inventory_log',$log_data);	
					//unlink($file);											
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


}