<?php
class Enquiry_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    function enquiry_list($limit='',$offset=0,$where,$order_by)
    {
        if($where!="")
        {
            $where="WHERE ".$where;
        }
        $order_query=$order_by;
        $select='*';
        $table_name='tbl_enquiry C';
        $query = $this->db->query("select ".$select." from ".$table_name." ".$where." ".$order_query." LIMIT  ".$offset." , ".$limit." ");
        return $query->result();
    }
    function enquiryTotal($where,$order_by)
    { 
        if($where!="")
        {
            $where="WHERE ".$where;        
        }
        $order_query=$order_by;
        $select='count(id) as enquiry_count ';
        $table_name='tbl_enquiry C';
        $query = $this->db->query("select ".$select." from ".$table_name." ".$where." ".$order_query." ");
        return $query->result();
    }

}
?>
