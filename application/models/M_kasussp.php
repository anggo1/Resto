<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kasussp extends CI_Model {
	public function select_all() {
		$db2 = $this->load->database('kedua', TRUE);
		$db2->SELECT ('sp_kasus.id_lk AS id_lk, sp_kasus.nic_sp AS nic_sp, sopir.nama_sp AS nama_sp, sp_kasus.no_kasus AS no_kasus, sp_kasus.tgl_kasus AS tgl_kasus, sp_kasus.jenis_kasus AS jenis_kasus, sp_kasus.status AS status, sp_kasus.petugas AS petugas');
		
		//$db2->select('*');
		$db2->from('sp_kasus, sopir');
		$db2 ->where('sp_kasus.nic_sp=sopir.nic_sp'); // WHEREpegawai.id_kelamin = kelamin.id AND pegawai.id_posisi = posisi.id AND pegawai.id_kota = kota.id');
		$db2->limit('500');
		$db2->order_by('tgl_kasus DESC');
  		$data = $db2->get();
		
		//$sql = "SELECT nama_sp FROM sopir WHERE id = '{$id}'";

		//$this->db2->select('*');
		//$this->db2->from('sp_kasus');

		//$data = $this->db2->get();

		return $data->result();
	}

	public function select_by_id($id) {
		$sql = "SELECT * FROM kota WHERE id = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function select_by_pegawai($id) {
		$sql = " SELECT pegawai.id AS id, pegawai.nama AS pegawai, pegawai.telp AS telp, kota.nama AS kota, kelamin.nama AS kelamin, posisi.nama AS posisi FROM pegawai, kota, kelamin, posisi WHERE pegawai.id_kelamin = kelamin.id AND pegawai.id_posisi = posisi.id AND pegawai.id_kota = kota.id AND pegawai.id_kota={$id}";

		$data = $this->db->query($sql);

		return $data->result();
	}

	public function insert($data) {
		$sql = "INSERT INTO kota VALUES('','" .$data['kota'] ."')";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function insert_batch($data) {
		$this->db->insert_batch('kota', $data);
		
		return $this->db->affected_rows();
	}

	public function update($data) {
		$sql = "UPDATE kota SET nama='" .$data['kota'] ."' WHERE id='" .$data['id'] ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function delete($id_lk) {
		$db2 = $this->load->database('kedua', TRUE);
		$db2 ->DELETE ('FROM sp_kasus');
		$db2 ->where('id_lk=$id_lk');
		$data = $db2->get();
		//$this->db->query($sql);

		return $db2->affected_rows();
	}

	public function check_nama($nama) {
		$this->db->where('nama', $nama);
		$data = $this->db->get('kota');

		return $data->num_rows();
	}

	public function total_rows() {
		//$data = $this->db->get('kasus_sp');
$db2 = $this->load->database('kedua', TRUE);
$db2->from('sopir');
		
  		$data = $db2->get();
		
		return $data->num_rows();
		
	}
}

/* End of file M_kota.php */
/* Location: ./application/models/M_kota.php */