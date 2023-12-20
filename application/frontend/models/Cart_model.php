<?php

class Cart_model extends CI_Model {
  
	function diamond_cart($where)
	{      
      $this->db->select('*');
      $this->db->from('tbl_cart C');
      //$this->db->join('tbl_diamond D', 'C.product_id=D.diamond_id','left');
      $this->db->where('C.product_type','diamond');
      $this->db->where($where);
      $query=$this->db->get();
      return $query->result();
	} 
  function watch_cart($where)
  {      
      $this->db->select('*');
      $this->db->from('tbl_cart C');
      //$this->db->join('tbl_watch W', 'C.product_id=W.watch_id','left');
      $this->db->where('C.product_type','watch');
      $this->db->where($where);
      $query=$this->db->get();
      return $query->result();
  }
  function jewelry_cart($where)
  {      
      $this->db->select('*');
      $this->db->from('tbl_cart C');
      //$this->db->join('tbl_jewelry J', 'C.product_id=J.jewelry_id','left');
      $this->db->where('C.product_type','jewelry');
      $this->db->where($where);
      $query=$this->db->get();
      return $query->result();
  }
  function get_cart($where)
  {
      $this->db->select_sum('total_price');
      $this->db->where($where);
      $query=$this->db->get('tbl_cart');
      $result=$query->result();

      $data['total_price']=@$result['0']->total_price;

      $this->db->select_sum('quantity');
      $this->db->where($where);
      $query1=$this->db->get('tbl_cart');
      $result1=$query1->result();

      $data['quantity']=@$result1['0']->quantity;

      return $data;
  }
  function get_cart_diamond($where)
  {
      $this->db->select_sum('total_price');
      $this->db->where($where);
      $query=$this->db->get('tbl_wish_cart_diamond');
      $result=$query->result();

      $data['total_price']=@$result['0']->total_price;

      $this->db->select_sum('quantity');
      $this->db->where($where);
      $this->db->where('product_choice',1);
      $query1=$this->db->get('tbl_wish_cart_diamond');
      $result1=$query1->result();

      $data['quantity']=@$result1['0']->quantity;

      return $data;
  }
  function all_cart($where)
  {      
      $this->db->select('*');
      $this->db->from('tbl_cart');
      $this->db->where($where);
      $query=$this->db->get();
      return $query->result();
  }
  function all_cart_diamond($where)
  {      
      $this->db->select('*');
      $this->db->from('tbl_wish_cart_diamond');
      $this->db->where($where);
      $this->db->where('product_choice',1);
      $query=$this->db->get();
      return $query->result();
  }
  function check_cart($where)
  {
      $this->db->select('*');
      $this->db->from('tbl_cart');
      $this->db->where($where);
      $query = $this->db->get();
      return $query->result();
  }
  function check_cart_cookie($product_id,$cookie_id)
  {
    $this->db->select('*');
    $this->db->from('tbl_cart_cookie cc');
    $this->db->join('tbl_product p','cc.product_id=p.product_id');
    if($product_id!="")
    {
      $this->db->where('cc.product_id',$product_id);
    }
    $this->db->where('cc.cookie_id',$cookie_id);
    $query=$this->db->get();
    return $query->result();
  }
  function check_cart_cookie_diamond($cookie_id)
  {
    $this->db->select('*');
    $this->db->from('tbl_cart_cookie_diamond');

    $this->db->where('cookie_id',$cookie_id);
    $query=$this->db->get();
    return $query->result();
  }
  function get_cart_cookie($where)
  {
      $this->db->select_sum('total_price');
      $this->db->where($where);
      $query=$this->db->get('tbl_cart_cookie');
      $result=$query->result();

      $data['total_price']=@$result['0']->total_price;

      $this->db->select_sum('quantity');
      $this->db->where($where);
      $query1=$this->db->get('tbl_cart_cookie');
      $result1=$query1->result();

      $data['quantity']=@$result1['0']->quantity;

      return $data;
  }
  function all_cart_cookie($where)
  {      
      $this->db->select('*');
      $this->db->from('tbl_cart_cookie');
      $this->db->where($where);
      $query=$this->db->get();
      return $query->result();
  }
  
  

}
