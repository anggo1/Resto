       <?php
  $no = 1;
  foreach ($dataBahan as $s) {
    ?>
    <tr>
    
    <td><?php echo $no; ?></td>
    <td><?php echo $s->no_bahan; ?></td>
    <td><?php echo $s->nama; ?></td>
    <td><?php echo $s->harga; ?></td>
    <td><?php echo $s->stok; ?></td>
    <td><?php echo $s->satuan; ?></td>
    <td><?php echo $s->supplier; ?></td>

      <td class="text-center">
      <button class="btn btn-info btn-sm update-datacargo" data-id="<?php echo $s->no_bahan; ?>"><i class="glyphicon glyphicon-repeat"></i> Edit</button>
      </td>
    </tr>
    <?php
	 $no++;
  }
?> 