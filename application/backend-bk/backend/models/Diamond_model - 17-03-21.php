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
        'limit_st'=>' LIMIT  1',
        'user_markup'=>0,
        'markup_type'=>'',
        'select_st'=>'color,country,cut_full,depth,diamond_id,diamond_image,diamond_video,fluor_full,grade,lab,lab_filter,lab_full,measurements,polish_full,report_filename,report_no,shade,shape,shape_filter,shape_full,stock_id,symmetry_full,table_d,cost_carat,total_price,weight,diamond_type,availability,new_discount,vendor_id,vendor_name,vendor_email,vendor_mobile,brand,br_comment,cn,sn,cw,sw,answerdate,memotootltip,origin,rapnet,girdle,eye_clean,culet,crown_ht,crown_angle,pavillion_depth,pavillion_angle, keytosymb,milky,m_length,m_width,m_depth,insp,report_dt,FL_USER_ACTIVE'
      );
      $query = $this->db->query("CALL p_diamond(?,?,?,?,?,?,?)",$data);
      mysqli_next_result($this->db->conn_id);
      
      return $query->result();
  }
  function diamond_count($where)
  {  
     $where=" WHERE ".$where." "; 
      $data=array(
        'where'=>$where,
        'user_markup'=>0
      );
      $query = $this->db->query("CALL p_diamond_count(?,?)",$data);   
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
        $order_query=" ORDER BY shape_sort ASC,clarity_sort ASC,weight_sort ASC ";
      }      
      $data=array(
        'where'=>$where,
        'group_by'=>$group_by,
        'order_query'=>$order_query,
        'limit_st'=>' LIMIT  '.$offset.' , '.$limit,
        'user_markup'=>0,
        'markup_type'=>'',
        'select_st'=>'color,country,cut_full,depth,diamond_id,diamond_image,diamond_video,fluor_full,grade,lab,lab_filter,lab_full,measurements,polish_full,report_filename,report_no,shade,shape,shape_filter,shape_full,stock_id,symmetry_full,table_d,cost_carat,total_price,weight,diamond_type,availability,new_discount,vendor_id,vendor_name,vendor_email,vendor_mobile,brand,br_comment,cn,sn,cw,sw,answerdate,memotootltip,origin,rapnet,girdle,eye_clean,culet,crown_ht,crown_angle,pavillion_depth,pavillion_angle, keytosymb,milky,m_length,m_width,m_depth,insp,report_dt,FL_USER_ACTIVE'
      );
      
      $query = $this->db->query("CALL p_diamond(?,?,?,?,?,?,?)",$data);
      mysqli_next_result($this->db->conn_id);
      
      return $query->result();
  }

}
