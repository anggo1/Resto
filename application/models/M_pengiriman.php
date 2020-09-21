<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pengiriman extends CI_Model {	

	public function select_all() {
		$this->db->select('*');
		$this->db->from('data_pengiriman');
        $this->db->join('detail_pengiriman', 'detail_pengiriman.id_kirim = data_pengiriman.id_kirim','left');        
        $this->db->where('data_pengiriman.kirim="N"');
		$this->db->order_by('data_pengiriman.tgl_buat ASC');
		$this->db->group_by('data_pengiriman.id_kirim');

		$data = $this->db->get();

		return $data->result();
	}
public function select_by_all($id) {
		 $this->db->select('data_pengiriman.*', FALSE);
        $this->db->from('data_pengiriman');
        $this->db->where('data_pengiriman.id_kirim=',$id);
        $query_result = $this->db->get();
		return $data = $query_result->result();
		//return $data->row();
	}
public function select_by_id($id) {
        $sql = "SELECT * FROM data_pengiriman 
                LEFT JOIN data_konsumen ON data_konsumen.id_konsumen=data_pengiriman.id_konsumen 
                WHERE data_pengiriman.id_kirim='{$id}' ";
		$data = $this->db->query($sql);

		return $data->result();
	}
    public function select_by_sum($id) {
        $sql = "SELECT sum(total_biaya)as total_biayanya,
        sum(beaToDoor)as total_ToDoor, 
        sum(jml_barang) as jumlah_barangnya, 
        sum(jml_asuransi) as jumlah_asuransi, 
        sum(jml_colli) as jumlah_collinya,
        GROUP_CONCAT(nama_barang) as barangnya,GROUP_CONCAT(keterangan) as ket_barang
        from detail_pengiriman 
        
        WHERE id_kirim='{$id}' ";
		$data = $this->db->query($sql);

		return $data->result();
	}
     public function select_by_detail($id) {
        $sql = "SELECT * FROM detail_pengiriman 
                LEFT JOIN data_satuan ON data_satuan.id_satuan=detail_pengiriman.id_satuan
                WHERE detail_pengiriman.id_kirim='{$id}' ";

		$data = $this->db->query($sql);

		return $data->result();
	}
public function select_by_posisi($id) {
		$sql = "SELECT COUNT(*) AS jml FROM laporan_lk ";

		$data = $this->db->query($sql);

		return $data->row();
	}
	public function insertProses($data) {
	$date= date("Ymd");
    $ci = get_instance();
    $query = "SELECT max(no_stt) AS maxKode FROM no_stt WHERE id_kirim LIKE '$date%'";
    $hasil = $ci->db->query($query)->row_array();
	$noOrder = $hasil['maxKode'];
	$noUrut = (int)substr($noOrder, 10, 4);
	$noUrut++;
	$tahun=substr($date, 0, 4);
	$bulan=substr($date, 4, 2);
	$tgl=substr($date, 6, 2);
	$kode_transaksi  = $tahun .$bulan .$tgl .sprintf("%04s", $noUrut);
        $date2 = $data['tgl_kirim'];
		$tgl2 = explode('-',$date2);		
		$ttmp2 = $tgl2[2]."-".$tgl2[1]."-".$tgl2[0].""; 

    $setorannye_brow =$data['biayanye']-$data['fee_driver']-$data['fee_agen_bayar'];
    if (empty($data['potong_to_door'])){ $data['potong_to_door'] ='N'; }
        $qstt = "INSERT INTO no_stt VALUES('$kode_transaksi','".$data['id_kirim']."')";
        $this->db->query($qstt);
        $queryU = "UPDATE data_pengiriman SET kirim ='Y' where id_kirim='".$data['detail_aslinya']."'";
        $this->db->query($queryU);
        
		$sql = "INSERT INTO data_selesai_kirim VALUES
		('', '".$data['detail_aslinya']."',
        '".$data['id_kirim']."',
        '".$kode_transaksi."',
        '".$data['id_konsumen']."',
        '$ttmp2',
        '".$data['asal']."',
        '".$data['tujuan']."',
        '".$data['no_body']."',
        '".$data['nic_sp']."',
        '".$data['nama_sp']."',
        '".$data['pembuat']."',
        '',
        '".$data['barangnye']."',
        '".$data['jumlahnye']."',
        '',
        '".$data['collinye']."',
        '".$data['biayanye']."',
        '".$data['keterangan_a']."',
        '".$data['fee_driver']."',
        '".$data['fee_agen_bayar']."',
        '',
        '',
        '',
        '',
        '$setorannye_brow',
        'N','N',
        '".$data['manual_stt']."',
        '".$data['tglBuat']."',
        '',
        '".$data['to_door']."',
        '',
        '".$data['pembayaran']."',
        'N','',
        '".$data['potong_to_door']."',
        '".$data['kernet']."',
        '".$data['total_asuransi']."')";
                                        
		$this->db->query($sql);

		return $this->db->affected_rows();
	}
	public function update($data) {
		$sql = "UPDATE laporan_lk SET no_pol='" .$data['no_pol'] ."',no_body='" .$data['no_body'] ."',nic_sp='" .$data['nic_sp'] ."',nama_sp='" .$data['nama_sp'] ."',nic_kr='" .$data['nic_kr'] ."',nama_kr='" .$data['nama_kr'] ."',berita_dari='" .$data['berita_dari'] ."',tkp_laka='" .$data['tkp_laka'] ."',kendaraan_terlibat='" .$data['kendaraan_terlibat'] ."',keadaan_png='" .$data['keadaan_png'] ."',korban='" .$data['korban'] ."',korban_benda='".$data['korban_benda'] ."',ket_perkara='".$data['ket_perkara']."',posisi_kendaraan='" .$data['posisi_kendaraan'] ."',kerugian_lawan='" .$data['kerugian_lawan'] ."',png_jln_sebelumnya='" .$data['png_jln_sebelumnya'] ."',hari_bap='".$data['hari_bap']."',tgl_bap='".$data['tgl_bap']."',jam_bap='".$data['jam_bap']."',wilayah='".$data['wilayah']."',pembuat='".$data['pembuat']."',jml_pp='".$data['jml_pp']."',tgl_masuk_png='".$data['tgl_masuk_png']."' WHERE no_kasus='" .$data['no_kasus'] ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function insert_batch($data) {
		$this->db->insert_batch('laporan_lk', $data);
		
		return $this->db->affected_rows();
	}
	public function cetak_by_id($id) {
        $this->db->select('laporan_lk.*', FALSE);
        $this->db->select('kode_laka.*', FALSE);
        $this->db->from('laporan_lk');
        $this->db->join('laporan_lk', 'b_acara.id_laporan = laporan_lk.id', 'inner');
        $this->db->join('kode_laka', 'laporan_lk.id_jenis = kode_laka.id_kode', 'inner');
        $this->db->where('laporan_lk.id=',$id);
        $query_result = $this->db->get();
		return $data = $query_result->result();
		//return $data->row();
	}
	public function select_kode() {
		$sql = " SELECT * FROM kode_laka";

		$data = $this->db->query($sql);

		return $data->result();
	}
    public function select_sp($id) {	
		$query= $this->db->get_where('sopir',array('nic_sp'=>$id));
        return $query;
	}
	
	public function total_rows() {
		$data = $this->db->get("data_pengiriman WHERE kirim = 'N'");
		return $data->num_rows();
}
}
/* End of file M_kota.php */
/* Location: ./application/models/M_kota.php */