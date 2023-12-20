<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Cohort extends CI_Controller {

  public function __construct()
  {
      parent::__construct();

      $this->load->library('pagination');
      $this->load->helper('form');
      $this->load->model('jewelry_model');
	  $this->load->model('cohort_model');
  }
  function index($id = '')
  {
	  //die('dsds');
	       
      $parent_id = 0;
      $href = '';
      $bread = array();
      $segs = $this->uri->segment_array();
	 // print_ex($segs);     
	   foreach ($segs as $key => $value) 
      {
          $segment_show = $value;
          $href .= $value.'/';
          $query = $this->db->query(" SELECT c.category_id,c.category_name,cd.category_slug FROM tbl_category c
                                      join tbl_category_description cd on  cd.category_id=c.category_id
                                      where cd.category_slug = '" .$value . "' and parent_category='".$parent_id."' ");
          $result = $query->result();
          if (!empty($result)) {
             $parent_id = $result['0']->category_id;
             $segment_show = $result['0']->category_name;
          }  
          $bread[$key]['href'] = base_url().$href;        
          $bread[$key]['name'] = $segment_show;        
      }
      $this->session->set_userdata('category_id',$parent_id);      

      $query = $this->db->query(" SELECT c.category_id,c.category_name,cd.category_slug FROM tbl_category c
                                join tbl_category_description cd on  cd.category_id=c.category_id
                                where c.parent_category = '" .$parent_id . "'");
      $data['cat_list'] = $query->result();
     
	  $getbrand = $this->uri->segment(2);
	  $getcourse_type = $this->input->get('course_type');
	  
      $brand_id=$this->common_model->selectOne('tbl_brand','brand_name',$getbrand);
	  $brandID = $brand_id['0']->brand_id;
	 // print_ex($brand_id);
	  
	  $where_brand = 'brand_status = 1';
	  $data['brand_records'] = $this->common_model->selectWhereorderby('tbl_brand',$where_brand,'brand_sort_order','ASC');
	
	  $where_blog = 'FIND_IN_SET ("'.$getbrand.'",brand) and status = 1';
	  $data['blog_records'] = $this->common_model->selectWhereorderby('tbl_blog',$where_blog,'blog_id','DESC');
	  
	  $where_prodcut=" product_status = 'active' ";
	  if(!empty($brandID) || $brandID != 'Brand'){
		  $where_prodcut .=" and product_brand = ".$brandID." ";
		  }
		  
	  if(!empty($getcourse_type)){
		  $where_prodcut .=" and product_type = ".$getcourse_type." ";
		  
		}
	  
	  $order = "product_name ASC";
	  $data['product_list'] = $this->jewelry_model->jewelry_list($where_prodcut,$order);
	//print_ex($date['product_list']);
	
	  $course = $this->input->get('course');
	  $course_type = $this->input->get('course_type');
	  $cohort_type = $this->input->get('cohort_type');
	  if(!empty($course)){

      $where_cohort_type = "";
      //$cohort_type = "";
      if($cohort_type){

        $where_cohort_type = " and product_cohort_type = ".$cohort_type."";
      }

	  $where_cohort = 'PR.status = "active" and product_id = '.$course.' '.$where_cohort_type.' ';
	  $data['cohort_records'] = $this->cohort_model->getcohort($where_cohort);	 
    
	 
	  $data['count_total_rating'] = $this->cohort_model->count_total_rating($course);
	  
	  $data['rating_total'] = $this->cohort_model->rating_total($course);	  
	  $data['five_total'] = $this->cohort_model->rating_total($course,5);
	  $data['four_total'] = $this->cohort_model->rating_total($course,4);
	  $data['three_total'] = $this->cohort_model->rating_total($course,3);
	  $data['two_total'] = $this->cohort_model->rating_total($course,2);
	  $data['one_total'] = $this->cohort_model->rating_total($course,1);
	  
	  $data['cohort_search_count'] = $this->cohort_model->cohort_search_count($course);
	  
	  $order = "product_name ASC";
	  $where_course = "product_id = ".$course."";
	  $data['course_name'] = $this->jewelry_model->jewelry_list($where_course,$order);
	  // echo $this->db->last_query();
	  
	  $where_cohort_search = 'user_id != "" and product_id = "'.$course.'" group by user_id';
	  $data['cohort_search'] = $this->common_model->selectWhereorderby('tbl_product_cohort_search',$where_cohort_search,'prs_id','ASC');
	
	  
	  }
	
		//print_ex($data['cohort_search']);
		if($course){
		 $dataInser = array(
                'name' => $this->session->userdata('user_fullname'), 
                'email' => $this->session->userdata('user_email'),
                'product_id' => $course,
				'user_id' => $this->session->userdata('user_id'), 
                'date_added' => date('Y-m-d H:i:s')
            );
            $insert_id = $this->common_model->insertData('tbl_product_cohort_search', $dataInser);
		}
	  
      $data['bread'] = $bread;
      $data['page_head'] = ucwords(str_replace('-', ' ', $segment_show));
      //$data['metal_type']=$this->jewelry_model->getProductFilter("name LIKE '%Metal Type%'");
		//print_ex($data['blog_records']);
      $this->load->view('common/header',$data);
      $this->load->view('cohort/cohort',$data);
      $this->load->view('common/footer');
  }
  private function get_child_category($category_id,$block="") 
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
  function load_more_data()
  {
      if(!$this->input->is_ajax_request()){ exit('No direct script access allowed'); }

      $CAT_ID = $this->session->userdata('category_id');
      $cat_arr=$this->get_child_category($CAT_ID);
      $cat_arr = explode('/', $cat_arr);
      $cat_arr = array_values(array_filter($cat_arr));
      $cat_arr[] = $CAT_ID;
      $cat_arr_length = count($cat_arr);
      $cat_arr = implode("','", $cat_arr);

      $segment_2=$this->input->get('segment_2');

      $where=" product_status = 'active' ";   

      if($segment_2=='sale'){
        $where .=" AND product_sale_allow = 'yes'";
        $where .=" OR product_sale_price > 0 AND product_status = 'active' ";
      }else{
        $where .=" AND product_sale_allow = 'no'";
      } 
      // $metal_color=$this->input->get('metal_color_filter');
      // if(count($metal_color))
      // {     
      //     $metal_color=implode("','",$metal_color);
      //     $where .= " AND name LIKE '%Metal Color%'";
      //     $where .= " AND value IN ('".$metal_color."')";
      // }
      // $metal_type=$this->input->get('metal_type_filter');
      // if(count($metal_type))
      // {     
      //     $metal_type=implode("','",$metal_type);
      //     $where .= " AND name LIKE '%Metal Type%'";
      //     $where .= " AND value IN ('".$metal_type."')";
      // }
      $total = $this->input->get('total');
      $splittotal = explode(',', $total);
      $splittotal1 = $splittotal['0'];
      $splittotal2 = @$splittotal['1'];    
      if(!empty($total)){
         $where .= " AND price_filter BETWEEN ('".$splittotal1."') AND ('".$splittotal2."')";         
      } else {
        $where .= " AND price_filter > 0";  
      }

      if($cat_arr_length){
        $where .=" AND category_id in ('".$cat_arr."') "; 
      }

      $query = trim($this->input->get('query'));
      if (!empty($query)) {
          $where .= " AND CONCAT(product_sku,category_name) like '%".$query."%'";
      }

      $sort=$this->input->get('sort');
      $order="";
      if(!empty($sort))
      {   
        if($sort=='p_low') {
          $order .= "price_filter ASC ";
        } 
        else if($sort=='p_high') {          
          $order .= "price_filter DESC ";
        }
      }else{

        $order .= "product_sort ASC";
      }

      $page=$this->input->get('page');
      $per_page=$this->input->get('per_page');
       
      $records_count = $this->jewelry_model->jewelry_count($where);      
      $data['records_count'] =@$records_count['0']->product_count;  
      //print_ex($data);  
      $per_page= ($per_page) ? $per_page : 25 ;
      $config['base_url'] = base_url().'load-more-product';
      $config['total_rows'] = $data['records_count'];
      $config['per_page'] = $per_page;
      $config['page_query_string']=true;
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

      $records = $this->jewelry_model->jewelry_list_limit($where,$per_page,$page,$order);

      foreach ($records as $row) 
      {
        $img=$this->list_image($row->NM_FOLDER_NAME,$row->product_id);
        $row->image_show = @$img['0'];
         if(!empty($img['1'])){
        $row->image_show1 = @$img['1'];
        }else{
          $row->image_show1 = @$img['0'];
        }
        //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
        $product_price_arr=$this->product_price($row->product_id);
        if(!$product_price_arr['price_var'] && $product_price_arr['price']){
          $row->product_price_show='$'.$product_price_arr['price'];
        }else{
          //$row->product_price_show='$'.$product_price_arr['price_min'].'-$'.$product_price_arr['price_max'];
          $where="product_id='".$row->product_id."' and is_active='1' and variation_attributes_name='Metal Type'";
          $variation_price=$this->jewelry_model->variation_price($where);
          if(!empty($variation_price)){
            $row->product_price_show='$'.$variation_price['0']->variation_price;
          }else{            
            $row->product_price_show='$'.$product_price_arr['price_min'];
          }
        }
      }
      //print_ex($where);
      echo json_encode(array('records'=>$records,'page_link'=>$page_link,'total_records'=>$data['records_count']));     
  }
  function jewelry_details()
  {  
      $user_id = $this->session->userdata('user_id');
      $segment_2=$this->uri->segment(2);
      $image_array=array();
      $video_array=array();
      $certificate_array=array();
      $image_link=array();
      $video_link=array();
      $opt=array();
      $optvb=array();
      $o_array=array();
      $v_array=array();
                    
      //$where = "product_id = ".$jewelry_id;
      $where = "product_slug = '".$segment_2."'";
      $records= $this->jewelry_model->jewelry_list($where); 

      $jewelry_id=$records['0']->product_id;
      $product_feature=$this->common_model->selectOne('tbl_product_feature','product_id',$jewelry_id);
      //print_ex($records);
      $product_price_arr=$this->product_price($jewelry_id);
      if(!$product_price_arr['price_var'] && $product_price_arr['price']){
        $product_price_show='$'.$product_price_arr['price'];
      }else{
        //$product_price_show='$'.$product_price_arr['price_min'].'-$'.$product_price_arr['price_max'];
        $product_price_show='$'.$product_price_arr['price_min'];
      }      

      $where = "product_id = ".$jewelry_id;     
      $img_records= $this->common_model->selectWhere('tbl_product_image',$where); 

      //$where = "product_id = ".$jewelry_id;   
      $attribute = $this->jewelry_model->jewelry_attribute($where);

      $where = "p.product_id = ".$jewelry_id." and pr.status='active' ";   
      $cohort = $this->jewelry_model->getProductcohortLimit($where,10,0);

      $where = "product_id = ".$jewelry_id." and status='active' ";
      $cohort_count = $this->jewelry_model->getProductcohortCount($where);      

      //$where = "product_id = ".$jewelry_id."" ;
      $cohort_sum = $this->jewelry_model->getProductcohortSum($where);

      $cohort_rating = @round($cohort_sum['0']->cohort_sum / $cohort_count['0']->cohort_count);

      $product_video_file=$this->common_model->selectWhere('tbl_product_video',array('product_id'=>$jewelry_id,'video_type'=>'file'));
      $product_video_link=$this->common_model->selectWhere('tbl_product_video',array('product_id'=>$jewelry_id,'video_type'=>'link'));

      // print_ex($cohort_count);
      // $where = "product_id = ".$jewelry_id;   
      // $option = $this->jewelry_model->jewelry_option($where);
      // foreach ($option as $opt_row) {
      //   if($opt_row->is_variation){
      //     $opt[$opt_row->name][]=$opt_row->value;
      //   }
      //   if($opt_row->is_visible){
      //     $optvb[$opt_row->name][]=$opt_row->value;
      //   }
      // }       

      if(!empty($records)){
        $html='';
        $option_array=array();
        $option_visible=array();
        $product_id=$jewelry_id;
        $data['option_list']=$this->common_model->selectAll('tbl_option');
        $where=array('product_id'=>$product_id);
        $data['product_option']=$this->common_model->selectJoinWhere('tbl_product_option','option_id','tbl_option','option_id',$where);
        foreach ($data['product_option'] as $key => $value) {
            if($value->is_visible=='1'){ 
              $option_visible[]=$value->option_id;
            }
            if(!$value->is_variation=='1'){ continue; }
            $option_array[]=$value->option_id;
        }
        
        $data['option_array'] = array_unique($option_array);
        $data['product_variation'] = $this->common_model->selectOne('tbl_product_price_variation','product_id',$product_id);
        $data['option_array'] = array_values($data['option_array']);
        $data['option_visible'] = array_values(array_unique($option_visible));
        //print_ex($data['product_option']);
        foreach ($data['product_variation'] as $varkey => $varvalue){
          $product_var_attr = $this->common_model->selectOne('tbl_product_price_variation_attributes','variation_id',$varvalue->variation_id);
          foreach ($product_var_attr as $key => $value) {
              $o_array[] = $value->variation_attributes_name;
              $v_array[] = $value->variation_attributes_value;
          }
          $o_array=array_unique($o_array);
          $v_array=array_unique($v_array);
        }
        //exit;
        foreach ($data['option_list'] as $optkey => $optvalue){
            if(!in_array($optvalue->option_id,$data['option_array'])){ continue; }        
        $html .='<div class="form-group">';
        $n_name='cart_'.strFlat($optvalue->name); 
        $html .='<div class="col-xs-6 col-sm-6 col-md-4 col-lg-4 padding-left-0">';
        $html .='   <label>'.$optvalue->name.' : </label>';
        $html .='</div>';
        $html .='<input type="hidden" name="cart_option[]" value="'.$optvalue->name.'">';
        $html .='<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 select-width1">';
        $html .='  <select name="'.$n_name.'" id="'.$n_name.'" class="form-control cart-form-control" required="" onchange="variation()">'; 
        //$html .='    <option value="">Select an Option</option>';
                  foreach ($data['product_option'] as $key => $value){
                    if($value->option_id!=$optvalue->option_id){ continue; }
                    if(in_array($optvalue->name, $o_array) && in_array($value->value, $v_array)){
        $html .='     <option value="'.$value->value.'">'.$value->value.'</option>';                
                    }  
                  }                   
        $html .='   </select>
                </div>
                </div>';        
        }

        $html22='';
        foreach ($data['option_list'] as $optkey => $optvalue){
          if(!in_array($optvalue->option_id,$data['option_visible'])){ continue; }             
            $html22 .='<li><span>'.$optvalue->name.' : </span>';
              foreach ($data['product_option'] as $key => $value){
                if($value->option_id!=$optvalue->option_id){ continue; }
                //if(in_array($optvalue->name, $o_array) && in_array($value->value, $v_array)){   
                $html22 .=''.$value->value.', ';
                //}  
              } 
              $html22 .='</li>';
        }

        $folder = $records['0']->NM_FOLDER_NAME;

        foreach ($img_records as $row){
            $file='ftp_upload/'.$folder.'/product/image/'.$row->product_image;
            if(file_exists($file) && $row->product_image!=""){
                $image_array[] = base_url().$file;
            } 
        }
        if(empty($image_array)){
            $file='assets/No_image.png';
            if(file_exists($file)){
                $image_array[] = base_url().$file;
            } 
        }

        foreach ($product_video_file as $row) {
          $file='ftp_upload/'.$folder.'/product/video/'.$row->product_video;
          if(file_exists($file)){
              $video_array[] = base_url().$file;
          }
        }

        foreach ($product_video_link as $row) {
          if(!empty($row->product_video)){
            if(checkLink($row->product_video)=='200'){            
                $video_link[] = $row->product_video;
            }
          }
        }

        // $certificate='ftp_upload/jewelry/certificate/'.$records['0']->certificate;
        // if(file_exists($certificate) && $records['0']->certificate)
        // {
        //     $certificate_array[] = base_url().$certificate;
        // }
        //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
        $addons_detail=array();
        $addons_detail_arr=array();

        if($records['0']->product_global_addons=='active'){
          //$pro_cat=$this->common_model->selectJoinWhere('tbl_product_category','category_id','tbl_addons_category','category_id',$where);
          $pro_cat=$this->jewelry_model->pro_cat("product_id = ".$jewelry_id." OR AC.category_id ='0'");
          //echo $this->db->last_query();
          //print_ex($pro_cat);
          foreach ($pro_cat as $key => $value) {  
              $addons_detail=$this->common_model->selectWhere('tbl_addons',array('addons_id'=>$value->addons_id));
              
              $addons_group=$this->common_model->selectWhere('tbl_addons_group',array('addons_id'=>$value->addons_id));              
              $addons_detail['0']->group_list=$addons_group;              
              foreach ($addons_group as $row) {
                  $addons_value_list=$this->common_model->selectWhere('tbl_addons_value',array('addons_group_id'=>$row->addons_group_id));
                  $row->value_list=$addons_value_list;
              }          
              $addons_detail_arr[]=$addons_detail;
          }
        }
        //print_ex($addons_detail_arr);
        //exit;
        $html1='';
        foreach ($addons_detail_arr as $keyadarr) {
          foreach ($keyadarr as $keyad => $valuead) {
            foreach ($valuead->group_list as $keygl => $valuegl) {
              $g_name="addon_name_".strFlat($valuegl->group_name);
              if($valuegl->group_type=='select' && $valuegl->required){ $star='*'; }else{ $star=''; }
              $html1 .='<div class="addon_group_description">'.$valuegl->group_description.'</div>';
              $html1 .='<div class="form-group">';
              $html1 .='<div class="addon_group_name col-xs-6 col-sm-6 col-md-4 col-lg-4 padding-left-0" >';
              $html1 .='   <label>'.$valuegl->group_name.''.$star.' : </label>';
              $html1 .='</div>';
              $html1 .='<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 select-width1">';
             
              $html1 .='<input type="hidden" name="addon_name[]" value="'.$valuegl->group_name.'">';
              if($valuegl->group_type=='text'){
                if($valuegl->required){ $required='required'; $star='*'; }else{ $required=''; $star=''; }
                foreach ($valuegl->value_list as $keyvl => $valuevl) {
                  if($valuevl->price){ $price='($'.$valuevl->price.')'; }else{ $price=''; }
                    //$html1 .='<p>'.$valuevl->label.' '.$price.' <span>'.$star.'</span></p>';
                    $l_name=strFlat($valuevl->label);
                    $html1 .='<input class="form-control cart-form-control" type="text" name="'.$g_name.'['.$l_name.']" '.$required.' onblur="variation()" placeholder="Enter text">';                 
                }
              }
              if($valuegl->group_type=='select'){
                if($valuegl->required){ $required='required'; $star='*'; }else{ $required=''; $star=''; }
                $html1 .='<select class="form-control cart-form-control" name="'.$g_name.'[]" '.$required.' onchange="variation()">';
                  $html1 .='<option value="">Select an option</option>';
                  foreach ($valuegl->value_list as $keyvl => $valuevl) {
                    $html1 .='<option value="'.$valuevl->label.'">'.$valuevl->label;
                    if($valuevl->price>0){
                      $html1 .=$valuevl->price;
                    }
                    $html1 .='</option>';                  
                  }
                $html1 .='</select>';
              }
              if($valuegl->group_type=='checkbox'){
                if($valuegl->required){ $required='required'; $star='*'; }else{ $required=''; $star=''; }
                foreach ($valuegl->value_list as $keyvl => $valuevl) {
                    if($valuevl->price){ $price='($'.$valuevl->price.')'; }else{ $price=''; }
                    $l_name=strFlat($valuevl->label);
                    $html1 .='<label class="addon_label">'.$valuevl->label.' '.$price.' ';
                    $html1 .='<input class="" type="checkbox" name="'.$g_name.'['.$l_name.']" value="'.$valuevl->label.'" '.$required.' onchange="variation()"></label>';
                }
              }
              if($valuegl->group_type=='radio'){
                if($valuegl->required){ $required='required'; $star='*'; }else{ $required=''; $star=''; }
                foreach ($valuegl->value_list as $keyvl => $valuevl) {
                    if($valuevl->price){ $price='($'.$valuevl->price.')'; }else{ $price=''; }
                    $l_name=strFlat($valuevl->label);
                    $html1 .='<label class="addon_label">'.$valuevl->label.' '.$price.' ';
                    $html1 .='<input class="" type="radio" name="'.$g_name.'['.$l_name.']" '.$required.' value="'.$valuevl->label.'" onchange="variation()"></label>';
                }
              }
              if($valuegl->group_type=='textarea'){
                if($valuegl->required){ $required='required'; $star='*'; }else{ $required=''; $star=''; }
                foreach ($valuegl->value_list as $keyvl => $valuevl) {
                    if($valuevl->price){ $price='($'.$valuevl->price.')'; }else{ $price=''; }
                    $l_name=strFlat($valuevl->label);
                    $html1 .='<p>'.$valuevl->label.' '.$price.'</p>';
                    $html1 .='<textarea class="form-control" name="'.$g_name.'['.$l_name.']" '.$required.' onblur="variation()"></textarea>';
                }
              }
              $html1 .='</div>';
              $html1 .='</div>';
            }
          }
        }
        //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
        if($records['0']->category_id!="")
        {          
          $where1 = ' price_filter > 0 AND product_status="active" AND category_id IN ("'.$records['0']->category_id.'")';
        } 
        $similar_records = $this->jewelry_model->jewelry_list_limit($where1,20,0);
        foreach ($similar_records as $row) 
        {
          $img=$this->list_image($row->NM_FOLDER_NAME,$row->product_id);
          $row->image_show = @$img['0'];
          //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
          $product_price_arr=$this->product_price($row->product_id);
          if(!$product_price_arr['price_var'] && $product_price_arr['price']){
            $row->product_price_show='$'.$product_price_arr['price'];
          }else{
            //$row->product_price_show='$'.$product_price_arr['price_min'].'-$'.$product_price_arr['price_max'];
            $row->product_price_show='$'.$product_price_arr['price'];
          }
        }        
        //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
        $where = "product_id = ".$jewelry_id; 
        $data = 'product_view';
        $this->common_model->updateCounter('tbl_product',$data,$where);

        $query = $this->db->query(" SELECT o.option_id,ov.value,o.name FROM tbl_option o
                          join tbl_option_value ov on  ov.option_id=o.option_id
                          where o.name = 'Metal Color'");
        $metal_color_list = $query->result();
      } 
      
      if(!empty($user_id)){

            $data_details=array(
                    'user_id' => $user_id, 
                    'item_id' => $records['0']->product_sku,
                    'type' => 'jewelry',  
                    'title' => $records['0']->product_name,                    
                    'date_added'=> date('Y-m-d H:i:s'),      
                );
                $this->common_model->insertData('tbl_view_history',$data_details); 
          }  
  
      $data= array(
          'records'=>$records,
          'attribute'=>$attribute,
          'option'=>$opt,
          'similar_records'=>$similar_records,
          'image_array'=>$image_array,
          'video_array'=>$video_array,
          'certificate_array'=>$certificate_array,
          'image_link'=>$image_link,
          'video_link'=>$video_link,
          'var_html'=>$html,
          'addon_html'=>$html1,
          'product_option'=>$html22,
          'product_price_show'=>$product_price_show,
          'product_feature'=>$product_feature,
          'product_cohort'=>$cohort,
          'cohort_count'=>$cohort_count['0']->cohort_count,
          'cohort_rating'=>$cohort_rating,
          'metal_color_list'=>$metal_color_list,
      );
    
      // $a=$this->common_model->selectOne('tbl_product_price_variation','variation_id',1);
      // $d=json_decode($a['0']->variation_attributes);
      // print_ex($data);
      $data['page_head'] = 'Jewelry Details';

      $this->load->view('common/header',$data);
      $this->load->view('jewelry/jewelry_details',$data);
      $this->load->view('common/footer');
  }
  function product_price($product_id){
    $price=0;
    $price_min=0;
    $price_max=0;
    $price_var=0;

    $where = "product_id='".$product_id."' ";
    $product_details=$this->common_model->selectWhere('tbl_product',$where);
    if($product_details['0']->product_sale_price>0){
      $price=$product_details['0']->product_sale_price;
    }else{
      $price=$product_details['0']->product_price;
    }   

    $where="product_id='".$product_id."' and is_active='1'";
    $variation_price_min=$this->jewelry_model->variation_price_min($where);
    $variation_price_max=$this->jewelry_model->variation_price_max($where);
    if($variation_price_min['0']->min_price){
      $price_min=$variation_price_min['0']->min_price;
    }
    if($variation_price_max['0']->max_price){
      $price_max=$variation_price_max['0']->max_price;
    }
    if(($price_min!=$price_max) && $price_min && $price_max){
      $price_var=1;
    }
    $result= array(
            'price'=>$price,
            'price_min'=>$price_min,
            'price_max'=>$price_max,
            'price_var'=>$price_var
          );
    return $result;
  }
  function variation_price($ech="")
  {
    $addons=array();
    $option=array();
    $POST=$this->input->get();
    $product_id=$this->input->get('cart_product_id');
    if(empty($product_id)){
      $product_id=$this->input->get('jewelry_id');
    }

    $cart_option=$this->input->get('cart_option');
    $addon_name=$this->input->get('addon_name');
    if(!empty($cart_option)){
      foreach ($cart_option as $key => $value) {
        $n_name='cart_'.strFlat($value); 
        $option[$value]=$POST[$n_name];
      }
    }

    $variation=array();
    $where="product_id='".$product_id."' and is_active='1'";
    $variation_price=$this->jewelry_model->variation_price($where);
    foreach ($variation_price as $key => $value) 
    {
        $where='variation_id='.$value->variation_id;
        $variation[$value->variation_id][$value->variation_attributes_name]=$value->variation_attributes_value;             
        $variation_details[$value->variation_id]['variation_price']=$value->variation_price;             
    }
    $result=0;
    $variation_price=0;
    foreach ($variation as $keyvar => $valuevar) {
      $is_match=0;      
      foreach ($valuevar as $keyv => $valuev) {
        if($valuev=='any' && $option[$keyv]!=""){
          $is_match=1;
          continue;
        }else if($valuev==$option[$keyv]){
          $is_match=1;
          continue;
        }else{
          $is_match=0;
          continue 2;
        } 
      } 
      if($is_match){
        $result= 1;
        $variation_price=$variation_details[$keyvar]['variation_price'];
        break;
      }
    } 

    $option_price=0;
    $product_price=0;
    if(!empty($addon_name)){
      foreach ($addon_name as $keyan => $valuean) {            
        $group_arr=@$POST['addon_name_'.strFlat($valuean)];
        if(!empty($group_arr)){
          foreach ($group_arr as $keyga => $valuega) {
            if($valuega!=""){
              if(is_string($keyga)){              
                $where="product_id=".$product_id." and group_name='".$valuean."' and label='".str_replace('_', ' ', $keyga)."'";
              }
              else{
                $where="product_id=".$product_id." and group_name='".$valuean."' and label='".$valuega."'";
              }
              $addons[$valuean]=$valuega;
              $product_addons=$this->jewelry_model->product_addons($where);
              $option_price += @$product_addons['0']->price;
            }          
          }
        }      
      }
    }
    //print_ex($addons);
    $product_price_arr=$this->product_price($product_id);
    if(!$product_price_arr['price_var'] && $product_price_arr['price']){
      $product_price=$product_price_arr['price'];
    }
    if($variation_price){
      $total_price=$variation_price+$option_price;
    }else{
      $total_price=$product_price+$option_price;
    }
    
    if($ech){
      return json_encode(array(
        'variation_price'=>$variation_price,
        'option_price'=>$option_price,
        'total_price'=>$total_price,
        'option'=>$option,
        'addons'=>$addons
      )+$product_price_arr); 
    }else{
      echo json_encode(array('variation_price'=>$variation_price,'option_price'=>$option_price,'total_price'=>$total_price));    
    }    
       
  }

  function print_details()
  {    
      if(!$this->input->is_ajax_request()){ exit('No direct script access allowed'); }
      $jewelry_id=$this->input->get('jewelry_id');
      $image_array=array();
      $video_array=array();
      $certificate_array=array();
      $image_link=array();
      $video_link=array();
                    
      $where = "product_id = ".$jewelry_id;
      $records= $this->jewelry_model->jewelry_list($where); 

      $where = "product_id = ".$jewelry_id;     
      $img_records= $this->common_model->selectWhere('tbl_product_image',$where); 

      if(!empty($records))
      {
        $folder=$records['0']->NM_FOLDER_NAME;

        foreach ($img_records as $row){
            $file='ftp_upload/'.$folder.'/product/image/'.$row->product_image;
            if(file_exists($file) && $row->product_image!=""){
                $image_array[]=$file;
            } 
        }
        if(empty($image_array)){
            $file='assets/No_image.png';
            if(file_exists($file)){
                $image_array[]=$file;
            } 
        }

        $where = "product_id = '".$jewelry_id."'";      
        $attribute = $this->jewelry_model->jewelry_option($where);
        foreach ($records as $row) 
        {
          $img=$this->list_image($row->NM_FOLDER_NAME,$row->product_id);
          $row->image_show = @$img['0'];
          //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
          $product_price_arr=$this->product_price($row->product_id);
          if(!$product_price_arr['price_var'] && $product_price_arr['price']){
            $row->product_price_show='$'.$product_price_arr['price'];
          }else{
            $row->product_price_show='$'.$product_price_arr['price_min'].'-$'.$product_price_arr['price_max'];
          }

          $row->metal_color = '';
          $row->metal_type = '';
          $row->stone_weight = '';
          $row->diamond_weight = '';
          $row->net_alloy = '';

          foreach ($attribute as $attr) {
            if($attr->product_id==$row->product_id)
            {            
              if(trim($attr->name)=='Metal Color')
              {
                $row->metal_color = $attr->value;
              }
              if(trim($attr->name)=='Metal Type')
              {
                $row->metal_type = $attr->value;
              } 
             
            }
          }
        }

      } 
  
      $data= array(
          'records'=>$records,
          'image_array'=>$image_array,
          'current_url'=>$_SERVER['HTTP_REFERER'],
      );
      //print_ex($data);
      echo json_encode(array('records'=>$data));
  }
  
  function list_image($folder,$product_id)
  {
      $image_array=array();
                    
      $where = array('product_id'=>$product_id);       
      $records= $this->common_model->selectWhere('tbl_product_image',$where); 

      foreach ($records as $row) {
          $file='ftp_upload/'.$folder.'/product/image/'.$row->product_image;
          if(file_exists($file) && $row->product_image!=""){
              $image_array[]=$file;
          } 
      }
      if(empty($image_array)){
          $file='assets/No_image.png';
          if(file_exists($file)){
              $image_array[]=$file;
          } 
      } 

      return $image_array; 
  }
  
  function add_cart()
  {
    if(!$this->input->is_ajax_request()){ exit('No direct script access allowed'); }
    //$a=json_decode($this->variation_price());
    //print_ex($a);
    $user_id=$this->session->userdata('user_id');
    $jewelry_id=$this->input->get('jewelry_id');
    //$attribute=$this->input->get('attribute');
    $quantity=$this->input->get('quantity');
    if($quantity>10){ $quantity=10; }
    else if($quantity<1){ $quantity=1; }
    if($quantity==""){ $quantity=1; }
    $where = "product_id = ".$jewelry_id;       
    $records= $this->jewelry_model->jewelry_list($where); 
    $message = '';
    $status = 1;
    $normal_price=0;     
    $total_price=0;
    foreach ($records as $row) 
    {
        $img=$this->list_image($row->NM_FOLDER_NAME,$row->product_id);
        $row->image_show = @$img['0'];
    }
    if(!empty($records))
    {
        $variation_price=json_decode($this->variation_price('1'));
        //print_ex($variation_price);
        if($variation_price->price_var){
          if($variation_price->variation_price>0){
            $normal_price=$variation_price->variation_price;  
            $total_price=$variation_price->total_price;     

          }else{
            $message='Please! Select Option.';
            $status=0;
          }
        }else{
          $normal_price=$variation_price->price;     
          $total_price=$variation_price->total_price;     
        }
        $html='';
        foreach ($variation_price->option as $key => $value) {
          $html .='<p><span>'.$key.': </span>'.$value.' </p>';
        }
        foreach ($variation_price->addons as $key => $value) {
          $html .='<p><span>'.$key.': </span>'.$value.' </p>';
        }
        if($variation_price->option_price>0){
          //$html .='<p><span>Additional Fee: </span>'.$variation_price->option_price.'</p>';
        }

      $grand_total=$total_price*$quantity;
      if($user_id!="")
      {
          $where=array('product_id'=>$jewelry_id,'product_type'=>'jewelry','is_ring_builder'=>'0','customer_id'=>$user_id,);
          $cart_detail=$this->common_model->selectWhere('tbl_cart',$where);
          if(!empty($cart_detail))
          {
              $this->common_model->deleteData('tbl_cart',array('cart_id'=>$cart_detail['0']->cart_id));
          }  
            $data=array(
              'product_id'=>$jewelry_id,
              'stock_id'=>$records['0']->product_sku,
              'quantity'=>$quantity,
              'product_type'=>'jewelry',
              'price'=>$normal_price,
              'total_price'=>$grand_total,
              'name'=>$records['0']->product_name,
              'description'=>$records['0']->product_short_description,
              'attributes'=>$html,
              'info_array'=>json_encode($variation_price),
              'image'=>$records['0']->image_show,
              'created_at'=>date('Y-m-d H:i:s'),
              'customer_id'=>$user_id,
            );
            
            if($status){
              $cart_id=$this->common_model->insertData('tbl_cart',$data);
            }            
          // }else{
          //   $message='This Item Is Already In Your Cart!';
          //   $status=0;
          // }
          $where1=array('customer_id'=>$user_id,);
          $cart_details=$this->cart_model->get_cart($where1);
          
          echo json_encode(array('records'=>$cart_details, 'message'=>'Added to cart!', 'status'=>$status));
      }
      else
      { 
          $get_cookie=get_cookie('fc_cart_cookie');
          if($get_cookie!="")
          {
              $cart_data=array(
                'cookie_id'=>$get_cookie,
                'product_id'=>$jewelry_id,
                'stock_id'=>$records['0']->product_sku,
                'quantity'=>$quantity,
                'product_type'=>'jewelry',
                'price'=>$normal_price,
                'total_price'=>$grand_total,
                'name'=>$records['0']->product_name,
                'description'=>$records['0']->product_short_description,
                'attributes'=>$html,
                'info_array'=>json_encode($variation_price),
                'image'=>$records['0']->image_show,
                'created_at'=>date('Y-m-d H:i:s'),
              );
              $this->common_model->insertData('tbl_cart_cookie',$cart_data);
          }
          else
          {
              $get_cookie=mt_rand().':'.userIp();
              set_cookie('fc_cart_cookie',$get_cookie,60*60*24*30);
              $cart_data=array(
                'cookie_id'=>$get_cookie,
                'product_id'=>$jewelry_id,
                'stock_id'=>$records['0']->product_sku,
                'quantity'=>$quantity,
                'product_type'=>'jewelry',
                'price'=>$normal_price,
                'total_price'=>$grand_total,
                'name'=>$records['0']->product_name,
                'description'=>$records['0']->product_short_description,
                'attributes'=>$html,
                'info_array'=>json_encode($variation_price),
                'image'=>$records['0']->image_show,
                'created_at'=>date('Y-m-d H:i:s'),
              );
              $this->common_model->insertData('tbl_cart_cookie',$cart_data);
          }
          $where = array('cookie_id'=>$get_cookie);
          $cart_details = $this->cart_model->get_cart_cookie($where);
          echo json_encode(array('records'=>$cart_details, 'message'=>$message, 'status'=>$status));
      }      
    }
    
  }
  function add_wish()
  {
    if(!$this->input->is_ajax_request()){ exit('No direct script access allowed'); }
    $user_id=$this->session->userdata('user_id');
    $jewelry_id=$this->input->get('jewelry_id');

    $where = "product_id = ".$jewelry_id;       
    $records= $this->jewelry_model->jewelry_list($where); 
    //print_ex($records);
    foreach ($records as $row) 
    {
      $img=$this->list_image($row->NM_FOLDER_NAME,$row->product_id);      
      $row->image_show = @$img['0'];
    }
    if(!empty($records))
    {       
      if($user_id!="")
      {
          $where=array('product_id'=>$jewelry_id,'product_type'=>'jewelry','customer_id'=>$user_id,);
          $cart_detail=$this->common_model->selectWhere('tbl_wishlist',$where);
          if(empty($cart_detail))
          {        
            $data=array(
              'product_id'=>$jewelry_id,
              'stock_id'=>$records['0']->product_sku,
              'quantity'=>1,
              'product_type'=>'jewelry',
              'price'=>$records['0']->product_price,
              'total_price'=>$records['0']->product_price,
              'name'=>$records['0']->product_name,
              'description'=>$records['0']->product_short_description,
              'image'=>$records['0']->image_show,
              'created_at'=>date('Y-m-d H:i:s'),
              'customer_id'=>$user_id,
            );
            $cart_id=$this->common_model->insertData('tbl_wishlist',$data);

          }
          $where1=array('customer_id'=>$user_id);
          $details=$this->wishlist_model->get_wishlist($where1);
          echo json_encode(array('records'=>$details,'message'=>'Added to wishlist!'));
      } 
      else { 
        echo json_encode(array('records'=>array(),'message'=>'login')); 
      }      
    }    
  }  

  function get_quote_submit()
  {
      $user_id=$this->session->userdata('user_id');
      $name=$this->input->get('name');
      $email=$this->input->get('email');
      $phone = $this->input->get('phone');
      $comment = $this->input->get('comment');
      $product_id = $this->input->get('product_id');
      $quantity = $this->input->get('quantity');

      $status="0";
      $message="";

      if (trim($name)!="" && trim($email)!="" && trim($phone)!="" && trim($product_id)!="") 
      {
          $where = "product_id = '".$product_id."'"; 
          $records= $this->jewelry_model->jewelry_list($where);    
          $img_records= $this->common_model->selectWhere('tbl_product_image',$where); 
          $variation_price=json_decode($this->variation_price('1'));

          $html='';
          foreach ($variation_price->option as $key => $value) {
            $html .='<p><strong>'.$key.': </strong>'.$value.' </p>';
          }
          foreach ($variation_price->addons as $key => $value) {
            $html .='<p><strong>'.$key.': </strong>'.$value.' </p>';            
          }
          $html .='<p><strong>Quantity: </strong>'.$quantity.' </p>';
          $html .='<p><a href="'.$_SERVER['HTTP_REFERER'].'">Product Details</a></p>';

          $data=array(
              'name'=>$name,
              'email'=>$email,
              'mobile'=>$phone,
              'message'=>$comment,
              'created_date'=>date('Y-m-d H:i'),
              'type'=>'Jewelry',
              'stock'=>$records['0']->product_sku,
              'stock_name'=>$records['0']->product_name,
              'description'=>$html,
          );
          $insert_id=$this->common_model->insertData('tbl_enquiry',$data);
          if($insert_id)
          {            
                                      
              $config['wordwrap'] = TRUE;
              $config['mailtype'] = 'html';      
              $config['charset'] = 'utf-8';
              $config['priority'] = '1';      
              $config['crlf']  = "\r\n";      
              $config['newline']  = "\r\n";
              //$config['smtp_crypto']  = 'tls';      
              $this->email->initialize($config);      
              $this->email->from(SITE_EMAIL,SITE_NAME);      
              $this->email->to(SITE_EMAIL);
              $this->email->subject("Get Quote");      

              foreach($records as $member) { 
                  if($member->product_sku != ""){ $product_sku=$member->product_sku; }else{ $product_sku=""; }
                  if($member->product_name != ""){ $product_name=$member->product_name; }else{ $product_name=""; }
                  if($member->product_short_description != ""){ $product_short_description=$member->product_short_description; }else{ $product_short_description=""; }
              }
              $folder=$records['0']->NM_FOLDER_NAME;
              foreach ($img_records as $row){
                  $file='ftp_upload/'.$folder.'/product/image/'.$row->product_image;
                  if(file_exists($file) && $row->product_image!=""){
                      $image_array[]=$file;
                  } 
              }
              if(!count($image_array)){
                  $file='assets/No_image.png';
                  if(file_exists($file)){
                      $image_array[]=$file;
                  } 
              }
              $data_email['message_body'] = 'This email is generated from website.<br> 
              Query for product '.$records['0']->product_name.' is <br> 
              '.$html.'<br>
              Name : '.$name.'<br>
              Email : '.$email.'<br>
              Phone : '.$phone.'<br>
              Message : '.$comment.'<br>';
              $data_email['product_name'] =$product_name;       
              $data_email['product_image'] ='<a href="'.$_SERVER['HTTP_REFERER'].'" title="" class="" target="_blank">
                      <img align="center" alt="" src="'.base_url().''.$image_array['0'] .'" width="500" style="max-width:1000px; padding-bottom: 0; display: inline !important; vertical-align: bottom;" class="mcnRetinaImage">
                      </a>';
              $data_email['product_detail'] ='<strong>Sku# :</strong> '.$product_sku.'<br>
                      <strong>Description :</strong> '.$product_short_description.' ';              
              $data_email['detail_link'] ='<a class="mcnButton " title="Start Shopping" href="'.$_SERVER['HTTP_REFERER'].'" target="_blank" 
              style="font-weight: bold;letter-spacing: -0.5px;line-height: 100%;text-align: center;text-decoration: none;color: #FFFFFF;">Start Shopping</a>';        

              $msg = $this->load->view('email/jewelry_details',$data_email, TRUE);
              $this->email->message($msg);
              $this->email->send();
              //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
              $this->email->initialize($config);      
              $this->email->from(SITE_EMAIL,SITE_NAME);      
              $this->email->to($email);
              $this->email->subject("Get Quote");      
              
              $data_email['message_body'] = 'Thanks for your interest. We will get back to you very soon.<br> 
              You Query for product '.$records['0']->product_name.' is <br> 
              '.$html.'<br>             
              Message : '.$comment.'<br>';              
              $msg = $this->load->view('email/jewelry_details',$data_email, TRUE);
              $this->email->message($msg);  
              if($this->email->send()){     
                 $this->session->set_flashdata('alert_message','Email has been sent successfully.');
              }else{
                 $this->session->set_flashdata('error_message','Sorry Unable to send email.');
              }     
          }
      }else{
        // $status='0';
        // $message='<div class="alert alert-danger">Fill The Form Properly.</div>';
        $this->session->set_flashdata('error_message','Fill The Form Properly.');
      }
      echo json_encode(array('status'=>'1','message'=>''));
      //redirect($_SERVER['HTTP_REFERER']);        
  }
  
  function email_jewelry_details()
  {
      $user_id=$this->session->userdata('user_id');
      $name=$this->input->post('name');
      $email=$this->input->post('email');
      $phone = $this->input->post('phone');
      $comment = $this->input->post('comment');

      $jewelry_id = $this->input->post('product_id');
      //$where = 'product_id = '."'".$jewelry_id."'"; 
      $where = "product_id = '".$jewelry_id."'"; 

      $image_array=array();
      $video_array=array();
      $certificate_array=array();
      $image_link=array();
      $video_link=array();
                    
      $where = "product_id = ".$jewelry_id;
      $records= $this->jewelry_model->jewelry_list($where); 

      $where = "product_id = ".$jewelry_id;     
      $img_records= $this->common_model->selectWhere('tbl_product_image',$where); 

      if(count($records))
      {
        $folder=$records['0']->NM_FOLDER_NAME;
        foreach ($img_records as $row){
            $file='ftp_upload/'.$folder.'/product/image/'.$row->product_image;
            if(file_exists($file) && $row->product_image!=""){
                $image_array[]=$file;
            } 
        }
        if(!count($image_array)){
            $file='assets/No_image.png';
            if(file_exists($file)){
                $image_array[]=$file;
            } 
        }
        $where = "product_id = '".$jewelry_id."'";      
        $attribute = $this->jewelry_model->jewelry_option($where);
        foreach ($records as $row) 
        {
          $img=$this->list_image($row->NM_FOLDER_NAME,$row->product_id);
          $row->image_show = @$img['0'];
          //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
          $product_price_arr=$this->product_price($row->product_id);
          if(!$product_price_arr['price_var'] && $product_price_arr['price']){
            $row->product_price_show='$'.$product_price_arr['price'];
          }else{
            $row->product_price_show='$'.$product_price_arr['price_min'].'-$'.$product_price_arr['price_max'];
          }
          $row->metal_color = '';
          $row->metal_type = '';
          foreach ($attribute as $attr) {
            if($attr->product_id==$row->product_id){            
              if(trim($attr->name)=='Metal Color'){
                $row->metal_color = $attr->value;
              }
              if(trim($attr->name)=='Metal Type'){
                $row->metal_type = $attr->value;
              }
            }
          }
        }
      } 
  
      $data= array(
          'records'=>$records,
          'image_array'=>$image_array,
          'current_url'=>$_SERVER['HTTP_REFERER'],
      );

      //$records= $this->jewelry_model->jewelry_list($where);
      //echo $this->db->last_query(); 
      //print_ex($records);       
      ////////////////  Email code /////////////////////////
                              
      $config['wordwrap'] = TRUE;
      $config['mailtype'] = 'html';      
      $config['charset'] = 'utf-8';
      $config['priority'] = '1';      
      $config['crlf']      = "\r\n";      
      $config['newline']      = "\r\n";
      //$config['smtp_crypto']  = 'tls';      
      $this->email->initialize($config);      
      $this->email->from(SITE_EMAIL,SITE_NAME);      
      $this->email->to($email);
      $this->email->subject("Jewelry Details");      

      foreach($records as $member) { 
          if($member->product_sku != ""){ $product_sku=$member->product_sku; }else{ $product_sku=""; }
          if($member->product_name != ""){ $product_name=$member->product_name; }else{ $product_name=""; }
          if($member->product_short_description != ""){ $product_short_description=$member->product_short_description; }else{ $product_short_description=""; }
          if($member->product_price_show != ""){ $product_price_show=$member->product_price_show; }else{ $product_price_show=""; }
          if($member->metal_color != ""){ $metal_color=$member->metal_color; }else{ $metal_color=""; }
          if($member->metal_type != ""){ $metal_type=$member->metal_type; }else{ $metal_type=""; }
      }
      
      $data_email['message_body'] = '<p>This mail is generated by a customer to let you know about this product.</p>
              <p>Message : '.$comment.'</p>';
      $data_email['product_name'] =$product_name;       
      $data_email['product_image'] ='<a href="'.$data['current_url'].'" title="" class="" target="_blank">
              <img align="center" alt="" src="'.base_url().''.$image_array['0'] .'" width="500" style="max-width:1000px; padding-bottom: 0; display: inline !important; vertical-align: bottom;" class="mcnRetinaImage">
              </a>';
      $data_email['product_detail'] ='<strong>Sku# :</strong> '.$product_sku.'<br>
              <strong>Price :</strong> '.$product_price_show.'<br>
              <strong>Metal Color :</strong> '.$metal_color.'<br>
              <strong>Metal Type :</strong> '.$metal_type.'<br>
              <strong>Description :</strong> '.$product_short_description.' ';              
      $data_email['detail_link'] ='<a class="mcnButton " title="Start Shopping" href="'.$data['current_url'].'" target="_blank" 
      style="font-weight: bold;letter-spacing: -0.5px;line-height: 100%;text-align: center;text-decoration: none;color: #FFFFFF;">Start Shopping</a>';        

      $msg = $this->load->view('email/jewelry_details',$data_email, TRUE);
      $this->email->message($msg);
      $this->email->send();      
      //////////////////////Admin//////////////////////////
      $this->email->initialize($config);      
      $this->email->from(SITE_EMAIL,SITE_NAME);      
      $this->email->to(SITE_EMAIL);
      $this->email->subject("Jewelry Details");  
      
      $data_email['message_body'] = 'A customer has just sent this product detail. With this query <br>
       Name : '.$name.'<br>
       Email : '.$email.'<br>
       Phone : '.$phone.'<br>
       Message : '.$comment.' ';

      $msg = $this->load->view('email/jewelry_details',$data_email, TRUE);
      $this->email->message($msg);
      $this->session->set_flashdata('error_message','Sorry Unable to send email.');
      if($this->email->send()){     
         $this->session->set_flashdata('alert_message','Email has been sent successfully.');
      }                        
      redirect($_SERVER['HTTP_REFERER']);               
  }
  
  function email_us_jewelry()
  {
      $user_id=$this->session->userdata('user_id');

      $name=$this->input->post('name');
      $email=$this->input->post('email');
      $phone = $this->input->post('phone');
      $comment = $this->input->post('comment');

      $jewelry_id = $this->input->post('product_id');
      //$where = 'jewelry_id = '."'".$jewelry_id."'"; 

      $where = "product_id = '".$jewelry_id."'"; 

      $image_array=array();
      $video_array=array();
      $certificate_array=array();
      $image_link=array();
      $video_link=array();
                    
      $where = "product_id = ".$jewelry_id;
      $records= $this->jewelry_model->jewelry_list($where); 

      $where = "product_id = ".$jewelry_id;     
      $img_records= $this->common_model->selectWhere('tbl_product_image',$where); 

      if(count($records))
      {
        $folder=$records['0']->NM_FOLDER_NAME;

        foreach ($img_records as $row){
            $file='ftp_upload/'.$folder.'/product/image/'.$row->product_image;
            if(file_exists($file) && $row->product_image!=""){
                $image_array[]=$file;
            } 
        }
        if(!count($image_array)){
            $file='assets/No_image.png';
            if(file_exists($file)){
                $image_array[]=$file;
            } 
        }

        $where = "product_id = '".$jewelry_id."'";      
        $attribute = $this->jewelry_model->jewelry_option($where);
        foreach ($records as $row) 
        {
          $img=$this->list_image($row->NM_FOLDER_NAME,$row->product_id);
          $row->image_show = @$img['0'];
          //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
          $product_price_arr=$this->product_price($row->product_id);
          if(!$product_price_arr['price_var'] && $product_price_arr['price']){
            $row->product_price_show='$'.$product_price_arr['price'];
          }else{
            $row->product_price_show='$'.$product_price_arr['price_min'].'-$'.$product_price_arr['price_max'];
          }

          $row->metal_color = '';
          $row->metal_type = '';

          foreach ($attribute as $attr) {
            if($attr->product_id==$row->product_id)
            {            
              if(trim($attr->name)=='Metal Color')
              {
                $row->metal_color = $attr->value;
              }
              if(trim($attr->name)=='Metal Type')
              {
                $row->metal_type = $attr->value;
              }
            }
          }
        }

      } 
  
      $data= array(
          'records'=>$records,
          'image_array'=>$image_array,
          'current_url'=>$_SERVER['HTTP_REFERER'],
      );
      ////////////////  Email code /////////////////////////
                              
      $config['wordwrap'] = TRUE;
      $config['mailtype'] = 'html';      
      $config['charset'] = 'utf-8';
      $config['priority'] = '1';      
      $config['crlf']      = "\r\n";      
      $config['newline']      = "\r\n";
      //$config['smtp_crypto']  = 'tls';      
      $this->email->initialize($config);      
      $this->email->from(SITE_EMAIL,SITE_NAME); 
      $this->email->to($email);
      $this->email->subject("Jewelry Enquiry");          
      $data_email['fname'] = $name;      
      $str_content = '';
      $str_name = ucwords($data_email['fname']);

      foreach($records as $member) { 
          if($member->product_sku != ""){ $product_sku=$member->product_sku; }else{ $product_sku=""; }
          if($member->product_name != ""){ $product_name=$member->product_name; }else{ $product_name=""; }
          if($member->product_short_description != ""){ $product_short_description=$member->product_short_description; }else{ $product_short_description=""; }
          if($member->product_price_show != ""){ $product_price_show=$member->product_price_show; }else{ $product_price_show=""; }
          if($member->metal_color != ""){ $metal_color=$member->metal_color; }else{ $metal_color=""; }
          if($member->metal_type != ""){ $metal_type=$member->metal_type; }else{ $metal_type=""; }
      }      

      $data_email['message_body'] = 'You have asked for product enquiry. We will get back to you soon. Your query is as follows.<br>
      Name : '.$name.'<br>
      Email : '.$email.'<br>
      Phone : '.$phone.'<br>
      Message : '.$comment.' ';
      $data_email['product_name'] =$product_name;       
      $data_email['product_image'] ='<a href="'.$data['current_url'].'" title="" class="" target="_blank">
              <img align="center" alt="" src="'.base_url().''.$image_array['0'] .'" width="500" style="max-width:1000px; padding-bottom: 0; display: inline !important; vertical-align: bottom;" class="mcnRetinaImage">
              </a>';
      $data_email['product_detail'] ='<strong>Sku# :</strong> '.$product_sku.'<br>
              <strong>Price :</strong> '.$product_price_show.'<br>
              <strong>Metal Color :</strong> '.$metal_color.'<br>
              <strong>Metal Type :</strong> '.$metal_type.'<br>
              <strong>Description :</strong> '.$product_short_description.' ';              
      $data_email['detail_link'] ='<a class="mcnButton " title="Start Shopping" href="'.$data['current_url'].'" target="_blank" 
      style="font-weight: bold;letter-spacing: -0.5px;line-height: 100%;text-align: center;text-decoration: none;color: #FFFFFF;">Start Shopping</a>';        

      $msg = $this->load->view('email/jewelry_details',$data_email, TRUE);      
      $this->email->message($msg);
      $this->email->send();
      //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
      $this->email->initialize($config);      
      $this->email->from(SITE_EMAIL,SITE_NAME);      
      $this->email->to(SITE_EMAIL);
      $this->email->subject("Jewelry Enquiry");          
      $data_email['fname'] = "Admin";      
      $str_name = ucwords($data_email['fname']);
      $data_email['message_body'] = 'A customer has asked for product enquiry. Query is as follows.<br>
      Name : '.$name.'<br>
      Email : '.$email.'<br>
      Phone : '.$phone.'<br>
      Message : '.$comment.' ';
      $msg = $this->load->view('email/jewelry_details',$data_email, TRUE);
      
      $this->email->message($msg); 
      $this->session->set_flashdata('error_message','Sorry Unable to send email.');
      if($this->email->send()){     
         $this->session->set_flashdata('alert_message','Email has been sent successfully.');
      }                        
      redirect($_SERVER['HTTP_REFERER']);            
  }
  function compare_jewelry()
  { 
      $this->load->view('common/header');
      $this->load->view('jewelry/compare_jewelry');
      $this->load->view('common/footer');
  } 
  function getCompareAjax()
  {  
      if(!$this->input->is_ajax_request()){ exit('No direct script access allowed'); }
      $image_array=array();
      $sample_image_array=array();
      $compare_jewelry=array();

      $compare_jewelry=$this->session->userdata('compare_jewelry');
      $compare_jewelry=@implode("','", $compare_jewelry);

      $where = "product_id IN ('".$compare_jewelry."')";      
      $attribute = $this->jewelry_model->jewelry_option($where);

      $records = $this->jewelry_model->jewelry_compare($where);
      foreach ($records as $row) 
      {
        $img=$this->list_image($row->NM_FOLDER_NAME,$row->product_id);
        $row->image_show = @$img['0'];
        //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
        $product_price_arr=$this->product_price($row->product_id);
        if(!$product_price_arr['price_var'] && $product_price_arr['price']){
          $row->product_price_show='$'.$product_price_arr['price'];
        }else{
          $row->product_price_show='$'.$product_price_arr['price_min'].'-$'.$product_price_arr['price_max'];
        }

        $row->metal_color = '';
        $row->metal_type = '';
        $row->stone_weight = '';
        $row->diamond_weight = '';
        $row->net_alloy = '';

        foreach ($attribute as $attr) {
          if($attr->product_id==$row->product_id)
          {            
            if(trim($attr->name)=='Metal Color')
            {
              $row->metal_color = $attr->value;
            }
            if(trim($attr->name)=='Metal Type')
            {
              $row->metal_type = $attr->value;
            }             
          }
        }
      }
   
      $data= array(
          'records'=>$records,
          'total_records'=>count(array_filter($records))
      );
      echo json_encode($data);
  }
  function add_compare()
  {
      if(!$this->input->is_ajax_request()){ exit('No direct script access allowed'); }
      $compare_jewelry=array();
      $message='Added To Compare';
      $status='0';
      if($this->session->userdata('compare_jewelry'))
      {
        $compare_jewelry=$this->session->userdata('compare_jewelry');
      }    
      $jewelry_id=$this->input->get('jewelry_id');

      if (($key = array_search($jewelry_id, $compare_jewelry)) !== false) {
        unset($compare_jewelry[$key]);
        $message='Removed From Compare';
      }
      else if(count(array_unique($compare_jewelry))<10){        
        $compare_jewelry[]= $jewelry_id;       
      }
      else{
        $message='Compare List got Full. Please Remove Some Item.(Max:10)'; 
      }

      $this->session->set_userdata('compare_jewelry',array_unique($compare_jewelry));
      echo json_encode(array('message'=>$message,'status'=>$status));
  }
  function remove_compare()
  {
      if(!$this->input->is_ajax_request()){ exit('No direct script access allowed'); }
      $id=$this->input->get('id');
      $compare_jewelry=$this->session->userdata('compare_jewelry');

      if (($key = array_search($id, $compare_jewelry)) !== false) {
        unset($compare_jewelry[$key]);
      }

      $this->session->set_userdata('compare_jewelry',array_unique(array_filter($compare_jewelry)));
      echo json_encode('ok');
  }

  function product_cohort_submit()
  {
      if($this->session->userdata('user_id')=="")
      {
          $this->session->set_flashdata('error_message', 'Please Login!');
          redirect(base_url('login'));
      }
      $product_id=$this->input->post('product_id');
      $cohort_rating=$this->input->post('cohort_rating');
      $cohort_title=$this->input->post('cohort_title');
      $cohort_content=$this->input->post('cohort_content');

      $where=array(
        'product_id'=>$product_id,
        'user_id'=>$this->session->userdata('user_id')
      );
      $details=$this->common_model->selectWhere('tbl_product_cohort',$where);
      //print_ex($details);
      if(!empty($details)){
        $data=array(
          'product_cohort_title'=>$cohort_title,
          'product_cohort'=>$cohort_content,
          'product_rating'=>$cohort_rating['0'],
          'product_cohort_added'=>date('Y-m-d'),
        );        
        $this->common_model->updateData('tbl_product_cohort',$data,$where);
      }else{
        $data=array(
          'product_id'=>$product_id,
          'user_id'=>$this->session->userdata('user_id'),
          'product_cohort_title'=>$cohort_title,
          'product_cohort'=>$cohort_content,
          'product_rating'=>$cohort_rating['0'],
          'product_cohort_added'=>date('Y-m-d'),
        );
        $this->common_model->insertData('tbl_product_cohort',$data);
      }
      redirect($_SERVER['HTTP_REFERER']);
  }
  function product_cohort()
  {    
      $segment_2=$this->uri->segment(2);
      $image_array=array(); 

      $where = "product_slug = '".$segment_2."'";
      $records= $this->jewelry_model->jewelry_list($where); 

      $jewelry_id=$records['0']->product_id;
      $product_price_arr=$this->product_price($jewelry_id);
      if(!$product_price_arr['price_var'] && $product_price_arr['price']){
        $product_price_show='$'.$product_price_arr['price'];
      }else{
        $product_price_show='$'.$product_price_arr['price_min'].'-$'.$product_price_arr['price_max'];
      }
      $img=$this->list_image($records['0']->NM_FOLDER_NAME,$records['0']->product_id);
      $image_array[] = @$img['0'];

      $where = "product_id = ".$jewelry_id." and status='active' ";
      $cohort_count = $this->jewelry_model->getProductcohortCount($where);
      $cohort_sum = $this->jewelry_model->getProductcohortSum($where);
      $cohort_rating = @round($cohort_sum['0']->cohort_sum / $cohort_count['0']->cohort_count);

      $data= array(
          'records'=>$records,
          'image_array'=>$image_array,
          'product_price_show'=>$product_price_show,
          'cohort_count'=>$cohort_count['0']->cohort_count,
          'cohort_rating'=>$cohort_rating,
      );
      //print_ex($data);
      $data['page_head'] = 'Jewelry cohort';

      $this->load->view('common/header',$data);
      $this->load->view('jewelry/jewelry_cohort',$data);
      $this->load->view('common/footer');
  }
  function load_product_cohort()
  {
      if(!$this->input->is_ajax_request()){ exit('No direct script access allowed'); }

      $product_id=$this->input->get('product_id');
      $page=$this->input->get('page');
      $per_page=$this->input->get('per_page');
       
      $where = "product_id = ".$product_id." and status='active'";
      $records_count = $this->jewelry_model->getProductcohortCount($where);      
      $data['records_count'] =@$records_count['0']->cohort_count;  
 
      $per_page= ($per_page) ? $per_page : 10 ;
      $config['base_url'] = base_url().'load-product-cohort';
      $config['total_rows'] = $data['records_count'];
      $config['per_page'] = $per_page;
      $config['page_query_string'] = true;
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

      $where = "p.product_id = ".$product_id." and pr.status='active'";
      $records = $this->jewelry_model->getProductcohortLimit($where,$per_page,$page);

      echo json_encode(array('records'=>$records,'page_link'=>$page_link,'total_records'=>$data['records_count']));     
  }
  /// search //
  public function header_search()
  {
      $searchText=$this->input->get('searchText');

      $query_c = $this->db->query("select category_name as keyword from tbl_category where category_status ='active' and category_name like '%".$searchText."%' limit 0,100");
      $result_c = $query_c->result();        

      $query_p = $this->db->query("select product_sku as keyword from tbl_product where product_status ='active' and product_sku like '%".$searchText."%' limit 0,100");
      $result_p = $query_p->result();

      $result = $result_c + $result_p;

      echo json_encode(array('list'=>$result));   
  }

  public function header_search_result()
  {  
      $data=array();
      $search = $this->input->post('search'); 
      if($search)
      { 
        $where="product_name LIKE '%$search%'";
        $where .="AND product_status = 'active' ";
        //$where .="OR product_description LIKE '%$keyword%'";
        $data = $this->jewelry_model->jewelry_list($where); 
      }
      //print_ex($data);
      if(!empty($data)){
          redirect(base_url().'jewelry-details/'.$data['0']->product_slug);
      }
      else{
          redirect(base_url().'jewelry');
      }       
  }
  
  function cohort_submit() {

       // print_ex($_REQUEST);
       //  print_ex($_FILES);   

        $this->form_validation->set_rules('name', 'Name', 'trim|required');
		    $this->form_validation->set_rules('product_id', 'Product ID', 'trim|required');
        $this->form_validation->set_rules('comment', 'Comment', 'trim|required|min_length[5]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('product_cohort_type', 'cohort Type', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $errors = validation_errors();
            $this->session->set_flashdata('error_message',$errors);
           // echo json_encode(['message'=>$errors]);
            // $message = $errors;
            // $status = 0;
            // echo json_encode(array('message' => $message, 'status' => $status));
            // exit();
        }
		
		 //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
      $media = '';
        $config['upload_path'] = './uploads/cohort/';
        $config['allowed_types'] = 'avi|mp4|3gp|mpeg|mpg|mov|mp3|flv|wmv';
        $config['max_size'] = 0;
        //$config['max_width'] = 1500;
        //$config['max_height'] = 1500;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('profile_image')) {
            $errors = array('error' => $this->upload->display_errors());
             $this->session->set_flashdata('error_message',$errors);
            //  $message = $errors;
            // $status = 0;
            // echo json_encode(array('message' => $message, 'status' => $status));
            //exit();
        } else {
            $mediadata =  $this->upload->data(); 
             $media =  $mediadata['file_name'];     
        }
      // print_pre($error);
		   // print_pre($data);
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $cohort_title = $this->input->post('cohort_title');
		    $comment = $this->input->post('comment');
		    $phone = $this->input->post('phone');
        $rating = $this->input->post('rating');
        $product_id = $this->input->post('product_id');
		    $user_id = $this->input->post('user_id'); 
		    $brand_id = $this->input->post('brand_id'); 
        $product_cohort_type = $this->input->post('product_cohort_type');      
         //print_ex($result);
       // echo $this->db->last_query(); 
      
            $data = array(
                'user_name' => $name, 
                'user_email' => $email,                 
                'user_phone' => $phone, 
				        'product_cohort_title' => $cohort_title,
				        'product_cohort' => $comment, 
                'product_rating' => $rating,                 
                'product_id' => $product_id,
				        'user_id' => $user_id,
				        'brand_id' => $brand_id, 
                'product_cohort_type' => $product_cohort_type,
                'media' => $media, 
                'product_cohort_added' => date('Y-m-d H:i:s'), 
                'status' => 'inactive'                
            );
            $user_id = $this->common_model->insertData('tbl_product_cohort', $data);
           

            $message = 'Comment submitted successfully';
            $this->session->set_flashdata('alert_message',$message);

            redirect($_SERVER['HTTP_REFERER']);
            //redirect('cohort/Byjus?brand=Byjus&course=15&course_type=1&class=3 ');
           
           //  $status = 1;
           // echo json_encode(array('message' => $message, 'status' => $status));
           // exit();
        
    }
	
  function cohort_like() {

       // print_ex($_REQUEST);
        $this->form_validation->set_rules('cohort_id', 'cohort_id', 'trim|required');
		$this->form_validation->set_rules('user_id', 'user_id', 'trim|required');
		$this->form_validation->set_rules('action', 'action', 'trim|required');
         if ($this->form_validation->run() == FALSE) {
            $errors = validation_errors();
           // echo json_encode(['message'=>$errors]);
            $message = $errors;
            $status = 0;
            echo json_encode(array('message' => $message, 'status' => $status));
            exit();
        }
        $cohort_id = $this->input->post('cohort_id');
        $user_id = $this->input->post('user_id');
		$action = $this->input->post('action');
		
         //print_ex($result);
         // echo $this->db->last_query(); 
		 
	  $where = 'cohort_id = '.$cohort_id.' and user_id = '.$user_id.'';
	  $record = $this->common_model->selectWhereorderby('tbl_product_cohort_like',$where,'prl_id','ASC');
	
    	if($record){
			//echo $record['0']->prl_id; die;
			$this->common_model->deleteData('tbl_product_cohort_like',array('prl_id'=>$record['0']->prl_id));
			
			if($record['0']->action != $action){
				 $data = array(
                'cohort_id' => $cohort_id, 
                'user_id' => $user_id,
				'action' => $action,
				'status' => 1,
                'date_added' => date('Y-m-d H:i:s'), 
                             
            );
            $user_id = $this->common_model->insertData('tbl_product_cohort_like', $data);
				}
			}else{ 
            $data = array(
                'cohort_id' => $cohort_id, 
                'user_id' => $user_id,
				'action' => $action,
				'status' => 1,
                'date_added' => date('Y-m-d H:i:s'), 
                             
            );
            $user_id = $this->common_model->insertData('tbl_product_cohort_like', $data);
		}

            $message = 'Comment submitted successfully';
            $status = 1;
           echo json_encode(array('message' => $message, 'status' => $status));
           exit();
        
    }

  function cohort_reply_submit() {

       // print_ex($_REQUEST);
       
		$this->form_validation->set_rules('product_id', 'Product ID', 'trim|required');
        $this->form_validation->set_rules('comment', 'Comment', 'trim|required|min_length[5]');
        $this->form_validation->set_rules('user_id', 'user_id', 'trim|required');
		$this->form_validation->set_rules('cohort_id', 'cohort_id', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $errors = validation_errors();
           // echo json_encode(['message'=>$errors]);
            $message = $errors;
            $status = 0;
            echo json_encode(array('message' => $message, 'status' => $status));
            exit();
        }
        $comment = $this->input->post('comment');
		$product_id = $this->input->post('product_id');
		$user_id = $this->input->post('user_id'); 
		$cohort_id = $this->input->post('cohort_id');       
         //print_ex($result);
       // echo $this->db->last_query(); 
      
            $data = array(
                'reply' => $comment, 
                'product_id' => $product_id,
				'user_id' => $user_id,
				'cohort_id' => $cohort_id, 
                'date_added' => date('Y-m-d H:i:s'), 
                'status' => '0'                
            );
            $user_id = $this->common_model->insertData('tbl_product_cohort_reply', $data);
           

            $message = 'Comment submitted successfully';
            $status = 1;
           echo json_encode(array('message' => $message, 'status' => $status));
           exit();
        
    }
	
  function boost_cohort_submit() {

       // print_ex($_REQUEST);
       
		$this->form_validation->set_rules('product_id', 'Product ID', 'trim|required');
        $this->form_validation->set_rules('comment', 'Comment', 'trim|required|min_length[5]');
        $this->form_validation->set_rules('user_id', 'user_id', 'trim|required');
		$this->form_validation->set_rules('brand_id', 'brand_id', 'trim|required');
		$this->form_validation->set_rules('cohort_id', 'cohort', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $errors = validation_errors();
           // echo json_encode(['message'=>$errors]);
            $message = $errors;
            $status = 0;
            echo json_encode(array('message' => $message, 'status' => $status));
            exit();
        }
        $comment = $this->input->post('comment');
		$product_id = $this->input->post('product_id');
		$user_id = $this->input->post('user_id'); 
		$cohort_id = $this->input->post('cohort_id'); 
		$brand_id = $this->input->post('brand_id');      
         //print_ex($result);
       // echo $this->db->last_query(); 
      
            $data = array(
                'comment' => $comment, 
                'product_id' => $product_id,
				'user_id' => $user_id,
				'cohort_id' => $cohort_id, 
				'brand_id' => $brand_id, 
                'date_added' => date('Y-m-d H:i:s'), 
                'status' => '1'                
            );
            $inser_id = $this->common_model->insertData('tbl_product_cohort_boost', $data);
           
			if($inser_id){
				
				 $where = "product_cohort_id='".$cohort_id."' ";
    			 $cohort_details=$this->common_model->selectWhere('tbl_product_cohort',$where);
				 
				 $where = "customer_id='".$user_id."' ";
    			 $user_details=$this->common_model->selectWhere('tbl_customer',$where);
				 
				 //print_ex($cohort_details);
				
				  $config['wordwrap'] = TRUE;
				  $config['mailtype'] = 'html';      
				  $config['charset'] = 'utf-8';
				  $config['priority'] = '1';      
				  $config['crlf']      = "\r\n";      
				  $config['newline']      = "\r\n";
				  
				  $this->email->initialize($config);      
				  $this->email->from(SITE_EMAIL,SITE_NAME);      
				  $this->email->to(SITE_EMAIL);
				  $this->email->subject("cohort Boost Request");  
				  
				  $data_email['message_body'] = 'Got New cohort Boost Request. With this query <br>
				   cohort Title: '.$cohort_details['0']->product_cohort_title.'<br>
				   cohort : '.$cohort_details['0']->product_cohort.'<br>
				   User Name : '.$user_details['0']->firstname.' '.$user_details['0']->lastname.'<br>
				   Email : '.$user_details['0']->email.'<br>
				   Phone : '.$user_details['0']->phone.'<br>
				   Message : '.$comment.' ';
			
				  $msg = $this->load->view('email/jewelry_details',$data_email, TRUE);
				  $this->email->message($msg);
				  $this->session->set_flashdata('error_message','Sorry Unable to send email.');
				  if($this->email->send()){     
					 $this->session->set_flashdata('alert_message','Email has been sent successfully.');
				  }  
				}
            $message = 'Comment submitted successfully';
            $status = 1;
           echo json_encode(array('message' => $message, 'status' => $status));
           exit();
        
    }

}
