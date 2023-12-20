<?php
class Subscribe_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    function subscribe_list($where,$order_by)
    {
        if($where!="")
        {
            $where="WHERE ".$where;
        }
        $order_query=$order_by;
        $select='*';
        $table_name='tbl_subscribe C';
        $query = $this->db->query("select ".$select." from ".$table_name." ".$where." ".$order_query."  ");

        return $query->result();
    }
    function subscribeTotal($where,$order_by)
    { 
        if($where!="")
        {
            $where="WHERE ".$where;        
        }
        $order_query=$order_by;
        $select='count(id) as subscribe_count ';
        $table_name='tbl_subscribe C';
        $query = $this->db->query("select ".$select." from ".$table_name." ".$where." ".$order_query." ");        
        return $query->result();
    }

}
?>
