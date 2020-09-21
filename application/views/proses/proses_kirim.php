<div class="msg" style="display:none;">
  <?php echo @$this->session->flashdata('form-msg'); ?>
</div>
              <div class="col-12 ">
<div class="card card-primary card-outline ">
	<div class="card-body card-outline">

    <p></p>
	<div class="table-responsive">
                <table class="table table-striped  table-bordered table-hover dt-responsive nowrap" id="list-data">
                <thead>
              <tr>
                <td width="1%">No</td>
                <td width="5%">ID Kirim</td> 
                <td width="5%">Tgl Buat</td> 
                <td width="8%">Pengirim</td>
                <td width="8%">Penerima</td>
                <td width="8%">Barang</td>
                <td width="8%">Tlp Penerima</td>
                <td width="8%">Tujuan</td>
                <td width="5%">Pembuat</td>
                <td width="10%">Aksi</td>
              </tr>
              </thead>
                        <tbody id="data-pengiriman"></tbody>
                <tfoot></tfoot>
      </table>

    
    </div>


                  
</div>
        
</div>
    <div id="modal-ttb"></div>
    <div id="modal-kirim"></div>


<?php show_my_confirm('konfirmasiHapus', 'hapus-data', 'Hapus Data Ini?', 'Ya, Hapus Data Ini', 'Batal Hapus data'); ?>
