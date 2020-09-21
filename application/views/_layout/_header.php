
<?php if ($userdata->pengguna_level=='4')
		{ ?>
	  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="#" class="navbar-brand">
        <img src="<?php echo base_url(); ?>assets/images/<?php echo $userdata->pengguna_photo; ?>" alt="Resto" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light"><?php echo $userdata->pengguna_nama; ?></span>
      </a>
      
      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
              <div class="col-lg-12 col-12">
                  <a style="color: aliceblue;" href="<?php echo base_url().'mobile/Transaksi'?>">
            <div class="small-box bg-gradient-primary">
              <div class="inner"><i class="fa fa-home"></i> Home  
              </div>
                </div></a>
          </div>
          </li>      
            <li class="nav-item">
                <div class="col-lg-12 col-12">
                  <a style="color: aliceblue;" href="<?php echo base_url().'mobile/Transaksi/makanan'?>">
            <div class="small-box bg-gradient-primary">
              <div class="inner"><i class="fa fa-utensils"></i> Makanan
              </div>
                </div></a>
          </div></li>
            
            <li class="nav-item">
                <div class="col-lg-12 col-12">
                  <a style="color: aliceblue;" href="<?php echo base_url().'mobile/Transaksi/minuman'?>">
            <div class="small-box bg-gradient-primary">
              <div class="inner"><i class="fa fa-wine-glass-alt"></i> Minuman
              </div>
                </div></a>
          </div>
          </li>
            
            <li class="nav-item">
                <div class="col-lg-12 col-12">
                  <a style="color: aliceblue;" href="<?php echo base_url().'mobile/Transaksi/hot_promo'?>">
            <div class="small-box bg-gradient-primary">
              <div class="inner"><i class="fa fa-fire"></i> Hot Promo
               </div>
                </div></a>
          </div>
          </li>
            
          <li class="nav-item">
              <div class="col-lg-12 col-12">
                  <a style="color: aliceblue;" href="<?php echo base_url().'mobile/Transaksi/cart'?>">
            <div class="small-box bg-gradient-primary">
              <div class="inner"><i class="fa fa-shopping-cart"></i> Keranjang
              </div>
                </div></a>
          </div>
          </li>      
            <li class="nav-item">
                <div class="col-lg-12 col-12">
                  <a style="color: aliceblue;" href="<?php echo base_url().'mobile/Transaksi/list_transaksi'?>">
            <div class="small-box bg-gradient-primary">
              <div class="inner"><i class="fa fa-list-ol"></i> Transaksi
               </div>
                </div></a>
          </div>
          </li>
        
        </ul>

      </div> 
		
		<ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
       <li class="nav-item dropdown"> 
  <?php echo @$_nav;?>
        </li>
      </ul>
    </div></nav>
		<?php }
		else { ?>
		  <nav class="main-header navbar navbar-expand bg-primary navbar-dark">
     <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">

		  <?php echo @$_nav; ?></nav><?php  }?>

		
  