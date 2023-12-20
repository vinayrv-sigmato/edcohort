<?php
class board_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    function get_board()
    {
        $this->db->select('*');
        $this->db->from('tbl_board b');
    
        $query=$this->db->get();
        return $query->result();
    }
    function get_board_detail($board_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_board b');
   
        $this->db->where('b.board_id',$board_id);
        $query=$this->db->get();
        return $query->result();
    }
    function get_parent_category()
    {
        $this->db->select('*');
        $this->db->from('tbl_board b');
        
        $this->db->where('b.parent_category','0');
        $this->db->where('b.sub_category','0');
        $this->db->order_by('b.category_sort_order','asc');
        $query=$this->db->get();
        return $query->result();
    }
    function get_sub_category($parent_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_board b');
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
