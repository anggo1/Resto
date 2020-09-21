<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Export extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_masterdata');
		$this->load->model('M_report');
	}


	public function exportHari() {
        $date = $this->input->get('tgl1', TRUE);
        $date2 = $this->input->get('tgl2', TRUE);
		$tgl1 = explode('-',$date);	
		$tgl2 = explode('-',$date2);		
		$ttmp1 = $tgl1[2]."-".$tgl1[1]."-".$tgl1[0]."";
		$ttmp2 = $tgl2[2]."-".$tgl2[1]."-".$tgl2[0]."";
		error_reporting(E_ALL);
    
		include_once './assets/phpexcel/Classes/PHPExcel.php';
		$objPHPExcel = new PHPExcel();
    	    $data = $this->M_report->cari_harian($ttmp1,$ttmp2);  
			
		//$data = $this->M_pegawai->select_all_pegawai();

		$objPHPExcel = new PHPExcel(); 
		$objPHPExcel->setActiveSheetIndex(0); 
		$rowCount = 1; 
	
		$objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, "ID Kirim");
		$objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, "Tgl Buat");
		$objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, "Pengirim");
		$objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, "Penerima");
		$objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, "Barang");
		$objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, "Tlp Penerima");
		$objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, "Asal");
		$objPHPExcel->getActiveSheet()->SetCellValue('H'.$rowCount, "Tujuan");
		$objPHPExcel->getActiveSheet()->SetCellValue('I'.$rowCount, "Pembuat");
		$rowCount++;

		foreach($data as $value){			
			$datetime = new DateTime($value->tgl_buat);
			$date = $datetime->format('d/m/Y');

		    $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $value->id_kirim); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $date); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, $value->nama); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, $value->penerima); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, $value->nama_barang); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, $value->tlp_penerima); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, $value->asal); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('H'.$rowCount, $value->tujuan); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('I'.$rowCount, $value->pembuat); 
		    $rowCount++; 
		} 

		$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel); 
		$objWriter->save('./assets/excel/Report Data Harian.xlsx'); 

		$this->load->helper('download');
		force_download('./assets/excel/Report Data Harian.xlsx', NULL);
	}
	
	public function exportLocation() {
		$loc = $this->input->get('kota', TRUE);
        $date = $this->input->get('tgl1', TRUE);
        $date2 = $this->input->get('tgl2', TRUE);
		$tgl1 = explode('-',$date);	
		$tgl2 = explode('-',$date2);		
		$ttmp1 = $tgl1[2]."-".$tgl1[1]."-".$tgl1[0]."";
		$ttmp2 = $tgl2[2]."-".$tgl2[1]."-".$tgl2[0]."";
		error_reporting(E_ALL);
    
		include_once './assets/phpexcel/Classes/PHPExcel.php';
		$objPHPExcel = new PHPExcel();
    	    $data = $this->M_absensi->cari_absen_tempat($loc,$ttmp1,$ttmp2);  
			
		//$data = $this->M_pegawai->select_all_pegawai();

		$objPHPExcel = new PHPExcel(); 
		$objPHPExcel->setActiveSheetIndex(0); 
		$rowCount = 1; 

		$objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, "NIP");
		$objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, "Nama");
		$objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, "Penempatan");
		$objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, "Time Log");
		$objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, "CheckType");
		$objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, "Deskripsi");
		$rowCount++;

		foreach($data as $value){			
			$datetime = new DateTime($value->checktime);
			$date = $datetime->format('d-m-Y H:i:s');
			$status='';
			if($value->checktype=='0') { $status='Masuk'; } else { $status='Pulang';}
		    $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $value->nip); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $value->nama_depan); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, $value->penempatan); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, $date); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, $value->checktype); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, $status);  
		    $rowCount++; 
		} 

		$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel); 
		$objWriter->save('./assets/excel/Report PerLokasi.xlsx'); 

		$this->load->helper('download');
		force_download('./assets/excel/Report PerLokasi.xlsx', NULL);
	}
		
	public function personal() {
		$data['userdata'] = $this->userdata;
		$data['dataPegawai'] = $this->M_pegawai->select_all();

		$data['page'] = "Report";
		$data['judul'] = "Report";
		$data['deskripsi'] = "Laporan Perkaryawan";
		$this->template->views('absensi/hpersonal', $data);
	}
	public function ByNip() {
		$data['userdata'] = $this->userdata;
		$data['dataPegawai'] = $this->M_pegawai->select_all();

		$data['page'] = "Report";
		$data['judul'] = "Report";
		$data['deskripsi'] = "Laporan Perkaryawan";
		$nip = $this->input->post('nip', TRUE);
        $date = $this->input->post('date', TRUE);
        $date2 = $this->input->post('date2', TRUE);
		$tgl1 = explode('-',$date);	
		$tgl2 = explode('-',$date2);		
		$ttmp1 = $tgl1[2]."-".$tgl1[1]."-".$tgl1[0]."";
		$ttmp2 = $tgl2[2]."-".$tgl2[1]."-".$tgl2[0]."";
		
    	    $data['dataAbsen'] = $this->M_absensi->cari_absen_pers($nip,$ttmp1,$ttmp2); 

		$this->template->views('absensi/hpersonal', $data);
	    }
		
	public function device() {
		$data['userdata'] = $this->userdata;
		$data['dataDevice'] = $this->M_absensi->selectDevice();

		$data['page'] = "Absensi";
		$data['judul'] = "Pengaturan/Mesin";
		$data['deskripsi'] = "Pengaturan Mesin";

		//$data['modal_tambah_posisi'] = show_my_modal('admin/set/modals/modal_tambah_posisi', 'tambah-posisi', $data);
		
//echo $data['ip'];
		$this->template->views('device/home', $data);
		
	}
	
	public function exportPersonal() {
		$nip = $this->input->get('nip', TRUE);
        $date = $this->input->get('tgl1', TRUE);
        $date2 = $this->input->get('tgl2', TRUE);
		$tgl1 = explode('-',$date);	
		$tgl2 = explode('-',$date2);		
		$ttmp1 = $tgl1[2]."-".$tgl1[1]."-".$tgl1[0]."";
		$ttmp2 = $tgl2[2]."-".$tgl2[1]."-".$tgl2[0]."";
		error_reporting(E_ALL);
    
		include_once './assets/phpexcel/Classes/PHPExcel.php';
		$objPHPExcel = new PHPExcel();
    	    $data = $this->M_absensi->cari_absen_pers($nip,$ttmp1,$ttmp2);  
			
		//$data = $this->M_pegawai->select_all_pegawai();

		$objPHPExcel = new PHPExcel(); 
		$objPHPExcel->setActiveSheetIndex(0); 
		$rowCount = 1; 

		$objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, "NIP");
		$objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, "Nama");
		$objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, "Time Log");
		$objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, "CheckType");
		$objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, "Deskripsi");
		$rowCount++;

		foreach($data as $value){			
			$datetime = new DateTime($value->checktime);
			$date = $datetime->format('d-m-Y H:i:s');
			$status='';
			if($value->checktype=='0') { $status='Masuk'; } else { $status='Pulang';}
		    $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $value->nip); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $value->nama_depan); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, $date); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, $value->checktype); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, $status); 
		    $rowCount++; 
		} 

		$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel); 
		$objWriter->save('./assets/excel/Report Personal.xlsx'); 

		$this->load->helper('download');
		force_download('./assets/excel/Report Personal.xlsx', NULL);
	}

}

/* End of file Pegawai.php */
/* Location: ./application/controllers/Pegawai.php */