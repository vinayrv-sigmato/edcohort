<?php
class Partner_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    function partner_list($where,$order_by)
    {
        if($where!="")
        {
            $where="WHERE ".$where;
        }
        $order_query=$order_by;
        $select='*';
        $table_name='tbl_partner C';
        $query = $this->db->query("select ".$select." from ".$table_name." ".$where." ".$order_query." ");
        return $query->result();
    }
    function partnerTotal($where,$order_by)
    { 
        if($where!="")
        {
            $where="WHERE ".$where;        
        }
        $order_query=$order_by;
        $select='count(id) as partner_count ';
        $table_name='tbl_partner C';
        $query = $this->db->query("select ".$select." from ".$table_name." ".$where." ".$order_query." ");
        return $query->result();
    }

    function get_partner_detail($brand_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_partner c');
       // $this->db->join('tbl_partner_description dc','c.id=dc.id');
        //$this->db->join('tbl_partner_commission cc','c.id=cc.id');
        $this->db->where('c.id',$brand_id);
        $query=$this->db->get();
        return $query->result();
    }

}
?>
