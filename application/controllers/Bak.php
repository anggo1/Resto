<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bak extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_bak');
        $this->load->helper('tgl_indo');
	}

	public function index() {
		$data['userdata'] 	= $this->userdata;
		$data['databak'] 	= $this->M_bak->select_all();

		$data['page'] 		= "Bak";
		$data['judul'] 		= "Berita Acara Kecelakaan";
		$data['deskripsi'] 	= "Manage Data Berita Acara";

		//$data['modal_tambah_kota'] = show_my_modal('bak/bak', 'tambah-kota', $data);

		$this->template->views('bak/home', $data);
	}
public function ajax_list()
	{
		$list = $this->M_bak->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $dataL) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $dataL->no_kasus;
			$row[] = tgl_indo($dataL->tgl_terima);
			$row[] = $dataL->akibat_perkara;
			$row[] = $dataL->diterima_oleh;
			$row[] = $dataL->pembuat;
           	$row[]='<button class="btn btn-success cetak-databak" data-id="'.$dataL->id.'" ><i class="glyphicon glyphicon-print"></i> Print</button>
				  <button class="btn btn-warning update-databak" data-id="'.$dataL->no_kasus.'"><i class="glyphicon glyphicon-repeat"></i> Edit</button>
				  <button class="btn btn-info detail-databak" data-id="'.$dataL->no_kasus.'"><i class="glyphicon glyphicon-info-sign"></i> Detail</button>';
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->M_bak->count_all(),
						"recordsFiltered" => $this->M_bak->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}
	public function tampil() {
		$data['databak'] = $this->M_bak->select_all();
		$this->load->view('bak/list_data', $data);
	}

	public function prosesTambah() {
		$this->form_validation->set_rules('id_laporan', 'id_laporan', 'trim|required');
		$this->form_validation->set_rules('no_kasus', 'no_kasus', 'trim|required');
		$this->form_validation->set_rules('akibat_perkara', 'akibat_perkara');
		$this->form_validation->set_rules('kesimpulan', 'kesimpulan');
		$this->form_validation->set_rules('kerugian', 'kerugian');
		$this->form_validation->set_rules('lain_lain', 'lain_lain');
		$this->form_validation->set_rules('pengganti_pihak_lain', 'pengganti_pihak_lain');
		$this->form_validation->set_rules('diterima_oleh', 'diterima_oleh');
		$this->form_validation->set_rules('tgl_terima', 'tgl_terima');
		$this->form_validation->set_rules('kasus_ke', 'kasus_ke');
		$this->form_validation->set_rules('resiko_png', 'resiko_png');
		$this->form_validation->set_rules('masa_batangan', 'masa_batangan');
		$this->form_validation->set_rules('tgl_masuk', 'tgl_masuk');
		$this->form_validation->set_rules('status_kendaraan', 'status_kendaraan');
		$this->form_validation->set_rules('catatan', 'catatan');
		$this->form_validation->set_rules('pembuat', 'pembuat');

		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_bak->insert($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data BAK Telah ditambahkan', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_err_msg('Data BAK Gagal ditambahkan', '20px');
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
		$data['databak'] = $this->M_bak->select_by_id($id);

		echo show_my_modal('modals/modal_update_bak', 'update-bak', $data);
	}

public function carisurat() {	
	$id=$_GET['no_kasus'];
	{
		$data['userdata'] 	= $this->userdata;
		$result 	= $this->M_bak->cari_surat($id);
	}
}
	public function prosesUpdate() {
		$this->form_validation->set_rules('no_kasus', 'no_kasus', 'trim|required');
		$this->form_validation->set_rules('akibat_perkara', 'akibat_perkara');
		$this->form_validation->set_rules('kesimpulan', 'kesimpulan');
		$this->form_validation->set_rules('kerugian', 'kerugian');
		$this->form_validation->set_rules('lain_lain', 'lain_lain');
		$this->form_validation->set_rules('pengganti_pihak_lain', 'pengganti_pihak_lain');
		$this->form_validation->set_rules('diterima_oleh', 'diterima_oleh');
		$this->form_validation->set_rules('tgl_terima', 'tgl_terima');
		$this->form_validation->set_rules('kasus_ke', 'kasus_ke');
		$this->form_validation->set_rules('resiko_png', 'resiko_png');
		$this->form_validation->set_rules('masa_batangan', 'masa_batangan');
		$this->form_validation->set_rules('tgl_masuk', 'tgl_masuk');
		$this->form_validation->set_rules('status_kendaraan', 'status_kendaraan');
		$this->form_validation->set_rules('catatan', 'catatan');
		$this->form_validation->set_rules('pembuat', 'pembuat');

		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_bak->update($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data BAK Berhasil diupdate', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data BAK Gagal diupdate', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}


	public function detail() {
		$id 				= $_POST['id'];
		$data['userdata'] 	= $this->userdata;
		$data['databak'] 	= $this->M_bak->select_by_id($id);

		echo show_my_modal('modals/modal_detail_bak', 'detail-bak', $data);
	}
	public function cetak() {
		$id 				= $_POST['id'];
		$data['userdata'] 	= $this->userdata;
		$data['databak'] 	= $this->M_bak->cetak_by_id($id);

		echo show_my_modal('modals/modal_cetak_bak', 'cetak-bak', $data);
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