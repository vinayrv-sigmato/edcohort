<?php
class Cohort_model extends CI_Model {
  function cohort_list_limit($where,$limit='',$offset=0,$order='')
  {  
      if($where!=""){        
        $where="WHERE ".$where;
      }      
      if($order!=""){
        $order_query="ORDER BY ".$order;
      }
      else{
        $order_query="ORDER BY cg_id ";
      }
      //$select='P.*,PC.*,C.*,CD.*,PA.*,A.*,U.CD_USER_ID,U.NM_USER_FULLNAME,UD.NM_FOLDER_NAME';
      // $select='P.product_id,product_name,product_image,product_model,manufacturer_id,product_brand,product_sku,product_description,product_condition,product_condition_note,product_country,product_price,product_sale_price,product_sale_allow,product_sale_start,product_sale_end,product_quantity,product_minimum_quantity,product_maximum_quantity,product_subtract_stock,product_launch,product_release,product_rating,product_view,product_status,NM_FOLDER_NAME';
      // $table_name='tbl_product as P';  
      $query = $this->db->query("SELECT * FROM tbl_cohart_group as CG 
      join tbl_brand as BND on CG.brand_id=BND.brand_id 
      join tbl_board as BRD on CG.board_id=BRD.board_id 
      join tbl_class as CLS on CG.class_id=CLS.class_id 
      join tbl_batch as BTH on CG.batch_id=BTH.batch_id 
      join tbl_product as PR on CG.product_id=PR.product_id 
      ".$where." ".$order_query." LIMIT  ".$offset." , ".$limit." ");

     // $query = $this->db->query("select * from v_product ".$where." group by product_name  ".$order_query." LIMIT  ".$offset." , ".$limit);
      return $query->result();
  }
  function cohort_list($where,$order)
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
  function cohort_compare($where)
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
  function cohort_attribute($where)
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
  function cohort_option($where)
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
  function cohort_count($where)
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
  function getProductcohortLimit($where,$limit='',$offset=0)
  {
      if($where!=""){        
        $where="WHERE ".$where;
      }
      $query=$this->db->query("SELECT pr.*,c.firstname,c.lastname,p.product_name,p.product_slug FROM tbl_product_cohort as pr 
        join tbl_product as p ON pr.product_id=p.product_id 
        join tbl_customer as c ON pr.user_id=c.customer_id  ".$where." order by product_cohort_id desc limit ".$offset." , ".$limit);
      return $query->result();  
  }
  function getProductcohort($where)
  {
      if($where!=""){        
        $where="WHERE ".$where;
      }
      $query=$this->db->query("SELECT pr.*,c.firstname,c.lastname,p.product_name,p.product_slug FROM tbl_product_cohort as pr 
        join tbl_product as p ON pr.product_id=p.product_id 
        join tbl_customer as c ON pr.user_id=c.customer_id ".$where."");
      return $query->result();  
  }
  function getProductcohortCount($where)
  {
      if($where!=""){        
        $where="WHERE ".$where;
      }
      $query=$this->db->query("SELECT count(product_id) as cohort_count FROM tbl_product_cohort as pr ".$where."");
      return $query->result();  
  }
  function getProductcohortSum($where)
  {
      if($where!=""){        
        $where="WHERE ".$where;
      }
      $query=$this->db->query("SELECT SUM(product_rating) as cohort_sum FROM tbl_product_cohort as pr ".$where."");
      return $query->result();  
  }
function getcohort($where)
 {
    $this->db->select('*');
    $this->db->from('tbl_product_cohort as PR');
    $this->db->join('tbl_customer', 'tbl_customer.customer_id = PR.user_id');
    $this->db->where($where);
	$this->db->order_by('product_cohort_id','ASC');
    $query = $this->db->get();
    return $query->result();
   // echo $this->db->last_query(); die;
 }

 function getcohortdetails($where)
 {
    $this->db->select('*');
    $this->db->from('tbl_product_cohort as PR');
    $this->db->join('tbl_customer', 'tbl_customer.customer_id = PR.user_id');
    $this->db->join('v_product', 'v_product.product_id = PR.product_id');
    $this->db->where($where);
    $this->db->order_by('product_cohort_id','DESC');
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
	
	
	function count_total_rating($id = NULL) {
    $this->db->select('ROUND(AVG(product_rating)) as average');
    $this->db->where('product_id', $id);
    $this->db->from('tbl_product_cohort');
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
      $query = $this->db->query("SELECT SUM(product_rating) as total FROM tbl_product_cohort where ".$where."");     
      return $query->result();
  } 
  
   function cohort_search_count($where)
  {
      if($where!=""){        
        $where="WHERE product_id = ".$where;
      }
      $select='count(product_id) as cohort_count';
      //$table_name='tbl_product as P';   
      $query = $this->db->query("select ".$select." from tbl_product_cohort_search ".$where."  ");
      return $query->result();
  }
  
  function cohort_like_count($where)
  {
      if($where!=""){        
        $where="WHERE ".$where;
      }
      $select='count(prl_id) as like_count';
      //$table_name='tbl_product as P';   
      $query = $this->db->query("select ".$select." from tbl_product_cohort_like ".$where."  ");
      return $query->result();
  }

  function selectJoinWhereOrderby($table1,$column1,$table2,$column2,$where,$orderby)
  { 
      $this->db->select('*,'.$table1.'.date_added AS reply_date');
      $this->db->from($table1);
      $this->db->join($table2, $table1.'.'.$column1.' = '.$table2.'.'.$column2);
      $this->db->where($where);
      $this->db->order_by($orderby); 
      $query=$this->db->get();     
      return $query->result();
  }

  function groupmessage($where)
  {
     $this->db->select('MSG.*,CST.customer_id,CST.firstname,CST.image');
     $this->db->from('tbl_message as MSG');
     $this->db->join('tbl_customer as CST', 'CST.customer_id = MSG.user_id');
   //  $this->db->join('tbl_group_member as GM', 'GM.group_id = MSG.group_id');
     $this->db->where($where);
     $this->db->order_by('c_id','ASC');
     $query = $this->db->get();
    // echo $this->db->last_query(); die;
     return $query->result();
   
  }

  function group_list_limit($where,$limit='',$offset=0,$order='')
  {  
      if($where!=""){        
        $where="WHERE ".$where;
      }      
      if($order!=""){
        $order_query="ORDER BY ".$order;
      }
      else{
        $order_query="ORDER BY cg_id ";
      }
      
      $query = $this->db->query("SELECT CG.title as group_name,CG.tag,BND.brand_name,BRD.board_name,CLS.title as class_name,BTH.batch_name FROM tbl_cohart_group as CG 
      join tbl_brand as BND on CG.brand_id=BND.brand_id 
      join tbl_board as BRD on CG.board_id=BRD.board_id 
      join tbl_class as CLS on CG.class_id=CLS.class_id 
      join tbl_batch as BTH on CG.batch_id=BTH.batch_id 
      join tbl_product as PR on CG.product_id=PR.product_id 
      ".$where." ".$order_query." LIMIT  ".$offset." , ".$limit." ");
     
      return $query->result();
  }


  function joinedgroup($where)
  {
     $this->db->select('GRP.*,MBR.user_id,MBR.group_id');
     $this->db->from('tbl_cohart_group as GRP');
     $this->db->join('tbl_group_member as MBR', 'MBR.group_id = GRP.cg_id');    
     $this->db->where($where);
     $this->db->order_by('GRP.cg_id','ASC');
     $query = $this->db->get();
     return $query->result();
     //echo $this->db->last_query(); die;
  }

   function fetch_cohort_board_list($brand_id,$product_type)
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


  function fetch_cohort_class_list($brand_id,$product_type,$board_id)
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
 
    function fetch_cohort_batch_list($brand_id,$product_type,$board_id,$class_id)
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
	
}
