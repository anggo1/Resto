<div class="content">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
				 <div class="card card-first card-outline">
              <div class="card-body">
                      <table class="table table-striped  table-bordered table-hover dt-responsive" id="list-menu">
                        <thead> 
							<tr>
								<th style="text-align:center;">No</th>
								<th style="text-align:center;">Invoice</th>
								<th style="text-align:center;">Subtotal</th>
								<th style="text-align:center;">Aksi</th>
							</tr>
							<thead>
							<tbody>
							<?php $i = 1; ?>
							<?php $grand_total_harga=0; 
                               foreach ($userOrder as $items) { 
                                    $grand_total_harga+=$items->inv_total;?>

                                    
								<tr>
									<td align="center"><?php echo $i;?></td>
									<td align="center"><?php echo $items->inv_no;?>
									<td align="center"><?php echo number_format($items->inv_total);?></td>
									<td align="center">
                                    <a href="#" style="text-decoration:none;"data-id="<?php echo $items->id_inv; ?>"class="btn btn-outline-primary btn-sm edit-inv">
                                            <i class="fas fa-edit"></i></a>
                                    <a href="<?php echo base_url().'mobile/Transaksi/cetakOrder'?>" style="text-decoration:none;"data-id="<?php echo $items->id_inv; ?>"class="btn btn-outline-success btn-sm">
                                            <i class="fa fa-print"></i></a></td>
								</tr>
							<?php $i++; ?>
							<?php  } ?>
							</tbody>
							<tfoot>
								<tr>
									<th style="text-align:left;" colspan="2">Total</th>
									<th style="text-align:center;"><?php echo number_format($grand_total_harga);?></th>
									<th></th>
								</tr>
							</tfoot>
						</table>
					</div>
            

			</div>
			</div>
			</div>
			</div>
			</div>
			</div>