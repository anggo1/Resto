<script type="text/javascript">
$('#datepicker').datetimepicker({
    format: 'DD-MM-YYYY',
    date: moment()
});
    
	window.onload = function() {
		sSend();
	}
	function refresh() {
		MyTable = $('#list-data,#table-1,#table-2,#table-kirim').dataTable();
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

var MyTable = $('#list-data,#table-1').dataTable({
		"responsive": true,
		"paging": true,
		"lengthChange": true,
		"searching": true,
		"ordering": false,
		"info": true,
        "autoWidth": false,
		"processing": true,
        "pageLength": 5   
		});


//var table;
function sSend() {
		$.get('<?php echo base_url('Pengiriman/sSend'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-pengiriman').html(data);
			refresh();
		});
	}
//next id send datakode
function next(datakode){
	document.getElementById('next_proses').value=datakode;
    var d = document.getElementById("cetak");
    d.setAttribute('data-id' , datakode,); 
    document.getElementById("cetak").hidden = false;
    document.getElementById("tab-proses-tab").hidden = false;
	}	
function tampilDetailkirim(datakode) {
        //var out = jQuery.parseJSON(data);
		var next_proses = document.getElementById('next_proses').value=datakode;
		$.ajax({
		type: 'GET',
		url: '<?php echo base_url('Transaksi/tampilDetail'); ?>?next_proses='+next_proses,
		data: 'next_proses=' +next_proses,
			success:function(hasil) {
			MyTable.fnDestroy();
			$('#data-pengiriman').html(hasil);
			refresh();
			}
		});
	}


	$('#form-tambah-pengiriman').on('hidden.bs.modal', function () {
	$('.form-msg').html('');
	})
    $('#form1').on('hidden.bs.modal', function () {
	$('.form-msg').html('');
	})
	$('#update-konsumen').on('hidden.bs.modal', function () {
	$('.form-msg').html('');
	})

    function cetakTtb(datakode) {
}
	$(document).on("click", ".cetak-ulang", function() {
		var id = $(this).attr("data-id");
		//var id = document.getElementById('next_proses').value=datakode;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Pengiriman/cetak'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#modal-ttb').html(data);
			$('#cetak-ttb').modal('show');
			
		})
	})
    function tampilKonsumen() {
            table.ajax.reload( null, false );
	}
    $(document).on("click", ".kirim-barang", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Pengiriman/kirim'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
            $('#modal-kirim').html(data);
			$('#proses-kirim').modal('show');
            
   // document.getElementById("tab-proses-tab").hidden = false;
			//$('#tab-proses').html(data);
			//$('#tab-daftar').tab('show');
			//tampilObatPasien1(); 
			//$('#tab-daftar').tabContent('show');
           // $("a[href='#tab-proses']").tab('show');	
			
		})
	})
       
    var data_id;
	$(document).on("click", ".delete-detail", function() {
		data_id = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-data", function() {
		var id = data_id;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Transaksi/deleteDetail'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
            var out = jQuery.parseJSON(data);
            if (out.status != 'form') {
                toastr.error(out.msg);
				//$('.msg').html(out.msg);
                $('#konfirmasiHapus').modal('hide');
                var next_proses = document.form1.next_proses.value;
                //next(next_proses);
                tampilDetailkirim(next_proses);
			} 
		})
	})
    
//Front//
    function autotab(original,destination){
if (original.getAttribute&&original.value.length==original.getAttribute("maxlength"))
destination.focus()
}
function f(o){o.value=o.value.toUpperCase().replace(/([^0-9A-Z(),-/ .])/g,"");}
function fn(o){o.value=o.value.toUpperCase().replace(/([^0-9A-Z()/ .])/g,"");}
 
	
	function fn(o){o.value=o.value.toUpperCase().replace(/([^0-9A-Z()/ .])/g,"");}
	

function success() {
	 if(!document.getElementById("next_proses").value.length) { 
            document.getElementById('cetak').disabled = true; 
        } else { 
            document.getElementById("cetak").style.visibility = "hidden";
        }
    }
	 

    //end
</script>