<?php
class Common_model extends CI_Model {
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
	// +++++++ For Selection Of All Row +++++++++
	function selectAllarray($table)
	{
			$this->db->select('*');
			$this->db->from($table);		
			$query=$this->db->get();
			return $query->result_array();
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
	// +++++++ For Select Join Where+++++++++
	function selectJoinWhere($table1,$column1,$table2,$column2,$where)
	{
			$this->db->select('*');
			$this->db->from($table1);
			$this->db->join($table2, $table1.'.'.$column1.' = '.$table2.'.'.$column2);
			$this->db->where($where);
			$query=$this->db->get();
			return $query->result();
	}
	function selectJoinWhereOrderby($table1,$column1,$table2,$column2,$where,$orderby)
	{
			$this->db->select('*');
			$this->db->from($table1);
			$this->db->join($table2, $table1.'.'.$column1.' = '.$table2.'.'.$column2);
			$this->db->where($where);
			$this->db->order_by($orderby); 
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
	function updateCounter($table,$data,$where)
	{
		$this->db->query("UPDATE ".$table." SET ".$data." = ".$data." + 1 WHERE ".$where."");
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
	function get_entry_by_data($table_name, $single = false, $data = array(),$select="",$order_by='',$orderby_field='',$limit='',$offset=0) {
	 // 	if(!empty($select)){
	 // 		$this->db->select($select);
	 // 	}
        if (empty($data)){
          	$id = $this->input->post('CD_ITEM');
          	if ( ! $id ) return false;
            $data = array('CD_ITEM' => $id);		
        }  
        if(!empty($limit)){
        	$this->db->limit($limit,$offset);
        }   
        if(!empty($order_by) && !empty($orderby_field)){
        	$this->db->order_by($orderby_field,$order_by);
        }
				$this->db->cache_on();
        $query = $this->db->get_where($table_name, $data);
        $res = $query->result_array();
        //echo $this->db->last_query();exit;
        if (!empty($res)) {
            if ($single)
                return $res[0]; 
			else
                return $res;
        }
        else
            return false;
    }
    function url_slug($string)
    {
        //Unwanted:  {UPPERCASE} ; / ? : @ & = + $ , . ! ~ * ' ( )
        $string = strtolower($string);
        //Strip any unwanted characters
        $string = preg_replace("/[^a-z0-9_\s-]/", " ", $string);
        //Clean multiple dashes or whitespaces
        $string = preg_replace("/[\s-]+/", "-", $string);
        //Convert whitespaces and underscore to dash
        $string = preg_replace("/[\s_]/", "-", $string);
        //$string =substr_replace($string ,"",-1);//Last dashes remove
        return $string;
    }
    function update_entry($table_name, $data, $where)
	{
		return $this->db->update($table_name, $data, $where);
	}
	function getCatNameSlug($slug){
		$query=$this->db->query("select c.category_id,c.category_name,cd.category_slug from tbl_category as c 
			join tbl_category_description as cd on c.category_id=cd.category_id where cd.category_slug='".$slug."' ");
		$result=$query->result();
		if(count($result)){
			return @ucwords($result['0']->category_name);
		}else{
			return "";
		}
	}
	function categoryMeta($slug){
		$query=$this->db->query("select category_meta_title,category_meta_keyword,category_meta_description 
			from tbl_category_description as cd 
			where cd.category_slug='".$slug."' ");
		$result=$query->result();
	}
	function selectJointwo($table1,$column1,$table2,$column2,$where)
	{
			$this->db->select('*');
			$this->db->from($table1);
			$this->db->join($table2, $table1.'.'.$column1.' = '.$table2.'.'.$column2);
			$this->db->where($where);
			$query=$this->db->get();
			return $query->result();
	}
	function selectLeftJointwo($table1,$column1,$table2,$column2,$where)
	{
			$this->db->select('*');
			$this->db->from($table1);
			$this->db->join($table2, $table1.'.'.$column1.' = '.$table2.'.'.$column2,'left');
			$this->db->where($where);
			$query=$this->db->get();
			return $query->result();
	}

	 function selectWhereOrderlimit($table,$where,$limit='',$offset=0,$order='')
	 {  
	      if($where!="")
        {
            $where="WHERE ".$where;
        }
        $order_query=$order;
        $select='*';
        $table_name=$table;
        $query = $this->db->query("select ".$select." from ".$table_name." ".$where." ".$order_query." LIMIT  ".$offset." , ".$limit." ");
        return $query->result();
	 }
	 
	 // +++++++ For Select Where (multiple condition in array) +++++++++
	function selectWhereGroupby($table,$where,$groupby)
	{
			$this->db->select('*');
			$this->db->from($table);
			$this->db->where($where);
			$this->db->group_by($groupby);
			$query=$this->db->get();
			return $query->result();
	}

	function fetch_category_list($where,$order,$groupby){
      $this->db->select('*');
      $this->db->from('v_product');
      $this->db->where($where);
      $this->db->order_by($order);
      $this->db->group_by($groupby);
      $query=$this->db->get();
      return $query->result();
  }	

	  function fetch_class_list($board_id) {
   
      $this->db->where('board_id', $board_id);
      $this->db->order_by('board_id', 'ASC');
      $this->db->group_by('board_id');
      $query = $this->db->get('v_product');
      $output = '<option value="">Select Class</option>';
      foreach($query->result() as $row)
      {
      $output .= '<option value="'.$row->class_id.'">'.$row->class_name.'</option>';
      }
      return $output;
  }

  function fetch_batch_list($class_id)
 {
  $this->db->where('class_id', $class_id);
  $this->db->order_by('batch_id', 'ASC');
  $this->db->group_by('batch_id');
  $query = $this->db->get('v_product');
  $output = '<option value="">Select Batch</option>';
  foreach($query->result() as $row)
  {
   $output .= '<option value="'.$row->batch_id.'">'.$row->batch_name.'</option>';
  }
  return $output;
 }
 
 function getseg_brand_list($id)
    {
        $where= '';
        $query = '';
        $where.=" c.segment_id = ".$id." and b.brand_id = c.product_brand";
        $this->db->select('c.product_brand,b.brand_name,b.brand_image,b.brand_id');
        $this->db->from('tbl_product c, tbl_brand b');
         $this->db->where($where);
        $this->db->group_by('b.brand_id');
        //$sql = $this->db->get_compiled_select();
        $query=$this->db->get();
        if($query)
        {
            return $query->result();
        }
        else
        {
            return $query;
        }
       
    }
	function get_all_brand()
	{
		$query = '';
		$this->db->select('*');
        $this->db->from('tbl_brand b');
		$query=$this->db->get();
		if($query)
        {
            return $query->result();
        }
        else
        {
            return $query;
        }
	}
    
    function getseg_course_list($id)
    {
        $where= '';
        $query = '';
        $where.=" c.segment_id = ".$id." and c.product_id = i.product_id";
        $this->db->select('c.product_id,c.product_name,c.product_rating,i.product_image');
        $this->db->from('tbl_product c, tbl_product_image i');
        $this->db->where($where);
       // $sql = $this->db->get_compiled_select();
        
        $query=$this->db->get();
        if($query)
        {
            return $query->result();
        }
        else
        {
            return $query;
        }
       
    }
	function get_brands_detail($id)
	{
		$where= '';
		$query = '';
		$where.=" b.brand_id = ".$id;
		$this->db->select('*');
        $this->db->from('tbl_brand b');
		$this->db->where($where);
		$query=$this->db->get();
		if($query)
        {
            return $query->result();
        }
        else
        {
            return $query;
        }
	}

	function get_banner_images()
	{
		$query = '';
		$this->db->select('*');
		$this->db->from('tbl_home_slider');
		$query = $this->db->get();
		if($query)
		{
			return $query->result();
		}
		else
		{
			return $query;
		}
	}
	 
	function get_single_coure_detail($course_id)
	{
		$where= '';
        $query = '';
        $where.=" c.product_id = ".$course_id." and c.product_id = i.product_id";
        $this->db->select('c.product_id,c.product_name,c.product_rating,i.product_image');
        $this->db->from('tbl_product c, tbl_product_image i');
        $this->db->where($where);
        $query=$this->db->get();
		if($query)
		{
			return $query->result();
		}
		else
		{
			return $query;
		}
	}

	function get_brand_compare_detail($course_id,$segment_id)
	{
	
		$where= '';
        $query = '';
        $where.=" b.product_id =".$course_id." and  c.brand_id = b.product_brand and c.segment_id = ".$segment_id;
        $this->db->select('c.aging,c.overall_brand,c.faculty_quality,c.course_quality,c.acadmic_quality,c.referal_score');
        $this->db->from('tbl_brand_compare c, tbl_product b');
        $this->db->where($where);
        $query=$this->db->get();
		if($query)
		{
			return $query->result();
		}
		else
		{
			return $query;
		}
	}
	 
}
?>