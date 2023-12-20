<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Design_customization extends CI_Controller {

	public function __construct()
  {
      parent::__construct();
      $this->load->model('design_model');
      $this->load->library('excel');
      $this->load->library('pagination');      
      $this->load->library('upload');
      if($this->session->userdata('jw_admin_id')=="" || $this->session->userdata('jw_admin_group')!=1)
      {
        redirect(base_url());
      }
  }
	public function index()
	{
      $where="design_id > 0 AND type = 'custom'";
      
      $records_count = $this->design_model->design_count($where);      
      $data['records_count'] =$records_count['0']->diamond_count;
      $per_page= ($this->input->get('per_page')) ? $this->input->get('per_page') : 25 ;
      $config['base_url'] = base_url().'design/load_more_data';
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
      $page= ($this->input->get('page')) ? $this->input->get('page') : 0 ;
      $this->pagination->initialize($config);
      $data['page_link']=$this->pagination->create_links();

      //$data['records'] = $this->diamond_model->diamond_list_limit($where,$per_page,$page);     
      //print_ex($data['records']);
      $data['where'] = $where; 		
			$data['active_sidebar']='design_customization';			

			//$this->load->view('admin/common/test');
			$this->load->view('common/header');
			$this->load->view('common/sidebar',$data);
			$this->load->view('design/design_list_customization',$data);
			$this->load->view('common/footer');
	}

	function load_more_data()
	{
			$page=$this->input->get('page');
      $per_page=$this->input->get('per_page');
      $where=$this->input->get('where');
      
      $where="design_id > 0 AND type = 'custom'";     
     /* search by Name*/
      $stock = $this->input->get('stock');       
      if(!empty($stock))
      {           
          $splitstock = explode(',', $stock);             
          $i=0;
          foreach($splitstock as $eachstock ) { 
          $splitstock[$i] = $eachstock;
              $i++;
          }              
          $q1stock=implode("','",$splitstock);              
          $where .= " AND name LIKE ('%".$q1stock."%')";             
      }

       /* search by Lab */
      $checkboxlab = $this->input->get('checkboxlab');
      if(!empty($checkboxlab))
      {
        $qlab = implode("','", $checkboxlab);
        $where .= " AND status IN ('".$qlab."')";       
      }

      /* search by company*/
      $company = $this->input->get('company');       
      if(!empty($company))
      {           
          $splitcompany = explode(',', $company);             
          $i=0;
          foreach($splitcompany as $eachcompany ) { 
          $splitcompany[$i] = $eachcompany;
              $i++;
          }              
          $q1company=implode("','",$splitcompany);              
          $where .= " AND company LIKE ('%".$q1company."%')";             
      }

      
     /* search by reference_number*/
      $reference_number = $this->input->get('reference_number');       
      if(!empty($reference_number))
      {           
          $splitreference_number = explode(',', $reference_number);             
          $i=0;
          foreach($splitreference_number as $eachreference_number ) { 
          $splitreference_number[$i] = $eachreference_number;
              $i++;
          }              
          $q1reference_number=implode("','",$splitreference_number);              
          $where .= " AND reference_number LIKE ('%".$q1reference_number."%')";             
      }
      
     /* search by Status*/
       $checkboxpolish = $this->input->get('checkboxpolish');                
      if(!empty($checkboxpolish))
      {
         $qpolish = implode("','", $checkboxpolish);
         $where .= " AND is_approved IN ('".$qpolish."')";       
      }  

      /* search by Status*/
       $checkboxpps = $this->input->get('checkboxpps');                
      if(!empty($checkboxpps))
      {
         $qpolishps = implode("','", $checkboxpps);
         $where .= " AND processing_status IN ('".$qpolishps."')";       
      }     
                
      // print_ex($where); 
      $records_count = $this->design_model->design_count($where);      
      $data['records_count'] =$records_count['0']->design_count;  
      //print_ex($data);  
      $per_page= ($per_page) ? $per_page : 25 ;
      $config['base_url'] = base_url().'design_customization/load_more_data';
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

      $records = $this->design_model->design_list_limit($where,$per_page,$page);
      echo json_encode(array('records'=>$records,'page_link'=>$page_link,'total_records'=>$data['records_count']));
			// echo json_encode(array('records'=>$records);
	}
  function print_data()
	{
		$all_id=$this->input->get('all_id');
		//print_r($all_id);
		$all_id_arr=implode("','",$all_id);                     
    $where = "diamond_id IN ('".$all_id_arr."')";			
		$records = $this->diamond_model->diamond_list($where);                    
		echo json_encode(array('records'=>$records));
	}
	function design_details()
  {
  	  $design_id = $this->uri->segment(4);
  		 
      $image_array=array();
      $image_link=array();
      $video_array=array();
      $video_link=array();
      $certificate_array=array();
		  $where = 'design_id = '."'".$design_id."'";      
      $records = $this->design_model->design_list($where);

      
      $image=explode(",",$records['0']->image);
      //print_ex($image);
      
      if(count($records))
      {
        $file='uploads/design/'.$image['0'];

        if(file_exists($file))
        {
            $image_array[]=$file;
        } 
        foreach($image as $img)
        {
            $file='uploads/design/'.$img;

            if(file_exists($file))
            {
                $image_array[]=$file;
            } 
        }
        if($records['0']->diamond_image!="")
        {
            $image_link[]=$records['0']->diamond_image;
        }
        if(!count($image_array))
        {
            $file='assets/front/No_image.jpg';            
            if(file_exists($file))
            {
                $image_array[]=$file;
            } 
        }
        //print_ex($image_array);
      }
      else
      {
      	redirect(base_url().'design_customization');
      } 
      //print_pre($image_link);   
		  $data= array(
			  	'records'=>$records,
			  	'image_array'=>$image_array,
			  	'video_array'=>$video_array,
			  	'certificate_array'=>$certificate_array,
			  	'image_link'=>$image_link,
			  	'video_link'=>$video_link
		  	);
  		//print_ex($data);  
  		$data['active_sidebar']='design_customization';		

  		$this->load->view('common/header');
  		$this->load->view('common/sidebar',$data);
			$this->load->view('design/design_details',$data);
			$this->load->view('common/footer');
  }

  function design_edit()
  {
      $design_id = $this->uri->segment(4);
       
      $image_array=array();
      $image_link=array();
      $video_array=array();
      $video_link=array();
      $certificate_array=array();
      $where = 'design_id = '."'".$design_id."'";      
      $records = $this->design_model->design_list($where);

      $id = $records[0]->product_id;
      $where1=array('id'=>$id,'type'=>'product');
      $image_array=$this->common_model->selectWhere('tbl_image',$where1);

      $where2=array('design_id'=>$design_id);
      $process=$this->common_model->selectWhere('tbl_design_process',$where2);

      
      // $image=explode(",",$records['0']->image);
      // //print_ex($image);
      
      // if(count($records))
      // {
      //   $file='uploads/design/'.$image['0'];

      //   if(file_exists($file))
      //   {
      //       $image_array[]=$file;
      //   } 
      //   foreach($image as $img)
      //   {
      //       $file='uploads/design/'.$img;

      //       if(file_exists($file))
      //       {
      //           $image_array[]=$file;
      //       } 
      //   }
      //   if($records['0']->diamond_image!="")
      //   {
      //       $image_link[]=$records['0']->diamond_image;
      //   }
      //   if(!count($image_array))
      //   {
      //       $file='assets/front/No_image.jpg';            
      //       if(file_exists($file))
      //       {
      //           $image_array[]=$file;
      //       } 
      //   }
      //   //print_ex($image_array);
      // }
      // else
      // {
      //   redirect(base_url().'design_customization');
      // } 
      //print_pre($image_link);   
      $data= array(
          'records'=>$records,
          'image_array'=>$image_array,
          'video_array'=>$video_array,
          'certificate_array'=>$certificate_array,
          'image_link'=>$image_link,
          'video_link'=>$video_link,
          'process' =>  $process
        );
      //print_ex($data);  
      $data['active_sidebar']='design_customization';    

      $this->load->view('common/header');
      $this->load->view('common/sidebar',$data);
      $this->load->view('design/design_edit_customization',$data);
      $this->load->view('common/footer');
  }

  function design_edit_submit()
  {
    $ad_user_id=$this->session->userdata('dns_user_id');
    //echo '<pre>'; print_r($_POST); die;
    $design_id=$this->input->post('design_id');
    $status=$this->input->post('status');    
    $is_approved=$this->input->post('is_approved');
    $processing_status=$this->input->post('processing_status');
    $reply=$this->input->post('reply'); 
    $diamond_weight=$this->input->post('diamond_weight');
    $color_diamond_weight=$this->input->post('color_diamond_weight');
    $budget=$this->input->post('budget'); 
    $metal=$this->input->post('metal');
    $center_diamond=$this->input->post('center_diamond');
    $reference_number=$this->input->post('reference_number');

    

    $this->form_validation->set_rules('design_id', 'design_id', 'trim|required');
    
    
    if($this->form_validation->run() == FALSE)
    {
      $this->session->set_flashdata('alert_message','Please Fill the Form Correctly!');
      redirect(base_url().'design_customization/design_edit/'.$design_id);
    }

   
      
     $data = array();
      
       if(!empty($reply))
            $data['reply'] = $reply; 
       if(!empty($is_approved))
            $data['is_approved'] = $is_approved; 

      if(!empty($processing_status))
            $data['processing_status'] = $processing_status; 

        if($is_approved == 1){
          $data['status'] = 'Order';
        }else{
          $data['status'] = 'Quote';
        } 

         if(!empty($diamond_weight))
            $data['diamond_weight'] = $diamond_weight;
           if(!empty($color_diamond_weight))
            $data['color_diamond_weight'] = $color_diamond_weight;
           if(!empty($budget))
            $data['budget'] = $budget;
           if(!empty($metal))
            $data['metal'] = $metal;
          if(!empty($center_diamond))
            $data['center_diamond'] = $center_diamond;
          if(!empty($reference_number))
            $data['reference_number'] = $reference_number;

       if(!empty($ad_user_id))
            $data['edit_by'] = $ad_user_id;
            $data['edit_date'] = date('Y-m-d H:i:s');
            $data['approved_date'] = date('Y-m-d H:i:s');

        $this->common_model->updateData('tbl_design',$data,array('design_id'=>$design_id));


        
          $data=array(
        'design_id' => $design_id,
        'message' => $data['reply'],
        'status' => $data['status'],
        'processing_status' =>  $data['processing_status'],
        'create_date' => date('Y-m-d H:i:s')
      );

      $insert_id=$this->common_model->insertData('tbl_design_process',$data);

      if($insert_id){
      
      foreach ($_FILES['img_upload']['name'] as $key => $value)
          {  

              $new_name1 = str_replace(".","",microtime());
              $new_name=str_replace(" ","_",$new_name1);
              $file_tmp =$_FILES['img_upload']['tmp_name'][$key];
              $file=$_FILES['img_upload']['name'][$key];
              $ext=substr(strrchr($file,'.'),1);
              if($ext=="png" || $ext=="gif" || $ext=="jpg" || $ext=="jpeg" || $ext=="JPG" || $ext=="JPEG" || $ext=="PNG")
              {
                  $product_image=$new_name.".".$ext;
                  $uploaded=move_uploaded_file($file_tmp,"./uploads/design/".$product_image);                  
                  $product_image_array[]=$product_image;
              }
          }
         
          foreach ($product_image_array as $key => $value) 
            {
               $data_image=array(
                    'process_id'=>$insert_id,
                    'image'=>$value,
                    'type'=>$type,
                );
                $this->common_model->insertData('tbl_process_image',$data_image);
            } 

        
    }

        
            $where = 'design_id = '."'".$design_id."'";      
            $records = $this->design_model->design_list($where);


            $this->load->library('email');
            $this->load->library('parser');
            $config['wordwrap'] = TRUE;
            $config['mailtype'] = 'html';
            $config['charset'] = 'utf-8';
            $config['priority'] = '1';
            $config['crlf'] = "\r\n";
            $config['newline'] = "\r\n";
            //$config['smtp_crypto']  = 'tls';
            $this->email->initialize($config);
            $this->email->from(SITE_EMAIL, SITE_NAME);
            $this->email->to($records['0']->email);
            //$this->email->cc("testcc@domainname.com");
            $this->email->subject('Custom Design');
            //$url = base_url().'UserNewPassword/'.$check_register['email_code'];
            $data_email['fname'] = $records['0']->name;
            //$data_email['email_code'] = $email_code;
            //$this->email->message("Please click on this link for reset password".$url);
            $str_content = '';
            $str_name = ucwords($data_email['fname']);
            $str_url = '<p>Custom Design</p>
            <p>'. $reply .'</p>  
            <p> Project Detail : <a style="background-color: #4CAF50;border: none;color: white;padding: 10px;text-align: center;text-decoration:none; display: inline-block; font-size: 16px; margin: 4px 2px;" href=' .base_url().'design-detail/'.$design_id. ' > Click Here </a></p>         
            ';
            $data_email['str_final'] = $str_url;
            $msg = $this->load->view('email/email_template', $data_email, TRUE);
            //echo $msg; die;
            $this->email->message($msg);
            $data['message'] = "Sorry Unable to send email...";
            if ($this->email->send()) {
                $data['message'] = "Mail sent...";
            }
        
        
        //echo '<pre>'; print_r($data); die;
        
    
    $this->session->set_flashdata('alert_message','Detail Has Been Updated Successfully!');
    redirect(base_url().'design_customization');
  }
           
  function design_process_submit()
  {

    $design_id=$this->input->post('design_id');
    $status=$this->input->post('status');
    $type=$this->input->post('type');
    $reply=$this->input->post('reply');
    $processing_status=$this->input->post('processing_status');
    $job_no=$this->input->post('job_no');

    $data = array();
      
       if(!empty($status))
            $data['status'] = $status; 

          if(!empty($job_no))
            $data['job_no'] = $job_no;

           if(!empty($processing_status))
            $data['processing_status'] = $processing_status; 

       if(!empty($ad_user_id))
            $data['edit_by'] = $ad_user_id;
            $data['edit_date'] = date('Y-m-d H:i:s');           

        $this->common_model->updateData('tbl_design',$data,array('design_id'=>$design_id));

    $data=array(
        'design_id' => $design_id,
        'message' => $reply,
        'status' => $status,
        'processing_status' =>  $data['processing_status'],
        'create_date' => date('Y-m-d H:i:s')
      );

      $insert_id=$this->common_model->insertData('tbl_design_process',$data);

    if($insert_id){
      
      foreach ($_FILES['img_upload']['name'] as $key => $value)
          {  

              $new_name1 = str_replace(".","",microtime());
              $new_name=str_replace(" ","_",$new_name1);
              $file_tmp =$_FILES['img_upload']['tmp_name'][$key];
              $file=$_FILES['img_upload']['name'][$key];
              $ext=substr(strrchr($file,'.'),1);
              if($ext=="png" || $ext=="gif" || $ext=="jpg" || $ext=="jpeg" || $ext=="JPG" || $ext=="JPEG" || $ext=="PNG")
              {
                  $product_image=$new_name.".".$ext;
                  $uploaded=move_uploaded_file($file_tmp,"./uploads/design/".$product_image);                  
                  $product_image_array[]=$product_image;
              }
          }
         
          foreach ($product_image_array as $key => $value) 
            {
               $data_image=array(
                    'process_id'=>$insert_id,
                    'image'=>$value,
                    'type'=>$type,
                );
                $this->common_model->insertData('tbl_process_image',$data_image);
            } 

        
    }
  
     $where = 'design_id = '."'".$design_id."'";      
            $records = $this->design_model->design_list($where);


            $this->load->library('email');
            $this->load->library('parser');
            $config['wordwrap'] = TRUE;
            $config['mailtype'] = 'html';
            $config['charset'] = 'utf-8';
            $config['priority'] = '1';
            $config['crlf'] = "\r\n";
            $config['newline'] = "\r\n";
            //$config['smtp_crypto']  = 'tls';
            $this->email->initialize($config);
            $this->email->from(SITE_EMAIL, SITE_NAME);
            $this->email->to($records['0']->email);
            //$this->email->cc("testcc@domainname.com");
            $this->email->subject('Design with Us');
            //$url = base_url().'UserNewPassword/'.$check_register['email_code'];
            $data_email['fname'] = $records['0']->name;
            //$data_email['email_code'] = $email_code;
            //$this->email->message("Please click on this link for reset password".$url);
            $str_content = '';
            $str_name = ucwords($data_email['fname']);
            $str_url = '<p>Design with Us</p>
            <p>'. $reply .'</p>           
            <p> Reference Number : ' . $records['0']->reference_number . '</p>
            <p> Project Detail : <a style="background-color: #4CAF50;border: none;color: white;padding: 10px;text-align: center;text-decoration:none; display: inline-block; font-size: 16px; margin: 4px 2px;" href=' .base_url().'design-detail/'.$design_id. ' > Click Here </a></p>
            ';
            $data_email['str_final'] = $str_url;
            $msg = $this->load->view('email/email_template', $data_email, TRUE);
            //echo $msg; die;
            $this->email->message($msg);
            $data['message'] = "Sorry Unable to send email...";
            if ($this->email->send()) {
                $data['message'] = "Mail sent...";
            }

     $this->session->set_flashdata('alert_message','Detail Has Been Updated Successfully!');
    redirect(base_url().'design_customization');
  }     
  
  
  //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
  function upload_diamond_image()
  {		
  		$user_id=$this->session->userdata('dns_user_id');
  		$count=0;
	    $files = $_FILES;
	    $cpt = count($_FILES['userfile']['name']);

	    $file_dir='ftp_upload/diamond/image/';
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
					//print_pre($log_data);
					$this->common_model->insertData('tbl_inventory_file_log',$log_data);	
	    }
	    $this->session->set_flashdata('alert_message','Total '.$count.' File Uploaded !');
      redirect(base_url() . "diamond/upload_diamond");
	    
  }
  
  //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
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

  function delete()
  {
    $id=$this->uri->segment(4);
    $where=array('design_id'=>$id);
    $this->common_model->deleteData('tbl_design',$where);
   

    $this->session->set_flashdata('alert_message','Design Has Been Deleted Successfully!');
    redirect(base_url().'design_customization');
  } 
  
  //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	function export_diamond()
  {        
 	 	$where = ""; 
    $all_id=$this->input->get('all_id');
    if($all_id!="") 
    {
    		$all_id=explode(',', $all_id);
        $all_id_arr=implode("','",$all_id);		                    
		    $where .= "diamond_id IN ('".$all_id_arr."')";
    }        
	 	$records = $this->diamond_model->diamond_list($where);
   	// $this->load->view('front/user/products/export_product_excel',$data);

    $this->excel->setActiveSheetIndex(0);
		$this->excel->getActiveSheet()->setTitle('Stock');
		$styleArray = array(
	    'font'  => array(
	        'color' => array('rgb' => '8c0808'),
	        'size'  => 20,
	        'name' => 'Verdana'
	    ));
		$this->excel->getActiveSheet()->setCellValueByColumnAndRow('0','1' ,'Jewelstree');				
		$this->excel->getActiveSheet()->getStyle('A1')->applyFromArray($styleArray);
		$this->excel->getActiveSheet()->mergeCells('A1:Q1');

		$this->excel->getActiveSheet()->setCellValueByColumnAndRow('0','2' ,'Stock#');
		$this->excel->getActiveSheet()->setCellValueByColumnAndRow('1','2' ,'Shape');
                
		$this->excel->getActiveSheet()->setCellValueByColumnAndRow('2','2' ,'Status');
		$this->excel->getActiveSheet()->setCellValueByColumnAndRow('3','2' ,'Cts');
		$this->excel->getActiveSheet()->setCellValueByColumnAndRow('4','2' ,'Color');
		$this->excel->getActiveSheet()->setCellValueByColumnAndRow('5','2' ,'Clarity');
		$this->excel->getActiveSheet()->setCellValueByColumnAndRow('6','2' ,'Cut');
		$this->excel->getActiveSheet()->setCellValueByColumnAndRow('7','2' ,'Pol');
		$this->excel->getActiveSheet()->setCellValueByColumnAndRow('8','2' ,'Sym');
		$this->excel->getActiveSheet()->setCellValueByColumnAndRow('9','2' ,'Flour');
		$this->excel->getActiveSheet()->setCellValueByColumnAndRow('10','2' ,'Disc%');
		$this->excel->getActiveSheet()->setCellValueByColumnAndRow('11','2' ,'Depth%');
		$this->excel->getActiveSheet()->setCellValueByColumnAndRow('12','2' ,'Table%');
		//$this->excel->getActiveSheet()->setCellValueByColumnAndRow('13','2' ,'Rap.($)');
		$this->excel->getActiveSheet()->setCellValueByColumnAndRow('13','2' ,'$/Carat');
		$this->excel->getActiveSheet()->setCellValueByColumnAndRow('14','2' ,'Total $');
		//$this->excel->getActiveSheet()->setCellValueByColumnAndRow('16','2' ,'Descrip');
		$this->excel->getActiveSheet()->setCellValueByColumnAndRow('15','2' ,'Lab');
		//$this->excel->getActiveSheet()->setCellValueByColumnAndRow('18','2' ,'Pic');
		//$this->excel->getActiveSheet()->setCellValueByColumnAndRow('19','2' ,'Brand');
		$this->excel->getActiveSheet()->setCellValueByColumnAndRow('16','2' ,'Measurements');
		//$this->excel->getActiveSheet()->setCellValueByColumnAndRow('21','2' ,'Report No');					
	
    $this->excel->getActiveSheet()->getStyle('A2:Q2')
			->applyFromArray(
	        array(
	            'font' => array(		                
	                'color' => array('rgb' => 'ffffff'),
	                'size'  => 11,
		        			'name' => 'Calibri'
	            ),
	            'fill' => array(
	                'type' => PHPExcel_Style_Fill::FILL_SOLID,
	                'color' => array('rgb' => '2a3968')
	            )
	        )
	    );
    $i=3;		    
    foreach($records as $row) 
    {	    
    		$this->excel->getActiveSheet()->setCellValueByColumnAndRow('0',$i,$row->stock_id);
				$this->excel->getActiveSheet()->setCellValueByColumnAndRow('1',$i,$row->shape);
				$this->excel->getActiveSheet()->setCellValueByColumnAndRow('2',$i,'');
				$this->excel->getActiveSheet()->setCellValueByColumnAndRow('3',$i,number_format($row->weight,1));
				$this->excel->getActiveSheet()->setCellValueByColumnAndRow('4',$i,$row->color);
				$this->excel->getActiveSheet()->setCellValueByColumnAndRow('5',$i,$row->grade);
				$this->excel->getActiveSheet()->setCellValueByColumnAndRow('6',$i,$row->cut);
				$this->excel->getActiveSheet()->setCellValueByColumnAndRow('7',$i,$row->polish);
				$this->excel->getActiveSheet()->setCellValueByColumnAndRow('8',$i,$row->symmetry);
				$this->excel->getActiveSheet()->setCellValueByColumnAndRow('9',$i,$row->fluorescence_int);
				$this->excel->getActiveSheet()->setCellValueByColumnAndRow('10',$i,number_format($row->rapnet_discount,1));
				$this->excel->getActiveSheet()->setCellValueByColumnAndRow('11',$i,number_format($row->Depth,1));
				$this->excel->getActiveSheet()->setCellValueByColumnAndRow('12',$i,(int)$row->table);
				$this->excel->getActiveSheet()->setCellValueByColumnAndRow('13',$i,(int)$row->cost_carat);
				$this->excel->getActiveSheet()->setCellValueByColumnAndRow('14',$i,(int)$row->rapnet);
				//$this->excel->getActiveSheet()->setCellValueByColumnAndRow('15',$i,(int)$row->AM_TOTALPRICE);
				//$this->excel->getActiveSheet()->setCellValueByColumnAndRow('16',$i,$row->SN_ORIGIN);
				$this->excel->getActiveSheet()->setCellValueByColumnAndRow('15',$i,$row->lab);
				//$this->excel->getActiveSheet()->setCellValueByColumnAndRow('18',$i,'');
				//$this->excel->getActiveSheet()->setCellValueByColumnAndRow('19',$i,$row->UDF1);
				$this->excel->getActiveSheet()->setCellValueByColumnAndRow('16',$i,$row->measurements);
				//$this->excel->getActiveSheet()->setCellValueByColumnAndRow('21',$i,'');

				$this->excel->getActiveSheet()->getStyle('D'.$i)->getNumberFormat()->setFormatCode('0.00');
				$this->excel->getActiveSheet()->getStyle('K'.$i)->getNumberFormat()->setFormatCode('0.0');
				$this->excel->getActiveSheet()->getStyle('L'.$i)->getNumberFormat()->setFormatCode('0.0');

				//$this->excel->getActiveSheet()->getCell('P'.$i)->getHyperlink()->setUrl('http://www.gia.net');
				// $this->excel->getActiveSheet()->getStyle('P'.$i)
				// 	->applyFromArray(
			 //        array(
			 //            'font' => array(		                
			 //                'color' => array('rgb' => '0000ff'),
			 //                'size'  => 11,
				//         			'name' => 'Calibri',
				//         			'underline' => PHPExcel_Style_Font::UNDERLINE_SINGLE
			 //            ),					            
			 //        )
			 //    );

				// $total_AM_PRICECTS=$total_AM_PRICECTS+$row->AM_PRICECTS;
				// $total_AM_TOTALPRICE=$total_AM_TOTALPRICE+$row->AM_TOTALPRICE;
				$i++;
    }
    $avg_AM_PRICECTS=$total_AM_PRICECTS/count($records);

    $this->excel->getActiveSheet()->setCellValueByColumnAndRow('0',$i,count($records));
    // $this->excel->getActiveSheet()->setCellValueByColumnAndRow('14',$i,$avg_AM_PRICECTS);
    // $this->excel->getActiveSheet()->setCellValueByColumnAndRow('15',$i,(int)$total_AM_TOTALPRICE);

    $this->excel->getActiveSheet()->getStyle('A'.$i.':Q'.$i.'')
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


	    $this->excel->getActiveSheet()->setAutoFilter('A2:Q2');
	    $this->excel->getActiveSheet()
		    ->getStyle( $this->excel->getActiveSheet()->calculateWorksheetDimension() )
		    ->getAlignment()
		    ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
		
			$filename='Stock'.date('d_m_Y_h_i_s_A').'.xls'; 
			header('Content-Type: application/vnd.ms-excel'); 
			header('Content-Disposition: attachment;filename="'.$filename.'"'); 
			header('Cache-Control: max-age=0'); 				            
			//save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
			//if you want to save it as .XLSX Excel 2007 format
			$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');  
			//force user to download the Excel file without writing it to server's HD
			$objWriter->save('php://output');
  } 
  
	
  


}