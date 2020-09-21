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
        </div>
<?php 
            function limit_words($string, $word_limit){
                $words = explode(" ",$string);
                return implode(" ",array_splice($words,0,$word_limit));
            }      
        ?>

				<?php 
				foreach ($data->result_array() as $a) {
					$id=$a['menu_id'];
					$nama=$a['menu_nama'];	
					$deskripsi=$a['menu_deskripsi'];
					$harga_lama=$a['menu_harga_lama'];
					$harga_baru=$a['menu_harga_baru'];
					$harlam=$a['harga_lama'];
					$harbar=$a['harga_baru'];
					$like=$a['menu_likes'];
					$kat_id=$a['menu_kategori_id'];
					$kat_nama=$a['menu_kategori_nama'];
					$gambar=$a['menu_gambar'];

				?>
           
            </p>
    <div class="content">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
				 <div class="card card-first card-outline">
              <div class="card-body">
                    <div class="col-12 text-center">
						<a href="<?php echo base_url().'mobile/Transaksi/detail_menu/'.$id;?>">
                      <img src="<?php echo base_url().'assets/gambar/'.$gambar;?>" alt="" class="img-circle img-fluid" />
                    </div>
                    <div class="col-12 text-center">
                      <h2 class="lead"><b><?php echo $nama;?></b></h2>
                      <p class="text-muted text-sm"><b>Deskripsi: </b> <span class="current-price pull-right"><?php echo limit_words($deskripsi,5).'...';?></span> </p>
                      <ul class="ml-12 mb-0 fa-ul text-muted">
                        
                      </div>
                <div class="info-box col-12">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-dollar-sign"></i></span> 
						  <?php if(empty($harga_lama)):?>
								&nbsp;&nbsp;&nbsp;<h2 span class="current-price pull-left"><?php echo $harbar.'K';?></h2>
							<?php else:?>
								&nbsp;&nbsp;&nbsp;<h2 class="current-price pull-right"><?php echo $harbar.'K';?></h2>
								&nbsp;&nbsp;&nbsp;<del><span class="float-right text-lg text-muted"><?php echo $harlam.'K';?></span></del>
							<?php endif;?></li>
                      </ul>
                    </div>
                </div>
                <div class="card-footer">
                    <form action="<?php echo base_url().'mobile/Transaksi/insertOrder'?>" name="insertOrder" id="insertOrder" method="post">
                <a href="<?php echo base_url().'mobile/Transaksi/detail_menu/'.$id;?>" class="btn btn-sm btn-primary" style="text-decoration:none;"><div class="subFooter"><span class="fa fa-shopping-cart"></span>Detail </div>
                    </a>
          
                    <?php foreach ($user as $a){$invoice=$a->inv_no; }if (!empty($invoice)) {  ?>
                      <input type="hidden" name="no_inv" value="<?php echo $a->inv_no; ?>">
                      <input type="hidden" name="id_menu" value="<?php echo $id; ?>">
                      <input type="hidden" name="nama_menu" value="<?php echo $nama; ?>">
                      <input type="hidden" name="harga" value="<?php if(empty($harga_baru)){echo $harga_lama;} else { echo $harga_baru;} ?>">
                      <input type="hidden" name="jumlah" value="1">
                      <input type="hidden" name="user_id" value="<?php echo $userdata->pengguna_id; ?>">
                        <button type="submit" class="btn btn-sm bg-gradient-success float-right insert-order">
                        <span class="fa fa-shopping-cart"></span> Beli</button></div>
                  </form>
                        <?php } ?>
                    </div>
              </div>
            </div>	
			</div>
			</div>
				 <?php }?>
<a id="back-to-top" href="#" class="btn btn-primary back-to-top" role="button" aria-label="Scroll to top">
      <i class="fas fa-chevron-up"></i>
    </a>
                  <script>
function myFunction() {
  document.getElementById("panel1").style.display = "block";
  document.getElementById("panel2").style.display = "block";
}
</script>