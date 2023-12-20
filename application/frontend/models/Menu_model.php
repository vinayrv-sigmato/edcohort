<?php

class Menu_model extends CI_Model {
  
  function get_menu() {
      $query = $this->db->query(" SELECT max(block) as count FROM tbl_menu where is_active='1' ");
      $result = $query->result();
      $count = $result['0']->count;
      $menu = "";

      $query=$this->db->query(" SELECT label,menu_id FROM tbl_menu where is_active='1' and parent_id='0' order by sort asc");
      $result = $query->result();

      foreach ($result as $row) 
      {
          $menu .= '<li class="dropdown">';
          $menu .= '  <a class="dropdown-toggle" data-toggle="dropdown" href="#">'.$row->label.'</a>';
          $menu .= '  <ul class="dropdown-menu">';
          $menu .= '     <li>';
          $menu .= '        <div class="container-fluid">';
          $menu .= '          <div class="col-sm-12 col-12 col-md-12 subnav-item item-first">';
          $menu .= '            <ul class="no-padding mega-menu">';
          for ($i=1; $i <= $count; $i++) { 
              $menu .= '<li>';
              $menu .= $this->get_menu_tree($row->menu_id,$i);
              $menu .= '</li>';
          }
          $menu .= '            </ul>';
          $menu .= '          </div>';
          $menu .= '        </div>';
          $menu .= '     </li>';
          $menu .= '  </ul>';
          $menu .= '</li>';
      }

      echo $menu;
  }
  function get_menu_tree($parent_id,$block="") 
  {
      $menu = "";
      if($block) {
         $block = 'and block='.$block;
      }
      $query=$this->db->query(" SELECT link,category_id,css_class,label,menu_id FROM tbl_menu where is_active='1' and parent_id='" .$parent_id . "' ".$block." order by sort asc");
      $result = $query->result();
      $count_result=count($result);

      if($count_result) {
        $menu .= "<ul>";
      }      
      foreach ($result as $row) {
          $link='';
          if($row->link) {
            $link = $row->link;
          } else if($row->category_id) {
              $menu_link = $this->get_menu_link($row->category_id);
              $menu_link = explode('/', $menu_link);
              $menu_link = array_reverse(array_filter($menu_link));
              $menu_link = "/" .implode('/', $menu_link);
              $link = base_url()."jewelry".$menu_link;
          }
          $menu .= "<li ><a href='".$link."' class='".$row->css_class."'>".$row->label."</a>";           
          $menu .= $this->get_menu_tree($row->menu_id,'');        
          $menu .= "</li>";     
      }      
      if($count_result) {
        $menu .= "</ul>";
      }
      return $menu;
  } 
  function get_menu_link($category_id) 
  {
      $menu = "";
      $query=$this->db->query(" SELECT c.parent_category,category_slug FROM tbl_category c
                                join tbl_category_description cd on  cd.category_id=c.category_id
                                where c.category_id = '" .$category_id . "'");
      $result = $query->result();
  
      foreach ($result as $row) {
          $menu .= "/" . $row->category_slug;
          if($row->parent_category) {
            $menu .= $this->get_menu_link($row->parent_category);
          } 
      }    

      return $menu;
  } 
  
  

}
