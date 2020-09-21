<script type="text/javascript">
	window.onload = function() {
		showBahan();
		//tampilJabatan();
	}

	function refresh() {
		MyTable = $('#list-data').dataTable();
	}
	function effect_msg_form() {
		// $('.form-msg').hide();
		$('.form-msg').show(500);
		setTimeout(function() { $('.form-msg').fadeOut(500); }, 1000);
	}

	function effect_msg() {
		// $('.msg').hide();
		$('.msg').show(500);
		setTimeout(function() { $('.msg').fadeOut(500); }, 1000);
	}




	var MyTable = $('#list-data').dataTable({
		"responsive": true,
		  "paging": true,
		  "lengthChange": true,
		  "searching": true,
		  "ordering": true,
		  "info": true,
		  "autoWidth": false
		});
    
function showBahan() {
		$.get('<?php echo base_url('Bahan/list_bahan'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-bahan').html(data);
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