<?php
class product_model extends CI_Model
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
        //$select='*';
       // $table_name='tbl_product as P';
        // $query = $this->db->query("select ".$select." from ".$table_name." 
        //      join tbl_user as U on P.seller_id=U.CD_USER_ID
        //  ".$where." ".$order_query." LIMIT  ".$offset." , ".$limit." ");
        //$query = $this->db->query("select * from v_product ".$where." group by product_id ".$order_query."");
        
        $query = $this->db->query("select * from tbl_product ".$where." group by product_id ".$order_query."");
        if($query)
        {
            return $query->result(); 
        }
        
      //  return $query->result();
    }
    function productTotal($where,$order_by)
    { 
        if($where!="")
        {
            $where="WHERE ".$where;        
        }
        $order_query=$order_by;
        $select='count(product_id) as product_count ';
        $table_name='tbl_product as P';
        //$query = $this->db->query("select ".$select." from ".$table_name." ".$where." ".$order_query." ");

        $select='count(DISTINCT(product_id)) as product_count';
        //$table_name='tbl_product as P';   
      
        $query = $this->db->query("select ".$select." from v_product ".$where."  ");

        return $query->result();
    }
    function product_details($product_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_product p');
        $this->db->join('tbl_product_description pd','p.product_id=pd.product_id');
        //$this->db->join('tbl_product_shipping ps','p.product_id=ps.product_id');
        //$this->db->join('tbl_manufacturer m','p.manufacturer_id=m.manufacturer_id');
        $this->db->join('tbl_brand b','p.product_brand=b.brand_id');
        $this->db->where('p.product_id',$product_id);
        $query=$this->db->get();
        return $query->result();
    }
    function product_option($where)
    { 
      if($where!=""){
        $where="WHERE ".$where;
      }
      $select='*';
      $table_name='tbl_product_option as PO';     
      $query = $this->db->query("select ".$select." from ".$table_name."        
        join tbl_option as A on PO.option_id=A.option_id
        
          ".$where." ");
      return $query->result();
    }
    function getProductSlug($where)
    { 
      if($where!=""){
        $where="WHERE ".$where;
      }
      $select='P.product_id,P.product_name,P.product_slug';
      $table_name='tbl_product as P';     
      $query = $this->db->query("select ".$select." from ".$table_name." ".$where." ");
      return $query->result();
    }

    function getProductReviewLimit($where,$limit='',$offset=0)
    {
        if($where!=""){        
          $where="WHERE ".$where;
        }
        $query=$this->db->query("SELECT pr.*,c.firstname,c.lastname,p.product_name,p.product_slug FROM tbl_product_review as pr 
          join tbl_product as p ON pr.product_id=p.product_id 
          join tbl_customer as c ON pr.user_id=c.customer_id  ".$where." order by product_review_id desc limit ".$offset." , ".$limit);
        return $query->result();  
    }
	
	
    function getProductReview($where)
    {
        if($where!=""){        
          $where="WHERE ".$where;
        }
        $query=$this->db->query("SELECT pr.*,c.firstname,c.lastname,p.product_name,p.product_slug FROM tbl_product_review as pr 
          join tbl_product as p ON pr.product_id=p.product_id 
          join tbl_customer as c ON pr.user_id=c.customer_id ".$where." order by product_review_id DESC");
        return $query->result();  
    }
    function getProductReviewCount($where)
    {
        if($where!=""){        
          $where="WHERE ".$where;
        }
        $query=$this->db->query("SELECT count(p.product_id) as review_count FROM tbl_product_review as pr 
           join tbl_product as p ON pr.product_id=p.product_id
          ".$where."");
        return $query->result();  
    }
    function getProductReviewSum($where)
    {
        if($where!=""){        
          $where="WHERE ".$where;
        }
        $query=$this->db->query("SELECT SUM(product_rating) as review_sum FROM tbl_product_review as pr ".$where."");
        return $query->result();  
    }
    function variation_price($where)
    {      
        if($where!=""){        
          $where="WHERE ".$where;
        }
        $query = $this->db->query("SELECT * FROM tbl_product_price_variation as PPV 
          join tbl_product_price_variation_attributes as PPVA 
          on PPV.variation_id=PPVA.variation_id        
        ".$where." ");
       
        return $query->result();
    } 
    function variation_price_min($where)
    {      
        if($where!=""){        
          $where="WHERE ".$where;
        }
        $query = $this->db->query("SELECT MIN(variation_price) as min_price FROM tbl_product_price_variation as PPV ".$where." ");     
        return $query->result();
    } 
    function variation_price_max($where)
    {      
        if($where!=""){        
          $where="WHERE ".$where;
        }
        $query = $this->db->query("SELECT MAX(variation_price) as max_price FROM tbl_product_price_variation as PPV ".$where." ");     
        return $query->result();
    }


}
?>
