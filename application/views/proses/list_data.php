       <?php
  $no = 1;
  foreach ($dataKirim as $s) {
    ?>
    <tr>
    
    <td><?php echo $no; ?></td>
    <td><?php echo $s->id_kirim ?></td>
    <td><?php echo $s->tgl_buat ?></td>
    <td><?php echo $s->nama ?></td>
    <td><?php echo $s->penerima ?></td>
    <td><?php echo $s->nama_barang ?></td>
    <td><?php echo $s->tlp_penerima ?></td>
    <td><?php echo $s->tujuan ?> </td>
    <td><?php echo $s->pembuat ?> </td>
      <td class="text-center">
		  <button class="btn btn-sm bg-gradient-success cetak-ulang" data-id="<?php echo $s->id_kirim ?>"><i class="fa fa-print"></i> Print</button>
          <button class="btn btn-sm btn-primary kirim-barang" data-id="<?php echo $s->id_kirim ?>"><i class="fa fa-truck"></i> Kirim</button>
          <button class="btn btn-sm btn-danger detail-datalaporan" data-id="<?php echo $s->id_kirim ?>"><i class="fa fa-times"></i> Batal</button>
      </td>
    </tr>
    <?php
	 $no++;
  }
?> 