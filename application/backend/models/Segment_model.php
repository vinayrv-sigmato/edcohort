<?php
class segment_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    function get_segment()
    {
        $this->db->select('*');
        $this->db->from('tbl_segment s');
        $query=$this->db->get();
        return $query->result();
    }
    function get_segment_detail($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_segment s');
        $this->db->where('s.id',$id);
        $query=$this->db->get();
        return $query->result();
    }
    function get_parent_category()
    {
        $this->db->select('*');
        $this->db->from('tbl_class c');
        //$this->db->join('tbl_class_description dc','c.class_id=dc.class_id');
        //$this->db->join('tbl_class_commission cc','c.class_id=cc.class_id');
        $this->db->where('c.parent_category','0');
        $this->db->where('c.sub_category','0');
        $this->db->order_by('c.category_sort_order','asc');
        $query=$this->db->get();
        return $query->result();
    }
    function get_sub_category($parent_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_class c');
       // $this->db->join('tbl_class_description dc','c.class_id=dc.class_id');
        //$this->db->join('tbl_class_commission cc','c.class_id=cc.class_id');
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
    
    function get_segment_list()
    {
        print_R("hii");
        /*$this->db->select('id,segment_name');
        $this->db->from('tbl_segment c');
        $this->db->where('c.status ',1);
        $query=$this->db->get();
        /*if($query)
        {*/
            //return $query->result();
       // }
    }
}
?>
