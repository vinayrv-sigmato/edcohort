<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class admin_product extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('image_lib');
        $this->load->model('product_model');
        $this->load->model('category_model');
        if ($this->session->userdata('jw_admin_id')=="")
        {
            redirect(base_url().'admin_login');
        }
    }
    function index()
    {
        //$data['filter_product_list']=$this->product_model->product_list_total(array());
        //print_ex($data);
        $where ='product_id > 0  AND product_status!="delete"';
        $order_by=' ORDER BY product_id ';
        $records=$this->product_model->product_list($where,$order_by);
        //print_ex($records);
        foreach ($records as $row) 
        {

            $row->product_category_show=getMenuList($row->category_id);
            $row->product_brand_show=getBrandList($row->product_brand);
        }
        $data['records'] = $records;
        $data['category_list']=$this->category_model->get_category();
        //print_ex($data);
        $data['active']="product";
        $this->load->view('common/header');
        $this->load->view('common/sidebar',$data);
        $this->load->view('product/product_list_view',$data);
        $this->load->view('common/footer');
    }
    function loadData()
    {
        $page=$this->input->get('page');
        $per_page=$this->input->get('per_page');
        //$filter_status=$this->input->get('filter_status');
        $user_id=$this->session->userdata('jw_admin_id');      
        $group_id=$this->session->userdata('jw_admin_group');
        $filter_name=$this->input->get('filter_name');
        $filter_sku=$this->input->get('filter_sku');
        $filter_model=$this->input->get('filter_model');
        $filter_status=$this->input->get('filter_status');
        $where ='product_id > 0  AND product_status!="delete"';
        if($group_id!='1'){ 
            $where .=" AND seller_id ='".$user_id."'";
        }
        if($filter_name!="")
        {
            $where .=' AND product_name like "%'.$filter_name.'%"';
        }
        if($filter_sku!="")
        {
            $where .=' AND product_sku = "'.$filter_sku.'"';
        }
        if($filter_model!="")
        {
            $where .=' AND product_model = "'.$filter_model.'"';
        }
        if($filter_status!="")
        {
            $where .=' AND product_status = "'.$filter_status.'"';
        }
        $total = $this->input->get('price');
        $splittotal = explode(';', $total);
        $splittotal1 = $splittotal['0'];
        $splittotal2 = @$splittotal['1'];    
        if(!empty($total))
        {
            $where .= " AND price_filter BETWEEN ('".$splittotal1."') AND ('".$splittotal2."')";         
        }
        else
        {
            $where .= " AND price_filter BETWEEN ('0') AND ('500000')";  
        }
        $order_by=' ORDER BY product_id ';
        //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
        $product_total=$this->product_model->productTotal($where,$order_by);
        $data['product_count'] =$product_total['0']->product_count;         
        $per_page= ($per_page) ? $per_page : 100 ;
        $config['base_url'] = base_url().'admin_product/loadData';
        $config["total_rows"] = $data['product_count'];
        $config["per_page"] = $per_page;
        $config['first_link'] = 'FIRST';
        $config['last_link'] = 'LAST';
        $config['first_tag_open'] = '<li class="paginate_button">';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li class="paginate_button">';
        $config['last_tag_close'] = '</li>';
        $config['next_link'] = 'NEXT';
        $config['next_tag_open'] = '<li class="paginate_button">';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = 'PREV';
        $config['prev_tag_open'] = '<li class="paginate_button">';
        $config['prev_tag_close'] = '</li>';
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['cur_tag_open'] = '<li class="active"><a href="">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="paginate_button">';
        $config['num_tag_close'] = '</li>';
        $config["num_links"] = 8;
        $config['page_query_string'] = TRUE;
        $config['query_string_segment'] = 'page';
        $this->pagination->initialize($config);
        $page = ($page) ? $page : 0;
        $page_link = $this->pagination->create_links();
        $records=$this->product_model->product_list($per_page,$page,$where,$order_by);
        foreach ($records as $row) 
        {
            $product_price_arr=$this->product_price($row->product_id);
            if(!$product_price_arr['price_var'] && $product_price_arr['price']){
              $row->product_price_show='$'.$product_price_arr['price'];
            }else{
              $row->product_price_show='$'.$product_price_arr['price_min'].' - $'.$product_price_arr['price_max'];
            }

            $row->product_category_show=getMenuList($row->category_id);
        }
        echo json_encode(array('records'=>$records,'page_link'=>$page_link,'total_records'=>$data['product_count']));      
    }
    function product_price($product_id){
        $price=0;
        $price_min=0;
        $price_max=0;
        $price_var=0;
        $where = "product_id='".$product_id."' ";
        $product_details=$this->admin_model->selectWhere('tbl_product',$where);
        if($product_details['0']->product_sale_price>0){
          $price=$product_details['0']->product_sale_price;
        }else{
          $price=$product_details['0']->product_price;
        }   
        $where="product_id='".$product_id."' and is_active='1'";
        $variation_price_min=$this->product_model->variation_price_min($where);
        $variation_price_max=$this->product_model->variation_price_max($where);
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
    function add_product()
    {
        $data['category_list']=$this->category_model->get_category();
        $where = "brand_status = 1 ";
        $data['brand_list']=$this->admin_model->selectWhere('tbl_brand',$where);
        $where = "status = 1 ";
        $data['class_list']=$this->admin_model->selectWhere('tbl_class',$where);
        $data['board_list']=$this->admin_model->selectWhere('tbl_board',$where);
        $data['batch_list']=$this->admin_model->selectWhere('tbl_batch',$where);
       
       
        $data['active']="product";
        $this->load->view('common/header');
        $this->load->view('common/sidebar',$data);
        $this->load->view('product/product_add_view');
        $this->load->view('common/footer');
    }
    function add_product_submit()
    {
        $product_image_array=array();
        $product_video_array=array();
        $POST=$this->input->post();        
        $user_id=$this->session->userdata('jw_admin_id');
        $group_id=$this->session->userdata('jw_admin_group');
        $folder=$this->session->userdata('jw_admin_folder'); 
        $option_list=$this->admin_model->selectAll('tbl_option');  
        foreach ($_FILES['img_upload']['name'] as $key => $value)
        {   
            $new_name1 = str_replace(".","",microtime());
            $new_name=str_replace(" ","_",$new_name1);
            $file_tmp =$_FILES['img_upload']['tmp_name'][$key];
            $file=$_FILES['img_upload']['name'][$key];
            $ext=substr(strrchr($file,'.'),1);
            if($ext=="png" || $ext=="gif" || $ext=="jpg" || $ext=="jpeg")
            {
                $uploaded=move_uploaded_file($file_tmp,"../uploads/product/image/".$file);
                //$product_image=$new_name.".".$ext;
                $product_image=$file;
                $product_image_array[]=$product_image;
            }
         //    if ($uploaded)
         //    {
         //        $img_config['image_library'] = 'gd2';
                // $img_config['source_image'] = '../assets/upload/product/original/'.$product_image;
                // $img_config['create_thumb'] = FALSE;
                // $img_config['maintain_ratio'] = TRUE;
                // $img_config['width'] = 420;
                // $img_config['height']    = 512;
                // $img_config['new_image'] ='../assets/upload/product/base/'.$product_image;
                // $this->image_lib->initialize($img_config);
                // $this->image_lib->resize();
                // $this->image_lib->clear();
         //        //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
         //        $img_config['image_library'] = 'gd2';
                // $img_config['source_image'] = '../assets/upload/product/original/'.$product_image;
                // $img_config['create_thumb'] = FALSE;
                // $img_config['maintain_ratio'] = TRUE;
                // $img_config['width'] = 100;
                // $img_config['height']    = 122;
                // $img_config['new_image'] ='../assets/upload/product/thumb/'.$product_image;
                // $this->image_lib->initialize($img_config);
                // $this->image_lib->resize();
                // $this->image_lib->clear();
         //    }
        }
        //print_ex($product_image_array);
        //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
        foreach ($_FILES['video_upload']['name'] as $key => $value)
        {   
            $new_name1 = str_replace(".","",microtime());
            $new_name=str_replace(" ","_",$new_name1);
            $file_tmp =$_FILES['video_upload']['tmp_name'][$key];
            $file=$_FILES['video_upload']['name'][$key];
            $ext=substr(strrchr($file,'.'),1);
            if($ext=="mp4")
            {
                $uploaded=move_uploaded_file($file_tmp,"../uploads/product/video/".$file);
                $product_video=$file;
                $product_video_array[]=$product_video;
            }
        }
        //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
        $product_attribute=$this->input->post("product_attribute");
        $attribute_name=$this->input->post("attribute_name");
        $product_feature=$this->input->post("product_feature"); 
        $parent_category=$this->input->post("parent_category");
        $builder_diamond_shape=$this->input->post("builder_diamond_shape");
        $video_link=$this->input->post("video_link");
        if($group_id=='3'){
            $product_added_by='vendor';
        } else {
            $product_added_by='admin';
        }
        //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
        $slug = makeSlug($this->input->post("item_title"));
        $wheres = " product_slug like '".$slug."%'";
        $slug_list = $this->product_model->getProductSlug($wheres);
        if(!empty($slug_list)){
            foreach($slug_list as $row)
            {
                $slug_arr[] = $row->product_slug;
            }
            if(in_array($slug, $slug_arr))
            {
                for ($i=1; in_array(($slug.'-'.$i),$slug_arr); $i++) { }                    
                $slug = $slug.'-'.$i;
            }
        }
        //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
        $data=array(
            'product_name'=>$this->input->post("item_title"),
            'product_added_by'=>$product_added_by,
            'seller_id'=>$user_id,
            'product_model'=>$this->input->post("model_num"),
            'manufacturer_id'=>$this->input->post("manufacturer"),
            'product_brand'=>$this->input->post("brand_name"),
            'brand_id'=>$this->input->post("brand_name"),
            'product_sku'=>$this->input->post("seller_sku"),
            'product_description'=>$this->input->post("product_description"),                
            'product_short_description'=>$this->input->post("product_short_description"),  
            'product_maximum_quantity'=>$this->input->post("max_quantity"), 
            'product_status'=>$this->input->post("product_status"),
            'product_global_addons'=>$this->input->post("global_addons"),
            'product_slug'=>$slug,  
            'product_sort'=>$this->input->post("product_sort"),
            'product_builder_sort'=>$this->input->post("product_builder_sort"),
			'product_type'=>$this->input->post("product_type"),
            'class_id'=>$this->input->post("class_name"),
            'board_id'=>$this->input->post("board_name"),
            'batch_id'=>$this->input->post("batch_name"),
        );
        $product_id=$this->admin_model->insertData('tbl_product',$data);
        if($product_id)
        {
            
            $data_description=array(
                'product_id'=>$product_id,                    
                'product_meta_title'=>$this->input->post("meta_title"),
                'product_meta_keyword'=>$this->input->post("meta_keyword"),
                'product_meta_description'=>$this->input->post("meta_description"),
                 'stone_breakdown'=>$this->input->post("stone_breakdown"),
                 'semi_mount_dwt'=>$this->input->post("semi_mount_dwt"),
                 'diamond_cttw_provided'=>$this->input->post("diamond_cttw_provided"),
                 'diamond_quality'=>$this->input->post("diamond_quality"),
            );
            $this->admin_model->insertData('tbl_product_description',$data_description);
            foreach ($parent_category as $key => $value) 
            {
                $data_category=array(
                    'product_id'=>$product_id,
                    'category_id'=>$value,
                );
                $this->admin_model->insertData('tbl_product_category',$data_category);
            }
            foreach ($product_image_array as $key => $value) 
            {
                $data_image=array(
                    'product_id'=>$product_id,
                    'product_image'=>$value,
                    'product_image_sort_order'=>$key+1,
                );
                $this->admin_model->insertData('tbl_product_image',$data_image);
            }            
            foreach ($product_video_array as $key => $value) 
            {
                $data_video=array(
                    'product_id' => $product_id,
                    'product_video' => $value,
                    'video_type' => 'file',
                );
                $this->admin_model->insertData('tbl_product_video',$data_video);
            }              
            if (!empty($video_link)) 
            {
                foreach ($video_link as $key => $value) {
                    $data_video = array(
                        'product_id' => $product_id,
                        'product_video' => $value,
                        'video_type' => 'link',
                    );
                    $this->admin_model->insertData('tbl_product_video',$data_video);
                }
            }   

           

            foreach ($product_feature as $feature)
            {
                $data_feature=array(
                        'product_id'=>$product_id,
                        'product_feature'=>$feature
                );
                $this->admin_model->insertData('tbl_product_feature',$data_feature);
            }
            $this->session->set_flashdata('success','Product Has Been Updated Successfully!');
           
        }
        redirect(base_url()."admin_product");
    }
    function edit_product($product_id)
    {
        $user_id=$this->session->userdata('jw_admin_id');
        $group_id=$this->session->userdata('jw_admin_group'); 
        $folder=$this->session->userdata('jw_admin_folder'); 
        //print_ex($user_details);
        $option_array=array();
        $category_array=array();
        $brand_array=array();
        $diamond_shape_array=array();
        $data['product_detail']=$this->product_model->product_details($product_id);
        $data['category_list']=$this->category_model->get_category();
        $data['attribute_list']=$this->admin_model->selectAll('tbl_attribute');
       // $data['option_list']=$this->admin_model->selectAll('tbl_option');
       // $data['dimension_class']=$this->admin_model->selectAll('tbl_dimension_class');
       // $data['weight_class']=$this->admin_model->selectAll('tbl_weight_class');
      //  $data['diamond_shape']=$this->admin_model->selectAll('tbl_diamond_shape');
        $where=array('product_id'=>$product_id);
        $data['product_image']=$this->admin_model->selectOne('tbl_product_image','product_id',$product_id);
        $data['product_feature']=$this->admin_model->selectOne('tbl_product_feature','product_id',$product_id);
        $data['product_attribute']=$this->admin_model->selectJoin('tbl_product_attribute','attribute_id','tbl_attribute','attribute_id',$where);
        $data['product_option']=$this->admin_model->selectJoin('tbl_product_option','option_id','tbl_option','option_id',$where);
        foreach ($data['product_option'] as $key => $value) {
            $option_array[]=$value->option_id;
        }
        $data['option_array']=array_unique($option_array);
        $data['product_category']=$this->admin_model->selectOne('tbl_product_category','product_id',$product_id);
        foreach ($data['product_category'] as $key => $value) {
            $category_array[]=$value->category_id;
        }
        $data['product_diamond_shape']=$this->admin_model->selectOne('tbl_product_diamond_shape','product_id',$product_id);
        foreach ($data['product_diamond_shape'] as $key => $value) {
            $diamond_shape_array[]=$value->diamond_shape;
        }
        $data['diamond_shape_array']=array_unique($diamond_shape_array);
        // $where="product_id='".$product_id."'";
        // $option = $this->product_model->product_option($where);
        // foreach ($option as $opt_row) {
        //     $opt[$opt_row->name][]=$opt_row->value;
        // }
        // $data['product_variation']=$opt;
        //print_ex($data);

        $data['product_video_file']=$this->admin_model->selectWhere('tbl_product_video',array('product_id'=>$product_id,'video_type'=>'file'));
        $data['product_video_link']=$this->admin_model->selectWhere('tbl_product_video',array('product_id'=>$product_id,'video_type'=>'link'));

        $data['product_variation']=$this->admin_model->selectOne('tbl_product_price_variation','product_id',$product_id);
        $data['category_array']=array_unique($category_array);

        $where = "brand_status = 1 ";
        $data['brand_list']=$this->admin_model->selectWhere('tbl_brand',$where);

        $where = "status = 1 ";
        $data['class_list']=$this->admin_model->selectWhere('tbl_class',$where);
        $where = "status = 1 ";
        $data['board_list']=$this->admin_model->selectWhere('tbl_board',$where);
        $where = "status = 1 ";
        $data['batch_list']=$this->admin_model->selectWhere('tbl_batch',$where);
        //print_ex($data);

        $data['active']="product";
        $this->load->view('common/header');
        $this->load->view('common/sidebar',$data);
        $this->load->view('product/product_edit_view',$data);
        $this->load->view('common/footer');
    }
    function edit_product_submit()
    {
        $product_image_array=array();
        $product_video_array=array();
        $user_id=$this->session->userdata('jw_admin_id');
        $group_id=$this->session->userdata('jw_admin_group'); 
        $folder=$this->session->userdata('jw_admin_folder'); 
        $POST=$this->input->post();
        //print_pre($this->input->post());
        $option_list=$this->admin_model->selectAll('tbl_option'); 
        $product_id=$this->input->post('product_id');       
        foreach ($_FILES['img_upload']['name'] as $key => $value)
        {   
            $uploaded="";
            $new_name1 = str_replace(".","",microtime());
            $new_name=str_replace(" ","_",$new_name1);
            $file_tmp =$_FILES['img_upload']['tmp_name'][$key];
            $file=$_FILES['img_upload']['name'][$key];
            $ext=substr(strrchr($file,'.'),1);
            if($ext=="png" || $ext=="gif" || $ext=="jpg" || $ext=="jpeg")
            {
                $uploaded=move_uploaded_file($file_tmp,"../ftp_upload/".$folder."/product/image/".$file);
                //$product_image=$new_name.".".$ext;
                $product_image=$file;
                $product_image_array[]=$product_image;
            }
           
        }
       // print_ex($_POST);
        //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
        foreach ($_FILES['video_upload']['name'] as $key => $value)
        {   
            $new_name1 = str_replace(".","",microtime());
            $new_name=str_replace(" ","_",$new_name1);
            $file_tmp =$_FILES['video_upload']['tmp_name'][$key];
            $file=$_FILES['video_upload']['name'][$key];
            $ext=substr(strrchr($file,'.'),1);
            if($ext=="mp4")
            {
                $uploaded=move_uploaded_file($file_tmp,"../ftp_upload/".$folder."/product/video/".$file);
                $product_video=$file;
                $product_video_array[]=$product_video;
            }
        }
        //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
        $product_attribute=$this->input->post("product_attribute");
        $attribute_name=$this->input->post("attribute_name");
        $product_feature=$this->input->post("product_feature"); 
        $parent_category=$this->input->post("parent_category");             
        $builder_diamond_shape=$this->input->post("builder_diamond_shape");        
        $video_link=$this->input->post("video_link");        
        if($product_id)
        {
            //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
            $slug = makeSlug($this->input->post("item_title"));
            $wheres = " product_slug like '".$slug."%' and product_id!='".$product_id."'";
            $slug_list = $this->product_model->getProductSlug($wheres);
            if(!empty($slug_list)){
                foreach($slug_list as $row)
                {
                    $slug_arr[] = $row->product_slug;
                }
                if(in_array($slug, $slug_arr))
                {
                    for ($i=1; in_array(($slug.'-'.$i),$slug_arr); $i++) { }                    
                    $slug = $slug.'-'.$i;
                }
            }          
            //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++  
            $where=array('product_id'=>$product_id);
            $data=array(
                'product_name'=>$this->input->post("item_title"),
                'product_added_by'=>'admin',
                'product_model'=>$this->input->post("model_num"),
                'manufacturer_id'=>$this->input->post("manufacturer"),
                'product_brand'=>$this->input->post("brand_name"),
                'brand_id'=>$this->input->post("brand_name"),
                'product_sku'=>$this->input->post("seller_sku"),
                'product_description'=>$this->input->post("product_description"),                
                'product_short_description'=>$this->input->post("product_short_description"),   
                'product_status'=>$this->input->post("product_status"),
                'product_global_addons'=>$this->input->post("global_addons"),
                'product_slug'=>$slug,
                'product_is_price'=>$this->input->post("product_is_price"),
                'product_is_get_quote'=>$this->input->post("product_is_get_quote"),
                'product_is_builder'=>$this->input->post("is_builder"),
                'product_sort'=>$this->input->post("product_sort"),
                'product_builder_sort'=>$this->input->post("product_builder_sort"),
				'product_type'=>$this->input->post("product_type"),
                'class_id'=>$this->input->post("class_name"),
                'board_id'=>$this->input->post("board_name"),
                'batch_id'=>$this->input->post("batch_name"),
            );
            $this->admin_model->updateData('tbl_product',$data,$where);
            
            $data_description=array(
                //'product_id'=>$product_id,
                'product_meta_title'=>$this->input->post("meta_title"),
                'product_meta_keyword'=>$this->input->post("meta_keyword"),
                'product_meta_description'=>$this->input->post("meta_description"),
                 'stone_breakdown'=>$this->input->post("stone_breakdown"),
                'semi_mount_dwt'=>$this->input->post("semi_mount_dwt"),
                'diamond_cttw_provided'=>$this->input->post("diamond_cttw_provided"),
                'diamond_quality'=>$this->input->post("diamond_quality"),
            );
            $this->admin_model->updateData('tbl_product_description',$data_description,$where);
            $this->admin_model->deleteData('tbl_product_category',$where);
            foreach ($parent_category as $key => $value) 
            {
                $data_category=array(
                    'product_id'=>$product_id,
                    'category_id'=>$value,
                );
                $this->admin_model->insertData('tbl_product_category',$data_category);
            }

                    

            foreach ($product_image_array as $key => $value) 
            {
                $data_image=array(
                    'product_id'=>$product_id,
                    'product_image'=>$value,
                    'product_image_sort_order'=>$key+1,
                );
                $this->admin_model->insertData('tbl_product_image',$data_image);
            }            

            foreach ($product_video_array as $key => $value) 
            {
                $data_video=array(
                    'product_id' => $product_id,
                    'product_video' => $value,
                    'video_type' => 'file',
                );
                $this->admin_model->insertData('tbl_product_video',$data_video);
            }   

            $this->admin_model->deleteData('tbl_product_video',array('product_id' => $product_id,'video_type' => 'link'));           
            if (!empty($video_link)) 
            {
                foreach ($video_link as $key => $value) {
                    $data_video = array(
                        'product_id' => $product_id,
                        'product_video' => $value,
                        'video_type' => 'link',
                    );
                    $this->admin_model->insertData('tbl_product_video',$data_video);
                }
            }

           
            
            $this->admin_model->deleteData('tbl_product_feature',$where);
            foreach ($product_feature as $feature)
            {
                $data_feature=array(
                    'product_id'=>$product_id,
                    'product_feature'=>$feature
                );
                $this->admin_model->insertData('tbl_product_feature',$data_feature);
            }
            
            
        }

        $this->session->set_flashdata('success','Product Updated Successfully!');
        redirect(base_url()."admin_product/edit_product/".$product_id);
    }
    function product_detail($product_id)
    {
        $data['product_detail']=$this->product_model->product_details($product_id);
        $data['active']="product";
        $this->load->view('common/header');
        $this->load->view('common/sidebar',$data);
        $this->load->view('product/product_detail',$data);
        $this->load->view('common/footer');
    }
    function product_action()
    {
        $product_id=$this->input->post('product_id');
        $action=$this->input->post('action');
        //$product_id=explode(',',$product_id);
        $message='';
        if($action=="active")
        {
            $data=array('product_status'=>'active');
            foreach($product_id as $product) {
                $where=array('product_id'=>$product);
                $this->admin_model->updateData('tbl_product',$data,$where);
            }
            $message='Status Has Been Updated!';
        }
        if($action=="inactive")
        {
            $data=array('product_status'=>'inactive');
            foreach($product_id as $product) {
                $where=array('product_id'=>$product);
                $this->admin_model->updateData('tbl_product',$data,$where);
            }
            $message='Status Has Been Updated!';
        }
        if($action=="delete")
        {
            foreach($product_id as $product)
            {
                $where=array('product_id'=>$product);

                $this->admin_model->deleteData('tbl_product',$where);
                $this->admin_model->deleteData('tbl_product_shipping',$where);
                $this->admin_model->deleteData('tbl_product_description',$where);
                $this->admin_model->deleteData('tbl_product_category',$where);
                $this->admin_model->deleteData('tbl_product_diamond_shape',$where);

                $pro_image=$this->admin_model->selectWhere('tbl_product_image',$where);
                foreach ($pro_image as $row) {
                    //@unlink("../ftp_upload/".$folder."/product/image/".$row->product_image);
                }
                $this->admin_model->deleteData('tbl_product_image',$where);

                $pro_video=$this->admin_model->selectWhere('tbl_product_video',$where);
                foreach ($pro_video as $row) {
                    //@unlink("../ftp_upload/".$folder."/product/video/".$row->product_video);
                }
                $this->admin_model->deleteData('tbl_product_video',$where);
                $this->admin_model->deleteData('tbl_product_option',$where); 
                $this->admin_model->deleteData('tbl_product_feature',$where);

                $pro_variation=$this->admin_model->selectWhere('tbl_product_price_variation',$where);
                foreach ($pro_variation as $pro_row) {
                    $this->admin_model->deleteData('tbl_product_price_variation_attributes',array('variation_id'=>$pro_row->variation_id)); 
                }
                $this->admin_model->deleteData('tbl_product_price_variation',$where); 
            }
            $message='Product Has Been Deleted!';
        }        
        if($action=="sale")
        {
            $data=array('product_sale_allow'=>'yes');
            foreach($product_id as $product) {
                $where=array('product_id'=>$product);
                $this->admin_model->updateData('tbl_product',$data,$where);
            }
            $message='Product Has Been Updated!';
        }
        echo json_encode(array('message'=>$message));
    }
    function getAttrValue()
    {
        $attribute_id=$this->input->post('attribute_id');
        $where=array(
            'attribute_id'=>$attribute_id
        );
        $data=$this->admin_model->selectWhere('tbl_attribute_value',$where);
        echo json_encode($data);
    }
    function removeImage()
    {
        $folder=$this->session->userdata('jw_admin_folder');
        $image=$this->input->post('image');
        $where=array(
            'product_image'=>$image
        );
        $this->admin_model->deleteData('tbl_product_image',$where);
        @unlink("../ftp_upload/".$folder."/product/image/".$image);
        
        echo json_encode('ok');
    }     
    function removeVideo()
    {
        $folder=$this->session->userdata('jw_admin_folder');
        $video=$this->input->post('video');
        $where=array(
            'product_video'=>$video
        );
        $this->admin_model->deleteData('tbl_product_video',$where);
        @unlink("../ftp_upload/".$folder."/product/video/".$video);
        
        echo json_encode('ok');
    } 
    function loadFilter()
    {
        $searchText=$this->input->get('searchText');
        $select=$this->input->get('select');
        $where=array(
            $select=>$searchText
        );        
        $data=$this->admin_model->getFilter($select,'tbl_product',$where);
        echo json_encode(array('list'=>$data));
    }  
    function saveOption()
    {
        $option_first=array();
        $last=array();
        $post=$this->input->post();
        $product_id=$this->input->post('product_id');
        $option_list=$this->admin_model->selectAll('tbl_option');        
        foreach ($post as $key => $value) {
            if(is_array($value)){
                foreach ($value as $key1 => $value1) {            
                    foreach ($value1 as $key2 => $value2) {
                        if($key2=='name'){
                            $option_first['name'][]=str_replace('[]', '', $value2);
                        }
                        if($key2=='value'){
                            $option_first['value'][]=$value2;
                        }                    
                    }
                }
            }
        }
        foreach ($option_first['name'] as $key => $value) {
            $option_last[$value][]=$option_first['value'][$key];
        }
        foreach ($option_list as $key => $value) {            
             if(!empty(@$option_last['product_option_'.$value->option_id]) && !empty(@$option_last['pr_variation_'.$value->option_id])){                
                $last[$value->name]=@$option_last['product_option_'.$value->option_id];              
             }            
        }
        //print_pre($option_last);
        //print_ex($last);
        if($product_id){
            $product_id=$this->input->post('product_id');
            $where=array('product_id'=>$product_id);
            $this->admin_model->deleteData('tbl_product_option',$where);
            foreach ($option_list as $row) {
                $product_option=@$option_last["product_option_".$row->option_id];
                $pr_visible=@$option_last["pr_visible_".$row->option_id];
                $pr_variation=@$option_last["pr_variation_".$row->option_id];
                foreach ($product_option as $value){
                    $data_option=array(
                            'product_id'=>$product_id,
                            'option_id'=>$row->option_id,
                            'value'=>$value,
                            'is_visible'=>(!empty($pr_visible)) ? 1 : 0 ,
                            'is_variation'=>(!empty($pr_variation)) ? 1 : 0 ,
                    );
                    $this->admin_model->insertData('tbl_product_option',$data_option);
                }           
            }
        }
        //print_ex($option_last);         
        $html='<div class="row bottom-border">';                                    
        foreach ($last as $optkey => $optvalue){ 
        $html .='<div class="col-xs-6 col-sm-4 col-md-2 col-lg-2">';
                $n_name='default_cart_'.strtolower(str_replace(" ", "_", $optkey)); 
        $html .='   <select name="'.$n_name.'" id="'.$n_name.'" class="form-control ">'; 
        $html .='       <option value="any">No Default '.$optkey.' </option>';
                  foreach ($optvalue as $key => $value){ 
        $html .='       <option value="'.$value.'">'.$value.'</option>';                
                  }                    
        $html .='   </select>
                </div>';        
        } 
        $html .='<div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">                                        
                    <button  type="button" class="btn btn-info" onclick="return addVariation()"><i class="fa fa-plus"></i> Add Variation</button>                                        
                </div>                                    
            </div>'; 
        $html .='<div class="row" id="hidden_variation" style="display: none;">';                                   
        $html .='<div class="row clearfix row_var">';                                   
             foreach ($last as $optkey => $optvalue){ 
        $html .='  <div class="col-xs-6 col-sm-4 col-md-1 col-lg-1">';
               $n_name='cart_'.strtolower(str_replace(" ", "_", $optkey)); 
        $html .='   <select name="'.$n_name.'[]" class="ms form-control"> 
                        <option value="any">Any  '.$optkey.' </option>';
                 foreach ($optvalue as $key => $value){ 
        $html .='       <option value="'.$value.'"> '.$value.' </option>';                
                 }                      
        $html .='  </select>                
                </div>';        
             } 
        $html .='   <div class="col-lg-1 col-md-1 col-sm-2 col-xs-2">                                        
                        <button type="button" class="btn bg-red removeVariation" onclick="" title="Remove Variation"><i class="fa fa-times"></i> </button>                                        
                        <button type="button" class="btn bg-teal expandVariation"  title="Expand/Close Variation"><i class="fa fa-arrow-down"></i> </button>                                        
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12 expand_variation" style="display: none;">                                        
                        <div class="row">
                            <div class="col-lg-1 col-md-1 col-sm-4 col-xs-6 form-control-label">
                                <label for="">Regular Price</label>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-8 col-xs-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input class="form-control" required="" value="0" name="variation_regular_price[]" type="text">                                                
                                    </div>  
                                </div>
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-4 col-xs-6 form-control-label">
                                <label for="">Sale Price</label>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-8 col-xs-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input class="form-control" value="0"  name="variation_sale_price[]" type="text">                                                
                                    </div>  
                                </div>
                            </div>
                        </div>                                  
                    </div>
                </div>';
        $html .='</div>';
        if(!empty($last)){
            echo $html; 
        }
    }
    function updateSaveOption()
    {
        $option_array=array();
        $product_id=$this->input->post('product_id');
        $data['option_list']=$this->admin_model->selectAll('tbl_option');
        $where=array('product_id'=>$product_id);
        $data['product_option']=$this->admin_model->selectJoin('tbl_product_option','option_id','tbl_option','option_id',$where);
        foreach ($data['product_option'] as $key => $value) {
            if(!$value->is_variation=='1'){ continue; }
            $option_array[]=$value->option_id;
        }
        $data['option_array']=array_unique($option_array);
        $data['product_variation']=$this->admin_model->selectOne('tbl_product_price_variation','product_id',$product_id);
        $data['option_array']=array_values($data['option_array']);
        $html='<div class="row bottom-border">';                                    
        foreach ($data['option_list'] as $optkey => $optvalue){
            if(!in_array($optvalue->option_id,$data['option_array'])){ continue; }        
        $html .='<div class="col-xs-6 col-sm-4 col-md-2 col-lg-2">';
                $n_name='default_cart_'.strtolower(str_replace(" ", "_", $optvalue->name)); 
        $html .='   <select name="'.$n_name.'" id="'.$n_name.'" class="form-control ">'; 
        $html .='       <option value="any">No Default '.$optvalue->name.' </option>';
                  foreach ($data['product_option'] as $key => $value){
                    if($value->option_id!=$optvalue->option_id){ continue; }
        $html .='       <option value="'.$value->value.'">'.$value->value.'</option>';                
                  }                    
        $html .='   </select>
                </div>';        
        } 
        $html .='<div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">                                        
                    <button  type="button" class="btn btn-info" onclick="return addVariation()"><i class="fa fa-plus"></i> Add Variation</button>                                        
                </div>                                    
            </div>'; 
        $html .='<div class="row" id="hidden_variation" style="display: none;">';                                   
        $html .='<div class="row clearfix row_var">';                                   
        foreach ($data['option_list'] as $optkey => $optvalue){
            if(!in_array($optvalue->option_id,$data['option_array'])){ continue; }  
        $html .='  <div class="col-xs-6 col-sm-4 col-md-1 col-lg-1">';
                $n_name='cart_'.strtolower(str_replace(" ", "_", $optvalue->name));  
        $html .='   <select name="'.$n_name.'[]" class="ms form-control"> 
                        <option value="any">Any  '.$optvalue->name.' </option>';
                foreach ($data['product_option'] as $key => $value){
                    if($value->option_id!=$optvalue->option_id){ continue; }
        $html .='       <option value="'.$value->value.'"> '.$value->value.' </option>';                
                }                      
        $html .='  </select>                
                </div>';        
             }
        $html .='   <div class="col-lg-1 col-md-1 col-sm-2 col-xs-2">                                        
                        <button type="button" class="btn bg-red removeVariation" onclick="" title="Remove Variation"><i class="fa fa-times"></i> </button>                                        
                        <button type="button" class="btn bg-teal expandVariation"  title="Expand/Close Variation"><i class="fa fa-arrow-down"></i> </button>                                        
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12 expand_variation" style="display: none;">                                        
                        <div class="row">
                            <div class="col-lg-1 col-md-1 col-sm-4 col-xs-6 form-control-label">
                                <label for="">Regular Price</label>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-8 col-xs-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input class="form-control" required="" value="0" name="variation_regular_price[]" type="text">                                                
                                    </div>  
                                </div>
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-4 col-xs-6 form-control-label">
                                <label for="">Sale Price</label>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-8 col-xs-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input class="form-control" value="0"  name="variation_sale_price[]" type="text">                                                
                                    </div>  
                                </div>
                            </div>
                        </div>                                  
                    </div>
                </div>';
    $html .='</div>';
    $html .='<div id="variation_div">';
    foreach ($data['product_variation'] as $varkey => $varvalue){
        $o_array=array();
        $v_array=array();
        $product_var_attr=$this->admin_model->selectOne('tbl_product_price_variation_attributes','variation_id',$varvalue->variation_id);
        foreach ($product_var_attr as $key => $value) {
            $o_array[]=$value->variation_attributes_name;
            $v_array[]=$value->variation_attributes_value;
        }
        $o_array=array_unique($o_array);
        $v_array=array_unique($v_array);   
        $html .='<div class="row clearfix row_var">';                                   
        foreach ($data['option_list'] as $optkey => $optvalue){        
            if(!in_array($optvalue->option_id,$data['option_array'])){ continue; }  
        $html .='  <div class="col-xs-6 col-sm-4 col-md-1 col-lg-1">';
                $n_name='cart_'.strtolower(str_replace(" ", "_", $optvalue->name));  
        $html .='   <select name="'.$n_name.'[]" class="ms form-control"> 
                        <option value="any">Any  '.$optvalue->name.' </option>';
            foreach ($data['product_option'] as $key => $value){
                if($value->option_id!=$optvalue->option_id){ continue; }
        $html .='       <option value="'.$value->value.'" ';
            if(in_array($optvalue->name, $o_array) && in_array($value->value, $v_array)){                  
                    $html .='selected';                 
            }
        $html .= ' > '.$value->value.' </option>';                                   
            }                      
        $html .='  </select>                
                </div>'; 
        }       
        $html .='   <div class="col-lg-1 col-md-1 col-sm-2 col-xs-2">                                        
                    <button type="button" class="btn bg-red removeVariation" onclick="" title="Remove Variation"><i class="fa fa-times"></i> </button>                                        
                    <button type="button" class="btn bg-teal expandVariation"  title="Expand/Close Variation"><i class="fa fa-arrow-down"></i> </button>                                        
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-12 expand_variation" style="display:none">                                        
                    <div class="row">
                        <div class="col-lg-1 col-md-1 col-sm-4 col-xs-6 form-control-label">
                            <label for="">Regular Price</label>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-8 col-xs-6">
                            <div class="form-group">
                                <div class="form-line">
                                    <input class="form-control" required="" name="variation_regular_price[]" value="'.$varvalue->variation_price.'" type="text">                                                
                                </div>  
                            </div>
                        </div>
                        <div class="col-lg-1 col-md-1 col-sm-4 col-xs-6 form-control-label">
                            <label for="">Sale Price</label>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-8 col-xs-6">
                            <div class="form-group">
                                <div class="form-line">
                                    <input class="form-control"  name="variation_sale_price[]" value="'.$varvalue->variation_sale_price.'" type="text">                                                
                                </div>  
                            </div>
                        </div>
                    </div>                                  
                </div>
            </div>';
           }
        $html .='</div>';
        echo $html;
    }
    //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    function product_reviews()
    {
		
		$page=$this->input->get('page');
        $per_page=$this->input->get('per_page');
        $user_id=$this->session->userdata('jw_admin_id');      
        $group_id=$this->session->userdata('jw_admin_group');
        $filter_name=$this->input->get('filter_name');
        $filter_sku=$this->input->get('filter_sku');
        $filter_model=$this->input->get('filter_model');
        $filter_status=$this->input->get('filter_status');
        $where ='p.product_id > 0  AND pr.status!="delete"';
        if($filter_name!="")
        {
            $where .=' AND pr.product_name like "%'.$filter_name.'%"';
        }
        if($filter_status!="")
        {
            $where .=' AND pr.status = "'.$filter_status.'"';
        }
        //$order_by=' ORDER BY product_id ';
        //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
        $review_total=$this->product_model->getProductReviewCount($where);
        $data['review_count'] =$review_total['0']->review_count;         
        $data['records']=$this->product_model->getProductReview($where);
        //echo json_encode(array('records'=>$records,'page_link'=>$page_link,'total_records'=>$data['review_count']));      
		//print_ex($data['records']);
        $data['active']="product";
        $this->load->view('common/header');
        $this->load->view('common/sidebar',$data);
        $this->load->view('product/product_review_list_view',$data);
        $this->load->view('common/footer');
    }
    function loadReviews()
    {
        $page=$this->input->get('page');
        $per_page=$this->input->get('per_page');
        $user_id=$this->session->userdata('jw_admin_id');      
        $group_id=$this->session->userdata('jw_admin_group');
        $filter_name=$this->input->get('filter_name');
        $filter_sku=$this->input->get('filter_sku');
        $filter_model=$this->input->get('filter_model');
        $filter_status=$this->input->get('filter_status');
        $where ='p.product_id > 0  AND pr.status!="delete"';
        if($filter_name!="")
        {
            $where .=' AND pr.product_name like "%'.$filter_name.'%"';
        }
        if($filter_status!="")
        {
            $where .=' AND pr.status = "'.$filter_status.'"';
        }
        //$order_by=' ORDER BY product_id ';
        //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
        $review_total=$this->product_model->getProductReviewCount($where);
        $data['review_count'] =$review_total['0']->review_count;         
        $per_page= ($per_page) ? $per_page : 100 ;
        $config['base_url'] = base_url().'admin_product/loadReviews';
        $config["total_rows"] = $data['review_count'];
        $config["per_page"] = $per_page;
        $config['first_link'] = 'FIRST';
        $config['last_link'] = 'LAST';
        $config['first_tag_open'] = '<li class="paginate_button">';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li class="paginate_button">';
        $config['last_tag_close'] = '</li>';
        $config['next_link'] = 'NEXT';
        $config['next_tag_open'] = '<li class="paginate_button">';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = 'PREV';
        $config['prev_tag_open'] = '<li class="paginate_button">';
        $config['prev_tag_close'] = '</li>';
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['cur_tag_open'] = '<li class="active"><a href="">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="paginate_button">';
        $config['num_tag_close'] = '</li>';
        $config["num_links"] = 8;
        $config['page_query_string'] = TRUE;
        $config['query_string_segment'] = 'page';
        $this->pagination->initialize($config);
        $page = ($page) ? $page : 0;
        $page_link = $this->pagination->create_links();
        $records=$this->product_model->getProductReviewLimit($where,$per_page,$page);
        echo json_encode(array('records'=>$records,'page_link'=>$page_link,'total_records'=>$data['review_count']));      
    }
    function review_action()
    {
        $product_review_id=$this->input->post('product_review_id');
        $action=$this->input->post('action');
        $message='';
        if($action=="active")
        {
            $data=array('status'=>'active');
            foreach($product_review_id as $product)
            {
                $where=array('product_review_id'=>$product);
                $this->admin_model->updateData('tbl_product_review',$data,$where);
            }
            $message='Status Has Been Updated!';
        }
        if($action=="inactive")
        {
            $data=array('status'=>'inactive');
            foreach($product_review_id as $product)
            {
                $where=array('product_review_id'=>$product);
                $this->admin_model->updateData('tbl_product_review',$data,$where);
            }
            $message='Status Has Been Updated!';
        }
        if($action=="delete")
        {
            $data=array('status'=>'delete');
            foreach($product_review_id as $product)
            {
                $where=array('product_review_id'=>$product);
                $this->admin_model->updateData('tbl_product_review',$data,$where);
            }
            $message='Review Has Been Deleted!';
        }
        echo json_encode(array('message'=>$message));
    }


    function delete_product($product_id)
    {
        
    
                $where=array('product_id'=>$product_id);

                $this->admin_model->deleteData('tbl_product',$where);
                $this->admin_model->deleteData('tbl_product_shipping',$where);
                $this->admin_model->deleteData('tbl_product_description',$where);
                $this->admin_model->deleteData('tbl_product_category',$where);
                $this->admin_model->deleteData('tbl_product_diamond_shape',$where);

                $pro_image=$this->admin_model->selectWhere('tbl_product_image',$where);
                foreach ($pro_image as $row) {
                    //@unlink("../ftp_upload/".$folder."/product/image/".$row->product_image);
                }
                $this->admin_model->deleteData('tbl_product_image',$where);

                $pro_video=$this->admin_model->selectWhere('tbl_product_video',$where);
                foreach ($pro_video as $row) {
                    //@unlink("../ftp_upload/".$folder."/product/video/".$row->product_video);
                }
                $this->admin_model->deleteData('tbl_product_video',$where);
                $this->admin_model->deleteData('tbl_product_option',$where); 
                $this->admin_model->deleteData('tbl_product_feature',$where);

                $pro_variation=$this->admin_model->selectWhere('tbl_product_price_variation',$where);
                foreach ($pro_variation as $pro_row) {
                    $this->admin_model->deleteData('tbl_product_price_variation_attributes',array('variation_id'=>$pro_row->variation_id)); 
                }
                $this->admin_model->deleteData('tbl_product_price_variation',$where); 

        $this->session->set_flashdata('success','Product Detail Has Been Deleted Successfully!');
        redirect(base_url().'admin_product');

        
    }
	
	function edit_product_review($product_id)
    {
        $user_id=$this->session->userdata('jw_admin_id');
        $group_id=$this->session->userdata('jw_admin_group'); 
        $folder=$this->session->userdata('jw_admin_folder'); 
        //print_ex($user_details);
		$where = "product_review_id = ".$product_id."";
        
        $data['product_review_detail']=$this->product_model->getProductReview($where);
      // print_ex($data);
	     $data['active']="product";
        $this->load->view('common/header');
        $this->load->view('common/sidebar',$data);
        $this->load->view('product/product_edit_review_view',$data);
        $this->load->view('common/footer');
    }
	
	 function edit_product_review_submit()
    {
         
        $product_review_id=$this->input->post('product_review_id');       
        if($product_review_id)
        {
            //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++  
            $where=array('product_review_id'=>$product_review_id);
            $data=array(
                'product_review_title'=>$this->input->post("product_review_title"),
                'product_review'=>$this->input->post("product_review"),
                'product_rating'=>$this->input->post("product_rating"),
                'status'=>$this->input->post("status"),
               );
            $this->admin_model->updateData('tbl_product_review',$data,$where);
            
            
        }

        $this->session->set_flashdata('success','Product Review Updated Successfully!');
        redirect(base_url()."admin_product/product_reviews");
    }
	
	 function delete_product_review($product_id)
    {
        
    
                $where=array('product_review_id'=>$product_id);

                $this->admin_model->deleteData('tbl_product_review',$where);
               
        		$this->session->set_flashdata('success','Product Review Has Been Deleted Successfully!');
        		redirect(base_url().'admin_product/product_reviews');

        
    }
	
	function product_reviews_reply()
    {
		
		$page=$this->input->get('page');
        $per_page=$this->input->get('per_page');
        $user_id=$this->session->userdata('jw_admin_id');      
        $group_id=$this->session->userdata('jw_admin_group');
        $filter_name=$this->input->get('filter_name');
        $filter_sku=$this->input->get('filter_sku');
        $filter_model=$this->input->get('filter_model');
        $filter_status=$this->input->get('filter_status');
        $where ='p.product_id > 0  AND pr.status!="delete"';
        if($filter_name!="")
        {
            $where .=' AND pr.product_name like "%'.$filter_name.'%"';
        }
        if($filter_status!="")
        {
            $where .=' AND pr.status = "'.$filter_status.'"';
        }
        //$order_by=' ORDER BY product_id ';
        //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
        $review_total=$this->product_model->getProductReviewCount($where);
        $data['review_count'] =$review_total['0']->review_count;         
        $data['records']=$this->product_model->getProductReview($where);
        //echo json_encode(array('records'=>$records,'page_link'=>$page_link,'total_records'=>$data['review_count']));      
		//print_ex($data['records']);
        $data['active']="product";
        $this->load->view('common/header');
        $this->load->view('common/sidebar',$data);
        $this->load->view('product/product_review_list_view',$data);
        $this->load->view('common/footer');
    }
}
?>
