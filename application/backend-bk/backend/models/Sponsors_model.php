<?php
class sponsors_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    function get_sponsors()
    {
        $this->db->select('*');
        $this->db->from('tbl_sponsors c');
        //$this->db->join('tbl_sponsors_description dc','c.sponsors_id=dc.sponsors_id');
        //$this->db->join('tbl_sponsors_commission cc','c.sponsors_id=cc.sponsors_id');
        
        $query=$this->db->get();
        return $query->result();
    }
    function get_sponsors_detail($sponsors_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_sponsors c');
       // $this->db->join('tbl_sponsors_description dc','c.sponsors_id=dc.sponsors_id');
        //$this->db->join('tbl_sponsors_commission cc','c.sponsors_id=cc.sponsors_id');
        $this->db->where('c.sponsors_id',$sponsors_id);
        $query=$this->db->get();
        return $query->result();
    }
    function get_parent_category()
    {
        $this->db->select('*');
        $this->db->from('tbl_sponsors c');
        //$this->db->join('tbl_sponsors_description dc','c.sponsors_id=dc.sponsors_id');
        //$this->db->join('tbl_sponsors_commission cc','c.sponsors_id=cc.sponsors_id');
        $this->db->where('c.parent_category','0');
        $this->db->where('c.sub_category','0');
        $this->db->order_by('c.category_sort_order','asc');
        $query=$this->db->get();
        return $query->result();
    }
    function get_sub_category($parent_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_sponsors c');
       // $this->db->join('tbl_sponsors_description dc','c.sponsors_id=dc.sponsors_id');
        //$this->db->join('tbl_sponsors_commission cc','c.sponsors_id=cc.sponsors_id');
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
