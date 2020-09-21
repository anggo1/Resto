<style>
div.sticky {
  position: -webkit-sticky;
  position: sticky;
  top: 0;
}
    #panel1 {
  display: none;
}#panel2 {
  display: none;
}
</style>
      
      <div class="container">
        <div class="row sticky"  style="z-index:1">
          <div class="col-sm-3 col-3">
            <!-- small box -->
            <div class="small-box bg-gradient-primary" style="border-radius: 0.50rem;">
              <div class="inner" style="padding-bottom: 0rem;">
                  <a href="<?php echo base_url().'mobile/Transaksi/makanan'?>">
                      <h4 align="center" style="padding-bottom: 0rem;"><i class="fa fa-utensils" style="color: aliceblue;"></i></h4>
                     </div>
              <a href="#" class="small-box-footer" style="border-bottom-left-radius: 0.50rem;border-bottom-right-radius: 0.50rem;">
                  <?php // echo $dataMakanan; ?> Makanan</a>            
                </div></a>
          </div>
          <!-- ./col -->
          <div class="col-sm-3 col-3">
            <!-- small box -->
            <div class="small-box bg-gradient-success" style="border-radius: 0.50rem;">
              <div class="inner" style="padding-bottom: 0rem;"><a style="color: aliceblue;" href="<?php echo base_url().'mobile/Transaksi/minuman'?>">
                <h4 align="center"><i class="fa fa-wine-glass-alt" style="color: aliceblue;"></i></h4>
              <div class="icon">
                <i class="fa fa-wine-glass-alt"></i>
              </div>
              </div>
              <a href="#" class="small-box-footer" style="border-bottom-left-radius: 0.50rem;border-bottom-right-radius: 0.50rem;">
                  <?php // echo $dataMinuman; ?> Minuman</a>
                </div>
          </div>
          <!-- ./col -->
          <div class="col-sm-3 col-3">
            <!-- small box -->
            <div class="small-box bg-gradient-maroon" style="border-radius: 0.50rem;">
              <div class="inner" style="padding-bottom: 0rem;"><a style="color: aliceblue;" href="<?php echo base_url().'mobile/Transaksi/hot_promo'?>">
                <h4 align="center"><i class="fa fa-fire" style="color: aliceblue;"></i></h4>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
            </div>
              <a href="#" class="small-box-footer" style="border-bottom-left-radius: 0.50rem;border-bottom-right-radius: 0.50rem;">Promo</a>
          </div>
          </div>
              <div class="col-sm-3 col-3" id="panel1">
            <!-- small box -->
            <div class="small-box bg-gradient-warning" style="border-radius: 0.50rem;">
              <div class="inner" style="padding-bottom: 0rem;"><a style="color: aliceblue;" href="<?php echo base_url().'mobile/Transaksi/cart'?>">
                <h4 align="center"><i class="fa fa-shopping-cart" style="color: aliceblue;"></i></h4>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
          </div>
              <a href="#" class="small-box-footer" style="border-bottom-left-radius: 0.50rem;border-bottom-right-radius: 0.50rem;">Keranjang</a>
            </div>
            </div>
            
              <div class="col-sm-3 col-3" id="panel2">
            <!-- small box -->
            <div class="small-box bg-gradient-info" style="border-radius: 0.50rem;">
              <div class="inner" style="padding-bottom: 0rem;"><a style="color: aliceblue;" href="<?php echo base_url().'mobile/Transaksi/list_transaksi'?>">
                <h4 align="center"><i class="fa fa-list-ol" style="color: aliceblue;"></i></h4>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
          </div>
              <a href="#" class="small-box-footer" style="border-bottom-left-radius: 0.50rem;border-bottom-right-radius: 0.50rem;">Transaksi</a>
            </div>
            </div>
          <!-- ./col -->
          <div class="col-sm-3 col-3"  onclick="myFunction()">
            <!-- small box -->
            <div class="small-box bg-gradient-lightblue" style="border-radius: 0.50rem;">
              <div class="inner" style="padding-bottom: 0rem;"><a style="color: aliceblue;">
                <h4 align="center"><i class="fa fa-th-large" style="color: aliceblue;"></i></h4>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
          </div>
              <a href="#" class="small-box-footer" style="border-bottom-left-radius: 0.50rem;border-bottom-right-radius: 0.50rem;">More info</a>
            </div>
            </div>
              <div class="col-sm-12 col-12">
              
            <div class="small-box bg-gradient-primary" style="border-radius: 0.50rem;">
            <!-- small box -->
              <?php foreach ($user as $a){$invoice=$a->inv_no; }if (empty($invoice)) {  ?>
            <div id="reg-order" class="small-box bg-gradient-indigo" type="submit">
                  <form method="POST" action="<?php echo base_url('mobile/Transaksi/addOrder');?>">
                      <button type="submit" class="small-box bg-gradient-indigo col-lg-12" style="border-radius: 0.50rem; border: none;">
                  <!--<a style="color: aliceblue;" href="#" onclick="document.getElementById('form-order').submit();">-->
                   
                <h3 style="text-decoration:none; align:center;">NEW ORDER </h3>

                <p>Pesanan Baru</p>
              <div class="icon">
                <i class="fa fa-user-plus"></i>
              </div>
                      <input type="hidden" name="pengguna_id" id="pengguna_id" value="<?php echo $userdata->pengguna_id; ?>">
                      <input type="hidden" name="uri" id="uri" value="<?php echo $this->uri->segment(3) ?>">
                    
                </form>
                </a>
            </div><?php } ?>
          <!-- ./col -->
        </div>
        </div>
        </div><div class="content">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
				 <div class="card card-first card-outline">
              <div class="card-body">
                <h4 class="current-price pull-right">Invoice : <?php if(!empty($user)){foreach ($user as $a){echo $invoice=$a->inv_no; } }?></h4>
                      <table class="table table-striped  table-bordered table-hover dt-responsive" id="list-menu">
                        <thead> 
							<tr>
								<th style="text-align:center;">Menu</th>
								<th style="text-align:center;">Jumlah</th>
								<th style="text-align:center;">Subtotal</th>
								<th style="text-align:center;">Aksi</th>
							</tr>
							<thead>
							<tbody>
							<?php $i = 1; ?>
							<?php $grand_total_harga=0; 
                                if (!empty($dataInv)){foreach ($dataInv as $items) { 
                                    //echo form_hidden($i.'[rowid]', $items['rowid']);
                                    $grand_total_harga+=$items->total_harga;?>

                                    
								<tr><form action="<?php echo base_url().'mobile/Transaksi/update'?>" method="post">
									<td  style="width:10%"><?php echo $items->nama_menu;?></td>
									<td >
                                        <input type="hidden" name="id_menu[]" value="<?php echo $items->id_menu ?>">
                                        <input type="hidden" name="id_detail[]" value="<?php echo $items->id_detail ?>">
                                        <input type="number" value="<?php echo $items->jumlah ?>" name="jumlah[]" id="jumlah" class="form-control"></td>
									<td>
                                        <input type="hidden" name="harga[]" id="harga" class="form-control" value="<?php echo $items->harga_menu; ?>">
                                        <?php echo number_format($items->total_harga);?></td>
									<td style="text-align:center;width:15%;">
                                        <a href="#" style="text-decoration:none;"data-id="<?php echo $items->id_detail; ?>"class="delete-detailmenu">
                                            <i class="fa fa-trash-alt"></i></a></td>
								</tr>
							<?php $i++; ?>
							<?php  }} ?>
							</tbody>
							<tfoot>
								<tr>
									<th style="text-align:left;" colspan="2">Total</th>
									<th style="text-align:center;"><?php echo number_format($grand_total_harga);?></th>
									<th></th>
								</tr>
							</tfoot>
						</table>
                            
						<button type="submit" class="btn btn-sm bg-gradient-primary float-left" style="border:none;height:32px;"><span class="fa fa-shopping-cart"> Update Keranjang</button>
						</form><form action="<?php echo base_url().'mobile/Transaksi/check_out'?>"method="post">
                          <input type="hidden" name="id_inv" value="<?php if(!empty($a->id_inv)){ echo $a->id_inv; }?>">
                            <input type="hidden" name="grand_total" value="<?php echo $grand_total_harga; ?>">
                  <button type="submit" class="btn btn-sm bg-gradient-danger float-right checkout" style="border:none;height:32px;">
                      <span class="fa fa-check"> Check Out</a></button></form>
						
					</div>
            

			</div>
			</div>
			</div>
			</div>
			</div>
			</div>
                                    <script>
function myFunction() {
  document.getElementById("panel1").style.display = "block";
  document.getElementById("panel2").style.display = "block";
}
</script>