<script type="text/javascript">

var table;

$(document).ready(function() {

    //datatables
    table = $('#table-lap').DataTable({ 
	"responsive": true,
	"paging": true,
    "lengthChange": true,
    "searching": true,
    "ordering": true,
    "info": true,
    "autoWidth": true,
    "processing": true, 
    "serverSide": true, 
    "order": [], 
        "ajax": {
            "url": "<?php echo site_url('Masterdata/ajax_konsumen')?>",
            "type": "POST"
        },       
        "columnDefs": [
        { 
            "targets": [ 0 ],
            "orderable": false, 
        },
        ],

    });

});
$(document).ready(function() {

    //datatables
    table = $('#table-bak').DataTable({ 
	"responsive": true,
	"paging": true,
    "lengthChange": true,
    "searching": true,
    "ordering": true,
    "info": true,
    "autoWidth": true,
    "processing": true, 
    "serverSide": true, 
    "order": [], 
        "ajax": {
            "url": "<?php echo site_url('bak/ajax_list')?>",
            "type": "POST"
        },       
        "columnDefs": [
        { 
            "targets": [ 0 ],
            "orderable": false, 
        },
        ],

    });

});
	var MyTable = $('#list-data').dataTable({
		  "paging": true,
		  "lengthChange": true,
		  "searching": true,
		  "ordering": true,
		  "info": true,
		  "autoWidth": false
		});

	window.onload = function() {
		//tampillaplaka();
		<?php
			if ($this->session->flashdata('msg') != '') {
				echo "effect_msg();";
			}
		?>
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

	$(document).on("click", ".update-datalaporan", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Laplaka/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-laporan').modal('show');
		})
	})
	

	$(document).on("click", ".detail-datalaporan", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Laplaka/detail'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#tabel-detail').dataTable({
				  "paging": true,
				  "lengthChange": false,
				  "searching": true,
				  "ordering": true,
				  "info": true,
				  "autoWidth": false
				});
			$('#detail-laporan').modal('show');
		})
	})
/* Konsumen */
$('#form-tambah-konsumen').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Masterdata/prosesTkonsumen'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			//tampilKonsumen();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
				//window.setTimeout(function(){window.location.reload()}, 1000);
			} else {
				document.getElementById("form-tambah-konsumen").reset();
				$('#tambah-konsumen').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
				//window.setTimeout(function(){window.location.reload()}, 1000);
			}
		})
		
		e.preventDefault();
	});

$(document).on("click", ".update-dataKonsumen", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Pengaturan/updateKonsumen'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-konsumen').modal('show');
		})
	})
	$(document).on('submit', '#form-update-konsumen', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Pengaturan/prosesUkonsumen'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			//tampilPerusahaan();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
				window.setTimeout(function(){window.location.reload()}, 1000);
			} else {
				document.getElementById("form-update-konsumen").reset();
				$('#update-konsumen').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
				window.setTimeout(function(){window.location.reload()}, 1000);
			}
		})
		
		e.preventDefault();
	});

	$('#tambah-konsumen').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-konsumen').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})
	
	
	//end
	/* Satuan */
$('#form-tambah-satuan').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Masterdata/prosesTsatuan'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			//tampilsatuan();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
				window.setTimeout(function(){window.location.reload()}, 1000);
			} else {
				document.getElementById("form-tambah-satuan").reset();
				$('#tambah-satuan').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
				window.setTimeout(function(){window.location.reload()}, 1000);
			}
		})
		
		e.preventDefault();
	});

$(document).on("click", ".update-dataSatuan", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Pengaturan/updateSatuan'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-satuan').modal('show');
		})
	})
	$(document).on('submit', '#form-update-satuan', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Pengaturan/prosesUsatuan'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			//tampilPerusahaan();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
				window.setTimeout(function(){window.location.reload()}, 1000);
			} else {
				document.getElementById("form-update-satuan").reset();
				$('#update-satuan').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
				window.setTimeout(function(){window.location.reload()}, 1000);
			}
		})
		
		e.preventDefault();
	});

	$('#tambah-satuan').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-satuan').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})
	
	
	//end
	
//Laporan Laka
	function tampillaplaka() {
		$.get('<?php echo base_url('Laplaka/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-laplaka').html(data);
			refresh();
		});
	}


	var no_kasus;
	$(document).on("click", ".konfirmasiHapus-laplaka", function() {
		no_kasus = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-datalaplaka", function() {
		var id = no_kasus;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Laplaka/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampillaplaka();
			$('.msg').html(data);
			effect_msg();
		})
	})
function cetakLaplaka() {
}
	$(document).on("click", ".cetak-datalaplaka", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Laplaka/cetak'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#cetak-laplaka').modal('show');
			
		})
	})
	
	$('#form-tambah-lapor').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Laplaka/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampillaplaka();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();tampillaplaka();
			window.setTimeout(function(){window.location.reload()}, 1000);
			} else {
				document.getElementById("form-tambah-lapor").reset();
				$('#tambah-lapor').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			window.setTimeout(function(){window.location.reload()}, 1000);
			}
		})
		
		e.preventDefault();
	});
	$(document).on('submit', '#form-update-laplaka', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Laplaka/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampillaplaka();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			window.setTimeout(function(){window.location.reload()}, 1000);
			} else {
				document.getElementById("form-update-laplaka").reset();
				$('#update-laplaka').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			window.setTimeout(function(){window.location.reload()}, 1000);
			}
		})
		
		e.preventDefault();
	});

	$('#tambah-laplaka').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-laplaka').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})



//Berita Acara
	function tampilbak() {
		$.get('<?php echo base_url('Bak/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-bak').html(data);
			refresh();
		});
	}

	var no_kasus;
	$(document).on("click", ".konfirmasiHapus-bak", function() {
		no_kasus = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-databak", function() {
		var id = no_kasus;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Bak/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilbak();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-databak", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Bak/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-bak').modal('show');
		})
	})

	$(document).on("click", ".detail-databak", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Bak/detail'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#tabel-detail').dataTable({
				  "paging": true,
				  "lengthChange": false,
				  "searching": true,
				  "ordering": true,
				  "info": true,
				  "autoWidth": false
				});
			$('#detail-bak').modal('show');
		})
	})
	function cetakBAK() {
}
	$(document).on("click", ".cetak-databak", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Bak/cetak'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#cetak-bak').modal('show');
			
		})
	})

	$('#form-tambah-bak').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Bak/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilbak();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-bak").reset();
				$('#tambah-bak').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

$(document).on('submit', '#form-update-bak', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('bak/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilbak();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			window.setTimeout(function(){window.location.reload()}, 1000);
			} else {
				document.getElementById("form-update-bak").reset();
				$('#update-databak').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			window.setTimeout(function(){window.location.reload()}, 1000);
			}
		})
		
		e.preventDefault();
	});


	$('#tambah-bak').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-bak').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})


//Kasus Pengemudi
	function tampilkasussp() {
		$.get('<?php echo base_url('kasussp/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-kasussp').html(data);
			refresh();
		});
	}

	var nic_sp;
	$(document).on("click", ".konfirmasiHapus-kasussp", function() {
		nic_sp = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-datakasussp", function() {
		var id = nic_sp;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('kasussp/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilkasussp();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-datakasussp", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('kasussp/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-kasussp').modal('show');
		})
	})

	$(document).on("click", ".detail-datakasussp", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('kasussp/detail'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#tabel-detail').dataTable({
				  "paging": true,
				  "lengthChange": false,
				  "searching": true,
				  "ordering": true,
				  "info": true,
				  "autoWidth": false
				});
			$('#detail-kasussp').modal('show');
		})
	})

	$('#form-tambah-kasussp').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('kasussp/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilkasussp();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-kasussp").reset();
				$('#tambah-kasussp').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$(document).on('submit', '#form-update-kasussp', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('kasussp/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilkasussp();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-kasussp").reset();
				$('#update-kasussp').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$('#tambah-kasussp').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-kasussp').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})


//Kasus Kernet
	function tampilkasuskr() {
		$.get('<?php echo base_url('kasuskr/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-kasuskr').html(data);
			refresh();
		});
	}


	//Posisi
	function tampilPosisi() {
		$.get('<?php echo base_url('Posisi/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-posisi').html(data);
			refresh();
		});
	}

	var id_posisi;
	$(document).on("click", ".konfirmasiHapus-posisi", function() {
		id_posisi = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataPosisi", function() {
		var id = id_posisi;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Posisi/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilPosisi();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataPosisi", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Posisi/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-posisi').modal('show');
		})
	})

	$(document).on("click", ".detail-dataPosisi", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Posisi/detail'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#tabel-detail').dataTable({
				  "paging": true,
				  "lengthChange": false,
				  "searching": true,
				  "ordering": true,
				  "info": true,
				  "autoWidth": false
				});
			$('#detail-posisi').modal('show');
		})
	})

	$('#form-tambah-posisi').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Posisi/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilPosisi();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-posisi").reset();
				$('#tambah-posisi').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$(document).on('submit', '#form-update-posisi', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Posisi/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilPosisi();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-posisi").reset();
				$('#update-posisi').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$('#tambah-posisi').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-posisi').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})
	
	
	function req_nama_sp1(get_kode,get_area,flag)
{
clearTimeout(timer);
nic_sp=get_kode;
area=get_area;
if(flag=="start")
{
timer=setTimeout("req_nama_sp1(nic_sp,area,'delay')",200);
}
else if(flag=="delay")
{
if(get_kode==document.getElementById("nic_sp1").value)
{
var url="<?php echo base_url('laplaka/carisp');?>?rand="+Math.random();
var post="nic_sp="+nic_sp+"&act=req_nama_sp1";
ajax(url,post,area);
}
else
{timer=setTimeout("req_nama_sp1(nic_sp,area,'delay')",200);}
}
}

function req_tgl_masuk_sp(get_kode,get_area,flag)
{
clearTimeout(timer);
nic_sp=get_kode;
area=get_area;
if(flag=="start")
{
timer=setTimeout("req_tgl_masuk_sp(nic_sp,area,'delay')",200);
}
else if(flag=="delay")
{
if(get_kode==document.getElementById("nic_sp1").value)
{
var url="<?php echo base_url('laplaka/carisp_masuk');?>?rand="+Math.random();
var post="nic_sp="+nic_sp+"&act=req_tgl_masuk_sp";
ajax(url,post,area);
}
else
{timer=setTimeout("req_tgl_masuk_sp(nic_sp,area,'delay')",200);}
}
}


function req_nama_kr(get_kode,get_area,flag)
{
clearTimeout(timer);
nic_kr=get_kode;
area=get_area;
if(flag=="start")
{
timer=setTimeout("req_nama_kr(nic_kr,area,'delay')",200);
}
else if(flag=="delay")
{
if(get_kode==document.getElementById("nic_kr").value)
{
var url="<?php echo base_url('laplaka/carikr');?>?rand="+Math.random();
var post="nic_kr="+nic_kr+"&act=req_nama_kr";
ajax(url,post,area);
}
else
{timer=setTimeout("req_nama_kr(nic_kr,area,'delay')",200);}
}
}

/* pencarian Nomor Kasusnye */
var xmlhttp = false;

try {
	xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
} catch (e) {
	try {
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	} catch (E) {
		xmlhttp = false;
	}
}

if (!xmlhttp && typeof XMLHttpRequest != 'undefined') {
	xmlhttp = new XMLHttpRequest();
}


//untuk bukutamu
function surat(no_kasus){
	var obj=document.getElementById("pencarian");
	var url='<?php echo base_url('bak/carisurat');?>?no_kasus='+no_kasus;
	
	xmlhttp.open("GET", url);
	
	xmlhttp.onreadystatechange = function() {
		if ( xmlhttp.readyState == 4 && xmlhttp.status == 200 ) {
			obj.innerHTML = xmlhttp.responseText;
		} else {
			obj.innerHTML = "<div align ='center'><img src='waiting.gif' alt='Loading' /></div>";
		}
	}
	xmlhttp.send(null);
}

</script>