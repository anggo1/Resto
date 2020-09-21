 <?php
  $no = 1;
  foreach ($detailStor as $s) {
    ?>
    <tr>            
    <td><?php echo $no; ?></td>
    <td><?php echo $s->no_stt; ?></td>
    <td><?php echo $s->asal; ?></td>
    <td><?php echo $s->tujuan; ?></td>
    <td><?php echo $s->jumlah; ?></td>
    </tr>
    <?php
	 $no++;
  }
?> 