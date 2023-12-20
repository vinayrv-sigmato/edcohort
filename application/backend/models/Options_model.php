<?php
class Options_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    function get_options()
    {
        $this->db->select('*');
        $this->db->from('tbl_option');
        //$this->db->join('tbl_category_description dc','c.category_id=dc.category_id');
        //$this->db->join('tbl_category_commission cc','c.category_id=cc.category_id');
        
        $query=$this->db->get();
        return $query->result();
    }
    function get_options_detail($option_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_option');
        //$this->db->join('tbl_category_description dc','c.category_id=dc.category_id');
        //$this->db->join('tbl_category_commission cc','c.category_id=cc.category_id');
        $this->db->where('option_id',$option_id);
        $query=$this->db->get();
        return $query->result();
    }

     function get_options_value($option_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_option_value');       
        $this->db->where('option_id',$option_id);
        $query=$this->db->get();
        return $query->result();
    }
    function get_parent_category()
    {
        $this->db->select('*');
        $this->db->from('tbl_category c');
        $this->db->join('tbl_category_description dc','c.category_id=dc.category_id');
        //$this->db->join('tbl_category_commission cc','c.category_id=cc.category_id');
        $this->db->where('c.parent_category','0');
        $this->db->where('c.sub_category','0');
        $this->db->order_by('c.category_sort_order','asc');
        $query=$this->db->get();
        return $query->result();
    }
    function get_sub_category($parent_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_category c');
        $this->db->join('tbl_category_description dc','c.category_id=dc.category_id');
        //$this->db->join('tbl_category_commission cc','c.category_id=cc.category_id');
        $this->db->where('c.parent_category ',$parent_id);
        $this->db->where('c.sub_category','0');
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
