<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		//$this->load->model('M_pengiriman');
		//$this->load->model('M_bak');
		//$this->load->model('M_kasussp');
		//$this->load->model('M_kasuskr');
	}

	public function index() {
		//$data['jml_laporan'] 	= $this->M_pengiriman->total_rows();
		//$data['jml_bak'] 	= $this->M_bak->total_rows();
		//$data['jml_sopir'] 	= $this->M_kasussp->total_rows();
		//$data['jml_kernet'] 	= $this->M_kasuskr->total_rows();
		$data['userdata'] 		= $this->userdata;

		$rand = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f');
		
		$index = 0;
		


		
		$data['page'] 			= "home";
		$data['judul'] 			= "Beranda";
		$this->template->views('home', $data);
	}
}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */