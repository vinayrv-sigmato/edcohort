<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home_model extends CI_Model { 
 
  function __construct()
  {
      parent::__construct();
     
  } 
  
    
 
 
 
  //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
  function latest_review()
  {
      $this->db->select('R.product_review_id,R.brand_id,R.product_review_title,R.product_review,B.brand_name,B.brand_image, COUNT(R.brand_id) as total');
      $this->db->from('tbl_product_review R');
      $this->db->join('tbl_brand B','R.brand_id=B.brand_id');    
      $this->db->where('R.status','active'); 
	  $this->db->group_by('R.brand_id'); 
	  $this->db->order_by('R.product_review_id', 'desc');    
      $query=$this->db->get();
      return $query->result();
  }
  //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
 
    function count_total_rating($id = NULL) {
    $this->db->select('ROUND(AVG(product_rating)) as average');
    $this->db->where('product_id', $id);
    $this->db->from('tbl_product_review');
    $query = $this->db->get();
	return $query->result();
	}     
 
  //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
 
 	 function review_count($id = NULL) {
    $this->db->select('COUNT(product_id) as total');
    $this->db->where('product_id', $id);
    $this->db->from('tbl_product_review');
    $query = $this->db->get();
	return $query->result();
	} 
	
  //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
     
 

  function select($select,$table,$where)
  {
      $this->db->select($select);
      $this->db->from($table);
      $this->db->where($where);     
      $query=$this->db->get();
      return $query->result();
  }
 
 
 function getreview()
 {
    $this->db->select('*');
    $this->db->from('tbl_product_review as PR');
    $this->db->join('tbl_customer', 'tbl_customer.customer_id = PR.user_id');
    $this->db->where('PR.status','Active');
    $query = $this->db->get();
    return $query->result();
   // echo $this->db->last_query(); die;
 }
 
 function getBrandlist($select,$table,$where,$groupby,$orderbycol,$orderbycon)
  {
      $this->db->select($select);
      $this->db->from($table);
      $this->db->where($where);
	  $this->db->group_by($groupby); 
	  $this->db->order_by($orderbycol,$orderbycon);    
      $query=$this->db->get();
      return $query->result();
  }
 
}
