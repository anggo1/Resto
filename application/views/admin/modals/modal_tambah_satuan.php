<div class="msg" style="display:none;">
  <?php echo @$this->session->flashdata('msg'); ?>
</div>
<div class="col-12 col-md-12 col-lg-12">
			<div class="modal-header">

				<?php
if (!empty($dataSatuan)){
             foreach ($dataSatuan as $dataSatuan){				 
			 }}
?>
  <p></span><h4 style="display:block; text-align:center;"><?php if (!empty($dataSatuan->id_satuan)) {
                            echo 'Edit Data Satuan';
                        } else { echo 'Penambahan Data Satuan';}
                        ?></h4>
					</p></div><div class="modal-body">
  <form <?php if (empty($dataSatuan->id_satuan)) {echo 'id="form-tambah-satuan"';} else { echo 'id="form-update-satuan"';}?> method="POST">
    <div class="form-group">
      <input type="hidden" name="id" value="<?php if (!empty($dataSatuan->id_satuan)) { echo $dataSatuan->id_satuan; } ?>">
          </div>
	  <div class="input-group form-group">
      <input type="text" class="form-control" placeholder="Nama Satuan" value="<?php
                        if (!empty($dataSatuan->nama_satuan)) {
                            echo $dataSatuan->nama_satuan;
                        }
                        ?>" name="nama_satuan" aria-describedby="sizing-addon2">	
		<input type="text" class="form-control" placeholder="Nama Barang" value="<?php
                        if (!empty($dataSatuan->nama_barang)) {
                            echo $dataSatuan->nama_barang;
                        }
                        ?>" name="nama_barang" aria-describedby="sizing-addon2">  

    </div>
	  <div class="input-group form-group">
      <input type="text" class="form-control" placeholder="Harga Kirim" value="<?php
                        if (!empty($dataSatuan->hrg_satuan)) {
                            echo $dataSatuan->hrg_satuan;
                        }
                        ?>" name="hrg_satuan" aria-describedby="sizing-addon2">
		
		
    </div>
	  <div class="input-group form-group">
      <input type="text" class="form-control" placeholder="Harga Minimum" value="<?php
                        if (!empty($dataSatuan->harga_minimum)) {
                            echo $dataSatuan->harga_minimum;
                        }
                        ?>" name="harga_minimum" aria-describedby="sizing-addon2">
		<input type="text" class="form-control" placeholder="Jumlah Minimum" value="<?php
                        if (!empty($dataSatuan->jml_minimum)) {
                            echo $dataSatuan->jml_minimum;
                        }
                        ?>" name="jml_minimum" aria-describedby="sizing-addon2">
    </div>
	  <div class="input-group form-group">
      <input type="text" class="form-control" placeholder="Fee Crew %" value="<?php
                        if (!empty($dataSatuan->fee_crew)) {
                            echo $dataSatuan->fee_crew;
                        }
                        ?>" name="fee_crew" aria-describedby="sizing-addon2">
		
		
    </div>
	  <div class="input-group form-group">
      <input type="text" class="form-control col-xs-2" placeholder="Fee 1 %" value="<?php
                        if (!empty($dataSatuan->persen)) {
                            echo $dataSatuan->persen;
                        }
                        ?>" name="persen" aria-describedby="sizing-addon2">
		
		<input type="text" class="form-control col-xs-2" placeholder="Fee 2 %" value="<?php
                        if (!empty($dataSatuan->rupiah)) {
                            echo $dataSatuan->rupiah;
                        }
                        ?>" name="rupiah" aria-describedby="sizing-addon2">
    </div>
                      
	  <div class="input-group form-group">
      <input type="text" class="form-control" placeholder="Disc Persen" value="<?php
                        if (!empty($dataSatuan->d_persen)) {
                            echo $dataSatuan->d_persen;
                        }
                        ?>" name="d_persen" aria-describedby="sizing-addon2">
		<input type="text" class="form-control" placeholder="Disc Kg" value="<?php
                        if (!empty($dataSatuan->d_kg)) {
                            echo $dataSatuan->d_kg;
                        }
                        ?>" name="d_kg" aria-describedby="sizing-addon2">

		
		
    </div><?php 			 
?>
	  <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
              </div></form>
    </div>
  </form>
</div>
</div>
</div>