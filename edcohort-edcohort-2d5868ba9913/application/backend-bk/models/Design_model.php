<?php

class Design_model extends CI_Model {
  
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
      $select='*';
      $table_name='tbl_design as D';
      $query = $this->db->query("select ".$select." from ".$table_name." ".$where." ".$order_query." LIMIT  ".$offset." , ".$limit." ");
      
      return $query->result();
  } 

function selectJoin($table1,$column1,$table2,$column2,$column,$where)
  {
      $this->db->select('*');
      $this->db->from($table1);
      $this->db->join($table2, $table1.'.'.$column1.' = '.$table2.'.'.$column2,'left');
      $this->db->where($table1.'.'.$column,$where);
      $query=$this->db->get();
      return $query->result();
      
  }

 

}
