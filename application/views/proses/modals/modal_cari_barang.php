<div class="card card-first">
              <div class="card-header">
                <h3 class="card-title">
					 <h4 class="modal-title" style="display:block; text-align:center;">
                       Pencarian Harga Barang</h4></h3>
              </div>
 				<div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered table-hover dt-responsive nowrap" id="table-barang">
                        <thead>          
     <!--<table id="list-data" class="table table-bordered table-striped display responsive nowrap" style="width:100%">-->
        <tr>
            <th>Check</th>
			<th>ID</th>
            <th>Satuan </th>
            <th>Nama Barang </th>
           	<th>Harga</th>
           	<th>Hrg Min</th>
           	<th>JML Min</th>
           	<th>Disc (%)</th>
           	<th>Disc (Kg)</th>
           	<th>Asuransi</th>
  </tr>
      </thead>
      <tbody>
       <?php
  $no = 1;
  foreach ($dataBarang as $h) {
    ?>
    <tr>
    
    <td class="text-center">
		<button type="button" class="btn btn-sm bg-gradient-warning" 
                onClick="javascript:selectHarga('<?php echo $h->id_satuan ?>',
                         '<?php echo $h->nama_satuan ?>','<?php echo $h->nama_barang ?>',
                         '<?php echo $h->hrg_satuan ?>','<?php echo $h->harga_minimum ?>',
                         '<?php echo $h->jml_minimum ?>','<?php echo $h->d_persen ?>',
                         '<?php echo $h->d_kg ?>','<?php echo $h->asuransi ?>')"><i class="fa  fa-check"></i>Pilih</button></td>
            <td><?php echo $h->id_satuan?></td>
            <td><?php echo $h->nama_satuan?></td>
            <td><?php echo $h->nama_barang?></td>
            <td><?php echo $h->hrg_satuan?></td>
            <td><?php echo $h->harga_minimum?></td>
            <td><?php echo $h->jml_minimum?></td>
            <td><?php echo $h->d_persen?></td>
            <td><?php echo $h->d_kg?></td>
            <td><?php echo $h->asuransi?></td>
    </tr>
    <?php
  }
?> 
      </tbody>
    </table>
  </div></div></div>

		