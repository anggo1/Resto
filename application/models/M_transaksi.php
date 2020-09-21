<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_transaksi extends CI_Model {
    function get_all_menu(){
		$hsl=$this->db->query("SELECT * FROM tbl_menu");
		return $hsl;	
	}

	function simpan_menu($nama,$deskripsi,$harga,$kategori,$kat_nama,$gambar){
		$hsl=$this->db->query("INSERT INTO tbl_menu (menu_nama,menu_deskripsi,menu_harga_baru,menu_kategori_id,menu_kategori_nama,menu_gambar) VALUES ('$nama','$deskripsi','$harga','$kategori','$kat_nama','$gambar')");
		return $hsl;
	}

	//UPDATE MENU DENGAN GAMBAR //
	function update_menu_tanpa_harga_baru($kode,$nama,$deskripsi,$harga_lama,$kategori,$kat_nama,$gambar){
		$hsl=$this->db->query("UPDATE tbl_menu set menu_nama='$nama',menu_deskripsi='$deskripsi',menu_harga_baru='$harga_lama',menu_kategori_id='$kategori',menu_kategori_nama='$kat_nama',menu_gambar='$gambar' where menu_id='$kode'");
		return $hsl;
	}
	function update_menu_dengan_harga_baru($kode,$nama,$deskripsi,$harga_lama,$harga_baru,$kategori,$kat_nama,$gambar){
		$hsl=$this->db->query("UPDATE tbl_menu set menu_nama='$nama',menu_deskripsi='$deskripsi',menu_harga_lama='$harga_lama',menu_harga_baru='$harga_baru',menu_kategori_id='$kategori',menu_kategori_nama='$kat_nama',menu_gambar='$gambar' where menu_id='$kode'");
		return $hsl;
	}
	//END EDIT MENU DENGAN GAMBAR//

	//UPDATE MENU TANPA GAMBAR//
	function update_menu_tanpa_harga_baru_tanpa_gambar($kode,$nama,$deskripsi,$harga_lama,$kategori,$kat_nama){
		$hsl=$this->db->query("UPDATE tbl_menu set menu_nama='$nama',menu_deskripsi='$deskripsi',menu_harga_baru='$harga_lama',menu_kategori_id='$kategori',menu_kategori_nama='$kat_nama' where menu_id='$kode'");
		return $hsl;
	}
	function update_menu_dengan_harga_baru_tanpa_gambar($kode,$nama,$deskripsi,$harga_lama,$harga_baru,$kategori,$kat_nama){
		$hsl=$this->db->query("UPDATE tbl_menu set menu_nama='$nama',menu_deskripsi='$deskripsi',menu_harga_lama='$harga_lama',menu_harga_baru='$harga_baru',menu_kategori_id='$kategori',menu_kategori_nama='$kat_nama' where menu_id='$kode'");
		return $hsl;
	}
	//END UPDATE MENU TANPA GAMBAR//

	function hapus_menu($kode){
		$hsl=$this->db->query("DELETE FROM tbl_menu where menu_id='$kode'");
		return $hsl;
	}


	//MODEL UNTUK MOBILE
	function hot_promo(){
		$hsl=$this->db->query("SELECT menu_id,menu_nama,menu_deskripsi,LEFT(menu_harga_lama,2) AS harga_lama,LEFT(menu_harga_baru,2) AS harga_baru,menu_harga_lama,menu_harga_baru,menu_likes,menu_kategori_id,menu_kategori_nama,menu_gambar FROM tbl_menu WHERE (menu_harga_lama-menu_harga_baru)>=0 ORDER BY (menu_harga_lama-menu_harga_baru) DESC");
		return $hsl;
	}
	function makanan(){
		$hsl=$this->db->query("SELECT menu_id,menu_nama,menu_deskripsi,LEFT(menu_harga_lama,2) AS harga_lama,LEFT(menu_harga_baru,2) AS harga_baru,menu_harga_lama,menu_harga_baru,menu_likes,menu_kategori_id,menu_kategori_nama,menu_gambar FROM tbl_menu WHERE menu_kategori_id='1' ORDER BY menu_id DESC");
		return $hsl;
	}
	function minuman(){
		$hsl=$this->db->query("SELECT menu_id,menu_nama,menu_deskripsi,LEFT(menu_harga_lama,2) AS harga_lama,LEFT(menu_harga_baru,2) AS harga_baru,menu_harga_lama,menu_harga_baru,menu_likes,menu_kategori_id,menu_kategori_nama,menu_gambar FROM tbl_menu WHERE menu_kategori_id='2' ORDER BY menu_id DESC");
		return $hsl;
	}
	function favorite(){
		$hsl=$this->db->query("SELECT menu_id,menu_nama,menu_deskripsi,LEFT(menu_harga_lama,2) AS harga_lama,LEFT(menu_harga_baru,2) AS harga_baru,menu_harga_lama,menu_harga_baru,menu_likes,menu_kategori_id,menu_kategori_nama,menu_gambar FROM tbl_menu WHERE menu_likes <> 0 ORDER BY menu_likes DESC");
		return $hsl;
	}

	function detail_menu($kode){
		$sql = "SELECT * FROM tbl_menu WHERE menu_id ='{$kode}'";

		$data = $this->db->query($sql);
		return $data->result();	
	}
    function detail_inv($no_inv){
		$sql = "SELECT * FROM tbl_detail_penjualan WHERE no_inv ='{$no_inv}'";

		$data = $this->db->query($sql);
		return $data->result();	
	}

	function add_like($kode){
		$hsl=$this->db->query("UPDATE tbl_menu SET menu_likes=menu_likes+1 where menu_id='$kode'");
		return $hsl;	
	}

    //Home Mobile
    function cek_inv($user) {
        
		$sql = "SELECT * FROM tbl_penjualan WHERE user_id = '{$user}' AND inv_status = 'N'";

		$data = $this->db->query($sql);
		return $data->result();
	}
    function cek_inv_user($user) {
        date_default_timezone_set('Asia/Jakarta');
        $today = date("Y-m-d");
		$sql = "SELECT * FROM tbl_penjualan WHERE user_id = '{$user}' AND inv_tgl like '%".$today."%' AND inv_status='Y'";

		$data = $this->db->query($sql);
		return $data->result();
	}
    function edit_user_inv($id) {
        date_default_timezone_set('Asia/Jakarta');
        $today = date("Y-m-d");
		$sql = "UPDATE tbl_penjualan SET inv_status='N' WHERE id_inv='{$id}'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}
    function cek_detail_inv($inv) {
        
		$sql = "SELECT * FROM tbl_detail_penjualan WHERE no_inv = '{$inv}'";

		$data = $this->db->query($sql);
		return $data->result();
	}
    function total_makanan() {
        
		$data = $this->db->get_where('tbl_menu', 'menu_kategori_id=1');

		return $data->num_rows();
	}
    function total_minuman() {
        
		$data = $this->db->get_where('tbl_menu', 'menu_kategori_id=2');

		return $data->num_rows();
	}
     public function select_inv_update($data){
       
		$sql = "UPDATE tbl_penjualan SET inv_total	='" .$data['grand_total']."', inv_status='Y' WHERE id_inv='" .$data['id_inv']."'";
		$this->db->query($sql);
        
		return $this->db->affected_rows();
	}
    
		
    public function insert_detail($data){
		//$sql1 = "UPDATE tbl_pendaftaran SET status	='Y' WHERE no_rawat='" .$data['no_rawat'] ."'";
		//$this->db->query($sql1);
		//$sql2 = "UPDATE tbl_rekamedis_pasien SET 
		//			kode_operasi	='" .$data['kode_operasi'] ."',
		//			ket_operasi='" .$data['keterangan'] ."' WHERE no_rawat='" .$data['no_rawat'] ."'";
		//$this->db->query($sql2);
		$total_harga=$data['harga']*$data['jumlah'];
        
		$sql = "INSERT INTO tbl_detail_penjualan VALUES
		('','" .$data['no_inv'] ."',
		'" .$data['id_menu'] ."',
		'" .$data['nama_menu'] ."',
		'" .$data['harga'] ."',
		'" .$data['jumlah'] ."',
		$total_harga,
		'" .$data['user_id'] ."')";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}
    public function delete_detail_menu($id) {
		$sql = "DELETE FROM tbl_detail_penjualan WHERE id_detail='{$id}'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}
	//END MODEL UNTUK MOBILE


	public function cari_riwayat_konsumen($id) {
		$sql = "SELECT *
				FROM data_pengiriman
				LEFT JOIN data_selesai_kirim ON data_selesai_kirim.id_konsumen=data_pengiriman.id_konsumen
				LEFT JOIN data_konsumen ON data_konsumen.id_konsumen=data_pengiriman.id_konsumen
				LEFT JOIN pangkalan ON pangkalan.pangkalan=data_pengiriman.asal WHERE data_pengiriman.id_konsumen = '{$id}' ORDER BY data_pengiriman.id_konsumen DESC LIMIT 1";

		$data = $this->db->query($sql);
		return $data->result();
		//return $data->row();
	}
	public function cari_nama_konsumen($id) {
		$sql = "SELECT * FROM data_konsumen WHERE nama like '%{$id}%' OR no_telp like '%{$id}%'";

		$data = $this->db->query($sql);
		return $data->result();
		//return $data->row();
	}
	public function select_wilayah() {
		$sql = " SELECT * FROM pangkalan";

		$data = $this->db->query($sql);

		return $data->result();
	}
    public function select_kirim($id) {
		$sql = "SELECT * FROM detail_pengiriman WHERE id_kirim ='{$id}'";

		$data = $this->db->query($sql);
		return $data->result();
		//return $data->row();
	}
    public function insertkirim($data) {
    $datenow= date("Y-m-d");
	//$hrg_satuannye = $data['hrg_satuan'];
	//$nama_satuan   = $data['nama_satuan'];
	//$jml_barang    = $data['jml_barang'];
	//$jml_colli     = $data['jml_colli'];
	//$total_biaya   = $data['total_biaya'];
	//$beaToDoor     = $data['beaToDoor'];	
	//$harga_minimum = $data['harga_minimum'];
	//$langganan     = $data['langganan'];
	//$minimum       = $data['minimum'];
	//$potong_diskon = $data['potong_diskon'];
	//$d_persen      = $data['d_persen'];
	//$d_kg          = $data['d_kg'];
        
    if (!empty($data['potong_diskon']) && $data['potong_diskon']=='potong_kg'){
		$data['jml_barang'] =$data['jml_barang'] - $data['d_kg'];
		}	
	if ($data['nama_satuan']=='KILOGRAM/RG' && $data['jml_barang'] <=5){
		$data['total_biaya']=$data['harga_minimum'] * 1;		
		}
	if ($data['nama_satuan']=='KILOGRAM/ONS' && $data['jml_barang'] <=5){
		$data['total_biaya']=$data['harga_minimum'] * 1;		
		}
	else if(!empty($data['langganan'])&& $data['langganan'] == 'potong'){
		$data['total_biaya']=$data['hrg_satuan']*$data['jml_barang'];	
		}
		if(!empty($data['minimum']) && $data['minimum'] =='minimum') {
			$data['total_biaya']=$data['harga_minimum'];
			}	
			if (!empty($data['potong_diskon']) && $data['potong_diskon']=='potong_persen'){
		$data['total_biaya']=($data['total_biaya'])-$data['total_biaya'] * $data['d_persen'] /100;}
	
$dana=$data['total_biaya'];
 $ratusan = substr($dana, -3);
 if($ratusan<500)
 $akhir = $dana - $ratusan;
 else
 $akhir = $dana + (1000-$ratusan);
        
		$sql = "INSERT INTO detail_pengiriman SET
        id_detail   ='',
        id_kirim    ='".$data['next_proses']."',
        id_satuan   ='".$data['id_satuan']."',
        nama_barang ='".$data['nama_barang']."',
        jml_barang  ='".$data['jml_barang']."',
        jml_colli   ='".$data['jml_colli']."',
        total_biaya ='".$akhir."',
        keterangan  ='".$data['keterangan']."',
        kirim       ='N',
        beaToDoor   ='".$data['beaToDoor']."',
        nama_satuan ='".$data['nama_satuan']."',
        tgl_buat    ='".$datenow."',
        asal        ='".$data['asal']."',
        jml_asuransi='".$data['jml_asuransi']."',
        asuransi    ='".$data['asuransi']."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}
    public function select_harga() {
		$sql = " SELECT * FROM data_satuan";

		$data = $this->db->query($sql);

		return $data->result();
	}


public function select_by_posisi($id) {
		$sql = "SELECT COUNT(*) AS jml FROM laporan_lk ";

		$data = $this->db->query($sql);

		return $data->row();
	}

    public function delete_detail($id) {
		$sql = "DELETE FROM detail_pengiriman WHERE id_detail='{$id}'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}
	public function select_asal($id) {
        $query= $this->db->get_where('pangkalan',array('kode'=>$id));
        return $query;
	}
	public function select_tujuan($id) {
        $query= $this->db->get_where('pangkalan',array('kode'=>$id));
        return $query;
	}
	public function total_rows() {
		$data = $this->db->get("data_pengiriman WHERE kirim = 'N'");
		return $data->num_rows();
}
    //Setoran
    public function select_selesai() {
		$sql = "SELECT data_pengiriman.id_kirim,data_pengiriman.tgl_buat,
                data_pengiriman.nama, data_pengiriman.penerima,
                data_pengiriman.tlp_penerima,data_pengiriman.tujuan,data_pengiriman.pembuat,
                no_stt.no_stt, data_selesai_kirim.ptd,
                data_selesai_kirim.total_biaya,data_selesai_kirim.fee_driver,
                data_selesai_kirim.fee_agen_1,data_selesai_kirim.fee_agen_2,
                data_selesai_kirim.beaToDoor,data_selesai_kirim.nama_barang,
                data_selesai_kirim.id_she
                FROM data_pengiriman
                LEFT JOIN no_stt ON no_stt.id_kirim = data_pengiriman.id_kirim
                LEFT JOIN data_selesai_kirim ON data_selesai_kirim.id_kirim = data_pengiriman.id_kirim
                WHERE data_pengiriman.setor='N' AND data_pengiriman.kirim ='Y'";

		$data = $this->db->query($sql);

		return $data->result();
	}
     public function sum_setor() {
		$sql = "SELECT sum(total_biaya)as total_biayanya, 
        sum(fee_driver) as fee_disetor,
        sum(fee_agen_1) as fee_agen_1,
        sum(fee_agen_2) as fee_agen_2, 
        sum(beaToDoor) as TotalToDoor FROM data_pengiriman
                LEFT JOIN data_selesai_kirim ON data_selesai_kirim.id_kirim = data_pengiriman.id_kirim
                WHERE data_pengiriman.setor='N' AND data_pengiriman.kirim ='Y'";

		$data = $this->db->query($sql);

		return $data->result();
	}
    public function batal_kirim($id) {
		$sql = "DELETE FROM no_stt WHERE id_kirim='{$id}'";
		$this->db->query($sql);
        $sql1 = "DELETE FROM data_selesai_kirim WHERE id_kirim='{$id}'";
		$this->db->query($sql1);
        $sql2 = "UPDATE data_pengiriman SET kirim ='N' WHERE id_kirim='{$id}'";
		$this->db->query($sql2);
        

		return $this->db->affected_rows();
	}
    public function select_setor($id) {
        $sql = "SELECT data_setor.no_stt, data_setor.jumlah, data_pengiriman.asal, data_pengiriman.tujuan FROM  data_setor
        LEFT JOIN data_pengiriman ON data_pengiriman.id_kirim = data_setor.no_stt
        where data_setor.id_setor='{$id}' ";

		$data = $this->db->query($sql);

		return $data->result();
	}
    public function insertData_detail($data) {
    $datenow= date("Y-m-d");
        $ptd1           = $data['ptd1'];
		$todoor       = $data['beTD'];
		$total_biaya  = $data['total_biaya'];
		$fee_agen     = $data['fee_agen'];
		$fee_driver   = $data['fee_driver'];
		$id_kiriman   = $data['id_kiriman'];
		$stt_brow_kirim   = $data['stt_brow_kirim'];
		$no_sttnye_brow   = $data['no_sttnye_brow'];
		$id_she       = $data['id_she'];
	    $total_potongan_fee	 = $fee_agen + $fee_driver;
        
        $jml_setor= ($total_biaya - $total_potongan_fee) + $todoor ;
	   if($ptd1=='Y'){ $jml_setor= $total_biaya - $total_potongan_fee ;}    
        
		$sql = "INSERT INTO data_setor SET
        id_setoran  ='',
        id_setor    ='$id_kiriman',
        no_stt      ='$no_sttnye_brow',
        jumlah      ='$jml_setor'";
        $this->db->query($sql);
        
        $sql1 = "UPDATE data_pengiriman SET
        setor  ='Y' WHERE id_kirim ='$no_sttnye_brow'";
        $this->db->query($sql1);
        
        $sql2 = "UPDATE data_selesai_kirim SET
        setor       ='Y',
        id_setor    ='$id_kiriman',
        tgl_setor   ='$datenow',
        jml_setor  = '$jml_setor' WHERE id_she ='$id_she'";
        $this->db->query($sql2);

		return $this->db->affected_rows();
	}

}

/* End of file M_kota.php */
/* Location: ./application/models/M_kota.php */