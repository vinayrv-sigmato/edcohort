<?php

class Dashboard_model extends CI_Model {
  
  function diamond_total($where)
  {      
      if($where!="")
      {
        $where="WHERE ".$where;        
      }
      $order_query="ORDER BY diamond_id";
      $select='count(diamond_id) as diamond_total ';
      $table_name='tbl_diamond';
      $query = $this->db->query("select ".$select." from ".$table_name." ".$where." ".$order_query." ");
      return $query->result();
  }     
  function product_total($where)
  { 
      if($where!="")
      {
          $where="WHERE ".$where;        
      }      
      $select='count(product_id) as product_total ';
      $table_name='tbl_product as P';
      $query = $this->db->query("select ".$select." from ".$table_name." ".$where." ");
      return $query->result();
  }
  function order_total($where)
  { 
      if($where!="")
      {
          $where="WHERE ".$where;        
      }
      $select='count(O.order_id) as order_total ';
      $table_name='tbl_order as O
      join tbl_order_product as OP on O.order_id=OP.order_id
      join tbl_product as P on OP.product_id=P.product_id
      join tbl_user as U on P.seller_id=U.CD_USER_ID';
      $query = $this->db->query("select ".$select." from ".$table_name." ".$where."");
      return $query->result();
  }
  function customer_total($where)
    { 
        if($where!="")
        {
            $where="WHERE ".$where;        
        }
        $select='count(customer_id) as customer_total ';
        $table_name='tbl_customer C';
        $query = $this->db->query("select ".$select." from ".$table_name." ".$where."");
        return $query->result();
    }
  
}
