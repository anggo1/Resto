    <div class="msg" style="display:none;">
      <?php echo $this->session->flashdata('msg'); ?>
    </div>
<div class="row">
<div class="col-md-12">
			 <div class="box box-info">
                <div class="box-header with-border">
    <div class="nav-tabs-custom">
          <form class="form-horizontal" action="<?php echo base_url('Profile/data_baru') ?>" method="POST" enctype="multipart/form-data">
          <div class="form-group">
              <label for="inputUsername" class="col-sm-2 control-label">NIP<span class="required">  *</span></label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="nip" placeholder="Nomor Induk Pegawai" name="nip" >
              </div>
            </div>
            <div class="form-group">
              <label for="inputUsername" class="col-sm-2 control-label">User Name<span class="required">  *</span></label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="UserName" placeholder="UserName" name="UserName" >
              </div>
            </div>
            <div class="form-group">
              <label for="inputNama" class="col-sm-2 control-label">Name<span class="required">  *</span></label>
              <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Nama" name="FirstName">
              </div>
            </div>
            <div class="form-group">
              <label for="inputFoto" class="col-sm-2 control-label">Foto</label>
              <div class="col-sm-10">
                <input type="file" class="form-control" placeholder="Foto" name="foto">
              </div>
            </div>
            <div class="form-group">
              <label for="inputFoto" class="col-sm-2 control-label" >Hak Akses<span class="required">  *</span></label>
              <div class="col-sm-10"></label>
                        <select name="User_Type" class="form-control" >
                            <option value="">Pilih Akses ...</option>
                            <?php if(($userdata->User_Type =='Admin') or $userdata->User_Type =='manager') {
								echo '<option value="manager">Manager</option>';}?>
                            <?php if((($userdata->User_Type =='Admin') or $userdata->User_Type =='manager') 
									or $userdata->User_Type =='supervisor') {
										echo '<option value="supervisor">Supervisor</option>';}?>
                            <option value="leader">Leader</option>
                            <option value="staff">Staff</option>
                        </select>
                    </div>
                    </div>
            <div class="form-group">
              <label for="password" class="col-sm-2 control-label">Password<span class="required">  *</span></label>
              <div class="col-sm-10">
                <input type="password" class="form-control" placeholder="Password" name="Password">
              </div>
            </div>
            <div class="form-group">
              <label for="passKonf" class="col-sm-2 control-label">Konfirmasi Password<span class="required">  *</span></label>
              <div class="col-sm-10">
                <input type="password" class="form-control" placeholder="Konfirmasi Password" name="passKonf">
              </div>
            </div>
            
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-danger">Submit</button>
              </div>
            </div>
          </form>
        </div>
      </div>
  </div>
</div>