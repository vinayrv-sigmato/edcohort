<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    function print_pre($data)
    { 
      echo "<pre>";print_r($data);echo "</pre>";       
    }  
    function print_ex($data)
    { 
      echo "<pre>";print_r($data);echo "</pre>";exit();       
    }   
    function csrf()
    { 
      $ci =& get_instance();
      $csrf = array(
            'name' => $ci->security->get_csrf_token_name(),
            'hash' => $ci->security->get_csrf_hash()
            );      
      return '<input type="hidden" name="'.$csrf['name'].'" value="'.$csrf['hash'].'" />';       
    }
    function message()
    {
        $html="";
        $ci =& get_instance();
        if($ci->session->flashdata('alert')){ 
            $html.='<div class="row">';
            $html.='    <div class="alert alert-danger alert-dismissible" role="alert">';
            $html.='    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>';
            $html.=             $ci->session->flashdata('alert');
            $html.='    </div>';
            $html.='</div>';
        } 
        if($ci->session->flashdata('success')){ 
            $html.=' <div class="row">';
            $html.='    <div class="alert bg-green alert-dismissible" role="alert">';
            $html.='       <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>';
            $html.=                $ci->session->flashdata('success'); 
            $html.='    </div>';
            $html.='</div>';
        }
        echo $html;
    }
    function getHash($data)
    {
      return hash('sha512',$data);
    }   
    function percent($num,$per)
    {
      return number_format((($num*$per)/100),2);
    }
    function currentUrl()
    {
        $CI =& get_instance();
        return $CI->config->site_url($CI->uri->uri_string());
    }
    function getIdEncrypt($id)
    {
        return (159753+$id);
    }
    function getIdDecrypt($id)
    {
        return ($id-159753);
    }

    function email_encode($data) { 
      return rtrim(strtr(base64_encode($data), '+/', '-_'), '='); 
    } 

    function email_decode($data) { 
      return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT)); 
    } 
    function getMenuList($category_id)
    {
        $CI =& get_instance();
        $c1=$c2=$c3="";
        
        $data=$CI->admin_model->selectOne('tbl_category','category_id',$category_id);
        foreach ($data as $category)
        {   
            $c1=$c2=$c3="";
            $c1=$category->category_name; 
            $p_data=$CI->admin_model->selectOne('tbl_category','category_id',$category->parent_category);            
            if(count($p_data)) 
            { 
                $c2=$p_data[0]->category_name." >> "; 
                $s_data=$CI->admin_model->selectOne('tbl_category','category_id',$p_data[0]->parent_category);
                if(count($s_data))
                {
                    $c3=@$s_data[0]->category_name." >> ";
                }
            }
        }
        return $c3.$c2.$c1;        
    }
    function getBrandList($brand_id)
    {
        $CI =& get_instance();
        $c1=$c2=$c3="";
        
        $data=$CI->admin_model->selectOne('tbl_brand','brand_id',$brand_id);
        foreach ($data as $category)
        {   
            $c1=$c2=$c3="";
            $c1=$category->brand_name;             
        }
        return $c3.$c2.$c1;        
    }

    function getClassList($class_id)
    {
        $CI =& get_instance();
        $c1=$c2=$c3="";
        
        $data=$CI->admin_model->selectOne('tbl_class','class_id',$class_id);
        foreach ($data as $category)
        {   
            $c1=$c2=$c3="";
            $c1=$category->title;             
        }
        return $c3.$c2.$c1;        
    }

    function getBoardList($board_id)
    {
        $CI =& get_instance();
        $c1=$c2=$c3="";
        
        $data=$CI->admin_model->selectOne('tbl_board','board_id',$board_id);
        foreach ($data as $category)
        {   
            $c1=$c2=$c3="";
            $c1=$category->board_name;             
        }
        return $c3.$c2.$c1;        
    }

    function getBatchList($batch_id)
    {
        $CI =& get_instance();
        $c1=$c2=$c3="";
        
        $data=$CI->admin_model->selectOne('tbl_batch','batch_id',$batch_id);
        foreach ($data as $category)
        {   
            $c1=$c2=$c3="";
            $c1=$category->batch_name;             
        }
        return $c3.$c2.$c1;        
    }

    function checkMenuList($category_id)
    {
        $CI =& get_instance();
        $c1=$c2=$c3="";
        
        $data=$CI->admin_model->selectOne('tbl_category','category_id',$category_id);
        foreach ($data as $category)
        {   
            $c1=$c2=$c3="";
            //$c1=$category->category_name; 
            $p_data=$CI->admin_model->selectOne('tbl_category','category_id',$category->parent_category);            
            if(count($p_data)) 
            { 
                //$c2=$p_data[0]->category_name." >> "; 
                $s_data=$CI->admin_model->selectOne('tbl_category','category_id',$p_data[0]->parent_category);
                if(count($s_data))
                {
                    $c3=@$s_data[0]->category_name." >> ";
                }
            }
        }
        if($c3=="")
        {
            return true;
        }
        else
        {
            return false;
        }       
    }
    function checkLink($url)
    {    
      $headers = get_headers($url);
      return substr($headers[0], 9, 3);      
    }
    function makeSlug($string)
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
        $string = rtrim($string ,"-");//Last dashes remove
        return $string;
    }



