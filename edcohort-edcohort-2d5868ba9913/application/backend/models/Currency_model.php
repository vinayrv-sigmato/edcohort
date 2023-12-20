<?php
class Currency_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    function product_list($limit='',$offset=0,$where,$order_by)
    {
        if($where!="")
        {
            $where="WHERE ".$where;        
        }
        $order_query=$order_by;
        $select='*';
        $table_name='currency_id as P';
        $query = $this->db->query("select * from tbl_currency ".$where." group by currency_id ".$order_query." LIMIT  ".$offset." , ".$limit);
        return $query->result();
    }
    function currencyTotal($where,$order_by)
    { 
        if($where!="")
        {
            $where="WHERE ".$where;        
        }
        $order_query=$order_by;
        $select='count(currency_id) as product_count ';
        $table_name='tbl_currency as P';
        

        $select='count(DISTINCT(currency_id)) as product_count';
          
      
        $query = $this->db->query("select ".$select." from tbl_currency ".$where."  ");

        return $query->result();
    }
    function product_details($product_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_currency p');
        $this->db->where('currency_id',$product_id);
        $query=$this->db->get();
        return $query->result();
    }
   
    
  
    
   
    
   
   


}
?>
