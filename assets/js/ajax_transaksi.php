<script type="text/javascript">
function autotab(original,destination){
if (original.getAttribute&&original.value.length==original.getAttribute("maxlength"))
destination.focus()
}
function f(o){o.value=o.value.toUpperCase().replace(/([^0-9A-Z(),-/ .])/g,"");}
function fn(o){o.value=o.value.toUpperCase().replace(/([^0-9A-Z()/ .])/g,"");}
 
	
	function fn(o){o.value=o.value.toUpperCase().replace(/([^0-9A-Z()/ .])/g,"");}
	
	  function isi_otomatis1(){
        var kode_asal =document.getElementById('kode_asal').value;
        $.ajax({
			url:"<?php echo base_url();?>Transaksi/cari_asal",
				data:'&kode_asal='+kode_asal,
				success:function(data){
				var hasil = JSON.parse(data);                       
				$.each(hasil, function(key,val){                  
				document.getElementById('asal').value=val.pangkalan;                               
                     
                });
            }
         });
                   
    }
	function isi_otomatis2(){
        var kode_tujuan =document.getElementById('kode_tujuan').value;
        $.ajax({
			url:"<?php echo base_url();?>Transaksi/cari_tujuan",
				data:'&kode_tujuan='+kode_tujuan,
				success:function(data){
				var hasil = JSON.parse(data);                       
				$.each(hasil, function(key,val){                  
				document.getElementById('tujuan').value=val.pangkalan;                               
                     
                });
            }
         });
                   
    }
		
function success() {
	 if(!document.getElementById("no_rekamedis").value.length) { 
            document.getElementById('button-a').disabled = true; 
            document.getElementById('button-b').disabled = true; 
            document.getElementById('button-c').disabled = true; 
            document.getElementById('button-d').disabled = true; 
        } else { 
            document.getElementById('button-a').disabled = false;
            document.getElementById('button-b').disabled = false;
            document.getElementById('button-c').disabled = false;
            document.getElementById('button-d').disabled = false;
        }
    }
	 
	function selectKonsumen(id_konsumen,nama){
				document.getElementById('id_konsumen').value=id_konsumen;
				document.getElementById('nama').value=nama; 
				$ ('#cari-konsumen'). modal ('hide');
				riwayat(document.getElementById('id_konsumen').value=id_konsumen);
		
				//$("a[href='#tab-daftar']").tab('show');
				//$('#tab-daftar').html(data);
				//$(".nav-link").removeClass("nav-link active");
				//$(".nav-link").tab('show');
					//$('#tab-daftar').tab('show active');
		 		//$('#tab-daftar').tab('show');
	}
	function selectRiwayat(penerima,tlp_penerima,asal,tujuan){
				document.getElementById('penerima').value=penerima;
				document.getElementById('tlp_penerima').value=tlp_penerima; 
				document.getElementById('asal').value=asal; 
				document.getElementById('tujuan').value=tujuan; 
		riwayat();
		
		
	}
	function selectAsal(kode,pangkalan){
				document.getElementById('kode_asal').value=kode;
				document.getElementById('asal').value=pangkalan; 
				$ ('#cari-asal'). modal ('hide');
	}
	function selectTujuan(kode,pangkalan){
				document.getElementById('kode_tujuan').value=kode;
				document.getElementById('tujuan').value=pangkalan; 
				$ ('#cari-tujuan'). modal ('hide');
	}	
    function selectHarga(id_satuan,nama_satuan,nama_barang,hrg_satuan,harga_minimum,jml_minimum,d_persen,d_kg,asuransi){
        document.getElementById('id_satuan').value=id_satuan;
        document.getElementById('nama_satuan').value=nama_satuan;
        document.getElementById('nama_barang').value=nama_barang;
        document.getElementById('hrg_satuan').value=hrg_satuan;
        document.getElementById('harga_minimum').value=harga_minimum;
        document.getElementById('jml_minimum').value=jml_minimum;
        document.getElementById('d_persen').value=d_persen;
        document.getElementById('d_kg').value=d_kg;
        document.getElementById('asuransi1').value=asuransi;
        $ ('#cari-barang'). modal ('hide');
}
function startCalculate(){
interval=setInterval("Calculate()",10);
}

function Calculate(){
var a=document.form1.jml_barang.value;
var b=document.form1.hrg_satuan.value;
var c=document.form1.harga_minimum.value;
var d=document.form1.jml_minimum.value
document.form1.total_biaya.value=(a-d)*b +(c*1);

}

function stopCalc(){
clearInterval(interval);
}

function startCalculate2(){
interval=setInterval("Calculate2()",10);
}

function Calculate2(){
var x=document.form1.d_kg.value;
var a=document.form1.jml_barang.value;
var b=document.form1.hrg_satuan.value;
var c=document.form1.harga_minimum.value;
var d=document.form1.jml_minimum.value
document.form1.total_biaya.value=((a-x)-d)*b +(c*1);

}

function stopCalc2(){
clearInterval(interval);
}
    

function startCalculate3(){
var a=document.form1.asuransi1.value;
//var b=document.form1._jml_asuransi.value;
document.form1.jml_asuransi.value=(a);
    $("#jml_asuransi").attr('readonly', 'readonly');
$("#fnasu").show();

}
function startCalculate4(){
var a=document.form1.asuransi1.value;
//var b=document.form1._jml_asuransi.value;
document.form1.jml_asuransi.value=(0);
document.getElementById('jml_asuransi').removeAttribute('readonly');
    $("#fnasu").show();

}
function startCalculate5(){
    $("#fnasu").hide();
var a=document.form1.asuransi1.value;
//var b=document.form1._jml_asuransi.value;
document.form1.jml_asuransi.value=(0);
    $("#jml_asuransi").removeAttribute('hiden', 'hiden');

}
//var MyTable = $('#list-kirim').dataTable({
	//	"responsive": true,
	//	"paging": false,
	//	"lengthChange": falsee,
	//	"searching": false,
	//	"ordering": false,
	//	"info": false
	//	});

 //document.onkeydown = function(ev) {   
 // var key;
 // ev = ev || event;
 // key = ev.keyCode;
 // if (key == 116) {
 // return false;  // disable F5 key
 //}
 //}
function riwayat(id_konsumen){
	var obj=document.getElementById("riwayat");
	var url='<?php echo base_url('Transaksi/cari_riwayat');?>?id_konsumen='+id_konsumen;
		
	//var url='search/cari_pelanggan/proses.php?key='+key;
	
	xmlhttp.open("GET", url);
	
	xmlhttp.onreadystatechange = function() {
		if ( xmlhttp.readyState == 4 && xmlhttp.status == 200 ) {
			obj.innerHTML = xmlhttp.responseText;
		} else {
			obj.innerHTML = "<div align ='center'><img src='<?php echo base_url ('assets/img/waiting.gif')?>' alt='Loading' /></div>";
		}
	}
	xmlhttp.send(null);
}		
function nama(cari_nama_konsumen){
	var obj=document.getElementById("pencarian");
	var url='<?php echo base_url('Transaksi/cari_nama_konsumen');?>?cari_nama_konsumen='+cari_nama_konsumen;
		
	//var url='search/cari_pelanggan/proses.php?key='+key;
	
	xmlhttp.open("GET", url);
	
	xmlhttp.onreadystatechange = function() {
		if ( xmlhttp.readyState == 4 && xmlhttp.status == 200 ) {
			obj.innerHTML = xmlhttp.responseText;
		} else {
			obj.innerHTML = "<div align ='center'><img src='<?php echo base_url ('assets/img/waiting.gif')?>' alt='Loading' /></div>";
		}
	}
	xmlhttp.send(null);
}
</script>