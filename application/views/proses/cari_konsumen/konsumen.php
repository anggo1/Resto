
                <div class="card card-first card-outline">
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped  table-bordered table-hover dt-responsive nowrap" id="table-kons">
                        <thead>          
							<tr>
						  		<th>#</th>
								<th>Nama</th>
								<th>No Telp</th>
								<th>Alamat</th>
							</tr>
					 </thead>
							<tbody>
						  
<?php
  foreach ($dataNama as $s) {
    ?>
    <tr>    
    <td><a href="javascript:selectKonsumen('<?php echo $s->id_konsumen?>','<?php echo $s->nama?>','<?php echo $s->no_telp?>','<?php echo $s->alamat?>')">
	<button type="button" class="btn btn-sm btn-success"> Pilih</button></a></td>
    <td><?php echo $s->nama ?></td>
    <td><?php echo $s->no_telp ?></td>
    <td><?php echo $s->alamat ?></td>   
    </tr>
    <?php
  }
?> </tbody>
    </table>
  </div>
</div>
</div>
<script>
var MyTable = $('#list-data,#table-1').dataTable({
		"responsive": true,
		"paging": true,
		"lengthChange": true,
		"searching": true,
		"ordering": true,
		"info": true,
		"processing": true
		});
</script>