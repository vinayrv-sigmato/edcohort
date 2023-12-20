<?php
class Ranking_model extends CI_Model {
  function jewelry_list_limit($where,$limit='',$offset=0,$order='')
  {  
      if($where!=""){        
        $where="WHERE ".$where;
      }      
      if($order!=""){
        $order_query="ORDER BY ".$order;
      }
      else{
        $order_query="ORDER BY product_id ";
      }
      //$select='P.*,PC.*,C.*,CD.*,PA.*,A.*,U.CD_USER_ID,U.NM_USER_FULLNAME,UD.NM_FOLDER_NAME';
      // $select='P.product_id,product_name,product_image,product_model,manufacturer_id,product_brand,product_sku,product_description,product_condition,product_condition_note,product_country,product_price,product_sale_price,product_sale_allow,product_sale_start,product_sale_end,product_quantity,product_minimum_quantity,product_maximum_quantity,product_subtract_stock,product_launch,product_release,product_rating,product_view,product_status,NM_FOLDER_NAME';
      // $table_name='tbl_product as P';     
      $query = $this->db->query("select * from v_product ".$where." group by product_name  ".$order_query." LIMIT  ".$offset." , ".$limit);
      return $query->result();
  }
  function jewelry_list($where)
  { 
      if($where!=""){        
        $where="WHERE ".$where;
      }      
      // if($order!=""){
      //   $order_query="ORDER BY ".$order;
      // }
      // else{
      //   $order_query="ORDER BY product_id ";
      // }
      //$select='P.*,U.CD_USER_ID,U.NM_USER_FULLNAME,UD.NM_FOLDER_NAME';
      // $select='P.product_id,product_name,product_image,product_model,manufacturer_id,product_brand,product_sku,product_description,
      // product_condition,product_condition_note,product_country,product_price,product_sale_price,product_sale_allow,product_sale_start,
      // product_sale_end,product_quantity,product_minimum_quantity,product_maximum_quantity,product_subtract_stock,product_launch,
      // product_release,product_rating,product_view,product_status,NM_FOLDER_NAME,category_name,
      // case when product_sale_price > 0 then product_sale_price
      // else product_price
      // end as price_filter';
      // $table_name='tbl_product as P';     
      $query = $this->db->query("select * from v_product ".$where." group by product_name ");
      return $query->result();
  }
  function jewelry_Ranking($where)
  { 
      if($where!="")
      {
        $where="WHERE ".$where;
      }
      $order_query="ORDER BY product_id ";
      //$select='P.*,U.CD_USER_ID,U.NM_USER_FULLNAME,UD.NM_FOLDER_NAME';
      //$select='P.product_id,product_name,product_image,product_model,manufacturer_id,product_brand,product_sku,product_description,product_condition,product_condition_note,product_country,product_price,product_sale_price,product_sale_allow,product_sale_start,product_sale_end,product_quantity,product_minimum_quantity,product_maximum_quantity,product_subtract_stock,product_launch,product_release,product_rating,product_view,product_status,NM_FOLDER_NAME';
      //$table_name='tbl_product as P';     
      $query = $this->db->query("select * from v_product ".$where." group by product_name ".$order_query." ");
      return $query->result();
  }
  function jewelry_attribute($where)
  { 
      if($where!=""){
        $where="WHERE ".$where;
      }
      $select='*';
      $table_name='tbl_product_attribute as PA';     
      $query = $this->db->query("select ".$select." from ".$table_name."        
        join tbl_attribute as A on PA.attribute_id=A.attribute_id
          ".$where." ");
      return $query->result();
  }
  function jewelry_option($where)
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
  function jewelry_count($where)
  {
      if($where!=""){        
        $where="WHERE ".$where;
      }
      $select='count(DISTINCT(product_id)) as product_count';
      //$table_name='tbl_product as P';   
      $query = $this->db->query("select ".$select." from v_product ".$where."  ");
      return $query->result();
  }
  function pro_cat($where)
  { 
      if($where!=""){
        $where="WHERE ".$where;
      }     
      $query = $this->db->query("select * from tbl_product_category as PC        
        right join tbl_addons_category as AC on PC.category_id=AC.category_id
          ".$where." group by addons_id");
      return $query->result();
  }
  function get_subcategory($category)
  {
      $this->db->select('sub_category');
      $this->db->from('tbl_jewelry');
      $this->db->group_by('sub_category'); 
      $this->db->where('category',$category);
      $query=$this->db->get();
      return $query->result();      
  }
  function get_filter($column,$table,$where='')
  {
      $this->db->select($column);
      $this->db->from($table);
      $this->db->group_by($column); 
      $this->db->where($column.'!='," ");
      if($where!="")
      {
         $this->db->where($where); 
      } 
      $query=$this->db->get();
      return $query->result();
  }
  function variation_price($where)
  {      
      if($where!=""){        
        $where="WHERE ".$where;
      }
      $query = $this->db->query("SELECT PPV.variation_id,variation_price,product_id,variation_attributes_name,variation_attributes_value 
        FROM tbl_product_price_variation as PPV 
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
  function product_addons($where)
  {      
      if($where!=""){        
        $where="WHERE ".$where;
      }
      $query = $this->db->query("SELECT * FROM tbl_product_category as PC 
        join tbl_addons_category as AC on PC.category_id=AC.category_id 
        join tbl_addons as A on A.addons_id=A.addons_id 
        join tbl_addons_group as AG on A.addons_id=AG.addons_id 
        join tbl_addons_value as AV on AG.addons_group_id=AV.addons_group_id 
      ".$where." ");
      return $query->result();
  }
  function get_category_id($where)
  {
      if($where!=""){        
        $where="WHERE ".$where;
      }
      $query = $this->db->query("SELECT * FROM tbl_category as C 
        join tbl_category_description as CD on C.category_id=CD.category_id ".$where." ");
      return $query->result();      
  }
  function getProductFilter($where){
    if($where!=""){        
        $where="WHERE ".$where;
    }
    $query= $this->db->query("SELECT `value` FROM `v_product` ".$where." GROUP BY value");
    return $query->result();      
  }
  function getProductRankingLimit($where,$limit='',$offset=0)
  {
      if($where!=""){        
        $where="WHERE ".$where;
      }
      $query=$this->db->query("SELECT pr.*,c.firstname,c.lastname,b.brand_name,cl.title FROM tbl_product_Ranking as pr 
        join tbl_brand as b ON pr.brand_id=b.brand_id 
        join tbl_class as cl ON pr.class_id=cl.class_id 
        join tbl_customer as c ON pr.user_id=c.customer_id  ".$where." order by c_id desc limit ".$offset." , ".$limit);
        return $query->result();  
  }
  function getProductRanking($where)
  {
      if($where!=""){        
        $where="WHERE ".$where;
      }
      $query=$this->db->query("SELECT pr.*,c.firstname,c.lastname,c.image FROM tbl_product_Ranking as pr 
        join tbl_customer as c ON pr.user_id=c.customer_id ".$where."");
      return $query->result();  
  }
  function getProductRankingCount($where)
  {
      if($where!=""){        
        $where="WHERE ".$where;
      }
      $query=$this->db->query("SELECT count(product_id) as Ranking_count FROM tbl_product_Ranking as pr ".$where."");
      return $query->result();  
  }
  function getProductRankingSum($where)
  {
      if($where!=""){        
        $where="WHERE ".$where;
      }
      $query=$this->db->query("SELECT SUM(product_rating) as Ranking_sum FROM tbl_product_Ranking as pr ".$where."");
      return $query->result();  
  }
  function getRanking($where)
 {
    $this->db->select('*');
    $this->db->from('tbl_product_Ranking as PR');
    $this->db->join('tbl_customer', 'tbl_customer.customer_id = PR.user_id');
    $this->db->where($where);
	$this->db->order_by('product_id','DESC');
    $query = $this->db->get();
    return $query->result();
   // echo $this->db->last_query(); die;
 }
 
 	function selectJointwoorderby($table1,$column1,$table2,$column2,$where,$col,$condition)
	{
			$this->db->select('*');
			$this->db->from($table1);
			$this->db->join($table2, $table1.'.'.$column1.' = '.$table2.'.'.$column2);
			$this->db->where($where);
			$this->db->order_by($col,$condition);
			$query=$this->db->get();
			return $query->result();
	}
	
	
	function count_total_rating($id = NULL) {
    $this->db->select('ROUND(AVG(product_rating)) as average');
    $this->db->where('product_id', $id);
    $this->db->from('tbl_product_Ranking');
    $query = $this->db->get();
	return $query->result();
	}
	
	function rating_total($id,$star = NULL)
  {
	  if($id!=""){        
        $where="product_id = ".$id;
      }
	  if($star!=""){        
        $where.=" AND product_rating = ".$star;
      }      
      $query = $this->db->query("SELECT SUM(product_rating) as total FROM tbl_product_Ranking where ".$where."");     
      return $query->result();
  } 
  
   function Ranking_search_count($where)
  {
      if($where!=""){        
        $where="WHERE product_id = ".$where;
      }
      $select='count(product_id) as Ranking_count';
      //$table_name='tbl_product as P';   
      $query = $this->db->query("select ".$select." from tbl_product_Ranking_search ".$where."  ");
      return $query->result();
  }

  
  function getbrand_ranking($where)
  {
      if($where!=""){        
        $where="WHERE ".$where;
      }
      $query=$this->db->query("SELECT pr.*,c.title,b.brand_name FROM tbl_rank_brand_wise as pr 
        join tbl_class as c ON pr.class_id=c.class_id 
        join tbl_brand as b ON pr.brand_id=b.brand_id 
        ".$where." GROUP by pr.brand_id");
      return $query->result();  
  }

  function get_lastmonthranking($where,$class_id = NULL)
  {
      if($where!=""){        
        $where="WHERE month(date_added)=month(now())-1 and brand_id =".$where;
      }
      if(!empty($class_id)){
         $where.=" AND class_id = ".$class_id;
      }
      $query=$this->db->query("SELECT rank FROM tbl_rank_brand_wise ".$where."");
      return $query->result();  
  }

  function get_currentmonthranking($where,$class_id = NULL)
  {
      if($where!=""){        
        $where="WHERE MONTH(date_added) = MONTH(CURRENT_DATE())
        AND YEAR(date_added) = YEAR(CURRENT_DATE()) and brand_id =".$where;
      }
      if(!empty($class_id)){
         $where.=" AND class_id = ".$class_id;
      }
      $query=$this->db->query("SELECT rank FROM tbl_rank_brand_wise ".$where." group by brand_id order by rbw_id DESC ");
      return $query->result();  
  }
	
}
