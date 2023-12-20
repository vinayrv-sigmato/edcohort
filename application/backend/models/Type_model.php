<?php
class type_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    function get_type()
    {
        $this->db->select('*');
        $this->db->from('tbl_type c');
        //$this->db->join('tbl_type_description dc','c.type_id=dc.type_id');
        //$this->db->join('tbl_type_commission cc','c.type_id=cc.type_id');
        
        $query=$this->db->get();
        return $query->result();
    }
    function get_type_detail($type_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_type c');
       // $this->db->join('tbl_type_description dc','c.type_id=dc.type_id');
        //$this->db->join('tbl_type_commission cc','c.type_id=cc.type_id');
        $this->db->where('c.type_id',$type_id);
        $query=$this->db->get();
        return $query->result();
    }
    function get_parent_category()
    {
        $this->db->select('*');
        $this->db->from('tbl_type c');
        //$this->db->join('tbl_type_description dc','c.type_id=dc.type_id');
        //$this->db->join('tbl_type_commission cc','c.type_id=cc.type_id');
        $this->db->where('c.parent_category','0');
        $this->db->where('c.sub_category','0');
        $this->db->order_by('c.category_sort_order','asc');
        $query=$this->db->get();
        return $query->result();
    }
    function get_sub_category($parent_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_type c');
       // $this->db->join('tbl_type_description dc','c.type_id=dc.type_id');
        //$this->db->join('tbl_type_commission cc','c.type_id=cc.type_id');
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
