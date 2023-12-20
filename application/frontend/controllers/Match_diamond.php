<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Match_diamond extends CI_Controller {

	public function __construct()
	{
	  parent::__construct();	 
	  $this->load->library('pagination'); 
    $this->load->model('diamond_model');
    $this->load->library('excel');
	}   
	function index()
	{	
			$data['title'] = "Matched Diamond";     

			$this->load->view('common/header');
			$this->load->view('diamond/match_diamond',$data);
			$this->load->view('common/footer');
	}
	function load_more_data()
  {
      $page=$this->input->get('page');
      $per_page=$this->input->get('per_page');
      // $per_page= ($per_page) ? $per_page : 200 ;
      // $page= ($page) ? $page : 0 ;
      //$where=$this->input->get('where');
     
     $where=" diamond_id > 0 ";
      $where_shape=" rapnet > 0 ";     
     /* search by stock*/
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
          $where .= " AND stock_id IN ('".$q1stock."')";             
      }
     /* search by shape*/
      $shape = $this->input->get('checkbox');      
      if(!empty($shape))
      {         
          $q1=implode("','",$shape);
          $where .= " AND shape IN ('".$q1."')"; 
          $where_shape .= " AND shape IN ('".$q1."')";
      }     
                
      /* search by Color*/
     $color = $this->input->get('color');                  
     if(!empty($color))
     {
         $color_array=array("D", "E", "F", "G", "H", "I", "J", "K", "L", "M");
         $color_array=$this->find_range($color,$color_array);
         $q2=implode("','",$color_array);
         $where .= " AND color IN ('".$q2."')";           
     }
      /* search by Cut*/
       $checkboxcut = $this->input->get('cut');                
       if(!empty($checkboxcut))
       {
          $array_va=array("Excellent", "Very Good", "Good", "Fair");
          $checkboxcut=$this->find_range($checkboxcut,$array_va);
         foreach ($checkboxcut as $key => $value) {
           if($value=='Very Good')
           {
             $checkboxcut[]='VG';
             $checkboxcut[]='V';
           }
           else if($value=='Excellent')
           {
             $checkboxcut[]='EX';
             $checkboxcut[]='X';
           }
           else if($value=='Good')
           {
             $checkboxcut[]='G';
           }
           else if($value=='Fair')
           {
             $checkboxcut[]='FR';
             $checkboxcut[]='I';
             //$checkboxcut[]='P';
           }
          
         }
           $qcut = implode("','", $checkboxcut);
           $where .= " AND cut IN ('".$qcut."')";       
       }     
      /* search by Polish*/
       $checkboxpolish = $this->input->get('polish');                
       if(!empty($checkboxpolish))
       {
          $array_va=array("Excellent", "Very Good", "Good", "Fair");
          $checkboxpolish=$this->find_range($checkboxpolish,$array_va);
         foreach ($checkboxpolish as $key => $value) {
           if($value=='Very Good')
           {
             $checkboxpolish[]='VG';
             $checkboxpolish[]='V';
           }
           else if($value=='Excellent')
           {
             $checkboxpolish[]='EX';
             $checkboxpolish[]='X';
           }
           else if($value=='Good')
           {
             $checkboxpolish[]='G';
           }
           else if($value=='Fair')
           {
             $checkboxpolish[]='FR';
             $checkboxpolish[]='I';
             //$checkboxpolish[]='P';
           }
          
         }
          $qpolish = implode("','", $checkboxpolish);
          $where .= " AND polish IN ('".$qpolish."')";       
       }     
      /* search by Symm*/
      
       $checkboxsymm = $this->input->get('symmetry');                
       if(!empty($checkboxsymm))
       {
          $array_va=array("Excellent", "Very Good", "Good", "Fair");
          $checkboxsymm=$this->find_range($checkboxsymm,$array_va);
         foreach ($checkboxsymm as $key => $value) {
           if($value=='Very Good')
           {
             $checkboxsymm[]='V';
             $checkboxsymm[]='VG';
           }
           else if($value=='Excellent')
           {
             $checkboxsymm[]='EX';
             $checkboxsymm[]='X';
           }
           else if($value=='Good')
           {
             $checkboxsymm[]='G';
           }
           else if($value=='Fair')
           {
             $checkboxsymm[]='FR';
             $checkboxsymm[]='I';
             //$checkboxsymm[]='P';
           }
          
         }
          $qsymm = implode("','", $checkboxsymm);
          $where .= " AND symmetry IN ('".$qsymm."')";       
       }         
      /* search by Clarity*/
      $checkboxClarity = $this->input->get('clarity');
       if(!empty($checkboxClarity))
       {
        $clarity_va=array("FL","IF","VVS1","VVS2","VS1","VS2","SI1","SI2","SI3","I1","I2","I3");
        $checkboxClarity=$this->find_range($checkboxClarity,$clarity_va);
         
         foreach ($checkboxClarity as $key => $value) {
           if($value=='I1-')
           {
             $checkboxClarity[]='I1';
             $checkboxClarity[]='I2';
             $checkboxClarity[]='I3';
           }
         }
          $qClarity = implode("','", $checkboxClarity);
          $where .= " AND grade IN ('".$qClarity."')"; 
          //print_ex($where);     
       }       
      /* search by Flour*/
      $checkboxFlour = $this->input->get('fluorescence');
       if(!empty($checkboxFlour))
       {
          $array_va=array("NON", "FNT", "MED", "STG","VST");
          $checkboxFlour=$this->find_range($checkboxFlour,$array_va);

         foreach ($checkboxFlour as $key => $value) {
           if($value=='NON')
           {
             $checkboxFlour[]='N';
           }
           else if($value=='FNT')
           {
             $checkboxFlour[]='F';
           }
           else if($value=='MED')
           {
             $checkboxFlour[]='M';
           }
           else if($value=='STG')
           {
             $checkboxFlour[]='S';
           }
           else if($value=='VST')
           {
             $checkboxFlour[]='VS';
             $checkboxFlour[]='VSB';
           }
         }
         $qFlour = implode("','", $checkboxFlour);
         $where .= " AND fluorescence_int IN ('".$qFlour."')";       
       }     
    
      /* search by Lab */
      $cert = $this->input->get('cert');      
      if(!empty($cert))
      {      
          foreach ($cert as $key => $value) {
            if($value=='None')
            {            
              $cert[]='NA';
              $cert[]='NC';
              $cert[]='Uncertified';              
            }           
          }   
          $q1=implode("','",$cert);
          $where .= " AND lab IN ('".$q1."')"; 
      }
      
      /* search by Range */
      $range = $this->input->get('size');
      $split = explode(';', $range);
      $split1 = @$split['0'];    
      $split2 = @$split['1'];
      if($split2==6)
      {
        $split2=25;
      }     
      if(!empty($range))
      {        
        $where .= " AND weight BETWEEN ('".$split1."') AND ('".$split2."')";     
      }
           
      /* search by Total */
      $total = $this->input->get('price');
      $splittotal = explode(';', $total);
      $splittotal1 = $splittotal['0'];
      $splittotal2 = @$splittotal['1'];    
      if(!empty($total))
      {
         $where .= " AND rapnet BETWEEN ('".$splittotal1."') AND ('".$splittotal2."')";         
      }
      else
      {
         $where .= " AND rapnet BETWEEN ('0') AND ('1000000')";         
      }
      //print_ex($where);
      $records_count = $this->diamond_model->diamond_count($where);
      $data['records_count'] =$records_count['0']->diamond_count;       
      $records_count =$records_count['0']->diamond_count; 
      $total_count=round(($records_count/$per_page));

      $per_page= ($per_page) ? $per_page : 200 ;
      $config['base_url'] = base_front().'match_diamond/load_more_data';
      $config['total_rows'] = $data['records_count'];
      $config['per_page'] = $per_page;
      $config['page_query_string']= true;
      $config['query_string_segment'] = 'page';
      $config['cur_tag_open'] = '<a class="active paginate_button current">';
      $config['cur_tag_close'] = '</a>';
      $config['next_link'] = '>';
      $config['prev_link'] = '<';
      $config['num_links'] = 2;
      $config['first_link'] = false;
      $config['last_link'] = false;
      
      $page= ($page) ? $page : 0 ;
      $this->pagination->initialize($config);
      $page_link=$this->pagination->create_links();

      $records = $this->diamond_model->diamond_list_match($where,$per_page,$page);
      $similar_records=array();
      //print_pre($records);
      //$matching_count=2;
      $matching_count = $this->input->get('matching_count');
      $matching_weight = $this->input->get('matching_weight'); 
      $matching_depth = $this->input->get('matching_depth');
      $matching_table = $this->input->get('matching_table'); 
      $matching_color = $this->input->get('matching_color');
      $matching_clarity = $this->input->get('matching_clarity');
      $matching_cut = $this->input->get('matching_cut');
      $matching_polish = $this->input->get('matching_polish');
      $matching_symmetry = $this->input->get('matching_symmetry'); 
      $matching_fluorescence = $this->input->get('matching_fluorescence');
      $matching_margin_length = $this->input->get('matching_margin_length');
      $matching_margin_width = $this->input->get('matching_margin_width');
      $matching_margin_depth = $this->input->get('matching_margin_depth');

      $total_size = $this->input->get('size');
      $total_size1 = 0;    
      $total_size2 = 20;

      $total_price = $this->input->get('price');
      $total_price1 = 0;    
      $total_price2 = 1000000;

      if(!empty($total_size))
      {
        $total_size = explode(';', $total_size);
        $total_size1 = @$total_size['0'];    
        $total_size2 = @$total_size['1'];
      }
      if(!empty($total_price))
      {
        $total_price = explode(';', $total_price);
        $total_price1 = @$total_price['0'];    
        $total_price2 = @$total_price['1'];
      }        
      $similars=array();
      foreach ($records as $row) 
      {
        $where1 ="";
        $where1 .="diamond_id >= ".$row->diamond_id;

        $where1 .=" AND shape = '".$row->shape."'";

        $w_per=percent($row->weight,$matching_weight);
        $range1= $row->weight-$w_per; 
        $range2= $row->weight+$w_per;
        $where1 .= " AND weight BETWEEN ('".$range1."') AND ('".$range2."')"; 
        //------------------------------------------------------------------------
        $d_per=percent($row->depth,$matching_depth);
        $range1= $row->depth-$d_per; 
        $range2= $row->depth+$d_per;
        $where1 .= " AND depth BETWEEN ('".$range1."') AND ('".$range2."')";  
        //------------------------------------------------------------------------
        $t_per=percent($row->table_d,$matching_table);
        $range1= $row->table_d-$t_per; 
        $range2= $row->table_d+$t_per;
        $where1 .= " AND table_d BETWEEN ('".$range1."') AND ('".$range2."')";  
        //------------------------------------------------------------------------
        $color_array=array("D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O","P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z");
        $color_array=$this->find_range_grade($matching_color,$row->color,$color_array);
        $q2=implode("','",$color_array);
        $where1 .= " AND color IN ('".$q2."')"; 
        //------------------------------------------------------------------------
        $clarity_va=array("FL","IF","VVS1","VVS2","VS1","VS2","SI1","SI2","SI3","I1","I2","I3");
        $clarity_va=$this->find_range_grade($matching_clarity,$row->grade,$clarity_va);
        $qClarity = implode("','", $clarity_va);
        $where1 .= " AND grade IN ('".$qClarity."')"; 
        //------------------------------------------------------------------------ 
        $array_cut=array("EX", "VG", "G", "FR");
        $array_cut=$this->find_range_grade($matching_cut,$row->cut,$array_cut);
         foreach ($array_cut as $key => $value) {
           if($value=='VG')
           {
             $array_cut[]='V';
           }
           else if($value=='EX')
           {
             $array_cut[]='X';
           }           
         }
          if(in_array('Round',  $shape))
          {
            $qcut = implode("','", $array_cut);
            $where1 .= " AND cut IN ('".$qcut."')"; 
          }
        //------------------------------------------------------------------------       
        $array_pol=array("EX", "VG", "G", "FR");
        $array_pol=$this->find_range_grade($matching_polish,$row->polish,$array_pol);
         foreach ($array_pol as $key => $value) {
           if($value=='VG')
           {
             $array_pol[]='V';
           }
           else if($value=='EX')
           {
             $array_pol[]='X';
           }           
         }
        $qpol = implode("','", $array_pol);
        $where1 .= " AND polish IN ('".$qpol."')"; 
        //------------------------------------------------------------------------
        $array_sym=array("EX", "VG", "G", "FR");
        $array_sym=$this->find_range_grade($matching_symmetry,$row->symmetry,$array_sym);
         foreach ($array_sym as $key => $value) {
           if($value=='VG')
           {
             $array_sym[]='V';
           }
           else if($value=='EX')
           {
             $array_sym[]='X';
           }                   
         }
        $qsym = implode("','", $array_sym);
        $where1 .= " AND symmetry IN ('".$qsym."')";
        //------------------------------------------------------------------------
        $array_fl1=array();
        $array_fl=array("N", "F", "M", "S","VS");
        $array_fl=$this->find_range_grade($matching_fluorescence,$row->fluorescence_int,$array_fl);
         foreach ($array_fl as $key => $value) {
           if($value=='N')
           {
             $array_fl1[]='NON';
             $array_fl1[]='N';
           }
           else if($value=='F')
           {
             $array_fl1[]='FNT';
             $array_fl1[]='F';
           }
           else if($value=='M')
           {
             $array_fl1[]='MED';
             $array_fl1[]='M';
           }
           else if($value=='S')
           {
             $array_fl1[]='STG';
             $array_fl1[]='S';
           }
           else if($value=='VS')
           {
             $array_fl1[]='VST';
             $array_fl1[]='VSB';
             $array_fl1[]='VS';
           }
         }
        $qflr = implode("','", $array_fl1);
        $where1 .= " AND fluorescence_int IN ('".$qflr."')"; 
        //------------------------------------------------------------------------
        $m_length=percent($row->m_length,$matching_margin_length);
        $range1= $row->m_length-$m_length; 
        $range2= $row->m_length+$m_length;
        //$where1 .= " AND m_length BETWEEN ('".$range1."') AND ('".$range2."')"; 
        //------------------------------------------------------------------------
        $m_width=percent($row->m_width,$matching_margin_width);
        $range1= $row->m_width-$m_width; 
        $range2= $row->m_width+$m_width;
        //$where1 .= " AND m_width BETWEEN ('".$range1."') AND ('".$range2."')"; 
        //------------------------------------------------------------------------
        $m_depth=percent($row->m_depth,$matching_margin_depth);
        $range1= $row->m_depth-$m_depth; 
        $range2= $row->m_depth+$m_depth;
        //$where1 .= " AND m_depth BETWEEN ('".$range1."') AND ('".$range2."')"; 
        //------------------------------------------------------------------------
        //echo $row->stock_id;
        //print_pre($where1);
        $similar_arr=$this->diamond_model->diamond_list_match1($where1);
        //print_pre($similar_arr);

        if(count($similar_arr) > $matching_count-1)
        {  
          $total_weight=0;
          $total_price =0;
          foreach ($similar_arr as $key => $value) 
          {
            if($key >= $matching_count)
            {
              continue;
            }
            $similar_records[$row->diamond_id][$key]['stock_id'] = $value->stock_id;
            $similar_records[$row->diamond_id][$key]['weight'] = $value->weight;
            $similar_records[$row->diamond_id][$key]['depth'] = $value->depth;
            $similar_records[$row->diamond_id][$key]['diamond_id'] = $value->diamond_id;
            $similar_records[$row->diamond_id][$key]['shape'] = $value->shape_full;
            $similar_records[$row->diamond_id][$key]['color'] = $value->color;
            $similar_records[$row->diamond_id][$key]['grade'] = $value->grade;
            $similar_records[$row->diamond_id][$key]['cut'] = $value->cut_full;
            $similar_records[$row->diamond_id][$key]['polish'] = $value->polish_full;
            $similar_records[$row->diamond_id][$key]['symmetry'] = $value->symmetry_full;
            $similar_records[$row->diamond_id][$key]['fluorescence_int'] = $value->fluorescence_int;
            $similar_records[$row->diamond_id][$key]['table_d'] = $value->table_d;
            
            //$discount=((($value->rap_price -$value->cost_per_carat)*100)/$value->rap_price);
            $similar_records[$row->diamond_id][$key]['rapnet_discount'] = $value->rapnet_discount;
            $similar_records[$row->diamond_id][$key]['cost_carat'] = $value->cost_carat;
            $similar_records[$row->diamond_id][$key]['rapnet'] = $value->rapnet;
            $similar_records[$row->diamond_id][$key]['cash_price'] = $value->rapnet;
            $similar_records[$row->diamond_id][$key]['lab'] = $value->lab;
            $similar_records[$row->diamond_id][$key]['report_no'] = $value->report_no;
            $similar_records[$row->diamond_id][$key]['measurements'] = $value->measurements;

            $total_weight += $value->weight;
            $total_price += $value->rapnet; 

            //echo $value->fluor_full;
            //echo $value->fluorescence_int; echo "<br>";     

          }
          foreach ($similar_records[$row->diamond_id] as $key => $value) 
          {                
              $similar_records[$row->diamond_id][$key]['total_weight'] = $total_weight;
              $similar_records[$row->diamond_id][$key]['total_price'] = $total_price; 
          }

        }
        //print_pre($similar_records);
        
      }
      //print_pre($similar_records);
      //exit;
      
      foreach ($similar_records as $key => $value) 
      {
        $object = $similar_records[$key];
        $k=0;
        foreach ($object as $key1 => $value1) 
        {            
            if(($value1['total_weight'] < $total_size1  || $value1['total_weight'] > $total_size2) || ($value1['total_price'] < $total_price1  || $value1['total_price'] > $total_price2))
            {  
              break;
            }
            $similars[$key][$k]['stock_id'] = $value1['stock_id'];
            $similars[$key][$k]['weight'] = $value1['weight'];
            $similars[$key][$k]['depth'] = $value1['depth'];
            $similars[$key][$k]['diamond_id'] = $value1['diamond_id'];
            $similars[$key][$k]['shape'] = $value1['shape'];
            $similars[$key][$k]['color'] = $value1['color'];
            $similars[$key][$k]['grade'] = $value1['grade'];
            $similars[$key][$k]['cut'] = $value1['cut'];
            $similars[$key][$k]['polish'] = $value1['polish'];
            $similars[$key][$k]['symmetry'] = $value1['symmetry'];
            $similars[$key][$k]['fluorescence_int'] = $value1['fluorescence_int'];
            $similars[$key][$k]['table_d'] = $value1['table_d'];
            $similars[$key][$k]['rapnet_discount'] = $value1['rapnet_discount'];
            $similars[$key][$k]['cost_carat'] = $value1['cost_carat'];
            $similars[$key][$k]['rapnet'] = $value1['rapnet'];
            $similars[$key][$k]['cash_price'] = $value1['cash_price'];
            $similars[$key][$k]['lab'] = $value1['lab'];
            $similars[$key][$k]['report_no'] = $value1['report_no'];
            $similars[$key][$k]['measurements'] = $value1['measurements'];
            $similars[$key][$k]['total_weight'] = $value1['total_weight'];
            $similars[$key][$k]['total_price'] = $value1['total_price'];
            $k++;
        }
      }
      //print_ex($similars);

      echo json_encode(
        array(
          'records'=>array_values($similars),
          'page_link'=>$page_link,
          'total_records'=>count($similars),
          'total_count'=>$total_count,
          'total_count'=>$total_count,
          'records_count'=>$records_count,
        )
      );
      //echo json_encode(array('records'=>$similar_records));
  }

  function diamond_details()
  {
  	 $inventory_id = $this->uri->segment(2);
	  
	  //$inventory_id = $this->input->get('inventory_id');
       
      $image_array=array();
      $image_link=array();
      $video_array=array();
      $video_link=array();
      $certificate_array=array();
      $where = 'diamond_id = '."'".$inventory_id."'";      
      $records = $this->diamond_model->diamond_list($where);
      
      if(count($records))
      {
        $file='ftp_upload/diamond/image/'.$records['0']->stock_id.'.jpg';

        if(file_exists($file))
        {
            $image_array[]=$file;
        } 
        for($i=1;$i<=5;$i++)
        {
            $file='ftp_upload/diamond/image/'.$records['0']->stock_id.'_'.$i.'.jpg';

            if(file_exists($file))
            {
                $image_array[]=$file;
            } 
        }
        // if($records['0']->diamond_image!="")
        // {
        //     $image_link[]=$records['0']->diamond_image;
        // }
        if(!count($image_array))
        {
            $file='assets/No_image.jpg';            
            if(file_exists($file))
            {
                $image_array[]=$file;
            } 
        }
        $video='ftp_upload/diamond/video/'.$records['0']->stock_id.'.mp4';
        if(file_exists($video))
        {
            $video_array[]=$video;
        } 
        if($records['0']->diamond_video!="")
        {
            $video_link[]=$records['0']->diamond_video;
        }
        $certificate='ftp_upload/diamond/certificate/'.$records['0']->report_no.'.pdf';
        if(file_exists($certificate))
        {
            $certificate_array[]=$certificate;
        }
        //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
		    $crange1= number_format($records['0']->weight-0.20,2); 
        $crange2= number_format($records['0']->weight+0.20,2);
        $where1 = " weight BETWEEN (".$crange1.") AND (".$crange2.")";

        $shape[]=$records['0']->shape;
        if($records['0']->shape=='RBC')
        {            
          $shape[]='Round';
          $shape[]='ROUND';              
        }
       
        $where1 .= " AND lab NOT IN ('NONE','None','NA','NC','N','NULL')"; 

        $s1=implode("','",$shape);
        $where1 .= " AND shape IN ('".$s1."')";

        $similar_records = $this->diamond_model->diamond_list_limit($where1,10,0);
        //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
      }
      else
      {
        redirect(base_url().'loose-diamond');
      } 
      //print_pre($image_link);   
      $data= array(
          'records'=>$records,
          'similar_records'=>$similar_records,
          'image_array'=>$image_array,
          'video_array'=>$video_array,
          'certificate_array'=>$certificate_array,
          'image_link'=>$image_link,
          'video_link'=>$video_link
        );
  		//print_ex($data);
  		

  			$data['title'] = "Loose Diamond";     

			$this->load->view('common/header');
			$this->load->view('diamond/mydiamond_details',$data);
			$this->load->view('common/footer');
  }
  
  //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	function export_diamond()
  {        
 	 	$where = ""; 
    $all_id_array=array();
    $matching_count=$this->input->get('matching_count');
    $dis_value=$this->input->get('dis_value');
    $all_id=$this->input->get('all_id');
    if($all_id!="") 
    {
    		$all_id_array=explode(',', $all_id);
    }
  
    $this->excel->setActiveSheetIndex(0);
		$this->excel->getActiveSheet()->setTitle('Stock');
		$styleArray = array(
	    'font'  => array(
	        'color' => array('rgb' => '8c0808'),
	        'size'  => 18,
	        'name' => 'Verdana',
			    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,        			
	    ));	

		$this->excel->getActiveSheet()->setCellValueByColumnAndRow('0','1' ,'Stock#');
		$this->excel->getActiveSheet()->setCellValueByColumnAndRow('1','1' ,'Shape');
		$this->excel->getActiveSheet()->setCellValueByColumnAndRow('2','1' ,'Carat');
    $this->excel->getActiveSheet()->setCellValueByColumnAndRow('3','1' ,'Total Carat');
		$this->excel->getActiveSheet()->setCellValueByColumnAndRow('4','1' ,'Color');
		$this->excel->getActiveSheet()->setCellValueByColumnAndRow('5','1' ,'Clarity');
		$this->excel->getActiveSheet()->setCellValueByColumnAndRow('6','1' ,'Cut');
		$this->excel->getActiveSheet()->setCellValueByColumnAndRow('7','1' ,'Polish');
		$this->excel->getActiveSheet()->setCellValueByColumnAndRow('8','1' ,'Symmetry');
		$this->excel->getActiveSheet()->setCellValueByColumnAndRow('9','1' ,'Fluorescence');
		
		$this->excel->getActiveSheet()->setCellValueByColumnAndRow('10','1' ,'Depth%');
		$this->excel->getActiveSheet()->setCellValueByColumnAndRow('11','1' ,'Table%');
		$this->excel->getActiveSheet()->setCellValueByColumnAndRow('12','1' ,'$/Carat');
		$this->excel->getActiveSheet()->setCellValueByColumnAndRow('13','1' ,'Price $');
    $this->excel->getActiveSheet()->setCellValueByColumnAndRow('14','1' ,'Total Price $');
		$this->excel->getActiveSheet()->setCellValueByColumnAndRow('15','1' ,'Lab');
		$this->excel->getActiveSheet()->setCellValueByColumnAndRow('16','1' ,'Measurements');			
	
    $this->excel->getActiveSheet()->getStyle('A1:S1')
			->applyFromArray(
	        array(
	            'font' => array(		                
	                'color' => array('rgb' => '000000'),
	                'size'  => 11,
		        			'name' => 'Calibri'
	            ),
	            'fill' => array(
	                'type' => PHPExcel_Style_Fill::FILL_SOLID,
	                'color' => array('rgb' => 'ffa600')
	            )
	        )
	    );
    $i=2;	$j=1;	
    $total_carat=0;  
    $total_price=0;  
    foreach ($all_id_array as $key => $value) {
      if($j>$matching_count){
        $this->excel->getActiveSheet()->setCellValueByColumnAndRow('0',$i,'');
        $this->excel->getActiveSheet()->setCellValueByColumnAndRow('1',$i,'');       
        $this->excel->getActiveSheet()->setCellValueByColumnAndRow('2',$i,'');
        $this->excel->getActiveSheet()->setCellValueByColumnAndRow('3',$i,'');
        $this->excel->getActiveSheet()->setCellValueByColumnAndRow('4',$i,'');
        $this->excel->getActiveSheet()->setCellValueByColumnAndRow('5',$i,'');
        $this->excel->getActiveSheet()->setCellValueByColumnAndRow('6',$i,'');
        $this->excel->getActiveSheet()->setCellValueByColumnAndRow('7',$i,'');
        $this->excel->getActiveSheet()->setCellValueByColumnAndRow('8',$i,'');
        $this->excel->getActiveSheet()->setCellValueByColumnAndRow('9',$i,'');
        $this->excel->getActiveSheet()->setCellValueByColumnAndRow('10',$i,'');
        $this->excel->getActiveSheet()->setCellValueByColumnAndRow('11',$i,'');
        $this->excel->getActiveSheet()->setCellValueByColumnAndRow('12',$i,'');  
        $this->excel->getActiveSheet()->setCellValueByColumnAndRow('13',$i,'');       
        $this->excel->getActiveSheet()->setCellValueByColumnAndRow('14',$i,'');        
        $this->excel->getActiveSheet()->setCellValueByColumnAndRow('15',$i,'');
        $this->excel->getActiveSheet()->setCellValueByColumnAndRow('16',$i,'');

        $i++; $j=1;
      }
    // }
    // foreach($records as $row) 
    // {	    

        $where = "diamond_id = ".$value;         
        $records = $this->diamond_model->diamond_list($where);
        $row=$records['0'];

        $new_discount=$row->rapnet_discount+$dis_value;
        $total=(($row->rapnet*$new_discount)/100);
        $ppc=($row->rapnet-$total);
        $new_total=($ppc*$row->weight);

    		$this->excel->getActiveSheet()->setCellValueByColumnAndRow('0',$i,$row->stock_id);
				$this->excel->getActiveSheet()->setCellValueByColumnAndRow('1',$i,$row->shape_full);				
				$this->excel->getActiveSheet()->setCellValueByColumnAndRow('2',$i,number_format($row->weight,2));
				$this->excel->getActiveSheet()->setCellValueByColumnAndRow('3',$i,"");
        $this->excel->getActiveSheet()->setCellValueByColumnAndRow('4',$i,$row->color);
				$this->excel->getActiveSheet()->setCellValueByColumnAndRow('5',$i,$row->grade);
				$this->excel->getActiveSheet()->setCellValueByColumnAndRow('6',$i,$row->cut_full);
				$this->excel->getActiveSheet()->setCellValueByColumnAndRow('7',$i,$row->polish_full);
				$this->excel->getActiveSheet()->setCellValueByColumnAndRow('8',$i,$row->symmetry_full);
				$this->excel->getActiveSheet()->setCellValueByColumnAndRow('9',$i,$row->fluor_full);
				
				$this->excel->getActiveSheet()->setCellValueByColumnAndRow('10',$i,number_format($row->depth,1));
				$this->excel->getActiveSheet()->setCellValueByColumnAndRow('11',$i,(int)$row->table_d);
				$this->excel->getActiveSheet()->setCellValueByColumnAndRow('12',$i,(int)$row->cost_carat);
				$this->excel->getActiveSheet()->setCellValueByColumnAndRow('13',$i,(int)$row->rapnet);				
				$this->excel->getActiveSheet()->setCellValueByColumnAndRow('14',$i,"");	
        $this->excel->getActiveSheet()->setCellValueByColumnAndRow('15',$i,$row->lab);			
				$this->excel->getActiveSheet()->setCellValueByColumnAndRow('16',$i,$row->measurements);	

        $total_carat =$total_carat+number_format($row->weight,2);
        $total_price =$total_price+$row->rapnet;
			
				$i++; $j++;
        if($j>$matching_count)
        { 
          $this->excel->getActiveSheet()->setCellValueByColumnAndRow('3',$i-$matching_count,number_format($total_carat,2));
          $this->excel->getActiveSheet()->setCellValueByColumnAndRow('14',$i-$matching_count,(int)$total_price);
          $total_carat=0;
          $total_price=0;
        }
    }
    $avg_AM_PRICECTS=$total_AM_PRICECTS/count($records);

    $this->excel->getActiveSheet()->getStyle('A'.$i.':S'.$i.'')
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

	    $this->excel->getActiveSheet()
		    ->getStyle( $this->excel->getActiveSheet()->calculateWorksheetDimension() )
		    ->getAlignment()
		    ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
		
			$filename='JofC_Diamonds_'.date('d_m_Y_h_i_s_A').'.xls'; 
			header('Content-Type: application/vnd.ms-excel'); 
			header('Content-Disposition: attachment;filename="'.$filename.'"'); 
			header('Cache-Control: max-age=0'); 				            
			//save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
			//if you want to save it as .XLSX Excel 2007 format
			$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');  
			//force user to download the Excel file without writing it to server's HD
			$objWriter->save('php://output');
  }
  function find_range($range,$array_from)
  {
      $split = explode(';', $range);
      $split1 = @$split['0'];    
      $split2 = @$split['1'];
      $split1_key = array_search($split1, $array_from); 
      $split2_key = array_search($split2, $array_from);
      for ($i=$split1_key; $i <= $split2_key; $i++) { 
          $array[]=$array_from[$i];
      }
      return $array;
  } 
  function find_range_grade($grade,$value,$array_from)
  {  
      $split_key = array_search($value, $array_from);

      $split1_key = $split_key-$grade; 
      if($split1_key<0)
      {
        $split1_key =0;
      }
      $split2_key = $split_key+$grade;
      if($split2_key>=count($array_from))
      {
        $split2_key =count($array_from)-1;
      }

      for ($i=$split1_key; $i <= $split2_key; $i++) { 
          $array[]=$array_from[$i];
      }
      return $array;  
  } 

	///////////////////////////////
	function print_data()
	{
    $matching_count=$this->input->post('matching_count');
		$all_id=$this->input->post('all_id');
    $records=array();
  
    $i=0; $j=1;
    foreach ($all_id as $key => $value) {
      if($j>$matching_count){        
        $records[$i]['stock_id'] = '';
        $records[$i]['weight'] = '';
        $records[$i]['depth'] = '';
        $records[$i]['diamond_id'] = '';
        $records[$i]['shape'] = '';
        $records[$i]['color'] = '';
        $records[$i]['grade'] = '';
        $records[$i]['cut'] = '';
        $records[$i]['polish'] = '';
        $records[$i]['symmetry'] = '';
        $records[$i]['fluorescence_int'] = '';
        $records[$i]['table_d'] = '';
        $records[$i]['rapnet_discount'] = '';
        $records[$i]['cost_carat'] = '';
        $records[$i]['rapnet'] = '';
        $records[$i]['cash_price'] = '';
        $records[$i]['lab'] = '';
        $records[$i]['report_no'] = '';
        $records[$i]['measurements'] = '';
        $records[$i]['total_weight'] = "";
        $records[$i]['total_price'] = "";

        $i++; $j=1;
      }

      $where = "diamond_id =".$value;     
      $result = $this->diamond_model->diamond_list($where);
      $row=$result['0'];

      $records[$i]['stock_id'] = $row->stock_id;
      $records[$i]['weight'] = $row->weight;
      $records[$i]['depth'] = $row->depth;
      $records[$i]['diamond_id'] = $row->diamond_id;
      $records[$i]['shape'] = $row->shape_full;
      $records[$i]['color'] = $row->color;
      $records[$i]['grade'] = $row->grade;
      $records[$i]['cut'] = $row->cut_full;
      $records[$i]['polish'] = $row->polish_full;
      $records[$i]['symmetry'] = $row->symmetry_full;
      $records[$i]['fluorescence_int'] = $row->fluor_full;
      $records[$i]['table_d'] = $row->table_d;
      $records[$i]['rapnet_discount'] = $row->rapnet_discount;
      $records[$i]['cost_carat'] = $row->cost_carat;
      $records[$i]['rapnet'] = $row->rapnet;
      $records[$i]['cash_price'] = $row->rapnet;
      $records[$i]['lab'] = $row->lab;
      $records[$i]['report_no'] = $row->report_no;
      $records[$i]['measurements'] = $row->measurements;
      $records[$i]['total_weight'] = "";
      $records[$i]['total_price'] = "";

      $i++; $j++;

      $total_weight += $row->weight;
      $total_price += $row->rapnet;
      if($j>$matching_count)
      {
          $records[$i-$matching_count]['total_weight'] = $total_weight;
          $records[$i-$matching_count]['total_price'] = $total_price;
          $total_carat=0;
          $total_price=0; 
      }
    }                     
                   
		echo json_encode(array('records'=>$records));
	}
	

	
	
	// for send diamond details to friend    
	function send_data()
	{    
      $all_id=$this->input->post('checkbox_arr');
      $name=$this->input->post('name');		
      $email=$this->input->post('email');
      // $markup=$this->input->post('markup');
      $message=$this->input->post('message');
      //$all_id=$this->input->get('checkbox_arr');
      if($all_id!="") 
      {
          $all_id=explode(',', $all_id);
          $all_id_arr=implode("','",$all_id);                       
          $where .= "diamond_id IN ('".$all_id_arr."')";
      }        
      $records = $this->diamond_model->diamond_list($where);
      //print_ex($records);

      $this->load->library('email');
   		$this->load->library('parser');
		
			$config['wordwrap'] = TRUE;

			$config['mailtype'] = 'html';
			
			$config['charset'] = 'utf-8';

			$config['priority'] = '1';
			
			$config['crlf']      = "\r\n";
			
			$config['newline']      = "\r\n";

			//$config['smtp_crypto']  = 'tls';
			
			$this->email->initialize($config);
			
			$this->email->from(SITE_EMAIL,SITE_NAME);
      //$this->email->from($vendor_email,$vendor_name);
      $this->email->to($email);
      $this->email->subject("Carats USA Diamond List");

      //$data_email['fname'] = $name;
			
			$str_content = '';
			//$str_name = ucwords($data_email['fname']);
    			$str_url = '<p>Message : '.$message.'</p><table id="myTable" border="1" class="tablesorter table table-bordered table-responsive table-condensed" style="border-collapse: collapse;"> 
          <thead class="btn-gray"> 
            <tr>
                <th style="border: 1px solid black; text-align: center;" >Stock</th>                       
                <th style="border: 1px solid black; text-align: center;" >Shape</th>
                <th style="border: 1px solid black; text-align: center;" >Cts</th>
                <th style="border: 1px solid black; text-align: center;" >Color</th>                  
                <th style="border: 1px solid black; text-align: center;" >Clarity</th>
                <th style="border: 1px solid black; text-align: center;" >Cut</th>
                <th style="border: 1px solid black; text-align: center;" >Polish</th>                    
                <th style="border: 1px solid black; text-align: center;" >Symmetry</th>
                <th style="border: 1px solid black; text-align: center;" >Fluorescence</th>                    
                <th style="border: 1px solid black; text-align: center;" >Depth%</th>                    
                <th style="border: 1px solid black; text-align: center;" >Table%</th>  
                <th style="border: 1px solid black; text-align: center;" >Disc%</th>               
                <th style="border: 1px solid black; text-align: center;" >$/Carat</th>
                <th style="border: 1px solid black; text-align: center;" >Total $</th>                  
                <th style="border: 1px solid black; text-align: center;" >Lab</th>                  
                <th style="border: 1px solid black; text-align: center;" >Measurements</th>                
            </tr>
        </thead>    
        <tbody id="add_data" style=""> ';
             //$cnt = 1;
        foreach($records as $row) 
        {                
      			$str_url .='<tr style="border: 1px solid black; text-align: center;">
                     <td style="border: 1px solid black; text-align: center;">'.$row->stock_id.'</td>
                      <td style="border: 1px solid black; text-align: center;">'.$row->shape_full.'</td>
                      <td style="border: 1px solid black; text-align: center;">'.number_format($row->weight,2).'</td>              
                      <td style="border: 1px solid black; text-align: center;">'.$row->color.'</td>
                      <td style="border: 1px solid black; text-align: center;">'.$row->grade.'</td>
                      <td style="border: 1px solid black; text-align: center;">'.$row->cut.'</td>
                      <td style="border: 1px solid black; text-align: center;">'.$row->polish.'</td>
                      <td style="border: 1px solid black; text-align: center;">'.$row->symmetry.'</td>
                      <td style="border: 1px solid black; text-align: center;">'.$row->fluorescence_int.'</td>
                      <td style="border: 1px solid black; text-align: center;">'.number_format($row->depth,1).'</td>
                      <td style="border: 1px solid black; text-align: center;">'.$row->table_d.'</td>
                      <td style="border: 1px solid black; text-align: center;">'.number_format($row->rapnet_discount,1).'</td>                
                      <td style="border: 1px solid black; text-align: center;">'.(int)$row->cost_carat.'</td>
                      <td style="border: 1px solid black; text-align: center;">'.(int)$row->rapnet.'</td>
                      <td style="border: 1px solid black; text-align: center;">'.$row->lab.'</td>
                      <td style="border: 1px solid black; text-align: center;">'.$row->measurements.'</td>                                     
                  </tr>
           '; }  '
        </tbody>        
    </table>';
			echo $str_url;exit;
			
			$data_email['vendor_mail'] = $vendor_email;
			$data_email['str_final'] = $str_url;
			//print_pre($data_email);  die();
			$msg = $this->load->view('email/email_template',$data_email, TRUE);
			//echo $msg; die;
			$this->email->message($msg);
			 $data['message'] = "Sorry Unable to send email..."; 
			if($this->email->send())
			{                     
				 $data['message'] = "Mail sent...";
			}			
			////////////////////////////////////////////////
			$this->session->set_flashdata('succ',"Email has been sent successfully..");
		  redirect(base_url('loose-diamond'));		
	}


}
