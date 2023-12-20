<?php
class Appointment_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    function appointment_list($limit='',$offset=0,$where,$order_by)
    {
        if($where!="")
        {
            $where="WHERE ".$where;
        }
        $order_query=$order_by;
        $select='*';
        $table_name='tbl_appointment C';
        $query = $this->db->query("select ".$select." from ".$table_name." ".$where." ".$order_query." LIMIT  ".$offset." , ".$limit." ");
        return $query->result();
    }
    function appointmentTotal($where,$order_by)
    { 
        if($where!="")
        {
            $where="WHERE ".$where;        
        }
        $order_query=$order_by;
        $select='count(appointment_id) as appointment_count ';
        $table_name='tbl_appointment C';
        $query = $this->db->query("select ".$select." from ".$table_name." ".$where." ".$order_query." ");
        return $query->result();
    }

}
?>
