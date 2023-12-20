<?php
class graduated_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    function get_graduated()
    {
        $this->db->select('*');
        $this->db->from('tbl_graduated_in s');
        $query=$this->db->get();
        return $query->result();
    }
      function get_graduated_detail($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_graduated_in s');
        $this->db->where('s.id',$id);
        $query=$this->db->get();
        return $query->result();
    }
   
}
?>
