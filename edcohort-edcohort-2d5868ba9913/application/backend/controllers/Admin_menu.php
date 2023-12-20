<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin_menu extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('category_model');
        $this->load->model('menu_model');
        if ($this->session->userdata('jw_admin_id')=="")
        {
            redirect(base_url().'admin_login');
        }
    }
    function index()
    {
        $query=$this->db->query(" SELECT * FROM tbl_menu where parent_id='0' order by sort asc");
        $data['menu_list'] = $query->result();

        $data['active']="menu";
        $this->load->view('common/header');
        $this->load->view('common/sidebar',$data);
        $this->load->view('menu/menu_view');
        $this->load->view('common/footer');
    }

    function add_menu_submit()
    {
        $url=$this->input->post('url');
        $url_text=$this->input->post('url_text');
        $custom_parent_id=$this->input->post('custom_parent_id');

        $data=array(
          'label'=>$url_text,
          'link'=>$url,
          'parent_id'=>$custom_parent_id,
        );
        $this->admin_model->insertData('tbl_menu',$data);
        
        $this->session->set_flashdata('success','Menu Has Been Added !');
        redirect($_SERVER['HTTP_REFERER']);

    }    
    function add_menu_cat_submit()
    {
        $cat_list=$this->input->post('cat_list');
        $cat_parent_id=$this->input->post('cat_parent_id');
        //print_ex($this->input->post());

        foreach ($cat_list as $key => $value) {
            $category = $this->admin_model->selectWhere('tbl_category',array('category_id'=>$value));
            if(count($category)){                
                $data=array(
                  'label'=>$category['0']->category_name,
                  'category_id'=>$category['0']->category_id,
                  'parent_id'=>$cat_parent_id,
                );
                $this->admin_model->insertData('tbl_menu',$data);
            }
        }
        
        $this->session->set_flashdata('success','Menu Has Been Added !');
        redirect($_SERVER['HTTP_REFERER']);

    }
    function get_category()
    {
        $category_id=$this->input->post('category_id');

        $query=$this->db->query(" SELECT category_id FROM tbl_menu where menu_id='".$category_id."' ");
        $menu_list = $query->result();

        $query=$this->db->query(" SELECT category_id,category_name FROM tbl_category where parent_category='".@$menu_list['0']->category_id."' order by category_sort_order asc");
        $data = $query->result();
        //print_ex($data);
        //$data=$this->admin_model->get_sub_category($category_id);
        echo json_encode($data);
    }

    function edit_menu_submit()
    {
        $menu_id=$this->input->post('menu_id');

        $url=$this->input->post('url');
        $url_text=$this->input->post('url_text');
        $sort=$this->input->post('sort');
        $block=$this->input->post('block');
        $css_class=$this->input->post('css_class'); 

        $data=array(
          'label'=>$url_text,
          'link'=>$url,
          'sort'=>$sort,
          'css_class'=>$css_class,
          'block'=>$block,
          //'parent_id'=>$custom_parent_id,
        );
        $where=array('menu_id'=>$menu_id);
        $this->admin_model->updateData('tbl_menu',$data,$where);

        $this->session->set_flashdata('success','Menu Has Been Updated !');
        redirect($_SERVER['HTTP_REFERER']);

    }
    function delete_menu()
    {
        $action=$this->input->post('action');
        $menu_id=$this->input->post('id');
        $message='';

        if($action=="active")
        {
            $data=array('is_active'=>'1');
            foreach($menu_id as $menu) {
                $where=array('menu_id'=>$menu);
                $this->admin_model->updateData('tbl_menu',$data,$where);
            }
            $message='Status Has Been Updated!';
        }
        else if($action=="inactive")
        {
            $data=array('is_active'=>'0');
            foreach($menu_id as $menu) {
                $where=array('menu_id'=>$menu);
                $this->admin_model->updateData('tbl_menu',$data,$where);
            }
            $message='Status Has Been Updated!';
        }
        else if($action=="delete")
        {
            foreach ($menu_id as $menu) {
                $where=array('menu_id'=>$menu);
                $this->admin_model->deleteData('tbl_menu',$where);
            }
            $message='Menu Has Been Deleted!';
        }
        echo json_encode(array('message'=>$message));
    }


}

?>
