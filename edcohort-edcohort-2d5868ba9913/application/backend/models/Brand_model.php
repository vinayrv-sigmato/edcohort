<?php
class brand_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    function get_brand()
    {
        $this->db->select('*');
        $this->db->from('tbl_brand c');
        //$this->db->join('tbl_brand_description dc','c.brand_id=dc.brand_id');
        //$this->db->join('tbl_brand_commission cc','c.brand_id=cc.brand_id');
        
        $query=$this->db->get();
        return $query->result();
    }
    function get_brand_detail($brand_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_brand c');
       // $this->db->join('tbl_brand_description dc','c.brand_id=dc.brand_id');
        //$this->db->join('tbl_brand_commission cc','c.brand_id=cc.brand_id');
        $this->db->where('c.brand_id',$brand_id);
        $query=$this->db->get();
        return $query->result();
    }
    function get_parent_category()
    {
        $this->db->select('*');
        $this->db->from('tbl_brand c');
        //$this->db->join('tbl_brand_description dc','c.brand_id=dc.brand_id');
        //$this->db->join('tbl_brand_commission cc','c.brand_id=cc.brand_id');
        $this->db->where('c.parent_category','0');
        $this->db->where('c.sub_category','0');
        $this->db->order_by('c.category_sort_order','asc');
        $query=$this->db->get();
        return $query->result();
    }
    function get_sub_category($parent_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_brand c');
       // $this->db->join('tbl_brand_description dc','c.brand_id=dc.brand_id');
        //$this->db->join('tbl_brand_commission cc','c.brand_id=cc.brand_id');
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
}
?>
