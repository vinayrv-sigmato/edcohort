<?php

class Diamond_order_model extends CI_Model

{

    function __construct()

    {

        parent::__construct();

    }

    function diamond_order_list($limit='',$offset=0,$where)

    {

        if($where!="")

        {

            $where="WHERE ".$where;

        }

        $order_query="ORDER BY stock_id DESC";

        $select='de.*,U.NM_USER_FULLNAME as vendor_name';

        $table_name='tbl_diamond_enquiry de 
         join tbl_user as U on de.vendor_id=U.CD_USER_ID';

        $query = $this->db->query("select ".$select." from ".$table_name." ".$where." ".$order_query." LIMIT  ".$offset." , ".$limit." ");

        return $query->result();
    }

    // function orderTotal($where,$order_by)

    // { 

    //     if($where!="")

    //     {

    //         $where="WHERE ".$where;        

    //     }

    //     $order_query=$order_by;

    //     $select='count(stock_id) as diamond_order_count ';

    //     $table_name='tbl_diamond_enquiry';

    //     // LEFT JOIN tbl_customer C ON O.customer_id=C.customer_id';

    //     $query = $this->db->query("select ".$select." from ".$table_name." ".$where." ".$order_query." ");

    //     return $query->result();

    // }
    function orderTotal($where)
    {      
        if($where!="")
        {
          $where="WHERE ".$where;        
        }
        $order_query="ORDER BY stock_id DESC";
        $select='count(stock_id) as diamond_order_count ';
        $table_name='tbl_diamond_enquiry';
        $query = $this->db->query("select ".$select." from ".$table_name." ".$where." ".$order_query." ");
        return $query->result();
    }     
    




}

?>

