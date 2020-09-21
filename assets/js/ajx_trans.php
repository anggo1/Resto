<script type="text/javascript">
$('#datepicker').datetimepicker({
    format: 'DD-MM-YYYY',
    date: moment()
});
    
	window.onload = function() {
		//tampilSatuan();
	}
	function refresh() {
		MyTable = $('#list-data,#table-1,#table-2,#table-barang,#list-menu').dataTable();
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
		"responsive": false,
		"paging": true,
		"lengthChange": true,
		"searching": true,
		"ordering": true,
		"info": true  
		});




//next id send datakode
    //Transaksi order
    

function next(datakode){
	document.getElementById('next_proses').value=datakode;
    var d = document.getElementById("cetak");
    d.setAttribute('data-id' , datakode,); 
    document.getElementById("tab-proses-tab").hidden = false;
	}	
function cek_inv(datakode) {
        //var out = jQuery.parseJSON(data);
		var next_proses = document.getElementById('next_proses').value=datakode;
		$.ajax({
		type: 'GET',
		url: '<?php echo base_url('Transaksi/cari_inv'); ?>?next_proses='+next_proses,
		data: 'next_proses=' +next_proses,
			success:function(hasil) {
			MyTable.fnDestroy();
			$('#data-pengiriman').html(hasil);
			refresh();
    document.getElementById("cetak").hidden = false;
			}
		});
	}
    
	$('#form-order').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('mobile/Transaksi/addOrder'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			if (out.status == 'form') {
                //toastr.error(out.msg);
				$('.msg').html(out.msg);
				refresh();
				effect_msg();
			} else {
                toastr.success(out.msg,{timeOut: 500});
                document.getElementById("form-order").reset();
                $('.datakode').html(out.datakode);
                $("#reg-order").attr('hidden', 'hidden');
                cek_inv(out.datakode);
                next(out.datakode);
			}
		})

		e.preventDefault();
	});
    
    	
    
     var data_id;

	$(document).on("click", ".delete-detailmenu", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('mobile/Transaksi/deleteDetailmenu'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
            location.reload(true);
				//refresh();
		})
	})
    $(document).on("click", ".edit-inv", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('mobile/Transaksi/editInv'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
            window.location.href = "<?php echo site_url('mobile/Transaksi/Cart'); ?>";
				//refresh();
		})
	})

    function cetakTtb(datakode) {
}
	$(document).on("click", ".cetak-datattb", function() {
		var id = $(this).attr("data-id");
		//var id = document.getElementById('next_proses').value=datakode;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Transaksi/cetak'); ?>",
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
	
	 
   //function hitung(){
   //     interval=setInterval("Pinter()",10);
   //     }

   //     function Pinter(){
   //     var a=document.updateOrder.harga.value;
   //     var b=document.updateOrder.jumlah.value;
   //         var c=a * b;
   //          function convertToRupiah(angka)
   //         {
   //             var rupiah = '';		
   //             var angkarev = angka.toString().split('').reverse().join('');
   //             for(var i = 0; i < angkarev.length; i++) if(i%3 == 0) rupiah += angkarev.substr(i,3)+'.';
   //             return 'Rp. '+rupiah.split('',rupiah.length-1).reverse().join('');
   //         }
   //         document.getElementById("total").firstChild.nodeValue = convertToRupiah(c);
   //         //document.form1.getElementById ( "total" ).innerText.value=(a*b);
   //         document.updateOrder.total.value=(c);
   //         
   //      }window.onload = hitung;

   //     function stopCalc(){
   //     clearInterval(interval);
   //     }
    

</script>