<?php
class customer_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    function customer_list($where,$order_by)
    {
        if($where!="")
        {
            $where="WHERE ".$where;
        }
        $order_query=$order_by;
        $select='customer_id,sales_person_id,firstname,lastname,email,phone,date_added,date_edited,status';
        $table_name='tbl_customer C';
        $query = $this->db->query("select ".$select." from ".$table_name." ".$where." ".$order_query." ");
        //$select='customer_id,sales_person_id,firstname,lastname,email,phone,date_added,date_edited,status,U.NM_USER_FULLNAME';
        //$table_name='tbl_customer C  right join tbl_user U on C.sales_person_id=U.CD_USER_ID';
        //$query = $this->db->query("select ".$select." from ".$table_name." ".$where." ".$order_query." LIMIT  ".$offset." , ".$limit." ");
     //echo $this->db->last_query();die;
        return $query->result();
    }
    function customerTotal($where,$order_by)
    { 
        if($where!="")
        {
            $where="WHERE ".$where;        
        }
        $order_query=$order_by;
        $select='count(customer_id) as customer_count ';
        $table_name='tbl_customer C';
        $query = $this->db->query("select ".$select." from ".$table_name." ".$where." ".$order_query." ");
        return $query->result();
    }

    function customer_log($user_id)
    {
            $this->db->select('U.firstname,UL.SN_IPADDRESS,UL.SN_BROWSER,UL.SN_OS,UL.TS_CREATED_AT');
            $this->db->from('tbl_user_log UL');
            $this->db->join('tbl_customer U','UL.CD_USER_ID=U.customer_id');
            if(!empty($user_id)){
            $this->db->where('U.sales_person_id',$user_id);
             }

            $this->db->order_by('UL.CD_LOG_ID', 'DESC');
            $query=$this->db->get();             
            return $query->result();
    }

     function customer_view($user_id)
    {
            $this->db->select('U.firstname,UL.user_id,UL.item_id,UL.type,UL.title,UL.date_added');
            $this->db->from('tbl_view_history UL');
            $this->db->join('tbl_customer U','UL.user_id=U.customer_id');
            if(!empty($user_id)){
            $this->db->where('U.sales_person_id',$user_id);
             }

            $this->db->order_by('UL.vh_id', 'DESC');
            $query=$this->db->get();             
            return $query->result();
    }

     function customer_history($user_id)
    {
            $this->db->select('U.firstname,UL.user_id,UL.search,UL.search_count,UL.date_added');
            $this->db->from('tbl_search_history UL');
            $this->db->join('tbl_customer U','UL.user_id=U.customer_id');
            if(!empty($user_id)){
            $this->db->where('U.sales_person_id',$user_id);
             }

            $this->db->order_by('UL.sh_id', 'DESC');
            $query=$this->db->get();             
            return $query->result();
    }
}
?>
