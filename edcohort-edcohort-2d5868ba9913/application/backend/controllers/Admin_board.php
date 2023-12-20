<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin_board extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('board_model');
        if ($this->session->userdata('jw_admin_id')=="")
        {
            redirect(base_url().'admin_login');
        }
    }
    function index()
    {
        $c1=$c2=$c3="";
        $data['records']=$this->board_model->get_board();

        $data['active']="Board";
        $this->load->view('common/header');
        $this->load->view('common/sidebar',$data);
        $this->load->view('board/board_view');
        $this->load->view('common/footer');
    }
    function add_board()
    {
        $data['parent_board_list']=$this->board_model->get_board();

        $data['active']="Board";
        $this->load->view('common/header');
        $this->load->view('common/sidebar',$data);
        $this->load->view('board/board_add_view');
        $this->load->view('common/footer');
    }
    function add_board_submit()
    {
       
        $board_name=$this->input->post('board_name');       
        $status=$this->input->post('status');
          

        $where=array(         
          'board_name'=>$board_name,
        );
        $check_board = $this->admin_model->selectWhere('tbl_board',$where);
        if(count($check_board)){
          $this->session->set_flashdata('alert','This Board Already Exists!');
          redirect($_SERVER['HTTP_REFERER']);
        }
        //+++++++++++++++++++++++++++++++++++++++++++++++++++++
        $data=array(          
          'board_name'=>$board_name,          
          'status'=>$status, 
          'added_by'=>$this->session->userdata('jw_admin_id'),          
          'date_added'=>date('Y-m-d H:i:s'),
        );
        $board_id=$this->admin_model->insertData('tbl_board',$data);
        //+++++++++++++++++++++++++++++++++++++++++++++++++++++       
        $this->session->set_flashdata('success','board Has Been Added !');
        redirect(base_url().'admin_board');

    }
    function get_subboard()
    {
        $board_id=$this->input->post('board_id');
        $data=$this->board_model->get_sub_board($board_id);
        echo json_encode($data);
    }
    function edit_board($board_id)
    {
        
        $data['parent_board_list']='';

        $data['board_detail']=$this->board_model->get_board_detail($board_id);
        

        $data['active']="Board";
        $this->load->view('common/header');
        $this->load->view('common/sidebar',$data);
        $this->load->view('board/board_edit_view');
        $this->load->view('common/footer');
    }
    function edit_board_submit()
    {
        $board_id=$this->input->post('board_id');
        $board=$this->input->post('board_name');
        $status=$this->input->post('status');

         

        $where=array(
          'board_id !='=>$board_id,         
          'board_name'=>$board,
        );
        $check_board = $this->admin_model->selectWhere('tbl_board',$where);
        if(count($check_board)){
          $this->session->set_flashdata('alert','This Board Already Exists!');
          redirect($_SERVER['HTTP_REFERER']);
        }
        //+++++++++++++++++++++++++++++++++++++++++++++++++++++
        $data=array(
          
          'board_name'=>$board,          
          'status'=>$status,
          'edited_by'=>$this->session->userdata('jw_admin_id'),         
          'date_edited'=>date('Y-m-d H:i:s'),
        );
        //echo "<pre>";print_r($data);exit;
        $where=array('board_id'=>$board_id);
        $this->admin_model->updateData('tbl_board',$data,$where);
        //+++++++++++++++++++++++++++++++++++++++++++++++++++++
        
        $this->session->set_flashdata('success','board Has Been Updated !');
        redirect(base_url().'admin_board');

    }
    function delete_board($board_id)
    {
        $id=$board_id;
       
        $this->admin_model->deleteData('tbl_board',array('board_id'=>$board_id)); 
        $this->session->set_flashdata('success','Board Has Been Deleted !');
        redirect(base_url().'admin_board');
    }
    function action()
    {
        $action=$this->input->get('action');
        $id=$this->input->get('hid_id');
        $board_id=explode(",",$id);
        if ($action=="active") 
        {
            $data=array('board_status'=>'active');
            foreach ($board_id as $board)
            {           
                $this->admin_model->updateData($data,'tbl_board','board_id',$board);
            }
        }
        else if ($action=="inactive") 
        {
            $data=array('board_status'=>'inactive');
            foreach ($board_id as $board)
            {           
                $this->admin_model->updateData($data,'tbl_board','board_id',$board);
            }
        }
        else if ($action=="show_menu") 
        {
            $data=array('show_menu'=>'1');
            foreach ($board_id as $board)
            {           
                $this->admin_model->updateData($data,'tbl_board_description','board_id',$board);
            }
        }
        else if ($action=="hide_menu") 
        {
            $data=array('show_menu'=>'0');
            foreach ($board_id as $board)
            {           
                $this->admin_model->updateData($data,'tbl_board_description','board_id',$board);
            }
        }
        
        $this->session->set_flashdata('success','Board Has Been Updated !');
        redirect(base_url().'admin_board');
    }
    function get_board_slug_name()
    {
        $board_name=$this->input->post('board_name');
        $slug=$this->admin_model->url_slug($board_name);
        echo json_encode(array('slug_name'=>$slug));
    }
    function getMenuList($board_id)
    {
        $c1=$c2=$c3="";
        
        $data=$this->admin_model->selectOne('tbl_board','board_id',$board_id);
        foreach ($data as $board)
        {   
            $c1=$c2=$c3="";
            $c1=$board->board_name; 
            $p_data=$this->admin_model->selectOne('tbl_board','board_id',$board->parent_board);            
            if(count($p_data)) 
            { 
                $c2=$p_data[0]->board_name." >> "; 
                $s_data=$this->admin_model->selectOne('tbl_board','board_id',$p_data[0]->parent_board);
                if(count($s_data))
                {
                    $c3=@$s_data[0]->board_name." >> ";
                }
            }
        }
        return $c3.$c2.$c1;        
    }
}

?>
