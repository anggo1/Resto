       <?php
  $no = 1;
  foreach ($dataSatuan as $s) {
    ?>
    <tr>
    
    <td><?php echo $no; ?></td>
    <td><?php echo $s->nama_satuan; ?></td>
    <td><?php echo $s->nama_barang; ?></td>
    <td><?php echo $s->hrg_satuan; ?></td>
    <td><?php echo $s->harga_minimum; ?></td>
    <td><?php echo $s->jml_minimum; ?></td>
    <td><?php echo $s->fee_crew; ?></td>
    <td><?php echo $s->persen; ?></td>
    <td><?php echo $s->rupiah; ?></td>
    <td><?php echo $s->d_persen; ?></td>
    <td><?php echo $s->d_kg; ?></td>

      <td class="text-center">
        <button class="btn btn-info btn-sm update-dataSatuan" data-id="<?php echo $s->id_satuan; ?>"><i class="glyphicon glyphicon-repeat"></i> Edit</button>
      </td>
    </tr>
    <?php
	 $no++;
  }
?> 