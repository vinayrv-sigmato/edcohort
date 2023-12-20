<?php    
defined('BASEPATH') OR exit('No direct script access allowed');

class Page_not_found extends CI_Controller { 

	public function __construct()
	  {
		  parent::__construct();

	  }
    public function index() 
    { 
				$this->load->view('common/header');
				$this->load->view('common/error_404');
				$this->load->view('common/footer');
    }    

}
