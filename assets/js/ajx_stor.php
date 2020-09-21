<script type="text/javascript">
function f(o){o.value=o.value.toUpperCase().replace(/([^0-9A-Z()/ .])/g,"");}
function fn(o){o.value=o.value.toUpperCase().replace(/([^0-9A-Z()/ .])/g,"");}
$('#datepicker').datetimepicker({
    format: 'DD-MM-YYYY',
    date: moment()
});
    
	window.onload = function() {
		Stor();
	}
	function refresh() {
		MyTable = $('#list-data,#table-1,#table-2,#table-setor').dataTable();
	}


	function effect_msg_form() {
		// $('.form-msg').hide();
		$('.form-msg').show(500);
		setTimeout(function() { $('.form-msg').fadeOut(500); }, 1000);
	}

	function effect_msg() {
		// $('.msg').hide();
		$('.msg').show(500);

                //toastr.success(data.message, 'Adding New Pegawai');
		setTimeout(function() { $('.msg').fadeOut(500); }, 1000);
	}
    var MyTable = $('#list-data,#table-1,#table-2').dataTable({
		"responsive": true,
		"paging": true,
		"lengthChange": true,
		"searching": true,
		"ordering": true,
		"info": true,
        "autoWidth": false,
		"processing": true
		});
 
    function Stor() {
		$.get('<?php echo base_url('Transaksi/Stor'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-setor').html(data);
			refresh();
		});
	}

    var data_id;
	$(document).on("click", ".batal-kirim", function() {
		data_id = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-kirim", function() {
		var id = data_id;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Transaksi/batalKirim'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
            var out = jQuery.parseJSON(data);
            if (out.status != 'form') {
                toastr.error(out.msg);
                $('#kirimHapus').modal('hide');
                //next(next_proses);
                Stor();
			} 
		})
	})
    function show(datasetor){
	document.getElementById('id_penyetor').value=datasetor;
    var d = document.getElementById("cetak-setoran");
        d.setAttribute('data-id' , datasetor,); 
    document.getElementById("id_penyetor").hidden = false;
    document.getElementById("kirim").hidden = true;
    //document.getElementById("cetak-setoran").hidden = false;
        //var d = document.getElementById("id_penyetor");
    //d.setAttribute('readonly');
	}
    $('#form-setor').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Transaksi/prosesTsetor'); ?>',
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
                pStor(out.datasetor); 
                //detailStor(out.datasetor); 
                $('.datasetor').html(out.datasetor);
                show(out.datasetor);
            }
		})

		e.preventDefault();
	});
    
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
                pStor(out.datasetor); 
                detailStor(out.datasetor); 
                $('.datasetor').html(out.datasetor);
                show(out.datasetor);
            }
		})

		e.preventDefault();
	});
    $(document).on("click", ".cetak-setoran", function() {
		var id = $(this).attr("data-id");
		//var id = document.getElementById('next_proses').value=datakode;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Transaksi/cetak_setor'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#modal-setoran').html(data);
			$('#cetak-setoran').modal('show');
			
		})
	})
    //end setor
	//ajax jabatan
	
	function tampilJabatan() {
		$.get('<?php echo base_url('Masterdata/tampilJab'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-jab').html(data);
			refresh();
		});
	}
	$('#form-tambah-jabatan').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Masterdata/prosesTjabatan'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilJabatan();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-jabatan").reset();
				$('#tambah-jabatan').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	
$(document).on("click", ".update-dataJabatan", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Masterdata/updateJabatan'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-jabatan').modal('show');
		})
	})
	$(document).on('submit', '#form-update-jabatan', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Masterdata/prosesUjabatan'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilJabatan();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-jabatan").reset();
				$('#update-jabatan').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$('#tambah-jabatan').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-jabatan').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})
	//*** end jabatan **//

</script>