<?php
class counselling_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    function get_counselling()
    {
        $this->db->select('c.*,b.brand_name,cc.title,cr.firstname');
        $this->db->from('tbl_product_counselling c');
        $this->db->join('tbl_brand b','c.brand_id=b.brand_id');
        $this->db->join('tbl_class cc','c.class_id=cc.class_id');
		$this->db->join('tbl_customer cr','c.user_id=cr.customer_id');
		$this->db->order_by('c.c_id','desc');
        
        $query=$this->db->get();
        return $query->result();
    }
    function get_counselling_detail($c_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_product_counselling c');
       // $this->db->join('tbl_product_counselling_description dc','c.c_id=dc.c_id');
        //$this->db->join('tbl_product_counselling_commission cc','c.c_id=cc.c_id');
        $this->db->where('c.c_id',$c_id);
        $query=$this->db->get();
        return $query->result();
    }
    function get_parent_category()
    {
        $this->db->select('*');
        $this->db->from('tbl_product_counselling c');
        //$this->db->join('tbl_product_counselling_description dc','c.c_id=dc.c_id');
        //$this->db->join('tbl_product_counselling_commission cc','c.c_id=cc.c_id');
        $this->db->where('c.parent_category','0');
        $this->db->where('c.sub_category','0');
        $this->db->order_by('c.category_sort_order','asc');
        $query=$this->db->get();
        return $query->result();
    }
    function get_sub_category($parent_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_product_counselling c');
       // $this->db->join('tbl_product_counselling_description dc','c.c_id=dc.c_id');
        //$this->db->join('tbl_product_counselling_commission cc','c.c_id=cc.c_id');
       // $this->db->where('c.parent_category ',$parent_id);
      //  $this->db->where('c.sub_category','0');
        $this->db->order_by('c.category_sort_order','asc');
        $query=$this->db->get();
        if($parent_id==0)
        {
          return array();
        }
        else
        {
          return $query->result();
        }

    }

    function get_counselling_booking()
    {
        $this->db->select('*,cr.firstname as c_name,cr.email as c_email,cr.phone as c_phone');
        $this->db->from('tbl_product_counselling_booking cb');
        $this->db->join('tbl_customer cr','cb.user_id=cr.customer_id');
        $this->db->join('tbl_product_counselling c','c.c_id=cb.counselling_id');
        $this->db->join('tbl_brand b','c.brand_id=b.brand_id');
        $this->db->join('tbl_class cc','c.class_id=cc.class_id');
        $this->db->join('tbl_customer ccr','c.user_id=ccr.customer_id');
        $this->db->order_by('c.c_id','desc');
        
        $query=$this->db->get();
        return $query->result();
    }
}
?>
