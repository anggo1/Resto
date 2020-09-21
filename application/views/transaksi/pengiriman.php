<div class="msg" style="display:none;">
  <?php echo @$this->session->flashdata('form-msg'); ?>
</div>
	<div class="row">
              <div class="col-12 ">
<div class="card card-primary card-outline ">
	<div class="card-body card-outline">

              <div class="card-header p-0 border-bottom-0 ">
            <ul class="nav nav-tabs " id="custom-content-above-tab" role="tablist">
              <li class="nav-item">

                <a class="nav-link active" id="tab-daftar-tab" data-toggle="pill" href="#tab-daftar" role="tab" > <i class="fas fa-edit"></i> Pengiriman Barang</a>
              </li>
              <li class="nav-item">
				<a class="nav-link" hidden="" id="tab-proses-tab" data-toggle="pill" href="#tab-proses" role="tab" > <i class="fas fa-luggage-cart"></i> Proses Pengiriman</a>
              </li>

              </ul>
            <div class="tab-content" id="custom-content-below-tabContent">


<div class="tab-pane fade show active" id="tab-daftar" role="tabpanel" aria-labelledby="tab-daftar-tab">
	<form id="form-tambah-pengiriman" method="POST">
                <div class="card-body">
					<div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tanggal Transaksi</label>
                    <div class="col-sm-4">
						<div class="input-group date" id="reservationdate" data-target-input="nearest">

                        <input type="text" name="tgl_buat" id="datepicker" value="" class="form-control datepicker datetimepicker" data-toggle="datetimepicker" data-target=".datepicker" data-format="yyy-mm-dd">

                        <div class="input-group-append" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                    </div>
                    </div>

                  <div class="form-group row">
                    <label for="No Rekamedis" class="col-sm-2 col-form-label">Nama Pengirim</label>
                    <div class="col-sm-4">
						<div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input type="hidden" name="pembuat" value="<?php echo $userdata->FirstName; ?>" class="form-control">
                        <input type="hidden" name="id_konsumen" id="id_konsumen" class="form-control">
                        <input type="text" name="nama" id="nama" class="form-control">
							<span class="input-group-append">
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#cari-konsumen"><i class="glyphicon glyphicon-plus-sign"><i class="fa fa-search"></i> Cari..</button></i>
                  </span>
                  </div>
				</div>
                  </div>
					<div id="riwayat"></div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Penerima</label>
                    <div class="col-sm-4">
                        <input type="text" name="penerima" id="penerima" class="form-control">
                    </div>
					<label class="col-sm-2 col-form-label">Telp Penerima</label>
                    <div class="col-sm-4">
                        <input type="text" name="tlp_penerima" id="tlp_penerima" class="form-control">
                    </div>
                    </div>
					<div class="form-group row">
                    <label class="col-sm-2 col-form-label">Asal</label>
                    <div class="col-sm-1">
                        <input type="text" name="kode_asal" id="kode_asal" class="form-control"
						onBlur="isi_otomatis1()"
						onkeyup="isi_otomatis1()" onFocus="isi_otomatis1()" onChange="fn(this)" onKeyPress="isi_otomatis1()">
                    </div>
						<div class="col-sm-3">
							<div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input type="text" name="asal" id="asal" class="form-control" readonly>
							<span class="input-group-append">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cari-asal"><i class="glyphicon glyphicon-plus-sign"><i class="fa fa-search"></i> Cari..</button></i>
								</span>
								</div>
						</div>
                    <label class="col-sm-2 col-form-label">Tujuan</label>
                    <div class="col-sm-1">
                        <input type="text" name="kode_tujuan" id="kode_tujuan" class="form-control"
						onBlur="isi_otomatis2()"
						onkeyup="isi_otomatis2()" onFocus="isi_otomatis2()" onChange="fn(this)" onKeyPress="isi_otomatis2()">
                    </div>
					<div class="col-sm-3">
						<div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input type="text" name="tujuan" id="tujuan" class="form-control" readonly>
							<span class="input-group-append">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cari-tujuan"><i class="glyphicon glyphicon-plus-sign"><i class="fa fa-search"></i> Cari..</button></i>
								</span>
								</div>
                    </div>
                    </div>
					<div class="form-group row">
                    <label class="col-sm-2 col-form-label">Pembayaran</label>
                    <div class="col-sm-4">
					<div class="icheck-primary d-inline">
                        <input type="radio" name="pembayaran" value="Y" checked id="radioSuccess1">
                        <label for="radioSuccess1"> Tunai
                        </label>
                      </div>
                      <div class="icheck-primary d-inline">
                        <input type="radio" name="pembayaran" value="Y" id="radioSuccess2">
                        <label for="radioSuccess2"> Non Tunai
                        </label>
                      </div>
                    </div>
                    </div>


        <div class="col-sm-12">
            <button type="submit" class="form-control btn bg-gradient-primary"><i class="fa fa-check-circle"></i> Simpan</button>
        </div>
                </div></form>
    </div>


	<div class="tab-pane fade show" id="tab-proses" role="tabpanel" aria-labelledby="tab-proses-tab">
       
                <div class="card-body">

<form id="form1" name="form1" method="POST">
                  <div class="form-group row">
                    <label for="No Rekamedis" class="col-sm-2 col-form-label">Satuan Jenis</label>
                    <div class="col-sm-4">
						<div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input type="text" name="nama_satuan" id="nama_satuan" class="form-control">
							<span class="input-group-append">
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#cari-barang"><i class="glyphicon glyphicon-plus-sign"><i class="fa fa-search"></i> Cari..</button></i>
                  </span>
                  </div>
				</div>
					<label class="col-sm-2 col-form-label">ID Kirim</label>
                    <div class="col-sm-4">
                        <input type="text" name="next_proses" id="next_proses" class="form-control datakode" required readonly >
                    </div>
                  </div>
					<div id="riwayat"></div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nama Barang</label>
                    <div class="col-sm-4">
                        <input type="text" name="nama_barang" id="nama_barang" class="form-control" onkeydown="f(this)" onkeyup="f(this)" onkeypress="return handleEnter(this, event)">
                    </div>
					<label class="col-sm-2 col-form-label">Colli</label>
                    <div class="col-sm-4">
                        <input type="text" name="jml_colli" id="jml_colli" class="form-control">
                    </div>
                    </div>
					<div class="form-group row">
                    <label class="col-sm-2 col-form-label">Jumlah / Kg</label>
                    <div class="col-sm-4">
                        <input type="text" name="jml_barang" id="jml_barang" onfocus="startCalculate()" 
onblur="stopCalc()" onkeypress="return handleEnter(this, event)" onkeydown="f(this)"  class="form-control">
                    </div>
					<label class="col-sm-2 col-form-label">Harga Satuan</label>
                    <div class="col-sm-4">
                        <input type="text" name="hrg_satuan" id="hrg_satuan" onfocus="startCalculate()" 
onblur="stopCalc()" onkeypress="return handleEnter(this, event)" onkeydown="f(this)" readonly class="form-control">
                    </div>
                    </div>
					<div class="form-group row">
                    <label class="col-sm-2 col-form-label">Bea To Door</label>
                    <div class="col-sm-4">
                        <input type="text" name="beaToDoor" id="beaToDoor" class="form-control">
                    </div>
                    <label class="col-sm-2 col-form-label">Minimum Charge ?</label>
					<div class="col-sm-4">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox" id="minimum" name="minimum" value="minimum">
                        <label for="minimum">
                        </label>
                      </div>
                    </div>

                    </div>
					<div class="form-group row">
                    <label class="col-sm-2 col-form-label">Ket Pengiriman</label>
                    <div class="col-sm-4 select2-purple">
                    <select name="keterangan" class="form-control select2-purple" data-dropdown-css-class="select2-purple" style="width: 100%;" >
                            <option value="" selected>Pilih status ...</option>
                            <option value="REG">REG</option>
                            <option value="ONS">ONS</option>
                        </select>
                    </div>
                    <label class="col-sm-2 col-form-label">Non Minimum Charge ?</label>
					<div class="col-sm-4">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox" id="langganan" name="langganan" id="langganan" value="potong">
                        <label for="langganan">
                        </label>
                      </div>
                    </div>

                    </div>
					<div class="form-group row">
                    <label class="col-sm-2 col-form-label">Diskon ?</label>
                    <div class="col-sm-4">
					<div class="icheck-primary d-inline">
                        <input type="radio" name="potong_diskon" value="potong_persen" id="radioSuccess3">
                        <label for="radioSuccess3"> Persen
                        </label>
                      </div>
                      <div class="icheck-primary d-inline">
                        <input type="radio" name="potong_diskon" value="potong_kg" onclick="startCalculate2()" id="radioSuccess4">
                        <label for="radioSuccess4"> Kg
                        </label>
                      </div>
                    </div>
                        <label class="col-sm-2 col-form-label">Asuransi</label>
                    <div class="col-sm-1" id="fnasu">
                        <input type="text" name="jml_asuransi" id="jml_asuransi" style="text-align:right" readonly="readonly" size="10" class="form-control" value="0"/>
                    </div>
					<div class="col-sm-3">
                   <div class="icheck-primary d-inline">
                        <input type="radio" name="asuransi" value="premium" onclick="startCalculate3()" id="radioSuccess7">
                        <label for="radioSuccess7"> Premium
                        </label>
                      </div>
                    <div class="icheck-primary d-inline">
                        <input type="radio" name="asuransi" value="standart" onclick="startCalculate4()" id="radioSuccess8">
                        <label for="radioSuccess8"> Standart
                        </label>
                      </div>
                    <div class="icheck-primary d-inline">
                        <input type="radio"  name="asuransi" value="" checked onSelect="startCalculate5()" onclick="startCalculate5()" id="radioSuccess9">
                        <label for="radioSuccess9"> Non
                        </label>
                      </div>
                    </div>
                    </div>
                    <input type="hidden" name="harga_minimum" id="harga_minimum" class="input-medium" onfocus="startCalculate()" 
onblur="stopCalc()" onkeypress="return handleEnter(this, event)" onkeydown="f(this)" readonly/>
                    <input type="hidden" name="jml_minimum" id="jml_minimum" class="input-mini" onfocus="startCalculate()" 
onblur="stopCalc()" onkeypress="return handleEnter(this, event)" onkeydown="f(this)" readonly size="5"/>
                    <input name="total_biaya" type="hidden" class="input-mini" id="total_biaya" style="text-align:right" 
onfocus="startCalculate()" onblur="stopCalc()" readonly/>
                    <input type="hidden" name="asuransi1" id="asuransi1" style="text-align:right" size="10" class="input-mini" value="0"/>
                    <input type="hidden" name="d_persen" id="d_persen"/>
                    <input type="hidden" name="d_kg" id="d_kg"/>
                    <input type="hidden" name="id_satuan" id="id_satuan"/>
                    <input type="hidden" name="asal" id="asal"/>
                    <input type="hidden" name="tgl_buat" id="tgl_buat"/>
                    
                    <div class="form-group row ">
                    <div class="col-sm-6">
                    <button type="submit" class="form-control btn bg-gradient-primary"> <i class="fa fa-check-circle"></i> Simpan</button>
                    </div>
                        </form>
                    </div>
                    
                    
                    

                    
                </div>  
        <div class="card-body">
                      <table class="table table-striped  table-bordered table-hover nowrap">
                        <thead>          
        <tr>
                        <th>No</th>
                        <th>No Pengiriman</th>
                        <th>Nama Barang</th>
                        <th>Jumlah</th>
                        <th>Colli</th>
                        <th>Total</th>
                        <th>ToDoor</th>
                        <th>Keterangan</th>
                        <th>Asuransi</th>
                        <th>Jml Asuransi</th>
                        <th>AKSI</th>
        </tr>
     </thead>
						  <tbody id="data-pengiriman"></tbody>	
		<tfoot></tfoot>
    </table>
				  </div><div class="card-footer">                        
                    <button class="btn bg-gradient-success cetak-datattb" id="cetak" data-id="" hidden=""> <i class="fa fa-print"></i> Cetak</button>
                    </div>
    </div>
</div>
                  
</div>
        
</div>
    <div id="modal-ttb"></div>
  <?php echo $modal_cari_konsumen; ?>
  <?php echo $modal_cari_barang; ?>
  <?php echo $modal_cari_tujuan; ?>
  <?php echo $modal_cari_asal; ?>

<?php show_my_confirm('konfirmasiHapus', 'hapus-data', 'Hapus Data Ini?', 'Ya, Hapus Data Ini', 'Batal Hapus data'); ?>
