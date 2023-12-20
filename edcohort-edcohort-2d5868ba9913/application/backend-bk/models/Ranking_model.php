<?php
class Ranking_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    function ranking_list($where,$order_by)
    {
        if($where!="")
        {
            $where="WHERE ".$where;
        }
        $order_query=$order_by;
        $select='*';
        $table_name='tbl_ranking C';
        $query = $this->db->query("select ".$select." from ".$table_name." ".$where." ".$order_query." ");
        return $query->result();
    }

    function ranking_list_brand_wise($where,$order_by)
    {
        if($where!="")
        {
            $where="WHERE ".$where;
        }
        $order_query=$order_by;
        $select='*,C.date_added as rank_date';
        $table_name='tbl_rank_brand_wise C';
        $query = $this->db->query("select ".$select." from ".$table_name." 
            JOIN tbl_brand b ON C.brand_id=b.brand_id 
            JOIN tbl_class cl ON C.class_id=cl.class_id ".$where." ".$order_query." ");
        return $query->result();
    }


    function rankingTotal($where,$order_by)
    { 
        if($where!="")
        {
            $where="WHERE ".$where;        
        }
        $order_query=$order_by;
        $select='count(ranking_id) as ranking_count ';
        $table_name='tbl_ranking C';
        $query = $this->db->query("select ".$select." from ".$table_name." ".$where." ".$order_query." ");
        return $query->result();
    }

    function get_ranking_detail($brand_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_ranking c');
       // $this->db->join('tbl_ranking_description dc','c.ranking_id=dc.ranking_id');
        //$this->db->join('tbl_ranking_commission cc','c.ranking_id=cc.ranking_id');
        $this->db->where('c.ranking_id',$brand_id);
        $query=$this->db->get();
        return $query->result();
    }

}
?>
