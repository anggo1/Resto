 <?php
  $no = 1;
  foreach ($dataKirim as $s) {
    ?>
    <tr>    
    <td><?php echo $no; ?></td>
    <td><?php echo $s->id_kirim; ?></td>
    <td><?php echo $s->tgl_buat; ?></td>
    <td><?php echo $s->nama; ?></td>
    <td><?php echo $s->penerima; ?></td>
    <td><?php echo $s->tlp_penerima; ?></td>
    <td><?php echo $s->tujuan; ?></td>
    <td><?php echo $s->pembuat; ?></td>
    <td>        
        <button class="btn bg-gradient-warning btn-sm update-datacargo" data-id="<?php echo $s->id_kirim; ?>"><i class="fa fa-print"></i> Cetak</button>
        <button class="btn bg-gradient-danger btn-sm batal-kirim" data-id="<?php echo $s->id_kirim; ?>" data-toggle="modal" data-target="#kirimHapus"><i class="fa fa-times-circle"></i> Batal Kirim</button>
      </td>
    </tr>
    <?php
	 $no++;
  }
?> 