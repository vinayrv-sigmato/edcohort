<?php

class Order_model extends CI_Model {
  
	function design_list($where)
	{      
      if($where!="")
      {
        $where="WHERE ".$where;        
      }
      $order_query="ORDER BY design_id DESC";
      $select='*';
      $table_name='tbl_design as D';
      $query = $this->db->query("select ".$select." from ".$table_name." ".$where." ".$order_query." ");
      
      return $query->result();
	} 
  function design_count($where)
  {      
      if($where!="")
      {
        $where="WHERE ".$where;        
      }
      $order_query="ORDER BY design_id DESC";
      $select='count(design_id) as design_count ';
      $table_name='tbl_design as D';
      $query = $this->db->query("select ".$select." from ".$table_name." ".$where." ".$order_query." ");
      return $query->result();
  }     
        
  function design_list_limit($where,$limit='',$offset=0)
  {  
      if($where!="")
      {
        $where="WHERE ".$where;
      }
      $order_query="ORDER BY design_id DESC";
      $select="*, (CASE WHEN is_approved = 0 THEN 'Pending'
            WHEN is_approved = 1 THEN 'Approved'
            WHEN is_approved = 2 THEN 'Reject'
            ELSE '' END) AS is_approved_text";
      $table_name='tbl_design as D';
      $query = $this->db->query("select ".$select." from ".$table_name." ".$where." ".$order_query." LIMIT  ".$offset." , ".$limit." ");
      //echo $this->db->last_query();
      return $query->result();
  }

  function process_list($design_id)
  {
    $where = "WHERE design_id='".$design_id."'"; 
    $query = $this->db->query("select process_id,message,status,create_date,
      (CASE WHEN processing_status = 1 THEN 'New Quote'
            WHEN processing_status = 2 THEN 'Sent Quote'
            WHEN processing_status = 3 THEN 'Approved'
            WHEN processing_status = 4 THEN 'Sent CAD'
            WHEN processing_status = 5 THEN 'CAD Approved'
            WHEN processing_status = 6 THEN 'Finished'
            ELSE '' END) AS processing_status,
      (CASE WHEN created_by = 1 THEN 'Admin'
            ELSE 'You' END) AS created_by     
      from tbl_design_process 
    ".$where." ORDER BY process_id ASC ");
    return $query->result();
  } 
  function process_list_image($process_id)
  {  
    $where = "WHERE process_id='".$process_id."'";
    $query = $this->db->query("select image,image_id from tbl_process_image  ".$where." ");
    return $query->result();
  } 

  

}
