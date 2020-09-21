<div class="msg" style="display:none;">
  <?php echo @$this->session->flashdata('msg'); ?>
</div>
<div class="row">
              <div class="col-12 ">
<div class="card card-primary card-outline ">
	<div class="card-body card-outline">

              <div class="card-header p-0 border-bottom-0 ">
            <ul class="nav nav-tabs " id="custom-content-above-tab" role="tablist">
              <li class="nav-item">

                <a class="nav-link active" id="tab-list-tab" data-toggle="pill" href="#tab-list" role="tab" > <i class="fas fa-edit"></i> Daftar Terkirim</a>
              </li>
              <li class="nav-item">
				<a class="nav-link" id="tab-setor-tab" data-toggle="pill" href="#tab-setor" role="tab" > <i class="fas fa-luggage-cart"></i> Proses Setor</a>
              </li>

              </ul>
            <div class="tab-content" id="custom-content-below-tabContent">


<div class="tab-pane fade show active" id="tab-list" role="tabpanel" aria-labelledby="tab-list-tab">

                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped  table-bordered table-hover dt-responsive nowrap" id="list-data">
                        <thead>               
        <tr>
    <th>No</th>
    <th>ID</th>
    <th>Tgl Buat</th>
    <th>Nama Pengirim</th>
    <th>Nama Penerima</th>
    <th>Tlp Penerima</th>
    <th>Agen</th>
    <th>Pembuat</th>
    <th>Aksi</th>
  </tr>
  </tr>
      </thead>
      <tbody id="data-setor">
      </tbody>
    </table>
  </div></div><div id="modal-setoran"></div>
          <?php show_my_confirm('kirimHapus', 'hapus-kirim', 'Hapus Data Ini?', 'Ya, Hapus Data Ini', 'Batal Hapus data'); ?>
<div class="tab-pane fade show" id="tab-setor" role="tabpanel" aria-labelledby="tab-setor-tab">
    <div class="content"><p></p>
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-6">
            <div class="card ">
              <div class="card-header no-border">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">Data Penyetor</h3>
                </div>
              </div>
               <div class="col-12 ">
                <div class="card-body">
               <form id="form-setor" name="form-setor" method="POST">

					<div id="riwayat"></div>
                   <div class="form-group row">
                    <label class="col-sm-5 col-form-label"></label>
                    <div class="col-sm-6">
                        <input type="text" name="id_penyetor" id="id_penyetor" hidden="" readonly="" class="form-control" onkeydown="f(this)" onkeyup="f(this)" onkeypress="return handleEnter(this, event)">
                    </div>
                    </div>
                  <div class="form-group row">
                    <label class="col-sm-5 col-form-label">Nama Penyetor</label>
                    <div class="col-sm-6">
                        <input type="text" name="penyetor" id="penyetor" class="form-control" onkeydown="f(this)" onkeyup="f(this)" onkeypress="return handleEnter(this, event)">
                    </div>
                    </div>
                  <div class="form-group row">
					<label class="col-sm-5 col-form-label">Tanggal Setor</label>
                        <input type="hidden" name="pembuat" value="<?php echo $userdata->FirstName; ?>" class="form-control">
                    <div class="col-sm-6">
                        <input type="text" name="tgl_setor" id="datepicker" value="" class="form-control datepicker datetimepicker" data-toggle="datetimepicker" data-target=".datepicker" data-format="yyy-mm-dd">
                    </div>
                    </div>
                  <div class="form-group row">
					<label class="col-sm-5 col-form-label"></label>
                    <div class="col-sm-6">
                    <button type="submit" class="form-control btn bg-gradient-primary" id="kirim"> <i class="fa fa-check-circle"></i> Simpan</button>
                    </div>
                        </form>
                    </div>
              </div>
            </div>
          </div>
          </div>
          <div class="col-lg-6">

    <div class="card">
              <div class="card-header no-border">
                <h3 class="card-title">Daftar Yang disetor</h3>
                <div class="card-tools">
                  <button class="btn bg-gradient-primary btn-sm cetak-setoran" id="cetak-setoran" data-id="" hidden=""> <i class="fa fa-print"></i>   Cetak</button>
                </div>
              </div>
              <div class="card-body p-0">
                <table class="table table-striped table-valign-middle">
                        <thead>          
        <tr>
                        <th>No</th>
                        <th>No STT</th>
                        <th>Asal</th>
                        <th>Tujuan</th>
                        <th>Total</th>
        </tr>
  						  <tbody id="detail-setor"></tbody>	
		<tfoot></tfoot>
    </table>
              </div>
            </div>                     
          </div>
        </div>
      </div>
    </div>
        <div class="card-body">
                      <div class="table-responsive">
                      <table class="table table-striped  table-bordered table-hover dt-responsive nowrap" id="table-1">
                        <thead>          
        <tr>
                        <th>No</th>
                        <th>AKSI</th>
                        <th>No Pengiriman</th>
                        <th>Tgl Kirim</th>
                        <th>Nama</th>
                        <th>Penerima</th>
                        <th>Telp Penerima</th>
                        <th>Tujuan</th>
                        <th>Pembuat</th>
        </tr>
     </thead>
						  <tbody id="p-setor"></tbody>	
		<tfoot></tfoot>
    </table>
				  </div>
    </div>
</div>
</div>	
</div>	
</div>	
</div>

    <?php show_my_confirm('konfirmasiHapus', 'hapus-data', 'Hapus Data Ini?', 'Ya, Hapus Data Ini', 'Batal Hapus data'); ?>
        