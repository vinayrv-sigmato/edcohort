<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Stock_files extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('excel');
		$this->load->model('admin_model');
		$this->load->model('vendor_model');  
		$this->load->model('product_model');  
		$this->load->model('common_model');
	}

    public function starrays(){
        $url = 'https://starrays.com/DataService/StockDownLoad/FrmDataDownloader.aspx?uname=Dealson&pwd=Dealson';
    	$filename = 'starrays.csv';
        /* Save file wherever you want */
        $data = file_put_contents('../uploads/diamond/excel/'.$filename, file_get_contents($url));
    }
}