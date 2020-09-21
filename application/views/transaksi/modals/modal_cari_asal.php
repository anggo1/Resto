<div class="card card-first">
              <div class="card-header">
                <h3 class="card-title">
					 <h4 class="modal-title" style="display:block; text-align:center;">
                       Pencarian Data Wilayah</h4></h3>
              </div>
 				<div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered table-hover dt-responsive nowrap" id="table-select">
                        <thead>          
     <!--<table id="list-data" class="table table-bordered table-striped display responsive nowrap" style="width:100%">-->
        <tr>
         <th>#</th>
    <th>Kode</th>
    <th>Pangkalan</th>
    <th>Wilayah</th>
  </tr>
      </thead>
      <tbody>
       <?php
  $no = 1;
  foreach ($dataWilayah as $s) {
    ?>
    <tr>
    
    <td class="text-center">
		<button type="button" class="btn btn-sm bg-gradient-warning" onClick="javascript:selectAsal('<?php echo $s->kode ?>','<?php echo $s->pangkalan ?>')"> <i class="fa  fa-check"></i> Pilih</button></td>
    <td><?php echo $s->kode; ?></td>
    <td><?php echo $s->pangkalan; ?></td>
    <td><?php echo $s->wilayah; ?></td>
    </tr>
    <?php
  }
?> 
      </tbody>
    </table>
  </div></div></div>
		