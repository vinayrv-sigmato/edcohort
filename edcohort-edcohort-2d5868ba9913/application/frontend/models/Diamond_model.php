<?php

class Diamond_model extends CI_Model {

  function diamond_list($where)
  {  
      $where=" WHERE ".$where." ";
      $group_by=" ";
      $order_query=" ";
     
      $data=array(
        'where'=>$where,
        'group_by'=>$group_by,
        'order_query'=>$order_query,
        'limit_st'=>' LIMIT  1'
      );
      $query = $this->db->query("CALL p_diamond(?,?,?,?)",$data);
      mysqli_next_result($this->db->conn_id);
      
      return $query->result();
  }   
  function diamond_count($where)
  {  
      $where=" WHERE ".$where." "; 
      $data=array(
        'where'=>$where
      );
      $query = $this->db->query("CALL p_diamond_count(?)",$data);   
      mysqli_next_result($this->db->conn_id);

      return $query->result();
  } 
  function diamond_list_limit($where,$limit='',$offset=0,$order='')
  {  
      $where=" WHERE ".$where." ";
      $group_by=" ";      
      if($order){
        $order_query=" ORDER BY ".$order;
      }else{
        $order_query=" ORDER BY shape_sort ASC,weight ASC";
      }      
      $data=array(
        'where'=>$where,
        'group_by'=>$group_by,
        'order_query'=>$order_query,
        'limit_st'=>' LIMIT  '.$offset.' , '.$limit
      );

      $query = $this->db->query("CALL p_diamond(?,?,?,?)",$data);
      mysqli_next_result($this->db->conn_id);
      
      return $query->result();
  }

  function diamond_price($vendor_id,$weight)
  { 

     $order_query="ORDER BY pricing_id ASC ";
     $select="*";
     $table_name='tbl_pricing as D';
     $where = "where vendor_id = '".$vendor_id."' and from_ct <= '".$weight."' and '".$weight."' <= to_ct ";
     $query = $this->db->query("select ".$select." from ".$table_name." ".$where." ".$order_query ." ");      
     return $query->result();

     //echo $this->db->last_query();

  }


  function diamond_currency()
  { 

     $select="*";
     $table_name='tbl_currency';
     $query = $this->db->query("select ".$select." from ".$table_name."  ");      
     return $query->result();

     //echo $this->db->last_query();

  }

  // function diamond_list_match($where,$limit='',$offset=0)
  // {  
  //     if($where!="")
  //     {
  //       $where="WHERE ".$where;
  //     }
  //     $order_query="ORDER BY shape_sort, color, clarity_sort ASC , weight_sort ASC ";
  //   $select="*, 
  //     rapnet - ((rapnet *  rapnet_discount) / 100) as cost_carat,      
  //      CASE (UPPER(`grade`))
  //       WHEN  'FL' THEN 'A' 
  //       WHEN 'IF' THEN 'B'
  //       WHEN 'VVS1' THEN 'C' 
  //       WHEN 'VVS2' THEN 'D'
  //       WHEN 'VS1' THEN 'E' 
  //       WHEN 'VS2' THEN 'F'
  //       WHEN 'SI1' THEN 'G' 
  //       WHEN 'SI2' THEN 'H'
  //       WHEN 'SI3' THEN 'I'
  //       WHEN 'I1' THEN 'J' 
  //       WHEN 'I2' THEN 'K' 
  //       WHEN 'I3' THEN 'L'
  //       ELSE 'Z' END 
  //       AS clarity_sort,
  //     CASE (UPPER(`shape`))
  //       WHEN 'ROUND' THEN 'A' 
  //       WHEN 'PRINCESS' THEN 'B'
  //       WHEN 'CUSHION' THEN 'C' 
  //       WHEN 'RADIANT' THEN 'D'
  //       WHEN 'ASSCHER' THEN 'E' 
  //       WHEN 'EMERALD' THEN 'F'
  //       WHEN 'OVAL' THEN 'G' 
  //       WHEN 'PEAR' THEN 'H'
  //       WHEN 'MARQUISE' THEN 'I'
  //       WHEN 'HEART' THEN 'J'
  //       ELSE 'Z' END 
  //       AS shape_sort,
  //      CASE   
  //       WHEN weight BETWEEN 0.01 AND .29 THEN 'A'
  //       WHEN weight BETWEEN 0.30 AND .39 THEN 'B'
  //       WHEN weight BETWEEN 0.40 AND .49 THEN 'C'
  //       WHEN weight BETWEEN 0.50 AND .59 THEN 'D'
  //       WHEN weight BETWEEN 0.60 AND .69 THEN 'E'
  //       WHEN weight BETWEEN 0.70 AND .79 THEN 'F'
  //       WHEN weight BETWEEN 0.80 AND .89 THEN 'G'
  //       WHEN weight BETWEEN 0.90 AND .99 THEN 'H'
  //       WHEN weight BETWEEN 1.00 AND 1.19 THEN 'I'
  //       WHEN weight BETWEEN 1.20 AND 1.49 THEN 'J'
  //       WHEN weight BETWEEN 1.50 AND 1.69 THEN 'K'
  //       WHEN weight BETWEEN 1.70 AND 1.99 THEN 'L'
  //       WHEN weight BETWEEN 2.00 AND 2.39 THEN 'M'
  //       WHEN weight BETWEEN 2.40 AND 2.99 THEN 'N'
  //       WHEN weight BETWEEN 3.00 AND 3.99 THEN 'O'
  //       WHEN weight BETWEEN 4.00 AND 4.99 THEN 'P'
  //       WHEN weight BETWEEN 5.00 AND 5.99 THEN 'Q'
  //       WHEN weight BETWEEN 6.00 AND 6.99 THEN 'R'
  //       WHEN weight BETWEEN 7.00 AND 25.99 THEN 'S'
  //       ELSE 'E' END
  //       AS weight_sort,
  //     CASE 
  //       WHEN (shape in ('B','BR','RB','RD','RBC','Round Brilliant','RND','ROUND')) THEN 'ROUND' 
  //       WHEN (shape in ('P','PS','PSH','PB','PMB','PEAR')) THEN 'PEAR' 
  //       WHEN (shape in ('E','EM','EC','EMERALD')) THEN 'EMERALD' 
  //       WHEN (shape in ('MQB','M','MQ','MARQUISE')) THEN 'MARQUISE' 
  //       WHEN (shape in ('A','CSS','CSSC','AC','AS','ASSCHER')) THEN 'ASSCHER' 
  //       WHEN (shape in ('CU','CUSHION','C','CUX','CUSH','CUSHIONBRILLIANT','CB','CUS','CUSHION' )) THEN 'CUSHION' 
  //       WHEN (shape in ('PRN','PR','PRIN','PN','PC','MDSQB','SMB','PRINCESS')) THEN 'PRINCESS' 
  //       WHEN (shape in ('H','HS','HT','MHRC','HEART')) THEN 'HEART' 
  //       WHEN (shape in ('O','OV','OMB','Oval','OVAL')) THEN 'OVAL' 
  //       WHEN (shape in ('R','RAD','RA','RC','RDN','CRMB','RADIANT','RN','RADIANT')) THEN 'RADIANT' 
  //       ELSE 'NA' END 
  //       AS `shape_full`,
  //      CASE 
  //       WHEN cut IN('EX','Excellent') THEN 'Excellent'
  //       WHEN cut IN('VG','Very Good') THEN 'Very Good'
  //       WHEN cut IN('G','GD','Good') THEN 'Good'
  //       WHEN cut IN('F','Fair') THEN 'Fair'
  //       ELSE 'NA' END
  //       AS cut_full,
  //      CASE 
  //       WHEN polish IN('EX','Excellent') THEN 'Excellent'
  //       WHEN polish IN('VG','Very Good') THEN 'Very Good'
  //       WHEN polish IN('G','GD','Good') THEN 'Good'
  //       WHEN polish IN('F','Fair') THEN 'Fair'
  //       ELSE 'NA' END
  //       AS polish_full,
  //      CASE 
  //       WHEN symmetry IN('EX','Excellent') THEN 'Excellent'
  //       WHEN symmetry IN('VG','Very Good') THEN 'Very Good'
  //       WHEN symmetry IN('G','GD','Good') THEN 'Good'
  //       WHEN symmetry IN('F','Fair') THEN 'Fair'
  //       ELSE 'NA' END
  //       AS symmetry_full, 
  //      CASE (UPPER(`fluorescence_int`))
  //       WHEN fluorescence_int IN('NON','None','N') THEN 'None'
  //       WHEN fluorescence_int IN('MED','Medium','M') THEN 'Medium'
  //       WHEN fluorescence_int IN('FNT','Faint','F') THEN 'Faint'
  //       WHEN fluorescence_int IN('STG','Strong','S') THEN 'Strong'
  //       WHEN fluorescence_int IN('VST','Very Strong') THEN 'Very Strong'
  //       ELSE 'NA' END
  //       AS fluor_full
  //     ";
  //     $table_name='tbl_diamond as D';
  //     $query = $this->db->query("select ".$select." from ".$table_name." ".$where." ".$order_query ." LIMIT  ".$offset." , ".$limit." ");
      
  //     return $query->result();
  // } 
  // function diamond_list_match1($where)
  // {  
  //     if($where!="")
  //     {
  //       $where="WHERE ".$where;
  //     }
  //     $order_query="ORDER BY shape_sort, color, clarity_sort ASC , weight_sort ASC ";
  //   $select="*, 
  //     rapnet - ((rapnet *  rapnet_discount) / 100) as cost_carat,      
  //      CASE (UPPER(`grade`))
  //       WHEN  'FL' THEN 'A' 
  //       WHEN 'IF' THEN 'B'
  //       WHEN 'VVS1' THEN 'C' 
  //       WHEN 'VVS2' THEN 'D'
  //       WHEN 'VS1' THEN 'E' 
  //       WHEN 'VS2' THEN 'F'
  //       WHEN 'SI1' THEN 'G' 
  //       WHEN 'SI2' THEN 'H'
  //       WHEN 'SI3' THEN 'I'
  //       WHEN 'I1' THEN 'J' 
  //       WHEN 'I2' THEN 'K' 
  //       WHEN 'I3' THEN 'L'
  //       ELSE 'Z' END 
  //       AS clarity_sort,
  //     CASE (UPPER(`shape`))
  //       WHEN 'ROUND' THEN 'A' 
  //       WHEN 'PRINCESS' THEN 'B'
  //       WHEN 'CUSHION' THEN 'C' 
  //       WHEN 'RADIANT' THEN 'D'
  //       WHEN 'ASSCHER' THEN 'E' 
  //       WHEN 'EMERALD' THEN 'F'
  //       WHEN 'OVAL' THEN 'G' 
  //       WHEN 'PEAR' THEN 'H'
  //       WHEN 'MARQUISE' THEN 'I'
  //       WHEN 'HEART' THEN 'J'
  //       ELSE 'Z' END 
  //       AS shape_sort,
  //      CASE   
  //       WHEN weight BETWEEN 0.01 AND .29 THEN 'A'
  //       WHEN weight BETWEEN 0.30 AND .39 THEN 'B'
  //       WHEN weight BETWEEN 0.40 AND .49 THEN 'C'
  //       WHEN weight BETWEEN 0.50 AND .59 THEN 'D'
  //       WHEN weight BETWEEN 0.60 AND .69 THEN 'E'
  //       WHEN weight BETWEEN 0.70 AND .79 THEN 'F'
  //       WHEN weight BETWEEN 0.80 AND .89 THEN 'G'
  //       WHEN weight BETWEEN 0.90 AND .99 THEN 'H'
  //       WHEN weight BETWEEN 1.00 AND 1.19 THEN 'I'
  //       WHEN weight BETWEEN 1.20 AND 1.49 THEN 'J'
  //       WHEN weight BETWEEN 1.50 AND 1.69 THEN 'K'
  //       WHEN weight BETWEEN 1.70 AND 1.99 THEN 'L'
  //       WHEN weight BETWEEN 2.00 AND 2.39 THEN 'M'
  //       WHEN weight BETWEEN 2.40 AND 2.99 THEN 'N'
  //       WHEN weight BETWEEN 3.00 AND 3.99 THEN 'O'
  //       WHEN weight BETWEEN 4.00 AND 4.99 THEN 'P'
  //       WHEN weight BETWEEN 5.00 AND 5.99 THEN 'Q'
  //       WHEN weight BETWEEN 6.00 AND 6.99 THEN 'R'
  //       WHEN weight BETWEEN 7.00 AND 25.99 THEN 'S'
  //       ELSE 'E' END
  //       AS weight_sort,
  //     CASE 
  //       WHEN (shape in ('B','BR','RB','RD','RBC','Round Brilliant','RND','ROUND')) THEN 'ROUND' 
  //       WHEN (shape in ('P','PS','PSH','PB','PMB','PEAR')) THEN 'PEAR' 
  //       WHEN (shape in ('E','EM','EC','EMERALD')) THEN 'EMERALD' 
  //       WHEN (shape in ('MQB','M','MQ','MARQUISE')) THEN 'MARQUISE' 
  //       WHEN (shape in ('A','CSS','CSSC','AC','AS','ASSCHER')) THEN 'ASSCHER' 
  //       WHEN (shape in ('CU','CUSHION','C','CUX','CUSH','CUSHIONBRILLIANT','CB','CUS','CUSHION' )) THEN 'CUSHION' 
  //       WHEN (shape in ('PRN','PR','PRIN','PN','PC','MDSQB','SMB','PRINCESS')) THEN 'PRINCESS' 
  //       WHEN (shape in ('H','HS','HT','MHRC','HEART')) THEN 'HEART' 
  //       WHEN (shape in ('O','OV','OMB','Oval','OVAL')) THEN 'OVAL' 
  //       WHEN (shape in ('R','RAD','RA','RC','RDN','CRMB','RADIANT','RN','RADIANT')) THEN 'RADIANT' 
  //       ELSE 'NA' END 
  //       AS `shape_full`,
  //      CASE 
  //       WHEN cut IN('EX','Excellent') THEN 'Excellent'
  //       WHEN cut IN('VG','Very Good') THEN 'Very Good'
  //       WHEN cut IN('G','GD','Good') THEN 'Good'
  //       WHEN cut IN('F','Fair') THEN 'Fair'
  //       ELSE 'NA' END
  //       AS cut_full,
  //      CASE 
  //       WHEN polish IN('EX','Excellent') THEN 'Excellent'
  //       WHEN polish IN('VG','Very Good') THEN 'Very Good'
  //       WHEN polish IN('G','GD','Good') THEN 'Good'
  //       WHEN polish IN('F','Fair') THEN 'Fair'
  //       ELSE 'NA' END
  //       AS polish_full,
  //      CASE 
  //       WHEN symmetry IN('EX','Excellent') THEN 'Excellent'
  //       WHEN symmetry IN('VG','Very Good') THEN 'Very Good'
  //       WHEN symmetry IN('G','GD','Good') THEN 'Good'
  //       WHEN symmetry IN('F','Fair') THEN 'Fair'
  //       ELSE 'NA' END
  //       AS symmetry_full, 
  //      CASE (UPPER(`fluorescence_int`))
  //       WHEN fluorescence_int IN('NON','None','N') THEN 'None'
  //       WHEN fluorescence_int IN('MED','Medium','M') THEN 'Medium'
  //       WHEN fluorescence_int IN('FNT','Faint','F') THEN 'Faint'
  //       WHEN fluorescence_int IN('STG','Strong','S') THEN 'Strong'
  //       WHEN fluorescence_int IN('VST','Very Strong') THEN 'Very Strong'
  //       ELSE 'NA' END
  //       AS fluor_full
  //     ";
  //     $table_name='tbl_diamond as D';
  //     $query = $this->db->query("select ".$select." from ".$table_name." ".$where." ".$order_query );
      
  //     return $query->result();
  // }

}
