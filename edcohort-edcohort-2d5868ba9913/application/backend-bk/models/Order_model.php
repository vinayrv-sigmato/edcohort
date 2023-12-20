<?php
class order_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    function order_list($limit='',$offset=0,$where,$order_by)
    {
        if($where!="")
        {
            $where="WHERE ".$where;
        }
        $order_query=$order_by;
        $select='O.*,C.customer_id,C.customer_group_id,C.firstname,C.lastname,C.email,C.phone,C.status,U.CD_USER_ID,U.NM_USER_FULLNAME';
        $table_name='tbl_order as O 
        LEFT JOIN tbl_customer C ON O.customer_id=C.customer_id
        join tbl_order_product as OP on O.order_id=OP.order_id
        join tbl_product as P on OP.product_id=P.product_id
        join tbl_user as U on P.seller_id=U.CD_USER_ID';
        $query = $this->db->query("select ".$select." from ".$table_name." ".$where." ".$order_query." LIMIT  ".$offset." , ".$limit." ");
        return $query->result();
    }
    function orderTotal($where,$order_by)
    { 
        if($where!="")
        {
            $where="WHERE ".$where;        
        }
        $order_query=$order_by;
        $select='count(order_id) as order_count ';
        $table_name='tbl_order as O
        LEFT JOIN tbl_customer C ON O.customer_id=C.customer_id';
        $query = $this->db->query("select ".$select." from ".$table_name." ".$where." ".$order_query." ");
        return $query->result();
    }
    function order_details($order_id)
    {        
        $where="WHERE O.order_id='".$order_id."' ";        

        $select='O.*,OP.*,C.customer_id,C.customer_group_id,C.firstname,C.lastname,C.email,C.phone,C.status,U.CD_USER_ID,U.NM_USER_FULLNAME';
        $table_name='tbl_order as O 
        LEFT JOIN tbl_customer C ON O.customer_id=C.customer_id
        join tbl_order_product as OP on O.order_id=OP.order_id
        join tbl_product as P on OP.product_id=P.product_id
        join tbl_user as U on P.seller_id=U.CD_USER_ID';
        $query = $this->db->query("select ".$select." from ".$table_name." ".$where." ");
        return $query->result();
    } 
    
    function return_list($limit='',$offset=0,$where,$order_by)
    {
        if($where!="")
        {
            $where="WHERE ".$where;
        }
        $order_query=$order_by;
        $select='*';
        $table_name='tbl_return as R 
        LEFT JOIN tbl_customer C ON R.customer_id=C.customer_id';
        $query = $this->db->query("select ".$select." from ".$table_name." ".$where." ".$order_query." LIMIT  ".$offset." , ".$limit." ");
        return $query->result();
    }
    function returnTotal($where,$order_by)
    { 
        if($where!="")
        {
            $where="WHERE ".$where;        
        }
        $order_query=$order_by;
        $select='count(return_id) as return_count ';
        $table_name='tbl_return as R
        LEFT JOIN tbl_customer C ON R.customer_id=C.customer_id';
        $query = $this->db->query("select ".$select." from ".$table_name." ".$where." ".$order_query." ");
        return $query->result();
    }
    function return_details($return_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_return R');
        //$this->db->join('tbl_return_product RP','R.return_id=RP.return_id');
        $this->db->where('R.return_id',$return_id);
        $query=$this->db->get();
        return $query->result();
    }  


}
?>
