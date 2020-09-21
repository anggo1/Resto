<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_bak extends CI_Model {
	var $table = "b_acara";
	var $column_order = array(null, 'no_kasus','tgl_terima','akibat_perkara','diterima_oleh','pembuat'); //set column field database for datatable orderable
	var $column_search = array('no_kasus','tgl_terima','akibat_perkara','diterima_oleh','pembuat'); //set column field database for datatable searchable 
	var $order = array('id' => 'desc'); // default order 

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
		$this->db->from('b_acara');
		$this->db->order_by('no_kasus DESC');
		$this->db->limit('1500');


		$data = $this->db->get();

		return $data->result();
	}
	 
	public function select_by_id($id) {
		$sql = "SELECT * FROM b_acara WHERE no_kasus = '{$id}'";

		$data = $this->db->query($sql);
		return $data->result();
		//return $data->row();
	}
public function cetak_by_id($id) {
	$this->db->select('b_acara.*', FALSE);
        $this->db->select('laporan_lk.*', FALSE);
        $this->db->select('kode_laka.*', FALSE);
        $this->db->from('b_acara');
        $this->db->join('laporan_lk', 'b_acara.id_laporan = laporan_lk.id', 'inner');
        $this->db->join('kode_laka', 'laporan_lk.id_jenis = kode_laka.id_kode', 'inner');
        $this->db->where('b_acara.id=',$id);
        $query_result = $this->db->get();
		return $data = $query_result->result();
	}
	public function insert($data) {
		$sql = "INSERT INTO b_acara VALUES
		('','".$data['id_laporan']."','".$data['no_kasus']."','" .$data['akibat_perkara']."','" .$data['kesimpulan']."','" .$data['kerugian']."','" .$data['lain_lain']."','" .$data['pengganti_pihak_lain']."','" .$data['diterima_oleh']."','" .$data['tgl_terima']."','" .$data['kasus_ke']."','" .$data['resiko_png']."','" .$data['masa_batangan']."','" .$data['tgl_masuk']."','".$data['status_kendaraan']."','" .$data['catatan']."','" .$data['pembuat']."')";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}
	public function update($data) {
		
		$sql = "UPDATE b_acara SET akibat_perkara='" .$data['akibat_perkara']."',kesimpulan='" .$data['kesimpulan']."',kerugian='" .$data['kerugian']."',lain_lain='" .$data['lain_lain']."',pengganti_pihak_lain='" .$data['pengganti_pihak_lain']."',diterima_oleh='" .$data['diterima_oleh']."',tgl_terima='" .$data['tgl_terima']."',kasus_ke='" .$data['kasus_ke']."',resiko_png='" .$data['resiko_png']."',masa_batangan='" .$data['masa_batangan']."',tgl_masuk='" .$data['tgl_masuk']."',status_kendaraan='".$data['status_kendaraan']."',catatan='" .$data['catatan']."',pembuat='" .$data['pembuat']."' WHERE no_kasus='" .$data['no_kasus'] ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function insert_batch($data) {
		$this->db->insert_batch('b_acara', $data);
		
		return $this->db->affected_rows();
	}
public function total_rows() {
		$data = $this->db->get('b_acara');

		return $data->num_rows();
}
public function cari_surat($id) {	
		$result=$this->db->query("SELECT * FROM laporan_lk where no_kasus = '{$id}'")->result();
    $customer = array();
    foreach($result as $customer) {
		echo'<table width="852" colspan="3" align="center" class="table table-bordered table-striped" >

        <tr>
          <td width="45">&nbsp;</td>
		  <td width="217" height="24"><strong>  No. Kasus</strong></h4></td>
		  <td width="17" >:</td>
			  <td width="276" ><strong>'.$customer->no_kasus.'</strong></td>
		  <td width="203" ><strong>No. Surat</strong></td>
		  <td width="15" >:</td>
			  <td width="407" ><strong>'.$customer->no_surat.'</strong>
		      </td>
	    </tr>
        	<tr>
        	  <td >&nbsp;</td>
			  <td height="20" >Jam,Hari &amp; Tanggal</td>
			  <td height="20" >:</td>
			  <td>'.$customer->jam_lapor,',&nbsp;&nbsp; '.$customer->hari_lapor.',&nbsp;&nbsp;&nbsp;'.$customer->tgl_lapor.'</td>
			  <td>No Polisi</td>
			  <td>&nbsp;</td>
			  <td colspan="3">'.$customer->no_pol.'</td>
		    </tr>
		
			<tr>
			  <td>&nbsp;</td>
			  <td height="20"> Kendaraan terlibat</td>
			  <td height="20">:</td>
			  <td>'.$customer->kendaraan_terlibat.'</td>
			  <td ><div>No. Body</div></td>
			  <td >:</td>
			  <td colspan="3">'.$customer->no_body.'</td>
		    </tr>
			<tr>
			  <td>&nbsp;</td>
  <td height="20"> Pengemudi</td>
  <td height="20">:</td>
  <td height="20">'.$customer->nic_sp.',&nbsp;&nbsp;&nbsp;'.$customer->nama_sp.'</td>
  <td height="20"><div>Kernet </div></td>
  <td height="20">:</td>
  <td height="20"colspan="4">'.$customer->nic_kr.',&nbsp;&nbsp;&nbsp;'.$customer->nama_kr.'</td>
  </tr>
        
  <tr>
    <td>&nbsp;</td>
		  <td height="20">Wilayah Hukum</td>
		  <td height="20">:</td>
				  <td>'.$customer->wilayah.'</td>
				  <td><div>TKP Laka</div></td>
				  <td>:</td>
				  <td colspan="3">'.$customer->tkp_laka.'</td>
	    </tr>
          <tr>
            <td>&nbsp;</td>
            <td height="20">Ket Singkat</td>
            <td height="20">:</td>
            <td colspan="4">'.$customer->ket_perkara.'</td>
          </tr>
          <tr>
		  <input type="hidden" name="id_laporan" id="pembuat" value="'.$customer->no_kasus.'" />
		  <input type="hidden" name="id_laporan" id="pembuat" value="'.$customer->id.'" />
            <td>&nbsp;</td>
				  <td height="21">&nbsp;</td>
				  <td height="21">&nbsp;</td>
				  <td></textarea></td>
				  <td>&nbsp;</td>
				  <td>&nbsp;</td>
		    <td colspan="3">&nbsp;</td>
	    </tr>
</TABLE>';
			}
}


}