<div class="msg" style="display:none;">
  <?php echo @$this->session->flashdata('msg'); ?>
</div><div class="row">

<div class="col-lg-12 col-xs-12">
    <div class="box box-info">
      <div class="box-header with-border">
  <div class="box-header"><div class="col-md-6" style="padding: 0;">
        <button class="form-control btn btn-success" data-toggle="modal" data-target="#tambah-konsumen"><i class="glyphicon glyphicon-plus-sign"></i> Tambah Data</button>
    </div>

  </div>
  <!-- /.box-header -->
  <div class="box-body">
                
    <table id="list-data" class="table table-bordered table-striped display responsive nowrap" style="width:100%">
      <thead>
        <tr>
          <th>No</th>
          <th>Kode</th>
          <th>Keterangan</th>
          <th style="text-align: center;">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
  $no = 1;
  foreach ($datakode as $pe) {
    ?>
    <tr>
      <td><?php echo $no;?></td>
      <td><?php echo $pe->kode;?></td>
      <td><?php echo $pe->nama; ?></td>

      <td class="text-center" style="min-width:260px;">
       <button class="btn btn-info btn-sm update-dataKonsumen" data-id="<?php echo $pe->id; ?>"><i class="glyphicon glyphicon-repeat"></i> Edit</button>
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
<?php echo $modal_tambah_konsumen; ?>

<div id="tempat-modal"></div>