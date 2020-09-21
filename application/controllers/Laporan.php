<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_laplaka');
	}

	public function index() {
		$data['userdata'] 	= $this->userdata;
		$data['datalaplaka'] 	= $this->M_laplaka->select_all();
		$data['datakode'] = $this->M_laplaka->select_kode();

		$data['page'] 		= "laplaka";
		$data['judul'] 		= "Laporan Kecelakaan";
		$data['deskripsi'] 	= "Manage Data Laporan";

		$data['modal_tambah_kota'] = show_my_modal('laplaka/laporan', 'tambah-kota', $data);

		$this->template->views('laplaka/laporan', $data);
	}

	public function tampil() {
		$data['datalaplaka'] = $this->M_laplaka->select_all();
		$this->load->view('laplaka/list_data', $data);
	}

	public function prosesTambah() {
		$this->form_validation->set_rules('jenis', 'jenis', 'trim|required');
		$this->form_validation->set_rules('no_kasus', 'no_kasus', 'trim|required');
		$this->form_validation->set_rules('no_surat', 'no_surat', 'trim|required');
		$this->form_validation->set_rules('hari_lapor', 'hari_lapor', 'trim|required');
		$this->form_validation->set_rules('tgl_lapor', 'tgl_lapor', 'trim|required');
		$this->form_validation->set_rules('jam_lapor', 'jam_lapor', 'trim|required');
		$this->form_validation->set_rules('petugas', 'petugas');
		$this->form_validation->set_rules('no_pol', 'no_pol');
		$this->form_validation->set_rules('no_body', 'no_body');
		$this->form_validation->set_rules('nic_sp', 'nic_sp');
		$this->form_validation->set_rules('nama_sp', 'nama_sp');
		$this->form_validation->set_rules('nic_kr', 'nic_kr');
		$this->form_validation->set_rules('nama_kr', 'nama_kr');
		$this->form_validation->set_rules('berita_dari', 'berita_dari');
		$this->form_validation->set_rules('tkp_laka', 'tkp_laka');
		$this->form_validation->set_rules('kendaraan_terlibat', 'kendaraan_terlibat');
		$this->form_validation->set_rules('keadaan_png', 'keadaan_png');
		$this->form_validation->set_rules('korban', 'korban');
		$this->form_validation->set_rules('korban_benda', 'korban_benda');
		$this->form_validation->set_rules('ket_perkara', 'ket_perkara');
		$this->form_validation->set_rules('posisi_kendaraan', 'posisi_kendaraan');
		$this->form_validation->set_rules('kerugian_lawan', 'kerugian_lawan');
		$this->form_validation->set_rules('png_jln_sebelumnya', 'png_jln_sebelumnya');
		$this->form_validation->set_rules('hari_bap', 'hari_bap');
		$this->form_validation->set_rules('tgl_bap', 'tgl_bap');
		$this->form_validation->set_rules('jam_bap', 'jam_bap');
		$this->form_validation->set_rules('wilayah', 'wilayah');
		$this->form_validation->set_rules('pembuat', 'pembuat');
		$this->form_validation->set_rules('jml_pp', 'jml_pp');
		$this->form_validation->set_rules('tgl_masuk_png', 'tgl_masuk_png');

		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_laplaka->insert($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Laporan Telah ditambahkan', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_err_msg('Data Laporan Gagal ditambahkan', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

}

/* End of file Kota.php */
/* Location: ./application/controllers/Kota.php */