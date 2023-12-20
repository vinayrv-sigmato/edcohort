<?php
class Review_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    function getProductReviewLimit($where,$limit='',$offset=0)
    {
        if($where!=""){        
          $where="WHERE ".$where;
        }
        $query=$this->db->query("SELECT pr.*,c.firstname,c.lastname,p.product_name,p.product_slug,b.brand_name,p.product_type,cl.title FROM tbl_product_review as pr 
          join tbl_product as p ON pr.product_id=p.product_id 
          join tbl_customer as c ON pr.user_id=c.customer_id
		  join tbl_brand as b ON pr.brand_id=b.brand_id
		  join tbl_class as cl ON p.class_id=cl.class_id
		  ".$where." order by product_review_id desc limit ".$offset." , ".$limit);
        return $query->result();  
    }
	
	
    function getProductReview($where)
    {
        if($where!=""){        
          $where="WHERE ".$where;
        }
        $query=$this->db->query("SELECT pr.*,c.firstname,c.lastname,p.product_name,p.product_slug,b.brand_name,p.product_type,cl.title FROM tbl_product_review as pr 
          join tbl_product as p ON pr.product_id=p.product_id 
          join tbl_customer as c ON pr.user_id=c.customer_id
		  join tbl_brand as b ON pr.brand_id=b.brand_id
		  join tbl_class as cl ON p.class_id=cl.class_id
		  ".$where." order by product_review_id DESC");
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
	
	 function getProductReviewReply($where)
    {
        if($where!=""){        
          $where="WHERE ".$where;
        }
        $query=$this->db->query("SELECT prr.*,c.firstname,c.lastname,c.email,c.phone,p.product_name,p.product_slug,pr.product_rating,pr.product_review_title,pr.product_review,b.brand_name,p.product_type,cl.title FROM tbl_product_review_reply as prr 
		  join tbl_product_review as pr ON prr.review_id=pr.product_review_id
		  join tbl_product as p ON prr.product_id=p.product_id 
          join tbl_customer as c ON prr.user_id=c.customer_id 
          join tbl_brand as b ON p.brand_id=b.brand_id
          join tbl_class as cl ON p.class_id=cl.class_id
          ".$where." order by product_review_id DESC");
        return $query->result();  
    }
   
   

}
?>
