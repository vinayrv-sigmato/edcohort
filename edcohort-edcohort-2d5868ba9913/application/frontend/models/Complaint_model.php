<?php
class Complaint_model extends CI_Model {
  function complaint_list_limit($where,$limit='',$offset=0,$order='')
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
      $query = $this->db->query("select * from v_product ".$where." group by product_name  ".$order_query." LIMIT  ".$offset." , ".$limit);
      return $query->result();
  }
   function complaint_list($where,$order)
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
  function getProductComplaintLimit($where,$order,$limit='',$offset=0)
  {
      if($where!=""){        
        $where="WHERE ".$where;
      }
      if($order!=""){
        $order_query="ORDER BY ".$order;
      }
      else{
        $order_query="ORDER BY product_complaint_id DESC ";
      }
      $query=$this->db->query("SELECT pr.*,c.firstname,c.lastname,p.product_name,p.product_slug FROM tbl_product_complaint as pr 
        join tbl_product as p ON pr.product_id=p.product_id 
        join tbl_customer as c ON pr.user_id=c.customer_id  ".$where." ".$order_query." limit ".$offset." , ".$limit);
      return $query->result();  
  }
  function getProductComplaint($where,$order='')
  {
    if($where!=""){        
      $where="WHERE ".$where;
    }
    if($order!=""){
      $order_query="ORDER BY ".$order;
    }
    else{
      $order_query="ORDER BY product_complaint_added DESC ";
    }
      $query=$this->db->query("SELECT pr.*,c.firstname,c.lastname,p.product_name,p.product_slug FROM tbl_product_complaint as pr 
        join tbl_product as p ON pr.product_id=p.product_id 
        join tbl_customer as c ON pr.user_id=c.customer_id ".$where." ".$order_query."");
      return $query->result();  
  }
  function getProductComplaintCount($where)
  {
      if($where!=""){        
        $where="WHERE ".$where;
      }
      $query=$this->db->query("SELECT count(product_id) as complaint_count FROM tbl_product_complaint as pr ".$where."");
      return $query->result();  
  }
  function getProductComplaintSum($where)
  {
      if($where!=""){        
        $where="WHERE ".$where;
      }
      $query=$this->db->query("SELECT SUM(product_rating) as complaint_sum FROM tbl_product_complaint as pr ".$where."");
      return $query->result();  
  }
function getcomplaint($where)
 {
    $this->db->select('*');
    $this->db->from('tbl_product_complaint as PC');
    $this->db->join('tbl_customer', 'tbl_customer.customer_id = PC.user_id');
    $this->db->where($where);
	$this->db->order_by('product_id','DESC');
    $query = $this->db->get();
    return $query->result();
   // echo $this->db->last_query(); die;
 }

 function getcomplaintdetails($where)
 {
    $this->db->select('*');
    $this->db->from('tbl_product_complaint as PC');
    $this->db->join('tbl_customer', 'tbl_customer.customer_id = PC.user_id');
    $this->db->join('v_product', 'v_product.product_id = PC.product_id');
    $this->db->where($where);
    $this->db->order_by('product_complaint_id','DESC');
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
    $this->db->from('tbl_product_complaint');
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
      $query = $this->db->query("SELECT SUM(product_rating) as total FROM tbl_product_complaint where ".$where."");     
      return $query->result();
  } 
  
   function complaint_search_count($where)
  {
      if($where!=""){        
        $where="WHERE product_id = ".$where;
      }
      $select='count(product_id) as complaint_count';
      //$table_name='tbl_product as P';   
      $query = $this->db->query("select ".$select." from tbl_product_complaint_search ".$where."  ");
      return $query->result();
  }
  
  function complaint_like_count($where)
  {
      if($where!=""){        
        $where="WHERE ".$where;
      }
      $select='count(prl_id) as like_count';
      //$table_name='tbl_product as P';   
      $query = $this->db->query("select ".$select." from tbl_product_complaint_like ".$where."  ");
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
	
}
