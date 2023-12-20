<?php
class Banner_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    function product_list($where,$order_by)
    {
        if($where!="")
        {
            $where="WHERE ".$where;        
        }
        $order_query=$order_by;
        $select='*';
        $table_name='home_slider_id as P';
        $query = $this->db->query("select * from tbl_home_slider ".$where." group by home_slider_id ".$order_query."");
        return $query->result();
    }
    function bannerTotal($where,$order_by)
    { 
        if($where!="")
        {
            $where="WHERE ".$where;        
        }
        $order_query=$order_by;
        $select='count(home_slider_id) as product_count ';
        $table_name='tbl_home_slider as P';
        

        $select='count(DISTINCT(home_slider_id)) as product_count';
          
      
        $query = $this->db->query("select ".$select." from tbl_home_slider ".$where."  ");

        return $query->result();
    }
    function product_details($product_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_home_slider p');
        $this->db->where('home_slider_id',$product_id);
        $query=$this->db->get();
        return $query->result();
    }
   
    
  
    
   
    
   
   


}
?>
