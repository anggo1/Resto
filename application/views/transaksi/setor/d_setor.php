 <?php
  $no = 1;
  foreach ($dataKirim as $s) {
    ?>
    <tr>    
    <td><?php echo $no; ?></td>
    <td>
        <form id="kirim-setor" name="kirim-setor" method="POST">
    <input type="hidden" value="<?php echo $s->ptd ?>" name="ptd1" />
    <input type="hidden" value="<?php echo $s->beaToDoor ?>" name="beTD" />
    <input type="hidden" value="<?php echo $s->total_biaya ?>" name="total_biaya" />
    <input type="hidden" value="<?php echo $s->fee_agen_1 - $s->fee_agen_2 ?>" name="fee_agen" />
    <input type="hidden" value="<?php echo $s->fee_driver ?>" name="fee_driver" />
    <input type="hidden" value="<?php echo $idsetornye ?>" name="id_kiriman"/>
    <input type="hidden" value="<?php echo $s->no_stt ?>" name="stt_brow_kirim" />
    <input type="hidden" value="<?php echo $s->id_kirim ?>" name="no_sttnye_brow" />
    <input type="hidden" value="<?php echo $s->id_she ?>" name="id_she" />
         <button type="submit" class="form-control btn bg-gradient-primary" id="kirim"> <i class="fa fa-hand-holding-usd"></i> Setor</button>
    </form></td>
    <td><?php echo $s->id_kirim; ?></td>
    <td><?php echo $s->tgl_buat; ?></td>
    <td><?php echo $s->nama; ?></td>
    <td><?php echo $s->penerima; ?></td>
    <td><?php echo $s->tlp_penerima; ?></td>
    <td><?php echo $s->tujuan; ?></td>
    <td><?php echo $s->pembuat; ?></td>
    </tr>
    <?php
	 $no++;
  }
?> 

<script language="javascript">
    function refresh() {
		MyTable = $('#list-data,#table-1,#table-2,#table-setor').dataTable();
	}
     function Stor() {
		$.get('<?php echo base_url('Transaksi/Stor'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-setor').html(data);
			refresh();
		});
	}
    function pStor(datasetor) {
       var detail_proses = document.getElementById('id_penyetor').value=datasetor;
		$.ajax({
		type: 'GET',
		url: '<?php echo base_url('Transaksi/pStor'); ?>?detail_proses='+detail_proses,
		data: 'detail_proses=' +detail_proses,
			success:function(data) {
			MyTable.fnDestroy();
			$('#p-setor').html(data);
			refresh();
			}
		});
    } 
        
        
       
		//$.get('<?php echo base_url('Transaksi/pStor'); ?>', function(data) {
		//	MyTable.fnDestroy();
		//	$('#p-setor').html(data);
		//	refresh();
		//});
	//}
       function detailStor(datasetor) {
		var detail_proses = document.getElementById('id_penyetor').value=datasetor;
		$.ajax({
		type: 'GET',
		url: '<?php echo base_url('Transaksi/detailStor'); ?>?detail_proses='+detail_proses,
		data: 'detail_proses=' +detail_proses,
			success:function(hasil) {
			MyTable.fnDestroy();
			$('#detail-setor').html(hasil);
			refresh();
    //document.getElementById("cetak-setoran").hidden = false;
			}
		});
    }
    $('#kirim-setor').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Transaksi/prosesDsetor'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			if (out.status == 'form') {
                toastr.error(out.msg);
				//$('.msg').html(out.msg);
				//refresh();
				//effect_msg();
			} else {
                //pStor();
                document.getElementById("cetak-setoran").hidden = false;
                toastr.success(out.msg);
                pStor(out.datasetor); 
                detailStor(out.datasetor); 
                $('.datasetor').html(out.datasetor);
                show(out.datasetor);
            }
		})

		e.preventDefault();
	});
</script>