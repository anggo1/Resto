       <?php
  $no = 1;
  foreach ($dataPendaftaran as $s) {
    ?>
    <tr>
    
    <td><?php echo $no; ?></td>
    <td><?php echo $s->no_rekamedis ?></td>
    <td><?php echo $s->nobukti_d ?></td>
    <td><?php echo $s->tanggal_msk ?></td>
    <td><?php echo $s->umur_pasien ?></td>
    <td><?php echo $s->jenis_pasien ?></td>
    <td><?php echo $s->nama_poli ?></td>

      <td class="text-center">
        <button class="btn btn-info btn-sm update-dataBidang" data-id="<?php echo $s->id_daftar; ?>"><i class="glyphicon glyphicon-repeat"></i> Edit</button>
      </td>
    </tr>
    <?php
	 $no++;
  }
?> 