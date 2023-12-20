<?php
class menu_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    function get_menu_tree($parent_id,$block="") 
    {
          $menu = "";
          if($block){
             $block = 'and block='.$block;
          }
          $query=$this->db->query(" SELECT * FROM tbl_menu where parent_id='" .$parent_id . "' ".$block." order by sort asc");
          $result = $query->result();
          $count_result=count($result);


          if($count_result){
            $menu .= "<ul>";
          }      
          foreach ($result as $row) {
              $link='';
              if($row->link){
                $link = $row->link;
              }else if($row->category_id){
                $link = "/jewelry".$this->get_menu_link($row->category_id);
              }
              $status = ($row->is_active) ? 'active' : 'inactive';
                                                          
              $menu .= "<div class='panel' >";           
              $menu .= "<li id='menu_row_id_".$row->menu_id."'>";           
              $menu .= "<input type='checkbox' class='multi-chk-complete' id='basic_".$row->menu_id."' name='chk_status' value='".$row->menu_id."' onclick='get_category(this.value,this.checked)' />";   
              $menu .= "<label for='basic_".$row->menu_id."'>".$row->label."</label>";           
              $menu .=" <a role='button' data-toggle='collapse' data-parent='#accordion_".$row->menu_id."' href='#collapseOne_".$row->menu_id."' aria-expanded='false' aria-controls='collapseOne_".$row->menu_id."' class='collapsed'>
                          Edit </a>";              
              $menu .= ' <strong id="status_'.$row->menu_id.'">'.$status.'</strong>';  
              $menu .= "</li>";  

              $menu .= '<div id="collapseOne_'.$row->menu_id.'" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne_'.$row->menu_id.'" aria-expanded="false" style="height: 0px;">
                    <div class="panel-body">
                      <div class="col-lg-8 col-md-8 col-sm-8 col-12">
                        <form class="form-horizontal" action="'.base_url().'admin_menu/edit_menu_submit" id="main" method="post" >';
                           if ($row->link){ 
                            $menu .= '<div class="row clearfix">                                                      
                                <div class="col-lg-4 col-md-4 col-sm-6 col-12 form-control-label">
                                    <label for="">URL</label>
                                </div>
                                <div class="col-lg-8 col-md-8 col-sm-6 col-12">
                                    <div class="form-group">
                                        <div class="form-line ">
                                            <input type="text" class="form-control" required="" value="'.$row->link.'" name="url" id="url">
                                        </div>
                                    </div>
                                </div>
                            </div>';
                           } 
                          $menu .= '<div class="row clearfix">
                              <div class="col-lg-4 col-md-4 col-sm-6 col-12 form-control-label">
                                  <label for="">Link Text / Label</label>
                              </div>
                              <div class="col-lg-8 col-md-8 col-sm-6 col-12">
                                  <div class="form-group">
                                      <div class="form-line ">
                                          <input type="text" class="form-control" required="" value="'.$row->label.'" name="url_text" id="url_text">
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="row clearfix">
                              <div class="col-lg-4 col-md-4 col-sm-6 col-12 form-control-label">
                                  <label for="">Sort</label>
                              </div>
                              <div class="col-lg-8 col-md-8 col-sm-6 col-12">
                                  <div class="form-group">
                                      <div class="form-line ">
                                          <input type="text" class="form-control" required="" value="'.$row->sort.'" name="sort" id="sort">
                                      </div>
                                  </div>
                              </div>
                          </div>                                                  
                          <div class="row clearfix">
                              <div class="col-lg-4 col-md-4 col-sm-6 col-12 form-control-label">
                                  <label for="">Block / Segment</label>
                              </div>
                              <div class="col-lg-8 col-md-8 col-sm-6 col-12">
                                  <div class="form-group">
                                      <div class="form-line ">
                                          <input type="text" class="form-control" required="" value="'.$row->block.'" name="block" id="block">
                                      </div>
                                  </div>
                              </div>
                          </div>                                                  
                          <div class="row clearfix">
                              <div class="col-lg-4 col-md-4 col-sm-6 col-12 form-control-label">
                                  <label for="">Css Class</label>
                              </div>
                              <div class="col-lg-8 col-md-8 col-sm-6 col-12">
                                  <div class="form-group">
                                      <div class="form-line ">
                                          <input type="text" class="form-control" required="" value="'.$row->css_class.'" name="css_class" id="css_class">
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <input type="hidden" name="menu_id" id="menu_id" value="'.$row->menu_id.'">
                          <div class="row clearfix">
                              <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 pull-right">
                                  <button type="submit" class="btn bg-teal btn-block btn-lg waves-effect" >Edit</button>
                              </div>
                          </div>
                        </form>
                        </div>
                    </div>
                </div>';
                $menu .= $this->get_menu_tree($row->menu_id,''); 

              $menu .= "</div>";     
          }      
          if($count_result){
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
    function get_category()
    {
        $this->db->select('*');
        $this->db->from('tbl_category c');
        $this->db->join('tbl_category_description dc','c.category_id=dc.category_id');
        //$this->db->join('tbl_category_commission cc','c.category_id=cc.category_id');
        
        $query=$this->db->get();
        return $query->result();
    }
    function get_category_detail($category_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_category c');
        $this->db->join('tbl_category_description dc','c.category_id=dc.category_id');
        //$this->db->join('tbl_category_commission cc','c.category_id=cc.category_id');
        $this->db->where('c.category_id',$category_id);
        $query=$this->db->get();
        return $query->result();
    }
    function get_parent_category()
    {
        $this->db->select('*');
        $this->db->from('tbl_category c');
        $this->db->join('tbl_category_description dc','c.category_id=dc.category_id');
        //$this->db->join('tbl_category_commission cc','c.category_id=cc.category_id');
        $this->db->where('c.parent_category','0');
        $this->db->where('c.sub_category','0');
        $this->db->order_by('c.category_sort_order','asc');
        $query=$this->db->get();
        return $query->result();
    }
    function get_sub_category($parent_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_category c');
        $this->db->join('tbl_category_description dc','c.category_id=dc.category_id');
        //$this->db->join('tbl_category_commission cc','c.category_id=cc.category_id');
        $this->db->where('c.parent_category ',$parent_id);
        $this->db->where('c.sub_category','0');
        $this->db->order_by('c.category_sort_order','asc');
        $query=$this->db->get();
        if($parent_id==0)
        {
          return array();
        }
        else
        {
          return $query->result();
        }

    }
}
?>
