<?php

class Vendor_model extends CI_Model {
  
	function vendor_list($data)
	{
			$group_f=@$data['group_f'];

			$this->db->select('*');
			$this->db->from('tbl_user U');
			$this->db->join('tbl_user_details UD','U.CD_USER_ID=UD.CD_USER_ID');
			//$this->db->join('tbl_vendor_group VG','UD.SN_VENDOR_GROUP_ID=VG.CD_VENDOR_GROUP_ID','left');
				
			
			if($group_f!="")
			{
				$this->db->join('tbl_vendor_group_id VGI','U.CD_USER_ID=VGI.vendor_id','left');	
				$this->db->join('tbl_vendor_group VG','VGI.vendor_group_id=VG.CD_VENDOR_GROUP_ID','left');
				$this->db->where('VG.CD_VENDOR_GROUP_ID',$group_f);
			}
			if(isset($data['user_name']))
			{
			    $this->db->where('U.NM_USER_FULLNAME',$data['user_name']);
			}
			$this->db->where('U.CD_GROUP_ID','3');
			$this->db->group_by('U.CD_USER_ID');
			$query=$this->db->get();
			return $query->result();
	}
	function select_vendor($vendor_id)
	{
			$this->db->select('VG.SN_VENDOR_GROUP_NAME,U.*,UD.*');
			$this->db->from('tbl_user U');
			$this->db->join('tbl_user_details UD','U.CD_USER_ID=UD.CD_USER_ID');
			$this->db->join('tbl_vendor_group VG','UD.SN_VENDOR_GROUP_ID=VG.CD_VENDOR_GROUP_ID','left');
		
			$this->db->where('U.CD_GROUP_ID','3');
			$this->db->where('U.CD_USER_ID',$vendor_id);
			$query=$this->db->get();
			return $query->result();
	}
	function vendor_log()
	{
			$this->db->select('UD.NM_COMPANY_NAME,UL.SN_IPADDRESS,UL.SN_BROWSER,UL.SN_OS,UL.TS_CREATED_AT');
			$this->db->from('tbl_user_log UL');
			$this->db->join('tbl_user U','UL.CD_USER_ID=U.CD_USER_ID');
			$this->db->join('tbl_user_details UD','U.CD_USER_ID=UD.CD_USER_ID');
		
			$this->db->where('U.CD_GROUP_ID','3');
			$this->db->order_by('UL.CD_LOG_ID', 'DESC');
			$query=$this->db->get();
			return $query->result();
	}
	//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	function vendor_list_excel()
	{
			$this->db->select('U.CD_USER_ID,U.FL_USER_ACTIVE,UD.NM_FOLDER_NAME,U.NM_USER_FULLNAME');
			$this->db->from('tbl_user U');
			$this->db->join('tbl_user_details UD','U.CD_USER_ID=UD.CD_USER_ID');			
				
			$this->db->where('U.CD_GROUP_ID','3');			
			$query=$this->db->get();
			return $query->result();
	}
	//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	function vendor_group($vendor_id)
	{
			$this->db->select('VG.SN_VENDOR_GROUP_NAME');
			$this->db->from('tbl_user U');	
			$this->db->join('tbl_vendor_group_id VGI','U.CD_USER_ID=VGI.vendor_id','left');		
			$this->db->join('tbl_vendor_group VG','VGI.vendor_group_id=VG.CD_VENDOR_GROUP_ID','left');			

			$this->db->where('U.CD_GROUP_ID','3');
			$this->db->where('U.CD_USER_ID',$vendor_id);
			$query=$this->db->get();
			return $query->result();
	}


}
