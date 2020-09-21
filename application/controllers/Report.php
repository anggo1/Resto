<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_masterdata');
		$this->load->model('M_report');
		$this->load->helper('tgl_indo');
		//$this->load->model('tgl_indo');
	}

	public function departement() {
		$data['userdata'] = $this->userdata;
		$data['dataPegawai'] = $this->M_pegawai->select_all();
		$data['databagian'] = $this->M_pegawai->select_bagian();
		$data['page'] = "Report";
		$data['judul'] = "Report";
		$data['deskripsi'] = "Laporan Per Departement";
		$this->template->views('absensi/home', $data);
	}
	

	public function harian() {
		$data['userdata'] = $this->userdata;
		//$data['dataPegawai'] = $this->M_pegawai->select_all();

		$data['page'] = "Report";
		$data['judul'] = "Laporan Harian";
		$data['deskripsi'] = "Pencarian per periode";

		$this->template->views('report/rharian', $data);
			
	    }
	public function charian() {
		$data['userdata'] = $this->userdata;
		//$data['dataPegawai'] = $this->M_pegawai->select_all();

		$data['page'] = "Report";
		$data['judul'] = "Laporan Harian";
		$data['deskripsi'] = "Pencarian per periode";
	
        $date = $this->input->post('date', TRUE);
        $date2 = $this->input->post('date2', TRUE);
		$tgl1 = explode('-',$date);	
		$tgl2 = explode('-',$date2);		
		$ttmp1 = $tgl1[2]."-".$tgl1[1]."-".$tgl1[0]."";
		$ttmp2 = $tgl2[2]."-".$tgl2[1]."-".$tgl2[0]."";
		
    	    $data['dataHarian'] = $this->M_report->cari_harian($ttmp1,$ttmp2); 

		$this->template->views('report/rharian', $data);
			
	    }
	public function Setoran() {
		$data['userdata'] = $this->userdata;
		//$data['dataPegawai'] = $this->M_pegawai->select_all();

		$data['page'] = "Report";
		$data['judul'] = "Setoran";
		$data['deskripsi'] = "Pencarian per periode";

		$this->template->views('report/rsetor', $data);
			
	    }
	public function cSetoran() {
		$data['userdata'] = $this->userdata;
		//$data['dataPegawai'] = $this->M_pegawai->select_all();

		$data['page'] = "Report";
		$data['judul'] = "Setoran";
		$data['deskripsi'] = "Pencarian per periode";
	
        $date = $this->input->post('date', TRUE);
        $date2 = $this->input->post('date2', TRUE);
		$tgl1 = explode('-',$date);	
		$tgl2 = explode('-',$date2);		
		$ttmp1 = $tgl1[2]."-".$tgl1[1]."-".$tgl1[0]."";
		$ttmp2 = $tgl2[2]."-".$tgl2[1]."-".$tgl2[0]."";
		
    	    $data['dataSetoran'] = $this->M_report->cari_setoran($ttmp1,$ttmp2); 

		$this->template->views('report/rsetor', $data);
			
	    }
	public function Pengiriman() {
		$data['userdata'] = $this->userdata;
		//$data['dataPegawai'] = $this->M_pegawai->select_all();

		$data['page'] = "Report";
		$data['judul'] = "Pengiriman";
		$data['deskripsi'] = "Pencarian per periode";

		$this->template->views('report/rpengiriman', $data);
			
	    }
	public function cPengiriman() {
		$data['userdata'] = $this->userdata;
		//$data['dataPegawai'] = $this->M_pegawai->select_all();

		$data['page'] = "Report";
		$data['judul'] = "Pengiriman";
		$data['deskripsi'] = "Pencarian per periode";
	
        $date = $this->input->post('date', TRUE);
        $date2 = $this->input->post('date2', TRUE);
		$tgl1 = explode('-',$date);	
		$tgl2 = explode('-',$date2);		
		$ttmp1 = $tgl1[2]."-".$tgl1[1]."-".$tgl1[0]."";
		$ttmp2 = $tgl2[2]."-".$tgl2[1]."-".$tgl2[0]."";
		
    	    $data['dataPengiriman'] = $this->M_report->cari_pengiriman($ttmp1,$ttmp2); 

		$this->template->views('report/rpengiriman', $data);
			
	    }
	public function Pengiriman_pertanggal() {
		$data['userdata'] = $this->userdata;
		//$data['dataPegawai'] = $this->M_pegawai->select_all();

		$data['page'] = "Report";
		$data['judul'] = "Pengiriman Pertanggal";
		$data['deskripsi'] = "Pencarian per periode";

		$this->template->views('report/rpengiriman_pertanggal', $data);
			
	    }
	public function cPengiriman_pertanggal() {
		$data['userdata'] = $this->userdata;
		//$data['dataPegawai'] = $this->M_pegawai->select_all();

		$data['page'] = "Report";
		$data['judul'] = "Pengiriman Pertanggal";
		$data['deskripsi'] = "Pencarian per periode";
	
        $date = $this->input->post('date', TRUE);
        $date2 = $this->input->post('date2', TRUE);
		$tgl1 = explode('-',$date);	
		$tgl2 = explode('-',$date2);		
		$ttmp1 = $tgl1[2]."-".$tgl1[1]."-".$tgl1[0]."";
		$ttmp2 = $tgl2[2]."-".$tgl2[1]."-".$tgl2[0]."";
		
    	    $data['dataPengiriman_pertanggal'] = $this->M_report->cari_pengiriman_pertanggal($ttmp1,$ttmp2); 

		$this->template->views('report/rpengiriman_pertanggal', $data);
			
	    }
		
	
	
	
	public function ByLoc() {
		$data['userdata'] = $this->userdata;
		$data['dataPegawai'] = $this->M_pegawai->select_all();
		$data['dataKota'] = $this->M_pegawai->select_tempat();
		$data['page'] = "Report";
		$data['judul'] = "Report";
		$data['deskripsi'] = "Laporan Perlokasi";
		$penempatan = $this->input->post('penempatan', TRUE);
        $date = $this->input->post('date', TRUE);
        $date2 = $this->input->post('date2', TRUE);
		$tgl1 = explode('-',$date);	
		$tgl2 = explode('-',$date2);		
		$ttmp1 = $tgl1[2]."-".$tgl1[1]."-".$tgl1[0]."";
		$ttmp2 = $tgl2[2]."-".$tgl2[1]."-".$tgl2[0]."";
		
    	    $data['dataAbsen'] = $this->M_absensi->cari_absen_tempat($penempatan,$ttmp1,$ttmp2);  
		
			$this->template->views('absensi/hlocation', $data);
			
	    }
	public function reloc() {
		$data['userdata'] = $this->userdata;
		$data['dataPegawai'] = $this->M_pegawai->select_all();
		$data['dataKota'] = $this->M_pegawai->select_tempat();
		$data['page'] = "Report";
		$data['judul'] = "Report";
		$data['deskripsi'] = "Rekapitulasi Perlokasi";
		$this->template->views('absensi/hreloc', $data);
		
	}
	public function ByreLoc() {
		$data['userdata'] = $this->userdata;
		$data['dataPegawai'] = $this->M_pegawai->select_all();
		$data['dataKota'] = $this->M_pegawai->select_tempat();
		$data['page'] = "Report";
		$data['judul'] = "Report";
		$data['deskripsi'] = "Rekapitulasi Perlokasi";
		$penempatan = $this->input->post('penempatan', TRUE);
        $date = $this->input->post('date', TRUE);
        $date2 = $this->input->post('date2', TRUE);
				
				
    	    $data['dataAbsen'] = $this->M_absensi->rekap_lokasi($penempatan,$date,$date2);  
			if ($data > 0){
			$begin = new DateTime($date);
				$end = new DateTime($date2);
				$end = $end->modify('+1 day'); 
				 
				$interval = new DateInterval('P1D'); //referensi : https://en.wikipedia.org/wiki/ISO_8601#Durations
				$daterange = new DatePeriod($begin, $interval ,$end);
				 
				foreach ($daterange as $hasil) {
					$hasilnye=$hasil->format("d");
					
				}	
				
		} 
					
			$this->template->views('absensi/hreloc', $data);
			
			
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