<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Common_model extends CI_Model {

	public function __construct()
  {
      parent::__construct();
  }
		// +++++++ For Selection Of one Row +++++++++
	function selectOne($table,$column,$value)
	{
			$this->db->select('*');
			$this->db->from($table);
			$this->db->where($column,$value);
			$query=$this->db->get();
			return $query->result();
	}
	// +++++++ For Selection Of All Row +++++++++
	function selectAll($table)
	{
			$this->db->select('*');
			$this->db->from($table);		
			$query=$this->db->get();
			return $query->result();
	}        
	// +++++++ For Select Where (multiple condition in array) +++++++++
	function selectWhere($table,$where)
	{
			$this->db->select('*');
			$this->db->from($table);
			$this->db->where($where);
			$query=$this->db->get();
			return $query->result();
	}
	// +++++++ For Select Where (multiple condition in array with order by condition) +++++++++
	function selectWhereorderby($table,$where,$col,$condition)
	{
			$this->db->select('*');
			$this->db->from($table);
			$this->db->where($where);
			$this->db->order_by($col,$condition);
			$query=$this->db->get();
			return $query->result();
	}
	// +++++++ For Select Where In (array) +++++++++
	function selectWhereIn($table,$column,$wherein)
	{
			$this->db->select('*');
			$this->db->from($table);
			$this->db->where_in($column,$wherein);
			$query=$this->db->get();
			return $query->result();
	}
	// +++++++ For Select Join +++++++++
	function selectJoin($table1,$column1,$table2,$column2)
	{
			$this->db->select('*');
			$this->db->from($table1);
			$this->db->join($table2, $table1.'.'.$column1.' = '.$table2.'.'.$column2);
			//$this->db->where_in($column,$wherein);
			$query=$this->db->get();
			return $query->result();
	}
	// +++++++ Select max Table +++++++++++++++++
	function selectMax($table,$column)
	{
			$this->db->select_max($column);
			$query = $this->db->get($table); 
			return $query->result();
	}
	// +++++++ Select min Table +++++++++++++++++
	function selectMin($table,$column)
	{
			$this->db->select_min($column);
			$query = $this->db->get($table); 
			return $query->result();
	}
	// +++++++ To Insert Data To Table +++++++++
	function insertData($table,$data)
	{
			$this->db->insert($table,$data);
			return $this->db->insert_id();
	}
	// +++++++ To Update Data To Table +++++++++
	function updateData($table,$data,$where)
	{
			$this->db->update($table,$data,$where);			
	}
	// +++++++ To Delete Data To Table +++++++++
	function deleteData($table,$where)
	{	
			$this->db->where($where);
			$this->db->delete($table);
			//$this->db->affected_rows();
	}	
	// ++++++++ To validate login +++++++++++
	function login_check($data)
	{
			$this->db->select('CD_USER_ID,CD_GROUP_ID,NM_USER_FULLNAME,FL_USER_ACTIVE,CD_PARENT_ID','NM_USER_EMAIL');
			$this->db->from('tbl_user');
			$this->db->where('NM_USER_EMAIL',$data['user']);
			$this->db->where('USER_PASSWORD',$data['pass']);
			$this->db->where('CD_GROUP_ID',1);
			$query=$this->db->get();
			return $query->result();
	}
	//++++++++ User log ++++++++++++++++++++++++
	function userLog($user_id)
	{
			if ($this->agent->is_browser())
			{
			    $browser = $this->agent->browser().' '.$this->agent->version();
			}
			elseif ($this->agent->is_robot())
			{
			    $browser = $this->agent->robot();
			}
			elseif ($this->agent->is_mobile())
			{
			    $browser = $this->agent->mobile();
			}
			else
			{
			    $browser = 'Unidentified';
			}
		  $platform = $this->agent->platform();
		  $ip_address = $_SERVER['REMOTE_ADDR'];

			$data=array(
					'CD_USER_ID'=>$user_id,
					'SN_IPADDRESS'=>$ip_address,
					'SN_BROWSER'=>$browser,
					'SN_OS'=>$platform,
					'TS_CREATED_AT'=>date('Y-m-d H:i:s'),
			);
			$this->db->insert('tbl_user_log',$data);
			//return $this->db->insert_id();
	}     
	//+++++++++++++Last login +++++++++++++++++++
	function last_login($vendor_id)
	{
			$this->db->select('UL.TS_CREATED_AT');
			$this->db->from('tbl_user_log UL');	
		
			$this->db->where('UL.CD_USER_ID',$vendor_id);
			$this->db->order_by('UL.CD_LOG_ID', 'DESC');
			$this->db->limit(1,1);
			$query=$this->db->get();
			return $query->result();
	}  
	
	//////////////////// added by Tarun /////////////////////////
	function get_entry_by_data($table_name, $single = false, $data = array(),$select="",$order_by='',$orderby_field='',$limit='',$offset=0) 
	{	
	 	if(!empty($select))
	 	{
	 		$this->db->select($select);
	 	}	 	
    if (empty($data))
    {          	
      	$id = $this->input->post('id');          	
      	if ( ! $id ) return false;
        $data = array('id' => $id);
    }
    if(!empty($limit))
    {
    	$this->db->limit($limit,$offset);
    }
    if(!empty($order_by) && !empty($orderby_field))
    {
    	$this->db->order_by($orderby_field,$order_by);
    }
    $query = $this->db->get_where($table_name, $data);
    $res = $query->result_array();
    //echo $this->db->last_query();exit;
    if (!empty($res)) 
    {
      if ($single){
      	return $res[0]; 
      }                
			else{
				return $res;
			}                
    }
    else
    {
      return false;
    }
  }	


}
