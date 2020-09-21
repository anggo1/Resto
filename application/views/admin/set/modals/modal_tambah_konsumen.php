<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h4 style="display:block; text-align:center;"><?php if (!empty($dataPenempatan->id_penempatan)) {
                            echo 'Edit  Penempatan Wilayah';
                        } else { echo 'Penambahan Data Penempatan Wilayah';}
                        ?></h4>

  <form <?php if (empty($dataKonsumen->id_konsumen)) {echo 'id="form-tambah-konsumen"';} else { echo 'id="form-update-konsumen"';}?> method="POST">
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-user"></i>
      </span>
      <input type="hidden" name="id_penempatan" value="<?php if (!empty($dataPenempatan->id_penempatan)) { echo $dataPenempatan->id_penempatan; } ?>">
      <input type="text" class="form-control" placeholder="Nama penempatan" value="<?php
                        if (!empty($dataPenempatan->penempatan)) {
                            echo $dataPenempatan->penempatan;
                        }
                        ?>" name="penempatan" aria-describedby="sizing-addon2">
    </div>
    <div class="form-group">
      <div class="col-md-12">
          <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Simpan </button>
      </div>
    </div>
  </form>
</div>