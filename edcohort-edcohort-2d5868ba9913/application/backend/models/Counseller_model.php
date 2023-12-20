<?php
class Counseller_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    function counseller_list($where,$order_by)
    {
        if($where!="")
        {
            $where="WHERE ".$where;
        }
        $order_query=$order_by;
        $select='*';
        $table_name='tbl_counseller C';
        $query = $this->db->query("select ".$select." from ".$table_name." ".$where." ".$order_query." ");
        return $query->result();
    }
    function counsellerTotal($where,$order_by)
    { 
        if($where!="")
        {
            $where="WHERE ".$where;        
        }
        $order_query=$order_by;
        $select='count(id) as counseller_count ';
        $table_name='tbl_counseller C';
        $query = $this->db->query("select ".$select." from ".$table_name." ".$where." ".$order_query." ");
        return $query->result();
    }

    function get_counseller_detail($brand_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_counseller c');
       // $this->db->join('tbl_counseller_description dc','c.id=dc.id');
        //$this->db->join('tbl_counseller_commission cc','c.id=cc.id');
        $this->db->where('c.id',$brand_id);
        $query=$this->db->get();
        return $query->result();
    }

}
?>
