<div class="msg" style="display:none;">
  <?php echo @$this->session->flashdata('msg'); ?>
</div>

<div class="section-body">
				<section class="style-default-bright" style="margin-top:0px;">
        <button class="form-control bbtn bg-gradient-purple" data-toggle="modal" data-target="#modal_add_Pegawai"><span class="fa fa-plus"></span> Tambah Data </button>
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
									<th>Photo</th>
									<th>Nama</th>
									<th>Jenis Kelamin</th>
									<th>Username</th>
									<th>Password</th>
									<th>Email</th>
									<th>Kontak</th>
									<th>Status</th>
									<th class="text-right">Actions</th>
								</tr>
							</thead>
							<tbody>
							<?php 
								foreach ($data->result_array() as $a) {
									$id=$a['Pegawai_id'];
									$nama=$a['Pegawai_nama'];
									$jenis_kelamin=$a['Pegawai_jenkel'];
									$jenkel=$a['jenkel'];
									$username=$a['Pegawai_username'];
									$password=$a['Pegawai_password'];
									$email=$a['Pegawai_email'];
									$nohp=$a['Pegawai_nohp'];
									$status=$a['Pegawai_status'];
									$level=$a['Pegawai_level'];
									$photo=$a['Pegawai_photo'];
								
							?>
								<tr>
									<td><img style="width:40px;height:40px;" class="img-circle width-1" src="<?php echo base_url().'assets/images/'.$photo;?>" alt="" /></td>
									<td><?php echo $nama;?></td>
									<td><?php echo $jenkel;?></td>
									<td><?php echo $username;?></td>
									<td><?php echo $password;?></td>
									<td><?php echo $email;?></td>
									<th><?php echo $nohp?></th>
									<?php if($status=1):?>
										<th>Aktif</th>
									<?php else:?>
										<th>Non Aktif</th>
									<?php endif;?>
									<td class="text-right">
										<a href="#" class="btn btn-icon-toggle" title="Edit row" data-toggle="modal" data-target="#modal_edit_Pegawai<?php echo $id;?>">
                                            <button class="btn bg-gradient-warning btn-sm"><i class="fa fa-pencil-alt"></i>  Edit</button></a>
										<a href="<?php echo base_url().'Pegawai/reset_password/'.$id;?>" class="btn btn-icon-toggle" title="Reset Password">
                                            <button class="btn bg-gradient-info btn-sm"><i class="fa fa-sync-alt"></i>  Reset</button></a>
										<a href="#" class="btn btn-icon-toggle" title="Delete row" data-toggle="modal" data-target="#modal_hapus_Pegawai<?php echo $id;?>">
                                            <button class="btn bg-gradient-primary btn-sm"><i class="fa fa-trash-alt"></i>  Del</button></a>
									</td>
								</tr>

							<?php } ?>
								
							</tbody>
						  </table>

						</div>
					</div><!--end .section-body -->

					
				</section>
				<!-- END TABLE HOVER -->

				

			</div><!--end #content-->
			<!-- END CONTENT -->

			

			<!-- ============ MODAL ADD PELANGGAN =============== -->
			<div class="modal fade" id="modal_add_Pegawai" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
			    <div class="modal-dialog">
			    <div class="modal-content">
			    <div class="modal-header">
			        <h3 class="modal-title" id="myModalLabel">Tambah Pegawai</h3>
			        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			    </div>
			    <form class="form-horizontal" role="form" method="post" action="<?php echo base_url().'Pegawai/simpan_Pegawai'?>" enctype="multipart/form-data">
			        <div class="modal-body">
									<div class="form-group">
										<label for="regular13" class="col-sm-3 control-label">Nama</label>
										<div class="col-sm-12">
											<input type="text" name="nama" class="form-control" id="regular13" required>
										</div>
									</div>
									<div class="form-group">
										<label for="select13" class="col-sm-3 control-label">Jenis Kelamin</label>
										<div class="col-sm-12">
											<select id="select13" name="jenkel" class="form-control" required>
												<option value="">&nbsp;</option>
												<option value="L">Laki-Laki</option>
												<option value="P">Perempuan</option>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label for="regular13" class="col-sm-3 control-label">Username</label>
										<div class="col-sm-12">
											<input type="text" name="username" class="form-control" id="regular13" required>
										</div>
									</div>
									<div class="form-group">
										<label for="password13" class="col-sm-3 control-label">Password</label>
										<div class="col-sm-12">
											<input type="password" name="password" class="form-control" id="password13" required>
										</div>
									</div>
									<div class="form-group">
										<label for="password13" class="col-sm-3 control-label">Ulangi Password</label>
										<div class="col-sm-12">
											<input type="password" name="password2" class="form-control" id="password13" required>
										</div>
									</div>
									<div class="form-group">
										<label for="regular13" class="col-sm-3 control-label">Email</label>
										<div class="col-sm-12">
											<input type="email" name="email" class="form-control" id="regular13" required>
										</div>
									</div>
									<div class="form-group">
										<label for="regular13" class="col-sm-3 control-label">Kontak Person</label>
										<div class="col-sm-12">
											<input type="text" name="kontak" class="form-control" id="regular13" required>
										</div>
									</div>
									<div class="form-group">
										<label for="regular13" class="col-sm-3 control-label">Photo</label>
										<div class="col-sm-12">
											<input type="file" name="filefoto" class="form-control" id="regular13">
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

			<!-- ============ MODAL EDIT Pegawai =============== -->
			<?php 
				foreach ($data->result_array() as $a) {
					$id=$a['Pegawai_id'];
					$nama=$a['Pegawai_nama'];
					$jenis_kelamin=$a['Pegawai_jenkel'];
					$jenkel=$a['jenkel'];
					$username=$a['Pegawai_username'];
					$password=$a['Pegawai_password'];
					$email=$a['Pegawai_email'];
					$nohp=$a['Pegawai_nohp'];
					$status=$a['Pegawai_status'];
					$level=$a['Pegawai_level'];
					$photo=$a['Pegawai_photo'];
								
			?>
			<div class="modal fade" id="modal_edit_Pegawai<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
			    <div class="modal-dialog">
			    <div class="modal-content">
			    <div class="modal-header">
			        <h3 class="modal-title" id="myModalLabel">Edit Pegawai</h3>
			        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			    </div>
			    <form class="form-horizontal" role="form" method="post" action="<?php echo base_url().'Pegawai/update_Pegawai'?>" enctype="multipart/form-data">
			        <div class="modal-body">
									<div class="form-group">
										<label for="regular13" class="col-sm-3 control-label">Nama</label>
										<div class="col-sm-12">
											<input type="hidden" name="kode" value="<?php echo $id;?>">
											<input type="text" name="nama" value="<?php echo $nama;?>" class="form-control" id="regular13" required>
										</div>
									</div>
									<div class="form-group">
										<label for="select13" class="col-sm-3 control-label">Jenis Kelamin</label>
										<div class="col-sm-12">
											<select id="select13" name="jenkel" class="form-control" required>
												<option value="">&nbsp;</option>
												<?php if($jenis_kelamin=='L'):?>
													<option value="L" selected>Laki-Laki</option>
													<option value="P">Perempuan</option>
												<?php else:?>
													<option value="L">Laki-Laki</option>
													<option value="P" selected>Perempuan</option>
												<?php endif;?>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label for="regular13" class="col-sm-3 control-label">Username</label>
										<div class="col-sm-12">
											<input type="text" name="username" value="<?php echo $username;?>" class="form-control" id="regular13" required>
										</div>
									</div>
									<div class="form-group">
										<label for="password13" class="col-sm-3 control-label">Password</label>
										<div class="col-sm-12">
											<input type="password" name="password" class="form-control" id="password13">
										</div>
									</div>
									<div class="form-group">
										<label for="password13" class="col-sm-3 control-label">Ulangi Password</label>
										<div class="col-sm-12">
											<input type="password" name="password2" class="form-control" id="password13">
										</div>
									</div>
									<div class="form-group">
										<label for="regular13" class="col-sm-3 control-label">Email</label>
										<div class="col-sm-12">
											<input type="email" name="email" class="form-control" value="<?php echo $email;?>" id="regular13" required>
										</div>
									</div>
									<div class="form-group">
										<label for="regular13" class="col-sm-3 control-label">Kontak Person</label>
										<div class="col-sm-12">
											<input type="text" name="kontak" class="form-control" value="<?php echo $nohp;?>" id="regular13" required>
										</div>
									</div>
									<div class="form-group">
										<label for="regular13" class="col-sm-3 control-label">Photo</label>
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

			<!-- ============ MODAL HAPUS Pegawai =============== -->
			<?php 
				foreach ($data->result_array() as $a) {
					$id=$a['Pegawai_id'];
					$nama=$a['Pegawai_nama'];
					$jenis_kelamin=$a['Pegawai_jenkel'];
					$jenkel=$a['jenkel'];
					$username=$a['Pegawai_username'];
					$password=$a['Pegawai_password'];
					$email=$a['Pegawai_email'];
					$nohp=$a['Pegawai_nohp'];
					$status=$a['Pegawai_status'];
					$level=$a['Pegawai_level'];
					$photo=$a['Pegawai_photo'];
								
			?>
			<div class="modal fade" id="modal_hapus_Pegawai<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
			    <div class="modal-dialog">
			    <div class="modal-content">
			    <div class="modal-header">
			        <h3 class="modal-title" id="myModalLabel">Hapus Pegawai</h3>
			        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			    </div>
			    <form class="form-horizontal" role="form" method="post" action="<?php echo base_url().'admin/Pegawai/hapus_Pegawai'?>" enctype="multipart/form-data">
			        <div class="modal-body">
									<div class="form-group">
										<label for="regular13" class="col-sm-2 control-label"></label>
										<div class="col-sm-12">
											<input type="hidden" name="kode" value="<?php echo $id;?>">
											<input type="hidden" name="nama" value="<?php echo $nama;?>">
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
