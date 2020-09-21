
<?php
  $no = 1;
  foreach ($dataMedis as $s) {
    ?>
    <tr>
    
    <td><?php echo $no; ?></td>
    <td><?php echo $s->nama_poli ?></td>

      <td class="text-center">
        <button class="btn btn-info btn-sm update-dataMedis" data-id="<?php echo $s->kode_paramedis; ?>"><i class="glyphicon glyphicon-repeat"></i> Edit</button>
      </td>
    </tr>
    <?php
	 $no++;
  }
?> 