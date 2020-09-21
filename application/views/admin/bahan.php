<div class="msg" style="display:none;">
  <?php echo @$this->session->flashdata('form-msg'); ?>
</div>
   		  
 <div class="section-body">
	
        <button class="form-control btn btn-success" data-toggle="modal" data-target="#tambah-jabatan"><i class="glyphicon glyphicon-plus-sign"></i> Tambah Data </button>
            <p class="section-lead">
              </p>
	  <div class="row ">
              <div class="col-12 ">
				 <div class="card card-first card-outline">
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped  table-bordered table-hover dt-responsive nowrap" id="list-data">
                        <thead>       
                        <tr>
         <td width="2%">No</td>
    <td width="2%">ID Bahan</td>
    <td width="10%">Nama</td>
    <td width="5%">Harga</td>
    <td width="5%">Stok</td>
    <td width="5%">Satuan</td>
    <td width="10%">Supplier</td>
    <td width="5%">Actions</td>
  </tr>
      </thead>
      <tbody id="data-bahan">	
		  <?php // echo $modal_tambah_bahan; ?>
    </table>
  </div>
</div>
</div>
</div>
</div>
		 
</div>
</div>

<?php show_my_confirm('konfirmasiHapus', 'hapus-dataKota', 'Hapus Data Ini?', 'Ya, Hapus Data Ini'); ?>
