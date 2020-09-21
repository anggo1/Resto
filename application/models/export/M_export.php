<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_export extends CI_Model {
	
	public function select_list_absen() {
		$sql = " SELECT pegawai.departement AS departement,pegawai.nama_depan AS nama, userinfo.badgenumber AS nip,checkinout.userid, checkinout.checktime AS datelog,checkinout.checktype AS type FROM pegawai, userinfo, checkinout WHERE checkinout.userid = userinfo.userid AND checkinout.checktime BETWEEN  '2019-02-10' AND '2019-02-15' AND pegawai.departement='1'";
		
		$data = $this->db->query($sql);

		return $data->result();
	}
	public function cari_harian($date =null,$date2=null)
	{
		$this->db->select('data_pengiriman.*', FALSE);
        $this->db->select('detail_pengiriman.*', FALSE);
        $this->db->from('data_pengiriman');
        $this->db->join('detail_pengiriman', 'detail_pengiriman.id_kirim = data_pengiriman.id_kirim', 'left');
		$this->db->where('data_pengiriman.tgl_buat BETWEEN "'.date($date).'"AND"'.date($date2).'"');
        $query_result = $this->db->get();
		return $data = $query_result->result();
		// $this->db->select('data_pengiriman.*', FALSE);
        //$this->db->from('data_pengiriman');
		//$this->db->where('data_pengiriman.tgl_buat BETWEEN "'.date($date).'"AND"'.date($date2).'"');
		//$this->db->group_by("nip"); 
		//$this->db->order_by("nip", "ASC"); 
        //$query_result = $this->db->get();
		
		//return $data = $query_result->result();

		//$data = $this->db->query("SELECT //pegawai.nip,pegawai.nama_depan,pegawai.departement,userinfo.userid,userinfo.defaultdeptid,userinfo.badgenumber,checkinout.user//id,checkinout.checktime,checkinout.checktype,departement.departement
		//FROM pegawai 
		//LEFT JOIN userinfo ON userinfo.badgenumber=pegawai.nip
		//LEFT JOIN departement ON departement.id_departement=pegawai.departement
		//LEFT JOIN checkinout ON checkinout.userid=userinfo.userid
		//WHERE pegawai.departement='".$departement."' AND checkinout.checktime BETWEEN  '".date($date)." 00:00:00' AND '".date($date2)." 23:59:59' ORDER BY nip, checktime ASC");
		
		//return $data->result();
	}
	
	
	public function selectDevice() {
		$sql = "SELECT * FROM iclock ";

		$data = $this->db->query($sql);
		
		return $data->result();
	}
	public function select_by_idposisi($id) {
		$sql = "SELECT * FROM posisi WHERE id_posisi = '{$id}'";

		$data = $this->db->query($sql);
		return $data->row();
	}
	public function lihat_absen($departement){
    $sql = " SELECT pegawai.departement AS departement,pegawai.nama_depan AS nama, userinfo.badgenumber AS nip,checkinout.userid, checkinout.checktime AS datelog,checkinout.checktype AS type FROM pegawai, userinfo, checkinout WHERE checkinout.userid = userinfo.userid AND pegawai.departement='{$departement}'";
		
		$data = $this->db->query($sql);

		return $data->result();
  }
	
	public function cari_absen($departement = null,$date =null,$date2=null)
	{
		//$this->db->select('pegawai.*', FALSE);
        //$this->db->select('userinfo.*', FALSE);
        //$this->db->select('checkinout.*', FALSE);
        //$this->db->select('departement.*', FALSE);
        //$this->db->from('pegawai');
        //$this->db->join('departement', 'departement.id_departement = pegawai.departement', 'left');
        //$this->db->join('userinfo', 'userinfo.badgenumber = pegawai.nip', 'left');
        //$this->db->join('checkinout', 'checkinout.userid = userinfo.userid', 'left');
        //$this->db->where('pegawai.departement',$departement);
		//$this->db->where('checkinout.checktime BETWEEN "'.date($date).'"AND"'.date($date2).'"');
        //$query_result = $this->db->get();
		//return $data = $query_result->result();
		

		$data = $this->db->query("SELECT pegawai.nip,pegawai.nama_depan,pegawai.departement,userinfo.userid,userinfo.defaultdeptid,userinfo.badgenumber,checkinout.userid,checkinout.checktime,checkinout.checktype,departement.departement
		FROM pegawai 
		LEFT JOIN userinfo ON userinfo.badgenumber=pegawai.nip
		LEFT JOIN departement ON departement.id_departement=pegawai.departement
		LEFT JOIN checkinout ON checkinout.userid=userinfo.userid
		WHERE pegawai.departement='".$departement."' AND checkinout.checktime BETWEEN  '".date($date)." 00:00:00' AND '".date($date2)." 23:59:59' ORDER BY nip, checktime ASC");
		
		return $data->result();
	}
	
	public function cari_absen_tempat($penempatan = null,$date =null,$date2=null)
	{

		$data = $this->db->query("SELECT pegawai.nip,pegawai.nama_depan,pegawai.penempatan,userinfo.userid,userinfo.defaultdeptid,userinfo.badgenumber,checkinout.userid,checkinout.checktime,checkinout.checktype,penempatan.penempatan
		FROM pegawai 
		LEFT JOIN userinfo ON userinfo.badgenumber=pegawai.nip
		LEFT JOIN penempatan ON penempatan.id_penempatan=pegawai.penempatan
		LEFT JOIN checkinout ON checkinout.userid=userinfo.userid
		WHERE pegawai.penempatan='".$penempatan."' AND checkinout.checktime BETWEEN  '".date($date)." 00:00:00' AND '".date($date2)." 23:59:59' ORDER BY nip, checktime ASC");

		return $data->result();
	}
	public function rekap_lokasi($penempatan = null,$date =null,$date2=null)
	{
		$this->db->select('pegawai.*', FALSE);
        $this->db->select('userinfo.*', FALSE);
        $this->db->select('checkinout.*', FALSE);
        $this->db->select('penempatan.*', FALSE);
		//$this->db->select_sum("IF(checkinout.checktype='0', 1, 0)","masuk");	
		//$this->db->select_sum("IF(checkinout.checktype='1', 1, 0)","pulang");	
        $this->db->from('pegawai');
        $this->db->join('userinfo', 'userinfo.badgenumber = pegawai.nip', 'left');
        $this->db->join('penempatan', 'penempatan.id_penempatan = pegawai.penempatan', 'left');
        $this->db->join('checkinout', 'checkinout.userid = userinfo.userid', 'left');
		$this->db->where('pegawai.penempatan',$penempatan);
		$this->db->where('checkinout.checktime BETWEEN "'.date($date).' 00:00:00 "AND"'.date($date2).' 23:59:00"');
		$this->db->group_by("nip"); 
		$this->db->order_by("nip", "ASC"); 
        $query_result = $this->db->get();
		
		return $data = $query_result->result();
		
	}
	public function rekap_lokasi_id($Uid = null,$date =null,$date2=null)
	{
        $this->db->select('checkinout.*', FALSE);
        $this->db->from('checkinout');
		$this->db->where('checkinout.userid',$Uid);
		$this->db->where('checkinout.checktime BETWEEN "'.date($date).'"AND"'.date($date2).'"');
		//$this->db->group_by("nip"); 
		//$this->db->order_by("nip", "ASC"); 
        $query_result = $this->db->get();
		
		return $data = $query_result->result();
		
	}
	
	public function cari_absen_pers($nip = null,$date =null,$date2=null)
	{

		$data = $this->db->query("SELECT pegawai.nip,pegawai.nama_depan,userinfo.userid,userinfo.defaultdeptid,userinfo.badgenumber,checkinout.userid,checkinout.checktime,checkinout.checktype
		FROM pegawai 
		LEFT JOIN userinfo ON userinfo.badgenumber=pegawai.nip
		LEFT JOIN checkinout ON checkinout.userid=userinfo.userid
		WHERE pegawai.nip='".$nip."' AND checkinout.checktime BETWEEN  '".date($date)." 00:00:00' AND '".date($date2)." 23:59:59'ORDER BY nip, checktime ASC");

		return $data->result();
	}
	
}

/* End of file M_pegawai.php */
/* Location: ./application/models/M_pegawai.php */