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
<?php foreach ($dataKirim as $k){}?>

 <table width="100%" border="1" cellpadding="5" cellspacing="0"  class="datatable2" >
  <thead>
                    <tr>
                      <th colspan="4" rowspan="4"><img src="<?php echo base_url(); ?>assets/img/se.png" width="358" height="65"></th>
                      <th colspan="4">TANDA TERIMA BARANG
                      NO :<strong> <font size="+1"><?php echo $k->id_kirim ?></font></strong></th>
                    </tr>
                    <tr>
                      <th width="194"><div align="left">Pengirim</div></th>
                      <th width="231"><div align="left"><?php echo $k->nama ?></div></th>
                      <th width="232"><div align="left">Penerima</div></th>
                      <th width="267"><div align="left"><?php echo $k->penerima ?></div>                        <div align="left"></div></th>
                    </tr>
                    <tr>
                      <th><div align="left">Telp / HP </div></th>
                      <th><div align="left"><?php echo $k->no_telp ?></div></th>
                      <th><div align="left">Telp / HP</div></th>
                      <th><div align="left"><?php echo $k->tlp_penerima ?></div>                        <div align="left"></div></th>
                    </tr>
                    <tr>
                      <th height="32"><div align="left">Agen</div></th>
                      <th><div align="left"><?php echo $k->asal ?></div></th>
                      <th><div align="left">Agen</div></th>
                      <th><div align="left"><?php echo $k->tujuan ?></div>                        <div align="left"></div></th>
                    </tr>
  </thead>

</table>
    
 <table>
    <table width="100%" border="1" cellpadding="5" cellspacing="0"  class="datatable2" >
  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Barang</th>
                      <th>Jml/Kg</th>
                      <th>Colli</th>
                      <th>Asuransi</th>
                      <th>BeaToDoor</th>
                      <th>Biaya</th>
                      <th>Status</th>
                      <th>Ket</th>
                    </tr>
                  <?php $no=0;foreach($detailKirim as $d):$no++;?>
                    <tr>
                      <th><?php echo $no ?></th>
                      <th><div align="left"><?php echo $d->nama_barang ?> <em> <font size="-3">
                      <?php 
                        if (!empty($d->diskon)){
                            $diskon=$d->diskon;
                        
                        if($diskon=='potong_kg'){echo'DISKON ';} 
                          if(!empty($d->d_kg)) {echo $d->d_kg.' Kg';}
                          if(!empty($d->d_persen)) {echo $d->d_persen.' %';} }?>|
                      <?php if(!empty($d->asuransi)){echo $d->asuransi;} else {echo 'Non Asuransi';} ?>
                      </em></font></div></th>
                      <th><?php echo $d->jml_barang ?></th>
                      <th><?php echo $d->jml_colli ?></th>
                      <th align="right"><?php echo number_format($d->jml_asuransi) ?></th>
                      <th align="right"><?php echo number_format($d->beaToDoor) ?></th>
                      <th align="right"><?php echo $d->formatted1 = number_format($d->total_biaya) ?></th>
                      <th ><?php echo $d->keterangan ?></th>
                      <th ><?php if($d->beaToDoor > 1){ echo 'To Door' ;} ?></th>
                    </tr>
                    <?php $no+1;endforeach ?>
                    <tr>
                    <tr>
                   <?php 
                if(!empty($detailSum)){
                foreach($detailSum as $s){
                    if(!empty($s->total_asuransi)){
                        $total_asuransi=$s->total_asuransi;}
                        else { $total_asuransi='0';
                             }
                    }} 
                ?>
                      <th colspan="3">&nbsp;</th>
                      <th><?php echo $s->jumlah_collinya ?></th>
                      <th align="right"><?php if(!empty($s->total_asuransi)){ echo number_format($s->total_asuransi);} else { echo ''; } ?></th>
                      <th align="right"><?php echo number_format($s->total_ToDoor) ?></th>
                      <th align="right"><?php echo number_format($s->total_biayanya) ?></th>
                      <th colspan="2"><font size="+1"><?php echo number_format($s->total_ToDoor+$s->total_biayanya+$total_asuransi) ?></font></th>
                    </tr><?php ?>
      </thead>
              
</table>
 <table>
<table width="100%" border="1" cellpadding="5" cellspacing="0"  class="datatable2" >
  <thead>
                    <tr>
                      <th width="254">Titipan Kilat SINAR EXPRESS</th>
                      <th width="126">Pengirim</th>
                      <th width="110">Pembayaran</th>
                      <th width="146">Penerima</th>
                    </tr>
                    <tr>
                      <th height="60"><p><?php echo date('d M Y');?></p>
                      <?php echo $userdata->FirstName.'&nbsp; '.$userdata->LastName; ?></th>
                      <th><p>&nbsp;</p>                        <?php echo $k->nama;?></th>
                      <th><p>&nbsp;</p>                        <?php if ($k->pembayaran == 'Y'){echo 'LUNAS';} else{ echo'BAYAR DITUJUAN';}?></th>
                      <th><p>&nbsp;</p>                        <?php echo $k->penerima?></th>
                    </tr>
  </thead>
                
</table>
    <strong><font size="-1">Lembar Putih</strong> : Pengirim <strong>Lembar Biru</strong> : Expeditur<strong> Lembar Kuning</strong> : Agen Penerima <strong>Lembar Merah</strong> : Keuangan</font>
    <table>
<table width="100%" cellpadding="5" cellspacing="0"  class="datatable2" >
  <thead>
                    <tr>
                      <th height="74"><ol><font size="-1"><u><em>Syarat & Ketentuan :</em></u>
<li>Isi barang tidak  diperiksa apabila tidak sesuai dengan pengakuan, maka hal tersebut diluar  tanggung jawab Ekspedisi.</li>
      <li>Kami tidak menanggung  kerusakan/kehilangan sebagai akibat Force Majeure/bencana-alam/perampokan/huruhara.  Juga resiko teknis yang menyebabkan barang electronik tidak berfungsi</li>
      <li>Barang yang tidak  diasuransikan apabila ada kerusakan/kehilangan diganti max. 10 x dari ongkos  kirim atau max. Rp. 1.000.000,-</li>
      <li>Dengan menanda-tangani  Surat Tanda Terima (STT), pengguna jasa dianggap telah SETUJU dan memahami segala ketentuan di atas</li>
      <li>Bila barang telah diterima dan ditandatangani oleh penerima, maka tanggung jawab pihak ekspedisi telah selesai dan kami tidak menerima klaim dalam bentuk apapun</li>
</font></ol></th>
                    </tr>
  </thead>
</table>
        </div>
        <div class="card-footer">
        <button type="button" id="btnPrint" class="btn btn-success" ><span class="fa fa-print"></span>&nbsp;&nbsp;  C E T A K </button>
      <button class="btn btn-danger" id="tutup" data-dismiss="modal"><span class="fa fa-close"></span>&nbsp;&nbsp; T U T U P</button>