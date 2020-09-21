<div class="msg" style="display:none;">
  <?php echo @$this->session->flashdata('msg'); ?>
</div>
		<?php 
            function limit_words($string, $word_limit){
                $words = explode(" ",$string);
                return implode(" ",array_splice($words,0,$word_limit));
            }      
        ?>
		<!-- BEGIN BASE-->
<div class="section-body">
				<section class="style-default-bright" style="margin-top:0px;">
        <button class="form-control btn bg-gradient-purple" data-toggle="modal" data-target="#modal_add_pengguna"><span class="fa fa-plus"></span> Tambah Data </button>
            <p class="section-lead">
              </p>
				<!-- BEGIN TABLE HOVER -->
					
					<div class="row ">
              <div class="col-12 ">
				 <div class="card card-first card-outline">
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped  table-bordered table-hover dt-responsive nowrap" id="list-data">
                        <thead>       
								<tr>
									<th>Gambar</th>
									<th>Nama Menu</th>
									<th>Deskripsi</th>
									<th style="text-align:center;">Harga</th>
									<th>Kategori</th>
									<th class="text-right">Actions</th>
								</tr>
							</thead>
							<tbody>
							<?php 
								$no=0;
								foreach ($data->result_array() as $a) {
									$no++;
									$id=$a['menu_id'];
									$nama=$a['menu_nama'];	
									$deskripsi=$a['menu_deskripsi'];
									$harga_lama=$a['menu_harga_lama'];
									$harga_baru=$a['menu_harga_baru'];
									$like=$a['menu_likes'];
									$kat_id=$a['menu_kategori_id'];
									$kat_nama=$a['menu_kategori_nama'];
									$status=$a['menu_status'];
									$gambar=$a['menu_gambar'];
								
							?>
								<tr>
									<td><img style="width:80px;height:80px;" class="img-thumbnail width-1" src="<?php echo base_url().'assets/gambar/'.$gambar;?>" alt="" /></td>
									<td><?php echo $nama;?></td>
									<td><?php echo limit_words($deskripsi,10).'...';?></td>
									<?php if(empty($harga_lama)):?>
										<td style="text-align:right;"><?php echo 'Rp '.number_format($harga_baru);?></td>
									<?php else:?>
										<td style="vertical-align:middle;text-align:right;"><b><?php echo 'Rp '.number_format($harga_baru);?></b><p style="font-size:9px;"><del><?php echo 'Rp '.number_format($harga_lama);?></del></p></td>
									<?php endif;?>
									<td><?php echo $kat_nama;?></td>
									<td class="text-right"> 
                                                                               
										<a href="#" title="Edit row" data-toggle="modal" data-target="#modal_edit_pengguna<?php echo $id;?>">
                                            <button class="btn bg-gradient-primary btn-sm"><i class="fa fa-pencil-alt"></i>  Edit</button></a>
										<a href="#" title="Delete row" data-toggle="modal" data-target="#modal_hapus_pengguna<?php echo $id;?>">
                                            <button class="btn bg-gradient-danger btn-sm"><i class="fa fa-times-circle"></i> Del</button></a>
									</td>
								</tr>

							<?php } ?>
								
							</tbody>
						  </table>

						</div>
					</div>

					
				</section>

				

			</div>

		</div><!--end #base-->
		<!-- END BASE -->

			<!-- ============ MODAL ADD PELANGGAN =============== -->
			<div class="modal fade" id="modal_add_pengguna" tabindex="-1" role="dialog" aria-labelledby="modal-xl" aria-hidden="true">
                            
			    <div class="modal-dialog">
			    <div class="modal-content">
			    <div class="modal-header">
			        <h3 class="modal-title" id="myModalLabel">Tambah Menu</h3>
			        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			    </div>
			    <form class="form-horizontal" role="form" method="post" action="<?php echo base_url().'menu/simpan_menu'?>" enctype="multipart/form-data">
			        <div class="modal-body">
									<div class="form-group">
										<label for="regular13" class="col-sm-3 control-label">Nama</label>
										<div class="col-sm-12">
											<input type="text" name="nama" class="form-control" id="regular13" required>
										</div>
									</div>

									<div class="form-group">
										<label for="textarea13" class="col-sm-3 control-label">Deskripsi</label>
										<div class="col-sm-12">
											<textarea name="deskripsi" id="textarea13" class="form-control" rows="3" placeholder="" required></textarea>
										</div>
									</div>

									<div class="form-group">
										<label for="regular13" class="col-sm-3 control-label">Harga</label>
										<div class="col-sm-12">
											<input type="text" name="harga" class="form-control" id="regular13" required>
										</div>
									</div>
									<div class="form-group">
										<label for="select13" class="col-sm-3 control-label">Kategori</label>
										<div class="col-sm-12">
											<select id="select13" name="kategori" class="form-control" required>
												<option value="">&nbsp;</option>
												<?php 
													foreach ($kat->result_array() as $k) {
														$k_id=$k['kategori_id'];
														$k_nama=$k['kategori_nama'];
													
												?>
												<option value="<?php echo $k_id;?>"><?php echo $k_nama;?></option>
												<?php } ?>	
											</select>
										</div>
									</div>
									<div class="form-group">
										<label for="regular13" class="col-sm-3 control-label">Gambar</label>
										<div class="col-sm-12">
											<input type="file" name="filefoto" class="custom-file-input" id="regular13" required>
                                             <label class="custom-file-label" for="regular13">Choose file</label>
										</div>
									</div>
									
			        </div>
			        <div class="modal-footer">
			            <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
			            <button class="btn btn-primary" type="submit"><span class="fa fa-save"></span> Simpan</button>
			        </div>
			    </form>
			    </div>
			    </div>
			</div>

			<!-- ============ MODAL EDIT PENGGUNA =============== -->
			<?php 
				foreach ($data->result_array() as $a) {
					$id=$a['menu_id'];
					$nama=$a['menu_nama'];	
					$deskripsi=$a['menu_deskripsi'];
					$harga_lama=$a['menu_harga_lama'];
					$harga_baru=$a['menu_harga_baru'];
					$like=$a['menu_likes'];
					$kat_id=$a['menu_kategori_id'];
					$kat_nama=$a['menu_kategori_nama'];
					$status=$a['menu_status'];
					$gambar=$a['menu_gambar'];
								
			?>
			<div class="modal fade" id="modal_edit_pengguna<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
			    <div class="modal-dialog">
			    <div class="modal-content">
			    <div class="modal-header">
			        <h3 class="modal-title" id="myModalLabel">Edit Menu</h3>
			        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			    </div>
			    <form class="form-horizontal" role="form" method="post" action="<?php echo base_url().'Menu/update_menu'?>" enctype="multipart/form-data">
			        <div class="modal-body">
                        <img style="width:120px;height:120px;" class="img-thumbnail width-1" src="<?php echo base_url().'assets/gambar/'.$gambar;?>" alt="" />
									<div class="form-group">
										<label for="regular13" class="col-sm-3 control-label">Nama</label>
										<div class="col-sm-12">
											<input type="hidden" name="kode" value="<?php echo $id;?>">
											<input type="text" name="nama" value="<?php echo $nama;?>" class="form-control" id="regular13" required>
										</div>
									</div>

									<div class="form-group">
										<label for="textarea13" class="col-sm-3 control-label">Deskripsi</label>
										<div class="col-sm-12">
											<textarea name="deskripsi" id="textarea13" class="form-control" rows="3" placeholder="" required><?php echo $deskripsi;?></textarea>
										</div>
									</div>

									<div class="form-group">
										<label for="regular13" class="col-sm-3 control-label">Harga Lama(Rp)</label>
										<div class="col-sm-12">
											<input type="text" name="harga_lama" value="<?php echo $harga_baru;?>" class="form-control" id="regular13" required>
										</div>
									</div>
									<div class="form-group">
										<label for="regular13" class="col-sm-3 control-label">Harga Baru(Rp)</label>
										<div class="col-sm-12">
											<input type="text" name="harga_baru" class="form-control" id="regular13">
										</div>
									</div>
									<div class="form-group">
										<label for="select13" class="col-sm-3 control-label">Kategori</label>
										<div class="col-sm-12">
											<select id="select13" name="kategori" class="form-control" required>
												<option value="">&nbsp;</option>
												<?php 
													foreach ($kat->result_array() as $k) {
														$k_id=$k['kategori_id'];
														$k_nama=$k['kategori_nama'];
														if($kat_id==$k_id)
															echo "<option value='$k_id' selected>$k_nama</option>";
														else
															echo "<option value='$k_id'>$k_nama</option>";
													}
												?>
												
											</select>
										</div>
									</div>
									<div class="form-group">
										<label for="regular13" class="col-sm-3 control-label">Gambar</label>
										<div class="col-sm-12">
											<input type="file" name="filefoto" class="form-control" id="regular13">
										</div>
									</div>
									
									
			        </div>
			        <div class="modal-footer">
			            <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
			            <button class="btn btn-primary" type="submit"><span class="fa fa-edit"></span> Edit</button>
			        </div>
			    </form>
			    </div>
			    </div>
			</div>
			<?php } ?>

			<?php 
				foreach ($data->result_array() as $a) {
					$id=$a['menu_id'];
					$nama=$a['menu_nama'];	
					$deskripsi=$a['menu_deskripsi'];
					$harga_lama=$a['menu_harga_lama'];
					$harga_baru=$a['menu_harga_baru'];
					$like=$a['menu_likes'];
					$kat_id=$a['menu_kategori_id'];
					$kat_nama=$a['menu_kategori_nama'];
					$status=$a['menu_status'];
					$gambar=$a['menu_gambar'];
								
			?>
			<div class="modal fade" id="modal_hapus_pengguna<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
			    <div class="modal-dialog">
			    <div class="modal-content">
			    <div class="modal-header">
			        <h3 class="modal-title" id="myModalLabel">Hapus Menu</h3>
			        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			    </div>
			    <form class="form-horizontal" role="form" method="post" action="<?php echo base_url().'Menu/hapus_menu'?>" enctype="multipart/form-data">
			        <div class="modal-body">
                        <img style="width:150px;height:150px;" class="img-thumbnail width-1" src="<?php echo base_url().'assets/gambar/'.$gambar;?>" alt="" />
									<div class="form-group">
										<label for="regular13" class="col-sm-2 control-label"></label>
										<div class="col-sm-12">
											<input type="hidden" name="kode" value="<?php echo $id;?>">
											<input type="hidden" name="kategori" value="<?php echo $nama;?>">
											<p>Apakah Anda yakin mau menghapus data <b><?php echo $nama;?></b> ?</p>
										</div>
									</div>
	
			        </div>
			        <div class="modal-footer">
			            <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
			            <button class="btn btn-primary" type="submit"><span class="fa fa-trash"></span> Hapus</button>
			        </div>
			    </form>
			    </div>
			    </div>
			</div>
			<?php } ?>

	</body>
</html>
