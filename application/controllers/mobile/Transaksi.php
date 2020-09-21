<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends AUTH_Controller {
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
		$data['user']=$this->M_transaksi->cek_inv($this->userdata->pengguna_id);
		$this->template->views('mobile/v_home',$data);
	}
    function cari_inv(){
        $user 				= $_GET['next_proses'];
		$x['data']=$this->M_transaksi->cek_inv($user);
		$this->load->view('mobile/v_menu',$x);
	}
    function hot_promo(){
		
		$x['userdata'] 	= $this->userdata;
		$x['user']=$this->M_transaksi->cek_inv($this->userdata->pengguna_id);
		$x['page'] 		= "Daftar Menu";
		$x['judul']     ="HOT PROMO";
		$x['data']=$this->M_transaksi->hot_promo();
		$this->template->views('mobile/v_menu',$x);
	}
    function makanan(){
		$x['userdata'] 	= $this->userdata;
		$x['user']=$this->M_transaksi->cek_inv($this->userdata->pengguna_id);
		$x['page'] 		= "Makanan";
		$x['judul']="MAKANAN";
		$x['data']=$this->M_transaksi->makanan();
		$this->template->views('mobile/v_menu',$x);
	}
	function minuman(){
		$x['userdata'] 	= $this->userdata;
		$x['user']=$this->M_transaksi->cek_inv($this->userdata->pengguna_id);
		$x['page'] 		= "Minuman";
		$x['judul']="MINUMAN";
		$x['data']=$this->M_transaksi->minuman();
		$this->template->views('mobile/v_menu',$x);
	}
	function favorite(){
		$x['judul']="FAVORITE";
		$x['data']=$this->M_transaksi->favorite();
		$this->template->views('mobile/v_menu',$x);
	}
	function detail_menu(){
		$x['userdata'] 	= $this->userdata;
		$x['user']=$this->M_transaksi->cek_inv($this->userdata->pengguna_id);
		$x['page'] 		= "Daftar Menu";
		$x['judul']="DetailMenu";
		$kode=$this->uri->segment(4);
		$x['data']=$this->M_transaksi->detail_menu($kode);
		$this->template->views('mobile/v_detail_menu',$x);
	}

    function Cart(){
        $kode=$this->uri->segment(4);
		//$inv=$kode2;
        $data['userdata'] 	= $this->userdata;
		$data['user']=$this->M_transaksi->cek_inv($this->userdata->pengguna_id);
		$data['detail']=$this->M_transaksi->cek_detail_inv($kode);
        $data['page'] 		= "Keranjang";
		$data['judul']="Keranjang";
        if(!empty($data['user'])){foreach ($data['user'] as $u){$no_inv=$u->inv_no;}
		$data['dataInv'] = $this->M_transaksi->detail_inv($no_inv);}
		$this->template->views('mobile/v_cart', $data);
	}
    function insertOrder(){
        
        //$kode=$this->uri->segment(4);
		$data['userdata'] 	= $this->userdata;
		$data 	= $this->input->post(); 
        //$kode= $_POST['no_inv'];        
        $result = $this->M_transaksi->insert_detail($data);
        redirect('mobile/Transaksi/Cart');
	}
function update(){
		$data['userdata'] 	= $this->userdata;
        $ids=$this->input->post('id_detail');
        $id_detail=$this->input->post('id_detail');
        $jumlah=$this->input->post('jumlah');
        $harga=$this->input->post('harga');
        $updateArray = array();

        for($x = 0; $x < sizeof($ids); $x++){
            $updateArray[] = array(
                'id_detail'=>$ids[$x],
                'jumlah' => $jumlah[$x],
                'harga_menu' => $harga[$x],
                'total_harga' => $jumlah[$x]*$harga[$x]
            );
        }      

        $this->db->update_batch('tbl_detail_penjualan',$updateArray,'id_detail');      
        redirect('mobile/Transaksi/Cart');
	}

    public function addOrder() {
    $kode= $_POST['uri'];
    date_default_timezone_set('Asia/Jakarta');
    $date= date("y-m-d");
    $date2= date("Y-m-d H:i:s");
        
    $ci = get_instance();
    $query = "SELECT max(inv_no) as maxKode FROM tbl_penjualan";        
    $d_data = $ci->db->query($query)->row_array();
    $noOrder = $d_data['maxKode'];
    $noUrut = (int) substr($noOrder, 6, 11);
    $noUrut++;
    $char = "IV";
    $tahun=substr($date, 0, 2);
    $bulan=substr($date, 3, 2);
    $kode_transaksi = $char .$tahun .$bulan . sprintf("%05s", $noUrut);        
        
	$this->form_validation->set_rules('pengguna_id', 'ID Login', 'trim|required');

		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {        
        //$result=$this->input->post('tbl_invoice');
        $data = array(
            'inv_no'  =>$kode_transaksi,
            'inv_tgl'  =>$date2,         
            'inv_status'  =>'N',
            'user_id'  =>$data['pengguna_id']         
            );
            $data['dataOrder'] = $this->db->insert('tbl_penjualan',$data);   
            if(empty($kode)){                
            redirect('mobile/Transaksi');
            } else {                
            redirect('mobile/Transaksi/'.$kode);
            }
		} 
        
	}
    public function deleteDetailmenu() {
		$id = $_POST['id'];
		$result = $this->M_transaksi->delete_detail_menu($id);
		if ($result > 0) {
			$out['msg'] = show_ok_msg('Delete Success', '20px');
		} else {
			echo show_err_msg('Failed!', '20px');
		}
	}
    
    public function check_out() {
		$data['userdata'] 	= $this->userdata;
		//$data['dataCheckout'] = $this->M_transaksi->select_inv_update($id);
        $data 	= $this->input->post();
			$result = $this->M_transaksi->select_inv_update($data);
            redirect('mobile/Transaksi');
	}

    function list_transaksi(){
        $data['userdata'] 	= $this->userdata;
		$data['userOrder']=$this->M_transaksi->cek_inv_user($this->userdata->pengguna_id);
        $data['page'] 		= "List Order";
		$data['judul']="List Order";
		$this->template->views('mobile/v_user_order', $data);
	}
    function editInv(){
        $data['userdata'] 	= $this->userdata;      
		$id = $_POST['id'];
		$result = $this->M_transaksi->edit_user_inv($id);
	}

    
	public function Pengiriman() {
		$data['userdata'] 	= $this->userdata;
		$data['dataWilayah'] = $this->M_transaksi->select_wilayah();
		$data['dataBarang'] = $this->M_transaksi->select_harga();

		$data['page'] 		= "Transaksi";
		$data['judul'] 		= "Pengiriman";
		$data['deskripsi'] 	= "Pengiriman Barang";
		$data['modal_cari_konsumen'] = show_my_modal('transaksi/modals/modal_cari_konsumen', 'cari-konsumen', $data, ' modal-md');
		$data['modal_cari_asal'] = show_my_modal('transaksi/modals/modal_cari_asal', 'cari-asal', $data, ' modal-md');
		$data['modal_cari_tujuan'] = show_my_modal('transaksi/modals/modal_cari_tujuan', 'cari-tujuan', $data, ' modal-md');
		$data['modal_cari_barang'] = show_my_modal('transaksi/modals/modal_cari_barang', 'cari-barang', $data, ' modal-lg');

		$this->template->views('transaksi/pengiriman', $data);
	}
	
    
	

//Setoran
    public function Setoran() {
		$data['userdata'] 	= $this->userdata;
        
		//$data['dataKirim'] = $this->M_transaksi->select_selesai();

		$data['page'] 		= "Transaksi";
		$data['judul'] 		= "Setoran";
		$data['deskripsi'] 	= "Setoran Paket";
		//$data['modal_cari_konsumen'] = show_my_modal('transaksi/modals/modal_cari_konsumen', 'cari-konsumen', $data, ' modal-md');
		$this->template->views('transaksi/setor/setor', $data);
	}
    public function Stor() {
		$data['dataKirim'] = $this->M_transaksi->select_selesai();
		$this->load->view('transaksi/setor/data_setor', $data);
	}
    public function batalKirim() {
		$id = $_POST['id'];
		$result = $this->M_transaksi->batal_kirim($id);

		if ($result > 0) {
			//$out['datakode']=$kodeBaru;
            $out['status'] = '';
			$out['msg'] = show_del_msg('Deleted !', '20px');
			} else {
			$out['status'] = '';
			$out['msg'] = show_err_msg('Filed !', '20px');
			}
		echo json_encode($out);
	}
    
    public function prosesTsetor() {
        
    $date= date("y-m-d");
        
    $ci = get_instance();
    $query = "SELECT max(id_setor) as maxKode FROM log_setor";        
    $d_data = $ci->db->query($query)->row_array();
        
    //$query =mysqli_query($connection, "SELECT max(id_setor) as maxKode FROM log_setor");
    //$d_data = mysqli_fetch_array($query);
    $noOrder = $d_data['maxKode'];
    $noUrut = (int) substr($noOrder, 6, 11);
    $noUrut++;
    $char = "SJ";
    $tahun=substr($date, 0, 2);
    $bulan=substr($date, 3, 2);
    $kode_transaksi = $char .$tahun .$bulan . sprintf("%05s", $noUrut);
        
        
	$this->form_validation->set_rules('tgl_setor', 'Tanggal Setoran', 'trim|required');
	$this->form_validation->set_rules('penyetor', 'Penyetor', 'trim|required');

		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {        
        $result=$this->input->post('data_pengiriman');
        $date2 = $data['tgl_setor'];
		$tgl2 = explode('-',$date2);
		$ttmp2 = $tgl2[2]."-".$tgl2[1]."-".$tgl2[0]."";
            
        $data = array(
            'id_setor'  =>$kode_transaksi,
            'tgl_setor'  =>$ttmp2,         
            'penyetor'  =>$data['penyetor'],
            'pembuat'  =>$data['pembuat']         
            );
            $data['dataSetor'] = $this->db->insert('log_setor',$data);   
        if ($data['dataSetor'] == true) {
	        $out['datasetor']=$kode_transaksi;
		    $out['status'] = '';
			$out['msg'] = show_succ_msg('Success', '20px');
			} else {
			$out['status'] = '';
			$out['msg'] = show_err_msg('Filed !', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}
    public function pStor() {
        $data['idsetornye'] 				= $_GET['detail_proses'];
		$data['dataKirim'] = $this->M_transaksi->select_selesai();
		$this->load->view('transaksi/setor/d_setor', $data);
	}
    public function detailStor() {
		$id 				= $_GET['detail_proses'];
		$data['sumStor'] = $this->M_transaksi->sum_setor($id);
		$data['detailStor'] = $this->M_transaksi->select_setor($id);
		$this->load->view('transaksi/setor/detail_setor', $data);
	}
    public function prosesTdetail() {
		$this->form_validation->set_rules('nama_jabatan', 'Nama Jabatan', 'trim|required');

		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_transaksi->insertTdetail($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Setor Success', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_err_msg('Setor Filed !', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}
    public function prosesDsetor() {
     
        $id_kiriman = $this->input->post('id_kiriman');
	       $this->form_validation->set_rules('ptd1', 'Keterangan', 'trim|required');
        
		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_transaksi->insertData_detail($data);

			if ($result > 0) {
	            $out['datasetor']=$id_kiriman;
				$out['status'] = '';
				$out['msg'] = show_ok_msg('Success!', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_del_msg('Data Pengiriman Gagal ditambahkan', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}
   
    public function cetak_setor() {
		$id 				= $_POST['id'];
		$data['userdata'] 	= $this->userdata;
		$data['dataKirim'] = $this->M_transaksi->select_setor_id($id);

		echo show_my_print('transaksi/modals/modal_cetak_setor', 'cetak-setoran', $data, ' modal-xl');
	}
    /*End Setor */
    	/*Jabatan*/
	public function Jabatan() {
		$data['userdata'] = $this->userdata;
		//$data['dataSatuan'] = $this->M_masterdata->select_satuan();

		$data['page'] = "Master";
		$data['judul'] = "Jabatan";
		$data['deskripsi'] = "Jabatan";
		//echo show_my_modal('admin/master_data/modals/modal_tambah_jabatan', 'tambah-jabatan', $data);
		$data['modal_tambah_jabatan'] = show_my_modal('admin/master_data/modals/modal_tambah_jabatan', 'tambah-jabatan', $data);

		$this->template->views('admin/master_data/jabatan', $data);
		
	}
	public function tampilJab() {
		$data['dataJabatan'] = $this->M_masterdata->select_jabatan();
		$this->load->view('admin/master_data/j_data', $data);
				
	}

	public function prosesTjabatan() {
		$this->form_validation->set_rules('nama_jabatan', 'Nama Jabatan', 'trim|required');

		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_masterdata->insertJabatan($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Success', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_err_msg('Filed !', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}
	
	public function updateJabatan() {
		$data['userdata'] 	= $this->userdata;
		$id 				= trim($_POST['id']);
		$data['dataJabatan'] = $this->M_masterdata->select_id_jabatan($id);
		echo show_my_modal('admin/master_data/modals/modal_tambah_jabatan', 'update-jabatan', $data);

		//$data['modal_tambah_jabatan'] = show_my_modal('admin/master_data/modals/modal_tambah_satuan', 'update-jabatan', $data);
	}

	public function prosesUjabatan() {
		
		$this->form_validation->set_rules('nama_jabatan', 'Nama Jabatan', 'trim|required');

		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_masterdata->update_jabatan($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Success', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Filed!', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}
	/*endjabatan*/
	
}
