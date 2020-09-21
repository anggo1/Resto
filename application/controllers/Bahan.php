<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bahan extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->library('calendar');
		$this->load->model('M_bahan');
        $this->load->helper('tgl_indo');
	}

	public function Index() {
		$data['userdata'] 	= $this->userdata;

		$data['page'] 		= "Bahan";
		$data['judul'] 		= "Bahan Baku";
		$data['deskripsi'] 	= "Data Bahan Baku";
		//$data['modal_cari_konsumen'] = show_my_modal('transaksi/modals/modal_cari_konsumen', 'cari-konsumen', $data, ' modal-md');

		$this->template->views('admin/bahan', $data);
	}
	
    public function list_bahan() {
		//$id 				= $_GET['next_proses'];
		$data['dataBahan'] = $this->M_bahan->select_all();
		$this->load->view('admin/b_data', $data);
	}
    
	public function cari_riwayat() {
	$id=$_GET['id_konsumen'];
	{
		$data['dataNama'] 	= $this->M_transaksi->cari_riwayat_konsumen($id);
		$this->load->view('transaksi/cari_konsumen/riwayat', $data);
	}
	}
	public function cari_nama_konsumen() {
	$id=$_GET['cari_nama_konsumen'];
	{
		$data['dataNama'] 	= $this->M_transaksi->cari_nama_konsumen($id);
		$this->load->view('transaksi/cari_konsumen/konsumen', $data);
	}
}


    
    function noDaftar(){
	$date= date("Ymd");
    $ci = get_instance();
    $query = "SELECT max(id_kirim) as maxKode FROM data_pengiriman WHERE id_kirim LIKE '$date%'";
    $data = $ci->db->query($query)->row_array();
	$noOrder = $data['maxKode'];
	$noUrut = (int)substr($noOrder, 10, 4);
	$noUrut++;
	$tahun=substr($date, 0, 4);
	$bulan=substr($date, 4, 2);
	$tgl=substr($date, 6, 2);
	$kodeBaru  = $tahun .$bulan .$tgl .sprintf("%04s", $noUrut);

    return $kodeBaru;
    }
    
	public function prosesTtransaksi() {
        
    $date= date("Ymd");
    $ci = get_instance();
    $query = "SELECT max(id_kirim) as maxKode FROM data_pengiriman WHERE id_kirim LIKE '$date%'";
    $data = $ci->db->query($query)->row_array();
	$noOrder = $data['maxKode'];
	$noUrut = (int)substr($noOrder, 10, 4);
	$noUrut++;
	$tahun=substr($date, 0, 4);
	$bulan=substr($date, 4, 2);
	$tgl=substr($date, 6, 2);
	$kodeBaru  = $tahun .$bulan .$tgl .sprintf("%04s", $noUrut);
        
        
    //$data['dataDaftar'] 	= $this->M_transaksi->noDaftar();
	$this->form_validation->set_rules('tgl_buat', 'Tanggal Pembuatan', 'trim|required');
	$this->form_validation->set_rules('nama', 'Pengirim', 'trim|required');

		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {        
        $result=$this->input->post('data_pengiriman');
        $date2 = $data['tgl_buat'];
		$tgl2 = explode('-',$date2);
		$ttmp2 = $tgl2[2]."-".$tgl2[1]."-".$tgl2[0]."";
		$sekarang = date('Y/m/d');
            
        $data = array(
            'id_kirim'  =>$kodeBaru,
            'tgl_buat'  =>$ttmp2,
            'id_konsumen'=>$data['id_konsumen'],
            'nama'      =>$data['nama'],
            'penerima'  =>$data['penerima'],
            'tlp_penerima'=>$data['tlp_penerima'],
            'asal'      =>$data['asal'],
            'tujuan'    =>$data['tujuan'],
            'pembuat'   =>$data['pembuat'],
            'setor'     =>'N',
            'kirim'     =>'N',
            'manual'    =>'N',
            'pembayaran'=>$data['pembayaran']          
            );
            $data['dataPengiriman'] = $this->db->insert('data_pengiriman',$data);   
        if ($data['dataPengiriman'] == true) {
	        $out['datakode']=$kodeBaru;
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
	public function delete() {
		$id = $_POST['id'];
		$result = $this->M_kota->delete($id);
		if ($result > 0) {
            
	        $out['datakode']=$kodeBaru;
			$out['msg'] = show_succ_msg('Data Kota Berhasil dihapus', '20px');
		} else {
			echo show_err_msg('Data Kota Gagal dihapus', '20px');
		}
	}

    public function prosesKirim() {
		$this->form_validation->set_rules('next_proses', 'ID Pengiriman', 'trim|required');
		$this->form_validation->set_rules('nama_barang', 'Nama Barang', 'trim|required');

		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_transaksi->insertkirim($data);

			if ($result > 0) {
                $out['datakode'] =$data['next_proses'];
				$out['status'] = '';
				$out['msg'] = show_ok_msg('Data Telah ditambahkan', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_err_msg('Data Gagal ditambahkan', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

    public function tampilDetail() {
		$id 				= $_GET['next_proses'];
		$data['dataDetail'] = $this->M_transaksi->select_kirim($id);
		$this->load->view('transaksi/data_pengiriman', $data);
	}
	public function cari_asal() {
	$id=$_GET['kode_asal'];
		$cari	= $this->M_transaksi->select_asal($id)->result();
        echo json_encode($cari);
	}
	public function cari_tujuan() {
	$id=$_GET['kode_tujuan'];
		$cari	= $this->M_transaksi->select_tujuan($id)->result();
        echo json_encode($cari);
	}
    public function deleteDetail() {
		$id = $_POST['id'];
		$result = $this->M_transaksi->delete_detail($id);

		if ($result > 0) {
			//$out['datakode']=$kodeBaru;
            $out['status'] = '';
			$out['msg'] = show_del_msg('Deleted', '20px');
			} else {
			$out['status'] = '';
			$out['msg'] = show_err_msg('Filed !', '20px');
			}
		echo json_encode($out);
	}
	public function cetak() {
		$id 				= $_POST['id'];
		$data['userdata'] 	= $this->userdata;
		$data['dataKirim'] = $this->M_transaksi->select_by_id($id);
		$data['detailKirim'] = $this->M_transaksi->select_by_detail($id);
		$data['detailSum'] = $this->M_transaksi->select_by_sum($id);

		echo show_my_print('transaksi/modals/modal_cetak_ttb', 'cetak-ttb', $data, ' modal-xl');
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
