<?php

class Diamond_model extends CI_Model {

  function diamond_list($where)
  {  
      $pQuery = $this->db->query("SELECT markup FROM tbl_pricing WHERE type ='diamond' AND markup_type ='percent' ");
      $pResult = $pQuery->result();
      $user_markup = (@$pResult['0']->markup) ? $pResult['0']->markup : 0;

      $where=" WHERE ".$where." ";
      $group_by=" ";
      $order_query=" ";
     
      $data=array(
        'where'=>$where,
        'group_by'=>$group_by,
        'order_query'=>$order_query,
        'limit_st'=>' LIMIT  1',
        'user_markup'=>$user_markup,
        'markup_type'=>'',
        'select_st'=>'color,country,cut_full,depth,diamond_id,diamond_image,diamond_video,fluor_full,grade,lab,lab_filter,lab_full,measurements,polish_full,report_filename,report_no,shade,shape,shape_filter,shape_full,stock_id,symmetry_full,table_d,total_price,weight'
      );
      $query = $this->db->query("CALL p_diamond(?,?,?,?,?,?,?)",$data);
      mysqli_next_result($this->db->conn_id);
      
      return $query->result();
  }
  function diamond_count($where)
  {  
      $pQuery = $this->db->query("SELECT markup FROM tbl_pricing WHERE type ='diamond' AND markup_type ='percent' ");
      $pResult = $pQuery->result();
      $user_markup = (@$pResult['0']->markup) ? $pResult['0']->markup : 0;

      $where=" WHERE ".$where." "; 
      $data=array(
        'where'=>$where,
        'user_markup'=>$user_markup
      );
      $query = $this->db->query("CALL p_diamond_count(?,?)",$data);   
      mysqli_next_result($this->db->conn_id);

      return $query->result();
  }
  function diamond_list_limit($where,$limit='',$offset=0,$order='')
  {  
      $pQuery = $this->db->query("SELECT markup FROM tbl_pricing WHERE type ='diamond' AND markup_type ='percent' ");
      $pResult = $pQuery->result();
      $user_markup = (@$pResult['0']->markup) ? $pResult['0']->markup : 0;

      $where=" WHERE ".$where." ";
      $group_by=" ";      
      if($order){
        $order_query=" ORDER BY ".$order;
      }else{
        $order_query=" ORDER BY shape_sort ASC,clarity_sort ASC,weight_sort ASC ";
      }      
      $data=array(
        'where'=>$where,
        'group_by'=>$group_by,
        'order_query'=>$order_query,
        'limit_st'=>' LIMIT  '.$offset.' , '.$limit,
        'user_markup'=>$user_markup,
        'markup_type'=>'',
        'select_st'=>'color,country,cut_full,depth,diamond_id,diamond_image,diamond_video,fluor_full,grade,lab,lab_filter,lab_full,measurements,polish_full,report_filename,report_no,shade,shape,shape_filter,shape_full,stock_id,symmetry_full,table_d,total_price,weight'
      );
      $query = $this->db->query("CALL p_diamond(?,?,?,?,?,?,?)",$data);
      mysqli_next_result($this->db->conn_id);
      
      return $query->result();
  }

}
