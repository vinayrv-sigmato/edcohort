<?php
class batch_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    function get_batch()
    {
        $this->db->select('*');
        $this->db->from('tbl_batch b');
    
        $query=$this->db->get();
        return $query->result();
    }
    function get_batch_detail($batch_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_batch b');
   
        $this->db->where('b.batch_id',$batch_id);
        $query=$this->db->get();
        return $query->result();
    }
    function get_parent_category()
    {
        $this->db->select('*');
        $this->db->from('tbl_batch b');
        
        $this->db->where('b.parent_category','0');
        $this->db->where('b.sub_category','0');
        $this->db->order_by('b.category_sort_order','asc');
        $query=$this->db->get();
        return $query->result();
    }
    function get_sub_category($parent_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_batch b');
        $this->db->order_by('b.category_sort_order','asc');
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
