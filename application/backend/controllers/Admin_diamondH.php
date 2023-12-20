<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_diamondH extends CI_Controller {

  public function __construct()
  {
      parent::__construct();
      $this->load->model('diamondH_model');
      $this->load->model('vendor_model'); 
      $this->load->library('excel');
      $this->load->library('pagination');      
      $this->load->library('upload');
      if($this->session->userdata('jw_admin_id')=="")
      {
        redirect(base_url());
      }
  }
  public function index()
  {  
      $data['active_sidebar']='diamond_updated';    
      $data['vendor_list']=$this->vendor_model->vendor_list($filter);

      $this->load->view('common/header');
      $this->load->view('common/sidebar',$data);
      $this->load->view('diamond/updated_list',$data);
      $this->load->view('common/footer');
  }

  function load_more_data()
  {
      $data = $row = array();
        
        // Fetch member's records
        $DataArray = $this->diamondH_model->getRows($_POST);
        
        $i = $_POST['start'];
        foreach($DataArray as $DataA){
            $i++;
            $created = date( 'jS M Y', strtotime($DataA->updated_date));
            $action = '<a target="blank" href="'.base_url().'Admin_diamond/diamond_details/'.$DataA->report_no.'/1"><i class="fa fa-eye"></i></a>';
            $status = ($DataA->status == 0)?'Inserted':'updated';
            $data[] = array($i, $DataA->report_no,
                                $DataA->status,
                                $created, 
                                $action);
        }
        
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->diamondH_model->countAll(),
            "recordsFiltered" => $this->diamondH_model->countFiltered($_POST),
            "data" => $data,
        );
        
        // Output to JSON format
        echo json_encode($output);
  }
}