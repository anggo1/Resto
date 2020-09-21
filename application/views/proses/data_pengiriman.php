       <?php
  $no = 1;
  foreach ($dataDetail as $s) {
    ?>
    <tr>
    
    <td><?php echo $no; ?></td>
    <td><?php echo $s->id_kirim ?></td>
    <td><?php echo $s->nama_barang ?></td>
    <td><?php echo $s->jml_barang ?></td>
    <td><?php echo $s->jml_colli ?></td>
    <td><?php echo number_format($s->total_biaya) ?></td>
    <td><?php echo number_format($s->beaToDoor) ?></td>
    <td><?php echo $s->keterangan?> </td>
    <td><?php echo $s->asuransi?> </td>
    <td><?php echo $s->jml_asuransi?> </td>
      <td class="text-center">
		 <button class="btn bg-gradient-danger btn-sm delete-detail" data-id="<?php echo $s->id_detail; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="fa fa-delete"></i> Del</button>
      </td>
    </tr>
    <?php
	 $no++;
  }
?> 