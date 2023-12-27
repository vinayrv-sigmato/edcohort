<?php
class compare_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    function get_brand_comapre()
    {
        $this->db->select('*');
        $this->db->from('tbl_brand_compare s');
        $query=$this->db->get();
        return $query->result();
    }

    function get_segment_detail($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_brand_compare d');
        $this->db->where('id',$id);
        $query=$this->db->get();
        return $query->result();
    }
}