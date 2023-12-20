<?php
class Blog_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    function blog_list($where,$order_by)
    {
        if($where!="")
        {
            $where="WHERE ".$where;
        }
        $order_query=$order_by;
        $select='*';
        $table_name='tbl_blog C';
        $query = $this->db->query("select ".$select." from ".$table_name." ".$where." ".$order_query." ");
        return $query->result();
    }
    function blogTotal($where,$order_by)
    { 
        if($where!="")
        {
            $where="WHERE ".$where;        
        }
        $order_query=$order_by;
        $select='count(blog_id) as blog_count ';
        $table_name='tbl_blog C';
        $query = $this->db->query("select ".$select." from ".$table_name." ".$where." ".$order_query." ");
        return $query->result();
    }

     function getProductSlug($where)
    { 
      if($where!=""){
        $where="WHERE ".$where;
      }
      $select='P.blog_id,P.blog_title,P.blog_slug';
      $table_name='tbl_blog as P';     
      $query = $this->db->query("select ".$select." from ".$table_name." ".$where." ");
      return $query->result();
    }
	
	function blog_category_list($where,$order_by)
    {
        if($where!="")
        {
            $where="WHERE ".$where;
        }
        $order_query=$order_by;
        $select='*';
        $table_name='tbl_blog_category C';
        $query = $this->db->query("select ".$select." from ".$table_name." ".$where." ".$order_query." ");
        return $query->result();
    }

}
?>
