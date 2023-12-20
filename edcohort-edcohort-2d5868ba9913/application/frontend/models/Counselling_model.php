<?php
class Counselling_model extends CI_Model {
    function counselling_list_limit($where,$limit='',$offset=0,$order='')
  {  
      if($where!=""){        
        $where="WHERE ".$where;
      }      
      if($order!=""){
        $order_query="ORDER BY ".$order;
      }
      else{
        $order_query="ORDER BY c_id";
      }
      $query = $this->db->query("SELECT * FROM tbl_product_counselling as PC 
      join tbl_brand as BND on PC.brand_id=BND.brand_id 
      join tbl_board as BRD on PC.board_id=BRD.board_id 
      join tbl_class as CLS on PC.class_id=CLS.class_id 
      join tbl_batch as BTH on PC.batch_id=BTH.batch_id 
      join tbl_product as PR on PC.product_id=PR.product_id 
      ".$where." ".$order_query." LIMIT  ".$offset." , ".$limit." ");

     // $query = $this->db->query("select * from v_product ".$where." group by product_name  ".$order_query." LIMIT  ".$offset." , ".$limit);
      return $query->result();
     // echo $this->db->last_query();
  }


  function counselling_list($where,$order)
  { 
    if($where!=""){        
      $where="WHERE ".$where;
    }      
    if($order!=""){
     $order_query="ORDER BY ".$order;
   }
   else{
     $order_query="ORDER BY product_id ";
   }

   $query = $this->db->query("select * from v_product ".$where." group by product_name ".$order_query." ");
   return $query->result();
 }


 function getProductcounsellingLimit($where,$order='',$limit='',$offset=0)
  {
      if($where!=""){        
        $where="WHERE ".$where;
      }
      if($order!=""){
        $order_query="ORDER BY ".$order;
      }
      else{
        $order_query="ORDER BY c_id DESC ";
      }
     $query=$this->db->query("SELECT PC.*,c.firstname,c.lastname,c.image,c.lastname,B.brand_name,p.product_name,p.product_slug FROM tbl_product_counselling as PC
        join tbl_brand as B ON PC.brand_id = B.brand_id    
        join tbl_product as p ON PC.product_id=p.product_id 
        join tbl_customer as c ON PC.user_id=c.customer_id  ".$where." ".$order_query." limit ".$offset." , ".$limit);
      return $query->result(); 
      // $query=$this->db->query("SELECT PC.*,c.firstname,c.lastname,c.image,c.lastname,b.brand_name,cl.title FROM tbl_product_counselling as PC 
      //   join tbl_brand as b ON PC.brand_id=b.brand_id 
      //   join tbl_class as cl ON PC.class_id=cl.class_id 
      //   join tbl_customer as c ON PC.user_id=c.customer_id  ".$where." ".$order_query." limit ".$offset." , ".$limit);
      // return $query->result();  
  }
function getProductcounselling($where)
{
  if($where!=""){        
    $where="WHERE ".$where;
  }
  $query=$this->db->query("SELECT PC.*,c.firstname,c.lastname,c.image,B.brand_name,p.product_name,p.product_slug,b.brand_name FROM tbl_product_counselling as PC 
    join tbl_brand as B ON PC.brand_id = B.brand_id
    join tbl_product as p ON PC.product_id=p.product_id
    join tbl_customer as c ON PC.user_id=c.customer_id ".$where."");
  return $query->result();  
    // join tbl_brand as b ON PC.brand_id=b.brand_id 
}
function getProductcounsellingCount($where)
{
  if($where!=""){        
    $where="WHERE ".$where;
  }
  $query=$this->db->query("SELECT count(product_id) as counselling_count FROM tbl_product_counselling as PC ".$where."");
  return $query->result();  
}
function getProductcounsellingSum($where)
{
  if($where!=""){        
    $where="WHERE ".$where;
  }
  $query=$this->db->query("SELECT SUM(product_rating) as counselling_sum FROM tbl_product_counselling as PC ".$where."");
  return $query->result();  
}
function getcounselling($where)
{
  $this->db->select('*');
  $this->db->from('tbl_product_counselling as PC');
  $this->db->join('tbl_customer', 'tbl_customer.customer_id = PC.user_id');
  $this->db->where($where);
  $this->db->order_by('product_id','DESC');
  $query = $this->db->get();
  return $query->result();
   // echo $this->db->last_query(); die;
}

function selectJointwoorderby($table1,$column1,$table2,$column2,$where,$col,$condition)
{
 $this->db->select('*');
 $this->db->from($table1);
 $this->db->join($table2, $table1.'.'.$column1.' = '.$table2.'.'.$column2);
 $this->db->where($where);
 $this->db->order_by($col,$condition);
 $query=$this->db->get();
 return $query->result();
}

 function fetch_counselling_board_list($brand_id,$product_type)
  {
   
      $this->db->where('brand_id', $brand_id);
      if($product_type > 0){
        $this->db->where('product_type', $product_type);
      }
      $this->db->order_by('brand_name', 'ASC');
      $this->db->group_by('board_id');
      $query = $this->db->get('v_product');
     // echo $this->db->last_query();
      $output = '<option value="">Select Board</option>';
      foreach($query->result() as $row)
      {
      $output .= '<option value="'.$row->board_id.'">'.$row->board_name.'</option>';
      }
      return $output;
  }


  function fetch_counselling_class_list($brand_id,$product_type,$board_id)
  {
   $this->db->where('brand_id', $brand_id);
   if($product_type > 0){
    $this->db->where('product_type', $product_type);
  }
  
   $this->db->where('board_id', $board_id);
   $this->db->order_by('class_name', 'ASC');
   $this->db->group_by('class_id');
   $query = $this->db->get('v_product');
  // echo $this->db->last_query();
   $output = '<option value="">Select Class</option>';
   foreach($query->result() as $row)
   {
    $output .= '<option value="'.$row->class_id.'">'.$row->class_name.'</option>';
   }
   return $output;
  }
 
    function fetch_counselling_batch_list($brand_id,$product_type,$board_id,$class_id)
  {
    $this->db->where('brand_id', $brand_id);
    if($product_type > 0){
      $this->db->where('product_type', $product_type);
    }
    if($board_id > 0){
      $this->db->where('board_id', $board_id);
    }
    $this->db->where('board_id', $board_id);
   $this->db->order_by('batch_id', 'ASC');
   $query = $this->db->get('v_product');
   $output = '<option value="">Select Batch</option>';
   foreach($query->result() as $row)
   {
    $output .= '<option value="'.$row->batch_id.'">'.$row->batch_name.'</option>';
   }
   return $output;
  }


function count_total_rating($id = NULL) {
  $this->db->select('ROUND(AVG(product_rating)) as average');
  $this->db->where('product_id', $id);
  $this->db->from('tbl_product_counselling');
  $query = $this->db->get();
  return $query->result();
}

function rating_total($id,$star = NULL)
{
 if($id!=""){        
  $where="product_id = ".$id;
}
if($star!=""){        
  $where.=" AND product_rating = ".$star;
}      
$query = $this->db->query("SELECT SUM(product_rating) as total FROM tbl_product_counselling where ".$where."");     
return $query->result();
} 

function counselling_search_count($where)
{
  if($where!=""){        
    $where="WHERE product_id = ".$where;
  }
  $select='count(product_id) as counselling_count';
      //$table_name='tbl_product as P';   
  $query = $this->db->query("select ".$select." from tbl_product_counselling_search ".$where."  ");
  return $query->result();
}
function get_filter($column,$table,$where='')
{
  $this->db->select($column);
  $this->db->from($table);
  $this->db->group_by($column); 
  $this->db->where($column.'!='," ");
  if($where!="")
  {
   $this->db->where($where); 
 } 
 $query=$this->db->get();
 return $query->result();
}
function variation_price($where)
{      
  if($where!=""){        
    $where="WHERE ".$where;
  }
  $query = $this->db->query("SELECT PPV.variation_id,variation_price,product_id,variation_attributes_name,variation_attributes_value 
    FROM tbl_product_price_variation as PPV 
    join tbl_product_price_variation_attributes as PPVA 
    on PPV.variation_id=PPVA.variation_id        
    ".$where." ");
  return $query->result();
} 
function variation_price_min($where)
{      
  if($where!=""){        
    $where="WHERE ".$where;
  }
  $query = $this->db->query("SELECT MIN(variation_price) as min_price FROM tbl_product_price_variation as PPV ".$where." ");     
  return $query->result();
} 
function variation_price_max($where)
{      
  if($where!=""){        
    $where="WHERE ".$where;
  }
  $query = $this->db->query("SELECT MAX(variation_price) as max_price FROM tbl_product_price_variation as PPV ".$where." ");     
  return $query->result();
}
function product_addons($where)
{      
  if($where!=""){        
    $where="WHERE ".$where;
  }
  $query = $this->db->query("SELECT * FROM tbl_product_category as PC 
    join tbl_addons_category as AC on PC.category_id=AC.category_id 
    join tbl_addons as A on A.addons_id=A.addons_id 
    join tbl_addons_group as AG on A.addons_id=AG.addons_id 
    join tbl_addons_value as AV on AG.addons_group_id=AV.addons_group_id 
    ".$where." ");
  return $query->result();
}
function get_category_id($where)
{
  if($where!=""){        
    $where="WHERE ".$where;
  }
  $query = $this->db->query("SELECT * FROM tbl_category as C 
    join tbl_category_description as CD on C.category_id=CD.category_id ".$where." ");
  return $query->result();      
}
function getProductFilter($where){
  if($where!=""){        
    $where="WHERE ".$where;
  }
  $query= $this->db->query("SELECT `value` FROM `v_product` ".$where." GROUP BY value");
  return $query->result();      
}

function jewelry_counselling($where)
{ 
  if($where!="")
  {
    $where="WHERE ".$where;
  }
  $order_query="ORDER BY product_id ";
      //$select='P.*,U.CD_USER_ID,U.NM_USER_FULLNAME,UD.NM_FOLDER_NAME';
      //$select='P.product_id,product_name,product_image,product_model,manufacturer_id,product_brand,product_sku,product_description,product_condition,product_condition_note,product_country,product_price,product_sale_price,product_sale_allow,product_sale_start,product_sale_end,product_quantity,product_minimum_quantity,product_maximum_quantity,product_subtract_stock,product_launch,product_release,product_rating,product_view,product_status,NM_FOLDER_NAME';
      //$table_name='tbl_product as P';     
  $query = $this->db->query("select * from v_product ".$where." group by product_name ".$order_query." ");
  return $query->result();
}
function jewelry_attribute($where)
{ 
  if($where!=""){
    $where="WHERE ".$where;
  }
  $select='*';
  $table_name='tbl_product_attribute as PA';     
  $query = $this->db->query("select ".$select." from ".$table_name."        
    join tbl_attribute as A on PA.attribute_id=A.attribute_id
    ".$where." ");
  return $query->result();
}
function jewelry_option($where)
{ 
  if($where!=""){
    $where="WHERE ".$where;
  }
  $select='*';
  $table_name='tbl_product_option as PO';     
  $query = $this->db->query("select ".$select." from ".$table_name."        
    join tbl_option as A on PO.option_id=A.option_id
    ".$where." ");
  return $query->result();
}
function jewelry_count($where)
{
  if($where!=""){        
    $where="WHERE ".$where;
  }
  $select='count(DISTINCT(product_id)) as product_count';
      //$table_name='tbl_product as P';   
  $query = $this->db->query("select ".$select." from v_product ".$where."  ");
  return $query->result();
}
function pro_cat($where)
{ 
  if($where!=""){
    $where="WHERE ".$where;
  }     
  $query = $this->db->query("select * from tbl_product_category as PC        
    right join tbl_addons_category as AC on PC.category_id=AC.category_id
    ".$where." group by addons_id");
  return $query->result();
}
function get_subcategory($category)
{
  $this->db->select('sub_category');
  $this->db->from('tbl_jewelry');
  $this->db->group_by('sub_category'); 
  $this->db->where('category',$category);
  $query=$this->db->get();
  return $query->result();      
}



}
