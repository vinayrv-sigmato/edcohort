<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User_model extends CI_Model {	
	function login_check($data)
	{
			$this->db->select('customer_id,firstname,lastname,status,email,jewelry_menu,phone');
			$this->db->from('tbl_customer');
			$this->db->where('email',$data['user']);
			$this->db->where('password',$data['pass']);
			$query=$this->db->get();
			return $query->result();
	}
      function order_details($type,$where)
      {
          $this->db->select('*');
          $this->db->from('tbl_order');
          $this->db->where($type);
          $this->db->where($where);
          $query=$this->db->get();
          return $query->result();
      }
      function facebook_login($email)
	    {
	        $this->db->select('*');
					$this->db->from('tbl_customer');
	        $this->db->where('email',$email);
	        $this->db->where('auth_provider','facebook');
	        $query=$this->db->get();
					return $query->result();
	    }
	    function google_login($email)
	    {
	        $this->db->select('*');
					$this->db->from('tbl_customer');
	        $this->db->where('email',$email);
	        $this->db->where('auth_provider','google');
	        $query=$this->db->get();
					return $query->result();
	    }
	    function social_login($email)
	    {
	        $this->db->select('*');
					$this->db->from('tbl_customer');
	        $this->db->where('email',$email);
	        $query=$this->db->get();
					return $query->result();
	    }
	    function getOrder($where)
      {
          $this->db->select('O.*,OP.*');
          $this->db->from('tbl_order O');          
          $this->db->join('tbl_order_product OP','O.order_id=OP.order_id');          
          $this->db->where($where);
          $this->db->order_by('O.order_id','DESC');
          $this->db->group_by('O.order_id');
          $query=$this->db->get();
          return $query->result();
      }
      function getDiamondOrder($where)
      {
          $this->db->select('*');
          $this->db->from('tbl_diamond_enquiry');                 
          $this->db->where($where);
          $query=$this->db->get();
          return $query->result();
      }
}
