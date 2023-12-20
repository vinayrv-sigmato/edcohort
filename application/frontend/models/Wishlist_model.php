<?php

class Wishlist_model extends CI_Model {
  
	function diamond_wishlist($where)
	{      
      $this->db->select('*');
      $this->db->from('tbl_wishlist C');
      $this->db->where('C.product_type','diamond');
      $this->db->where($where);
      $query=$this->db->get();
      return $query->result();
	} 
  function watch_wishlist($where)
  {      
      $this->db->select('*');
      $this->db->from('tbl_wishlist C');
      $this->db->where('C.product_type','watch');
      $this->db->where($where);
      $query=$this->db->get();
      return $query->result();
  }
  function jewelry_wishlist($where)
  {      
      $this->db->select('*');
      $this->db->from('tbl_wishlist C');
      $this->db->where('C.product_type','jewelry');
      $this->db->where($where);
      $query=$this->db->get();
      return $query->result();
  }
  function get_wishlist($where)
  {
    $this->db->select_sum('total_price');
    $this->db->where($where);
    $query=$this->db->get('tbl_wishlist');
    $result=$query->result();

    $data['total_price']=@$result['0']->total_price;

    $this->db->select_sum('quantity');
    $this->db->where($where);
    $query1=$this->db->get('tbl_wishlist');
    $result1=$query1->result();

    $data['quantity']=@$result1['0']->quantity;
  
    return $data;

  }
  function all_wishlist($where)
  {      
      $this->db->select('*');
      $this->db->from('tbl_wishlist');
      $this->db->where($where);
      $query=$this->db->get();
      return $query->result();
  }

  function get_wishlist_diamond($where)
  {
    $this->db->select_sum('total_price');
    $this->db->where($where);

    $query=$this->db->get('tbl_wish_cart_diamond');
    $result=$query->result();

    $data['total_price']=@$result['0']->total_price;

    $this->db->select_sum('quantity');
    $this->db->where($where);
    $this->db->where('product_choice',2);
    $query1=$this->db->get('tbl_wish_cart_diamond');
    $result1=$query1->result();

    $data['quantity']=@$result1['0']->quantity;
  
    return $data;

  }

  function all_wishlist_diamond($where)
  {      
      $this->db->select('*');
      $this->db->from('tbl_wish_cart_diamond');
      $this->db->where($where);
      $this->db->where('product_choice',2);
      $query=$this->db->get();
      return $query->result();
  }
  function check_wishlist($where)
  {
      $this->db->select('*');
      $this->db->from('tbl_wishlist');
      $this->db->where($where);
      $query = $this->db->get();
      return $query->result();
  }
  
  

}
