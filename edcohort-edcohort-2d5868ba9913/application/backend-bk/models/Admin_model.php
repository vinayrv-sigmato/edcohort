<?php
class admin_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    public function record_count($table)
    {
        return $this->db->count_all($table);
    }
    function check_login($username,$password)
    {
        $this->db->select('u.CD_USER_ID,u.CD_GROUP_ID,u.NM_USER_FULLNAME,u.FL_USER_ACTIVE,u.CD_PARENT_ID,u.NM_USER_EMAIL,ud.NM_FOLDER_NAME');
        $this->db->from('tbl_user u');
        $this->db->join('tbl_user_details ud','u.CD_USER_ID=ud.CD_USER_ID');
        $this->db->where('NM_USER_EMAIL',$username);
        $this->db->where('USER_PASSWORD',$password);
        
        $query=$this->db->get();
        return $query->result();
    }
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
    function selectJoin($table1,$column1,$table2,$column2,$where)
    {
        $this->db->select('*');
        $this->db->from($table1);
        $this->db->join($table2, $table1.'.'.$column1.' = '.$table2.'.'.$column2);
        $this->db->where($where);
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
    }   

    function selectAll_order($table_name,$column_name,$order)
    {
        $this->db->select('*');
        $this->db->from($table_name);
        $this->db->order_by($column_name,$order);
        $query=$this->db->get();
        return $query->result();
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
    function getTotalOrdersByYear()
    {
		$order_data = array();
		for ($i = 1; $i <= 12; $i++)
        {
  			$order_data[$i] = array(
  				'month' => date('M', mktime(0, 0, 0, $i)),
  				'total' => 0
  			);
    	}
    	$query = $this->db->query("SELECT COUNT(*) AS total, date_added
          FROM `tb_order`
          WHERE order_status_id = 1
          AND YEAR(date_added) = YEAR(NOW())
          GROUP BY MONTH(date_added)");

        //echo "<pre>";print_r($query->result_array());exit;
    	foreach ($query->result_array() as $result)
        {
		     $order_data[date('n', strtotime($result['date_added']))] = array(
				'month' => date('M', strtotime($result['date_added'])),
				'total' => $result['total']
			    );
    	}
    	return $order_data;
  	}
    function getTotalOrdersByMonth()
    {
		$order_data = array();
		for ($i = 1; $i <= date('t'); $i++)
        {
  			$date = date('Y') . '-' . date('m') . '-' . $i;
  			$order_data[date('j', strtotime($date))] = array(
  				'day'   => date('d', strtotime($date)),
  				'total' => 0
  			);
		}
		$query = $this->db->query("SELECT COUNT(*) AS total, date_added
        FROM `tb_order`
        WHERE order_status_id = 1
        AND DATE(date_added) >= '" . date('Y') . '-' . date('m') .'-01'. "'
        AND DATE(date_added) < '" . date('Y-m-d',strtotime("+1 months",strtotime(date('Y') . '-' . date('m') .'-01'))). "'
        GROUP BY DATE(date_added)");

		foreach ($query->result_array() as $result)
        {
  			$order_data[date('j', strtotime($result['date_added']))] = array(
  				'day'   => date('d', strtotime($result['date_added'])),
  				'total' => $result['total']
  			);
		}
    	return $order_data;
  	}
    function getTotalOrdersByWeek()
    {
		$order_data = array();
		$date_start = strtotime('-' . date('w') . ' days');
		for ($i = 0; $i < 7; $i++)
        {
  			$date = date('Y-m-d', $date_start + ($i * 86400));
  			$order_data[date('w', strtotime($date))] = array(
  				'day'   => date('D', strtotime($date)),
  				'total' => 0
  			);
		}
		$query = $this->db->query("SELECT COUNT(*) AS total, date_added
        FROM `tb_order`
        WHERE order_status_id = 1
        AND DATE(date_added) >= DATE('" . date('Y-m-d', $date_start) . "')
        GROUP BY DAYNAME(date_added)");

		foreach ($query->result_array() as $result)
        {
			  $order_data[date('w', strtotime($result['date_added']))] = array(
				'day'   => date('D', strtotime($result['date_added'])),
				'total' => $result['total']
			);
		}
		return $order_data;
  	}

    function select_category($table_name)
    {
        $this->db->select('*');
        $this->db->from($table_name);
        $this->db->order_by('category_sort_order','asc');
        $query=$this->db->get();
        return $query->result();
    }
    function getFilter($select,$table,$where)
    {
        $this->db->select($select);
        $this->db->from($table);
        $this->db->like($where);
        $this->db->limit(100);
        $query=$this->db->get();
        return $query->result();
    }
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
}
?>
