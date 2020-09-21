        <div class="content">
      <div class="container">
        <div class="row">  
          <div class="col-lg-12">
<section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            
          <div class="col-lg-12">
              <?php foreach ($user as $a){$invoice=$a->inv_no; }if (empty($invoice)) {  ?>
            <div id="reg-order" class="small-box bg-gradient-indigo" type="submit">
              <div class="inner"> 
                  <form method="POST" action="<?php echo base_url('mobile/Transaksi/addOrder');?>">
                      <button type="submit" class="small-box bg-gradient-indigo col-lg-12" style="border: none;">
                  <!--<a style="color: aliceblue;" href="#" onclick="document.getElementById('form-order').submit();">-->
                   
                <h3 style="text-decoration:none; align:center;">NEW ORDER </h3>

                <p>Pesanan Baru</p>
              </div> <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              <div class="icon">
                <i class="fa fa-user-plus"></i>
              </div>
                      <input type="hidden" name="pengguna_id" id="pengguna_id" value="<?php echo $userdata->pengguna_id; ?>">
                      <input type="hidden" name="uri" id="pengguna_id" value="<?php echo $this->uri->segment(3) ?>">
                    
                </form>
                </a>
            </div><?php } ?>
          </div>
          <!-- ./col -->
        </div>
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
            <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-info">
                  
						<a href="<?php echo base_url().'mobile/Transaksi/detail_menu/'.$id;?>">
                      <img src="<?php echo base_url().'assets/gambar/'.$gambar;?>" alt="" class="img-thumbnail" />
                </span>

              <div class="info-box-content">
                <span class="info-box-text"><b><?php echo $nama;?></b></span>
                <span class="info-box-text text-muted text-sm"><b>Deskripsi: </b> <?php echo limit_words($deskripsi,3).'...';?></span>
                <span class="info-box-number text-lg">
                  <?php if(empty($harga_lama)):?><?php echo $harbar.'K';?>
							<?php else:?><?php echo $harbar.'K';?>
								<del><span class="text-sm text-muted"><?php echo $harlam.'K';?></span></del>
							<?php endif;?></span>
                  <form action="<?php echo base_url().'mobile/Transaksi/insertOrder'?>" name="insertOrder" id="insertOrder" method="post">          
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
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
            
          <div class="col-lg-12">
				 <div class="card card-first card-outline">
              <div class="card-body">
                    <div class="col-12 text-center">
						<a href="<?php echo base_url().'mobile/Transaksi/detail_menu/'.$id;?>">
                      <img src="<?php echo base_url().'assets/gambar/'.$gambar;?>" alt="" width="150" height="80" class="img-thumbnail" />
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
			</div>
				 <?php }?>
			</div>
			</div>
<a id="back-to-top" href="#" class="btn btn-primary back-to-top" role="button" aria-label="Scroll to top">
      <i class="fas fa-chevron-up"></i>
    </a>
