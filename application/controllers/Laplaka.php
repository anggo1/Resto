<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class laplaka extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->library('calendar');
		$this->load->model('M_laplaka');
        $this->load->helper('tgl_indo');
		
	}

	public function index() {
		$data['userdata'] 	= $this->userdata;
		$data['datalaplaka'] 	= $this->M_laplaka->select_all();

		$data['page'] 		= "laplaka";
		$data['judul'] 		= "Laporan Kecelakaan";
		$data['deskripsi'] 	= "Manage Data Laporan";

		$data['modal_tambah_kota'] = show_my_modal('laplaka/laporan', 'tambah-kota', $data);

		$this->template->views('laplaka/home', $data);
	}
	public function ajax_list()
	{
		$list = $this->M_laplaka->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $dataL) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $dataL->kode.'.'.$dataL->no_kasus;
			$row[] = $dataL->no_surat;
			$row[] = tgl_indo($dataL->tgl_lapor);
			$row[] = $dataL->no_body;
			$row[] = $dataL->nic_sp;
			$row[] = $dataL->nic_kr;
			$row[] = tgl_indo($dataL->tgl_masuk_png);
			$row[] = $dataL->petugas;
			$row[] = $dataL->pembuat;
           	$row[]='<button class="btn btn-success cetak-datalaplaka" data-id="'.$dataL->id.'"><i class="glyphicon glyphicon-print"></i> Print</button>
				  <button class="btn btn-warning update-datalaporan" data-id="'.$dataL->id.'"><i class="glyphicon glyphicon-repeat"></i> Edit</button>
				  <button class="btn btn-info detail-datalaporan" data-id="'.$dataL->id.'"><i class="glyphicon glyphicon-info-sign"></i> Detail</button>';
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->M_laplaka->count_all(),
						"recordsFiltered" => $this->M_laplaka->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
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

		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_laplaka->insert($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Laporan Telah ditambahkan', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_err_msg('Data laporan Gagal ditambahkan', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function update() {
		$id 				= $_POST['id'];
		$data['userdata'] 	= $this->userdata;
		$data['datalaporan'] = $this->M_laplaka->select_by_id($id);

		echo show_my_modal('modals/modal_update_laporan', 'update-laporan', $data);
	}

	public function prosesUpdate() {
		$this->form_validation->set_rules('no_kasus', 'no_kasus', 'trim|required');
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
			$result = $this->M_laplaka->update($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Laporan Berhasil diupdate', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Laporan Gagal diupdate', '20px');
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
			echo show_succ_msg('Data Kota Berhasil dihapus', '20px');
		} else {
			echo show_err_msg('Data Kota Gagal dihapus', '20px');
		}
	}

	public function detail() {
		$id 				= $_POST['id'];
		$data['userdata'] 	= $this->userdata;
		$data['datalaplaka'] = $this->M_laplaka->select_by_id($id);

		echo show_my_modal('modals/modal_detail_laporan', 'detail-laporan', $data);
	}
public function carisp() {	
	$id=$_POST['nic_sp'];
	{
		$data['userdata'] 	= $this->userdata;
		$result 	= $this->M_laplaka->select_sp($id);
	}
}
public function carisp_masuk() {	
	$id=$_POST['nic_sp'];
	{
		$data['userdata'] 	= $this->userdata;
		$result 	= $this->M_laplaka->select_sp_masuk($id);
	}
}
public function carikr() {	
	$id=$_POST['nic_kr'];
	{
		$data['userdata'] 	= $this->userdata;
		$result 	= $this->M_laplaka->select_kr($id);
	}
}

public function cetak() {
		$id 				= $_POST['id'];
		$data['userdata'] 	= $this->userdata;
		$data['datalaplaka'] = $this->M_laplaka->select_by_id($id);

		echo show_my_modal('modals/modal_cetak_laporan', 'cetak-laplaka', $data);
	}

	public function export() {
		error_reporting(E_ALL);
    
		include_once './assets/phpexcel/Classes/PHPExcel.php';
		$objPHPExcel = new PHPExcel();

		$data = $this->M_kota->select_all();

		$objPHPExcel = new PHPExcel(); 
		$objPHPExcel->setActiveSheetIndex(0); 

		$objPHPExcel->getActiveSheet()->SetCellValue('A1', "ID"); 
		$objPHPExcel->getActiveSheet()->SetCellValue('B1', "Nama Kota");

		$rowCount = 2;
		foreach($data as $value){
		    $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $value->id); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $value->nama); 
		    $rowCount++; 
		} 

		$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel); 
		$objWriter->save('./assets/excel/Data Kota.xlsx'); 

		$this->load->helper('download');
		force_download('./assets/excel/Data Kota.xlsx', NULL);
	}

	public function import() {
		$this->form_validation->set_rules('excel', 'File', 'trim|required');

		if ($_FILES['excel']['name'] == '') {
			$this->session->set_flashdata('msg', 'File harus diisi');
		} else {
			$config['upload_path'] = './assets/excel/';
			$config['allowed_types'] = 'xls|xlsx';
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('excel')){

				$error = array('error' => $this->upload->display_errors());
			}
			else{
				$data = $this->upload->data();
				
				error_reporting(E_ALL);
				date_default_timezone_set('Asia/Jakarta');

				include './assets/phpexcel/Classes/PHPExcel/IOFactory.php';

				$inputFileName = './assets/excel/' .$data['file_name'];
				$objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
				$sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);

				$index = 0;
				foreach ($sheetData as $key => $value) {
					if ($key != 1) {
						$check = $this->M_kota->check_nama($value['B']);

						if ($check != 1) {
							$resultData[$index]['nama'] = ucwords($value['B']);
						}
					}
					$index++;
				}

				unlink('./assets/excel/' .$data['file_name']);

				if (count($resultData) != 0) {
					$result = $this->M_kota->insert_batch($resultData);
					if ($result > 0) {
						$this->session->set_flashdata('msg', show_succ_msg('Data Kota Berhasil diimport ke database'));
						redirect('Kota');
					}
				} else {
					$this->session->set_flashdata('msg', show_msg('Data Kota Gagal diimport ke database (Data Sudah terupdate)', 'warning', 'fa-warning'));
					redirect('Kota');
				}

			}
		}
	}
}

/* End of file Kota.php */
/* Location: ./application/controllers/Kota.php */