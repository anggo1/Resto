        <div class="content">
      <div class="container">
        <div class="row">  
          <div class="col-lg-12">
<section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-12">
  
          <!-- ./col -->
        </div>
        </div>
        </div>
        </div>

				<?php 
				foreach ($data as $a) {
					$id=$a->menu_id;
					$nama=$a->menu_nama;	
					$deskripsi=$a->menu_deskripsi;
					$harga_lama=$a->menu_harga_lama;
					$harga_baru=$a->menu_harga_baru;
					$harlam=$a->menu_harga_lama;
					$harbar=$a->menu_harga_baru;
					$like=$a->menu_likes;
					$kat_id=$a->menu_kategori_id;
					$kat_nama=$a->menu_kategori_nama;
					$gambar=$a->menu_gambar;

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
                      <img src="<?php echo base_url().'assets/gambar/'.$gambar;?>" alt="" class="img-thumbnail" />
                    </div>
                    <div class="col-12 text-center">
                      <h2 class="lead"><b><?php echo $nama;?></b></h2>
                      <p class="text-muted text-sm"><b>Deskripsi: </b> <span class="current-price pull-right"><?php echo $deskripsi;?></span> </p>
                      <ul class="ml-12 mb-0 fa-ul text-muted">
                        
                      </div>
                <div class="info-box col-12">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-dollar-sign"></i></span> 
						  <?php if(empty($harga_lama)):?>
								&nbsp;&nbsp;&nbsp;<h2 span class="current-price pull-left"><?php echo $harbar;?></h2>
							<?php else:?>
								&nbsp;&nbsp;&nbsp;<h2 class="current-price pull-right"><?php echo $harbar;?></h2>
								&nbsp;&nbsp;&nbsp;<del style="color: darkgrey;"><h5 style="text-decoration:none; color: darkgrey; align:center;" class="current-price pull-right"><?php echo $harlam;?></h5></del>
							<?php endif;?></li>
                      </ul>
                    </div>
                </div>
                <div class="card-footer"><form action="<?php echo base_url().'mobile/Transaksi/insertOrder'?>" name="insertOrder" id="insertOrder" method="post">
                <a href="javascript:window.history.go(-1);" class="btn btn-sm btn-primary" style="text-decoration:none;"><div class="subFooter"><span class="fa fa-shopping-cart"></span> Kembali </div></a>
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
			</div>
			</div>
