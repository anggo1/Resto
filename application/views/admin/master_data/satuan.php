<div class="msg" style="display:none;">
  <?php echo @$this->session->flashdata('msg'); ?>
</div>
            <button class="form-control btn btn-success" data-toggle="modal" data-target="#tambah-satuan"><i class="glyphicon glyphicon-plus-sign"></i> Tambah Data</button>
            <p class="section-lead">             
            </p>
              <div class="col-12">
                    <div class="table-responsive">
                      <table class="table table-striped table-hover dt-responsive nowrap" id="table-1">
                        <thead>       
        <tr>
         <td rowspan="2">No</td>
    <td rowspan="2">Satuan</td>
    <td rowspan="2">Nama Barang</td>
    <td rowspan="2">Harga</td>
    <td rowspan="2">Harga Min</td>
    <td rowspan="2">Jml Min</td>
    <td colspan="3" align="center">FEE</td>
    <td colspan="2">Discount</td>
    <td rowspan="2">Aksi</td>
  </tr>
						
  <tr>
    <td align="center">Crew Bus</td>
    <td align="center">Fee 1</td>
    <td align="center">Fee 2</td>
    <td> (%)</td>
    <td>(KG)</td>
    </tr>
      </thead>
      <tbody id="datanye">	

      </tbody>
    </table>
  </div>
</div>
		 
</div>
<?php // echo $modal_tambah_satuan; ?><div id="tempat-modal"></div>
</div>

<?php show_my_confirm('konfirmasiHapus', 'hapus-dataKota', 'Hapus Data Ini?', 'Ya, Hapus Data Ini'); ?>