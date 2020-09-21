<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_masterdata extends CI_Model {	
	var $table = "data_konsumen";
	var $column_order = array(null, 'id_konsumen','nama','no_telp','no_ktp','alamat'); 
	var $column_search = array('id_konsumen','nama','no_telp','no_ktp','alamat'); //set column field database for datatable searchable 
	var $order = array('id_konsumen' => 'desc'); // default order 

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	private function _get_datatables_query()
	{
		
		$this->db->from($this->table);

		$i = 0;
	
		foreach ($this->column_search as $item) // loop column 
		{
			if($_POST['search']['value']) // if datatable send POST for search
			{
				
				if($i===0) // first loop
				{
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($item, $_POST['search']['value']);
				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if(count($this->column_search) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}
		
		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	function get_datatables()
	{
		$this->_get_datatables_query();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}
	public function select_satuan() {
		$sql = " SELECT * FROM data_satuan";

		$data = $this->db->query($sql);

		return $data->result();
	}
	public function select_cargo() {
		$sql = " SELECT * FROM data_bus";

		$data = $this->db->query($sql);

		return $data->result();
	}
	public function select_wilayah() {
		$sql = " SELECT * FROM pangkalan";

		$data = $this->db->query($sql);

		return $data->result();
	}
	function count_filtered()
	{
		$this->_get_datatables_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}
	
	public function select_all() {
		$this->db->select('*');
		$this->db->from('data_konsumen');
		$this->db->limit('1500');

		$data = $this->db->get();

		return $data->result();
	}
public function select_by_id($id) {
		 $this->db->select('laporan_lk.*', FALSE);
        $this->db->select('kode_laka.*', FALSE);
        $this->db->from('laporan_lk');
        $this->db->join('kode_laka', 'laporan_lk.id_jenis = kode_laka.id_kode', 'inner');
        $this->db->where('laporan_lk.id=',$id);
        $query_result = $this->db->get();
		return $data = $query_result->result();
		//return $data->row();
	}

public function select_by_posisi($id) {
		$sql = "SELECT COUNT(*) AS jml FROM laporan_lk ";

		$data = $this->db->query($sql);

		return $data->row();
	}
	public function insertKonsumen($data) {
        $date= date("Ymd");
        $ci = get_instance();
        $query = "SELECT max(id_konsumen) AS maxKode FROM data_konsumen WHERE id_konsumen LIKE '$date%'";
        $hasil = $ci->db->query($query)->row_array();
        $noOrder = $hasil['maxKode'];
        $noUrut = (int)substr($noOrder, 10, 4);
        $noUrut++;
        $tahun=substr($date, 0, 4);
        $bulan=substr($date, 4, 2);
        $tgl=substr($date, 6, 2);
        $kode_transaksi  = $tahun .$bulan .$tgl .sprintf("%04s", $noUrut);
        
		$sql = "INSERT INTO data_konsumen VALUES
		('$kode_transaksi','" .$data['nama']."','".$data['no_telp'] ."','" .$data['no_ktp'] ."','" .$data['alamat'] ."')";

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
		$db2 = $this->load->database('kedua', TRUE);
	
		$result = $db2->query("SELECT * FROM sopir WHERE nic_sp = '{$id}'")->result();
    $customers = array();
    foreach($result as $customer) {
        echo "$customer->nama_sp\n";
        //echo "$customer->tanggal_msk\n";
			}
	}
	public function select_sp_masuk($id) {	
		$db2 = $this->load->database('kedua', TRUE);
	
		$result = $db2->query("SELECT * FROM sopir WHERE nic_sp = '{$id}'")->result();
    $customers = array();
    foreach($result as $customer) {
        echo "$customer->tanggal_msk\n";
        //echo "$customer->tanggal_msk\n";
			}
	}
	public function select_kr($id) {	
		$db2 = $this->load->database('kedua', TRUE);
	
		$result = $db2->query("SELECT * FROM kernet WHERE nic_kr = '{$id}'")->result();
    $customers = array();
    foreach($result as $customer) {
        echo "$customer->nama_kr\n";
			}
	}
	public function total_rows() {
		$data = $this->db->get('laporan_lk');

		return $data->num_rows();
}
}
/* End of file M_kota.php */
/* Location: ./application/models/M_kota.php */