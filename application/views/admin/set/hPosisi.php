<div class="msg" style="display:none;">
  <?php echo @$this->session->flashdata('msg'); ?>
</div><div class="row">

<div class="col-lg-12 col-xs-12">
    <div class="box box-info">
      <div class="box-header with-border">
  <div class="box-header"><div class="col-md-6" style="padding: 0;">
        <button class="form-control btn btn-success" data-toggle="modal" data-target="#tambah-posisi"><i class="glyphicon glyphicon-plus-sign"></i> Tambah Data</button>
    </div>
    <!---<div class="col-md-3">
        <button class="form-control btn btn-default" data-toggle="modal" data-target="#import-pegawai"><i class="glyphicon glyphicon glyphicon-floppy-open"></i> Import Data Excel</button>
    </div> -->
  </div>
  <!-- /.box-header -->
  <div class="box-body">
                
    <table id="list-data" class="table table-bordered table-striped display responsive nowrap" style="width:100%">
      <thead>
        <tr>
          <th>No</th>
          <th>Posisi/Jabatan</th>
          <th style="text-align: center;">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
  $no = 1;
  foreach ($dataPosisi as $pos) {
    ?>
    <tr>
      <td><?php echo $no; ?></td>
      <td><?php echo $pos->posisi; ?></td>

      <td class="text-center" style="min-width:260px;">
        
        <button class="btn btn-info btn-sm update-dataPosisi" data-id="<?php echo $pos->id_posisi; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
      </td>
    </tr>
<?php
    $no++;
  }
?>
      </tbody>
    </table>
  </div>
</div>

<?php echo $modal_tambah_posisi; ?>

<div id="tempat-modal"></div>

