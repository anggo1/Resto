<?php if ($userdata->pengguna_level=='4'){ ?>
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div>
<?php } else { ?>
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
	<h1>
	  <?php echo @$judul; ?>
	  <small><?php //echo @$deskripsi; ?></small>
	</h1>
			  </div>
			<div class="col-sm-6">
	<ol class="breadcrumb float-sm-right">
	  <?php
	  	for ($i=0; $i<count($this->session->flashdata('segment')); $i++) { 
	  		if ($i == 0) {
	  		?>
				<li class="breadcrumb-item"><i class="breadcrumb-item fa fa-tachometer-alt"></i>  <?php echo $this->session->flashdata('segment')[$i]; ?></li>
	  		<?php
	  		} elseif ($i == (count($this->session->flashdata('segment'))-1)) {
  			?>
				<li class="breadcrumb-item"> <?php echo $this->session->flashdata('segment')[$i]; ?> </li>
	  		<?php
	  		} else {
  			?>
				<li class="breadcrumb-item active"> <?php echo $this->session->flashdata('segment')[$i]; ?> </li>
	  		<?php
	  		}

	  		if ($i == 0 && $i == (count($this->session->flashdata('segment'))-1)) {
	  		?>
				<li class="breadcrumb-item active"> Here </li>
	  		<?php
	  		}
	  	} 
	  ?>
	</ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><?php } ?>