<?php 
if(!empty($dataNama)){
foreach($dataNama as $s){?>
<div class="card card-first">
<table class="table table-hover dt-responsive nowrap" id="table-1">

        <tr>
          <td><strong> Nama Konsumen</strong></td>
		  <td>:<strong> <?php echo $s->nama?></strong></td>
			  <td><strong>No. Telp</strong></td>
		  <td><strong>: <?php echo $s->no_telp?></strong></td>
		  <td>Asal</td>
			  <td>: <strong><?php echo $s->asal?></strong></td>
	    </tr>
        	<tr>
        	  <td>Penerima</td>
			  <td>: <?php echo $s->penerima ?></td>
			  <td>Tlp Penerima</td>
			  <td>: <?php echo $s->tlp_penerima ?></td>
			  <td>Tujuan</td>
			  <td colspan="3">: <strong><?php echo $s->tujuan?></strong></td>
		    </tr>
		
			<tr>
			  <td height="20"> Nama Barang</td>
			  <td height="20">: <?php echo $s->nama_barang ?></td>
			  <td>Jumlah</td>
			  <td >: <?php echo $s->jml_barang ?></td>
			  <td colspan="4" >
	<button type="button" class="btn btn-sm bg-gradient-warning" onClick="javascript:selectRiwayat('<?php echo $s->penerima ?>','<?php echo $s->tlp_penerima ?>','<?php echo $s->asal ?>','<?php echo $s->tujuan ?>')"> <i class="fa  fa-check"></i> Pilih Data</button>
	</td>
		    </tr>
          
</table>
	 </div>
<?php } }?>