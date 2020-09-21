<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->library('calendar');
		$this->load->model('M_transaksi');
        $this->load->helper('tgl_indo');
	}
    function index(){
		
		$data['userdata'] 	= $this->userdata;
		$data['page'] 		= "Transaksi";
		$data['judul']      ="HOME";
		$data['data']=$this->M_transaksi->hot_promo();
		$data['dataMakanan']=$this->M_transaksi->total_makanan();
		$data['dataMinuman']=$this->M_transaksi->total_minuman();
		$this->template->views('mobile/v_home',$data);
	}
}