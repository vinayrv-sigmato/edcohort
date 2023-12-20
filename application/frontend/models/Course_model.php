<?php
class course_model extends CI_Model {

	function course_list($where)
	{  
	  	if($where!=""){
	    	$where="WHERE ".$where;
	  	}
	  	$query = $this->db->query("select *  from v_product as B ".$where." ");	  
		return $query->result();
	}
	function course_count($where)
	{      
	  if($where!=""){
	    $where="WHERE ".$where;        
	  }
	  $query = $this->db->query("select count(product_name) as course_count from v_product as B ".$where." ");
	  return $query->result();
	}     	    
	function course_limit($where,$limit='',$offset=0)
	{  
	  	if($where!=""){
	    	$where="WHERE ".$where;
	  	}
	  	$query = $this->db->query("select *  from v_product B ".$where." LIMIT ".$offset." , ".$limit." ");	  
		return $query->result();
	} 

	function fetch_class_list($board_id)
 {
  $this->db->where('board_id', $board_id);
  $this->db->order_by('class_id', 'ASC');
  $this->db->group_by('class_id');
  $query = $this->db->get('v_product');
  $output = '<option value="">Select Class</option>';
  foreach($query->result() as $row)
  {
   $output .= '<option value="'.$row->class_id.'">'.$row->class_name.'</option>';
  }
  return $output;
 }

 	function fetch_batch_list($board_id)
 {
  $this->db->where('board_id', $board_id);
  $this->db->order_by('batch_id', 'ASC');
  $this->db->group_by('batch_id');
  $query = $this->db->get('v_product');
  $output = '<option value="">Select Batch</option>';
  foreach($query->result() as $row)
  {
   $output .= '<option value="'.$row->batch_id.'">'.$row->batch_name.'</option>';
  }
  return $output;
 }
	// function brands_search($val) {
	// 	$query = $this->db->query("select *  from tbl_brand where product_title LIKE '%".$val."%' OR item_no LIKE '%".$val."%'");
	// 	return $query->result_array();
	// }

	// function brands_list_m($where)
	// {  
	//   	if($where!=""){
	//     	$where="WHERE ".$where;
	//   	}
	//   	$query = $this->db->query("select *  from tbl_product P
	//   	left join tbl_image I on P.product_id=I.id and I.type='product'
	//   	left join tbl_category C on P.category_id=C.category_id
	//   	 ".$where."  AND image_id IN ( SELECT MIN(image_id) FROM tbl_image where type='product' GROUP BY id )");	  
	// 	return $query->result();
	// }
	
	// function brands_comment_count($brand_id)
	// {  $where= "";    
	//   if($brand_id!=""){
	//     $where="WHERE status = 1 and brand_id  = ".$brand_id;        
	//   }
	//   $query = $this->db->query("select count(bc_id) as blog_comment_count from tbl_blog_comment as P ".$where." ");
	//   return $query->result();
	// }
}
