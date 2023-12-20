<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller{
    
    public function __construct() {
        parent::__construct(); 
        $this->load->model('jewelry_model'); 
    }    
    public function index()
    {  
        $data['page_head']='Search';

         $keyword=$this->input->post('keyword'); 

        $where="product_name LIKE '%$keyword%'";
        //$where .="OR product_sku LIKE '%$keyword%'";  
         
        $data = $this->jewelry_model->jewelry_list($where);   
        //print_ex($records);   
        echo json_encode($data);

       
    }

    public function search_result()
    {  
        $search = $this->input->post('search'); 
        $where="product_name LIKE '%$search%'";
         
        $data = $this->jewelry_model->jewelry_list($where); 
        //print_ex($data);
        if(count($data)){
            redirect(base_url().'jewelry-details/'.$data['0']->product_slug);
        }
        else
        {
            redirect(base_url().'jewelry');
        }
       
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
      if(!count($image_array)){
          $file='assets/No_image.jpg';
          if(file_exists($file)){
              $image_array[]=$file;
          } 
      } 

      return $image_array; 
  }
  function subcategory($value)
  {
      $result="";
      if($value=='Rings')
      {
        $result="'Col & Dia Ring','COL RING','Ring','Rings'";
      }
      else if($value=='Earrings')
      {
        $result="'Col & Dia Earring','COL EARRING','Col Earrings','Earring','Earr-Pndt Set','Earring Fancy','Earring Hoop','Earring Studs'";
      }
      else if($value=='Pendants')
      {
        $result="'Col & Dia Pendant','COL PENDANT','Earr-Pndt Set','Alphabets Pendant','Pendant'";
      }
      else if($value=='Bracelets')
      {
        $result="'Bracelet','Bracdia','Col & Dia Brac','COL BRACELET'";
      }
      else if($value=='Necklace')
      {
        $result="'COL NECKLACE','Necklace'";
      }
      else if($value=='Bands')
      {
        $result="'Band','COL BAND'";
      }
      else if($value=='Bangles')
      {
        $result="'Bangle','COL BANGLE'";
      }
      else if($value=='Bridal')
      {
        $result="'Bridal','COL BANGLE'";
      }
      return $result;
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
  
  
 
	
    
}

