<?php

class Diamond_model extends CI_Model {

  function diamond_list($where)
  {  
      $where=" WHERE ".$where." ";
      $group_by=" ";
      $order_query=" ";
     
      $data=array(
        'where'=>$where,
        'group_by'=>$group_by,
        'order_query'=>$order_query,
        'limit_st'=>' LIMIT  1'
      );
      $query = $this->db->query("CALL p_diamond(?,?,?,?)",$data);
      mysqli_next_result($this->db->conn_id);
      
      return $query->result();
  }   
  function diamond_count($where)
  {  
      $where=" WHERE ".$where." "; 
      $data=array(
        'where'=>$where
      );
      $query = $this->db->query("CALL p_diamond_count(?)",$data);   
      mysqli_next_result($this->db->conn_id);

      return $query->result();
  } 
  function diamond_list_limit($where,$limit='',$offset=0,$order='')
  {  
      $where=" WHERE ".$where." ";
      $group_by=" ";      
      if($order){
        $order_query=" ORDER BY ".$order;
      }else{
        $order_query=" ORDER BY shape_sort ASC,weight ASC";
      }      
      $data=array(
        'where'=>$where,
        'group_by'=>$group_by,
        'order_query'=>$order_query,
        'limit_st'=>' LIMIT  '.$offset.' , '.$limit
      );

      $query = $this->db->query("CALL p_diamond(?,?,?,?)",$data);
      mysqli_next_result($this->db->conn_id);
      
      return $query->result();
  }
}
