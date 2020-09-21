<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengiriman extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->library('calendar');
		$this->load->model('M_pengiriman');
		$this->load->model('M_transaksi');
        $this->load->helper('tgl_indo');
		
	}

	public function index() {
		$data['userdata'] 	= $this->userdata;
		$data['page'] 		= "Proses";
		$data['judul'] 		= "Proses Pengiriman";
		$data['deskripsi'] 	= "Proses Pengiriman";

		//$data['modal_kirim'] = show_my_modal('proses/proses_data', 'proses-kirim', $data, ' modal-xl');
        //echo show_my_modal('proses/proses_data', 'proses-kirim', $data, ' modal-xl');

		$this->template->views('proses/proses_kirim', $data);
	}
	public function ajax_kirim()
	{
        $tgl_sekarang= date('Y-m-d');
                        
		$list = $this->M_pengiriman->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $dataL) {
            $selisih = ((abs(strtotime ($tgl_sekarang) - strtotime ($dataL->tgl_buat)))/(60*60*24));
            
            $warna1 ='badge badge-danger';
            $warna2 ='badge badge-warning';
            $warna  ='badge badge-success';
            if ($selisih == '3' or $selisih >'3'){
                $warna=$warna1;
            }
            if ($selisih =='2'){
                $warna=$warna2;
            }
			$no++;
			$row = array();
			$row[] = $no. ' &nbsp;<small class="'.$warna.'"><i class="far fa-clock"></i> ' .$selisih.'</small>';
			$row[] = $dataL->id_kirim;
            $row[] = $dataL->tgl_buat;
			$row[] = $dataL->nama;
			$row[] = $dataL->penerima;
			$row[] = $dataL->nama_barang;
			$row[] = $dataL->tlp_penerima;
			$row[] = $dataL->tujuan;
			$row[] = $dataL->pembuat;
           	$row[]='<button class="btn btn-sm bg-gradient-success cetak-ulang" data-id="'.$dataL->id_kirim.'"><i class="fa fa-print"></i> Print</button>
				  <button class="btn btn-sm btn-primary kirim-barang" data-id="'.$dataL->id_kirim.'"><i class="fa fa-truck"></i> Kirim</button>
				  <button class="btn btn-sm btn-danger detail-datalaporan" data-id="'.$dataL->id_kirim.'"><i class="fa fa-times"></i> Batal</button>';
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->M_pengiriman->count_all(),
						"recordsFiltered" => $this->M_pengiriman->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}
	public function tampil() {
		//$data['datapengiriman'] = $this->M_pengiriman->select_all();
		$this->load->view('proses/list_data', $data);
	}
    public function cetak() {
		$id 				= $_POST['id'];
		$data['userdata'] 	= $this->userdata;
		$data['dataKirim'] = $this->M_transaksi->select_by_id($id);
		$data['detailKirim'] = $this->M_transaksi->select_by_detail($id);
		$data['detailSum'] = $this->M_transaksi->select_by_sum($id);

		echo show_my_print('proses/modals/modal_cetak_ttb', 'cetak-ttb', $data, ' modal-xl');
	}
	public function prosesTkirim() {
		
		$this->form_validation->set_rules('no_body', 'No Body', 'trim|required');

		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_pengiriman->insertProses($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Pengiriman Telah ditambahkan', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_err_msg('Data Pengiriman Gagal ditambahkan', '20px');
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
		$data['datalaporan'] = $this->M_pengiriman->select_by_id($id);

		echo show_my_modal('modals/modal_update_laporan', 'update-laporan', $data);
	}


	public function delete() {
		$id = $_POST['id'];
		$result = $this->M_kota->delete($id);
		
		if ($result > 0) {
			echo show_del_msg('Data Kota Berhasil dihapus', '20px');
		} else {
			echo show_err_msg('Data Kota Gagal dihapus', '20px');
		}
	}
    public function kirim() {
		$id 				= $_POST['id'];
		$data['userdata'] 	= $this->userdata;
		$data['dataKirim']  = $this->M_pengiriman->select_by_id($id);
		$data['detailKirim']= $this->M_pengiriman->select_by_detail($id);
		$data['detailSum']  = $this->M_pengiriman->select_by_sum($id);
        
        echo show_my_modal('proses/proses_data', 'proses-kirim', $data, ' modal-xl');
        //$this->load->view('proses/proses_data', $data);
	}
	public function detail() {
		$id 				= $_POST['id'];
		$data['userdata'] 	= $this->userdata;
		$data['datapengiriman'] = $this->M_pengiriman->select_by_id($id);

		echo show_my_modal('modals/modal_detail_laporan', 'detail-laporan', $data);
	}
public function carisp() {	
	$id=$_GET['nic_sp'];
	{
		$cari	= $this->M_pengiriman->select_sp($id)->result();
        echo json_encode($cari);
	   }
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