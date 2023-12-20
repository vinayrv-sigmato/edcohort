<?php
class blog_model extends CI_Model {

	function blog_list($where)
	{  
	  	if($where!=""){
	    	$where="WHERE ".$where;
	  	}
	  	$query = $this->db->query("select *  from tbl_blog as P ".$where." ");	  
		return $query->result();
	}
	function blog_count($where)
	{      
	  if($where!=""){
	    $where="WHERE ".$where;        
	  }
	  $query = $this->db->query("select count(blog_id) as blog_count from tbl_blog as P ".$where." ");
	  return $query->result();
	}     	    
	function blog_limit($where,$limit='',$offset=0)
	{  
	  	if($where!=""){
	    	$where="WHERE ".$where;
	  	}
	  	$query = $this->db->query("select *  from tbl_blog P ".$where." LIMIT ".$offset." , ".$limit." ");	  
		return $query->result();
	} 
	function blog_search($val) {
		$query = $this->db->query("select *  from tbl_blog where product_title LIKE '%".$val."%' OR item_no LIKE '%".$val."%'");
		return $query->result_array();
	}

	function blog_list_m($where)
	{  
	  	if($where!=""){
	    	$where="WHERE ".$where;
	  	}
	  	$query = $this->db->query("select *  from tbl_product P
	  	left join tbl_image I on P.product_id=I.id and I.type='product'
	  	left join tbl_category C on P.category_id=C.category_id
	  	 ".$where."  AND image_id IN ( SELECT MIN(image_id) FROM tbl_image where type='product' GROUP BY id )");	  
		return $query->result();
	}
	
	function blog_comment_count($blog_id)
	{  $where= "";    
	  if($blog_id!=""){
	    $where="WHERE status = 1 and blog_id  = ".$blog_id;        
	  }
	  $query = $this->db->query("select count(bc_id) as blog_comment_count from tbl_blog_comment as P ".$where." ");
	  return $query->result();
	}
}
