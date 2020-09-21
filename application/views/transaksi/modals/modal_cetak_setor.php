<script>
        document.getElementById("btnPrint").onclick = function () {
    printElement(document.getElementById("printThis"));
}

function printElement(elem) {
    var domClone = elem.cloneNode(true);
    
    var $printSection = document.getElementById("printSection");
    
    if (!$printSection) {
        var $printSection = document.createElement("div");
        $printSection.id = "printSection";
        document.body.appendChild($printSection);
    }
    
    $printSection.innerHTML = "";
    $printSection.appendChild(domClone);
    window.print();
}
    </script>
     <style>
         
	@media print{
         

@media screen {
  #printSection {
      display: none;
  }
}

@media print {
  body * {
    visibility:hidden;
  }
  #printSection, #printSection * {
    visibility:visible;
  }
  #printSection {
    position:absolute;
    left:0;
    top:0;
  }
}



 
 p, td, th {
    font:2 Verdana, Arial, Helvetica, sans-serif;
	
}
.datatable2 {
    border: 2px solid #000;
    border-collapse: collapse;
}
.datatable2 td {
    border: 2px solid #000;
    padding: 0px;
	font-family:Verdana, Arial, Helvetica, sans-serif;
	font-size:12px;
}
.datatable2 th {
    border: 2px solid #000;
    font-weight: bold;
	font-family:Verdana, Arial, Helvetica, sans-serif;
	font-size:12px;
}
#A4 {background-color:#FFFFFF;
left:5px;
right:5px;
height:5.51in ; /*Ukuran Panjang Kertas */
width: 8.50in; /*Ukuran Lebar Kertas */
margin:1px solid #FFFFFF;
 
font-family:Georgia, "Times New Roman", Times, serif;
}
    </style>
<div id="printThis">


 <div class="alert alert-success"><br><div class="alert alert-info">
 <table width="100%" border="0" cellpadding="5" cellspacing="0" bordercolor="#000000" style="border-collapse: collapse; background-color:#000 border: 2px solid #000; border:double list-style-position: outside;	background-attachment: scroll;	background-repeat: repeat-x; font-family: arial; font-size: 13px;" >
  <thead>
                    <tr>
                      <th colspan="4"><div align="left"><img src="<?php echo base_url(); ?>assets/img/se.png" width="358" height="65"></div></th>
                    </tr>
   </thead>
                <tbody>
               
			
                </tbody>
</table>
 <table>BUKTI SETORAN ID : <?php foreach ($dataKirim as $k){} echo $k->id_setor ; ?><br>
<table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#000000" style="border-collapse: collapse; background-color:#000 border: 2px solid #000; border:double list-style-position: outside;	background-attachment: scroll;	background-repeat: repeat-x; font-family: arial; font-size: 13px;" class="datatable" >
   <thead>
     <tr>
       <th width="17">No</th>
       <th width="64">NO STT</th>
       <th width="64">ASAL</th>
       <th width="90">TGL KIRIM</th>
       <th width="107">ASAL</th>
       <th width="88">TUJUAN</th>
       <th width="54">NOBODY</th>
       <th width="86">KETERANGAN</th>
       <th>JUMLAH</th>
     </tr>
     <?php
       $no=0;
       $jml_setor1=0;
       $jml_asuransi1=0;
       foreach ($dataKirim as $k){ 
	   $no++;
        $jml_setor1 += $k->jml_setor;
        $jml_asuransi1 += $k->jml_asuransi;
						?>
     <tr>
       <th><?php echo $no ?></th>
       <th><?php echo $k->no_stt ?></th>
       <th><?php echo $k->id_kirim ?></th>
       <th><?php echo date_indo($k->tgl_kirim) ?></th>
       <th><?php echo $k->asal ?></th>
       <th><?php echo $k->tujuan ?></th>
       <th><?php echo $k->no_body ?></th>
       <th><?php echo $k->nama_barang ?></th>
       <th width="49"><?php echo number_format($k->jml_setor) ?></th>
     </tr>
     <tr>
<?php } ?> 
       <th colspan="5">&nbsp;</th>
       <th colspan="3">TOTAL</th>
       <th><?php echo number_format($jml_setor1+$jml_asuransi1) ?></th>
     </tr>
         
   </thead>
   <tbody>
</table>
<table width="100%" border="0" cellpadding="5" cellspacing="0" bordercolor="#000000" style="border-collapse: collapse; background-color:#000 border: 2px solid #000; border:double list-style-position: outside;	background-attachment: scroll;	background-repeat: repeat-x; font-family: arial; font-size: 13px;" >
  <thead>
                    <tr>
                      <th>&nbsp;</th>
                      <th>&nbsp;</th>
                      <th>&nbsp;</th>
                      <th><?php echo date_indo($k->tgl_setor) ?></th>
                    </tr>
                    <tr>
                      <th width="164">Diterima</th>
                      <th width="193">&nbsp;</th>
                      <th width="102">&nbsp;</th>
                      <th width="141">Penyetor</th>
                    </tr>
                    <tr>
                      <th height="60"><p>&nbsp;</p></th>
                      <th>&nbsp;</th>
                      <th>&nbsp;</th>
                      <th><p>&nbsp;</p>                        <?php echo $k->penyetor ?></th>
                    </tr>
      </thead>
                <tbody>
</table>
             
</div>
        <div class="card-footer">
        <button type="button" id="btnPrint" class="btn btn-success" ><span class="fa fa-print"></span>&nbsp;&nbsp;  C E T A K </button>
      <button class="btn btn-danger" id="tutup" data-dismiss="modal"><span class="fa fa-close"></span>&nbsp;&nbsp; T U T U P</button>