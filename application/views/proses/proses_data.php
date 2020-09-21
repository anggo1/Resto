<?php     foreach ($dataKirim as $k){?>
<p></p>
<div class="card-header">
            <h3 class="card-title ">
              <i class="fas fa-truck"></i>
              PROSES PENGIRIMAN BARANG
            </h3>
          </div>
<div class="card-body">
<div class="card-body bg-teal">
 <table width="100%" border="0" cellpadding="0" cellspacing="0" >
  <thead>
                    
                    <tr>
                      <th width="108"><div align="left">Pengirim</div></th>
                      <th width="5">:</th>
                      <th width="336"><div align="left"><?php echo $k->nama ?></div></th>
                      <th width="143"><div align="left">Penerima</div></th>
                      <th width="5">:</th>
                      <th width="533"><div align="left"><?php echo $k->penerima ?></div>                        <div align="left"></div></th>
                      <th width="108"><div align="left">Asal</div></th>
                      <th width="5">:</th>
                      <th width="538"><div align="left"><?php echo $k->asal ?></div></th>
                    </tr>
                    <tr>
                      <th><div align="left">Telp / HP </div></th>
                      <th>:</th>
                      <th><div align="left"><?php echo $k->no_telp ?></div></th>
                      <th><div align="left">Telp / HP</div></th>
                      <th>:</th>
                      <th><div align="left"><?php echo $k->tlp_penerima ?></div>                        <div align="left"></div></th>
                      <th><div align="left">Tujuan</div></th>
                      <th>:</th>
                      <th><div align="left"><?php echo $k->tujuan ?></div></th>
                    </tr>
  </thead>
<?php } ?>
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
                      <th>Fee</th>
                      <th>Ket</th>
                    </tr>
                  <?php 
                    $no=0;                       
                         $total_fee='0';
                     foreach($detailKirim as $d){
                         $total_biaya=$d->total_biaya;
                          $fee_agen1=$d->persen;
                                $fee_agen_satu=$fee_agen1*$total_biaya/100;
                                $fee_crew=$d->fee_crew;
                                $potongan=$total_biaya*$fee_crew/100;
                                    $total_fee += $potongan;	

                                    $dana=$total_fee;
                         
                         $ratusan = substr($dana, -3);
                         if($ratusan<500)
                         $akhir = $dana - $ratusan;
                         else
                         $akhir = $dana + (1000-$ratusan);

                         $danaagen=$fee_agen_satu;
                         $ratusanagen = substr($danaagen, -3);
                         if($ratusan<500)
                         $akhiragen = $danaagen - $ratusanagen;
                         else
                         $akhiragen = $danaagen + (1000-$ratusanagen);
		
                        $no++; ?>
                    <tr>
                      <th><?php echo $no ?></th>
                      <th><div align="left"><?php echo $d->nama_barang ?> </th>
                      <th><?php echo $d->jml_barang ?></th>
                      <th><?php echo $d->jml_colli ?></th>
                      <th align="right"><?php echo number_format($d->jml_asuransi) ?></th>
                      <th align="right"><?php echo number_format($d->beaToDoor) ?></th>
                      <th align="right"><?php echo $d->formatted1 = number_format($d->total_biaya) ?></th>
                      <th ><?php echo number_format($potongan) ?></th>
                      <th ><?php echo $d->keterangan ?></th>
                    </tr>
                    <?php $no+1;  }?>
                    <tr>
                   <?php foreach($detailSum as $s){?>
                      <th colspan="3"><?php echo $s->barangnya ?></th>
                      <th><?php echo $s->jumlah_collinya ?></th>
                      <th><?php echo number_format($s->jumlah_asuransi) ?></th>
                      <th><?php echo number_format($s->total_ToDoor) ?></th>
                      <th><?php echo number_format($s->total_biayanya) ?></th>
                      <th><?php echo number_format($total_fee) ?></th>
                      <th><font size="+1"><?php echo number_format($s->total_ToDoor+$s->total_biayanya+$s->jumlah_asuransi) ?></font></th>
                    </tr>
                    <?php  } ?>
      </thead>
              
</table>
     </div>
     </div>
     <div class="card-body">
<form id="proseskirim" name="proseskirim" method="POST">
                  <div class="form-group row">
                    <label for="No Rekamedis" class="col-sm-2 col-form-label">No Body</label>
                    <div class="col-sm-4">
                        <input type="text" name="no_body" id="no_body" class="form-control">
					</div>
					<label class="col-sm-2 col-form-label">Tanggal Kirim</label>
                    <div class="col-sm-4">
						<div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input type="text" name="tgl_kirim" id="datepicker" value="" class="form-control datepicker datetimepicker" data-toggle="datetimepicker" data-target=".datepicker" data-format="yyy-mm-dd">
                        <div class="input-group-append" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                    </div>
                  </div>
    
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nama Pengemudi</label>
                    <div class="col-sm-1">
                      <input type="text" name="nic_sp" id="nic_sp" class="form-control"
						onBlur="isi_otomatis1()"
						onkeyup="isi_otomatis1()" onFocus="isi_otomatis1()" onChange="fn(this)" onKeyPress="isi_otomatis1()">
                    </div>
						<div class="col-sm-3">
                        <input type="text" name="nama_sp" id="nama_sp" class="form-control">
						</div>
					<label class="col-sm-2 col-form-label">Fee Driver</label>
                    <div class="col-sm-2">
                      <input type="text" name="fee_driver" id="fee_driver" value="<?php echo $akhir ?>" class="form-control">
                        <input type="hidden" name="fee_driver1" id="fee_driver1" value="<?php echo $total_fee ?>" readonly class="input-large" style="text-align:right;" />
                    </div>
                      <div class="col-sm-2">
                    <div class="icheck-success d-inline">
                      <input type="checkbox" name="non_fee" id="non_fee" value="0" >
                      <label for="non_fee">
                        </label>
                      </div>
                    </div>
    </div>
					<div class="form-group row">
                    <label class="col-sm-2 col-form-label">Kernet</label>
                    <div class="col-sm-4">
                      <input type="text" name="kernet" id="kernet" onkeypress="return handleEnter(this, event)" onkeydown="f(this)"  class="form-control">
                    </div>
					<label class="col-sm-2 col-form-label">Fee Agen</label>
                    <div class="col-sm-2">
                      <input type="text" name="fee_agen_bayar" id="fee_agen_bayar" class="form-control" value="0">
                        <input type="hidden" name="fee_agen_satu1" id="fee_agen_satu1" size="5" value="<?php echo $akhiragen ?>" />
                    </div>
                      <div class="col-sm-2">
                    <div class="icheck-success d-inline">
                      <input type="checkbox" name="non_agen" id="non_agen">
                      <label for="non_agen">
                        </label>
                      </div>
                    </div>
                    </div>
                    <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Pegawai</label>
                    <div class="col-sm-1">
                      <input type="text" name="nip" id="nip" class="form-control" onChange="fn(this)">
                    </div>
						<div class="col-sm-3">
                        <input type="text" name="nama_peg" id="nama_peg" class="form-control">
						</div>
					<label class="col-sm-2 col-form-label">Bea To Door ?</label>
					<div class="col-sm-4">
                    <div class="icheck-danger d-inline">
                      <input type="checkbox" name="potong_to_door" id="potong_to_door" value="Y">
                      <label for="potong_to_door"> Potong
                        </label>
                      </div>
                    </div>
                    </div>				
                    <input type="hidden" name="barangnye" id="barangnye" value="<?php echo $s->barangnya ?>"/>
                    <input type="hidden" name="pembayaran" id="pemayaran" value="<?php echo $k->pembayaran ?>"/>
                    <input type="hidden" name="to_door" id="to_door" value="<?php echo $s->total_ToDoor ?>"/>
                    <input type="hidden" name="tglBuat" id="tglBuat" value="<?php echo $d->tgl_buat ?>"/>
                    <input type="hidden" name="pembuat" id="pembuat" value="<?php echo $k->pembuat ?>"/>
                    <input type="hidden" name="manual_stt" id="manual_stt" value="<?php echo $k->manual?>"/>
                    <input type="hidden" name="id_konsumen" id="konsumen" value="<?php echo $k->id_konsumen ?>"/>
                    <input type="hidden" name="jumlahnye" id="jumlahnye" value="<?php echo $s->barangnya?>"/>
                    <input type="hidden" name="collinye" id="collinye" value="<?php echo $s->jumlah_collinya ?>"/>
                    <input type="hidden" name="biayanye" id="biayanye" value="<?php echo $s->total_biayanya ?>"/>
                    <input type="hidden" name="keterangan_a" id="keterangan_a" value="<?php echo $s->ket_barang ?>"/>
                    <input type="hidden" name="id_kirim" id="id_kirim" value="<?php echo $d->id_kirim?>" />
                    <input type="hidden" name="detail_aslinya" id="detail_aslinya" value="<?php echo $d->id_kirim?>" />
                    <input type="hidden" name="asal" id="asal" value="<?php echo $k->asal ?>" />
                    <input type="hidden" name="tujuan" id="tujuan" value="<?php echo $k->tujuan ?>" />
                    <input type="hidden" name="total_asuransi" id="total_asuransi" value="<?php echo $s->jumlah_asuransi ?>" />
                    
                    <div class="form-group row ">
                    <div class="col-sm-6">
                    <button type="submit" class="form-control btn bg-gradient-primary"> <i class="fa fa-check-circle"></i> Simpan</button>
                    </div>
       </form>
</div> 
</div> 
<script type="text/javascript">
    $('#datepicker').datetimepicker({
    format: 'DD-MM-YYYY',
    date: moment()
});
    function refresh() {
		MyTable = $('#table-kirim').dataTable();
	}

var a=document.proseskirim.fee_driver1.value;
var b=document.proseskirim.non_fee.value
document.getElementById('non_fee').onclick = function() {
    if ( this.checked ) {
        
document.proseskirim.fee_driver.value=0;
    } else {        
document.proseskirim.fee_driver.value=a;
    }
};


var c=document.proseskirim.fee_agen_satu1.value;
var d=document.proseskirim.non_agen.value
    document.getElementById('non_agen').onclick = function() {
    if ( this.checked ) {
document.proseskirim.fee_agen_bayar.value=c;
    } else {        
document.proseskirim.fee_agen_bayar.value=0;
    }
};
    
    $('#proseskirim').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Pengiriman/prosesTkirim'); ?>',
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
                $('#proses-kirim').modal('hide');
                refresh()
				$('.msg').html(out.msg);
				effect_msg();
                window.setTimeout(function(){window.location.reload()}, 1000);
			}
		})

		e.preventDefault();
	});
     $('#proses-kirim').on('hidden.bs.modal', function () {
	$('.form-msg').html('');
	});
    
function isi_otomatis1(){
        var nic_sp =document.getElementById('nic_sp').value;
        $.ajax({
			url:"<?php echo base_url();?>Pengiriman/carisp",
				data:'&nic_sp='+nic_sp,
				success:function(data){
				var hasil = JSON.parse(data);                       
				$.each(hasil, function(key,val){                  
				document.getElementById('nama_sp').value=val.nama_sp;                               
                     
                });
            }
         });
                   
    }

</script>