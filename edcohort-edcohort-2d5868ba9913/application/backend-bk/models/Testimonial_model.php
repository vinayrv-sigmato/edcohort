<?php
class Testimonial_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    function testimonial_list($where,$order_by)
    {
        if($where!="")
        {
            $where="WHERE ".$where;
        }
        $order_query=$order_by;
        $select='*';
        $table_name='tbl_testimonial C';
        $query = $this->db->query("select ".$select." from ".$table_name." ".$where." ".$order_query." ");
        return $query->result();
    }
    function testimonialTotal($where,$order_by)
    { 
        if($where!="")
        {
            $where="WHERE ".$where;        
        }
        $order_query=$order_by;
        $select='count(testimonial_id) as testimonial_count ';
        $table_name='tbl_testimonial C';
        $query = $this->db->query("select ".$select." from ".$table_name." ".$where." ".$order_query." ");
        return $query->result();
    }

    function get_testimonial_detail($brand_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_testimonial c');
       // $this->db->join('tbl_testimonial_description dc','c.testimonial_id=dc.testimonial_id');
        //$this->db->join('tbl_testimonial_commission cc','c.testimonial_id=cc.testimonial_id');
        $this->db->where('c.testimonial_id',$brand_id);
        $query=$this->db->get();
        return $query->result();
    }

}
?>
