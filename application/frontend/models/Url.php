<?php
class url extends CI_Model {
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
  	function slug($id)
  	{
    		//echo $id;exit;
    		$this->db->select('slug','page_title');
    		$this->db->from('tbl_app_routes');
    		$this->db->where('id',$id);
    		$query=$this->db->get();
    		$result=$query->result();
    		$slug=$result[0]->slug;
    		return $slug;
  	}
  	function page_title($id)
    {
        $this->db->select('page_title');
        $this->db->from('tbl_app_routes');
        $this->db->where('slug',$id);
        $query=$this->db->get();
        $result=$query->result();
        $slug=@$result[0]->page_title;
        return $slug;
    }
    function meta_key($id)
    {
        $this->db->select('meta_keyword');
        $this->db->from('tbl_app_routes');
        $this->db->where('slug',$id);
        $query=$this->db->get();
        $result=$query->result();
        $slug=@$result[0]->meta_keyword;
        return $slug;
    }
    function meta_desc($id)
    {
        $this->db->select('meta_description');
        $this->db->from('tbl_app_routes');
        $this->db->where('slug',$id);
        $query=$this->db->get();
        $result=$query->result();
        $slug=@$result[0]->meta_description;
        return $slug;
    }
    function canonical($id)
    {
        $this->db->select('canonical');
        $this->db->from('tbl_app_routes');
        $this->db->where('slug',$id);
        $query=$this->db->get();
        $result=$query->result();
        $slug=@$result[0]->canonical;
        return $slug;
    }
  	function make_slug($string)
  	{
    		//Unwanted:  {UPPERCASE} ; / ? : @ & = + $ , . ! ~ * ' ( )
    		$string = strtolower($string);
    		//Strip any unwanted characters
    		$string = preg_replace("/[^a-z0-9_\s-]/", " ", $string);
    		//Clean multiple dashes or whitespaces
    		$string = preg_replace("/[\s-]+/", "-", $string);
    		//Convert whitespaces and underscore to dash
    		$string = preg_replace("/[\s_]/", "-", $string);
    		//$string =substr_replace($string ,"",-1);//Last dashes remove
    		return $string;
  	}
}
?>
